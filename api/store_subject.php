<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust path as needed

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Get input
$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST; // fallback if form-data
}

$subject_id = isset($input['subject_id']) ? trim($input['subject_id']) : '';
$class      = isset($input['class']) ? trim($input['class']) : '';
$name       = isset($input['name']) ? trim($input['name']) : '';
$period     = isset($input['period']) ? trim($input['period']) : '';
$session    = isset($input['session']) ? trim($input['session']) : '';

// Validate
if ($session === '' || $class === '' || $name === '' || $period === '') {
    http_response_code(400);
    $response['message'] = 'All fields (session, class, name, period) are required.';
    echo json_encode($response);
    exit;
}

// Sanitize
$session_esc = mysqli_real_escape_string($con, $session);
$class_esc   = mysqli_real_escape_string($con, $class);
$name_esc    = mysqli_real_escape_string($con, $name);
$period_esc  = (int)$period;
$subject_id_esc = $subject_id !== '' ? (int)$subject_id : 0;

// If subject_id provided → update that record
if ($subject_id_esc > 0) {
    $updateQuery = "UPDATE subjects 
                    SET session = '$session_esc', 
                        class = '$class_esc', 
                        name = '$name_esc', 
                        no_of_periods = '$period_esc' 
                    WHERE subj_id = '$subject_id_esc'";
    if (mysqli_query($con, $updateQuery)) {
        if (mysqli_affected_rows($con) > 0) {
            $response['status'] = true;
            $response['message'] = "Subject updated successfully (by ID).";
        } else {
            $response['message'] = "No subject found with given ID.";
        }
    } else {
        $response['message'] = "Failed to update subject: " . mysqli_error($con);
    }
} else {
    // Otherwise → check by (session + class + name)
    $checkQuery = "SELECT * FROM subjects 
                   WHERE session = '$session_esc' 
                     AND class = '$class_esc' 
                     AND name = '$name_esc' 
                   LIMIT 1";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Update existing
        $updateQuery = "UPDATE subjects 
                        SET no_of_periods = '$period_esc' 
                        WHERE session = '$session_esc' 
                          AND class = '$class_esc' 
                          AND name = '$name_esc'";
        if (mysqli_query($con, $updateQuery)) {
            $response['status'] = true;
            $response['message'] = "Subject updated successfully.";
        } else {
            $response['message'] = "Failed to update subject: " . mysqli_error($con);
        }
    } else {
        // Insert new
        $insertQuery = "INSERT INTO subjects (session, class, name, no_of_periods, school) 
                        VALUES ('$session_esc', '$class_esc', '$name_esc', '$period_esc', 'scottish')";
        if (mysqli_query($con, $insertQuery)) {
            $response['status'] = true;
            $response['message'] = "Subject added successfully.";
            $response['data'] = ['id' => mysqli_insert_id($con)];
        } else {
            $response['message'] = "Failed to add subject: " . mysqli_error($con);
        }
    }
}

echo json_encode($response);
?>
