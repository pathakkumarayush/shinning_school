<?php session_start(); require_once("../db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Id Cards</title>
</head>
<style>
.tab tr{line-height:15px;}
</style>
<body>
<?php
$search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and student_session='".$_GET['ses']."' and status='0' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{
?>
<div style="width:46%; height:175px; float:left; margin-top:25px; margin-left:15px; border:2px #0066CC solid;">
	  <div style="width:100%;">
      <center>
	  <span style="color:#CC3300; font-size:16px; font-weight:bold;">Shining Public Hr. Sec. School,Raisen(M.P.)</span><br />
	  <span style="color:#CC3300; font-size:13px;font-weight:bold; color:#0066FF">Bus Pass - <?php echo $_GET['ses'];?></span>
	  </center>
	 </div>
     <div style="width:100%;">
	  <div style="float:left; width:75%;">
	  
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:11px; font-weight:bold; margin-top:-2px;margin-left:5px;" class="tab"> 
	 
	  
	  <tr><td>Name </td> <td>: <?php echo $rowstud["student_name"]; ?></td></tr>
	  
	  <tr><td>S/O Mr. </td> <td>: <?php echo $rowstud["student_fname"]; ?></td></tr>
	  
	  <tr><td>Class</td> <td>: <?php echo $rowstud["student_class"]; ?>,&nbsp;&nbsp; Bus No.: <?php echo $rowstud["transport_stopage"]; ?></td></tr>
	  
	 
	 
	  
	   <tr><td>Bus Stop</td> <td>: <?php echo $rowstud["transport_stopage"]; ?></td></tr>
	  	   </table>
		   
		   
		
	   </div>
	  
	  <div style="float:left; width:25%; font-size:13px; font-weight:bold;">
	 
	  <img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:78px; margin-left:10px; width:67px; margin-top:-15px;border-radius:6px; position:absolute;" />
	  
      </div>
	   
	  </div>
	   <br clear="all" />
      <div style="width:100%;margin-top:8px;">
	  
	 <table border="1" cellpadding="0" cellspacing="0" style="width:100%; font-size:11px; font-weight:bold; margin-top:-2px;margin-left:0px;" class="tab"> 
	 <tr align="center" style="color:#FF0000"><td colspan="10">Fees Detail</td></tr>
	 <tr><td>July</td><td>Aug.</td><td>Sep.</td><td>Oct</td><td>Nov.</td><td>Dec.</td><td>Jan.</td><td>Feb.</td><td>March</td><td>Apr.</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 </table>   
   
	 
	 <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:11px; font-weight:bold; margin-top:8px;margin-left:0px;" class="tab"> 
	 <tr><td style="width:215px;">Sign Of Student</td><td>Sign Of Bus Incharge</td></tr>
	 </table>
	  </div>
</div>
<?php
}
?>
</body>
</html>