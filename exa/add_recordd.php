<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$ls = $_POST['ls'];
$exam = $_POST['exam'];
$critical = $_POST['critical'];
$decision = $_POST['decision'];
$selfa = $_POST['selfa'];
$creative = $_POST['creative'];
$prob = $_POST['prob'];
$coping = $_POST['coping'];
$emotions = $_POST['emotions'];
$rel = $_POST['rel'];
$emp = $_POST['emp'];
$comm = $_POST['comm'];
$sess = $_SESSION['session'];
mysqli_query($con,"insert into life_skills(student,class,exam,critical,decision,selfa,creative,prob,coping,emotions,rel,emp,comm,session,ls)
values('$idm','$cls','$exam','$critical','$decision','$selfa','$creative','$prob','$coping','$emotions','$rel','$emp','$comm','$sess','$ls')");
?>
