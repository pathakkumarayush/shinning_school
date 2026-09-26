<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$confidant = $_POST['confidant'];
$polite = $_POST['polite'];
$reponsible = $_POST['reponsible'];
$decipline = $_POST['decipline'];

$sess = $_SESSION['session'];

$query = mysqli_query($con,"insert into inte_dev(student,class,exam,session,confidant,polite,reponsible,decipline)
values('$idm','$cls','$exam','$sess','$confidant','$polite','$reponsible','$decipline')");

?>
