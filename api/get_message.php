<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust path as needed

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Optional filters from query parameters
$sender_user = isset($_GET['sender_user']) ? trim($_GET['sender_user']) : '';
$receiver    = isset($_GET['receiver']) ? trim($_GET['receiver']) : '';
$session     = isset($_GET['session']) ? trim($_GET['session']) : '';
$class       = isset($_GET['class']) ? trim($_GET['class']) : '';
$sender       = isset($_GET['sender']) ? trim($_GET['sender']) : '';
// Build base query
$query = "SELECT * FROM sendmsg WHERE 1=1";

// Append filters
if ($sender_user !== '') {
    $query .= " AND sender_user = '" . mysqli_real_escape_string($con, $sender_user) . "'";
}
if ($receiver !== '') {
    $query .= " AND reciever = '" . mysqli_real_escape_string($con, $receiver) . "'";
}
if ($session !== '') {
    $query .= " AND session = '" . mysqli_real_escape_string($con, $session) . "'";
}
if ($class !== '') {
    $query .= " AND class = '" . mysqli_real_escape_string($con, $class) . "'";
}
if ($sender !== '') {
    $query .= " AND sender = '" . mysqli_real_escape_string($con, $sender) . "'";
}

$query .= " ORDER BY id DESC"; // Latest first

$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $messages = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }

    $response['status'] = true;
    $response['message'] = count($messages) . " message(s) found.";
    $response['data'] = $messages;
} else {
    $response['status'] = false;
    $response['message'] = 'No messages found.';
}

echo json_encode($response);
?>
