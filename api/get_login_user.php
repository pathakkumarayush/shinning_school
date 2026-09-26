<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'auth.php';  

header('Content-Type: application/json');

// Allow only GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

$type = isset($_GET['type']) ? mysqli_real_escape_string($con, $_GET['type']) : null;
$uid  = isset($_GET['uid']) ? mysqli_real_escape_string($con, $_GET['uid']) : null;

// Validate input (at least one required)
if (empty($type) && empty($uid)) {
    http_response_code(422);
    echo json_encode([
        'status' => false,
        'message' => 'Please provide at least uid or type as filter'
    ]);
    exit;
}

// Build query dynamically
$conditions = [];
if (!empty($uid)) {
    $conditions[] = "uid = '$uid'";
}
if (!empty($type)) {
    $conditions[] = "type = '$type'";
}
$where = implode(" AND ", $conditions);

$query = "SELECT * FROM login WHERE $where";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    echo json_encode([
        'status' => true,
        'message' => 'User(s) found',
        'data'    => $users
    ]);
} else {
    echo json_encode([
        'status' => false,
        'message' => 'No users found with given filter(s)'
    ]);
}
