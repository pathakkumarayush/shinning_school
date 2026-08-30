<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL)
?>
<script type="text/javascript">
function popitup(url) 
{
 newwindow=window.open(url,'name','height=535,width=623');
 if (window.focus) {newwindow.focus()}
 return false;
 }
</script>
<style type="text/css">
.sub{width:100px; font-size:12px; font-weight:bold;}
.nm{ width:115px;}
.nmc{ width:115px;color:#FF0000; font-weight:bold;}
.su{width:100px; font-size:12px; font-weight:bold;}
.bu{ width:150px;}
.but{ width:270px;}
.st{ width:100px;}
.hd{ width:1px;}
</style>
 <?php
  if(isset($_POST['submit']))
  {
  $class = $_POST['txtclass'];
  $sql2 = "select class from class where class_id='".$class."' ";
  $abc = mysqli_query($con,$sql2);
  $rowstud1=mysqli_fetch_array($abc);
  $maxmarkr = $rowstud1['class'];
  }
  ?>
  
<script language="javascript">
function checkAll()
{

if (myform.allbox.checked==true)
	for(i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=true;
	}
else
{
	for (i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=false;
	}
}
}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="jquery.printThis.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: 'Elite School'});
               }); 
            });
</script>
<div id="divDetail" style="position:absolute; border:1px solid silver; background:#003162; width:95%; padding:5px; display:none; color:#F8F9F3;" onclick="display('divDetail','none');"> 
</div>
<?php
if(isset($_REQUEST["txtclass"]))
{
?>
	
<img src="images/Examination/exa.png"  style="float:left; width:400px; height:70px; margin-top:100px;"/>
	 <button type="button" id="print_btn" style="margin-left:50px;">Print</button>
	
	 <div style=" margin-top:170px;width:98.5%;background-color:#FFFFFF; margin-left:10px;box-shadow: 0 0 10px rgba(0,0,0, .65);">
	 <div style="background-color:#006633; width:100%; line-height:50px; height:50px; margin-top:10px;">
	 <img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
	 <h1 style="margin-left:50px; margin-top:8px; position:absolute;">Enter Student Marks</h1>
	 <a href="./?pageid=sendmsg" style="color:#FFFFFF;float:right; background-color: #990000; padding:2px; width:100px; font-size:18px">Go-Back</a>
	 </div>
	<div id="div_to_print">
	<br />
	<center><h2>Class:&nbsp; <?php echo $maxmarkr; ?></h2></center>
	<center><h2 style="margin-top:5px;">Exam:&nbsp; <?php echo $_POST['exam']; ?></h2></center>
	
	<center><h2 style="margin-top:5px;">Term:&nbsp; <?php echo $_POST['term']; ?></h2></center>

	<center><h2  style="margin-top:5px;">Session:&nbsp; <?php echo $_REQUEST["session"]; ?></h2></center>
	
	
	<?php
	$classss=mysqli_query($con,"select * from class where class_id='".$_REQUEST["txtclass"]."' and school='".$_SESSION['uid']."'");
    $rowcls=mysqli_fetch_array($classss);
	
	$restex=mysqli_query($con,"select * from exam where class='".$rowcls["class"]."' and examination='".$_REQUEST["exam"]."' and session='".$_SESSION['session']."'");
	while($rowcl=mysqli_fetch_array($restex))
    {
	//echo "<th class='su'>".$rowcl["subject"]." /<font color='red'>".$rowcl["marks"]."</th>";
	}
	?>
	
	
<h2 style="margin-left:120px"><input type='hidden' id='sday' name='sday' size='3'  maxlength='2'/></h2>

<br />


<div  style=" height:480px; width:1334px;overflow:scroll">
<form method="post" action="" name="myform">
<table border="1" style="width:1315px;  font-size:14px" cellpadding="0" cellspacing="0">
<tr>
<th>Roll No</th>
<th style="width:160px;">Name</th>
<?php
$_SESSION["session1"]=$_REQUEST["session"];
$cnt=-1;

$class=mysqli_query($con,"select * from class where class_id='".$_REQUEST["txtclass"]."' and school='".$_SESSION['uid']."'");
$rowclass=mysqli_fetch_array($class);
$rest=mysqli_query($con,"select * from exam where class='".$rowclass["class"]."' and examination='".$_REQUEST["exam"]."' and session='".$_SESSION['session']."'");

while($row=mysqli_fetch_array($rest))
{
	$cnt++;
	?>
	
	<th class='sub'><?php echo $row["subject"]; ?><br /><font color='red'>
	[<?php 
	if($_REQUEST["exam"]=='MID TERM' && $row["subject"]=='COMPUTER')
	{
	$mar = '100';
    echo $mar;
	}
	else if($_REQUEST["exam"]=='Annual' && $row["subject"]=='COMPUTER')
	{
	$mar = '100';
    echo $mar;
	}
	else{
	echo $row["marks"];
	}
	?>]</th>
	<?php
	
	//echo "<input type='hidden' id='txt_".$row1["StudentID"]."_".$i."'  onkeypress='return onlyNumbers();' name='txt_".$row1["StudentID"]."_".$i."' value='' /></th>";
	 $p[] = $row['subject'];
	 $tot[]=$row["marks"];
}
?>
<input class="hd" type="hidden" name="subject" value="<?php print_r($p);  ?>">

<th></th><th style="width:2px;"></th><th style="width:2px;"></th><th>Save</th><th>Status</th> </tr>
<?php
$iii=0;


$res1=mysqli_query($con,"select * from student where student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc")or die(mysqli_error());

			  					
$i=1;


while($row1=mysqli_fetch_array($res1))
{
	$iii++;
	$std_name=$row1["student_name"];
	$subjj=$row1["sub"];
	$r_no=$row1["rno"];
	
	$std_id=$row1["uid"];
	$_SESSION['rclass']=$row1["student_class"].$row1["student_section"];
	$_SESSION['rexam']=$_POST['exam'];
	$_SESSION['term']=$_POST['term'];
	//$std_class=$row1["uid"];
	$mob=$row1["student_contactno"];
	echo "<tr>";
	?>
  
	<?php
    echo "<td class='nm'>".$r_no."</td>";
	if($row1["sub"]=='S')
	{
	echo "<td class='nmc'>".$std_name."</td>";
	}
	else
	{
	echo "<td class='nm'>".$std_name."</td>";
	}
	
	for($i=0; $i<=$cnt; $i++)
	{
	$res_marks=mysqli_query($con,"select * from marks where student='".$row1["uid"]."' and exam='".$_POST['exam']."' and class='".$rowclass['class']."' and ses='".$_SESSION['session']."' and subject_suffix=".$i);
$row_marks= mysqli_fetch_array($res_marks);
	
		echo "<td class='st'>";
echo "<input size='12' maxlength='3' type='text' id='txt_".$row1["uid"]."_".$i."' onkeypress='return onlyNumbers();' name='txt_".$row1["uid"]."_".$i."' 
value='".$row_marks['obtainmarks']."' /></td>";
	}
	$vara="";
	for($j=0; $j<=$i-1; $j++)
	{
		if($j==0)
		{
			$vara.=$tot[$j]."@".$p[$j].'-txt_'.$row1["uid"].'_'.$j;
		}
		else
		{
			$vara.=','.$tot[$j]."@".$p[$j].'-txt_'.$row1["uid"].'_'.$j;
		}
	}
	$sp="txtp_".$std_name."_".$iii;
	echo "<td class='hd'></td><td><input type='hidden' name='$sp' value=''  size='1' id='$sp' maxlength='2'/></td>";

	echo "<td class='hd'><input type='hidden' name='txtrem".$iii."' value='' size='1' id='txtrem".$iii."' /></td>";
	
	echo "<td class='bu'><input type='button' onclick='showUser(\"$std_name\",\"$std_id\",\"$vara\",\"divTot$iii\",\"sday\",\"$sp\",\"$mob\",\"txtrem".$iii."\")' value='Save Record'></td> 
	
	<td class='but'>";
	echo "<div id='divTot$iii'>";
	echo "</div>";
	echo "</td>";
	?>
	
	
	<?php
}
 // echo "<td><input type='button' onclick='showUser(\"$std_name\",\"$std_id\",\"$vara\",\"divTot$iii\",\"sday\",\"$sp\",\"$mob\",\"txtrem".$iii."\")' value='Send Message'></td> <td>";
?>

</table>
</form>
</div>
</div>
</div>
<br />
<br />
<?php
}
else
{
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
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=exam_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
<a href="./?pageid=exam_home">Examination</a> >>Upload Results</a> </h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >	
    <form action="" method="post">
	<div  style="border:#FF0000 0px solid; margin-top:10px; width:350px; margin-left:250px">
    <table style="font-size:14px; ">
    
     <tr><th>Session:</th><td>
	<select name="session" id="session" onchange="" size="1" class="select" style="width:200px;">
	 <option><?php echo $_SESSION['session'];?></option>
     
</select>
</td></tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
       
       

    <tr><th>Exam:</th><td>
    <?php
	 $exam="";
	$res_exam=mysqli_query($con,"select * from examination where school='".$_SESSION["uid"]."' and examination_session='".$_SESSION['session']."'")or die(mysqli_error());
	
	  ?>
    <select name="exam" id="exam"  style="width:200px;" class="select">
   <!-- <option>Select Exam</option>-->
    <?php
     while($row_exam=mysqli_fetch_array($res_exam))
	{
	?>	
	<option value="<?php echo $row_exam['examination_name']; ?>"><?php echo $row_exam["examination_name"]; ?></option>
	<?php
    }
	?>
	
   </select>
   
</td></tr>

<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>


<tr><th>Terms:</th><td>
    <?php
	 $exam="";
	$res_exam_term=mysqli_query($con,"select * from examinationa where school='".$_SESSION["uid"]."' and examination_session='".$_SESSION['session']."'")or die(mysqli_error());
	
	  ?>
    <select name="term" id="term"  style="width:200px;" class="select">
    <?php
     while($row_exam_term=mysqli_fetch_array($res_exam_term))
	{
	?>	
	<option value="<?php echo $row_exam_term['examination_name']; ?>"><?php echo $row_exam_term["examination_name"]; ?></option>
	<?php
    }
	?>
	
   </select>
   
</td></tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

    <tr><th>Class:</th><td><select name="txtclass" style="width:200px;" class="select">
    <option>Select</option>
	<?php
	$res=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."'");
	while($rows=mysqli_fetch_array($res))
	{
	 ?>
		<option value="<?php echo $rows["class_id"];  ?>"><?php echo  $rows["class"].$rows["class_section"]; ?></option>
	<?php
	}
	?>
    </select></td></tr>
    <tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

    <tr><td></td><td><input type="submit" name="submit" value="Search" style="width:150px" /></td></tr>
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
	
      <?php
}

?>          