<?php
// api/qg/update.php
// Update an existing section-based question paper by UUID

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../../school/qg/db_helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Decode JSON input
$input = file_get_contents("php://input");
$data = json_decode($input, true);
if (json_last_error() !== JSON_ERROR_NONE || empty($data)) {
    $data = $_POST;
}

$school_id = 'shining';

$uuid = isset($data['uuid']) ? trim($data['uuid']) : '';
if (empty($uuid)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'UUID is required to update a question paper']);
    exit;
}

$paper = qg_get_paper_by_uuid($con, $uuid, $school_id);
if (!$paper) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Question paper not found']);
    exit;
}

$paper_id = $paper['id'];

// Creator / Actor determination
$request_user = isset($data['create_by']) ? trim($data['create_by']) : (isset($data['user_id']) ? trim($data['user_id']) : (isset($session_uid) ? $session_uid : ''));
$is_admin = ($request_user === 'admin' || $request_user === 'shining');

// Authorization check: Non-admin can only update own paper
if (!empty($request_user) && !$is_admin && strtolower($paper['created_by']) !== strtolower($request_user)) {
    http_response_code(403);
    echo json_encode(['status' => false, 'message' => 'Unauthorized: You can only update question papers created by you']);
    exit;
}

$creator_teacher = !empty($request_user) && $is_admin ? ($data['created_by'] ?? $paper['created_by']) : $paper['created_by'];

// Retrieve inputs
$session = isset($data['session']) ? trim($data['session']) : ($data['academic_year'] ?? $paper['academic_year']);
$exam_name = isset($data['exam_name']) ? trim($data['exam_name']) : $paper['exam_name'];
$title = !empty(trim($data['title'] ?? '')) ? trim($data['title']) : $exam_name;
$class_id = isset($data['class_id']) && $data['class_id'] !== '' ? intval($data['class_id']) : $paper['class_id'];
$paper_class_name = isset($data['paper_class_name']) ? trim($data['paper_class_name']) : $paper['paper_class_name'];
$subject_id = isset($data['subject_id']) && $data['subject_id'] !== '' ? intval($data['subject_id']) : $paper['subject_id'];
$duration = isset($data['duration_minutes']) ? intval($data['duration_minutes']) : $paper['duration_minutes'];
$max_marks = isset($data['max_marks']) ? floatval($data['max_marks']) : $paper['max_marks'];
$instructions = isset($data['instructions']) ? trim($data['instructions']) : $paper['instructions'];
$watermark = isset($data['watermark_text']) ? trim($data['watermark_text']) : $paper['watermark_text'];

$sections_payload = isset($data['sections']) ? $data['sections'] : [];
if (empty($sections_payload) && !empty($data['questions'])) {
    $sections_payload = [
        [
            'heading' => 'SECTION-A',
            'instruction' => '',
            'question_type' => 'mcq',
            'questions' => $data['questions']
        ]
    ];
}

