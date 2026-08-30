 <script type="text/javascript" src="datetimepicker.js"></script>
<?php
session_start();
require_once("../db.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require_once("meta.php");
?>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Smart Erp</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script language="javascript" type="text/javascript" >
	function showStudent(str)
{


if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
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
    location.reload();
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","getstudent.php?id="+str,true);
xmlhttp.send();

}	</script>
	<script type="text/javascript">
	function valid()
	{
	if( ! confirm("Are you sure you want to delete this book") )
	{
	 return false;
	
	}
	
	}
	
	
	</script>
			
	
	<script type="text/javascript">
	function validation()
	{
	 var nm=document.f2.nm.value;
	 var sid=document.f2.sid.value;
	 var doe=document.f2.doe.value;
	  var due=document.f2.due.value;
	 
	 
	 if(nm=='')
	 {
	 alert("enter name ");
	 document.f2.nm.focus();
	 return false;
	 }
	 
	  if(sid=='')
	 {
	 alert("enter student id ");
	 document.f2.sid.focus();
	 return false;
	 }
	 
	  if(doe=='')
	 {
	 alert("enter date of issue ");
	 document.f2.doe.focus();
	 return false;
	 }
	 
	  if(due=='')
	 {
	 alert("enter due date ");
	 document.f2.due.focus();
	 return false;
	 }
	 
	 
	 
	 
	}
	</script> 	
    
	<script type="text/javascript">
	function validations()
	{
	var nm1=document.f4.nm1.value;
	var sid1=document.f4.sid1.value;
	var doi1=document.f4.doi1.value;
	var due1=document.f4.due1.value;
	
	if(nm1=='')
	{
	alert("enter name");
	document.f4.nm1.focus();
	return false;
	}
	
	if(sid1=='')
	{
	alert("enter employee id");
	document.f4.sid1.focus();
	return false;
	}
	
	if(doi1=='')
	{
	alert("enter issue date");
	document.f4.doi1.focus();
	return false;
	}
	
	if(due1=='')
	{
	alert("enter due date");
	document.f4.due1.focus();
	return false;
	}
	
	
	
	}
	</script>
		
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="#">Smart Erp</a></h1>
			<div id="top-navigation">
				Welcome <strong><?php echo $_SESSION['uid']; ?></strong>
				<span>|</span>
				
				<span>|</span>
				<a href="#">Profile Settings</a>
				<span>|</span>
				<a href="logout.php">Log out</a>
			</div>
		</div>
	
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<?php
		 require_once("includes/menu.php");
		?>
		<!-- End Main Nav -->
	</div>

<div id="container">
 
	<div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
				
				    

				
				
				<!-- Box -->
			        <div style="margin-top:15px;" >
				 <table width="871" height="394" border="0"  >
  <tr>
    <td height="91"><table width="899" height="150" border="0">
      <tr>
        <td width="176" height="125"> <img src="css/images/library.png" width="177" height="86" /> </td>
        <td width="574" class="item1" >Library <br />
          <br />
          <span  class="item" > Issue book </span></td>
        <td width="135" style="font-family:Arial, Helvetica, sans-serif; font-size: 24px; color:#CCCCCC;" ><a href="issuebook.php"><input type="submit" name="Submit" value="back"  class="buttons" />
            </a> </td>
      </tr>
      <tr>
        <td height="10" colspan="3" style="margin-right:-150px;" >  <hr size="3" color="#FF0000" />   </td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td>
	
	<?php
	$qry="select * from addbook where bookno='".$_SESSION['bid']."' ";
	$result=mysqli_query($con,$qry);
    $row=mysqli_fetch_array($result);
	?>
	
	
	
	
	<form name="f2" method="post" action="issuebooksave.php" enctype="multipart/form-data" onSubmit="return validation();" >
	<table width="898" border="0">
  <tr class="table" >
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td width="36" >&nbsp;</td>
    <td width="190">Book number </td>
    <td width="344"><input class="tb5" type="text" name="bno" value="<?php echo $row["bookno"]; ?>" readonly="" /></td>
    <td width="266">&nbsp;</td>
    <td width="40">&nbsp;</td>
  </tr>
  <tr  class="table" >
    <td>&nbsp;</td>
    <td>Book title</td>
    <td><input  class="tb5" type="text" name="title" value="<?php echo $row["title"]; ?>" readonly="" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
		 <tr  class="table" >
    <td width="36">&nbsp;</td>
                <td width="190">Class<span class="textfieldRequiredMsg"></span></td>
              <?php
			  
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
				
			 ?>
            <td width="344"><select name="class" class="tb5" style="width:230px" onChange="showStudent(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"  <?php if($rclass['class_id']==$_SESSION['student_class']) { ?> selected="selected"   <?php   }   ?>  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
            
            </select>
			<td width="266">&nbsp;</td>
			<td width="40">&nbsp;</td>
              </td>
             </tr>
			
           <?php
		     $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_SESSION['student_class']."'");
			
			 
$rclass=mysqli_fetch_array($class);
 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$rclass['class']."' order by student_name Asc");
		   
		   ?>
			  <tr class="table" >
			   <td width="36">&nbsp;</td>
			  <td width="190">Student Name</td> 
			 <td width="344"><select name="scholarno1" class="select" style="width:125px" >
<option>Select Student</option>
<?php

  while($row=mysqli_fetch_array($search))
  {
  ?>
  <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name']; ?></option>  
  <?php
  }
?>

</select></td>
<td width="266">&nbsp;</td>
			<td width="40">&nbsp;</td>
              </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>Issue date </td>
    <td> <input  class="tb5" type="Text" name="doe" id="demo1" ><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
              <span class="descriptions">pick a date..</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>Due date </td>
    <td><input  class="tb5" type="Text" name="due" id="demo2" value="" ><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
              <span class="descriptions">pick a date..</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit2" value="issue book" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
	
	<?php
	
mysqli_close($con);
?>	
	
                </div>
                    <!-- Box Head -->
					              
		
	
					<!-- End Box Head -->	

					<!-- Table -->
		
					<!-- Table -->
	
	
	
					
		  </div>
				<!-- End Box -->
				
				<!-- Box -->
				
				
				
				
				
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
</div>
<br><br><br><br> 
<!-- Footer -->
	<div  style="width:986px;height:44px; margin-left:-180px; margin-bottom:-2px; padding-left:178px;padding-right:178px;background:url(css/images/footer.gif); line-height:44px; color:#fff;">
		<span class="left">&copy; 2013 -Smart Erp</span>
		<span class="right">
			Design by <a href="http://vmsoftech.com" target="_blank" style="color:#fff" title="http://vmsoftech.com">VM Softech</a>
		</span>
	</div>
</div>
<!-- End Footer -->	
</body>
</html>