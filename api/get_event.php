<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

$session = isset($_GET['session']) ? trim($_GET['session']) : '';

$query = "SELECT * FROM event_calendar";
if ($session !== '') {
    $session_esc = mysqli_real_escape_string($con, $session);
    $query .= " WHERE session = '$session_esc'";
}

$result = mysqli_query($con, $query);

if ($result) {
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }

    $response['status'] = true;
    $response['message'] = count($events) . ' event(s) found.';
    $response['data'] = $events;
} else {
    $response['status'] = false;
    $response['message'] = mysqli_error($con);
}

echo json_encode($response);
?>
