<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
<style>
input {
font-family:Arial;
font-size:14px;
}
label{
font-family:Arial;
font-size:14px;
color:#fff;
font-weight:bold;
}

.tblSaveForm {
margin-left:6px;
}
.btnSubmit {
background-color:#fd9512;
padding:5px;
border-color:#FF6600;
border-radius:4px;
color:white;
margin-top:5px;
}
.message {
color:#fff;
text-align: center;
width: 100%;
font-weight:bold;
}
.txtField {
padding: 5px;
border:#fedc4d 1px solid;
border-radius:4px;
}
.required {
color: #FF0000;
font-size:11px;
font-weight:italic;
padding-left:10px;
}
</style>


<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">


<div class="left_side">
<div id="tog" style=""><button >
<img src="images/r.png"  style="float:right; "/></button>

</div>

<ul class="left_ul">
<li><a href="./?pageid=home">Dasboard</a></li>
<li><a href="./?pageid=inbox">Mail Box</a></li>
<li><a href="./?pageid=fee_leader">Fee Detail</a></li>
<li><a href="./?pageid=marksheet">Examination</a></li>
<li><a href="./?pageid=home">Student Detail</a></li>
<li><a href="./?pageid=home_std_ana">Student Analysis</a></li>
<li><a href="./?pageid=attandance">Student Attendance</a></li>
<li style="background-color:#999900"><a href="./?pageid=profilesetting">Change Password</a></li>
</ul>

</div>

<div class="right_side" style="">
<?php   
$search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
$studrow=mysqli_fetch_array($search);
?>
<?php
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT * from login WHERE uid='".$_SESSION['userid']."'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["pass"]) {
mysqli_query($con,"UPDATE login set pass='".$_POST["newPassword"]."' WHERE uid='".$_SESSION['userid']."'");
$message = "Password Changed";
} 
else $message = "Current Password is not correct";
}
?>
<div class="pro">
&nbsp;&nbsp;&nbsp;&nbsp;Change Password - <?php  echo $studrow['student_name']; ?>
<br clear="all" />
</div>				
<div class="fee_main" style=" min-height:350px;">

<form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" align="center" class="tblSaveForm" style="color:#000000">

<tr>
<td><label style="color:#000000">Current Password</label><br />
<input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span>
</td>
</tr>
<tr>
<td><label style="color:#000000">New Password</label><br />
<input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span>
</td>
</tr>
<td><label style="color:#000000">Confirm Password</label><br />
<input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span>
</td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>

</form>
<br clear="all" />
<br clear="all" />
</div>
</div>



</div>

<br clear="all" />
</div>
</div>
</div>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow");
});
</script>