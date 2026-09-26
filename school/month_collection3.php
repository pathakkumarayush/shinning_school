<?php
 $month=array("June","July","August","September","October","November","December","January","February","March");
//$_POST['class']="1st";
?>
 
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				    <img src="images/FEE Management/Total Fee.png" style="width:200px; height:80px;" />

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a>Total fee Colection</a>
				<span style="float:right"><a href="./?pageid=fee_managementhome" style="color:#FFFFFF; font-size:18px">Back</a></span>
                 <form action="#" method="post" enctype="multipart/form-data">
				 <div class="box-head" style="margin-top:20px; font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."month_collection"."&&divid=1"; ?>">Total Fee Collection By Session</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."month_collection"."&&divid=2"; ?>">Total Fee Collection By Class</a>
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
				 <div class="table" style="border:#33CC66 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
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
			    $numclass=mysqli_query($con,"select count(student_id) from student where student_class='".$row['class']."' and student_session='".$_POST['session']."'");
			    
				$rownum=mysqli_fetch_array($numclass);
			  
			   
			   $numclass1=mysqli_query($con,"select count(student_id) from student where student_class='".$row['class']."' and student_session='".$_POST['session']."' and addmisionfee='".Yes."'");
			   
			   
			     $numclass1=mysqli_query($con,"select * from student where student_class='".$row['class']."' and student_session='".$_POST['session']."' and student_school='".$_SESSION['uid']."'");
			   
			   
				
				$t1=0;
				while($rownum1=mysqli_fetch_array($numclass1))
			   {
			   
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
								 
								}
								
								
			    
				$rownum1=mysqli_fetch_array($numclass1);
			?>
	 
	   <?php
         $selrc=mysqli_query($con,"select * from fee_structure where class='".$row['class']."' and session='".$_POST['session']."' and school='".$_SESSION['uid']."'");
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	  
	    $val2=0;
	    foreach($month as $m)
		{
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
		    if($m=="June")
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
echo "";
					$rowchk=mysqli_fetch_array($check);    
				   }
				     if($rowchk['feetype']=="Yearly")
						{
		?>
		
							
							
							
						
							<?php
							       $val1+=$val;
							     
							  }
							  
								else if($rowchk['feetype']=="Monthly")
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
  
	}
	?>
	
	<tr>
	 <td><?php echo $i;   ?></td>
			       <td><?php echo $row['class'];   ?></td> 
	<td> <?php 
	   $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$row['class']."' and school='".$_SESSION['uid']."' and session='".$_POST['session']."'");
	    $rowadmission=mysqli_fetch_array($admission);
       $adm=0;
	   if($rownum1['count(student_id)']>0)
	   {
	      $adm=$rowadmission['fee']*$rownum1['count(student_id)'];
	      
	   }
	    if(!empty($t1))
	  {
	  $t1=$t1*count($month);
	  }
	 if($adm>0)
	 {  
	      $total= ($val2*$rownum['count(student_id)'])+$adm;  
	      echo $total;
	}
	else
	  {
	     $total= ($val2*$rownum['count(student_id)']); 
	     $total = $total+$t1;
		 echo $total;
	  }
	 
	  $total1+=$total;
	?></td>
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
				  <td><b><?php echo $total1;  ?></b></td>
				   
				  <td><b><?php echo $amtrc2;  ?></b></td>
				   <td><b><?php echo $studfine;   ?></b></td>
				  <td><b><?php echo $studconcess;   ?></b></td>
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
			<td>Class</td>
		    <td>Total Amount</td>
			<td>Total Amount received</td>
			<td>Fine</td>
			<td>Concession</td>
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
				   <td><?php echo $_POST['class'];  ?></td>
				     <td>
					   <?php
         $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_POST['session']."' and school='".$_SESSION['uid']."'");
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	 
	    $val2=0;
	    foreach($month as $m)
		{
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
		   
			 if($m=="June")
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
echo "";
					$rowchk=mysqli_fetch_array($check);    
				   }
				     if($rowchk['feetype']=="Yearly")
						{
		?>
		
							
							
							
						
							<?php
							       $val1+=$val;
							     
							  }
							  
								else if($rowchk['feetype']=="Monthly")
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
  
	}
	?>

					 
					 
					  <?php 
	   $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$_POST['class']."' and school='".$_SESSION['uid']."' and session='".$_POST['session']."'");
	    $rowadmission=mysqli_fetch_array($admission);
       $adm=0;
	  
	  if($rownum1['transport_status']=="Active")
							{
													 
						$querytr=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and stop_name='".$rownum1['transport_stopage']."'");
			  
			  $rowtr=mysqli_fetch_array($querytr);
								if($studrow['transport_type']=="One Way")
							{
								 $t= ($rowtr['stop_cost']/2);				
							     echo $t;
							}
							else
							    {
								   $t= $rowtr['stop_cost'];
								   
								}	 
								 
								  ?>
									<?php
									   	$counttra= count($month);
										 $val2+=$t*$counttra;
										
									   
									?>
								
							<?php
							}
	  
	   if($rownum1['addmisionfee']=="Yes")
	   {
	    
	      $total= $val2+ $rowadmission['fee'];  
	      echo $total;
	}
	else
	  {
	     $total= $val2; 
	     echo  $total;
	  }
	  $total1+=$total;
	?></td>
			              <td>
						  <?php
			              //   $search=mysqli_query($con,"select * from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' and class='".$_POST['class']."' and student='".$rownum1['student_id']."' ");
		
			 $search1=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession)  from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' and class='".$_POST['class']."' and student='".$rownum1['student_id']."' ");
			
		
			
				
					 
			/*		 	 
				  while($studrow=mysqli_fetch_array($search))
				  {
                         $depo= $studrow['fee_deposit']-$studrow['latefee'];
					 
					  $val9+=$depo;
					}
					*/
					$studrow=mysqli_fetch_array($search1);
					  // $depo= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];
					  $depo= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];
					echo  $depo;
				$val20=	$val20+$depo;
						  ?>						 
						 
						  </td>
						     <td><?php echo $studrow['sum(latefee)'];  
					     $studfine=$studfine+$studrow['sum(latefee)'];
					  
					  ?></td>
				   <td><?php 
				        echo $studrow['sum(concession)'];  
				        $studconcess=$studconcess+$studrow['sum(concession)'];
				   
				   ?></td>
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
				  <td></td>
				  <td><b><?php echo $total1;  ?></b></td>
				 
				  
				  <td><b><?php echo $val20;  ?></b></td>
				    <td><b><?php echo $studfine;   ?></b></td>
				  <td><b><?php echo $studconcess;   ?></b></td>
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