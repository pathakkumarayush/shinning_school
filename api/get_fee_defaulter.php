<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

// Sanitize inputs
$session = isset($_GET['session']) ? mysqli_real_escape_string($con, trim($_GET['session'])) : null;
$class = isset($_GET['class']) ? mysqli_real_escape_string($con, trim($_GET['class'])) : null;
$month_input = isset($_GET['month']) ? trim($_GET['month']) : null;
$type = isset($_GET['type']) ? strtolower(trim($_GET['type'])) : 'tuition';

if (!in_array($type, ['tuition', 'transport'])) {
    $type = 'tuition';
}

// Normalize class input
if ($class === 'All' || $class === 'all' || $class === '-1' || $class === '') {
    $class = null;
}

// Default session if not provided
if (!$session) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT student_session FROM student WHERE status='0' ORDER BY student_session DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['student_session'] ?? null;
}

if (!$session || !$month_input) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'session and month are required']);
    exit;
}

$month_map = [
    1 => 'April', 2 => 'July', 3 => 'August', 4 => 'September', 5 => 'October',
    6 => 'November', 7 => 'December', 8 => 'January', 9 => 'February', 10 => 'March'
];

// Resolve month name
$month_name = null;
if (is_numeric($month_input)) {
    $month_name = $month_map[(int)$month_input] ?? null;
} else {
    foreach ($month_map as $name) {
        if (strcasecmp($name, $month_input) === 0) {
            $month_name = $name;
            break;
        }
    }
}

if (!$month_name) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Invalid month parameter. Use names like April, July, etc.']);
    exit;
}

// Build WHERE clause
$where = "student_session = '$session' AND status = '0'";
if ($type === 'transport') {
    $where .= " AND transport_status = 'Active'";
} else {
    $where .= " AND rti = 'No'";
}

if ($class) {
    $where .= " AND student_class = '$class'";
}

$query = "SELECT * FROM student WHERE $where ORDER BY student_class, student_name ASC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$defaulters = [];
$total_due_amount = 0;

while ($student = mysqli_fetch_assoc($result)) {
    $student_id = $student['student_id'];
    $student_class = $student['student_class'];
    $due_amnt = 0;
    
    if ($type === 'transport') {
        // Transport fee logic: fetch amount from stopage table based on transport_stopage
        $stopage = mysqli_real_escape_string($con, $student['transport_stopage']);
        $stop_q = mysqli_query($con, "SELECT amnt FROM stopage WHERE session='$session' AND stop_name='$stopage'");
        $stop_row = mysqli_fetch_assoc($stop_q);
        $due_amnt = (float)($stop_row['amnt'] ?? 0);
    } else {
        // Tuition fee logic: check if fee is defined for this class and month
        $inst_q = mysqli_query($con, "SELECT amnt FROM instdetail WHERE session='$session' AND month='$month_name' AND class='$student_class'");
        $inst_row = mysqli_fetch_assoc($inst_q);
        $due_amnt = (float)($inst_row['amnt'] ?? 0);
    }

    if($due_amnt <= 0){
        continue; // Skip if no tuition fee is defined
    }
    
    // Check if paid
    $is_paid = false;
    if ($type === 'transport') {
        $paid_q = mysqli_query($con, "SELECT month FROM fee_detail_trans WHERE student='$student_id' AND status='1' AND session='$session'");
    } else {
        $paid_q = mysqli_query($con, "SELECT month FROM fee_detail WHERE student='$student_id' AND status='1' AND session='$session'");
    }
    
    while ($paid_row = mysqli_fetch_assoc($paid_q)) {
        if (empty($paid_row['month'])) continue;
        
        $paid_months = explode(',', $paid_row['month']);
        $paid_months = array_map('trim', $paid_months);
        
        if (in_array($month_name, $paid_months)) {
            $is_paid = true;
            break;
        }
    }
    
    if (!$is_paid) {
        $defaulters[] = [
            'student_id' => $student_id,
            'student_scholar' => $student['student_scholar'],
            'student_name' => $student['student_name'],
            'student_contact' => $student['student_contactno'],
            'class' => $student_class,
            'month' => $month_name,
            'amount_due' => $due_amnt
        ];
        $total_due_amount += $due_amnt;
    }
}

echo json_encode([
    'status' => true,
    'type' => $type,
    'session' => $session,
    'month' => $month_name,
    'class' => $class ?? 'All',
    'count' => count($defaulters),
    'total_due_amount' => $total_due_amount,
    'data' => $defaulters
]);

