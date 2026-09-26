<?php
require_once("../db.php");
$_POST["student_id"];
$exa=mysqli_query($con,"select * from fee_detail_trans where student='".$_POST["student_id"]."'");

$stdr=mysqli_query($con,"select * from student where student_id='".$_POST["student_id"]."'");
$showr=mysqli_fetch_array($stdr);
?>
<div>
<table style="width:82%; margin-left:50px; margin-top:8px; color:#FFFFFF; font-size:14px">
<tr>
<td style="font-weight:bold;">Student Name</td>
<td><?php echo $showr['student_name'];  ?> </td>
<td style="font-weight:bold;">Student Father</td>
<td><?php echo $showr['student_fname'];  ?></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td style="font-weight:bold;">Student Class</td>
<td><?php echo $cls = $showr['student_class'];  ?></td>
<td style="font-weight:bold;">Student Mobile</td>
<td><?php echo $showr['student_contactno'];  ?></td>
</tr>
</table>
</div>
<br />
<h2 style="margin-left:50px; color:rgb(24, 236, 93); font-weight:bold;">Payment Details</h2>
                   
<table style="margin-left:50px; width:75%; font-size:12px; font-weight:bold;color:#FFFFFF">


<?php
while($hostel=mysqli_fetch_array($exa))
{
$class = $hostel["class"]; 
$tot = $hostel["fee_deposit"]; 
$val4+=$tot;
$con = $hostel["concession"];
$tcon+=$con;

$fine = $hostel["latefee"];
$tfine+=$fine;

?>
<?php
}
?>
<tr style="height:40px; font-size:12px">
<td style="color:#CCCC33">Total Amount</td>
<td>
<?php
$total=mysqli_query($con,"select * from stopage where stop_name='".$showr['transport_stopage']."'");
$tamt=mysqli_fetch_array($total);
echo $tt = $tamt['amnt'];
?> </td>
<td style="color:#CCCC33">&nbsp;&nbsp;Total Amount Pay</td>
<td>
<?php 
if($val4=='')
{
echo '0';
}else
{
echo  $val4;
}
 ?>
</td>
<td style="color:#CCCC33">&nbsp;&nbsp;Balance Amount</td>
<td>
<?php 
echo  $tt-$val4-$tcon-$tfine;
 ?>
</td>
</tr>
<tr><td style="color:#CCCC33">Concession </td><td><?php echo $tcon; ?></td><td style="color:#CCCC33">Fine (Late Fee) </td><td><?php echo $tfine; ?></td></tr>
</table>
				 
				  <div style="border:#CCCCCC 2px solid; margin:20px 0px 0px 50px; height:200px; width:550px;overflow:scroll;">
                  <?php
		          $shkstd=mysqli_query($con,"select * from fee_detail_trans where student='".$_POST["student_id"]."'");
		          if(mysqli_num_rows($shkstd)>0)
				  {
				  while($row=mysqli_fetch_array($shkstd))
				  {
		          ?>
		          <div style="width:auto; height:auto; border:#CCCCCC 2px solid; margin:10px 0px 0px 10px; float:left; height:65px; width:500px;">
				  <br>
				  <span style="color:#fff; font-size:18px; margin-left:50px; margin-top:10px;"><?php echo ucwords($row['instalment']); ?></span><br><br>
				  <span style=" color:#990066;font-size:18px; background-color:#00FF00">Total Amount:<?php echo $row['tamnt']; ?></span>
				  <span style=" color:#990066;font-size:18px; background-color:#00FF00">Paid:<?php echo $row['fee_deposit']; ?></span>&nbsp;
				  <span style="color:#FFFFFF;font-size:18px; background-color:#FF0000">Due:<?php echo $row['due']; ?></span>
				  </div> 
				 
		          <?php
				  }
				  ?>
		          <?php
		          }
				  ?>
				   </div>
				   <br />
	        <a href="./?pageid=add_header" style="color:#FFFFFF; margin-left:50px; margin-top:5px; text-decoration:none; padding:5px; font-weight:bold; background-color:#CCCC00">Add Instalment</a>			   