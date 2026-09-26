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

// Input
$session_id = $_GET['session_id'] ?? null;
$student_id = $_GET['student_id'] ?? null;

$errors = [];
if (!$session_id) $errors[] = 'session_id is required.';
if (!$student_id) $errors[] = 'student_id is required.';

if ($errors) {
    respond([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ], 422);
}

// Find student from students table
$stmt = $con->prepare("SELECT * FROM student WHERE student_id = ? AND student_session = ? LIMIT 1");
$stmt->bind_param("ss", $student_id, $session_id);
$stmt->execute();
$studentResult = $stmt->get_result();
$student = $studentResult->fetch_assoc();

if (!$student) {
    respond([
        'success' => false,
        'message' => 'Student not found or inactive for this session'
    ], 404);
}

$class_id = (string) $student['student_class'];

// Fetch circulars matching class or student
$stmt = $con->prepare("SELECT * FROM circulars WHERE session = ? AND type = 'student' ORDER BY date DESC");
$stmt->bind_param("i", $session_id);
$stmt->execute();
$result = $stmt->get_result();

$circulars = [];

while ($row = $result->fetch_assoc()) {
    $typeIds = json_decode($row['type_id'] ?? '[]', true);

    if (
        ($row['circular_type'] === 'class' && in_array($class_id, $typeIds)) ||
        ($row['circular_type'] === 'student' && in_array($student_id, $typeIds))
    ) {
        $row['type_names'] = [];

        // Add type_names
        if ($row['type'] === 'student') {
            if ($row['circular_type'] === 'class') {
                if (!empty($typeIds)) {
                    $placeholders = implode(',', array_fill(0, count($typeIds), '?'));
                    $row['type_names'][] = $placeholders;
                }
            } elseif ($row['circular_type'] === 'student') {
                if (!empty($typeIds)) {
                    $placeholders = implode(',', array_fill(0, count($typeIds), '?'));
                    $types = str_repeat('s', count($typeIds));
                    $query = "SELECT student_name FROM student WHERE student_id IN ($placeholders) ORDER BY student_name ASC";
                    $stmtName = $con->prepare($query);
                    $stmtName->bind_param($types, ...$typeIds);
                    $stmtName->execute();
                    $names = $stmtName->get_result();
                    while ($n = $names->fetch_assoc()) {
                        $row['type_names'][] = $n['student_name'];
                    }
                }
            }
        }

        if (!empty($row['image'])) {
            $row['image'] = 'school/uploads/circular/' . basename($row['image']);
        }
        $circulars[] = $row;
    }
}

if (empty($circulars)) {
    respond([
        'message' => 'Empty Data',
        'success' => false,
    ], 404);
}

respond([
    'message' => 'Get Circular',
    'success' => true,
    'data' => $circulars
], 200);
