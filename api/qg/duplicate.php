<?php
// api/qg/duplicate.php
// Duplicate an existing section-based question paper

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

    if (!$is_admin && strtolower($paper['created_by']) !== strtolower($session_uid)) {
        http_response_code(403);
        echo json_encode(['status' => false, 'message' => 'Unauthorized: You can only duplicate question papers created by you']);
        exit;
    }

    $target_creator = $session_uid;
    if ($is_admin && !empty($data['create_by'])) {
        $target_creator = trim($data['create_by']);
    }

    mysqli_begin_transaction($con);

    $new_uuid = qg_uuidv4();
    $new_title = $paper['title'] . " (Copy)";
    
    // 1. Insert duplicated paper
    $stmt = mysqli_prepare($con, "INSERT INTO qg_papers(uuid, title, exam_name, class_id, paper_class_name, section_id, subject_id, academic_year, duration_minutes, max_marks, instructions, school_logo_path, watermark_text, show_qr_code, show_barcode, show_page_number, layout_settings, status, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'draft', ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssisissdssssssssss", $new_uuid, $new_title, $paper['exam_name'], $paper['class_id'], $paper['paper_class_name'], $paper['section_id'], $paper['subject_id'], $paper['academic_year'], $paper['duration_minutes'], $paper['max_marks'], $paper['instructions'], $paper['school_logo_path'], $paper['watermark_text'], $paper['show_qr_code'], $paper['show_barcode'], $paper['show_page_number'], $paper['layout_settings'], $target_creator, $school_id);
    mysqli_stmt_execute($stmt);
    $new_paper_id = mysqli_insert_id($con);
    mysqli_stmt_close($stmt);

    // 2. Duplicate sections and questions
    $sections = qg_get_paper_sections($con, $paper['id']);
    foreach ($sections as $sec) {
        $stmt_s = mysqli_prepare($con, "INSERT INTO qg_paper_sections(paper_id, name, instructions, question_type, marks_per_question, negative_marks, number_of_questions, internal_choice, difficulty_level, mandatory, sort_order) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt_s, "isssddiiiii", $new_paper_id, $sec['name'], $sec['instructions'], $sec['question_type'], $sec['marks_per_question'], $sec['negative_marks'], $sec['number_of_questions'], $sec['internal_choice'], $sec['difficulty_level'], $sec['mandatory'], $sec['sort_order']);
        mysqli_stmt_execute($stmt_s);
        $new_sec_id = mysqli_insert_id($con);
        mysqli_stmt_close($stmt_s);

        $questions = qg_get_section_questions($con, $sec['id']);
        foreach ($questions as $q) {
            $q_uuid = qg_uuidv4();
            $stmt_q_copy = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, chapter_id, topic_id, academic_year, difficulty, marks, blooms_taxonomy, learning_outcome, explanation, hints, image_path, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt_q_copy, "sssiisissdsssssss", $q_uuid, $q['question_text'], $q['question_type'], $q['class_id'], $q['subject_id'], $q['chapter_id'], $q['topic_id'], $q['academic_year'], $q['difficulty'], $q['marks'], $q['blooms_taxonomy'], $q['learning_outcome'], $q['explanation'], $q['hints'], $q['image_path'], $target_creator, $school_id);
            mysqli_stmt_execute($stmt_q_copy);
            $copied_q_id = mysqli_insert_id($con);
            mysqli_stmt_close($stmt_q_copy);

            if ($q['question_type'] === 'mcq') {
                $opts = qg_get_mcq_options($con, $q['id']);
                foreach ($opts as $o) {
                    $stmt_o = mysqli_prepare($con, "INSERT INTO qg_mcq_options(question_id, option_letter, option_text, is_correct) VALUES(?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_o, "issi", $copied_q_id, $o['option_letter'], $o['option_text'], $o['is_correct']);
                    mysqli_stmt_execute($stmt_o);
                    mysqli_stmt_close($stmt_o);
                }
            } elseif ($q['question_type'] === 'matching' || $q['question_type'] === 'match_columns') {
                $matches = qg_get_match_options($con, $q['id']);
                foreach ($matches as $m) {
                    $stmt_m = mysqli_prepare($con, "INSERT INTO qg_match_options(question_id, left_content, right_content, sort_order) VALUES(?, ?, ?, ?)");
                    mysqli_stmt_bind_param($stmt_m, "issi", $copied_q_id, $m['left_content'], $m['right_content'], $m['sort_order']);
                    mysqli_stmt_execute($stmt_m);
                    mysqli_stmt_close($stmt_m);
                }
            }

            $stmt_q = mysqli_prepare($con, "INSERT INTO qg_paper_questions(section_id, question_id, sort_order, marks_override, is_alternative_choice, parent_choice_id) VALUES(?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt_q, "iiidii", $new_sec_id, $copied_q_id, $q['pq_sort_order'], $q['marks_override'], $q['is_alternative_choice'], $q['parent_choice_id']);
            mysqli_stmt_execute($stmt_q);
            mysqli_stmt_close($stmt_q);
        }
    }

    qg_log_audit($con, $target_creator, $school_id, 'duplicate', 'Paper', $new_paper_id);

    mysqli_commit($con);

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Question paper duplicated successfully',
        'data' => [
            'uuid' => $new_uuid
        ]
    ]);
} catch (Exception $e) {
    mysqli_rollback($con);
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to duplicate question paper',
        'error_detail' => $e->getMessage()
    ]);
}
