<?php 
session_start();
include('db.php');
$student_class = $_POST['student_class'];
$idm = $_POST['idm'];
$rno = $_POST['rno'];
$student_name = $_POST['student_name'];
$sess = $_SESSION['session'];
$query = mysqli_query($con,"insert into roll_no(sid,class,rno,ses,sname)values('$idm','$student_class','$rno','$sess','$student_name')");

?>
