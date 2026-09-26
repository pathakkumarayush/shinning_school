<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

// include auth or db
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    $input = $_POST;
}

$category_id = isset($input['category_id']) ? (int)$input['category_id'] : 0;
$name        = isset($input['name']) ? trim($input['name']) : '';
$user_id     = isset($input['user_id']) ? trim($input['user_id']) : '';

if ($name === '' || $user_id === '') {
    http_response_code(400);
    $response['message'] = 'Name and user_id are required.';
    echo json_encode($response);
    exit;
}

$name_esc    = mysqli_real_escape_string($con, $name);
$user_id_esc = mysqli_real_escape_string($con, $user_id);

if ($category_id > 0) {
    // Update
    $updateQuery = "UPDATE image_gallery_category 
                    SET name = '$name_esc' 
                    WHERE id = '$category_id'";
    if (mysqli_query($con, $updateQuery)) {
        if (mysqli_affected_rows($con) > 0) {
            $response['status'] = true;
            $response['message'] = "Category updated successfully.";
        } else {
            $response['message'] = "No changes made or category not found.";
        }
    } else {
        $response['message'] = "Failed to update category: " . mysqli_error($con);
    }
} else {
    // Insert
    $insertQuery = "INSERT INTO image_gallery_category (name, user_id, status) 
                    VALUES ('$name_esc', '$user_id_esc', 1)";
    if (mysqli_query($con, $insertQuery)) {
        $response['status'] = true;
        $response['message'] = "Category added successfully.";
        $response['data'] = ['id' => mysqli_insert_id($con)];
    } else {
        $response['message'] = "Failed to add category: " . mysqli_error($con);
    }
}

echo json_encode($response);
?>
