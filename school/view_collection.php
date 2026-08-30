<?php
session_start();
require_once("../db.php"); 
?><table  border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:100%;">
		     <tr align="center">
		
		 <td colspan="18">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br />
  
		 
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">Report From Date: <?php echo $_GET['date']; ?> </span>
		</td>
		 
		 
	
		</tr>	
		      <tr style="font-weight:bold;">
			      <td>Sr</td>
				  <td>Student Name</td>
			      <td>Class</td>
				  <td>Receipt No</td> 
				  <td>Tution</td>
				  <td>Conc.</td>
				  <td>Paid</td>
			
				 
			  </tr>
		      <?php
			  $search=mysqli_query($con,"select * from fee_detail where date='".$_GET['date']."'");
			  
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			  $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' ");
			  $rowsearch=mysqli_fetch_array($numclass1);
			  ?>
			  <tr>
			  <td><?php echo $i;  ?></td>
			 
			  <td><?php echo $studrow['name'];  ?></td>
			  <td><?php echo $studrow['class']; ?></td>
			  <td><?php echo $studrow['receiptno']; ?></td>
		      <td><?php  $act =  $studrow['inst_fee'];  echo $act; $tact+=$act;  ?> </td>
			  <td><?php echo $dairy = $studrow['conc']; $td+=$dairy;?></td>
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
				
				<td></td>
			
				<td><b><?php echo  $tft; ?></b></td>
				
				
				
			 </tr>		 
			 </table>
       
	  