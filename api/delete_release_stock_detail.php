<?php
require '../db.php';
header('Content-Type: application/json');

$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';

if (empty($id)) {
    echo json_encode(['status' => false, 'message' => 'ID is required']);
    exit;
}

// Fetch the release details first to restore the quantity
$q = mysqli_query($con, "SELECT item, quantity FROM receiving WHERE id='$id'");
if ($r = mysqli_fetch_assoc($q)) {
    $item_id = $r['item'];
    $quantity = (int)$r['quantity'];
    
    // Delete the record
    $del = mysqli_query($con, "DELETE FROM receiving WHERE id='$id'");
    
    if ($del) {
        // Add back the quantity to additem
        mysqli_query($con, "UPDATE additem SET quantity = quantity + $quantity WHERE id='$item_id'");
        echo json_encode(['status' => true, 'message' => 'Release stock deleted successfully, quantity restored']);
    } else {
        echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Record not found']);
}
?>
