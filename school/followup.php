<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>
jQuery(function($){
  $('#from').datepicker({ dateFormat: 'yy-mm-dd' });
  $('#to').datepicker({ dateFormat: 'yy-mm-dd' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
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
     background: #1e4a1b;
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
<div class="left_sect"><img src="images/frontdesk/front desk home.png" />
<a href="./?pageid=fu">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:50px; height:40px; margin-left:5px; margin-top:2px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Follow up Form</h2></center>
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
	<td>&nbsp;&nbsp;ENQUIRY NO<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="eno" class="tb5" value="<?php echo $rowstud['id']; ?>" readonly="readonly" required></td>
	
    <td>&nbsp;&nbsp;STUDENT NAME<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="name" class="tb5" value="<?php echo $rowstud['name']; ?>" readonly="readonly" required></td>
	</tr>
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>&nbsp;&nbsp;CLASS APPLIED<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="class" class="tb5" value="<?php echo $rowstud['aclass']; ?>" readonly="readonly" required></td>
    </td>
    <td>&nbsp;&nbsp;DATE OF BIRTH<span style="color:#FF0000">*</span></td>
    <td><input type="Text" id="demo1" value="<?php echo $rowstud['dob']; ?>" readonly="readonly" name="dob" class="tb5" size="25" required>
    </td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> 
	<td>&nbsp;&nbsp;GENDER <span style="color:#FF0000">*</span></td>
	<td><input type="radio" name="gender" value="male" checked="checked">Male &nbsp;&nbsp; <input type="radio" name="gender" value="female">Female</td>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633; color:#FFFFFF;">PARENTS DETAILS</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	 <td>FATHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="fname" class="tb5" value="<?php echo $rowstud['fname']; ?>" readonly="readonly" required></td>
	
     <td>&nbsp;&nbsp;MOTHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="mname" class="tb5" value="<?php echo $rowstud['mname']; ?>" readonly="readonly" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
    <td>MOBILE NO.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="fmobile" class="tb5" value="<?php echo $rowstud['mobile']; ?>" readonly="readonly" required></td>
    <td>&nbsp;&nbsp;MOBILE NO.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="mmobile" class="tb5" readonly="readonly" required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>OCCUPATION.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="foccu" class="tb5" value="<?php echo $rowstud['fo']; ?>"  readonly="readonly" required></td>
	<td>&nbsp;&nbsp;OCCUPATION.<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="moccu" class="tb5"  value="<?php echo $rowstud['mo']; ?>" readonly="readonly"  required></td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>

	
	
	<div class="form-style-2-heading" style="font-style:normal; background-color:#006633;color:#FFFFFF; text-transform:uppercase;">follow up details</div>
	<table border="0" style="margin:20px 0px 0px 40px; width:750PX;">
    <tr>
	 <td>DATE<span style="color:#FF0000">*</span></td>
	 <td>
	
	 <input required name="from" type="text"  readonly id="from" style=" width:200px;" class="tb5">
       <a href="javascript:" id="date_from_btn">
	 </td>
	
	 <td>&nbsp;&nbsp;DESCRIPTION<BR />(CONVERSATION)<span style="color:#FF0000">*</span></td>
	 <td><textarea name="decs" cols="23" rows="2" ><?php //echo $rowstud['address']; ?></textarea></td>
	 
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	<td>MODE OF FOLLOW UP<span style="color:#FF0000">*</span></td>
     <td><select name="mof" class="select" id="ddlPassport" required/>
	<option value="">Select Mode</option>
	<option value="Phone Call">Phone Call</option>
	<option value="Message">Message</option>
	<option value="Email">Email</option>
	<option value="Other">Other</option>
	</select></td>
	
	<td>&nbsp;&nbsp;STATUS<span style="color:#FF0000">*</span></td>
	<td>
	<select name="status" class="select" required/>
	<option value="">Select Status</option>
	<option value="Open">Open</option>
	<option value="Closed">Closed</option>
	</select>
	</td>
	</tr>
	
	<tr id="dvPassport" style="display: none">
	<td>REMARK<span style="color:#FF0000">*</span></td>
    <td colspan="3">
	
        <input type="text" id="txtPassportNumber" name="ork" class="tb5"/>
    </td>
	
	</tr>
	
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr>
	 
	 <td>NEXT FOLLOW UP <BR />DATE<span style="color:#FF0000">*</span></td>
     <td>
	
	 
	 <input type="text" name="to" id="to" placeholder='Date' required/>
	<a href="javascript:" id="date_from_btn"></a>
	 </td>
	 <td>&nbsp;&nbsp;REMARK<span style="color:#FF0000">*</span></td>
	 <td><textarea name="rmk" cols="23" rows="2"><?php //echo $rowstud['address']; ?></textarea></td>
	 
	 </tr>
	</tr>
	 
	  <tr>
	 <td></td>
	 <td class="3"><input type="checkbox" value="agree"  name="agree" required/>&nbsp;I Agree</td>
    
	 
	 </tr>
	
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
    <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td>
    <td style="font-size:16px"><input type="submit" name="submit" value="Submit" style="font-size:16px"></td>
	
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

   <script type="text/javascript">
        $(function () {
            $("#ddlPassport").change(function () {
                if ($(this).val() == "Other") {
                    $("#dvPassport").show();
                } else {
                    $("#dvPassport").hide();
                }
            });
        });
    </script>
    <?php
	 if(isset($_POST['submit']))
     {
	 $da = date("d-m-Y");
	 $res_up=mysqli_query($con,"update enquiry set follow='1' where id='".$_GET["id"]."' ");
	 $query=mysqli_query($con,"insert into follow_up(eno,name,fname,mname,dob,class,gender,fmobile,mmobile,foccu,moccu,date,decs,ndate,status,mof,rmk,ork)values
	 ('".$_POST['eno']."','".$_POST['name']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['dob']."','".$_POST['class']."','".$_POST['gender']."','".$_POST['fmobile']."','".$_POST['mmobile']."','".$_POST['foccu']."','".$_POST['moccu']."','".$_POST['from']."','".$_POST['decs']."','".$_POST['to']."','".$_POST['status']."','".$_POST['mof']."','".$_POST['rmk']."','".$_POST['ork']."') ");
	 ?>
	
	            <script>
		        alert('Successfully Submit');
                window.location.href='https://smarterponline.com/shining/school/?pageid=fu';
                </script>
	
	<?php
	}
	?>
		
  
  