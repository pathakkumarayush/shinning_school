<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert( "Please Select Class" );
     return false;
   }
   else
   {
	return true; 
	}
}
</script>

<?php
if(!empty($_GET['dtid']))
{
$delete=mysqli_query($con,"delete from tesch_priority where id='".$_GET['dtid']."'");
$msg="Deleted Successfully";
}

if(isset($_POST['submit2']))
{
$_SESSION['alltea']=$_POST['all_teacher'];	
$chk=mysqli_query($con,"select * from tesch_priority where class='".$_POST['class']."' and priority='".$_POST['prio']."' and subject='".$_POST['priority']."' and school='".$_SESSION['uid']."'");
if(mysqli_num_rows($chk)>0)
{
   $rowchk=mysqli_fetch_array($chk);	
  $teaname=mysqli_query($con,"select * from teacher where teacher_id='".$rowchk['teacher']."' and teacher_school='".$_SESSION['uid']."'");	
  
  $rowteachername=mysqli_fetch_array($teaname);
  
  ?> 
<script type="text/ecmascript">
alert("Yo9u have already given this priority to <?php echo $rowteachername['teachername'];?> for this class.");
</script>
<?php
}
else
{

$quepr=mysqli_query($con,"insert into tesch_priority(class,teacher,priority,subject,school,session) values('".$_POST['class']."','".$_SESSION['alltea']."','".$_POST['prio']."','".$_POST['priority']."','".$_SESSION['uid']."','".$_SESSION['session']."')");	
$period=$rowteachername1['max_per']-1;
$update=mysqli_query($con,"update teacher set max_per='$period' where teacher_id='".$_SESSION['alltea']."' and teacher_school='".$_SESSION['uid']."'");
$msg="Inserted Successfully";
}
}
 
if(isset($_POST['update1']))
{
  $chk=mysqli_query($con,"select * from tesch_priority where class='".$_POST['class']."' and priority='".$_POST['prio']."' and subject='".$_POST['subject']."' and school='".$_SESSION['uid']."'");	
if(mysqli_num_rows($chk)>0)
{
    
  ?> 
<script type="text/ecmascript">
alert("Yo9u have already given this priority to <?php echo $rowteachername['teachername'];?> for this class.");
</script>	
<?php
}
else
{
?>	
 <?php
 $update=mysqli_query($con,"update tesch_priority set priority='".$_POST['prio']."'  where id='".$_POST['id3']."' and school='".$_SESSION['uid']."'");	
?>
<script type="text/javascript">
window.location="<?php echo $var."subpref&sums=updated Successfully" ?>";
</script>
<?php
}

}

?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Teacher Priority")) { 
        return false;
    }
    
} 
</script>
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

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Time Table/time.png" /><a href="./?pageid=time_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Subject </h2>
<a href="./?pageid=teacherperiod" style="float:right; text-decoration:none; color:#FFFFFF; margin-top:8px; background-color:#006666; padding:8px; margin-right:10px;">Teacher Setting</a>
</div>
<div class="col_4" style="margin-top:0px;" >		
				
                
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());">
                  <?php
   if(!empty($errormsg))
   { ?>
	
    <div class="error" style="width:250px; height:10px; margin-left:120px"><?php echo $errormsg; ?></div>
   <?php
   }
