<?php
// api/qg/exam_master_delete.php
// Soft delete / deactivate an exam in qg_exam_master

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';
require_once __DIR__ . '/auth_helper.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST or DELETE method is allowed']);
    exit;
}

$auth = qg_authenticate($con, false);
$school_id = 'shining';

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = array_merge($_GET, $_POST);
}

$exam_id = isset($input['id']) ? intval($input['id']) : (isset($input['exam_id']) ? intval($input['exam_id']) : 0);

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

try {
    $now = date('Y-m-d H:i:s');
    $stmt = mysqli_prepare($con, "UPDATE qg_exam_master SET deleted_at = ?, status = 'Inactive' WHERE id = ? AND school = ?");
    if (!$stmt) {
        throw new Exception("Database prepare error: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "sis", $now, $exam_id, $school_id);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Database execute error: " . mysqli_stmt_error($stmt));
    }
    mysqli_stmt_close($stmt);

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Exam deleted successfully from exam master'
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to delete exam from exam master',
        'error_detail' => $e->getMessage()
    ]);
}
?>
