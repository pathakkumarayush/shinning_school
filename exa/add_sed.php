<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];

$confidant = $_POST['confidant'];
$polite = $_POST['polite'];
$reponsible = $_POST['reponsible'];

$decipline = $_POST['decipline'];
$regular = $_POST['regular'];
$appe = $_POST['appe'];
$sans = $_POST['sans'];
$sans1 = $_POST['sans1'];
$sans2= $_POST['sans2'];
$sans3 = $_POST['sans3'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into social_emo(student,class,exam,session,confidant,polite,reponsible,decipline,regular,appe,sans,sans1,sans2,sans3)
values('$idm','$cls','$exam','$sess','$confidant','$polite','$reponsible','$decipline','$regular','$appe','$sans','$sans1','$sans2','$sans3')");

?>
