<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../db.php'; // <-- Your DB connection

header('Content-Type: application/json');

// ✅ Only GET method allowed
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// ✅ Validate user_id
if (empty($_GET['user_id'])) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Missing required field: user_id']);
    exit;
}

$user_id = mysqli_real_escape_string($con, $_GET['user_id']);

// ✅ Fetch notifications
$query = "SELECT * FROM notifications WHERE user_id = '$user_id' ORDER BY id DESC";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $notifications = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row['notification'] = json_decode($row['notification'], true);
        $row['data'] = json_decode($row['data'], true);
        $notifications[] = $row;
    }

    // ✅ Count unread
    $countQuery = "SELECT COUNT(*) as unread FROM notifications WHERE user_id = '$user_id' AND `read` = 0";
    $countRes = mysqli_query($con, $countQuery);
    $unread = mysqli_fetch_assoc($countRes)['unread'];

    echo json_encode([
        'status' => true,
        'message' => 'Get Notification',
        'data' => ['notifications' => $notifications, 'unread' => $unread]
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => 'No notification found',
        'data' => null
    ]);
}
