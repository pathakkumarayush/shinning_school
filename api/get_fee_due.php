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

// Default session if not provided
if (!$session) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT student_session FROM student WHERE status='0' ORDER BY student_session DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['student_session'] ?? null;
}

if (!$session) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Session is required or could not be determined']);
    exit;
}

// Build WHERE clause
$where = "student_session = '$session' AND status = '0'";
if ($class) {
    $where .= " AND student_class = '$class'";
}

$query = "SELECT * FROM student WHERE $where ORDER BY student_class, student_name ASC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$due_list = [];
$total_due_amount = 0;

while ($student = mysqli_fetch_assoc($result)) {
    $student_id = $student['student_id'];
    
    // Get the latest paid record from fee_detail to check for due amount
    $fee_q = mysqli_query($con, "SELECT * FROM fee_detail WHERE student='$student_id' AND session='$session' AND status='1' ORDER BY id DESC LIMIT 1");
    $fee_row = mysqli_fetch_assoc($fee_q);
    
    if ($fee_row && (float)$fee_row['due'] > 0) {
        $due_amnt = (float)$fee_row['due'];
        $due_list[] = [
            'student_id' => $student_id,
            'student_scholar' => $student['student_scholar'],
            'student_name' => $student['student_name'],
            'student_contact' => $student['student_contactno'],
            'class' => $student['student_class'],
            'due_amount' => $due_amnt,
            'last_paid_month' => $fee_row['month'] ?? '',
            'last_paid_date' => $fee_row['date'] ?? ''
        ];
        $total_due_amount += $due_amnt;
    }
}

echo json_encode([
    'status' => true,
    'session' => $session,
    'class' => $class ?? 'All',
    'count' => count($due_list),
    'total_due_amount' => $total_due_amount,
    'data' => $due_list
]);
