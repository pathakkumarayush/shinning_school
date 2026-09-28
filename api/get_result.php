<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

// Allow only GET method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Read query parameters
$session        = isset($_GET['session']) ? trim($_GET['session']) : '';
$examParam      = isset($_GET['exam']) ? trim($_GET['exam']) : (isset($_GET['examination_id']) ? trim($_GET['examination_id']) : (isset($_GET['examination']) ? trim($_GET['examination']) : ''));
$student_id     = isset($_GET['student_id']) ? trim($_GET['student_id']) : (isset($_GET['student']) ? trim($_GET['student']) : '');
$classParam     = isset($_GET['class']) ? trim($_GET['class']) : (isset($_GET['student_class']) ? trim($_GET['student_class']) : '');
$subjectParam   = isset($_GET['subject']) ? trim($_GET['subject']) : (isset($_GET['subject_id']) ? trim($_GET['subject_id']) : '');

if ($session === '') {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Session parameter is required']);
    exit;
}

if ($examParam === '') {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Exam or examination_id parameter is required']);
    exit;
}

$session_esc = mysqli_real_escape_string($con, $session);

// Resolve Exam Name if numeric examination_id passed
$exam_name = $examParam;
if (is_numeric($examParam)) {
    $exQuery = mysqli_query($con, "SELECT examination_name FROM examination WHERE examination_id = " . (int)$examParam . " LIMIT 1");
    if ($exQuery && mysqli_num_rows($exQuery) > 0) {
        $exRow = mysqli_fetch_assoc($exQuery);
        $exam_name = $exRow['examination_name'];
    }
}
$exam_esc = mysqli_real_escape_string($con, $exam_name);

// Resolve Class Name if numeric class_id passed
$class_name = $classParam;
if ($classParam !== '' && is_numeric($classParam)) {
    $clQuery = mysqli_query($con, "SELECT class FROM class WHERE class_id = " . (int)$classParam . " LIMIT 1");
    if ($clQuery && mysqli_num_rows($clQuery) > 0) {
        $clRow = mysqli_fetch_assoc($clQuery);
        $class_name = $clRow['class'];
    }
}
$class_esc = mysqli_real_escape_string($con, $class_name);

// Resolve Subject Name if numeric subject_id passed
$subject_name = $subjectParam;
if ($subjectParam !== '' && is_numeric($subjectParam)) {
    $subQuery = mysqli_query($con, "SELECT subject FROM subject WHERE subject_id = " . (int)$subjectParam . " LIMIT 1");
    if ($subQuery && mysqli_num_rows($subQuery) > 0) {
        $subRow = mysqli_fetch_assoc($subQuery);
        $subject_name = $subRow['subject'];
    }
}
$subject_esc = mysqli_real_escape_string($con, $subject_name);

// Helper function to calculate Grade from Percentage
function calculateSubjectGrade($percentage) {
    if ($percentage >= 90) return 'A+';
    if ($percentage >= 80) return 'A';
    if ($percentage >= 70) return 'B+';
    if ($percentage >= 60) return 'B';
    if ($percentage >= 50) return 'C+';
    if ($percentage >= 40) return 'C';
    if ($percentage >= 33) return 'D';
    return 'E (Fail)';
}

