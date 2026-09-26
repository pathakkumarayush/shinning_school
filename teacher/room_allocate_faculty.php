<?php
if(isset($_POST['submit2']))
{
$upd_teach=mysqli_query($con,"update teacher set hostel_status='".Active."',hostel='".$_POST['name']."',room='".$_POST['room']."',hostel_payment_type='".$_POST['payment_type']."' where teacher_id='".$_POST['teacher_id']."'");
$update_eoom=mysqli_query($con,"update add_rooms set status='".unavailable."' where hostel_id='".$_POST['name']."' and room_id='".$_POST['room']."'"); 
$msg="Allocated Successfully";


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
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				  <img src="css/images/room.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Allocate Room To Faculty</span>
                 
                        <div style="border:#900 2px solid; margin-top:10px"></div>
                    
							
		 <?php
	          
			 if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
		
				
			   <a href="./?pageid=hostel_home">Hostel</a> >>Room Allocation To Faculty</a>
	   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:730px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."room_allocate_faculty"."&&divid=1"; ?>">Search  By Staff Id</a>&nbsp;|| &nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."room_allocate_faculty"."&&divid=2"; ?>">Search Staff By Name</a>
						</div>
            <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Enter Staff No</td>
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
	   ?>
      <?php
		 
		    if(isset($_POST['teach_id']))
			{
		  
		$search=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' and  teacher_id='".$_POST['teach_id']."'");
		$rowstudent=mysqli_fetch_array($search);
		}
		
		 ?>
      


          
           <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:16px; margin-left:100px; margin-top:30px">
			<tr>
			<td>Teacher Name</td>
			<td><?php 
			echo ucwords($rowstudent['teacher_name']);  
			?></td>
	        </tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<?php
   $hostel=mysqli_query($con,"select * from add_hostel where school='".$_SESSION['uid']."'");
  
?>

<tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><select name="name" class="select" onchange="getrooms(this.value);">
    <option value="-1">Select Hostel</option>
  <?php
     while($room_hostel=mysqli_fetch_array($hostel))
	 {
  ?>
   <option value="<?php echo $room_hostel['id'];  ?>" <?php if($row_sel['hostel_id']==$room_hostel['id']) {?> selected="selected" <?php } ?> ><?php echo $room_hostel['host_name'];  ?></option>
  <?php
  }
  ?>
   </select> <div id="room" style="margin-left:150px; margin-top:-20px"></div></td>
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
			   <td>Payment Type</td>
			    <td><input type="radio" name="payment_type" value="Yes">Yes &nbsp;&nbsp; <input type="radio" name="payment_type" value="No">No</td>	
			</tr>	
				<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>	
		
		
	       <tr>
			<td><input type="hidden" name="teacher_id" value="<?php echo $rowstudent['teacher_id'];  ?>"></td>
			<td>&nbsp;</td>
			</tr>
			  
			  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			 
			  
			<tr>
			<td>Status</td>
			<td><input type="radio" name="status" value="Active" checked="checked">&nbsp; Active &nbsp;<input type="radio" name="status" value="Inactive">&nbsp; Inactive</td>
			</tr>
		    <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
		   <tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit2" value="Allocate Hostel" /></td>
			</tr>
		   </table>
      
      
                 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br>