<?php
require '../db.php';

$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? '';

if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    http_response_code(401);
    echo json_encode(['status' => false, 'message' => 'Authorization token missing or malformed']);
    exit;
}

$token = $matches[1]; // ✅ only the token part

// Check token in DB
$query = mysqli_query($con, "SELECT * FROM user_tokens WHERE token = '$token' LIMIT 1");

if (!$query || mysqli_num_rows($query) === 0) {
    http_response_code(401);
    echo json_encode(['status' => false, 'message' => 'Invalid or expired token']);
    exit;
}

$user = mysqli_fetch_assoc($query);
$session_uid = $user['uid']; // ✅ available in your APIs
$session_type= $uid = $user['type'];

  
