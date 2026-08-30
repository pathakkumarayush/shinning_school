<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<?php
       $month=array("July","August","September","October","November","December","January","February","March");
       ?>
	   <?php
	         if(!empty($_GET['updstd']))
			 {
			 $search=mysqli_query($con,"select * from student where uid='".$_GET['updstd']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				
				$studrow=mysqli_fetch_array($search);
				 
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$studrow['student_class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	   }
	   ?>
		  		  
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	color: #000000;
}
-->
</style>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
				   <span class="style1">View Structure </span>
				   <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a> >>View structure 
                <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
                    
     
   
         
      
        
        
   
		   <div class="table" style="border:#FFCCCC 20px solid; height:340px; margin-top:30px">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold" >
	    <td>Sr.No</td>
	    <td>Month</td>
        <td>fee Structure</td>
		  <td>Exam Fee</td>
		<td>Total Fee</td>
   </tr>
       <?php
       $i=1;
	    
	    foreach($month as $m)
		{
	?>	
    <tr style="color:#335599">
    <td><?php echo $i; ?></td>
	<?php
	    $combinemonth2=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and month='$m' and class='".$_POST['class']."'");
                $rowconmonth2=mysqli_fetch_array($combinemonth2);
	?>
	<td><?php 
	$count1=0;
	if(!empty($rowconmonth2['combinemonth']))
	{
	  
	  $count1=count($rowconmonth2['combinemonth']);
	 $count1=$count1+1;
	 echo ucwords($m).",".ucwords($rowconmonth2['combinemonth']);
	}
	else 
	{
	echo ucwords($m); 
	}
	
	?></td>
	<td><?php 
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
		
							
							
							  <?php echo ucwords($header)."="; ?>
							   <?php echo $val;  ?>
						
							<?php
							       $val1+=$val;
							     
							  }
							  }
							  else
							    {
								 
								?>
										   
							   <?php echo ucwords($header)."="; ?>
							   
							   <?php 
							    if($count1>0)
								  {
							   echo $val*$count1;  
							   $val1+=$val*$count1;
							   }
							   else
							      {
								    echo $val;
								   $val1+=$val;
								  }
							   ?>
						

								<?php
							      
							      
								}
							
							}
							?>

	
	</td> 
	<td>
	     								
							
							<?php
							  $exam=mysqli_query($con,"select * from exam_fee where month='$m' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$_POST['class']."'");
							
			$examrow=mysqli_fetch_array($exam);
							 if(mysqli_num_rows($exam)>0)
							 {
							 echo ucwords($examrow['exam_name'])."<br>".$examrow['fee'];  
							  $val1+=$examrow['fee'];
								}   
								?>
			</td>
	    <td><?php echo $val1; ?></td>
        </tr>
    <?php
    $i++;
	}
	?>
	
	
	</table>
	
         </div>
      <br><br>
           <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://smarteducations.in/smarterp/demo/school/printStructure.php?id=<?php echo $_POST['class']; ?>')"><input type="button" value="Print " style="width:200px; margin-left:100px" ></a>      
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>