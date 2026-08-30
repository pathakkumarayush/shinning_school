<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$vision = $_POST['vision'];
$bio = $_POST['bio'];
$math = $_POST['math'];
$sess = $_SESSION['session'];

/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into healthh(student,class,exam,session,height,weight,vision,bio,math)
values('$idm','$cls','$exam','$sess','$height','$weight','$vision','$bio','$math')");

?>
