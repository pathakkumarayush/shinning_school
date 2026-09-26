<?php
// api/qg/upload_paper.php
// Backend API for uploading PDF/DOCX question papers for Mobile App and ERP

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

// Authenticate (allows Bearer header, POST body token, or GET token)
$auth = qg_authenticate($con, true);
$user_id = $auth['uid'] ?? 'admin';
$school_id = 'shining';

$title            = isset($_POST['title']) ? trim($_POST['title']) : '';
$class_id         = isset($_POST['class_id']) && $_POST['class_id'] !== '' ? intval($_POST['class_id']) : -1;
$paper_class_name = isset($_POST['paper_class_name']) ? trim($_POST['paper_class_name']) : null;
$subject_id       = isset($_POST['subject_id']) && $_POST['subject_id'] !== '' ? intval($_POST['subject_id']) : -1;
$exam_id          = isset($_POST['exam_id']) && $_POST['exam_id'] !== '' ? intval($_POST['exam_id']) : 0;
$duration_minutes = isset($_POST['duration_minutes']) ? intval($_POST['duration_minutes']) : 180;
$max_marks        = isset($_POST['max_marks']) ? floatval($_POST['max_marks']) : 100.0;
$instructions     = isset($_POST['instructions']) ? trim($_POST['instructions']) : null;
$session          = isset($_POST['academic_year']) ? trim($_POST['academic_year']) : (isset($_POST['session']) ? trim($_POST['session']) : '2026-2027');
$creator          = isset($_POST['created_by']) && !empty(trim($_POST['created_by'])) ? trim($_POST['created_by']) : (isset($_POST['user_id']) && !empty(trim($_POST['user_id'])) ? trim($_POST['user_id']) : $user_id);

$errors = [];
if (empty($title)) {
    $errors[] = "title is required";
}
if ($class_id < 0) {
    $errors[] = "valid class_id is required";
}
if ($subject_id < 0) {
    $errors[] = "valid subject_id is required";
}
if ($exam_id <= 0) {
    $errors[] = "valid exam_id is required";
}

$file_key = isset($_FILES['file']) ? 'file' : (isset($_FILES['paper_file']) ? 'paper_file' : null);

if (!$file_key || !isset($_FILES[$file_key]['error']) || $_FILES[$file_key]['error'] !== UPLOAD_ERR_OK) {
    $errors[] = "A valid question paper file (PDF or DOCX) is required under field 'file' or 'paper_file'";
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

// Auto-resolve paper_class_name if not provided
if (empty($paper_class_name) && $class_id >= 0) {
    $c_stmt = mysqli_prepare($con, "SELECT class, class_section FROM class WHERE class_id = ? AND school = ? LIMIT 1");
    if ($c_stmt) {
        mysqli_stmt_bind_param($c_stmt, "is", $class_id, $school_id);
        mysqli_stmt_execute($c_stmt);
        $c_res = mysqli_stmt_get_result($c_stmt);
        if ($c_row = mysqli_fetch_assoc($c_res)) {
            $paper_class_name = trim(($c_row['class'] ?? '') . ' ' . ($c_row['class_section'] ?? ''));
        }
        mysqli_stmt_close($c_stmt);
    }
}

// Validate Exam
$exam_row = qg_get_exam_by_id($con, $exam_id, $school_id);
$exam_name = isset($_POST['exam_name']) && !empty(trim($_POST['exam_name'])) ? trim($_POST['exam_name']) : ($exam_row ? $exam_row['exam_name'] : '');

// Validate file type
$orig_name = $_FILES[$file_key]['name'];
$ext = strtolower(pathinfo($orig_name, PATHINFO_EXTENSION));
$allowed = ['pdf', 'docx', 'doc'];

if (!in_array($ext, $allowed)) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => 'Unsupported file type. Only .pdf and .docx files are allowed.'
    ]);
    exit;
}

$upload_dir = __DIR__ . '/../../upload/qg/papers/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0777, true);
}

$unique_filename = 'paper_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
$target_path = $upload_dir . $unique_filename;

if (!move_uploaded_file($_FILES[$file_key]['tmp_name'], $target_path)) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to save uploaded file on server.'
    ]);
    exit;
}

$file_rel_path = 'upload/qg/papers/' . $unique_filename;
$norm_type = ($ext === 'doc') ? 'docx' : $ext;
$file_size = filesize($target_path);
$new_uuid = qg_uuidv4();

try {
    $stmt = mysqli_prepare($con, "INSERT INTO qg_papers(uuid, title, exam_id, exam_name, class_id, paper_class_name, subject_id, academic_year, duration_minutes, max_marks, instructions, paper_type, file_path, file_type, file_size, original_filename, status, created_by, school) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'upload', ?, ?, ?, ?, 'published', ?, ?)");
    if (!$stmt) {
        throw new Exception("Database prepare failed: " . mysqli_error($con));
    }
    // 17 parameters matched to 17 placeholders
    mysqli_stmt_bind_param($stmt, "ssisisisidsssisss", $new_uuid, $title, $exam_id, $exam_name, $class_id, $paper_class_name, $subject_id, $session, $duration_minutes, $max_marks, $instructions, $file_rel_path, $norm_type, $file_size, $orig_name, $creator, $school_id);
    
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Database execute failed: " . mysqli_stmt_error($stmt));
    }
    $paper_id = mysqli_insert_id($con);
    mysqli_stmt_close($stmt);

    // Audit log
    qg_log_audit($con, $creator, $school_id, 'upload', 'Paper', $paper_id);

    $saved_paper = qg_get_paper_by_uuid($con, $new_uuid, $school_id);
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $saved_paper['file_url'] = $protocol . $host . '/shining_school/' . $file_rel_path;
    $saved_paper['teacher_name'] = qg_get_teacher_name($con, $saved_paper['created_by'] ?? $creator);

    http_response_code(201);
    echo json_encode([
        'status' => true,
        'message' => 'Question paper uploaded successfully',
        'data' => $saved_paper
    ]);
} catch (Throwable $e) {
    if (file_exists($target_path)) {
        @unlink($target_path);
    }
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to save question paper',
        'error_detail' => $e->getMessage()
    ]);
}
?>