// 1. Single Student Mode
if ($student_id !== '') {
    $student_id_esc = mysqli_real_escape_string($con, $student_id);

    // Fetch Student Info
    $stQuery = mysqli_query($con, "SELECT * FROM student WHERE (student_id = '$student_id_esc' OR uid = '$student_id_esc' OR id = '$student_id_esc') AND student_session = '$session_esc' LIMIT 1");
    if (!$stQuery || mysqli_num_rows($stQuery) === 0) {
        http_response_code(404);
        echo json_encode(['status' => false, 'message' => 'Student not found in the given session']);
        exit;
    }
    $student = mysqli_fetch_assoc($stQuery);
    $stClass = $student['student_class'];
    $stIdCanonical = $student['student_id'];
    $stUid = $student['uid'];

    // Query Max Marks config from `exam` table for this class & exam
    $examConfig = [];
    $confQuery = mysqli_query($con, "SELECT * FROM exam WHERE class = '" . mysqli_real_escape_string($con, $stClass) . "' AND examination = '$exam_esc' AND session = '$session_esc'");
    if ($confQuery) {
        while ($cRow = mysqli_fetch_assoc($confQuery)) {
            $examConfig[trim($cRow['subject'])] = [
                'max_marks' => floatval($cRow['marks']),
                'min_marks' => !empty($cRow['min_marks']) ? floatval($cRow['min_marks']) : (floatval($cRow['marks']) * 0.33)
            ];
        }
    }

    // Build Marks Query
    $markSql = "SELECT * FROM marks WHERE (student = '$stIdCanonical' OR student = '$stUid') AND ses = '$session_esc' AND exam = '$exam_esc'";
    if ($subject_esc !== '') {
        $markSql .= " AND subject = '$subject_esc'";
    }
    $markSql .= " ORDER BY id ASC";

    $markRes = mysqli_query($con, $markSql);
    $subjects = [];
    $totalMax = 0;
    $totalObtained = 0;
    $hasFail = false;
    $examTerm = '';
    $totalDays = '';
    $presentDays = '';
    $overallRemark = '';
    $division = '';

    while ($mRow = mysqli_fetch_assoc($markRes)) {
        $subTitle = trim($mRow['subject']);
        $rawObtain = $mRow['obtainmarks'];
        $dbMax = floatval($mRow['totalmarks']);
        $cfgMax = isset($examConfig[$subTitle]) ? $examConfig[$subTitle]['max_marks'] : $dbMax;
        $cfgMin = isset($examConfig[$subTitle]) ? $examConfig[$subTitle]['min_marks'] : round($cfgMax * 0.33, 2);

        $maxVal = $cfgMax > 0 ? $cfgMax : ($dbMax > 0 ? $dbMax : 100);
        $minVal = $cfgMin > 0 ? $cfgMin : round($maxVal * 0.33, 2);

        $isAbsent = (strcasecmp((string)$rawObtain, 'ab') === 0 || strcasecmp((string)$rawObtain, 'a') === 0);
        $numObtained = $isAbsent ? 0 : floatval($rawObtain);
        $subPercentage = $maxVal > 0 ? round(($numObtained / $maxVal) * 100, 2) : 0;
        $subStatus = ($isAbsent || $numObtained < $minVal) ? 'fail' : 'pass';
        if ($subStatus === 'fail') $hasFail = true;

        $subjects[] = [
            'subject_name'    => $subTitle,
            'max_marks'       => $maxVal,
            'min_marks'       => $minVal,
            'obtained_marks'  => $rawObtain,
            'percentage'      => $subPercentage,
            'grade'           => calculateSubjectGrade($subPercentage),
            'status'          => $subStatus,
            'remark'          => $mRow['remark'] ?? ''
        ];

        $totalMax += $maxVal;
        $totalObtained += $numObtained;

        if (empty($examTerm) && !empty($mRow['term'])) $examTerm = $mRow['term'];
        if (empty($totalDays) && !empty($mRow['Day'])) $totalDays = $mRow['Day'];
        if (empty($presentDays) && !empty($mRow['Present'])) $presentDays = $mRow['Present'];
        if (empty($overallRemark) && !empty($mRow['final_remark'])) $overallRemark = $mRow['final_remark'];
        if (empty($division) && !empty($mRow['division'])) $division = $mRow['division'];
    }

    $overallPercentage = $totalMax > 0 ? round(($totalObtained / $totalMax) * 100, 2) : 0;
    if (empty($division)) {
        if ($overallPercentage >= 80) $division = 'Honors';
        elseif ($overallPercentage >= 60) $division = '1st Division';
        elseif ($overallPercentage >= 45) $division = '2nd Division';
        elseif ($overallPercentage >= 33) $division = '3rd Division';
        else $division = 'Fail';
    }

    $resultStatus = ($hasFail || $overallPercentage < 33) ? 'fail' : 'pass';

    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => 'Result fetched successfully',
        'data'    => [
            'session'  => $session,
            'exam'     => $exam_name,
            'term'     => $examTerm,
            'student'  => [
                'student_id'   => $student['student_id'],
                'scholar_no'   => $student['student_scholar'] ?? '',
                'roll_no'      => $student['student_rollno'] ?? '',
                'name'         => $student['student_name'] ?? '',
                'father_name'  => $student['student_fname'] ?? '',
                'mother_name'  => $student['m_name'] ?? '',
                'class'        => $student['student_class'] ?? '',
                'section'      => $student['student_section'] ?? '',
                'student_img'  => !empty($student['student_img']) ? 'school/upload/' . basename($student['student_img']) : ''
            ],
            'class' => [
                'name' => $stClass
            ],
            'subjects' => $subjects,
            'summary'  => [
                'total_max_marks'      => $totalMax,
                'total_obtained_marks' => $totalObtained,
                'percentage'           => $overallPercentage,
                'division'             => $division,
                'result_status'        => $resultStatus,
                'attendance'           => [
                    'total_days'   => $totalDays,
                    'present_days' => $presentDays
                ],
                'remark' => $overallRemark
            ]
        ]
    ]);
    exit;
}

// 2. Class-Wide Mode
if ($class_name === '') {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Either student_id or class is required']);
    exit;
}

// Query all students in this class
$classStQuery = mysqli_query($con, "SELECT * FROM student WHERE student_class = '$class_esc' AND student_session = '$session_esc' AND status = 0 ORDER BY student_name ASC");
if (!$classStQuery || mysqli_num_rows($classStQuery) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => "No active students found in Class '$class_name' for session '$session'"]);
    exit;
}

