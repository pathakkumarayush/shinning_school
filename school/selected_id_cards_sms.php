<?php session_start(); require_once("../db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Id Cards</title>
</head>
<body>
<?php

$session = $_GET['ses'];
$ids = isset($_GET['ids']) ? explode(',', $_GET['ids']) : [];

// Sanitize and prepare IDs
$ids = array_map('intval', $ids); // Convert all to integers
$id_list = implode(',', $ids);   // Create comma-separated list

// Build query
$search = mysqli_query($con,"SELECT * FROM student 
    WHERE student_session = '$session' 
      AND status = '0' 
      AND id IN ($id_list) 
    ORDER BY student_name ASC");

while($rowstud=mysqli_fetch_array($search))
{
?>
    <div style="width:315PX; height:175px; float:left; margin-top:25px; margin-left:15px;text-transform: uppercase; border:1PX #c93560 solid;">
	 <div style="width:100%;">
     <img src="idsts.png" style="width:290px; height:45px;margin-left:10px; margin-top:2px; ">
	 </div>
	 
	 <div style="width:100%; height:2px; background-color:#c93560">
	 </div>
     <div style="width:100%;">
	   
	  <div style="float:left; width:23%; height:104px;  font-size:13px; margin-left:2px; font-weight:bold;">
	  <span style="font-size:9px; margin-left:2px; color:#FF0000;">Ses:<?php echo $_GET['ses'];?></span><br clear="all">
	
	 <?php
	 $abc = $rowstud['student_img']; 
     $abid = $rowstud['student_id']; 
     $img = str_replace($abid,"",$abc);
     ?>
	 
	  <img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:70px; margin-left:7px; width:58px; margin-top:0px;border-radius:8px; border:2px #c93560 solid; position:absolute;" />
	  <img src="pshh.png" style="position:absolute; width:60px; height:22px; margin-top:77px; margin-left:4px;" />
      </div>
	  
	   <div style="float:left; width:74%;height:105px;background:url(vmw.png) no-repeat center;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:10px; height:100px; font-weight:bold;margin-left:9px;" class="tab"> 
	 
	  
	  <tr><td style="width:86px;">STUDENT Name </td> <td style="color:#0f2187;font-weight:bold; font-size:11px;">: <?php echo $rowstud["student_name"]; ?></td></tr>
	  <tr><td>Class & Sec.</td> <td>: <?php echo $rowstud["student_class"]; ?></td></tr>
	  <tr><td>Father's NAME </td> <td>: <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>DOB </td> <td>: <?php echo $rowstud["student_dob"]; ?></td></tr>
	  <tr><td>Contact No.</td> <td>: <?php echo $rowstud["student_contactno"]; ?></td></tr>
	  <tr><td colspan="4">RESI. Address&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rowstud["student_address"]; ?></td></tr>
	 
	  
	  	   </table>
	   </div>
	   
	   </div>
	   <br clear="all" />
      <div style=" width:315PX; background-color: #c93560;height:16px; margin-top:5px;">
	 
	  <span style="color:#FFFFFF; margin-left:20px; font-size:14px;">Arjun Nagar, Raisen (M.P.) 9893720089</span>
	 
	  </div>
</div>
<?php
}
?>
</body>
</html>