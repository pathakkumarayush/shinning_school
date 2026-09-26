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
	<td>&nbsp;&nbsp;Registration No<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="rno" class="tb5" value="<?php echo $rowmax["count(rno)"]+1; ?>" required></td>
	
    <td>&nbsp;&nbsp;STUDENT NAME<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="name" class="tb5" value="<?php echo $rowstud['name']; ?>" required></td>
	</tr>
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>&nbsp;&nbsp;CLASS<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="class" class="tb5" value="<?php echo $rowstud['aclass']; ?>" required></td>
    </td>
    <td>&nbsp;&nbsp;DATE OF BIRTH<span style="color:#FF0000">*</span></td>
    <td><input type="Text" id="demo1" value="<?php echo $rowstud['dob']; ?>" maxlength="25" name="dob" class="tb5" size="25" required>
    <a href="javascript:NewCal('demo1','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>&nbsp;&nbsp;NATIONALITY<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="nat"  class="tb5" required></td>
	<td>&nbsp;&nbsp;GENDER <span style="color:#FF0000">*</span></td>
	<td><input type="radio" name="gender" value="male" checked="checked">Male &nbsp;&nbsp; <input type="radio" name="gender" value="female">Female</td>
	
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>&nbsp;&nbsp;RELIGION<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="rel" class="tb5" required></td>
	<td>&nbsp;&nbsp;ADHAR NO.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="adhar" class="tb5" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633; color:#FFFFFF;">FATHER'S DETAILS</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	 <td>FATHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="fname" class="tb5" value="<?php echo $rowstud['fname']; ?>" required></td>
	
    <td>&nbsp;&nbsp;MOBILE NO.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="fmobile" class="tb5" value="<?php echo $rowstud['mobile']; ?>" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>QUALIFICATION <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="fquli" class="tb5" required></td>
	 <td>&nbsp;&nbsp;OCCUPATION.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="foccu" class="tb5" value="<?php echo $rowstud['fo']; ?>" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>EMAIL ID <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="femail" class="tb5" required></td>
	 <td>&nbsp;&nbsp;</td>
    <td></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633; color:#FFFFFF;">MOTHER'S DETAILS</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	 <td>MOTHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="mname" class="tb5" value="<?php echo $rowstud['mname']; ?>" required></td>
	
    <td>&nbsp;&nbsp;MOBILE NO.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="mmobile" class="tb5" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>QUALIFICATION <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="mquli" class="tb5" required></td>
	 <td>&nbsp;&nbsp;OCCUPATION.<span style="color:#FF0000">*</span></td>
     <td><input type="text" name="moccu" class="tb5"  value="<?php echo $rowstud['mo']; ?>" required></td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr>
	 <td>EMAIL ID <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="memail" class="tb5" required></td>
	 <td>&nbsp;&nbsp;</td>
    <td></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	
	
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633;color:#FFFFFF; text-transform:uppercase;">Correspondence Address</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	 <td>&nbsp;&nbsp;ADDRESS,(HOUSE <BR />BUILDING NO)<span style="color:#FF0000">*</span></td>
	 <td><textarea name="address" cols="23" rows="2"><?php echo $rowstud['address']; ?></textarea></td>
	 <td>&nbsp;&nbsp;LOCALITY/TOWN<span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="lt" class="tb5" value="<?php echo $rowstud['lt']; ?>" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>&nbsp;&nbsp;CITY<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="city" class="tb5" value="<?php echo $rowstud['city']; ?>" required></td>
	 <td>&nbsp;&nbsp;STATE<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="st" class="tb5" value="<?php echo $rowstud['st']; ?>" required></td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr>
	  <td>&nbsp;&nbsp;PIN CODE.<span style="color:#FF0000">*</span></td>
      <td><input type="text" name="pn" class="tb5" value="<?php echo $rowstud['pn']; ?>" required></td>
	 <td>&nbsp;&nbsp;</td>
    <td></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	  <tr>
	  <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td>
     <td style="font-size:16px"><input type="submit" name="submit" value="Proceed To Payment" style="font-size:16px"></td>
	
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
	 ('".$_POST['rno']."','".$_POST['name']."','".$_POST['class']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['rel']."','".$_POST['nat']."','".$_POST['adhar']."','".$_POST['fname']."','".$_POST['fmobile']."','".$_POST['fquli']."','".$_POST['foccu']."','".$_POST['femail']."','".$_POST['mname']."','".$_POST['mmobile']."','".$_POST['mquli']."','".$_POST['moccu']."','".$_POST['memail']."','".$_POST['address']."','".$_POST['lt']."','".$_POST['city']."','".$_POST['st']."','".$_POST['pn']."','$da','".$_SESSION['session']."') ");
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
		
  
  