<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

// Sanitize inputs
$class = isset($_GET['class']) ? mysqli_real_escape_string($con, trim($_GET['class'])) : null;
$session = isset($_GET['session']) ? mysqli_real_escape_string($con, trim($_GET['session'])) : null;
$startDate = isset($_GET['start_date']) ? trim($_GET['start_date']) : null;
$endDate = isset($_GET['end_date']) ? trim($_GET['end_date']) : null;
$month = isset($_GET['month']) ? mysqli_real_escape_string($con, trim($_GET['month'])) : null;

// Check required fields
if (!$session) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'session is required']);
    exit;
}
$where = "ad.session = '$session'";
if ($class) {
	$where .= " AND ad.class = '$class'";
}

// Build WHERE condition
$dateFormat = 'd-m-Y';

if ($startDate && $endDate) {
    $startObj = DateTime::createFromFormat('d-m-Y', $startDate);
    $endObj = DateTime::createFromFormat('d-m-Y', $endDate);
    
    if ($startObj && $endObj) {
        $start = $startObj->format('d-m-Y');
        $end = $endObj->format('d-m-Y');
        
        $where .= " AND STR_TO_DATE(ad.date, '%d-%m-%Y') BETWEEN STR_TO_DATE('$start', '%d-%m-%Y') AND STR_TO_DATE('$end', '%d-%m-%Y')";
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid date format. Use d-m-Y']);
        exit;
    }
} elseif ($startDate) {
    $startObj = DateTime::createFromFormat($dateFormat, $startDate);
    if ($startObj) {
        $start = $startObj->format($dateFormat);
        $where .= " AND ad.date = '$start'";
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid start_date format. Use d-m-Y']);
        exit;
    }
} elseif ($endDate) {
    $endObj = DateTime::createFromFormat($dateFormat, $endDate);
    if ($endObj) {
        $end = $endObj->format($dateFormat);
        $where .= " AND ad.date = '$end'";
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid end_date format. Use d-m-Y']);
        exit;
    }
}


if ($month) {
    $where .= " AND ad.month = '$month'";
}


// Determine query type: Group by student if month is requested, else detailed list
if ($month && !$startDate && !$endDate) {
    $query = "
        SELECT 
            s.student_name AS student_name,
            s.student_fname AS father_name,
            ad.class,
            ad.month,
            COUNT(*) AS total_absent
        FROM absentdetail ad
        JOIN student s ON s.student_id = ad.student AND s.student_session = '$session'
        WHERE $where
        GROUP BY ad.student, s.student_name, s.student_fname, ad.class, ad.month
        ORDER BY s.student_name ASC
    ";
    $message = 'Absent summary fetched successfully';
} else {
    $query = "
        SELECT 
            s.student_name AS student_name,
            s.student_fname AS father_name,
            ad.class,
            ad.date,
            ad.month
        FROM absentdetail ad
        JOIN student s ON s.student_id = ad.student AND s.student_session = '$session'
        WHERE $where
        ORDER BY ad.date DESC, s.student_name ASC
    ";
    $message = 'Absent data fetched successfully';
}

$result = mysqli_query($con, $query);
$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode([
        'status' => true,
        'message' => $message,
        'count' => count($data),
        'data' => $data
    ]);
} else {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
}
