 <?php
session_start();
if(isset($_POST['submit']))
{
   if(empty($_POST['teacher']) || empty($_POST['day']) || empty($_POST['date']))
   {
     $errormsg="Please Provide Complete Information";
   }
   if(empty($errormsg))
   {
	 $_SESSION['day']=$_POST['day'];  	
     $query=mysqli_query($con,"insert into teach_absent(teach_id,day,date,school,session) values('".$_POST['teacher']."','".$_POST['day']."','".$_POST['date']."','".$_SESSION['uid']."','".$_SESSION['session']."')");
	
     ?>
<script type="text/ecmascript">
	  window.location = "<?php echo $var.teach_subst; ?>";
	</script>

	<?php  
    }
}
$school=mysqli_query($con,"select * from school where id='".$_SESSION['uid']."'");
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
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
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Fee Structure</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Structure</a> >>Add Header</a>
             <form method="post" action="#" enctype="multipart/form-data" style="margin:0px 140px 0px 0px">
    <?php
	          if(!empty($error_msg))
			{
			 require_once("add_stud.php");?>
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php failure_message($error_msg,"","100%","none");?></div>
			 <?php  
			 } 
             if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
						<?php  } ?>
     
     
        <br>
          
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="font-size:16px">

<tr>
   <td>Name of Absent Teacher<span>*</span></td>
   <td>
     <select name="teacher" class="styled" style="width:155px">
       <option value="0">Teacher Name</option>
	  <?php 
      $teacher=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."'");
       while($rowteacher=mysqli_fetch_array($teacher))
	   {
		?>  
	     <option value="<?php echo $rowteacher['teacher_name'].$rowteacher['code']; ?>"><?php echo $rowteacher['teacher_name'].$rowteacher['code']; ?></option>
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
   <td>Days<span>*</span></td>
   <td>
       <select name="day" class="styled" style="width:155px" >
       <option value="0">Select Days</option>
	   <?php
	       $days=mysqli_query($con,"select * from days");
		   while($rowdays=mysqli_fetch_array($days))
		   {
	   ?>
        <option value="<?php echo $rowdays['day']; ?>"><?php echo $rowdays['day']; ?></option>
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
   <td>Date<span>*</span></td>
   <td> <input name="date"  id="demo1" type="text"   size="40" class="tb5" style="width:130px" /><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
   <td></td>
   <td><input type="submit" name="submit" value="submit"></td>
</tr>


</table>
        <br />
        </div>
    </form>
                   <div class="box-head" style="margin:40px 0px 0px 0px">
						<h2 class="left">Teacher Detail</h2>
						</div>
				   <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll; margin-top:40px">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
       <td><b>SR</b></td>
       <td><b>Teacher Name</b></td>
       <td><b>Day</b></td>
       <td><b>Detail</b></td>
     </tr>
       <?php
	        
			$teach_det=mysqli_query($con,"select * from teach_absent where day='".$_SESSION['day']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
		    while($teach=mysqli_fetch_array($teach_det))
		   { 
		   $i=1;
		  $teach_rec=mysqli_query($con,"SELECT * FROM `timetable` WHERE dayid='".$_SESSION['day']."' and teacher='".$teach['teach_id']."' and school_id='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
    while($rowt=mysqli_fetch_array($teach_rec))
	{
	   $teachname2=mysqli_query($con,"SELECT * FROM teacher WHERE teacher_name='".$rowt['teacher']."' and teacher_school='".$_SESSION['uid']."' and teacher_session='".$_SESSION['session']."'");
	    
	   $rowname2=mysqli_fetch_array($teachname2);		
	   $selpr=mysqli_query($con,"SELECT * FROM `tesch_priority` WHERE subject='".$rowt['subject_id']."' and class='".$rowt['class_id']."' and school='".$_SESSION['uid']."' and teacher<>'".$rowname2['teacher_id']."' and session='".$_SESSION['session']."' order by priority");
	       
		   $id=0;
	 	  	while($rpririty=mysqli_fetch_array($selpr))
			{
	         $teachname=mysqli_query($con,"SELECT * FROM teacher WHERE teacher_id='".$rpririty['teacher']."' and teacher_school='".$_SESSION['uid']."' and teacher_session='".$_SESSION['session']."'");
	         
			 $rowname=mysqli_fetch_array($teachname);	
	         $chk=mysqli_query($con,"SELECT * FROM `timetable` WHERE teacher='".$rowname['teacher_name']."' and school_id='".$_SESSION['uid']."' and period_id='".$rowt['period_id']."' and session='".$_SESSION['session']."' and dayid='".$_SESSION['day']."'");
			
	  	   if(mysqli_num_rows($chk)<1)
	   {
		   $teach_det2=mysqli_query($con,"select * from teach_absent where day='".$_SESSION['day']."' and school='".$_SESSION['uid']."' and teach_id='".$rowname['teacher_name']."' and session='".$_SESSION['session']."'");
		   
		    if(mysqli_num_rows($teach_det2)<1)
			{  
		      $updprox=mysqli_query($con,"update timetable set proxy_teacher='".$rowname['teacher_name']."' where id='".$rowt['id']."' and id<>'$id'");		         $id=$rowt['id'];
			}
	   }
			}
	
	}

             //$teachname=mysqli_query($con,"SELECT * FROM teachers WHERE teacher_id='".$teach['teach_id']."'");
	         //$rowname=mysqli_fetch_array($teachname);
		?>
	  <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $teach['teach_id']; ?></td>
        <td><?php echo $teach['day']; ?></td>
     <td>
            
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                   <td><b>Class</b></td>
                   <td><b>Period</b></td>
                   <td><b>Subject</b></td>
                    <td><b>Proxy Teacher</b></td>
             </tr> 
                 <?php
                   $timetabledet=mysqli_query($con,"SELECT * FROM `timetable` WHERE teacher='".$teach['teach_id']."' and school_id='".$_SESSION['uid']."'");
				   while($rowtime_det=mysqli_fetch_array($timetabledet))
				   {
					?> 
                     <tr>  
					    <td><?php echo $rowtime_det['class_id']; ?></td>
                        <td><?php echo $rowtime_det['period_id']; ?></td>
                        <td><?php echo $rowtime_det['subject_id']; ?></td>  
                        <td><?php echo $rowtime_det['proxy_teacher'];?></td>
				    </tr>
				   <?php
                   } 
				 ?>
            </table>
        </td>
       
	  <?php
	        $i=$i+1;
		  }
	  ?>
    
    </tr>
 
</table>
				 </div>  
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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>