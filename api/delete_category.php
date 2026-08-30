<?php
require '../db.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

if (empty($id)) {
    echo json_encode(['status' => false, 'message' => 'ID is required']);
    exit;
}

$query = "DELETE FROM addstore WHERE id='$id'";

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => 'Category deleted successfully']);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
