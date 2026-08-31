<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!headers_sent()) {
    header('Content-Type: application/json');
}

require __DIR__ . '/../../db.php';
global $con;

// Ensure syllabus table exists
$createTableQuery = "CREATE TABLE IF NOT EXISTS `syllabus` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `class` VARCHAR(100) NOT NULL,
  `subject` VARCHAR(100) NOT NULL,
  `chapters` LONGTEXT DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `remark` VARCHAR(255) DEFAULT NULL,
  `session` VARCHAR(50) DEFAULT NULL,
  `created_by` VARCHAR(100) DEFAULT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` TINYINT(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_class_subject` (`class`, `subject`),
  KEY `idx_session` (`session`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($con, $createTableQuery);

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Read input (support JSON & Form-Data)
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = $_POST;
}

$class       = isset($input['class']) ? trim($input['class']) : '';
$subject     = isset($input['subject']) ? trim($input['subject']) : '';
$description = isset($input['description']) ? trim($input['description']) : (isset($input['discription']) ? trim($input['discription']) : '');
$remark      = isset($input['remark']) ? trim($input['remark']) : '';
$session     = isset($input['session']) ? trim($input['session']) : '';
$user_id     = isset($input['user_id']) ? trim($input['user_id']) : (isset($input['created_by']) ? trim($input['created_by']) : '');
$rawChapters = $input['chapters'] ?? null;

// Validation
$errors = [];
if ($class === '') {
    $errors[] = 'Class is required';
}
if ($subject === '') {
    $errors[] = 'Subject is required';
}

// Process chapters (supports array of objects/strings or JSON string)
$chapterList = [];
if (!empty($rawChapters)) {
    if (is_string($rawChapters)) {
        $decoded = json_decode($rawChapters, true);
        if (is_array($decoded)) {
            $rawChapters = $decoded;
        }
    }

    if (is_array($rawChapters)) {
        foreach ($rawChapters as $idx => $chap) {
            if (is_array($chap)) {
                $cNo   = isset($chap['chapter_no']) ? trim($chap['chapter_no']) : (string)($idx + 1);
                $cName = isset($chap['chapter_name']) ? trim($chap['chapter_name']) : (isset($chap['name']) ? trim($chap['name']) : '');
                if ($cName !== '' || $cNo !== '') {
                    $chapterList[] = [
                        'chapter_no'   => $cNo,
                        'chapter_name' => $cName
                    ];
                }
            } elseif (is_string($chap) && trim($chap) !== '') {
                $chapterList[] = [
                    'chapter_no'   => (string)($idx + 1),
                    'chapter_name' => trim($chap)
                ];
            }
        }
    }
}

// Check if multiple individual chapter inputs were provided (e.g. chapter_no[] and chapter_name[])
if (empty($chapterList) && isset($input['chapter_no']) && isset($input['chapter_name'])) {
    $cNos   = (array)$input['chapter_no'];
    $cNames = (array)$input['chapter_name'];
    foreach ($cNames as $idx => $name) {
        $nameTrim = trim($name);
        $noTrim   = isset($cNos[$idx]) ? trim($cNos[$idx]) : (string)($idx + 1);
        if ($nameTrim !== '' || $noTrim !== '') {
            $chapterList[] = [
                'chapter_no'   => $noTrim,
                'chapter_name' => $nameTrim
            ];
        }
    }
}

if (empty($chapterList)) {
    $errors[] = 'At least one chapter (chapter_no & chapter_name) is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => implode(', ', $errors),
        'errors' => $errors
    ]);
    exit;
}

require_once __DIR__ . '/syllabus_auth_helper.php';

// Verify Authorization / Assignment
$auth = resolveSyllabusUser($con, $input);
$teacher_uid = $auth['uid'];

if (!$auth['is_admin']) {
    if (empty($teacher_uid)) {
        http_response_code(401);
        echo json_encode(['status' => false, 'message' => 'User identification (user_id / created_by / token) is required']);
        exit;
    }

    $isAssigned = isTeacherAssignedToSubject($con, $teacher_uid, $class, $subject, $session);
    if (!$isAssigned) {
        http_response_code(403);
        echo json_encode([
            'status' => false,
            'message' => 'Authorization error: You are only allowed to create syllabus for your assigned class and subject'
        ]);
        exit;
    }
}

$effective_created_by = !empty($teacher_uid) ? $teacher_uid : ($user_id !== '' ? $user_id : 'admin');

// Sanitize inputs
$class_esc       = mysqli_real_escape_string($con, $class);
$subject_esc     = mysqli_real_escape_string($con, $subject);
$chapters_json   = mysqli_real_escape_string($con, json_encode($chapterList, JSON_UNESCAPED_UNICODE));
$description_esc = mysqli_real_escape_string($con, $description);
$remark_esc      = mysqli_real_escape_string($con, $remark);
$session_esc     = mysqli_real_escape_string($con, $session);
$created_by_esc  = mysqli_real_escape_string($con, $effective_created_by);

$insertQuery = "INSERT INTO `syllabus` 
                (`class`, `subject`, `chapters`, `description`, `remark`, `session`, `created_by`, `status`) 
                VALUES 
                ('$class_esc', '$subject_esc', '$chapters_json', '$description_esc', '$remark_esc', '$session_esc', '$created_by_esc', 1)";

if (mysqli_query($con, $insertQuery)) {
    $insert_id = mysqli_insert_id($con);
    http_response_code(201);
    echo json_encode([
        'status'  => true,
        'message' => 'Syllabus added successfully',
        'data'    => [
            'id'          => $insert_id,
            'class'       => $class,
            'subject'     => $subject,
            'chapters'    => $chapterList,
            'description' => $description,
            'remark'      => $remark,
            'session'     => $session,
            'created_by'  => $user_id
        ]
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status'  => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
?>
