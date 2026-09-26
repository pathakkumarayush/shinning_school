<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<?php
$res_msg1=mysqli_query($con,"select count(id) from sendmsg where reciever='".$_SESSION['userid']."'  and is_read='0'")or die(mysqli_error());

$row_msg11=mysqli_fetch_array($res_msg1);
?>


 <?php
     if(isset($_POST['submit']))
     {
     $d=date("Y-m-d");
     foreach($_POST['receiver'] as $rc)
	 {
	 $insert=mysqli_query($con,"insert into sendmsg (sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('teacher','".$_SESSION['userid']."','$rc','".$_POST['sub']."','".$_POST['msg']."','".Yes."','$d','".$_SESSION['session']."','".student."','".$_GET['class']."')");
	
	 $search22=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='".$_SESSION['session']."' and student_id='$rc'");
	 $rowstudent=mysqli_fetch_array($search22);	   
     
     $type="student";
	 $reciever = $rowstudent['student_id'];
	 $cont1=$rowstudent['student_contactno'];
     $sub="Attendance Detail";	
     $nmsg = $_POST['msg'];	
	 $sender = "teacher";
	 $date=date("Y-m-d");
	 $session=$_SESSION['session'];
	
	$PhNo= "91".$cont1;
	$sid="elite";
	$nmsg = str_replace("Senderid",$sid, $nmsg);
    $nmsg=urlencode($nmsg);
    
	$sedurl="http://www.businesssms.co.in/sms.aspx?Id=kabramemorialschool@yahoo.com&Pwd=kabra%251234&PhNo=".$PhNo."&text=".$nmsg;
    $ret = file_get_contents($sedurl);
	$msg="Message Send Successflly";
   
    }
    }
    ?>


<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>
<style type="text/css">
.succ{ width:300px; background-color:#006600; margin-left:50px; line-height:25px;border-radius:4px;}
.succ span{ margin-left:10px;}
 div.content {
   
    clear: left;
    padding: 1em;
	width:700px;
	
	border-radius:4px;
	margin-bottom:5px;
}

div.content.inactive {
	display: none;
}
#sms a {
	text-decoration:none;
	background-color: #336600;
	padding:7px 7px 7px 7px ;
	border-top-right-radius:5px;
	border-top-left-radius:5px;
	color:#fff;
}

#sms a:hover {
	text-decoration:none;
	background-color:#990000;
	color:#fff;
	padding:7px 7px 7px 7px ;
	
}

#sms a.active {
	text-decoration:none;
	background-color:#F08315;
	color:#fff;
	padding:7px 7px 7px 7px ;
	
}

#sms{
	display:inline;
    margin:5px 5px 5px 5px ;
}

</style>

         
<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">




<div class="right_side" style="margin-top:90px;">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		?>
<div class="pro">


<a  style="background-color:#006600; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px; text-decoration:none" href="<?php echo $var."inbox"; ?>">Inbox <?php if($row_msg11['count(id)']>0) { ?> 
<span style="color:#FF0000">&nbsp; <?php  echo  "(".$row_msg11['count(id)'].")"; ?> </span> <?php }  ?>
</a>

<a href="./?pageid=sentbox" style="background-color:#006600; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px;text-decoration:none">Sent Box</a>

<a href="./?pageid=compose" style="background-color:#006600; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px;text-decoration:none">Compose</a>

<br clear="all" />
<a href="./?pageid=home"><img src="images/buttonGoBack.png" class="gback"/></a>
</div>				
<div class="fee_main" style="">

          <?php if(($_GET['list']=='sendmessages') || ($_GET['list']=='')) { ?>
          <div class="content">
          
          <table class="table4">
          <?php 
		  $logo2 = mysqli_query($con,"SELECT * FROM student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' order by student_name asc");
		 
	     
	   
	      ?>

          <form method="post" action="">
		  <tr>
          <td width="64">&nbsp;To<label style="color:#FF0000">*</label><br /><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
          <td width="200">
		  <div style="margin-top:">
		  <?php 
		  $class = mysqli_query($con,"SELECT * FROM class_teacher  where teacher='".$_SESSION['userid']."'"); 
		
		  while($rowc=mysqli_fetch_array($class))
		  {
		  ?>
	      <a href="<?php echo $var."compose"."&&class=".$rowc['class']; ?>" style="background-color:#990000;padding:6px;text-decoration:none;color:#FFFFFF; border-radius:4px; border:2px #FFFFFF solid; float:left;">
		  <?php echo $rowc['class']; ?>
		  
		  </a>
		  <?php }?>
          </div>
		  <div style=" width:300px; margin-top:20px;  height:300px; overflow:scroll">
		  <?php $std = mysqli_query($con,"SELECT * FROM student where student_class='".$_GET['class']."' and student_session='".$_SESSION['session']."' order by student_name asc");?>
		  <input type="checkbox" value="elite" name="receiver[]">School<br>
          <?php
	      while($rows=mysqli_fetch_array($std))
		  {
		  ?>
		  <input type="checkbox" value="<?php echo $rows['student_id']; ?>" name="receiver[]"><?php echo ucwords($rows['student_name']); ?><br>
		  <?php
		  }
	      ?>	
		  
		  </div>
		  </td>
          </tr>
          <tr>
          <td>&nbsp;</td>
	      <td>&nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;Subject<br />&nbsp;</td>
          <td><input type="text"  name="sub" value="" style="width:95.5%; padding:3px;" required/><br />&nbsp;</td>
          </tr>
          <tr>
          <td width="90">Message <label style="color:#FF0000">*</label><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
          <td><textarea placeholder="Enter Your Query Here" name="msg" style="width:98%; height:100px;"  maxlength="220" onkeyup="textCounter(this,'counter',220);" id="message" required></textarea>
	<label style="margin-left:70px; border:#FF0000 0px solid; width:50px">Words Remaining:</label><input disabled  maxlength="3" size="3" value="220" id="counter" style="float:right; margin-right:30px; color:#FF0000"> </td>
  </tr>
 
	     <tr>
         <td>&nbsp;<br />&nbsp;</td>
         <td><input type="submit"  value="Send Message" name="submit" /> <br />&nbsp;</td>
         </tr>
         </form>
         </table>
         </div>
         <?php } ?>
         <?php 
		 if(!empty($msg))
		 {
		 echo "<div class='succ'><span> $msg </span></div>"; 
		 }
		 ?> 



</div>
</div>



</div>

<br clear="all" />
</div>
</div>
</div>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>