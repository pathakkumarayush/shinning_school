<?php
header('Content-Type: application/json');
require '../db.php';

$category_id = isset($_REQUEST['category_id']) ? (int)$_REQUEST['category_id'] : 0;


$query = "SELECT g.*, c.name as category_name 
          FROM image_gallery g
          LEFT JOIN image_gallery_category c ON g.category_id = c.id
          ";

if ($category_id > 0) {
    $query .= " AND g.category_id = '$category_id'";
}

$query .= " ORDER BY g.id DESC";

$result = mysqli_query($con, $query);

$images = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (!empty($row['image_path'])) {
            $row['image_path'] = 'school/' . $row['image_path'];
        }
        $images[] = $row;
    }
    echo json_encode(['status' => true, 'data' => $images]);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch gallery']);
}
?>
