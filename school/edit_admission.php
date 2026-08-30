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
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
        $(function () {
            $("#ddlPassport").change(function () {
                if ($(this).val() == "Other") {
                    $("#dvPassport").show();
                } else {
                    $("#dvPassport").hide();
                }
            });
        });
    </script>
	
	<script type="text/javascript">
        $(function () {
            $("#ddlPassportt").change(function () {
                if ($(this).val() == "Other") {
                    $("#dvPassportt").show();
                } else {
                    $("#dvPassportt").hide();
                }
            });
        });
    </script>
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
           
	          $famnnt = $_POST['famt'] ?? 0;
			  
	          if($_POST["section"]=="Select Section")
	          {
	           $_POST["section"]="";
	          }
			 
		
		      if($_POST["student_type"]=="New")
	          {
	          $t='Yes'; 
	          }
			  else
			  {
			  $t='No';
			  }
			  
$res_up=mysqli_query($con,"update student set student_id='".$_POST["sid"]."',student_scholar='".$_POST["scholar"]."',student_name='".$_POST["txtname"]."',student_gender='".$_POST["gender"]."',student_dob='".$_POST["txtdob"]."',student_session='".$_SESSION["session"]."',student_rollno='".$_POST["txtrno"]."',mother_tong='".$_POST['mothertong']."',religion='".$_POST['religion']."',caste='".$_POST['caste']."',pschool='".$_POST['prev_school']."',reason_change='".$_POST['reas_school']."',subj_req='".$_POST['subject']."',is_bro='".$_POST['is_bro']."',b1='".$_POST['b1']."',c1='".$_POST['c1']."',b2='".$_POST['b2']."',c2='".$_POST['c2']."',addmisionfee='$t',student_doj='".$_POST["txtdoj"]."',student_section='".$_POST["section"]."',bus='".$_POST['bus']."',hname='".$_POST['hname']."',std_type='".$_POST['student_type']."',mot='".$_POST['mot']."',student_class='".$_POST['txtclass']."',fid='".$_POST['fid']."',fc='".$_POST['fc']."',famt='$famnnt',bg='".$_POST['bg']."',ork='".$_POST['ork']."',admb1='".$_POST['admb1']."',admb2='".$_POST['admb2']."',orn='".$_POST['orn']."',ochild='".$_POST['ochild']."',rno='".$_POST['rno']."',presult='".$_POST['presult']."',rti='".$_POST['rti']."',family_id='".$_POST['family_id']."',bank='".$_POST['bank']."',class='".$_POST['class']."',hostel_status='".$_POST['hostel_status']."',hostel_name='".$_POST['hostel_name']."',caste_no='".$_POST['caste_no']."',alt_no='".$_POST['alt_no']."',income='".$_POST['income']."',acc_holder='".$_POST['acc_holder']."',pen='".$_POST['pen']."',apaar='".$_POST['apaar']."',school_type='".$_POST['school_type']."' where student_id='".$_POST["sid"]."' and student_session='".$_SESSION['session']."'");
	
