<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$vision = $_POST['vision'];
$bg = $_POST['bg'];
$ailment = $_POST['ailment'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into health(student,class,exam,session,height,weight,vision,bg,ailment)
values('$idm','$cls','$exam','$sess','$height','$weight','$vision','$bg','$ailment')");

?>
