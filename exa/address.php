<?php
	if(isset($_REQUEST["add_teacher"]))
		{
			
			if(empty($_POST['txtname']))
		  {
			 $error_msg="field  marked with * are mandatory";
		  }
		  elseif(empty($_POST["txtdob"]))
		  {
			 $error_msg="field  marked with * are mandatory";
		  } 
		  
		  
		   if(empty($error_msg))
			  {
			   
			   $name1 = $_FILES['file']['name'];
			//$result=mysqli_query($con,"select * from login where uid='".$_POST["uid"]."'")or die(mysqli_error());
			
			   //$result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('teacher','".$_POST["uid"]."','".$_POST["pass"]."','y')" );
				//$id=mysqli_insert_id();
				
			 
			  
			  $id=mysqli_insert_id();
			  $techuid="smrttech".$id;
			  
			
			  
			  
			  $result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('teacher','$techuid','$techuid','y')" );
			  $updid=mysqli_query($con,"update teacher set uid='$techuid' where teacher_id='$id'");
			  
			   $target_path = "../images/";
			   
			   $target_path = $target_path.$id.basename( $_FILES['file']['name']); 
			    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
					{ }
			   
			$nm=$_POST["txtname"];
				$gen=$_POST["gender"];
				$dob=$_POST["txtdob"];
				$doj=$_POST["txtdoj1"];
				$qua=$_POST["txtqua"];
				$con=$_POST["txtmobile"];
				$det=$_POST["details"];
				$mrt=$_POST["mrt"];
				$dom=$_POST["txtdom2"];
				$typ=$_POST["typ"];
				$sub=$_POST["sub"];
				$sal=$_POST["sal"];
				$cl=$_POST["cl"];
			   	$saldat=$_POST["saldat"];
				$hno=$_POST["hno"];
			    $str=$_POST["str"];
			   $cty=$_POST["cty"];
			   $pin=$_POST["pin"];
			   $eid=$_POST["eid"];
			   $cnm=$_POST["cnm"];
			   $per=$_POST["per"];
			   $uni=$_POST["uni"];
			   $yr=$_POST["yr"];
			   $exp=$_POST["exp"];
			   $int=$_POST["int"];
			   $pos=$_POST["pos"];
			    $prd=$_POST["prd"];
			   
			   $res_ins=mysqli_query($con,"insert into teacher(teacher_name,teacher_gender,teacher_dob,teacher_doj,teacher_qualifi,teacher_contactno,details,maritial_status,teacher_dom,teacher_type,subject,salary,casual_leave,salary_detected,house_no,Street,city,pincode,teacher_email,course,percentage,university,year,experience,institute,position,period,teacher_img) values('$nm','$gen','$dob','$doj','$qua','$con','$det','$mrt','$dom','$typ','$sub','$sal','$cl','$saldat','$hno','$str','$cty','$pin','$eid','$cnm','$per','$uni','$yr','$exp','$int','$pos','$prd','$target_path')")or die(mysqli_error());
			  
			   	
				 
				 ?>
                   <script type="text/javascript">
                    window.location="<?php echo $var."addstaff&&sumsg=Inserted Successfully"; ?>";
			       </script>
			  <?php
					}
					}
				?>

<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164854_elementary_school.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Add Staff</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=admissionhome">Admission</a> >>Student Admission</a>
               
                 <?php 
	     if(!empty($error_msg))
		 {
			?>
         <div class="error" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		 <?php echo $error_msg; ?> 
		</div>
         <?php
         }
	   ?>
      <?php 
	     if(!empty($_GET['sumsg']))
		 {
		?>
         <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		  <?php echo $_GET['sumsg']; ?> 
		 </div>
         <?php
         }
	   ?>
	   
	   
	   <table width="986" height="91" border="0"  style="margin-top:15px;" >
  <tr style="font-family:Arial, Helvetica, sans-serif; font-size:24px;" >
    
    <td><a href="address.php">Address</a></td>
   
  </tr>
  <tr>
    <td colspan="4">
	<?php
	if(isset($_GET["r"]))
	{
	echo "<div style='font:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;'>Record inserted successfully </div> ";
	}
	?>
	
	<form method="post" action="addresssave.php" enctype="multipart/form-data" >
 <table  width="853" height="337" border="0"   >
      <tr  class="table" >
        <td width="208"><p>House no.</p>          </td>
        <td width="275"><input type="text" name="hno" class="tb5"  /></td>
        <td width="356">Mobile</td>
        <td width="356"><input name="txtmobile" type="text" class="tb5" id="txtmobile" value="<?php  if($_POST) echo $_POST['txtmobile'];  if(isset($_GET["uptachid"])){echo $row1["teacher_contactno"];} ?>" size="40" /></td>
      </tr>
      <tr class="table" >
        <td>Street</td>
        <td><input type="text" name="str" class="tb5" /> </td>
        <td>Salary</td>
        <td><input name="sal" type="text" class="tb5"   size="40" /></td>
      </tr>
      <tr class="table" >
        <td>City</td>
        <td><input type="text" name="cty" class="tb5" /></td>
        <td>Casual leave </td>
        <td><select name="cl" class="tb5" >
          <option value="1" >1</option>
          <option value="2" >2</option>
          <option value="3" >3</option>
        </select></td>
      </tr>
      <tr class="table" >
        <td>Pincode </td>
        <td><input type="text" name="pin" class="tb5" /></td>
        <td>Salary_detected</td>
        <td><input type="text" name="saldat" class="tb5" /></td>
      </tr>
      <tr class="table" >
        <td height="54">E-mail </td>
        <td><input type="text" name="eid" class="tb5" /></td>
        <td>Upload image </td>
        <td><input name="file" type="file" size="10" height="20"  style="border:#FF0000 0px solid; width:280px"></td>
      </tr>
      <tr class="table" >
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td> <a href="addstaff.php"> Back </a> </td>
        <td><input type="submit" name="Submit" value="Submit" /></td>
      </tr>
      <tr class="table" >
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>
	</td>
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
<br><br><br><br><br><br><br>