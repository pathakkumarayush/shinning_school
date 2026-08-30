

<table border="1" cellspacing="0" cellpadding="0" style="width:900px;">
						<tr align="center">
		
		 <td colspan="11">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">DELHI PUBLIC SCHOOL,Gajraula</span><br />
   
		
		
		</td>
		 
		 
	
		</tr>	
						
							<tr style="font-weight:bold; color:#000000">
							
							
	    <td>Sr</td>
		<td>Adm. No</td>
		<td>Adhar No</td>
        <td>Student Name</td>
        <td>Father Name</td>
        <td>Mother Name</td>
		<td>Class</td>
        <td>D.O.B</td>
		<td>Gender</td>
		<td>Address</td>
        <td>Contact No</td>
		
		
       </tr>
       <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
        $search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and  student_session='".$_SESSION['session']."' and status='0'");
		
		while($studrow=mysqli_fetch_array($search))
		{
	     ?>	
    <tr style="color:#000000">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($studrow['student_scholar']);?></td>
	 <td><?php echo ucwords($studrow['student_rollno']);?></td>
	 <td><?php echo ucwords($studrow['student_name']);?></td>
	 <td><?php echo ucwords($studrow['student_fname']);?></td>
	  <td><?php echo ucwords($studrow['m_name']);?></td>
	 <td><?php echo ucwords($studrow['student_class']);?></td>
	 <td><?php echo ucwords($studrow['student_dob']);?></td>
	  <td><?php echo ucwords($studrow['student_gender']);?></td>
	 <td><?php echo ucwords($studrow['student_address']);?></td>
	 <td><?php echo ucwords($studrow['student_contactno']);?></td>
    
    </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	 
	</table>