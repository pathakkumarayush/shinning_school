<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input) {
    $input = $_POST;
}

$response = ['status' => false, 'message' => ''];

// Required fields
$required = ['class','student','amntdeposit','curdate5','p_year','ftype','session','order_id','transaction_id'];
foreach ($required as $field) {
    if (empty($input[$field])) {
        http_response_code(400);
        $response['message'] = "Missing field: $field";
        echo json_encode($response);
        exit;
    }
}

// Sanitize and assign
$latefee    = (float)($input['latefee1']   ?? 0);
$concession = (float)($input['concession'] ?? 0);
$pdue       = (float)($input['pdue']       ?? 0);
$padv       = (float)($input['padv']       ?? 0);
$remarks    = mysqli_real_escape_string($con, $input['remarks'] ?? '');
$sno        = mysqli_real_escape_string($con, $input['sno'] ?? '');
$class      = mysqli_real_escape_string($con, $input['class']);
$student    = mysqli_real_escape_string($con, $input['student']);
$p_year     = mysqli_real_escape_string($con, $input['p_year']);
$ftype      = mysqli_real_escape_string($con, $input['ftype']);
$uname      = mysqli_real_escape_string($con, $input['uname'] ?? '');
$school_id  = 'scottish';
$session    = mysqli_real_escape_string($con, $input['session']);
$order_id   = mysqli_real_escape_string($con, $input['order_id']);
$transaction_id = mysqli_real_escape_string($con, $input['transaction_id']);
$date       = $input['curdate5'] ?? date('Y-m-d');
$current_m  = date("M");

// Adjust amount
$amt = (float)($input['amt'] ?? 0) + $latefee - $concession;
$deposit = (float)$input['amntdeposit'];

// Calculate due/extra
$due   = 0;
$extra = 0;
if ($deposit < $amt) {
    $due = $amt - $deposit;
} elseif ($deposit > $amt) {
    $extra = $deposit - $amt;
}

$montha = '';

// Insert record in fee_detail_preivios
$sql = "INSERT INTO fee_detail_preivios
        (session,class,sno,tamnt,due,fee_deposit,date,student,month,
         latefee,concession,school,current_month,remark,extra_amnt,
         p_year,pdue,ftype,padv,uname,order_id,transaction_id)
        VALUES
        ('$session','$class','$sno','$amt','$due','$deposit','$date',
         '$student','$montha','$latefee','$concession','$school_id',
         '$current_m','$remarks','$extra','$p_year','$pdue',
         '$ftype','$padv','$uname','$order_id','$transaction_id')";

if (mysqli_query($con, $sql)) {
    $insertid = mysqli_insert_id($con);

    // Update receiptno with insert id
    mysqli_query($con, "UPDATE fee_detail_preivios SET receiptno='$insertid' WHERE id='$insertid'");

    // Mark privious_fee as paid
    mysqli_query($con, "UPDATE privious_fee SET status='0' WHERE sid='$student'");

    // Update fee_transaction table using order_id
    $updateTxn = "UPDATE fee_transaction 
                  SET status='paid', transaction_id='$transaction_id' 
                  WHERE order_id='$order_id'";
    mysqli_query($con, $updateTxn);

    $response['status'] = true;
    $response['message'] = 'Previous Fee Paid Successfully';
    $response['data'] = [
        'insert_id'      => $insertid,
        'receipt_no'     => $insertid,
        'student_id'     => $student,
        'amount'         => $amt,
        'paid'           => $deposit,
        'due'            => $due,
        'extra'          => $extra,
        'months'         => $montha,
        'date'           => $date,
        'order_id'       => $order_id,
        'transaction_id' => $transaction_id
    ];
} else {
    http_response_code(500);
    $response['message'] = 'Database error: ' . mysqli_error($con);
}

echo json_encode($response);
?>
