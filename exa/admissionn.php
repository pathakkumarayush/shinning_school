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
			
			
			
			      $file_name = $_FILES['tc_file']['name'];
			      $file_size =$_FILES['tc_file']['size'];
			      $file_tmp =$_FILES['tc_file']['tmp_name'];
			      $file_type=$_FILES['tc_file']['type'];
			      $file_ext=strtolower(end(explode('.',$_FILES['tc_file']['name'])));
			      move_uploaded_file($file_tmp,"upload/".$file_name);
			
			       $file_name1 = $_FILES['tc_filee']['name'];
			      $file_size1 =$_FILES['tc_filee']['size'];
			      $file_tmp1 =$_FILES['tc_filee']['tmp_name'];
			      $file_type1=$_FILES['tc_filee']['type'];
			      $file_ext1=strtolower(end(explode('.',$_FILES['tc_filee']['name'])));
				  $file_name1=rand().$file_name1;
			       move_uploaded_file($file_tmp1,"upload/".$file_name1);
				   
				  $file_name2 = $_FILES['tc_fileee']['name'];
			      $file_size2 =$_FILES['tc_fileee']['size'];
			      $file_tmp2 =$_FILES['tc_fileee']['tmp_name'];
			      $file_type2=$_FILES['tc_fileee']['type'];
			      $file_ext2=strtolower(end(explode('.',$_FILES['tc_fileee']['name'])));
				  $file_name2=rand().$file_name2;
			      move_uploaded_file($file_tmp2,"upload/".$file_name2);
			        
				  $file_name3 = $_FILES['tc_fileeee']['name'];
			      $file_size3 =$_FILES['tc_fileeee']['size'];
			      $file_tmp3 =$_FILES['tc_fileeee']['tmp_name'];
			      $file_type3=$_FILES['tc_fileeee']['type'];
			      $file_ext3=strtolower(end(explode('.',$_FILES['tc_fileeee']['name'])));
				  $file_name3=rand().$file_name3;
			      move_uploaded_file($file_tmp3,"upload/".$file_name3);
			
			$res_up=mysqli_query($con,"update enquiry set status='2' where id='".$_GET["id"]."' ");
		    $res_ins=mysqli_query($con,"insert into student(student_id,student_scholar,student_rollno,student_name,student_gender,student_fname,student_dob,student_contactno,femail,
			student_address,fid,student_school,student_session,student_class,student_section,student_img,uid,mother_tong,religion,caste,prev_school,reason_change,
subj_req,f_prof,f_quali,f_off_add,f_tell_no_off,m_name,m_work,m_prof,m_off_add,m_off_tel,m_quali,is_bro,b1,c1,b2,c2,is_medi,addmisionfee,rti,student_doj,tc,marksheet,adm_class,std_type,hname,bus,mot,hostel_status,pr_no,presult,fc,famt,date,memail,pn,dimg,aimg,simg) values(' $maxv','".$_POST["scholar"]."','".$_POST["txtrno"]."','".$_POST["txtname"]."','".$_POST["gender"]."','".$_POST["txtfatname"]."','".$_POST["txtdob"]."','".$_POST["txtmobile"]."','".$_POST["femail"]."','".$_POST["address"]."','".$_POST["fid"]."','".$_SESSION["uid"]."','".$_SESSION["session"]."','".$_POST["txtclass"]."','".$_POST["section"]."','$file_name3','$stdid','".$_POST['mothertong']."','".$_POST['religion']."','".$_POST['caste']."','".$_POST['prev_school']."','".$_POST['reas_school']."','".$_POST['subject']."','".$_POST['fprofession']."','".$_POST['fqualification']."','".$_POST['oaddress']."','".$_POST['offadd']."','".$_POST['m_name']."','".$_POST['mype']."','".$_POST['mprofession']."','".$_POST['moaddress']."','".$_POST['mofftel']."','".$_POST['mqualification']."','".$_POST['mype2']."','".$_POST['b1']."','".$_POST['c1']."','".$_POST['b2']."','".$_POST['c2']."','".$_POST['med']."','".$_POST['student_type']."','".$_POST['rti']."','".$_POST["txtdoj"]."','$tc','$marksheet','".$_POST['adm_class']."','$t','$hname','$bus','".$_POST['mot']."','".$_POST['hostel_status']."','".$_POST['pr_no']."','".$_POST['presult']."','".$_POST['fc']."','".$_POST['famt']."','$da','".$_POST['memail']."','".$_POST['pn']."','https://smarterponline.com/shining/school/upload/$file_name','https://smarterponline.com/shining/school/upload/$file_name1','https://smarterponline.com/shining/school/upload/$file_name2')")or die(mysqli_error());
		    
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
            
			 <input name="txtname" type="text" id="txtname" value="<?php echo $rowstud['name']; ?>" class="tb5" /></td> 
			 
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
	   
	    <td>Type</td> <td> 
	   <input type="radio" name="student_type" value="No" >Existing &nbsp;&nbsp; 
	   <input type="radio" name="student_type" value="Yes" checked="checked">New </td>
	   
	   
	   
	    <td>&nbsp;&nbsp;Caste</td> 
		 <td><input  type="radio" value="Genral" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="Genral") ) {   ?> checked="checked"  <?php   } else { ?> checked="checked"  <?php  } ?>  >Genral <input  type="radio" value="obc" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="obc") ) {   ?> checked="checked"  <?php   } ?>  >Obc <input  type="radio" value="St" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="St") ) {   ?> checked="checked"  <?php   } ?>  >St <input  type="radio" value="Sc" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="Sc") ) {   ?> checked="checked"  <?php   } ?> >Sc </td>
		</tr>
		
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr><td>Transport facility</td> 
	   <?php
	    if(!empty($_GET["upstudid"]))
	    {
		?>
		<td> 
		<input type="radio" name="bus" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["bus"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		<input type="radio" name="bus" value="No" <?php if(!empty($_GET["upstudid"]) && ($rowstud["bus"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		<td> <input type="radio" name="bus" value="Yes" >Yes &nbsp;&nbsp;
		<input type="radio" name="bus" value="No"  checked="checked" >No</td>
		   
	    <?php
		 }
		?>
	    <td>&nbsp;&nbsp;Select House</td> 
		 <td>
         <input  type="radio" value="SPARTANS" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="SPARTANS") ) { ?> checked="checked"  <?php  } ?> >
		 <span style="color:#EE1D23;">SPARTANS</span>
		 <input  type="radio" value="SAMURAI" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="SAMURAI") ) { ?> checked="checked"  <?php } ?> >
		  <span style="color:#A4CE3A;">SAMURAI</span>
		  <br clear="all" /><br clear="all" />
		 <input  type="radio" value="KNIGHTS" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="KNIGHTS") ) { ?> checked="checked"  <?php   } ?> >
		 <span style="color:#7A65A6;"> KNIGHTS</span>
		 <input  type="radio" value="TROJANS" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="TROJANS") ) { ?> checked="checked"  <?php } ?> >
		  <span style="color:#32ACC1;">TROJANS</span>
		</td>
		</tr>
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		<?php /*?><tr>
		<td><b>Child No</b></td>
		<td><input name="pr_no" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['pr_no']; if(isset($_GET["upstudid"])){ echo $rowstud["pr_no"];   }?>" size="40" class="tb5" /></td>
		 <td>&nbsp;&nbsp;Hostel facility </td> 
		 <td>
<input  type="radio" value="Active" name="hostel_status" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hostel_status"]=="Active") ) { ?> checked="checked" <?php  } ?> >Yes
<input  type="radio" value="Inactive" name="hostel_status" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hostel_status"]=="Inactive") ) { ?> checked="checked"  <?php } ?> checked="checked" >No
		</td>
		</tr><?php */?>
		
		
		
		
		
		
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr>
		  <td>Student Class</td>
		  <td> <?php 
		  if(isset($_GET["id"]))
		  {
		  ?>
		  <select name="txtclass" class="select" style="width:220px;">
          <option value="-1">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$rowstud["aclass"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
		   
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
		<td>&nbsp;&nbsp;Nationality</td> 
		<td><input name="mot" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mot'];  if(isset($_GET["upstudid"])){echo $rowstud["mot"];} ?>" size="40" class="tb5" /></td>
		 </tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr><td>Date Of Birth<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdob"  id="demo1" type="text" value="<?php echo $rowstud['dob']; ?>" class="tb5"  />
		<a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a>
		</td>
		<td>&nbsp;&nbsp;Date Of Admission<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdoj"  id="demo2" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdoj']; if(isset($_GET["upstudid"])){echo $rowstud["student_doj"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		</tr>
		
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
		 <tr><td>D.O.B In Words</td>
		  <td><input name="mothertong" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mothertong']; if(isset($_GET["upstudid"])){echo $rowstud["mother_tong"];} ?>"  class="tb5"  /></td></td>
		 
		 <td>Age as on <br />31st March 2018<span style="color:#FF0000"></span></td> 
		 <td><input name="fid" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['fid']; if(isset($_GET["upstudid"])){ echo $rowstud["fid"];  }?>" class="tb5"  placeholder='years, months, age' /></td> 
		   </tr>
		  
		  
		  
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			
			
			
	     <tr>
		
		<td>Religion</td> 
		   <td><input type="text" name="religion" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['religion']; if(isset($_GET["upstudid"])){echo $rowstud["religion"]; } ?>"  ></td>
		 
		 
		 <td>Aadhar No</td> 
		 <td><input name="txtrno" type="text" id="txtrno" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtrno']; if(isset($_GET["upstudid"])){echo $rowstud["student_rollno"];} ?>"  class="tb5"  /></td>
		 </tr>
		 
			  
			  
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
				
				
	   <tr>
	   <td>Previous school</td> 
	   <td><input type="text" name="prev_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['prev_school']; if(isset($_GET["upstudid"])){echo $rowstud["prev_school"];} ?>" ></td> 
	   <td>Reason For Change</td> 
	   <td><input type="text" name="reas_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['reas_school']; if(isset($_GET["upstudid"])){echo $rowstud["reason_change"];} ?>" ></td>
	   </tr>
      
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td>Class Passed</td> <td><input type="text" name="subject" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['subject']; if(isset($_GET["upstudid"])){echo $rowstud["subj_req"];} ?>" ></td> 
	  <td>Marks Obtaind</td> 
	  <td><input type="text" name="presult" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['presult']; if(isset($_GET["upstudid"])){echo $rowstud["presult"];} ?>" ></td></tr>
	  
	  
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  
	  <tr><td colspan="4">
	  <div style="background-color:#006633; width:900px; height:35px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	  <span style="margin-top:10px; position:absolute; font-size:16px;">FATHER'S DETAILS</span>
	  </div>
	  </td></tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  
	  <tr><td>Father Name</td> 
	  <td><input name="txtfatname" type="text" id="txtfatname" value="<?php echo $rowstud['fname']; ?>"  class="tb5"  /></td> 
	  
	  
	  <td>&nbsp;&nbsp;Father Qualification </td>
	   <td><input type="text" name="fqualification"  id="txtname" class="tb5" /></td> 
	  </tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	   <tr>
	   <td>Father Occupation</td>
	   <td><input type="text" name="fprofession"   id="txtname" value="<?php echo $rowstud['fo']; ?>" class="tb5" /></td>
	   <td>&nbsp;&nbsp;Father Mobile No</td> 
	   <td> <input name="txtmobile" type="text" id="txtmobile" value="<?php echo $rowstud['mobile']; ?>" maxlength="10" class="tb5"  /></td>
	    </tr>
	   
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	     <tr>
		 <td>Father Email Id</td> 
		 <td><input name="femail" type="text" class="tb5"  /></td>
		   <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td>
		  </tr>
	 
	   
	   
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td colspan="4">
	  <div style="background-color:#006633; width:900px; height:35px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	  <span style="margin-top:10px; position:absolute; font-size:16px;">MOTHER'S DETAILS</span>
	  </div>
	  </td></tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  
	  <tr>
	  <td>Mother Name</td> 
	  <td><input name="m_name" type="text" id="txtfatname" value="<?php echo $rowstud['mname']; ?>" class="tb5"  /></td>
	  <td>Mother Qualification </td>
	   <td><input type="text" name="mqualification"  id="txtname"  class="tb5" /></td>
	   </tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	 
	  <tr>
	  <td>Mother Occupation</td> 
	  <td> <input name="mprofession" type="text" value="<?php echo $rowstud['mo']; ?>" class="tb5"  /></td>
	  <td>Mobile No.(Mother)</td>
	  <td><input name="offadd" type="text" id="txtmobile"  maxlength="10" class="tb5"  /></td> 
	 
	  </tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   <td>Mother Email Id</td> 
	   <td><input name="memail" type="text" class="tb5"  /></td>
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
	  <td><textarea cols="23"  name="address"  ><?php echo $rowstud['address']; ?></textarea></td>
	  <td>&nbsp;&nbsp;LOCALITY/TOWN</td> 
	  <td>
	  <input type="text" name="moaddress" class="tb5" value="<?php echo $rowstud['lt']; ?>" >
	  </td>
	  
	   </tr>
	   
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   <td>City</td> 
	   <td>
	    <input type="text" name="oaddress" class="tb5" value="<?php echo $rowstud['city']; ?>" >
	   </td>
	 
	  <td>&nbsp;&nbsp;State</td> 
	   <td>
	    <input type="text" name="mofftel" class="tb5" value="<?php echo $rowstud['st']; ?>" >
	   </td>
	   
	   </tr>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	  <td>Pin Code</td>
	  <td><input name="pn" type="text" id="txtmobile" value="<?php echo $rowstud['pn']; ?>" class="tb5"  /></td> 
	   
	   
	   </tr>
		
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td colspan="4">
	  <div style="background-color:#006633; width:900px; height:35px; color:#FFFFFF; margin-left:-20px; border-radius:5px;">&nbsp;&nbsp;
	  <span style="margin-top:10px; position:absolute; font-size:16px;text-transform:uppercase;">Other Details</span>
	  </div>
	  </td></tr>
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr>
		  <td>Fee Concession</td>
		  <td> <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  ?>
		  <select name="fc" class="select" style="width:220px;" requird/>
       
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
           <?php
		   }
		    else
		   {
		   ?>
		  <select name="fc" class="select" style="width:220px;">
             
	    
           <?php
           $res=mysqli_query($con,"select distinct(bank) from country");
           while($rows=mysqli_fetch_array($res))
           {
            echo "<option>".$rows["bank"]."</option>";
           }  
           ?>
            </select>
          <?php
		     }
			 ?></td> 
		<td>&nbsp;&nbsp;Concession Amt(%)</td> 
		<td><input name="famt" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['famt'];  if(isset($_GET["upstudid"])){echo $rowstud["famt"];} ?>" size="40" class="tb5" /></td>
		 </tr>
		 
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		  
		  
		<tr>
		<td>Student Image</td>
	    <td><input type="file" name="tc_fileeee"><br />
		<span style="color:#CC0000; font-size:12px;">Max. Size 200kb</span>
		</td> 
		
	    <td>&nbsp;&nbsp;D.O.B Certificate</td>
	    <td><input type="file" name="tc_file"><br />
		<span style="color:#CC0000; font-size:12px;">Max. Size 200kb</span>
		</td> 
	   </tr>
		  
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		 <tr>
		<td>Transfer Certificate</td>
	    <td><input type="file" name="tc_filee"><br />
		<span style="color:#CC0000; font-size:12px;">Max. Size 200kb</span>
		</td>
	     <td>&nbsp;&nbsp;Other Certificate</td>
	     <td><input type="file" name="tc_fileee"><br />
		 <span style="color:#CC0000; font-size:12px;">Max. Size 200kb</span>
		 
	
	   </tr>
		  
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    </table>
	    
		
	   
		<?php
		if(!empty($_GET["upstudid"]))
		{
	    ?>
	    <table>
		<tr>
		<td> <span style="color:#993300;margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
	    <td>
		<input type="radio" name="mype2" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="Yes") ) { ?>  checked="checked" <?php } ?> >Yes
