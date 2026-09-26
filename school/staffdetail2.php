 <?php
require_once("meta.php");
?>
 
	
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	



<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/staff.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Manage staff</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Satff managment</a> >>Satff Ledger</a>
                	
		
		          
                        <br>
        <br>
            <div class="box-head">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="">Staff details</a>
			      </div>
         
        </tr>
		</table>
	
		
		
      
	  
	
	 
	  
	   
   
	  <table width="953" border="0" class="table"   >
  <tr>
    <td>Name</td>
	<td>Teacher ID</td>
    <td>Gender</td>
    <td>Date of birth </td>
    <td>Qualification</td>
    <td>Address</td>
    <td>Email</td>
    <td>Subject</td>
   
  </tr>
     <?php
	
	$qry="select * from teacher";
	$result=mysqli_query($con,$qry);
	while($row=mysqli_fetch_array($result))
	{
	

  echo "<tr>";
  echo "<td>" .$row["teacher_name"]. "</td>";
  echo "<td>" .$row["teacher_id"]. "</td>";
  echo "<td>" .$row["teacher_gender"]. "</td>";
  echo "<td>" .$row["teacher_dob"]. "</td>";
  echo "<td>" .$row["teacher_qualifi"]. "</td>";
  echo "<td>" .$row["house_no"].$row["street"].$row["city"]. "</td>";
  echo "<td>" .$row["teacher_email"]. "</td>";
  echo "<td>" .$row["subject"]. "</td>";
  
  
  }
	  mysqli_close($con);
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
<br><br><br><br><br><br><br><br><br><br><br><br>