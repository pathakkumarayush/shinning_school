<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$vision = $_POST['vision'];
$exam = $_POST['exam'];
$ses = $_SESSION['session'];
mysqli_query($con,"update health_status1 set height='$height',weight='$weight',vision='$vision' where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and 
exam='".$_POST['exam']."'");
?>
