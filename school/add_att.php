<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$sess = $_SESSION['session'];

/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into att(student,class,exam,session,s1,s2)values('$idm','$cls','$exam','$sess','$s1','$s2')");

?>
