<?php session_start(); require_once("../db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Id Cards</title>
</head>
<body>
<?php
$search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and student_session='".$_GET['ses']."' and status='0' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{
?>
    <div style="width:315PX; height:175px; float:left; margin-top:25px; margin-left:15px;text-transform: uppercase; border:1PX #8B0000 solid;">
	 <div style="width:100%;">
     <img src="lid.png" style="margin-left:7px; margin-top:2px; ">
	 </div>
	 
	 <div style="width:100%; height:1px; margin-top:1px; background-color:#8B0000">
	 </div>
     
	   <div style="width:100%;">
	   
	  <div style="float:left; width:23%; height:104px;  font-size:13px; margin-left:2px; font-weight:bold;">
	  <span style="font-size:9px; margin-left:9px; color:#FF0000;">Ses:2025-2026</span><br clear="all">
	
	 <?php
	 $abc = $rowstud['student_img']; 
     $abid = $rowstud['student_id']; 
     $img = str_replace($abid,"",$abc);
     ?>
	 
	  <img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:70px; margin-left:7px; width:58px; margin-top:0px;border-radius:8px; border:2px #FFCC99 solid;position:absolute;" />
	  <img src="psss.png" style="position:absolute; width:44px; height:28px; margin-top:74px; margin-left:20px;" />
      </div>
	  
	   <div style="float:left; width:74%;height:104px;background:url(wmn.png) no-repeat center;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:10px; height:100px; font-weight:bold;margin-left:9px;" class="tab"> 
	 
	  
	  <tr><td style="width:90px;">STUDENT'S Name </td> <td style="color:#0f2187;font-weight:bold; font-size:11px;">: <?php echo $rowstud["student_name"]; ?></td></tr>
	  <tr><td>Class & Sec.</td> <td>: <?php echo $rowstud["student_class"]; ?></td></tr>
	  <tr><td>Father's NAME </td> <td>: <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>DOB </td> <td>: <?php echo $rowstud["student_dob"]; ?></td></tr>
	  <tr><td>Contact No.</td> <td>: <?php echo $rowstud["student_contactno"]; ?></td></tr>
	  <tr><td colspan="4">RESI. Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rowstud["student_address"]; ?></td></tr>
	 
	  
	  	   </table>
	   </div>
	   
	   </div>
	   <br clear="all" />
      <div style=" width:315PX; background-color: #8B0000;height:14px; margin-top:9px;">
	 
	  <span style="font-size:12px; font-weight:bold;color:#FFFFFF; margin-left:10px;">Sagar Road, Raisen (M.P.) 9893720089,8827477441</span>
	 
	  </div>
</div>
<?php
}
?>
</body>
</html>