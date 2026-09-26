<?php
include('db.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "DELETE FROM discipline1 WHERE id='$id'";
 mysqli_query($con, $sql);
}

?>