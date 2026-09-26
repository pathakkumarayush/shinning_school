<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require 'auth.php'; // This gives you $uid and $con from previous authentication

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// ✅ Validate input
if (!$_GET|| !isset($_GET['session'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}
$session_uid = $session_uid ?? $_GET['user_id'] ?? '';
$session = $_GET['session'];
if($session_type == 'student'){
// Query user by UID
$result = mysqli_query($con, "SELECT * FROM student WHERE uid = '$session_uid' and student_session = '$session'");
}elseif($session_type == 'teacher'){
 $result = mysqli_query($con, "
    SELECT 
        t.*, 
        l.id AS login_id,
        l.uid AS login_uid,
        l.teacher_type ,
        l.pass AS login_pass
    FROM teacher t
    INNER JOIN login l ON l.uid = t.teacher_username
    WHERE t.teacher_username = '$session_uid'
");

}else{
  $result =  mysqli_query($con, "SELECT id, uid, pass, type FROM login WHERE uid = '$session_uid'");
}

if (!$result || mysqli_num_rows($result) == 0) {
    http_response_code(404); // Not Found
    echo json_encode(['status' => false, 'message' => 'User not found']);
    exit;
}

$data = mysqli_fetch_assoc($result);
if ($session_type == 'teacher') {
    $data['id'] = (int)($data['id'] ?? 0);
    $data['teacher_id'] = (int)($data['teacher_id'] ?? $data['id']);
    $data['login_password'] = $data['login_pass'] ?? '';
}

if ($session_type == 'student' && !empty($data['student_img'])) {
    $data['student_img'] = 'school/upload/' . basename($data['student_img']);
}

if ($session_type == 'student') {
    if (!empty($data['student_dob'])) {
        $data['student_dob'] = date("d-M-Y", strtotime($data['student_dob']));
    }
    if (!empty($data['student_doj'])) {
        $data['student_doj'] = date("d-M-Y", strtotime($data['student_doj']));
    }
}

http_response_code(200); // OK
echo json_encode([
    'status' => true,
    'message' => 'User fetched successfully',
    'user' => $data
]);
