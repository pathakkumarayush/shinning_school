<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../../db.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input || empty($input)) {
    $input = $_POST;
} else {
    $input = array_merge($input, $_POST);
}

$class   = isset($input['class']) ? trim($input['class']) : (isset($input['student_class']) ? trim($input['student_class']) : '');
$exam    = isset($input['exam']) ? trim($input['exam']) : (isset($input['examination_name']) ? trim($input['examination_name']) : '');
$subject = isset($input['subject']) ? trim($input['subject']) : (isset($input['sub']) ? trim($input['sub']) : '');
$session = isset($input['session']) ? trim($input['session']) : (isset($input['student_session']) ? trim($input['student_session']) : '');
$date    = isset($input['date']) ? trim($input['date']) : date('d-m-Y');

$errors = [];
if ($class === '')   $errors[] = 'class is required';
if ($exam === '')    $errors[] = 'exam is required';
if ($subject === '') $errors[] = 'subject is required';
if ($session === '') $errors[] = 'session is required';

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status'  => false,
        'message' => implode(', ', $errors),
        'errors'  => $errors
    ]);
    exit;
}

$class_esc   = mysqli_real_escape_string($con, $class);
$exam_esc    = mysqli_real_escape_string($con, $exam);
$subject_esc = mysqli_real_escape_string($con, $subject);
$session_esc = mysqli_real_escape_string($con, $session);
$date_esc    = mysqli_real_escape_string($con, $date);

// Parse student attendance data
$records = [];

if (isset($input['attendance']) && is_array($input['attendance'])) {
    foreach ($input['attendance'] as $key => $val) {
        if (is_array($val)) {
            $sId = $val['student_id'] ?? $val['student'] ?? $key;
            $stat = strtolower(trim($val['status'] ?? $val['absent'] ?? 'present'));
            $rmk = $val['rmk'] ?? $val['remark'] ?? '';
            $records[] = ['student_id' => trim((string)$sId), 'status' => $stat, 'rmk' => $rmk];
        } else {
            $records[] = ['student_id' => trim((string)$key), 'status' => strtolower(trim((string)$val)), 'rmk' => ''];
        }
    }
} elseif (isset($input['students']) && is_array($input['students'])) {
    foreach ($input['students'] as $val) {
        if (is_array($val)) {
            $sId = $val['student_id'] ?? $val['student'] ?? '';
            $stat = strtolower(trim($val['status'] ?? $val['absent'] ?? 'present'));
            $rmk = $val['rmk'] ?? $val['remark'] ?? '';
            if ($sId !== '') {
                $records[] = ['student_id' => trim((string)$sId), 'status' => $stat, 'rmk' => $rmk];
            }
        }
    }
} elseif (isset($input['student_id']) || isset($input['student'])) {
    $sId = isset($input['student_id']) ? trim($input['student_id']) : trim($input['student']);
    $stat = strtolower(trim($input['status'] ?? $input['absent'] ?? 'present'));
    $rmk = trim($input['rmk'] ?? $input['remark'] ?? '');
    if ($sId !== '') {
        $records[] = ['student_id' => $sId, 'status' => $stat, 'rmk' => $rmk];
    }
}

if (empty($records)) {
    http_response_code(400);
    echo json_encode([
        'status'  => false,
        'message' => 'No student attendance records provided (pass attendance object, students array, or student_id)'
    ]);
    exit;
}

$absentCount  = 0;
$presentCount = 0;
$processed    = 0;

foreach ($records as $rec) {
    $studentId = $rec['student_id'];
    $status    = $rec['status'];
    $rmk       = $rec['rmk'];

    if ($studentId === '') continue;

    $student_esc = mysqli_real_escape_string($con, $studentId);
    $rmk_esc     = mysqli_real_escape_string($con, $rmk);

    $checkQuery = "
        SELECT id, absent FROM `exam_copy_collection`
        WHERE student = '$student_esc'
          AND class = '$class_esc'
          AND exam = '$exam_esc'
          AND subject = '$subject_esc'
          AND session = '$session_esc'
        LIMIT 1
    ";
    $checkRes = mysqli_query($con, $checkQuery);

    if ($status === 'absent') {
        $absentCount++;
        if ($checkRes && mysqli_num_rows($checkRes) > 0) {
            $row = mysqli_fetch_assoc($checkRes);
            $rowId = $row['id'];
            mysqli_query($con, "UPDATE `exam_copy_collection` SET `absent` = 'absent', `date` = '$date_esc', `rmk` = '$rmk_esc' WHERE id = '$rowId'");
        } else {
            mysqli_query($con, "
                INSERT INTO `exam_copy_collection` 
                (`student`, `date`, `session`, `class`, `absent`, `exam`, `subject`, `rmk`, `aid`)
                VALUES 
                ('$student_esc', '$date_esc', '$session_esc', '$class_esc', 'absent', '$exam_esc', '$subject_esc', '$rmk_esc', '1')
            ");
        }
    } else {
        // Status is Present / Collected -> Remove any absent record so it reflects Present in report
        $presentCount++;
        if ($checkRes && mysqli_num_rows($checkRes) > 0) {
            $row = mysqli_fetch_assoc($checkRes);
            $rowId = $row['id'];
            mysqli_query($con, "DELETE FROM `exam_copy_collection` WHERE id = '$rowId'");
        }
    }
    $processed++;
}

http_response_code(201);
echo json_encode([
    'status'  => true,
    'message' => 'Copy collection saved successfully',
    'data'    => [
        'class'           => $class,
        'exam'            => $exam,
        'subject'         => $subject,
        'session'         => $session,
        'date'            => $date,
        'total_processed' => $processed,
        'absent_count'    => $absentCount,
        'present_count'   => $presentCount
    ]
]);
