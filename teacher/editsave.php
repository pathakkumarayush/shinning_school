<?php
$bno=$_POST["bno"];
$title=$_POST["title"];
$aut=$_POST["aut"];
$tag=$_POST["tag"];
$cst=$_POST["cst"];
$noc=$_POST["noc"];





require_once("../db.php");
$qry="update addbook set title='$title', authore='$aut', tags='$tag',customtag='$cst',noofcopies='$noc' where bookno='$bno'  ";
mysqli_query($con,$qry);
mysqli_close($con);
header("location:view.php?bookno=$bno");

?>