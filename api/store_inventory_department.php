<?php
require '../db.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
$name = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';

if (empty($name)) {
    echo json_encode(['status' => false, 'message' => 'Department name is required']);
    exit;
}

if ($id) {
    $query = "UPDATE department SET name='$name' WHERE id='$id'";
    $msg = "Department updated successfully";
} else {
    $query = "INSERT INTO department (name) VALUES ('$name')";
    $msg = "Department added successfully";
}

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => $msg]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
