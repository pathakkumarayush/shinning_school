<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Validate input
if (!isset($_GET['session'])) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

$session = mysqli_real_escape_string($con, $_GET['session']);
date_default_timezone_set('Asia/Kolkata');

$todayYmd = date("Y-m-d");
$todaydmY = date("d-m-Y");
$todaydm  = date("d-m");

$response = [
    'status' => true,
    'message' => 'Dashboard data fetched successfully',
    'data' => []
];

// 1. Student Birthdays
$studentBirthdays = [];
$res = mysqli_query($con, "SELECT student_id, student_name, student_fname, student_dob, student_contactno, student_class FROM student WHERE student_session='$session' AND status=0 ORDER BY student_name ASC");
while ($row = mysqli_fetch_assoc($res)) {
    if (!empty($row['student_dob']) && date("d-m", strtotime($row['student_dob'])) == $todaydm) {
        $studentBirthdays[] = [
            'sr_no'   => $row['student_id'],
            'name'    => $row['student_name'],
            'father'  => $row['student_fname'],
            'dob'     => date("d-M-Y", strtotime($row['student_dob'])),
            'contact' => $row['student_contactno'],
            'class'   => $row['student_class']
        ];
    }
}
$response['data']['student_birthday'] = [
    'count' => count($studentBirthdays),
    'list' => $studentBirthdays
];

// 2. Teacher Birthdays
$teacherBirthdays = [];
$res = mysqli_query($con, "SELECT id, teacher_name, father_name, teacher_dob, contact FROM teacher WHERE teacher_session='$session'");
while ($row = mysqli_fetch_assoc($res)) {
    if (!empty($row['teacher_dob']) && date("d-m", strtotime($row['teacher_dob'])) == $todaydm) {
        $teacherBirthdays[] = [
            'sr_no'   => $row['id'],
            'name'    => $row['teacher_name'],
            'father'  => $row['father_name'] ?? '',
            'dob'     => date("d-M-Y", strtotime($row['teacher_dob'])),
            'contact' => $row['contact'],
            'class'   => 'Staff'
        ];
    }
}
$response['data']['teacher_birthday'] = [
    'count' => count($teacherBirthdays),
    'list' => $teacherBirthdays
];

// 3. Today Collections
$tutionFee = 0;
$res = mysqli_query($con, "SELECT SUM(fee_deposit) as total FROM fee_detail WHERE session='$session' AND status='1' AND date='$todayYmd'");
if ($row = mysqli_fetch_assoc($res)) $tutionFee = (float)$row['total'];

$busFee = 0;
$res = mysqli_query($con, "SELECT SUM(fee_deposit) as total FROM fee_detail_trans WHERE session='$session' AND status='1' AND date='$todayYmd'");
if ($row = mysqli_fetch_assoc($res)) $busFee = (float)$row['total'];

$otherFee = 0;
$res = mysqli_query($con, "SELECT SUM(fee_deposit) as total FROM fee_detail_preivios WHERE session='$session' AND date='$todayYmd'");
if ($row = mysqli_fetch_assoc($res)) $otherFee = (float)$row['total'];

$response['data']['today_collection'] = [
    'tution_fee' => $tutionFee,
    'bus_fee'    => $busFee,
    'other_fee'  => $otherFee,
    'total_collection' => $tutionFee + $busFee + $otherFee
];

// 4. Today Expenses
$todayExpenses = 0;
$res = mysqli_query($con, "SELECT SUM(amt) as total FROM expenses WHERE date='$todayYmd'");
if ($row = mysqli_fetch_assoc($res)) $todayExpenses = (float)$row['total'];
$response['data']['today_expense'] = $todayExpenses;

// 5. Today Enquiry
$todayEnquiry = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM enquiry WHERE date='$todaydmY'");
if ($row = mysqli_fetch_assoc($res)) $todayEnquiry = (int)$row['total'];
$response['data']['today_enquiry'] = $todayEnquiry;

// 6. Today Registration
$todayRegistration = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM reg WHERE date='$todaydmY'");
if ($row = mysqli_fetch_assoc($res)) $todayRegistration = (int)$row['total'];
$response['data']['today_registration'] = $todayRegistration;

// 7. Today Admission (student table with today's date)
$todayAdmission = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM student WHERE date='$todaydmY'");
if ($row = mysqli_fetch_assoc($res)) $todayAdmission = (int)$row['total'];
$response['data']['today_admission'] = $todayAdmission;

// 8. Today Appointment
$todayAppointment = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM appoiment WHERE date='$todaydmY'");
if ($row = mysqli_fetch_assoc($res)) $todayAppointment = (int)$row['total'];
$response['data']['today_appointment'] = $todayAppointment;

// 9. Today Visitors
$todayVisitors = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM enquiry_pass WHERE dob='$todayYmd'");
if ($row = mysqli_fetch_assoc($res)) $todayVisitors = (int)$row['total'];
$response['data']['today_visitor'] = $todayVisitors;

// 10. Total Students (active for the session)
$totalStudents = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM student WHERE student_session='$session' AND status=0");
if ($row = mysqli_fetch_assoc($res)) $totalStudents = (int)$row['total'];
$response['data']['total_student'] = $totalStudents;

// 11. Today Absent
$todayAbsent = 0;
$res = mysqli_query($con, "SELECT COUNT(*) as total FROM absentdetail WHERE date='$todaydmY'");
if ($row = mysqli_fetch_assoc($res)) $todayAbsent = (int)$row['total'];
$response['data']['total_absent'] = $todayAbsent;

// 12. Total Present
$response['data']['total_present'] = $totalStudents - $todayAbsent;

echo json_encode($response);
?>
