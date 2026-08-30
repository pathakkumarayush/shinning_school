<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
date_default_timezone_set('Asia/Kolkata');

require '../db.php'; // adjust your path

// Validate required params
if (!isset($_GET['session']) || empty($_GET['session'])) {
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

if (!isset($_GET['examination']) || empty($_GET['examination'])) {
    echo json_encode(['status' => false, 'message' => 'Examination is required']);
    exit;
}

$session = mysqli_real_escape_string($con, $_GET['session']);
$examination = mysqli_real_escape_string($con, $_GET['examination']);
$class = isset($_GET['class']) ? mysqli_real_escape_string($con, $_GET['class']) : null;

// Build query
$query = "SELECT exam_id, examination, session, class, subject, sdate, marks, school
          FROM exam
          WHERE session = '$session' AND examination = '$examination'";

if (!empty($class)) {
    $query .= " AND class = '$class'";
}

$query .= " ORDER BY class ASC, sdate ASC";

// Execute query
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    // format exam date
    $row['sdate'] = date('d-m-Y', strtotime($row['sdate']));
    // push directly into data (no grouping)
    $data[] = $row;
}

// Return response
echo json_encode([
    'status' => true,
    'message' => 'Exam timetable fetched successfully',
    'data' => $data
]);
