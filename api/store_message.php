<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust this path as needed

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = array('status' => false, 'message' => '');
$date = date("Y-m-d");
$month = date("M");
// Safely get POST data
$sender       = isset($_POST['sender']) ? trim($_POST['sender']) : '';
$sender_user  = isset($_POST['sender_user']) ? trim($_POST['sender_user']) : '';
$session      = isset($_POST['session']) ? trim($_POST['session']) : '';
$class        = isset($_POST['class']) ? trim($_POST['class']) : '';
$type         = isset($_POST['type']) ? trim($_POST['type']) : '';
$subject      = isset($_POST['sub']) ? mysqli_real_escape_string($con, $_POST['sub']) : '';
$message      = isset($_POST['msg']) ? mysqli_real_escape_string($con, $_POST['msg']) : '';
$status       = 'Yes';

// Process receiver string into array
$receivers_raw = isset($_POST['receiver']) ? trim($_POST['receiver']) : '';
$receivers = array_filter(array_map('trim', explode(',', $receivers_raw))); // clean comma-separated values

// Separate validation
if (!$sender) {
    http_response_code(400);
    $response['message'] = 'Sender is required.';
    echo json_encode($response);
    exit;
}

if (!$sender_user) {
    http_response_code(400);
    $response['message'] = 'Sender user ID is required.';
    echo json_encode($response);
    exit;
}

if (!$session) {
    http_response_code(400);
    $response['message'] = 'Session is required.';
    echo json_encode($response);
    exit;
}

if (!$subject) {
    http_response_code(400);
    $response['message'] = 'Subject is required.';
    echo json_encode($response);
    exit;
}

if (!$message) {
    http_response_code(400);
    $response['message'] = 'Message is required.';
    echo json_encode($response);
    exit;
}

if (count($receivers) === 0) {
    http_response_code(400);
    $response['message'] = 'At least one receiver is required.';
    echo json_encode($response);
    exit;
}

// Insertion block
$successCount = 0;
$failCount = 0;

foreach ($receivers as $rc) {
    $rc = mysqli_real_escape_string($con, $rc);

    $insert = mysqli_query($con, "INSERT INTO sendmsg (sender, sender_user, reciever, sub, msg, status, date, session, type, class, month)
        VALUES ('$sender', '$sender_user', '$rc', '$subject', '$message', '$status', '$date', '$session', '$type', '$class', '$month')");

    if ($insert) {
        $successCount++;
    } else {
        $failCount++;
    }
}

// Final response
if ($successCount > 0) {
    $response['status'] = true;
    $response['message'] = "$successCount message(s) inserted successfully" . ($failCount > 0 ? ", $failCount failed." : ".");
} else {
    $response['status'] = false;
    $response['message'] = "All inserts failed.";
}

echo json_encode($response);
?>
