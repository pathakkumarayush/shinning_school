<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$act = $_POST['act'];
$worke = $_POST['worke'];
$arts = $_POST['arts'];
$phye = $_POST['phye'];
$sport = $_POST['sport'];
$ncc = $_POST['ncc'];
$sess = $_SESSION['session'];
/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into co_scholastic(student,class,exam,session,act,worke,arts,phye,sport,ncc)
values('$idm','$cls','$exam','$sess','$act','$worke','$arts','$phye','$sport','$ncc')");

?>
