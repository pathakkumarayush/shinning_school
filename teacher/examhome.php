<div id="container">
 
	<div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
			<?php
	
	  if($_SESSION['usertype']=="school")
	  {
	?>	
		<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/timetable.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Timetable</span>

                   <div style="border:#900 2px solid; margin-top:10px"></div>
                  <table width="600" style="margin:80px 0px 0px 80px; font-size:24px">
                 
                   <tr>
                  <td><a href="<?php echo $var."add_exam"?>"><img src="css/images/addsubject.png" style="margin-left:20px; height:100px" /></a></td>
                  <td><a href="<?php echo $var."exam_timetable" ?>"><img src="css/images/subjectpreference1.jpg" style="margin-left:40px; height:100px" /></a></td>
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
                  <td style="font-weight:bold">Add Exam</td>
                  <td style="font-weight:bold">Create Timetable</td>
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
                  <td><a href="<?php echo $var."sendmsg"?>"><img src="css/images/addsubject.png" style="margin-left:20px; height:100px" /></a></td>
                  <td>&nbsp;</td>
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
                  <td style="font-weight:bold">Result</td>
                  <td style="font-weight:bold"></td>
                  </tr>

			  
			  
			   </table>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
	<?php
	}
	else if($_SESSION['usertype']=="student")
	{
	?>
	    <div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/timetable.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Timetable</span>

                   <div style="border:#900 2px solid; margin-top:10px"></div>
                  <table width="600" style="margin:80px 0px 0px 80px; font-size:24px">
                 
                   <tr>
                 
                  <td><a href="<?php echo $var."exam_timetable2" ?>"><img src="css/images/subjectpreference1.jpg" style="margin-left:40px; height:100px" /></a></td>
				  <td><a href="<?php echo $var."sendmsg2"?>"><img src="css/results.jpg" style="margin-left:20px; height:100px" /></a></td>
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
                   <td style="font-weight:bold">View Timetable</td>
                   <td  style="font-weight:bold">&nbsp;&nbsp;&nbsp;&nbsp;Result</td>
				  </tr>
              </table>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
	<?php
	}
	?>	
		
		
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
<br><br><br><br><br><br><br><br><br>