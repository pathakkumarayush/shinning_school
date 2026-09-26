<?php
 $month=array("July","August","September","October","November","December","January","February","March");
//$_POST['class']="1st";
?>
 
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Total Fee</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a>Total fee Colection</a>
                 <form action="#" method="post" enctype="multipart/form-data">
				 <div class="box-head" style="margin-top:20px; font-size:18px">
					<?php /*?> <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."month_collection1"."&&divid=1"; ?>">Toal Fee Collection By Month</a>&nbsp;||&nbsp;<?php */?><a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."month_collection1"."&&divid=2"; ?>">Toal Fee Collection Monthly By Student</a>
						</div>
				
				 <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
            <td>Month <span style="color:#FF0000">*</span></td>
            <td>
            
             <select name="month1"  class="select">
                   <option value="-1">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                                 </select>             </td>
								 <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>
               
            </tr>
        </table><br>
        </div>
        
        <?php
		 }
		 ?>
		   <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		    <tr>
            <td>Month <span style="color:#FF0000">*</span></td>
            <td>
            
             <select name="month1"  class="select">
                   <option value="-1">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                                 </select>             </td>
								 
               
            </tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			   <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="styled" onchange="showSection(this.value)" class="select">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class'].$rclass['class_section']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
		   <td></td>
           <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 ?>
       
				 <div class="table" style="border:#FFCCCC 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
                   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_SESSION['session']; ?> &nbsp;&nbsp; Month: <?php echo $_POST['month1']; ?> </h2>
				<?php
			  if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
			  ?>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
			<td>Sr.No</td>
			<td>Class</td>
		    <td>Total Amount</td>
			<td>Total Amount received</td>
			<td>Balance Amount</td>
		   </tr>
     
	     <?php
			   $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' ");
			   $i=1;
		?>
				<?php
			   while($row=mysqli_fetch_array($class))
			   {
			   $st='Yes';
		    $selrc=mysqli_query($con,"SELECT * FROM `instdetail`  where class='".$row['class']."' and session='".$_SESSION['session']."' and month='".$_POST['month1']."'");


				
$rowselrec1=mysqli_fetch_array($selrc);
?>
	 <?php
         $selrc=mysqli_query($con,"select * from fee_structure where class='".$row['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	   
	    $val2=0;
	   
	?>	
 
  
	<?php
	           $val1=0;
	           foreach($a as $v)
		   {
		     list($header, $val) = split('[=]', $v);
            $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype='".$_POST['month1']."'");
 

			  if(mysqli_num_rows($check)>0)
			 {
			 
			      
		?>
		
							<?php
							       $val1+=$val;
							    
							  ?>
										   
							  <?php
							      
							  }
							}
							

                  $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    $rowadmission=mysqli_fetch_array($admission);
       $adm=0;
	   $st="Yes";
	     $admission=mysqli_query($con,"SELECT count(id) FROM `fee_detail` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and admissionfee='$st'");
		 $totaladm=mysqli_fetch_array($admission);
	   
	   if($totaladm['count(id)']>0)
	   {
	      $adm=$rowadmission['fee']*$totaladm['count(id)'];
	       $val1+=$adm;  
	   }
   ?>
	
	<tr>
	 <td><?php echo $i;   ?></td>
			       <td><?php echo $row['class'];   ?></td> 
	<td><?php $total= $rowselrec1['amnt']+$val1;  
	           echo $total;
			   $total2+=$total;
	 ?> </td>
	<td>
						  <?php
			                 $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee) from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$row['class']."' and month='".$_POST['month1']."'");
					 
				
					 
				  $studrow=mysqli_fetch_array($search);
                         $amtrc= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];  
						  echo $amtrc;
						 $amtrc2+=$amtrc;
						  ?>						 
						 
						  </td>
	<td><?php $val5= $total-$amtrc;   
						             echo $val5;
						           $val6+=$val5;
						  ?> </td>
	</tr>
	<?php
	  $i++;
	  }
	  ?>
	
	<tr>
			      <td><b>Total</b></td>
			      <td></td>
				  <td><b><?php echo $total2;  ?></b></td>
				  <td><b><?php echo $amtrc2;  ?></b></td>
				  <td><b><?php echo $val6;  ?></b></td>
			   </tr>
	
	</table>
			 <?php
			 }
			 else if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
		   
			 ?>	
			 <table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
			<td>Sr.No</td>
			<td>Name</td>
		    <td>Total Amount</td>
			<td>Total Amount received</td>
			<td>Balance Amount</td>
		   </tr>
     
	     <?php
				
				   $i=1;
				   $st='Yes';
				  $selrc=mysqli_query($con,"SELECT * FROM `instdetail`  where class='".$_POST['class']."' and session='".$_SESSION['session']."' and month='".$_POST['month1']."'");


				
