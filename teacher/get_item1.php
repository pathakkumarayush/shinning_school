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
<table>
<tr>
  <td><b>Sr.No</b></td>
 <td><b>Item</b></td>
<td><b>Quantity</b></td>
</tr>
<?php
$i=1;
while($row_item=mysqli_fetch_array($get_item))
{
?>
<tr>
<td><?php echo $i;  ?></td>
<td><?php echo ucwords($row_item['item']); ?></td>
<td><input type="text" name="item[<?php echo $row_item['item'];  ?>]" class="tb5" style="width:80px" ></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<?php
$i++;
}
?>
</table>