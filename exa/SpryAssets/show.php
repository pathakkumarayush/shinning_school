<?php

session_start();
require_once("../db.php");
require_once("myfunction.php");
$id=$_GET['id'];
$rem=$_GET['q'];
$sch=$_GET['sch'];
$name=$_GET['name'];
$query= mysqli_query($con,"insert into homework(class,assign_by,subject,stdid,remark,school,datefrom,dateto) values('".$_SESSION['sub']."','".$_SESSION['ass']."','".$_SESSION['subject']."','$id','$rem','$sch','".$_SESSION['datefrom']."','".$_SESSION['dateto']."')");
$student=mysqli_query($con,"SELECT * FROM `student` WHERE uid='$id'");
$row=mysqli_fetch_array($student);
$msg=$row['student_name']." "."homework"." ".$_SESSION['subject'].$_SESSION['datefrom']."to".$_SESSION['dateto']."Remark for last Homework is".$rem; 
$r=sms($sch,$id,"Homework",$msg,'Yes');
?>
<script type="text/javascript">
window.location="http://localhost/campusinfo/teacher/?pageid=homeworkadd1";
</script>