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

$query = mysqli_query($con,"insert into sch_reg(sid,class,doa,ses,dop,w_day,p_day,ts_class,ss_exam,pcha)
values('$idm','$cls','$doa','$sess','$dop','$w_day','$p_day','$ts_class','$ss_exam','$pcha')");

?>
