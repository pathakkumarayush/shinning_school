<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
</style>
<style type="text/css">
.tb5 {
	border:1px solid #456879;
	border-radius:10px;
	height: 22px;
	width: 230px;
	background:#EFEFEF;
}
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
</style>
<?php
session_start();
/*
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db("campusinfo",$con);
*/
require_once("../db.php");
//$_SESSION['hostelid']=$_GET['id'];
$st="Available";
$exa=mysqli_query($con,"select * from add_rooms where school='".$_SESSION["uid"]."' and hostel_id='".$_GET['id']."' and status='$st'");

  ?>

<select name="room">
<?php
while($hostel=mysqli_fetch_array($exa))
{
?>
<option value="<?php echo $hostel['room_id'];  ?>"><?php echo $hostel['room_no'];  ?></option>
<?php
}
?>

</select>


