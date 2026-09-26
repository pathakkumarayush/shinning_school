
<?php
session_start();
$_SESSION['q']=$_GET["q"];
require_once("../db.php");
?>
