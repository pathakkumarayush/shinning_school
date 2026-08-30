<?php
include_once 'db.php';
?>
<style>
.tb5{ border-radius:4px; height:25px;}
/* calendar style here */
.picker-container {
  position: absolute;
  z-index: 99;
}


.cal {
  background-color: white;
  display: block;
  width: 216px;
  -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
  border-collapse: collapse;
  border-spacing: 0;
}

.cal a {
  text-decoration: none;
}

.cal tr, .cal th, .cal td {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}

.cal caption {
  line-height: 32px;
  font-weight: bold;
  color: #e2e2e2;
  text-align: center;
  text-shadow: 0 -1px black;
  background: #333;
  //background: rgba(0, 0, 0, 0.35);
  border-top: 1px solid #333;
  border-bottom: 1px solid #313131;
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.04);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.04);
}
.cal caption a {
  display: block;
  line-height: 32px;
  padding: 0 10px;
  font-size: 15px;
  color: #e2e2e2;
}
.cal caption a:hover {
  color: white;
}
.cal caption .prev {
  float: left;
}
.cal caption .next {
  float: right;
}
.cal th, .cal td {
  width: 30px;
  text-align: center;
  text-shadow: 0 1px rgba(255, 255, 255, 0.8);
}
.cal th:first-child, .cal td:first-child {
  border-left: 0;
}
.cal th {
  line-height: 20px;
  font-size: 8px;
  color: #696969;
  text-transform: uppercase;
  background: #f3f3f3;
  border-left: 1px solid #f3f3f3;
}
.cal td {
  font-size: 11px;
  font-weight: bold;
  border-top: 1px solid #c2c2c2;
  border-left: 1px solid #c2c2c2;
}
.cal td a {
  clear: both;
  display: block;
  position: relative;
  width: 30px;
  line-height: 28px;
  color: #666;
  background-image: -webkit-linear-gradient(top, #eaeaea, #e5e5e5 60%, #d9d9d9);
  background-image: -moz-linear-gradient(top, #eaeaea, #e5e5e5 60%, #d9d9d9);
  background-image: -o-linear-gradient(top, #eaeaea, #e5e5e5 60%, #d9d9d9);
  background-image: linear-gradient(to bottom, #eaeaea, #e5e5e5 60%, #d9d9d9);
  -webkit-box-shadow: inset 1px 1px rgba(255, 255, 255, 0.5);
  box-shadow: inset 1px 1px rgba(255, 255, 255, 0.5);
}
.cal td a:hover, .cal td.off a {
  background: #f3f3f3;
}
.cal td.off a {
  color: #b3b3b3;
}
.cal td.active a, .cal td a:active {
  margin: -1px;
  color: #f3f3f3;
  text-shadow: 0 1px rgba(0, 0, 0, 0.3);
  background: #6dafbf;
  border: 1px solid #598b94;
  -webkit-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
  box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
}
.cal td.active:first-child a, .cal td:first-child a:active {
  border-left: 0;
  margin-left: 0;
}
.cal td.active:last-child a, .cal td:last-child a:active {
  border-right: 0;
  margin-right: 0;
}
.cal tr:last-child td.active a, .cal tr:last-child td a:active {
  border-bottom: 0;
  margin-bottom: 0;
}


</style>
 <script src="jquery.js"></script>
 <script type="text/javascript" src="js/calendar.js"></script>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px;">
				  <img src="images/placement.png" style="width:180px; height:100px;" /><br />
                    	

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=index">Back</a> >>Placement Form</a>
                
    <div style="width:99%; height:20px; border:4px #FFFFFF solid; background-color:#009933">
	<span style=" margin-left:10px; font-size:14px; margin-top:3px;position: absolute;">Fill The Following Details</span>
	<span style="float:right; margin-right:10px;"><a href="./?pageid=view_placement" style="color:#FFFFFF; font-weight:bold; font-size:14px;">Back</a></span></div>
<form action="" method="post" enctype="multipart/form-data">
		
<table border="0" style="margin:20px 0px 0px 20px">
        <tr>
		   <td>Employee Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_name" class="tb5" required></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Father's/Husband's Name</td>
		   <td><input type="text" name="e_fh" class="tb5" required/></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
          <tr>
		   <td>E-mail ID <span style="color:#FF0000">*</span></td>
		   <td><input type="email" name="email" class="tb5" required></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
         <tr>
		   <td>Date Of Birth</td>
		   <td><input type="Text" id="demo1" maxlength="25" name="dob" class="tb5" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			
            <tr>
		   <td>Contact Details<span style="color:#FF0000">*</span></td>
		   <td><input type="number" name="mobile" class="tb5" required/></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>

           <tr>
            <td>Qualification<span style="color:#FF0000">*</span></td>
               <td>
             
             <input type="text" name="e_q" class="tb5" required/>
                </td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
			<tr>
		   <td>Post Applied For</td>
		   <td> <input type="text" name="e_post" class="tb5" required/></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Total Work Experience:<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_exp" class="tb5" required/></td>
		</tr>
		
		 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Subject ( Only for teachers )<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_sub" class="tb5"/></td>
		</tr>
		
		
		 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Present Salary<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_sale" class="tb5" required/></td>
		</tr>
		 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Salary Expected<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_esal" class="tb5"/ required></td>
		</tr>
		 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
		 <tr>
		 <tr>
		   <td>Date Of Submit</td>
		   <td><input class="date-picker" type="text" name="e_d" class="tb5" style="border-radius:4px;height:25px;width:228px;" required /></td>
		</tr>
           
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Upload Resume<span style="color:#FF0000">*</span></td>
		   <td><input type="file" name="e_f" required/></td>
		</tr>
		
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Address</td>
		   <td><textarea name="address" cols="27" rows="3"></textarea></td>
		</tr>
            
			 
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
             <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="submit" value="Submit" style="width:100px"></td>
		</tr>
                        
    </table>
   </form>
   
   
 <?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
   
	
	 $tmp_name = $_FILES['e_f']['tmp_name'];
	 $file_name = $_FILES['e_f']['name'];
	 $ext = end(explode(".", $file_name));
	 $image_name = time().".".$ext;
	 $file_Uploade = move_uploaded_file($tmp_name,"uploads/".$image_name);

$sqlAdd = mysqli_query($con,"insert into resume(e_name,e_fh,mobile,dob,email,e_q,e_post,e_exp,e_sub,e_sale,e_esal,e_d,address,e_f) VALUES
('".$_POST['e_name']."','".$_POST['e_fh']."','".$_POST['mobile']."','".$_POST['dob']."','".$_POST['email']."','".$_POST['e_q']."','".$_POST['e_post']."','".$_POST['e_exp']."','".$_POST['e_sub']."','".$_POST['e_sale']."','".$_POST['e_esal']."','".$_POST['e_d']."','".$_POST['address']."','$image_name')");
   
 echo "Inserted sucessfully";  
}
?>
				    <br /><br />
 
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