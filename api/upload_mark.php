<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$jsonInput = json_decode($rawInput, true);
if (is_array($jsonInput) && !empty($jsonInput)) {
    $data = array_merge($jsonInput, $_POST);
} else {
    $data = $_POST;
}

if (!$data) {
    echo json_encode(['status' => false, 'message' => 'Invalid or empty input']);
    exit;
}

// Function to process a single student marks upload
function processStudentMarks($con, $studentData, $defaultMeta) {
    $student_id   = $studentData['student_id'] ?? '';
    $student_name = $studentData['student_name'] ?? '';
    $mob          = $studentData['mob'] ?? '';
    $marks        = $studentData['marks'] ?? [];
    $present      = $studentData['present_days'] ?? '';
    $day          = $studentData['total_days'] ?? '';
    $remark       = $studentData['remark'] ?? '';

    $school  = $studentData['uname'] ?? ($defaultMeta['school'] ?? 'scottish');
    $faculty = $studentData['faculty'] ?? ($defaultMeta['faculty'] ?? '');
    $month   = $studentData['month'] ?? ($defaultMeta['month'] ?? '');
    $session = $studentData['session'] ?? ($defaultMeta['session'] ?? '');
    $exam    = $studentData['exam'] ?? ($defaultMeta['exam'] ?? '');
    $term    = $studentData['term'] ?? ($defaultMeta['term'] ?? '');
    $class   = $studentData['class'] ?? ($defaultMeta['class'] ?? '');

    if (empty($student_id) || empty($session) || empty($exam) || empty($class)) {
        return ['status' => false, 'message' => "student_id, session, exam, and class are required for student: $student_id"];
    }

    if (is_string($marks)) {
        $clean = preg_replace('/,\s*]/', ']', trim($marks));
        $decoded = json_decode($clean, true);
        if (json_last_error() === JSON_ERROR_NONE) $marks = $decoded;
    }

    if (!is_array($marks)) {
        return ['status' => false, 'message' => "Invalid marks format for student: $student_id"];
    }

    $total_obtained = 0;
    $total_max = 0;
    $sub_summary = [];
    $subject_index = 0;

    foreach ($marks as $mark) {
        $subject = mysqli_real_escape_string($con, $mark['subject'] ?? '');
        $total   = floatval($mark['total_marks'] ?? 0);
        $rawObtained = $mark['obtain_marks'] ?? 0;

        if (strcasecmp((string)$rawObtained, 'ab') === 0 || strcasecmp((string)$rawObtained, 'a') === 0) {
            $obtained = mysqli_real_escape_string($con, (string)$rawObtained);
            $status = 'fail';
            $obtained_for_total = 0;
        } else {
            $obtained = mysqli_real_escape_string($con, (string)$rawObtained);
            $numeric = floatval($rawObtained);
            $obtained_for_total = $numeric;
            $status = ($numeric < ($total * 0.33)) ? 'fail' : 'pass';
        }

        $student_esc = mysqli_real_escape_string($con, $student_id);
        $session_esc = mysqli_real_escape_string($con, $session);
        $exam_esc    = mysqli_real_escape_string($con, $exam);
        $class_esc   = mysqli_real_escape_string($con, $class);
        $term_esc    = mysqli_real_escape_string($con, $term);
        $faculty_esc = mysqli_real_escape_string($con, $faculty);
        $month_esc   = mysqli_real_escape_string($con, $month);
        $school_esc  = mysqli_real_escape_string($con, $school);
        $day_esc     = mysqli_real_escape_string($con, $day);
        $present_esc = mysqli_real_escape_string($con, $present);
        $remark_esc  = mysqli_real_escape_string($con, $remark);

        $checkQuery = "SELECT id FROM marks WHERE student='$student_esc' AND subject='$subject' AND ses='$session_esc' AND exam='$exam_esc'";
        $checkRes = mysqli_query($con, $checkQuery);

        if ($checkRes && mysqli_num_rows($checkRes) > 0) {
            $updateQuery = "UPDATE marks SET 
                obtainmarks='$obtained', 
                Day='$day_esc', 
                Present='$present_esc', 
                remark='$remark_esc', 
                status='$status', 
                month='$month_esc'
                WHERE student='$student_esc' AND subject='$subject' AND exam='$exam_esc' AND ses='$session_esc'";
            mysqli_query($con, $updateQuery);
        } else {
            $insertQuery = "INSERT INTO marks (student, subject, totalmarks, obtainmarks, upload_by, month, ses, school, Day, Present, remark, class, exam, subject_suffix, status, term)
                VALUES ('$student_esc', '$subject', '$total', '$obtained', '$faculty_esc', '$month_esc', '$session_esc', '$school_esc', '$day_esc', '$present_esc', '$remark_esc', '$class_esc', '$exam_esc', '$subject_index', '$status', '$term_esc')";
            mysqli_query($con, $insertQuery);
        }

        $total_obtained += $obtained_for_total;
        $total_max += $total;
        $sub_summary[] = "$subject=$obtained";
        $subject_index++;
    }

    $percentage = ($total_max > 0) ? ($total_obtained * 100 / $total_max) : 0;
    if ($percentage >= 80) $division = 'honr';
    elseif ($percentage >= 60) $division = '1st';
    elseif ($percentage >= 45) $division = '2nd';
    elseif ($percentage >= 33) $division = '3rd';
    else $division = 'fail';

    $updateOverall = "UPDATE marks SET 
        term='$term_esc', 
        obtainper='$percentage', 
        total='$total_obtained', 
        division='$division' 
        WHERE student='$student_esc' AND exam='$exam_esc' AND ses='$session_esc'";
    mysqli_query($con, $updateOverall);

    return [
        'status'         => true,
        'student_id'     => $student_id,
        'student_name'   => $student_name,
        'total_obtained' => $total_obtained,
        'total_max'      => $total_max,
        'percentage'     => round($percentage, 2),
        'division'       => $division,
        'summary'        => implode(", ", $sub_summary)
    ];
}

