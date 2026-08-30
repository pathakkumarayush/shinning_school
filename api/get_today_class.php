<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Asia/Kolkata');
header('Content-Type: application/json');

require '../db.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only GET method allowed']);
    exit;
}

$response = [
    'status' => false,
    'message' => '',
    'data' => []
];

$date_raw   = isset($_GET['date']) ? trim($_GET['date']) : '';
$session    = isset($_GET['session']) ? trim($_GET['session']) : '';
$teacher_id = isset($_GET['teacher_id']) ? trim($_GET['teacher_id']) : '';
$class      = isset($_GET['class']) ? trim($_GET['class']) : '';

// Validation 1: Required parameters check
if ($date_raw === '' || $session === '') {
    http_response_code(422);
    $response['message'] = 'Missing required parameters: date and session are required';
    echo json_encode($response);
    exit;
}

// Validation 2: Parse and format date (expecting d-m-Y)
$dateObj = DateTime::createFromFormat('d-m-Y', $date_raw);
if (!$dateObj) {
    $dateObj = DateTime::createFromFormat('Y-m-d', $date_raw);
    if (!$dateObj) {
        http_response_code(400);
        $response['message'] = 'Invalid date format. Use d-m-Y (e.g. 17-07-2026)';
        echo json_encode($response);
        exit;
    }
}
$db_date = $dateObj->format('Y-m-d');

// Sanitize inputs
$session_esc    = mysqli_real_escape_string($con, $session);
$teacher_id_esc = mysqli_real_escape_string($con, $teacher_id);
$class_esc      = mysqli_real_escape_string($con, $class);

try {
    // Validation 3: Verify session exists
    $sessionCheck = mysqli_query($con, "SELECT id FROM sessions WHERE name = '$session_esc' LIMIT 1");
    if (!$sessionCheck || mysqli_num_rows($sessionCheck) === 0) {
        http_response_code(404);
        $response['message'] = 'Session does not exist';
        echo json_encode($response);
        exit;
    }

    // Optional validation: check if teacher_id is supplied and valid
    if ($teacher_id !== '') {
        $teacherCheck = mysqli_query($con, "SELECT id FROM teacher WHERE teacher_username = '$teacher_id_esc' LIMIT 1");
        if (!$teacherCheck || mysqli_num_rows($teacherCheck) === 0) {
            http_response_code(404);
            $response['message'] = 'Teacher does not exist';
            echo json_encode($response);
            exit;
        }
    }

    // Optional validation: check if class is supplied and valid
    if ($class !== '') {
        $classCheck = mysqli_query($con, "SELECT class_id FROM class WHERE class = '$class_esc' LIMIT 1");
        if (!$classCheck || mysqli_num_rows($classCheck) === 0) {
            http_response_code(404);
            $response['message'] = 'Class does not exist';
            echo json_encode($response);
            exit;
        }
    }

    // Build conditions
    $conditions = [
        "tc.date = '$db_date'",
        "tc.session = '$session_esc'"
    ];

    if ($teacher_id !== '') {
        $conditions[] = "tc.teacher_id = '$teacher_id_esc'";
    }

    if ($class !== '') {
        $conditions[] = "tc.class = '$class_esc'";
    }

    $whereClause = implode(' AND ', $conditions);

    // Build query with LEFT JOIN to fetch teacher_name and LEFT JOIN to order correctly by period id
    $query = "
        SELECT 
            tc.id,
            tc.teacher_id,
            COALESCE(t.teacher_name, 'Admin') AS teacher_name,
            tc.class,
            tc.period AS period_name,
            tc.subject,
            tc.topic_taught,
            tc.remark,
            DATE_FORMAT(tc.date, '%d-%m-%Y') AS date,
            tc.session,
            tc.created_at,
            tc.updated_at
        FROM today_classes tc
        LEFT JOIN teacher t 
            ON tc.teacher_id = t.teacher_username 
           AND t.teacher_session = tc.session
        LEFT JOIN period_master p 
            ON tc.period = p.period_name
        WHERE $whereClause
        ORDER BY tc.class ASC, p.id ASC
    ";

    $result = mysqli_query($con, $query);

    if (!$result) {
        throw new Exception("Database query failed: " . mysqli_error($con));
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row['id'] = (int)$row['id'];
        $data[] = $row;
    }

    $response['status'] = true;
    $response['message'] = count($data) . ' record(s) found';
    $response['data'] = $data;

} catch (Exception $e) {
    http_response_code(500);
    $response['message'] = 'An error occurred: ' . $e->getMessage();
}

echo json_encode($response);
?>
