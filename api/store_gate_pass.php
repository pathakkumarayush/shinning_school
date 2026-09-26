<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$type = isset($_POST['type']) ? trim($_POST['type']) : 'normal';
$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

$name = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';
$purpose = isset($_POST['purpose']) ? mysqli_real_escape_string($con, $_POST['purpose']) : ''; // fname
$meet_with = isset($_POST['meet_with']) ? mysqli_real_escape_string($con, $_POST['meet_with']) : ''; // mname
$mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($con, $_POST['mobile']) : '';
$address = isset($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : '';
$has_vehicle = isset($_POST['has_vehicle']) ? mysqli_real_escape_string($con, $_POST['has_vehicle']) : 'No'; // gender
$vehicle_type = isset($_POST['vehicle_type']) ? mysqli_real_escape_string($con, $_POST['vehicle_type']) : ''; // aclass
$vehicle_no = isset($_POST['vehicle_no']) ? mysqli_real_escape_string($con, $_POST['vehicle_no']) : ''; // city

$remark_purpose = isset($_POST['remark_purpose']) ? mysqli_real_escape_string($con, $_POST['remark_purpose']) : ''; // rmkm
$remark_meet_with = isset($_POST['remark_meet_with']) ? mysqli_real_escape_string($con, $_POST['remark_meet_with']) : ''; // rmkw

$session = isset($_POST['session']) ? mysqli_real_escape_string($con, $_POST['session']) : '';
$school = isset($_POST['school']) ? mysqli_real_escape_string($con, $_POST['school']) : '';

$student_class = isset($_POST['student_class']) ? mysqli_real_escape_string($con, $_POST['student_class']) : ''; // student
$student_name = isset($_POST['student_name']) ? mysqli_real_escape_string($con, $_POST['student_name']) : ''; // fn

$percentage = '';

if (empty($name) || empty($purpose) || empty($mobile)) {
    echo json_encode(['status' => false, 'message' => 'Name, Purpose, and Mobile are required.']);
    exit;
}

$table = ($type === 'parent') ? 'enquiry_passs' : 'enquiry_pass';
$dt2 = date("Y-m-d");
$dt4 = date("H:i:s");

if ($id) {
    if ($type === 'parent') {
        $query = "UPDATE $table SET name='$name', fname='$purpose', mname='$meet_with', aclass='$vehicle_type', mobile='$mobile', address='$address', gender='$has_vehicle', city='$vehicle_no', rmkm='$remark_purpose', rmkw='$remark_meet_with', student='$student_class', fn='$student_name' WHERE id='$id'";
    } else {
        $query = "UPDATE $table SET name='$name', fname='$purpose', mname='$meet_with', aclass='$vehicle_type', mobile='$mobile', address='$address', gender='$has_vehicle', city='$vehicle_no', rmkm='$remark_purpose', rmkw='$remark_meet_with' WHERE id='$id'";
    }
    $msg = "Gate pass updated successfully.";
} else {
    if ($type === 'parent') {
        $query = "INSERT INTO $table (name, fname, mname, dob, aclass, pclass, percentage, mobile, address, gender, session, city, school, rmkm, rmkw, student, fn) VALUES ('$name', '$purpose', '$meet_with', '$dt2', '$vehicle_type', '$dt4', '$percentage', '$mobile', '$address', '$has_vehicle', '$session', '$vehicle_no', '$school', '$remark_purpose', '$remark_meet_with', '$student_class', '$student_name')";
    } else {
        $query = "INSERT INTO $table (name, fname, mname, dob, aclass, pclass, percentage, mobile, address, gender, session, city, school, rmkm, rmkw) VALUES ('$name', '$purpose', '$meet_with', '$dt2', '$vehicle_type', '$dt4', '$percentage', '$mobile', '$address', '$has_vehicle', '$session', '$vehicle_no', '$school', '$remark_purpose', '$remark_meet_with')";
    }
    $msg = "Gate pass created successfully.";
}

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => $msg]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
