<table width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 10px; font-size:14px">
		    <tr align="center">
		
		 <td colspan="7">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">DELHI PUBLIC SCHOOL,Gajraula</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; ?></span><br />
		
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">Report From Date: <?php echo date("d-m-Y",strtotime(date("Y-m-d"))); ?> </span>
		</td>
		 
		 
	
		</tr>	
			  
			  
			   <tr style="font-weight:bold;">
			       <td>Sr</td>
				   <td>Admission No</td>
				   <td>Student Name</td>
				   <td>Class</td>
				   <td>Receipt No</td>
				   <td>Month</td>
				   <td>Received Amount</td>
			   </tr>
		         <?php
			 session_start();
	        require_once("../db.php"); 
			$today=date("Y-m-d");
			  $search=mysqli_query($con,"select * from fee_detail where date='".$today."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				  <td><?php  echo $studrow['sch']; ?></td>
				  <td><?php  echo $studrow['name']; ?></td>
				  <td><?php echo $studrow['class']; ?></td>
				  <td><?php echo $studrow['receiptno']; ?></td>
				 
				  <td><?php echo $studrow['month']; ?></td>
				  <td><?php 
				     $val= $studrow['fee_deposit']; 
					 echo $val;
					 $val2+=$val;
					 ?></td>
			 </tr>
			 <?php
              $i++;
			  }
			 ?>	
			 <tr>
			    <td></td>
				<td><b>Total</b></td>
				
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b><?php echo $val2;  ?></b></td>
			 </tr>		 
			 </table>

