<?php
header('Content-Type: application/json');
require '../db.php';

$query = "SELECT * FROM header ORDER BY id DESC";
$result = mysqli_query($con, $query);
$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(['status' => true, 'data' => $data]);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch headers']);
}
?>
