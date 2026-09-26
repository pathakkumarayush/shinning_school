<script>
var mS = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var dat = new Date();
var curday = dat.getDate();
var curmon = dat.getMonth() + 1;
var curyear = dat.getFullYear();
var startyear =  dat.getFullYear()-100;
var endyear = dat.getFullYear();
function checkleapyear(datea) {
    if (datea.getYear() % 4 == 0) {
        if (datea.getYear() % 10 != 0) {
            return true;
        } else {
            if (datea.getYear() % 400 == 0) return true;
            else return false;
        }
    }
    return false;
}

function DaysInMonth(Y, M) {
    with(new Date(Y, M, 1, 12)) {
        setDate(0);
        return getDate();
    }
}

function datediff(date1, date2) {
    var y1 = date1.getFullYear(),
        m1 = date1.getMonth(),
        d1 = date1.getDate(),
        y2 = date2.getFullYear(),
        m2 = date2.getMonth(),
        d2 = date2.getDate();
    if (d1 < d2) {
        m1--;
        d1 += DaysInMonth(y2, m2);
    }
    if (m1 < m2) {
        y1--;
        m1 += 12;
    }
    return [y1 - y2, m1 - m2, d1 - d2];
}

function calage() {
    var calday = document.birthday.day.options[document.birthday.day.selectedIndex].value;
    var calmon = document.birthday.month.options[document.birthday.month.selectedIndex].value;
    var calyear = document.birthday.year.options[document.birthday.year.selectedIndex].value;
    if (curday == "" || curmon == "" || curyear == "" || calday == "" || calmon == "" || calyear == "") {
        alert("please fill all the values..!!");
    } else {
        var curd = new Date(curyear, curmon - 1, curday);
        var cald = new Date(calyear, calmon - 1, calday);
        
        var diff = Date.UTC(curyear, curmon, curday, 0, 0, 0) - Date.UTC(calyear, calmon, calday, 0, 0, 0);
        var dife = datediff(curd, cald);
        document.birthday.age.value = dife[0] + " years, " + dife[1] + " months, and " + dife[2] + " days";
        var monleft = (dife[0] * 12) + dife[1];
        var secleft = diff / 1000 / 60;
        var hrsleft = (secleft / 60);
        var daysleft = (hrsleft / 24);
        document.birthday.months.value = monleft + " Month since your birth";
        document.birthday.daa.value = daysleft + " days since your birth";
        document.birthday.hours.value = hrsleft + " hours since your birth";
        document.birthday.min.value = secleft + " minutes since your birth";
        document.birthday.sec.value = (secleft*60) + " seconds since your birth";
        var as = parseInt(calyear) + dife[0] + 1;
        var diff = Date.UTC(as, calmon, calday, 0, 0, 0) - Date.UTC(curyear, curmon, curday, 0, 0, 0);
        var datee = diff / 1000 / 60 / 60 / 24;
        document.birthday.nbday.value = datee + " days left for your next birthday";
    }
}
/*
Date: 31/08/2020
Author: Rohit Kumar
Website: www.iamrohit.in
*/
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


#myform{ font-size:16px; padding:20px; margin-left:50px;}
</style>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
        $(function () {
            $("#ddlPassportt").change(function () {
                if ($(this).val() == "Other") {
                    $("#dvPassportt").show();
                } else {
                    $("#dvPassportt").hide();
                }
            });
        });
    </script>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<link rel="stylesheet" href="thumbnailviewer.css" type="text/css" />
<script src="thumbnailviewer.js" type="text/javascript"></script>
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
<?php 
$res_stud=mysqli_query($con,"select * from student where student_id='".$_GET["upstudid"]."' and student_session='".$_SESSION['session']."'")
or die(mysqli_error());
$rowstud=mysqli_fetch_array($res_stud);
 ?>


