<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require __DIR__ . '/../../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Validate input
if (empty($_GET['ac'])) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Account number (ac) is required']);
    exit;
}
if (empty($_GET['session'])) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

$ac = mysqli_real_escape_string($con, $_GET['ac']);
$session = mysqli_real_escape_string($con, $_GET['session']);

// Search students matching account number
$query = "SELECT * FROM student WHERE sedate = '$ac' AND student_session = '$session' ORDER BY student_name ASC";
$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'No students found with the given account number']);
    exit;
}

$students = [];
$grand_total_due = 0;
$grand_received = 0;
$grand_concession = 0;
$grand_balance = 0;

while ($student = mysqli_fetch_assoc($result)) {
    $sid = $student['student_id'];
    $cls = $student['student_class'];
    $std_type = $student['std_type'] ?? '';
    $bus = $student['bus'] ?? '';
    $hostel_status = (float)($student['hostel_status'] ?? 0);
    $famt = (float)($student['famt'] ?? 0); // Student concession
    
    // 1. Admission fee (if New)
    $admission_fee = 0.0;
    if ($std_type === 'New') {
        $adm_query = mysqli_query($con, "SELECT fee FROM admission WHERE class='$cls' AND session='$session' LIMIT 1");
        if ($adm_query && $row = mysqli_fetch_assoc($adm_query)) {
            $admission_fee = (float)$row['fee'];
        }
    }
    
    // 2. Define fee (Standard fee for the class)
    $define_fee = 0.0;
    $df_query = mysqli_query($con, "SELECT amnt FROM definefee WHERE class='$cls' AND session='$session' LIMIT 1");
    if ($df_query && $row = mysqli_fetch_assoc($df_query)) {
        $define_fee = (float)$row['amnt'];
    }
    
    // 3. Bus fee (tbus)
    $bus_fee = 0.0;
    if ($bus === 'Yes') {
        $bus_fee = $hostel_status;
    }
    
    // 4. Previous fee (tpr)
    $previous_fee = 0.0;
    $pf_query = mysqli_query($con, "SELECT amt FROM privious_fee WHERE sid='$sid' AND session='$session' LIMIT 1");
    if ($pf_query && $row = mysqli_fetch_assoc($pf_query)) {
        $previous_fee = (float)$row['amt'];
    }
    
    // Total Amount Calculation
    $total_amount = $define_fee + $admission_fee - $famt + $bus_fee + $previous_fee;
    
    // 5. Received Amount & Concession from fee_detail
    $fd_query = mysqli_query($con, "SELECT SUM(fee_deposit) as received, SUM(conc) as concession FROM fee_detail WHERE student='$sid' AND session='$session'");
    $received_amount = 0.0;
    $concession_amount = 0.0;
    if ($fd_query && $row = mysqli_fetch_assoc($fd_query)) {
        $received_amount = (float)$row['received'];
        $concession_amount = (float)$row['concession'];
    }
    
    $balance_amount = $total_amount - $received_amount - $concession_amount;
    
    $students[] = [
        'student_id' => $sid,
        'student_scholar' => $student['student_scholar'],
        'student_name' => $student['student_name'],
        'student_class' => $cls,
        'sedate' => $student['sedate'], // account number
        'total_amount' => $total_amount,
        'received_amount' => $received_amount,
        'concession_amount' => $concession_amount,
        'balance_amount' => $balance_amount,
        'breakdown' => [
            'define_fee' => $define_fee,
            'admission_fee' => $admission_fee,
            'bus_fee' => $bus_fee,
            'previous_fee' => $previous_fee,
            'student_discount' => $famt
        ]
    ];
    
    $grand_total_due += $total_amount;
    $grand_received += $received_amount;
    $grand_concession += $concession_amount;
    $grand_balance += $balance_amount;
}

http_response_code(200);
echo json_encode([
    'status' => true,
    'message' => 'Students retrieved successfully',
    'data' => [
        'students' => $students,
        'grand_totals' => [
            'total_amount' => $grand_total_due,
            'received_amount' => $grand_received,
            'concession_amount' => $grand_concession,
            'balance_amount' => $grand_balance
        ]
    ]
]);
?>
