<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'auth.php';
header('Content-Type: application/json');
session_start();

// Helper function to return JSON
function respond($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

// Get input
$session_id = $_GET['session_id'] ?? null;
$admin_id = $_GET['admin_id'] ?? null;

// Validate input
$errors = [];
if (!$session_id) $errors[] = 'session_id is required.';
if (!$admin_id) $errors[] = 'admin_id is required.';


if ($errors) {
    respond([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ], 422);
}

// Fetch circulars
$stmt = $con->prepare("SELECT * FROM circulars WHERE session = ? AND type = 'student' AND user_id = ?");
$stmt->bind_param("ss", $session_id, $admin_id);
$stmt->execute();
$result = $stmt->get_result();

$circulars = [];
while ($row = $result->fetch_assoc()) {
    $typeIds = json_decode($row['type_id'] ?? '[]', true);
    $row['type_names'] = [];

    // Fetch related names based on type
    if ($row['type'] === 'student') {
        if ($row['circular_type'] === 'class' && !empty($typeIds)) {
 			$row['type_names'] = $typeIds;
        } elseif ($row['circular_type'] === 'student' && !empty($typeIds)) {
            $placeholders = implode(',', array_fill(0, count($typeIds), '?'));
            $types = str_repeat('s', count($typeIds));
            $query = "SELECT student_name FROM student WHERE student_id IN ($placeholders) ORDER BY student_name ASC";
            $stmtNames = $con->prepare($query);
            $stmtNames->bind_param($types, ...$typeIds);
            $stmtNames->execute();
            $namesResult = $stmtNames->get_result();
            while ($n = $namesResult->fetch_assoc()) {
                $row['type_names'][] = $n['student_name'];
            }
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
