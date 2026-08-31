<?php
/**
 * API 1: Get Student Documents
 */

ini_set('display_errors', 0); // Hide raw errors to maintain clean JSON outputs
header('Content-Type: application/json');

require __DIR__ . '/../db.php';
require __DIR__ . '/upload_helper.php';
require __DIR__ . '/student_repository.php';

// Allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Only GET or POST methods are allowed'
    ]);
    exit;
}

// Extract inputs from either GET or POST
$student_id = isset($_REQUEST['student_id']) ? trim($_REQUEST['student_id']) : '';
$session    = isset($_REQUEST['session']) ? trim($_REQUEST['session']) : '';

$errors = [];
if ($student_id === '') {
    $errors['student_id'] = 'student_id is required';
}
if ($session === '') {
    $errors['session'] = 'session is required';
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

    $documents = [];
    foreach (UploadHelper::DOCUMENT_TYPES as $apiKey => $cfg) {
        $dbField = $cfg['db_field'];
        $suffix = $cfg['suffix'];
        $displayName = $cfg['name'];
        
        // Handle Other Document Name custom field
        if ($apiKey === 'other_document' && !empty($student['otnm'])) {
            $displayName = $student['otnm'];
        }

        $storedVal = $student[$dbField] ?? '';
        $uploaded = (!empty($storedVal));

        $documents[] = [
            'document_name' => $displayName,
            'database_field' => $dbField,
            'status' => $uploaded ? 'uploaded' : 'not_uploaded',
            'image_url' => $uploaded ? UploadHelper::getDocumentUrl($storedVal) : null,
            'original_filename' => $uploaded ? UploadHelper::getOriginalFilename($storedVal, $student_id, $suffix) : null
        ];
    }

    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Documents fetched successfully',
        'data' => [
            'student_id' => $student_id,
            'scholar_no' => $student['student_scholar'] ?? '',
            'student_name' => $student['student_name'] ?? '',
            'session' => $session,
            'documents' => $documents
        ]
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Something went wrong',
        'error_detail' => $e->getMessage()
    ]);
}
