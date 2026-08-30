<?php
 $month=array("July","August","September","October","November","December","January","February","March","April");
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
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."month_collection"."&&divid=1"; ?>">Total Fee Collection By Session</a>&nbsp;&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."month_collection"."&&divid=2"; ?>">  </a>
						</div>
				
				 <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
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
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
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
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 ?>
				 <div class="table" style="border:#FFCCCC 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
                   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_POST['session']; ?></h2>
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
			<td>Fine</td>
			<td>Concession</td>
			<td>Balance Amount</td>
		   </tr>
		    <?php
		         $studfine=0; 
				   $studconcess=0; 
			   $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' ");
			   $i=1;
		?>
				<?php
			   while($row=mysqli_fetch_array($class))
			   {
			   ?>
        <tr>
		 <td><?php echo $i;   ?></td>
		  <td><?php echo $row['class'];   ?></td>
		  <td>
		  
		      <?php
         $selrc=mysqli_query($con,"select * from fee_structure where class='".$row['class']."' and session='".$_POST['session']."' and school='".$_SESSION['uid']."'");
		 
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	  
	    $val2=0;
	   
	?>	
 
  
	<?php
	    $combinemonth2=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_POST['session']."' and month='$m' and class='".$row['class']."'");
                $rowconmonth2=mysqli_fetch_array($combinemonth2);
	
	
	$count1=0;
	if(!empty($rowconmonth2['combinemonth']))
	{
	  
	  $count1=count($rowconmonth2['combinemonth']);
	 $count1=$count1+1;
	 }
	             $val1=0;
	           foreach($a as $v)
		   {
		     
			  list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_POST['session']."' and school='".$_SESSION['uid']."'");


			$rowchk=mysqli_fetch_array($check);     
		     if($rowchk['feetype']=="Yearly")
			 {  
			   if($m=="July")
			 {    
		?>
		
							<?php
							       $val1+=$val;
							     
							  }
							  }
							  else
							    {
								 
								?>
										   
							  
							   
							   <?php 
							    if($count1>0)
								  {
							  
							   $val1+=$val*$count1;
							   }
							   else
							      {
								  
								   $val1+=$val;
								  }
							   ?>
						<?php
							      
							  }
							}
							?>

	
	
	
	     								
							
							<?php
							  $exam=mysqli_query($con,"select * from exam_fee where month='$m' and session='".$_POST['session']."' and school='".$_SESSION['uid']."' and class='".$row['class']."'");
							
			$examrow=mysqli_fetch_array($exam);
							 if(mysqli_num_rows($exam)>0)
							 {
							
							  $val1+=$examrow['fee'];
								}   
								?>
			
	   <?php 
		    
		    $val2+=$val1;
		    
		 ?>
     
   
		  
		  
		  
		  
		  
		     <?php
			    $selrc=mysqli_query($con,"select * from definefee  where class='".$row['class']."' and session='".$_POST['session']."'");	
