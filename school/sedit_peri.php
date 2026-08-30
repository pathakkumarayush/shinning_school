<?php 
session_start();
include('db.php');
$student_class = $_POST['student_class'];
$idm = $_POST['idm'];
$student_name = $_POST['student_name'];
$student_fname = $_POST['student_fname'];
$m_name = $_POST['m_name'];
$student_contactno = $_POST['student_contactno'];

$student_scholar = $_POST['student_scholar'];
$sssmid = $_POST['sssmid'];
$rno = $_POST['rno'];
$med = $_POST['med'];
$student_dob = $_POST['student_dob'];
$family_id = $_POST['family_id'];
$caste = $_POST['caste'];
$student_gender = $_POST['student_gender'];
$student_address = $_POST['student_address'];
$hname = $_POST['hname'];
$sess = $_SESSION['session'];

mysqli_query($con,"update student set student_class='$student_class',student_name='$student_name',student_fname='$student_fname',m_name='$m_name',
student_scholar='$student_scholar',rno='$rno' where student_id='".$_POST["idm"]."' and student_session='".$sess."'");

?>
