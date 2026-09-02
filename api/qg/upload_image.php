<?php
// api/qg/upload_image.php
// API endpoint to upload question images for the Question Paper Generator

ini_set('display_errors', 0);
header('Content-Type: application/json');

require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/auth_helper.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

// Authenticate via token
$auth = qg_authenticate($con, true);
$session_uid = $auth['uid'];

$file = $_FILES['image'] ?? ($_FILES['file'] ?? null);

if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => 'Please provide a valid image file in form field "image" or "file"'
    ]);
    exit;
}

// Validate file extension and MIME type
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($ext, $allowed_extensions)) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => 'Invalid file format. Allowed formats: ' . implode(', ', $allowed_extensions)
    ]);
    exit;
}

// Max 10MB
if ($file['size'] > 10 * 1024 * 1024) {
    http_response_code(400);
    echo json_encode([
        'status' => false,
        'message' => 'File size exceeds maximum allowed limit of 10MB'
    ]);
    exit;
}

// Target folder: school/uploads/qg/
$upload_dir = __DIR__ . '/../../school/uploads/qg/';
if (!is_dir($upload_dir)) {
    @mkdir($upload_dir, 0777, true);
}

$new_filename = 'qg_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
$target_path = $upload_dir . $new_filename;

$saved = is_uploaded_file($file['tmp_name']) ? move_uploaded_file($file['tmp_name'], $target_path) : @copy($file['tmp_name'], $target_path);

if ($saved) {
    $relative_path = 'school/uploads/qg/' . $new_filename;
    
    // Build full public URL
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? '') == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    // Derive base URL relative to root
    $script_dir = dirname(dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $base_url = rtrim($protocol . $host . $script_dir, '/');
    $image_url = $base_url . '/' . $relative_path;

    http_response_code(200);
    echo json_encode([
        'status' => true,
        'message' => 'Image uploaded successfully',
        'data' => [
            'image_path' => $relative_path,
            'image_url' => $image_url,
            'filename' => $new_filename
        ]
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Failed to save uploaded image to server directory'
    ]);
}
