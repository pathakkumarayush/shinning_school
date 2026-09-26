<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 <script src="jquery.printThis.js"></script>
  <script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("dvContents").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = (frame1.contentWindow) ? frame1.contentWindow : (frame1.contentDocument.document) ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>DIV Contents</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>

<style>
.inp{ width:60px;}
#div_to_print{ font-size:24px;}
td{ height:40px;}
.po{ width:50px;}
</style>

<?php

  if(isset($_POST['submit']))
  {
  
   $class = $_POST['txtclass'];
  
  $sql2 = "select * from class where class_id='".$class."' ";
								
  $abc = mysqli_query($con,$sql2);
							     
  $rowstud1=mysqli_fetch_array($abc);
								
  $maxmarkr = $rowstud1['class'];

  }
  
  ?>
<?php
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."' order by student_name Asc");
$rowstud=mysqli_fetch_array($reg);

$getdetail=mysqli_query($con,"select * from marks where student='".$rowstud['uid']."' and class='".$maxmarkr."' and examination='".$_REQUEST["exam"]."' ");
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

<div id="divDetail" style="position:absolute; border:1px solid silver; background:#003162; width:95%; padding:5px; display:none; color:#F8F9F3;" onclick="display('divDetail','none');"> 
</div>
<?php

if(isset($_REQUEST["txtclass"])){
	?>
	<img src="images/Examination/exa.png"  style="float:left; width:400px; height:70px; margin-top:100px;"/>
  <form id="form1">
    <div id="dvContents">
	<div style=" margin-top:170px;width:98.5%;background-color:#FFFFFF; margin-left:10px;box-shadow: 0 0 10px rgba(0,0,0, .65);">
	 <div style="background-color:#006633; width:100%; line-height:50px; height:50px; margin-top:10px;">
	 <img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
	 <button type="button" id="print_btn" style="margin-left:50px; margin-top:30">Print</button>
	 <h1 style="margin-left:50px; margin-top:10px; position:absolute;">Show Student Results</h1></div>
	
	<div id="div_to_print">
	<br />
	<center><h2>Class:&nbsp; <?php echo $maxmarkr; ?></h2></center>
	<center><h2 style="margin-top:5px;">Exam:&nbsp; <?php echo $_POST['exam']; ?>&nbsp;&nbsp;Session:&nbsp; <?php echo $_REQUEST["session"]; ?></h2></center>
	<br />
	
	
<?php
$res=mysqli_query($con,"select * from marks");
$row = mysqli_fetch_array($res);

?>
	


<form method="post" action="" name="myform">
<table border="1" style="font-size:14px; width:100% " cellpadding="0" cellspacing="0">
<tr>

      <th>No.</th>
	 
	 <th style="width:170px;">Name</th>
	<?php
	$_SESSION["faculty"]=$_REQUEST["txtfaclty"];
	$_SESSION["month"]=$_REQUEST["month"];
	$_SESSION["session1"]=$_REQUEST["session"];
$cnt=-1;

$class=mysqli_query($con,"select * from class where class_id='".$_REQUEST["txtclass"]."' and school='".$_SESSION['uid']."'");

$rowclass=mysqli_fetch_array($class);



$rest=mysqli_query($con,"select * from exam where school='".$_SESSION["schoolname"]."' and class='".$rowclass["class"].$rowclass["class_section"]."' and examination='".$_REQUEST["exam"]."' and session='".$_SESSION['session']."'");

while($row=mysqli_fetch_array($rest))
{
	$cnt++;
	echo "<th class='po'>".$row["subject"]." /<font color='red'>".$row["marks"]."</th>";
	//echo "<input type='hidden' id='txt_".$row1["StudentID"]."_".$i."'  onkeypress='return onlyNumbers();' name='txt_".$row1["StudentID"]."_".$i."' value='' /></th>";
	$p[] = $row['subject'];
	$tot[]=$row["marks"];
	$t+=$row["marks"];
}
?>
<input type="hidden" name="subject" value="<?php print_r($p);  ?>">
<th style="width:100px;">GrandTotal</th><th>Percent</th> <th>Division</th><!--<th>Rank</th>--><th>Remark</th></tr>
<?php
$iii=0;

$res1=mysqli_query($con,"select * from student where student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc")or die(mysqli_error());
$i=1;
while($row1=mysqli_fetch_array($res1))
{

//echo "select * from marks where student='".$row1["uid"] ."' and subject_suffix=".$iii;

	$iii++;
	$std_name=$row1["student_name"];
	$r_no=$row1["student_rollno"];
	$std_id=$row1["uid"];
	$_SESSION['rclass']=$row1["student_class"].$row1["student_section"];
	$_SESSION['rexam']=$_POST['exam'];
	$_SESSION['rmonth']=$_POST['month'];
	//$std_class=$row1["uid"];
	$mob=$row1["student_contactno"];
	echo "<tr>";
	?>
	
	<?php
	echo "<td>".$iii."</td>";
	
	echo "<td>".$std_name."</td>";
	for($i=0; $i<=$cnt; $i++)
	{
$res_marks=mysqli_query($con,"select * from marks where student='".$row1["uid"]."' and exam='".$_POST['exam']."' and subject_suffix=".$i);
$row_marks= mysqli_fetch_array($res_marks);



		echo "<td>";
		echo "<input size='15' maxlength='3' class='inp' type='text' id='txt_".$row1["uid"]."_".$i."' onkeypress='return onlyNumbers();' name='txt_".$row1["uid"]."_".$i."' value='".$row_marks['obtainmarks']."' /></td>";
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

	
	
	?>
	
	
	<td>&nbsp;&nbsp;<?php echo $row_marks['total']; ?>  </td>
	<td>&nbsp;&nbsp;<?php echo substr($row_marks['obtainper'],0,4); ?></td>
	<td>&nbsp;&nbsp;<?php echo $row_marks['division']; ?> </td>
	
	

	<td></td>
	<?php
	
}
 // echo "<td><input type='button' onclick='showUser(\"$std_name\",\"$std_id\",\"$vara\",\"divTot$iii\",\"sday\",\"$sp\",\"$mob\",\"txtrem".$iii."\")' value='Send Message'></td> <td>";
?>

</table>
<?php
// Make a mysqli Connection

$query = "SELECT  MAX(obtainper) FROM marks where class='".$rowstud1['class']."' and exam='".$_POST['exam']."' "; 
	 
$result = mysqli_query($con,$query) or die(mysqli_error());

     //Print out result
    while($row = mysqli_fetch_array($result)){
	//echo $row['MAX(obtainper)'];
	//echo $row['student'];
}
?>
	
	
</form>
</div>

</div>
     </div>
	 </form>
	 <br /></br>
	<input type="button" onclick="PrintDiv();" value="Print" />
<br /></br>
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
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
<a href="./?pageid=exam_home">Examination</a> >>View Results</a> </h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >	
	
    <form action="" method="post">
	<div  style="border:#FF0000 0px solid; margin-top:50px; width:350px; margin-left:250px">
    <table style="font-size:14px; ">
     <tr><th>Session:</th><td>
	 <input type="text" name="session" id="session" value="<?php echo $_SESSION['session']; ?>"/>
</td></tr>

       
    


      <tr><th>Exam:</th><td>
      <?php
	  	$exam="";
	$res_exam=mysqli_query($con,"select * from examination where school='".$_SESSION["uid"]."' and examination_session='".$_SESSION['session']."'")or die(mysqli_error());
	
	  ?>
      <select name="exam" id="exam"  style="width:200px;" class="select">
    <option>Select Exam</option>
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
 <tr><th>Terms:</th><td>
    <?php
	 $exam="";
	$res_exam_term=mysqli_query($con,"select * from examinationa where school='".$_SESSION["uid"]."' and examination_session='".$_SESSION['session']."'")or die(mysqli_error());
	
	  ?>
    <select name="term" id="term"  style="width:200px;" class="select">
    <option>Select Exam Terms</option>
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

    <tr><th>Class:</th><td><select name="txtclass" style="width:200px;" class="select">
    <option>Select</option>
	    <?php
	    $cltech=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");
       
		while($clrow=mysqli_fetch_array($cltech))
		{
	    $result = mysqli_query($con,"SELECT * FROM class where class='".$clrow['class']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
		<option value="<?php echo $tier["class_id"];  ?>"><?php echo  $tier["class"].$tier["class_section"]; ?></option>
        <?php
		}
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
			