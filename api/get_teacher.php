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
$conditions = ["teacher_session = '" . mysqli_real_escape_string($con, $_GET['session']) . "'"];

if (isset($_GET['staff_type'])) {
    $conditions[] = "staff_typ = '" . mysqli_real_escape_string($con, $_GET['staff_type']) . "'";
}

$whereClause = implode(' AND ', $conditions);
$query = "SELECT * FROM teacher WHERE status = 'Active' And $whereClause";

$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    http_response_code(404); // Not Found
    echo json_encode(['status' => false, 'message' => 'No teachers found']);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

http_response_code(200); // OK
echo json_encode([
    'status' => true,
    'message' => 'Teachers fetched successfully',
    'teachers' => $data
]);
