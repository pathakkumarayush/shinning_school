<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


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
<?php

if(isset($_POST['submit']))
  {
  
   if(!empty($_POST['msg']))
   {
    $d=date("Y-m-d");
   $insert=mysqli_query($con,"insert into sendmsg (sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_POST['school']."','".$_SESSION['userid']."','".$_POST['sender_user']."','".$_POST['sub']."','".$_POST['msg']."','".Yes."','$d','".$_SESSION['session']."','".$_POST['type']."','".$_POST['class']."')");
  
  $student=mysqli_query($con,"select * from student where uid='".$_SESSION['uid']."' and student_school='".$_SESSION['school_name']."'");
  $stud_row=mysqli_fetch_array($student);
  $login=mysqli_query($con,"select * from login where uid='".$_POST['sender_user']."'"); 
  $rowlog=mysqli_fetch_array($login);
 
   if($rowlog['type']=="teacher")
	 {
	  $teachname=mysqli_query($con,"select * from teacher where uid='".$rowlog['uid']."'");
	  
	  $rowteach=mysqli_fetch_array($teachname);
	  $cont1=$rowteach['teacher_contactno'];
	}
	else if($rowlog['type']=="school")
	   {
	    $student=mysqli_query($con,"select * from school where uid='".$rowlog['uid']."'");
        $rowstud=mysqli_fetch_array($student);
	    $cont1=$rowstud['school_contactno'];
	 }	
	
	  $msg= $stud_row['student_name']." From Class ".$stud_row['student_class']." ".$_POST['msg'];
     

 $r=sms($_SESSION['school_name'],$cont1,$_POST['sub'],$msg,$page,'Yes');
  
  
  $msg="Message Send Successflly";
  }
  else
    {
	  $msg="Message is Empty";
	}
  
  }
  

?>

<?php
$res_msg=mysqli_query($con,"select * from sendmsg where reciever='672' and id='".$_GET['id']."'")or die(mysqli_error());
$row_msg=mysqli_fetch_array($res_msg);
$updmsg=mysqli_query($con,"update sendmsg set is_read='1' where reciever='672' and id='".$_GET['id']."' ");
?>
<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">
<?php
if(isset($_GET["msgid"]))
{
	$del_msg=mysqli_query($con,"delete from sendmsg where id=".$_GET["msgid"]."")or die(mysqli_error());
	if($del_msg!=0)
	{
		?>
        <script type="text/javascript">
		alert("Your Message is deleted");
		</script>
        <?php
	}
}
?>


<div class="left_side">
<div id="tog" style=""><button >
<img src="images/r.png"  style="float:right; "/></button>

</div>

<ul class="left_ul">
<li><a href="./?pageid=home">Dasboard</a></li>
<li><a href="./?pageid=sent_sms">Mail Box</a></li>
<li><a href="./?pageid=veiw_fee">Fee Detail</a></li>
<li><a href="./?pageid=marksheet">Examination</a></li>
<li><a href="./?pageid=veiw_profile">Student Detail</a></li>
<li><a href="./?pageid=home_std_ana">Student Analysis</a></li>
<li><a href="./?pageid=veiw_att">Student Attandance</a></li>
</ul>

</div>

<div class="right_side">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		?>
<div class="pro">


<a  style="background-color:#006600; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px;" href="<?php echo $var."sent_sms"; ?>">Inbox <?php if($row_msg11['count(id)']>0) { ?> 
<span style="color:#FF0000">&nbsp; <?php  echo  "(".$row_msg11['count(id)'].")"; ?> </span> <?php }  ?>
</a>

<a href="" style="background-color:#006600; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px;">Sent Box</a>

<a href="" style="background-color:#006600; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px;">Compose</a>

<br clear="all" />
</div>		
<?php
   if(!empty($msg))
   {
   ?>
  <label style="color:#FF0000"><?php  echo $msg; ?></label>
   <?php
   }
   
?>
<form action="" method="post">
<div>
<?php
if(!empty($_GET['page']))
{
?>

<a href="<?php echo $var.$_GET['page']; ?>"><img src="images/but-go-back.png"></a>
<?php
}
else
 {
 ?>
<a href="<?php echo $var."inbox"?>"><img src="images/wpe93e59c3.png" style="width:120px; height:40px; float:right"></a>
 <?php
 }
?>
<?php
 $login2=mysqli_query($con,"select * from login where uid='".$row_msg['sender_user']."'"); 
 $rowlog=mysqli_fetch_array($login2);
 if($rowlog['type']=="teacher")
	 {
	  $teachname=mysqli_query($con,"select * from teacher where uid='".$row_msg['sender_user']."'");
	 
	 $rowteach=mysqli_fetch_array($teachname);
	 $type="Teacher";
	}
	else if($rowlog['type']=="school")
	   {
	    $student=mysqli_query($con,"select * from school where uid='".$rowlog['uid']."'");
        $rowstud=mysqli_fetch_array($student);
	    $type="School";
	 }	
?>		
<div class="fee_main" style="">
<table class="table2" border="0" width="450px">
<tr>
<td><b>Sent By - <?php if($type=="Teacher") 
                      { 
					    echo ucwords($rowteach['teacher_name'])." (Teacher) ".$row_msg['sender_user']; 
					  } 
					 else if($type=="School")
					   {
					     echo ucwords($rowstud['school_name'])." (School) ".$row_msg['sender_user']; 
					   } 
					  
					  ?>
					     </b></td>

</tr>
<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td><b>Message:-</b></td>

</tr>
<tr>
<td><div  style="width:320px; height:auto;"><?php echo $row_msg['msg']; ?></div></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td><b>On Date - <?php echo date("d-m-Y",strtotime($row_msg['date'])); ?></b></td>

</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
 <td><a href="<?php echo $var."viewmessage&id=".$_GET['id']."&id2=".$row_msg['sender_user'];  ?>" style="color:#0033CC">
 <img src="images/replay_button.png" style="width:80px; margin-bottom:5px;"></a></td>

</tr>

</table>
<?php
   if(!empty($_GET['id2']))
   {
   ?>
   <table class="table3" style="">
      <tr> 
       <td><b>To-<?php echo $row_msg['sender_user']; ?></b></td>
       </tr>
	  <tr>
	    <td>&nbsp;</td>
		
	  </tr>
	    <tr> 
       <td><b>Message:-</b></td>
	   </tr>
	   <tr>
      <td><div style="width:330px; height:auto; border:0px solid;">
	  <textarea  placeholder="Enter Your Query Here" style="background:#E4E4E4;border-radius:4px;" name="msg" cols="37" rows="4" maxlength="216" maxlength="220" onkeyup="textCounter(this,'counter',220);" id="message"></textarea></div>
	   <label style="margin-left:80px; border:#FF0000 0px solid; width:50px">Words Remaining:</label><input disabled  maxlength="3" size="3" value="220" id="counter" style=" margin-right:0px; color:#FF0000">
	   </td> 
	  </tr>
	  <input type="hidden" name="school" value="<?php echo $row_msg['sender'];  ?>">
	  <input type="hidden" name="sender_user" value="<?php echo $row_msg['sender_user'];  ?>">
	  <input type="hidden" name="sub" value="<?php echo $row_msg['sub'];  ?>">
	  <input type="hidden" name="session" value="<?php echo $row_msg['session'];  ?>">
	  <tr>
	    <td>&nbsp;</td>
		 
	  </tr>
	  <tr>
	    <td><input type="submit" name="submit" value="Send" style="margin-bottom:8px;"></td>
		 
	  </tr>
   </table>
   <?php
   }

?>
</form>

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