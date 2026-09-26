<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'auth.php';
header('Content-Type: application/json');
session_start();

function respond($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

// ✅ Allow only GET method (better use DELETE, but keeping your flow)
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    respond([
        'success' => false,
        'message' => 'Only GET method allowed'
    ], 405);
}

// Get input
$input = $_GET;
$circular_id = $input['circular_id'] ?? null;

$errors = [];
$imagePath = null;

if (empty($circular_id)) {
    $errors[] = "circular_id is required.";
} else {
    $stmt = $con->prepare("SELECT image FROM circulars WHERE id = ?");
    $stmt->bind_param("i", $circular_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows === 0) {
        $errors[] = "Invalid circular_id.";
    } else {
        $row = $res->fetch_assoc();
        $imagePath = $row['image'] ?? null; // store image path for deletion
    }
}

if ($errors) {
    respond([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ], 422);
}

// ✅ Delete circular and image
try {
    // Remove image if exists
    if (!empty($imagePath)) {
        // handle both "admin/circular/filename.jpg" or just "filename.jpg"
               $fullPath = "../school/uploads/circular/" . basename($imagePath);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    // Delete circular record
    $stmt = $con->prepare("DELETE FROM circulars WHERE id = ?");
    $stmt->bind_param("i", $circular_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        respond([
            'success' => true,
            'message' => 'Circular and image deleted successfully.'
        ], 200);
    } else {
        respond([
            'success' => false,
            'message' => 'Circular could not be deleted.'
        ], 500);
    }
} catch (Exception $e) {
    respond([
        'success' => false,
        'message' => 'Something went wrong.',
        'error' => $e->getMessage()
    ], 500);
}
