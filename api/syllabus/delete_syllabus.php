<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!headers_sent()) {
    header('Content-Type: application/json');
}

require __DIR__ . '/../../db.php';
global $con;

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
$checkQ = mysqli_query($con, "SELECT id, created_by FROM `syllabus` WHERE id = '$id_esc' LIMIT 1");
if (!$checkQ || mysqli_num_rows($checkQ) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Syllabus record not found']);
    exit;
}
$existing = mysqli_fetch_assoc($checkQ);

require_once __DIR__ . '/syllabus_auth_helper.php';
$auth = resolveSyllabusUser($con, $input);
if (!$auth['is_admin']) {
    if (empty($auth['uid'])) {
        http_response_code(401);
        echo json_encode(['status' => false, 'message' => 'User identification (user_id / created_by / token) is required']);
        exit;
    }
    if (trim($existing['created_by']) !== trim($auth['uid'])) {
        http_response_code(403);
        echo json_encode(['status' => false, 'message' => 'Authorization error: You can only delete your own syllabus']);
        exit;
    }
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
