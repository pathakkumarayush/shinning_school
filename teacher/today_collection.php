
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Student Ledger</span>

                <div style="border:#900 2px solid; margin-top:10px"></div>
                Total fee Colection
				</a>
                <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style="margin-top:20px; font-size:18px">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."today_collection"."&&divid=1"; ?>">Today Collection</a>&nbsp;&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."today_collection"."&&divid=2"; ?>">Collection By Date</a>	   
			</div>
         
        <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		     <tr> 
		  <td>Date</td>
		  <td><input type="text" name="date"  class="tb5" style="width:110px">yyyy-mm-dd</td>
		  </tr></td>
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

		   
		   <div class="table" style="border:#FFCCCC 20px solid; height:auto; margin:0px 0px 0px 0px">
                   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_SESSION['session']; ?></h2>
         <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
		   <table width="70%" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 120px; font-size:14px">
		       <tr>
			      <td>Sr</td>
				  <td>Name</td>
				  <td>Class</td>
				  <td>Date</td>
				  <td>Receipt No</td>
				  <td>Month</td>
				  <td>Amount</td>
			  </tr>
		         <?php
			
			$today=date("Y-m-d");
			  $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$today."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				  <td><?php 
				   
				  echo $rowsearch['student_name']; 
				  ?></td>
				  <td><?php echo $studrow['class']; ?></td>
				   <td><?php echo date("d-m-Y",strtotime($studrow['date'])); ?></td>
				  <td><?php echo $studrow['id']; ?></td>
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
         <?php
           }
		  ?>
		  
		  <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
		   <table width="70%" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 120px; font-size:14px">
		       <tr>
			      <td>Sr</td>
				  <td>Name</td>
				  <td>Class</td>
				  <td>Date</td>
				  <td>Receipt No</td>
				  <td>Month</td>
				  <td>Amount</td>
			  </tr>
		         <?php
			
			
			  $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$_POST['date']."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				  <td><?php 
				   
				  echo $rowsearch['student_name']; 
				  ?></td>
				  <td><?php echo $studrow['class']; ?></td>
				  <td><?php echo date("d-m-Y",strtotime($studrow['date'])); ?></td>
				  <td><?php echo $studrow['id']; ?></td>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>