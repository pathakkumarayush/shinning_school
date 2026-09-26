<?php
   if(!empty($_GET['id']))
    {
	  $search=mysqli_query($con,"select * from enquiry where id='".$_GET['id']."'");
	  $row=mysqli_fetch_array($search);
	}

?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
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
				   <img src="css/images/1365164854_elementary_school.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Student Enquiry</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=admissionhome">Admission</a> >>Student Enquiry</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
    <?php
	          if(!empty($error_msg))
			{
			?>
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php echo $error_msg ;?></div>
			 <?php  
			 } 
             if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } ?>

		
<table border="0" style="margin:40px 0px 0px 20px">
        <tr>
		   <td>Name <span style="color:#FF0000">*</span></td>
		   <td><?php echo ucwords($row['name']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Gender</td>
		   <td><?php echo ucwords($row['gender']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
          <tr>
		   <td>Father Name <span style="color:#FF0000">*</span></td>
		   <td><?php echo ucwords($row['fname']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
         <tr>
		   <td>Mother Name</td>
		   <td><?php echo ucwords($row['mname']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
            <tr>
		   <td>Dob</td>
		   <td><?php echo ucwords($row['dob']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>

           <tr>
            <td>Admission in Class<span style="color:#FF0000">*</span></td>
               <td>
             <?php echo ucwords($row['aclass']); ?>                </td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
			<tr>
		   <td>Previous Class Performance</td>
		   <td><?php echo ucwords($row['pclass']); ?> &nbsp; <?php echo $row['percentage']; ?> % </td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Mobile<span style="color:#FF0000">*</span></td>
		   <td><?php echo ucwords($row['mobile']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Address</td>
		   <td><?php echo ucwords($row['address']); ?></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>City</td>
		   <td><?php echo ucwords($row['city']); ?></td>
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
<br><br><br><br><br><br><br><br>