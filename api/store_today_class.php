<?php
ini_set('display_errors', 1);
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

$response = [
    'status' => false,
    'message' => ''
];

// Get input
$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST;
}

$teacher_id   = isset($input['teacher_id']) ? trim($input['teacher_id']) : '';
$class        = isset($input['class']) ? trim($input['class']) : '';
$period       = isset($input['period']) ? trim($input['period']) : ''; // period name (e.g. "Period 1")
$subject      = isset($input['subject']) ? trim($input['subject']) : '';
$topic_taught = isset($input['topic_taught']) ? trim($input['topic_taught']) : '';
$remark       = isset($input['remark']) ? trim($input['remark']) : null;
$date_raw     = isset($input['date']) ? trim($input['date']) : '';
$session      = isset($input['session']) ? trim($input['session']) : '';

// Validation 1: Required fields check
if ($teacher_id === '' || $class === '' || $period === '' || $subject === '' || $topic_taught === '' || $date_raw === '' || $session === '') {
    http_response_code(422);
    $response['message'] = 'Missing required fields. (teacher_id, class, period, subject, topic_taught, date, session are required)';
    echo json_encode($response);
    exit;
}

// Validation 2: Parse and format date (expecting d-m-Y)
$dateObj = DateTime::createFromFormat('d-m-Y', $date_raw);
if (!$dateObj) {
    // Try fallback Y-m-d format
    $dateObj = DateTime::createFromFormat('Y-m-d', $date_raw);
    if (!$dateObj) {
        http_response_code(400);
        $response['message'] = 'Invalid date format. Use d-m-Y (e.g. 17-07-2026)';
        echo json_encode($response);
        exit;
    }
}
$db_date = $dateObj->format('Y-m-d'); // format to database format

// Sanitize inputs
$teacher_id_esc   = mysqli_real_escape_string($con, $teacher_id);
$class_esc        = mysqli_real_escape_string($con, $class);
$period_esc       = mysqli_real_escape_string($con, $period);
$subject_esc      = mysqli_real_escape_string($con, $subject);
$topic_taught_esc = mysqli_real_escape_string($con, $topic_taught);
$remark_esc       = $remark !== null ? "'" . mysqli_real_escape_string($con, $remark) . "'" : "NULL";
$session_esc      = mysqli_real_escape_string($con, $session);

