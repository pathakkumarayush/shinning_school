<?php session_start(); 
require_once("../db.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Id Cards</title>
</head>
<body>
<?php
$search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and status='0' and transport_status='Active' and bus='Yes' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{
?>

<div style="width:640PX; height:175px; float:left; margin-top:30px; margin-left:15px;text-transform: uppercase; border:1PX #FF9900 solid;">
	
	 <div style="float:left;width:315px;">
	
	 <div style="width:100%;">
     <img src="idcd.png" style="width:280px; height:45px;margin-left:15px; margin-top:2px; ">
	 </div>
	 
	 <div style="width:100%; height:2px; background-color:#FF9900">
	 </div>
     
	 <div style="width:100%;">
	   
	   <div style="float:left; width:76%;height:104px;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:10px; height:100px; font-weight:bold;margin-left:4px;" class="tab"> 
	 
	  <tr><td colspan="3" align="center" style="font-weight:bold;color:#CC0033; font-size:16px;">Bus Pass </td> </tr>
	  <tr><td style="width:90px;">Student's Name </td> <td style="color:#0f2187;font-weight:bold; font-size:11px;">: <?php echo $rowstud["student_name"]; ?></td></tr>
	  <tr><td>Father's Name </td> <td>: <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>Class & Sec.</td> <td>: <?php echo $rowstud["student_class"]; ?></td></tr>
	  <tr><td>Bus Stop </td> <td>: <?php echo $rowstud["transport_stopage"]; ?></td></tr>
	 
	 
	  
	  	   </table>
	   </div>
	   
	   <div style="float:left; width:23%; height:104px;  font-size:13px; margin-left:2px; font-weight:bold;">
	  <span style="font-size:10px; margin-left:2px; color:#FF0000;">SES.:2024-2025</span><br clear="all">
	
	 <?php
	 $abc = $rowstud['student_img']; 
     $abid = $rowstud['student_id']; 
$img = str_replace($abid,"",$abc);
?>
	 
	  <img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:70px; margin-left:7px; width:58px; margin-top:0px;border-radius:8px; position:absolute;" />
	  <img src="ps.png" style="position:absolute; width:45px; height:23px; margin-top:70px; margin-left:20px;" />
      </div>
	  
	   
	   
	   </div>
	 <br clear="all" />
     <div style=" width:315PX; background-color: #FF6600;height:17px; margin-top:4px;">
	 
	  <span style="color:#FFFFFF; margin-left:10px;">School Cont. -  7987929359, 9399061706</span>
	 
	  </div>
	  
	  </div>
	  
	 <div style="float:left;width:315px;">
	 <div style="width:315PX; height:175px; float:left; margin-left:20px;text-transform: uppercase;">
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
	  
	 </div>
	</div>



    <?php /*?><div style="width:315PX; height:175px; float:left; margin-top:25px; margin-left:15px;text-transform: uppercase; border:1PX #FF9900 solid;">
	 <div style="width:100%;">
     <img src="idcd.png" style="width:280px; height:45px;margin-left:15px; margin-top:2px; ">
	 </div>
	 
	 <div style="width:100%; height:2px; background-color:#FF9900">
	 </div>
     
	   <div style="width:100%;">
	   
	   <div style="float:left; width:76%;height:104px;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:10px; height:100px; font-weight:bold;margin-left:4px;" class="tab"> 
	 
	  <tr><td colspan="3" align="center" style="font-weight:bold;color:#CC0033; font-size:16px;">Bus Pass </td> </tr>
	  <tr><td style="width:90px;">Student's Name </td> <td style="color:#0f2187;font-weight:bold; font-size:11px;">: <?php echo $rowstud["student_name"]; ?></td></tr>
	  <tr><td>Father's Name </td> <td>: <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>Class & Sec.</td> <td>: <?php echo $rowstud["student_class"]; ?></td></tr>
	  <tr><td>Bus Stop </td> <td>: <?php echo $rowstud["transport_stopage"]; ?></td></tr>
	 
	 
	  
	  	   </table>
	   </div>
	   
	   <div style="float:left; width:23%; height:104px;  font-size:13px; margin-left:2px; font-weight:bold;">
	  <span style="font-size:10px; margin-left:2px; color:#FF0000;">SES.:2024-2025</span><br clear="all">
	
	 <?php
	 $abc = $rowstud['student_img']; 
     $abid = $rowstud['student_id']; 
$img = str_replace($abid,"",$abc);
?>
	 
	  <img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:70px; margin-left:7px; width:58px; margin-top:0px;border-radius:8px; position:absolute;" />
	  <img src="ps.png" style="position:absolute; width:45px; height:23px; margin-top:70px; margin-left:20px;" />
      </div>
	  
	   
	   
	   </div>
	   <br clear="all" />
      <div style=" width:315PX; background-color: #FF6600;height:17px; margin-top:4px;">
	 
	  <span style="color:#FFFFFF; margin-left:10px;">School Cont. -  7987929359, 9399061706</span>
	 
	  </div>
</div><?php */?>

<?php
}
?>
</body>
</html>