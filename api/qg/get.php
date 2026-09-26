<?php
// api/qg/get.php
// Get detailed details of a single section-based question paper by UUID

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

// Authenticate via token
$auth = qg_authenticate($con, true);
$session_uid = $auth['uid'];
$is_admin = $auth['is_admin'];

$uuid = isset($_GET['uuid']) ? trim($_GET['uuid']) : '';
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

    // Role check: Non-admin can only access own papers
    if (!$is_admin && strtolower($paper['created_by']) !== strtolower($session_uid)) {
        http_response_code(403);
        echo json_encode(['status' => false, 'message' => 'Access denied: You do not have permission to view this question paper']);
        exit;
    }

    // Fetch class name and subject name
    $class_res = mysqli_query($con, "SELECT class, class_section FROM class WHERE class_id = {$paper['class_id']}");
    $class_row = mysqli_fetch_assoc($class_res);
    $erp_class_name = $class_row ? $class_row['class'] . (!empty($class_row['class_section']) ? ' (' . $class_row['class_section'] . ')' : '') : 'N/A';
    $paper['class_name'] = $erp_class_name;
    $paper['display_class_name'] = !empty($paper['paper_class_name']) ? $paper['paper_class_name'] : $erp_class_name;

    $sub_res = mysqli_query($con, "SELECT name AS subject_name FROM subjects WHERE subj_id = {$paper['subject_id']}");
    $sub_row = mysqli_fetch_assoc($sub_res);
    $paper['subject_name'] = $sub_row ? $sub_row['subject_name'] : 'N/A';

    $paper['teacher_name'] = qg_get_teacher_name($con, $paper['created_by']);

    // Fetch sections
    $sections = qg_get_paper_sections($con, $paper['id']);
    $compiled_sections = [];

    foreach ($sections as $sec) {
        $questions = qg_get_section_questions($con, $sec['id']);
        $compiled_questions = [];

        foreach ($questions as $q) {
            $q_id = $q['id'];
            $q_type = $q['question_type'];
            
            $q_detail = [
                'id' => $q_id,
                'uuid' => $q['uuid'],
                'question_text' => $q['question_text'],
                'question_type' => $q_type,
                'difficulty' => $q['difficulty'],
                'marks' => floatval($q['marks_override'] ?? $q['marks']),
                'image_path' => $q['image_path'] ?? ''
            ];

            if ($q_type === 'mcq') {
                $q_detail['mcq_options'] = [];
                $mcq_opts = qg_get_mcq_options($con, $q_id);
                foreach ($mcq_opts as $opt) {
                    $q_detail['mcq_options'][] = [
                        'letter' => $opt['option_letter'],
                        'text' => $opt['option_text']
                    ];
                }
            } elseif ($q_type === 'matching' || $q_type === 'match_columns') {
                $q_detail['match_pairs'] = [];
                $match_opts = qg_get_match_options($con, $q_id);
                foreach ($match_opts as $m) {
                    $q_detail['match_pairs'][] = [
                        'left' => $m['left_content'],
                        'right' => $m['right_content']
                    ];
                }
            }

            $compiled_questions[] = $q_detail;
        }

        $sec['questions'] = $compiled_questions;
        $compiled_sections[] = $sec;
    }

    $paper['sections'] = $compiled_sections;

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Question paper retrieved successfully',
        'data' => $paper
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to fetch question paper details',
        'error_detail' => $e->getMessage()
    ]);
}
