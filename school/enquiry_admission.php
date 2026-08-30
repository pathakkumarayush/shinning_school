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
    background: #006633;
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
    background: #006633;
    color: #fff;
}


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
if(isset($_REQUEST["update_student"]))
{	
    
	
	 if($_POST["section"]=="Select Section")
	          {
	           $_POST["section"]="";
	          }
			  
		
		      if($_POST["student_type"]=="Yes")
	          {
	          $t='New'; 
	          }
			  else
			  {
			  $t='old';
			  }
			  
	$res_up=mysqli_query($con,"update student set student_id='".$_POST["sid"]."',student_scholar='".$_POST["scholar"]."',student_name='".$_POST["txtname"]."',student_gender='".$_POST["gender"]."',student_fname='".$_POST["txtfatname"]."',student_dob='".$_POST["txtdob"]."',student_contactno='".$_POST["txtmobile"]."',femail='".$_POST["femail"]."',student_address='".$_POST["address"]."',student_detail='".$_POST["detail"]."',student_session='".$_SESSION["session"]."',student_rollno='".$_POST["txtrno"]."',mother_tong='".$_POST['mothertong']."',religion='".$_POST['religion']."',caste='".$_POST['caste']."',prev_school='".$_POST['prev_school']."',reason_change='".$_POST['reas_school']."',subj_req='".$_POST['subject']."',f_prof='".$_POST['fprofession']."',f_quali='".$_POST['fqualification']."',f_off_add='".$_POST['oaddress']."',f_tell_no_off='".$_POST['offadd']."',m_name='".$_POST['m_name']."',m_prof='".$_POST['mprofession']."',m_off_add='".$_POST['moaddress']."',m_off_tel='".$_POST['mofftel']."',m_quali='".$_POST['mqualification']."',b1='".$_POST['b1']."',c1='".$_POST['c1']."',b2='".$_POST['b2']."',c2='".$_POST['c2']."',is_medi='".$_POST['med']."',addmisionfee='".$_POST['student_type']."',rti='".$_POST['rti']."',student_doj='".$_POST["txtdoj"]."',adm_class='".$_POST['adm_class']."',student_section='".$_POST["section"]."',bus='".$_POST['bus']."',hname='".$_POST['hname']."',std_type='$t',mot='".$_POST['mot']."',hostel_status='".$_POST['hostel_status']."',pr_no='".$_POST['pr_no']."',status='0',student_class='".$_POST['txtclass']."',fid='".$_POST['fid']."',presult='".$_POST['presult']."',fc='".$_POST['fc']."',famt='".$_POST['famt']."',memail='".$_POST['memail']."',pn='".$_POST['pn']."' where student_id='".$_POST["sid"]."' and student_session='".$_SESSION['session']."'");
	
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
	$res_stud=mysqli_query($con,"select * from student where student_id='".$_GET["upstudid"]."' and student_session='".$_SESSION['session']."'")or die(mysqli_error());
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
			 $tc=$_FILES['tc']['name'];
			 $marksheet= $_FILES['prev_marksheet']['name'];
			  if($_POST["student_type"]=="Yes")
	          {
	          $t='New'; 
	          }
			  else
			  {
			  $t='old';
			  }
			$da = date("d-m-Y");
			$hname=$_POST['hname'];	
			$bus=$_POST['bus'];	
			
			
			
			     
			$res_up=mysqli_query($con,"update enquiry set status='2' where id='".$_GET["id"]."' ");
		    $res_ins=mysqli_query($con,"insert into student(student_id,student_scholar,student_rollno,student_name,student_gender,student_fname,student_dob,student_contactno,femail,
			student_address,fid,student_school,student_session,student_class,student_section,student_img,uid,mother_tong,religion,caste,prev_school,reason_change,
subj_req,f_prof,f_quali,f_off_add,f_tell_no_off,m_name,m_work,m_prof,m_off_add,m_off_tel,m_quali,is_bro,b1,c1,b2,c2,is_medi,addmisionfee,rti,student_doj,tc,marksheet,adm_class,std_type,hname,bus,mot,hostel_status,pr_no,presult,fc,famt,date,memail,pn) values(' $maxv','".$_POST["scholar"]."','".$_POST["txtrno"]."','".$_POST["txtname"]."','".$_POST["gender"]."','".$_POST["txtfatname"]."','".$_POST["txtdob"]."','".$_POST["txtmobile"]."','".$_POST["femail"]."','".$_POST["address"]."','".$_POST["fid"]."','".$_SESSION["uid"]."','".$_SESSION["session"]."','".$_POST["txtclass"]."','".$_POST["section"]."','$file_name3','$stdid','".$_POST['mothertong']."','".$_POST['religion']."','".$_POST['caste']."','".$_POST['prev_school']."','".$_POST['reas_school']."','".$_POST['subject']."','".$_POST['fprofession']."','".$_POST['fqualification']."','".$_POST['oaddress']."','".$_POST['offadd']."','".$_POST['m_name']."','".$_POST['mype']."','".$_POST['mprofession']."','".$_POST['moaddress']."','".$_POST['mofftel']."','".$_POST['mqualification']."','".$_POST['mype2']."','".$_POST['b1']."','".$_POST['c1']."','".$_POST['b2']."','".$_POST['c2']."','".$_POST['med']."','".$_POST['student_type']."','".$_POST['rti']."','".$_POST["txtdoj"]."','$tc','$marksheet','".$_POST['adm_class']."','$t','$hname','$bus','".$_POST['mot']."','".$_POST['hostel_status']."','".$_POST['pr_no']."','".$_POST['presult']."','".$_POST['fc']."','".$_POST['famt']."','$da','".$_POST['memail']."','".$_POST['pn']."')")or die(mysqli_error());
		    
			$_SESSION['id']=mysqli_insert_id();
			  
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
			  
	   $msg="Your child ".$_POST["txtname"]." has Been successfully Enrolled in ".$rowsch['school_name']." ";	
	   $sub="Admission";	
	   $session=$_SESSION['session'];
	   $page=1;
	   $r=sms($_SESSION["uid"],$maxv,$sub,$msg,'Yes',$session,$page);
				
				
				 $result_reg=mysqli_query($con,"insert into login(type,uid,pass,active,school) values ('student','$stdid','$stdid','y','shining')" );
			    // $updid=mysqli_query($con,"update student set uid='$stdid' where student_id='$id'");
				  
		?>
                   <script type="text/javascript">
                   alert('Proceed To Payment Page');
                   window.location.href='https://smarterponline.com/shining/school/?pageid=regfeee&id=<?php echo $_SESSION['id'] ?>';
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

<?php
$res_stud=mysqli_query($con,"select * from enquiry where id='".$_GET["id"]."' ")or die(mysqli_error());
$rowstud=mysqli_fetch_array($res_stud);?>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Student Admission.png" /><a href="index.php">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Admission form</h2></center>
</div>
<div class="col_4">
<div class="form-style-2-heading">Fill The Following Information </div>
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
	   <table> 
	   
	   
	   <tr><td colspan="4">
	  <div style="background-color:#006633; width:900px; height:35px; margin-top:-30px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	  <span style="margin-top:10px; position:absolute; font-size:16px;">STUDENT DETAILS</span>
	  </div>
	  </td></tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
<tr><td>Form No.</td> <?php
	   $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."'");
	   $rowmax=mysqli_fetch_array($maxid);
	   ?>
	   <td><input name="txtname" type="text" id="txtname" value="<?php echo $rowmax["count(student_id)"]+1; ?>" class="tb5" readonly="readonly" /></td>
	  
	  
	  <td>&nbsp;&nbsp;Admission No<span style="color:#FF0000">*</span></td> 
	  <td><input name="scholar" type="text" id="txtrno"  class="tb5" /></td> 
	   </tr>
	    
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	     <tr>
	     <td>Student Name</td> <td> 
	     <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />  
	     <input name="txtname" type="text" id="txtname" value="<?php echo $rowstud['name']; ?>" class="tb5" readonly="readonly"/></td> 
			 
	     <td>&nbsp;&nbsp;Gender</td> <td><?php if(isset($_GET["id"])) { ?>
         
         <input type="radio" name="gender" id="input"  value="male" <?php if($rowstud['gender']=='male' ) { ?> checked="checked" <?php } ?> />
         <label class="check_label">Male</label>
         <input type="radio" name="gender" id="input" value="female" <?php if($rowstud['gender']=='female' ) { ?> checked="checked" <?php } ?> />
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
		  <td>Student Class</td>
		  <td> 
		  <input name="txtclass" type="text" id="txtclass" value="<?php echo $rowstud['aclass']; ?>" class="tb5" readonly="readonly"/>
		 </td> 
		
		
	   <td>Date Of Birth</td> 
	   <td><input name="txtdob"  id="demo1" type="text" value="<?php echo $rowstud['dob']; ?>" readonly="readonly" class="tb5"  />
	  
	   </td>
	   </tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  		
	   <tr>
	   <td>Previous school</td> 
	   <td><input type="text" name="prev_school" class="tb5" value="<?php echo $rowstud['percentage']; ?>" readonly="readonly"></td> 
	   <td>Class Passed</td> <td><input type="text" name="subject" class="tb5" value="<?php echo $rowstud['pclass']; ?>" readonly="readonly"></td> 
	   </tr>
      
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    
		<tr><td colspan="4">
	    <div style="background-color:#006633; width:900px; height:35px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	    <span style="margin-top:10px; position:absolute; font-size:16px;">PARENT'S DETAILS</span>
	    </div>
	    </td></tr>
	 
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  
	    <tr>
	    <td>Father Name</td> 
	    <td><input name="txtfatname" type="text" id="txtfatname" value="<?php echo $rowstud['fname']; ?>"  class="tb5"  readonly="readonly"/></td> 
	    <td>&nbsp;&nbsp;Mother Name</td> 
	    <td><input name="m_name" type="text" id="txtfatname" value="<?php echo $rowstud['mname']; ?>" class="tb5"  readonly="readonly"/></td>
	    </tr>
	  
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	    <tr>
	    <td>Father Occupation</td>
	    <td><input type="text" name="fprofession"   id="txtname" value="<?php echo $rowstud['fo']; ?>" class="tb5" readonly="readonly"/></td>
		<td>&nbsp;&nbsp;Mother Occupation</td> 
	    <td> <input name="mprofession" type="text" value="<?php echo $rowstud['mo']; ?>" class="tb5"  readonly="readonly"/></td>
	    </tr>
	   
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr>
		<td>Father Mobile No</td> 
	    <td> <input name="txtmobile" type="text" id="txtmobile" value="<?php echo $rowstud['mobile']; ?>" maxlength="10" class="tb5"  readonly="readonly"/></td>
		<td>&nbsp;&nbsp;Mobile No.(Mother)</td>
	    <td><input name="offadd" type="text" id="txtmobile"  maxlength="10" class="tb5" readonly="readonly" /></td> 
		<td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td>
		</tr>
	 
	   
	   
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	 
	  
	    <tr><td colspan="4">
	    <div style="background-color:#006633; width:900px; height:35px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	    <span style="margin-top:10px; position:absolute; font-size:16px;text-transform:uppercase;">Correspondence Address</span>
	    </div>
	    </td></tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	    <tr>
	    <td>ADDRESS,(HOUSE <BR />BUILDING NO)</td> 
	    <td><textarea cols="23"  name="address"  readonly="readonly"><?php echo $rowstud['address']; ?></textarea></td>
	    <td>&nbsp;&nbsp;LOCALITY/TOWN</td> 
	    <td>
	    <input type="text" name="moaddress" class="tb5" value="<?php echo $rowstud['lt']; ?>" readonly="readonly">
	    </td>
	    </tr>
	   
	   
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    <tr>
	    <td>City</td> 
	    <td>
	    <input type="text" name="oaddress" class="tb5" value="<?php echo $rowstud['city']; ?>" readonly="readonly">
	    </td>
	 
	    <td>&nbsp;&nbsp;State</td> 
	    <td>
	    <input type="text" name="mofftel" class="tb5" value="<?php echo $rowstud['st']; ?>" readonly="readonly">
	    </td>
	    </tr>
	   
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr>
	    <td>Pin Code</td>
	    <td><input name="pn" type="text" id="txtmobile" value="<?php echo $rowstud['pn']; ?>" class="tb5" readonly="readonly" /></td> 
	   
	   <td></td>
	     <td class="3"><input type="checkbox" value="agree"  name="agree" required/>&nbsp;I Agree</td>
	   </tr>
	    <tr>
	    <td></td>
	    <td> <input type="submit" name="add_student" id="add" value="Proceed To Payment" style="width:175px;margin-left:0px; margin-top:10PX;" /></td> 
	    </tr>
	   
	    </table>
	    
		
	   
		
	 

		
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

   