<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
<script type="text/javascript">
function showMe(){
var ids=['didfv1','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='mype'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}


function showMe2(){
var ids=['TextBoxDiv1','div2','div3','div4','div5'];
var inp=document.getElementById('myform').getElementsByTagName('input'), el, i=0, k=0;
while(el=inp[i++]){
	if(el.name=='mype2'||el.name=='modtype'){
	document.getElementById(ids[k]).style.display=el.checked?'block':'none';
	k++;
	}
}
}


</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Student Admission.png" /><a href="./?pageid=fron_desk">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:60px; height:40px;"/>

<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Details</h2>


</div>
<div class="col_4">
<div class="form-style-2-heading">Information</div>
  <form method="post" name="birthday" id="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());" style="font-weight:bold">
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
	             if(!empty($_GET['sumsg']) && empty($error_msg))
		         {
			     ?>
                 <div class="success" style="border:#F00 0px solid; width:320px; margin-left:20px"> 
		         <?php echo $_GET['sumsg']; ?> 
		         </div>
                 <?php
                 }
		 
		        if(!empty($_GET["upstudid"]))
		         {
	              ?>
         <div style="border:#FF0000 0px solid; width:150px; margin-top:20px; height:100px">
     
 <img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["student_img"]; ?>" style="border-radius:5px; height:125px; width:100px;">
		
		</div>
       <br><br><br><br>
	   <?php
	   }
	   ?>
	   <table> 
<tr><td>Form No.</td> <?php
	   $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."'");
	   $rowmax=mysqli_fetch_array($maxid);
	   ?>
	   <td><input name="txtname" type="text" id="txtname" value="<?php  if(!empty($_GET["upstudid"])){ echo $rowstud["student_id"]; } else { echo $rowmax["count(student_id)"]+1; }       ?>" size="40" class="tb5" readonly="readonly" /></td>
	  
	  
	  <td>&nbsp;&nbsp;Admission No<span style="color:#FF0000">*</span></td> 
		 <td><input name="scholar" type="text" readonly value="<?php if(($_POST)  && (empty($_GET["upstudid"]))) echo $_POST['scholar']; if(isset($_GET["upstudid"])){ echo $rowstud["student_scholar"];   }?>" class="tb5" /></td> 
	  
	  
	 
	   </tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   <tr>
	   <td>Student Name</td> <td> 
	  
	   <input type="hidden" name="sid" value="<?php echo $_GET["upstudid"]; ?>" />
            
			 <input name="txtname" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtname'];  if(isset($_GET["upstudid"])){echo $rowstud["student_name"];} ?>" size="40" class="tb5" /></td> 
			 
	  <td>&nbsp;&nbsp;Gender</td> <td><?php if(isset($_GET["upstudid"])) { ?>
         
         <input type="radio" name="gender" id="input"  value="male" <?php if($rowstud['student_gender']=='male' ) { ?> checked="checked" <?php } ?> />
      <label class="check_label">Male</label>
      <input type="radio" name="gender" id="input" value="female" <?php if($rowstud['student_gender']=='female' ) { ?> checked="checked" <?php } ?> />
      <label class="check_label">Female</label>
      
      <?php } else { ?>
      <input type="radio" name="gender" id="input"  value="male" checked="checked" />
      <label class="check_label">Male</label>
      <input type="radio" name="gender" id="input" value="female" />
      <label class="check_label">Female</label>
      <?php } ?></td>
	   </tr>
	   
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr>
	   
	    <td>Type</td> <td> 
	   <input type="radio" name="student_type" value="No" <?php if(isset($_GET["upstudid"])){ if($rowstud["addmisionfee"]=="No"){ ?> checked="checked"  <?php } } else { ?> checked="checked" <?php  } ?> >Existing &nbsp;&nbsp; <input type="radio" name="student_type" value="Yes" <?php if(isset($_GET["upstudid"])){ if($rowstud["addmisionfee"]=="Yes"){ ?> checked="checked"  <?php } } ?> >New </td>
	   
	   
	   
	    <td>&nbsp;&nbsp;Category</td> 
		 <td><input type="radio" value="GENERAL" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="GENERAL") ) {   ?> checked="checked"  <?php   } else { ?> checked="checked"  <?php  } ?>  >GENERAL 
		 <input  type="radio" value="OBC" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="OBC") ) {   ?> checked="checked"  <?php  } ?> >OBC 
		 <input  type="radio" value="ST" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="ST") ) {   ?> checked="checked"  <?php   } ?>  >ST 
		 <input  type="radio" value="SC" name="caste" <?php if(!empty($_GET["upstudid"]) && ($rowstud["caste"]=="SC") ) {   ?> checked="checked"  <?php   } ?> >SC </td>
		</tr>
		
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <tr>
	   <td>RTE</td> 
	   <?php
	    if(!empty($_GET["upstudid"]))
	    {
		?>
		<td> 
		<input type="radio" name="rti" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="Yes") ) { ?>  checked="checked"<?php   } ?> >Yes 
		<input type="radio" name="rti" value="No" <?php if(!empty($_GET["upstudid"]) && ($rowstud["rti"]=="No") ) { ?>  checked="checked"<?php   } ?> >No</td>
	    <?php
		  }
		  else
		   {
		   ?>
		<td> 
		<input type="radio" name="rti" value="Yes" >Yes &nbsp;&nbsp;
		<input type="radio" name="rti" value="No"  checked="checked" >No</td>
		   
	    <?php
		 }
		?>
	    <td>&nbsp;&nbsp;Caste</td> 
		 <td>
        
		  <input type="text" name="hname" class="tb5"  readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['hname']; if(isset($_GET["upstudid"])){echo $rowstud["hname"]; } ?>"  >
		  
		</td>
		</tr>
		  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
		
		
		
		
		  <tr>
		  <td>Student Class<span style="color:#FF0000">*</span></td>
		  <td> <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  ?>
		  <select name="class" class="select" style="width:220px;" required>
             
	       <option value="">Select Class</option>
		   
           <?php
           $res=mysqli_query($con,"select distinct(class) from cla where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$rowstud["class"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
		   
	
       
           <?php
		   }  
           ?>
            </select>
          <?php
		  }
		  
		  else
		  {
		  ?>
		   <select name="class" class="select" style="width:220px;" required>
             
	       <option value="">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from cla where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
           echo "<option>".$rows["class"]."</option>";
           }  
           ?>
           </select>
          <?php
		     }
			 ?></td> 
		
		   <td>&nbsp;&nbsp;Bus Fee</td> 
		   <td>
		   <input type="radio" name="bus" value="Yes">Yes&nbsp;
		   <input type="radio" name="bus" value="No" checked="checked">No
		   <input type="text" name="hostel_status" class="tb5" style="width:50px;" placeholder="Amount">
		   <input type="text" name="hostel_name" class="tb5" style="width:50px;" placeholder="Month">
		  </td>
		  </tr>
		
	   
	   
	      <tr>
		  <td>Class Section<span style="color:#FF0000">*</span></td>
		  <td> <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  ?>
		  <select name="txtclass" class="select" style="width:220px;">
             
	       <option value="">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$rowstud["student_class"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
		   
	
       
           <?php
		   }  
           ?>
            </select>
          <?php
		  }
		  
		  else
		  {
		  ?>
		   <select name="txtclass" class="select" style="width:220px;"  required>
             
	       <option value="">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
           echo "<option>".$rows["class"]."</option>";
           }  
           ?>
           </select>
          <?php
		     }
			 ?></td> 
		<td>&nbsp;&nbsp;Religion</td> 
		<td>
		
		  <input type="text" name="mot" readonly class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mot']; if(isset($_GET["upstudid"])){echo $rowstud["mot"]; } ?>"  >
		  
		 
		
		</td>
		 </tr>
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr><td>Date Of Birth<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdob"  readonly id="demo1" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdob']; if(isset($_GET["upstudid"])){echo $rowstud["student_dob"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		<td>&nbsp;&nbsp;Date Of Admission<span style="color:#FF0000">*</span></td> 
		<td><input name="txtdoj" readonly  id="demo2" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdoj']; if(isset($_GET["upstudid"])){echo $rowstud["student_doj"];} ?>"  size="40" class="tb5"  /><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
		</tr>
		
		 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr>
	  <td>DOB In Words</td> 
	  <td><input type="text" readonly name="presult" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['presult']; if(isset($_GET["upstudid"])){echo $rowstud["presult"];} ?>" ></td>
	  
	  <td>Blood Group</td> 
	   
		
		<td> <?php 
		   if(isset($_GET["upstudid"]))
		   {
		   ?>
		   
		  <select name="bg" class="select" style="width:220px;" requird/>
          <option>Select Blood Group</option>
           <?php
           $res=mysqli_query($con,"select distinct(bg) from bg");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["bg"]; ?>" <?php if($rows["bg"]==$rowstud["bg"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["bg"]; ?></option>
		   <?php
		   }  
           ?>
           </select>
           <?php
		   }
		    else
		   {
		   ?>
		   <select name="bg" class="select" style="width:220px;">
		   <option>Select Blood Group</option>
           <?php
           $res=mysqli_query($con,"select distinct(bg) from bg");
           while($rows=mysqli_fetch_array($res))
           {
            echo "<option>".$rows["bg"]."</option>";
           }  
           ?>
           </select>
           <?php
		    }
			?>
			</td>
		
	  </tr>
	   
		
		
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
		
	
			
	     <tr>
		
		<td>SSSMID</td> 
		   <td><input type="text" name="religion" readonly class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['religion']; if(isset($_GET["upstudid"])){echo $rowstud["religion"]; } ?>"  ></td>
		 
		 
		 <td>Aadhar No</td> 
		 <td><input name="txtrno" type="text" readonly  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtrno']; if(isset($_GET["upstudid"])){echo $rowstud["student_rollno"];} ?>"  class="tb5"  /></td>
		 </tr>
		 		 
				 
				<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
			
		<tr>
		<td>Family Id</td> 
		 <td><input type="text" name="family_id" readonly class="tb5" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['family_id']; if(isset($_GET["upstudid"])){echo $rowstud["family_id"]; } ?>"  ></td>
		 
		 
		 
		 <td>Bank/Branch</td> 
		 <td><input name="bank"  readonly type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['bank']; if(isset($_GET["upstudid"])){echo $rowstud["bank"];} ?>"  class="tb5"  /></td>
		 </tr>
		 	 
			  
				 
				 <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>  
			<tr><td>Account No</td>
		  <td><input name="mothertong" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mothertong']; if(isset($_GET["upstudid"])){echo $rowstud["mother_tong"];} ?>"  class="tb5"  /></td></td>
		 
		 
		 
		 <td>IFSC Code<span style="color:#FF0000"></span></td> 
		 <td>
		 
		 <input type="text" name="age" class="tb5" value="<?php echo $rowstud["fid"]; ?>" readonly> </td> 
		   </tr>
		  
		  
		  
