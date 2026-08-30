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

// Default session if not provided
if (!$session) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT session FROM refound ORDER BY id DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['session'] ?? null;
}

if (!$session) {
    echo json_encode(['status' => true, 'message' => 'No session found or no data available', 'data' => []]);
    exit;
}

// Build WHERE clause
$where = "session = '$session'";

$query = "SELECT * FROM refound WHERE $where ORDER BY id DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$refund_details = [];
$total_refund_amount = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $refund_details[] = [
        'id' => $row['id'],
        'student_name' => $row['sname'] ?? '',
        'father_name' => $row['fname'] ?? '',
        'class' => $row['class'] ?? '',
        'receipt_no' => $row['rno'] ?? '',
        'date' => $row['dt'] ?? '',
        'amount' => (float)($row['amt'] ?? 0),
        'remarks' => $row['fee_head'] ?? '',
        'session' => $row['session'] ?? ''
    ];
    $total_refund_amount += (float)($row['amt'] ?? 0);
}

echo json_encode([
    'status' => true,
    'session' => $session,
    'count' => count($refund_details),
    'total_refund_amount' => $total_refund_amount,
    'data' => $refund_details
]);
