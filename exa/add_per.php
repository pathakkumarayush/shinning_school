<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$confidant = $_POST['confidant'];
$polite = $_POST['polite'];
$reponsible = $_POST['reponsible'];

$decipline = $_POST['decipline'];
$regular = $_POST['regular'];
$appe = $_POST['appe'];
$sans = $_POST['sans'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into personality(student,class,exam,subject,session,confidant,polite,reponsible,decipline,regular,appe,sans)
values('$idm','$cls','$exam','$subject','$sess','$confidant','$polite','$reponsible','$decipline','$regular','$appe','$sans')");

?>
