<?php
require '../db.php';
header('Content-Type: application/json');

$start_date = isset($_GET['start_date']) ? mysqli_real_escape_string($con, $_GET['start_date']) : '';
$end_date = isset($_GET['end_date']) ? mysqli_real_escape_string($con, $_GET['end_date']) : '';
$single_date = isset($_GET['date']) ? mysqli_real_escape_string($con, $_GET['date']) : '';
$category_id = isset($_GET['category_id']) ? mysqli_real_escape_string($con, $_GET['category_id']) : '';
$product_id = isset($_GET['product_id']) ? mysqli_real_escape_string($con, $_GET['product_id']) : '';

// Base query for purchases
$q_purchase = "SELECT p.*, s.store as category_name FROM purchase p LEFT JOIN addstore s ON p.categories = s.id WHERE 1=1";
// Base query for releases
$q_release = "SELECT r.*, s.store as category_name, d.name as department_name, i.item as item_name 
              FROM receiving r
              LEFT JOIN addstore s ON r.category = s.id
              LEFT JOIN department d ON r.department = d.id
              LEFT JOIN additem i ON r.item = i.id WHERE 1=1";

if ($single_date) {
    $q_purchase .= " AND p.date = '$single_date'";
    $q_release .= " AND r.allocatedate = '$single_date'";
} elseif ($start_date && $end_date) {
    $q_purchase .= " AND p.date BETWEEN '$start_date' AND '$end_date'";
    $q_release .= " AND r.allocatedate BETWEEN '$start_date' AND '$end_date'";
}

if ($category_id) {
    $q_purchase .= " AND p.categories = '$category_id'";
    $q_release .= " AND r.category = '$category_id'";
}

if ($product_id) {
    // In purchase, item is stored as 'Product Name=Quantity' or similar. We will just use LIKE for simplicity if product_id is passed, or if product_id is actually the name.
    // Let's assume product_id passed here is the Name for purchases and ID for releases to match our structure.
    $q_release .= " AND r.item = '$product_id'";
    // Fetch product name for purchase filter
    $prod_q = mysqli_query($con, "SELECT item FROM additem WHERE id='$product_id'");
    if($r_p = mysqli_fetch_assoc($prod_q)) {
        $p_name = $r_p['item'];
        $q_purchase .= " AND p.item LIKE '%$p_name=%'";
    }
}

$res_purchase = mysqli_query($con, $q_purchase);
$purchases = [];
if ($res_purchase) {
    while ($row = mysqli_fetch_assoc($res_purchase)) {
        $purchases[] = $row;
    }
}

$res_release = mysqli_query($con, $q_release);
$releases = [];
if ($res_release) {
    while ($row = mysqli_fetch_assoc($res_release)) {
        $releases[] = $row;
    }
}

echo json_encode([
    'status' => true,
    'message' => 'Report generated',
    'data' => [
        'purchases' => $purchases,
        'releases' => $releases
    ]
]);
?>
