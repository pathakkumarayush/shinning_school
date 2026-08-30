<?php
// api/qg/list.php
// Get list of question papers with role-based filtering, teacher display name, and custom display class

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

$session = isset($_GET['session']) ? trim($_GET['session']) : '';
$school_id = 'shining';

$filter_class = isset($_GET['class_id']) && $_GET['class_id'] !== '' ? intval($_GET['class_id']) : -1;
$filter_subject = isset($_GET['subject_id']) && $_GET['subject_id'] !== '' ? intval($_GET['subject_id']) : -1;
$filter_status = isset($_GET['status']) ? trim($_GET['status']) : '';
$filter_user = isset($_GET['create_by']) ? trim($_GET['create_by']) : (isset($_GET['user_id']) ? trim($_GET['user_id']) : '');

try {
    $sql = "SELECT p.id, p.uuid, p.title, p.exam_name, p.class_id, p.paper_class_name, p.subject_id, p.academic_year, 
                   p.duration_minutes, p.max_marks, p.instructions, p.watermark_text, 
                   p.show_qr_code, p.show_page_number, p.status, p.created_by, p.created_at,
                   c.class, c.class_section, s.name AS subject_name 
            FROM qg_papers p 
            LEFT JOIN class c ON p.class_id = c.class_id 
            LEFT JOIN subjects s ON p.subject_id = s.subj_id 
            WHERE p.school = ? AND p.deleted_at IS NULL";
    
    $types = "s";
    $params = [$school_id];

    if (!empty($session)) {
        $sql .= " AND p.academic_year = ?";
        $types .= "s";
        $params[] = $session;
    }

    // Role / User filtering
    if (!empty($filter_user)) {
        $is_admin_user = (strtolower($filter_user) === 'admin' || strtolower($filter_user) === 'shining');
        if (!$is_admin_user) {
            $sql .= " AND p.created_by = ?";
            $types .= "s";
            $params[] = $filter_user;
        }
    }

    if ($filter_class >= 0) {
        $sql .= " AND p.class_id = ?";
        $types .= "i";
        $params[] = $filter_class;
    }
    if ($filter_subject >= 0) {
        $sql .= " AND p.subject_id = ?";
        $types .= "i";
        $params[] = $filter_subject;
    }
    if (!empty($filter_status)) {
        $sql .= " AND p.status = ?";
        $types .= "s";
        $params[] = $filter_status;
    }
    $sql .= " ORDER BY p.id DESC";

    $papers = [];
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        $bind_params = array_merge([$stmt, $types], $params);
        $ref = [];
        foreach ($bind_params as $key => $value) {
            $ref[$key] = &$bind_params[$key];
        }
        call_user_func_array('mysqli_stmt_bind_param', $ref);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $row['teacher_name'] = qg_get_teacher_name($con, $row['created_by']);
            $row['display_class_name'] = !empty($row['paper_class_name']) ? $row['paper_class_name'] : ($row['class'] . (!empty($row['class_section']) ? ' (' . $row['class_section'] . ')' : ''));
            $papers[] = $row;
        }
        mysqli_stmt_close($stmt);
    }

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Question papers retrieved successfully',
        'data' => $papers
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to fetch question papers',
        'error_detail' => $e->getMessage()
    ]);
}
?>
