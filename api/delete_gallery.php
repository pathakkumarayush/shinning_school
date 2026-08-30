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

$image_id = isset($input['image_id']) ? (int)$input['image_id'] : 0;

if ($image_id <= 0) {
    echo json_encode(['status' => false, 'message' => 'image_id is required']);
    exit;
}

// First fetch the image path to delete the file
$sel = mysqli_query($con, "SELECT image_path FROM image_gallery WHERE id = '$image_id'");
$imageInfo = mysqli_fetch_assoc($sel);

$query = "DELETE FROM image_gallery WHERE id = '$image_id'";
if (mysqli_query($con, $query)) {
    if (mysqli_affected_rows($con) > 0) {
        // delete physical file
        if ($imageInfo && !empty($imageInfo['image_path'])) {
            $filePath = '../school/' . $imageInfo['image_path'];
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }
        echo json_encode(['status' => true, 'message' => 'Gallery image deleted successfully']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Image not found or access denied']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to delete gallery image']);
}
?>
