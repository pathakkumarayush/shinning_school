 <script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>

<?php

 $month=array("July","August","September","October","November","December","February");
if(isset($_POST["submit"]))
{
       $shw=0;
        $st=1;
             $search=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and status='$st'");
			
			 if(mysqli_num_rows($search)>0)
			 {
			 
			 
		   	$studrow=mysqli_fetch_array($search);
			 $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class='".$studrow['student_class']."' ");
			 $i=1;
		      while($row=mysqli_fetch_array($class))
			   {
			    
			      $numclass1=mysqli_query($con,"select * from student where student_class='".$row['class']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and student_id='".$studrow['student_id']."' and status='1'");
			   
				
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
	 $selrc=mysqli_query($con,"select * from fee_structure where class='".$row['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
	 
	 
	 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	  
	    $val2=0;
	    foreach($month as $m)
		{
	
	    $combinemonth2=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and month='$m' and class='".$row['class']."'");
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
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");


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
								 
								if($count1>0)
								  {
							  
							   $val1+=$val*$count1;
							   }
							   else
							      {
								  
								   $val1+=$val;
								  }
							 
							      
							      
								}
							
							}
							
							  $exam=mysqli_query($con,"select * from exam_fee where month='$m' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$row['class']."'");
							
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
	
	
					   
      
	 
	   $admission=mysqli_query($con,"SELECT * FROM `admission` where class='".$studrow['student_class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
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
									
										 $val2+=$t;
									   
									?>
								
							<?php
							}
	  
	   if($rownum1['addmisionfee']=="Yes")
	   {
	    
	      $total= $val2+ $rowadmission['fee'];  
	      //echo $total;
	}
	else
	  {
	     $total= $val2; 
	    // echo  $total;
	  }
	  $total1+=$total;
      
	
			$search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$studrow['student_class']."' and student='".$studrow['student_id']."' ");


							
							 
				  while($studrow=mysqli_fetch_array($search))
				  {
                         $depo= $studrow['fee_deposit']-$studrow['latefee'];
					
					  $val9+=$depo;
					}		
			           
					   
					   
					
					    }
					
					   if($val9>=$total1)
					   {
					   
					   $selecttc=mysqli_query($con,"select * from tcissued where student='".$studrow['student_id']."'");
					   if(mysqli_num_rows($selecttc)>0)
					   {
					      $msg="Tc Already Issued";
					   }
					   else
					   {
					   $st=1;
					   $insert=mysqli_query($con,"insert into tcissued(student,class,session,status) values('".$_POST['stdid']."','".$_POST['class']."','".$_SESSION['session']."','$st')");
					 $nid=mysqli_insert_id();  
					 
					   $shw=1;
					   ?>
                          <script type="text/javascript">
						  window.location="http://localhost/bsps/school/?pageid=tcform&stdid=<?php echo $_POST['stdid']."&tcid=".$nid; ?>";
						  </script>					   
					   
					   <?php
					   
					   
					  } 
					   }
					   
					   else
					        {
						   	 $msg="Student not sligib;e for Tc";
							  $shw=0;
							}
					
						}
						}
?>


<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this class")) { 
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
				   <img src="css/images/totaltc.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Tc Alloccation</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="#">Tc Allocation</a>
				 
            
	             <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
    <?php
	   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>

	  
	   
     <table cellspacing="10" style="margin-top:30px">
	<tr>
	  <td>Date:</td>
	  <td><?php echo date("d-m-Y");  ?></td>
	</tr>
	 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
	   </tr>
	<tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showtcStudent(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class']; ?></option>
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
			  <td>Student Name</td> 
			  <td><div id="txtHint1"></div></td>
       </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>

		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	  <tr>
		<td>Date<span style="color:#FF0000">*</span></td>
		<td><input type="text" name="date" class="tb5" id="inputField"></td>
	</tr>
 <tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>

  <tr>
    <td>&nbsp;</td>
   <td><input type="submit" name="submit" value="submit" style="width:150px"></td>
</tr>
</table>
         
			 
		
     					
				</div>
	</div>
					
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>