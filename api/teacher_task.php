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
$_GET['admin_id']  = 'admin';
// Build conditions
$conditions = ["t.session = '" . mysqli_real_escape_string($con, $_GET['session']) . "'"];

if (isset($_GET['admin_id'])) {
    $conditions[] = "t.admin_id = '" . mysqli_real_escape_string($con, $_GET['admin_id']) . "'";
}

if (isset($_GET['teacher_id'])) {
    $conditions[] = "t.staff_id = '" . mysqli_real_escape_string($con, $_GET['teacher_id']) . "'";
}

if (isset($_GET['status'])) {
    $conditions[] = "t.status = '" . mysqli_real_escape_string($con, $_GET['status']) . "'";
}

if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
    $start_date = mysqli_real_escape_string($con, $_GET['start_date']);
    $end_date = mysqli_real_escape_string($con, $_GET['end_date']);
    $conditions[] = "start_date BETWEEN '$start_date' AND '$end_date'";
} elseif (!empty($_GET['start_date'])) {
    $start_date = mysqli_real_escape_string($con, $_GET['start_date']);
    $conditions[] = "start_date >= '$start_date'";
}


$whereClause = implode(' AND ', $conditions);

$query = "
    SELECT 
        t.*, 
        te.teacher_name ,te.uid ,te.teacher_session
     FROM tasks t
    LEFT JOIN teacher te  ON t.staff_id = te.uid 
        AND t.session = te.teacher_session
    WHERE $whereClause
";


$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    http_response_code(404); // Not Found
    echo json_encode(['status' => false, 'message' => 'No tasks found']);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

http_response_code(200); // OK
echo json_encode([
    'status' => true,
    'message' => 'Tasks fetched successfully',
    'teachers' => $data
]);
