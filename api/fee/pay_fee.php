<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Parse JSON input if content-type is application/json
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if (strpos($contentType, 'application/json') !== false) {
    $rawInput = file_get_contents('php://input');
    $jsonData = json_decode($rawInput, true);
    if (is_array($jsonData)) {
        $_POST = array_merge($_POST, $jsonData);
    }
}

// Validate required fields
$required = ['student_id', 'session', 'pay_amount', 'deposit_amount', 'payment_mode', 'school_receipt'];
foreach ($required as $field) {
    if (!isset($_POST[$field]) || $_POST[$field] === '') {
        http_response_code(400);
        echo json_encode(['status' => false, 'message' => "Missing required field: $field"]);
        exit;
    }
}

$student_id = mysqli_real_escape_string($con, $_POST['student_id']);
$session = mysqli_real_escape_string($con, $_POST['session']);
$pay_amount = (float)$_POST['pay_amount'];
$concession = (float)($_POST['concession'] ?? 0);
$deposit_amount = (float)$_POST['deposit_amount'];
$payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
$remarks = mysqli_real_escape_string($con, $_POST['remarks'] ?? '');
$date = mysqli_real_escape_string($con, $_POST['date'] ?? date('Y-m-d'));
$school_receipt = mysqli_real_escape_string($con, $_POST['school_receipt']);
$school_val = mysqli_real_escape_string($con, $_POST['school'] ?? 'school');
$current_month = date("M");

// Fetch student details from the database
$student_query = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$student_id' AND student_session = '$session' LIMIT 1");
if (!$student_query || mysqli_num_rows($student_query) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Student not found for the given session']);
    exit;
}
$student = mysqli_fetch_assoc($student_query);

$class = mysqli_real_escape_string($con, $student['student_class']);
$name = mysqli_real_escape_string($con, $student['student_name']);
$sch = mysqli_real_escape_string($con, $student['student_scholar']);
$acn = mysqli_real_escape_string($con, $student['sedate']);

// Generate the next Receipt Number
$max_query = mysqli_query($con, "SELECT MAX(id) AS max_id FROM fee_detail");
$max_row = mysqli_fetch_assoc($max_query);
$generated_receipt_no = ($max_row['max_id'] ?? 0) + 1;

// Verify receipt number uniqueness for the session
$receipt_check = mysqli_query($con, "SELECT * FROM fee_detail WHERE receiptno = '$generated_receipt_no' AND session = '$session'");
if ($receipt_check && mysqli_num_rows($receipt_check) > 0) {
    http_response_code(409);
    echo json_encode(['status' => false, 'message' => 'Receipt number already exists']);
    exit;
}

// Insert transaction details into fee_detail table
$insert_query = "INSERT INTO fee_detail (
    session, class, name, sch, student, inst_fee, pay_type, fee_deposit, 
    date, school, receiptno, current_month, remark, acn, sreceipt, conc
) VALUES (
    '$session', '$class', '$name', '$sch', '$student_id', '$pay_amount', '$payment_mode', '$deposit_amount', 
    '$date', '$school_val', '$generated_receipt_no', '$current_month', '$remarks', '$acn', '$school_receipt', '$concession'
)";

if (mysqli_query($con, $insert_query)) {
    $insert_id = mysqli_insert_id($con);
    http_response_code(201);
    echo json_encode([
        'status' => true,
        'message' => 'Fee Paid Successfully',
        'data' => [
            'id' => $insert_id,
            'session' => $session,
            'class' => $class,
            'name' => $name,
            'sch' => $sch,
            'student_id' => $student_id,
            'pay_amount' => $pay_amount,
            'concession' => $concession,
            'deposit_amount' => $deposit_amount,
            'payment_mode' => $payment_mode,
            'date' => $date,
            'receipt_no' => $generated_receipt_no,
            'school_receipt' => $school_receipt,
            'remark' => $remarks
        ]
    ]);
} else {
    http_response_code(500);
    echo json_encode(['status' => false, 'message' => 'Database error: ' . mysqli_error($con)]);
}
?>
