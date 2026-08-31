<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../db.php';
if (!headers_sent()) {
    header('Content-Type: application/json');
}

// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// Validate input
if (!$_GET || !isset($_GET['session'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}

$session = mysqli_real_escape_string($con, trim($_GET['session']));

// Helper to compute age from various date strings
if (!function_exists('computeStudentAge')) {
    function computeStudentAge($dobString) {
        if (empty($dobString)) return null;
        $clean = trim(str_replace('/', '-', $dobString));
        $timestamp = strtotime($clean);
        if (!$timestamp || $timestamp <= 0) return null;
        $dob = new DateTime();
        $dob->setTimestamp($timestamp);
        $today = new DateTime();
        return $today->diff($dob)->y;
    }
}

// Build SQL conditions
$conditions = [
    "status = 0",
    "student_session = '$session'"
];

// Class & Section filters
if (isset($_GET['class']) && trim($_GET['class']) !== '') {
    $class_esc = mysqli_real_escape_string($con, trim($_GET['class']));
    $conditions[] = "student_class = '$class_esc'";
} elseif (isset($_GET['student_class']) && trim($_GET['student_class']) !== '') {
    $class_esc = mysqli_real_escape_string($con, trim($_GET['student_class']));
    $conditions[] = "student_class = '$class_esc'";
}

if (isset($_GET['section']) && trim($_GET['section']) !== '') {
    $sec_esc = mysqli_real_escape_string($con, trim($_GET['section']));
    $conditions[] = "student_section = '$sec_esc'";
} elseif (isset($_GET['student_section']) && trim($_GET['student_section']) !== '') {
    $sec_esc = mysqli_real_escape_string($con, trim($_GET['student_section']));
    $conditions[] = "student_section = '$sec_esc'";
}

// Name filter
if (isset($_GET['student_name']) && trim($_GET['student_name']) !== '') {
    $name_esc = mysqli_real_escape_string($con, trim($_GET['student_name']));
    $conditions[] = "student_name LIKE '%$name_esc%'";
} elseif (isset($_GET['name']) && trim($_GET['name']) !== '') {
    $name_esc = mysqli_real_escape_string($con, trim($_GET['name']));
    $conditions[] = "student_name LIKE '%$name_esc%'";
}

// Scholar No. filter
if (isset($_GET['scholar_no']) && trim($_GET['scholar_no']) !== '') {
    $sch_esc = mysqli_real_escape_string($con, trim($_GET['scholar_no']));
    $conditions[] = "(student_scholar = '$sch_esc' OR student_scholar LIKE '%$sch_esc%')";
} elseif (isset($_GET['student_scholar']) && trim($_GET['student_scholar']) !== '') {
    $sch_esc = mysqli_real_escape_string($con, trim($_GET['student_scholar']));
    $conditions[] = "(student_scholar = '$sch_esc' OR student_scholar LIKE '%$sch_esc%')";
}

// Mobile filter
if (isset($_GET['mobile']) && trim($_GET['mobile']) !== '') {
    $mob_esc = mysqli_real_escape_string($con, trim($_GET['mobile']));
    $conditions[] = "(student_contactno LIKE '%$mob_esc%' OR alt_no LIKE '%$mob_esc%')";
} elseif (isset($_GET['student_contactno']) && trim($_GET['student_contactno']) !== '') {
    $mob_esc = mysqli_real_escape_string($con, trim($_GET['student_contactno']));
    $conditions[] = "(student_contactno LIKE '%$mob_esc%' OR alt_no LIKE '%$mob_esc%')";
}

// Admission No. / Roll No. / Reg No. filter
if (isset($_GET['admission_no']) && trim($_GET['admission_no']) !== '') {
    $adm_esc = mysqli_real_escape_string($con, trim($_GET['admission_no']));
    $conditions[] = "(student_rollno LIKE '%$adm_esc%' OR reg_no LIKE '%$adm_esc%' OR student_id = '$adm_esc')";
} elseif (isset($_GET['student_rollno']) && trim($_GET['student_rollno']) !== '') {
    $adm_esc = mysqli_real_escape_string($con, trim($_GET['student_rollno']));
    $conditions[] = "student_rollno LIKE '%$adm_esc%'";
}

// Multi-field search (Scholar No, Name, Mobile, Admission No)
if (isset($_GET['search']) && trim($_GET['search']) !== '') {
    $s_term = mysqli_real_escape_string($con, trim($_GET['search']));
    $conditions[] = "(
        student_name LIKE '%$s_term%' OR
        student_scholar LIKE '%$s_term%' OR
        student_contactno LIKE '%$s_term%' OR
        student_rollno LIKE '%$s_term%' OR
        reg_no LIKE '%$s_term%' OR
        student_id = '$s_term'
    )";
} elseif (isset($_GET['q']) && trim($_GET['q']) !== '') {
    $s_term = mysqli_real_escape_string($con, trim($_GET['q']));
    $conditions[] = "(
        student_name LIKE '%$s_term%' OR
        student_scholar LIKE '%$s_term%' OR
        student_contactno LIKE '%$s_term%' OR
        student_rollno LIKE '%$s_term%' OR
        reg_no LIKE '%$s_term%' OR
        student_id = '$s_term'
    )";
}

