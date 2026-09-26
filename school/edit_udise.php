<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$udise = $_POST['udise'];
$edu = $_POST['edu'];
$sess = $_SESSION['session'];

/*mysqli_query($con,"insert into ailment1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','2018-2019')");*/

mysqli_query($con,"update udise_portel set udise='$udise',edu='$edu' where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and session='".$sess."'");

?>
