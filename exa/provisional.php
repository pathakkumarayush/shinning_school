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
			  
	$res_up=mysqli_query($con,"update student set student_id='".$_POST["stdid"]."',student_scholar='".$_POST["scholar"]."',student_name='".$_POST["txtname"]."',student_gender='".$_POST["gender"]."',student_fname='".$_POST["txtfatname"]."',student_dob='".$_POST["txtdob"]."',student_contactno='".$_POST["txtmobile"]."',student_email='".$_POST["txtemail"]."',student_address='".$_POST["address"]."',student_detail='".$_POST["detail"]."',student_session='".$_SESSION["session"]."',student_rollno='".$_POST["txtrno"]."',mother_tong='".$_POST['mothertong']."',religion='".$_POST['religion']."',caste='".$_POST['caste']."',prev_school='".$_POST['prev_school']."',reason_change='".$_POST['reas_school']."',subj_req='".$_POST['subject']."',f_prof='".$_POST['fprofession']."',f_quali='".$_POST['fqualification']."',f_off_add='".$_POST['oaddress']."',f_tell_no_off='".$_POST['offadd']."',m_name='".$_POST['m_name']."',m_prof='".$_POST['mprofession']."',m_off_add='".$_POST['moaddress']."',m_off_tel='".$_POST['mofftel']."',m_quali='".$_POST['mqualification']."',b1='".$_POST['b1']."',c1='".$_POST['c1']."',b2='".$_POST['b2']."',c2='".$_POST['c2']."',is_medi='".$_POST['med']."',addmisionfee='".$_POST['student_type']."',rti='".$_POST['rti']."',student_doj='".$_POST["txtdoj"]."',is_bro='".$_POST['mype2']."',adm_class='".$_POST['adm_class']."',student_section='".$_POST["section"]."',bus='".$_POST['bus']."',hname='".$_POST['hname']."',std_type='$t',mot='".$_POST['mot']."',hostel_status='".$_POST['hostel_status']."',pr_no='".$_POST['pr_no']."'  where student_id='".$_POST["sid"]."' and student_school='".$_SESSION['uid']."'");
	
