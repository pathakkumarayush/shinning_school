<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/syllabus/syllabus_auth_helper.php';
global $con;

if (!headers_sent()) {
    header('Content-Type: application/json');
}

// Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method is allowed']);
    exit;
}

$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!$input || empty($input)) {
    $input = $_POST;
} else {
    $input = array_merge($input, $_POST);
}

// Read core fields
$name    = isset($input['student_name']) ? trim($input['student_name']) : (isset($input['name']) ? trim($input['name']) : (isset($input['txtname']) ? trim($input['txtname']) : ''));
$class   = isset($input['student_class']) ? trim($input['student_class']) : (isset($input['class']) ? trim($input['class']) : (isset($input['txtclass']) ? trim($input['txtclass']) : ''));
$session = isset($input['student_session']) ? trim($input['student_session']) : (isset($input['session']) ? trim($input['session']) : '');
$dob     = isset($input['student_dob']) ? trim($input['student_dob']) : (isset($input['dob']) ? trim($input['dob']) : (isset($input['txtdob']) ? trim($input['txtdob']) : ''));
$school  = isset($input['student_school']) ? trim($input['student_school']) : (isset($input['school']) ? trim($input['school']) : 'shining');

// Validation
$errors = [];
if ($name === '') {
    $errors[] = 'Student name is required';
}
if ($class === '') {
    $errors[] = 'Class is required';
}
if ($session === '') {
    $errors[] = 'Session is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'status'  => false,
        'message' => implode(', ', $errors),
        'errors'  => $errors
    ]);
    exit;
}

// Check authorization (Admin or Class Teacher assigned to this class)
$auth = resolveSyllabusUser($con, $input);
if (!$auth['is_admin']) {
    if (empty($auth['uid'])) {
        http_response_code(401);
        echo json_encode(['status' => false, 'message' => 'Authentication required (user_id / token) to perform student admission']);
        exit;
    }

    $assignedClasses = getClassTeacherAssignedClasses($con, $auth['uid'], $session);
    $canAdmit = false;
    if (!empty($assignedClasses)) {
        foreach ($assignedClasses as $ac) {
            if (strtolower(trim($ac)) === strtolower(trim($class))) {
                $canAdmit = true;
                break;
            }
        }
    }

    if (!$canAdmit) {
        http_response_code(403);
        echo json_encode([
            'status' => false,
            'message' => 'Authorization error: Only Admin or Class Teachers assigned to this class can admit students'
        ]);
        exit;
    }
}

// Generate new student_id and uid
$school_esc = mysqli_real_escape_string($con, $school);
$maxRes = mysqli_query($con, "SELECT MAX(student_id) as max_id FROM student WHERE student_school = '$school_esc'");
$maxRow = mysqli_fetch_assoc($maxRes);
$new_student_id = ((int)($maxRow['max_id'] ?? 0)) + 1;
$std_uid = "smrt" . $school . $new_student_id;

// Date formatting
$formatted_dob = $dob;
if ($dob !== '') {
    $cleanDob = str_replace('/', '-', $dob);
    $ts = strtotime($cleanDob);
    if ($ts) {
        $formatted_dob = date("d-M-Y", $ts);
    }
}

$doj = isset($input['student_doj']) ? trim($input['student_doj']) : (isset($input['doj']) ? trim($input['doj']) : (isset($input['txtdoj']) ? trim($input['txtdoj']) : date("d-m-Y")));
$formatted_doj = $doj;
if ($doj !== '') {
    $cleanDoj = str_replace('/', '-', $doj);
    $ts = strtotime($cleanDoj);
    if ($ts) {
        $formatted_doj = date("d-M-Y", $ts);
    }
}

$today_date = date("d-m-Y");

// Standardize student type
$is_admission_fee = isset($input['addmisionfee']) ? trim($input['addmisionfee']) : (isset($input['student_type']) ? trim($input['student_type']) : 'Yes');
$std_type = (strtolower($is_admission_fee) === 'yes' || strtolower($input['std_type'] ?? '') === 'new') ? 'New' : 'Old';

