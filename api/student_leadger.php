<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// =======================
// ✅ METHOD CHECK
// =======================
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

// =======================
// ✅ INPUTS
// =======================
$session = $_GET['session'] ?? '';
$student_id = $_GET['student'] ?? '';

if (empty($session) || empty($student_id)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'session and student required']);
    exit;
}

// =======================
// ✅ STUDENT
// =======================
$student_q = mysqli_query($con, "SELECT * FROM student WHERE student_id='$student_id' AND student_session='$session'");
$student = mysqli_fetch_assoc($student_q);

if (!$student) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Student not found']);
    exit;
}

if (!empty($student['student_dob'])) {
    $student['student_dob'] = date("d-M-Y", strtotime($student['student_dob']));
}
if (!empty($student['student_doj'])) {
    $student['student_doj'] = date("d-M-Y", strtotime($student['student_doj']));
}

$class = $student['student_class'];

// =======================
// ✅ TUITION (DISCOUNT)
// =======================
$define = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM definefee WHERE class='$class' AND session='$session'"));
$tuition = (float)($define['amnt'] ?? 0);

if ($student['fc'] == 'Not Applicab') {
    $tuition_final = $tuition;
} else {
    $discount = ($tuition * (float)$student['famt']) / 100;
    $tuition_final = $tuition - $discount;
}

// =======================
// ✅ OTHER FEES
// =======================
$admission = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM admission WHERE class='$class' AND session='$session'"));
$admission_fee = ($student['std_type'] == 'New') ? (float)($admission['fee'] ?? 0) : 0;
$enrollment_fee = ($student['enfee'] == 'Yes') ? (float)($admission['enfee'] ?? 0) : 0;

$caution = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM cautionfee WHERE class='$class' AND session='$session'"));
$yearly_fee = (float)($caution['fee'] ?? 0);

$cbse = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM cbse WHERE class='$class' AND session='$session'"));
$cbse_fee = (float)($cbse['fee'] ?? 0);

$annual = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM annual WHERE session='$session'"));
$computer_fee = (float)($annual['fee'] ?? 0) * 10;

$comp = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM comp WHERE class='$class' AND session='$session'"));
$compartment_fee = ($student['comfee'] == 'Yes') ? (float)($comp['fee'] ?? 0) : 0;
$improvement_fee = ($student['impfee'] == 'Yes') ? (float)($comp['infee'] ?? 0) : 0;

// =======================
// ✅ TOTAL FEE
// =======================
$total_fee =
    $tuition_final +
    $admission_fee +
    $enrollment_fee +
    $yearly_fee +
    $cbse_fee +
    $computer_fee +
    $compartment_fee +
    $improvement_fee;

// =======================
// ✅ PAID / CONCESSION / FINE
// =======================
$paid_total = 0;
$concession_total = 0;
$fine_total = 0;

$reg_paid = 0;
$yearly_paid = 0;
$enroll_paid = 0;

$fee_q = mysqli_query($con, "SELECT * FROM fee_detail WHERE session='$session' AND student='$student_id' AND status='1'");

while ($row = mysqli_fetch_assoc($fee_q)) {

    $paid_total += (float)$row['fee_deposit'];
    $concession_total += (float)$row['concession'];
    $fine_total += (float)$row['latefee'];

    // Fee-wise tracking
    $reg_paid += (float)$row['adm_fee'];
    $yearly_paid += (float)$row['caution'];
    $enroll_paid += (float)$row['enroll'];
}

// Tuition paid = remaining
$tuition_paid = $paid_total - ($reg_paid + $yearly_paid + $enroll_paid);

// =======================
// ✅ STATUS FUNCTION
// =======================
function getStatus($total, $paid) {
    if ($paid <= 0) return 'pending';
    if ($paid >= $total) return 'paid';
    return 'partial';
}

// =======================
// ✅ BALANCE
// =======================
$balance = $total_fee - $paid_total - $concession_total + $fine_total;

// =======================
// ✅ TRANSPORT
// =======================
$transport_total = 0;
$transport_paid = 0;
$transport_balance = 0;

if ($student['transport_status'] == 'Active') {

    $stop = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM stopage WHERE stop_name='".$student['transport_stopage']."'"));
    $base = (float)($stop['amnt'] ?? 0);

    if ($student['fc'] == 'STAFF WARD') {
        $base = $base - ($base * $student['famt'] / 100);
    } elseif ($student['transport_type'] == 'One Way') {
        $base = $base / 2;
    }

    $transport_total = $base * (int)$student['m'];

    $trans_q = mysqli_query($con, "SELECT * FROM fee_detail_trans WHERE session='$session' AND student='$student_id' AND status='1'");

    $t_con = 0;
    $t_fine = 0;

    while ($t = mysqli_fetch_assoc($trans_q)) {
        $transport_paid += (float)$t['fee_deposit'];
        $t_con += (float)$t['concession'];
        $t_fine += (float)$t['latefee'];
    }

    $transport_balance = $transport_total - $transport_paid - $t_con + $t_fine;
}

// =======================
// ✅ RESPONSE
// =======================
echo json_encode([
    'status' => true,
    'student' => $student,

    'fee_structure' => [
        'tuition_fee' => $tuition,
        'tuition_after_discount' => $tuition_final,
        'admission_fee' => $admission_fee,
        'enrollment_fee' => $enrollment_fee,
        'yearly_fee' => $yearly_fee,
        'cbse_fee' => $cbse_fee,
        'computer_fee' => $computer_fee,
        'compartment_fee' => $compartment_fee,
        'improvement_fee' => $improvement_fee,
    ],

    'summary' => [
        'total_fee' => $total_fee,
        'paid_total' => $paid_total,
        'concession_total' => $concession_total,
        'fine_total' => $fine_total,
        'balance' => $balance
    ],

    'fee_status' => [
        'registration_fee' => [
            'total' => $admission_fee,
            'paid' => $reg_paid,
            'status' => getStatus($admission_fee, $reg_paid)
        ],
        'enrollment_fee' => [
            'total' => $enrollment_fee,
            'paid' => $enroll_paid,
            'status' => getStatus($enrollment_fee, $enroll_paid)
        ],
        'yearly_fee' => [
            'total' => $yearly_fee,
            'paid' => $yearly_paid,
            'status' => getStatus($yearly_fee, $yearly_paid)
        ],
        'tuition_fee' => [
            'total' => $tuition_final,
            'paid' => $tuition_paid,
            'status' => getStatus($tuition_final, $tuition_paid)
        ]
    ],

    'transport' => [
        'total' => $transport_total,
        'paid' => $transport_paid,
        'balance' => $transport_balance
    ]

], JSON_PRETTY_PRINT);