?>
 <script type="text/javascript">
             window.location="<?php echo $var."provisional&&sumsg=Updated Successfully&upstudid=".$_POST["sid"]; ?>";
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
			   // $scholar=mysqli_query($con,"select * from student where student_scholar='".$_POST["scholar"]."' and student_school='".$_SESSION["uid"]."'");
			   
				//if(mysqli_num_rows($scholar)<1)
			// {
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
			 $stdid = $_POST['stdid']; 
			$hname=$_POST['hname'];	
			$bus=$_POST['bus'];	
		    $res_ins=mysqli_query($con,"insert into student(student_id,student_scholar,student_rollno,student_name,student_gender,student_fname,student_dob,student_contactno,student_email,student_address,student_detail,student_school,student_session,student_class,student_section,student_img,uid,mother_tong,religion,caste,prev_school,reason_change,subj_req,f_prof,f_quali,f_off_add,f_tell_no_off,m_name,m_work,m_prof,m_off_add,m_off_tel,m_quali,is_bro,b1,c1,b2,c2,is_medi,addmisionfee,rti,student_doj,tc,marksheet,adm_class,std_type,hname,bus,mot,hostel_status,pr_no,status) values(' $stdid','".$_POST["scholar"]."','".$_POST["txtrno"]."','".$_POST["txtname"]."','".$_POST["gender"]."','".$_POST["txtfatname"]."','".$_POST["txtdob"]."','".$_POST["txtmobile"]."','".$_POST["txtemail"]."','".$_POST["address"]."','".$_POST["detail"]."','".$_SESSION["uid"]."','".$_SESSION["session"]."','".$_POST["txtclass"]."','".$_POST["section"]."','$name1','$stdid','".$_POST['mothertong']."','".$_POST['religion']."','".$_POST['caste']."','".$_POST['prev_school']."','".$_POST['reas_school']."','".$_POST['subject']."','".$_POST['fprofession']."','".$_POST['fqualification']."','".$_POST['oaddress']."','".$_POST['offadd']."','".$_POST['m_name']."','".$_POST['mype']."','".$_POST['mprofession']."','".$_POST['moaddress']."','".$_POST['mofftel']."','".$_POST['mqualification']."','".$_POST['mype2']."','".$_POST['b1']."','".$_POST['c1']."','".$_POST['b2']."','".$_POST['c2']."','".$_POST['med']."','".$_POST['student_type']."','".$_POST['rti']."','".$_POST["txtdoj"]."','$tc','$marksheet','".$_POST['adm_class']."','$t','$hname','$bus','".$_POST['mot']."','".$_POST['hostel_status']."','".$_POST['pr_no']."','2')")or die(mysqli_error());
		      
	   $msg="Your child ".$_POST["txtname"]." has Been successfully Enrolled in Kabra Memorial Public School";	
	   $sub="Admission";	
	   $session=$_SESSION['session'];
	   $page=1;
	   $r=sms($_SESSION["uid"],$maxv,$sub,$msg,'Yes',$session,$page);
				
				
				 $result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('student','$stdid','$stdid','y')" );
			    //  $updid=mysqli_query($con,"update student set uid='$stdid' where student_id='$id'");
				  
				 $target_path = "upload/";
				
				$target_path = $target_path.$id.basename( $_FILES['file']['name']); 
			    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
					{ }

            // upload tc

              	 $target_path = "tc/";
				
				$target_path = $target_path.$id.basename( $_FILES['tc']['name']); 
			    if(move_uploaded_file($_FILES['tc']['tmp_name'], $target_path)) 
					{ 
					
					     $nw = 120;  
                         $nh = 100;  
						 $source = "tc/".$id.basename( $_FILES['tc']['name']);   
                         $dest = "tc/thumb/".$id.basename( $_FILES['tc']['name']);
						 $stype = explode(".", $source);
                         $stype = $stype[count($stype)-1];   
					     $size = getimagesize($source);
                        $w = $size[0];  
                        $h = $size[1];   
						switch($stype) {
    case 'gif':
    $simg = imagecreatefromgif($source);
    break;
    case 'jpg':
    $simg = imagecreatefromjpeg($source);
    break;
    case 'png':
    $simg = imagecreatefrompng($source);
    break;
}
					
$dimg = imagecreatetruecolor($nw, $nh);
$wm = $w/$nw;
$hm = $h/$nh;
$h_height = $nh/2;
$w_height = $nw/2;
 
if($w> $h) {
    $adjusted_width = $w / $hm;
    $half_width = $adjusted_width / 2;
    $int_width = $half_width - $w_height;
    imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
} elseif(($w <$h) || ($w == $h)) {     $adjusted_height = $h / $wm;     $half_height = $adjusted_height / 2;     $int_height = $half_height - $h_height;         imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); } else {     imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); }     imagejpeg($dimg,$dest,100);
					
					
					
					
					
					
					
					}

           // prev_marksheet
            $target_path = "marksheet/";
				
				$target_path = $target_path.$id.basename( $_FILES['prev_marksheet']['name']); 
			    if(move_uploaded_file($_FILES['prev_marksheet']['tmp_name'], $target_path)) 
					{ 
					
					     $nw = 120;  
                         $nh = 100;  
						 $source = "marksheet/".$id.basename( $_FILES['prev_marksheet']['name']);   
                         $dest = "marksheet/thumb/".$id.basename( $_FILES['prev_marksheet']['name']);
						 $stype = explode(".", $source);
                         $stype = $stype[count($stype)-1];   
					     $size = getimagesize($source);
                        $w = $size[0];  
                        $h = $size[1];   
						switch($stype) {
    case 'gif':
    $simg = imagecreatefromgif($source);
    break;
    case 'jpg':
    $simg = imagecreatefromjpeg($source);
    break;
    case 'png':
    $simg = imagecreatefrompng($source);
    break;
}
					
$dimg = imagecreatetruecolor($nw, $nh);
$wm = $w/$nw;
$hm = $h/$nh;
$h_height = $nh/2;
$w_height = $nw/2;
 
if($w> $h) {
    $adjusted_width = $w / $hm;
    $half_width = $adjusted_width / 2;
    $int_width = $half_width - $w_height;
    imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
} elseif(($w <$h) || ($w == $h)) {     $adjusted_height = $h / $wm;     $half_height = $adjusted_height / 2;     $int_height = $half_height - $h_height;         imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); } else {     imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); }     imagejpeg($dimg,$dest,100);
					
	}




				?>
                   <script type="text/javascript">
                    window.location="<?php echo $var."provisional&&sumsg=Inserted Successfully"; ?>";
			       </script>
			  <?php
              //}
	       // else
			   // {
				  //$error_msg="Scholar Number Already Exist";
				//}
			  }
	 }
	 
  ?>

