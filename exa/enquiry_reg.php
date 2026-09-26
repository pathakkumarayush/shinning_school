<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:9px; float:left; margin-top:10px;}
.col_4{ width:40%; height:1150px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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

input[type="text"] {
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
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=venq">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Registration Form</h2></center>
</div>
<?php
$res_stud=mysqli_query($con,"select * from enquiry where id='".$_GET["id"]."' ")or die(mysqli_error());
$rowstud=mysqli_fetch_array($res_stud);
?>
<div class="col_6">
<div class="form-style-2-heading" style="font-style:normal; background-color:#006633; color:#FFFFFF;">STUDENT DETAILS</div>
<form method="post" name="myForm" action="#" enctype="multipart/form-data" style="font-weight:bold;"  onsubmit="return(validate());">
    <table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	  <?php
	   $maxid=mysqli_query($con,"select count(rno) from reg");
	   $rowmax=mysqli_fetch_array($maxid);
	   ?>
	<td>Registration No</td>
    <td><input type="text" name="rno" class="tb5" value="<?php echo $rowmax["count(rno)"]+1; ?>"  readonly="readonly" ></td>
	
    <td>&nbsp;&nbsp;STUDENT NAME</td>
    <td><input type="text" name="name" class="tb5" value="<?php echo $rowstud['name']; ?>" readonly="readonly" ></td>
	</tr>
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>CLASS APPLIED</td>
    <td><input type="text" name="class" class="tb5" value="<?php echo $rowstud['aclass']; ?>" readonly="readonly"></td>
    </td>
    <td>&nbsp;&nbsp;DATE OF BIRTH</td>
    <td><input type="Text" id="demo1" value="<?php echo $rowstud['dob']; ?>" readonly="readonly" maxlength="25" name="dob" class="tb5" size="25" required>
    </td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>GENDER </td>
	<td><input type="radio" name="gender" value="male" checked="checked" readonly="readonly">Male &nbsp;&nbsp; <input type="radio" name="gender" value="female">Female</td>
	<td>&nbsp;&nbsp;Class Passed</td> <td><input type="text" name="subject" class="tb5" value="<?php echo $rowstud['pclass']; ?>" readonly="readonly"></td> 
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>Previous school</td> 
	<td><input type="text" name="prev_school" class="tb5" value="<?php echo $rowstud['percentage']; ?>" readonly="readonly"></td> 
	
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633; color:#FFFFFF;">PARENT'S DETAILS</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	<td>FATHER'S NAME </td>
	<td><input type="text" name="fname" class="tb5" value="<?php echo $rowstud['fname']; ?>" readonly="readonly" ></td>
	<td>&nbsp;&nbsp;MOTHER'S NAME </td>
	<td><input type="text" name="mname" class="tb5" value="<?php echo $rowstud['mname']; ?>" readonly="readonly" ></td>
    
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>OCCUPATION</td>
    <td><input type="text" name="foccu" class="tb5" value="<?php echo $rowstud['fo']; ?>" readonly="readonly" required></td>
	<td>&nbsp;&nbsp;OCCUPATION</td>
    <td><input type="text" name="moccu" class="tb5"  value="<?php echo $rowstud['mo']; ?>" readonly="readonly" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>MOBILE NO.</td>
    <td><input type="text" name="fmobile" class="tb5" value="<?php echo $rowstud['mobile']; ?>" readonly="readonly" </td>
	<td>&nbsp;&nbsp;MOBILE NO.</td>
    <td><input type="text" name="mmobile" class="tb5" readonly="readonly"></td>
	 <td>&nbsp;&nbsp;</td>
    <td></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633;color:#FFFFFF; text-transform:uppercase;">Correspondence Address</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	 <td>ADDRESS,(HOUSE <BR />BUILDING NO)</td>
	 <td><textarea name="address" cols="23" rows="2" readonly="readonly"><?php echo $rowstud['address']; ?></textarea></td>
	 <td>&nbsp;&nbsp;LOCALITY/TOWN</td>
	 <td><input type="text" name="lt" class="tb5" value="<?php echo $rowstud['lt']; ?>" readonly="readonly"></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>CITY</td>
    <td><input type="text" name="city" class="tb5" value="<?php echo $rowstud['city']; ?>" readonly="readonly" ></td>
	 <td>&nbsp;&nbsp;STATE</td>
    <td><input type="text" name="st" class="tb5" value="<?php echo $rowstud['st']; ?>" readonly="readonly"  ></td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr>
	  <td>PIN CODE.</td>
      <td><input type="text" name="pn" class="tb5" value="<?php echo $rowstud['pn']; ?>" readonly="readonly"></td>
	 <td></td>
	 <td class="3"><input type="checkbox" value="agree"  name="agree" required/>&nbsp;I Agree</td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td style="font-size:16px"></td>
	<td><input type="submit" name="submit" value="Proceed To Payment" style="font-size:16px"></td>
    <td style="font-size:16px"></td>
	
    <td></td>
	</tr>
	
	</table>
	
	
	
	</form>
	
	
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

   
    <?php
	 if(isset($_POST['submit']))
     {
	 $da = date("d-m-Y");
	 $res_up=mysqli_query($con,"update enquiry set status='1' where id='".$_GET["id"]."' ");
	 $query=mysqli_query($con,"insert into reg(rno,student_name,student_class,student_dob,student_gender,religion,nat,adhar,student_fname,fmobile,fquli,foccu,femail,m_name,mmobile,
	 mquli,moccu,memail,address,lt,city,state,pinc,date,session)values
	 ('".$_POST['rno']."','".$_POST['name']."','".$_POST['class']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['prev_school']."','".$_POST['subject']."','".$_POST['adhar']."','".$_POST['fname']."','".$_POST['fmobile']."','".$_POST['fquli']."','".$_POST['foccu']."','".$_POST['femail']."','".$_POST['mname']."','".$_POST['mmobile']."','".$_POST['mquli']."','".$_POST['moccu']."','".$_POST['memail']."','".$_POST['address']."','".$_POST['lt']."','".$_POST['city']."','".$_POST['st']."','".$_POST['pn']."','$da','".$_SESSION['session']."') ");
	$msg1="Inserted Successfully";
	
	$_SESSION['id']=mysqli_insert_id();
	?>
	
	            <script>
		        alert('Proceed To Payment Page');
                window.location.href='https://smarterponline.com/shining/school/?pageid=regfee';
                </script>
	
	<?php
	}
	
	?>
		
  
  