<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
<?php
session_start();
require_once("../db.php");
if(!empty($_GET['id']))
{
$getdetail=mysqli_query($con,"select * from fee_detail where student='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 
 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
$expl = explode(",",$rowfeedetail['month']);
		
		 $count1=count($expl);
 }

?>
<html>
<head>
<style type="text/css">
#dialog .ui-widget {
			font-family: inherit;
		}
		
		.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
			color: #ffffff;
		}
		
		.ui-widget-header {
			font-size:1em;
			font-weight: bold;
			font-family: Arial, Helvetica, sans-serif;
			background: #5c9ccc;
			border-color: #4297d7;
			border-width: 1px;
		}
			
		.ui-dialog-title {
			line-height: 1em;
			color: #ffffff;
			font-weight: bold;
		}
		
		.ui-widget-content {
			font-size:1em;
			font-weight: bold;
			font-family: Arial, Helvetica, sans-serif;
			background: #fcfdfd;
			border-color: #a6c9e2;
			border-width: 1px;
		}
		
		/* tab panel bounding box */ 
		.ui-dialog-content {
			font-family: Arial, Helvetica, sans-serif;
			color: #222222;
			font-size:.8em;
			padding: 10px;
		} 
		
		.ui-dialog-buttonpane {
			font-size:.8em;
		}
		.table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>
</head>

