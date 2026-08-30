<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata');

header('Content-Type: application/json');

require '../db.php';

$response = [
    'status' => false,
    'message' => '',
    'data' => []
];

try {

    // Allow only GET request
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {

        http_response_code(405);

        echo json_encode([
            'status' => false,
            'message' => 'Only GET method allowed'
        ]);

        exit;
    }

    // Get all active sessions
    $query = "SELECT * FROM sessions WHERE status = '1'";

    $result = mysqli_query($con, $query);

    // Query failed
    if (!$result) {

        http_response_code(500);

        echo json_encode([
            'status' => false,
            'message' => 'Database query failed',
            'error' => mysqli_error($con)
        ]);

        exit;
    }

    // Sessions found
    if (mysqli_num_rows($result) > 0) {

        $response['status'] = true;
        $response['message'] = 'Sessions found';
        $response['data'] = mysqli_fetch_all($result, MYSQLI_ASSOC);

    } else {

        $response['message'] = 'No sessions found';
    }

} catch (Exception $e) {

    http_response_code(500);

    $response['message'] = $e->getMessage();
}

echo json_encode($response);

?>