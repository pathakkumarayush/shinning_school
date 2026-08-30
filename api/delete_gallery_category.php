<?php
header('Content-Type: application/json');
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $input = $_GET;
} else {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!$input) {
        $input = $_POST;
    }
}

$category_id = isset($input['category_id']) ? (int)$input['category_id'] : 0;
$user_id = isset($input['user_id']) ? trim($input['user_id']) : '';

if ($category_id <= 0) {
    echo json_encode(['status' => false, 'message' => 'category_id  are required']);
    exit;
}

$user_id_esc = mysqli_real_escape_string($con, $user_id);

$query = "DELETE FROM image_gallery_category WHERE id = '$category_id'";
if (mysqli_query($con, $query)) {
    if (mysqli_affected_rows($con) > 0) {
        // Also delete associated images from DB
        mysqli_query($con, "DELETE FROM image_gallery WHERE category_id = '$category_id'");
        echo json_encode(['status' => true, 'message' => 'Category deleted successfully']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Category not found or access denied']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to delete category']);
}
?>
