<?php 
session_start();
include('db.php');
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
$whatsapp_no = mysqli_real_escape_string($con, $_POST['whatsapp_no'] ?? ($_POST['whatsapp'] ?? ''));
$height = mysqli_real_escape_string($con, $_POST['height'] ?? '');
$weight = mysqli_real_escape_string($con, $_POST['weight'] ?? '');
$education_portal_update = mysqli_real_escape_string($con, $_POST['education_portal_update'] ?? ($_POST['portal'] ?? 'no'));
$urise_update = mysqli_real_escape_string($con, $_POST['urise_update'] ?? ($_POST['urise'] ?? 'no'));
$sess = $_SESSION['session'] ?? '2026-2027';

mysqli_query($con,"update student set student_class='$student_class',student_name='$student_name',student_fname='$student_fname',m_name='$m_name',student_contactno='$student_contactno',
student_scholar='$student_scholar',religion='$sssmid',rno='$rnoo',student_rollno='$med',student_dob='$student_dob',whatsapp_no='$whatsapp_no',height='$height',weight='$weight',education_portal_update='$education_portal_update',urise_update='$urise_update' where (student_id='$idm' or id='$idm') and student_session='".$sess."'");

?>
