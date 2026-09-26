	<?php
   	$crs=$_POST["crs"];
	$cat=$_POST["cat"];
	$nob=$_POST["nob"];
	$prd=$_POST["prd"];
	
	require_once("../db.php");

     $qry=" update courses set cat='$cat' ,nob='$nob' , prd='$prd'  where crs='$crs' ";
	 mysqli_query($con,$qry);
	 mysqli_close($con);
	 header("location:courseedit.php?update='save'");
	 ?>