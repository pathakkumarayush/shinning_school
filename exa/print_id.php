<style>
.tab tr{ line-height:18px;}
</style>    
      
     <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	  $search=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_session='".$_SESSION['session']."' and status='0'");
	  while($rowstud=mysqli_fetch_array($search))
	  {
	  ?>	
      <div style="width:200px; height:316px; float:left;border:1px #006600 solid;">
	  <div style="width:100%; height:51px; border-bottom:2px #006600 solid;">
      <div style="float:left; width:23%;">
	  <img src="logo.png" style="width:44px; height:47px;margin-left:2px; margin-top:1px; ">
      </div>
	  <div style="float:left; width:76%; margin-left:2px;">
	  <span style="font-size:28px;color:#e03b21;font-weight:bold; margin-left:2px;">GOYENKA </span><br />
	  <span style=" font-size:17px; margin-left:4px; color:#e03b21; font-weight:bold">PUBLIC SCHOOL</span><br>
      </div>
	  <br clear="all" />
	  </div>
	  
	  <div style="width:100%;">
	  <span style=" float:right; margin-right:33px;font-weight:bold;font-size:16px;">Session : <?php echo $_SESSION['session']; ?></span>
<img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud['student_img'];  ?>" style="height:99px; margin-left:60px; width:90px; margin-top:1px;border-radius: 9px; " />
	  </div>
	  <div style="width:97%; height:108px; margin-top:3px;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:12px; font-weight:bold; margin-left:8px;" class="tab"> 
	  <tr><td>Name : <?php echo $rowstud["student_name"]; ?></td></tr>
	  <tr><td>Father : <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>Class : <?php echo $rowstud["student_class"]; ?></td></tr>
	  <tr><td>Mobile : <?php echo $rowstud["student_contactno"]; ?></td></tr>
	  <tr><td>Address :<?php echo $rowstud["student_address"]; ?></td></tr>
	  </table>
	  </div>
	  
	  <div style="width:100%; background-color:#006600;height:34px;">
	  <span style="font-size:13px; font-weight:bold;color:#FFFFFF; margin-left:2px;">Panchkuiyaan Tiraha, Jhansi(U.P.)</span><br>
	  <span style="font-size:14px; font-weight:bold;color:#FFFFFF; margin-left:2px;">Mobile:8707077296,8840435941</span><br>
	  </div>
	  <br clear="all" />
	  </div>
      <?php
      $i++;
	  }
      ?>
     
	 
	 
	