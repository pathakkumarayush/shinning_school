<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');



if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = [
    'status' => false,
    'message' => '',
    'data' => []
];

// Read input parameters
$teacher_id   = isset($_GET['teacher_id']) ? trim($_GET['teacher_id']) : '';
$teacher_type = isset($_GET['teacher_type']) ? trim($_GET['teacher_type']) : '';
$class        = isset($_GET['class']) ? trim($_GET['class']) : '';
$session      = isset($_GET['session']) ? trim($_GET['session']) : '';

// Validation 1: Required fields presence
if ($teacher_id === '' || $teacher_type === '' || $class === '' || $session === '') {
    http_response_code(422);
    $response['message'] = 'Missing required parameters: teacher_id, teacher_type, class, session are required';
    echo json_encode($response);
    exit;
}

// Validation 2: Invalid teacher type value
if ($teacher_type !== 'class_teacher' && $teacher_type !== 'subject_teacher') {
    http_response_code(400);
    $response['message'] = 'Invalid teacher_type. Must be class_teacher or subject_teacher';
    echo json_encode($response);
    exit;
}

// Sanitize inputs
$teacher_id_esc   = mysqli_real_escape_string($con, $teacher_id);
$teacher_type_esc = mysqli_real_escape_string($con, $teacher_type);
$class_esc        = mysqli_real_escape_string($con, $class);
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

    $subjects = [];

    if ($teacher_type_esc === 'class_teacher') {
        // Validation 6: Verify class teacher mapping
        $mappingCheck = mysqli_query($con, "
            SELECT id FROM class_teacher 
            WHERE class = '$class_esc' AND teacher = '$teacher_id_esc' AND teacher_session = '$session_esc' 
            LIMIT 1
        ");
        if (!$mappingCheck || mysqli_num_rows($mappingCheck) === 0) {
            http_response_code(403);
            $response['message'] = 'Teacher is not assigned as Class Teacher for this class';
            echo json_encode($response);
            exit;
        }

        // Return all subjects assigned to that class
        $subjectQuery = "SELECT * FROM subjects WHERE class = '$class_esc' AND session = '$session_esc' ORDER BY subj_id DESC";
        $subjectResult = mysqli_query($con, $subjectQuery);
        if ($subjectResult) {
            $subjects = mysqli_fetch_all($subjectResult, MYSQLI_ASSOC);
        }

    } else {
        // Return only those subjects which are assigned to that teacher for that class
        // Validation 7: Verify subject teacher mapping exists
        $mappingQuery = "
            SELECT DISTINCT sub FROM class_teacher_sub 
            WHERE teacher = '$teacher_id_esc' AND class = '$class_esc' AND teacher_session = '$session_esc'
        ";
        $mappingResult = mysqli_query($con, $mappingQuery);

        if (!$mappingResult || mysqli_num_rows($mappingResult) === 0) {
            http_response_code(403);
            $response['message'] = 'Teacher is not assigned to any subjects in this class';
            echo json_encode($response);
            exit;
        }

        $mappedSubs = [];
        while ($row = mysqli_fetch_assoc($mappingResult)) {
            $mappedSubs[] = "'" . mysqli_real_escape_string($con, $row['sub']) . "'";
        }
        $subNamesList = implode(',', $mappedSubs);

        $subjectQuery = "
            SELECT * FROM subjects 
            WHERE class = '$class_esc' AND session = '$session_esc' AND name IN ($subNamesList) 
            ORDER BY subj_id DESC
        ";
        $subjectResult = mysqli_query($con, $subjectQuery);
        if ($subjectResult) {
            $subjects = mysqli_fetch_all($subjectResult, MYSQLI_ASSOC);
        }
    }

    $response['status'] = true;
    $response['message'] = count($subjects) . ' subject(s) found';
    $response['data'] = $subjects;

} catch (Exception $e) {
    http_response_code(500);
    $response['message'] = 'Database error: ' . $e->getMessage();
}

echo json_encode($response);
?>
