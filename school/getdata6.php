<?php
session_start();
 if(!empty($_GET["t"]))
{
$_SESSION['t']="";
$_SESSION['t']=$_GET["t"];
}
?>