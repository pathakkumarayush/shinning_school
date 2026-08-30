<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../db.php';

// Accept GET, POST, DELETE
$method = $_SERVER['REQUEST_METHOD'];
if (!in_array($method, ['GET', 'POST', 'DELETE'])) {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Method Not Allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = $_REQUEST;
}

$id = isset($input['id']) ? trim($input['id']) : (isset($input['syllabus_id']) ? trim($input['syllabus_id']) : '');

if ($id === '' || !is_numeric($id)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Valid syllabus ID is required']);
    exit;
}

$id_esc = (int)$id;

// Check if record exists
$checkQ = mysqli_query($con, "SELECT id FROM `syllabus` WHERE id = '$id_esc' LIMIT 1");
if (!$checkQ || mysqli_num_rows($checkQ) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Syllabus record not found']);
    exit;
}

// Delete syllabus record
$delQuery = "DELETE FROM `syllabus` WHERE id = '$id_esc'";

if (mysqli_query($con, $delQuery)) {
    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => 'Syllabus deleted successfully',
        'deleted_id' => $id_esc
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status'  => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
?>
