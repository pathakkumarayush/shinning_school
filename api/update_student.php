<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // DB connection file

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = ['status' => false, 'message' => ''];

// Get input from POST (form-data)
$student_id     = isset($_POST['student_id']) ? mysqli_real_escape_string($con, $_POST['student_id']) : '';
$session        = isset($_POST['session']) ? mysqli_real_escape_string($con, $_POST['session']) : '';
$aadhar_no      = isset($_POST['aadhar_no']) ? mysqli_real_escape_string($con, $_POST['aadhar_no']) : null;
$sssmid         = isset($_POST['sssmid']) ? mysqli_real_escape_string($con, $_POST['sssmid']) : null;
$account_no     = isset($_POST['account_no']) ? mysqli_real_escape_string($con, $_POST['account_no']) : null;
$ifsc_code      = isset($_POST['ifsc_code']) ? mysqli_real_escape_string($con, $_POST['ifsc_code']) : null;
$bank_name      = isset($_POST['bank_name']) ? mysqli_real_escape_string($con, $_POST['bank_name']) : null;
$father_mobile  = isset($_POST['father_mobile']) ? mysqli_real_escape_string($con, $_POST['father_mobile']) : null;
$address        = isset($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : null;
$dob            = isset($_POST['dob']) ? mysqli_real_escape_string($con, $_POST['dob']) : null;

// Validation
if ($student_id === '' || $session === '') {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'student_id and session are required']);
    exit;
}

// Convert DOB to Y-m-d if provided
if ($dob) {
    $dob = date("Y-m-d", strtotime($dob));
}

// Update student details
$query = "
    UPDATE student SET 
        student_rollno     = '$aadhar_no',
        religion           = '$sssmid',
        mother_tong        = '$account_no',
        fid                = '$ifsc_code',
        bn                 = '$bank_name',
        student_contactno  = '$father_mobile',
        student_address    = '$address',
        student_dob        = '$dob'
    WHERE student_id = '$student_id' AND student_session = '$session'
";
$updated = mysqli_query($con, $query);

// Image upload if provided
if (isset($_FILES['student_img']) && $_FILES['student_img']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = "../school/upload/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Delete old image if exists
    $oldImgRes = mysqli_query($con, "SELECT student_img FROM student WHERE student_id='$student_id'");
    if ($oldImgRes && mysqli_num_rows($oldImgRes) > 0) {
        $oldImg = mysqli_fetch_assoc($oldImgRes)['student_img'];
        $oldPath = $upload_dir . $oldImg;
        if ($oldImg && file_exists($oldPath)) {
            unlink($oldPath);
        }
    }

    // Save new image
    $ext = pathinfo($_FILES['student_img']['name'], PATHINFO_EXTENSION);
    $file_name = $student_id . "_" . time() . "." . $ext;
    $target_path = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES['student_img']['tmp_name'], $target_path)) {
        $imgQuery = "UPDATE student SET student_img = '$file_name' WHERE student_id = '$student_id'";
        mysqli_query($con, $imgQuery);
        $response['image'] = $file_name;
    } else {
        $response['warning'] = "Image upload failed, details updated only.";
    }
}

// Final Response
if (mysqli_affected_rows($con) > 0 || (isset($response['image']))) {
    $response['status'] = true;
    $response['message'] = "Student details updated successfully.";
} else {
    $response['message'] = "No changes made or student not found.";
}

echo json_encode($response);
?>
