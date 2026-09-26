<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$udise = $_POST['udise'];
$sess = $_SESSION['session'];

/*$att = $_POST['att'];*/
/*$atsm = $_POST['atsm'];
$ats = $_POST['ats'];
$atn = $_POST['atn'];*/
$query = mysqli_query($con,"insert into board_document(student,class,session,document)values('$idm','$cls','$sess','$udise')");

?>
