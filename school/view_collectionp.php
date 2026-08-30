
		   <table  border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:100%;">
		     <tr align="center">
		
		 <td colspan="16">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">KHARYA ENGLISH SCHOOL</span><br />
  
		 
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">PREVIOUS YEAR FEE INCOME REPORT: <?php echo $_GET['date']; ?> </span>
		</td>
		 
		 
	
		</tr>	
		      <tr style="font-weight:bold;">
			      <td>Sr</td>
				  <td>Admission No</td>
				  <td>Student Name</td>
			      <td>Class</td>
				  <td>Receipt No</td>
				 
				 
				 
				  <td>Paid</td>
				 
			  </tr>
		      <?php
			   session_start();
	        require_once("../db.php"); 
			  $search=mysqli_query($con,"select * from fee_detail_preivios where date='".$_GET['date']."'");
			  
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			  $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' ");
			  $rowsearch=mysqli_fetch_array($numclass1);
			  ?>
			  <tr>
			  <td><?php echo $i;  ?></td>
			 <td><?php  echo $rowsearch['student_scholar']; ?></td>
				  <td><?php  echo $rowsearch['student_name']; ?></td>
			  <td><?php echo $studrow['class']; ?></td>
			   <td><?php echo $studrow['receiptno']; ?></td>
			  
			  
		
			 
			
			   
			   <td><?php echo $feet= $studrow['fee_deposit'];  $tft+=$feet; ?></td>
			   
			 </tr>
			 <?php
              $i++;
			  }
			 ?>	
			 <tr>
			  	<td><b>Total</b></td>
				<td></td>
				

					<td></td>
				<td></td>
			
				<td></td>
				
				<td><?php echo  $tft; ?></td>
			
				
			 </tr>		 
			 </table>
       
	  