<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
.tb5 {
	border:1px solid #456879;
	border-radius:10px;
	height: 22px;
	width: 230px;
	background:#EFEFEF;g
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
	 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and transport_status='Active' order by student_name Asc");
  $rsearch2=mysqli_fetch_array($search);
  
  }
  ?>
<table style="font-size:14px" width="330">


<tr>
<td>Select Student</td>
<td><select name="student" class="select" >
<option>Select Student</option>
<?php
  $search1=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and transport_status='Active' order by student_name Asc");
  while($row=mysqli_fetch_array($search1))
  {
  ?>
  <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name']; ?></option>  
  <?php
  }
?>
</select></td>
</tr>   
<tr>
  <td><input type="submit" name="submit2" value="submit".</td>
</tr>			



</table>