<?php
ob_start();
// self-contained CLI test runner for fee payment APIs
require __DIR__ . '/../../db.php';
ob_clean();

echo "=== STARTING FEE APIS VERIFICATION TEST ===\n\n";

// 1. Find a valid student to test with
$student_query = mysqli_query($con, "SELECT student_id, sedate, student_session, student_name, student_class FROM student WHERE sedate != '' AND sedate IS NOT NULL LIMIT 1");
if (!$student_query || mysqli_num_rows($student_query) === 0) {
    echo "FAIL: No test student found in student table with an Account Number (sedate).\n";
    exit(1);
}

$test_student = mysqli_fetch_assoc($student_query);
$student_id = $test_student['student_id'];
$ac_no = $test_student['sedate'];
$session = $test_student['student_session'];
$name = $test_student['student_name'];
$class = $test_student['student_class'];

echo "Found Test Student: \n";
echo " - ID: $student_id\n";
echo " - Name: $name\n";
echo " - Class: $class\n";
echo " - A/C No: $ac_no\n";
echo " - Session: $session\n\n";

// Helper function to mock headers_sent and HTTP status codes in CLI
if (!function_exists('http_response_code')) {
    function http_response_code($code = NULL) {
        static $current_code = 200;
        if ($code !== NULL) {
            $current_code = $code;
        }
        return $current_code;
    }
}

// Helper to run endpoint
function run_endpoint($file, $method, $get = [], $post = []) {
    global $con;
    $_SERVER['REQUEST_METHOD'] = $method;
    $_GET = $get;
    $_POST = $post;
    
    // Clear any previous response headers/codes
    http_response_code(200);
    
    ob_start();
    include __DIR__ . '/' . $file;
    $output = ob_get_clean();
    
    // Clean UTF-8 BOM and whitespace
    $output = preg_replace('/^\xEF\xBB\xBF/', '', $output);
    $output = trim($output);
    
    return [
        'code' => http_response_code(),
        'body' => json_decode($output, true),
        'raw_body' => $output
    ];
}

// Test 1: GET search_by_ac.php
echo "TEST 1: Querying search_by_ac.php...\n";
$res1 = run_endpoint('search_by_ac.php', 'GET', ['ac' => $ac_no, 'session' => $session]);
if ($res1['code'] === 200 && isset($res1['body']['status']) && $res1['body']['status'] === true) {
    echo "PASS: search_by_ac.php returned 200 OK\n";
    echo " - Total Students found: " . count($res1['body']['data']['students']) . "\n";
    echo " - Grand Total Due: " . $res1['body']['data']['grand_totals']['total_amount'] . "\n";
    echo " - Grand Total Received: " . $res1['body']['data']['grand_totals']['received_amount'] . "\n";
    echo " - Grand Total Balance: " . $res1['body']['data']['grand_totals']['balance_amount'] . "\n";
} else {
    echo "FAIL: search_by_ac.php failed. Code: {$res1['code']}, Body: {$res1['raw_body']}\n";
    exit(1);
}
echo "\n";

// Test 2: GET get_payment_details.php
echo "TEST 2: Querying get_payment_details.php...\n";
$res2 = run_endpoint('get_payment_details.php', 'GET', ['student_id' => $student_id, 'session' => $session]);
if ($res2['code'] === 200 && isset($res2['body']['status']) && $res2['body']['status'] === true) {
    echo "PASS: get_payment_details.php returned 200 OK\n";
    echo " - Next Receipt No: " . $res2['body']['data']['next_receipt_no'] . "\n";
    echo " - Siblings count: " . count($res2['body']['data']['siblings']) . "\n";
} else {
    echo "FAIL: get_payment_details.php failed. Code: {$res2['code']}, Body: {$res2['raw_body']}\n";
    exit(1);
}
echo "\n";

// Test 3: POST pay_fee.php
echo "TEST 3: Submitting fee payment via pay_fee.php...\n";
$school_receipt = 'TEST-' . time();
$pay_amount = 1500.00;
$concession = 100.00;
$deposit_amount = $pay_amount - $concession;
$payment_mode = 'Online';
$remarks = 'CLI API Unit Test Payment';

$post_data = [
    'student_id' => $student_id,
    'session' => $session,
    'pay_amount' => $pay_amount,
    'concession' => $concession,
    'deposit_amount' => $deposit_amount,
    'payment_mode' => $payment_mode,
    'remarks' => $remarks,
    'school_receipt' => $school_receipt,
    'school' => 'api-tester'
];

$res3 = run_endpoint('pay_fee.php', 'POST', [], $post_data);
if ($res3['code'] === 201 && isset($res3['body']['status']) && $res3['body']['status'] === true) {
    echo "PASS: pay_fee.php returned 201 Created\n";
    $receipt_no = $res3['body']['data']['receipt_no'];
    $fee_detail_id = $res3['body']['data']['id'];
    echo " - Created Fee Detail ID: $fee_detail_id\n";
    echo " - Generated Receipt No: $receipt_no\n";
    
    // Verify record in Database
    $verify_query = mysqli_query($con, "SELECT * FROM fee_detail WHERE id = '$fee_detail_id'");
    if ($verify_query && mysqli_num_rows($verify_query) > 0) {
        $db_record = mysqli_fetch_assoc($verify_query);
        echo "PASS: Verified inserted database record successfully.\n";
        
        // Assertions
        $assertions = [
            'session' => $session,
            'class' => $class,
            'name' => $name,
            'student' => $student_id,
            'inst_fee' => $pay_amount,
            'pay_type' => $payment_mode,
            'fee_deposit' => $deposit_amount,
            'conc' => $concession,
            'sreceipt' => $school_receipt,
            'remark' => $remarks
        ];
        
        foreach ($assertions as $col => $expected) {
            if ($db_record[$col] == $expected) {
                echo "   [OK] Column '$col' matches value '$expected'\n";
            } else {
                echo "   [FAIL] Column '$col' has value '{$db_record[$col]}', expected '$expected'\n";
                exit(1);
            }
        }
        
        // Cleanup the test record
        mysqli_query($con, "DELETE FROM fee_detail WHERE id = '$fee_detail_id'");
        echo "\nPASS: Cleaned up test record (ID: $fee_detail_id) from the database.\n";
    } else {
        echo "FAIL: Record not found in database after insertion!\n";
        exit(1);
    }
} else {
    echo "FAIL: pay_fee.php failed. Code: {$res3['code']}, Body: {$res3['raw_body']}\n";
    exit(1);
}

echo "\n=== ALL TESTS PASSED SUCCESSFULLY! ===\n";
?>
