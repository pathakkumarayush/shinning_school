<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$regularity = $_POST['regularity'];
$sincerity = $_POST['sincerity'];
$beha = $_POST['beha'];
$rrr = $_POST['rrr'];
$att = $_POST['att'];
$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];

mysqli_query($con,"insert into discipline1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','2018-2019')");

mysqli_query($con,"update discipline1 set regularity='$regularity',sincerity='$sincerity',beha='$beha',rrr='$rrr',att='$att',atsm='$atsm',ats='$ats',atn='$atn'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."'");

?>