?>
 <script type="text/javascript">
             window.location="<?php echo $var."edit_admission&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
 </script>
 <?php
}



                    if(isset($_POST['updateimg']))
			        {
				    $id=$_POST["imgid"];
					$name1 = $id.$_FILES['file']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['file']['name']); 
			        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
					{ 
					$updateimg=mysqli_query($con,"update student set student_img='$name1' where student_id='".$_POST['imgid']."' and student_session='".$_SESSION['session']."'");
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
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>

<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Admission form</h2></center>

</div>
<div class="col_4">
<div class="form-style-2-heading" style="text-transform:uppercase;font-style:normal;">

<a href="<?php echo $var."edit_admission&upstudid=".$_GET['upstudid']; ?>">
<div style="height:30px; padding:5px; background-color:#CC3300;color:#FFFFFF; width:355px;float:left; font-size:20px; font-weight:normal; border-top-left-radius:7px;border-top-right-radius:7px;">
<span style="margin-left:50px; position:absolute;margin-top:7px;">Student information</span>
</div>
</a>

<a href="<?php echo $var."edit_admpg&upstudid=".$_GET['upstudid']; ?>">
<div style="height:30px;padding:5px;background-color: #c7baba;color:#0a6f3d;font-size:20px;width:355px;float:left;font-weight:normal;border-top-left-radius:7px;border-top-right-radius:7px; margin-left:10px;">
<span style="margin-left:19px; position:absolute;margin-top:7px;">parent/guardian information</span>
</div>
</a>

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
		 
		        if(!empty($_GET["upstudid"]))
		         {
	              ?>
        <?php /*?> <div style="border:#FF0000 0px solid; width:150px; margin-top:20px; height:100px">
     
 <img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["student_img"]; ?>" width="100" height="80" style="border-radius:5px">
		<input type="file" name="file">
		<input type="hidden" name="imgid" value="<?php echo $rowstud["student_id"]; ?>">
	    <input type="submit" name="updateimg" value="Update Image" style="width:160px">
		</div>
       <br><br><br><br><?php */?>
	   <?php
	   }
	   ?>
	   
	    <div style="float:left;">
	   
	    <table> 
	   
	  <!-- 
	   <tr><td colspan="4">
	  <div style="background-color:#006633; width:900px; height:35px; margin-top:-30px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	  <span style="margin-top:10px; position:absolute; font-size:16px;">STUDENT DETAILS</span>
	  </div>
	  </td></tr>-->
	   
	  
	   
<tr><td>Form No.</td> <?php
	   $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."'");
	   $rowmax=mysqli_fetch_array($maxid);
	   ?>
	   <td><input name="txtname" type="text" id="txtname" value="<?php  if(!empty($_GET["upstudid"])){ echo $rowstud["student_id"]; } else { echo $rowmax["count(student_id)"]+1; }       ?>" size="40" class="tb5" readonly="readonly" style="width:50px;"/>
	   
	    <select name="school_type" class="select" style="width:144px;" required>
	   <option value="">Select School</option>
	   <option value="Middle" <?php if($rowstud['school_type']=="Middle") { ?> selected="selected" <?php }  ?> >Middle</option>
	   <option value="Higher" <?php if($rowstud['school_type']=="Higher") { ?> selected="selected" <?php }  ?> >Higher</option>
	   </select>
	   </td>
	  
	  
	  <td>&nbsp;&nbsp;Admission No<span style="color:#FF0000">*</span></td> 
		 <td><input name="scholar" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['scholar']; if(isset($_GET["upstudid"])){ echo $rowstud["student_scholar"];   }?>" class="tb5" />
		 
	  
		 
		 </td> 
	  
	  
	 
	   </tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   <td>Student Name</td> <td> 
	  
	   <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
            
			 <input name="txtname" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" class="tb5" /></td> 
			 
	  <td>&nbsp;&nbsp;Gender</td> <td><?php if(isset($_GET["upstudid"])) { ?>
         
         <input type="radio" name="gender" id="input"  value="male" <?php if($rowstud['student_gender']=='male' ) { ?> checked="checked" <?php } ?> />
      <label class="check_label">Male</label>
      <input type="radio" name="gender" id="input" value="female" <?php if($rowstud['student_gender']=='female' ) { ?> checked="checked" <?php } ?> />
      <label class="check_label">Female</label>
      
      <?php } else { ?>
      <input type="radio" name="gender" id="input"  value="male" checked="checked" />
      <label class="check_label">Male</label>
      <input type="radio" name="gender" id="input" value="female" />
      <label class="check_label">Female</label>
      <?php } ?></td>
	   </tr>
	   
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr>
	   
	    <td>Type</td> 
		
		<td>
	     <input type="radio" name="student_type" value="New"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["std_type"]=="New") ) { ?>  checked="checked" <?php } ?> >New
         <input type="radio" name="student_type" value="Old"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["std_type"]=="Old") ) { ?>  checked="checked"<?php   } ?>>Old
	   </td>
		
		
		
	   
	   
	   
	    <td>&nbsp;&nbsp;Category</td> 
		 <td><input type="radio" value="GENERAL " name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="GENERAL")){ ?> checked="checked" <?php }else { ?> checked="checked"  <?php  } ?> >GENERAL
		 <input  type="radio" value="OBC" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="OBC") ) {   ?> checked="checked"  <?php   } ?>  >OBC
		 <input  type="radio" value="ST" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="ST") ) {   ?> checked="checked"  <?php   } ?>  >ST 
		 <input  type="radio" value="SC" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="SC") ) {   ?> checked="checked"  <?php   } ?> >SC </td>
		</tr>
		
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr>
	  <td>RTE</td> 
	   <?php
	    if(!empty($_GET["upstudid"]))
	    {
		?>
		<td> 
		<input type="radio" name="rti" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		<input type="radio" name="rti" value="No" <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		<td> <input type="radio" name="rti" value="Yes" >Yes &nbsp;&nbsp;
		<input type="radio" name="rti" value="No"  checked="checked" >No</td>
		   
	    <?php
		 }
		?>
	    <td>&nbsp;&nbsp;Caste</td> 
		
		
		
		 <td>
          <input type="text" name="hname" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['hname']; if(isset($_GET["upstudid"])){echo $rowstud["hname"]; } ?>"  >
		</td>
		
		</tr>
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		<?php /*?><tr>
		<td><b>Child No </b></td>
		<td><input name="pr_no" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['pr_no']; if(isset($_GET["upstudid"])){ echo $rowstud["pr_no"];   }?>" size="40" class="tb5" /></td>
		 <td>&nbsp;&nbsp;Hostel facility </td> 
		 <td>
<input  type="radio" value="Active" name="hostel_status" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hostel_status"]=="Active") ) { ?> checked="checked" <?php  } ?> >Yes
<input  type="radio" value="Inactive" name="hostel_status" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hostel_status"]=="Inactive") ) { ?> checked="checked"  <?php } ?> checked="checked" >No
		</td>
		</tr><?php */?>
		
		
		
		
		
		
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   
	    <td>Roll No.</td> 
		 <td><input name="rno" type="text" id="txtrno" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['rno']; if(isset($_GET["upstudid"])){echo $rowstud["rno"];} ?>"  class="tb5"  /></td>
		 
		 
		 </tr>
		 <td></td>
			  <td></td>
			  
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			<tr>
		  <td>Student Class<span style="color:#FF0000">*</span></td>
		   <td> <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  ?>
		  <select name="class" class="select" style="width:220px;" required>
             
	       <option value="">Select Class</option>
		   
           <?php
           $res=mysqli_query($con,"select distinct(class) from cla where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$rowstud["class"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
		   
	
       
           <?php
		   }  
           ?>
            </select>
          <?php
		  }
		  
		  else
		  {
		  ?>
		   <select name="class" class="select" style="width:220px;" required>
             
	       <option value="">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from cla where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
           echo "<option>".$rows["class"]."</option>";
           }  
           ?>
           </select>
          <?php
		     }
			 ?></td> 
		   
		   <td>&nbsp;&nbsp;Bus Fee</td> 
		   <td>
	       <input type="radio" name="bus" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["bus"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		   <input type="radio" name="bus" value="No" <?php if(!empty($_GET["upstudid"]) && ($rowstud["bus"]=="No") ) { ?>  checked="checked"<?php   } ?> >No
		   
		   <input type="text" name="hostel_status" class="tb5" style="width:50px;" placeholder="Amount" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['hostel_status']; if(isset($_GET["upstudid"])){echo $rowstud["hostel_status"];} ?>"  class="tb5">
		   <input type="text" name="hostel_name" class="tb5" style="width:50px;" placeholder="Month" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['hostel_name']; if(isset($_GET["upstudid"])){echo $rowstud["hostel_name"];} ?>">
		   
		   
		  </td>
		 </tr>	
	   
	   
	   
	      <tr>
		  <td>Student Class</td>
		  <td> <?php 
		  if(!empty($_GET["upstudid"]))
		  {
		  ?>
		  <select name="txtclass" class="select" style="width:220px;">
             
	       <option value="-1">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from class");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$rowstud["student_class"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
		   
	
       
           <?php
		   }  
           ?>
            </select>
          <?php
		  }
		  
		  else
		  {
		  ?>
		   <select name="txtclass" class="select" style="width:220px;"  onchange="showSection(this.value)">
             
	       <option value="-1">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
           echo "<option>".$rows["class"]."</option>";
           }  
           ?>
           </select>
          <?php
		     }
			 ?></td> 
		<td>&nbsp;&nbsp;Religion</td> 
		<td>
	
		<input type="text" name="mot" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mot']; if(isset($_GET["upstudid"])){echo $rowstud["mot"]; } ?>"  >
		
		</td>
		 </tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr><td>Date Of Birth<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdob"  id="demo1" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdob']; if(isset($_GET["upstudid"])){echo $rowstud["student_dob"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		<td>&nbsp;&nbsp;Date Of Admission<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdoj"  id="demo2" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdoj']; if(isset($_GET["upstudid"])){echo $rowstud["student_doj"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		</tr>
		
			 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			 
			 
			 			
	    <tr>
		<td>DOB In Words</td> 
		<td><input type="text" name="presult" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['presult']; if(isset($_GET["upstudid"])){echo $rowstud["presult"]; } ?>"  ></td>
	    <td>Blood Group</td> 
	   
		
		<td> <?php 
		   if(isset($_GET["upstudid"]))
		   {
		   ?>
		   
		  <select name="bg" class="select" style="width:220px;" requird/>
          <option>Select Blood Group</option>
           <?php
           $res=mysqli_query($con,"select distinct(bg) from bg");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["bg"]; ?>" <?php if($rows["bg"]==$rowstud["bg"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["bg"]; ?></option>
		   <?php
		   }  
           ?>
           </select>
           <?php
		   }
		    else
		   {
		   ?>
		   <select name="bg" class="select" style="width:220px;">
		   <option>Select Blood Group</option>
           <?php
           $res=mysqli_query($con,"select distinct(bg) from bg");
           while($rows=mysqli_fetch_array($res))
           {
            echo "<option>".$rows["bg"]."</option>";
           }  
           ?>
           </select>
           <?php
		    }
			?>
			</td>
		
		
		 </tr>
		 
		
		 
		  
		  
		  
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			
		<tr>
		<td>SSSMID</td> 
		 <td><input type="text" name="religion" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['religion']; if(isset($_GET["upstudid"])){echo $rowstud["religion"]; } ?>"  maxlength="9"></td>
		 
		 
		 
		 <td>Aadhar No.</td> 
		 <td><input name="txtrno" type="text" id="txtrno" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtrno']; if(isset($_GET["upstudid"])){echo $rowstud["student_rollno"];} ?>" maxlength="12"  class="tb5"  /></td>
		 </tr>
		 
			  
			<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>  
			  <tr>
		<td>PEN No</td> 
		   <td><input type="text" name="pen" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['pen']; if(isset($_GET["upstudid"])){echo $rowstud["pen"]; } ?>"  ></td>
		 
		 
		 <td>APAAR ID</td> 
		 <td><input name="apaar" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['apaar']; if(isset($_GET["upstudid"])){echo $rowstud["apaar"];} ?>"  class="tb5"  /></td>
		 </tr>  
			  
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			
		<tr>
		<td>Family Id</td> 
		 <td><input type="text" name="family_id" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['family_id']; if(isset($_GET["upstudid"])){echo $rowstud["family_id"]; } ?>" maxlength="8" ></td>
		 
		 
		 
		 <td>Bank/Branch</td> 
		 <td><input name="bank" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['bank']; if(isset($_GET["upstudid"])){echo $rowstud["bank"];} ?>"  class="tb5"  /></td>
		 </tr>
		 	 
			 
			 
			 
			  
			<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
		 <tr><td>Account No</td>
		  <td><input name="mothertong" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mothertong']; if(isset($_GET["upstudid"])){echo $rowstud["mother_tong"];} ?>"  class="tb5"  /></td></td>
		 
		 <td>IFSC Code<span style="color:#FF0000"></span></td> 
		 <td><input name="fid" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['fid']; if(isset($_GET["upstudid"])){ echo $rowstud["fid"];  }?>" class="tb5" /></td> 
		   </tr>  
			
			
			<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
		 <tr><td>Account Holder</td>
		  <td><input name="acc_holder" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['acc_holder']; if(isset($_GET["upstudid"])){echo $rowstud["acc_holder"];} ?>"  class="tb5"  /></td></td>
		 
		 <td>Caste Cer. No.<span style="color:#FF0000"></span></td> 
		 <td><input name="caste_no" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['caste_no']; if(isset($_GET["upstudid"])){ echo $rowstud["caste_no"];  }?>" class="tb5" /></td> 
		   </tr>  
		   
		   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
		 <tr><td>Annual Income</td>
		  <td><input name="income" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['income']; if(isset($_GET["upstudid"])){echo $rowstud["income"];} ?>"  class="tb5"  /></td></td>
		 
		 <td>Alt. Mobile No.<span style="color:#FF0000"></span></td> 
		 <td><input name="alt_no" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['alt_no']; if(isset($_GET["upstudid"])){ echo $rowstud["alt_no"];  }?>" class="tb5" /></td> 
		   </tr>  
			  
			  
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
				
	
		 	
	   <tr>
	   <td>Previous School</td> 
	   <td><input type="text" name="prev_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['pschool']; if(isset($_GET["upstudid"])){echo $rowstud["pschool"];} ?>" ></td> 
	   <td>Enrollment No.</td> 
	   <td><input type="text" name="reas_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['reas_school']; if(isset($_GET["upstudid"])){echo $rowstud["reason_change"];} ?>" ></td>
	   </tr>
      
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	 
	  
	  
	      <tr>
		  <td>Fee Concession</td>
		  <td> 
		  <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  ?>
		  <select name="fc" class="select" style="width:220px;" id="ddlPassport" requird/>
          <?php
          $res=mysqli_query($con,"select distinct(bank) from country");
          while($rows=mysqli_fetch_array($res))
          {
		  ?>
		  <option value="<?php echo $rows["bank"]; ?>" <?php if($rows["bank"]==$rowstud["fc"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["bank"]; ?></option>
		  <?php
		  }  
          ?>
          </select>
		  <?php } ?>
		  
           </td> 
		<td>Concession Amt</td> 
		<td><input name="famt" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['famt'];  if(isset($_GET["upstudid"])){echo $rowstud["famt"];} ?>"  class="tb5" /></td>
		 </tr>
		
		  <?php
		  if(!empty($rowstud['ork']))
		  {
		  ?>
		 <tr>
	     <td>Remark<span style="color:#FF0000">*</span></td>
         <td colspan="3">
	     <input type="text" id="txtPassportNumber" name="ork" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['ork'];  if(isset($_GET["upstudid"])){echo $rowstud["ork"];} ?>"/>
         </td>
	     </tr>
		 <?php }else {?>
		 
		 <tr id="dvPassport" style="display: none">
	     <td>Remark<span style="color:#FF0000">*</span></td>
         <td colspan="3">
	     <input type="text" id="txtPassportNumber" name="ork" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['ork'];  if(isset($_GET["upstudid"])){echo $rowstud["ork"];} ?>"/>
         </td>
	     </tr>
		 <?php }?>
		 
		 
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		 <tr>
		
		<td>If only child <br />of the Parent</td> 
	   <?php
	    if(!empty($_GET["upstudid"]))
	    {
		?>
		<td> 
		<input type="radio" name="ochild" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["ochild"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		<input type="radio" name="ochild" value="No" <?php if(!empty($_GET["upstudid"]) && ($rowstud["ochild"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		<td> <input type="radio" name="ochild" value="Yes" >Yes &nbsp;&nbsp;
		<input type="radio" name="ochild" value="No"  checked="checked" >No</td>
		   
	    <?php
		 }
		?>
	    
	   
	   
	   <td></td>
	    <td></td> 
	   
	   
	   </tr>
		 
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		  
		  
	     <tr>
		 <td colspan="4"><span style="color:#993300;margin-left:0px">If Any Brother or Sister Studying In This School</span>
	     <input type="radio" name="is_bro" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="Yes") ) { ?>  checked="checked" <?php } ?> >Yes
         <input type="radio" name="is_bro" value="No"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="No") ) { ?>  checked="checked"<?php   } ?>>No </td>
		 </tr>
	   
	   
	    </table>
	    
		
	    <table style="margin-left:80px;">
		
		 <tr>
         <td> <label>Class : </label>
		  <select name="c1" class="select" style="width:150px;">
          <option value="">Select Class</option>
          <?php
          $res1=mysqli_query($con,"select distinct(class) from class");
          while($rowss=mysqli_fetch_array($res1))
          {
		  ?>
		  <option value="<?php echo $rowss["class"]; ?>" <?php if($rowss["class"]==$rowstud["c1"] ) { ?> selected="selected" <?php }?>> <?php echo $rowss["class"]; ?>
		  </option>
		  <?php
		  }  
          ?>
          </select>
		  </td>
		  <td>
          <label>Name : </label><input type='text' name="b1" id='textbox1' value="<?php echo $rowstud["b1"]?>"  style="width:137px;"></td>
		  <td><label>Adm. No. : </label><input type='text' name="admb1" id='textbox1' value="<?php echo $rowstud["admb1"]?>" style="width:135px;"></td>
	      </tr>
		  
		  
          <tr>
          <td> <label>Class : </label>
		  <select name="c2" class="select" style="width:170px;">
          <option value="">Select Class</option>
          <?php
          $res1=mysqli_query($con,"select distinct(class) from class");
          while($rowss=mysqli_fetch_array($res1))
          {
		  ?>
		  <option value="<?php echo $rowss["class"]; ?>" <?php if($rowss["class"]==$rowstud["c2"] ) { ?> selected="selected" <?php }?>> <?php echo $rowss["class"]; ?>
		  </option>
		  <?php
		  }  
          ?>
          </select>
		</td>
		<td>
        <label>Name : </label><input type='text' name="b2" id='textbox1' value="<?php echo $rowstud["b2"]?>" style="width:137px;"></td>
		
		<td><label>Adm. No. : </label><input type='text' name="admb2" id='textbox1' value="<?php echo $rowstud["admb2"]?>" style="width:135px;"></td>
	    </tr>
		
		
		<tr>
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr><tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		<td colspan="4">
        <input type="submit"  name="update_student" id="add" value="Update Student" style="width:170px;margin-left:170px" /> 
		</td>
		</tr>
		</table>
	   
	     </div>
		 <div style="float:left; width:150px; height:150px;  margin-left:70px;">
		<img src="upload/<?php echo $rowstud["student_img"]; ?>" style="border-radius:5px; width:105px; height:125px;">
		<input type="file" name="file">
		<input type="hidden" name="imgid" value="<?php echo $rowstud["student_id"]; ?>">
	    <input type="submit" name="updateimg" value="Update Image" style="width:160px">
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

   