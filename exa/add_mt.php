<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$activity = $_POST['activity'];
$concept = $_POST['concept'];
$mental_ab = $_POST['mental_ab'];
$numberation = $_POST['numberation'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into maths(student,class,exam,session,subject,activity,concept,mental_ab,numberation)
values('$idm','$cls','$exam','$sess','$subject','$activity','$concept','$mental_ab','$numberation')");

?>
