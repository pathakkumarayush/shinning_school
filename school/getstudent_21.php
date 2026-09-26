
<?php
session_start();
require_once("../db.php");
if(!empty($_GET["id"]))
{
  	 $class=mysqli_query($con,"select * from class where class_id='".$_GET['id']."' and school='".$_SESSION['uid']."'");
	$rowclass=mysqli_fetch_array($class);
	 $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' order by student_name Asc");
  
}
?>
<select name="stdid" class="select" style="width:160px">
<option>Select Student</option>
<?php
  while($row=mysqli_fetch_array($search))
  {
  ?>
  <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name']; ?>--<?php echo $row['student_fname']; ?></option>  
  <?php
  }
?>

</select>