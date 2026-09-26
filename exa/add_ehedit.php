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


mysqli_query($con,"update eng_hindi set recitation='$recitation',sppling='$sppling',grammer='$grammer',s_cons='$s_cons',writting='$writting',text_w='$text_w',expression='$expression',pronounce='$pronounce',vocab='$vocab',hand='$hand' where student='".$_POST["idm"]."' and class='".$_POST["cls"]."' and exam='".$_POST['exam']."' and subject='".$_POST['subject']."'");

?>
