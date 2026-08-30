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
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

if(isset($_POST["update_student"]))
{	
$res_up=mysqli_query($con,"update student set bus='".$_POST['bus']."',m='".$_POST['m']."',m1='".$_POST['m1']."',m2='".$_POST['m2']."',m3='".$_POST['m3']."',m4='".$_POST['m4']."',m5='".$_POST['m5']."',m6='".$_POST['m6']."',m7='".$_POST['m7']."',m8='".$_POST['m8']."',m9='".$_POST['m9']."',m10='".$_POST['m10']."' where student_id='".$_POST["sid"]."' and student_session='".$_SESSION['session']."'");	
?>
<script type="text/javascript">
                    window.location="<?php echo $var."bus&&sumsg=Update Successfully"; ?>";
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
				   $updateimg=mysqli_query($con,"update student set student_img='$name1' where student_id='".$_POST['imgid']."' and student_session='".$_SESSION['session']."'");
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
			 $stdid="smrtjyoti".$maxv;
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
			$nat=$_POST['nat'];	
			$bus=$_POST['bus'];

			//$bdate = DateTime::createFromFormat('d/m/Y', $_POST["txtdob"]);
			//$newbday = $bdate->format('n/j/Y');

			//$jdate = DateTime::createFromFormat('d/m/Y', $_POST["txtdoj"]);
			//$newjday = $jdate->format('n/j/Y');

		 echo $res_ins=mysqli_query($con,"insert into student(student_id,student_scholar,student_rollno,student_name,student_gender,student_fname,student_dob,student_contactno,student_email,student_address,student_detail,student_school,student_session,student_class,student_section,student_img,uid,adhar_s,religion,caste,prev_school,reason_change,subj_req,f_prof,f_quali,f_off_add,f_tell_no_off,m_name,m_work,m_prof,m_off_add,m_off_tel,m_quali,is_bro,b1,c1,b2,c2,is_medi,addmisionfee,rti,student_doj,tc,marksheet,adm_class,std_type,nat,bus,mot,hname,dob_word,adhar_f,adhar_m,br_no,cla,st_type,cautionmoney,username,password)values('$maxv','".$_POST["scholar"]."','".$_POST["student_rollno"]."','".$_POST["txtname"]."','".$_POST["gender"]."','".$_POST["txtfatname"]."','".$_POST["txtdob"]."','".$_POST["txtmobile"]."','".$_POST["txtemail"]."','".$_POST["address"]."','".$_POST["detail"]."','".$_SESSION["uid"]."','".$_SESSION["session"]."','".$_POST["txtclass"]."','".$_POST["section"]."','$name1','$stdid','".$_POST['adhar_s']."','".$_POST['religion']."','".$_POST['caste']."','".$_POST['prev_school']."','".$_POST['reas_school']."','".$_POST['subject']."','".$_POST['fprofession']."','".$_POST['fqualification']."','".$_POST['oaddress']."','".$_POST['offadd']."','".$_POST['m_name']."','".$_POST['mype']."','".$_POST['mprofession']."','".$_POST['moaddress']."','".$_POST['mofftel']."','".$_POST['mqualification']."','".$_POST['mype2']."','".$_POST['b1']."','".$_POST['c1']."','".$_POST['b2']."','".$_POST['c2']."','".$_POST['med']."','".$_POST['student_type']."','".$_POST['rti']."','".$_POST["txtdoj"]."','$tc','$marksheet','".$_POST['adm_class']."','$t','$nat','$bus','".$_POST['mot']."','".$_POST['hname']."','".$_POST['dob_word']."','".$_POST['adhar_f']."','".$_POST['adhar_m']."','".$_POST['br_no']."','".$_POST['cla']."','".$_POST['st_type']."','".$_POST['cm']."','".$_POST['scholar']."','$stdid')")
or die(mysqli_error());
		      
			 $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
			  
	   $msg="Your child ".$_POST["txtname"]." has Been successfully Enrolled in ".$rowsch['school_name']." ";	
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
<div class="full_div" style="margin-top:100px;">
<br clear="all" />
<div class="left_sect"><img src="images/Student Admission.png" /><a href="./?pageid=transport_student">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Inactive/Active Transport Student</h2>
</div>
<div class="col_4">
<div class="form-style-2-heading">Inactive Transport Student</div>
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
	   <table > 
       <?php
	   $sql=mysqli_query($con,"select * from student where student_id='".$_GET['upstudid']."' and student_session='".$_SESSION['session']."'");
	   $row=mysqli_fetch_array($sql);
	   ?>
	  
	   <tr>
	 
	 <tr>
	  <td><?php echo $row['student_name']; ?>-</td><td><?php echo $row['student_class']; ?></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			
	  </tr>
	 
	  <tr>
	  <td colspan="13">&nbsp; </td>
			
	  </tr>
	 
	 
	   <td> 
	   <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
       <select class="select" name="bus" style="width:125px;">
	   <option value="No"  <?php if($row['bus']=="No") { ?> selected="selected" <?php } ?>>Inactive</option>
	   <option value="Yes" <?php if($row['bus']=="Yes") { ?> selected="selected" <?php } ?>>Active</option>
	   </select>
	  </td> 
	  
	  <td>  <select name="m1" class="select" style="width:75px"/>
			 <option value="April" <?php if($row['m1']=="April") { ?> selected="selected" <?php } ?>>April</option>
			 <option value="No" <?php if($row['m1']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	 
	
	  
	  	   <td>  
             <select name="m2" class="select" style="width:75px"/>
			 <option value="July" <?php if($row['m2']=="July") { ?> selected="selected" <?php } ?>>July</option>
			 <option value="No" <?php if($row['m2']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 

	  
	  <td>  
             <select name="m3" class="select" style="width:75px"/>
			 <option value="August" <?php if($row['m3']=="August") { ?> selected="selected" <?php } ?>>August</option>
			 <option value="No" <?php if($row['m3']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  <td>  
             <select name="m4" class="select" style="width:75px"/>
			 <option value="September" <?php if($row['m4']=="September") { ?> selected="selected" <?php } ?>>September</option>
			 <option value="No" <?php if($row['m4']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  <td>  
             <select name="m5" class="select" style="width:75px"/>
			 <option value="October" <?php if($row['m5']=="October") { ?> selected="selected" <?php } ?>>October</option>
			 <option value="No" <?php if($row['m5']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  
	  <td>  
             <select name="m6" class="select" style="width:75px"/>
			 <option value="November" <?php if($row['m6']=="November") { ?> selected="selected" <?php } ?>>November</option>
			 <option value="No" <?php if($row['m6']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  <td>  
             <select name="m7" class="select" style="width:75px"/>
			 <option value="December" <?php if($row['m7']=="December") { ?> selected="selected" <?php } ?>>December</option>
			 <option value="No" <?php if($row['m7']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  
	  <td>  
             <select name="m8" class="select" style="width:75px"/>
			 <option value="January" <?php if($row['m8']=="January") { ?> selected="selected" <?php } ?>>January</option>
			 <option value="No" <?php if($row['m8']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  
	  
	  <td>  
             <select name="m9" class="select" style="width:75px"/>
			 <option value="February" <?php if($row['m9']=="February") { ?> selected="selected" <?php } ?>>February</option>
			 <option value="No" <?php if($row['m9']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	  
	  <td>  
             <select name="m10" class="select" style="width:75px"/>
			 <option value="March" <?php if($row['m10']=="March") { ?> selected="selected" <?php } ?>>March</option>
			 <option value="No" <?php if($row['m10']=="No") { ?> selected="selected" <?php } ?>>No</option>
			 </select>
	  </td> 
	  
	    <td>  
             <select name="m" class="select" style="width:75px"/>
			 <option value="1" <?php if($row['m']=="1") { ?> selected="selected" <?php } ?>>1</option>
			 <option value="2" <?php if($row['m']=="2") { ?> selected="selected" <?php } ?>>2</option>
			 <option value="3" <?php if($row['m']=="3") { ?> selected="selected" <?php } ?>>3</option>
			 <option value="4" <?php if($row['m']=="4") { ?> selected="selected" <?php } ?>>4</option>
			 <option value="5" <?php if($row['m']=="5") { ?> selected="selected" <?php } ?>>5</option>
			 <option value="6" <?php if($row['m']=="6") { ?> selected="selected" <?php } ?>>6</option>
			 <option value="7" <?php if($row['m']=="7") { ?> selected="selected" <?php } ?>>7</option>
			 <option value="8" <?php if($row['m']=="8") { ?> selected="selected" <?php } ?>>8</option>
			 <option value="9" <?php if($row['m']=="9") { ?> selected="selected" <?php } ?>>9</option>
			 <option value="10" <?php if($row['m']=="10") { ?> selected="selected" <?php } ?>>10</option>
		
			 </select>
	  </td> 
	  </tr>
	  <tr>
	  <td colspan="13">&nbsp; </td>
			
	  </tr>
			
			<tr>
	  <td colspan="13"><input type="submit"  name="update_student" id="add" value="Update" style="width:120px;margin-left:50px" /> </td>
			
	  </tr>
			
	  
          
			   
              
		   
	  
	
	 
	   
	 
	      
	   
	   
	   
	 
				
				
	  
	    
		
	
		</table>
	  
		<!-- start-->
	   
	   
	
	  
	   
	  
	  <table>
	  
	  <tr>
           
         
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
