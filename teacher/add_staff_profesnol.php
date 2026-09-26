
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
<script type="text/javascript">
 function validate()
{
 if( document.myForm.txtclass.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<script type="text/javascript">
function showMe4(){
var ids=['TextBoxDiv1','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='mype2'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}
function esifun(){
var ids=['TextBoxDiv2','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='esi'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}

function showMe2()
{
var ids=['TextBoxDiv4','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='mype3'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}
function showMe5()
{
var ids=['TextBoxDivit','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='it_pt'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}

</script>
<?php
   if(isset($_POST['Submit']))
     $uid = "smrtmanorama".$_SESSION['teacher_id'];
     {
	   if(empty($_POST['c_salry']))
	   {
	     $error_msg="field Marked With * Are Mandatory";
	   }
	   if(empty($error_msg))
	   {
	  $query=mysqli_query($con,"update teacher set Experience='".$_POST['experience']."',prevous_organization='".$_POST['porg']."',designation='".$_POST['dsg']."',last_salary='".$_POST['last_salary']."',master_in='".$_POST['mater']."',current_salary='".$_POST['c_salry']."',reas_lear='".$_POST['reas_liv']."',dat_resig='".$_POST['date_of_resig']."',no_cl='".$_POST['cl']."',pf='".$_POST['mype2']."',pf_per='".$_POST['pf_per']."',amnt_deduction='".$_POST['mype3']."',deduction='".$_POST['deduction']."',max_per='".$_POST['max_per']."',esi='".$_POST['esi']."',hra='".$_POST['hra']."',conv='".$_POST['conv']."',basic='".$_POST['basic']."',esi_per='".$_POST['esi_per']."',it_pt='".$_POST['it_pt']."',it_per='".$_POST['it_per']."',uid='$uid' where teacher_id='".$_SESSION['teacher_id']."'"); 	
	
	 $result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('teacher','$uid','$uid','y')" );
	   
	   
	   $sub="enrool";	
	   $session=$_SESSION['session'];
	   $page=2;
	
	
	$r=sms($_SESSION["uid"],$_SESSION['teacher_id'],$sub,$_SESSION['staffmsg'],'Yes',$session,$page);
	?>
	   <script type="text/javascript">
 window.location="<?php echo $var."add_staff&sumsg=Inserted Successfully"; ?>";
  </script>
  	<?php  
	  }
	  }
	?>
	
	
<?php

    if(isset($_POST['Update']))
	{
	echo $_POST['deduction'];
	 $upd_Prof=mysqli_query($con,"update teacher set Experience='".$_POST['experience']."',prevous_organization='".$_POST['porg']."',designation='".$_POST['dsg']."',last_salary='".$_POST['lsalary']."',master_in='".$_POST['mater']."',current_salary='".$_POST['c_salry']."',reas_lear='".$_POST['reas_liv']."',dat_resig='".$_POST['date_of_resig']."',no_cl='".$_POST['cl']."',pf='".$_POST['mype2']."',pf_per='".$_POST['pf_per']."',amnt_deduction='".$_POST['mype3']."',deduction='".$_POST['deduction2']."',max_per='".$_POST['max_per']."',esi='".$_POST['esi']."',hra='".$_POST['hra']."',conv='".$_POST['conv']."',esi_per='".$_POST['esi_per']."',basic='".$_POST['basic']."',esi_per='".$_POST['esi_per']."' ,it_pt='".$_POST['it_pt']."',it_per='".$_POST['it_per']."' where teacher_id='".$_GET['uid']."'");
$msg="Professional Details Updated Successfully";	
	}


   if(!empty($_GET['uid']))
   {
   $teacher=mysqli_query($con,"select * from teacher where teacher_id='".$_GET['uid']."'");
   
   $rowteacher=mysqli_fetch_array($teacher);
   }

?>
	
<script type="text/javascript">
function showquali(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    
    }
  }
xmlhttp.open("GET","getqualification.php?q="+str,true);
xmlhttp.send();
}
function showquali1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint2").innerHTML=xmlhttp.responseText;
    
    }
  }
xmlhttp.open("GET","getqualification1.php?q="+str,true);
xmlhttp.send();
}

</script>

<?php
	if(isset($_REQUEST["add_teacher"]))
		{
			
			if(empty($_POST['txtname']))
		  {
			 $error_msg="field  marked with * are mandatory";
		  }
		  elseif(empty($_POST["txtdob"]))
		  {
			 $error_msg="field  marked with * are mandatory";
		  } 
		  
		  
		   if(empty($error_msg))
			  {
			   
			   $name1 = $_FILES['file']['name'];
			//$result=mysqli_query($con,"select * from login where uid='".$_POST["uid"]."'")or die(mysqli_error());
			
			   //$result_reg=mysqli_query($con,"insert into login(type,uid,pass,active) values ('teacher','".$_POST["uid"]."','".$_POST["pass"]."','y')" );
				//$id=mysqli_insert_id();
				
			 
			  
			   
			   	
				 
				 ?>
                   <script type="text/javascript">
                    window.location="<?php echo $var."add_staff&&sumsg=Inserted Successfully"; ?>";
			       </script>
			  <?php
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

 <div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Professional Details Staff</h2>
</div>
<div class="col_4">

<div class="box-head" style="width:1127px; ">
					
						<?php
						  if(!empty($_GET['uid']))
						  {
						  ?>
						  <a href="<?php echo $var."add_staff&uid=".$_SESSION['id'];  ?>"><span style="color:#FFFFFF; font-size:16px">Update Personal Detail</span> </a>&nbsp;||&nbsp;<a href="<?php echo $var."add_staff_profesnol&uid=".$_SESSION['id'];  ?>"><span style="color:#FFFFFF; font-size:16px">Update Professional Detail</span> </a>
						  
						  <?php
						  }
						  else
						     {
							 ?>
					         	<h2><b>Add Professional Details</b></h2>		 
							 <?php
							 }
						?>
						
						
						</div>

 <?php 
	     if(!empty($error_msg))
		 {
			?>
         <div class="error" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		 <?php echo $error_msg; ?> 
		</div>
         <?php
         }
	   ?>
      <?php 
	     if(!empty($_GET['msg']))
		 {
		?>
         <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		  <?php echo $_GET['msg']; ?> 
		 </div>
         <?php
         }
		 if(!empty($msg))
		 {
		 ?>
		   <div class="success" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		  <?php echo $msg; ?> 
		 </div>
		 <?php
		 }
		 ?>
		  
	  
		 <?php
		 if(empty($_GET['uid']))
		 {
	   ?>
<form method="post"  onSubmit="return checkForm(this);" name="myform" id="myform">
	     <table width="1100" height="0" border="0"  style="margin-top:20px;" >
		  <tr class="table" >
          <td>Experience </td>
          <td><input name="experience" type="text"  id="txtname" size="40" class="tb5" /></td>
           <td>Prevous Organization</td>
          <td><input name="porg" id="demo2" type="text" class="tb5"  size="40" />
            </td>
       </tr>
	   
	   <tr class="table">
	    <td>Master In</td>
          <td><input name="mater" id="demo2" type="text" class="tb5"  size="40" />
            </td>
	       <td width="177">Reason For Leaving 
 </td>
         <td><input name="reas_liv" id="demo2" type="text" class="tb5"  size="40" /></td>
	   </tr>
	   <tr class="table">
	    <td>Current Salary <span style="color:#FF0000; margin-left:0px">*</span> </td>
           <td><input name="c_salry" id="demo2" type="text" class="tb5"  size="40" />
	     <td width="164"><p>Last Salary</p></td>
          <td width="287"><input name="lsalary" type="text" value="<?php  if($_POST) echo $_POST['txtname'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
	  
	   </tr>

       <tr class="table">
	       <td>Basic </td>
           <td><input name="basic" id="demo2" type="text" class="tb5"  size="40" style="width:80px" />
		    <td>Resignation Date</td>
          <td><input name="date_of_resig" id="demo4" type="text" class="tb5" value="<?php  if($_POST) echo $_POST['txtdoj1'];  if(isset($_GET["uptachid"])){echo $row1["teacher_doj"];} ?>" size="40" />
            <a href="javascript:NewCal('demo4','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;" /></a></td> 
        </tr>
       <tr class="table">
	     <td>HRA <span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input name="hra" type="text" value="<?php  if($_POST) echo $_POST['hra'];  if(isset($_GET["uptachid"])){echo $row1["hra"];} ?>" id="txtname" size="40" class="tb5" style="width:80px" /> 
          </td> 
   <td width="164"><p>Previous Designation </p></td>
          <td width="287"><input name="dsg" type="text" value="<?php  if($_POST) echo $_POST['txtname'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
	   </tr>
	     <tr class="table">
		    <td>Conv<span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input name="conv" type="text" value="<?php  if($_POST) echo $_POST['conv'];  if(isset($_GET["uptachid"])){echo $row1["conv"];} ?>" id="txtname" size="40" class="tb5" style="width:80px" /> 
          </td>
	      	</tr>
			  <tr class="table">
	   
		    <td>ESI <span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input type="radio" name="esi" value="Yes" onclick="esifun()">Yes
<input type="radio" name="esi" value="No" onclick="esifun()">No 
          <div id='TextBoxesGroup2' >
	<div id="TextBoxDiv2" style="display:none;margin-left:130px; margin-top:-30px; border:#FF0000 0px solid; width:120px" class="row" >
		<table>
        <tr>
        <td><input type="text" name="esi_per" class="tb5" id='textbox1' style="width:80px">%</td>
          </tr>
   
    </table>
    </div>
</div> 
		
		 </td>
	      	</tr>
	    <tr class="table">
		    <td>PF <span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input type="radio" name="mype2" value="Yes" onclick="showMe4()">Yes
<input type="radio" name="mype2" value="No" onclick="showMe4()">No 
          <div id='TextBoxesGroup' >
	<div id="TextBoxDiv1" style="display:none;margin-left:130px; margin-top:-30px; border:#FF0000 0px solid; width:120px" class="row" >
		<table>
        <tr>
        <td><input type="text" name="pf_per" class="tb5" id='textbox1' style="width:80px">%</td>
          </tr>
   
    </table>
    </div>
</div> 
		
		 </td>
	      </tr>
		  
		  <tr class="table">
		    <td>It/Pt <span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input type="radio" name="it_pt" value="Yes" onclick="showMe5()">Yes
<input type="radio" name="it_pt" value="No" onclick="showMe5()">No 
          <div id='TextBoxesGroup' >
	<div id="TextBoxDivit" style="display:none;margin-left:130px; margin-top:-30px; border:#FF0000 0px solid; width:120px" class="row" >
		<table>
        <tr>
        <td><input type="text" name="it_per" class="tb5" id='textbox1' style="width:80px">%</td>
          </tr>
   
    </table>
    </div>
</div> 
		
		 </td>
	      </tr>
		 
		  
    
	  
	
	  
	  	<tr class="table">
		    <td>Casual Leave </td>
           <td><input name="cl" id="demo2" type="text" class="tb5"  size="40" value="<?php echo $rowteacher['no_cl'];  ?>" />
		</tr>
		<tr class="table">
			 <td> Deduction Type</td>
		     <td><input type="radio" name="mype3" value="Fixed" onclick="showMe2()">Fixed
              <input type="radio" name="mype3" value="Monthly" onclick="showMe2()">Monthly <div id='TextBoxesGroup'>
	<div id="TextBoxDiv4" style="display:none;margin-left:130px; margin-top:-30px; border:#FF0000 0px solid; width:120px" class="row">
		<table>
        <tr>
        <td><input type="text" name="deduction" class="tb5" style="width:80px;"  /></td>
         
		 
		  </tr>
   
    </table>
    </div>
</div></td>
	  </tr>
	  <tr class="table">
         <td width="164"><p>Max Period</p></td>
          <td width="287"><input name="max_per" type="text" value="<?php  if($_POST) echo $_POST['max_per'];  if(isset($_GET["uptachid"])){echo $row1["teacher_name"];} ?>" id="txtname" size="40" class="tb5" /></td>
		
      </tr>
	
        
      </table>
	</td>
	   </tr>

           <tr class="table" >
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="Save" style="width:150px" /></td>
          <td>&nbsp;</td>
        </tr>
   

		 </table>
	</form>
  <?php
	  }
	  else
	   {
	   ?>
	   
	      <form method="post"  onSubmit="return checkForm(this);" name="myform" id="myform">
	      <table width="986" height="455" border="0"  style="margin-top:0px;" >
	      <tr class="table" >
          <td>Experience </td>
          <td><input name="experience" type="text"  id="txtname" size="40" class="tb5" value="<?php echo $rowteacher['Experience'];  ?>" /></td>
           <td>Prevous Organization<span style="color:#FF0000">*</span></td>
          <td><input name="porg" id="demo2" type="text" class="tb5" value="<?php echo $rowteacher['prevous_organization'];  ?>"  size="40" />
            </td>
        </tr>
		
	     <tr class="table">
		    <td>Master In<span style="color:#FF0000">*</span></td>
          <td><input name="mater" id="demo2" type="text" class="tb5" value="<?php echo $rowteacher['master_in'];  ?>"  size="40" />
            </td>
			  <td width="177">Reason For Leaving 
 </td>
         <td><
	         <input name="reas_liv" id="demo2" type="text" class="tb5" value="<?php echo $rowteacher['reas_lear'];  ?>"  size="40" />
	
		     
		 </td>
		 
			</tr>
		
		<tr class="table">
		   <td>Current Salary <span style="color:#FF0000; margin-left:0px">*</span> </td>
           <td><input name="c_salry" id="demo2" type="text" class="tb5"  size="40" value="<?php echo $rowteacher['current_salary'];  ?>" />
		</tr>
			<tr class="table">
		   <td>Basic <span style="color:#FF0000; margin-left:0px">*</span> </td>
           <td><input name="basic" id="demo2" type="text" class="tb5"  size="40" value="<?php echo $rowteacher['basic'];  ?>" />
		</tr>
		   <tr class="table">
	   
		    <td>HRA <span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input name="hra" type="text" value="<?php  echo $rowteacher["hra"]; ?>" id="txtname" size="40" class="tb5" style="width:80px" /> 
          </td>
	      	</tr>
		  
	      <tr class="table">
		    <td>Conv<span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input name="conv" type="text" value="<?php  echo $rowteacher["conv"]; ?>" id="txtname" size="40" class="tb5" style="width:80px" /> 
          </td>
	      	</tr>
		 
	      <tr class="table">
		    <td>ESI <span style="color:#FF0000; margin-left:0px"></span></td>
		    <td><input type="radio" name="esi" value="Yes" onclick="esifun()" <?php if($rowteacher['esi']=="Yes"){ ?> checked="checked"  <?php }  ?>>Yes
<input type="radio" name="esi" value="No" onclick="esifun()" <?php if($rowteacher['esi']=="No"){ ?> checked="checked"  <?php }  ?>>No 

      <input type="text" name="esi_per" value="<?php echo $rowteacher['esi_per'];   ?>" class="tb5" style="width:80px; margin-left:80px">%</td>
	      	</tr>
	      <tr class="table">
		    <td> PF</td>
		   <td><input type="radio" name="mype2" value="Yes" onclick="showMe2()" <?php if($rowteacher['pf']=="Yes"){ ?> checked="checked"  <?php }  ?>>Yes
<input type="radio" name="mype2" value="No" onclick="showMe2()" <?php if($rowteacher['pf']=="No"){ ?> checked="checked"  <?php }  ?>>No 

      <input type="text" name="pf_per" value="<?php echo $rowteacher['pf_per'];   ?>" class="tb5" style="width:80px; margin-left:80px">%</td>
		  </tr>
		  
		   <tr class="table">
		    <td> It/Pt</td>
		   <td><input type="radio" name="it_pt" value="Yes" onclick="showMe2()" <?php if($rowteacher['it_pt']=="Yes"){ ?> checked="checked"  <?php }  ?>>Yes
<input type="radio" name="it_pt" value="No" onclick="showMe5()" <?php if($rowteacher['it_pt']=="No"){ ?> checked="checked"  <?php }  ?>>No 

      <input type="text" name="it_per" value="<?php echo $rowteacher['it_per'];   ?>" class="tb5" style="width:80px; margin-left:80px">%</td>
		  </tr>
		
		<tr class="table">
		    <td>Casual Leave </td>
           <td><input name="cl" id="demo2" type="text" class="tb5"  size="40" value="<?php echo $rowteacher['no_cl'];  ?>" />
		</tr>
			<tr class="table">
			
			 <td>Deduction Type</td>
		  <td><input type="radio" name="mype3" value="Fixed" <?php if($rowteacher['amnt_deduction']=="Fixed"){ ?> checked="checked"  <?php }  ?>  onclick="showMe2()">Fixed
              <input type="radio" name="mype3" value="Monthly" <?php if($rowteacher['amnt_deduction']=="Monthly"){ ?> checked="checked"  <?php }  ?> onclick="showMe2()">Monthly
 		<div id='TextBoxesGroup'>
	<div id="TextBoxDiv4" style="display:none; margin-left:0px" class="row" >  
	  <input type="text" name="deduction2" value="<?php echo $rowteacher['deduction'];  ?>" class="tb5" style="width:80px; ">		  
    </div>
	</div>
  </td>
   
       
		 
		  </tr>
		 
		  
		
		
	
	 
		  
		  
		  
		   <tr class="table">
		      <td width="164"><p>Max Period </p></td>
         <td ><input name="max_per" type="text" value="<?php echo $rowteacher['max_per']; ?>" id="txtname" size="40" class="tb5" /></td>
		   </tr>
		    <tr class="table" >
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Update" value="Update" style="width:150px" /></td>
        
		
		  <td>&nbsp;</td>
        </tr>
		
		  </table>
		  </form>
	    <?php
	   }
	  ?>

</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  