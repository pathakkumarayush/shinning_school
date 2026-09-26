<?php 
session_start();
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
$con = $_POST['con'];
$sess = $_SESSION['session'];

mysqli_query($con,"insert into other_marks(student,class,exam,art,music,dance,game,moral,gk,con,session)
values('$idm','$cls','$exam','$art','$music','$dance','$game','$moral','$gk','$con','$sess')");
?>
