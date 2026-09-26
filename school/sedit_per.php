<?php 
session_start();
include('db.php');
$sess = $_SESSION['session'] ?? '2026-2027';

// Check if batch payload
if (isset($_POST['students']) && is_array($_POST['students'])) {
    $updatedCount = 0;
    foreach ($_POST['students'] as $st) {
        $idm = mysqli_real_escape_string($con, $st['idm'] ?? '');
        if ($idm === '') continue;

        $student_class   = mysqli_real_escape_string($con, $st['student_class'] ?? '');
        $student_name    = mysqli_real_escape_string($con, $st['student_name'] ?? '');
        $student_fname   = mysqli_real_escape_string($con, $st['student_fname'] ?? '');
        $m_name          = mysqli_real_escape_string($con, $st['m_name'] ?? '');
        $student_contactno = mysqli_real_escape_string($con, $st['student_contactno'] ?? '');
        $student_scholar = mysqli_real_escape_string($con, $st['student_scholar'] ?? '');
        $sssmid          = mysqli_real_escape_string($con, $st['sssmid'] ?? '');
        $rnoo            = mysqli_real_escape_string($con, $st['rnoo'] ?? '');
        $med             = mysqli_real_escape_string($con, $st['med'] ?? '');
        $student_dob     = mysqli_real_escape_string($con, $st['student_dob'] ?? '');
        $family_id       = mysqli_real_escape_string($con, $st['family_id'] ?? '');
        $caste           = mysqli_real_escape_string($con, $st['caste'] ?? '');
        $student_gender  = mysqli_real_escape_string($con, $st['student_gender'] ?? '');
        $student_address = mysqli_real_escape_string($con, $st['student_address'] ?? '');
        $hname           = mysqli_real_escape_string($con, $st['hname'] ?? '');

        mysqli_query($con,"update student set student_class='$student_class',student_name='$student_name',student_fname='$student_fname',m_name='$m_name',student_contactno='$student_contactno',
        student_scholar='$student_scholar',religion='$sssmid',sedate='$rnoo',student_rollno='$med',student_dob='$student_dob',family_id='$family_id',caste='$caste',
        student_gender='$student_gender',reg_no='$student_address',hname='$hname' where (student_id='$idm' or id='$idm') 
        and student_session='$sess'");

        mysqli_query($con,"update roll_no set rno='$rnoo' where sid='$idm' and ses='$sess'");
        $updatedCount++;
    }
    echo json_encode(['status' => true, 'updated' => $updatedCount]);
    exit;
}

// Single student update
$student_class = mysqli_real_escape_string($con, $_POST['student_class'] ?? '');
$idm = mysqli_real_escape_string($con, $_POST['idm'] ?? '');
$student_name = mysqli_real_escape_string($con, $_POST['student_name'] ?? '');
$student_fname = mysqli_real_escape_string($con, $_POST['student_fname'] ?? '');
$m_name = mysqli_real_escape_string($con, $_POST['m_name'] ?? '');
$student_contactno = mysqli_real_escape_string($con, $_POST['student_contactno'] ?? '');

$student_scholar = mysqli_real_escape_string($con, $_POST['student_scholar'] ?? '');
$sssmid = mysqli_real_escape_string($con, $_POST['sssmid'] ?? '');
$rnoo = mysqli_real_escape_string($con, $_POST['rnoo'] ?? '');
$med = mysqli_real_escape_string($con, $_POST['med'] ?? '');
$student_dob = mysqli_real_escape_string($con, $_POST['student_dob'] ?? '');
$family_id = mysqli_real_escape_string($con, $_POST['family_id'] ?? '');
$caste = mysqli_real_escape_string($con, $_POST['caste'] ?? '');
$student_gender = mysqli_real_escape_string($con, $_POST['student_gender'] ?? '');
$student_address = mysqli_real_escape_string($con, $_POST['student_address'] ?? '');
$hname = mysqli_real_escape_string($con, $_POST['hname'] ?? '');

mysqli_query($con,"update student set student_class='$student_class',student_name='$student_name',student_fname='$student_fname',m_name='$m_name',student_contactno='$student_contactno',
student_scholar='$student_scholar',religion='$sssmid',sedate='$rnoo',student_rollno='$med',student_dob='$student_dob',family_id='$family_id',caste='$caste',
student_gender='$student_gender',reg_no='$student_address',hname='$hname' where (student_id='$idm' or id='$idm') 
and student_session='".$sess."'");

mysqli_query($con,"update roll_no set rno='$rnoo' where sid='$idm' and ses='".$sess."'");
echo "updated successfully!";
?>
