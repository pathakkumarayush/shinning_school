<?php 
session_start();
include('db.php');
$student_class = $_POST['student_class'];
$idm = $_POST['idm'];
$rno = $_POST['rno'];
$student_name = $_POST['student_name'];
$sess = $_SESSION['session'];

mysqli_query($con,"update roll_no set class='$student_class',sname='$student_name',rno='$rno' where sid='".$_POST["idm"]."' and ses='".$sess."'");

?>
