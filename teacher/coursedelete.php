<?php
$var="http://localhost/manorama/school/?pageid=";
$crs=$_GET["crs"];

require_once("../db.php");
$qry="delete from courses where crs='$crs' ";
mysqli_query($con,$qry);


?>
<script>alert('Delete Successfully ');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."book_setting";  ?>";
	 </script>   