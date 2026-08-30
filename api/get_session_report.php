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
$type = 'tuition';
if (isset($_GET['type']) && trim($_GET['type']) !== '') {
    $type = trim($_GET['type']);
} elseif (isset($_POST['type']) && trim($_POST['type']) !== '') {
    $type = trim($_POST['type']);
}

// Default session if not provided
if (!$session) {
    $ses_q = mysqli_query($con, "SELECT DISTINCT student_session FROM student WHERE status='0' ORDER BY student_session DESC LIMIT 1");
    $ses_row = mysqli_fetch_assoc($ses_q);
    $session = $ses_row['student_session'] ?? null;
}

if (!$session) {
    http_response_code(422);
    echo json_encode(['status' => false, 'message' => 'Session is required or could not be determined']);
    exit;
}

// Build WHERE clause
$where = "student_session = '$session' AND status = '0'";
if ($type !== 'transport') {
    $where .= " AND rti = 'No'";
}
if ($class) {
    $where .= " AND student_class = '$class'";
}
if ($type === 'transport') {
    $where .= " AND transport_status = 'Active'";
}

$query = "SELECT * FROM student WHERE $where ORDER BY student_class, student_name ASC";
$result = mysqli_query($con, $query);

if (!$result) {
    echo json_encode(['status' => false, 'message' => mysqli_error($con)]);
    exit;
}

$data = [];

