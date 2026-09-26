<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];

$computer = $_POST['computer'];
$moral = $_POST['moral'];
$gen_aw = $_POST['gen_aw'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into other_sub(student,class,exam,session,computer,moral,gen_aw)
values('$idm','$cls','$exam','$sess','$computer','$moral','$gen_aw')");

?>
