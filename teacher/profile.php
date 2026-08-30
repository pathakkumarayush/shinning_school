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
    
	
	 if($_POST["section"]=="Select Section")
	          {
	           $_POST["section"]="";
	          }
	$res_up=mysqli_query($con,"update student set  student_scholar='".$_POST["scholar"]."',student_name='".$_POST["txtname"]."',student_gender='".$_POST["gender"]."',student_fname='".$_POST["txtfatname"]."',student_dob='".$_POST["txtdob"]."',student_contactno='".$_POST["txtmobile"]."',student_email='".$_POST["txtemail"]."',student_address='".$_POST["address"]."',student_detail='".$_POST["detail"]."',student_session='".$_SESSION["session"]."',student_rollno='".$_POST["txtrno"]."',mother_tong='".$_POST['mothertong']."',religion='".$_POST['religion']."',caste='".$_POST['caste']."',prev_school='".$_POST['prev_school']."',reason_change='".$_POST['reas_school']."',subj_req='".$_POST['subject']."',f_prof='".$_POST['fprofession']."',f_quali='".$_POST['fqualification']."',f_off_add='".$_POST['oaddress']."',f_tell_no_off='".$_POST['offadd']."',m_name='".$_POST['m_name']."',m_prof='".$_POST['mprofession']."',m_off_add='".$_POST['moaddress']."',m_off_tel='".$_POST['mofftel']."',m_quali='".$_POST['mqualification']."',b1='".$_POST['b1']."',c1='".$_POST['c1']."',b2='".$_POST['b2']."',c2='".$_POST['c2']."',is_medi='".$_POST['med']."',addmisionfee='".$_POST['student_type']."',rti='".$_POST['rti']."',student_doj='".$_POST["txtdoj"]."',is_bro='".$_POST['mype2']."' where student_id='".$_POST["sid"]."' and student_school='".$_SESSION['uid']."'")
	
	or die(mysqli_error());


?>
                   <script type="text/javascript">
                    window.location="<?php echo $var."admission&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
			       </script>
			  <?php
}
   ?>
 <?php
 
  if(isset($_POST['updateimg']))
			    {
				    $id=$_POST["imgid"].$_SESSION['uid'];
					 $name1 = $_FILES['file']['name'];	
				    $target_path = "upload/";
				    $target_path = $target_path.$id.basename( $_FILES['file']['name']); 
			        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
					{ 
					  $updateimg=mysqli_query($con,"update student set student_img='$name1' where student_id='".$_POST['imgid']."' and student_school='".$_SESSION['uid']."'");
				   $msg="Image updated Successfully";	
					}
				
				}
      
  if(isset($_GET["upstudid"]))
{ 
	//$res_login=mysqli_query($con,"select * from login where uid='".$_GET["upstudid"]."'")or die(mysqli_error());
	//$row_login1=mysqli_fetch_array($res_login);
	$res_stud=mysqli_query($con,"select * from student where student_id='".$_GET["upstudid"]."' and student_school='".$_SESSION['uid']."'")or die(mysqli_error());
	$rowstud=mysqli_fetch_array($res_stud);

} 
?>
<?php
      
	  if(isset($_GET["upstudid"]))
{ 
	$res_login=mysqli_query($con,"select * from login where uid='".$_GET["upstudid"]."'")or die(mysqli_error());
	$row_login1=mysqli_fetch_array($res_login);
	$res_stud=mysqli_query($con,"select * from student where uid='".$_GET["upstudid"]."'")or die(mysqli_error());
	$row_stud=mysqli_fetch_array($res_stud);
}
?>

