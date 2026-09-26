<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Get parameters
$session    = isset($_GET['session']) ? trim($_GET['session']) : '';
$student_id = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';

if ($session === '' || $student_id === '') {
    http_response_code(400);
    $response['message'] = 'Session and student_id are required.';
    echo json_encode($response);
    exit;
}

$session_esc   = mysqli_real_escape_string($con, $session);
$student_id_esc = mysqli_real_escape_string($con, $student_id);

// Fetch total previous fee
$sql = "SELECT SUM(amt) as total_fee 
        FROM privious_fee 
        WHERE session = '$session_esc' 
          AND sid = '$student_id_esc'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$totalFee = (float)($row['total_fee'] ?? 0);

// Fetch paid fee, concession, fine
$sql2 = "SELECT 
            SUM(fee_deposit) as total_deposit,
            SUM(concession) as total_concession,
            SUM(latefee) as total_fine
         FROM fee_detail_preivios 
         WHERE student = '$student_id_esc' 
           AND status = '1'";
$result2 = mysqli_query($con, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$deposit    = (float)($row2['total_deposit'] ?? 0);
$concession = (float)($row2['total_concession'] ?? 0);
$fine       = (float)($row2['total_fine'] ?? 0);

// Balance calculation
$balance = $totalFee + $fine - $deposit - $concession;
if ($balance < 0) {
    $balance = 0;
}

// Prepare response
$response['status']  = true;
$response['message'] = 'Previous fee summary found.';
$response['data'] = [
    'session'        => $session,
    'student_id'     => $student_id,
    'total_fee'      => $totalFee,
    'paid_fee'       => $deposit,
    'concession_fee' => $concession,
    'fine_fee'       => $fine,
    'balance_fee'    => $balance
];

echo json_encode($response);
?>
