<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

// ✅ Inputs
$student_id = isset($_GET['student_id']) ? mysqli_real_escape_string($con, trim($_GET['student_id'])) : null;
$session    = isset($_GET['session']) ? mysqli_real_escape_string($con, trim($_GET['session'])) : null;
$startDate  = isset($_GET['start_date']) ? trim($_GET['start_date']) : null;
$endDate    = isset($_GET['end_date']) ? trim($_GET['end_date']) : null;

$dateFormat = 'd-m-Y';

// ✅ Required check
if (!$session || !$student_id) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'session and student_id are required']);
    exit;
}

// ✅ Default date range → current month 1st to today
if (!$startDate || !$endDate) {
    $startObj = new DateTime('first day of this month');
    $endObj   = new DateTime(); // today
} else {
    $startObj = DateTime::createFromFormat($dateFormat, $startDate);
    $endObj   = DateTime::createFromFormat($dateFormat, $endDate);

    if (!$startObj || !$endObj) {
        echo json_encode(['status' => false, 'message' => 'Invalid date format. Use d-m-Y']);
        exit;
    }
}

// ✅ Get absent dates for student
$start = $startObj->format($dateFormat);
$end   = $endObj->format($dateFormat);

$absentDates = [];
$qry = "
    SELECT ad.date 
    FROM absentdetail ad
    WHERE ad.session = '$session' 
      AND ad.student = '$student_id'
      AND STR_TO_DATE(ad.date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y')
";
$res = mysqli_query($con, $qry);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        $absentDates[] = $row['date']; // stored in d-m-Y format
    }
}

// ✅ Generate full attendance
$attendance = [];
$period = new DatePeriod($startObj, new DateInterval('P1D'), $endObj->modify('+1 day'));

foreach ($period as $date) {
    $formatted = $date->format($dateFormat);
    $dayName = $date->format('l'); // Sunday, Monday, etc.

    if ($dayName === 'Sunday') {
        $status = 'Holiday';
    } elseif (in_array($formatted, $absentDates)) {
        $status = 'Absent';
    } else {
        $status = 'Present';
    }

    $attendance[] = [
        'date' => $formatted,
        'day' => $dayName,
        'status' => $status
    ];
	
	
}
$presentCount = 0;
$absentCount = 0;
$leaveCount = 0;

foreach ($attendance as $a) {
    if ($a['status'] === 'Present') $presentCount++;
    if ($a['status'] === 'Absent') $absentCount++;
    if ($a['status'] === 'Holiday') $leaveCount++;
}
// ✅ Response
echo json_encode([
    'status' => true,
    'message' => 'Student attendance fetched successfully',
    'student_id' => $student_id,
    'session' => $session,
    'start_date' => $startObj->format($dateFormat),
    'end_date' => $endObj->format($dateFormat),
    'count' => count($attendance),
	'summary' => [
    'present' => $presentCount,
    'absent' => $absentCount,
    'holiday' => $leaveCount
],
    'data' => $attendance
]);
