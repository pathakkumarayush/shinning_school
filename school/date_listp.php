<?php
session_start();
require_once("../db.php"); 
?>
<table width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 10px; font-size:18px">
		    <tr align="center">
		
		 <td colspan="7">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">SHINING PUBLIC HR. SEC. SCHOOL RAISEN (M.P.)</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; 	date_default_timezone_set('Asia/Kolkata');?></span><br />
		
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">Preivious Fee Report From Date: <?php echo date("d-m-Y",strtotime(date("Y-m-d"))); ?> </span>
		</td>
		 
		 
	
		</tr>	
			  
			  
			   <tr style="font-weight:bold;">
			       <td>Sr</td>
				   <td>Admission No</td>
				   <td>Student Name</td>
				   <td>Class</td>
				   <td>Receipt No</td>
				  
				   <td>Received Amount</td>
				   <td>Pay Type</td>
			   </tr>
		    <?php
			$today=date("Y-m-d");
			  $search=mysqli_query($con,"select * from fee_detail_preivios where date='".$today."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_GET['ses']."' ");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				 <td><?php  echo $rowsearch['student_scholar']; ?></td>
				  <td><?php  echo $rowsearch['student_name']; ?></td>
				  <td><?php echo $studrow['class']; ?></td>
				  <td><?php echo $studrow['receiptno']; ?></td>
				 
				  <td><?php 
				     $val= $studrow['fee_deposit']; 
					 echo $val;
					 $val2+=$val;
					 ?></td> <td><?php echo $studrow['ftype']; ?></td>
			 </tr>
			 <?php
              $i++;
			  }
			 ?>	
<tr style="font-weight:bold">
			    <td></td>
				<td><b>Total</b></td>
				<td></td>
				<td>Cash Amt -
			<?php
			 $searchca=mysqli_query($con,"select * from fee_detail_preivios where session='".$_SESSION['session']."' and ftype='Cash' and date='".$today."'");
			 while($studrowca=mysqli_fetch_array($searchca))
			  {
			  $valca+=$studrowca['fee_deposit']; 
			  }
				echo $valca;
				?>
				
				</td>
				<td>
				Paytm Amt - 
				<?php
		     $searchon=mysqli_query($con,"select * from fee_detail_preivios where session='".$_SESSION['session']."' and ftype='Paytm' and date='".$today."'");
			 while($studrowon=mysqli_fetch_array($searchon))
			  {
			  $valon+=$studrowon['fee_deposit']; 
			  }
				echo $valon;
				?>
				
				</td>
				
				<td><b><?php echo $val2;  ?></b></td><td></td>
			 </tr>		 
			 </table>

