<?php
// api/qg/create.php
// Create a new section-based question paper via API

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

$school_id = 'shining';

// Fetch default paper settings
$default_settings = qg_get_paper_settings($con, $school_id);

// Retrieve inputs
$session = isset($data['session']) && !empty(trim($data['session'])) ? trim($data['session']) : (isset($data['academic_year']) && !empty(trim($data['academic_year'])) ? trim($data['academic_year']) : '2026-2027');
$exam_name = isset($data['exam_name']) ? trim($data['exam_name']) : '';
$title = isset($data['title']) && !empty(trim($data['title'])) ? trim($data['title']) : $exam_name;
$class_id = isset($data['class_id']) && $data['class_id'] !== '' ? intval($data['class_id']) : -1;
$paper_class_name = isset($data['paper_class_name']) ? trim($data['paper_class_name']) : '';
$subject_id = isset($data['subject_id']) && $data['subject_id'] !== '' ? intval($data['subject_id']) : -1;
$duration = isset($data['duration_minutes']) ? intval($data['duration_minutes']) : 180;
$max_marks = isset($data['max_marks']) ? floatval($data['max_marks']) : 0;
$instructions = isset($data['instructions']) ? trim($data['instructions']) : $default_settings['general_instruction'];
$watermark = isset($data['watermark_text']) ? trim($data['watermark_text']) : $default_settings['watermark'];

// Determine creator: token's authenticated user or admin override
$create_by = $session_uid;
if ($is_admin && !empty($data['create_by'])) {
    $create_by = trim($data['create_by']);
} elseif ($is_admin && !empty($data['user_id'])) {
    $create_by = trim($data['user_id']);
}

// Validation
$errors = [];
if (empty($exam_name)) $errors[] = "Exam Name is required.";
if ($class_id < 0) $errors[] = "Please select target Class.";
if ($subject_id < 0) $errors[] = "Please select Subject.";
if ($duration <= 0) $errors[] = "Duration must be greater than 0 minutes.";
if (empty($create_by)) $errors[] = "Creator ID is required.";

// Support structured `sections` payload OR backward-compatible flat `questions`
$sections_payload = isset($data['sections']) ? $data['sections'] : [];
if (empty($sections_payload) && !empty($data['questions'])) {
    // Wrap flat questions array into a default Section A
    $sections_payload = [
        [
            'heading' => 'SECTION-A',
            'instruction' => '',
            'question_type' => 'mcq',
            'questions' => $data['questions']
        ]
    ];
}

if (empty($sections_payload) || !is_array($sections_payload)) {
    $errors[] = "Please provide sections and questions for the paper.";
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ]);
    exit;
}

mysqli_begin_transaction($con);
try {
    // 1. Insert Paper Record
    $new_uuid = qg_uuidv4();
    $stmt = mysqli_prepare($con, "INSERT INTO qg_papers(uuid, title, exam_name, class_id, paper_class_name, subject_id, academic_year, duration_minutes, max_marks, instructions, watermark_text, show_qr_code, show_page_number, status, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 1, 'draft', ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssisisdsssss", $new_uuid, $title, $exam_name, $class_id, $paper_class_name, $subject_id, $session, $duration, $max_marks, $instructions, $watermark, $create_by, $school_id);
    mysqli_stmt_execute($stmt);
    $paper_id = mysqli_insert_id($con);
    mysqli_stmt_close($stmt);

    // 2. Insert Sections and Questions
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

        // Insert Questions under this Section
        $q_sort_order = 1;
        foreach ($sec_questions as $q_inner_idx => $q_data) {
            $q_text = isset($q_data['question_text']) ? trim($q_data['question_text']) : (isset($q_data['text']) ? trim($q_data['text']) : '');
            $q_type = isset($q_data['question_type']) ? trim($q_data['question_type']) : (isset($q_data['type']) ? trim($q_data['type']) : $sec_type);
            $q_marks = isset($q_data['marks']) ? floatval($q_data['marks']) : 1.0;
            $q_image_path = isset($q_data['image_path']) ? trim($q_data['image_path']) : '';
            $q_uuid = qg_uuidv4();

            // Insert to qg_questions
            $stmt_q = mysqli_prepare($con, "INSERT INTO qg_questions(uuid, question_text, question_type, class_id, subject_id, academic_year, difficulty, marks, image_path, created_by, school) VALUES(?, ?, ?, ?, ?, ?, 'medium', ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt_q, "sssiisdsss", $q_uuid, $q_text, $q_type, $class_id, $subject_id, $session, $q_marks, $q_image_path, $create_by, $school_id);
            mysqli_stmt_execute($stmt_q);
            $new_q_id = mysqli_insert_id($con);
            mysqli_stmt_close($stmt_q);

            // Type-specific sub-data
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

            // Map question to section
            $stmt_map = mysqli_prepare($con, "INSERT INTO qg_paper_questions(section_id, question_id, sort_order, marks_override) VALUES(?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt_map, "iiid", $section_id, $new_q_id, $q_sort_order, $q_marks);
            mysqli_stmt_execute($stmt_map);
            mysqli_stmt_close($stmt_map);

            $q_sort_order++;
        }

        $sec_sort_order++;
    }

    qg_log_audit($con, $create_by, $school_id, 'create', 'Paper', $paper_id);
    mysqli_commit($con);

    http_response_code(201);
    echo json_encode([
        'status' => true,
        'message' => 'Section-based question paper created successfully',
        'data' => [
            'paper_id' => $paper_id,
            'uuid' => $new_uuid,
            'academic_year' => $session
        ]
    ]);
} catch (Exception $e) {
    mysqli_rollback($con);
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to create question paper',
        'error_detail' => $e->getMessage()
    ]);
}
