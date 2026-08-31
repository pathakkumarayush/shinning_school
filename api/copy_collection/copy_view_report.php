<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../../db.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input || empty($input)) {
    $input = array_merge($_GET, $_POST);
} else {
    $input = array_merge($_GET, $_POST, $input);
}

$class   = isset($input['class']) ? trim($input['class']) : (isset($input['student_class']) ? trim($input['student_class']) : '');
$exam    = isset($input['exam']) ? trim($input['exam']) : (isset($input['examination_name']) ? trim($input['examination_name']) : '');
$subject = isset($input['subject']) ? trim($input['subject']) : (isset($input['sub']) ? trim($input['sub']) : '');
$session = isset($input['session']) ? trim($input['session']) : (isset($input['student_session']) ? trim($input['student_session']) : '');

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

// Fetch all active students in class and session
$studQuery = "
    SELECT student_id, student_name, student_fname, student_scholar, student_rollno, student_class, student_section, student_contactno
    FROM `student`
    WHERE student_class = '$class_esc'
      AND student_session = '$session_esc'
      AND status = '0'
    ORDER BY student_name ASC
";
$studRes = mysqli_query($con, $studQuery);

if (!$studRes) {
    http_response_code(500);
    echo json_encode(['status' => false, 'message' => 'Database error: ' . mysqli_error($con)]);
    exit;
}

// Fetch all absent collection records for this exam, subject, class, session in one batch
$copyQuery = "
    SELECT student, absent, rmk, date
    FROM `exam_copy_collection`
    WHERE class = '$class_esc'
      AND exam = '$exam_esc'
      AND subject = '$subject_esc'
      AND session = '$session_esc'
";
$copyRes = mysqli_query($con, $copyQuery);
$absentMap = [];
if ($copyRes) {
    while ($crow = mysqli_fetch_assoc($copyRes)) {
        $absentMap[(string)$crow['student']] = [
            'status' => $crow['absent'] ?: 'absent',
            'remark' => $crow['rmk'] ?? '',
            'date'   => $crow['date'] ?? ''
        ];
    }
}

$studentsList = [];
$totalStudents = 0;
$totalAbsent = 0;
$totalCollected = 0;
$sr = 1;

while ($s = mysqli_fetch_assoc($studRes)) {
    $sId = (string)$s['student_id'];
    $totalStudents++;

    $isAbsent = isset($absentMap[$sId]) && strtolower($absentMap[$sId]['status']) === 'absent';
    if ($isAbsent) {
        $totalAbsent++;
        $statusStr = 'Absent';
        $remark = $absentMap[$sId]['remark'];
        $date = $absentMap[$sId]['date'];
    } else {
        $totalCollected++;
        $statusStr = 'Present';
        $remark = '';
        $date = date('d-m-Y');
    }

    $studentsList[] = [
        'sr_no'        => $sr++,
        'student_id'   => $s['student_id'],
        'student_name' => ucwords(strtolower($s['student_name'] ?? '')),
        'father_name'  => ucwords(strtolower($s['student_fname'] ?? '')),
        'scholar_no'   => $s['student_scholar'] ?? '',
        'roll_no'      => $s['student_rollno'] ?? '',
        'class'        => $s['student_class'],
        'section'      => $s['student_section'] ?? '',
        'status'       => $statusStr,
        'is_collected' => ($statusStr === 'Present'),
        'remark'       => $remark,
        'date'         => $date
    ];
}

$collectionRate = $totalStudents > 0 ? round(($totalCollected / $totalStudents) * 100, 2) : 0;

http_response_code(200);
echo json_encode([
    'status' => true,
    'data'   => [
        'exam_info' => [
            'class'        => $class,
            'exam'         => $exam,
            'subject'      => $subject,
            'session'      => $session,
            'school_title' => 'Shining Middle School Raisen (M.P.)',
            'generated_at' => date('d-m-Y H:i:s')
        ],
        'summary' => [
            'total_students'         => $totalStudents,
            'total_collected_copies' => $totalCollected,
            'total_absent_copies'    => $totalAbsent,
            'collection_percentage'  => $collectionRate
        ],
        'students' => $studentsList
    ]
]);
