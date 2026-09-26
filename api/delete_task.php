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

// ✅ Allow only DELETE method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    respond([
        'success' => false,
        'message' => 'Only GET method allowed'
    ], 405);
}

// Get input (from query string or JSON body)
$input = [];
if ($_SERVER['CONTENT_TYPE'] === 'application/json') {
    $input = json_decode(file_get_contents('php://input'), true) ?? [];
} else {
    $input = $_GET;
}

$circular_id = $input['task_id'] ?? null;

$errors = [];
if (empty($circular_id)) $errors[] = "task_id is required.";

if ($circular_id) {
    $stmt = $con->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $circular_id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows === 0) {
        $errors[] = "Invalid task_id.";
    }
}

if ($errors) {
    respond([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ], 422);
}

// ✅ Delete circular
try {
    $stmt = $con->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $circular_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        respond([
            'success' => true,
            'message' => 'Task deleted successfully.'
        ], 200);
    } else {
        respond([
            'success' => false,
            'message' => 'Task could not be deleted.'
        ], 500);
    }
} catch (Exception $e) {
    respond([
        'success' => false,
        'message' => 'Something went wrong.',
        'error' => $e->getMessage()
    ], 500);
}