// Check if batch upload
if (isset($data['students']) && is_array($data['students'])) {
    $defaultMeta = [
        'school'  => $data['uname'] ?? 'scottish',
        'faculty' => $data['faculty'] ?? '',
        'month'   => $data['month'] ?? '',
        'session' => $data['session'] ?? '',
        'exam'    => $data['exam'] ?? '',
        'term'    => $data['term'] ?? '',
        'class'   => $data['class'] ?? ''
    ];

    $results = [];
    $successCount = 0;
    foreach ($data['students'] as $stData) {
        $res = processStudentMarks($con, $stData, $defaultMeta);
        $results[] = $res;
        if (!empty($res['status'])) $successCount++;
    }

    echo json_encode([
        'status'         => true,
        'message'        => "Batch marks processed ($successCount of " . count($data['students']) . " successful)",
        'processed'      => count($data['students']),
        'success_count'  => $successCount,
        'data'           => $results
    ]);
    exit;
}

// Single student upload validation
$requiredFields = [
    'session', 'exam', 'term', 'class', 'student_name',
    'student_id', 'marks', 'remark'
];

foreach ($requiredFields as $field) {
    if (!isset($data[$field])) {
        echo json_encode(['status' => false, 'message' => "$field is required"]);
        exit;
    }
}

// Assigning POST data
$student_id = $data['student_id'];
$student_name = $data['student_name'] ?? '';
$mob = $data['mob'] ?? '';
$marks = $data['marks'];
$present = $data['present_days'] ?? '';
$day = $data['total_days'] ?? '';
$remark = $data['remark'] ?? '';

$school = $data['uname'] ?? 'scottish';
$faculty = $data['faculty'] ?? '';
$month = $data['month'] ?? '';
$session = $data['session'];
$exam = $data['exam'];
$term = $data['term'];
$class = $data['class'];

