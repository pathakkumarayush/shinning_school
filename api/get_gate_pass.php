<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$type = isset($_GET['type']) ? trim($_GET['type']) : 'normal';
$session = isset($_GET['session']) ? trim($_GET['session']) : '';
$school = isset($_GET['school']) ? trim($_GET['school']) : '';

$table = ($type === 'parent') ? 'enquiry_passs' : 'enquiry_pass';

$query = "SELECT * FROM $table WHERE 1=1";

if ($session !== '') {
    $session_esc = mysqli_real_escape_string($con, $session);
    $query .= " AND session = '$session_esc'";
}

if ($school !== '') {
    $school_esc = mysqli_real_escape_string($con, $school);
    $query .= " AND school = '$school_esc'";
}

$query .= " ORDER BY id DESC";

$result = mysqli_query($con, $query);

if ($result) {
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['status' => true, 'message' => count($data) . ' record(s) found.', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con), 'data' => []]);
}
?>
