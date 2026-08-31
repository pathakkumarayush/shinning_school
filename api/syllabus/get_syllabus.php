<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (!headers_sent()) {
    header('Content-Type: application/json');
}

require __DIR__ . '/../../db.php';
global $con;

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

require_once __DIR__ . '/syllabus_auth_helper.php';

// Read filter parameters
$id         = isset($_GET['id']) ? trim($_GET['id']) : (isset($_GET['syllabus_id']) ? trim($_GET['syllabus_id']) : '');
$class      = isset($_GET['class']) ? trim($_GET['class']) : '';
$subject    = isset($_GET['subject']) ? trim($_GET['subject']) : '';
$session    = isset($_GET['session']) ? trim($_GET['session']) : '';
$user_id    = isset($_GET['user_id']) ? trim($_GET['user_id']) : (isset($_GET['created_by']) ? trim($_GET['created_by']) : (isset($_GET['teacher_id']) ? trim($_GET['teacher_id']) : (isset($_GET['teacher']) ? trim($_GET['teacher']) : '')));
$role       = isset($_GET['role']) ? trim(strtolower($_GET['role'])) : '';

$auth = resolveSyllabusUser($con, $_GET);

// Build query conditions
$conditions = ["status = 1"];

if ($id !== '') {
    $id_esc = (int)$id;
    $conditions[] = "id = '$id_esc'";
}

if ($session !== '') {
    $session_esc = mysqli_real_escape_string($con, $session);
    $conditions[] = "session = '$session_esc'";
}

// Role-based authorization & filtering
if ($role === 'class_teacher' || (!$auth['is_admin'] && $auth['teacher_type'] === 2)) {
    // Class Teacher: view syllabus for assigned class across all subjects
    $assignedClasses = getClassTeacherAssignedClasses($con, $auth['uid'], $session);
    if (empty($assignedClasses)) {
        // Teacher has no assigned class -> return empty result
        $conditions[] = "1 = 0";
    } else {
        $escapedClasses = array_map(function($c) use ($con) {
            return "'" . mysqli_real_escape_string($con, $c) . "'";
        }, $assignedClasses);
        
        if ($class !== '') {
            $class_esc = mysqli_real_escape_string($con, $class);
            // Check if requested class is among assigned classes
            if (in_array(strtolower($class), array_map('strtolower', $assignedClasses))) {
                $conditions[] = "class = '$class_esc'";
            } else {
                // Requested an unrelated class -> deny / empty
                $conditions[] = "1 = 0";
            }
        } else {
            $conditions[] = "class IN (" . implode(',', $escapedClasses) . ")";
        }
    }
    
    if ($subject !== '') {
        $subject_esc = mysqli_real_escape_string($con, $subject);
        $conditions[] = "subject = '$subject_esc'";
    }

} elseif ($role === 'subject_teacher' || (!$auth['is_admin'] && $auth['uid'] !== '' && $auth['teacher_type'] !== 1)) {
    // Subject Teacher: view only own created syllabus
    $t_uid_esc = mysqli_real_escape_string($con, $auth['uid']);
    $conditions[] = "(created_by = '$t_uid_esc' OR created_by = TRIM('$t_uid_esc'))";
    
    if ($class !== '') {
        $class_esc = mysqli_real_escape_string($con, $class);
        $conditions[] = "class = '$class_esc'";
    }
    if ($subject !== '') {
        $subject_esc = mysqli_real_escape_string($con, $subject);
        $conditions[] = "subject = '$subject_esc'";
    }

} else {
    // Admin / General: support class, subject, teacher filters
    if ($class !== '') {
        $class_esc = mysqli_real_escape_string($con, $class);
        $conditions[] = "class = '$class_esc'";
    }
    if ($subject !== '') {
        $subject_esc = mysqli_real_escape_string($con, $subject);
        $conditions[] = "subject = '$subject_esc'";
    }
    $teacher_filter = isset($_GET['teacher']) ? trim($_GET['teacher']) : (isset($_GET['teacher_id']) ? trim($_GET['teacher_id']) : (isset($_GET['created_by']) ? trim($_GET['created_by']) : ''));
    if ($teacher_filter !== '' && strtolower($teacher_filter) !== 'admin') {
        $teacher_esc = mysqli_real_escape_string($con, $teacher_filter);
        if (is_numeric($teacher_filter)) {
            $tq = mysqli_query($con, "SELECT teacher_username FROM teacher WHERE id = '$teacher_esc' OR teacher_id = '$teacher_esc' LIMIT 1");
            if ($tq && mysqli_num_rows($tq) > 0) {
                $teacher_esc = mysqli_fetch_assoc($tq)['teacher_username'];
            }
        }
        $conditions[] = "(created_by = '$teacher_esc' OR created_by = TRIM('$teacher_esc'))";
    }
}

$whereClause = implode(' AND ', $conditions);
$query = "SELECT * FROM `syllabus` WHERE $whereClause ORDER BY class ASC, subject ASC, id DESC";

$result = mysqli_query($con, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $chapters = json_decode($row['chapters'] ?? '[]', true);
    if (!is_array($chapters)) {
        $chapters = [];
    }

    $data[] = [
        'id'          => (int)$row['id'],
        'class'       => $row['class'],
        'subject'     => $row['subject'],
        'chapters'    => $chapters,
        'description' => $row['description'] ?? '',
        'remark'      => $row['remark'] ?? '',
        'session'     => $row['session'] ?? '',
        'created_by'  => $row['created_by'] ?? '',
        'created_at'  => $row['created_at'] ?? '',
        'updated_at'  => $row['updated_at'] ?? ''
    ];
}

if ($id !== '' && count($data) === 1) {
    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => 'Syllabus fetched successfully',
        'data'    => $data[0]
    ]);
} else {
    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => count($data) > 0 ? 'Syllabus list fetched successfully' : 'No syllabus records found',
        'total'   => count($data),
        'data'    => $data
    ]);
}
?>
