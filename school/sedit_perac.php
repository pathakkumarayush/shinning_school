<?php 
session_start();
include('db.php');
$student_class = $_POST['student_class'];
$idm = $_POST['idm'];
$student_name = $_POST['student_name'];
$student_fname = $_POST['student_fname'];
$m_name = $_POST['m_name'];
$student_scholar = $_POST['student_scholar'];
$rnoo = $_POST['rnoo'];

$sess = $_SESSION['session'];

mysqli_query($con,"update student set student_class='$student_class',student_name='$student_name',student_fname='$student_fname',m_name='$m_name',
student_scholar='$student_scholar',sedate='$rnoo' where student_id='".$_POST["idm"]."' and student_session='".$sess."'");

?>
