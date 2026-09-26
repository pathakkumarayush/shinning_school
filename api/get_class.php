<?php
ini_set('display_errors', 0);
if (session_status() === PHP_SESSION_NONE) {
    @session_start();
}
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

$session = isset($_GET['session']) && !empty(trim($_GET['session'])) ? mysqli_real_escape_string($con, trim($_GET['session'])) : null;
$teacher_param = isset($_GET['teacher_id']) && !empty(trim($_GET['teacher_id'])) ? mysqli_real_escape_string($con, trim($_GET['teacher_id'])) : (isset($_GET['uid']) ? mysqli_real_escape_string($con, trim($_GET['uid'])) : null);
$type = isset($_GET['type']) ? strtolower(trim($_GET['type'])) : null;

// Default session if not provided
if (empty($session)) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT session FROM class WHERE session IS NOT NULL AND session != '' ORDER BY class_id DESC LIMIT 1");
    if ($ses_q && $ses_row = mysqli_fetch_assoc($ses_q)) {
        $session = $ses_row['session'];
    } else {
        $session = '2026-2027';
    }
}

$query = "";

if (!empty($teacher_param)) {
    // 1. Resolve Teacher UID and teacher_type
    $teacher_uid = $teacher_param;
    $teacher_type = null;

    $loginRes = mysqli_query($con, "SELECT uid, teacher_type FROM login WHERE uid='$teacher_param' OR id='$teacher_param' LIMIT 1");
    if ($loginRes && $loginRow = mysqli_fetch_assoc($loginRes)) {
        $teacher_uid = $loginRow['uid'];
        $teacher_type = $loginRow['teacher_type'];
    } else {
        $tRes = mysqli_query($con, "SELECT teacher_username, teacher_id FROM teacher WHERE id='$teacher_param' OR teacher_id='$teacher_param' OR teacher_username='$teacher_param' LIMIT 1");
        if ($tRes && $tRow = mysqli_fetch_assoc($tRes)) {
            $teacher_uid = !empty($tRow['teacher_username']) ? $tRow['teacher_username'] : $tRow['teacher_id'];
            $loginRes2 = mysqli_query($con, "SELECT uid, teacher_type FROM login WHERE uid='$teacher_uid' LIMIT 1");
            if ($loginRes2 && $loginRow2 = mysqli_fetch_assoc($loginRes2)) {
                $teacher_type = $loginRow2['teacher_type'];
            }
        }
    }

    $teacher_uid_esc = mysqli_real_escape_string($con, $teacher_uid);

    // 2. Determine which tables to query based on requested `type` and `teacher_type`
    if ($type === 'class_teacher') {
        $subQuery = "SELECT DISTINCT class FROM class_teacher WHERE teacher = '$teacher_uid_esc' AND teacher_session = '$session'";
    } elseif ($type === 'subject_teacher') {
        $subQuery = "SELECT DISTINCT class FROM class_teacher_sub WHERE teacher = '$teacher_uid_esc' AND teacher_session = '$session'";
    } else {
        if ($teacher_type == 1) {
            $subQuery = "SELECT DISTINCT class FROM class_teacher WHERE teacher = '$teacher_uid_esc' AND teacher_session = '$session'";
        } elseif ($teacher_type == 2) {
            $subQuery = "SELECT DISTINCT class FROM class_teacher_sub WHERE teacher = '$teacher_uid_esc' AND teacher_session = '$session'";
        } else {
            // Default: Both class teacher and subject teacher classes
            $subQuery = "SELECT DISTINCT class FROM class_teacher WHERE teacher = '$teacher_uid_esc' AND teacher_session = '$session'
                         UNION
                         SELECT DISTINCT class FROM class_teacher_sub WHERE teacher = '$teacher_uid_esc' AND teacher_session = '$session'";
        }
    }

    $query = "SELECT * FROM class WHERE class IN ($subQuery)";
} else {
    // If no teacher_id is provided, fetch all classes
    $query = "SELECT * FROM class";
    if (!empty($session)) {
        $query .= " WHERE session = '$session' OR session = '' OR session IS NULL";
    }
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