<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>  
			<tr><td>Account Holder</td>
		  <td><input name="acc_holder" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['acc_holder']; if(isset($_GET["upstudid"])){echo $rowstud["acc_holder"];} ?>"  class="tb5"  /></td></td>
		 
		 <td>Caste Cer. No.<span style="color:#FF0000"></span></td> 
		 <td>
		 
		 <input type="text" name="caste_no" readonly class="tb5" value="<?php echo $rowstud["caste_no"]; ?>"> </td> 
		   </tr>
			  
			  
			<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>  
			<tr><td>Annual Income</td>
		  <td><input name="income" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['income']; if(isset($_GET["upstudid"])){echo $rowstud["income"];} ?>"  class="tb5"  /></td></td>
		 
		 <td>Alt. Mobile No.<span style="color:#FF0000"></span></td> 
		 <td>
		 
		 <input type="text" name="alt_no" class="tb5" value="<?php echo $rowstud["caste_no"]; ?>" readonly> </td> 
		   </tr>
			  
			  
			  
		<tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
				
				
	   <tr>
	   <td>Previous School</td> 
	   <td><input type="text" name="prev_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['prev_school']; if(isset($_GET["upstudid"])){echo $rowstud["prev_school"];} ?>" readonly></td> 
	   <td>Enrollment No.</td> 
	   <td><input type="text" name="reas_school" class="tb5"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['reas_school']; if(isset($_GET["upstudid"])){echo $rowstud["reason_change"];} ?>" readonly></td>
	   </tr>
      
	  
	  
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td>Father Name</td> 
	  <td><input name="txtfatname" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtfatname']; if(isset($_GET["upstudid"])){echo $rowstud["student_fname"];} ?>" size="40" class="tb5"  /></td> 
	  
	   <td>Mother Name</td> 
		<td><input name="m_name" type="text" id="txtfatname" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['m_name']; if(isset($_GET["upstudid"])){echo $rowstud["m_name"];} ?>" size="40" class="tb5"  /></td>
	  
	  
	  
	   
	   </tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  <tr><td>Father Qualification </td>
	   <td><input type="text" name="fqualification"  readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['fqualification']; if(isset($_GET["upstudid"])){echo $rowstud["f_quali"];} ?>" class="tb5" /></td> 
	   
	   <td>Mother Qualification </td>
	   <td><input type="text" name="mqualification"  readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mqualification']; if(isset($_GET["upstudid"])){echo $rowstud["m_quali"];} ?>" class="tb5" /></td>
	   
	   
	   
	   </tr>
	  
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  
	   <tr>
	  <td>Father Profession</td>
	   <td><input type="text" name="fprofession"   readonly  value="<?php if(($_POST) && (empty($_GET["fprofession"]))) echo $_POST['fprofession']; if(isset($_GET["upstudid"])){echo $rowstud["f_prof"];} ?>" class="tb5" /></td>
	  
	  
	  
	  <td>Mother Profession</td> 
	   <td> <input name="mprofession" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mprofession']; if(isset($_GET["upstudid"])){echo $rowstud["m_prof"];} ?>" class="tb5"  readonly/></td>
	  </tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	    <tr>
		 <td>Father Email Id</td> 
		 <td><input name="femail" type="text"  value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['femail']; if(isset($_GET["upstudid"])){echo $rowstud["femail"];} ?>" size="40" class="tb5"  readonly/></td>
		 
		 <td>Mother Email Id</td> 
		 <td><input name="memail" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['memail']; if(isset($_GET["upstudid"])){echo $rowstud["memail"];} ?>" size="40" class="tb5"  readonly/></td>
		 </tr>
	 
	   
	   
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	  
	  <tr>
	  <td>Residential Address(F)</td> 
	  <td><textarea cols="23"  name="address" readonly><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['address']; if(isset($_GET["upstudid"])){echo $rowstud["student_address"];} ?></textarea></td>
	  
	   <td>Residential Address(M)</td> 
	  <td><textarea cols="23"  name="moaddress"  readonly><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['moaddress']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_add"];} ?></textarea></td>
	  
	   </tr>
	   
	   
	  <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  <tr>
	  <td>Office Address(F)</td> 
	   <td><textarea cols="23"  name="oaddress"  readonly><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['oaddress']; if(isset($_GET["upstudid"])){echo $rowstud["f_off_add"];} ?></textarea></td>
	 
	  <td>Office Address(M)</td> 
	   <td><textarea cols="23"  name="mofftel"  readonly><?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['mofftel']; if(isset($_GET["upstudid"])){echo $rowstud["m_off_tel"];} ?></textarea></td>
	   
	   
	   
	   </tr>
	   
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	  
		
		
		<tr>
		
		<td>Mobile No(Father)</td> 
	   <td> <input name="txtmobile" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtmobile']; if(isset($_GET["upstudid"])){echo $rowstud["student_contactno"];} ?>" maxlength="10" class="tb5"  /></td>
	    
	   
	   
	   <td>Mobile No.(Mother)</td>
	    <td><input name="offadd" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['offadd']; if(isset($_GET["upstudid"])){echo $rowstud["f_tell_no_off"];} ?>" maxlength="10" class="tb5"  /></td> 
	   
	   
	   </tr>
		
	  
	   
	   
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	      <tr>
		  <td>Fee Concession</td>
		  <td> <?php 
		  if(isset($_GET["upstudid"]))
		  {
		  ?>
		  <select name="fc" class="select" style="width:220px;" requird/>
       
           <?php
           $res=mysqli_query($con,"select distinct(bank) from country");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["bank"]; ?>" <?php if($rows["bank"]==$rowstud["fc"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["bank"]; ?></option>
		   <?php
		   }  
           ?>
           </select>
           <?php
		   }
		    else
		   {
		   ?>
		  <select name="fc" class="select" style="width:220px;">
            <option value="">Select Any One</option> 
           <?php
           $res=mysqli_query($con,"select distinct(bank) from country");
           while($rows=mysqli_fetch_array($res))
           {
            echo "<option>".$rows["bank"]."</option>";
           }  
           ?>
            </select>
          <?php
		     }
			 ?></td> 
		<td>Concession Amt</td> 
		<td><input name="famt" type="text" readonly value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['famt'];  if(isset($_GET["upstudid"])){echo $rowstud["famt"];} ?>" size="40" class="tb5" /></td>
		 </tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   
	    <tr>
		<td>If only child of the Parent</td> 
	  <td> 
	  <input type="radio" name="ochild" value="Yes" >Yes &nbsp;&nbsp;
	  <input type="radio" name="ochild" value="No"  checked="checked" >No</td>
	  <td></td>
	  <td></td> 
	   
	   
	   </tr>
	    <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    </table>
	    
		
	   
		<?php
		if(!empty($_GET["upstudid"]))
		{
	    ?>
	    <table>
		<tr>
		<td> <span style="color:#993300;margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
	    <td>
		<input type="radio" name="mype2" value="Yes"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="Yes") ) { ?>  checked="checked" <?php } ?> >Yes
