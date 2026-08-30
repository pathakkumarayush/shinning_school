<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$act = $_POST['act'];
$worke = $_POST['worke'];
$arts = $_POST['arts'];
$sport = $_POST['sport'];
$ncc = $_POST['ncc'];
$phye = $_POST['phye'];
$sess = $_SESSION['session'];
/*mysqli_query($con,"insert into discipline1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','2018-2019')");*/

mysqli_query($con,"update co_scholastic set act='$act',worke='$worke',arts='$arts',sport='$sport',phye='$phye',ncc='$ncc'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
