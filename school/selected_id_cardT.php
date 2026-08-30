<?php
session_start();
require_once("../db.php"); 
?>
<style>
.tab tr{ line-height:30px;}
</style>    
      <?php
	  $i=1;
	 
        $session = $_GET['ses'];
       $ids = isset($_GET['ids']) ? explode(',', $_GET['ids']) : [];
        // Sanitize and prepare IDs
        $ids = array_map('intval', $ids); // Convert all to integers
        $id_list = implode(',', $ids);   // Create comma-separated list
	  $search=mysqli_query($con,"select * from teacher where teacher_session = '$session' 
      AND id IN ($id_list)  And status='Active' ");
	  while($rowstud=mysqli_fetch_array($search))
	  {
	  ?>	
      <div style="width:29%; height:322px; float:left; margin-top:17px; margin-left:20px; border:1px #e91e63 solid;">
	  <div style="width:100%; height:46px; border-bottom:2px #72011d solid;">
      <img src="idnew.png" style="width:197px; height:45px;margin-left:4px; margin-top:0px; ">
	  
	  </div>
	  
	  <div style="width:100%;">
	  <div style="float:left; width:66%;">
	  <img src="uploads/<?php echo $rowstud["timg"]; ?>" style="height:115px;margin-left:50px; width:100px; margin-top:3px;border-radius:10px; border:2px #336699 solid;">
	  </div>
	 
	  <br clear="all" />
	  </div>
	   <div style="width:100%; line-height:25PX; background-color:#e91e63; margin-top:2px;">
	   <center><span style="color:#FFFFFF; font-weight:bold; font-size:14px;"><?php echo $rowstud["teacher_name"]; ?></span></center>
	   </div>
	  
	  
	  <div style="width:97%; height:103px; margin-top:1px; margin-top:2px;background:url(wmn.png) no-repeat center;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:14px; font-weight:bold; margin-left:4px;" class="tab"> 
	  <tr><td style="width:80px;color:#000000;">Designation&nbsp;:</td>  <td><?php echo $rowstud["designation"]; ?></td></tr>
	 
	  <tr><td style="color:#000000;">Mobile No.&nbsp;&nbsp;:</td> <td><?php echo $rowstud["contact"]; ?></td></tr>
	  
	 <tr style="line-height:20px;"><td style="color:#000000;"><span style="position:absolute; margin-top:-22px;">Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> </td> 
	 <td><?php echo $rowstud["address"]; ?></td> 
	   </tr>

	
	  </table>
	  </div>
	  
	  <div style="width:100%; background-color:#2196f3; line-height:20px;">
	
	  <span style="font-size:11px; font-weight:bold;color:#FFFFFF; margin-left:7px;">Sagar Road, Raisen (M.P.) 9893720089</span>
	  
	  </div>
	  <br clear="all" />
	  </div>
      <?php
      $i++;
	  }
      ?>
     
	 
	 
	