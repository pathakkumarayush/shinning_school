<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require '../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

// Sanitize inputs
$session = isset($_GET['session']) ? mysqli_real_escape_string($con, trim($_GET['session'])) : null;
$head = isset($_GET['head']) ? trim($_GET['head']) : null;
$class = isset($_GET['class']) ? mysqli_real_escape_string($con, trim($_GET['class'])) : null;
$month_input = isset($_GET['month']) ? trim($_GET['month']) : null;

$month_map = [
    1 => 'April', 2 => 'July', 3 => 'August', 4 => 'September', 5 => 'October',
    6 => 'November', 7 => 'December', 8 => 'January', 9 => 'February', 10 => 'March'
];

$month_idx = null;
if ($month_input !== null && $month_input !== '') {
    // Strictly search for month name (index is no longer supported)
    foreach ($month_map as $idx => $name) {
        if (strcasecmp($name, $month_input) === 0) {
            $month_idx = $idx;
            break;
        }
    }
    
    if ($month_idx === null) {
        http_response_code(400);
        echo json_encode(['status' => false, 'message' => 'Invalid month name. Please use names like April, July, August, etc.']);
        exit;
    }
}

if (!$session || !$head) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'session and head are required']);
    exit;
}

// Map heads to their specific configurations
$head_config = [
    'registration' => [
        'student_filter' => "rti='No' AND std_type='New'",
        'paid_column' => 'sum(adm_fee)',
        'fee_table' => 'admission',
        'fee_column' => 'fee',
        'display_name' => 'School Registration Fee',
        'month' => 'Apr'
    ],
    'yearly' => [
        'student_filter' => "rti='No'",
        'paid_column' => 'sum(caution)',
        'fee_table' => 'cautionfee',
        'fee_column' => 'fee',
        'display_name' => 'School Yearly Expenses',
        'month' => 'Apr-July'
    ],
    'enrollment' => [
        'student_filter' => "rti='No' AND enfee='Yes'",
        'paid_column' => 'sum(enroll)',
        'fee_table' => 'admission',
        'fee_column' => 'enfee',
        'display_name' => 'CBSE Enrollment Fee',
        'month' => 'Apr'
    ],
    'board_reg' => [
        'student_filter' => "rti='No' AND creg='Yes'",
        'paid_column' => 'sum(board_fee)',
        'fee_table' => 'bfee',
        'fee_column' => 'fee',
        'display_name' => 'CBSE Board Reg. Fee',
        'month' => 'Oct'
    ],
    'board_exam' => [
        'student_filter' => "rti='No' AND eex='Yes'",
        'paid_column' => 'sum(bexam)',
        'fee_table' => 'cbse',
        'fee_column' => 'fee',
        'display_name' => 'CBSE Board Exam Fee',
        'month' => 'Oct'
    ],
    'smart_class' => [
        'student_filter' => "rti='No'",
        'paid_column' => 'sum(smclass)',
        'fee_table' => 'annual',
        'fee_column' => 'fee',
        'display_name' => 'Smart Class Fee'
    ],
    'compartment' => [
        'student_filter' => "rti='No' AND comfee='Yes'",
        'paid_column' => 'sum(bcomp)',
        'fee_table' => null,
        'fee_column' => null,
        'display_name' => 'Compartment Fee'
    ],
    'improvement' => [
        'student_filter' => "rti='No' AND impfee='Yes'",
        'paid_column' => 'sum(impsub)',
        'fee_table' => null,
        'fee_column' => null,
        'display_name' => 'Improvement Fee'
    ],
    'tuition' => [
        'student_filter' => "rti='No'",
        'display_name' => 'Tuition Fee'
    ],
    'bus' => [
        'student_filter' => "transport_status='Active'",
        'display_name' => 'Bus Fee'
    ]
];

if (!isset($head_config[$head])) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'Invalid head parameter']);
    exit;
}

$config = $head_config[$head];
$where = "student_session = '$session' AND status = '0'";
if ($class) {
    $where .= " AND student_class = '$class'";
}
if (!empty($config['student_filter'])) {
    $where .= " AND " . $config['student_filter'];
}

// Special month handling for Bus
if ($head === 'bus' && $month_idx > 0) {
    $month_col = "m" . $month_idx;
    $month_name = $month_map[$month_idx];
    $where .= " AND $month_col = '$month_name'";
}