<?php
    
	if(isset($_POST['updatetc']))
	{
		$tcid="tc/".$_POST['student_id'].$_SESSION['uid'].$_POST['tc'];
     		@$a=unlink($tcid);
     
	    $tcid1="tc/thumb/".$_POST['student_id'].$_SESSION['uid'].$_POST['tc'];
		@$a=unlink($tcid1);


		
		 $target_path = "tc/";
				
				$target_path = $target_path.$_POST['student_id'].$_SESSION['uid'].basename( $_FILES['tc']['name']); 
			    if(move_uploaded_file($_FILES['tc']['tmp_name'], $target_path)) 
					{ 
					
					     $nw = 120;  
                         $nh = 100;  
						 $source = "tc/".$_POST['student_id'].$_SESSION['uid'].basename( $_FILES['tc']['name']);   
                         $dest = "tc/thumb/".$_POST['student_id'].$_SESSION['uid'].basename( $_FILES['tc']['name']);
						 $stype = explode(".", $source);
                         $stype = $stype[count($stype)-1];   
					     $size = getimagesize($source);
                        $w = $size[0];  
                        $h = $size[1];   
						switch($stype) {
    case 'gif':
    $simg = imagecreatefromgif($source);
    break;
    case 'jpg':
    $simg = imagecreatefromjpeg($source);
    break;
    case 'png':
    $simg = imagecreatefrompng($source);
    break;
}
					
$dimg = imagecreatetruecolor($nw, $nh);
$wm = $w/$nw;
$hm = $h/$nh;
$h_height = $nh/2;
$w_height = $nw/2;
 
if($w> $h) {
    $adjusted_width = $w / $hm;
    $half_width = $adjusted_width / 2;
    $int_width = $half_width - $w_height;
    imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
} elseif(($w <$h) || ($w == $h)) {     $adjusted_height = $h / $wm;     $half_height = $adjusted_height / 2;     $int_height = $half_height - $h_height;         imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); } else {     imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); }     imagejpeg($dimg,$dest,100);

$tc=$_FILES['tc']['name'];					
$updtc=mysqli_query($con,"update student set tc='$tc' where student_id='".$_POST['student_id']."'");					
	}				
	}				
					
	if(isset($_POST{'update_marksheet'}))				
	{				
	   $mark_id="marksheet/".$_POST['student_id'].$_SESSION['uid'].$_POST['pmarksheet'];
  @$a=unlink($mark_id);
				
      $mark_id1="marksheet/thumb/".$_POST['student_id'].$_SESSION['uid'].$_POST['pmarksheet'];
		@$a=unlink($mark_id1);



           // prev_marksheet
            $target_path = "marksheet/";
				
				$target_path = $target_path.$_POST['student_id'].$_SESSION['uid'].basename( $_FILES['prev_marksheet']['name']); 
			    if(move_uploaded_file($_FILES['prev_marksheet']['tmp_name'], $target_path)) 
					{ 
					
					     $nw = 120;  
                         $nh = 100;  
						 $source = "marksheet/".$_POST['student_id'].$_SESSION['uid'].basename( $_FILES['prev_marksheet']['name']);   
                         $dest = "marksheet/thumb/".$_POST['student_id'].$_SESSION['uid'].basename( $_FILES['prev_marksheet']['name']);
						 $stype = explode(".", $source);
                         $stype = $stype[count($stype)-1];   
					     $size = getimagesize($source);
                        $w = $size[0];  
                        $h = $size[1];   
						switch($stype) {
    case 'gif':
    $simg = imagecreatefromgif($source);
    break;
    case 'jpg':
    $simg = imagecreatefromjpeg($source);
    break;
    case 'png':
    $simg = imagecreatefrompng($source);
    break;
}
					
$dimg = imagecreatetruecolor($nw, $nh);
$wm = $w/$nw;
$hm = $h/$nh;
$h_height = $nh/2;
$w_height = $nw/2;
 
if($w> $h) {
    $adjusted_width = $w / $hm;
    $half_width = $adjusted_width / 2;
    $int_width = $half_width - $w_height;
    imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
} elseif(($w <$h) || ($w == $h)) {     $adjusted_height = $h / $wm;     $half_height = $adjusted_height / 2;     $int_height = $half_height - $h_height;         imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h); } else {     imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); }     imagejpeg($dimg,$dest,100);
					
