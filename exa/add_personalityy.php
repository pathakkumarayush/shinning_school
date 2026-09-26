<?php 
session_start();
include('db.php');
$cls = $_POST['cls'];
$idm = $_POST['idm'];
$exam = $_POST['exam'];
$gen_aw = $_POST['gen_aw'];
$music = $_POST['music'];
$arts = $_POST['arts'];
$sport = $_POST['sport'];
$discipline = $_POST['discipline'];
$sess = $_SESSION['session'];

$query = mysqli_query($con,"insert into co_scholastic(student,class,exam,session,music,arts,sport,discipline)
values('$idm','$cls','$exam','$sess','$music','$arts','$sport','$discipline')");

?>