try {
    // Validation 3: Verify teacher exists and is active
    $teacherCheck = mysqli_query($con, "SELECT id FROM teacher WHERE teacher_username = '$teacher_id_esc' AND status = 'Active' LIMIT 1");
    if (!$teacherCheck || mysqli_num_rows($teacherCheck) === 0) {
        http_response_code(404);
        $response['message'] = 'Teacher does not exist or is inactive';
        echo json_encode($response);
        exit;
    }

    // Validation 4: Verify class exists
    $classCheck = mysqli_query($con, "SELECT class_id FROM class WHERE class = '$class_esc' LIMIT 1");
    if (!$classCheck || mysqli_num_rows($classCheck) === 0) {
        http_response_code(404);
        $response['message'] = 'Class does not exist';
        echo json_encode($response);
        exit;
    }

    // Validation 5: Verify session exists
    $sessionCheck = mysqli_query($con, "SELECT id FROM sessions WHERE name = '$session_esc' LIMIT 1");
    if (!$sessionCheck || mysqli_num_rows($sessionCheck) === 0) {
        http_response_code(404);
        $response['message'] = 'Session does not exist';
        echo json_encode($response);
        exit;
    }

    // Validation 6: Verify period name exists and is active in period_master
    $periodCheck = mysqli_query($con, "SELECT id FROM period_master WHERE period_name = '$period_esc' AND status = 1 LIMIT 1");
    if (!$periodCheck || mysqli_num_rows($periodCheck) === 0) {
        http_response_code(404);
        $response['message'] = 'Period name does not exist or is inactive';
        echo json_encode($response);
        exit;
    }

    // Validation 7: Verify subject exists for this class and session
    $subjectCheck = mysqli_query($con, "SELECT subj_id FROM subjects WHERE name = '$subject_esc' AND class = '$class_esc' AND session = '$session_esc' LIMIT 1");
    if (!$subjectCheck || mysqli_num_rows($subjectCheck) === 0) {
        http_response_code(404);
        $response['message'] = 'Subject does not exist for this class and session';
        echo json_encode($response);
        exit;
    }

    // Validation 8: Check teacher mapping authorization
    $loginRes = mysqli_query($con, "SELECT teacher_type FROM login WHERE uid = '$teacher_id_esc' LIMIT 1");
    $loginData = mysqli_fetch_assoc($loginRes);
    if (!$loginData) {
        http_response_code(401);
        $response['message'] = 'Unauthorized access: Login profile not found';
        echo json_encode($response);
        exit;
    }
    $teacher_type = (int)$loginData['teacher_type'];

    $isAuthorized = false;

    // Check class teacher mapping if applicable
    if ($teacher_type === 1 || $teacher_type === 3) {
        $classTeacherCheck = mysqli_query($con, "
            SELECT id FROM class_teacher 
            WHERE class = '$class_esc' AND teacher = '$teacher_id_esc' AND teacher_session = '$session_esc' 
            LIMIT 1
        ");
        if ($classTeacherCheck && mysqli_num_rows($classTeacherCheck) > 0) {
            $isAuthorized = true;
        }
    }

    // Check subject teacher mapping if not already authorized
    if (!$isAuthorized && ($teacher_type === 2 || $teacher_type === 3)) {
        $subTeacherCheck = mysqli_query($con, "
            SELECT id FROM class_teacher_sub 
            WHERE class = '$class_esc' AND teacher = '$teacher_id_esc' AND sub = '$subject_esc' AND teacher_session = '$session_esc' 
            LIMIT 1
        ");
        if ($subTeacherCheck && mysqli_num_rows($subTeacherCheck) > 0) {
            $isAuthorized = true;
        }
    }

    if (!$isAuthorized) {
        http_response_code(403);
        $response['message'] = 'Teacher is not authorized to teach this subject in this class';
        echo json_encode($response);
        exit;
    }

    // Start Transaction
    mysqli_begin_transaction($con);

    // Search existing record using teacher_id, session, date, subject
    $searchQuery = "
        SELECT id FROM today_classes 
        WHERE teacher_id = '$teacher_id_esc' 
          AND session = '$session_esc' 
          AND date = '$db_date' 
          AND subject = '$subject_esc' 
        LIMIT 1
    ";
    $searchRes = mysqli_query($con, $searchQuery);

    if ($searchRes && mysqli_num_rows($searchRes) > 0) {
        // Record exists -> Update it
        $row = mysqli_fetch_assoc($searchRes);
        $recordId = $row['id'];

        $updateQuery = "
            UPDATE today_classes 
            SET class = '$class_esc', 
                period = '$period_esc', 
                topic_taught = '$topic_taught_esc', 
                remark = $remark_esc
            WHERE id = $recordId
        ";
        if (!mysqli_query($con, $updateQuery)) {
            throw new Exception("Failed to update today class record: " . mysqli_error($con));
        }
        $response['message'] = 'Today class log updated successfully';
    } else {
        // Record does not exist -> Insert new one
        $insertQuery = "
            INSERT INTO today_classes (teacher_id, class, period, subject, topic_taught, remark, date, session) 
            VALUES ('$teacher_id_esc', '$class_esc', '$period_esc', '$subject_esc', '$topic_taught_esc', $remark_esc, '$db_date', '$session_esc')
        ";
        if (!mysqli_query($con, $insertQuery)) {
            throw new Exception("Failed to insert today class record: " . mysqli_error($con));
        }
        $response['message'] = 'Today class log added successfully';
    }

    // Commit Transaction
    mysqli_commit($con);
    $response['status'] = true;

} catch (Exception $e) {
    mysqli_rollback($con);
    http_response_code(500);
    $response['message'] = 'Database error: ' . $e->getMessage();
}

echo json_encode($response);
?>