// Query Exam Config for Class
$examConfig = [];
$confQuery = mysqli_query($con, "SELECT * FROM exam WHERE class = '$class_esc' AND examination = '$exam_esc' AND session = '$session_esc'");
if ($confQuery) {
    while ($cRow = mysqli_fetch_assoc($confQuery)) {
        $examConfig[trim($cRow['subject'])] = [
            'max_marks' => floatval($cRow['marks']),
            'min_marks' => !empty($cRow['min_marks']) ? floatval($cRow['min_marks']) : (floatval($cRow['marks']) * 0.33)
        ];
    }
}

// Pre-fetch all marks for this class & exam in a single query
$bulkMarkSql = "SELECT * FROM marks WHERE ses = '$session_esc' AND exam = '$exam_esc'";
if ($subject_esc !== '') {
    $bulkMarkSql .= " AND subject = '$subject_esc'";
}
$bulkRes = mysqli_query($con, $bulkMarkSql);
$marksByStudent = [];

if ($bulkRes) {
    while ($bm = mysqli_fetch_assoc($bulkRes)) {
        $stKey = trim($bm['student']);
        $marksByStudent[$stKey][] = $bm;
    }
}

$studentsResults = [];

while ($st = mysqli_fetch_assoc($classStQuery)) {
    $stIdCanonical = (string)$st['student_id'];
    $stUid = (string)$st['uid'];

    $stMarks = $marksByStudent[$stIdCanonical] ?? ($marksByStudent[$stUid] ?? []);
    $subjects = [];
    $totalMax = 0;
    $totalObtained = 0;
    $hasFail = false;
    $division = '';

    foreach ($stMarks as $mRow) {
        $subTitle = trim($mRow['subject']);
        $rawObtain = $mRow['obtainmarks'];
        $dbMax = floatval($mRow['totalmarks']);
        $cfgMax = isset($examConfig[$subTitle]) ? $examConfig[$subTitle]['max_marks'] : $dbMax;
        $cfgMin = isset($examConfig[$subTitle]) ? $examConfig[$subTitle]['min_marks'] : round($cfgMax * 0.33, 2);

        $maxVal = $cfgMax > 0 ? $cfgMax : ($dbMax > 0 ? $dbMax : 100);
        $minVal = $cfgMin > 0 ? $cfgMin : round($maxVal * 0.33, 2);

        $isAbsent = (strcasecmp((string)$rawObtain, 'ab') === 0 || strcasecmp((string)$rawObtain, 'a') === 0);
        $numObtained = $isAbsent ? 0 : floatval($rawObtain);
        $subPercentage = $maxVal > 0 ? round(($numObtained / $maxVal) * 100, 2) : 0;
        $subStatus = ($isAbsent || $numObtained < $minVal) ? 'fail' : 'pass';
        if ($subStatus === 'fail') $hasFail = true;

        $subjects[] = [
            'subject_name'    => $subTitle,
            'max_marks'       => $maxVal,
            'min_marks'       => $minVal,
            'obtained_marks'  => $rawObtain,
            'percentage'      => $subPercentage,
            'grade'           => calculateSubjectGrade($subPercentage),
            'status'          => $subStatus
        ];

        $totalMax += $maxVal;
        $totalObtained += $numObtained;
        if (empty($division) && !empty($mRow['division'])) $division = $mRow['division'];
    }

    $overallPercentage = $totalMax > 0 ? round(($totalObtained / $totalMax) * 100, 2) : 0;
    if (empty($division)) {
        if ($overallPercentage >= 80) $division = 'Honors';
        elseif ($overallPercentage >= 60) $division = '1st Division';
        elseif ($overallPercentage >= 45) $division = '2nd Division';
        elseif ($overallPercentage >= 33) $division = '3rd Division';
        else $division = 'Fail';
    }
    $resultStatus = ($hasFail || $overallPercentage < 33) ? 'fail' : 'pass';

    $studentsResults[] = [
        'student' => [
            'student_id'  => $st['student_id'],
            'scholar_no'  => $st['student_scholar'] ?? '',
            'roll_no'     => $st['student_rollno'] ?? '',
            'name'        => $st['student_name'] ?? '',
            'father_name' => $st['student_fname'] ?? '',
            'section'     => $st['student_section'] ?? ''
        ],
        'subjects' => $subjects,
        'summary'  => [
            'total_max_marks'      => $totalMax,
            'total_obtained_marks' => $totalObtained,
            'percentage'           => $overallPercentage,
            'division'             => $division,
            'result_status'        => $resultStatus
        ]
    ];
}

http_response_code(200);
echo json_encode([
    'status'  => true,
    'message' => 'Class results fetched successfully',
    'data'    => [
        'session' => $session,
        'exam'    => $exam_name,
        'class'   => [
            'name'  => $class_name,
            'total_students' => count($studentsResults)
        ],
        'results' => $studentsResults
    ]
]);