$marksheet=$_FILES['prev_marksheet']['name'];					
$updtc=mysqli_query($con,"update student set marksheet='$marksheet' where student_id='".$_POST['student_id']."'");					
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
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Student Admission.png" /><a href="index.php">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Admission</h2>
</div>
<div class="col_4">
<div class="form-style-2-heading">Provide your information</div>
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
	   <table> 
<tr><td>Form No.</td> 
<?php
//$maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."'");
//$rowmax=mysqli_fetch_array($maxid);
	 ?>
	<td>
	<input name="stdid" type="text" id="txtname" value="<?php  if(!empty($_GET["upstudid"])){ echo $rowstud["student_id"]; }?>" size="40" class="tb5"  required />
	</td>
	   
	   
	   
	   <td>&nbsp;&nbsp;Type</td> <td> <input type="radio" name="student_type" value="No" <?php if(isset($_GET["upstudid"])){ if($rowstud["addmisionfee"]=="No"){ ?> checked="checked"  <?php } } else { ?> checked="checked" <?php  } ?> >Existing &nbsp;&nbsp; <input type="radio" name="student_type" value="Yes" <?php if(isset($_GET["upstudid"])){ if($rowstud["addmisionfee"]=="Yes"){ ?> checked="checked"  <?php } } ?> >New </td>
	   </tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   <td>Student Name</td> <td> <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>"  />
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
	   
	   <tr><td>RTE Group</td> 
	   <?php
		   if(!empty($_GET["upstudid"]))
			 {
		   ?>
		<td> 
		<input type="radio" name="rti" value="Yes" name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		<input type="radio" name="rti" value="No"  name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		<td> <input type="radio" name="rti" value="Yes" name="mdocu">Yes &nbsp;&nbsp;
		<input type="radio" name="rti" value="No" name="mdocu"  checked="checked" >No</td>
		   
	    <?php
		 }
		?>
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
		<input type="radio" name="bus" value="Yes" name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["bus"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		<input type="radio" name="bus" value="No"  name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["bus"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		<td> <input type="radio" name="bus" value="Yes" name="mdocu">Yes &nbsp;&nbsp;
		<input type="radio" name="bus" value="No" name="mdocu"  checked="checked" >No</td>
		   
	    <?php
		 }
		?>
	    <td>&nbsp;&nbsp;Select House</td> 
		 <td>
		<input  type="radio" value="Aryabhatta" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="Aryabhatta") ) { ?> checked="checked"  <?php  } ?> >Aryabhatta 
		 <input  type="radio" value="Raman" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="Raman") ) { ?> checked="checked"  <?php } ?> >Raman
		 <input  type="radio" value="Kalam" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="Kalam") ) { ?> checked="checked"  <?php   } ?>  >Kalam
		 <input  type="radio" value="Bhabha" name="hname" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hname"]=="Bhabha") ) { ?> checked="checked"  <?php } ?> >Bhabha
		</td>
		</tr>
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		<tr>
		<td><b>Provisional No</b></td>
		<td><input name="pr_no" type="text" id="txtrno" value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['pr_no']; if(isset($_GET["upstudid"])){ echo $rowstud["pr_no"];   }?>" size="40" class="tb5" required /></td>
		 <td>&nbsp;&nbsp;Hostel facility </td> 
		 <td>
