<?php
/**
 * API 3: Class Wise Student Documents
 */

ini_set('display_errors', 0);
header('Content-Type: application/json');

require __DIR__ . '/../db.php';
require __DIR__ . '/upload_helper.php';
require __DIR__ . '/student_repository.php';

// Allow GET or POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET' && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Only GET or POST methods are allowed'
    ]);
    exit;
}

$class   = isset($_REQUEST['class_id']) ? trim($_REQUEST['class_id']) : (isset($_REQUEST['class']) ? trim($_REQUEST['class']) : '');
$session = isset($_REQUEST['session']) ? trim($_REQUEST['session']) : '';

$errors = [];
if ($class === '') {
    $errors['class'] = 'class_id (or class) is required';
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
    $students = $repo->findByClassAndSession($class, $session);

    $data = [];
    foreach ($students as $student) {
        $studentId = $student['student_id'] ?? '';
        
        $documents = [];
        foreach (UploadHelper::DOCUMENT_TYPES as $apiKey => $cfg) {
            $dbField = $cfg['db_field'];
            $storedVal = $student[$dbField] ?? '';
            $uploaded = (!empty($storedVal));

            $documents[$apiKey] = [
                'status' => $uploaded ? 'uploaded' : 'not_uploaded',
                'image_url' => $uploaded ? UploadHelper::getDocumentUrl($storedVal) : 'not_uploaded'
            ];
        }

        $data[] = [
            'student_id' => $studentId,
            'scholar_no' => $student['student_scholar'] ?? '',
            'student_name' => $student['student_name'] ?? '',
            'father_name' => $student['student_fname'] ?? '',
            'class' => $student['student_class'] ?? '',
            'documents' => $documents
        ];
    }

    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Class documents fetched successfully',
        'data' => $data
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Something went wrong',
        'error_detail' => $e->getMessage()
    ]);
}
