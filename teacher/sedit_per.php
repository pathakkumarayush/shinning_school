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
$rnoo = $_POST['rnoo'];
$med = $_POST['med'];
$student_dob = $_POST['student_dob'];
$sess = $_SESSION['session'];

mysqli_query($con,"update student set student_class='$student_class',student_name='$student_name',student_fname='$student_fname',m_name='$m_name',student_contactno='$student_contactno',
student_scholar='$student_scholar',religion='$sssmid',rno='$rnoo',student_rollno='$med',student_dob='$student_dob' where student_id='".$_POST["idm"]."' and student_session='".$sess."'");

?>
