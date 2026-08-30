<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
</style>
<?php
session_start();

require_once("../db.php");

/*
$con = mysqli_connect("localhost","campus","root123");
$db = mysqli_select_db("btm",$con);
*/

if(!empty($_GET["id"]))
{
  	 $class=mysqli_query($con,"select * from class where class_id='".$_GET['id']."' and school='".$_SESSION['uid']."'");
	$rowclass=mysqli_fetch_array($class);
	 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and hostel_status='Active' order by student_name Asc");
  
}
?>
<select name="stdid" class="select" style="width:125px">
<option>Select Student</option>
<?php
  while($row=mysqli_fetch_array($search))
  {
  ?>
  <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name']; ?></option>  
  <?php
  }
?>
</select>

