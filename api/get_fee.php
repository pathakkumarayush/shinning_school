<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

session_start();
require_once("../db.php");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Get params
$session    = isset($_GET['session']) ? trim($_GET['session']) : ($_SESSION['session'] ?? '');
$student_id = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';

if ($session === '' || $student_id === '') {
    http_response_code(400);
    $response['message'] = 'session and student_id are required.';
    echo json_encode($response);
    exit;
}

$session_esc    = mysqli_real_escape_string($con, $session);
$student_id_esc = mysqli_real_escape_string($con, $student_id);

// Fetch student info
$studentQ = mysqli_query($con, "SELECT * FROM student 
                                WHERE student_id='$student_id_esc' 
                                  AND student_session='$session_esc'");
$student = mysqli_fetch_assoc($studentQ);

if (!$student) {
    $response['message'] = 'Student not found for given session.';
    echo json_encode($response);
    exit;
}

$cls = $student['student_class']; // class for fee lookup

// ==================== Fee Calculations ==================== //
$otft  = 0; // Other fee total
$val4  = 0; // Total fee deposit
$tcon  = 0; // Concession total
$tfine = 0; // Fine total

$exa = mysqli_query($con, "SELECT * FROM fee_detail 
                           WHERE student='$student_id_esc' 
                             AND session='$session_esc' AND fee_type='Tution'");

while ($hostel = mysqli_fetch_array($exa)) {
    $val4  += (float)$hostel["fee_deposit"] ?? 0;
    $otft  += (float)$hostel["other_fee"] ?? 0;
    $tcon  += (float)$hostel["concession"] ?? 0;
    $tfine += (float)$hostel["latefee"] ?? 0;
}

// Admission fee
$ad = 0;
if (!empty($student['std_type']) && $student['std_type'] == 'New') {
    $admi   = mysqli_query($con, "SELECT * FROM admission WHERE class='$cls' AND session='$session_esc'");
    $rowead = mysqli_fetch_array($admi);
    $ad     = $rowead['fee'] ?? 0;
}

// Transport fee
$transport_fee = 0;
if (!empty($student['transport_status']) && $student['transport_status'] == 'Active') {
    $tfee = mysqli_query($con, "SELECT * FROM stopage WHERE stop_name='".$student['transport_stopage']."'");
    $rowf = mysqli_fetch_array($tfee);
    $transport_fee = $rowf['amnt'] ?? 0;
}

// Define class fee
$total = mysqli_query($con, "SELECT * FROM definefee WHERE class='$cls' AND session='$session_esc'");
$tamt  = mysqli_fetch_array($total);
$tttf  = $tamt['amnt'] ?? 0;

// Calculate totals
$grand_total  = (float)$tttf + (float)$ad + (float)$otft + (float)$tfine ;
$total_paid   = (float)$val4;
$balance      = $grand_total - $total_paid - (float)$tcon;
if ($balance < 0) $balance = 0; // prevent negative balance

// ==================== Month-wise Fee ==================== //
$feeQ = mysqli_query($con, "SELECT * FROM fee_detail 
                            WHERE student='$student_id_esc' 
                              AND session='$session_esc' 
                              AND colle='school' 
                              AND fee_type='Tution'
                            ORDER BY id ASC");

$monthWise = [];
while ($row = mysqli_fetch_assoc($feeQ)) {
    $months = explode(",", $row['month']);
    foreach ($months as $m) {
        $m = trim($m);
        if (!isset($monthWise[$m])) {
            $monthWise[$m] = [
                'month'          => $m,
                'receipt_no'     => $row['receiptno'],
                'instalment'     => $row['instalment'] ?: $row['fee_type'],
                'total_amount'   => (float)($row['tpay'] ?? 0),
                'paid_amount'    => (float)($row['fee_deposit'] ?? 0),
                'other_fee'      => (float)($row['other_fee'] ?? 0),
                'fine'           => (float)($row['latefee'] ?? 0),
                'concession'     => (float)($row['concession'] ?? 0),
                'due'            => (float)($row['due'] ?? 0),
                'extra_amount'   => (float)($row['extra_amnt'] ?? 0),
                'date'           => $row['date'] ? date("d-m-Y", strtotime($row['date'])) : null,
            ];
        } else {
            $monthWise[$m]['total_amount'] += (float)($row['tpay'] ?? 0);
            $monthWise[$m]['paid_amount']  += (float)($row['fee_deposit'] ?? 0);
            $monthWise[$m]['other_fee']    += (float)($row['other_fee'] ?? 0);
            $monthWise[$m]['fine']         += (float)($row['latefee'] ?? 0);
            $monthWise[$m]['concession']   += (float)($row['concession'] ?? 0);
            $monthWise[$m]['due']          += (float)($row['due'] ?? 0);
            $monthWise[$m]['extra_amount'] += (float)($row['extra_amnt'] ?? 0);
        }
    }
}

// ==================== Response ==================== //
$response['status']  = true;
$response['message'] = 'Fee details fetched.';
$response['data'] = [
    'student' => [
        'id'             => $student['student_id'],
        'name'           => $student['student_name'],
        'father_name'    => $student['student_fname'],
        'mother_name'    => $student['m_name'],
        'class'          => $student['student_class'],
        'mobile'         => $student['student_contactno'],
        'scholar_no'     => $student['student_scholar'],
        'total_fee'      => $grand_total,
        'total_pay_fee'  => $total_paid,
        'balance_amount' => $balance,
        'concession'     => $tcon,
        'late_fee'       => $tfine,
        'other_fee'      => $otft,
        'admission_fee'  => $ad,
        'transport_fee'  => $transport_fee,
    ],
    'fee_details' => array_values($monthWise)
];

echo json_encode($response, JSON_PRETTY_PRINT);
