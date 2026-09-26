<style>

#notification_count {
padding: 3px 7px 3px 7px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
margin-left:-10px;
border-radius: 9px;
position: absolute;
margin-top: -10px;
font-size: 13px;
}

li ul{ display:none; width:100px; margin-left:11px; margin-top:-2px; border:2px #FFFFFF solid; height:100px; background-color:#990000; color:#fff;border-radius:4px;}
li ul li{ width:80px; line-height:28px; background-color:#006600; margin-left:8px; border-radius:4px;border:2px #FFFFFF solid; }
li ul li:hover{ background-color:#336666; font-size:14px;}
li ul li a:hover{ font-size:13px;}
li:hover ul {
    display: block;
    position: absolute;
}
</style>
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
	    $studrow['student_name'];
		$std_id = $studrow['student_id'];
		?>
<ul id="sddm">
 <?php /*?> <li>
  <?php $res_msg1=mysqli_query($con,"select count(id) from sendmsg where reciever='$std_id'  and is_read='0'")or die(mysqli_error());
  $row_msg1=mysqli_fetch_array($res_msg1);
  ?>
  <a href="<?php echo $var."sent_sms";?>"><img src="images/AlJmt.png" style="width:28px; height:27px; margin-left:30px;" /><?php if($row_msg1['count(id)']>0) { ?>  
  <span id="notification_count"> 1
  <?php  //echo  $row_msg1['count(id)']; ?>
  </span>
  <?php }  ?> 
   </a>&nbsp;
   </li><?php */?>

  <li>
  <?php $res_msg1=mysqli_query($con,"select count(id) from sendmsg where reciever='$std_id'  and is_read='0'")or die(mysqli_error());
  $row_msg1=mysqli_fetch_array($res_msg1);
  ?>
  <a href="<?php echo $var."inbox";?>"><img src="images/m.png" style="width:30px; height:30px;" /><?php if($row_msg1['count(id)']>0) { ?>  
  <span id="notification_count">
  <?php  echo  $row_msg1['count(id)']; ?>
  </span>
  
   <?php }  ?> 
   </a>&nbsp;
  
</li>
<li><a href=""> <img src="images/mm.png" style="width:24px; height:24px; margin-left:50px; margin-top:-4px;" /></a></li>
<li>
<a href="" style="font-size:12px" style="color:#000000">
  
   <?php
   $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
   $studrow=mysqli_fetch_array($search);
   echo $studrow['student_name'];
   ?>
 </a>
 <ul>
 <img src="images/arrow.png" style=" margin-top:-10px; width:12px; float:right; height:12px;" />
 <li><a href="./?pageid=profilesetting">Settings</a></li>
 <li><a href="logout.php">Logout</a></li>
 
 </ul>
 
 </li>
</ul>
 
<div style="clear:both"></div>