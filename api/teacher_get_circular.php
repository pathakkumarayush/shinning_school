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

// Get input
$session_id = $_GET['session_id'] ?? null;
$teacher_id = $_GET['teacher_id'] ?? null;

$errors = [];

if (!$session_id) $errors[] = 'session_id is required.';
if (!$teacher_id) $errors[] = 'teacher_id is required.';


if (!empty($teacher_id)) {
    $stmt = $con->prepare("SELECT * FROM teacher WHERE teacher_id = ?");
    $stmt->bind_param("s", $teacher_id);
    $stmt->execute();
    if ($stmt->get_result()->num_rows === 0) $errors[] = "Invalid teacher_id.";
}

if ($errors) {
    respond([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ], 422);
}

$teacher_id_str = (string)$teacher_id;

// Fetch all teacher circulars for the session
$stmt = $con->prepare("SELECT * FROM circulars WHERE session = ? AND type = 'teacher' ORDER BY date DESC");
$stmt->bind_param("s", $session_id);
$stmt->execute();
$result = $stmt->get_result();

$circulars = [];
while ($row = $result->fetch_assoc()) {
    $typeIds = json_decode($row['type_id'] ?? '[]', true);
    if (!in_array($teacher_id_str, $typeIds)) {
        continue; // Only include circulars containing this teacher_id
    }

    $row['type_names'] = [];

    // Append teacher names
    if ($row['type'] === 'teacher' && $row['circular_type'] === 'teacher') {
        $placeholders = implode(',', array_fill(0, count($typeIds), '?'));
        $types = str_repeat('s', count($typeIds));
        $query = "SELECT teacher_name FROM teacher WHERE teacher_id IN ($placeholders)";
        $stmtNames = $con->prepare($query);
        $stmtNames->bind_param($types, ...$typeIds);
        $stmtNames->execute();
        $namesResult = $stmtNames->get_result();
        while ($n = $namesResult->fetch_assoc()) {
            $row['type_names'][] = $n['teacher_name'];
        }
    }

    if (!empty($row['image'])) {
        $row['image'] = 'school/uploads/circular/' . basename($row['image']);
    }
    $circulars[] = $row;
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
