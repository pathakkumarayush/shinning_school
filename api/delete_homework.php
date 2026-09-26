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

// ✅ Allow only GET method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    respond([
        'success' => false,
        'message' => 'Only GET method allowed'
    ], 405);
}

// Get input
$input = $_GET;
$homework_id = $input['homework_id'] ?? null;

$errors = [];
if (empty($homework_id)) $errors[] = "homework_id is required.";

$imagePath = null;

if ($homework_id) {
    // Fetch homework record
    $stmt = $con->prepare("SELECT * FROM homework WHERE homework_id = ?");
    $stmt->bind_param("i", $homework_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows === 0) {
        $errors[] = "Invalid homework_id.";
    } else {
        $row = $res->fetch_assoc();
        $imagePath = $row['image'] ?? null;
    }
}

if ($errors) {
    respond([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ], 422);
}

// ✅ Delete homework + image
try {
    // Delete image if exists
    if (!empty($imagePath)) {
        $fullPath = "../school/uploads/homework/" . basename($imagePath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    // Delete homework record
    $stmt = $con->prepare("DELETE FROM homework WHERE homework_id = ?");
    $stmt->bind_param("i", $homework_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        respond([
            'success' => true,
            'message' => 'Homework and image deleted successfully.'
        ], 200);
    } else {
        respond([
            'success' => false,
            'message' => 'Homework could not be deleted.'
        ], 500);
    }
} catch (Exception $e) {
    respond([
        'success' => false,
        'message' => 'Something went wrong.',
        'error' => $e->getMessage()
    ], 500);
}
