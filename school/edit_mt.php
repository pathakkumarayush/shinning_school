<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$activity = $_POST['activity'];
$concept = $_POST['concept'];
$mental_ab = $_POST['mental_ab'];
$numberation = $_POST['numberation'];
$sess = $_SESSION['session'];


mysqli_query($con,"update maths set activity='$activity',concept='$concept',mental_ab='$mental_ab',numberation='$numberation'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
