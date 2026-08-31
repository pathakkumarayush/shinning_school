<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../../db.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

$id         = isset($_GET['id']) ? trim($_GET['id']) : '';
$session    = isset($_GET['session']) ? trim($_GET['session']) : '';
$class      = isset($_GET['class']) ? trim($_GET['class']) : '';
$exam       = isset($_GET['exam']) ? trim($_GET['exam']) : '';
$subject    = isset($_GET['subject']) ? trim($_GET['subject']) : '';
$student_id = isset($_GET['student_id']) ? trim($_GET['student_id']) : (isset($_GET['student']) ? trim($_GET['student']) : '');
$date       = isset($_GET['date']) ? trim($_GET['date']) : '';

$conditions = [];

if ($id !== '') {
    $id_esc = mysqli_real_escape_string($con, $id);
    $conditions[] = "ecc.id = '$id_esc'";
}
if ($session !== '') {
    $sess_esc = mysqli_real_escape_string($con, $session);
    $conditions[] = "ecc.session = '$sess_esc'";
}
if ($class !== '') {
    $class_esc = mysqli_real_escape_string($con, $class);
    $conditions[] = "ecc.class = '$class_esc'";
}
if ($exam !== '') {
    $exam_esc = mysqli_real_escape_string($con, $exam);
    $conditions[] = "ecc.exam = '$exam_esc'";
}
if ($subject !== '') {
    $sub_esc = mysqli_real_escape_string($con, $subject);
    $conditions[] = "ecc.subject = '$sub_esc'";
}
if ($student_id !== '') {
    $stud_esc = mysqli_real_escape_string($con, $student_id);
    $conditions[] = "(ecc.student = '$stud_esc' OR s.student_scholar = '$stud_esc' OR s.student_rollno = '$stud_esc')";
}
if ($date !== '') {
    $date_esc = mysqli_real_escape_string($con, $date);
    $conditions[] = "ecc.date = '$date_esc'";
}

$whereClause = !empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

$query = "
    SELECT 
        ecc.id,
        ecc.student AS student_id,
        ecc.date,
        ecc.session,
        ecc.class,
        ecc.exam,
        ecc.subject,
        ecc.absent AS status,
        ecc.rmk AS remark,
        s.student_name,
        s.student_fname AS father_name,
        s.student_scholar AS scholar_no,
        s.student_rollno AS roll_no,
        s.student_section,
        s.student_contactno AS mobile
    FROM `exam_copy_collection` ecc
    LEFT JOIN `student` s 
        ON (s.student_id = ecc.student OR s.id = ecc.student)
        AND (s.student_session = ecc.session OR ecc.session = '')
    $whereClause
    ORDER BY ecc.id DESC
";

$res = mysqli_query($con, $query);

if (!$res) {
    http_response_code(500);
    echo json_encode(['status' => false, 'message' => 'Query error: ' . mysqli_error($con)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($res)) {
    $data[] = [
        'id'              => (int)$row['id'],
        'student_id'      => $row['student_id'],
        'student_name'    => $row['student_name'] ?? '',
        'father_name'     => $row['father_name'] ?? '',
        'scholar_no'      => $row['scholar_no'] ?? '',
        'roll_no'         => $row['roll_no'] ?? '',
        'class'           => $row['class'],
        'section'         => $row['student_section'] ?? '',
        'exam'            => $row['exam'],
        'subject'         => $row['subject'],
        'status'          => $row['status'] ?: 'absent',
        'remark'          => $row['remark'] ?? '',
        'date'            => $row['date'],
        'session'         => $row['session']
    ];
}

http_response_code(200);
echo json_encode([
    'status' => true,
    'total'  => count($data),
    'data'   => $data
]);
