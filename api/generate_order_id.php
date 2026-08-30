<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';
require '../razorpay/Razorpay.php';  // <-- Add Razorpay PHP SDK

use Razorpay\Api\Api;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$requiredFields = ['student_id', 'session', 'amount', 'class', 'student_name'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['status' => false, 'message' => "Missing field: $field"]);
        exit;
    }
}

$student_id   = mysqli_real_escape_string($con, $_POST['student_id']);
$session      = mysqli_real_escape_string($con, $_POST['session']);
$amount       = mysqli_real_escape_string($con, $_POST['amount']);
$class        = mysqli_real_escape_string($con, $_POST['class']);
$student_name = mysqli_real_escape_string($con, $_POST['student_name']);

// ---------------------------------------
// YOUR INTERNAL ORDER ID
// ---------------------------------------
function generateOrderId($con) {
    do {
        $order_id = 'OR'.date('Ymdhi').''.rand(100, 999);
        $check = mysqli_query($con, "SELECT id FROM fee_transaction WHERE order_id = '$order_id'");
    } while (mysqli_num_rows($check) > 0);
    return $order_id;
}

$internal_order_id = generateOrderId($con);

// ---------------------------------------
// CREATE RAZORPAY ORDER (MOST IMPORTANT)
// ---------------------------------------
$keyId     = "rzp_test_iFZvKIbGyy3MQv";
$keySecret = "L6lZKI1l8loUes5uaeuMZwSz";

$api = new Api($keyId, $keySecret);

$razorpayOrder = $api->order->create([
    'receipt'  => $internal_order_id,
    'amount'   => $amount * 100,  // paise
    'currency' => 'INR'
]);

$razorpay_order_id = $razorpayOrder['id'];

// ---------------------------------------
// SAVE TO DATABASE
// ---------------------------------------
$query = "INSERT INTO fee_transaction 
(order_id, razorpay_order_id, student_id, session, amount, class, student_name, created_at)
VALUES 
('$internal_order_id', '$razorpay_order_id', '$student_id', '$session', '$amount', '$class', '$student_name', NOW())";

if (mysqli_query($con, $query)) {
    echo json_encode([
        'status' => true,
        'message' => 'Order created',
        'data' => [
            'internal_order_id'   => $internal_order_id,
            'razorpay_order_id'   => $razorpay_order_id,
            'student_id'          => $student_id,
            'session'             => $session,
            'amount'              => $amount,
            'class'               => $class,
            'student_name'        => $student_name
        ]
    ]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