<html xmlns="http://www.w3.org/1999/xhtml">
	
	<body>
		
			 <div style="border:#CCC 2px solid; height:1180px; width:auto; margin:0px 0px 0px 40px;">
            
      
	  
	    <div align="center" style="border:#FF0000 0px solid;">
		
		 
		 
		<span style="font-size:22px; color:#990000; margin-left:130px">BHAGWAN SHRICHAND PUBLIC SCHOOL</span><br>
		<span style="font-size:18px; color:#990000; margin-left:150px">CHHINDWARA (M.P.)</span><br>
		<label style="font-size:18px; font-weight:bold;  margin-left:160px"><u>Admission Form</u></label>
		
		</div>
		 <div style=" border:#000000 1px solid; width:auto; margin:0px 0px 0px 0px;"></div>
		 
	
         <div class="table" style="border:#FF0000 0px solid; height:240px; margin:30px 0px 0px 25px">
          <form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
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
         <div style="border:#FF0000 0px solid; width:150px; margin-top:20px; height:100px">
     
	    <img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["student_img"]; ?>" width="100" height="80" style="border-radius:5px">
		<input type="file" name="file">
		<input type="hidden" name="imgid" value="<?php echo $rowstud["student_id"]; ?>">
	    <input type="submit" name="updateimg" value="Update Image" style="width:160px">
		</div>
       <br><br><br><br>
	   <?php
	   }
	   ?>

		
 <table width="500" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
       <tr>
           <td width="30%">Form No</td>
           <td width="70%">
           <?php
		     $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."'");
		      $rowmax=mysqli_fetch_array($maxid);
		   ?>
             <input name="txtname" type="text" id="txtname" value="<?php  if(!empty($_GET["upstudid"])){ echo $rowstud["student_id"]; } else { echo $rowmax["count(student_id)"]+1; }  ?>" size="40" class="tb5" readonly="readonly" style="width:150px" />
           </td>
         </tr>
   
      <tr>
	      <td>Type</td>
		  <td><input type="radio" name="student_type" value="No" <?php if(isset($_GET["upstudid"])){ if($rowstud["addmisionfee"]=="No"){ ?> checked="checked"  <?php } } else { ?>  <?php  } ?>>Existing &nbsp;&nbsp; <input type="radio" name="student_type" value="Yes" <?php if(isset($_GET["upstudid"])){ if($rowstud["addmisionfee"]=="Yes"){ ?> checked="checked"  <?php } } ?> >New </td>
	  </tr>
	  
	   <tr>
           <td width="30%">Name<label style="color:#FF0000">*</label></td>
           <td width="70%">
           <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>"  />
             <input name="txtname" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" class="tb5" style="width:250px" />
           </td>
         </tr>
         
         <tr>
         <td>Gender</td>
         <td><?php if(isset($_GET["upstudid"])) { ?>
         
         <input type="radio" name="gender" id="input"  value="male" <?php if($rowstud['student_gender']=='male' ) { ?> checked="checked" <?php } ?> />
      <label class="check_label">Male</label>
      <input type="radio" name="gender" id="input" value="female" <?php if($rowstud['student_gender']=='female' ) { ?> checked="checked" <?php } ?> />
      <label class="check_label">Female</label>
      
      <?php } else { ?>
      <input type="radio" name="gender" id="input"  value="male"  />
      <label class="check_label">Male</label>
      <input type="radio" name="gender" id="input" value="female" />
      <label class="check_label">Female</label>
      <?php } ?>
      
      </td>
         </tr>
         <tr>
           <td>Date Of Birth<label style="color:#FF0000">*</label></td>
           <td><input name="txtdob"  id="demo1" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdob']; if(isset($_GET["upstudid"])){echo $rowstud["student_dob"];} ?>"  size="40" class="tb5" style="width:250px" /><a href="javascript:NewCal('demo1','ddmmmyyyy')"></a></td>
         </tr>
		  <tr>
           <td>Date Of Joining</td>
           <td><input name="txtdoj"  id="demo2" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdoj']; if(isset($_GET["upstudid"])){echo $rowstud["student_doj"];} ?>"  size="40" class="tb5" style="width:250px" /><a href="javascript:NewCal('demo2','ddmmmyyyy')"></a></td>
         </tr>
		 <tr>
           <td>Admission In Class </td>
           <td>
               <?php 
		   if(isset($_GET["upstudid"]))
		   {
		  
			?>
			 <input name="txtname" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" class="tb5" style="width:250px" />   
			<?php
            }
			else
			   {
		  ?>
		     <input name="txtname" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" class="tb5" style="width:250px" />
          <?php
		     }
			 ?>
		   </td>
         </tr>
		 </table>
		 
		 
		 
		 <table width="500" align="right"   cellspacing="10" style="font-size:16px; margin-top:-25px; margin-left:0px" >
		 <tr>
		 <td>Mother Tongue</td>
           <td> <input name="mothertong" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mothertong']; if(isset($_GET["upstudid"])){echo $rowstud["mother_tong"];} ?>"   size="40" maxlength="10" class="tb5" style="width:250px" /></td>
         </tr>
		 <tr>
		 <td>Religion</td>
		 <td><input type="text" name="religion" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['religion']; if(isset($_GET["upstudid"])){echo $rowstud["religion"]; } ?>" style="width:250px" ></td>
		 </tr>
		 <tr>
		 <td>Caste</td>
		 <td><input  type="radio" value="Genral" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="Genral") ) {   ?> checked="checked"  <?php   } else { ?>   <?php  } ?>  >Genral <input  type="radio" value="obc" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="obc") ) {   ?> checked="checked"  <?php   } ?>  >Obc <input  type="radio" value="St" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="St") ) {   ?> checked="checked"  <?php   } ?>  >St <input  type="radio" value="Sc" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="Sc") ) {   ?> checked="checked"  <?php   } ?> >Sc </td>
		 </tr>
		    <tr>
           <td>Class <label style="color:#FF0000">*</label></td>
           <td>
               <?php 
		   if(isset($_GET["upstudid"]))
		   {
			echo $rowstud['student_class'];  
            }
			else
			   {
		  ?>
		    <input name="txtname" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" class="tb5" style="width:250px" />
          <?php
		     }
			 ?>
		   </td>
         </tr>
         
		  
		 </table>
		 <table width="1090" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
        <tr>
		   <td>Previous School</td>
		   <td><input type="text" name="prev_school" class="tb5" style="width:450px" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['prev_school']; if(isset($_GET["upstudid"])){echo $rowstud["prev_school"];} ?>" ></td>
		</tr>
		
		<tr>
		   <td>Reason For Change Of School</td>
		   <td><input type="text" name="reas_school" class="tb5" style="width:450px" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['reas_school']; if(isset($_GET["upstudid"])){echo $rowstud["reason_change"];} ?>" ></td>
		</tr>
		<tr>
		   <td>Subject Required For Class 11th & 12th</td>
		   <td><input type="text" name="subject" class="tb5" style="width:450px" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['subject']; if(isset($_GET["upstudid"])){echo $rowstud["subj_req"];} ?>" ></td>
		</tr>
		</table>
		<table width="850" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
          <tr>
           <td>Father Name</td>
           <td><input name="txtfatname" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtfatname']; if(isset($_GET["upstudid"])){echo $rowstud["student_fname"];} ?>" size="40" class="tb5" style="width:250px" /></td>
        
            <td width="150">Father Profession & Designation </td>
             <td><input type="text" name="fprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["fprofession"]))) echo $_POST['fprofession']; if(isset($_GET["upstudid"])){echo $rowstud["f_prof"];} ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Father Qualification </td>
             <td><input type="text" name="fqualification" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['fqualification']; if(isset($_GET["upstudid"])){echo $rowstud["f_quali"];} ?>" class="tb5" /></td>
          
           <td>Residential Address</td>
           <td><textarea cols="33"  name="address"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['address']; if(isset($_GET["upstudid"])){echo $rowstud["student_address"];} ?></textarea></td>
         </tr>          
        
		<tr>
           <td>Office Address</td>
           <td><textarea cols="33"  name="oaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['oaddress']; if(isset($_GET["upstudid"])){echo $rowstud["f_off_add"];} ?></textarea></td>
        
		 <td>Tel No(Res)</td>
           <td>
             <input name="txtmobile" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtmobile']; if(isset($_GET["upstudid"])){echo $rowstud["student_contactno"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>
		<tr>
		 <td>Tel No(off)</td>
           <td>
             <input name="offadd" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['offadd']; if(isset($_GET["upstudid"])){echo $rowstud["f_tell_no_off"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>
		 
         
          <tr>
           <td>Email</td>
           <td><input name="txtemail" type="text" id="txtemail" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtemail']; if(isset($_GET["upstudid"])){echo $rowstud["student_email"];} ?>" size="40" class="tb5" style="width:250px" /></td>
         </tr>
		 
		
           <tr>
           <td>Mother Name</td>
           <td><input name="m_name" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['m_name']; if(isset($_GET["upstudid"])){echo $rowstud["m_name"];} ?>" size="40" class="tb5" style="width:250px" /></td>
         </tr>
        </table>
		<?php
		 if(!empty($_GET["upstudid"]))
		 {
		 if(!empty($_GET["upstudid"]) && ($rowstud["m_work"]=="No") ) {   ?>
		
		
		 <table width="500" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
		  <tr>
		  <td>Is Mother Working</td>
		  <td><input type="radio" name="mype" value="Yes" onClick="showMe()">Yes
<input type="radio" name="mype" value="No" onClick="showMe()">No
</td>
         </tr>
		  </table>
		   <table width="1090" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid; display:none" class="row" id="didfv1" style="display:none">
		   <tr>
		 
            <td width="150">Mother Profession & Designation </td>
             <td><input type="text" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"]; } ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Mother Qualification </td>
             <td><input type="text" name="mqualification" style="width:250px;"  id="txtname" value=" <?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"]; } ?>" class="tb5" class="tb5" /></td>
            </tr>
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
         </tr>
		<tr>
		 <td>Tel No(Off)</td>
           <td>
             <input name="mofftel" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_tel"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>

		 </table>
		
		<?php
		  }
		  
		  else
		    {
		?>
		  <table width="1090" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid;" class="row" id="didfv1" style="display:none">
		   <tr>
		 
            <td width="150">Mother Profession & Designation </td>
             <td><input type="text" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"];} ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Mother Qualification </td>
             <td><input type="text" name="mqualification" style="width:250px;"  id="txtname" value=" <?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"]; } ?>" class="tb5" class="tb5" /></td>
            </tr>
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
         </tr>
		<tr>
		 <td>Tel No(Off)</td>
           <td>
             <input name="mofftel" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>

		 </table>
		<?php
		}
		}
		else
		  {
		?>
           
		 <table width="500" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
		  <tr>
		  <td>Is Mother Working</td>
		  <td><input type="radio" name="mype" value="Yes" onClick="showMe()">Yes
<input type="radio" name="mype" value="No" checked="checked" onClick="showMe()">No
</td>
         </tr>
		  </table>
		  
		   <table width="1090"  align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid; display:none;" class="row" id="didfv1" >
		   <tr>
		 
            <td width="150">Mother Profession & Designation </td>
             <td><input type="text" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"];} ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Mother Qualification </td>
             <td><input  type="text" name="mqualification" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"];} ?>" class="tb5" class="tb5" /></td>
            </tr>
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
         </tr>
		<tr>
		 <td>Tel No(Off)</td>
           <td>
             <input name="mofftel" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>

		 </table>
		 
		 <?php
		   }
		 ?>
		 
		 
		 <table width="700" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
         
         
         <tr>
           <td>Session</td>
           <td><input name="scholar" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['scholar']; if(isset($_GET["upstudid"])){ echo $rowstud["student_scholar"];   }?>" size="40" class="tb5" style="width:250px"  /></td>
         </tr>
         <tr>
           <td>Scholar No</td>
           <td><input name="scholar" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['scholar']; if(isset($_GET["upstudid"])){ echo $rowstud["student_scholar"];   }?>" size="40" class="tb5" style="width:250px"  /></td>
         </tr>
         <tr>
           <td>Roll No</td>
           <td>
             <input name="txtrno" type="text" id="txtrno" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtrno']; if(isset($_GET["upstudid"])){echo $rowstud["student_rollno"];} ?>" size="40" class="tb5" style="width:250px" />
          </td>
         </tr>
		</td>
		
		<?php
		 if(!empty($_GET["upstudid"]))
		 {
		
		 if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="No") ) {   ?>
		
		 <tr>
		 <td> <span style="color:#FF0000; margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
		  <td><input type="radio" name="mype2" value="Yes" onClick="showMe2()">Yes
<input type="radio" name="mype2" value="No" onClick="showMe2()" checked="checked">No </td>
               </tr>
              <tr>
			  <td> <div id='TextBoxesGroup' >
	<div id="TextBoxDiv1" style="display:none; margin-left:30px" class="row" >

		<table>
        <tr>
        <td>
        <label>Name : </label><input type='text' name="b1" id='textbox1' ></td>
        <td> <label>Class : </label><input type='text' name="c1"></td>
	    </tr>
        <tr>
        <td>
        <label>Name : </label><input type='text' name="b2" id='textbox2' ></td>
        <td> <label>Class : </label><input type='text' name="c2" id='textbox2'></td>
	    </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
		 <?php
		   }
		   else
		     {
		 ?>
		 
      <tr>
	   <td> <span style="color:#FF0000; margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
		  <td><input type="radio" name="mype2" value="Yes" onClick="showMe2()" >Yes
<input type="radio" name="mype2" value="No" onClick="showMe2()">No </td>
			  <td> <div id='1' style=" margin-left:30px">
	<div id="TextBoxDiv1">
		<table>
        <tr>
        <td>
        <label>Name : </label><input type='text' name="b1" id='textbox1' value="<?php if(!empty($_GET["upstudid"])) { echo $rowstud["b1"] ;  }  ?>" ></td>
        <td> <label>Class : </label><input type='text' name="c1" value="<?php if(!empty($_GET["upstudid"])) { echo $rowstud["c1"] ;  } ?>" ></td>
	    </tr>
        <tr>
        <td>
        <label>Name : </label><input type='text' name="b2" id='textbox2' value="<?php if(!empty($_GET["upstudid"])) { echo $rowstud["b2"] ;  }  ?>" ></td>
        <td> <label>Class : </label><input type='text' name="c2" id='textbox2' value="<?php if(!empty($_GET["upstudid"])) { echo $rowstud["c2"] ;  }  ?>"></td>
	    </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
	   <?php
	     }
		 }
		 else
		 {
	   ?>
	   <tr>
		 <td> <span style="color:#FF0000; margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
	   
			<td><input type="radio" name="mype2" value="Yes" onClick="showMe2()">Yes
<input type="radio" name="mype2" value="No" onClick="showMe2()" >No </td>
			 
			   
			   
			   </tr>
       <tr>
			  <td> <div id='' >
	<div id="TextBoxDiv1" style=" margin-left:30px" class="row" >
		<table>
        <tr>
        <td>
        <label>Name : </label><input type='text' name="b1" id='textbox1' ></td>
        <td> <label>Class : </label><input type='text' name="c1"></td>
	    </tr>
        <tr>
        <td>
        <label>Name : </label><input type='text' name="b2" id='textbox2' ></td>
        <td> <label>Class : </label><input type='text' name="c2" id='textbox2'></td>
	    </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
	   <?php
	   }
	   ?>
	    <tr>
	            <td>Medical Document Submitted</td>	
				<td> <input type="radio" name="med" value="Yes" name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_medi"]=="Yes") ) { ?>  checked="checked" <?php   } ?>   >Yes <input type="radio" name="med" value="No" name="mdocu"<?php  if(!empty($_GET["upstudid"]) && ($rowstud["is_medi"]=="No") ) { ?>  checked="checked"<?php   } else { ?> <?php } ?> >No</td>
		</tr>
      
       <tr>
	       <td>Is Student In RTE Group</td>	
		   <?php
		     if(!empty($_GET["upstudid"]))
			 {
		   ?>
				<td><input type="radio" name="rti" value="Yes" name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes <input type="radio" name="rti" value="No" name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		   <td><input type="radio" name="rti" value="Yes" name="mdocu"   >Yes  &nbsp;&nbsp;<input type="radio" name="rti" value="No" name="mdocu"    >No</td>
		   
		   <?php
		   }
		?>
	
		</tr>
       
	   
	  
		
		 
		
         
         <tr >
         <td><br />&nbsp;</td>
         <td><br />&nbsp;</td>
         </tr>
         
		 <tr>
	
		 <td>
		   <?php
		   if(isset($_GET["upstudid"]))
		   {
			?>
			 <span style="color:#990000">Tc</span>  <span style="color:#990000; margin-left:260px">Marksheet</span> <br><br>
			   <div>
    
	 <a href="tc/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["tc"]; ?>" rel="thumbnail"><img src="tc/thumb/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["tc"]; ?>" width="100" height="80" style="border-radius:5px"></a>
		
		
	 <br><br>   <input type="submit" name="updatetc" value="Update Image" style="width:160px"><br>
		<?php
		  if(isset($_POST['updatetc']))
		  {
		  ?>
		    <input type="hidden" name="student_id" value="<?php echo $rowstud["student_id"]; ?>">
			 <input type="hidden" name="ptc" value="<?php echo $rowstud["tc"]; ?>">
		     <input name="tc" type="file" size="10" height="20"  style="border:#FF0000 0px solid; width:280px"  /><br>
			 <input type="submit" name="updatetc" value="update">
		  <?php
		  }
		
		?>
		
		
		</div>  
		  
		  
		  <div style="margin-left:290px; margin-top:-110px">
     
	   <a href="marksheet/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["marksheet"]; ?>" rel="thumbnail" > <img src="marksheet/thumb/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["marksheet"]; ?>" width="100" height="80" style="border-radius:5px"></a>
		
		
	 <br><br>     <input type="submit" name="updatemarksheet" value="Update Image" style="width:160px">
		<br>
		<?php
		  if(isset($_POST['updatemarksheet']))
		  {
		  ?>
		   <input type="hidden" name="student_id" value="<?php echo $rowstud["student_id"]; ?>"><br><br>
		    <input type="hidden" name="pmarksheet" value="<?php echo $rowstud["marksheet"]; ?>"><br><br>
		     <input name="prev_marksheet" type="file" size="10" height="20"  style="border:#FF0000 0px solid; width:280px"  /><br>
			 <input type="submit" name="update_marksheet" value="update">
		  <?php
		  }
		
		?>
		</div>
		  
		  <?php
			}
			?>
			</td>   
		 </tr>
      <tr>
	  <td><input id="printpagebutton" style="margin-left:80px" type="button" value="Print Form" onClick="printpage()"/></td>
	  </tr>
	    
	  
	  
	  
	  
	  
	  
	   </table>
      
    </form>
           
							<br>
							 <span style="float:right; margin-right:100px"></span>
							 	
							  
							</div>
						
      
	   		  
			    </div>  <br><br><br><br>
		
</body>
</html>