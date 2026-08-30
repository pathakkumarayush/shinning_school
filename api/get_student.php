<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Validate input
if (!$_GET || !isset($_GET['session'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

// Build conditions
$conditions = ["student_session = '" . mysqli_real_escape_string($con, $_GET['session']) . "'"];
if (isset($_GET['class']) && trim($_GET['class']) !== '') {
    $conditions[] = "student_class = '" . mysqli_real_escape_string($con, trim($_GET['class'])) . "'";
}
if (isset($_GET['student_name']) && trim($_GET['student_name']) !== '') {
    $conditions[] = "student_name LIKE '%" . mysqli_real_escape_string($con, trim($_GET['student_name'])) . "%'";
}

$whereClause = implode(' AND ', $conditions);
$query = "SELECT * FROM student WHERE status = 0 and $whereClause ORDER BY student_name ASC";

$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    http_response_code(404); // Not Found
    echo json_encode(['status' => false, 'message' => 'No students found']);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row['student_img'])) {
        $row['student_img'] = 'school/upload/' . basename($row['student_img']);
    }
    if (!empty($row['student_dob'])) {
        $row['student_dob'] = date("d-M-Y", strtotime($row['student_dob']));
    }
    if (!empty($row['student_doj'])) {
        $row['student_doj'] = date("d-M-Y", strtotime($row['student_doj']));
    }
    $data[] = $row;
}

http_response_code(200); // OK
echo json_encode([
    'status' => true,
    'message' => 'Students fetched successfully',
    'users' => $data
]);