<input type="radio" name="mype2" value="No"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="No") ) { ?>  checked="checked"<?php   } ?>>No </td>
		</tr>
		</table>
		
	   <table style="margin-left:125px;">
        <tr>
        <td> <label>Class : </label>
		  <select name="c1" class="select" style="width:220px;">
          <option value="-1">Select Class</option>
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
        <label>Name : </label><input type='text' name="b1" id='textbox1' value="<?php echo $rowstud["b1"]?>" ></td>
	    </tr>
       <tr>
        <td> <label>Class : </label>
		  <select name="c2" class="select" style="width:220px;">
          <option value="-1">Select Class</option>
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
        <label>Name : </label><input type='text' name="b2" id='textbox1' value="<?php echo $rowstud["b2"]?>" ></td>
	    </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
		 </table>
	   <?php
	   }else
	   {
	   ?>
	     <table>
		<tr>
		<td> <span style="color:#FF0000; margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
	    <td><input type="radio" name="mype2" value="Yes" onclick="showMe2()">Yes
<input type="radio" name="mype2" value="No" onclick="showMe2()" checked="checked">No </td>
		</tr>
		</table>
		
		<table style="margin-left:125px;">
       <tr>
	   <td> <div id='TextBoxesGroup' >
	   <div id="TextBoxDiv1" style="display:none; margin-left:30px" class="row" >
		<table>
        <tr>
        <td> 
		<label>Class : </label> 
		<select name="c1" class="select" style="width:220px;">
        <option value="-1">Select Class</option>
        <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
        echo "<option>".$rows["class"]."</option>";
        }  
        ?>
        </select>
		</td>
	   
	    <td>
        <label>Name : </label><input type='text' name="b1" id='textbox1' >
		</td>
        
	    </tr>
        <tr>
		<td> 
		<label>Class : </label>
		<select name="c2" class="select" style="width:220px;" >
        <option value="-1">Select Class</option>
        <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
        echo "<option>".$rows["class"]."</option>";
        }  
        ?>
        </select>
		
		</td>
        <td>
        <label>Name : </label><input type='text' name="b2" id='textbox2' ></td>
        </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
		 </table>
		 
		 <?php } ?>
	   <table>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	     <?php if(isset($_GET["upstudid"]))
		{ 
		
		} else {?>
	   <tr>
	   
			
			<!--<td>Upload Image</td>
		    <td> <input name="file" type="file" size="10" height="20"  /></td>-->
			</tr>
    
		
		
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <!--<tr><td>Upload Tc</td> 
	   <td><input name="prev_marksheet" type="file" size="10" height="20"  /></td>
	    <td>Upload Previous Marksheet</td> 
		<td>  <input name="prev_marksheet" type="file" size="10" height="20" /></td></tr>-->
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    <?php } ?>
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
		   <input type="submit"  name="update_student" id="add" value="Update" style="width:120px;margin-left:350px" /> 
           <?php
		   }
		   else
		   {
		   ?>
           <input type="submit" name="add_student" id="add" value="Proceed To Payment" style="width:175px;margin-left:350px" />
           <?php } ?></td>
		    <td></td>
         </tr>
		 <tr>
	    <td></td>
		 <td>
		 
		   <?php
		   if(isset($_GET["upstudid"]))
		   {
			?>
	
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
     
	 <?php /*?>  <a href="marksheet/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["marksheet"]; ?>" rel="thumbnail" > <img src="marksheet/thumb/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["marksheet"]; ?>" width="100" height="80" style="border-radius:5px"></a><?php */?>
		
		
	<!-- <br><br>     <input type="submit" name="updatemarksheet" value="Update Image" style="width:160px">-->
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
			 <td></td> <td></td> 
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

   