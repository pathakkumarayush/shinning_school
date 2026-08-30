<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$act_project = $_POST['act_project'];
$dicussion = $_POST['dicussion'];
$sess = $_SESSION['session'];


mysqli_query($con,"update evms set act_project='$act_project',dicussion='$dicussion'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and session='".$sess."'");

?>
