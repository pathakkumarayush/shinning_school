<?php
require_once("meta.php");
if(!empty($_GET['did']))
{
$query=mysqli_query($con,"delete from teacher where teacher_id='".$_GET['did']."'");
}
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<div id="container">
<div class="shell"  >
 <div id="main" >
	<!-- Content -->
		<div id="content" style="border:#F00 0px solid; width:1060px; height:auto">
			<!-- Box -->
			<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="images/Pay Roll/Staff Detail.png" style="width:200px; height:80px;" />
                        <div style="border:#900 2px solid; margin-top:10px"></div>
						 <span style="float:right"><a href="./?pageid=staffhome" style="color:#FFFFFF; font-size:18px">Back</a></span>
                <a href="./?pageid=staffhome">Staff Home</a> >>Manage Staff</a>
                	
		
		          
                        <br>
        <br>
            <div class="box-head">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="">Staff details</a>
			      </div>
         
        </tr>
		</table>
	
		<div style="height:600px; overflow:scroll">
		<table width="953" border="0" class="table"   >
  <tr style="font-weight:bold;">
    <td>Sr.No</td>
    <td>Name</td>
	<td>ID</td>
    <td>Gender</td>
	<td>Mobile</td>
    <td>Date of birth </td>
    <td>Qualification</td>
    <td>Address</td>
    <td>Action</td>
  
   
  </tr>
     <?php
	
	$qry="select * from teacher where teacher_school='".$_SESSION['uid']."'";
     $i=1;
	$result=mysqli_query($con,$qry);
	while($row=mysqli_fetch_array($result))
	{
	

  echo "<tr>";
  echo "<td>" .$i. "</td>";
  echo "<td>" .$row["teacher_name"]. "</td>";
  echo "<td>" .$row["teacher_id"]. "</td>";
  echo "<td>" .$row["teacher_gender"]. "</td>";
   echo "<td>" .$row["contact"]. "</td>";
  echo "<td>" .$row["teacher_dob"]. "</td>";
  echo "<td>" .$row["teacher_qualifi"]. "</td>";
  echo "<td>" .$row["address"]."</td>";
  
  ?>
   <td><a href="<?php echo $var."addstaff&uid=".$row["teacher_id"];  ?>">Edit</a>
  
  <a href="<?php echo $var."staffdetail&did=".$row['teacher_id']; ?>" onClick="return confirmation('Are you sure want to delete');">X</a>
 
  </td>
   </td>
   
  <?php
  $i++;
  }
	  mysqli_close($con);
  ?>
  
  
  
  
</table>
     </div>
	  
	  
	  
         </div>
     
                 
                  </form>
                  
					
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>