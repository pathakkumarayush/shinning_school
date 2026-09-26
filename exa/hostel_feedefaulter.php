 <script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
 <div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/hostel.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Hostel Fee Defaulter</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=hostel_home">Hostel</a>>>Hostel Fee Defaulter</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style="margin-top:20px; font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."hostel_feedefaulter"."&&divid=2"; ?>">Fee Defaulter By Class</a>
						</div>
         
       
         
        <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          
		  <br>
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
   <td>Select Month</td><td><select name="month1"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="february">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   
               </select></td>
		   </tr>
		     <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			   <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:115px">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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

		
		   <div class="table" style="border:#FFCCCC 20px solid; height:420px; margin:0px 0px 0px 0px; overflow:scroll">
                    <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/smarterp2/bplacademy/school/hostel_defaulter.php?month=<?php echo $_POST['month1']."&class=".$_POST['class'];  ?>')"><input type="button" value="Print List " style="width:200px;float:right" ></a>
				   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_POST['session']; ?></h2>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Student Id</td>
		<td>Scholar No</td>
		<td>Student Name</td>
        <td>Class</td>
        <td>Month</td>     
	    <td>Session</td>
		
       </tr>
       <?php
       
	$i=1;
	
				if(isset($_POST['search']))
	{
	//while($studrow=mysqli_fetch_array($search))
	     $class=mysqli_query($con,"select * from class where class_id='".$_POST['class']."' and school='".$_SESSION['uid']."'");
	     $rowclass=mysqli_fetch_array($class);
	  if(empty($rowclass['class_section']))
	  {
		 $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and student_class='".$rowclass['class']."' and status='0' and hostel_status='".Active."'");
	
	  
	  }
	  else
	    {
		  $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and status='0' and hostel_status='".Active."'");
	    }
	
				  
			   $num=mysqli_num_rows($search);
			
				
			    if($num>0)
				{
				 while($studrow=mysqli_fetch_array($search))
				 {
	              
				   // $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'   and student='".$studrow['student_id']."' and month='".$_POST['month1']."'");
				  $num4=0;
					$distinctmonth=mysqli_query($con,"select distinct(month) from pay_hostel_fee where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
					$num4=mysqli_num_rows($distinctmonth);
						
			//$explode2=array();
	$j=0;
			if($num4>0)
			{
			
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{
			    
				  $ex4=explode(",",$rowdistinctmonth['month']);
				 
				   if(in_array($_POST['month1'], $ex4)) 
				  {
				     
                      $numchk=0; 
                     break;
				  }
		          else
				    {
					  
					  $numchk=1;
					
					}
			}	 
			}
			else
			   {
			      
				  $numchk=1;
			   }
			
			
			if(($numchk==1))
			{
				
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
	 <td><?php echo $studrow['student_id'];?></td>
	 <td><?php echo $studrow['student_scholar'];?></td>
    <td><?php  echo ucwords($studrow['student_name']);?></td>
	 <td><?php echo ucwords($studrow['student_class']);?></td>
	 <td><?php echo $_POST['month1']; ?></td>
	 <td><?php echo ucwords($studrow['student_session']);?></td>
     
    </tr>
    <?php
    $i++;
	$num4="";
	$numchk="";
	 } 
	}
	}
	}
	
	else
	   {
	   ?>
      <td style="color:#990066"><?php echo "No Record"; ?></td>
	   <?php
	   }
	?>
	
	</table>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>