<?php
header('Content-Type: application/json');
require '../db.php';

$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST;
}

$id = isset($input['id']) ? (int)$input['id'] : 0;
$name = isset($input['name']) ? trim($input['name']) : '';

if ($name === '') {
    echo json_encode(['status' => false, 'message' => 'name is required']);
    exit;
}

$name_esc = mysqli_real_escape_string($con, $name);

if ($id > 0) {
    $updateQuery = "UPDATE header SET name = '$name_esc' WHERE id = '$id'";
    if (mysqli_query($con, $updateQuery)) {
        echo json_encode(['status' => true, 'message' => 'Header updated successfully']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to update header']);
    }
} else {
    $insertQuery = "INSERT INTO header (name) VALUES ('$name_esc')";
    if (mysqli_query($con, $insertQuery)) {
        echo json_encode(['status' => true, 'message' => 'Header added successfully', 'data' => ['id' => mysqli_insert_id($con)]]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Failed to add header']);
    }
}
?>
