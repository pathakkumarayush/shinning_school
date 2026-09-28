<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/syllabus/syllabus_auth_helper.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input || empty($input)) {
    $input = $_POST;
} else {
    $input = array_merge($input, $_POST);
}

// Check if batch update request
if (isset($input['students']) && is_array($input['students'])) {
    $batchSession = isset($input['session']) ? trim($input['session']) : (isset($input['student_session']) ? trim($input['student_session']) : '');
    $aliases = [
        'scholar_no'    => 'student_scholar',
        'name'          => 'student_name',
        'father_name'   => 'student_fname',
        'mother_name'   => 'm_name',
        'mobile'        => 'student_contactno',
        'father_mobile' => 'student_contactno',
        'dob'           => 'student_dob',
        'doj'           => 'student_doj',
        'admission_date'=> 'student_doj',
        'gender'        => 'student_gender',
        'class'         => 'student_class',
        'section'       => 'student_section',
        'address'       => 'student_address',
        'pincode'       => 'pn',
        'pin'           => 'pn',
        'city'          => 'home_town',
        'category'      => 'caste',
        'blood_group'   => 'bg',
        'aadhar_no'     => 'student_rollno',
        'ifsc'          => 'fid',
        'ifsc_code'     => 'fid',
        'portal'        => 'education_portal_update',
        'education_portal' => 'education_portal_update',
        'portal_update' => 'education_portal_update',
        'education_portal_update' => 'education_portal_update',
        'urise'         => 'urise_update',
        'urise_detail'  => 'urise_update',
        'urise_details' => 'urise_update',
        'urise_update'  => 'urise_update',
        'whatsapp'      => 'whatsapp_no',
        'whatsaap'      => 'whatsapp_no',
        'whatsaap_no'   => 'whatsapp_no',
        'whatsaap_number' => 'whatsapp_no',
        'whatsapp_number' => 'whatsapp_no',
        'whatsapp_no'   => 'whatsapp_no',
        'height'        => 'height',
        'weight'        => 'weight',
        'mobile_no_2'   => 'alt_no',
        'mother_mobile' => 'alt_no'
    ];
    $allowedColumns = [
        'student_scholar','student_rollno','reg_no','student_name','sub','student_gender',
        'student_fname','m_name','student_dob','student_doj','doj','class','student_contactno',
        'femail','memail','student_address','student_school','student_session','student_class',
        'student_section','uid','addmisionfee','mother_tong','nationality','religion','caste',
        'home_town','spe_interest','pschool','reason_change','pclass','presult','subj_req',
        'f_prof','f_quali','f_off_add','f_tell_no_off','md','m_prof','m_off_add','m_off_tel',
        'm_quali','is_bro','b1','c1','b2','c2','admb1','admb2','status','rea','tcdate',
        'hname','bus','transport_status','transport_stopage','transport_rout','transport_veh',
        'transport_type','cautionmoney','tc','hostel_status','hostel_name','room','date','st',
        'std_type','fc','famt','ork','fimg','mimg','dyes','ayes','ryes','tcyes','fidyes','midyes',
        'simg','fidimg','midimg','tcimg','dimg','aimg','otimg','otyes','otnm','admimg','yadm',
        'castimg','ycast','bank_yes','bank_img','inc_yes','inc_img','sssmid_yes','sssmid_img',
        'scholar_doc_img','scholar_doc_yes','prev_marksheet_img','prev_marksheet_yes',
        'rti','mot','fid','student_email','bg','pn','orn','ochild','rno','family_id','bank',
        'sedate','m1','m2','m3','m4','m5','m6','m7','m8','m9','m10','m','caste_no','alt_no',
        'income','acc_holder','bank_name','apaar','pen','school_type','student_img',
        'education_portal_update','urise_update','whatsapp_no','height','weight'
    ];

    $updatedStudents = 0;
    $errorsList = [];

    foreach ($input['students'] as $idx => $stItem) {
        $stId = trim($stItem['student_id'] ?? ($stItem['id'] ?? ($stItem['idm'] ?? '')));
        $stSess = trim($stItem['session'] ?? ($stItem['student_session'] ?? $batchSession));

        if ($stId === '' || $stSess === '') {
            $errorsList[] = "Item at index $idx: student_id and session are required";
            continue;
        }

        $stIdEsc = mysqli_real_escape_string($con, $stId);
        $stSessEsc = mysqli_real_escape_string($con, $stSess);

        $updates = [];
        foreach ($stItem as $rawKey => $val) {
            if (in_array($rawKey, ['student_id', 'id', 'idm', 'session', 'student_session'])) continue;
            $col = $aliases[$rawKey] ?? $rawKey;
            if (in_array($col, $allowedColumns) && $val !== null && $val !== '') {
                $safeVal = mysqli_real_escape_string($con, $val);
                if ($col === 'student_dob' || $col === 'student_doj') {
                    $cleanDate = str_replace('/', '-', $safeVal);
                    $ts = strtotime($cleanDate);
                    if ($ts) $safeVal = date("d-m-Y", $ts);
                }
                $updates[$col] = "$col = '$safeVal'";
            }
        }

        if (!empty($updates)) {
            $q = "UPDATE student SET " . implode(', ', array_values($updates)) . " WHERE (student_id = '$stIdEsc' OR id = '$stIdEsc') AND student_session = '$stSessEsc'";
            if (mysqli_query($con, $q)) {
                $updatedStudents++;
                if (isset($stItem['rnoo']) || isset($stItem['roll_no'])) {
                    $rnoVal = mysqli_real_escape_string($con, $stItem['rnoo'] ?? $stItem['roll_no']);
                    mysqli_query($con, "UPDATE roll_no SET rno = '$rnoVal' WHERE sid = '$stIdEsc' AND ses = '$stSessEsc'");
                }
            } else {
                $errorsList[] = "Student $stId: " . mysqli_error($con);
            }
        }
    }

    http_response_code(200);
    echo json_encode([
        'status'         => true,
        'message'        => 'Batch student update processed',
        'updated_count'  => $updatedStudents,
        'total_received' => count($input['students']),
        'errors'         => $errorsList
    ]);
    exit;
}

