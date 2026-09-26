<?php
header('Content-Type: application/json');
require '../db.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    if (!$input) {
        $input = $_POST;
    }
} else {
    $input = $_GET;
}

$report_type = isset($input['type']) ? trim($input['type']) : '';

if ($report_type === '') {
    echo json_encode(['status' => false, 'message' => "Report 'type' is required (e.g. 'today', 'date_wise', 'between_date', 'by_header', 'by_vender')"]);
    exit;
}

$query = "SELECT * FROM expenses WHERE 1=1";

date_default_timezone_set('Asia/Kolkata');
$today_str = date('Y-m-d');

if ($report_type === 'today') {
    $query .= " AND date = '$today_str'";
} elseif ($report_type === 'date_wise') {
    $date = isset($input['date']) ? mysqli_real_escape_string($con, $input['date']) : '';
    $query .= " AND date = '$date'";
} elseif ($report_type === 'between_date') {
    $start_date = isset($input['start_date']) ? mysqli_real_escape_string($con, $input['start_date']) : '';
    $end_date = isset($input['end_date']) ? mysqli_real_escape_string($con, $input['end_date']) : '';
    $query .= " AND date >= '$start_date' AND date <= '$end_date'";
} elseif ($report_type === 'by_header') {
    $header_name = isset($input['header_name']) ? mysqli_real_escape_string($con, $input['header_name']) : '';
    if (empty($header_name) && isset($input['name'])) {
        $header_name = mysqli_real_escape_string($con, $input['name']);
    }
    $query .= " AND name = '$header_name'";
} elseif ($report_type === 'by_vender') {
    $vender_name = isset($input['vender_name']) ? mysqli_real_escape_string($con, $input['vender_name']) : '';
    if (empty($vender_name) && isset($input['vname'])) {
        $vender_name = mysqli_real_escape_string($con, $input['vname']);
    }
    $query .= " AND vname = '$vender_name'";
} else {
    echo json_encode(['status' => false, 'message' => "Invalid report type"]);
    exit;
}

$query .= " ORDER BY date DESC, id DESC";

$result = mysqli_query($con, $query);
$data = [];
$total_amount = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
        $total_amount += (float)$row['amt'];
    }
    echo json_encode([
        'status' => true, 
        'report_type' => $report_type,
        'total_amount' => $total_amount,
        'count' => count($data),
        'data' => $data
    ]);
} else {
    echo json_encode(['status' => false, 'message' => 'Failed to fetch report data']);
}
?>
