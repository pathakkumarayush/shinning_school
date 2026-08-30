<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

if (empty($id)) {
    echo json_encode(['status' => false, 'message' => 'ID is required']);
    exit;
}

$query = "DELETE FROM event_calendar WHERE id='$id'";

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => 'Event deleted successfully']);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
