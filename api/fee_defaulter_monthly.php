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
$class = isset($_GET['class']) ? mysqli_real_escape_string($con, trim($_GET['class'])) : null;
$month_input = isset($_GET['month']) ? trim($_GET['month']) : null;
$type = isset($_GET['type']) ? strtolower(trim($_GET['type'])) : 'tuition';

if (!in_array($type, ['tuition', 'transport', 'other'])) {
    $type = 'tuition';
}

// Normalize class input
if ($class === 'All' || $class === 'all' || $class === '-1' || $class === '') {
    $class = null;
}

// Default session if not provided
if (!$session) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT student_session FROM student WHERE status='0' ORDER BY student_session DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['student_session'] ?? null;
}

if (!$session) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'session is required']);
    exit;
}

// Helper to resolve month input to index (1 to 10)
function getMonthIndex($month_input) {
    if ($month_input === null || $month_input === '') return null;
    $month_input = trim($month_input);
    if (is_numeric($month_input)) {
        $val = (int)$month_input;
        if ($val >= 1 && $val <= 10) return $val;
    }
    
    // Split by separator like - or 'to'
    $parts = preg_split('/[-]|(\bto\b)/i', $month_input);
    $last_part = strtolower(trim(end($parts)));
    
    $map = [
        'april' => 1, 'apr' => 1,
        'july' => 2, 'jul' => 2,
        'august' => 3, 'aug' => 3,
        'september' => 4, 'sep' => 4,
        'october' => 5, 'oct' => 5,
        'november' => 6, 'nov' => 6,
        'december' => 7, 'dec' => 7,
        'january' => 8, 'jan' => 8,
        'february' => 9, 'feb' => 9,
        'march' => 10, 'mar' => 10
    ];
    
    return $map[$last_part] ?? null;
}

$month_index = getMonthIndex($month_input);

if ($type !== 'other' && !$month_index) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Valid month parameter is required for tuition and transport types.']);
    exit;
}

// Month name lookup for response metadata
$month_names = [
    1 => 'April', 2 => 'April to July', 3 => 'April to August', 4 => 'April to September',
    5 => 'April to October', 6 => 'April to November', 7 => 'April to December',
    8 => 'April to January', 9 => 'April to February', 10 => 'April to March'
];
$resolved_month_name = $month_names[$month_index] ?? 'N/A';

// Build WHERE clause
$where = "student_session = '$session' AND status = '0'";
if ($type === 'tuition') {
    $where .= " AND rti = 'No'";
} elseif ($type === 'transport') {
    $where .= " AND transport_status = 'Active'";
} elseif ($type === 'other') {
    if (!$class) {
        $where .= " AND rti = 'No'";
    }
}

if ($class) {
    $where .= " AND student_class = '$class'";
}

$query = "SELECT * FROM student WHERE $where ORDER BY student_class, student_name ASC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

// Pre-fetch caches for admission and caution fee to optimize performance
$admission_cache = [];
$admission_q = mysqli_query($con, "SELECT class, fee, enfee FROM admission WHERE session='$session'");
while ($row = mysqli_fetch_assoc($admission_q)) {
    $admission_cache[$row['class']] = [
        'fee' => (float)$row['fee'],
        'enfee' => (float)$row['enfee']
    ];
}

$caution_cache = [];
$caution_q = mysqli_query($con, "SELECT class, fee FROM cautionfee WHERE session='$session'");
while ($row = mysqli_fetch_assoc($caution_q)) {
    $caution_cache[$row['class']] = (float)$row['fee'];
}

$defaulters = [];
$total_due_amount = 0;