$rowselrec=mysqli_fetch_array($selrc);
  $numclass=mysqli_query($con,"select count(student_id) from student where student_class='".$row['class']."' and student_session='".$_POST['session']."' and rti<>'$st'");
			    $rownum=mysqli_fetch_array($numclass);
			$amnt = $rowselrec['amnt']*$rownum['count(student_id)']; 
			 ?>
		   <?php 
	   $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_POST['session']."'");
	    $rowadmission=mysqli_fetch_array($admission);
       $adm=0;
	   $st="Yes";
	     $admission=mysqli_query($con,"SELECT count(id) FROM `fee_detail` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_POST['session']."' and admissionfee='$st'");
		 $totaladm=mysqli_fetch_array($admission);
	   
	   if($totaladm['count(id)']>0)
	   {
	      $adm=$rowadmission['fee']*$totaladm['count(id)'];
	      
	   }
	   
	    if(!empty($t1))
	  {
	  $t1=$t1*count($month2);
	  }
	  
	 if($adm>0)
	 {  
	      $total= ($val2*$rownum['count(student_id)'])+$adm+$t1;  
	      echo $total;
	}
	else
	  {
	     $total= ($val2*$rownum['count(student_id)']); 
	     $total = $total+$t1;
		 echo $total+$amnt;
	  }
	  $total1=0; 
	  $total1+=$total+$amnt;
	 
	?>
		  </td>
		  <td>
						  <?php
			                 $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession) from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' and class='".$row['class']."'");
                         
						
						 
						 $studrow=mysqli_fetch_array($search);
                         $amtrc= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];  
						  echo $amtrc;
						 $amtrc2+=$amtrc;
						  ?>						 
						 
						  </td>
						    <td><?php echo $studrow['sum(latefee)'];  
					            $studfine+=$studrow['sum(latefee)'];
					  
					  ?></td>
				   <td><?php 
				        echo $studrow['sum(concession)'];  
				        $studconcess+=$studrow['sum(concession)'];
				   
				   ?></td>					  
						  
	<td>      <?php 
	                               
	                                 $val5= ($total1-$studrow['sum(concession)'])-$amtrc;   
						             echo $val5;
						           $val6+=$total1;
								   $valt=$val6-$amtrc;
								   
						  ?> 
						  
						  </td>
		</tr> 
	    <?php
		 $i++;
		}
		?>
		<?php /*?><tr>
			      <td><b>Total</b></td>
			      <td></td>
				  <td><b><?php echo $val6;  ?></b></td>
				   
				  <td><b><?php echo $amtrc2;  ?></b></td>
				   <td><b><?php echo $studfine;   ?></b></td>
				  <td><b><?php echo $studconcess;   ?></b></td>
				  <td><?php echo $val5;  ?></td>
			   </tr><?php */?>
	
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
				   
				      $numclass=mysqli_query($con,"select count(student_id) from student where student_class='".$_POST['class']."' and student_session='".$_POST['session']."' and student_school='".$_SESSION['uid']."'");
			    
				$rownum=mysqli_fetch_array($numclass);
				  $numclass1=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_POST['session']."' and student_school='".$_SESSION['uid']."'");
			   
				
				$i=1;
				while($rownum1=mysqli_fetch_array($numclass1))
				{
			?>
		       <tr>
			       <td><?php echo $i;  ?></td>
			       <td><?php echo $rownum1['student_name'];   ?></td> 
				   
				  <td>
		  
		      <?php
         $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_POST['session']."' and school='".$_SESSION['uid']."'");
		 
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	  
	    $val2=0;
	   
	?>	
 
  
	<?php
	    $combinemonth2=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_POST['session']."' and month='$m' and class='".$_POST['class']."'");
                $rowconmonth2=mysqli_fetch_array($combinemonth2);
	
	
	$count1=0;
	if(!empty($rowconmonth2['combinemonth']))
	{
	  
	  $count1=count($rowconmonth2['combinemonth']);
	 $count1=$count1+1;
	 }
	             $val1=0;
				
	           foreach($a as $v)
		   {
		     
			  list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_POST['session']."' and school='".$_SESSION['uid']."'");


			$rowchk=mysqli_fetch_array($check);     
		     if($rowchk['feetype']=="Yearly")
			 {  
			   if($m=="July")
			 {    
		?>
		
							<?php
							       $val1+=$val;
							     
							  }
							  }
							  else
							    {
								 
								?>
										   
							  
							   
							   <?php 
							    if($count1>0)
								  {
							  
							   $val1+=$val*$count1;
							   }
							   else
							      {
								  
								   $val1+=$val;
								  }
							   ?>
						<?php
							      
							  }
							}
							?>

	
	
	
	     								
							
							<?php
							  $exam=mysqli_query($con,"select * from exam_fee where month='$m' and session='".$_POST['session']."' and school='".$_SESSION['uid']."' and class='".$_POST['class']."'");
							
			$examrow=mysqli_fetch_array($exam);
							 if(mysqli_num_rows($exam)>0)
							 {
							
							  $val1+=$examrow['fee'];
								}   
								?>
			
	   <?php 
		    
		    $val2+=$val1;
		    
		 ?>
     
   
		  
		  
		  
		  
		  
		     <?php
			    $selrc=mysqli_query($con,"select * from definefee  where class='".$_POST['class']."' and session='".$_POST['session']."'");	
$rowselrec=mysqli_fetch_array($selrc);
 			$amnt = $rowselrec['amnt']; 
			 ?>
		   <?php 
	   $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$_POST['class']."' and school='".$_SESSION['uid']."' and session='".$_POST['session']."'");
	    $rowadmission=mysqli_fetch_array($admission);
       $adm=0;
	   $st="Yes";
	     $admission=mysqli_query($con,"SELECT count(id) FROM `fee_detail` where class='".$_POST['class']."' and school='".$_SESSION['uid']."' and session='".$_POST['session']."' and admissionfee='$st' and student='".$rownum1['student_id']."'");
		 $totaladm=mysqli_fetch_array($admission);
	   
	
	  $total1=0; 
	  $total1=$val2+$amnt;
	   echo $total1;
	   $total2+=$total1;
	?>
		  </td>
			              <td>
						  <?php
			                 $search=mysqli_query($con,"select * from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' and class='".$_POST['class']."' and student='".$rownum1['student_id']."' order by id desc limit 1");
							
							 
				  $studrow=mysqli_fetch_array($search);
                         $depo= $studrow['fee_deposit']-$studrow['latefee'];
					 echo $depo;
					  $val9+=$depo;
						  ?>						 
						 
						  </td>
						  <td><?php 
						  $bal= $total1-$depo;   
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>