<input type="radio" name="mype2" value="No"  <?php if(!empty($_GET["upstudid"]) && ($rowstud["is_bro"]=="No") ) { ?>  checked="checked"<?php   } ?>>No </td>
		</tr>
		</table>
		
	   <table style="margin-left:125px;">
        <tr>
        <td> <label>Class : </label>
		  <select name="c1" class="select" style="width:220px;">
          <option value="-1">Select Class</option>
          <?php
          $res1=mysqli_query($con,"select distinct(class) from class");
          while($rowss=mysqli_fetch_array($res1))
          {
		  ?>
		  <option value="<?php echo $rowss["class"]; ?>" <?php if($rowss["class"]==$rowstud["c1"] ) { ?> selected="selected" <?php }?>> <?php echo $rowss["class"]; ?>
		  </option>
		  <?php
		  }  
          ?>
          </select>
		</td>
		<td>
        <label>Name : </label><input type='text' name="b1" id='textbox1' value="<?php echo $rowstud["b1"]?>" ></td>
	    </tr>
       <tr>
        <td> <label>Class : </label>
		  <select name="c2" class="select" style="width:220px;">
          <option value="-1">Select Class</option>
          <?php
          $res1=mysqli_query($con,"select distinct(class) from class");
          while($rowss=mysqli_fetch_array($res1))
          {
		  ?>
		  <option value="<?php echo $rowss["class"]; ?>" <?php if($rowss["class"]==$rowstud["c2"] ) { ?> selected="selected" <?php }?>> <?php echo $rowss["class"]; ?>
		  </option>
		  <?php
		  }  
          ?>
          </select>
		</td>
		<td>
        <label>Name : </label><input type='text' name="b2" id='textbox1' value="<?php echo $rowstud["b2"]?>" ></td>
	    </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
		 </table>
	   <?php
	   }else
	   {
	   ?>
	     <table>
		<tr>
		<td> <span style="color:#FF0000; margin-left:0px">If Any Brother And Sister Studying In This School</span></td>
	    <td><input type="radio" name="mype2" value="Yes" onclick="showMe2()">Yes
<input type="radio" name="mype2" value="No" onclick="showMe2()" checked="checked">No </td>
		</tr>
		</table>
		
		<table style="margin-left:125px;">
       <tr>
	   <td> <div id='TextBoxesGroup' >
	   <div id="TextBoxDiv1" style="display:none; margin-left:30px" class="row" >
		<table>
        <tr>
        <td> 
		<label>Class : </label> 
		<select name="c1" class="select" style="width:220px;">
        <option value="-1">Select Class</option>
        <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
        echo "<option>".$rows["class"]."</option>";
        }  
        ?>
        </select>
		</td>
	   
	    <td>
        <label>Name : </label><input type='text' name="b1" id='textbox1' >
		</td>
        
	    </tr>
        <tr>
		<td> 
		<label>Class : </label>
		<select name="c2" class="select" style="width:220px;" >
        <option value="-1">Select Class</option>
        <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
        echo "<option>".$rows["class"]."</option>";
        }  
        ?>
        </select>
		
		</td>
        <td>
        <label>Name : </label><input type='text' name="b2" id='textbox2' ></td>
        </tr>
       
       </table>
    </div>
