<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../../db.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

$method = $_SERVER['REQUEST_METHOD'];
if (!in_array($method, ['POST', 'DELETE', 'GET'])) {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Method not allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input || empty($input)) {
    $input = array_merge($_GET, $_POST);
} else {
    $input = array_merge($_GET, $_POST, $input);
}

$id         = isset($input['id']) ? trim($input['id']) : '';
$student_id = isset($input['student_id']) ? trim($input['student_id']) : (isset($input['student']) ? trim($input['student']) : '');
$class      = isset($input['class']) ? trim($input['class']) : '';
$exam       = isset($input['exam']) ? trim($input['exam']) : '';
$subject    = isset($input['subject']) ? trim($input['subject']) : '';
$session    = isset($input['session']) ? trim($input['session']) : '';

if (empty($id) && (empty($class) || empty($exam) || empty($subject) || empty($session))) {
    http_response_code(400);
    echo json_encode([
        'status'  => false,
        'message' => 'Must provide `id` for single deletion OR (`class`, `exam`, `subject`, `session`) for bulk deletion'
    ]);
    exit;
}

if (!empty($id)) {
    $id_esc = mysqli_real_escape_string($con, $id);
    $check = mysqli_query($con, "SELECT id FROM `exam_copy_collection` WHERE id = '$id_esc' LIMIT 1");
    if (!$check || mysqli_num_rows($check) === 0) {
        http_response_code(404);
        echo json_encode(['status' => false, 'message' => 'Record not found']);
        exit;
    }

    mysqli_query($con, "DELETE FROM `exam_copy_collection` WHERE id = '$id_esc'");
    http_response_code(200);
    echo json_encode([
        'status'        => true,
        'message'       => 'Record deleted successfully',
        'deleted_count' => 1
    ]);
    exit;
}

// Bulk delete by filter
$class_esc = mysqli_real_escape_string($con, $class);
$exam_esc  = mysqli_real_escape_string($con, $exam);
$sub_esc   = mysqli_real_escape_string($con, $subject);
$sess_esc  = mysqli_real_escape_string($con, $session);

$conditions = [
    "class = '$class_esc'",
    "exam = '$exam_esc'",
    "subject = '$sub_esc'",
    "session = '$sess_esc'"
];

if (!empty($student_id)) {
    $stud_esc = mysqli_real_escape_string($con, $student_id);
    $conditions[] = "student = '$stud_esc'";
}

$query = "DELETE FROM `exam_copy_collection` WHERE " . implode(' AND ', $conditions);
mysqli_query($con, $query);
$affected = mysqli_affected_rows($con);

http_response_code(200);
echo json_encode([
    'status'        => true,
    'message'       => 'Copy collection records cleared successfully',
    'deleted_count' => $affected
]);
