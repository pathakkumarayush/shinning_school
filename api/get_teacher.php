<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require_once __DIR__ . '/../db.php';

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
$conditions = ["t.teacher_session = '" . mysqli_real_escape_string($con, $_GET['session']) . "'"];

if (isset($_GET['staff_type'])) {
    $conditions[] = "t.staff_typ = '" . mysqli_real_escape_string($con, $_GET['staff_type']) . "'";
}

if (isset($_GET['id']) && trim($_GET['id']) !== '') {
    $id_esc = (int)$_GET['id'];
    $conditions[] = "t.id = '$id_esc'";
} elseif (isset($_GET['teacher_id']) && trim($_GET['teacher_id']) !== '') {
    $tid_esc = (int)$_GET['teacher_id'];
    $conditions[] = "t.teacher_id = '$tid_esc'";
}

if (isset($_GET['status']) && trim($_GET['status']) !== '') {
    $status_esc = mysqli_real_escape_string($con, trim($_GET['status']));
    $conditions[] = "t.status = '$status_esc'";
} else {
    $conditions[] = "t.status = 'Active'";
}

$whereClause = implode(' AND ', $conditions);
$query = "
    SELECT 
        t.*,
        l.uid AS login_uid,
        l.pass AS login_password,
        l.teacher_type
    FROM teacher t
    LEFT JOIN login l ON l.uid = t.teacher_username
    WHERE $whereClause
    ORDER BY t.teacher_name ASC
";

$result = mysqli_query($con, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    http_response_code(404); // Not Found
    echo json_encode(['status' => false, 'message' => 'No teachers found']);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row['id'] = (int)$row['id'];
    $row['teacher_id'] = (int)($row['teacher_id'] ?? $row['id']);
    $data[] = $row;
}

http_response_code(200); // OK
echo json_encode([
    'status' => true,
    'message' => 'Teachers fetched successfully',
    'teachers' => $data
]);
