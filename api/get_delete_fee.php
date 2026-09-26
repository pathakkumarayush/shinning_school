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
$type = isset($_GET['type']) ? trim($_GET['type']) : 'tuition';

// Determine table based on type
$table = ($type === 'transport') ? 'fee_detail_trans' : 'fee_detail';

// Default session if not provided
if (!$session) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT session FROM $table ORDER BY session DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['session'] ?? null;
}

if (!$session) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Session is required or could not be determined']);
    exit;
}

// Build WHERE clause
// status = '2' indicates a deleted/cancelled receipt in the system
$where = "session = '$session' AND status = '2'";
if ($class) {
    $where .= " AND class = '$class'";
}

$query = "SELECT * FROM $table WHERE $where ORDER BY id DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$deleted_fees = [];
$total_deleted_amount = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $deleted_fees[] = [
        'id' => $row['id'],
        'student_scholar' => $row['sch'] ?? '',
        'student_name' => $row['name'] ?? '',
        'father_name' => $row['fname'] ?? '',
        'class' => $row['class'] ?? '',
        'receipt_no' => $row['receiptno'] ?? '',
        'date' => $row['date'] ?? '',
        'amount_deposited' => (float)($row['fee_deposit'] ?? 0),
        'month' => $row['month'] ?? '',
        'late_fee' => (float)($row['latefee'] ?? 0),
        'concession' => (float)($row['concession'] ?? 0),
        'due_remaining' => (float)($row['due'] ?? 0)
    ];
    $total_deleted_amount += (float)$row['fee_deposit'];
}

echo json_encode([
    'status' => true,
    'type' => $type,
    'session' => $session,
    'class' => $class ?? 'All',
    'count' => count($deleted_fees),
    'total_deleted_amount' => $total_deleted_amount,
    'data' => $deleted_fees
]);
