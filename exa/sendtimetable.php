<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php	
    if(isset($_POST['sendTimetable']))
	{
	  	$class=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."' and class_id='".$_POST['txtclass']."'");
	   $rowclass=mysqli_fetch_array($class);
	  $exam=mysqli_query($con,"select * from exam where examination='".$_SESSION["exam_name"]."' and session='".$_SESSION['examinationsession']."'  and class='".$rowclass['class']."' order by sdate ASC");
$msg=array();
	
	while ($exam1=mysqli_fetch_array($exam))
	{
	array_push($msg,ucwords($exam1['subject']).":".date("d-m-Y",strtotime($exam1['sdate'])));
	}
      $imp= implode(",",$msg);
	$msg="Your child NAME Time table for ".$_SESSION["exam_name"]." is ".$imp;
	$_SESSION['cont']=$_POST['txtclass'];
	}	
  if(isset($_POST['sendTimetable1']))
	{
	
	 echo $_POST['msg'];
	
     $page=1;
	 $class=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."' and class_id='".$_SESSION['cont']."'");
	 $rowclass=mysqli_fetch_array($class);
	
$qry=mysqli_query($con,"select * from student where student_class='".$rowclass['class']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");

    $sub="Timetable Message";
    while($row=mysqli_fetch_array($qry))
	{
	$session=$_SESSION['session'];
	$r=sms($_SESSION["uid"],$row['student_id'],$sub,$_POST['msg'],'Yes',$session,$page);
    }
}
?>	
<div id="container" >
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:90px">
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
<br /><br />
<h2 style="color:#A6EC6A; margin-left:20px; ">Time Table :- <?php echo $exli1["examination_date"]; ?> </h2> <br />
<div style="margin-left:100px;">
<table cellspacing="5" style="font-size:14px">
  <tr>
    <td>School Name :</td>
    <td><?php echo $_SESSION["uid"]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td>Examination Name :</td>
    <td><?php  echo ucwords($_SESSION["exam_name"]); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
  </tr>
  <tr>
    <td>Class :</td>
   <td>
             <select name="txtclass" style="width:215px;" class="select">
             
		 <option value="">Select Class</option>
             
               <?php
        $res=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
          ?>
		     <option value="<?php echo  $rows["class_id"]; ?>"><?php echo  $rows["class"].$rows["class_section"]; ?></option>
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
      <td>Message <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp; </td>
	  <td><textarea name="msg" rows="5" cols="27" style="color:#3300CC" ><?php echo $msg;  ?></textarea></td>
	  </tr>
  </tr>
  <tr>
    <td>&nbsp;</td>
	<td><input type="submit" name="sendTimetable" value="View" style="height:30px; width:100px" >&nbsp;<input type="submit" name="sendTimetable1" value="Send" style="height:30px; width:100px" ></td>
  </tr>
    
   
</table>
</form>
</div>
</form>
 </div>
</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>