mysqli_begin_transaction($con);
try {
    // 1. Update Paper Details
    $stmt = mysqli_prepare($con, "UPDATE qg_papers SET title = ?, exam_name = ?, class_id = ?, paper_class_name = ?, subject_id = ?, academic_year = ?, duration_minutes = ?, max_marks = ?, instructions = ?, watermark_text = ?, created_by = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssisisidsssi", $title, $exam_name, $class_id, $paper_class_name, $subject_id, $session, $duration, $max_marks, $instructions, $watermark, $creator_teacher, $paper_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // 2. If new sections/questions supplied, replace old ones cleanly
    if (!empty($sections_payload)) {
        // Fetch old questions of this paper
        $q_ids_res = mysqli_query($con, "SELECT question_id FROM qg_paper_questions WHERE section_id IN (SELECT id FROM qg_paper_sections WHERE paper_id = {$paper_id})");
        $old_q_ids = [];
        while ($q_row = mysqli_fetch_assoc($q_ids_res)) {
            $old_q_ids[] = $q_row['question_id'];
        }

        // Delete old mappings and sections
        mysqli_query($con, "DELETE FROM qg_paper_questions WHERE section_id IN (SELECT id FROM qg_paper_sections WHERE paper_id = {$paper_id})");
        mysqli_query($con, "DELETE FROM qg_paper_sections WHERE paper_id = {$paper_id}");

        // Clean up old question tables
        if (!empty($old_q_ids)) {
            $old_q_ids_str = implode(',', $old_q_ids);
            mysqli_query($con, "DELETE FROM qg_mcq_options WHERE question_id IN ($old_q_ids_str)");
            mysqli_query($con, "DELETE FROM qg_match_options WHERE question_id IN ($old_q_ids_str)");
            mysqli_query($con, "DELETE FROM qg_true_false WHERE question_id IN ($old_q_ids_str)");
            mysqli_query($con, "DELETE FROM qg_blanks WHERE question_id IN ($old_q_ids_str)");
            mysqli_query($con, "DELETE FROM qg_text_answers WHERE question_id IN ($old_q_ids_str)");
            mysqli_query($con, "DELETE FROM qg_questions WHERE id IN ($old_q_ids_str)");
        }

        // Insert new sections and questions
        $sec_sort_order = 1;
        foreach ($sections_payload as $s_idx => $sec_data) {
            $sec_heading = isset($sec_data['heading']) ? trim($sec_data['heading']) : ('SECTION-' . chr(64 + $sec_sort_order));
            $sec_instruction = isset($sec_data['instruction']) ? trim($sec_data['instruction']) : '';
            $sec_type = isset($sec_data['question_type']) ? trim($sec_data['question_type']) : 'mcq';
            $sec_questions = isset($sec_data['questions']) ? $sec_data['questions'] : [];
            $num_questions = count($sec_questions);

            // Insert Section
            $stmt_sec = mysqli_prepare($con, "INSERT INTO qg_paper_sections(paper_id, name, instructions, question_type, marks_per_question, negative_marks, number_of_questions, sort_order) VALUES(?, ?, ?, ?, 1.00, 0.00, ?, ?)");
            mysqli_stmt_bind_param($stmt_sec, "isssii", $paper_id, $sec_heading, $sec_instruction, $sec_type, $num_questions, $sec_sort_order);
            mysqli_stmt_execute($stmt_sec);
            $section_id = mysqli_insert_id($con);
            mysqli_stmt_close($stmt_sec);

            // Insert Questions
            $q_sort_order = 1;
            foreach ($sec_questions as $q_inner_idx => $q_data) {
                $q_text = isset($q_data['question_text']) ? trim($q_data['question_text']) : (isset($q_data['text']) ? trim($q_data['text']) : '');
                $q_type = isset($q_data['question_type']) ? trim($q_data['question_type']) : (isset($q_data['type']) ? trim($q_data['type']) : $sec_type);
                $q_marks = isset($q_data['marks']) ? floatval($q_data['marks']) : 1.0;
                $q_image_path = isset($q_data['image_path']) ? trim($q_data['image_path']) : '';
                $q_uuid = qg_uuidv4();

                $stmt_q = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, academic_year, difficulty, marks, image_path, created_by, school) VALUES(?, ?, ?, ?, ?, ?, 'medium', ?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt_q, "sssiisdsss", $q_uuid, $q_text, $q_type, $class_id, $subject_id, $session, $q_marks, $q_image_path, $creator_teacher, $school_id);
                mysqli_stmt_execute($stmt_q);
                $new_q_id = mysqli_insert_id($con);
                mysqli_stmt_close($stmt_q);

                if ($q_type === 'mcq') {
                    $opts = isset($q_data['mcq_options']) ? $q_data['mcq_options'] : (isset($q_data['options']) ? $q_data['options'] : []);
                    $letters = ['A', 'B', 'C', 'D', 'E', 'F'];
                    foreach ($opts as $o_idx => $o_text) {
                        $opt_val = is_array($o_text) ? ($o_text['text'] ?? '') : strval($o_text);
                        $letter = $letters[$o_idx] ?? 'A';
                        $stmt_opt = mysqli_prepare($con, "INSERT INTO qg_mcq_options(question_id, option_letter, option_text, is_correct) VALUES(?, ?, ?, 0)");
                        mysqli_stmt_bind_param($stmt_opt, "iss", $new_q_id, $letter, $opt_val);
                        mysqli_stmt_execute($stmt_opt);
                        mysqli_stmt_close($stmt_opt);
                    }
                } elseif ($q_type === 'matching' || $q_type === 'match_columns') {
                    $pairs = isset($q_data['match_pairs']) ? $q_data['match_pairs'] : (isset($q_data['pairs']) ? $q_data['pairs'] : []);
                    foreach ($pairs as $p_idx => $pair) {
                        $left_val = $pair['left'] ?? ($pair['left_content'] ?? '');
                        $right_val = $pair['right'] ?? ($pair['right_content'] ?? '');
                        $stmt_m = mysqli_prepare($con, "INSERT INTO qg_match_options(question_id, left_content, right_content, sort_order) VALUES(?, ?, ?, ?)");
                        mysqli_stmt_bind_param($stmt_m, "issi", $new_q_id, $left_val, $right_val, $p_idx);
                        mysqli_stmt_execute($stmt_m);
                        mysqli_stmt_close($stmt_m);
                    }
                }

                $stmt_map = mysqli_prepare($con, "INSERT INTO qg_paper_questions(section_id, question_id, sort_order, marks_override) VALUES(?, ?, ?, ?)");
                mysqli_stmt_bind_param($stmt_map, "iiid", $section_id, $new_q_id, $q_sort_order, $q_marks);
                mysqli_stmt_execute($stmt_map);
                mysqli_stmt_close($stmt_map);

                $q_sort_order++;
            }
            $sec_sort_order++;
        }
    }

    qg_log_audit($con, $creator_teacher, $school_id, 'update', 'Paper', $paper_id);
    mysqli_commit($con);

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Question paper updated successfully'
    ]);
} catch (Exception $e) {
    mysqli_rollback($con);
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to update question paper',
        'error_detail' => $e->getMessage()
    ]);
}
?>
