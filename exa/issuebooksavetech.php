<?php
$var="https://smarterponline.com/shining/school/?pageid=";
$bno=$_POST["bno"];
$title=$_POST["title"];
$class=$_POST["class"];
$sid=$_POST["scholarno1"];
$doe=$_POST["doe"];
$due=$_POST["due"];
require_once("../db.php");
$qry3=mysqli_query($con,"select * from variables where id='1'");
$row3=mysqli_fetch_array($qry3);
$limit=$row3["book_limit"];
$result = mysqli_query($con,"select count(tech_id) FROM issue_tech where tech_id='$sid'");
$row = mysqli_fetch_array($result);
$total = $row[0];
$qry2=mysqli_query($con,"select * from teacher where teacher_id='$sid'");
$row2=mysqli_fetch_array($qry2);
$nm=$row2["teacher_name"];
if($total<$limit)
{
$qry="INSERT INTO  `issue_tech` (`bookno` ,`title`,`tech_name` ,`tech_id` ,`issuedate` ,`duedate`)values('$bno','$title','$nm','$sid','$doe','$due')";
mysqli_query($con,$qry);
$qry1="update addbook set status='1' where bookno='$bno'";
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

