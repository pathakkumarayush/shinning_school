<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$subject = $_POST['subject'];
$act_project = $_POST['act_project'];
$dicussion = $_POST['dicussion'];
$illutration = $_POST['illutration'];
$text_w = $_POST['text_w'];
$sess = $_SESSION['session'];


mysqli_query($con,"update evms set act_project='$act_project',dicussion='$dicussion',text_w='$text_w',illutration='$illutration'
where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."'  and session='".$sess."'");

?>
