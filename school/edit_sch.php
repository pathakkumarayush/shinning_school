<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$doa = $_POST['doa'];
$dop = $_POST['dop'];
$w_day = $_POST['w_day'];
$p_day = $_POST['p_day'];
$ts_class = $_POST['ts_class'];
$ss_exam = $_POST['ss_exam'];
$pcha = $_POST['pcha'];

$sess = $_SESSION['session'];

/*mysqli_query($con,"insert into ailment1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','2018-2019')");*/

mysqli_query($con,"update sch_reg set doa='$doa',dop='$dop',w_day='$w_day',p_day='$p_day',ts_class='$ts_class',ss_exam='$ss_exam',pcha='$pcha'
where sid='".$_POST["idm"]."' and class='".$_POST["cls"]."' and ses='".$sess."'");

?>
