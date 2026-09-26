<?php
require '../db.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
$store = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';

if (empty($store)) {
    echo json_encode(['status' => false, 'message' => 'Category name is required']);
    exit;
}

if ($id) {
    $query = "UPDATE addstore SET store='$store' WHERE id='$id'";
    $msg = "Category updated successfully";
} else {
    $query = "INSERT INTO addstore (store) VALUES ('$store')";
    $msg = "Category added successfully";
}

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => $msg]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
