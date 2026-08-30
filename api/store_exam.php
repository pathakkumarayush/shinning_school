<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Get input JSON or form-data
$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST;
}

$examination_id = isset($input['exam_id']) ? trim($input['exam_id']) : '';
$name           = isset($input['name']) ? trim($input['name']) : '';
$date           = isset($input['date']) ? trim($input['date']) : '';
$session        = isset($input['session']) ? trim($input['session']) : '';
$school         = isset($input['school']) && trim($input['school']) !== '' ? trim($input['school']) : 'shining';

// Validation
if ($name === '' || $date === '' || $session === '') {
    http_response_code(400);
    $response['message'] = 'All fields (name, date, session) are required.';
    echo json_encode($response);
    exit;
}

// Sanitize
$name_esc    = mysqli_real_escape_string($con, $name);
$date_esc    = mysqli_real_escape_string($con, $date);
$session_esc = mysqli_real_escape_string($con, $session);
$exam_id_esc = $examination_id !== '' ? (int)$examination_id : 0;

// If examination_id is provided → update by ID
if ($exam_id_esc > 0) {
    $updateQuery = "UPDATE examinationa 
                    SET examination_name = '$name_esc',
                        examination_date = '$date_esc',
                        examination_session = '$session_esc'
                    WHERE examination_id = '$exam_id_esc'";
    if (mysqli_query($con, $updateQuery)) {
        if (mysqli_affected_rows($con) > 0) {
            $response['status'] = true;
            $response['message'] = "Exam updated successfully (by ID).";
        } else {
            $response['message'] = "No exam found with given ID.";
        }
    } else {
        $response['message'] = "Failed to update exam: " . mysqli_error($con);
    }
} else {
    // Otherwise check if term already exists by (name + session)
    $checkQuery = "SELECT * FROM examination 
                   WHERE examination_name = '$name_esc' 
                     AND examination_session = '$session_esc' 
                   LIMIT 1";
    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Update existing by (name + session)
        $updateQuery = "UPDATE examination 
                        SET examination_date = '$date_esc' 
                        WHERE examination_name = '$name_esc' 
                          AND examination_session = '$session_esc'";
        if (mysqli_query($con, $updateQuery)) {
            $response['status'] = true;
            $response['message'] = "Exam updated successfully.";
        } else {
            $response['message'] = "Failed to update term: " . mysqli_error($con);
        }
    } else {
        // Insert new
        $school_esc  = mysqli_real_escape_string($con, $school);
        $insertQuery = "INSERT INTO examination (examination_name, examination_date, examination_session, school) 
                        VALUES ('$name_esc', '$date_esc', '$session_esc', '$school_esc')";
        if (mysqli_query($con, $insertQuery)) {
            $response['status'] = true;
            $response['message'] = "Exam added successfully.";
            $response['data'] = ['id' => mysqli_insert_id($con)];
        } else {
            $response['message'] = "Failed to add exam: " . mysqli_error($con);
        }
    }
}

echo json_encode($response);
?>