<?php 
if(isset($_POST["add_student"]))
{
   
		  if(empty($_POST['txtname']))
		  {
			 $error_msg="field  marked with * are mandatory";
		  }
		  elseif(empty($_POST["txtdob"]))
		  {
			 $error_msg="field  marked with * are mandatory";
		  } 
		   elseif(empty($_POST["txtclass"]))
		  {
			 $error_msg="field  marked with * are mandatory";
		  } 
	/*	  
	   $result=mysqli_query($con,"select * from login where uid='".$_POST["uid"]."'")or die(mysqli_error());
	
	if($row=mysqli_fetch_array($result))
	{
*/
		?>
     
        <?php
	
	         if(empty($error_msg))
			  {
			   
			    $name1 = $_FILES['file']['name'];	
			    $scholar=mysqli_query($con,"select * from student where student_scholar='".$_POST["scholar"]."' and student_school='".$_SESSION["uid"]."'");
			   
				if(mysqli_num_rows($scholar)<1)
			 {
			    if($_POST["section"]=="Select Section")
	          {
	           $_POST["section"]="";
	          }
			   $maxid1=mysqli_query($con,"select max(student_id) from student where student_school='".$_SESSION["uid"]."'");
			  
		     
			 $rowmax1=mysqli_fetch_array($maxid1);
			 $maxv=$rowmax1['max(student_id)']+1;
			 $id=$maxv.$_SESSION['uid'];
				 $stdid="smrt".$_SESSION['uid'].$maxv;
			   $res_ins=mysqli_query($con,"insert into student(student_id,student_scholar,student_rollno,student_name,student_gender,student_fname,student_dob,student_contactno,student_email,student_address,student_detail,student_school,student_session,student_class,student_section,student_img,uid,mother_tong,religion,caste,prev_school,reason_change,subj_req,f_prof,f_quali,f_off_add,f_tell_no_off,m_name,m_work,m_prof,m_off_add,m_off_tel,m_quali,is_bro,b1,c1,b2,c2,is_medi,addmisionfee,rti,student_doj) values('$maxv','".$_POST["scholar"]."','".$_POST["txtrno"]."','".$_POST["txtname"]."','".$_POST["gender"]."','".$_POST["txtfatname"]."','".$_POST["txtdob"]."','".$_POST["txtmobile"]."','".$_POST["txtemail"]."','".$_POST["address"]."','".$_POST["detail"]."','".$_SESSION["uid"]."','".$_SESSION["session"]."','".$_POST["txtclass"]."','".$_POST["section"]."','$name1','$stdid','".$_POST['mothertong']."','".$_POST['religion']."','".$_POST['caste']."','".$_POST['prev_school']."','".$_POST['reas_school']."','".$_POST['subject']."','".$_POST['fprofession']."','".$_POST['fqualification']."','".$_POST['oaddress']."','".$_POST['offadd']."','".$_POST['m_name']."','".$_POST['mype']."','".$_POST['mprofession']."','".$_POST['moaddress']."','".$_POST['mofftel']."','".$_POST['mqualification']."','".$_POST['mype2']."','".$_POST['b1']."','".$_POST['c1']."','".$_POST['b2']."','".$_POST['c2']."','".$_POST['med']."','".$_POST['student_type']."','".$_POST['rti']."','".$_POST["txtdoj"]."')")or die(mysqli_error());
		        
			$msg="Your child".$_POST["txtname"]."has Been successfully Enrolled in".$_SESSION['uid'];	
		
		$sub="Admission";	
	   $session=$_SESSION['session'];
	   $page=1;
	$r=sms($_SESSION["uid"],$_POST['student'],$sub,$msg,'Yes',$session,$page);
			
			
			
				 $result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('student','$stdid','$stdid','y')" );
			    //  $updid=mysqli_query($con,"update student set uid='$stdid' where student_id='$id'");
				  
				 $target_path = "upload/";
				
				$target_path = $target_path.$id.basename( $_FILES['file']['name']); 
			    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
					{ }
				?>
                   <script type="text/javascript">
                    window.location="<?php echo $var."admission&&sumsg=Inserted Successfully"; ?>";
			       </script>
			  <?php
              }
	        else
			    {
				  $error_msg="Scholar Number Already Exist";
				}
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
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164854_elementary_school.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">My Profile</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
               <?php if(!empty($_GET["upstudid"])){ ?> <a href="./?pageid=home">Back</a> >><?php } ?>My Profile</a>
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
		?>
         <div style="border:#FF0000 0px solid; width:150px; margin-top:20px; height:100px">
     <?php
	    if(empty($rowstud["student_img"]))
		{
		
		?>
		
		
		<img  src="css/no-image-available.jpg" width="100" height="80" style="border-radius:5px">
		<?php
		}
		else
		 {
      ?>
	    <img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["student_img"]; ?>" width="100" height="80" style="border-radius:5px">
	  <?php		 
		 }
		 ?>
	
		</div>
      
	 
		
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
           <td width="30%">Name<label style="color:#FF0000">*</label></td>
           <td width="70%">
           <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>"  />
             <input name="txtname" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" readonly="readonly" class="tb5" style="width:250px" />
           </td>
         </tr>
         
         <tr>
         <td>Gender</td>
         <td><?php  echo ucwords($rowstud['student_gender']);  ?>  </td>
         </tr>
         <tr>
           <td>Date Of Birth<label style="color:#FF0000">*</label></td>
           <td><?php  echo $rowstud["student_dob"];  ?></td>
         </tr>
		  <tr>
           <td>Date Of Joining</td>
           <td><?php echo $rowstud["student_doj"];    ?></td>
         </tr>
		 </table>
		 
		 
		 
		 <table width="500" align="right"   cellspacing="10" style="font-size:16px; margin-top:-155px; margin-left:50px" >
		 <tr>
		 <td>Mother Tongue</td>
           <td> <input name="mothertong" type="text" readonly="readonly" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mothertong']; if(isset($_GET["upstudid"])){echo $rowstud["mother_tong"];} ?>"   size="40" maxlength="10" class="tb5" style="width:250px" /></td>
         </tr>
		 <tr>
		 <td>Religion</td>
		 <td><input type="text" readonly="readonly" name="religion" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['religion']; if(isset($_GET["upstudid"])){echo $rowstud["religion"]; } ?>" style="width:250px" ></td>
		 </tr>
		 <tr>
		 <td>Caste</td>
		 <td><?php echo $rowstud["caste"];   ?></td>
		 </tr>
		    <tr>
           <td>Class </td>
           <td>
               <?php 
		   if(isset($_GET["upstudid"]))
		   {
			echo $rowstud['student_class'];  
            }
			else
			   {
		  ?>
		     <select name="txtclass" class="select" style="width:250px;"  onchange="showSection(this.value)">
             
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
			 ?>
		   </td>
         </tr>
         <tr>
		  <td>Section</td>
		   <td>
              <?php
			      if(isset($_GET["upstudid"]))
		   {
		   ?>
		   
          <?php echo $rowstud['student_section']; ?>
		   <?php
		   }
		    else
			  {
			  ?>
			<div id="txtHint1"></div>
           <?php
		     }
			 ?>
		 </td>
		 </tr>
		 
		 </table>
		 <table width="1090" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
        <tr>
		   <td>Previous School</td>
		   <td><input type="text" readonly="readonly" name="prev_school" class="tb5" style="width:450px" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['prev_school']; if(isset($_GET["upstudid"])){echo $rowstud["prev_school"];} ?>" ></td>
		</tr>
		
		<tr>
		   <td>Reason For Change Of School</td>
		   <td><input type="text" readonly="readonly" name="reas_school" class="tb5" style="width:450px" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['reas_school']; if(isset($_GET["upstudid"])){echo $rowstud["reason_change"];} ?>" ></td>
		</tr>
		<tr>
		   <td>Subject Required For Class 11th & 12th</td>
		   <td><input type="text" readonly="readonly" name="subject" class="tb5" style="width:450px" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['subject']; if(isset($_GET["upstudid"])){echo $rowstud["subj_req"];} ?>" ></td>
		</tr>
		</table>
		<table width="850" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
          <tr>
           <td>Father Name</td>
           <td><input name="txtfatname" readonly="readonly" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtfatname']; if(isset($_GET["upstudid"])){echo $rowstud["student_fname"];} ?>" size="40" class="tb5" style="width:250px" /></td>
        
            <td width="150">Father Profession & Designation </td>
             <td><input type="text" readonly="readonly" name="fprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["fprofession"]))) echo $_POST['fprofession']; if(isset($_GET["upstudid"])){echo $rowstud["f_prof"];} ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Father Qualification </td>
             <td><input type="text" readonly="readonly" name="fqualification" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['fqualification']; if(isset($_GET["upstudid"])){echo $rowstud["f_quali"];} ?>" class="tb5" /></td>
          
           <td>Residential Address</td>
           <td><textarea cols="33" readonly="readonly"  name="address"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['address']; if(isset($_GET["upstudid"])){echo $rowstud["student_address"];} ?></textarea></td>
         </tr>          
        
		<tr>
           <td>Office Address</td>
           <td><textarea cols="33"  readonly="readonly"  name="oaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['oaddress']; if(isset($_GET["upstudid"])){echo $rowstud["f_off_add"];} ?></textarea></td>
        
		 <td>Tel No(Res)</td>
           <td>
             <input name="txtmobile"  readonly="readonly"  type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtmobile']; if(isset($_GET["upstudid"])){echo $rowstud["student_contactno"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>
		<tr>
		 <td>Tel No(off)</td>
           <td>
             <input name="offadd"  readonly="readonly" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['offadd']; if(isset($_GET["upstudid"])){echo $rowstud["f_tell_no_off"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>
		 
         
          <tr>
           <td>Email</td>
           <td><input name="txtemail" readonly="readonly" type="text" id="txtemail" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtemail']; if(isset($_GET["upstudid"])){echo $rowstud["student_email"];} ?>" size="40" class="tb5" style="width:250px" /></td>
         </tr>
		 
		
           <tr>
           <td>Mother Name</td>
           <td><input name="m_name" readonly="readonly" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['m_name']; if(isset($_GET["upstudid"])){echo $rowstud["m_name"];} ?>" size="40" class="tb5" style="width:250px" /></td>
         </tr>
        </table>
		<?php
		 if(!empty($_GET["upstudid"]))
		 {
		 if(!empty($_GET["upstudid"]) && ($rowstud["m_work"]=="No") ) {   ?>
		
		
		 <table width="500" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
		  <tr>
		  <td>Is Mother Working</td>
		  <td><input type="radio" readonly="readonly" name="mype" value="Yes" onclick="showMe()">Yes
<input type="radio" name="mype" value="No" onclick="showMe()">No
</td>
         </tr>
		  </table>
		   <table width="1090" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid; display:none" class="row" id="didfv1" style="display:none">
		   <tr>
		 
            <td width="150">Mother Profession & Designation </td>
             <td><input type="text" readonly="readonly" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"]; } ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Mother Qualification </td>
             <td><input type="text" readonly="readonly" name="mqualification" style="width:250px;"  id="txtname" value=" <?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"]; } ?>" class="tb5" class="tb5" /></td>
            </tr>
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33"  readonly="readonly" name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
         </tr>
		<tr>
		 <td>Tel No(Off)</td>
           <td>
             <input name="mofftel" readonly="readonly" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_tel"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
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
             <td><input type="text" readonly="readonly" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"];} ?>" class="tb5" /></td>
            </tr>
		  <tr>
            <td width="150">Mother Qualification </td>
             <td><input type="text" readonly="readonly" name="mqualification" style="width:250px;"  id="txtname" value=" <?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"]; } ?>" class="tb5" class="tb5" /></td>
            </tr>
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33" readonly="readonly"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
         </tr>
		<tr>
		 <td>Tel No(Off)</td>
           <td>
             <input name="mofftel" readonly="readonly" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>

		 </table>
		<?php
		}
		}
		
		
		 ?>
		 
		 
		 <table width="700" align="left"   cellspacing="10" style="font-size:16px; border:#FF0000 0px solid" >
         <tr>
          <td>School</td>
           <td><?php echo ucwords($_SESSION["uid"]); ?></textarea></td>
         </tr>
         
         <tr>
           <td>Session</td>
           <td><?php if(isset($_GET["upstudid"])) { echo $rowstud["student_session"]; } else { echo $_SESSION['session'];  } ?></td>
         </tr>
         <tr>
           <td>Scholar No</td>
           <td><input name="scholar" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['scholar']; if(isset($_GET["upstudid"])){ echo $rowstud["student_scholar"];   }?>" size="40" class="tb5" style="width:250px"  /></td>
         </tr>
         <tr>
           <td>Roll No</td>
           <td>
             <input name="txtrno" readonly="readonly" type="text" id="txtrno" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtrno']; if(isset($_GET["upstudid"])){echo $rowstud["student_rollno"];} ?>" size="40" class="tb5" style="width:250px" />
          </td>
         </tr>
		</td>
		
	
		
		 
              
	
      
	
	
	    <tr>
	            <td>Medical Document Submitted</td>	
				<td><?php echo $rowstud["is_medi"];    ?></td>
		</tr>
      
       <tr>
	       <td>RTE Group</td>	
		<td><?php echo $rowstud["rti"]; ?></td>
	    
	
		</tr>
        <?php if(isset($_GET["upstudid"])){ } else {?>
       
	   
	     <tr>
           <td>Upload Image</td>
           <td>
           <input name="file" type="file" size="10" height="20"  style="border:#FF0000 0px solid; width:280px"  />
           
           </td> 
         </tr>
         <?php } ?>
         
         
         
       </table>
      
    </form>
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
<br><br><br><br><br><br>