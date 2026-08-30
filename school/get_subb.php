<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
require_once("../db.php");
    if($_POST['id'])
    {
	echo $id=$_POST['id'];
	$stmt=mysqli_query($con,"select * from subjects where class='$id' and session='".$_SESSION["session"]."'")or die(mysqli_error());
	?>
   <option value="">--Select subject--</option>
	<?php
	 while($row=mysqli_fetch_array($stmt))
	{
	?>
    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
    <?php
	}
    }
    ?>