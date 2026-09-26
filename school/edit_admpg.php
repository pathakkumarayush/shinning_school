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
if(isset($_REQUEST["update_student"]))
{	
   			  
$res_up=mysqli_query($con,"update student set student_fname='".$_POST["txtfatname"]."',student_contactno='".$_POST["txtmobile"]."',femail='".$_POST["femail"]."',student_address='".$_POST["address"]."',student_session='".$_SESSION["session"]."',f_prof='".$_POST['fprofession']."',f_quali='".$_POST['fqualification']."',f_off_add='".$_POST['oaddress']."',f_tell_no_off='".$_POST['offadd']."',m_name='".$_POST['m_name']."',m_prof='".$_POST['mprofession']."',m_off_add='".$_POST['moaddress']."',m_off_tel='".$_POST['mofftel']."',m_quali='".$_POST['mqualification']."',memail='".$_POST['memail']."',presult='".$_POST['presult']."',pn='".$_POST['pn']."' where student_id='".$_POST["sid"]."' and student_session='".$_SESSION['session']."'");
	
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admpg&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}

                    if(isset($_POST['updateimgf']))
			        {
				    $id=$_POST["fid"].'f';
					$name1 = $id.$_FILES['filef']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['filef']['name']); 
			        if(move_uploaded_file($_FILES['filef']['tmp_name'], $target_path)) 
					{ 
					$updateimg=mysqli_query($con,"update student set fimg='$name1' where student_id='".$_POST['fid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
			        }
					
					if(isset($_POST['updateimgm']))
			        {
				    $id=$_POST["mid"].'m';
					$name1 = $id.$_FILES['filem']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['filem']['name']); 
			        if(move_uploaded_file($_FILES['filem']['tmp_name'], $target_path)) 
					{ 
					$updateimg=mysqli_query($con,"update student set mimg='$name1' where student_id='".$_POST['mid']."' and student_session='".$_SESSION['session']."'");
				    $msg="Image updated Successfully";	
					}
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
<div style="height:30px; padding:5px; color:#0a6f3d;background-color:#c7baba;width:355px;float:left; font-size:20px; font-weight:normal; border-top-left-radius:7px;border-top-right-radius:7px;">
<span style="margin-left:50px; position:absolute;margin-top:7px;">Student information</span>
</div>
</a>

<a href="<?php echo $var."edit_admpg&upstudid=".$_GET['upstudid']; ?>" >
<div style="height:30px;padding:5px;background-color:#CC3300;color:#fff;font-size:20px;width:355px;float:left;font-weight:normal;border-top-left-radius:7px;border-top-right-radius:7px; margin-left:10px;">
<span style="margin-left:19px; position:absolute;margin-top:7px;">parent/guardian information</span>
</div></a>

<a href="<?php echo $var."edit_admadd&upstudid=".$_GET['upstudid']; ?>">
<div style="height:30px; padding:5px; background-color: #c7baba;color:#0a6f3d;font-size:20px;  width:355px;float:left;font-weight:normal;border-top-left-radius:7px;border-top-right-radius:7px; margin-left:10px;">
<span style="margin-left:45px; position:absolute;margin-top:7px;">additional information</span>
</div>
</a>

<br clear="all" />
</div>
  <form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());" style="font-weight:bold">
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
				
		<div style="float:left;">		
				
		      
	  <table> 
	  <tr><td>Father Name</td> 
	  <td> <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
	  <input name="txtfatname" type="text" id="txtfatname" value="<?php echo $rowstud["student_fname"]; ?>"  class="tb5"  /></td> 
	  <td>&nbsp;&nbsp;Mother Name</td> 
	  <td><input name="m_name" type="text" value="<?php echo $rowstud["m_name"]; ?>" class="tb5"  /></td>
	  </tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  <tr>
	  <td>Father Qualification </td>
	  <td><input type="text" name="fqualification"  id="txtname" value="<?php echo $rowstud["f_quali"]; ?>" class="tb5" /></td> 
	  <td>&nbsp;&nbsp;Mother Qualification </td>
	  <td><input type="text" name="mqualification"  id="txtname" value="<?php echo $rowstud["m_quali"]; ?>" class="tb5" /></td>
	  </tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  <tr>
	  <td>Father Occupation</td>
	  <td><input type="text" name="fprofession"  value="<?php echo $rowstud["f_prof"]; ?>" class="tb5" /></td>
	  <td>&nbsp;&nbsp;Mother Occupation</td> 
	  <td> <input name="mprofession" type="text" value="<?php echo $rowstud["m_prof"]; ?>" class="tb5"  /></td>
	  </tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  <tr>
	  <td>Father Mobile No</td> 
	  <td> <input name="txtmobile" type="text" maxlength="10" value="<?php echo $rowstud["student_contactno"]; ?>" class="tb5"  /></td>
	  <td>&nbsp;&nbsp;Mother Mobile No</td>
	  <td><input name="offadd" type="text" maxlength="10" value="<?php echo $rowstud["f_tell_no_off"]; ?>" class="tb5"  /></td> 
	  </tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	     <tr>
		 <td>Father Email Id</td> 
		 <td><input name="femail" type="text" value="<?php echo $rowstud["femail"]; ?>"  class="tb5"  /></td>
		 <td>&nbsp;&nbsp;Mother Email Id</td> 
	     <td><input name="memail" type="text" value="<?php echo $rowstud["memail"]; ?>" class="tb5"  /></td>
		 </tr>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr>
	  <td>Emergency Mobile</td> 
	  <td><input type="text" name="presult" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['presult']; if(isset($_GET["upstudid"])){echo $rowstud["presult"];} ?>" ></td>
	  
	  <td>ADDRESS,(HOUSE <BR />BUILDING NO)</td> 
	  <td><textarea cols="23"  name="address"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['address']; if(isset($_GET["upstudid"])){echo $rowstud["student_address"];} ?></textarea></td>
	  
	  
	   </tr>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   
	   <td>&nbsp;&nbsp;LOCALITY/TOWN</td> 
	  <td>
	  <input type="text" name="moaddress" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?>">
	  </td>
	   <td>City</td> 
	   <td>
	    <input type="text" name="oaddress" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['oaddress']; if(isset($_GET["upstudid"])){echo $rowstud["f_off_add"];} ?>">
	   </td>
	 
	  
	   
	   </tr>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   <td>&nbsp;&nbsp;State</td> 
	   <td>
	    <input type="text" name="mofftel" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_tel"];} ?>">
	   </td>
	  <td>Pin Code</td>
	  <td><input name="pn" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['pn']; if(isset($_GET["upstudid"])){echo $rowstud["pn"];} ?>" size="40" maxlength="20" class="tb5"  /></td> 
	    </tr>
		
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	 
		 
	
		</table>
	  
	   
	  
	  <table>
	  
	  <tr>
           <td>&nbsp;</td>
		   <td></td>
           <td>
           <?php
		   if(isset($_GET["upstudid"]))
		   {
			   ?>
			   <input type="submit"  name="update_student" id="add" value="Update Information" style="width:170px;margin-left:170px" /> 
               <?php
		   }
		   else
		   {
		   ?>
           <input type="submit" name="add_student" id="add" value="Add" style="width:120px;margin-left:350px" />
           <?php } ?></td>
		    <td></td>
         </tr>
		 <tr>
	    <td></td>
		 <td>
		 
		  
			</td>  
			 <td></td> <td></td> 
		 </tr>
      
	  </table>
		
	  </div>
	    <div style="float:left; width:200px; height:400px;  margin-left:70px;">
	    <img src="upload/<?php echo $rowstud["fimg"]; ?>" style="border-radius:5px; width:105px; height:125px;">
		<input type="file" name="filef">
		<input type="hidden" name="fid" value="<?php echo $rowstud["student_id"]; ?>">
	    <input type="submit" name="updateimgf" value="Update Father Image" style="width:172px">
		 <br clear="all" /> <br clear="all" /><br clear="all" />
		
		<img src="upload/<?php echo $rowstud["mimg"]; ?>" style="border-radius:5px; width:105px; height:125px;">
		<input type="file" name="filem">
		<input type="hidden" name="mid" value="<?php echo $rowstud["student_id"]; ?>">
	    <input type="submit" name="updateimgm" value="Update Mother Image" style="width:172px">
		 </div>
		 <br clear="all" />
		
	<!--   end-->
		
       </form>
	   <br clear="all" />
	   <br clear="all" />
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   