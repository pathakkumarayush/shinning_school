<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');

require '../db.php'; // Change path if needed

// Mandatory session
if (!isset($_GET['session']) || empty($_GET['session'])) {
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

$session = mysqli_real_escape_string($con, $_GET['session']);
$class_id = isset($_GET['class']) ? mysqli_real_escape_string($con, $_GET['class']) : null;
// Build query
$query = "SELECT * FROM class_timetable WHERE session = '$session'";


if (!empty($class_id)) {
    $query .= " AND class_id = '$class_id'";
}



$query .= " ORDER BY class_id DESC";

// Execute query
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
   

    if (!empty($row['image'])) {
        $row['image'] = 'school/uploads/timetable/' . basename($row['image']);
    }
    $data[] = $row;
}

// Return response
echo json_encode([
    'status' => true,
    'message' => 'Timetable fetched successfully',
    'data' => $data
]);
