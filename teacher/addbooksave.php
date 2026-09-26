<?php

$title=$_POST["title"];
$authore=$_POST["aut"];
$doa=$_POST["doa"];
$cst=$_POST["cst"];
$noc=$_POST["noc"];
$tag=implode(",",$_POST["checkbox"]);
$ses=$_SESSION['session'];
session_start();
require_once("../db.php");
$i=$noc;

$bno=$_POST["bno"][$i];
for($i=$noc;$i>0;$i--)
{
$qry="insert into addbook(title,authore,tags,session,status,dateofarrival,customtag,noofcopies)values('$title','$authore','$tag','$ses','0','$doa','$cst','$noc')";

mysqli_query($con,$qry);

}

header("location:managebook.php?record='inserted'");


?>
