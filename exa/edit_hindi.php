<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$vaca = $_POST['vaca'];
$con = $_POST['con'];
$reada = $_POST['reada'];
$lettersa = $_POST['lettersa'];
$formationa = $_POST['formationa'];
$wwas = $_POST['wwas'];
$sess = $_SESSION['session'];

mysqli_query($con,"update hindi_english_n set vaca='$vaca',con='$con',reada='$reada',lettersa='$lettersa',formationa='$formationa',wwas='$wwas'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and subject='".$_POST['subject']."' and session='".$sess."'");

?>
