<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}


.form-style-2-heading{
    font-weight: bold;
    font-style: normal;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type="email"]:focus,
input[type="email"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
    background: #1e4a1b;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	font-weight:bold;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #1e4a1b;
    color: #fff;
}

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/place.png" /><a href="./?pageid=fron_desk">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teacher Placement</h2></center>
</div>
<div class="col_4">
<div class="form-style-2-heading">Provide your information</div>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Record")) { 
        return false;
    }
    }
</script> 
<?php
if(!empty($_GET['did']))
{
$query=mysqli_query($con,"delete from resume where id='".$_GET['did']."'");	
}

?>


<?php
ob_start(); // Prevents early output from breaking header redirect
if(isset($_POST['submit']))
{    
  
	
	 $tmp_name = $_FILES['e_f']['tmp_name'];
	 $file_name = $_FILES['e_f']['name'];
	 $ext = end(explode(".", $file_name));
	 $image_name = time().".".$ext;
	 $file_Uploade = move_uploaded_file($tmp_name,"uploads/".$image_name);

$sqlAdd = mysqli_query($con,"insert into resume(e_name,e_fh,mobile,dob,email,e_q,e_post,e_exp,e_sub,e_sale,e_esal,e_d,address,e_f,po,ses,gender) VALUES
('".$_POST['e_name']."','".$_POST['e_fh']."','".$_POST['mobile']."','".$_POST['dob']."','".$_POST['email']."','".$_POST['e_q']."','".$_POST['e_post']."','".$_POST['e_exp']."','".$_POST['e_sub']."','".$_POST['e_sale']."','".$_POST['e_esal']."','".$_POST['e_d']."','".$_POST['address']."','$image_name','".$_POST['po']."','".$_SESSION['session']."','".$_POST['gender']."')");
   
  echo '<script>
         window.location.href = "https://smarterponline.com/shining/school/?pageid=placement&success_modal=1";
    </script>';
	
}
?>

<?php if (isset($_GET['success_modal']) && $_GET['success_modal'] == 1): ?>
  <script>
    window.onload = function () {
      swal({
        title: "Placement Created Successfully",
        text: "Thank you",
        icon: "success"
      }).then(() => {
        window.location.href = "https://smarterponline.com/shining/school/?pageid=placement"; // clean URL
      });
    };
  </script>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
		
<table border="0" style="margin:20px 0px 0px 20px">
        <tr>
		   <td>Employee Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_name" class="tb5" required></td>
		    <td>&nbsp;&nbsp;Father's/Husband's Name <span style="color:#FF0000">*</span></td>
			<td><input type="text" name="e_fh" class="tb5" required/></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		 <tr>
		   <td>E-mail ID  <span style="color:#FF0000">*</span></td>
		   <td><input type="email" name="email" class="tb5" required></td>
		    <td>&nbsp;&nbsp;Date Of Birth <span style="color:#FF0000">*</span></td>
			<td><input type="Text" id="demo1" maxlength="25" name="dob" class="tb5" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr>
		   <td>Contact Details<span style="color:#FF0000">*</span></td>
		   <td><input type="number" name="mobile" class="tb5" required/></td>
		    <td>&nbsp;&nbsp;Qualification <span style="color:#FF0000">*</span></td>
			<td> <input type="text" name="e_q" class="tb5" required/></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr>
		   <td>Post Applied For<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_post" class="tb5" required/></td>
		    <td>&nbsp;&nbsp;Total Work Experience:<span style="color:#FF0000">*</span></td>
			<td> <input type="text" name="e_exp" class="tb5" required/></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr>
		   <td>Subject(Only for teachers)<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_sub" class="tb5"/></td>
		    <td>&nbsp;&nbsp;Present Salary<span style="color:#FF0000">*</span></td>
			<td> <input type="text" name="e_sale" class="tb5" required/></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr>
		   <td>Salary Expected<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="e_esal" class="tb5"/ required></td>
		    <td>&nbsp;&nbsp;Date Of Submit<span style="color:#FF0000">*</span></td>
			<td> <input type="Text" id="demo2" maxlength="25" name="e_d" class="tb5" size="25">
			<a href="javascript:NewCal('demo2','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr>
		   <td>Previous Organization<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="po" class="tb5"/></td>
		   
		    <td>&nbsp;&nbsp;Address<span style="color:#FF0000">*</span></td>
			<td> <textarea name="address" cols="23" rows="2"></textarea></td>
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		
		<tr>
		   
		   <td>Gender<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="gender" class="tb5"/></td>
		   
		   <td>Upload Resume<span style="color:#FF0000">*</span></td>
		   <td><input type="file" name="e_f"/></td>
		  
		   
		  
		  
		</tr>
		
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		
		<tr>
		   <td></td>
		   <td></td>
		   <td> </td>
		    <td><input type="submit" name="submit" value="Submit" style="width:100px"></td>
			
		</tr>
</table>		



</form>
<div class="form-style-2-heading"></div>
<div class="form-style-2-heading">Placement Details</div>

<table class="table table-bordered" id="sample_1" style="font-size:12px;width:1000px;">
              <thead style="background-color:#009933; color:#FFFFFF">
              <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Name</th>
                  <th>Father/Husband Name</th>
                  <th>Mobile</th>
                  <th>Gender</th>
                  <th>D.O.B</th>
                  <th style="width:50px;">Qualification</th>
                  <th>Post Applied For</th>
                  <th>Total Work Experience:</th>
				  <th>Subject</th>
                  <th>Present Salary</th>
                  <th>Salary Expected</th>
				  <th>Date Of Submit</th>
                  <th>AddresSs</th>
				  <th>View</th>
				  <th>Action</th>
              </tr>
			  
			  
              </thead>
			  
              <tbody>
			  <?php
	$sql=mysqli_query($con,"SELECT * FROM resume");
	$i=1;
	while($row=mysqli_fetch_array($sql))
	{
		?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['e_name'] ?></td>
                  <td><?php echo $row['e_fh'] ?></td>
                  <td class="center "><?php echo $row['mobile'] ?></td>
                  <td class="center "><?php echo $row['gender'] ?></td>
				  <td><?php echo $row['dob'] ?></td>
                  <td><?php echo $row['e_q'] ?></td>
                  <td class="center"><?php echo $row['e_post'] ?></td>
                  <td><?php echo $row['e_exp'] ?></td>
				  <td><?php echo $row['e_sub'] ?></td>
                  <td><?php echo $row['e_sale'] ?></td>
                  <td class="center "><?php echo $row['e_esal'] ?></td>
				   <td><?php echo $row['e_d'] ?></td>
                  <td><?php echo $row['address'] ?></td>
				  <td><a href="uploads/<?php echo $row['e_f'] ?>" target="_blank">view file</a></td>
				  
				  <td><a href="<?php echo $var."placement&did=".$row['id']; ?>" onClick="return confirmation();">Delete</a></td>
              </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>