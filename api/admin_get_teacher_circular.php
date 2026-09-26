<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'auth.php';
header('Content-Type: application/json');

session_start();

// Helper function to respond with JSON
function respond($data, $code = 200) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

// Get input
$session_id = $_GET['session_id'] ?? null;
$admin_id = $_GET['admin_id'] ?? null;

// Validate inputs
$errors = [];

if (empty($session_id)) $errors[] = "session_id is required.";
if (empty($admin_id)) $errors[] = "admin_id is required.";


// Get circulars
$stmt = $con->prepare("SELECT * FROM circulars WHERE session = ? AND type = 'teacher' AND user_id = ?");
$stmt->bind_param("ss", $session_id, $admin_id);
$stmt->execute();
$result = $stmt->get_result();

$circulars = [];
while ($row = $result->fetch_assoc()) {
    $typeIds = json_decode($row['type_id'] ?? '[]', true);
    $row['type_names'] = [];

    if ($row['type'] === 'teacher' && $row['circular_type'] === 'teacher' && !empty($typeIds)) {
        // Fetch teacher names from admins using emp_id
        $placeholders = implode(',', array_fill(0, count($typeIds), '?'));
        $types = str_repeat('s', count($typeIds));
        $query = "SELECT teacher_name FROM teacher WHERE teacher_id IN ($placeholders)";
        $stmtNames = $con->prepare($query);
        $stmtNames->bind_param($types, ...$typeIds);
        $stmtNames->execute();
        $namesResult = $stmtNames->get_result();
        $names = [];
        while ($nameRow = $namesResult->fetch_assoc()) {
            $names[] = $nameRow['teacher_name'];
        }
        $row['type_names'] = $names;
    }

    if (!empty($row['image'])) {
        $row['image'] = 'school/uploads/circular/' . basename($row['image']);
    }
    $circulars[] = $row;
}

if (empty($circulars)) {
    respond([
        'message' => 'Empty Data',
        'success' => false
    ], 404);
}

respond([
    'message' => 'Get Circular',
    'success' => true,
    'data' => $circulars
], 200);
