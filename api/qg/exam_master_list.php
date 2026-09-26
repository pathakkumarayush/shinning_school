<?php
// api/qg/exam_master_list.php
// Fetch list of exams from qg_exam_master for App and ERP integrations

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';
require_once __DIR__ . '/auth_helper.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

$session = isset($_GET['session']) ? trim($_GET['session']) : '';
$school_id = 'shining';
$status_filter = isset($_GET['status']) ? trim($_GET['status']) : '';
$only_active = ($status_filter === '') ? true : ($status_filter === 'Active');

try {
    $exams = qg_get_exam_master_list($con, $school_id, $session ?: null, $only_active);

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => count($exams) . ' exam(s) retrieved successfully',
        'data' => $exams
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to fetch exam list',
        'error_detail' => $e->getMessage()
    ]);
}
?>
