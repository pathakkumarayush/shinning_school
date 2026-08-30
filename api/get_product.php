<?php
require '../db.php';
header('Content-Type: application/json');

$query = "SELECT i.id, i.store as category_id, s.store as category_name, i.item as name, i.quantity, i.old 
          FROM additem i
          LEFT JOIN addstore s ON i.store = s.id";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query .= " WHERE i.id = '$id'";
}
if (isset($_GET['category_id'])) {
    $cat_id = mysqli_real_escape_string($con, $_GET['category_id']);
    $query .= (strpos($query, 'WHERE') !== false ? " AND " : " WHERE ") . " i.store = '$cat_id'";
}

$result = mysqli_query($con, $query);
$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['status' => true, 'message' => 'Products fetched', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