$query = "SELECT * FROM student WHERE $where ORDER BY student_class, student_name ASC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$data = [];
$i = 1;
while ($student = mysqli_fetch_assoc($result)) {
    $student_id = $student['student_id'];
    $student_class = $student['student_class'];

    // Get Paid Details
    if ($head === 'bus') {
        $paid_q = mysqli_query($con, "SELECT sum(fee_deposit), sum(latefee), sum(concession) FROM fee_detail_trans WHERE student='$student_id' AND status='1' AND session='$session'");
        $paid_row = mysqli_fetch_assoc($paid_q);
        $paid_amt = (float)($paid_row['sum(fee_deposit)'] ?? 0);
        $late_fee = (float)($paid_row['sum(latefee)'] ?? 0);
        $concession = (float)($paid_row['sum(concession)'] ?? 0);
    } else {
        $paid_q = mysqli_query($con, "SELECT sum(fee_deposit), sum(inst_fee), sum(latefee), sum(concession), sum(month), sum(adm_fee), sum(caution), sum(enroll), sum(board_fee), sum(bexam), sum(pdue), sum(due), sum(smclass), sum(bcomp), sum(impsub) FROM fee_detail WHERE student='$student_id' AND status='1' AND session='$session'");
        $paid_row = mysqli_fetch_assoc($paid_q);
        
        if ($head === 'tuition') {
            $p = (float)($paid_row['sum(pdue)'] ?? 0) + (float)($paid_row['sum(latefee)'] ?? 0);
            $n = (float)($paid_row['sum(due)'] ?? 0) + (float)($paid_row['sum(concession)'] ?? 0);
            $paid_amt = (float)($paid_row['sum(inst_fee)'] ?? 0) + $p - $n;
            $late_fee = (float)($paid_row['sum(latefee)'] ?? 0);
            $concession = (float)($paid_row['sum(concession)'] ?? 0);
        } else {
            $col = $config['paid_column'];
            $paid_amt = (float)($paid_row[$col] ?? 0);
            $late_fee = 0;
            $concession = 0;
        }
    }

    // Get Total Fee (Structure)
    $total_fee = 0;
    if ($head === 'tuition') {
        if ($month_idx > 0) {
            $inst_q = mysqli_query($con, "SELECT * FROM instdetail WHERE class='$student_class' AND session='$session'");
            $inst_row = mysqli_fetch_assoc($inst_q);
            $base_amt = (float)($inst_row['amnt'] ?? 0);
            $total_fee = $base_amt * $month_idx;
            
            if (!empty($student['famt'])) {
                $concession_pct = (float)$student['famt'];
                $total_fee = $total_fee - ($total_fee * $concession_pct / 100);
            }
        }
    } elseif ($head === 'bus') {
        if ($month_idx > 0) {
            $stopage = $student['transport_stopage'];
            $bus_fee = 0;
            // Aggregate bus fees up to the selected month index
            for ($m = 1; $m <= $month_idx; $m++) {
                $m_key = "m" . $m;
                $m_name = (isset($student[$m_key]) && !empty($student[$m_key])) ? $student[$m_key] : null;
                if ($m_name) {
                    $trans_q = mysqli_query($con, "SELECT amnt FROM trans_instdetail WHERE stop_name='$stopage' AND month='$m_name' AND session='$session'");
                    $trans_row = mysqli_fetch_assoc($trans_q);
                    $bus_fee += (float)($trans_row['amnt'] ?? 0);
                }
            }
            
            if ($student['fc'] === 'STAFF WARD' && !empty($student['famt'])) {
                $total_fee = $bus_fee - ($bus_fee * (float)$student['famt'] / 100);
            } elseif ($student['transport_type'] === 'One Way') {
                $total_fee = $bus_fee / 2;
            } else {
                $total_fee = $bus_fee;
            }
        }
    } else {
        $table = $config['fee_table'] ?? null;
        $col = $config['fee_column'] ?? null;
        if ($table && $col) {
            $fee_query = "SELECT * FROM $table WHERE session='$session'";
            if ($table !== 'annual') {
                $fee_query .= " AND class='$student_class'";
            }
            $fee_q = mysqli_query($con, $fee_query);
            $fee_row = mysqli_fetch_assoc($fee_q);
            $total_fee = (float)($fee_row[$col] ?? 0);
            
            if ($head === 'smart_class') {
                $total_fee *= 10;
            }
        } else {
            $total_fee = 0;
        }
    }

    $balance = $total_fee + $late_fee - $paid_amt - $concession;
    if ($balance < 0) $balance = 0;

    // Get Month(s)
    $month_display = $config['month'] ?? '';
    if ($head === 'smart_class') {
        $mn_q = mysqli_query($con, "SELECT month FROM fee_detail WHERE student='$student_id' AND smclass!='' AND status='1' AND session='$session'");
        $months = [];
        while ($mn_row = mysqli_fetch_assoc($mn_q)) {
            $months[] = $mn_row['month'];
        }
        $month_display = implode(', ', $months);
    }

    $data[] = [
        'No' => $i++,
        'Name' => $student['student_name'],
        'Mobile' => $student['student_contactno'],
        'Class' => $student_class,
        'Month' => $month_display,
        'Total_Fee' => $total_fee,
        'Paid_Amount' => $paid_amt,
        'Balance' => $balance,
        'student_id' => $student_id // Kept for reference
    ];
}

echo json_encode([
    'status' => true,
    'head' => $head,
    'display_head' => $config['display_name'],
    'session' => $session,
    'count' => count($data),
    'data' => $data
]);
