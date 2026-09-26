<?php
require '../db.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
$store = isset($_POST['category_id']) ? mysqli_real_escape_string($con, $_POST['category_id']) : '';
$item = isset($_POST['name']) ? mysqli_real_escape_string($con, $_POST['name']) : '';

if (empty($store) || empty($item)) {
    echo json_encode(['status' => false, 'message' => 'Category ID and Product Name are required']);
    exit;
}

if ($id) {
    $query = "UPDATE additem SET store='$store', item='$item' WHERE id='$id'";
    $msg = "Product updated successfully";
} else {
    // Check if exists
    $check = mysqli_query($con, "SELECT id FROM additem WHERE store='$store' AND item='$item'");
    if (mysqli_num_rows($check) > 0) {
        echo json_encode(['status' => false, 'message' => 'Product already exists in this category']);
        exit;
    }
    // New products start with 0 quantity if not provided
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
    $query = "INSERT INTO additem (store, item, quantity, old) VALUES ('$store', '$item', '$quantity', '0')";
    $msg = "Product added successfully";
}

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => $msg]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
