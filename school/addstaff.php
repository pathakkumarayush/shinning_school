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
	width:221px;
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
$query=mysqli_query($con,"insert into teacher(teacher_id,teacher_name,teacher_gender,teacher_dob,teacher_doj,teacher_qualifi,email,teacher_school,staff_typ,address,
contact,father_name,status,deduction,secmon,sname,designation,role,eno,hq)values('".$_POST['eid']."','".$_POST['txtname']."','".$_POST['gender']."','".$_POST['txtdob']."','".$_POST['txtdoj1']."','".$_POST['select']."','".$_POST['mrt']."','".$_SESSION['uid']."','".$_POST['typ']."','".$_POST['add']."','".$_POST['cont']."',
'".$_POST['fnm']."','$st','".$_POST['deduction']."','".$_POST['secmony']."','".$_POST['sname']."','".$_POST['designation']."','".$_POST['role']."','".$_POST['eno']."','".$_POST['hq']."')");
$_SESSION['teacher_id']=$_POST['eid'];
$_SESSION['staffmsg']= $_POST['txtname']." you have been successfully enrolled ";
?>
<script type="text/javascript">
window.location="<?php echo $var."professionalstaff";  ?>";
</script>     
<?php } }
if(isset($_POST['Update']))
{
$upd_rec=mysqli_query($con,"update teacher set teacher_name='".$_POST['txtname']."',teacher_gender='".$_POST['gender']."',teacher_dob='".$_POST['txtdob']."',teacher_doj='".$_POST['txtdoj1']."',teacher_qualifi='".$_POST['select']."',maritial_status='".$_POST['mrt']."',teacher_school='".$_SESSION['uid']."',staff_typ='".$_POST['typ']."',pan='".$_POST['pan']."',address='".$_POST['add']."',contact='".$_POST['cont']."',father_name='".$_POST['fnm']."',deduction='".$_POST['deduction']."',status='".$_POST['status']."',
secmon='".$_POST['secmony']."',sname='".$_POST['sname']."',designation='".$_POST['designation']."',role='".$_POST['role']."',eno='".$_POST['eno']."',hq='".$_POST['hq']."'
where teacher_id='".$_GET['uid']."' and teacher_session='".$_SESSION['session']."'");
$msg="Personal Detail Updated Successfully";	
}
?>
<?php
if(isset($_POST['updateimg']))
			        {
				    $id=$_POST["imgid"];
					$name1 = $id.$_FILES['file']['name'];	
				    $target_path = "uploads/";
				    $target_path = $target_path.$id.basename( $_FILES['file']['name']); 
			        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
					{ 
					$updateimg=mysqli_query($con,"update teacher set timg='$name1' where teacher_id='".$_POST['imgid']."' and teacher_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
					?>
					<script>
					alert('Ok''<?php echo $id=$_POST["imgid"]; ?>')
					</script>
					
					<?php
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
   $teacher=mysqli_query($con,"select * from teacher where teacher_id='".$_GET['uid']."' and teacher_session='".$_SESSION['session']."'");
   
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
                    window.location="<?php echo $var."addstaff&&sumsg=Inserted Successfully"; ?>";
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
<div class="left_sect"><img src="../school/images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Staff</h2>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">
<?php
if(!empty($_GET['uid']))
{
?>
<a href="<?php echo $var."addstaff&uid=".$_SESSION['id'];  ?>"><span style="color:#FFFFFF; font-size:16px; text-decoration:none">Update Personal Detail</span> </a>&nbsp;||&nbsp;
<a href="<?php echo $var."professionalstaff&uid=".$_SESSION['id'];  ?>"><span style="color:#FFFFFF; font-size:16px; text-decoration:none">Update Professional Detail</span> </a>
<?php } else { ?>
<h2><b>Add Personal Details</b></h2>		 
<?php } ?>
</div>
<?php 
	            if(!empty($error_msg))
		        {
			    ?>
                <div class="error" style="width:758px;"> 
		        <?php echo $error_msg; ?> 
		        </div>
                <?php
                }
	            ?>
                <?php 
	            if(!empty($_GET['sumsg']))
		        {
		        ?>
                <div class="success" style="width:758px;"> 
		        <?php echo $_GET['sumsg']; ?> 
		        </div>
                <?php
                }
	            ?>
	            <?php 
	            if(!empty($msg))
		        {
		        ?>
                <div class="success" style="width:758px;">  
		        <?php echo $msg; ?> 
		        </div>
                <?php
                }
	            ?>
	    
	          <table width="986" border="0">
              <tr>
              <td colspan="4">
	          <form method="post"  onSubmit="return checkForm(this);" name="myForm" id="myform" action="#" enctype="multipart/form-data">
	          <?php
              if(empty($_GET['uid']))
	          {
              ?>	
<table  width="900" height="300" border="0"  >
<tr class="table" >
<td>Employee Id</td>
<td>
<?php
require_once("../db.php");
$max=mysqli_query($con,"select max(teacher_id) from teacher where teacher_school='".$_SESSION['uid']."' and teacher_session='".$_SESSION['session']."'");
$rowmax=mysqli_fetch_array($max);
$maxid=$rowmax['max(teacher_id)']+1;
?>
<input name="eid" type="text" value="<?php echo $maxid ;  ?> "  size="40" class="tb5" readonly="readonly" /></td>
<td width="110">Date of birth<span style="color:#FF0000">*</span></td>
<td> <input name="txtdob" id="demo1" type="text" class="tb5" value="<?php  if($_POST) echo $_POST['txtdob'];  if(isset($_GET["uptachid"])){echo $row1["teacher_dob"];} ?>" size="40" />
<a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
</tr>
<tr class="table" >
<td>Employee type </td>
<td><select name="typ" class="tb6 select"> 
<option value="teaching" >Teaching</option>
<option value="nonteaching" >Non-teaching</option>
<option value="grd" >Group D</option>
</select>
</td>
<td>Date of joining<span style="color:#FF0000">*</span></td>
<td><input name="txtdoj1" id="demo2" type="text" class="tb5" value="<?php  if($_POST) echo $_POST['txtdoj1'];  if(isset($_GET["uptachid"])){echo $row1["teacher_doj"];} ?>" size="40" />
            <a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
        </tr>
        <tr class="table" >
          <td>Employee Name<span style="color:#FF0000">*</span> </td>
          <td><input name="txtname" type="text" value="<?php  if($_POST) echo $_POST['txtname'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
          <td>Email Id </td>
          <td>
		  <input name="mrt" type="text" id="txtname" size="40" class="tb5" />
		  </td>
        </tr>
        <tr class="table" >
          <td width="164"><p>Father/Husband name </p></td>
          <td width="287"><input name="fnm" type="text" value="<?php  if($_POST) echo $_POST['txtname'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
          
         <td>Qualifacation</td>
          <td>
		  <input name="select" type="text"  id="txtname" size="40" class="tb5" />
          </td>
		  

		
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

<td>High Qualifacation </td>
<td><select name="hq" class="select">
<option>Select</option>
<option value="Bed" <?php if($rowteacher['hq']=="Bed") { ?> selected="selected" <?php }  ?> >B.ed</option>
<option value="Ded" <?php if($rowteacher['hq']=="Ded") { ?> selected="selected"<?php } ?> >D.ed</option>
</select>
</td>
</tr>
<tr class="table">
<td>Contact Number <span style="color:#FF0000">*</span></td>
<td><input name="cont" type="text"  id="txtname" size="40" class="tb5" /></td>
<td>Address <br>&nbsp;<br>&nbsp;</td>
<td><textarea name="add" cols="25" class="tb4" rows="3" ></textarea></td>
</tr>

<tr class="table">
<td>Pan No</td>
<td><input name="sname" type="text"  id="txtname" size="40" class="tb5" /></td>
<td>Designation<br>&nbsp;<br>&nbsp;</td>
<td><input name="designation" type="text"  id="txtname" size="40" class="tb5" /></td>
</tr>


<tr class="table">
<td>EPF No</td>
<td><input name="role" type="text"  id="txtname" size="40" class="tb5" /></td>
<td>Emergency No.<br>&nbsp;<br>&nbsp;</td>
<td><input name="eno" type="text"  id="txtname" size="40" class="tb5" /></td>
</tr>


</tr>
<tr class="table" >
<td></td>
<td><input type="submit" name="Submit" value="Next" style="width:150px" /></td>
<td></td>
<td>&nbsp;</td>
</tr>
</table>


<?php
}
else
{
?>
<div style="width:1200px;">
<div style="width:70%; float:left;">
<table border="0"  >
<tr class="table" >
<td>Employee type </td>
<td><select name="typ" class="select">
<option>Staff Type</option>
<option value="teaching" <?php if($rowteacher['staff_typ']=="teaching") { ?> selected="selected" <?php }  ?> >Teaching</option>
<option value="nonteaching" <?php if($rowteacher['staff_typ']=="nonteaching") { ?> selected="selected"<?php } ?> >Non-teaching</option>
<option value="grd" <?php if($rowteacher['staff_typ']=="grd") { ?> selected="selected"<?php } ?> >Group D</option>


</select>
</td>
<td>Date of Birth<span style="color:#FF0000">*</span></td>
<td><input name="txtdob" id="demo2" type="text" class="tb5" value="<?php echo $rowteacher['teacher_dob'];   ?>" size="40" />
<a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
</tr>
<tr class="table" >
<td>Employee Name<span style="color:#FF0000">*</span> </td>
<td><input name="txtname" type="text" value="<?php echo $rowteacher['teacher_name'];   ?>" id="txtname" size="40" class="tb5" /></td>
<td>Date of joining<span style="color:#FF0000">*</span></td>
<td><input name="txtdoj1" id="demo2" type="text" class="tb5" value="<?php echo $rowteacher['teacher_doj'];   ?>" size="40" />
<a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
</tr>

<tr class="table" >
<td width="164"><p>Father/Husband name </p></td>
<td width="287"><input name="fnm" type="text" value="<?php echo $rowteacher['father_name'];   ?>" id="txtname" size="40" class="tb5" /></td>
<td>Email Id </td>
<td>
<input name="mrt" type="text" value="<?php echo $rowteacher['maritial_status'];   ?>" id="txtname" size="40" class="tb5" />
</td>

</tr>
<tr class="table" >
<td>Gender</td>
<td>
<input type="radio" name="gender" id="input"  value="male"  checked="checked"<?php if($rowteacher['teacher_gender']=="male")  { ?> checked="checked"  <?php }   ?> />
<label class="check_label">Male</label>
<input type="radio" name="gender" id="input" value="female" <?php if($rowteacher['teacher_gender']=="female") { ?> checked="checked"  <?php } ?> />
<label class="check_label" >Female</label>
</td>
<td>Qualifacation</td>
<td>
<input name="select" type="text" value="<?php echo $rowteacher['teacher_qualifi'];   ?>" id="txtname" size="40" class="tb5" /></td>


</tr>
<tr class="table">
<td>Contact Number</td>
<td><input name="cont" type="text"  id="txtname" size="40" value="<?php echo $rowteacher['contact']; ?>" class="tb5" /></td>
<td>Address <br>&nbsp;<br>&nbsp;</td>
<td><textarea name="add" cols="30" rows="3"><?php echo $rowteacher['address']; ?></textarea></td>
</tr>

<tr class="table" >
<td>Status</td>
<td>
<select name="status" class="select">
<option>Select</option>
<option value="Active" <?php if($rowteacher['status']=="Active") { ?> selected="selected" <?php } ?>>Active</option>
<option value="Inactive" <?php if($rowteacher['status']=="Inactive") { ?> selected="selected" <?php } ?> >Inactive</option>
</select>
</td>
<td>High Qualifacation </td>
<td>
<select name="hq" class="select">
<option>Select</option>
<option value="Bed" <?php if($rowteacher['hq']=="Bed") { ?> selected="selected" <?php }  ?> >B.ed</option>
<option value="Ded" <?php if($rowteacher['hq']=="Ded") { ?> selected="selected"<?php } ?> >D.ed</option>
</select>
</td>
</tr>

<tr class="table">
<td>Pan No</td>
<td><input name="sname" type="text"  id="txtname" value="<?php echo $rowteacher['sname']; ?>" class="tb5" /></td>
<td>Designation<br>&nbsp;<br>&nbsp;</td>
<td><input name="designation" type="text"  id="txtname" value="<?php echo $rowteacher['designation']; ?>" class="tb5" /></td>
</tr>


<tr class="table">
<td>EPF No</td>
<td><input name="role" type="text"  id="txtname" value="<?php echo $rowteacher['role']; ?>" class="tb5" /></td>
<td>Emergency No.<br>&nbsp;<br>&nbsp;</td>
<td><input name="eno" type="text"  id="txtname" value="<?php echo $rowteacher['eno']; ?>" class="tb5" /></td>
</tr>


<tr class="table" >
<td>&nbsp;</td>
<td><input type="submit" name="Update" value="Update" /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table> 
</div>

<div style="width:25%; margin-left:10px; float:left; height:160px;">

		<img src="uploads/<?php echo $rowteacher["timg"]; ?>" style="border-radius:5px; width:105px; height:125px;">
		
		<input type="file" name="file">
		<input type="hidden" name="imgid" value="<?php echo $rowteacher["teacher_id"]; ?>">
	    <input type="submit" name="updateimg" value="Update Image" style="width:160px">
		
</div>

</div>
<?php
}
?>
</form>
</td>
</tr>
</table>
</div>

              <br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  