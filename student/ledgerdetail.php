<?php
   if($_POST['update'])
   {
       $_POST['due']=0;
	   $_POST['extra_amnt']=0;
       if($_POST['amnt_paid']<$_POST['amt'])
	   {
	     $_POST['due']=$_POST['amt']-$_POST['amnt_paid'];
	   }
	   if($_POST['amnt_paid']>$_POST['amt'])
	   {
	     $_POST['extra_amnt']=$_POST['amnt_paid']-$_POST['amt'];
	     $_POST['due']=0;
	   }
     $date=date("Y-m-d",strtotime($_POST['date'])); 
   $query=mysqli_query($con,"update fee_detail set fee_deposit='".$_POST['amnt_paid']."',remark='".$_POST['remarks']."',due='".$_POST['due']."',extra_amnt='".$_POST['extra_amnt']."',date='$date' where id='".$_GET['id']."'");
   $msg="Updated Successfully";
   }
?>
<?php
if(!empty($_GET['id']))
{
$getdetail=mysqli_query($con,"select * from fee_detail where id='".$_GET['id']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$rowfeedetail['student']."' and  student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);


 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
}
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
				   <img src="css/images/1365164854_elementary_school.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                  <a href="./?pageid=view_fee"></a> >>Student Ledger Detail</a>
       <form method="post" enctype="multipart/form-data" action="#">
	   <?php
	   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	   ?>
	   
	     <div class="table" style="border:#FF0000 0px solid; height:220px; margin:30px 0px 0px 100px">
            <table style="font-size:14px; font-weight:bold">
			 <tr>
			   <td>Name</td>
			   <td><?php echo $rowstud['student_name']; ?></td>
			 </tr>
			 <tr>
			   <td>Class</td>
			   <td><?php echo $rowstud['student_class']; ?></td>
			 </tr>
			 <tr>
			   <td>Month</td>
			   <td><?php 
			   echo ucwords($rowfeedetail['month']); 
			   $expl = explode(",",$rowfeedetail['month']);
	           $count1=count($expl);

			   ?></td>
			 </tr>
			 <tr>
			   <td>Session</td>
			   <td><?php echo $rowstud['student_session']; ?></td>
			 </tr>
			 <tr>
			   <td>Date</td>
               <?php
			    
		   if(empty($_GET['edit_id']))
		   {
		 
			   ?>
		       <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date'])); ?></td>
			 <?php
			 }
			 else
			    {
			    ?>
			<td>	<input type="text" name="date" value="<?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?>" class="tb5" style="width:100px"  /></td>
				<?php
				}
			 ?>
			 
			 </tr>
			 
			  <tr>
			   <td>Receipt no</td>
			   <td><?php echo $rowfeedetail['receiptno']; ?></td>
			 </tr>
			 
			</table> 
         <?php
		   if(empty($_GET['edit_id']))
		   {
		 ?>
		 
		   <table width="80%" border="1" cellspacing="0" cellpadding="0" style="font-size:14px; ">
							<tr style="font-weight:bold">
							<td>Sr.no</td>
							<td>Particulars</td>
							<td>Amount(Rs)</td>
							</tr>
        
		
		   <?php
		     $i=1;
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
		    foreach($a as $v)
		   {
		     
			 if($rowfeedetail['month']=="June")
				 {
				  $typ='Monthly';    
				 list($header, $val) = split('[=]', $v);
				 $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype!='$typ' ");
		    
			   
			    $rowchk=mysqli_fetch_array($check);    
				 }
				 else
				   {
				     $typ='Yearly';
				    list($header, $val) = split('[=]', $v);
					$check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype!='$typ'");
					
					$rowchk=mysqli_fetch_array($check);    
				   }
			            if($rowchk['feetype']=="Yearly")
						{
				           ?>
							  <tr>
								   <td><?php echo $i; ?></td>
								   <td><?php echo ucwords($header); ?></td>
								   <td><?php echo $val;  ?></td>
							 </tr>
								<?php
									   $val1+=$val;
									   $j=$i;
									   $i++;
							}
							else if($rowchk['feetype']=="Monthly")
							      {
							?>	  
							 <tr>
								   <td><?php echo $i; ?></td>
								   <td><?php echo ucwords($header); ?></td>
								   <td><?php echo $val;  ?></td>
							 </tr>
								
								<?php  
								$val1+=$val;
									   $j=$i;
									   $i++;
								  }
								  
								  }
						
							
						
							
							    if($rowfeedetail['admissionfee']=="Yes")
								   {
								     $admissionfee=mysqli_query($con,"select * from admission where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
									
								  $rowadmission=mysqli_fetch_array($admissionfee);   
								
							 ?>
							 	<tr>
							  <td><?php echo $j+1;; ?></td>	
							 <td>Admission Fees</td>
							  <td><?php echo $rowadmission['fee']; ?></td></tr>
							    <?php
								   
								   $val1+=$rowadmission['fee'];
								   $j=$j+1;
								   }
								
								
								?>
							
							<tr>
							  <td><?php echo $j+1;; ?></td>
							
							 <td>Examination Fees</td>
							  
							  <td>
							    <?php
								    foreach($expl as $ex2)
							  {
							  $exam1=mysqli_query($con,"select * from exam_fee where month='$ex2' and session='".$_SESSION['session']."' and class='".$rowstud['student_class']."'");
							  
	$examrow1=mysqli_fetch_array($exam1);
							  echo $examrow1['fee']; 
							  $val1+=$examrow['fee'];
								 }  
								?>
							</td>
							</tr>
							
							<tr>
							  <td><?php echo $j+2;; ?></td>
							
							 <td>Activity Fees</td>
							  
							  <td>
							    <?php
								echo  $rowfeedetail['activity'] ;
								  
								?>
							</td>
							</tr>
							
							<tr>
							  <td><?php echo $j+3;; ?></td>
							
							 <td>Computer Fee</td>
							  
							  <td>
							    <?php
								echo  $rowfeedetail['computerfee'] ;
								  
								?>
							</td>
							</tr>
							
							<tr>
							  <td><?php echo $j+4;; ?></td>
							
							 <td>Monthly Fee</td>
							  
							  <td>
							    <?php
								echo  $rowfeedetail['montly_fee'] ;
								  
								?>
							</td>
							</tr>
							
							<tr>
							  <td><?php echo $j+5;; ?></td>
							
							 <td>Lab Fees</td>
							  
							  <td>
							    <?php
								echo  $rowfeedetail['labfee'] ;
								  
								?>
							</td>
							</tr>
							
							<?php
							    if($rowstud['transport_status']=="Active")
								  {
							?>
							
							<tr>
								  <td><?php echo $j+2;; ?></td>
								
								 <td>Transport Fee</td>
								  <td><?php 
									
								 $querytr=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and stop_name='".$rowstud['transport_stopage']."'");
			  
			  $rowtr=mysqli_fetch_array($querytr);
								 				
								  ?>
									<?php
									
										if($rowstud['transport_type']=="One Way")
							{
								 $t= ($rowtr['stop_cost']/2);				
							     echo $t;
							}
							else
							    {
								   $t= $rowtr['stop_cost'];
								   echo $t;
								}	
									   
									?>
								</td>
								</tr>
							<?php
							}
							?>	
							
							<tr>
							    <td></td>
								<td><b>Arrers/Fine(Rs)</b></td>
								<td><b><?php echo $rowfeedetail['latefee']; ?></b></td>
								
							</tr>
														

							
							    <td></td>
								<td><b>Concession Amount(Rs)</b></td>
								
							    <td><?php echo $rowfeedetail['concession']; ?></td> 
							</tr>
							<tr>
							    <td>&nbsp;</td>
								<td><b>Previous Due(Rs)</b></td>
								<td><b><?php  $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and student='".$rowstud['student_id']."' and id<'".$_GET['id']."' order by id desc limit 1");
																							 $duerow=mysqli_fetch_array($search1);
								 echo $duerow['due']; 
								?></b></td>
								
							</tr>
							<tr>
							    <td>&nbsp;</td>
								<td><b>Total Amount(Rs)</b></td>
								<td><div id="tamt"><?php 
								 echo $rowfeedetail['tamnt']; 
																?></div></td>
							 
							 <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>">
							 <input type="hidden" name="class" value="<?php echo $studrow['student_class']; ?>">
							 <input type="hidden" name="month" value="<?php echo $_SESSION['month1']; ?>">
							 <input type="hidden" name="amt" value="<?php echo $val1; ?>">
							</tr>
							<tr>
                           <tr>
							    <td></td>
								<td><b>Amount Paid</b></td>
								
							    <td><?php echo $rowfeedetail['fee_deposit']; ?></td> 
							</tr>
                           <tr>
							    <td></td>
								<td><b>Remarks</b></td>
								<td><?php echo $rowfeedetail['remark']; ?></td> 
							</tr>
 							
													
							
							</table>
			<?php
		    }
			else
			  {
			?>	
				 <table width="80%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px; ">
							<tr style="font-weight:bold">
							<td>Sr.no</td>
							<td>Particulars</td>
							<td>Amount(Rs)ss</td>
							</tr>
        
		
		   <?php
		     $i=1;
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
		    foreach($a as $v)
		   {
		     
			 if($rowfeedetail['month']=="June")
				 {
				  $typ='Monthly';    
				 list($header, $val) = split('[=]', $v);
				 $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype!='$typ' ");
				
				 
		        $rowchk=mysqli_fetch_array($check);    
				 }
				 else
				   {
				     $typ='Yearly';
				    list($header, $val) = split('[=]', $v);
					$check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype!='$typ'");
					$rowchk=mysqli_fetch_array($check);    
				   }
			            if($rowchk['feetype']=="Yearly")
						{
				           ?>
							  <tr>
								   <td><?php echo $i; ?></td>
								   <td><?php echo ucwords($header); ?></td>
								   <td><?php echo $val;  ?></td>
							 </tr>
								<?php
									   $val1+=$val;
									   $j=$i;
									   $i++;
							}
							else if($rowchk['feetype']=="Monthly")
							      {
							?>	  
							 <tr>
								   <td><?php echo $i; ?></td>
								   <td><?php echo ucwords($header); ?></td>
								   <td><?php echo $val;  ?></td>
							 </tr>
								
								<?php  
								$val1+=$val;
									   $j=$i;
									   $i++;
								  }
								  
								  }
							
						
							
							    if($rowfeedetail['admissionfee']=="Yes")
								   {
								     $admissionfee=mysqli_query($con,"select * from admission where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
									
								  $rowadmission=mysqli_fetch_array($admissionfee);   
								
							 ?>
							 	<tr>
							  <td><?php echo $j+1;; ?></td>	
							 <td>Admission Fee</td>
							  <td><?php echo $rowadmission['fee']; ?></td></tr>
							    <?php
								   
								   $val1+=$rowadmission['fee'];
								   $j=$j+1;
								   }
								
								
								?>
							
							<tr>
							  <td><?php echo $j+1;; ?></td>
							
							 <td>Examination Feea</td>
							  
							  <td>
							    <?php
								    foreach($expl as $ex2)
							  {
							  $exam1=mysqli_query($con,"select * from exam_fee where month='$ex2' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
							  
	$examrow1=mysqli_fetch_array($exam1);
							  echo $examrow1['fee']; 
							  $val1+=$examrow['fee'];
								 }  
								?>
							</td>
							</tr>
							<?php
							    if($rowstud['transport_status']=="Active")
								  {
							?>
							
							<tr>
								  <td ><?php echo $j+2;; ?></td>
								
								 <td>Transport Fee</td>
								  <td><?php 
									
								 $querytr=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and stop_name='".$rowstud['transport_stopage']."'");
			  
			  $rowtr=mysqli_fetch_array($querytr);
								 				
								  ?>
									<?php
									
										if($rowstud['transport_type']=="One Way")
							{
								 $t= ($rowtr['stop_cost']/2);				
							     echo $t;
							}
							else
							    {
								   $t= $rowtr['stop_cost'];
								   echo $t;
								}	
									   
									?>
								</td>
								</tr>
							<?php
							}
							?>	
							
							<tr>
							    <td></td>
								<td><b>Arrers/Fine(Rs)</b></td>
								<td><b><?php echo $rowfeedetail['latefee']; ?></b></td>
								
							</tr>
														

							
							    <td></td>
								<td><b>Concession Amount(Rs)</b></td>
								
							    <td><?php echo $rowfeedetail['concession']; ?></td> 
							</tr>
							<tr>
							    <td>&nbsp;</td>
								<td><b>Previous Due(Rs)</b></td>
								<td><b><?php  $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$rowstud['student_id']."' and id<'".$_GET['id']."' order by id desc limit 1");
																							 $duerow=mysqli_fetch_array($search1);
								 echo $duerow['due']; 
								?></b></td>
								
							</tr>
							<tr>
							    <td>&nbsp;</td>
								<td><b>Total Amount(Rs)</b></td>
								<td><?php  echo $rowfeedetail['tamnt']; ?></td>
							  <input type="hidden" name="amt" value="<?php  echo $rowfeedetail['tamnt']; ?>">
							   <input type="hidden" name="due" value="<?php  echo $rowfeedetail['due']; ?>">
                                 <input type="hidden" name="extra_amnt" value="<?php  echo $rowfeedetail['concession']; ?>">  
							</tr>
							<tr>
                           <tr>
							    <td></td>
								<td><b>Amount Paid</b></td>
								
							    <td><input type="text" name="amnt_paid" value="<?php echo $rowfeedetail['fee_deposit']; ?>" class="tb5" /></td> 
							</tr>
                           <tr>
							    <td></td>
								<td><b>Remarks</b></td>
								<td><textarea name="remarks" cols="30" rows="3"><?php echo $rowfeedetail['remark']; ?></textarea></td> 
							</tr>
 					   		
						</table>		
		             <input type="submit" value="Update" name="update" style="width:120px; float:right; margin-right:290px" />
			<?php
			}
			?>		
				
							</div>
							</form>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>