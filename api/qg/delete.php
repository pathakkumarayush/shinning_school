<?php
// api/qg/delete.php
// Soft-delete a question paper by UUID

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

// Authenticate via token
$auth = qg_authenticate($con, true);
$session_uid = $auth['uid'];
$is_admin = $auth['is_admin'];

// Decode JSON input
$input = file_get_contents("php://input");
$data = json_decode($input, true);
if (json_last_error() !== JSON_ERROR_NONE || empty($data)) {
    $data = $_POST;
}

$uuid = isset($data['uuid']) ? trim($data['uuid']) : '';
if (empty($uuid)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'UUID is required']);
    exit;
}

$school_id = 'shining';

try {
    $paper = qg_get_paper_by_uuid($con, $uuid, $school_id);
    if (!$paper) {
        http_response_code(404);
        echo json_encode(['status' => false, 'message' => 'Question paper not found']);
        exit;
    }

    // Authorization check
    if (!$is_admin && strtolower($paper['created_by']) !== strtolower($session_uid)) {
        http_response_code(403);
        echo json_encode(['status' => false, 'message' => 'Unauthorized: You can only delete question papers created by you']);
        exit;
    }
	
    $now = date('Y-m-d H:i:s');
    $stmt = mysqli_prepare($con, "UPDATE qg_papers SET deleted_at = ? WHERE id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $now, $paper['id']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        qg_log_audit($con, $session_uid, $school_id, 'delete', 'Paper', $paper['id']);

        http_response_code(200);
        echo json_encode([
            'status' => true,
            'message' => 'Question paper deleted successfully'
        ]);
    } else {
        throw new Exception("Database prepare statement failed");
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to delete question paper',
        'error_detail' => $e->getMessage()
    ]);
}
