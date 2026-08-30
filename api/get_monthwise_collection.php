<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

session_start();
require_once("../db.php");

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = ['status' => false, 'message' => '', 'data' => []];

// Get params
$session = isset($_GET['session']) ? trim($_GET['session']) : ($_SESSION['session'] ?? '');
$month_input = isset($_GET['month']) ? trim($_GET['month']) : '';
$class = isset($_GET['class']) ? trim($_GET['class']) : '';

if ($session === '') {
    http_response_code(400);
    $response['message'] = 'session is required.';
    echo json_encode($response);
    exit;
}

if ($month_input === '') {
    http_response_code(400);
    $response['message'] = 'month is required.';
    echo json_encode($response);
    exit;
}

// Map month name to mnt index
$month_map = [
    'april'     => 1,
    'july'      => 2,
    'august'    => 3,
    'september' => 4,
    'october'   => 5,
    'november'  => 6,
    'december'  => 7,
    'january'   => 8,
    'february'  => 9,
    'march'     => 10
];

$month_lower = strtolower($month_input);
if (!isset($month_map[$month_lower])) {
    http_response_code(400);
    $response['message'] = 'Invalid month. Choose from April, July, August, September, October, November, December, January, February, March.';
    echo json_encode($response);
    exit;
}

$mnt = $month_map[$month_lower];

$session_esc = mysqli_real_escape_string($con, $session);
$class_esc = mysqli_real_escape_string($con, $class);

// Build student query
$student_query = "SELECT * FROM student WHERE student_session='$session_esc' AND status='0'";
if ($class !== '') {
    $student_query .= " AND student_class='$class_esc'";
}
$student_query .= " ORDER BY student_class ASC, student_name ASC";

$student_res = mysqli_query($con, $student_query);
if (!$student_res) {
    http_response_code(500);
    $response['message'] = 'Database error: ' . mysqli_error($con);
    echo json_encode($response);
    exit;
}

$students_data = [];

// Overall totals for summary
$tot_admission_fee = 0;
$tot_admission_paid = 0;
$tot_admission_bal = 0;

$tot_caution_fee = 0;
$tot_caution_paid = 0;
$tot_caution_bal = 0;

$tot_enrollment_fee = 0;
$tot_enrollment_paid = 0;
$tot_enrollment_bal = 0;

$tot_tution_fee = 0;
$tot_tution_late = 0;
$tot_tution_paid = 0;
$tot_tution_concession = 0;
$tot_tution_bal = 0;

$tot_smartclass_fee = 0;
$tot_smartclass_paid = 0;
$tot_smartclass_bal = 0;

$tot_bus_fee = 0;
$tot_bus_paid = 0;
$tot_bus_concession = 0;
$tot_bus_bal = 0;

$tot_grand_total = 0;
$tot_paid_total = 0;
$tot_balance_total = 0;

