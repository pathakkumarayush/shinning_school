<?php 
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$subject = $_POST['subject'];
$exam = $_POST['exam'];
$reading = $_POST['reading'];
$recitation = $_POST['recitation'];
$sppling = $_POST['sppling'];
$grammer = $_POST['grammer'];
$s_cons = $_POST['s_cons'];
$writting = $_POST['writting'];
$text_w = $_POST['text_w'];
$expression = $_POST['expression'];
$pronounce = $_POST['pronounce'];
$vocab = $_POST['vocab'];
$hand = $_POST['hand'];
mysqli_query($con,"insert into eng_hindi(student,class,exam,recitation,sppling,grammer,s_cons,writting,text_w,expression,pronounce,vocab,hand,session,subject,reading)
values('$idm','$cls','$exam','$recitation','$sppling','$grammer','$s_cons','$writting','$text_w','$expression','$pronounce','$vocab','$hand','2021-2022','$subject','$reading')");
?>
