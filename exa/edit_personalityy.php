<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];

$music = $_POST['music'];
$arts = $_POST['arts'];
$sport = $_POST['sport'];
$discipline = $_POST['discipline'];
$sess = $_SESSION['session'];
/*mysqli_query($con,"insert into discipline1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','2018-2019')");*/

mysqli_query($con,"update co_scholastic set music='$music',arts='$arts',sport='$sport',discipline='$discipline'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
