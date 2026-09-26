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

/*mysqli_query($con,"insert into ailment1(student,class,exam,regularity,sincerity,beha,rrr,att,atsm,ats,atn,session)
values('$idm','$cls','$exam','$regularity','$sincerity','$beha','$rrr','$att','$atsm','$ats','$atn','2018-2019')");*/

mysqli_query($con,"update healthh set height='$height',weight='$weight',vision='$vision',bio='$bio',math='$math'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
