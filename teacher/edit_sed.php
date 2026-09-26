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
$sans = $_POST['sans'];
$sans1 = $_POST['sans1'];
$sans2= $_POST['sans2'];
$sans3 = $_POST['sans3'];
$sess = $_SESSION['session'];


mysqli_query($con,"update social_emo set confidant='$confidant',polite='$polite',reponsible='$reponsible',decipline='$decipline',regular='$regular',appe='$appe',sans='$sans',sans1='$sans1',sans2='$sans2',sans3='$sans3'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
