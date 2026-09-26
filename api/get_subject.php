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

// Get parameters
$session = isset($_GET['session']) ? trim($_GET['session']) : '';
$class   = isset($_GET['class']) ? trim($_GET['class']) : '';

if ($session === '') {
    http_response_code(400);
    $response['message'] = 'Session is required.';
    echo json_encode($response);
    exit;
}

// Sanitize
$session_esc = mysqli_real_escape_string($con, $session);

// Build base query
$query = "SELECT * FROM subjects WHERE session = '$session_esc'";

// Optional class filter
if ($class !== '') {
    $class_esc = mysqli_real_escape_string($con, $class);
    $query .= " AND class = '$class_esc'";
}

$query .= " ORDER BY subj_id DESC";

// Execute
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['data'][] = $row;
    }
    $response['status'] = true;
    $response['message'] = count($response['data']) . " subject(s) found.";
} else {
    $response['status'] = false;
    $response['message'] = "No subjects found.";
}

echo json_encode($response);
?>
