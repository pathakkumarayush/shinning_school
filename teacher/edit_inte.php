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



mysqli_query($con,"update inte_dev set confidant='$confidant',polite='$polite',reponsible='$reponsible',decipline='$decipline'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
