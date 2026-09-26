<?php
$var="https://smarterponline.com/shining/school/?pageid=";
$bno=$_POST["bno"];
$title=$_POST["title"];
$class=$_POST["cl"];
$sid=$_POST["scholarno1"];
$doe=$_POST["doe"];
$due=$_POST["due"];

require_once("../db.php");
$qry3=mysqli_query($con,"select * from variables where id='1'");
$row3=mysqli_fetch_array($qry3);
$limit=$row3["book_limit"];
$result = mysqli_query($con,"select count(student_id) FROM issuebook where student_id='$sid'");
$row = mysqli_fetch_array($result);
$total = $row[0];
$qry2=mysqli_query($con,"select * from student where student_id='$sid'");
$row2=mysqli_fetch_array($qry2);
$nm=$row2["student_name"];
if($total<$limit)
{
$qry="INSERT INTO  `issuebook` (`bookno` ,`title` ,`class` ,`student_name` ,`student_id` ,`issuedate` ,`duedate`
)values('$bno','$title','$class','$nm','$sid','$doe','$due') ";
mysqli_query($con,$qry);
$qry1="update addbook set status='1' where bookno='$bno'  ";
mysqli_query($con,$qry1);
?>
<script>alert('Successfully Submit');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."issue_books";  ?>";
</script>   
<?php
}
else
{
?>
<script>alert('qutta full');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."issue_books";  ?>";
	 </script>   
<?php
}
mysqli_close($con);

?>