if ($type === 'transport') {
    $summary = [
        'transport' => ['total' => 0, 'paid' => 0, 'concession' => 0, 'balance' => 0],
        'grand_total' => ['expected' => 0, 'paid' => 0, 'balance' => 0]
    ];

    while ($student = mysqli_fetch_assoc($result)) {
        $student_id = $student['student_id'];
        $student_class = $student['student_class'];

        $apr = $student['m1'] ?? '';
        $jul = $student['m2'] ?? '';
        $aug = $student['m3'] ?? '';
        $sep = $student['m4'] ?? '';
        $oct = $student['m5'] ?? '';
        $nov = $student['m6'] ?? '';
        $dec = $student['m7'] ?? '';
        $jan = $student['m8'] ?? '';
        $feb = $student['m9'] ?? '';
        $march = $student['m10'] ?? '';

        $months_list = [$apr, $jul, $aug, $sep, $oct, $nov, $dec, $jan, $feb, $march];
        $tamt = 0;
        foreach ($months_list as $month_val) {
            $month_val = trim($month_val);
            if ($month_val !== '' && strtolower($month_val) !== 'no') {
                $stop_esc = mysqli_real_escape_string($con, $student['transport_stopage']);
                $month_val_esc = mysqli_real_escape_string($con, $month_val);
                $trans_q = mysqli_query($con, "SELECT amnt FROM trans_instdetail WHERE stop_name='$stop_esc' AND month='$month_val_esc' AND session='$session'");
                if ($trans_row = mysqli_fetch_assoc($trans_q)) {
                    $tamt += (float)$trans_row['amnt'];
                }
            }
        }

        if ($tamt == 0) {
            $stop_esc = mysqli_real_escape_string($con, $student['transport_stopage']);
            $stop_q = mysqli_query($con, "SELECT amnt FROM stopage WHERE stop_name='$stop_esc' AND session='$session'");
            if ($stop_row = mysqli_fetch_assoc($stop_q)) {
                $tamt = (float)$stop_row['amnt'] * (float)($student['m'] ?? 0);
            }
        }

        if ($student['fc'] === 'STAFF WARD') {
            $tuam = $tamt * (float)($student['famt'] ?? 0) / 100;
            $ifeeb = $tamt - $tuam;
        } else {
            if (isset($student['transport_type']) && $student['transport_type'] === 'One Way') {
                $ifeeb = $tamt / 2;
            } else {
                $ifeeb = $tamt;
            }
        }

        $searchb = mysqli_query($con, "SELECT 
            SUM(fee_deposit) AS sum_fee_deposit,
            SUM(concession) AS sum_concession
            FROM fee_detail_trans 
            WHERE student='$student_id' AND status='1' AND session='$session'");
        $studrowb = mysqli_fetch_assoc($searchb);

        $rbus = isset($studrowb['sum_fee_deposit']) ? (float)$studrowb['sum_fee_deposit'] : 0;
        $conb = isset($studrowb['sum_concession']) ? (float)$studrowb['sum_concession'] : 0;

        $baltb = $ifeeb - $rbus - $conb;
        $lbalb = $baltb < 0 ? 0 : $baltb;

        $student_data = [
            'student_id' => $student_id,
            'student_name' => $student['student_name'],
            'student_contact' => $student['student_contactno'],
            'class' => $student_class,
            'transport' => [
                'total' => $ifeeb,
                'paid' => $rbus,
                'concession' => $conb,
                'balance' => $lbalb
            ]
        ];

        $data[] = $student_data;

        $summary['transport']['total'] += $ifeeb;
        $summary['transport']['paid'] += $rbus;
        $summary['transport']['concession'] += $conb;
        $summary['transport']['balance'] += $lbalb;
    }

    $summary['grand_total']['expected'] = $summary['transport']['total'] - $summary['transport']['concession'];
    $summary['grand_total']['paid'] = $summary['transport']['paid'];
    $summary['grand_total']['balance'] = $summary['transport']['balance'];

} else {
    $summary = [
        'registration' => ['total' => 0, 'paid' => 0, 'balance' => 0],
        'yearly' => ['total' => 0, 'paid' => 0, 'balance' => 0],
        'enrollment' => ['total' => 0, 'paid' => 0, 'balance' => 0],
        'board_reg' => ['total' => 0, 'paid' => 0, 'balance' => 0],
        'board_exam' => ['total' => 0, 'paid' => 0, 'balance' => 0],
        'tuition' => ['total' => 0, 'concession' => 0, 'late_fee' => 0, 'paid' => 0, 'balance' => 0],
        'smart_class' => ['total' => 0, 'paid' => 0, 'balance' => 0],
        'grand_total' => ['expected' => 0, 'paid' => 0, 'balance' => 0]
    ];

    // Cache some common configurations
    $annual_q = mysqli_query($con, "SELECT fee FROM annual WHERE session='$session' LIMIT 1");
    $annual_row = mysqli_fetch_assoc($annual_q);
    $base_smart_fee = (float)($annual_row['fee'] ?? 0) * 10;

    while ($student = mysqli_fetch_assoc($result)) {
        $student_id = $student['student_id'];
        $student_class = $student['student_class'];
        $student_famt = (float)($student['famt'] ?? 0);

        // Get Paid Details from fee_detail
        $paid_q = mysqli_query($con, "SELECT sum(adm_fee), sum(caution), sum(enroll), sum(board_fee), sum(bexam), sum(smclass), sum(inst_fee), sum(latefee), sum(concession), sum(pdue), sum(due) FROM fee_detail WHERE student='$student_id' AND status='1' AND session='$session'");
        $paid_row = mysqli_fetch_assoc($paid_q);

        // 1. Registration Fee
        $reg_total = 0;
        if ($student['std_type'] === 'New') {
            $adm_q = mysqli_query($con, "SELECT fee FROM admission WHERE session='$session' AND class='$student_class'");
            $adm_row = mysqli_fetch_assoc($adm_q);
            $reg_total = (float)($adm_row['fee'] ?? 0);
        }
        $reg_paid = (float)($paid_row['sum(adm_fee)'] ?? 0);
        $reg_bal = $reg_total - $reg_paid;

        // 2. Yearly Expenses
        $yearly_q = mysqli_query($con, "SELECT fee FROM cautionfee WHERE session='$session' AND class='$student_class'");
        $yearly_row = mysqli_fetch_assoc($yearly_q);
        $yearly_total = (float)($yearly_row['fee'] ?? 0);
        $yearly_paid = (float)($paid_row['sum(caution)'] ?? 0);
        $yearly_bal = $yearly_total - $yearly_paid;

        // 3. Enrollment Fee
        $en_total = 0;
        if ($student['enfee'] === 'Yes') {
            $adm_q = mysqli_query($con, "SELECT enfee FROM admission WHERE session='$session' AND class='$student_class'");
            $adm_row = mysqli_fetch_assoc($adm_q);
            $en_total = (float)($adm_row['enfee'] ?? 0);
        }
        $en_paid = (float)($paid_row['sum(enroll)'] ?? 0);
        $en_bal = $en_total - $en_paid;

        // 4. Board Reg Fee
        $br_q = mysqli_query($con, "SELECT fee FROM bfee WHERE session='$session' AND class='$student_class'");
        $br_row = mysqli_fetch_assoc($br_q);
        $br_total = (float)($br_row['fee'] ?? 0);
        $br_paid = (float)($paid_row['sum(board_fee)'] ?? 0);
        $br_bal = $br_total - $br_paid;

        // 5. Board Exam Fee
        $be_q = mysqli_query($con, "SELECT fee FROM cbse WHERE session='$session' AND class='$student_class'");
        $be_row = mysqli_fetch_assoc($be_q);
        $be_total = (float)($be_row['fee'] ?? 0);
        $be_paid = (float)($paid_row['sum(bexam)'] ?? 0);
        $be_bal = $be_total - $be_paid;

        // 6. Tuition Fee
        $inst_q = mysqli_query($con, "SELECT amnt FROM instdetail WHERE session='$session' AND class='$student_class'");
        $inst_row = mysqli_fetch_assoc($inst_q);
        $inst_base = (float)($inst_row['amnt'] ?? 0);
        
        $tuition_total = $inst_base * 10;
        $tuition_concession = ($student['fc'] === 'Not Applicab') ? 0 : ($tuition_total * $student_famt / 100);
        $tuition_net_total = $tuition_total - $tuition_concession;
        
        $late_fee = (float)($paid_row['sum(latefee)'] ?? 0);
        $paid_concession = (float)($paid_row['sum(concession)'] ?? 0);
        
        $p = (float)($paid_row['sum(pdue)'] ?? 0) + $late_fee;
        $n = (float)($paid_row['sum(due)'] ?? 0) + $paid_concession;
        $tuition_paid = (float)($paid_row['sum(inst_fee)'] ?? 0) + $p - $n;
        
        $tuition_bal = $tuition_net_total + $late_fee - $tuition_paid - $paid_concession;
        if ($tuition_bal < 0) $tuition_bal = 0;

        // 7. Smart Class
        $smart_total = $base_smart_fee;
        $smart_paid = (float)($paid_row['sum(smclass)'] ?? 0);
        $smart_bal = $smart_total - $smart_paid;

        $student_data = [
            'student_id' => $student_id,
            'student_name' => $student['student_name'],
            'student_contact' => $student['student_contactno'],
            'class' => $student_class,
            'registration' => ['total' => $reg_total, 'paid' => $reg_paid, 'balance' => $reg_bal],
            'yearly' => ['total' => $yearly_total, 'paid' => $yearly_paid, 'balance' => $yearly_bal],
            'enrollment' => ['total' => $en_total, 'paid' => $en_paid, 'balance' => $en_bal],
            'board_reg' => ['total' => $br_total, 'paid' => $br_paid, 'balance' => $br_bal],
            'board_exam' => ['total' => $be_total, 'paid' => $be_paid, 'balance' => $be_bal],
            'tuition' => [
                'total' => $tuition_total,
                'concession' => $tuition_concession,
                'late_fee' => $late_fee,
                'paid' => $tuition_paid,
                'extra_concession' => $paid_concession,
                'balance' => $tuition_bal
            ],
            'smart_class' => ['total' => $smart_total, 'paid' => $smart_paid, 'balance' => $smart_bal]
        ];

        $data[] = $student_data;

        // Update Summary
        $summary['registration']['total'] += $reg_total;
        $summary['registration']['paid'] += $reg_paid;
        $summary['registration']['balance'] += $reg_bal;

        $summary['yearly']['total'] += $yearly_total;
        $summary['yearly']['paid'] += $yearly_paid;
        $summary['yearly']['balance'] += $yearly_bal;

        $summary['enrollment']['total'] += $en_total;
        $summary['enrollment']['paid'] += $en_paid;
        $summary['enrollment']['balance'] += $en_bal;

        $summary['board_reg']['total'] += $br_total;
        $summary['board_reg']['paid'] += $br_paid;
        $summary['board_reg']['balance'] += $br_bal;

        $summary['board_exam']['total'] += $be_total;
        $summary['board_exam']['paid'] += $be_paid;
        $summary['board_exam']['balance'] += $be_bal;

        $summary['tuition']['total'] += $tuition_total;
        $summary['tuition']['concession'] += $tuition_concession;
        $summary['tuition']['late_fee'] += $late_fee;
        $summary['tuition']['paid'] += $tuition_paid;
        $summary['tuition']['balance'] += $tuition_bal;

        $summary['smart_class']['total'] += $smart_total;
        $summary['smart_class']['paid'] += $smart_paid;
        $summary['smart_class']['balance'] += $smart_bal;
    }

    // Grand Total
    $summary['grand_total']['expected'] = $summary['registration']['total'] + $summary['yearly']['total'] + $summary['enrollment']['total'] + $summary['board_reg']['total'] + $summary['board_exam']['total'] + ($summary['tuition']['total'] - $summary['tuition']['concession']) + $summary['smart_class']['total'];
    $summary['grand_total']['paid'] = $summary['registration']['paid'] + $summary['yearly']['paid'] + $summary['enrollment']['paid'] + $summary['board_reg']['paid'] + $summary['board_exam']['paid'] + $summary['tuition']['paid'] + $summary['smart_class']['paid'];
    $summary['grand_total']['balance'] = $summary['grand_total']['expected'] - $summary['grand_total']['paid'];
}

echo json_encode([
    'status' => true,
    'session' => $session,
    'class' => $class ?? 'All',
    'count' => count($data),
    'summary' => $summary,
    'data' => $data
]);
