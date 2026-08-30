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

$data = $_POST;

if (!$data) {
    echo json_encode(['status' => false, 'message' => 'Invalid JSON']);
    exit;
}

// Required POST fields including former $_SESSION values
$requiredFields = [
    'session', 'exam', 'term', 'class', 'student_name',
    'student_id', 'marks',  'remark'
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
