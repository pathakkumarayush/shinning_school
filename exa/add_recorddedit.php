<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$ls = $_POST['ls'];
$exam = $_POST['exam'];
$critical = $_POST['critical'];
$decision = $_POST['decision'];
$selfa = $_POST['selfa'];
$creative = $_POST['creative'];
$comm = $_POST['comm'];
$prob = $_POST['prob'];
$coping = $_POST['coping'];
$emotions = $_POST['emotions'];
$rel = $_POST['rel'];
$emp = $_POST['emp'];

//mysqli_query($con,"insert into discipline(student,class,exam,critical,decision,selfa,creative,comm,prob,coping,emotions,rel,emp,session)
//values('$idm','$cls','$exam','$critical','$decision','$selfa','$creative','$comm','$prob','$coping','$emotions','$rel','$emp','2018-2019')");

mysqli_query($con,"update life_skills set critical='$critical',decision='$decision',selfa='$selfa',creative='$creative',prob='$prob',coping='$coping',emotions='$emotions',rel='$rel',emp='$emp',comm='$comm'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' ");

?>
