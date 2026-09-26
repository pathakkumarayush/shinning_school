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
$get_item=mysqli_query($con,"select * from additem where store='".$_GET["id"]."'");
?>
<select name="item" class="select">
<option>Select Item</option>
<?php
while($row_item=mysqli_fetch_array($get_item))
{
?>
<option value="<?php echo $row_item['id'];   ?>"><?php echo $row_item['item']."&nbsp;"."Quantity Available :".$row_item['quantity']; ?></option>
<?php
}
?>
</select>


