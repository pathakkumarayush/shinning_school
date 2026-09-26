<?php
session_start();
require 'auth.php';

header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$data = $_POST;

// Check required field: session
if (empty($data['session'])) {
    http_response_code(422);
    echo json_encode([
        'status' => false,
        'message' => 'Missing required fields: session'
    ]);
    exit;
}

// Optional class filter
$class_filter = "";
if (!empty($data['class'])) {
    // Parse and sanitize class list
    $class_list = is_array($data['class']) ? $data['class'] : explode(',', $data['class']);
    $class_list = array_filter($class_list); // Remove empty/null values

    if (count($class_list) === 0) {
        http_response_code(422);
        echo json_encode([
            'status' => false,
            'message' => 'At least one class must be provided'
        ]);
        exit;
    }

    $class_ids_str = implode(',', array_map(function ($val) use ($con) {
        return "'" . mysqli_real_escape_string($con, trim($val)) . "'";
    }, $class_list));

    $class_filter = "fd.class IN ($class_ids_str) AND";
}

// Sanitize other inputs
$session    = mysqli_real_escape_string($con, $data['session']);
$start_date = null;
if (isset($data['start_date']) && $data['start_date'] !== '') {
    $start_date = mysqli_real_escape_string($con, $data['start_date']);
} elseif (isset($data['from']) && $data['from'] !== '') {
    $start_date = mysqli_real_escape_string($con, $data['from']);
} elseif (isset($_GET['from']) && $_GET['from'] !== '') {
    $start_date = mysqli_real_escape_string($con, $_GET['from']);
}

$end_date = null;
if (isset($data['end_date']) && $data['end_date'] !== '') {
    $end_date = mysqli_real_escape_string($con, $data['end_date']);
} elseif (isset($data['to']) && $data['to'] !== '') {
    $end_date = mysqli_real_escape_string($con, $data['to']);
} elseif (isset($_GET['to']) && $_GET['to'] !== '') {
    $end_date = mysqli_real_escape_string($con, $_GET['to']);
}

// Optional date filter
$date_filter = "";
if ($start_date && $end_date) {
    $date_filter = "AND fd.date BETWEEN '$start_date' AND '$end_date'";
}else{
	if ($start_date) {
    $date_filter = "AND fd.date = '$start_date'";
	}
}

$type = 'tuition';
if (isset($_POST['type']) && trim($_POST['type']) !== '') {
    $type = trim($_POST['type']);
} elseif (isset($_GET['type']) && trim($_GET['type']) !== '') {
    $type = trim($_GET['type']);
} elseif (isset($data['type']) && trim($data['type']) !== '') {
    $type = trim($data['type']);
}

$table_name = ($type === 'transport') ? 'fee_detail_trans' : 'fee_detail';

// Build query
$query = "
    SELECT
        fd.*,
        s.student_fname AS father_name
    FROM
        $table_name fd
    LEFT JOIN
        student s ON s.student_id = fd.student AND s.student_session = fd.session
    WHERE
        $class_filter
        fd.session = '$session'
        $date_filter
    AND fd.status = '1'
    ORDER BY
        fd.date ASC, fd.id ASC
";

$result = mysqli_query($con, $query);

if ($result) {
    $collection = [];
    $admission_collection = [];
    $grand_total = 0;
    $cash_total = 0;
    $online_total = 0;
    $cheque_total = 0;
    $admission_total = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        $deposit = (float)$row['fee_deposit'];
        
        if (trim($row['ptype'] ?? '') === 'Admission Form') {
            $admission_collection[] = $row;
            $admission_total += $deposit;
        } else {
            $collection[] = $row;
            $grand_total += $deposit;
            
            $pay_type = strtolower(trim($row['pay_type'] ?? ''));
            if ($pay_type === 'cash') {
                $cash_total += $deposit;
            } elseif ($pay_type === 'online') {
                $online_total += $deposit;
            } elseif ($pay_type === 'cheque') {
                $cheque_total += $deposit;
            }
        }
    }

    echo json_encode([
        'status' => true,
        'message' => 'Fee collection details fetched successfully',
        'cash_amount' => $cash_total,
        'online_amount' => $online_total,
        'cheque_amount' => $cheque_total,
        'total_amount' => $grand_total,
        'admission_fee_detail' => $admission_collection,
        'total_admission_fee' => $admission_total,
        'data' => $collection,
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
}

