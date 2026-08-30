<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$vision = $_POST['vision'];
$exam = $_POST['exam'];

mysqli_query($con,"insert into health_status1(student,class,height,weight,vision,session,exam)values('$idm','$cls','$height','$weight','$vision','2019-2020','$exam')");
?>
