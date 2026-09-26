<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust this path based on your folder structure

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

// Validate required fields
$requiredFields = ['class','session'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['status' => false, 'message' => "Missing field: $field"]);
        exit;
    }
}

// Sanitize input
$class       = mysqli_real_escape_string($con, $_POST['class']);
$session       = mysqli_real_escape_string($con, $_POST['session']);

// Handle optional file upload
$image_name = null;
if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
    $file_name = $_FILES['file']['name'];
    $tmp_name  = $_FILES['file']['tmp_name'];
    $ext       = pathinfo($file_name, PATHINFO_EXTENSION);
    $image_name = time() . '.' . $ext;

    $uploadDir = "../school/uploads/timetable/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadPath = $uploadDir . $image_name;

    if (!move_uploaded_file($tmp_name, $uploadPath)) {
        echo json_encode(['status' => false, 'message' => 'File upload failed']);
        exit;
    }
}

// Insert into database
$checkQuery = "SELECT id FROM class_timetable WHERE class_id = '$class' AND session = '$session'";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Update existing
    $query = "UPDATE class_timetable 
              SET image = '$image_name' 
              WHERE class_id = '$class' AND session = '$session'";
} else {
    // Insert new
    $query = "INSERT INTO class_timetable (class_id, image, session)
              VALUES ('$class', '$image_name', '$session')";
}

if (mysqli_query($con, $query)) {
	
	$query = "SELECT * FROM student WHERE student_session = '" . $session . "' AND student_class = '" . $class . "'";

$result = mysqli_query($con, $query);
	
if ($result || mysqli_num_rows($result) > 0) {
	$user_ids= [];
   while ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['uid'])) {   // ✅ make sure uid exists
            $user_ids[] = $row['uid'];
        }
    }
	    $data = [
             'title' => "Teacher Upload class timetable",
             'description' =>'check your timetable',
            'type' => 'timetable',
            'type_id' => 1,
            'image' => null
         ];
      
	
       send_push_notif_to_device($con,$user_ids, $data);
}
	
    echo json_encode(['status' => true, 'message' => 'Timetable added successfully']);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
