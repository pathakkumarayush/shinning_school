
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
				   <img src="css/images/school.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">View Transport Fee Defaulters</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=transport_home">Transport</a> >>View Transport Fee Collection Dates</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      		
		
	
        
         <table border="0" style="margin:50px 0px 0px 20px">
          
		   <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showStudent14(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
		      <td>Instalment</td>
		       <td>
			     <select name="instalment"> 
				 <option value="Instalment1">Instalment1</option>
				  <option value="Instalment2">Instalment2</option>
				 </select>
			   
			   </td>
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
            <td></td>
            <td><input  type="submit" name="submit1"  value="Submit" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     <br> <br> <br>
           <div class="box-head">
						<h2 class="left">transport Fee Due Student </h2>
						</div>
           <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Student Name</td>
		<td>Class</td>
		<td>Stop Name</td>
		<td>Total Amount</td>
        <td>Instalment</td>
		
        
        </tr>
       <?php
	   $class=mysqli_query($con,"select * from class where class_id='".$_POST['class']."' and school='".$_SESSION['uid']."'");
	$rowclass=mysqli_fetch_array($class);
       $search1=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$rowclass['class']."'  and transport_status='Active' order by student_name Asc");
	
	$i=1;   
  while($row=mysqli_fetch_array($search1))
  {
    $feetyp="Transport Fee";
    $feeedet=mysqli_query($con,"select * from fee_detail where feetype='$feetyp' and student='".$row['student_id']."' and instalment<>'".$_POST['instalment']."'");
	
	
	
  if(mysqli_num_rows($feeedet)<1)
  {
  ?>
		
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($row['student_name']);?></td>
	 <td><?php echo $row['student_class'];?></td>
    
	 <td><?php echo ucwords($row['transport_stopage']);?></td>
	
     
    <td>
	   <?php
	      $tfee=mysqli_query($con,"select * from stopage where stop_name='".$row['transport_stopage']."' and session='".$_SESSION['session']."'");
  $r_fee=mysqli_fetch_array($tfee);
      echo $r_fee['stop_cost'];
	  ?>
	</td>
    <td><?php echo $_POST['instalment'];?></td>
  
    </tr>
    <?php
    $i++;
	}
	}
	?>
	
	</table>
         </div>
          
    
      
   
			<br><br>
            
     
      
                 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>