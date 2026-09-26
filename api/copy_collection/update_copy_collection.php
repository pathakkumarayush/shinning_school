<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../../db.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

$method = $_SERVER['REQUEST_METHOD'];
if (!in_array($method, ['POST', 'PUT', 'PATCH'])) {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST, PUT, or PATCH method allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input || empty($input)) {
    $input = $_POST;
} else {
    $input = array_merge($input, $_POST);
}

$id         = isset($input['id']) ? trim($input['id']) : '';
$student_id = isset($input['student_id']) ? trim($input['student_id']) : (isset($input['student']) ? trim($input['student']) : '');
$class      = isset($input['class']) ? trim($input['class']) : '';
$exam       = isset($input['exam']) ? trim($input['exam']) : '';
$subject    = isset($input['subject']) ? trim($input['subject']) : '';
$session    = isset($input['session']) ? trim($input['session']) : '';
$status     = isset($input['status']) ? strtolower(trim($input['status'])) : (isset($input['absent']) ? strtolower(trim($input['absent'])) : '');
$remark     = isset($input['rmk']) ? trim($input['rmk']) : (isset($input['remark']) ? trim($input['remark']) : null);
$date       = isset($input['date']) ? trim($input['date']) : null;

if (empty($id) && (empty($student_id) || empty($class) || empty($exam) || empty($subject) || empty($session))) {
    http_response_code(400);
    echo json_encode([
        'status'  => false,
        'message' => 'Must provide record `id` OR composite key (`student_id`, `class`, `exam`, `subject`, `session`)'
    ]);
    exit;
}

// If record ID is provided
if (!empty($id)) {
    $id_esc = mysqli_real_escape_string($con, $id);
    $findQuery = mysqli_query($con, "SELECT * FROM `exam_copy_collection` WHERE id = '$id_esc' LIMIT 1");
    if (!$findQuery || mysqli_num_rows($findQuery) === 0) {
        http_response_code(404);
        echo json_encode(['status' => false, 'message' => 'Copy collection record not found']);
        exit;
    }
    $existing = mysqli_fetch_assoc($findQuery);

    if ($status === 'present') {
        mysqli_query($con, "DELETE FROM `exam_copy_collection` WHERE id = '$id_esc'");
        http_response_code(200);
        echo json_encode(['status' => true, 'message' => 'Status updated to Present (copy marked collected)']);
        exit;
    }

    $updates = [];
    if ($status !== '') {
        $stat_esc = mysqli_real_escape_string($con, $status);
        $updates[] = "`absent` = '$stat_esc'";
    }
    if ($remark !== null) {
        $rmk_esc = mysqli_real_escape_string($con, $remark);
        $updates[] = "`rmk` = '$rmk_esc'";
    }
    if ($date !== null && $date !== '') {
        $date_esc = mysqli_real_escape_string($con, $date);
        $updates[] = "`date` = '$date_esc'";
    }

    if (!empty($updates)) {
        $updateQuery = "UPDATE `exam_copy_collection` SET " . implode(', ', $updates) . " WHERE id = '$id_esc'";
        mysqli_query($con, $updateQuery);
    }

    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => 'Copy collection record updated successfully',
        'data'    => [
            'id'     => (int)$id,
            'status' => $status ?: $existing['absent'],
            'remark' => $remark !== null ? $remark : $existing['rmk'],
            'date'   => $date ?: $existing['date']
        ]
    ]);
    exit;
}

// If composite key is provided
$student_esc = mysqli_real_escape_string($con, $student_id);
$class_esc   = mysqli_real_escape_string($con, $class);
$exam_esc    = mysqli_real_escape_string($con, $exam);
$sub_esc     = mysqli_real_escape_string($con, $subject);
$sess_esc    = mysqli_real_escape_string($con, $session);
$date_val    = $date ?: date('d-m-Y');
$date_esc    = mysqli_real_escape_string($con, $date_val);
$rmk_val     = $remark !== null ? $remark : '';
$rmk_esc     = mysqli_real_escape_string($con, $rmk_val);

$checkQuery = mysqli_query($con, "
    SELECT id FROM `exam_copy_collection` 
    WHERE student = '$student_esc' AND class = '$class_esc' AND exam = '$exam_esc' AND subject = '$sub_esc' AND session = '$sess_esc' 
    LIMIT 1
");

if ($status === 'present') {
    if ($checkQuery && mysqli_num_rows($checkQuery) > 0) {
        $row = mysqli_fetch_assoc($checkQuery);
        mysqli_query($con, "DELETE FROM `exam_copy_collection` WHERE id = '{$row['id']}'");
    }
    http_response_code(200);
    echo json_encode(['status' => true, 'message' => 'Student copy marked as Present / Collected']);
    exit;
}

if ($status === 'absent') {
    if ($checkQuery && mysqli_num_rows($checkQuery) > 0) {
        $row = mysqli_fetch_assoc($checkQuery);
        mysqli_query($con, "UPDATE `exam_copy_collection` SET `absent` = 'absent', `rmk` = '$rmk_esc', `date` = '$date_esc' WHERE id = '{$row['id']}'");
        $recId = (int)$row['id'];
    } else {
        mysqli_query($con, "
            INSERT INTO `exam_copy_collection` (`student`, `date`, `session`, `class`, `absent`, `exam`, `subject`, `rmk`, `aid`)
            VALUES ('$student_esc', '$date_esc', '$sess_esc', '$class_esc', 'absent', '$exam_esc', '$sub_esc', '$rmk_esc', '1')
        ");
        $recId = (int)mysqli_insert_id($con);
    }

    http_response_code(200);
    echo json_encode([
        'status'  => true,
        'message' => 'Student copy marked as Absent',
        'data'    => [
            'id'         => $recId,
            'student_id' => $student_id,
            'status'     => 'absent',
            'remark'     => $rmk_val,
            'date'       => $date_val
        ]
    ]);
    exit;
}

http_response_code(400);
echo json_encode(['status' => false, 'message' => 'Invalid status provided (use absent or present)']);
