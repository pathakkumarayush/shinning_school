<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../db.php';

header('Content-Type: application/json');

// Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$data = $_POST;

// Validate input
if (empty($data['uid']) || empty($data['password'])) {
    http_response_code(422);
    echo json_encode([
        'status' => false,
        'message' => 'Missing required fields: uid, password'
    ]);
    exit;
}

$uid          = mysqli_real_escape_string($con, $data['uid']);
$new_password = mysqli_real_escape_string($con, $data['password']);
if (strlen($new_password) < 6) {
    http_response_code(422);
    echo json_encode([
        'status' => false,
        'message' => 'New password must be at least 6 characters long'
    ]);
    exit;
}
// ✅ Check if user exists
$query = "SELECT pass FROM login WHERE uid = '$uid'";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    echo json_encode([
        'status' => false,
        'message' => 'User not found'
    ]);
    exit;
}

$row = mysqli_fetch_assoc($result);

$update_query = "UPDATE login SET pass = '$new_password' WHERE uid = '$uid'";
$update_result = mysqli_query($con, $update_query);

if ($update_result) {
    if (mysqli_affected_rows($con) > 0) {
        echo json_encode([
            'status' => true,
            'message' => 'Password updated successfully'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Password update failed (maybe same as old password)'
        ]);
    }
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
