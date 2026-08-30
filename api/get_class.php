<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../db.php';
header('Content-Type: application/json');

$session = isset($_GET['session']) ? mysqli_real_escape_string($con, $_GET['session']) : null;
$teacher_id = isset($_GET['teacher_id']) ? mysqli_real_escape_string($con, $_GET['teacher_id']) : null;
$type = isset($_GET['type']) ? mysqli_real_escape_string($con, $_GET['type']) : null; // only used if teacher_type = 3

$query = "";

if ($teacher_id) {
    // ✅ Get teacher_type from login table
    $teacherRes = mysqli_query($con, "SELECT teacher_type FROM login WHERE uid='$teacher_id' LIMIT 1");
    $teacherData = mysqli_fetch_assoc($teacherRes);

    if ($teacherData) {
        $teacher_type = $teacherData['teacher_type'];

        if ($teacher_type == 1) {
            // ✅ Class teacher
            $subQuery = "SELECT DISTINCT class 
                         FROM class_teacher 
                         WHERE teacher = '$teacher_id' 
                         AND teacher_session = '$session'";

        } elseif ($teacher_type == 2) {
            // ✅ Subject teacher
            $subQuery = "SELECT DISTINCT class 
                         FROM class_teacher_sub 
                         WHERE teacher = '$teacher_id' 
                         AND teacher_session = '$session'";

        } elseif ($teacher_type == 3) {
			
            // ✅ Depends on request type
            if ($type === 'class_teacher') {
                $subQuery = "SELECT DISTINCT class 
                             FROM class_teacher 
                             WHERE teacher = '$teacher_id' 
                             AND teacher_session = '$session'";
            } elseif ($type === 'subject_teacher') {
                $subQuery = "SELECT DISTINCT class 
                             FROM class_teacher_sub 
                             WHERE teacher = '$teacher_id' 
                             AND teacher_session = '$session'";
            } else {
                $subQuery = "
        SELECT DISTINCT class 
        FROM class_teacher 
        WHERE teacher = '$teacher_id' 
        AND teacher_session = '$session'

        UNION

        SELECT DISTINCT class 
        FROM class_teacher_sub 
        WHERE teacher = '$teacher_id' 
        AND teacher_session = '$session'
    ";
            }
        }

        if (!empty($subQuery)) {
			
            $query = "SELECT * FROM class 
                      WHERE class IN ($subQuery)";
        }else{
			
		}
    }
}

if (empty($query)) {
    // ✅ Fetch all classes if no teacher_id or invalid setup
    $query = "SELECT * FROM class";
}

$result = mysqli_query($con, $query);

if ($result) {
    $classes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $classes[] = $row;
    }

    echo json_encode([
        'status' => true,
        'message' => 'Classes fetched successfully',
        'data' => $classes
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}
