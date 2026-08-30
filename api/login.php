<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require '../db.php';
session_start();

// ✅ Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// ✅ Read and decode JSON input
$input = file_get_contents("php://input");
$data = json_decode($input);

// ✅ Validate input
if (!$data || !isset($data->username) || !isset($data->password) || !isset($data->session)) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Username, password, and session are required']);
    exit;
}

$username = $data->username;
$password = $data->password;
$session = $data->session;
$fcm_token  = $data->fcm_token ?? null; // optional fcm_token
// Generate a random token (e.g., 64 characters)
$token = bin2hex(random_bytes(32));
// ✅ Check login credentials
$stmt = $con->prepare("SELECT id, uid, pass, type, teacher_type FROM login WHERE uid = ? AND pass = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    http_response_code(401); // Unauthorized
    echo json_encode(['status' => false, 'message' => 'Invalid username or password']);
    exit;
}

$user = $result->fetch_assoc();
$detail = [];

if ($user['type'] === 'student') {
    $res_all = mysqli_query($con, "SELECT * FROM student WHERE  student_session='$session' AND uid='$username'");
    $detail = mysqli_fetch_assoc($res_all);
    
    if ($detail) {
        if (!empty($detail['student_img'])) {
            $detail['student_img'] = 'school/upload/' . basename($detail['student_img']);
        }
        if (!empty($detail['student_dob'])) {
            $detail['student_dob'] = date("d-M-Y", strtotime($detail['student_dob']));
        }
        if (!empty($detail['student_doj'])) {
            $detail['student_doj'] = date("d-M-Y", strtotime($detail['student_doj']));
        }
    }
} elseif ($user['type'] === 'teacher') {
    $res_all = mysqli_query($con, "SELECT * FROM teacher WHERE  teacher_username='$username' AND teacher_session='$session'");
    $detail = mysqli_fetch_assoc($res_all);
} elseif ($user['uid'] === 'admin') {
     $detail = $user;
} else {
     http_response_code(401); // Unauthorized
    echo json_encode(['status' => false, 'message' => 'You have no permission to login']);
    exit;
}

// Save token in a table (e.g., user_tokens)
$uid = $user['uid'];
$created_at = date('Y-m-d H:i:s');
$type = $user['type'];
mysqli_query($con, "INSERT INTO user_tokens (type, uid, token, created_at) VALUES ('$type','$uid', '$token', '$created_at')")
    or die(mysqli_error($con));

// ✅ If fcm_token provided → update in login table
if ($fcm_token) {
    $stmt_fcm = $con->prepare("UPDATE login SET fcm_token = ? WHERE uid = ?");
    $stmt_fcm->bind_param("ss", $fcm_token, $uid);
    $stmt_fcm->execute();
    $stmt_fcm->close();
	
}

// ✅ Success Response
http_response_code(200);
echo json_encode([
    'status' => true,
    'token' => $token,
    'teacher_type' => $user['teacher_type'],
     'type' => $user['type'],
    'message' => 'Login successful',
    'user_id' => $user['uid'],
    'detail' => $detail
]);
?>
