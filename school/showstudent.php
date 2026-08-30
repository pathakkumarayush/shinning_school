<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 4px;
}
</style>
<?php
session_start();
require_once("../db.php");

$class1=mysqli_query($con,"select * from class where class_id='".$_GET['q']."' and school='".$_SESSION['uid']."'");
$row_class=mysqli_fetch_array($class1);
if(empty($row_class['class_section']))
{
  	 $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and status='0' and student_class='".$row_class['class']."'  order by student_name Asc");
}
else
  {
    $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and status='0' and student_class='".$row_class['class']."' and student_section='".$row_class['class_section']."' order by student_name Asc");
  }

?>
<select name="scholarno1" class="select" style="width:215px" onchange="getval(this.value)">
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