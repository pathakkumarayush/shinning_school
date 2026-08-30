<div id="container">
 
	<div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/school.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Transport</span>

                   <div style="border:#900 2px solid; margin-top:10px"></div>
              
                  <table width="600" style="margin:80px 0px 0px 80px; font-size:24px">
                  <tr>
                  <td><a href="<?php echo $var."addroutes"?>"><img src="css/images/busstop.png" style="margin-left:0px; height:130px" /></a></td>
                  <td><a href="<?php echo $var."addvehicles"?>"><img src="css/images/images2.jpg" style="margin-left:30px; height:130px" /></a></td>
                  </tr>
			      <tr>
                  <td><a href="./?pageid=addroutes" style="text-decoration:none">Add Stopage</a></td>
                  <td><a href="./?pageid=addvehicles" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Vehicles</a></td>
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
                  <td><a href="<?php echo $var."transport_detail"?>"><img src="css/images/busrout.jpg" style="margin-left:0px; height:130px" /></a></td>
                  <td><a href="<?php echo $var."allocate_student"?>"><img src="css/images/1365164854_elementary_school.png" style="margin-left:30px; height:130px" /></a></td>
                  </tr>
                   <tr>
                  <td><a href="./?pageid=transport_detail" style="text-decoration:none">Add Routes</td>
                  <td><a href="./?pageid=allocate_student" style="text-decoration:none">Student Allocation</td>
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
                  <td><a href="<?php echo $var."transport_student"?>"><img src="css/images/studentdetail.jpg" style="margin-left:0px; height:130px" /></a></td>
                  <td>
				   <?php
				   $f="transport";
				   $s="Separately";
				      $upd1=mysqli_query($con,"select * from transportsetting where feename='$f' and setting='$s' ");
				     if(mysqli_num_rows($upd1)>0)
					 {
				    
				   ?>
				  <a href="<?php echo $var."transportfee_home"?>"><img src="css/images/payfee.png" style="margin-left:0px; height:130px" /></a></td>
                  <?php
				  }
				  ?>
				  </tr>
                    <tr>
                  <td><a href="./?pageid=transport_student" style="text-decoration:none">Student Detail</td>
                  <td>
				   <?php
				   $f="transport";
				   $s="Separately";
				      $upd1=mysqli_query($con,"select * from transportsetting where feename='$f' and setting='$s' ");
				     if(mysqli_num_rows($upd1)>0)
					 {
				    
				   ?>
				  <a href="./?pageid=transportfee_home" style="text-decoration:none">Transport Fee</a> </td>
                 <?php
				  }
				 ?>
				  </tr>
                    <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                   <tr>
                  <td>&nbsp;</td>
                  <td></td>
                  </tr>
                  
                  
                  </table>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>