// Handle student image upload if provided
$student_img_filename = '';
if (isset($_FILES['student_img']) && $_FILES['student_img']['error'] === 0) {
    $uploadDir = __DIR__ . "/../school/upload/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $ext = pathinfo($_FILES['student_img']['name'], PATHINFO_EXTENSION);
    $student_img_filename = $new_student_id . "_" . time() . "." . $ext;
    move_uploaded_file($_FILES['student_img']['tmp_name'], $uploadDir . $student_img_filename);
}

// Field mapping
$scholar_no = $input['scholar_no'] ?? $input['student_scholar'] ?? $input['scholar'] ?? '';
$rollno     = $input['student_rollno'] ?? $input['rollno'] ?? $input['txtrno'] ?? $input['aadhar_no'] ?? '';
$fname      = $input['student_fname'] ?? $input['father_name'] ?? $input['txtfatname'] ?? '';
$mname      = $input['m_name'] ?? $input['mother_name'] ?? '';
$gender     = $input['student_gender'] ?? $input['gender'] ?? '';
$mobile     = $input['student_contactno'] ?? $input['mobile'] ?? $input['txtmobile'] ?? '';
$alt_no     = $input['alt_no'] ?? '';
$femail     = $input['femail'] ?? '';
$memail     = $input['memail'] ?? '';
$address    = $input['student_address'] ?? $input['address'] ?? '';
$city       = $input['home_town'] ?? $input['city'] ?? '';
$pin        = $input['pn'] ?? $input['pincode'] ?? $input['pin'] ?? '';
$section    = $input['student_section'] ?? $input['section'] ?? '';
$mothertong = $input['mother_tong'] ?? $input['mothertong'] ?? '';
$religion   = $input['religion'] ?? '';
$caste      = $input['caste'] ?? $input['category'] ?? 'GENERAL';
$caste_no   = $input['caste_no'] ?? '';
$rti        = $input['rti'] ?? $input['rte'] ?? 'No';
if ($rti === '1' || strtolower($rti) === 'yes' || strtolower($rti) === 'true') {
    $rti = 'Yes';
} else {
    $rti = 'No';
}
$pschool       = $input['pschool'] ?? $input['prev_school'] ?? '';
$reason_change = $input['reason_change'] ?? $input['reas_school'] ?? '';
$presult       = $input['presult'] ?? '';
$f_prof        = $input['f_prof'] ?? $input['fprofession'] ?? '';
$f_quali       = $input['f_quali'] ?? $input['fqualification'] ?? '';
$f_off_add     = $input['f_off_add'] ?? $input['offadd'] ?? '';
$f_tell_no_off = $input['f_tell_no_off'] ?? '';
$m_prof        = $input['m_prof'] ?? $input['mprofession'] ?? '';
$m_quali       = $input['m_quali'] ?? $input['mqualification'] ?? '';
$m_off_add     = $input['m_off_add'] ?? $input['moaddress'] ?? '';
$m_off_tel     = $input['m_off_tel'] ?? $input['mofftel'] ?? '';
$is_bro        = $input['is_bro'] ?? $input['mype2'] ?? 'No';
$b1            = $input['b1'] ?? '';
$c1            = $input['c1'] ?? '';
$b2            = $input['b2'] ?? '';
$c2            = $input['c2'] ?? '';
$hname         = $input['hname'] ?? '';
$bus           = $input['bus'] ?? '';
$mot           = $input['mot'] ?? '';
$hostel_status = $input['hostel_status'] ?? 'Dactive';
$hostel_name   = $input['hostel_name'] ?? '';
$room          = $input['room'] ?? '';
$bg            = $input['bg'] ?? $input['blood_group'] ?? '';
$bank          = $input['bank'] ?? '';
$bank_name     = $input['bank_name'] ?? $input['bn'] ?? '';
$acc_holder    = $input['acc_holder'] ?? '';
$fid           = $input['fid'] ?? $input['ifsc'] ?? $input['ifsc_code'] ?? '';
$family_id     = $input['family_id'] ?? '';
$income        = $input['income'] ?? '';
$pen           = $input['pen'] ?? '';
$apaar         = $input['apaar'] ?? '';
$school_type   = $input['school_type'] ?? '';
$fc            = $input['fc'] ?? '';
$famt          = $input['famt'] ?? '';
$ochild        = $input['ochild'] ?? '';

