<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../db.php';

header('Content-Type: application/json');

// ✅ Only POST method allowed
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$data = $_POST;

if (empty($data['uid'])) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Missing required field: user_id']);
    exit;
}

$user_id = mysqli_real_escape_string($con, $data['uid']);

// ✅ Mark as read
if (!empty($data['type']) && $data['type'] === 'all') {
    $query = "UPDATE notifications SET `read` = 1 WHERE user_id = '$user_id'";
} elseif (!empty($data['n_id'])) {
    $n_id = mysqli_real_escape_string($con, $data['n_id']);
    $query = "UPDATE notifications SET `read` = 1 WHERE user_id = '$user_id' AND id = '$n_id'";
} else {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Missing required field: n_id or type']);
    exit;
}

$result = mysqli_query($con, $query);

if ($result) {
    echo json_encode([
        'status' => true,
        'message' => 'Notification(s) marked as read',
        'data' => null
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
