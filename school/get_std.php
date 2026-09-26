<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
require_once("../db.php");
    if($_POST['id'])
    {
	echo $id=$_POST['id'];
	$stmt=mysqli_query($con,"select * from student where student_class='$id' and student_session='".$_SESSION["session"]."' and status='0' ORDER BY student_name ASC")
	or die(mysqli_error());
	?>
	<option selected="selected">Select Student</option>
	<?php
	 while($row=mysqli_fetch_array($stmt))
	{
	?>
    <option value="<?php echo $row['student_name']; ?>"><?php echo $row['student_name']; ?> - <?php echo $row['student_fname']; ?></option>
    <?php
	}
    }
    ?>