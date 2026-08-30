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
$regular = $_POST['regular'];
$appe = $_POST['appe'];


$sess = $_SESSION['session'];



mysqli_query($con,"update num_book set confidant='$confidant',polite='$polite',reponsible='$reponsible',decipline='$decipline',regular='$regular',appe='$appe'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
