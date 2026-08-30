<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$udise = $_POST['udise'];
$edu = $_POST['edu'];
$sess = $_SESSION['session'];

/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into udise_portel(student,class,session,udise,edu)values('$idm','$cls','$sess','$udise','$edu')");

?>
