<?php
include('db.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "DELETE FROM other_marks WHERE id='$id'";
 mysqli_query($con, $sql);
}

?>