// Build insert query
$fields = [
    'student_id'        => $new_student_id,
    'student_scholar'   => $scholar_no,
    'student_rollno'    => $rollno,
    'student_name'      => $name,
    'student_gender'    => $gender,
    'student_fname'     => $fname,
    'm_name'            => $mname,
    'student_dob'       => $formatted_dob,
    'student_doj'       => $formatted_doj,
    'student_contactno' => $mobile,
    'alt_no'            => $alt_no,
    'femail'            => $femail,
    'memail'            => $memail,
    'student_address'   => $address,
    'home_town'         => $city,
    'pn'                => $pin,
    'student_school'    => $school,
    'student_session'   => $session,
    'student_class'     => $class,
    'class'             => $class,
    'student_section'   => $section,
    'uid'               => $std_uid,
    'mother_tong'       => $mothertong,
    'religion'          => $religion,
    'caste'             => $caste,
    'caste_no'          => $caste_no,
    'pschool'           => $pschool,
    'reason_change'     => $reason_change,
    'presult'           => $presult,
    'f_prof'            => $f_prof,
    'f_quali'           => $f_quali,
    'f_off_add'         => $f_off_add,
    'f_tell_no_off'     => $f_tell_no_off,
    'm_prof'            => $m_prof,
    'm_quali'           => $m_quali,
    'm_off_add'         => $m_off_add,
    'm_off_tel'         => $m_off_tel,
    'is_bro'            => $is_bro,
    'b1'                => $b1,
    'c1'                => $c1,
    'b2'                => $b2,
    'c2'                => $c2,
    'addmisionfee'      => $is_admission_fee,
    'std_type'          => $std_type,
    'rti'               => $rti,
    'hname'             => $hname,
    'bus'               => $bus,
    'mot'               => $mot,
    'hostel_status'     => $hostel_status,
    'hostel_name'       => $hostel_name,
    'room'              => $room,
    'date'              => $today_date,
    'ochild'            => $ochild,
    'bg'                => $bg,
    'bank'              => $bank,
    'bank_name'         => $bank_name,
    'acc_holder'        => $acc_holder,
    'fid'               => $fid,
    'family_id'         => $family_id,
    'income'            => $income,
    'pen'               => $pen,
    'apaar'             => $apaar,
    'school_type'       => $school_type,
    'fc'                => $fc,
    'famt'              => $famt,
    'student_img'       => $student_img_filename,
    'status'            => 0
];

$columns = [];
$values  = [];
foreach ($fields as $col => $val) {
    $columns[] = "`$col`";
    $escapedVal = mysqli_real_escape_string($con, (string)$val);
    $values[] = "'$escapedVal'";
}

$insertQuery = "INSERT INTO `student` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ")";

if (mysqli_query($con, $insertQuery)) {
    http_response_code(201);
    echo json_encode([
        'status'  => true,
        'message' => 'Student admitted successfully',
        'data'    => [
            'student_id'      => $new_student_id,
            'uid'             => $std_uid,
            'student_scholar' => $scholar_no,
            'scholar_no'      => $scholar_no,
            'student_name'    => $name,
            'student_class'   => $class,
            'student_section' => $section,
            'student_session' => $session,
            'student_dob'     => $formatted_dob,
            'student_doj'     => $formatted_doj,
            'std_type'        => $std_type,
            'rti'             => $rti,
            'caste'           => $caste,
            'student_contactno'=> $mobile
        ]
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status'  => false,
        'message' => 'Failed to admit student: ' . mysqli_error($con)
    ]);
}
