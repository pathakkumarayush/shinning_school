<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Read input (support JSON & Form Data)
$input = json_decode(file_get_contents('php://input'), true);
if (!$input) {
    $input = $_POST;
}

$session    = isset($input['session']) ? trim($input['session']) : '';
$class      = isset($input['class']) ? trim($input['class']) : (isset($input['cid']) ? trim($input['cid']) : '');
$student_id = isset($input['student_id']) ? trim($input['student_id']) : (isset($input['sid']) ? trim($input['sid']) : (isset($input['stdid']) ? trim($input['stdid']) : ''));
$amount     = isset($input['amount']) ? trim($input['amount']) : (isset($input['pfee']) ? trim($input['pfee']) : (isset($input['amt']) ? trim($input['amt']) : ''));
$remark     = isset($input['remark']) ? trim($input['remark']) : (isset($input['rmk']) ? trim($input['rmk']) : '');
$ac_no      = isset($input['ac_no']) ? trim($input['ac_no']) : (isset($input['account_no']) ? trim($input['account_no']) : '');

// Validation
$errors = [];
if ($session === '') {
    $errors[] = 'Session is required';
}
if ($class === '') {
    $errors[] = 'Class is required';
}
if ($student_id === '') {
    $errors[] = 'Student ID is required';
}
if ($amount === '' || !is_numeric($amount)) {
    $errors[] = 'Valid Amount is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => implode(', ', $errors),
        'errors' => $errors
    ]);
    exit;
}

// Sanitize inputs
$session_esc    = mysqli_real_escape_string($con, $session);
$class_esc      = mysqli_real_escape_string($con, $class);
$student_id_esc = mysqli_real_escape_string($con, $student_id);
$amount_esc     = (float)$amount;
$remark_esc     = mysqli_real_escape_string($con, $remark);

// If ac_no is not provided, fetch from student table
if ($ac_no === '') {
    $stu_q = mysqli_query($con, "SELECT sedate FROM student WHERE student_id = '$student_id_esc' AND student_session = '$session_esc' LIMIT 1");
    if ($stu_q && $stu_row = mysqli_fetch_assoc($stu_q)) {
        $ac_no = $stu_row['sedate'] ?? '';
    }
}
$ac_no_esc = mysqli_real_escape_string($con, $ac_no);

// Check if previous fee record already exists for this student in this session
$check_q = mysqli_query($con, "SELECT id FROM privious_fee WHERE sid = '$student_id_esc' AND session = '$session_esc' LIMIT 1");

if ($check_q && mysqli_num_rows($check_q) > 0) {
    $existing = mysqli_fetch_assoc($check_q);
    $fee_id = (int)$existing['id'];

    $update_query = "UPDATE privious_fee 
                     SET cid = '$class_esc', amt = '$amount_esc', rmk = '$remark_esc', ac_no = '$ac_no_esc', status = '1'
                     WHERE id = $fee_id";

    if (mysqli_query($con, $update_query)) {
        http_response_code(200);
        echo json_encode([
            'status' => true,
            'message' => 'Previous fee updated successfully',
            'data' => [
                'id'         => $fee_id,
                'session'    => $session,
                'class'      => $class,
                'student_id' => $student_id,
                'amount'     => $amount_esc,
                'remark'     => $remark,
                'ac_no'      => $ac_no,
                'action'     => 'updated'
            ]
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'status' => false,
            'message' => 'Database error: ' . mysqli_error($con)
        ]);
    }
} else {
    // Insert into privious_fee
    $query = "INSERT INTO privious_fee (cid, sid, amt, session, rmk, ac_no, status) 
              VALUES ('$class_esc', '$student_id_esc', '$amount_esc', '$session_esc', '$remark_esc', '$ac_no_esc', '1')";

    if (mysqli_query($con, $query)) {
        $insert_id = mysqli_insert_id($con);
        http_response_code(200);
        echo json_encode([
            'status' => true,
            'message' => 'Previous fee added successfully',
            'data' => [
                'id'         => $insert_id,
                'session'    => $session,
                'class'      => $class,
                'student_id' => $student_id,
                'amount'     => $amount_esc,
                'remark'     => $remark,
                'ac_no'      => $ac_no,
                'action'     => 'created'
            ]
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'status' => false,
            'message' => 'Database error: ' . mysqli_error($con)
        ]);
    }
}