$rowselrec1=mysqli_fetch_array($selrc);
				
				      $numclass=mysqli_query($con,"select count(student_id) from student where student_class='".$_POST['class']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and rti<>'$st'");
			    
				$rownum=mysqli_fetch_array($numclass);
				  $numclass1=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and rti<>'$st'");
			   
				
				   $numclass1=mysqli_query($con,"select count(student_id) from student where student_class='".$row['class']."' and student_session='".$_POST['session']."' and addmisionfee='".Yes."' and rti<>'$st'");
			   
			   $numclass1=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and rti<>'$st'");
			   
				
				
				while($rownum1=mysqli_fetch_array($numclass1))
			   {
			   $t1=0;
			   if($rownum1['transport_status']=="Active")
							{
													 
						$querytr=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and stop_name='".$rownum1['transport_stopage']."'");
			  
			  $rowtr=mysqli_fetch_array($querytr);
								if($studrow['transport_type']=="One Way")
							{
								 $t= ($rowtr['stop_cost']/2);				
							    $t1+=$t;
							}
							else
							    {
								   $t= $rowtr['stop_cost'];
								    $t1+=$t;
								}	
								
								  
								}
								 	?>
									 <?php
         $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	   
	    $val2=0;
	   
	?>	
										<?php
	           $val1=0;
	           foreach($a as $v)
		   {
		     list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype='".$_POST['month1']."'");
 

			  if(mysqli_num_rows($check)>0)
			 {
			 
			      
		?>
		
							<?php
							       $val1+=$val;
							    
							  ?>
										   
							  <?php
							      
							  }
							}
							

                  $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    $rowadmission=mysqli_fetch_array($admission);
       $adm=0;
	   $st="Yes";
	     $admission=mysqli_query($con,"SELECT count(id) FROM `fee_detail` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and admissionfee='$st'");
		 $totaladm=mysqli_fetch_array($admission);
	   
	   if($totaladm['count(id)']>0)
	   {
	      $adm=$rowadmission['fee']*$totaladm['count(id)'];
	       $val1+=$adm;  
	   }
   ?>
		       <tr>
			       <td><?php echo $i;  ?></td>
			       <td><?php echo $rownum1['student_name'];   ?></td> 
				   
				  <td><?php $total= $rowselrec1['amnt']+$val1;  
	           echo $total;
			   $total2+=$total;
	 ?> </td>
			              <td>
						  <?php
			                 $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$_POST['class']."' and student='".$rownum1['student_id']."' and month='".$_POST['month1']."' order by id desc limit 1");
							
							 
				  $studrow=mysqli_fetch_array($search);
                         $depo= $studrow['fee_deposit']-$studrow['latefee'];
					 echo $depo;
					  $val9+=$depo;
						  ?>						 
						 
						  </td>
						  <td><?php 
						  $bal= $total-$depo;   
						    echo $bal;
							$val10+=$bal;
						    
						  ?> </td>
			   </tr>
	<?php
	     $i++;
	  }
	  ?>
	
	<tr>
			      <td><b>Total</b></td>
			      <td></td>
				  <td><b><?php echo $total2;  ?></b></td>
				  <td><b><?php echo $val9;  ?></b></td>
				  <td><b><?php echo $val10;  ?></b></td>
			   </tr>
	
	</table>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>