<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:500px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
    font-style: normal;
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
.head{}


#myform{ font-size:16px; padding:20px; margin-left:50px;}
</style>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<link rel="stylesheet" href="thumbnailviewer.css" type="text/css" />
<script src="thumbnailviewer.js" type="text/javascript"></script>
<script type="text/javascript">
 function validate()
{
 if( document.myForm.txtclass.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>



                    <?php
                    if(isset($_REQUEST["mottc"]))
                    {	
				    $id=$_POST["sid"].'tc';
					$name = $id.$_FILES['tc_filetc']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename($_FILES['tc_filetc']['name']); 
			        if(move_uploaded_file($_FILES['tc_filetc']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set tcimg='$name',tcyes='Yes' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
?>


   <?php
                    if(isset($_REQUEST["dobup"]))
                    {	
                    $id=$_POST["sid"].'dob';
					$name = $id.$_FILES['tc_file']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['tc_file']['name']); 
			        if(move_uploaded_file($_FILES['tc_file']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set dimg='$name',dyes='Yes' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
   ?>
   
   
    <?php
                    if(isset($_REQUEST["adhaarup"]))
                    {	

				    $id=$_POST["sid"].'adh';
					$name = $id.$_FILES['tc_filea']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['tc_filea']['name']); 
			        if(move_uploaded_file($_FILES['tc_filea']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set aimg='$name',ayes='Yes' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
   ?>
   
   
 
 <?php
                    if(isset($_REQUEST["reportup"]))
                    {	
                    $id=$_POST["sid"].'re';
					$name = $id.$_FILES['tc_filer']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['tc_filer']['name']); 
			        if(move_uploaded_file($_FILES['tc_filer']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set simg='$name',ryes='Yes' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
   ?>
 
 
 <?php
                    if(isset($_REQUEST["fatup"]))
                    {	

				    $id=$_POST["sid"].'fid';
					$name = $id.$_FILES['tc_filef']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['tc_filef']['name']); 
			        if(move_uploaded_file($_FILES['tc_filef']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set fidimg='$name',fidyes='Yes' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
   ?>
 
 <?php
                    if(isset($_REQUEST["motup"]))
                    {	

				    $id=$_POST["sid"].'mid';
					$name = $id.$_FILES['tc_filem']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['tc_filem']['name']); 
			        if(move_uploaded_file($_FILES['tc_filem']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set midimg='$name',midyes='Yes' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
   ?>
   
   
   <?php
                    if(isset($_REQUEST["motother"]))
                    {	
					$otnm = $_POST["otnm"];
                    $id=$_POST["sid"].'ot';
					$name = $id.$_FILES['tc_fileo']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['tc_fileo']['name']); 
			        if(move_uploaded_file($_FILES['tc_fileo']['tmp_name'], $target_path)) 
					{ 
				    $updateimg=mysqli_query($con,"update student set otimg='$name',otyes='Yes',otnm='$otnm' where student_id='".$_POST['sid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admadd&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}
   ?>
   
   
 
 <?php
 
 
 if(isset($_GET["upstudid"]))
{ 
	//$res_login=mysqli_query($con,"select * from login where uid='".$_GET["upstudid"]."'")or die(mysqli_error());
	//$row_login1=mysqli_fetch_array($res_login);
	$res_stud=mysqli_query($con,"select * from student where student_id='".$_GET["upstudid"]."' and student_session='".$_SESSION['session']."'")or die(mysqli_error());
	$rowstud=mysqli_fetch_array($res_stud);

} 
?>


<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
<script type="text/javascript">
function showMe(){
var ids=['didfv1','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='mype'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}


function showMe2(){
var ids=['TextBoxDiv1','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='mype2'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}


</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Student Admission.png" /><a href="./?pageid=current_student">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>

<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Admission form</h2></center>

</div>
<div class="col_4">
<div class="form-style-2-heading" style="text-transform:uppercase; font-style:normal;">

<a href="<?php echo $var."edit_admission&upstudid=".$_GET['upstudid']; ?>">
<div style="height:30px; padding:5px;background-color: #c7baba;color:#0a6f3d;width:355px;float:left; font-size:20px; font-weight:normal; border-top-left-radius:7px;border-top-right-radius:7px;">
<span style="margin-left:50px; position:absolute;margin-top:7px;">Student information</span>
</div>
</a>

<a href="<?php echo $var."edit_admpg&upstudid=".$_GET['upstudid']; ?>">
<div style="height:30px;padding:5px;background-color: #c7baba;color:#0a6f3d;font-size:20px;width:355px;float:left;font-weight:normal;border-top-left-radius:7px;border-top-right-radius:7px; margin-left:10px;">
<span style="margin-left:19px; position:absolute;margin-top:7px;">parent/guardian information</span>
</div>
</a>

<a href="<?php echo $var."edit_admadd&upstudid=".$_GET['upstudid']; ?>">
<div style="height:30px; padding:5px;background-color:#CC3300;color:#FFFFFF;font-size:20px;  width:355px;float:left;font-weight:normal;border-top-left-radius:7px;border-top-right-radius:7px; margin-left:10px;">
<span style="margin-left:45px; position:absolute;margin-top:7px;">additional information</span>
</div>
</a>
<br clear="all" />
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
	              if(!empty($msg))
		          {
			       ?>
                  <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		          <?php echo $msg; ?> 
		          </div>
                  <?php
                  }
	              ?>
	   
	   
	             <?php 
	             if(!empty($_GET['sumsg']) && empty($error_msg))
		         {
			     ?>
                 <div class="success" style="border:#F00 0px solid; width:320px; margin-left:20px"> 
		         <?php echo $_GET['sumsg']; ?> 
		         </div>
                 <?php
                 }
		 ?>
		   
		   
		 
	   
	    <div style="float:left; width:430px; height:100px; ">
	   
	    
	   
	    <table border="1" cellpadding="0" cellspacing="0" style="width:800px; margin-left:50px;"> 
	    <form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr style="line-height:25px;font-weight:bold" align="center"><td>Sr No</td> <td>Name</td><td>Select</td><td>Image</td><td></td></tr>
		
		<tr align="center" style="line-height:40px;font-weight:bold">
		<td>1.</td><td>DOB Certificate</td><td>
		<input type="checkbox" value="Yes"  name="db" <?php if($rowstud["dyes"]=='Yes') echo 'checked="checked"' ?> required/></td>
		<td><input type="file" name="tc_file" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 200kb</span>
		</td>
		<td><input type="submit"  name="dobup" value="Update DOB" id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		<form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr align="center" style="line-height:40px; font-weight:bold">
		<td>2.</td><td style="">Aadhaar Card</td><td>
		<input type="checkbox" value="Yes"  name="ad" <?php if($rowstud["ayes"]=='Yes') echo 'checked="checked"' ?>  required/></td>
		<td><input type="file" name="tc_filea" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 100kb</span>
		</td>
		<td><input type="submit"  name="adhaarup" value="Update Aadhar" id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		<form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr align="center" style="line-height:40px;font-weight:bold">
		<td>3.</td><td>Report Card</td><td>
		<input type="checkbox" value="Yes"  name="rc" <?php if($rowstud["ryes"]=='Yes') echo 'checked="checked"' ?> required/></td>
		<td><input type="file" name="tc_filer" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 200kb</span>
		</td>
		<td><input type="submit"  name="reportup" value="Update Report Card" id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		<form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr align="center" style="line-height:40px;font-weight:bold">
		<td>4.</td><td>Student Tc</td><td>
		<input type="checkbox" value="Yes"  name="stc" <?php if($rowstud["tcyes"]=='Yes') echo 'checked="checked"' ?> required/></td>
		<td><input type="file" name="tc_filetc" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 100kb</span>
		</td>
		<td><input type="submit"  name="mottc" value="Update Tc" id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		
		<form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr align="center" style="line-height:40px;font-weight:bold">
		<td>5.</td><td>Father Id Proof</td><td>
		<input type="checkbox" value="Yes"  name="fp" <?php if($rowstud["fidyes"]=='Yes') echo 'checked="checked"' ?> required/></td>
		<td><input type="file" name="tc_filef" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 100kb</span>
		</td>
		<td><input type="submit"  name="fatup" value="Update Father Id" id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		<form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr align="center" style="line-height:40px;font-weight:bold">
		<td>6.</td><td>Mother Id Proof</td><td>
		<input type="checkbox" value="Yes"  name="mp" <?php if($rowstud["midyes"]=='Yes') echo 'checked="checked"' ?> required/></td>
		<td><input type="file" name="tc_filem" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 100kb</span>
		</td>
		<td><input type="submit"  name="motup" value="Update Mother Id" id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		<form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data" style="font-weight:bold">  
		<tr align="center" style="line-height:40px;font-weight:bold">
		<td>7.</td><td>Other Document</td><td>
		<input type="checkbox" value="Yes"  name="ot" <?php if($rowstud["otyes"]=='Yes') echo 'checked="checked"' ?> required/> 
		</td>
		<td>
		<input type="file" name="tc_fileo" required/><input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
		<span style="color:#CC0000; font-size:12px; margin-left:-100px;">Max. Size 100kb</span>
		<br /><input type="text" name="otnm" style="width:150px; margin-left:-115px" placeholder='Document Name' value="<?php echo $rowstud["otnm"]; ?>"/>
		</td>
		<td><input type="submit"  name="motother" value="Update Other Doc." id="add" style="width:155px; height:25px;margin-left:0px;padding: 5px;" /></td>
		</tr>
		</form>
		
		
		
		</table>
		</div>
		
		
		
	   
		
	   

		
	<!--   end-->
		
     
	   <br clear="all" />
	   <br clear="all" />
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   