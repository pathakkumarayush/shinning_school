<?php
if(isset($_POST['CreateTimetable']))
{
$sql="SELECT * FROM examination WHERE examination_id = '".$_POST['examination']."'";

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result); 
$_SESSION["exam_name"]=$row["examination_name"];
$_SESSION['examinationid']=$row["examination_id"];
$_SESSION['examinationsession']=$row["examination_session"];
$_SESSION['examinationdate']=$row["examination_date"];
?>
<script type="text/javascript">
window.location="<?php echo $var."timetable_add&examinationname=".$_SESSION["exam_name"];  ?>";
</script>
<?php
}
?>
<?php
if(isset($_POST['sendTimetable']))
{
$sql="SELECT * FROM examination WHERE examination_id = '".$_POST['examination']."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result); 
$_SESSION["exam_name"]=$row["examination_name"];
$_SESSION['examinationid']=$row["examination_id"];
$_SESSION['examinationsession']=$row["examination_session"];
$_SESSION['examinationdate']=$row["examination_date"];
?>
<script type="text/javascript">
window.location="<?php echo $var."sendtimetable2"; ?>";
</script>
<?php
}
?>
 

<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/exam.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Add Exam</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=examhome">Examination</a> >>Create Timetable</a>
<?php
 if(!empty($error))
 {
?>
<div class="error" style="width:300px"><?php echo $error; ?></div>
<?php
}
?>
<?php
 if(!empty($msg))
 {
?>
<div class="success" style="width:200px"><?php echo $msg; ?></div>
<?php
}
?>                
<form action="" method="post">
<table cellspacing="5" style="font-size:14px; margin-top:20px">
   <tr>
    <td>Examination Name :</td>
    <td>
<?php 
$exam=mysqli_query($con,"select * from examination where school='".$_SESSION["uid"]."' and examination_session='".$_SESSION['session']."' ORDER BY examination_id DESC"); ?>
  
    <select name="examination"  >
    <option>Select</option>
	<?php while ($exam1=mysqli_fetch_array($exam)) { ?>
	<option value="<?php echo $exam1["examination_id"]; ?>"><?php echo $exam1["examination_name"]; ?></option>
	<?php } ?>
	</select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
 
  <tr>
   
	<td><input type="submit" name="sendTimetable" value="View Timetable" ></td>
  </tr>
    
   
</table>



</form>
         
					
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
<br><br><br><br><br><br><br><br><br><br>