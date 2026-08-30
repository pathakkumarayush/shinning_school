<?php
if(isset($_POST['Submit']))
     {
		 
	$query=mysqli_query($con,"insert into survey_form(fname,mname,location,gender,age,school,class,intrest,teacher,sname,sname1,sname2,age1,age2,gender1,gender2,class1,class2) values('".$_POST['fname']."','".$_POST['mname']."','".$_POST['location']."','".$_POST['gender']."','".$_POST['age']."','".$_POST['school']."','".$_POST['class']."','".$_SESSION['intrest']."','".$_POST['teacher']."','".$_POST['sname']."','".$_POST['sname1']."','".$_POST['sname2']."','".$_POST['age1']."','".$_POST['age2']."','".$_POST['gender1']."','".$_POST['gender2']."','".$_POST['class1']."','".$_POST['class2']."')");	 
		 
		 
	 }
	 

?><style>
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
	width:150px;
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





<div class="full_div">
<br clear="all" />

<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Survey Form</h2>
</div>


<div class="col_4">
<div class="box-head" style="width:1127px;">
					
		
		<h2><b>Survey Form</b></h2>		 
		
						
		 </div>
         
		 
        
        
          <table width="986" height="455" border="0"  style="margin-top:15px;" >
          <tr>
          <td colspan="4">
	      <form method="post"  action="" name="form">
   	     
	      <table  width="1040" height="300" border="0"  >
      
      
        <tr class="table" >
        <td>Father Name<span style="color:#FF0000">*</span> </td>
        <td><input name="fname" type="text" value="" id="txtname" size="40" class="tb5" /></td>
        <td>Mother Name </td>
        <td><input name="mname" type="text" value="" id="txtname" size="40" class="tb5" /></td>
        </tr>
        <tr class="table" >
        <td width="164"><p>Child Name1 </p> </td>
        <td width="1049"><input name="sname" type="text" value="" id="txtname" size="40" class="tb5" />
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#btnPassport").click(function () {
            if ($(this).val() == "Yes") {
                $("#dvPassport").show();
                $(this).val("No");
            } else {
                $("#dvPassport").hide();
                $(this).val("Yes");
            }
        });
    });
</script>
<span>ADD More Child</span>
<input id="btnPassport" type="button" value="Yes" name="btnPassport" / style="    border: 2px solid #0b354b;color: white; width: 65px;
    background: #0b354b; text-align: center;">
<hr />
<div id="dvPassport" style="display: none">
  <div style="width:100%">
  
  <div style="    width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top:5px"><label>Child Name2</label><input name="sname1" type="text" value="" id="txtname" size="40" class="tb5" />
</div>
<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top:5px"><label>Age2</label><input name="age1" type="text" value="" id="txtname" size="40" class="tb5" />
</div>
<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top: 27px;">
<label>Gender2</label>
 <input type="radio" name="gender1" id="input"  value="male"  />
        <label class="check_label">Male</label>
        <input type="radio" name="gender1" id="input" value="female"  />
              <label class="check_label">Female</label>
</div>


<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top:5px"><label>Class2</label><input name="class1" type="text" value="" id="txtname" size="40" class="tb5" />
</div>
<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top:5px"><label>Child Name3</label><input name="sname2" type="text" value="" id="txtname" size="40" class="tb5" />
</div>
<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top:5px"><label>Age3</label><input name="age2" type="text" value="" id="txtname" size="40" class="tb5" />
</div>
<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top: 27px;"> 
<label>Gender3</label>
<input type="radio" name="gender2" id="input"  value="male"  />
        <label class="check_label">Male</label>
        <input type="radio" name="gender2" id="input" value="female"  />
              <label class="check_label">Female</label>
</div>
<div style="  width:29%;
    float: left;
    margin-left: 3px;
    margin-right: 100px;margin-top:5px"><label>Class3</label><input name="class2" type="text" value="" id="txtname" size="40" class="tb5" />
</div>

  </div>
</div>
</td>
  <td>Age1 <br>&nbsp;<br>&nbsp;</td>
          <td><input name="age" type="text" value="" id="txtname" size="40" class="tb5" /></td>

        </tr>
        <tr class="table" >
        <td>Gender1</td>
        <td>
        <input type="radio" name="gender" id="input"  value="male"  />
        <label class="check_label">Male</label>
        <input type="radio" name="gender" id="input" value="female"  />
              <label class="check_label">Female</label>
              </td>
			    <td>Class1 <br>&nbsp;<br>&nbsp;</td>
          <td><input name="class" type="text" value="" id="txtname" size="40" class="tb5" /></td>
         
        </tr>
        <tr class="table">
	     <td>School</td>
          <td>
		  <select name="school" class="tb5 select" style="width:220px;"  >
		  <?php


$sql = "SELECT * FROM state";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
{
?>
		<option value="<?php echo $row['id'];?>" ><?php echo $row['branch'];?></option>	
			
<?php
 }
} 
else
{
    echo "0 results";
}

?>
           
          </select></td>
	     <td>Location</td>
          <td><select name="location">
		 <?php


$sql = "SELECT * FROM country";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
{
?>
		<option value="<?php echo $row['id'];?>" ><?php echo $row['bank'];?></option>	
			
<?php
 }
} 
else
{
    echo "0 results";
}

?></select>
</td>
       </tr>
	    <tr class="table" >
		 <td>Select Teacher Name</td>
          <td>
		  <select name="teacher" class="tb5 select" style="width:220px;"  >
              <?php


$sql = "SELECT * FROM teacher";
$result = mysqli_query($con,$sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
{
?>
		<option value="<?php echo $row['teacher_id'];?>" ><?php echo $row['teacher_name'];?></option>	
			
<?php
 }
} 
else
{
    echo "0 results";
}

?>
          </select></td>
        <td>Intrest Status</td>
        <td>
        <input type="radio" name="intrest" id="input"  value="Poor"  />
        <label class="check_label">POOR</label>
        <input type="radio" name="intrest" id="input" value="Average"  />
              <label class="check_label">Average</label>
			  <input type="radio" name="intrest" id="input" value="Excelent"  />
              <label class="check_label">Excelent</label>
              </td>
			  </tr>
       <tr class="table" >
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Submit" style="width:150px" /></td>
          <td>&nbsp;</td>
        </tr>
    	
	</form></td>
    </tr>
   </table>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  