<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/leave.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Leave Details</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="#">Half Day Leave Details</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style="margin-top:20px; font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."showhalfdayleave"."&&divid=1"; ?>">Details By Date</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."showhalfdayleave"."&&divid=2"; ?>">Details By Month</a>
						</div>
         
       
         
        <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
       <table style="margin-top:20px">  
		<tr>
		<td>Date:</td>
		<td><input type="text" name="date" class="tb5" id="inputField" style="width:150px"></td>  
		<td>&nbsp;</td>
		  <td><input type="submit"  name="submit" value="submit" style="width:100px"></td>
		</tr>
		</table>
		 
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
       <table style="margin-top:20px"> 
		<tr>
		<td>Month:</td>
		<td>  <select name="month1"  class="select">
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
                                 </select> </td>  
			  <td>&nbsp;</td>
		  <td><input type="submit"  name="submit1" value="submit" style="width:100px"></td>
		</tr>
		</table>
		 
        </div>
        
        <?php
		 }
		 ?>

		   
		 <div class="table" style="border:#FFCCCC 20px solid; height:600px; margin:60px 0px 0px 0px; overflow:scroll">
                   
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Student Name</td>
        <td>Class</td>
        <td>Date</td>
		<td>Guardian Name</td>
		<td>Reason</td>
       </tr>
	   <?php
	     if(isset($_POST['submit']))
		 {
	       $search=mysqli_query($con,"select * from studentleave where  session='".$_SESSION['session']."'");
	   	$i=1;
		   while($rowsearch=mysqli_fetch_array($search))
		{
	        $mnth=date("d-m-Y",strtotime($rowsearch['date']));
		 if($_POST['date']==$mnth)
		 {
		?>
		   <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php 
	      $student=mysqli_query($con,"select * from student where student_id='".$rowsearch['student']."' and student_session='".$_SESSION['session']."' ");
		   $rowstudent=mysqli_fetch_array($student);
		   echo $rowstudent['student_name'];
		   ?></td>
	 <td><?php 
	       $rowquery=mysqli_query($con,"select * from class where class_id='".$rowsearch['class']."'");
		   $rowclass=mysqli_fetch_array($rowquery);
	       echo $rowclass['class'];
	      ?>
     </td>
	 <td><?php echo date("d-m-Y h:i:s",strtotime($rowsearch['date'])); ?></td>
	 <td><?php echo $rowsearch['guardin']; ?></td>
	  <td><?php echo $rowsearch['reason']; ?></td>
  
    </tr>
		<?php
		 $i++;
		 }
		 }
		 }
		?>
		<?php
	     if(isset($_POST['submit1']))
		 {
		  $i=1;
	       $search=mysqli_query($con,"select * from studentleave where  session='".$_SESSION['session']."'");
	       $m=substr($_POST['month1'],0,3);
		   while($rowsearch=mysqli_fetch_array($search))
		   {
		   $mnth=date("M",strtotime($rowsearch['date']));
		    if($m==$mnth)
			{
		  ?> 
		     <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php 
	      $student=mysqli_query($con,"select * from student where student_id='".$rowsearch['student']."' and student_session='".$_SESSION['session']."' ");
		   $rowstudent=mysqli_fetch_array($student);
		   echo $rowstudent['student_name'];
		   ?></td>
	 <td><?php 
	       $rowquery=mysqli_query($con,"select * from class where class_id='".$rowsearch['class']."'");
		   $rowclass=mysqli_fetch_array($rowquery);
	       echo $rowclass['class'];
	      ?>
     </td>
	 <td><?php echo date("d-m-Y h:i:s",strtotime($rowsearch['date'])); ?></td>
	 <td><?php echo $rowsearch['guardin']; ?></td>
	  <td><?php echo $rowsearch['reason']; ?></td>
   
    </tr>
		  
		  <?php
		   }
		     $i++;
		   }
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>