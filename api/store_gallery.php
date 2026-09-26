<?php
header('Content-Type: application/json');
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

$image_id    = isset($_POST['image_id']) ? (int)$_POST['image_id'] : 0;
$category_id = isset($_POST['category_id']) ? (int)$_POST['category_id'] : 0;
$user_id     = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';

if ($user_id === '' || $category_id <= 0) {
    http_response_code(400);
    $response['message'] = 'category_id and user_id are required.';
    echo json_encode($response);
    exit;
}

$user_id_esc = mysqli_real_escape_string($con, $user_id);

// Ensure uploads directory exists
$upload_dir = '../school/uploads/gallery/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Check if file is uploaded
$image_path = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9.-]/', '_', $_FILES['image']['name']);
    $dest_path = $upload_dir . $fileName;

    if (move_uploaded_file($fileTmpPath, $dest_path)) {
        $image_path = 'uploads/gallery/' . $fileName; // Relative path stored in DB
    } else {
        $response['message'] = 'Error moving uploaded file.';
        echo json_encode($response);
        exit;
    }
}

if ($image_id > 0) {
    // Update existing image gallery entry
    if ($image_path !== "") {
        // If an image was uploaded, update category and image_path
        $updateQuery = "UPDATE image_gallery 
                        SET category_id = '$category_id', image_path = '$image_path' 
                        WHERE id = '$image_id'";
    } else {
        // If only category changed
        $updateQuery = "UPDATE image_gallery 
                        SET category_id = '$category_id' 
                        WHERE id = '$image_id'";
    }

    if (mysqli_query($con, $updateQuery)) {
        $response['status'] = true;
        $response['message'] = "Gallery updated successfully.";
    } else {
        $response['message'] = "Failed to update gallery.";
    }
} else {
    // Insert new
    if ($image_path === "") {
        $response['message'] = 'Image file is required for new entry.';
        echo json_encode($response);
        exit;
    }

    $insertQuery = "INSERT INTO image_gallery (category_id, image_path, user_id, status) 
                    VALUES ('$category_id', '$image_path', '$user_id_esc', 1)";
    if (mysqli_query($con, $insertQuery)) {
        $response['status'] = true;
        $response['message'] = "Gallery image uploaded successfully.";
        $response['data'] = ['id' => mysqli_insert_id($con)];
    } else {
        $response['message'] = "Failed to upload image: " . mysqli_error($con);
    }
}

echo json_encode($response);
?>
