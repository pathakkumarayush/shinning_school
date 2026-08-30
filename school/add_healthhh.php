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

$s1 = $_POST['s1'];
$s2 = $_POST['s2'];
$s3 = $_POST['s3'];
$s4 = $_POST['s4'];
$s5 = $_POST['s5'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into healthhh(student,class,exam,session,height,weight,vision,bio,math,s1,s2,s3,s4,s5)
values('$idm','$cls','$exam','$sess','$height','$weight','$vision','$bio','$math','$s1','$s2','$s3','$s4','$s5')");

?>
