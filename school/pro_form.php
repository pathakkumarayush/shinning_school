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
	width:150px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
	width:168px;
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
<?php
$search=mysqli_query($con,"select * from student where student_id='".$_GET['tid']."' and student_session='".$_SESSION['session']."'");
$studrow=mysqli_fetch_array($search);
?>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Student Detail/home.png" width="500PX"/><a href="index.php">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Provisional Documents Form</h2>
</div>
<div class="col_4">
<div class="form-style-2-heading">Provide your information
<?php 
if(isset($_POST['submit']))
{
$res_ins=mysqli_query($con,"insert into pro_document(sid,name,class,tc,m_sheet,adhaar,img,fm_img,sssmid,cast,birth,acc)values 
('".$_POST["sid"]."','".$_POST["name"]."','".$_POST["class"]."','".$_POST["tc"]."','".$_POST["m_sheet"]."','".$_POST["adhaar"]."','".$_POST["img"]."','".$_POST["fm_img"]."','".$_POST["sssmid"]."','".$_POST["cast"]."','".$_POST["birth"]."','".$_POST["acc"]."')");
$msg="Formalities Submit Successfully";
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
  <form action="" method="post" enctype="multipart/form-data">
  <table style="margin-left:50px; color:#0066FF"> 
  
  <tr>
  <td style="font-size:14px; font-weight:">&nbsp;Student Name</td>
  <td>
  <input name="name" type="text" id="txtname"  size="40" class="tb5" value="<?php echo $studrow['student_name']; ?>"/>
  <input name="sid" type="hidden" id="txtname"  size="40" class="tb5" value="<?php echo $studrow['student_id']; ?>"/>
  <input name="class" type="hidden" id="txtname"  size="40" class="tb5" value="<?php echo $studrow['student_class']; ?>"/>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  <tr>
  <td>Transfer Certificate <br /><span style="color:#CC0033">(Original)</td>
  <td>
  <select name="tc" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
   <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  <td>Mark Sheet <br /><span style="color:#CC0033">(Photo Copy)</td>
  <td>
  <select name="m_sheet" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
   <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
  <td>Adhaar Card of Student <br /><span style="color:#CC0033">(Photo Copy) </td>
  <td>
  <select name="adhaar" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
<option value="NA">Not-Applicable</option>
  
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
  <td>Photo Child <br /><span style="color:#CC0033">(2 Passport Size)</td>
  <td>
  <select name="img" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
  <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
  <td>Father & Mother Photo <br /><span style="color:#CC0033">(1 Passport Size)</td>
  <td>
  <select name="fm_img" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
 <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
   <tr>
  <td>Student (Child) SSSMID</td>
  <td>
  <select name="sssmid" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
   <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  <td>Cast Certificate <br /><span style="color:#CC0033">(in case of ST/SC/OBC) </td>
  <td>
  <select name="cast" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
  <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  <td>Birth Certificate - <br /><span style="color:#CC0033">(Photocopy)</td>
  <td>
  <select name="birth" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  <td>Bank A/c. No. of Student<br /> <span style="color:#CC0033">(Photo-copy of Pass Book)</td>
  <td>
  <select name="acc" class="select" required/>
  <option value="">Select</option>
  <option value="Yes">Submit</option>
  <option value="No">Not-Submit</option>
   <option value="NA">Not-Applicable</option>
  </select>
  </td>
  </tr>
  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
  
  <tr>
  <td>&nbsp;</td>
  <td><input type="submit" name="submit" value="Submit Form"></td>
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

   