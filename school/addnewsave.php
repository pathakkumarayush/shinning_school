<?php
$crs=$_POST["crs"];
$cat=$_POST["cat"];
$nob=$_POST["nob"];
$prd=$_POST["prd"];

require_once("../db.php");

$qry= "insert into courses( crs , cat , nob , prd )values('$crs','$cat','$nob','$prd') ";

mysqli_query($con,$qry);

header("location:addnew.php?book='save'");

?>