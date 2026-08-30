<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$act_project = $_POST['act_project'];
$dicussion = $_POST['dicussion'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into lang_skill(student,class,exam,session,subject,act_project,dicussion)
values('$idm','$cls','$exam','$sess','$subject','$act_project','$dicussion')");

?>
