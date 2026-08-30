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
$type = isset($_GET['type']) ? trim($_GET['type']) : 'tuition';

// Determine table based on type
$fee_table = ($type === 'transport') ? 'fee_detail_trans' : 'fee_detail';

// Default session if not provided
if (!$session) {
    // Try to get latest session from student table
    $ses_q = mysqli_query($con, "SELECT DISTINCT student_session FROM student ORDER BY student_id DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['student_session'] ?? null;
}

if (!$session) {
    echo json_encode(['status' => false, 'message' => 'Session could not be determined']);
    exit;
}

// Get students for the session
$student_query = "SELECT student_id, student_name, student_fname, student_contactno, student_class 
                 FROM student 
                 WHERE student_session = '$session' AND rti = 'No' AND status = '0' 
                 ORDER BY student_class, student_name ASC";
$student_result = mysqli_query($con, $student_query);

if (!$student_result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$concession_report = [];
$total_concession_amount = 0;

while ($student = mysqli_fetch_assoc($student_result)) {
    // Sum concession for this student
    $fee_query = "SELECT SUM(concession) as total_concession 
                  FROM $fee_table 
                  WHERE student = '".$student['student_id']."' AND status = '1' AND session = '$session'";
    $fee_result = mysqli_query($con, $fee_query);
    $fee_data = mysqli_fetch_assoc($fee_result);
    
    $concession_amount = (float)($fee_data['total_concession'] ?? 0);
    
    if ($concession_amount > 0) {
        $concession_report[] = [
            'student_id' => $student['student_id'],
            'student_name' => $student['student_name'],
            'father_name' => $student['student_fname'],
            'mobile' => $student['student_contactno'],
            'class' => $student['student_class'],
            'concession_amount' => $concession_amount
        ];
        $total_concession_amount += $concession_amount;
    }
}

echo json_encode([
    'status' => true,
    'type' => $type,
    'session' => $session,
    'count' => count($concession_report),
    'total_concession_amount' => $total_concession_amount,
    'data' => $concession_report
]);