while ($student = mysqli_fetch_assoc($student_res)) {
    $student_id = $student['student_id'];
    $student_id_esc = mysqli_real_escape_string($con, $student_id);
    $student_class = $student['student_class'];
    $student_class_esc = mysqli_real_escape_string($con, $student_class);

    // Fetch fee_detail aggregates
    $search = mysqli_query($con, "SELECT 
        SUM(fee_deposit) AS sum_fee_deposit,
        SUM(inst_fee) AS sum_inst_fee,
        SUM(latefee) AS sum_latefee,
        SUM(concession) AS sum_concession,
        SUM(adm_fee) AS sum_adm_fee,
        SUM(caution) AS sum_caution,
        SUM(enroll) AS sum_enroll,
        SUM(pdue) AS sum_pdue,
        SUM(due) AS sum_due,
        SUM(smclass) AS sum_smclass
        FROM fee_detail 
        WHERE student='$student_id_esc' AND status='1' AND session='$session_esc'");
    
    $studrow = mysqli_fetch_assoc($search);
    
    $amtrc = isset($studrow['sum_adm_fee']) ? (float)$studrow['sum_adm_fee'] : 0;
    $dex = isset($studrow['sum_caution']) ? (float)$studrow['sum_caution'] : 0;
    $enroll = isset($studrow['sum_enroll']) ? (float)$studrow['sum_enroll'] : 0;

    // 1. School Registration Fee (Admission Fee)
    $total1r = 0;
    if ($student['std_type'] === 'New' && $student['rti'] === 'No') {
        $admissionfee = mysqli_query($con, "SELECT fee FROM admission WHERE session='$session_esc' AND class='$student_class_esc'");
        if ($rowadmission = mysqli_fetch_assoc($admissionfee)) {
            $total1r = (float)$rowadmission['fee'];
        }
    }
    $balr = $total1r - $amtrc;

    // 2. Yearly Expenses (Caution Fee)
    $totalfeeex = 0;
    if ($student['rti'] === 'No') {
        $exfee = mysqli_query($con, "SELECT fee FROM cautionfee WHERE session='$session_esc' AND class='$student_class_esc'");
        if ($rowex = mysqli_fetch_assoc($exfee)) {
            $totalfeeex = (float)$rowex['fee'];
        }
    }
    $blex = $totalfeeex - $dex;

    // 3. CBSE Enrollment Fee
    $etotal1 = 0;
    if ($student['enfee'] === 'Yes' && $student['rti'] === 'No') {
        $enfee_q = mysqli_query($con, "SELECT enfee FROM admission WHERE session='$session_esc' AND class='$student_class_esc'");
        if ($rowen = mysqli_fetch_assoc($enfee_q)) {
            $etotal1 = (float)$rowen['enfee'];
        }
    }
    $tben = $etotal1 - $enroll;

    // 4. Tution Fee
    $searchinst = mysqli_query($con, "SELECT amnt FROM instdetail WHERE class='$student_class_esc' AND session='$session_esc'");
    $rowinst = mysqli_fetch_assoc($searchinst);
    $insAm = isset($rowinst['amnt']) ? (float)$rowinst['amnt'] : 0;
    $num1fam = isset($student['famt']) ? (float)$student['famt'] : 0;
    
    $mntfee = $insAm * $mnt;
    $ifee = 0;
    if ($student['rti'] !== 'Yes') {
        if ($student['fc'] === 'Not Applicab') {
            $ifee = $mntfee;
        } else {
            $tuam = $mntfee * $num1fam / 100;
            $ifee = $mntfee - $tuam;
        }
    }

    $lfee = isset($studrow['sum_latefee']) ? (float)$studrow['sum_latefee'] : 0;
    $p = (isset($studrow['sum_pdue']) ? (float)$studrow['sum_pdue'] : 0) + $lfee;
    $n = (isset($studrow['sum_due']) ? (float)$studrow['sum_due'] : 0) + (isset($studrow['sum_concession']) ? (float)$studrow['sum_concession'] : 0);
    $tutfee = (isset($studrow['sum_inst_fee']) ? (float)$studrow['sum_inst_fee'] : 0) + $p - $n;
    $cons = isset($studrow['sum_concession']) ? (float)$studrow['sum_concession'] : 0;

    $bal = $ifee + $lfee - $tutfee - $cons;
    if ($ifee < $tutfee) {
        $bal = 0;
    }

    // 5. Smart Class Fee
    $sm = mysqli_query($con, "SELECT fee FROM annual WHERE session='$session_esc'");
    $smcrow = mysqli_fetch_assoc($sm);
    $smartcl = 0;
    if ($student['rti'] !== 'Yes' && $smcrow) {
        $smartcl = (float)$smcrow['fee'] * $mnt;
    }
    $smp = isset($studrow['sum_smclass']) ? (float)$studrow['sum_smclass'] : 0;
    $bals = $smartcl - $smp;
    if ($smartcl < $smp) {
        $bals = 0;
    }

    // 6. Bus Fee
    $ifeeb = 0;
    $rbus = 0;
    $conb = 0;
    $lbalb = 0;

    if (isset($student['transport_status']) && $student['transport_status'] === 'Active') {
        $tamt = 0;
        for ($m_idx = 1; $m_idx <= $mnt; $m_idx++) {
            $month_val = $student['m' . $m_idx] ?? '';
            if ($month_val !== '') {
                $stop_esc = mysqli_real_escape_string($con, $student['transport_stopage']);
                $month_val_esc = mysqli_real_escape_string($con, $month_val);
                $trans_q = mysqli_query($con, "SELECT amnt FROM trans_instdetail WHERE stop_name='$stop_esc' AND month='$month_val_esc' AND session='$session_esc'");
                if ($trans_row = mysqli_fetch_assoc($trans_q)) {
                    $tamt += (float)$trans_row['amnt'];
                }
            }
        }

        if ($student['fc'] === 'STAFF WARD') {
            $tuam_bus = $tamt * (float)($student['famt'] ?? 0) / 100;
            $ifeeb = $tamt - $tuam_bus;
        } else {
            if (isset($student['transport_type']) && $student['transport_type'] === 'One Way') {
                $ifeeb = $tamt / 2;
            } else {
                $ifeeb = $tamt;
            }
        }

        $searchb = mysqli_query($con, "SELECT 
            SUM(fee_deposit) AS sum_fee_deposit,
            SUM(latefee) AS sum_latefee,
            SUM(concession) AS sum_concession
            FROM fee_detail_trans 
            WHERE student='$student_id_esc' AND status='1' AND session='$session_esc'");
        $studrowb = mysqli_fetch_assoc($searchb);

        $rbus = isset($studrowb['sum_fee_deposit']) ? (float)$studrowb['sum_fee_deposit'] : 0;
        $conb = isset($studrowb['sum_concession']) ? (float)$studrowb['sum_concession'] : 0;

        $baltb = $ifeeb - $rbus - $conb;
        $lbalb = ($rbus > $ifeeb) ? 0 : $baltb;
    }

    // Totals for this student
    $ata = $total1r + $totalfeeex + $etotal1 + $ifee + $ifeeb + $smartcl;
    $apaid = $amtrc + $dex + $enroll + $tutfee + $rbus + $smp;
    $allbalamt = $balr + $blex + $tben + $bal + $lbalb + $bals;

    // Accumulate overall totals
    $tot_admission_fee += $total1r;
    $tot_admission_paid += $amtrc;
    $tot_admission_bal += $balr;

    $tot_caution_fee += $totalfeeex;
    $tot_caution_paid += $dex;
    $tot_caution_bal += $blex;

    $tot_enrollment_fee += $etotal1;
    $tot_enrollment_paid += $enroll;
    $tot_enrollment_bal += $tben;

    $tot_tution_fee += $ifee;
    $tot_tution_late += $lfee;
    $tot_tution_paid += $tutfee;
    $tot_tution_concession += $cons;
    $tot_tution_bal += $bal;

    $tot_smartclass_fee += $smartcl;
    $tot_smartclass_paid += $smp;
    $tot_smartclass_bal += $bals;

    $tot_bus_fee += $ifeeb;
    $tot_bus_paid += $rbus;
    $tot_bus_concession += $conb;
    $tot_bus_bal += $lbalb;

    $tot_grand_total += $ata;
    $tot_paid_total += $apaid;
    $tot_balance_total += $allbalamt;

    $students_data[] = [
        'student_id'         => $student['student_id'],
        'student_name'       => $student['student_name'],
        'student_contactno'  => $student['student_contactno'],
        'student_class'      => $student['student_class'],
        'std_type'           => $student['std_type'],
        'rti'                => $student['rti'],
        'fc'                 => $student['fc'],
        'famt'               => $student['famt'],
        'admission_fee'      => [
            'total'   => $total1r,
            'paid'    => $amtrc,
            'balance' => $balr
        ],
        'yearly_expenses'    => [
            'total'   => $totalfeeex,
            'paid'    => $dex,
            'balance' => $blex
        ],
        'enrollment_fee'     => [
            'total'   => $etotal1,
            'paid'    => $enroll,
            'balance' => $tben
        ],
        'tution_fee'         => [
            'total'      => $ifee,
            'late_fee'   => $lfee,
            'paid'       => $tutfee,
            'concession' => $cons,
            'balance'    => $bal
        ],
        'smartclass_fee'     => [
            'total'   => $smartcl,
            'paid'    => $smp,
            'balance' => $bals
        ],
        'bus_fee'            => [
            'total'      => $ifeeb,
            'paid'       => $rbus,
            'concession' => $conb,
            'balance'    => $lbalb
        ],
        'totals'             => [
            'grand_total'   => $ata,
            'paid_total'    => $apaid,
            'balance_total' => $allbalamt
        ]
    ];
}

$response['status'] = true;
$response['message'] = 'Collection details fetched successfully.';
$response['data'] = [
    'session'     => $session,
    'month'       => $month_input,
    'class'       => $class !== '' ? $class : 'All Classes',
    'students'    => $students_data,
    'summary'     => [
        'admission_fee' => [
            'total'   => $tot_admission_fee,
            'paid'    => $tot_admission_paid,
            'balance' => $tot_admission_bal
        ],
        'yearly_expenses' => [
            'total'   => $tot_caution_fee,
            'paid'    => $tot_caution_paid,
            'balance' => $tot_caution_bal
        ],
        'enrollment_fee' => [
            'total'   => $tot_enrollment_fee,
            'paid'    => $tot_enrollment_paid,
            'balance' => $tot_enrollment_bal
        ],
        'tution_fee' => [
            'total'      => $tot_tution_fee,
            'late_fee'   => $tot_tution_late,
            'paid'       => $tot_tution_paid,
            'concession' => $tot_tution_concession,
            'balance'    => $tot_tution_bal
        ],
        'smartclass_fee' => [
            'total'   => $tot_smartclass_fee,
            'paid'    => $tot_smartclass_paid,
            'balance' => $tot_smartclass_bal
        ],
        'bus_fee' => [
            'total'      => $tot_bus_fee,
            'paid'       => $tot_bus_paid,
            'concession' => $tot_bus_concession,
            'balance'    => $tot_bus_bal
        ],
        'totals' => [
            'grand_total'   => $tot_grand_total,
            'paid_total'    => $tot_paid_total,
            'balance_total' => $tot_balance_total
        ]
    ]
];

echo json_encode($response, JSON_PRETTY_PRINT);