$student_id = isset($input['student_id']) ? trim($input['student_id']) : (isset($input['id']) ? trim($input['id']) : (isset($input['idm']) ? trim($input['idm']) : ''));
$session    = isset($input['session']) ? trim($input['session']) : (isset($input['student_session']) ? trim($input['student_session']) : '');

if (empty($student_id) || empty($session)) {
    http_response_code(400);
    echo json_encode(['status' => false, 'message' => 'student_id and session are required']);
    exit;
}

$student_id_esc = mysqli_real_escape_string($con, $student_id);
$session_esc    = mysqli_real_escape_string($con, $session);

$studentQuery = mysqli_query($con, "SELECT * FROM student WHERE (student_id = '$student_id_esc' OR id = '$student_id_esc') AND student_session = '$session_esc' LIMIT 1");
if (!$studentQuery || mysqli_num_rows($studentQuery) === 0) {
    http_response_code(404);
    echo json_encode(['status' => false, 'message' => 'No student record found with the given student_id and session']);
    exit;
}

$existingStudent = mysqli_fetch_assoc($studentQuery);
$studentClass = $existingStudent['student_class'] ?? '';

// Check Authorization
$auth = resolveSyllabusUser($con, $input);
if (!$auth['is_admin']) {
    if (empty($auth['uid'])) {
        http_response_code(401);
        echo json_encode(['status' => false, 'message' => 'Authentication required (user_id / token) to update student']);
        exit;
    }

    $assignedClasses = getClassTeacherAssignedClasses($con, $auth['uid'], $session);
    $canUpdate = false;
    if (!empty($assignedClasses) && !empty($studentClass)) {
        foreach ($assignedClasses as $ac) {
            if (strtolower(trim($ac)) === strtolower(trim($studentClass))) {
                $canUpdate = true;
                break;
            }
        }
    }

    if (!$canUpdate) {
        http_response_code(403);
        echo json_encode([
            'status' => false,
            'message' => 'Authorization error: Class teachers can only update students belonging to their assigned class/section'
        ]);
        exit;
    }
}

// Field aliases
$aliases = [
    'scholar_no'    => 'student_scholar',
    'name'          => 'student_name',
    'father_name'   => 'student_fname',
    'mother_name'   => 'm_name',
    'mobile'        => 'student_contactno',
    'father_mobile' => 'student_contactno',
    'dob'           => 'student_dob',
    'doj'           => 'student_doj',
    'admission_date'=> 'student_doj',
    'gender'        => 'student_gender',
    'class'         => 'student_class',
    'section'       => 'student_section',
    'address'       => 'student_address',
    'pincode'       => 'pn',
    'pin'           => 'pn',
    'city'          => 'home_town',
    'category'      => 'caste',
    'blood_group'   => 'bg',
    'aadhar_no'     => 'student_rollno',
    'ifsc'          => 'fid',
    'ifsc_code'     => 'fid',
    'portal'        => 'education_portal_update',
    'education_portal' => 'education_portal_update',
    'portal_update' => 'education_portal_update',
    'education_portal_update' => 'education_portal_update',
    'urise'         => 'urise_update',
    'urise_detail'  => 'urise_update',
    'urise_details' => 'urise_update',
    'urise_update'  => 'urise_update',
    'whatsapp'      => 'whatsapp_no',
    'whatsaap'      => 'whatsapp_no',
    'whatsaap_no'   => 'whatsapp_no',
    'whatsaap_number' => 'whatsapp_no',
    'whatsapp_number' => 'whatsapp_no',
    'whatsapp_no'   => 'whatsapp_no',
    'height'        => 'height',
    'weight'        => 'weight',
    'mobile_no_2'   => 'alt_no',
    'mother_mobile' => 'alt_no'
];

