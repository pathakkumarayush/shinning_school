<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // Adjust this as needed

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Get session from request
$session = isset($_GET['session']) ? trim($_GET['session']) : '';

if ($session === '') {
    http_response_code(400);
    $response['message'] = 'Session is required.';
    echo json_encode($response);
    exit;
}

// Query without checking school
$session_esc = mysqli_real_escape_string($con, $session);

$query = "SELECT * FROM examinationa WHERE examination_session = '$session_esc'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $exams = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $exams[] = $row;
    }

    $response['status'] = true;
    $response['message'] = count($exams) . ' term(s) found.';
    $response['data'] = $exams;
} else {
    $response['status'] = false;
    $response['message'] = 'No terms found for the given session.';
}

echo json_encode($response);
?>
