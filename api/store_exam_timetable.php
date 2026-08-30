<?php
ini_set('display_errors', 0);
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');

require '../db.php';

// ✅ Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

// ✅ Accept both form-data and JSON body
$input = $_POST;
if (empty($input)) {
    $json = file_get_contents('php://input');
    if (!empty($json)) {
        $decoded = json_decode($json, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            $input = $decoded;
        }
    }
}

if (empty($input)) {
    echo json_encode(['status' => false, 'message' => 'Request body is empty or invalid']);
    exit;
}

// ✅ Validate required fields (edate and min_marks are optional)
$required = ['examination', 'session', 'class', 'subject', 'sdate', 'marks'];
foreach ($required as $field) {
    if (!isset($input[$field]) || trim($input[$field]) === '') {
        echo json_encode(['status' => false, 'message' => "$field is required"]);
        exit;
    }
}

// ✅ Sanitize inputs
$examination = mysqli_real_escape_string($con, trim($input['examination']));
$session     = mysqli_real_escape_string($con, trim($input['session']));
$class       = mysqli_real_escape_string($con, trim($input['class']));
$subject     = mysqli_real_escape_string($con, trim($input['subject']));
$sdate       = mysqli_real_escape_string($con, trim($input['sdate']));
$edate       = mysqli_real_escape_string($con, isset($input['edate']) ? trim($input['edate']) : '');
$marks       = mysqli_real_escape_string($con, trim($input['marks']));
$min_marks   = mysqli_real_escape_string($con, isset($input['min_marks']) ? trim($input['min_marks']) : '0');
// Accept school from request or default to shining
$school      = isset($input['school']) && trim($input['school']) !== ''
               ? mysqli_real_escape_string($con, trim($input['school']))
               : 'shining';

// ✅ Check if record exists
$checkQuery = "SELECT exam_id FROM exam 
               WHERE examination = '$examination' 
               AND session = '$session' 
               AND class = '$class' 
               AND subject = '$subject' 
               LIMIT 1";

$checkResult = mysqli_query($con, $checkQuery);

if ($checkResult && mysqli_num_rows($checkResult) > 0) {
    // ✅ Record exists → Update
    $row     = mysqli_fetch_assoc($checkResult);
    $exam_id = $row['exam_id'];

    $updateQuery = "UPDATE exam 
                    SET sdate = '$sdate', marks = '$marks', min_marks = '$min_marks', school = '$school'
                    WHERE exam_id = '$exam_id'";

    if (mysqli_query($con, $updateQuery)) {
        echo json_encode([
            'status'  => true,
            'message' => 'Exam timetable updated successfully',
            'exam_id' => $exam_id
        ]);
    } else {
        echo json_encode([
            'status'  => false,
            'message' => 'Update failed: ' . mysqli_error($con)
        ]);
    }

} else {
    // ✅ Record does not exist → Insert
    $insertQuery = "INSERT INTO exam (examination, session, class, subject, sdate, edate, marks, min_marks, school) 
                    VALUES ('$examination', '$session', '$class', '$subject', '$sdate', '$edate', '$marks', '$min_marks', '$school')";

    if (mysqli_query($con, $insertQuery)) {
        echo json_encode([
            'status'  => true,
            'message' => 'Exam timetable added successfully',
            'exam_id' => mysqli_insert_id($con)
        ]);
    } else {
        echo json_encode([
            'status'  => false,
            'message' => 'Insert failed: ' . mysqli_error($con)
        ]);
    }
}
