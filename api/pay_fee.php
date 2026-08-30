<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = ['status' => false, 'message' => ''];

// ✅ Required fields
$required = ['session', 'class', 'student', 'inst_fee', 'tamount', 'amntdeposit', 'order_id', 'transaction_id'];
foreach ($required as $field) {
    if (empty($_POST[$field])) {
        http_response_code(400);
        $response['message'] = "Missing field: $field";
        echo json_encode($response);
        exit;
    }
}

// ✅ Sanitize inputs
$session         = mysqli_real_escape_string($con, $_POST['session']);
$class           = mysqli_real_escape_string($con, $_POST['class']);
$student         = mysqli_real_escape_string($con, $_POST['student']);
$inst_fee        = (float)($_POST['inst_fee'] ?? 0);
$amt             = (float)($_POST['amt'] ?? 0);
$tamount         = (float)($_POST['tamount'] ?? 0);
$amntdeposit     = (float)($_POST['amntdeposit'] ?? 0);
$order_id        = mysqli_real_escape_string($con, $_POST['order_id']);
$transaction_id  = mysqli_real_escape_string($con, $_POST['transaction_id']); // ✅ from request

// ✅ Optional fields
$latefee     = (float)($_POST['latefee1'] ?? 0);
$concession  = (float)($_POST['concession'] ?? 0);
$cba         = (float)($_POST['cba'] ?? 0);
$pdue        = (float)($_POST['pdue'] ?? 0);
$padv        = (float)($_POST['padv'] ?? 0);
$uname       = mysqli_real_escape_string($con, $_POST['uname'] ?? '');
$remarks     = mysqli_real_escape_string($con, $_POST['remarks'] ?? '');
$nnm         = mysqli_real_escape_string($con, $_POST['nnm'] ?? '');
$ftype       = mysqli_real_escape_string($con, $_POST['ftype'] ?? 'Tution');
$datee       = $_POST['curdate5'] ?? date('Y-m-d');
$current_m   = date("M");

// ✅ Adjust amount with CBA, Late Fee, Concession
$amt += $cba;
$amt += $latefee;
$amt -= $concession;

// ✅ Calculate due/extra
$due = 0;
$extra = 0;
if ($amntdeposit < $amt) {
    $due = 0;
} elseif ($amntdeposit > $amt) {
    $extra = 0;
}

// ✅ Get selected months
$montha = $_POST['montha'] ?? '';
$month_to_inst = [
    'April'     => 'Instalment1',
    'July'      => 'Instalment2',
    'August'    => 'Instalment3',
    'September' => 'Instalment4',
    'October'   => 'Instalment5',
    'November'  => 'Instalment6',
    'December'  => 'Instalment7',
    'January'   => 'Instalment8'
];
$instn = [];
if (!empty($montha)) {
    foreach (explode(',', $montha) as $m) {
        if (isset($month_to_inst[$m])) {
            $instn[] = $month_to_inst[$m];
        }
    }
}
$instn_str = implode(',', $instn);

// ✅ Insert into fee_detail (with order_id & transaction_id)
$sql = "INSERT INTO fee_detail(
            session, class, inst_fee, tamnt, tpay, due, pdue, pay_type, fee_deposit,
            month, student, date, latefee, concession, school, current_month,
            instalment, extra_amnt, remark, cno, cd, padv, sch, bank, ne_no, ndat,
            colle, cba, cbno, name, fee_type, uname, fee_name, order_id, transaction_id
        ) VALUES (
            '$session', '$class', '$inst_fee', '$tamount', '$tamount', '$due', '$pdue', '$ftype', '$amntdeposit',
            '$montha', '$student', '$datee', '$latefee', '$concession', 'scottish', '$current_m',
            '$instn_str', '$extra', '$remarks', '', '', '$padv', 'scottish', '', '', '',
            'school', '$cba', '', '$nnm', 'Tution', '$uname', 'Tution', '$order_id', '$transaction_id'
        )";

if (mysqli_query($con, $sql)) {
    $insertid = mysqli_insert_id($con);

    // ✅ Update receipt number
    mysqli_query($con, "UPDATE fee_detail SET receiptno='$insertid' WHERE id='$insertid'");

    // ✅ Update order status & transaction_id in fee_transaction
    $updateTrans = "UPDATE fee_transaction 
                    SET status='paid', transaction_id='$transaction_id' 
                    WHERE order_id='$order_id'";
    mysqli_query($con, $updateTrans);

    // ✅ Response
    $response['status'] = true;
    $response['message'] = 'Fee Paid Successfully';
    $response['data'] = [
        'insert_id'      => $insertid,
        'receipt_no'     => $insertid,
        'order_id'       => $order_id,
        'transaction_id' => $transaction_id,
        'months'         => $montha,
        'instalments'    => $instn_str,
        'amount'         => $amt,
        'paid'           => $amntdeposit,
        'due'            => $due,
        'extra'          => $extra
    ];
} else {
    $response['message'] = 'Database error: ' . mysqli_error($con);
}

echo json_encode($response);
