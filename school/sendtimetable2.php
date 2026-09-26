<?php	
   
	  	$class=mysqli_query($con,"select * from student where student_school='".$_SESSION["uid"]."' and uid='".$_SESSION['userid']."'");
	   
	   
	   $rowclass=mysqli_fetch_array($class);
	   $exam=mysqli_query($con,"select * from exam where examination='".$_SESSION["exam_name"]."' and session='".$_SESSION['examinationsession']."'  and school='".$_SESSION["uid"]."' and class='".$rowclass['student_class'].$rowclass['student_section']."' order by sdate ASC");



$msg=array();
	
		while ($exam1=mysqli_fetch_array($exam))
	{
	   array_push($msg,ucwords($exam1['subject']).":".date("d-m-Y",strtotime($exam1['sdate'])));
	}
      $imp= implode(",",$msg);

	$_SESSION['cont']=$_POST['txtclass'];
	
 
	
?>	
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/exam.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px"> Exam Timetable </span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=exam_timetable2">Back</a> >>Exam Timetable</a>

      
<form action="" method="post">
<br /><br />
<h2 style="color:#A6EC6A; margin-left:20px; ">Time Table :- <?php echo $exli1["examination_date"]; ?> </h2> <br />
<div style="margin-left:100px;">

  

<?php
   //  $imp2=implode(",",$msg);
    // echo $imp2;
?>

<span style="font-size:20px; color:#990033; font-weight:bold">Timetable For Class <?php echo ucwords($rowclass["class"])."&nbsp; For &nbsp;".ucwords($_SESSION["exam_name"]);   ?> </span> <br>
<table border="1" width="400"  style="margin-top:20px">
    <tr style="margin:15px 0px 0px 0px; font-size:18px">
	    <td>&nbsp;<b>Sr.No</b></td>
	    <td>&nbsp;<b>Exam</b></td>
		 <td>&nbsp;<b>Date</b></td> 
	</tr>
	<?php
	    $i=1;
	    foreach($msg as $msg1)
		{
		
		list($header, $val) = split('[:]', $msg1);
	 ?>
	<tr style="font-size:14px">
	   <td><?php echo $i;  ?></td>
	  <td><?php echo $header;  ?></td>
	  <td><?php echo $val;  ?></td>
   </tr>
     <?php
	   $i++;
	   }
	 ?>
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