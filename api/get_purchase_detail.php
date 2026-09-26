<?php
require '../db.php';
header('Content-Type: application/json');

$query = "SELECT p.*, s.store as category_name 
          FROM purchase p
          LEFT JOIN addstore s ON p.categories = s.id";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query .= " WHERE p.id = '$id'";
}

$result = mysqli_query($con, $query);
$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['status' => true, 'message' => 'Purchases fetched', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
