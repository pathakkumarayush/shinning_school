
<table width="100%" border="1" cellspacing="0" cellpadding="0">
	<tr>
	<td colspan="6">
		<center> <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br /></center>
        <center> <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; ?></span><br /></center>
		
		 
		</td>
	</tr>
	
	<tr style="font-weight:bold; color:#000000">
	    <td>Sr</td>
		<td>Admission No</td>
        <td>Student Name</td>
        <td>Class</td>
        <td>Session</td>
		<td>Total Amount</td>
       </tr>
       <?php
      session_start();
	  require_once("../db.php"); 
	$i=1;
	if(isset($_GET['ses']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	  
			      $search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."'");
				  
				  $num=mysqli_num_rows($search);
				} 
				if(isset($_GET['class']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	  
			    $search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and student_class='".$_GET['class']."'");
				  
			   $num=mysqli_num_rows($search);
				}  
			    if($num>0)
				{
				 while($studrow=mysqli_fetch_array($search))
				 {
	                $search1=mysqli_query($con,"select * from fee_detail where session='".$_GET['ses']."' and sch='".$studrow['student_scholar']."' order by id desc limit 1");
					
			       while($numr=mysqli_fetch_array($search1))
				   { 
	          if($numr['due']>0)
			  {
	?>	
    <tr style="color:#000000">
    <td><?php echo $i;  ?></td>
	<td><?php echo ucwords($studrow['student_scholar']);?></td>
    <td><?php echo ucwords($studrow['student_name']);?></td>
	 <td><?php echo ucwords($studrow['student_class']);?></td>
	 <td><?php echo ucwords($studrow['student_session']);?></td>
     <td>
	      <?php
	      
	      echo $numr['due'];
		  ?>
	 </td>
    </tr>
    <?php
    $i++;
	}
	}
	}
	}
	else
	   {
	   ?>
      <td style="color:#990066"><?php echo "No Record"; ?></td>
	   <?php
	   }
	?>
	
	</table>