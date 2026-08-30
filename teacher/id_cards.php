<style>
.tab tr{ line-height:18px;}
</style>    
      
     <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	  $search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and student_session='".$_GET['ses']."' and status='0' order by student_name Asc");
	  while($rowstud=mysqli_fetch_array($search))
	  {
	   $searchs=mysqli_query($con,"select * from health where student='".$rowstud['student_id']."'");
	   $studrows=mysqli_fetch_array($searchs);
	  ?>	
      <div style="width:29%; height:322px; float:left; margin-top:17px; margin-left:20px; border:1px #006600 solid;">
	  <div style="width:100%; height:38px; border-bottom:2px #006600 solid;">
      <img src="d.png" style="width:200px; height:38px;margin-left:0px; margin-top:0px; ">
	  </div>
	  
	  <div style="width:100%;">
	 
	  <div style="float:left; width:3%; font-size:13px; font-weight:bold;">
	  <br />
	   <span style="color:#0e7ad1; margin-left:10px;">House</span><br />
	  <span style=" margin-left:2px;"><?php echo $rowstud["hname"]; ?></span>
	  </div>
	  
	  <div style="float:left; width:66%;">
	  <img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:75px; margin-left:63px; width:60px; margin-top:0px;border-radius:5px; " />
	  </div>
	  
	  <div style="float:left;width:27%;font-size:13px; font-weight:bold;">
	  <br />
	  <span style="color:#0e7ad1; margin-left:4px;">Adm. No</span><br />
	  <span style="margin-left:2px;"><?php echo $rowstud["student_scholar"]; ?></span>
	  </div>
	  <br clear="all" />
	  </div>
	   <div style="width:100%; height:23px; background-color:#1B8B3D">
	   <span style="margin-left:50px; color:#FFFFFF; margin-top:3px; position:absolute; font-size:15px; font-weight:bold;"><center><?php echo $rowstud["student_name"]; ?></center></span>
	   </div>
	  
	  
	  <div style="width:97%; height:103px; margin-top:3px;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:12px; font-weight:bold; margin-left:4px;" class="tab"> 
	  <tr><td style="width:70px;color:#0e7ad1;">Class </td>  <td>: <?php echo $rowstud["student_class"]; ?></td></tr>
	  <tr><td style="color:#0e7ad1;">Date of Birth </td> <td>: <?php echo $rowstud["student_dob"]; ?></td></tr>
	  <tr><td style="color:#0e7ad1;">Father Name </td> <td>: <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td style="color:#0e7ad1;">Blood Gr. </td> <td>: <?php
	  
if($studrows['bg']=='A P')
{
$bgs = 'A+';
}
if($studrows['bg']=='A N')
{
$bgs = 'A-';
}
if($studrows['bg']=='B P')
{
$bgs = 'B+';
}
if($studrows['bg']=='B N')
{
$bgs = 'B-';
}

if($studrows['bg']=='AB P')
{
$bgs = 'AB+';
}
if($studrows['bg']=='AB N')
{
$bgs = 'AB-';
}
if($studrows['bg']=='O P')
{
$bgs = 'O+';
}
if($studrows['bg']=='O N')
{
$bgs = 'O-';
}
if($studrows['bg']=='')
{
$bgs = '';
}
echo $bgs;
?>

	  
	 </td></tr>
	  <tr><td style="color:#0e7ad1;">Mobile </td> <td>: <?php echo $rowstud["student_contactno"]; ?></td></tr>
	
	  </table>
	  </div>
	  
	  <div style="width:100%; background-color:#1B8B3D;height:78px;">
	  <span style="font-size:13px; font-weight:bold;color:#FFFFFF; margin-left:3px;">NH-24, Opp. U.S Foods, Gajraula</span><br>
	  <span style="font-size:13px; font-weight:bold;color:#FFFFFF; margin-left:3px;">Distt. Amroha - 244235</span><br>
	  <span style="font-size:13px; font-weight:bold;color:#FFFFFF; margin-left:3px;">Website: www.shininggajraula.com</span><br>
	
	  <span style="font-size:13px; font-weight:bold;color:#FFFFFF; margin-left:3px;">Contact: 9457609644</span><br>
	  <span style="font-size:13px; font-weight:bold;color:#FFFFFF; margin-left:3px;">Transport Mode: </span>
	  </div>
	  <br clear="all" />
	  </div>
      <?php
      $i++;
	  }
      ?>
     
	 
	 
	