<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$computer = $_POST['computer'];
$moral = $_POST['moral'];
$gen_aw = $_POST['gen_aw'];
$sess = $_SESSION['session'];



mysqli_query($con,"update other_sub set computer='$computer',moral='$moral',gen_aw='$gen_aw'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
