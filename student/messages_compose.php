
     <?php
     if(isset($_POST['submit']))
     {
     $d=date("Y-m-d");
    
	 foreach($_POST['receiver'] as $rc)
	 {
	 $insert=mysqli_query($con,"insert into sendmsg (sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_POST['school']."','".$_SESSION['userid']."','$rc',    '".$_POST['sub']."','".$_POST['msg']."','".Yes."','$d','".$_SESSION['session']."','".student."','".$_POST['class']."')");
	 $student=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."'");
     $stud_row=mysqli_fetch_array($student);
     
	 $login=mysqli_query($con,"select * from login where uid='$rc'"); 
     $rowlog=mysqli_fetch_array($login);
 
     if($rowlog['type']=="teacher")
	 {
	 $teachname=mysqli_query($con,"select * from teacher where uid='$rc'");
	  
	 $rowteach=mysqli_fetch_array($teachname);
	 $cont1=$rowteach['contact'];
	 }
	 else if($rowlog['type']=="school")
	 {
	 $student=mysqli_query($con,"select * from school where uid='".$rc."'");
     $rowstud=mysqli_fetch_array($student);
	 $cont1=$rowstud['school_contactno'];
	 }	
	 $PhNo= "91".$cont1;
	  
	 $msg= $_POST['msg'];
   
	
	
	$sid="elite";
	$msg = str_replace("Senderid",$sid, $msg);
    $msg=urlencode($msg);
    
	$sedurl="http://www.businesssms.co.in/sms.aspx?Id=eliteschool2100@gmail.com&Pwd=adminelite&PhNo=".$PhNo."&text=".$msg;
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
    border: #ccc solid 1px;
    clear: left;
    padding: 1em;
	width:700px;
	margin-left:200px;
	border-radius:4px;
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

         
          
          <ul style="padding:7px 7px 7px 7px ; margin-left:200px; margin-top:30px;">
          <li id="sms">
          <a  href="./?pageid=messages_compose&list=sendmessages">Compose Messages</a></li>
          </ul>
          <?php if(($_GET['list']=='sendmessages') || ($_GET['list']=='')) { ?>
          <div class="content">
          
          <table width="426">
          <?php 
		  $logo2 = mysqli_query($con,"SELECT * FROM student where uid='".$_SESSION['userid']."'");
		  $logo3=mysqli_fetch_array($logo2);
	      $query_teacher=mysqli_query($con,"select * from teacher");
	   
	      ?>

          <form method="post" action="">
		  <tr>
          <td width="64">&nbsp;To<label style="color:#FF0000">*</label><br /><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
          <td width="350">
		  <div style="height:100px; width:305px; overflow:scroll">
	      <input type="checkbox" value="elite" name="receiver[]">School <br>
          <?php
	      while($row_teach=mysqli_fetch_array($query_teacher))
		   {
		   ?>
		  <input type="checkbox" value="<?php echo $row_teach['uid']; ?>" name="receiver[]"><?php echo ucwords($row_teach['teacher_name']); ?><br>
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
          <td><input type="text"  name="sub" value="" style="width:87.5%; padding:3px;" required/><br />&nbsp;</td>
          </tr>
          <tr>
          <td width="90">Message <label style="color:#FF0000">*</label><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
          <td><textarea placeholder="Enter Your Query Here" name="msg" style="width:90%; height:100px;"  maxlength="220" onkeyup="textCounter(this,'counter',220);" id="message" required></textarea>
	<label style="margin-left:70px; border:#FF0000 0px solid; width:50px">Words Remaining:</label><input disabled  maxlength="3" size="3" value="220" id="counter" style="float:right; margin-right:30px; color:#FF0000"> </td>
  </tr>
 
	  
	  
	     <input type="hidden" name="session" value="<?php echo $logo3['student_session'];  ?>">	
	     <input type="hidden" name="school" value="<?php echo $logo3['student_school'];  ?>">
	     <input type="hidden" name="class" value="<?php echo $logo3['student_class'];  ?>">	

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

<br /></br><br /></br><br /></br><br /></br>