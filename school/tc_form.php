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
	width:280px;
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


#myform{ font-size:16px; padding:20px; margin-left:50px;}
</style>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<?php
$_SESSION['id']=$_GET['tid'];
$search=mysqli_query($con,"select * from student where student_id='".$_GET['tid']."' and student_session='".$_SESSION['session']."'");
$studrow=mysqli_fetch_array($search);


?>


<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/TC.png" width="500PX"/><a href="./?pageid=current_student">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student T.C Form</h2>
</div>
<div class="col_4">
<div class="form-style-2-heading">Provide your information
<?php 
if(isset($_POST['submit']))
{
$d=date("Y-m-d");
$res_ins=mysqli_query($con,"insert into tc(tc1,tc2,tc3,tc4,tc5,tc6,tc7,tc8,tc9,tc10,tc11,tc12,tc13,tc14,tc15,tc16,tc17,tc18,session,tc19,tc20)values ('".$_POST["tc1"]."','".$_POST["tc2"]."','".$_POST["tc3"]."','".$_POST["tc4"]."','".$_POST["tc5"]."','".$_POST["tc6"]."','".$_POST["tc7"]."','".$_POST["tc8"]."','".$_POST["tc9"]."','".$_POST["tc10"]."','".$_POST["tc11"]."','".$_POST["tc12"]."','".$_POST["tc13"]."','".$_POST["tc14"]."','".$_POST["tc15"]."','".$_POST["tc16"]."','".$_POST["tc17"]."','".$_POST["tc18"]."','".$_SESSION['session']."','".$_POST["tc19"]."','".$_POST["tc20"]."')");
$insertid=mysqli_insert_id($con);

$query=mysqli_query($con,"update student set status='1',tcdate='$d' where student_id='".$_POST['tc4']."' and student_session='".$_SESSION['session']."'");	
?>


<script type="text/javascript">
alert('Insert Successfully')
window.location="<?php echo $var."tc_forms&sid=$insertid";  ?>";
</script>  


<?php
}
?>
</div>
                  <?php if(!empty($msg))
		          {
			      ?>
                  <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		          <?php echo $msg; ?> 
		          </div>
                  <?php
                  }
	              ?>
				  <?php
if(!empty($insertid))
{
?>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/jyoti/school/get_tc.php?id=<?php echo $_SESSION['id']; ?>')">
<input type="button" value="Generate TC" style="width:200px; margin-left:0px; margin-top:15px">
</a>
</td>
<?php
}
?>
  <form action="" method="post" enctype="multipart/form-data">
  <table style="margin-left:20px;"> 
  
  <tr>
 

<?php
$maxid=mysqli_query($con,"select * from tc order by id desc limit 1");
$maxrow=mysqli_fetch_array($maxid);
?>
  <td style="font-size:14px">&nbsp; TC No. *<br />
 
  <input name="tc1" type="text" id="txtname" class="tb5" value="<?php echo $maxrow['id']+1; ?>" /> </td>
   <td style="font-size:14px">&nbspAdmission No   <br />
  <input name="tc2" type="text" id="txtname" class="tb5" value="<?php echo $studrow['student_scholar']; ?>"/></td>
  
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  <tr>
  <td style="font-size:14px; font-weight:">&nbsp;This is to certify that Mast./Miss<br />
   <input name="tc3" type="text" id="txtname" class="tb5" value="<?php echo $studrow['student_name']; ?>"/>
   <input name="tc4" type="hidden" id="txtname" class="tb5" value="<?php echo $studrow['student_id']; ?>"/>
   <input name="tc5" type="hidden" id="txtname" class="tb5" value="<?php echo $studrow['student_class']; ?>"/>
   </td>
  
  <td style="font-size:14px">&nbspFather's Name <br />
  <input name="tc6" type="text" id="txtname"   class="tb5" value="<?php echo $studrow['student_fname']; ?>"/></td>
   
   <td style="font-size:14px">&nbspMother's Name <br />
  <input name="tc12" type="text" id="txtname"   class="tb5" value="<?php echo $studrow['m_name']; ?>"/></td>
  
   
 
  
  </tr>
  
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
   <td style="font-size:14px">&nbspAttended school from<br />
  <input name="tc8" type="text" id="txtname" class="tb5" value="<?php $doa = $studrow['student_doj']; echo $doa;  ?>"/>
  <td style="font-size:14px; font-weight:">&nbsp;To<br />
  <input name="tc9" type="text" id="txtname" class="tb5" /></td>
  <td style="font-size:14px">&nbspAnd now leaves on                <br />
  <input name="tc10" type="text" id="txtname"  class="tb5"/></td>
  
   </td>
  </tr>
  
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
   <td style="font-size:14px; font-weight:">&nbsp;His/her DOB according to school register is: <br />
   <input name="tc11" type="text" id="txtname"  class="tb5" value="<?php echo $studrow['student_dob']; ?>" /></td>
  
  <td style="font-size:14px">&nbspCaste/Category   <br />
  <input name="tc7" type="text" id="txtname" class="tb5" value="<?php echo $studrow['caste']; ?>"/></td>
  
 <td style="font-size:14px; font-weight:">&nbsp;The last promotion examination passed by him/her was that of class <br />
 <input name="tc20" type="text" id="txtname"  class="tb5" style="width:120px;" placeholder="Passed/Failed"/>
  <input name="tc13" type="text" id="txtname"  class="tb5" style="width:120px;" placeholder="Class"/>
  
  </td>
 
 
  </td>
  </tr>
 
   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
   <tr>
   <td style="font-size:14px; font-weight:">&nbsp;in the year<br />
   <input name="tc14" type="text" id="txtname" value="<?php echo $studrow['dproof']; ?>" class="tb5"  /></td>
    
	<td style="font-size:14px; font-weight:">&nbsp;He/She Was admitted in class<br />
    <input name="tc15" type="text" id="txtname" class="tb5"  /></td>
  
   <td style="font-size:14px; font-weight:">&nbsp;His/Her conduct was <br />
   <input name="tc16" type="text" id="txtname" class="tb5"  /></td>
   </tr>
  
 
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  
  
   
   
   <td style="font-size:14px;">&nbspSSSM ID <br />
  <input name="tc17" type="text" id="txtname" value="<?php echo $studrow['religion']; ?>" class="tb5"/></td>
  
  <td style="font-size:14px">&nbspDate of issue of certificate *<br />
   <input name="tc18" type="text" id="txtname" class="tb5" /></td>
   
   <td style="font-size:14px">&nbsp;Gender *<br />
   <input name="tc19" type="text" id="txtname" class="tb5" value="<?php echo $studrow['student_gender']; ?>"/></td>
  </tr>
 
    
 
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
 
  
  <tr>
  <td colspan="3">
  <input type="submit" name="submit" value="Submit Form">
  </td>
  </tr>
  </table>
  </form>
	   <br clear="all" />
	   <br clear="all" />
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   