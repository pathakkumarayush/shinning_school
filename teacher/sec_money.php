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
	border-radius:4px;
	width:221px;
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

</style>
<?php
require_once("../db.php");

if(isset($_POST['Submit']))
{
$query=mysqli_query($con,"insert into sec_mony(teacher,amt,date,month) values('".$_POST['tid']."','".$_POST['amt']."','".$_POST['date']."','".$_POST['month']."')");
}

?>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="../school/images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Security Salary Details</h2>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">


<h2><b>Security Money Details</b></h2>		 
</div>

<form method="post" action="">
<table style="margin-left:10px; margin-top:20px;">
<tr>
<td>Teacher Name&nbsp;</td>
<td><select class="tb6 select" name="tid" >
<option>Select Staff</option>
<?php
$teacher=mysqli_query($con,"select * from teacher ");
while($row=mysqli_fetch_array($teacher))
{
?>
<option value="<?php echo $row['teacher_id'];  ?>"><?php echo $row['teacher_name'];  ?></option>
<?php
}
?>
</select> 
</td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td></td><td></td></tr>
<tr>
<td>Amount</td>
<td>  <input name="amt" id="demo2" type="text" class="tb5"  size="40" /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td >Date <span style="color:#FF0000">*</span></td>
<td> <input name="date" id="demo1" type="text" class="tb5"  />
<a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>Month</td>
<td> <select name="month"  class="tb6 select">
<option value="-1">Select Month</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
</select>
</td> </tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td></td>
<td><input type="submit" name="Submit" value="Submit" style="width:150px" /></td>

</tr>
</table>
</form>
<br /><br />
<div style="width:80%; overflow:scroll; border:14px #009933 solid; height:1000px;">
<table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
<tr style="background-color:#009933; line-height:32px; color: #FFFFFF; font-size:16px; font-weight:bold;" align="center">
<td>Sr No.</td><td>Staff Name</td><td>Deposit Amount</td>
</tr>
<?php
$qry="select * from teacher";
$i=1;
$result=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($result))
{
?>
<tr align="center" style="font-weight:bold; line-height:25px;">
<td><?php echo $i; ?></td>
<td><?php echo $row['teacher_name'];?></td>
<td>
<?php 
$adsec=mysqli_query($con,"select teacher,sum(dect) from teacher_sal where teacher='".$row['teacher_id']."' ");
$adrowsec=mysqli_fetch_array($adsec);
$salamt =  $adrowsec['sum(dect)'];
?>
<?php 
$adva=mysqli_query($con,"select teacher,sum(amt),sum(date) from sec_mony where teacher='".$row['teacher_id']."' ");
$adrow=mysqli_fetch_array($adva);
$secamt =  $adrow['sum(amt)'];
echo $totsecmony =  $salamt+$secamt;
?>
</td>
</tr>


<?php
$i++;
}
?>
</table>
</div>               
                 
<!-- Box Head -->
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>				