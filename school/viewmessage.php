<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}


.form-style-2-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type="email"]:focus,
input[type="email"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	font-weight:bold;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>

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
   $insert=mysqli_query($con,"insert into sendmsg (sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_POST['school']."','".$_SESSION['uid']."',
   '".$_POST['recive']."','".$_POST['sub']."','".$_POST['msg']."','".Yes."','$d','".$_SESSION['session']."','".$_POST['type']."','".$_POST['class']."')");
  
 $msg="Message Send Successflly";
  }
  else
    {
	  $msg="Message is Empty";
	}
  
  }
  

?>
       <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		 $studrow['student_name'];
		 echo $std_id = $studrow['student_id'];
		?>
<?php
$res_msg=mysqli_query($con,"select * from sendmsg where id='".$_GET['id']."'")or die(mysqli_error());
$row_msg=mysqli_fetch_array($res_msg);
$updmsg=mysqli_query($con,"update sendmsg set is_read='1' where id='".$_GET['id']."' ");
?>

<div class="full_div" style="background-color:#CCCCCC">
<br clear="all" />
<div class="left_sect"><img src="images/short-code-sms.png" /><a href="./?pageid=messagedetail&divid=3">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/Sms-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Send Message </h2>
</div>
<div class="col_4" style="margin-top:0px;" >

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




<div class="right_side" style="border:4px #FFFFFF solid; border-radius:5px;">
      
<div class="pro">


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

 <?php
 }
?>
<?php
 $login2=mysqli_query($con,"select * from login where uid='".$row_msg['sender_user']."'"); 
 $rowlog=mysqli_fetch_array($login2);
    if($rowlog['type']=="student")
	 {
	$teachname=mysqli_query($con,"select * from student where uid='".$row_msg['sender_user']."'");
	 
	$rowteach=mysqli_fetch_array($teachname);
	 $type="student";
	}
	else if($rowlog['type']=="teacher")
	   {
	    $student=mysqli_query($con,"select * from teacher where uid='".$rowlog['uid']."'");
        $rowstud=mysqli_fetch_array($student);
	    $type="teacher";
	 }	
?>		
<div class="fee_main" style="" >
<table class="table2" border="0" width="450px" style="margin-left:20px;">
<tr>
<td><b>Sent By - <?php if($type=="student") 
                      { 
					    echo ucwords($rowteach['student_name'])." (Student) ".$row_msg['sender_user']; 
					  } 
					 else if($type=="teacher")
					   {
					     echo ucwords($rowstud['teacher_name'])." (Teacher) ".$row_msg['sender_user']; 
					   } 
					   else{
					   echo $_SESSION['uid'];
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


</table>
<?php
   if(!empty($_GET['id2']))
   {
   ?>
   <table cellpadding="table3" style="margin-left:20px;">
      <tr> 
       <td><b>To-<?php echo $row_msg['sender_user']; ?> 
	                  <input type="hidden" name="class" value="<?php echo $rowteach['student_class'];  ?>">
		              
					  <?php if($type=="student") 
                      { 
					  ?>
					  <input type="hidden" name="recive" value="<?php echo $rowteach['student_id'];  ?>">
					  <?php  } ?>
					 <?php if ($type=="teacher") 
                      { 
					  ?>
					  <input type="hidden" name="recive" value="<?php echo $rowstud['uid'];  ?>">
					  <?php  } ?>
					
		
		
		</b>
	    
	   </td>
       </tr>
	  <tr>
	    <td>&nbsp;</td>
		
	  </tr>
	    <tr> 
       <td><b>Message:-</b></td>
	   </tr>
	   <tr>
      <td><div style="width:330px; height:auto; border:0px solid;">
	  <textarea placeholder="Enter Your Query Here" style="background:#E4E4E4;border-radius:4px;" name="msg" cols="37" rows="4" maxlength="216" maxlength="220" onkeyup="textCounter(this,'counter',220);" id="message"></textarea></div>
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

	 
		<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>