$allowedColumns = [
    'student_scholar','student_rollno','reg_no','student_name','sub','student_gender',
    'student_fname','m_name','student_dob','student_doj','doj','class','student_contactno',
    'femail','memail','student_address','student_school','student_session','student_class',
    'student_section','uid','addmisionfee','mother_tong','nationality','religion','caste',
    'home_town','spe_interest','pschool','reason_change','pclass','presult','subj_req',
    'f_prof','f_quali','f_off_add','f_tell_no_off','md','m_prof','m_off_add','m_off_tel',
    'm_quali','is_bro','b1','c1','b2','c2','admb1','admb2','status','rea','tcdate',
    'hname','bus','transport_status','transport_stopage','transport_rout','transport_veh',
    'transport_type','cautionmoney','tc','hostel_status','hostel_name','room','date','st',
    'std_type','fc','famt','ork','fimg','mimg','dyes','ayes','ryes','tcyes','fidyes','midyes',
    'simg','fidimg','midimg','tcimg','dimg','aimg','otimg','otyes','otnm','admimg','yadm',
    'castimg','ycast','bank_yes','bank_img','inc_yes','inc_img','sssmid_yes','sssmid_img',
    'scholar_doc_img','scholar_doc_yes','prev_marksheet_img','prev_marksheet_yes',
    'rti','mot','fid','student_email','bg','pn','orn','ochild','rno','family_id','bank',
    'sedate','m1','m2','m3','m4','m5','m6','m7','m8','m9','m10','m','caste_no','alt_no',
    'income','acc_holder','bank_name','apaar','pen','school_type','student_img',
    'education_portal_update','urise_update','whatsapp_no','height','weight'
];

$updates = [];

foreach ($input as $rawKey => $value) {
    if (in_array($rawKey, ['student_id', 'session', 'user_id', 'token', 'created_by'])) {
        continue;
    }

    $col = $aliases[$rawKey] ?? $rawKey;

    if (in_array($col, $allowedColumns) && $value !== null && $value !== '') {
        $safeValue = mysqli_real_escape_string($con, $value);

        if ($col === 'student_dob' || $col === 'student_doj') {
            $cleanDate = str_replace('/', '-', $safeValue);
            $ts = strtotime($cleanDate);
            if ($ts) {
                $safeValue = date("d-m-Y", $ts);
            }
        }

        $updates[$col] = "$col = '$safeValue'";
    }
}

// Image upload handling
if (isset($_FILES['student_img']) && $_FILES['student_img']['error'] === 0) {
    $fileName = $_FILES['student_img']['name'];
    $tmpName  = $_FILES['student_img']['tmp_name'];

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $newName = $student_id . "_" . time() . "." . $ext;

    $uploadDir = __DIR__ . "/../school/upload/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadPath = $uploadDir . $newName;

    if (move_uploaded_file($tmpName, $uploadPath)) {
        $safeImg = mysqli_real_escape_string($con, $newName);
        $updates['student_img'] = "student_img = '$safeImg'";
    } else {
        http_response_code(500);
        echo json_encode(['status' => false, 'message' => 'Image upload failed']);
        exit;
    }
}

if (!empty($updates)) {
    $targetStudentId = $existingStudent['student_id'];
    $query = "
        UPDATE student 
        SET " . implode(', ', array_values($updates)) . "
        WHERE student_id = '$targetStudentId'
        AND student_session = '$session_esc'
    ";

    if (mysqli_query($con, $query)) {
        $affected = mysqli_affected_rows($con);
        http_response_code(200);
        echo json_encode([
            'status'        => true,
            'message'       => 'Student updated successfully',
            'affected_rows' => $affected
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'status'  => false,
            'message' => 'Update failed: ' . mysqli_error($con)
        ]);
    }
} else {
    http_response_code(400);
    echo json_encode([
        'status'  => false,
        'message' => 'No valid fields provided for update'
    ]);
}
