<?php
require '../db.php';
header('Content-Type: application/json');

$category = isset($_POST['category_id']) ? mysqli_real_escape_string($con, $_POST['category_id']) : '';
$item_id = isset($_POST['item_id']) ? mysqli_real_escape_string($con, $_POST['item_id']) : '';
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;
$department = isset($_POST['department_id']) ? mysqli_real_escape_string($con, $_POST['department_id']) : '';
$allocateto = isset($_POST['allocateto']) ? mysqli_real_escape_string($con, $_POST['allocateto']) : '';
$allocatedate = isset($_POST['date']) ? mysqli_real_escape_string($con, $_POST['date']) : date('Y-m-d');

if (empty($category) || empty($item_id) || empty($quantity) || empty($department)) {
    echo json_encode(['status' => false, 'message' => 'Category, Item, Quantity, and Department are required']);
    exit;
}

// Check stock availability
$item_q = mysqli_query($con, "SELECT quantity FROM additem WHERE id='$item_id'");
if ($r_item = mysqli_fetch_assoc($item_q)) {
    $current_qty = (int)$r_item['quantity'];
    if ($current_qty < $quantity) {
        echo json_encode(['status' => false, 'message' => 'Insufficient stock. Available: ' . $current_qty]);
        exit;
    }
    
    // Deduct stock
    $new_qty = $current_qty - $quantity;
    mysqli_query($con, "UPDATE additem SET quantity='$new_qty' WHERE id='$item_id'");
    
    // Record release
    $query = "INSERT INTO receiving (category, item, quantity, department, allocateto, allocatedate) 
              VALUES ('$category', '$item_id', '$quantity', '$department', '$allocateto', '$allocatedate')";
              
    if (mysqli_query($con, $query)) {
        echo json_encode(['status' => true, 'message' => 'Stock released successfully']);
    } else {
        // Rollback quantity if insert fails
        $new_qty = $current_qty;
        mysqli_query($con, "UPDATE additem SET quantity='$new_qty' WHERE id='$item_id'");
        echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Item not found']);
}
?>
