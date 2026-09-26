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
$sid=$_GET['sid'];
$search=mysqli_query($con,"select * from tc where id='$sid' and session='".$_SESSION['session']."'");
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

$res_up=mysqli_query($con,"update tc set sname='".$_POST["sname"]."',mname='".$_POST["mname"]."',fname='".$_POST["fname"]."',dob='".$_POST["dob"]."',dob_word='".$_POST["dob_word"]."',nat='".$_POST["nat"]."',caste='".$_POST["caste"]."',doa_class='".$_POST["doa_class"]."',l_class='".$_POST["l_class"]."',l_word='".$_POST["l_word"]."',s_result='".$_POST["s_result"]."',twice='".$_POST["twice"]."',sub1='".$_POST['sub1']."',sub2='".$_POST['sub2']."',h_class='".$_POST['h_class']."',figher='".$_POST['figher']."',f_word='".$_POST['f_word']."',mont_p='".$_POST['mont_p']."',conce='".$_POST['conce']."',ncc='".$_POST['ncc']."',game='".$_POST['game']."',w_day='".$_POST['w_day']."',p_day='".$_POST['p_day']."',conduct='".$_POST['conduct']."',d_app='".$_POST['d_app']."',d_issue='".$_POST['d_issue']."',struck='".$_POST['struck']."',remark='".$_POST['remark']."',class='".$_POST['class']."',bno='".$_POST['bno']."',slno='".$_POST['slno']."',addno='".$_POST['addno']."',gmic='".$_POST['gmic']."',dproof='".$_POST['dproof']."' where id='$sid'");
	
?>

<script type="text/javascript">
alert('Update Successfully')
window.location="<?php echo $var."tc_forms&sid=$sid";  ?>";
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
				  
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/get_tc.php?id=<?php echo $studrow['sid']; ?>')">
<input type="button" value="Generate TC" style="width:200px; margin-left:0px; margin-top:15px">
</a>

<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/jyoti/school/get_ct.php?id=<?php echo $studrow['sid']; ?>')">
<input type="button" value="Generate CC" style="width:200px; margin-left:0px; margin-top:15px">
</a>
</td>

  <form action="" method="post" enctype="multipart/form-data">
  <table style="margin-left:20px;"> 
  
  <tr>
  
