<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>



  <?php
     if(isset($_POST['add_student']))
     {
	 
   
			     $class = $_POST['class'];
				 $sub = $_POST['sub_id'];
				 $cha = $_POST['cap_id'];
				 $msg = $_POST['msg'];
				 $tid = $_POST['tid'];
				 $stdid = $_POST['stdid'];
				 $hid = $_POST['hid'];
				 
				 $file_name = $_FILES['tc_file']['name'];
			     $file_size =$_FILES['tc_file']['size'];
			     $file_tmp =$_FILES['tc_file']['tmp_name'];
			     $file_type=$_FILES['tc_file']['type'];
			     $file_ext=strtolower(end(explode('.',$_FILES['tc_file']['name'])));
				 $file_name=rand().$file_name;
				 move_uploaded_file($file_tmp,"hwork/".$file_name);
				 
			     
			  
                 $query=mysqli_query($con,"insert into homework_std(class,cap_id,sub_id,homwork,assign_by,stdid,image,hid) values('".$_POST['class']."','$cha','$sub','$msg','$tid','$stdid','https://smarterponline.com/aryans/student/hwork/$file_name','$hid')");
			    	
			 $msg="Homwork Send Successflly";   		
			       	
			      

		 }
    ?>


<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>
<style type="text/css">
.succ{ width:300px; background-color:#FF0000; color:#FFFFFF; margin-left:50px; font-weight:bold; line-height:25px;border-radius:4px;}
.succ span{ margin-left:10px;}
 div.content {
   
    clear: left;
    padding: 1em;
	width:700px;
	
	border-radius:4px;
	margin-bottom:5px;
}

div.content.inactive {
	display: none;
}
#sms a {
	text-decoration:none;
	background-color: #336600;
	padding:7px 7px 7px 7px ;
	border-top-right-radius:5px;
	border-top-left-radius:5px;
	color:#fff;
}

#sms a:hover {
	text-decoration:none;
	background-color:#990000;
	color:#fff;
	padding:7px 7px 7px 7px ;
	
}

#sms a.active {
	text-decoration:none;
	background-color:#F08315;
	color:#fff;
	padding:7px 7px 7px 7px ;
	
}

#sms{
	display:inline;
    margin:5px 5px 5px 5px ;
}

</style>

         
<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">


<div class="left_side">
<div id="tog" style=""><button >
<img src="images/r.png"  style="float:right; "/></button>

</div>

<?php include('left.php'); ?>

</div>

<div class="right_side">
        <?php   
        $search=mysqli_query($con,"select * from homework where homework_id='".$_GET['id']."' ");
	    $studrow=mysqli_fetch_array($search);
		?>
<div class="pro">
<b>&nbsp;&nbsp;&nbsp;Submit Homework</b>
<br clear="all" />
</div>				
<div class="fee_main" style="">


          <div class="content">
          
          <table class="table4">
          <?php 
		  $logo2 = mysqli_query($con,"SELECT * FROM student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."'");
		  $logo3=mysqli_fetch_array($logo2);
		  
		  
		  
	      $query_teacher=mysqli_query($con,"select * from teacher where teacher_id='".$studrow['assign_by']."'");
	      $row_teach=mysqli_fetch_array($query_teacher);
	      ?>

         <form method="post" name="myForm" id="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
		  <tr>
          <td>&nbsp;To</td>
          <td>
		  <input type="hidden" name="tid" value="<?php echo $studrow['assign_by']; ?>" />
		  <input type="hidden" name="cap_id" value="<?php echo $studrow['cap_id']; ?>" />
		  <input type="hidden" name="sub_id" value="<?php echo $studrow['sub_id']; ?>" />
		  <input type="hidden" name="class" value="<?php echo $studrow['class']; ?>" />
		  <input type="hidden" name="stdid" value="<?php echo $logo3['student_id']; ?>" />
		   <input type="hidden" name="hid" value="<?php echo $_GET['id']; ?>" />
	      <?php echo ucwords($row_teach['teacher_name']); ?>
	      </td>
          </tr>
          <tr>
          <td>&nbsp;</td>
	      <td>&nbsp;</td>
          </tr>
          <tr>
          <td width="64">&nbsp;Chapter</td>
          <td width="200">
		  <?php 
		   $cap = $studrow['cap_id'];
	       $fet_cap=mysqli_query($con,"select  * from add_chapter where id='$cap'");
	       $rowcap=mysqli_fetch_array($fet_cap);
		   echo $rowcap['cname'] ?>
	      </td>
          </tr>
		  
		  <tr>
          <td>&nbsp;</td>
	      <td>&nbsp;</td>
          </tr>
          <tr>
          <td width="64">&nbsp;Subject</td>
          <td width="200">
		  <?php 
		   $sub= $studrow['sub_id'];
	       $fet_subj=mysqli_query($con,"select  * from subject where subject_id='$sub'");
	       $rowsub=mysqli_fetch_array($fet_subj);
		   echo $rowsub['subject_name'] ?>
	      </td>
          </tr>
		  
          <tr>
          <td>&nbsp;</td>
	      <td>&nbsp;</td>
          </tr>
		  <tr>
	    <td>Upload Image<small style="font-size: 10px;">(30mb MAX)</small><span style="color:#FF0000">*</span></td>
	   	<td><input type="file" name="tc_file"></td>
	   	</tr>
		  <tr>
          <td>&nbsp;</td>
	      <td>&nbsp;</td>
          </tr>
		  
          <tr>
          <td width="90">Homework <label style="color:#FF0000">*</label><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;</td>
          <td><textarea placeholder="Enter Your Query Here" name="msg" style="width:98%; height:100px;"  maxlength="220" required></textarea>
	 </td>
  </tr>
 
	 

         <tr>
         <td>&nbsp;<br />&nbsp;</td>
         <td><input type="submit"  value="Submit Homework" name="add_student" /> <br />&nbsp;</td>
         </tr>
		 
		   </table>
         </form >
       
	    <?php 
		 if(!empty($msg))
		 {
		 echo "<div class='succ'><span> $msg </span></div>"; 
		 }
		 ?> 
         </div>
        


</div>
</div>



</div>

<br clear="all" />
</div>
</div>
</div>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>