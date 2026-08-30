<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Paper")) { 
        return false;
    }
    
} 
</script>
<?php
if(!empty($_GET['did']))
{
$del_rout=mysqli_query($con,"delete from exam where exam_id='".$_GET['did']."'  and  session='".$_SESSION['session']."'");
?>

<script type="text/javascript">
window.location="<?php echo $var."timetable_add&examinationname=".$_SESSION["exam_name"]."&class=".$_SESSION["class"];  ?>";
</script>

<?php
}
?>
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
     location.reload(); 
	}
  }
 
xmlhttp.open("GET","getsubject.php?q="+str,true);
xmlhttp.send();
}
</script>

<?php
if(isset($_POST["save"]))
{
$result=mysqli_query($con,"select * from exam where examination='".$_POST["ename"]."' and session='".$_POST["session"]."' and class='".$_POST['class']."' and subject='".$_POST['sub']."' ")or die(mysqli_error());
	if($row=mysqli_fetch_array($result))
	{
		?>
        <script type="text/javascript">
		alert("This class and subject is already exists");
		</script>
        <?php
	}
	else
	{
	$_POST['date']=date("Y-m-d",strtotime($_POST['date']));
	mysqli_query($con,"insert into exam(examination,session,sdate,school,marks,subject,class,edate,min_marks)values('".$_POST["ename"]."','".$_POST["session"]."','".$_POST['date']."','".$_SESSION['uid']."','".$_POST['marks']."','".$_POST['sub']."','".$_POST['class']."','".$_POST['edate']."','".$_POST['min_marks']."')");
   $msg="inserted Successfully";
 }
}
?>
<?php
$exli=mysqli_query($con,"select * from examination where examination_name='".$_GET['examinationname']."' and examination_session='".$_SESSION["session"]."'");
$exli1=mysqli_fetch_array($exli);
?>

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
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=exam_timetable">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
<a href="./?pageid=exam_home">Examination</a> >>Create Timetable</a> </h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >	
				
				
<?php
 if(!empty($error))
 {
?>
<div class="error" style="width:300px"><?php echo $error; ?></div>
<?php
}
?>
<?php
 if(!empty($msg))
 {
?>
<div class="success" style="width:200px"><?php echo $msg; ?></div>
<?php
}
?>                
<form action="" method="post">
<table cellspacing="5" style="margin-left:105px;">
 
  <tr>
    <td>Name :</td>
    <td><input type="text" name="ename" value="<?php echo $exli1["examination_name"]; ?>" readonly="readonly" class="tb5" /></td>
  </tr>
 <tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
  <tr>
    <td>Session :</td>
    <td><input type="text" name="session" value="<?php echo $exli1["examination_session"]; ?>" readonly="readonly" class="tb5" /></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
 </tr>
  <tr>
    <td>Class :</td>
    <td><input type="text" name="class" value="<?php echo $_GET['class']; ?>" readonly="readonly" class="tb5"  />
	     <a href="./?pageid=exam_timetable" style="font-weight:bold;">Next Class</a>
	</td>
  </tr>
</table>

<div style="border:#CCC solid 1px; width:560px; margin-left:100px; position:relative;">

<table cellspacing="10" style=" margin-left:0px">


<tr>
<td>&nbsp;</td>
<td><div id="txtHint"><b>Subject will be listed here.</b></div></td>
</tr>


</table>
	<table style="width:500px">
	<tr>
	<td>Subject :</td>
	<td>&nbsp;Date:</td>
	<td>&nbsp;Max Mark:</td>
	<td>&nbsp;Min Mark:</td>
	</tr>
	<?php
	$sql="SELECT * FROM subjects WHERE class = '".$_GET['class']."' and school='".$_SESSION["uid"]."' and session='".$_SESSION['session']."'";
	
	$result = mysqli_query($con,$sql);
	
	?>
	   <tr>
		<td>
		  <select name="sub" class="select">
			 <?php
			  while($row = mysqli_fetch_array($result))
			  {

	$sub = $row['name'];
	 ?>
		<option value="<?php echo $sub; ?>"><?php echo $sub; ?></option>
	  
		  <?php   
	    }
	 ?>
	
		  </select>
		</td>
	   <td>
	 <input name="date" type="text" id="demo<?php echo $i; ?>" style=" width:100px;" class="tb5" required>
	 <a href="javascript:NewCal('demo<?php echo $i; ?>','ddmmmyyyy')"><img src="css/images/cal.gif" width="20" height="15" border="0" alt="Pick a date<?php echo $i; ?>" style=" padding-top:10px;"></a></td>
	
	<td><input type="text" name="marks"   style="width:60px; margin-right:2px; float:right" class="tb5" required></td>
	<td><input type="text" name="min_marks"   style="width:60px; margin-right:2px; float:right" class="tb5" required></td>
	<td><input type="submit" name="save" value="save"></td>
	</tr>
	
	</table>
</form>
</div>
<br /><br /><br />
<div class="box-head">
<h2><?php echo ucwords($_SESSION["exam_name"])." Timetable For ".$_GET['class'];  ?></h2>
</div>
    <div class="table" style="border:#FF0000 0px solid; height:300px; overflow:scroll">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr bgcolor="#fff">
    <td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Sr</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Date</b></td>
	<td align="center" bgcolor="#6699FF" ><b style="color:#000">Class</b></td>
    <td align="center" bgcolor="#6699FF" ><b style="color:#000">Subject</b></td>
	 <td align="center" bgcolor="#6699FF" ><b style="color:#000">Marks</b></td>
	  <td align="center" bgcolor="#6699FF" ><b style="color:#000">Delete</b></td>	
    
</tr>

<?php
$i=1;
$exam=mysqli_query($con,"select * from exam where examination='".$_GET['examinationname']."' and session='".$_SESSION['session']."' and class='".$_GET['class']."' 
and school='".$_SESSION["uid"]."'");
	
	
	while ($exam1=mysqli_fetch_array($exam))
	{ ?>
	<tr <?php if($j%2==1) {?>  bgcolor="#E0FADC"<?php } ?>>
        <td align="center "><?php echo $i; ?></td>
		<td height="30" align="center "><?php echo date("d-m-Y",strtotime($exam1["sdate"])); ?></td>
        <td align="center "><?php echo $exam1["class"]; ?></td>
        <td align="center "><?php echo $exam1["subject"]; ?></td>
		<td align="center "><?php echo $exam1["marks"]; ?></td>
		<td align="center "><a onClick="return confirmation();" href="<?php echo $var."timetable_add&did=".$exam1["exam_id"]."&examinationname=".$exli1["examination_name"]; ?>">Delete</a></td>
        
    </tr>
        <?php $i=$i+1; $j=&$i; } ?>
</table>
</div>

</form>
         
			
						
				</div>
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
