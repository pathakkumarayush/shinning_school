<?php
/**
 * API 2: Update Particular Document
 */

ini_set('display_errors', 0);
header('Content-Type: application/json');

require __DIR__ . '/../db.php';
require __DIR__ . '/upload_helper.php';
require __DIR__ . '/student_repository.php';

// Validate POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Only POST method is allowed'
    ]);
    exit;
}

$student_id   = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
$session      = isset($_POST['session']) ? trim($_POST['session']) : '';
$document_type = isset($_POST['document_type']) ? trim($_POST['document_type']) : '';
$otnm         = isset($_POST['otnm']) ? trim($_POST['otnm']) : null;

$errors = [];
if ($student_id === '') {
    $errors['student_id'] = 'student_id is required';
}
if ($session === '') {
    $errors['session'] = 'session is required';
}
if ($document_type === '') {
    $errors['document_type'] = 'document_type is required';
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    $errors['image'] = 'Valid image/document file is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ]);
    exit;
}

// Resolve document type
$docCfg = UploadHelper::resolveType($document_type);
if (!$docCfg) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => [
            'document_type' => 'Invalid document type. Allowed types: ' . implode(', ', array_keys(UploadHelper::DOCUMENT_TYPES))
        ]
    ]);
    exit;
}

// Validate file extension
$allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'pdf'];
$origFilename = $_FILES['image']['name'];
$ext = strtolower(pathinfo($origFilename, PATHINFO_EXTENSION));

if (!in_array($ext, $allowedExts)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => [
            'image' => 'Allowed extensions: ' . implode(', ', $allowedExts)
        ]
    ]);
    exit;
}

// Enforce PDF size limit
if ($ext === 'pdf' && $_FILES['image']['size'] > 100 * 1024) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => [
            'image' => 'PDF file size cannot exceed 100 KB.'
        ]
    ]);
    exit;
}

try {
    $repo = new StudentRepository($con);
    $student = $repo->findByIdAndSession($student_id, $session);

    if (!$student) {
        http_response_code(404);
        echo json_encode([
            'success' => false,
            'message' => 'Student not found or invalid session'
        ]);
        exit;
    }

    $uploadDir = UploadHelper::getUploadDir();
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // ERP naming convention: $student_id . $suffix . original_filename
    $suffix = $docCfg['suffix'];
    $dbField = $docCfg['db_field'];
    $statusField = $docCfg['status_field'];

    // Overwrite behavior: Delete old files if they exist on disk
    $oldFilename = $student[$dbField] ?? '';
    if (!empty($oldFilename)) {
        $path1 = $uploadDir . $oldFilename;
        $path2 = dirname(__DIR__) . '/school/upload/' . $oldFilename; // Also check upload/ as in ERP
        
        if (file_exists($path1)) {
            @unlink($path1);
        }
        if (file_exists($path2)) {
            @unlink($path2);
        }
    }

    // Generate new filename
    // Sanitize the file basename just in case (removing characters that could break URLs/OS paths)
    $cleanBasename = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', basename($origFilename));
    $newFilename = $student_id . $suffix . $cleanBasename;
    $targetPath = $uploadDir . $newFilename;

    $tmpPath = $_FILES['image']['tmp_name'];

    // Compress images or copy PDF
    if ($ext === 'pdf') {
        if (!move_uploaded_file($tmpPath, $targetPath)) {
            throw new Exception("Failed to save uploaded PDF file.");
        }
    } else {
        // Automatically compress image target to fit under 100 KB
        $compressed = UploadHelper::compressImage($tmpPath, $targetPath, 100);
        if (!$compressed) {
            // If compression failed or couldn't reduce under 100 KB
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => [
                    'image' => 'Compression failed: Could not reduce image size under 100 KB while maintaining acceptable quality.'
                ]
            ]);
            exit;
        }
    }

    // Update database
    $updated = $repo->updateDocument($student_id, $session, $dbField, $statusField, $newFilename, $otnm);

    if ($updated) {
        http_response_code(200);
        echo json_encode([
            'success' => true,
            'message' => 'Document updated successfully',
            'data' => [
                'document_type' => $document_type,
                'database_field' => $dbField,
                'file_name' => $newFilename,
                'image_url' => UploadHelper::getDocumentUrl($newFilename)
            ]
        ]);
    } else {
        throw new Exception("Database update failed.");
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Something went wrong',
        'error_detail' => $e->getMessage()
    ]);
}
