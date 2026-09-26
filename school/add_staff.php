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
	border-radius:4px;
	width:150px;
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

</style>
<?php

if(!empty($_GET['did']))
{
 $st="Dactive";
 $delete=mysqli_query($con,"update teacher set status='$st' where  teacher_id='".$_GET['did']."'");
$msg="Deleted Successfully";
}
if(!empty($_GET['uid']))
{
  $_SESSION['id']=$_GET['uid'];
}
?>

<?php
   if(isset($_POST['Submit']))
     {
	   if((empty($_POST['cont'])) || (empty($_POST['txtname'])) || (empty($_POST['txtdob'])) || (empty($_POST['txtdoj1'])))
	   {
	     $error_msg="Field Marked With * Are mandatory";
	   }
	 if(empty($error_msg))
	 {
	 $st="Active";
	  $query=mysqli_query($con,"insert into teacher(teacher_name,teacher_gender,teacher_dob,teacher_doj,teacher_qualifi,maritial_status,teacher_dom,teacher_school,staff_typ,pan,address,contact,father_name,status) values('".$_POST['txtname']."','".$_POST['gender']."','".$_POST['txtdob']."','".$_POST['txtdoj1']."','".$_POST['select']."','".$_POST['mrt']."','".$_POST['txtdom2']."','".$_SESSION['uid']."','".$_POST['typ']."','".$_POST['pan']."','".$_POST['add']."','".$_POST['cont']."','".$_POST['fnm']."','$st')");
	
	$_SESSION['teacher_id']=mysqli_insert_id();
	
	$_SESSION['staffmsg']= $_POST['txtname']." you have been successfully enrolled ";
	
	?>
      <script type="text/javascript">
	  window.location="<?php echo $var."add_staff_profesnol";  ?>";
	 </script>     
 <?php
   }
	 }
    if(isset($_POST['Update']))
	{
	$upd_rec=mysqli_query($con,"update teacher set teacher_name='".$_POST['txtname']."',teacher_gender='".$_POST['gender']."',teacher_dob='".$_POST['txtdob']."',teacher_doj='".$_POST['txtdoj1']."',teacher_qualifi='".$_POST['select']."',maritial_status='".$_POST['mrt']."',teacher_dom='".$_POST['txtdom2']."',teacher_school='".$_SESSION['uid']."',staff_typ='".$_POST['typ']."',pan='".$_POST['pan']."',address='".$_POST['add']."',contact='".$_POST['cont']."',father_name='".$_POST['fnm']."' where teacher_id='".$_GET['uid']."' ");
	$msg="Personal Detail Updated Successfully";	
}
?>
<script type="text/javascript">
function showquali(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    
    }
  }
xmlhttp.open("GET","getqualification.php?q="+str,true);
xmlhttp.send();
}
function showquali1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    
    }
  }
xmlhttp.open("GET","getqualification1.php?q="+str,true);
xmlhttp.send();
}

</script>

<?php
   if(!empty($_GET['uid']))
   {
   $teacher=mysqli_query($con,"select * from teacher where teacher_id='".$_GET['uid']."'");
   
   $rowteacher=mysqli_fetch_array($teacher);
   }

?>

<?php
	if(isset($_REQUEST["add_teacher"]))
	{
	if(empty($_POST['txtname']))
	{
	$error_msg="field  marked with * are mandatory";
	}
	elseif(empty($_POST["txtdob"]))
		  {
			 $error_msg="field  marked with * are mandatory";
		  } 
		  
		  
		   if(empty($error_msg))
			  {
			   
			   $name1 = $_FILES['file']['name'];
			//$result=mysqli_query($con,"select * from login where uid='".$_POST["uid"]."'")or die(mysqli_error());
			
			   //$result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('teacher','".$_POST["uid"]."','".$_POST["pass"]."','y')" );
				//$id=mysqli_insert_id();
				
			 
			  
			   
			   	
				 
				 ?>
                   <script type="text/javascript">
                    window.location="<?php echo $var."add_staff&&sumsg=Inserted Successfully"; ?>";
			       </script>
			  <?php
					}
					}
				?>

<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Staff</h2>
</div>