// Gender filter
if (isset($_GET['gender']) && trim($_GET['gender']) !== '') {
    $gen_esc = mysqli_real_escape_string($con, trim($_GET['gender']));
    $conditions[] = "LOWER(TRIM(student_gender)) = LOWER(TRIM('$gen_esc'))";
} elseif (isset($_GET['student_gender']) && trim($_GET['student_gender']) !== '') {
    $gen_esc = mysqli_real_escape_string($con, trim($_GET['student_gender']));
    $conditions[] = "LOWER(TRIM(student_gender)) = LOWER(TRIM('$gen_esc'))";
}

// Category / Caste filter
if (isset($_GET['category']) && trim($_GET['category']) !== '') {
    $cat = trim($_GET['category']);
    if (strtoupper($cat) === 'RTE') {
        $conditions[] = "LOWER(TRIM(rti)) = 'yes'";
    } else {
        $cat_esc = mysqli_real_escape_string($con, $cat);
        $conditions[] = "LOWER(TRIM(caste)) = LOWER(TRIM('$cat_esc'))";
    }
} elseif (isset($_GET['caste']) && trim($_GET['caste']) !== '') {
    $cat = trim($_GET['caste']);
    if (strtoupper($cat) === 'RTE') {
        $conditions[] = "LOWER(TRIM(rti)) = 'yes'";
    } else {
        $cat_esc = mysqli_real_escape_string($con, $cat);
        $conditions[] = "LOWER(TRIM(caste)) = LOWER(TRIM('$cat_esc'))";
    }
}

// RTE / RTI filter
if (isset($_GET['rte']) && trim($_GET['rte']) !== '') {
    $rte_val = strtolower(trim($_GET['rte']));
    if ($rte_val === '1' || $rte_val === 'yes' || $rte_val === 'true') {
        $conditions[] = "LOWER(TRIM(rti)) = 'yes'";
    } else {
        $conditions[] = "LOWER(TRIM(rti)) != 'yes'";
    }
} elseif (isset($_GET['rti']) && trim($_GET['rti']) !== '') {
    $rti_val = strtolower(trim($_GET['rti']));
    if ($rti_val === '1' || $rti_val === 'yes' || $rti_val === 'true') {
        $conditions[] = "LOWER(TRIM(rti)) = 'yes'";
    } else {
        $conditions[] = "LOWER(TRIM(rti)) != 'yes'";
    }
}

// New Student filter
if (isset($_GET['new_student']) || isset($_GET['is_new']) || isset($_GET['std_type'])) {
    $val = trim($_GET['new_student'] ?? $_GET['is_new'] ?? $_GET['std_type'] ?? '');
    if ($val === '1' || strtolower($val) === 'yes' || strtolower($val) === 'true' || strtolower($val) === 'new') {
        $conditions[] = "(LOWER(TRIM(std_type)) = 'new' OR LOWER(TRIM(addmisionfee)) = 'yes')";
    } elseif (strtolower($val) === 'old' || $val === '0' || strtolower($val) === 'no') {
        $conditions[] = "LOWER(TRIM(std_type)) = 'old'";
    }
}

