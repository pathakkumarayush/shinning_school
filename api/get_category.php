<?php
require '../db.php';
header('Content-Type: application/json');

$query = "SELECT id, store as name FROM addstore";
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query .= " WHERE id = '$id'";
}
$result = mysqli_query($con, $query);
$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['status' => true, 'message' => 'Categories fetched', 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
?>
