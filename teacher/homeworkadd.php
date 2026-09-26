<style type="text/css">
span.customStyleSelectBox { font-size:14px; font-weight:bold; background-color:#f0dea4; color:#7c7c7c; padding:5px 7px; border:1px solid #e7dab0; -moz-border-radius: 5px; -webkit-border-radius: 5px;border-radius: 5px 5px; line-height: 11px; } span.customStyleSelectBox.changed { background-color: #f0dea4; } .customStyleSelectBoxInner { background:url(images/arrow.gif) no-repeat center right; }

body{
  
}
.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('info.png');
}
.success {
    color: #4F8A10;
    background-color:#FFD9FF;
    background-image:url('success.png');
}
.warning {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('warning.png');
	font-family:"Courier New", Courier, monospace
}
.error {
    color: #D8000C;
	background:#FFD9FF;
   background-image: url('error.png');
   border-radius:15px;
}
.sms_l{width:135px;margin-top:10px; height:22px;margin-left:20px; background-color:#CC0000; border:4px #FFFFFF solid;}
.sms_l:hover{ background-color:#009933;}
.sms_l a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_l a:hover{font-size:15px; font-weight:bold;}
.sms_ll{width:135px;margin-top:10px; height:22px;margin-left:5px; background-color:#009933; border:4px #FFFFFF solid;}
.sms_ll:hover{ background-color:#CC0000;}
.sms_ll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_lll{width:300px;margin-top:10px; height:22px;margin-left:5px; }
.sms_lll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
</style>
<script type="text/javascript">
    $(document).ready(function($) {
             //Set maxlength of all the textarea (call plugin)
             $().maxlength();
    })
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
<div class="left_sect"><img src="images/hww.png" class="mback"/>
<a href="./?pageid=home">
<img src="images/buttonGoBack.png"  class="gback"/>
</a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">

<h2 style="margin-left:0px; color:#006633; font-size:20px; line-height:40px;">&nbsp;Send Homework</h2>

<a href="./?pageid=viewh" style="float:right; font-size:14px; font-weight:bold; margin-top:-20px;">View Homework</a>
</div>
<div class="col_4" style="margin-top:0px; " >	
				
	
<?php 
if(isset($_POST["addhwork"]))
{
    
	echo $_SESSION['class']= $_POST["class"];
	echo $_SESSION['ass']= "School Admin";
	echo $_SESSION['homwork']= $_POST["homwork"];
	echo $_SESSION['datefrom']=$_POST['datefrom'];
	echo $_SESSION['dateto']=$_POST['dateto'];
	
	
	 $query=mysqli_query($con,"insert into homework(class_id,subject_id,homwork,datefrom,dateto,assign_by,teach_id,session)values('".$_POST['class']."','".$_POST['subject']."','".$_POST['homwork']."','".$_POST['datefrom']."','".$_POST['dateto']."','".$_POST['tech']."','".$_SESSION['userid']."','".$_SESSION['session']."')");


	
	 ?>
<script type="text/livescript">
window.alert("Homework send successsfully");
</script>
    <script type="text/livescript">
	 window.location="<?php echo $var."homeworkadd";  ?>";
	</script>
   
<?php } ?>


<br />
<div style="width:990px;">
				  
				  <div class="sms_lll" style="float:left">
				   <h2 style="color: #006633; margin-left:50px; font-size:18px; ">Add Home Work &nbsp; &nbsp;</h2>
				  </div>
				 
				  
				  </div>

<br clear="all" />

<div>
<form action="" name="form" method="post" >
<div style="margin-left:2px;"><br />
<table border="0" cellspacing="0">
<tr>
<td>School :- </td>
<td><?php echo $_SESSION['uid']; ?></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>Assign By :-</td>
<td>

 <?php
				 $tech=mysqli_query($con,"select * from  teacher where uid='".$_SESSION['userid']."'");
				 $techrow=mysqli_fetch_array($tech);
				 
                 ?>
			    <span style="color:#000; font-weight:bold;" <strong><?php echo ucwords($techrow['teacher_name']); ?></strong></span>
				
				<input type="hidden" value="<?php echo $_SESSION['userid'];?>" name="teach_id" />

				
				</td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>Class :- </td>
<td>
<script>
function getsubject(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsubject.php?q="+str,true);
xmlhttp.send();
}
</script>
   
 <select name="class" class="select" style="width:150px" required>
     <option value="">Select Class</option>
	    <?php
	    $cltech=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");
       
		while($clrow=mysqli_fetch_array($cltech))
		{
	    $result = mysqli_query($con,"SELECT * FROM class where class='".$clrow['class']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
		<option value="<?php echo $tier["class"];  ?>"><?php echo  $tier["class"].$tier["class_section"]; ?></option>
        <?php
		}
		}
		?>
		</select>  
   
  </td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>Subject </td>
<td>
<select  style="width:220px;" name="subject" class="select" required>
<option value="">Select Subject</option>
<?php
$subq=mysqli_query($con,"select * from app_sub");
while($rowsub=mysqli_fetch_array($subq))
{ 
?>
<option value="<?php echo $rowsub["sub_name"]; ?>"><?php echo $rowsub["sub_name"]; ?></option>
<?php
} 
?>
</select>
</td>
</tr>

<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>Homework </td>
<td><textarea maxlength="180" rows="5" cols="28" name="homwork" > </textarea>
<input type="hidden" value="<?php echo $techrow['teacher_name'];?>" name="tech" />

</td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
 <tr>
           <td>Date From</td>
           <td><input name="datefrom"  id="demo1" type="text" style="width:200px" required/><a href="javascript:NewCal('demo1','ddmmmyyyy')" ><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style="margin-top:-1.5px; position:absolute;" > </a></td>
         </tr>
		 
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>		 
<tr>
           <td>Date To	</td>
           <td><input name="dateto"  id="demo2" type="text"  size="40" style="width:200px" required/><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style="margin-top:-1.5px; position:absolute;" ></a></td>
         </tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="addhwork" value="Submit"  /></td>
</tr>

</table>

</div>
</form>
</div>
<br />




			     	</div>
					</div>
			</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>		



