<?php
// api/qg/exam_master_update.php
// Update an existing exam in qg_exam_master

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';
require_once __DIR__ . '/auth_helper.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST or PUT method is allowed']);
    exit;
}

$auth = qg_authenticate($con, false);
$school_id = 'shining';

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = $_POST;
}

$exam_id   = isset($input['id']) ? intval($input['id']) : (isset($input['exam_id']) ? intval($input['exam_id']) : 0);
$exam_name = isset($input['exam_name']) ? trim($input['exam_name']) : '';
$exam_code = isset($input['exam_code']) ? trim($input['exam_code']) : null;
$session   = isset($input['session']) ? trim($input['session']) : null;
$status    = isset($input['status']) && in_array($input['status'], ['Active', 'Inactive']) ? $input['status'] : null;

if ($exam_id <= 0) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Valid exam ID is required']);
    exit;
}

$existing = qg_get_exam_by_id($con, $exam_id, $school_id);
if (!$existing) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Exam not found in exam master']);
    exit;
}

$updated_name    = ($exam_name !== '') ? $exam_name : $existing['exam_name'];
$updated_code    = ($exam_code !== null) ? $exam_code : $existing['exam_code'];
$updated_session = ($session !== null) ? $session : $existing['session'];
$updated_status  = ($status !== null) ? $status : $existing['status'];

try {
    $stmt = mysqli_prepare($con, "UPDATE qg_exam_master SET exam_name = ?, exam_code = ?, session = ?, status = ? WHERE id = ? AND school = ?");
    if (!$stmt) {
        throw new Exception("Database prepare error: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "ssssis", $updated_name, $updated_code, $updated_session, $updated_status, $exam_id, $school_id);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Database execute error: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);

    $updated_exam = qg_get_exam_by_id($con, $exam_id, $school_id);

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Exam updated successfully in exam master',
        'data' => $updated_exam
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to update exam in exam master',
        'error_detail' => $e->getMessage()
    ]);
}
?>
