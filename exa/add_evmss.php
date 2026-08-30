<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$act_project = $_POST['act_project'];
$dicussion = $_POST['dicussion'];
$sess = $_SESSION['session'];

$query = mysqli_query($con,"insert into evms(student,class,exam,session,act_project,dicussion)
values('$idm','$cls','$exam','$sess','$act_project','$dicussion')");

?>