<div class="col_4">
<div class="box-head" style="width:1127px;">
					
		<?php
		if(!empty($_GET['uid']))
		{
		?>
		<a href="<?php echo $var."add_staff&uid=".$_SESSION['id'];  ?>"><span style="color:#FFFFFF; font-size:16px">Update Personal Detail</span> </a>&nbsp;||&nbsp;<a href="<?php echo $var."add_staff_profesnol&uid=".$_SESSION['id'];  ?>"><span style="color:#FFFFFF; font-size:16px">Update Professional Detail</span> </a>
		<?php
		}
		else
		{
		?>
		<h2><b>Add Personal Details</b></h2>		 
		<?php
	    }
		?>
						
		 </div>
         <?php 
	     if(!empty($error_msg))
		 {
		 ?>
         <div class="error" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		 <?php echo $error_msg; ?> 
		 </div>
         <?php
         }
	     ?>
         <?php 
	     if(!empty($_GET['sumsg']))
		 {
		 ?>
         <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		  <?php echo $_GET['sumsg']; ?> 
		  </div>
         <?php
         }
	     ?>
	     <?php 
	     if(!empty($msg))
		 {
		 ?>
         <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		  <?php echo $msg; ?> 
		  </div>
         <?php
         }
	     ?>
          <table width="986" height="455" border="0"  style="margin-top:15px;" >
          <tr>
          <td colspan="4">
	      <form method="post"  onSubmit="return checkForm(this);">
   	      <?php
          if(empty($_GET['uid']))
	      {
          ?>	
	      <table  width="1040" height="300" border="0"  >
          <tr class="table" >
          <td>Employee Id </td>
          <td>
		  <?php
		  require_once("../db.php");
		  $max=mysqli_query($con,"select max(teacher_id) from teacher where teacher_school='".$_SESSION['uid']."'");
		  $rowmax=mysqli_fetch_array($max);
		  $maxid=$rowmax['max(teacher_id)']+1;
		  ?>
		  <input name="eid" type="text" value="<?php echo $maxid ;  ?> "  size="40" class="tb5" readonly="readonly" /></td>
          <td>Date of birth<span style="color:#FF0000">*</span></td>
          <td> <input name="txtdob" id="demo1" type="text" class="tb5" value="<?php  if($_POST) echo $_POST['txtdob'];  if(isset($_GET["uptachid"])){echo $row1["teacher_dob"];} ?>" size="40" />
         <a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
         </tr>
         <tr class="table" >
         <td>Employee type </td>
         <td><select name="typ" class="tb5 select" style="width:220px;" >
         <option value="teaching" >Teaching</option>
         <option value="nonteaching" >Non-teaching</option>
         </select></td>
         <td>Date of joining<span style="color:#FF0000">*</span></td>
         <td>
		 <input name="txtdoj1" id="demo2" type="text" class="tb5" value="<?php  if($_POST) echo $_POST['txtdoj1'];  if(isset($_GET["uptachid"])){echo $row1["teacher_doj"];} ?>" size="40" />
         <a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
        </tr>
        <tr class="table" >
        <td>Employee Name<span style="color:#FF0000">*</span> </td>
        <td><input name="txtname" type="text" value="<?php  if($_POST) echo $_POST['txtname'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
        <td>Maritial status </td>
        <td><select name="mrt" class="tb5 select" style="width:220px;" onchange="showquali1(this.value)" >
        <option value="unmarried">unmarried</option>
        <option value="married">married</option>
        </select></td>
        </tr>
        <tr class="table" >
        <td width="164"><p>Father/Husband name </p></td>
        <td width="287"><input name="fnm" type="text" value="<?php  if($_POST) echo $_POST['txtname'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
        <td width="177">Date of marrige</td>
        <td width="394"><div id="txtHint2"></div></td>
        </tr>
        <tr class="table" >
        <td>Gender</td>
        <td><?php if(isset($_GET["uptachid"])) { ?>
        <input type="radio" name="gender" id="input"  value="male" <?php if($row1['teacher_gender']=='male' ) { ?> checked="checked" <?php } ?> />
        <label class="check_label">Male</label>
        <input type="radio" name="gender" id="input" value="female" <?php if($row1['teacher_gender']=='female' ) { ?> checked="checked" <?php } ?> />
              <label class="check_label">Female</label>
              <?php } else { ?>
              <input type="radio" name="gender" id="input"  value="male"  checked="checked" />
              <label class="check_label">Male</label>
              <input type="radio" name="gender" id="input" value="female" />
              <label class="check_label">Female</label>
              <?php } ?></td>
          <td>Qualifacation</td>
          <td><select name="select" class="tb5 select" style="width:220px;" onchange="showquali(this.value)" >
            <option value="graduate" >Graduate</option>
            <option value="postgraduate" >Post-graduate</option>
          </select></td>
        </tr>
        <tr class="table">
	      <td>Contact Number <span style="color:#FF0000">*</span></td>
	      <td><input name="cont" type="text"  id="txtname" size="40" class="tb5" /></td>
	      <td>Address <br>&nbsp;<br>&nbsp;</td>
          <td><textarea name="add" cols="23" rows="3"></textarea></td>
       </tr>
       <tr class="table" >
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Next" style="width:150px" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
	<?php
	}
	else
	  {
	  ?>
	  <table  width="1040" height="300" border="0"  >
        
        
        <tr class="table" >
          <td>Employee type </td>
          <td><select name="typ" class="tb5" >
		     <option>Staff Type</option>
              <option value="teaching" <?php if($rowteacher['staff_typ']=="teaching") { ?> selected="selected" <?php }  ?> >teaching</option>
              <option value="nonteaching" <?php if($rowteacher['staff_typ']=="nonteaching") { ?> selected="selected"<?php } ?> >non-teaching</option>
          </select></td>
          <td>Date of joining<span style="color:#FF0000">*</span></td>
          <td><input name="txtdoj1" id="demo2" type="text" class="tb5" value="<?php echo $rowteacher['teacher_doj'];   ?>" size="40" />
            <a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
        </tr>
        <tr class="table" >
          <td>Employee Name<span style="color:#FF0000">*</span> </td>
          <td><input name="txtname" type="text" value="<?php echo $rowteacher['teacher_name'];   ?>" id="txtname" size="40" class="tb5" /></td>
          <td>Maritial status </td>
          <td><select name="mrt" class="tb5" onchange="showquali1(this.value)" >
            <option value="unmarried" <?php if($rowteacher['maritial_status']=="unmarried") { ?> selected="selected" <?php } ?>>unmarried</option>
            <option value="married" <?php if($rowteacher['maritial_status']=="married") { ?> selected="selected" <?php } ?>>married</option>
          </select></td>
        </tr>
        <tr class="table" >
          <td width="164"><p>Father/Husband name </p></td>
          <td width="287"><input name="fnm" type="text" value="<?php echo $rowteacher['father_name'];   ?>" id="txtname" size="40" class="tb5" /></td>
          <td width="177">Date of marrige
 </td>
          <td width="394"><div id="txtHint2"></div></td>
        </tr>
        <tr class="table" >
          <td>Gender</td>
          <td>
              <input type="radio" name="gender" id="input"  value="male"  checked="checked" <?php if($rowteacher['teacher_gender']=="male")  { ?> checked="checked"  <?php }   ?> />
              <label class="check_label">Male</label>
              <input type="radio" name="gender" id="input" value="female" <?php if($rowteacher['teacher_gender']=="female") { ?> checked="checked"  <?php } ?> />
              <label class="check_label" >Female</label>
             </td>
          <td>Qualifacation</td>
          <td><select name="select" class="tb5" onchange="showquali(this.value)" >
            <option value="graduate" <?php if($rowteacher['teacher_qualifi']=="graduate") { ?> selected="selected"  <?php } ?> >Graduate</option>
            <option value="postgraduate" <?php if($rowteacher['teacher_qualifi']=="postgraduate") { ?> selected="selected"  <?php } ?> >Post-graguate</option>
          </select></td>
        </tr>
        <tr class="table">
	      <td>Contact Number</td>
	      <td><input name="cont" type="text"  id="txtname" size="40" value="<?php echo $rowteacher['contact']; ?>" class="tb5" /></td>
	      <td>Pan No</td>
          <td><input name="pan"  type="text" class="tb5"  size="40" value="<?php echo $rowteacher['pan']; ?>" />
	
		</tr>
        <tr class="table" >
          <td>Address <br>&nbsp;<br>&nbsp;</td>
          <td><textarea name="add" cols="30" rows="3"><?php echo $rowteacher['address']; ?></textarea></td>
          <td>&nbsp;</td>
          <td>  <div id="txtHint1"></div></td>
        </tr>

		
		
        <tr class="table" >
          <td>&nbsp;</td>
          <td></td>
          <td>&nbsp;</td>
          <td>  <div id="txtHint1"></div></td>
        </tr>

	
        <tr class="table" >
          <td>&nbsp;</td>

          <td>&nbsp;</td>
          <td><input type="submit" name="Update" value="Update" /></td>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <?php
	  }
	?>
	
	</form></td>
    </tr>
   </table>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  