<?php session_start(); require_once("../db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Id Cards</title>
</head>
<body>
<?php
$search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and status='0' and transport_status='Active' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{

?>
    <div style="width:315PX; height:175px; float:left; margin-top:25px; margin-left:15px;text-transform: uppercase; border:1PX #FF9900 solid;">
	 
	 
	 <table cellpadding="0" cellspacing="0" border="1" align="center" style="margin-top:5px;">
	 <tr style="line-height:25px;"><td colspan="2">Fee Details</td><td colspan="2">Bus No:<?php echo $rowstud["transport_veh"]; ?></td></tr>
	 <tr style="line-height:25px;"><td>July</td><td style="width:100px;"></td><td>Aug</td><td style="width:100px;"></td></tr>
	 <tr style="line-height:25px;"><td>Sep</td><td style="width:100px;"></td><td>Oct</td><td style="width:100px;"></td></tr>
	 <tr style="line-height:25px;"><td>Nov</td><td style="width:100px;"></td><td>Dec</td><td style="width:100px;"></td></tr>
	 <tr style="line-height:25px;"><td>Jan</td><td style="width:100px;"></td><td>Feb</td><td style="width:100px;"></td></tr>
	 <tr style="line-height:25px;"><td>Mar</td><td style="width:100px;"></td><td>Apr.</td><td style="width:100px;"></td></tr>
	 </table>
	 
     
	   
	   <br clear="all" />
      
</div>
<?php
}
?>
</body>
</html>