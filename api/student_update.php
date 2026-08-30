<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require '../db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$student_id = $_POST['student_id'] ?? '';
$session    = $_POST['session'] ?? '';

if (empty($student_id) || empty($session)) {
    echo json_encode(['status' => false, 'message' => 'student_id and session required']);
    exit;
}

/*
|------------------------------------------------------------------
| Allowed Columns
|------------------------------------------------------------------
ifsc -  ifsc
bank - bank name 
bg - BLOOD GROUP
f_prof - Father Occupation
f_quali - Father Quali
m_prof - Mother Occupation
m_quali - Mother Quali

SSSMID - sssmid
*/
$allowedColumns = [
    'student_scholar','student_name','student_gender','student_dob',
    'student_rollno','mother_tong','religion','caste','pschool',
    'reason_change','subj_req','is_bro','b1','c1','b2','c2','ifsc','bank',
    'student_doj','student_section','bus','hname','std_type','mot','f_prof',
    'student_class','fid','presult','fc','famt','bg','ork','admb1',
    'admb2','orn','ochild','rno','transport_stopage','rti','bn','sssmid','accno',

    'student_fname','m_name','f_quali','m_quali','f_prof','m_prof',
    'student_contactno','f_tell_no_off','femail','memail',
    'student_address','m_off_add','f_off_add','m_off_tel','pin',
    'fimg','mimg',

    // 👇 add image column
    'student_img'
];

$updates = [];

/*
|------------------------------------------------------------------
| Normal Field Update
|------------------------------------------------------------------
*/
foreach ($_POST as $key => $value) {

    if ($key == 'student_id' || $key == 'session') {
        continue;
    }

    if (in_array($key, $allowedColumns) && $value !== '') {

        $safeValue = mysqli_real_escape_string($con, $value);

        if ($key == 'student_dob' || $key == 'student_doj') {
            $safeValue = date("d-m-Y", strtotime($safeValue));
        }

        $updates[] = "$key = '$safeValue'";
    }
}

/*
|------------------------------------------------------------------
| Image Upload Handling
|------------------------------------------------------------------
*/
if (isset($_FILES['student_img']) && $_FILES['student_img']['error'] == 0) {

    $fileName = $_FILES['student_img']['name'];
    $tmpName  = $_FILES['student_img']['tmp_name'];

    // Unique name (same logic like your code)
    $newName = $student_id . "_" . time() . "_" . $fileName;

    $uploadDir = "../school/upload/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $uploadPath = $uploadDir . $newName;

    if (move_uploaded_file($tmpName, $uploadPath)) {

        $safeImg = mysqli_real_escape_string($con, $newName);
        $updates[] = "student_img = '$safeImg'";

    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Image upload failed'
        ]);
        exit;
    }
}

/*
|------------------------------------------------------------------
| Final Update Query
|------------------------------------------------------------------
*/
if (!empty($updates)) {

    $query = "
        UPDATE student 
        SET " . implode(', ', $updates) . "
        WHERE student_id = '" . mysqli_real_escape_string($con, $student_id) . "'
        AND student_session = '" . mysqli_real_escape_string($con, $session) . "'
    ";

    if (mysqli_query($con, $query)) {
        $affected = mysqli_affected_rows($con);
        if ($affected > 0) {
            echo json_encode([
                'status'        => true,
                'message'       => 'Student updated successfully',
                'affected_rows' => $affected
            ]);
        } else {
            echo json_encode([
                'status'  => false,
                'message' => 'No student record found with the given student_id and session'
            ]);
        }
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Update failed'
        ]);
    }

} else {

    echo json_encode([
        'status' => false,
        'message' => 'No fields provided for update'
    ]);
}
?>