</div></td>
		 
		 </tr>
		 </table>
		 
		 <?php } ?>
	   <table>
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	  
	     <?php if(isset($_GET["upstudid"]))
		{ 
		
		} else {?>
	   <tr>
	   
			
			<!--<td>Upload Image</td>
		    <td> <input name="file" type="file" size="10" height="20"  /></td>-->
			</tr>
    
		
		
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	   
	   <!--<tr><td>Upload Tc</td> 
	   <td><input name="prev_marksheet" type="file" size="10" height="20"  /></td>
	    <td>Upload Previous Marksheet</td> 
		<td>  <input name="prev_marksheet" type="file" size="10" height="20" /></td></tr>-->
	   <tr><td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td> <td>&nbsp;&nbsp;</td></tr>
	    <?php } ?>
	   </table>
	   
	  
	  <table>
	  
	  <tr>
           <td>&nbsp;</td>
		   <td></td>
           <td>
           <?php
		   if(isset($_GET["upstudid"]))
		   {
			   ?>
			   <input type="submit"  name="update_student" id="add" value="Update" style="width:120px;margin-left:350px" /> 
               <?php
		   }
		   else
		   {
		   ?>
           <input type="submit" name="add_student" id="add" value="Add" style="width:120px;margin-left:350px" />
           <?php } ?></td>
		    <td></td>
         </tr>
		 <tr>
	    <td></td>
		 <td>
		 
		   <?php
		   if(isset($_GET["upstudid"]))
		   {
			?>
	
		 <?php
		  if(isset($_POST['updatetc']))
		  {
		  ?>
		    <input type="hidden" name="student_id" value="<?php echo $rowstud["student_id"]; ?>">
			 <input type="hidden" name="ptc" value="<?php echo $rowstud["tc"]; ?>">
		     <input name="tc" type="file" size="10" height="20"  style="border:#FF0000 0px solid; width:280px"  /><br>
			 <input type="submit" name="updatetc" value="update">
		  <?php
		  }
		
		?>
		
		
		</div>  
		  
		  
		  <div style="margin-left:290px; margin-top:-110px">
     
	 <?php /*?>  <a href="marksheet/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["marksheet"]; ?>" rel="thumbnail" > <img src="marksheet/thumb/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud["marksheet"]; ?>" width="100" height="80" style="border-radius:5px"></a><?php */?>
		
		
	<!-- <br><br>     <input type="submit" name="updatemarksheet" value="Update Image" style="width:160px">-->
		<br>
		<?php
		  if(isset($_POST['updatemarksheet']))
		  {
		  ?>
		   <input type="hidden" name="student_id" value="<?php echo $rowstud["student_id"]; ?>"><br><br>
		    <input type="hidden" name="pmarksheet" value="<?php echo $rowstud["marksheet"]; ?>"><br><br>
		     <input name="prev_marksheet" type="file" size="10" height="20"  style="border:#FF0000 0px solid; width:280px"  /><br>
			 <input type="submit" name="update_marksheet" value="update">
		  <?php
		  }
		
		?>
		</div>
		  
		  <?php
			}
			?>
			</td>  
			 <td></td> <td></td> 
		 </tr>
      
	  </table>
		
	<!--   end-->
		
       </form>
	   <br clear="all" />
	   <br clear="all" />
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   