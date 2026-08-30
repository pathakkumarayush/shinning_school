<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require __DIR__ . '/../../../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

$session      = isset($_GET['session']) ? trim($_GET['session']) : '';
$class        = isset($_GET['class']) ? trim($_GET['class']) : '';
$student_name = isset($_GET['student_name']) ? trim($_GET['student_name']) : '';
$account_no   = isset($_GET['account_no']) ? trim($_GET['account_no']) : (isset($_GET['ac_no']) ? trim($_GET['ac_no']) : '');
$student_id   = isset($_GET['student_id']) ? trim($_GET['student_id']) : '';

// Default session if not provided
if ($session === '') {
    $ses_q = mysqli_query($con, "SELECT DISTINCT session FROM privious_fee ORDER BY id DESC LIMIT 1");
    if ($ses_q && $ses_row = mysqli_fetch_assoc($ses_q)) {
        $session = $ses_row['session'];
    }
}

// Build WHERE conditions
$conditions = [];
if ($session !== '') {
    $session_esc = mysqli_real_escape_string($con, $session);
    $conditions[] = "pf.session = '$session_esc'";
}

if ($class !== '') {
    $class_esc = mysqli_real_escape_string($con, $class);
    $conditions[] = "(pf.cid = '$class_esc' OR s.student_class = '$class_esc')";
}

if ($student_name !== '') {
    $student_name_esc = mysqli_real_escape_string($con, $student_name);
    $conditions[] = "s.student_name LIKE '%$student_name_esc%'";
}

if ($account_no !== '') {
    $account_no_esc = mysqli_real_escape_string($con, $account_no);
    $conditions[] = "(s.sedate = '$account_no_esc' OR pf.ac_no = '$account_no_esc')";
}

if ($student_id !== '') {
    $student_id_esc = mysqli_real_escape_string($con, $student_id);
    $conditions[] = "pf.sid = '$student_id_esc'";
}

$whereClause = !empty($conditions) ? 'WHERE ' . implode(' AND ', $conditions) : '';

$query = "SELECT 
            pf.id AS previous_fee_id,
            pf.sid AS student_id,
            pf.cid AS class_id,
            pf.amt AS previous_fee,
            pf.session,
            pf.rmk AS remark,
            pf.status AS fee_status,
            s.student_name,
            s.student_fname AS father_name,
            s.student_class,
            s.student_contactno AS mobile,
            s.sedate AS account_no
          FROM privious_fee pf
          LEFT JOIN student s ON (s.student_id = pf.sid AND s.student_session = pf.session)
          $whereClause
          ORDER BY s.student_name ASC";

$result = mysqli_query($con, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode([
        'status' => false,
        'message' => 'Database error: ' . mysqli_error($con)
    ]);
    exit;
}

$list = [];
$tot_previous_fee = 0;
$tot_deposit_fee  = 0;
$tot_concession   = 0;
$tot_late_fee     = 0;
$tot_balance_fee  = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $sid_esc = mysqli_real_escape_string($con, $row['student_id']);
    
    // Fetch payments & concession for this student in previous fee table
    $fee_q = mysqli_query($con, "SELECT 
                                    SUM(fee_deposit) AS total_deposit,
                                    SUM(concession) AS total_concession,
                                    SUM(latefee) AS total_latefee
                                  FROM fee_detail_preivios 
                                  WHERE student = '$sid_esc'");
    $fee_data = ($fee_q) ? mysqli_fetch_assoc($fee_q) : null;
    
    $deposit    = (float)($fee_data['total_deposit'] ?? 0);
    $concession = (float)($fee_data['total_concession'] ?? 0);
    $late_fee   = (float)($fee_data['total_latefee'] ?? 0);
    $prev_amt   = (float)($row['previous_fee'] ?? 0);
    $balance    = $prev_amt + $late_fee - $deposit - $concession;
    if ($balance < 0) {
        $balance = 0;
    }

    $tot_previous_fee += $prev_amt;
    $tot_deposit_fee  += $deposit;
    $tot_concession   += $concession;
    $tot_late_fee     += $late_fee;
    $tot_balance_fee  += $balance;

    $list[] = [
        'id'               => (int)$row['previous_fee_id'],
        'student_id'       => $row['student_id'],
        'student_name'     => $row['student_name'] ?? '',
        'father_name'      => $row['father_name'] ?? '',
        'class'            => $row['student_class'] ?? $row['class_id'],
        'mobile'           => $row['mobile'] ?? '',
        'account_no'       => $row['account_no'] ?? '',
        'remark'           => $row['remark'] ?? '',
        'session'          => $row['session'],
        'previous_fee'     => $prev_amt,
        'deposit_fee'      => $deposit,
        'concession_fee'   => $concession,
        'late_fee'         => $late_fee,
        'balance_fee'      => $balance,
        'status'           => $row['fee_status']
    ];
}

http_response_code(200);
echo json_encode([
    'status'  => true,
    'message' => 'Previous fee records fetched successfully',
    'summary' => [
        'total_records'    => count($list),
        'total_previous_fee' => $tot_previous_fee,
        'total_deposit'    => $tot_deposit_fee,
        'total_concession' => $tot_concession,
        'total_late_fee'   => $tot_late_fee,
        'total_balance'    => $tot_balance_fee
    ],
    'data'    => $list
]);
?>
