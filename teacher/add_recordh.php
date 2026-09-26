<?php
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$attend = $_POST['attend'];
$exam = $_POST['exam'];
$sess = $_SESSION['session'];

mysqli_query($con,"insert into att_helth1(student,class,height,session,exam,weight,attend)values('$idm','$cls','$height','$sess','$exam','$weight','$attend')");
?>
