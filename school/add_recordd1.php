<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$regularity = $_POST['regularity'];
$sincerity = $_POST['sincerity'];
$beha = $_POST['beha'];
$rrr = $_POST['rrr'];
$att = $_POST['att'];
$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];
$sess = $_SESSION['session'];
mysqli_query($con,"insert into discipline1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','$sess')");
?>