<input  type="radio" value="Active" name="hostel_status" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hostel_status"]=="Active") ) { ?> checked="checked" <?php  } ?> >Yes
<input  type="radio" value="Inactive" name="hostel_status" <?php if(!empty($_GET["upstudid"]) && ($rowstud["hostel_status"]=="Inactive") ) { ?> checked="checked"  <?php } ?> checked="checked" >No
		</td>
		</tr>
		
		
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	      <tr>
		  <td>Student Class</td>
		  <td> <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  echo $rowstud['student_class'];  
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
		<td>Mother tongue</td> 
		<td><input name="mot" type="text" id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mot'];  if(isset($_GET["upstudid"])){echo $rowstud["mot"];} ?>" size="40" class="tb5" /></td>
		 </tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr><td>Date Of Birth<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdob"  id="demo1" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdob']; if(isset($_GET["upstudid"])){echo $rowstud["student_dob"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		<td>&nbsp;&nbsp;Date Of Joining<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdoj"  id="demo2" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdoj']; if(isset($_GET["upstudid"])){echo $rowstud["student_doj"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		</tr>
		
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
		 <tr><td>SSSM ID</td>
		  <td><input name="mothertong" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mothertong']; if(isset($_GET["upstudid"])){echo $rowstud["mother_tong"];} ?>"   size="40" maxlength="10" class="tb5"  /></td></td>
		   <td>&nbsp;&nbsp;Religion</td> 
		   <td><input type="text" name="religion" class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['religion']; if(isset($_GET["upstudid"])){echo $rowstud["religion"]; } ?>"  ></td>
		   </tr>
		  
		  
		  
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			
			
			
	     <tr>
		 <td>Scholar No<span style="color:#FF0000">*</span></td> 
		 <td><input name="scholar" type="text" id="txtrno" value="0000" size="40" class="tb5" readonly/></td> 
		 <td>&nbsp;&nbsp;Aadhar No</td> 
		 <td><input name="txtrno" type="text" id="txtrno" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtrno']; if(isset($_GET["upstudid"])){echo $rowstud["student_rollno"];} ?>" size="40" class="tb5"  /></td>
		 </tr>
			  
			  
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
				
				
	   <tr>
	   <td>Bank Name</td> 
	   <td><input type="text" name="prev_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['prev_school']; if(isset($_GET["upstudid"])){echo $rowstud["prev_school"];} ?>" ></td> 
	   <td>Bank A/C No.</td> 
	   <td><input type="text" name="reas_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['reas_school']; if(isset($_GET["upstudid"])){echo $rowstud["reason_change"];} ?>" ></td>
	   </tr>
      
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td>Bank IFSC Code</td> <td><input type="text" name="subject" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['subject']; if(isset($_GET["upstudid"])){echo $rowstud["subj_req"];} ?>" ></td> 
	  <td>&nbsp;&nbsp;</td> 
	  <td><input name="txtemail" type="text" id="txtemail" value="1" size="40" class="tb5"  readonly /></td>
	  </tr>
	  
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td>Father Name</td> 
	  <td><input name="txtfatname" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtfatname']; if(isset($_GET["upstudid"])){echo $rowstud["student_fname"];} ?>" size="40" class="tb5"  /></td> 
	  <td>Father Occupation</td>
	   <td><input type="text" name="fprofession"   id="txtname" value="<?php if(($_POST) && (empty($_GET["fprofession"]))) echo $_POST['fprofession']; if(isset($_GET["upstudid"])){echo $rowstud["f_prof"];} ?>" class="tb5" /></td></tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td>Father Education </td>
	   <td><input type="text" name="fqualification"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['fqualification']; if(isset($_GET["upstudid"])){echo $rowstud["f_quali"];} ?>" class="tb5" /></td> 
	   <td>Mobile No(Father)</td> 
	   <td> <input name="txtmobile" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtmobile']; if(isset($_GET["upstudid"])){echo $rowstud["student_contactno"];} ?>" size="40" maxlength="10" class="tb5"  /></td></tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr>
	  <td>Residential Address</td> 
	  <td><textarea cols="23"  name="address"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['address']; if(isset($_GET["upstudid"])){echo $rowstud["student_address"];} ?></textarea></td>
	   <td>Office Address</td> 
	   <td><textarea cols="23"  name="oaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['oaddress']; if(isset($_GET["upstudid"])){echo $rowstud["f_off_add"];} ?></textarea></td>
	   </tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr>
	   <td>Mother Name</td> 
		<td><input name="m_name" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['m_name']; if(isset($_GET["upstudid"])){echo $rowstud["m_name"];} ?>" size="40" class="tb5"  /></td>
	   <td>Mobile No.(Mother)</td>
	    <td><input name="offadd" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['offadd']; if(isset($_GET["upstudid"])){echo $rowstud["f_tell_no_off"];} ?>" size="40" maxlength="20" class="tb5"  /></td> 
		</tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    </table>
	    
		<?php
		 if(!empty($_GET["upstudid"]))
		 {
		 if(!empty($_GET["upstudid"]) && ($rowstud["m_work"]=="No") ) {   ?>
		 <table>
		  <tr><td>Is Mother Working</td>
		  <td><input type="radio" name="mype" value="Yes" onclick="showMe()">Yes
         <input type="radio" name="mype" value="No" onclick="showMe()">No
          </td>
          </tr>
	    </table>
	  
	      <table  class="row"  id="didfv1" style="display:none">
		   <tr>
		 
            <td width="150">Mother Profession & Designation </td>
             <td><input type="text" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"]; } ?>" class="tb5" /></td>
             <td width="150">Mother Qualification </td>
             <td><input type="text" name="mqualification" style="width:250px;"  id="txtname" value=" <?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"]; } ?>" class="tb5" class="tb5" /></td>
			
			</tr>
		
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
		    <td>Tel No(Off)</td>
			<td>
             <input name="mofftel" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_tel"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            
           </td>
         </tr>
		

		 </table>
		
		<?php } else { ?>
		  
		  <table class="row" id="didfv1" style="display:none">
		   <tr>
		   <td width="150">Mother Profession & Designation </td>
             <td><input type="text" name="mprofession" style="width:250px;"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"];} ?>" class="tb5" /></td>
            
			 <td width="150">Mother Qualification </td>
             <td><input type="text" name="mqualification" style="width:250px;"  id="txtname" value=" <?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"]; } ?>" class="tb5" class="tb5" /></td>
			</tr>
		
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="33"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
		   
		    <td>Tel No(Off)</td>
           <td>
             <input name="mofftel" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?>" size="40" maxlength="10" class="tb5" style="width:250px" />
            </td>
         </tr>
	

		</table>
		<?php } } else  { ?>
		
		<table>
	    <tr>
		  <td>Is Mother Working</td>
		  <td><input type="radio" name="mype" value="Yes" onclick="showMe()">Yes
<input type="radio" name="mype" value="No" checked="checked" onclick="showMe()">No
</td>
         </tr>
		  </table>
		  
		   <table  style="display:none;" class="row" id="didfv1" >
		   <tr>
		 
            <td >Mother Profession & <br> Designation </td>
             <td><input type="text" name="mprofession"  id="txtname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"];} ?>" class="tb5" /></td>
			  <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mother Qualification </td>
             <td><input  type="text" name="mqualification"   id="txtname" value="<?php if(($_POST) && (empty($_GET["mqualification"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"];} ?>" class="tb5" class="tb5" /></td>
			 
            </tr>
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		 <tr>
           <td>Office Address</td>
           <td><textarea cols="23"  name="moaddress"  ><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
		   
		   
		    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tel No(Off)</td>
           <td>
             <input name="mofftel" type="text" id="txtmobile" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?>" size="40" maxlength="10" class="tb5" />
            
           </td>
         </tr>
		

		 </table>
		 
		 <?php
		   }
		 ?>
		<!-- start-->
	   
	   
		<?php
		if(!empty($_GET["upstudid"]))
		{
	    if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="No") ) {   ?>
	   
	   <table>
	   <tr><td> If Any Brother And Sister Studying In This School</td>
	   <td><input type="radio" name="mype2" value="Yes" onclick="showMe2()">Yes<input type="radio" name="mype2" value="No" onclick="showMe2()" checked="checked">No </td>
       </tr>
	   </table>
        
	     <table style="margin-left:45px;">     
	    <tr> 
	    <td> <div id='TextBoxesGroup' ><div id="TextBoxDiv1" style="display:none; margin-left:30px" class="row" >
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
        </div>
         </td>
		 </tr>
		 </table> 
		
		<?php } else { ?>
		<table> 
        <tr>
	    <td>If Any Brother And Sister Studying In This School</td>
		<td><input type="radio" name="mype2" value="Yes" onclick="showMe2()" checked="checked">Yes
        <input type="radio" name="mype2" value="No" onclick="showMe2()">No </td>
        </tr>
		</table>
	 
	    <table style="margin-left:45px;">
		<tr>
	    <td> <div id='TextBoxesGroup' style=" margin-left:30px">
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
		</table>
	  
	    <?php } } else{ ?>
	    
		<table>
		<tr>
		<td> <span style="color:#FF0000; margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
	    <td><input type="radio" name="mype2" value="Yes" onclick="showMe2()">Yes
<input type="radio" name="mype2" value="No" onclick="showMe2()" checked="checked">No </td>
		</tr>
		</table>
		
		<table style="margin-left:45px;">
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
		 </table>
	   <?php
	   }
	   ?>
	   
	   <table>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	     <?php if(isset($_GET["upstudid"]))
		{ 
		
		} else {?>
	   <tr>
	   <td> Medical Document Submitted</td>
	   <td> <input type="radio" name="med" value="Yes" name="mdocu" <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_medi"]=="Yes") ) { ?>  checked="checked" <?php   } ?> >Yes <input type="radio" name="med" value="No" name="mdocu" <?php  if(!empty($_GET["upstudid"]) && ($rowstud["is_medi"]=="No") ) { ?>  checked="checked"<?php   } else { ?>  checked="checked" <?php } ?> >No</td> 
			
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
           <input type="submit" name="add_student" id="add" value="Add" style="width:120px;margin-left:350px" />
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

   