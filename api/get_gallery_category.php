<?php
header('Content-Type: application/json');
require '../db.php';

$user_id = isset($_REQUEST['user_id']) ? trim($_REQUEST['user_id']) : '';


$user_id_esc = mysqli_real_escape_string($con, $user_id);

$query = "SELECT * FROM image_gallery_category  ORDER BY id DESC";
$result = mysqli_query($con, $query);

$categories = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    echo json_encode(['status' => true, 'data' => $categories]);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch categories']);
}
?>