<?php
$maxid=mysqli_query($con,"select * from tc order by id desc limit 1");
$maxrow=mysqli_fetch_array($maxid);
?>
  <td style="font-size:14px">&nbsp;  Sr No. *<br />
  <input name="slno" type="text" id="txtname" class="tb5" value="<?php echo $studrow['slno']; ?>"  required/></td>
   <td style="font-size:14px">&nbsp Admission No  <br />
  <input name="addno" type="text" id="txtname" class="tb5" value="<?php echo $studrow['addno']; ?>"/></td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  <tr>
  <td style="font-size:14px; font-weight:">&nbsp;Name of the student<br />
  <input name="sname" type="text" id="txtname" class="tb5" value="<?php echo $studrow['sname']; ?>" />
   <input name="sid" type="hidden" id="txtname" class="tb5" value="<?php echo $studrow['id']; ?>"/>
   <input name="class" type="hidden" id="txtname" class="tb5" value="<?php echo $studrow['student_class']; ?>"/>
  </td>
   <td style="font-size:14px">&nbspMother's Name   <br />
  <input name="mname" type="text" id="txtname" class="tb5" value="<?php echo $studrow['mname']; ?>" /></td>
  <td style="font-size:14px">&nbspFather's Name <br />
  <input name="fname" type="text" id="txtname"   class="tb5" value="<?php echo $studrow['fname']; ?>" /></td>
  
  </tr>
  
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
  <td style="font-size:14px; font-weight:">&nbsp;Nationality<br />
  <input name="nat" type="text" id="txtname" value="Indian" class="tb5" /></td>
  <td style="font-size:14px">&nbspThe Candidate Belong to (SC/ST/OBC/Gen/EWS) <br />
  <input name="caste" type="text" id="txtname"  class="tb5" value="<?php echo $studrow['caste']; ?>"/></td>
   <td style="font-size:14px">&nbsp Date of first admission in the School With Class<br />
  <input name="doa_class" type="text" id="txtname" class="tb5" value="<?php $doa =  date('d-m-Y', strtotime($studrow['doa_class'])); echo $doa;  ?>"/>
   </td>
  </tr>
  
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
  <td style="font-size:14px; font-weight:">&nbsp; Student admitted in the school on the basis of TC/BC <br />
  <input name="sub2" type="text" id="txtname" class="tb5" value="<?php echo $studrow['sub2']; ?>"/></td>
  <td style="font-size:14px; font-weight:">&nbsp;DOB according to the admission Register (In Fig) <br />
  <input name="dob" type="text" id="txtname"  class="tb5" value="<?php  $dob =  date('d-m-Y', strtotime($studrow['dob'])); echo $dob; ?>"/></td>
  <td style="font-size:14px;">&nbspDOB in words  <br />
  <input name="dob_word" type="text" id="txtname"  class="tb5" value="<?php echo $studrow['dob_word']; ?>"/>
  </td>
  </tr>
  
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  <td style="font-size:14px; font-weight:" colspan="3">&nbsp; Subjects Studied in the last class: <br />
  <input name="sub1" type="text" id="txtname" class="tb5" value="<?php echo $studrow['sub1']; ?>" placeholder='Enter Subjects' style="width:882px;"/>
  
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  <!--<tr>
  
  <td style="font-size:14px;">&nbspProof for d.o.b submitted at the time of admission <br />
  <input name="dproof" type="text" id="txtname" class="tb5"/>
  </td>
  </tr>-->
  
  
  
 
  <tr>
  <td style="font-size:14px; font-weight:">&nbsp;Class in which the student last studied (In words)  <br />
  <input name="l_class" type="text" id="txtname"  value="<?php echo $studrow['l_class']; ?>"  class="tb5" /></td>
   <td style="font-size:14px; font-weight:">&nbsp;Whether the student is failed/ passed.   <br />
  <input name="twice" type="text" id="txtname" value="<?php echo $studrow['twice']; ?>" class="tb5" /></td>
  <td style="font-size:14px; font-weight:">&nbsp;School/Board Annual examination last taken with result   <br />
  <input name="s_result" type="text" id="txtname"  value="<?php echo $studrow['s_result']; ?>" class="tb5" /></td>
 
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
 <!-- <tr>
  <td style="font-size:14px; font-weight:" colspan="3">&nbsp;School/Board Annual Examination last taken with result   <br />
  <input name="s_result" type="text" id="txtname"  class="tb5" style="width:522px;" /></td>
  </tr>-->
  
 
  
  
  <tr>
  <td style="font-size:14px; font-weight:">&nbsp;Whether qualified for promotion to the next class   <br />
  <input name="h_class" type="text" id="txtname"  class="tb5" value="<?php echo $studrow['h_class']; ?>" /></td>
  <td style="font-size:14px; font-weight:">&nbsp; Date of application for Transfer certificate    <br />
  <input name="d_app" type="text" id="txtname" class="tb5" value="<?php echo $studrow['d_app']; ?>" required /></td>
  <td style="font-size:14px;">&nbsp Reasons for issuing the certificate    <br />
  <input name="struck" type="text" id="txtname" value="<?php echo $studrow['struck']; ?>" class="tb5" /></td>
  </tr>
  
  
  
  
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
   
   <tr>
  <td style="font-size:14px; font-weight:">&nbsp;Total number of working days:  <br />
  <input name="w_day" type="text" id="txtname" class="tb5" value="<?php echo $studrow['w_day']; ?>" /></td>
  <td style="font-size:14px;" colspan="2">&nbspotal number of working days, the student attended   <br />
  <input name="p_day" type="text" id="txtname" class="tb5" value="<?php echo $studrow['p_day']; ?>" style="width:583px;" /></td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>

   
  
 
   <tr>
  <td style="font-size:14px; font-weight:">&nbsp;General Conduct  <br />
  <input name="gmic" type="text" id="txtname" class="tb5"  value="<?php echo $studrow['gmic']; ?>"/></td>
  <td style="font-size:14px;">&nbspAny other remarks   <br />
  <input name="remark" type="text" id="txtname" value="<?php echo $studrow['remark']; ?>" class="tb5"/></td>
  
   <td style="font-size:14px">&nbspDate of issue of certificate *<br />
   <input name="d_issue" type="text" id="txtname" class="tb5" required value="<?php echo $studrow['d_issue']; ?>"/></td>
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

   