// Address Wise filters
if (isset($_GET['address']) && trim($_GET['address']) !== '') {
    $add_esc = mysqli_real_escape_string($con, trim($_GET['address']));
    $conditions[] = "(student_address LIKE '%$add_esc%' OR home_town LIKE '%$add_esc%')";
}
if (isset($_GET['city']) && trim($_GET['city']) !== '') {
    $city_esc = mysqli_real_escape_string($con, trim($_GET['city']));
    $conditions[] = "(student_address LIKE '%$city_esc%' OR home_town LIKE '%$city_esc%')";
} elseif (isset($_GET['home_town']) && trim($_GET['home_town']) !== '') {
    $city_esc = mysqli_real_escape_string($con, trim($_GET['home_town']));
    $conditions[] = "home_town LIKE '%$city_esc%'";
}
if (isset($_GET['pincode']) && trim($_GET['pincode']) !== '') {
    $pin_esc = mysqli_real_escape_string($con, trim($_GET['pincode']));
    $conditions[] = "(pn = '$pin_esc' OR student_address LIKE '%$pin_esc%')";
} elseif (isset($_GET['pn']) && trim($_GET['pn']) !== '') {
    $pin_esc = mysqli_real_escape_string($con, trim($_GET['pn']));
    $conditions[] = "pn = '$pin_esc'";
}

$whereClause = implode(' AND ', $conditions);
$query = "SELECT * FROM student WHERE $whereClause ORDER BY student_class ASC, student_name ASC";

$result = mysqli_query($con, $query);

if (!$result) {
    http_response_code(500);
    echo json_encode(['status' => false, 'message' => 'Database query failed: ' . mysqli_error($con)]);
    exit;
}

// Parse Age filter parameters if passed
$target_age = isset($_GET['age']) && trim($_GET['age']) !== '' ? (int)$_GET['age'] : null;
$min_age    = isset($_GET['min_age']) && trim($_GET['min_age']) !== '' ? (int)$_GET['min_age'] : null;
$max_age    = isset($_GET['max_age']) && trim($_GET['max_age']) !== '' ? (int)$_GET['max_age'] : null;

$data = [];
$group_by = isset($_GET['group_by']) ? trim(strtolower($_GET['group_by'])) : '';
$grouped_counts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $computedAge = computeStudentAge($row['student_dob'] ?? '');
    
    // Apply age filters in stream to handle irregular DOB formats
    if ($target_age !== null && $computedAge !== $target_age) {
        continue;
    }
    if ($min_age !== null && ($computedAge === null || $computedAge < $min_age)) {
        continue;
    }
    if ($max_age !== null && ($computedAge === null || $computedAge > $max_age)) {
        continue;
    }

    // Enhance and format student data
    $row['scholar_no'] = $row['student_scholar'] ?? '';
    $row['age'] = $computedAge;

    if (!empty($row['student_img'])) {
        $row['student_img'] = 'school/upload/' . basename($row['student_img']);
    }
    if (!empty($row['student_dob'])) {
        $cleanDob = str_replace('/', '-', $row['student_dob']);
        $dobTs = strtotime($cleanDob);
        if ($dobTs) {
            $row['student_dob'] = date("d-M-Y", $dobTs);
        }
    }
    if (!empty($row['student_doj'])) {
        $cleanDoj = str_replace('/', '-', $row['student_doj']);
        $dojTs = strtotime($cleanDoj);
        if ($dojTs) {
            $row['student_doj'] = date("d-M-Y", $dojTs);
        }
    }

    if ($group_by !== '') {
        $groupKey = 'Other';
        if ($group_by === 'gender') {
            $groupKey = ucfirst(strtolower($row['student_gender'] ?? 'Unknown'));
        } elseif ($group_by === 'class') {
            $groupKey = $row['student_class'] ?? 'Unassigned';
        } elseif ($group_by === 'category' || $group_by === 'caste') {
            $groupKey = !empty($row['rti']) && strtolower($row['rti']) === 'yes' ? 'RTE' : ($row['caste'] ?: 'General');
        } elseif ($group_by === 'age') {
            $groupKey = $computedAge !== null ? $computedAge . ' Years' : 'Unknown';
        }
        $grouped_counts[$groupKey] = ($grouped_counts[$groupKey] ?? 0) + 1;
    }

    $data[] = $row;
}

if (count($data) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'No students found', 'users' => []]);
    exit;
}

$response = [
    'status'  => true,
    'message' => 'Students fetched successfully',
    'total'   => count($data),
    'users'   => $data
];

if (!empty($grouped_counts)) {
    $response['grouped_counts'] = $grouped_counts;
}

if (isset($_GET['count_only']) && ($_GET['count_only'] === '1' || strtolower($_GET['count_only']) === 'true')) {
    unset($response['users']);
}

http_response_code(200); // OK
echo json_encode($response);

