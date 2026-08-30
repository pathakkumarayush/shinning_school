<?php
session_start();
require_once("../db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require_once("meta.php");
?>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">Smart Erp</a></h1>
			<div id="top-navigation">
				Welcome <strong><?php echo $_SESSION['uid']; ?></strong>
				<span>|</span>
				
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
				<a href="logout.php">Log out</a>
			</div>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<?php
		 require_once("includes/menu.php");
		?>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<?php
   $var="http://localhost/smarterp/?pageid=";
	if(isset($_GET["pageid"]))
	{
		$page=$_GET["pageid"];
		include $page.".php";
	}
	else
	{
		include "libhome10.php";
	}
?>
<!-- End Container -->

<!-- Footer -->
<?php
require_once("includes/footer.php");
?>
<!-- End Footer -->
	
</body>
</html>