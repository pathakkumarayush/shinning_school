<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<?php
   if(isset($_POST['submit']))
     {
	   $dt2=date("Y-m-d");
	   $dt4=date("H:i:s");
	 
	   if(empty($_POST['name']) || empty($_POST['fname']) || empty($_POST['mobile']))
	   {
	     $error_msg="field marked with * are mandatory";
	   }
	   if(empty($error_msg))
	   {
	   
	   $query=mysqli_query($con,"insert into enquiry_pass(name,fname,mname,dob,aclass,pclass,percentage,mobile,address,gender,session,city,school,rmkm,rmkw) values('".$_POST['name']."','".$_POST['fname']."','".$_POST['mname']."','$dt2','".$_POST['class']."','$dt4','".$_POST['per']."','".$_POST['mobile']."','".$_POST['address']."','".$_POST['gender']."','".$_SESSION['session']."','".$_POST['city']."','".$_SESSION['uid']."','".$_POST['rmkm']."','".$_POST['rmkw']."') ");
	$msg1="Inserted Successfully";
	    
	

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
    font-style: italic;
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
    background: #FF8500;
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
    background: #EA7B00;
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
<div class="left_sect"><img src="images/g_pass.png" /><a href="./?pageid=get_pass_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/gp.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=enquiry_pass" style="text-decoration:none">Create Get Pass</a>&nbsp;||&nbsp;
 <a href="./?pageid=enquiry_passs" style="text-decoration:none">Parents Get Pass</a></h2>
 
</div>
<div class="col_4" style="margin-top:0px; ">

			
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
             if(!empty($msg1))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg1;   ?></div>
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
		   <td>Visitor Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="name" class="tb5" required></td>
	       </tr>
            
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
           <tr>
		   <td>Meeting Purpose<span style="color:#FF0000">*</span></td>
		   <td>
		    <select name="fname" id="session" class="select" style="width:219px;" required>
	        <option value="">Select</option>
			<option value="Admission">Admission</option>
			<option value="Enquiry">Enquiry</option>
			<option value="Other">Other</option>
            </select>
		   <input type="text" name="rmkm" class="tb5" placeholder='Remark'/>
		   </td>
	    	</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
         <tr>
		   <td>Meet with<span style="color:#FF0000">*</span></td>
		   <td>
		    <select name="mname" id="session" class="select" style="width:219px;" required>
	        <option value="">Select</option>
			<option value="Principal">Principal </option>
			<option value="Director">Director </option>
			<option value="Front Desk">Front Desk</option>
			<option value="Other">Other</option>
            </select>
		   <input type="text" name="rmkw" class="tb5" placeholder='Remark'/>
		   </td>
		</tr>
           
           
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Mobile<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="mobile" class="tb5" required></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Address</td>
		   <td><textarea name="address" cols="30" rows="2"></textarea></td>
		</tr>
		<tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
          <tr>
			<td>Vehicle</td>
			<td>
			  <label for="chkYes">
               <input type="radio" id="chkYes" name="gender" onclick="ShowHideDiv()" value="Yes" />
                Yes
                      </label>
               <label for="chkNo">
              <input type="radio" id="chkNo" name="gender" onclick="ShowHideDiv()"  value="No"/>
                 No
                </label>
                </td>
                </tr>
		    <tr>
				<td></td>
				<td>
            <div id="dvPassport" style="display: none; position:absolute">
                Vehicle Details<br />
              
			   <select name="class" class="tb5" placeholder='ghfg'>
			   <option value="Select Vehicle Type"></option>
			   <option value="two wheeler">Two Wheeler</option>
			   <option value="four wheeler">Four Wheeler</option>
			   </select>
			   
			    <input type="text" id="txtPassportNumber" name="city" placeholder='Enter Vehicle No' style="margin-top:5px;" class="tb5"/><br />
             </div>
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
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
             <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="submit" value="Submit" style="width:100px"></td>
		</tr>
                        
    </table>
      
     
         
             
         
                 
                   </form>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					 <br><br>
                       <div class="box-head">
						<h2 class="left">Currently Available Record</h2>
						</div>
					
					<div class="table" style="border:#FF0000 0px solid; height:300px; overflow:scroll; margin-top:-30px;">
          
          
	<table class="table" border="1" cellpadding="0" cellspacing="0">
           
            <tr style="background-color: #009933">
              <th>Visitor Name</th>
			  <th>Meeting Purpose</th>
			  <th>Meet With</th>
              <th>Mobile</th>
			  <th>Address</th>
			  <th>Vehicle</th>
              <th>Vehicle Type</th>
			  <th>Vehicle No</th>
			  <th>Enter Date</th>
			  <th>Enter Time</th>
			 
			  <th>Out Date Time</th>
			   <th>Possition</th>
             
              <th class="action">Action</th>
            </tr>
<?php

$sql = "select * from  enquiry_pass order by id desc limit 5";

$res = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($res)){
$status=$row['status'];
$id=$row['id']
?>
<tr>
<td style="display:none"><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['mname']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['aclass']; ?></td>
<td><?php echo $row['city']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['pclass']; ?></td>
<td><?php echo $row['percentage']; ?></td>
<td class="center">
									
									
								  <?php
                                   if(($status)=='1')
                                   {
                                   ?>
								  <div style="width:33px; border-radius:20px; font-size:13px; line-height:30px; background-color:#339933">
<a style="text-decoration:none; color:#FFFFFF" href="action.php?status=<?php echo $row['id'];?>" class="act" onClick="return confirm('<?php echo $row['name']; ?>');">
&nbsp;Out</a>
                                  </div>
								   <?php
                                     }
                                   if(($status)=='0')
                                    {
                                    ?>
								<div style="width:33px; border-radius:20px;font-size:13px; line-height:30px; background-color:#ff0000">
<a style="text-decoration:none; color:#FFFFFF " href="action.php?status=<?php echo $row['id'];?>" class="deact" onClick="return confirm('Out <?php echo $row['name']; ?>');"> &nbsp;&nbsp;In</a>
                                  </div>
								    <?php
                                     }
                                    ?>
								</td>

<td style="width:80px;"> 
 <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/print_pass.php?id=<?php echo $row['id']; ?>')">
 <input type="button" value="Print" style="width:100px;"></a> </td>
</tr>
<?php } ?>
</table>
	
      
	   </div>
			
				<!-- End Box -->
				
							
				</div>
			
 
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>
				
<script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkYes.checked ? "block" : "none";
    }
</script>

