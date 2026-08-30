<?php
session_start();
if($_GET["q"])
{
$_SESSION['q']=$_GET["q"];
}
else if($_GET["r"])
{
$_SESSION['r']=$_GET["r"];
}
//require_once("../db.php");

else if($_GET["s"])
{
$_SESSION['s']="";
$_SESSION['s']=$_GET["s"];
}

		    
			
			
			?>