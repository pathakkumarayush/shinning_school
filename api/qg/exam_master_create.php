<?php
// api/qg/exam_master_create.php
// Create a new exam in qg_exam_master

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';
require_once __DIR__ . '/auth_helper.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Authenticate user
$auth = qg_authenticate($con, false);
$user_id = $auth['uid'] ?? 'admin';
$school_id = 'shining';

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = $_POST;
}

$exam_name = isset($input['exam_name']) ? trim($input['exam_name']) : '';
$exam_code = isset($input['exam_code']) ? trim($input['exam_code']) : null;
$session   = isset($input['session']) ? trim($input['session']) : '2026-2027';
$status    = isset($input['status']) && in_array($input['status'], ['Active', 'Inactive']) ? $input['status'] : 'Active';

if (empty($exam_name)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'exam_name is required']);
    exit;
}

try {
    $stmt = mysqli_prepare($con, "INSERT INTO qg_exam_master(exam_name, exam_code, session, school, status) VALUES(?, ?, ?, ?, ?)");
    if (!$stmt) {
        throw new Exception("Database prepare error: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "sssss", $exam_name, $exam_code, $session, $school_id, $status);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Database execute error: " . mysqli_stmt_error($stmt));
    }
    $new_id = mysqli_insert_id($con);
    mysqli_stmt_close($stmt);

    $created_exam = qg_get_exam_by_id($con, $new_id, $school_id);

    http_response_code(201);
    echo json_encode([
        'status' => true,
        'message' => 'Exam created successfully in exam master',
        'data' => $created_exam
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to create exam in exam master',
        'error_detail' => $e->getMessage()
    ]);
}
?>
