<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require __DIR__ . '/../db.php';

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Validate required parameter: session
if (!isset($_GET['session']) || empty($_GET['session'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

$session = mysqli_real_escape_string($con, $_GET['session']);

// Optional type filter (enquiry, admission, appointment, registration)
$type = isset($_GET['type']) ? strtolower(trim($_GET['type'])) : null;

// Validate type filter if provided
$valid_types = ['enquiry', 'admission', 'appointment', 'registration'];
if ($type !== null && !in_array($type, $valid_types)) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Invalid type filter. Allowed values: enquiry, admission, appointment, registration']);
    exit;
}

// Optional school filter
$school = isset($_GET['school']) ? mysqli_real_escape_string($con, $_GET['school']) : null;

// Optional date filter (defaults to today's date in 'd-m-Y' format)
$date = isset($_GET['date']) ? mysqli_real_escape_string($con, $_GET['date']) : date("d-m-Y");

date_default_timezone_set('Asia/Kolkata');

$data = [];

// Helper function to build conditions
function build_where($con, $date, $session_col, $session_val, $school_col = null, $school_val = null) {
    $where = "date = '" . mysqli_real_escape_string($con, $date) . "'";
    $where .= " AND $session_col = '" . mysqli_real_escape_string($con, $session_val) . "'";
    if ($school_col !== null && $school_val !== null) {
        $where .= " AND $school_col = '" . mysqli_real_escape_string($con, $school_val) . "'";
    }
    return $where;
}

// 1. Fetch Today Enquiry (from 'enquiry' table)
if ($type === null || $type === 'enquiry') {
    $where = build_where($con, $date, 'session', $session, 'school', $school);
    $query = "SELECT * FROM enquiry WHERE $where";
    $result = mysqli_query($con, $query);
    
    $enquiries = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $enquiries[] = $row;
        }
    }
    $data['today_enquiry'] = [
        'count' => count($enquiries),
        'list' => $enquiries
    ];
}

// 2. Fetch Today Admission (from 'student' table)
if ($type === null || $type === 'admission') {
    $where = build_where($con, $date, 'student_session', $session, 'student_school', $school);
    $query = "SELECT * FROM student WHERE $where ORDER BY student_name ASC";
    $result = mysqli_query($con, $query);
    
    $admissions = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Apply standard mappings as in get_student.php
            if (!empty($row['student_img'])) {
                $row['student_img'] = 'school/upload/' . basename($row['student_img']);
            }
            if (!empty($row['student_dob'])) {
                $row['student_dob'] = date("d-M-Y", strtotime($row['student_dob']));
            }
            if (!empty($row['student_doj'])) {
                $row['student_doj'] = date("d-M-Y", strtotime($row['student_doj']));
            }
            $admissions[] = $row;
        }
    }
    $data['today_admission'] = [
        'count' => count($admissions),
        'list' => $admissions
    ];
}

// 3. Fetch Today Appointment (from 'appoiment' table)
if ($type === null || $type === 'appointment') {
    $where = build_where($con, $date, 'session', $session, 'school', $school);
    $query = "SELECT * FROM appoiment WHERE $where";
    $result = mysqli_query($con, $query);
    
    $appointments = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $appointments[] = $row;
        }
    }
    $data['today_appointment'] = [
        'count' => count($appointments),
        'list' => $appointments
    ];
}

// 4. Today Registration (No table -> return null as requested)
if ($type === null || $type === 'registration') {
    $data['today_registration'] = null;
}

http_response_code(200); // OK
echo json_encode([
    'status' => true,
    'message' => 'Front desk data fetched successfully',
    'data' => $data
]);
?>
