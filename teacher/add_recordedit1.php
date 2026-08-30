<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$art = $_POST['art'];
$music = $_POST['music'];
$dance = $_POST['dance'];
$game = $_POST['game'];
$moral = $_POST['moral'];
$gk = $_POST['gk'];

mysqli_query($con,"update other_marks1 set art='$art',music='$music',dance='$dance',game='$game',moral='$moral',gk='$gk' where student='".$_POST["idm"]."' and 
class='".$_POST["cls"]."' and exam='".$_POST['exam']."'");

//mysqli_query($con,"insert into other_marks(student,class,exam,art,music,dance,game,moral,gk,con,session)
//values('$idm','$cls','$exam','$art','$music','$dance','$game','$moral','$gk','$con','2018-2019')");
?>
