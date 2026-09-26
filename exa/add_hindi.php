<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$vaca = $_POST['vaca'];
$con = $_POST['con'];
$reada = $_POST['reada'];
$lettersa = $_POST['lettersa'];
$formationa = $_POST['formationa'];
$wwas = $_POST['wwas'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into hindi_english_n(student,class,exam,subject,session,vaca,con,reada,lettersa,formationa,wwas)
values('$idm','$cls','$exam','$subject','$sess','$vaca','$con','$reada','$lettersa','$formationa','$wwas')");

?>
