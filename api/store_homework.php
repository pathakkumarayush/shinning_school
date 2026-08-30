<?php
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

// Validate required fields
$requiredFields = ['class', 'subject', 'homework', 'datefrom', 'dateto', 'teacher_id', 'assign_by', 'session'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        echo json_encode(['status' => false, 'message' => "Missing field: $field"]);
        exit;
    }
}

// Sanitize input
$class      = mysqli_real_escape_string($con, $_POST['class']);
$subject    = mysqli_real_escape_string($con, $_POST['subject']);
$homework   = mysqli_real_escape_string($con, $_POST['homework']);
$teacher_id = mysqli_real_escape_string($con, $_POST['teacher_id']);
$assign_by  = mysqli_real_escape_string($con, $_POST['assign_by']);
$session    = mysqli_real_escape_string($con, $_POST['session']);

// Convert dates from d-m-Y to d-M-Y
$datefromObj = DateTime::createFromFormat('d-m-Y', $_POST['datefrom']);
$datetoObj   = DateTime::createFromFormat('d-m-Y', $_POST['dateto']);

if (!$datefromObj || !$datetoObj) {
    echo json_encode(['status' => false, 'message' => 'Invalid date format. Use d-m-Y']);
    exit;
}

$datefrom   = $datefromObj->format('d-M-Y'); // e.g. 17-Jul-2025
$dateto     = $datetoObj->format('d-m-Y');
$assigndate = date('d-m-Y');               // today

// Handle optional file upload
$image_name = null;
if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
    $file_name  = $_FILES['file']['name'];
    $tmp_name   = $_FILES['file']['tmp_name'];
    $ext        = pathinfo($file_name, PATHINFO_EXTENSION);
    $image_name = time() . '.' . $ext;

    $uploadPath = "../school/uploads/homework/";
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    if (!move_uploaded_file($tmp_name, $uploadPath . $image_name)) {
        echo json_encode(['status' => false, 'message' => 'File upload failed']);
        exit;
    }
}

// Insert into database
$query = "INSERT INTO homework (class_id, subject_id, homwork, datefrom, dateto, assign_by, teach_id, session, image, assigndate)
          VALUES ('$class', '$subject', '$homework', '$datefrom', '$dateto', '$assign_by', '$teacher_id', '$session', '$image_name', '$assigndate')";

if (mysqli_query($con, $query)) {
    // ✅ Return success FIRST — push notification is best-effort only
    echo json_encode(['status' => true, 'message' => 'Homework added successfully']);

    // ✅ Send push notification only if function is available
    if (function_exists('send_push_notif_to_device')) {
        $stuQuery  = "SELECT uid FROM student WHERE student_session = '$session' AND student_class = '$class'";
        $stuResult = mysqli_query($con, $stuQuery);
        $user_ids  = [];
        if ($stuResult) {
            while ($row = mysqli_fetch_assoc($stuResult)) {
                if (!empty($row['uid'])) {
                    $user_ids[] = $row['uid'];
                }
            }
        }
        if (!empty($user_ids)) {
            $notif = [
                'title'       => 'Teacher Upload homework',
                'description' => $homework,
                'type'        => 'homework',
                'type_id'     => 1,
                'image'       => null
            ];
            send_push_notif_to_device($con, $user_ids, $notif);
        }
    }
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
