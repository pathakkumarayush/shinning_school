<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Read filter parameters
$id         = isset($_GET['id']) ? trim($_GET['id']) : (isset($_GET['syllabus_id']) ? trim($_GET['syllabus_id']) : '');
$class      = isset($_GET['class']) ? trim($_GET['class']) : '';
$subject    = isset($_GET['subject']) ? trim($_GET['subject']) : '';
$session    = isset($_GET['session']) ? trim($_GET['session']) : '';
$user_id    = isset($_GET['user_id']) ? trim($_GET['user_id']) : (isset($_GET['created_by']) ? trim($_GET['created_by']) : '');

// Build query conditions
$conditions = ["status = 1"];

if ($id !== '') {
    $id_esc = (int)$id;
    $conditions[] = "id = '$id_esc'";
}

if ($class !== '') {
    $class_esc = mysqli_real_escape_string($con, $class);
    $conditions[] = "class = '$class_esc'";
}

if ($subject !== '') {
    $subject_esc = mysqli_real_escape_string($con, $subject);
    $conditions[] = "subject = '$subject_esc'";
}

if ($session !== '') {
    $session_esc = mysqli_real_escape_string($con, $session);
    $conditions[] = "session = '$session_esc'";
}

if ($user_id !== '') {
    $user_id_esc = mysqli_real_escape_string($con, $user_id);
    $conditions[] = "created_by = '$user_id_esc'";
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