?>
<?php
   if(!empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:120px"><?php echo $msg;?></div>
   <?php
   }
   if(!empty($_GET['sums']) && empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:120px"><?php echo $_GET['sums'];?></div>
   <?php
   }
		if(empty($_GET['id']))
		{
		?>
		<table style="margin-top:30px; margin-left:20px; font-size:15px">
    <?php
	        $status="Active";
		     $que_teac=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' and status='$status'");
	?>
<tr>
   <td>Teacher Name<span>*</span></td>
   <td><select name="all_teacher" class="select" style="width:155px">
       <option>Select Teacher</option>
       <?php         
			 while($row_tea=mysqli_fetch_array($que_teac))
			 {
			?>	 
			<option value="<?php echo $row_tea['teacher_id'];?>"><?php echo $row_tea['teacher_name']?></option>
            <?php	 
			}
		  ?>
       </select></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Class<br/></td>
<td> 


<?php
	      $class1=mysqli_query($con,"select distinct class from class where school='".$_SESSION['uid']."'");
?>
<select name="class" class="select" style="width:150px" onchange="showdata3(this.value)">
         <?php		
		  While($rowclass1=mysqli_fetch_array($class1))
		  {
		?>	
          
	        <option value="<?php echo $rowclass1['class'];?>" <?php if($rowclass1['class']==$_SESSION['s']) { ?> selected="selected" <?php } ?>><?php echo $rowclass1['class'];?></option><br>		         
	  <?php 
          }
	    ?>
		</select>
		
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Subjects&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br></td>
<td>
  <div style="border:#FF0000 0px solid; height:80px; overflow:scroll; border:#CCCCCC 1px solid">
<?php
		  $subject1=mysqli_query($con,"select distinct name from subjects where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and class='".$_SESSION['s']."'");
		  while($rowsubject1=mysqli_fetch_array($subject1))
		     {
			?>
             
			<input type="radio" name="priority" style="margin:5px 0px 0px 20px" value="<?php echo $rowsubject1['name'];?>" <?php if($rowuserdet['subject']==$rowsubject1['name']){ ?> checked="checked"<?php } ?>><?php echo ucfirst($rowsubject1['name']);?><br>
			<?php	 
		     }
		?>
		</div>
		</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
   <td>Priority<span style="color:#F00">*</span></td>
   <td>
     <select name="prio" class="select" style="width:155px">
      <option value="1" <?php if($rowuserdet['priority']==1){ ?> selected="selected"  <?php }?>>Priority 1</option>
      <option value="2" <?php if($rowuserdet['priority']==2){ ?> selected="selected"  <?php }?>>Priority 2</option>
      <option value="3" <?php if($rowuserdet['v']==3){ ?> selected="selected"  <?php }?>>Priority 3</option>
      <option value="4" <?php if($rowuserdet['priority']==4){ ?> selected="selected"  <?php }?>>Priority 4</option>
      <option value="5" <?php if($rowuserdet['priority']==5){ ?> selected="selected"  <?php }?>>Priority 5</option>
      <option value="6" <?php if($rowuserdet['priority']==6){ ?> selected="selected"  <?php }?>>Priority 6</option>
      <option value="7" <?php if($rowuserdet['priority']==7){ ?> selected="selected"  <?php }?>>Priority 7</option>
       <option value="8" <?php if($rowuserdet['priority']==8){ ?> selected="selected"  <?php }?>>Priority 8</option>
      <option value="9" <?php if($rowuserdet['priority']==9){ ?> selected="selected"  <?php }?>>Priority 9</option>
      <option value="10" <?php if($rowuserdet['priority']==10){ ?> selected="selected"  <?php }?>>Priority 10</option>
      </select>
      </td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="submit2" value="Add Teacher" style="font-size:14px"></td>
</tr>
</table>
      <?php
	    }
		  else
		    {
			?>
			<table width="400" style="font-size:14px; margin:20px 0px 0px 0px">
      <?php
		      $userdet=mysqli_query($con,"select * from tesch_priority where id='".$_GET['id']."' and school='".$_SESSION['uid']."'");	
              $rowuserdet=mysqli_fetch_array($userdet); 
		 ?>
<tr>
   <td>Teacher Name<span>*</span></td>  
        <?php
		     $que_teac=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' and teacher_session='".$_SESSION['session']."' and teacher_id='".$rowuserdet['teacher']."'");
	  
	   $row_tea=mysqli_fetch_array($que_teac);
			 
			?>	 
			<td><?php echo ucwords($row_tea['teacher_name']);?></td>
           
 
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>Class</td>
   <td><?php echo $rowuserdet['class']; ?></td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp; </td>
</tr>
<tr>
   <td>Subject</td>
   <td><?php echo $rowuserdet['subject']; ?></td>
   <input type="hidden" name="subject" value="<?php echo $rowuserdet['subject']; ?>"/>
   <input type="hidden" name="class" value="<?php echo $rowuserdet['class']; ?>"/>
   <input type="hidden" name="id3" value="<?php echo $rowuserdet['id']; ?>" />
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp; </td>
</tr>
<tr>
   <td>Priority<span style="color:#F00">*</span></td>
   <td>
     <select name="prio" class="select" style="width:155px">
      <option value="1" <?php if($rowuserdet['priority']==1){ ?> selected="selected"  <?php }?>>Priority 1</option>
      <option value="2" <?php if($rowuserdet['priority']==2){ ?> selected="selected"  <?php }?>>Priority 2</option>
      <option value="3" <?php if($rowuserdet['v']==3){ ?> selected="selected"  <?php }?>>Priority 3</option>
      <option value="4" <?php if($rowuserdet['priority']==4){ ?> selected="selected"  <?php }?>>Priority 4</option>
      <option value="5" <?php if($rowuserdet['priority']==5){ ?> selected="selected"  <?php }?>>Priority 5</option>
      <option value="6" <?php if($rowuserdet['priority']==6){ ?> selected="selected"  <?php }?>>Priority 6</option>
      <option value="7" <?php if($rowuserdet['priority']==7){ ?> selected="selected"  <?php }?>>Priority 7</option>
       <option value="8" <?php if($rowuserdet['priority']==8){ ?> selected="selected"  <?php }?>>Priority 8</option>
      <option value="9" <?php if($rowuserdet['priority']==9){ ?> selected="selected"  <?php }?>>Priority 9</option>
      <option value="10" <?php if($rowuserdet['priority']==10){ ?> selected="selected"  <?php }?>>Priority 10</option>
      </select>
      </td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp; </td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="update1" value="update" style="width:120px" ></td>
</tr>
</table>
		<?php
		  }
		?>
		<br><br>
		   <?php
		    $fet_sub=mysqli_query($con,"select  * from class where school='".$_SESSION['uid']."'");
            $fetsub=mysqli_fetch_array($fet_sub);
		    $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='".$fetsub['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' ");           
		   $rowcountsub=mysqli_fetch_array($nosub);
		   $val=$fetsub['no_of_periods']-$rowcountsub['sum(no_of_periods)'];
		 ?>
            <div class="box-head" style="margin-top:60px">
						
						
						</div>
        
		   <div class="table" style="border:#FF0000 0px solid; height:320px; overflow:scroll; ">
         <table  border="0" width="720px" style="margin:40px 0px 0px 10px;border-radius:10px;">
<tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
    <td align="center">Sr.No</td>
    <td align="center">Teacher Name</td>
    <td align="center">Priority</td>
     </tr>
 <?php
 $i=1;
  $que_teac1=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' ");
  while($row_tea1=mysqli_fetch_array($que_teac1))
			 {
			?>
            <tr>	 
			<td><?php echo $i;  ?></td>
            <td><?php echo ucwords($row_tea1['teacher_name']); ?><span style="color:#FF0000; font-weight:bold">(<?php echo $row_tea1['uid']; ?>)</span></td>
            
            <td>
                <?php
                    $priordet=mysqli_query($con,"SELECT * FROM `tesch_priority` WHERE teacher='".$row_tea1['teacher_id']."'  and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' ");
               
				 ?>
                 <table >
                    <tr>
                       <td><b>Class</b></td>
                       <td><b>Subject</b></td>
                       <td><b>Priority</b></td>
                       <td><b>Update</b></td>
					   <td><b>Delete</b></td>
                    </tr> 
                    <?php
					    while($rowpriority=mysqli_fetch_array($priordet))
						{
						?>	
                        <tr>
                        <td><?php echo $rowpriority['class'];   ?></td>
                        <td><?php echo ucfirst($rowpriority['subject']);   ?></td>
                        <td><?php echo $rowpriority['priority'];   ?></td>
                        <td><a href="<?php echo $var."subpref&&id=".$rowpriority['id']; ?>"><b>Edit</b></a></td>
                        <td><a href="<?php echo $var."subpref&&dtid=".$rowpriority['id']; ?>" onclick="return confirmation()"><b>Delete</b></a></td>
					    </tr>
						<?php	
					    }
					   ?>
                  </table>
             </td>
                

            </tr>
			<?php	
			$i++; 
			}
		  ?>

</table>
           
         </div>
      
                 
                   </form>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				
				<!-- End Box -->
				
				</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
			