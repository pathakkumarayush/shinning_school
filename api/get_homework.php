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
$teacher_id = isset($_GET['teacher_id']) ? mysqli_real_escape_string($con, $_GET['teacher_id']) : null;
$class_id = isset($_GET['class']) ? mysqli_real_escape_string($con, $_GET['class']) : null;
$start_date = isset($_GET['start_date']) ? mysqli_real_escape_string($con, $_GET['start_date']) : null;
$end_date   = isset($_GET['end_date']) ? mysqli_real_escape_string($con, $_GET['end_date']) : null;
// Build query
$query = "SELECT * FROM homework WHERE session = '$session'";

if (!empty($teacher_id)) {
    $query .= " AND teach_id = '$teacher_id'";
}

if ($start_date && $end_date) {
    $query .= "AND assigndate BETWEEN '$start_date' AND '$end_date'";
}else{
	if ($start_date) {
    $query .= "AND assigndate = '$start_date'";
	}
}

if (!empty($class_id)) {
    $query .= " AND class_id = '$class_id'";
}



$query .= " ORDER BY homework_id DESC";

// Execute query
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
   

    if (!empty($row['image'])) {
        $row['image'] = 'school/uploads/homework/' . basename($row['image']);
    }
    $data[] = $row;
}

// Return response
echo json_encode([
    'status' => true,
    'message' => 'Homework fetched successfully',
    'data' => $data
]);
