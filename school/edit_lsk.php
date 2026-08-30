<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$act_project = $_POST['act_project'];
$dicussion = $_POST['dicussion'];
$sess = $_SESSION['session'];


mysqli_query($con,"update lang_skill set act_project='$act_project',dicussion='$dicussion'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and subject='".$_POST['subject']."' and session='".$sess."'");

?>
