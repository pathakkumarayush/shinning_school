<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Input
$session    = isset($_GET['session']) ? trim($_GET['session']) : '';
$student_id = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';
$months     = isset($_GET['months']) ? $_GET['months'] : ''; // e.g. "April,July,August"

if ($session === '' || $student_id === '' || $months === '') {
    http_response_code(400);
    $response['message'] = 'Session, student_id and months are required.';
    echo json_encode($response);
    exit;
}

// Convert months to array
if (is_string($months)) {
    $months = explode(',', $months);
}
$months = array_map('trim', $months);
$months = array_filter($months);

$session_esc    = mysqli_real_escape_string($con, $session);
$student_id_esc = mysqli_real_escape_string($con, $student_id);

// ✅ Fetch student info
$student_q = mysqli_query($con, "SELECT * FROM student 
                                 WHERE student_id='$student_id_esc' 
                                 AND student_session='$session_esc'");
$student = mysqli_fetch_assoc($student_q);

if (!$student) {
    $response['message'] = 'Student not found.';
    echo json_encode($response);
    exit;
}

$total_amount = 0;
$total_instalment_fee = 0;
$month_details = [];

// ✅ Loop through months and calculate instalment fees
foreach ($months as $m) {
    $m_esc = mysqli_real_escape_string($con, $m);

    // Fetch instalment details for class/month
    $inst_q = mysqli_query($con, "SELECT * FROM instdetail 
                                  WHERE class='".$student['student_class']."' 
                                  AND session='$session_esc' 
                                  AND month='$m_esc'");
    $inst = mysqli_fetch_assoc($inst_q);

    if (!$inst) {
        continue; // no fee defined for this month
    }

    // Apply concession if any
    if ($student['famt'] == '') {
        $val = (float)$inst['amnt'];
    } else {
        $discount = (float)$inst['amnt'] * (float)$student['famt'] / 100;
        $val = (float)$inst['amnt'] - $discount;
    }

    $total_instalment_fee += $val;
    $total_amount += $val;

    $month_details[] = [
        'month'           => $m,
        'instalment_fee'  => $val,
        'original_amount' => $inst['amnt']
    ];
}

// ✅ Fetch last due (if any)
$due_q = mysqli_query($con, "SELECT due, extra_amnt 
                             FROM fee_detail 
                             WHERE session='$session_esc' 
                             AND student='$student_id_esc' 
                             AND status='1' 
                             AND fee_type='Tution'
                             ORDER BY id DESC LIMIT 1");
$due_row = mysqli_fetch_assoc($due_q);

$previous_due = isset($due_row['due']) ? (float)$due_row['due'] : 0;
$advance_paid = isset($due_row['extra_amnt']) ? (float)$due_row['extra_amnt'] : 0;

// ✅ Final calculation
$final_total = $total_amount + $previous_due;
$amount_to_pay = $final_total - $advance_paid;

// ✅ Response
$response['status'] = true;
$response['message'] = "Fee details calculated.";
$response['data'] = [
    'student_id'          => $student['student_id'],
    'student_name'        => $student['student_name'],
    'class'               => $student['student_class'],
    'months_selected'     => $months,
    'month_wise_details'  => $month_details,
    'instalment_fee'      => $total_instalment_fee,
    'previous_due'        => $previous_due,
    'advance_adjusted'    => $advance_paid,
    'total_amount'        => $final_total,
    'amount_to_pay'       => $amount_to_pay
];

echo json_encode($response);
