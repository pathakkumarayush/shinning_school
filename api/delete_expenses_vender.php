<?php
header('Content-Type: application/json');
require '../db.php';

$input = json_decode(file_get_contents("php://input"), true);
if (!$input) {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $input = $_GET;
    } else {
        $input = $_POST;
    }
}

$id = isset($input['id']) ? (int)$input['id'] : 0;

if ($id <= 0) {
    echo json_encode(['status' => false, 'message' => 'id is required for deletion']);
    exit;
}
$query = "DELETE FROM vender WHERE id = '$id'";
if (mysqli_query($con, $query)) {
    echo json_encode(['status' => true, 'message' => 'Vender deleted successfully']);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to delete vender']);
}
?>
