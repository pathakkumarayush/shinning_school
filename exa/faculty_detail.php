<?php
   if(isset($_POST['submit2']))
   {
   $alloc_std=mysqli_query($con,"update student set transport_status='".$_POST['status']."',transport_stopage='".$_POST['stop_id']."' where student_id='".$_POST['std_id']."'");
   ?>
   <script type="text/javascript">
   window.location="<?php echo $var."allocate_student&msg=Inserted Successfully";  ?>";
   </script>
   <?php
   }

?>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
<div id="container">
 <div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
			
				<form action="#" method="post" enctype="multipart/form-data">
				<!-- Box -->
				
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px"><img src="css/images/hostel.png" style="margin-left:20px;height:80px; width:80px" /><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Hostel Detail</span>
                 
                        <div style="border:#900 2px solid; margin-top:10px"></div>
						   <a href="./?pageid=transport_home">Hostel</a> >>Hostel Detail</a>
                          <div class="box-head" style="width:935px; margin-top:30px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."faculty_detail"."&&divid=1"; ?>">Search  By Staff Id</a>&nbsp;|| &nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."faculty_detail"."&&divid=2"; ?>">Search Staff By Name</a>
						 
						</div>
			  
	     <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Enter Employee Id</td>
              <td>&nbsp;</td>
			  <td><input type="text" name="teach_id" class="tb5" style="width:120px"></td>
              <td>&nbsp;</td>
			  <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
        <br />
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
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Select Staff</td>
			  <td>&nbsp;</td>
              <td><select name="teach_id" class="select">
			     <option>Select Staff</option>
				 <?php
				   $teacher=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."'");
				   while($row=mysqli_fetch_array($teacher))
				 {
				 ?>
			     <option value="<?php echo $row['teacher_id'];  ?>"><?php echo $row['teacher_name'];  ?></option>
				 <?php
				 }
				 ?>
			     </select> 
			  </td>
			  <td>&nbsp;</td>
			  <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
        <br />
        </div>
        
       <?php
		}
	   
		
		  if(isset($_POST['teach_id']))
					 {
					    	 $search=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' and status='0' and teacher_id='".$_POST['teach_id']."' and hostel_status='".Active."'");
			
				
				}
				
		?>	   
			        <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
			


			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
						
			<div class="cl">&nbsp;</div>	
				   <div class="box-head" style="width:820px">
				     <h2 class="left">Faculty Availing Hostel Facilities</h2>
						
				  </div>
			   <div class="table" style="border:#FF0000 0px solid; height:220px; width:840px; overflow:scroll">
						 
			   <table style="width:820px">
			     <tr>  
			         <td>Sr.No</td>
					 <td>Faculty Name</td>
					 <td>Hostel</td>
					 <td>Room No</td>
 			     </tr> 
				<?php 
				$i=1;	 
				  while(@$rowstud=mysqli_fetch_array($search))
				 {
				 ?>
				 
				 <tr>
				     <td><?php echo $i;  ?></td>
					 <td><?php echo ucwords($rowstud['teacher_name']);  ?></td>
					 <td> <?php 
					   $hostel=mysqli_query($con,"select * from add_hostel where id='".$rowstud['hostel_name']."'");
					   $rowhostel=mysqli_fetch_array($hostel); 
					   echo $rowhostel['host_name'];
					  ?></td>
					 <td><?php 
					 $room=mysqli_query($con,"select * from add_rooms where room_id='".$rowstud['room']."'");
					 $row_room=mysqli_fetch_array($room); 
					 echo $row_room['room_no'];  
					 
					 ?></td>
					 
					 
				 </tr>
				 <?php
				 $i++;
				 }
				 
				 ?>
			   </table>        
							
		        </div>		
		</div>
		<!-- Main -->
		</form>
	</div>
</div>
<br><br><br><br><br><br>