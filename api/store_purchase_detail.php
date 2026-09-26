<?php
require '../db.php';
header('Content-Type: application/json');

$categories = isset($_POST['category_id']) ? mysqli_real_escape_string($con, $_POST['category_id']) : '';
$supplier = isset($_POST['supplier']) ? mysqli_real_escape_string($con, $_POST['supplier']) : '';
$date = isset($_POST['date']) ? mysqli_real_escape_string($con, $_POST['date']) : date('Y-m-d');
$address = isset($_POST['address']) ? mysqli_real_escape_string($con, $_POST['address']) : '';
$type = isset($_POST['type']) ? mysqli_real_escape_string($con, $_POST['type']) : 'purchase';
$amount = isset($_POST['amount']) ? mysqli_real_escape_string($con, $_POST['amount']) : '0';
$due = isset($_POST['due']) ? mysqli_real_escape_string($con, $_POST['due']) : '0';

// Expecting item and quantity to process additem update
$item_name = isset($_POST['item']) ? mysqli_real_escape_string($con, $_POST['item']) : '';
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

if (empty($categories) || empty($item_name) || empty($supplier)) {
    echo json_encode(['status' => false, 'message' => 'Category, Item, and Supplier are required']);
    exit;
}

// Update additem quantity
$item_q = mysqli_query($con, "SELECT quantity FROM additem WHERE item='$item_name' LIMIT 1");
if ($r_item = mysqli_fetch_assoc($item_q)) {
    $val = $r_item['quantity'] + $quantity;
    $val1 = $r_item['quantity'];
    mysqli_query($con, "UPDATE additem SET quantity='$val', old='$val1' WHERE item='$item_name'");
} else {
    // If not exists, insert? Or just return error
    echo json_encode(['status' => false, 'message' => 'Item not found in inventory']);
    exit;
}

// Format item for purchase table matching the existing logic
$item_str = $item_name . "=" . $quantity;

$query = "INSERT INTO purchase (categories, item, supplier, date, address, type, amount, due) 
          VALUES ('$categories', '$item_str', '$supplier', '$date', '$address', '$type', '$amount', '$due')";

if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => 'Purchase added successfully']);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
