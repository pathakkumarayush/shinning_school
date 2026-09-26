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

// Multi-class parsing
$classes = [];
if (isset($input['classes'])) {
    if (is_array($input['classes'])) {
        $classes = $input['classes'];
    } elseif (is_string($input['classes'])) {
        $classes = explode(',', $input['classes']);
    }
} elseif (isset($input['class'])) {
    if (is_array($input['class'])) {
        $classes = $input['class'];
    } elseif (is_string($input['class'])) {
        $classes = explode(',', $input['class']);
    }
} elseif (isset($input['student_class'])) {
    if (is_array($input['student_class'])) {
        $classes = $input['student_class'];
    } elseif (is_string($input['student_class'])) {
        $classes = explode(',', $input['student_class']);
    }
}

$classes = array_values(array_filter(array_map('trim', $classes), function($c) { return $c !== ''; }));

$exam     = isset($input['exam']) ? trim($input['exam']) : (isset($input['examination_name']) ? trim($input['examination_name']) : '');
$subject  = isset($input['subject']) ? trim($input['subject']) : (isset($input['sub']) ? trim($input['sub']) : '');
$session  = isset($input['session']) ? trim($input['session']) : (isset($input['student_session']) ? trim($input['student_session']) : '');
$date     = isset($input['date']) ? trim($input['date']) : '';
$fromDate = isset($input['from_date']) ? trim($input['from_date']) : (isset($input['date_from']) ? trim($input['date_from']) : '');
$toDate   = isset($input['to_date']) ? trim($input['to_date']) : (isset($input['date_to']) ? trim($input['date_to']) : '');

$errors = [];
if (empty($classes)) $errors[] = 'class or classes is required';
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

$escaped_classes = array_map(function($c) use ($con) {
    return "'" . mysqli_real_escape_string($con, $c) . "'";
}, $classes);
$class_sql_in = implode(',', $escaped_classes);

$exam_esc    = mysqli_real_escape_string($con, $exam);
$subject_esc = mysqli_real_escape_string($con, $subject);
$session_esc = mysqli_real_escape_string($con, $session);

// Fetch all active students in class(es) and session
$studQuery = "
    SELECT s.student_id, s.student_name, s.student_fname, s.student_scholar, s.student_rollno, s.student_class, s.student_section, s.student_contactno, r.rno AS roll_no_tbl
    FROM `student` s
    LEFT JOIN `roll_no` r ON (r.sid = s.student_id AND r.class = s.student_class AND r.ses = '$session_esc')
    WHERE s.student_class IN ($class_sql_in)
      AND s.student_session = '$session_esc'
      AND s.status = '0'
    ORDER BY s.student_class ASC, s.student_name ASC
";
$studRes = mysqli_query($con, $studQuery);

if (!$studRes) {
    http_response_code(500);
    echo json_encode(['status' => false, 'message' => 'Database error: ' . mysqli_error($con)]);
    exit;
}

// Date condition for copy records if provided
$dateWhere = "";
if ($date !== '') {
    $date_esc = mysqli_real_escape_string($con, $date);
    $dateWhere .= " AND ecc.date = '$date_esc'";
}
if ($fromDate !== '') {
    $from_esc = mysqli_real_escape_string($con, $fromDate);
    $dateWhere .= " AND STR_TO_DATE(ecc.date, '%d-%m-%Y') >= STR_TO_DATE('$from_esc', '%d-%m-%Y')";
}
if ($toDate !== '') {
    $to_esc = mysqli_real_escape_string($con, $toDate);
    $dateWhere .= " AND STR_TO_DATE(ecc.date, '%d-%m-%Y') <= STR_TO_DATE('$to_esc', '%d-%m-%Y')";
}

// Fetch all absent collection records for this exam, subject, class(es), session in one batch
$copyQuery = "
    SELECT ecc.student, ecc.absent, ecc.rmk, ecc.date, ecc.class
    FROM `exam_copy_collection` ecc
    WHERE ecc.class IN ($class_sql_in)
      AND ecc.exam = '$exam_esc'
      AND ecc.subject = '$subject_esc'
      AND ecc.session = '$session_esc'
      $dateWhere
";
$copyRes = mysqli_query($con, $copyQuery);
$absentMap = [];
if ($copyRes) {
    while ($crow = mysqli_fetch_assoc($copyRes)) {
        $key = (string)$crow['student'];
        $absentMap[$key] = [
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
        $recordDate = $absentMap[$sId]['date'];
    } else {
        $totalCollected++;
        $statusStr = 'Present';
        $remark = '';
        $recordDate = date('d-m-Y');
    }

    $dispRoll = !empty($s['student_rollno']) ? $s['student_rollno'] : (!empty($s['roll_no_tbl']) ? $s['roll_no_tbl'] : '');

    $studentsList[] = [
        'sr_no'        => $sr++,
        'student_id'   => $s['student_id'],
        'student_name' => ucwords(strtolower($s['student_name'] ?? '')),
        'father_name'  => ucwords(strtolower($s['student_fname'] ?? '')),
        'scholar_no'   => $s['student_scholar'] ?? '',
        'roll_no'      => $dispRoll,
        'class'        => $s['student_class'],
        'section'      => $s['student_section'] ?? '',
        'status'       => $statusStr,
        'is_collected' => ($statusStr === 'Present'),
        'remark'       => $remark,
        'date'         => $recordDate
    ];
}

$collectionRate = $totalStudents > 0 ? round(($totalCollected / $totalStudents) * 100, 2) : 0;

http_response_code(200);
echo json_encode([
    'status' => true,
    'data'   => [
        'exam_info' => [
            'class'        => count($classes) === 1 ? $classes[0] : implode(', ', $classes),
            'classes'      => $classes,
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
