<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$height = $_POST['height'];
$exam = $_POST['exam'];
$weight = $_POST['weight'];
$attend = $_POST['attend'];
//mysqli_query($con,"insert into health_status(student,class,height,weight,vision,session,exam)values('$idm','$cls','$height','$weight','$vision','2018-2019','$exam')");

mysqli_query($con,"update att_helth1 set height='$height',weight='$weight',attend='$attend' where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and 
exam='".$_POST['exam']."'");

?>