while ($student = mysqli_fetch_assoc($result)) {
    $student_id = $student['student_id'];
    $student_class = $student['student_class'];
    $student_name = $student['student_name'];
    $student_fname = $student['student_fname'];
    $student_contact = $student['student_contactno'];
    $student_scholar = $student['student_scholar'];
    
    $expected = 0;
    $paid = 0;
    $balance = 0;
    $details = [];
    
    if ($type === 'tuition') {
        // Fetch tuition installment fee
        $inst_q = mysqli_query($con, "SELECT amnt FROM instdetail WHERE class='$student_class' AND session='$session'");
        $inst_row = mysqli_fetch_assoc($inst_q);
        $insAm = isset($inst_row['amnt']) ? (float)$inst_row['amnt'] : 0;
        
        $num1fam = isset($student['famt']) ? (float)$student['famt'] : 0;
        if (($student['fc'] ?? '') === 'Not Applicab') {
            $ifeed = $insAm;
        } else {
            $tuam = $insAm * $num1fam / 100;
            $ifeed = $insAm - $tuam;
        }
        $expected = $ifeed * $month_index;
        
        // Paid tuition fee
        $paid_q = mysqli_query($con, "SELECT SUM(inst_fee) as paid_inst FROM fee_detail WHERE student='$student_id' AND status='1' AND session='$session'");
        $paid_row = mysqli_fetch_assoc($paid_q);
        $paid = (float)($paid_row['paid_inst'] ?? 0);
        
        $balance = $expected - $paid;
        
    } elseif ($type === 'transport') {
        // Fetch transport stoppage amount summed up to month_index
        $stopage = mysqli_real_escape_string($con, $student['transport_stopage']);
        $tamt = 0;
        for ($m = 1; $m <= $month_index; $m++) {
            $month_col = "m" . $m;
            $month_val = $student[$month_col] ?? '';
            if (!empty($month_val)) {
                $stop_q = mysqli_query($con, "SELECT amnt FROM trans_instdetail WHERE stop_name='$stopage' AND month='$month_val' AND session='$session'");
                $stop_row = mysqli_fetch_assoc($stop_q);
                $tamt += (float)($stop_row['amnt'] ?? 0);
            }
        }
        
        if (($student['fc'] ?? '') === 'STAFF WARD') {
            $tuam = $tamt * (float)($student['famt'] ?? 0) / 100;
            $ifeet = $tamt - $tuam;
        } else {
            if (($student['transport_type'] ?? '') === 'One Way') {
                $ifeet = $tamt / 2;
            } else {
                $ifeet = $tamt;
            }
        }
        $expected = $ifeet;
        
        // Paid transport fee
        $paid_q = mysqli_query($con, "SELECT SUM(fee_deposit) as paid_dep, SUM(latefee) as paid_late, SUM(concession) as paid_conc FROM fee_detail_trans WHERE student='$student_id' AND status='1' AND session='$session'");
        $paid_row = mysqli_fetch_assoc($paid_q);
        
        $amtrcb = (float)($paid_row['paid_dep'] ?? 0);
        $latefeeb = (float)($paid_row['paid_late'] ?? 0);
        $conc = (float)($paid_row['paid_conc'] ?? 0);
        
        $paid = $amtrcb - $latefeeb;
        $balance = $expected - $paid - $conc;
        
    } elseif ($type === 'other') {
        // Registration Fee
        $reg_expected = 0;
        if (($student['std_type'] ?? '') === 'New' && ($student['rti'] ?? '') === 'No') {
            $reg_expected = $admission_cache[$student_class]['fee'] ?? 0;
        }
        
        // Caution / Yearly Expenses
        $caution_expected = 0;
        if (($student['rti'] ?? '') === 'No') {
            $caution_expected = $caution_cache[$student_class] ?? 0;
        }
        
        // Enrollment Fee
        $enroll_expected = 0;
        if (($student['enfee'] ?? '') === 'Yes' && ($student['rti'] ?? '') === 'No') {
            $enroll_expected = $admission_cache[$student_class]['enfee'] ?? 0;
        }
        
        // Paid amounts
        $paid_q = mysqli_query($con, "SELECT SUM(adm_fee) as paid_adm, SUM(caution) as paid_caution, SUM(enroll) as paid_enroll FROM fee_detail WHERE session='$session' AND status='1' AND student='$student_id'");
        $paid_row = mysqli_fetch_assoc($paid_q);
        
        $reg_paid = (float)($paid_row['paid_adm'] ?? 0);
        $caution_paid = (float)($paid_row['paid_caution'] ?? 0);
        $enroll_paid = (float)($paid_row['paid_enroll'] ?? 0);
        
        $reg_bal = $reg_expected - $reg_paid;
        $caution_bal = $caution_expected - $caution_paid;
        $enroll_bal = $enroll_expected - $enroll_paid;
        
        $expected = $reg_expected + $caution_expected + $enroll_expected;
        $paid = $reg_paid + $caution_paid + $enroll_paid;
        $balance = $reg_bal + $caution_bal + $enroll_bal;
        
        $details = [
            'registration' => [
                'expected' => $reg_expected,
                'paid' => $reg_paid,
                'balance' => $reg_bal
            ],
            'caution' => [
                'expected' => $caution_expected,
                'paid' => $caution_paid,
                'balance' => $caution_bal
            ],
            'enrollment' => [
                'expected' => $enroll_expected,
                'paid' => $enroll_paid,
                'balance' => $enroll_bal
            ]
        ];
    }
    
    if ($balance > 0) {
        $data_item = [
            'student_id' => $student_id,
            'student_scholar' => $student_scholar,
            'student_name' => $student_name,
            'father_name' => $student_fname,
            'contact_no' => $student_contact,
            'class' => $student_class,
            'expected_amount' => $expected,
            'paid_amount' => $paid,
            'balance' => $balance
        ];
        if ($type === 'other') {
            $data_item['breakdown'] = $details;
        }
        $defaulters[] = $data_item;
        $total_due_amount += $balance;
    }
}

echo json_encode([
    'status' => true,
    'type' => $type,
    'session' => $session,
    'month' => $type !== 'other' ? $resolved_month_name : 'N/A',
    'class' => $class ?? 'All',
    'count' => count($defaulters),
    'total_due_amount' => $total_due_amount,
    'data' => $defaulters
]);
