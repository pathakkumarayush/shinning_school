<?php
session_start();
require_once("../db.php"); 
?>
<style>
.tab tr{ line-height:25px;}
</style>    
      <?php
	
	 
	
	  ?>	
      
    
      <?php
	  $i=1;
	  $search=mysqli_query($con,"select * from student where id='".$_GET['id']."'");
	  $rowstud=mysqli_fetch_array($search);
	 
	  ?>	
      <div style="width:95%; height:300px; float:left; margin-top:30px; margin-left:10px; border:1px #000 solid; border-radius:10px;">
	  <div style="width:100%; height:90px; border-bottom:2px #000 solid;">
      <center><span style="font-size:32px;"><u>Shining Public Higher Secondary School, Raisen</u> </span></center>
	  <center><span style="font-size:22px;">First Terminal Examination <?php echo $_SESSION['session']; ?></span></center>
	  <center><span style="font-size:22px;">Admit Card</span></center>
	  </div>
	 
	 
	  <div style="width:100%; height:120px; margin-top:3px;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:18px; font-weight:bold; margin-left:8px;" class="tab"> 
	  <tr><td style="width:80px;">Name </td><td>: <?php echo $rowstud["student_name"]; ?></td><td style="width:70px;">Roll No</td><td>: <?php echo $rowstud['rno'];?></td></tr>
	  <tr><td>Father </td><td colspan="3">: Mr. <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>Class/Sec. </td><td colspan="3">: <?php echo $rowstud["student_class"]; ?></td></tr>
	
	
	  </table>
	  </div>
	  <br />
	  <div style="width:100%;height:34px;">
	   <span style="float:left;font-size:16px; font-weight:bold; margin-left:10px;">Class Teacher</span>
	   
	   <span style="float:right;font-size:16px; margin-right:20px;font-weight:bold;">
	   <img src="ps.png" style="position:absolute; width:100px; height:45px; margin-top:-41px; margin-left:65px;" />
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen</span>
	   
	  </div>
	  <br clear="all" />
	  </div>
     
	 
	 
	