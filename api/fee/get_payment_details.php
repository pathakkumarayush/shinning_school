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
if (empty($_GET['student_id'])) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Student ID (student_id) is required']);
    exit;
}
if (empty($_GET['session'])) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

$student_id = mysqli_real_escape_string($con, $_GET['student_id']);
$session = mysqli_real_escape_string($con, $_GET['session']);

// Fetch primary student details
$student_query = mysqli_query($con, "SELECT * FROM student WHERE student_id = '$student_id' AND student_session = '$session' LIMIT 1");
if (!$student_query || mysqli_num_rows($student_query) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'Student not found']);
    exit;
}
$primary_student = mysqli_fetch_assoc($student_query);
$account_no = $primary_student['sedate'];

if (empty($account_no)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Student does not have an Account Number associated']);
    exit;
}

// Fetch all students sharing the same Account Number (siblings)
$siblings_query = mysqli_query($con, "SELECT * FROM student WHERE sedate = '$account_no' AND student_session = '$session' ORDER BY student_name ASC");

$siblings = [];
$grand_total_due = 0;
$grand_received = 0;
$grand_concession = 0;
$grand_balance = 0;

while ($sibling = mysqli_fetch_assoc($siblings_query)) {
    $sid = $sibling['student_id'];
    $cls = $sibling['student_class'];
    $std_type = $sibling['std_type'] ?? '';
    $bus = $sibling['bus'] ?? '';
    $hostel_status = (float)($sibling['hostel_status'] ?? 0);
    $famt = (float)($sibling['famt'] ?? 0);
    
    // 1. Admission fee (if New)
    $admission_fee = 0.0;
    if ($std_type === 'New') {
        $adm_query = mysqli_query($con, "SELECT fee FROM admission WHERE class='$cls' AND session='$session' LIMIT 1");
        if ($adm_query && $row = mysqli_fetch_assoc($adm_query)) {
            $admission_fee = (float)$row['fee'];
        }
    }
    
    // 2. Define fee
    $define_fee = 0.0;
    $df_query = mysqli_query($con, "SELECT amnt FROM definefee WHERE class='$cls' AND session='$session' LIMIT 1");
    if ($df_query && $row = mysqli_fetch_assoc($df_query)) {
        $define_fee = (float)$row['amnt'];
    }
    
    // 3. Bus fee
    $bus_fee = 0.0;
    if ($bus === 'Yes') {
        $bus_fee = $hostel_status;
    }
    
    // 4. Previous fee
    $previous_fee = 0.0;
    $pf_query = mysqli_query($con, "SELECT amt FROM privious_fee WHERE sid='$sid' AND session='$session' LIMIT 1");
    if ($pf_query && $row = mysqli_fetch_assoc($pf_query)) {
        $previous_fee = (float)$row['amt'];
    }
    
    $total_amount = $define_fee + $admission_fee - $famt + $bus_fee + $previous_fee;
    
    // 5. Received Amount & Concession
    $fd_query = mysqli_query($con, "SELECT SUM(fee_deposit) as received, SUM(conc) as concession FROM fee_detail WHERE student='$sid' AND session='$session'");
    $received_amount = 0.0;
    $concession_amount = 0.0;
    if ($fd_query && $row = mysqli_fetch_assoc($fd_query)) {
        $received_amount = (float)$row['received'];
        $concession_amount = (float)$row['concession'];
    }
    
    $balance_amount = $total_amount - $received_amount - $concession_amount;
    
    $siblings[] = [
        'student_id' => $sid,
        'student_scholar' => $sibling['student_scholar'],
        'student_name' => $sibling['student_name'],
        'student_class' => $cls,
        'sedate' => $sibling['sedate'],
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

// Generate the next Receipt Number
$max_query = mysqli_query($con, "SELECT MAX(id) AS max_id FROM fee_detail");
$max_row = mysqli_fetch_assoc($max_query);
$next_receipt_no = ($max_row['max_id'] ?? 0) + 1;

http_response_code(200);
echo json_encode([
    'status' => true,
    'message' => 'Payment details retrieved successfully',
    'data' => [
        'student' => [
            'student_id' => $primary_student['student_id'],
            'student_name' => $primary_student['student_name'],
            'student_fname' => $primary_student['student_fname'],
            'student_scholar' => $primary_student['student_scholar'],
            'student_class' => $primary_student['student_class'],
            'sedate' => $account_no
        ],
        'siblings' => $siblings,
        'grand_totals' => [
            'total_amount' => $grand_total_due,
            'received_amount' => $grand_received,
            'concession_amount' => $grand_concession,
            'balance_amount' => $grand_balance
        ],
        'next_receipt_no' => $next_receipt_no
    ]
]);
?>