$total_obtained = 0;
$total_max = 0;
$sub_summary = [];
$subject_index = 0;
// Decode JSON string if it's not already an array
if (is_string($marks)) {
    // Clean up bad formatting (like trailing commas, extra spaces)
    $marks = preg_replace('/,\s*]/', ']', $marks);
    $marks = trim($marks);

    $decoded = json_decode($marks, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        $marks = $decoded;
    }
}

if (!is_array($marks)) {
    echo json_encode([
        'status' => false,
        'message' => 'Invalid marks format',
        'debug' => $data['marks'],
        'json_error' => json_last_error_msg()
    ]);
    exit;
}

foreach ($marks as $mark) {
	
    $subject = $mark['subject'];
    $total =$mark['total_marks'];
  
	$rawObtained = $mark['obtain_marks'];   // original value — save this

// check absent (case-insensitive)
if (strcasecmp($rawObtained, 'ab') === 0 || strcasecmp($rawObtained, 'a') === 0) {

    $obtained = $rawObtained;      // save EXACT value from request
    $status = 'fail';
    $obtained_for_total = 0;       // percentage calc ke liye

} else {

    $obtained = $rawObtained;      // save EXACT request value
    $numeric = $rawObtained;
    $obtained_for_total = $numeric;

    $status = ($numeric < ($total * 0.33)) ? 'fail' : 'pass';
}


   

    // Check existing mark
    $checkQuery = "SELECT * FROM marks WHERE student='$student_id' AND subject='$subject' AND ses='$session' AND exam='$exam'";
    $checkRes = mysqli_query($con, $checkQuery);

    if (mysqli_fetch_assoc($checkRes)) {
        // Update
        $updateQuery = "UPDATE marks SET 
            obtainmarks='$obtained', 
            Day='$day', 
            Present='$present', 
            remark='$remark', 
            status='$status', 
            month='$month'
            WHERE student='$student_id' AND subject='$subject' AND exam='$exam' AND ses='$session'";
        mysqli_query($con, $updateQuery);
    } else {
        // Insert
        $insertQuery = "INSERT INTO marks (student, subject, totalmarks, obtainmarks, upload_by, month, ses, school, Day, Present, remark, class, exam, subject_suffix, status, term)
            VALUES ('$student_id', '$subject', '$total', '$obtained', '$faculty', '$month', '$session', '$school', '$day', '$present', '$remark', '$class', '$exam', '$subject_index', '$status', '$term')";
        mysqli_query($con, $insertQuery);
    }

    $total_obtained += $obtained_for_total;
    $total_max += $total;
    $sub_summary[] = "$subject=$obtained";
    $subject_index++;
}

// Calculate percentage
$percentage = ($total_max > 0) ? ($total_obtained * 100 / $total_max) : 0;

// Division
if ($percentage >= 80) $division = 'honr';
elseif ($percentage >= 60) $division = '1st';
elseif ($percentage >= 45) $division = '2nd';
elseif ($percentage >= 33) $division = '3rd';
else $division = 'fail';

// Update division info
$updateOverall = "UPDATE marks SET 
    term='$term', 
    obtainper='$percentage', 
    total='$total_obtained', 
    division='$division' 
    WHERE student='$student_id' AND exam='$exam' AND ses='$session'";
mysqli_query($con, $updateOverall);

// Message
$msg = "Your child $student_name's $exam result is " . implode(", ", $sub_summary) . 
       ". Total: $total_obtained/$total_max, Present: $present days. Remark: $remark.";

// Return success
echo json_encode([
    'status' => true,
    'message' => 'Marks uploaded successfully.',
    'data' => [
        'student_id' => $student_id,
        'student_name' => $student_name,
        'total_obtained' => $total_obtained,
        'total_max' => $total_max,
        'percentage' => round($percentage, 2),
        'division' => $division,
        'summary' => implode(", ", $sub_summary),
        'message' => $msg
    ]
]);
