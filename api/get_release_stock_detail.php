<?php
require '../db.php';
header('Content-Type: application/json');

$query = "SELECT r.*, s.store as category_name, d.name as department_name, i.item as item_name 
          FROM receiving r
          LEFT JOIN addstore s ON r.category = s.id
          LEFT JOIN department d ON r.department = d.id
          LEFT JOIN additem i ON r.item = i.id";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query .= " WHERE r.id = '$id'";
}

$result = mysqli_query($con, $query);
$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['status' => true, 'message' => 'Release stock fetched', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
