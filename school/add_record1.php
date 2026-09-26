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
mysqli_query($con,"insert into other_marks1(student,class,exam,art,music,dance,game,moral,gk,session)
values('$idm','$cls','$exam','$art','$music','$dance','$game','$moral','$gk','2019-2020')");
?>
