<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = [
    'status' => false,
    'message' => '',
    'data' => []
];

try {
    $query = "SELECT id, period_name AS name FROM period_master WHERE status = 1 ORDER BY id ASC";
    $result = mysqli_query($con, $query);

    if (!$result) {
        http_response_code(500);
        echo json_encode([
            'status' => false,
            'message' => 'Database query failed',
            'error' => mysqli_error($con)
        ]);
        exit;
    }

    $periods = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row['id'] = (int)$row['id'];
        $periods[] = $row;
    }

    $response['status'] = true;
    $response['message'] = 'Periods fetched successfully';
    $response['data'] = $periods;

} catch (Exception $e) {
    http_response_code(500);
    $response['message'] = 'An unexpected error occurred: ' . $e->getMessage();
}

echo json_encode($response);
?>
