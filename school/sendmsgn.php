<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL)
?>
<!DOCTYPE html> 
<html> 
<head> 
	<!-- Script to print the content of a div -->
	<script> 
		function printDiv() { 
			var divContents = document.getElementById("GFG").innerHTML; 
			var a = window.open('', '', 'height=500, width=500'); 
			a.document.write('<html>'); 
			
			a.document.write(divContents); 
			a.document.write('</body></html>'); 
			a.document.close(); 
			a.print(); 
		} 
	</script> 
</head> 
<body> 
<script type="text/javascript">
  function download_report()
  {
    window.location='exam-report.xls';
    }
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="jquery.table2excel.js"></script>
 <script src="jquery.printThis.js"></script>
 <script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Exam-Marks("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>

<script type="text/javascript">
    function popitup(url) 
    {
     newwindow=window.open(url,'name','height=635,width=723');
       if (window.focus) {newwindow.focus()}
       return false;
       }
</script>
<style>
.inp{ width:60px;}
#div_to_print{ font-size:24px;}
td{ height:40px;}
.po{ width:50px !important;}
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

<div id="divDetail" style="position:absolute; border:1px solid silver; background:#003162; width:95%; padding:5px; display:none; color:#F8F9F3;" onClick="display('divDetail','none');"> 
</div>
<?php
if(isset($_REQUEST["txtclass"])){
?>
	<img src="images/Examination/exa.png"  style="float:left; width:400px; height:70px; margin-top:100px;"/>
	<div style=" margin-top:170px;width:98.5%;background-color:#FFFFFF; margin-left:10px;box-shadow: 0 0 10px rgba(0,0,0, .65);">
	 <div style="background-color:#006633; width:100%; line-height:50px; height:50px; margin-top:10px;">
	 <img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
	 <h1 style="margin-left:50px; margin-top:10px; position:absolute;">Show Student Results</h1></div>
	 <a href="./?pageid=sendmsgn" style="color:#FFFFFF;float:right; background-color: #990000; padding:6px; width:100px; font-size:18px">Go-Back</a>
	
	<div id="GFG"> 
	<div style="width:100%;">
	
	<div id="printablediv" style="width:auto;">

	<a  href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/mrk.php?ses=<?php echo $_REQUEST["session"]."&ex=".$_POST['exam']."&class=".$maxmarkr; ?> ')"><span style="font-size:36px;"><input type="submit" name="submit" value="Print Result" style="margin-left:70px"></a>
	
	<br />
	<center><h2>Shining Public Hr. Sec. School Raisen (M.P.)</h2></center>
	<center><h2>Class:&nbsp; <?php echo $maxmarkr; ?></h2>
	<input type="hidden" id="cls" value="<?php echo $maxmarkr; ?>"></center>
	<center><h2 style="margin-top:5px;">Exam:&nbsp; <?php echo $_POST['exam']; ?>
	<input type="hidden" id="exm" value="<?php echo $_POST['exam']; ?>">&nbsp;&nbsp;Session:&nbsp; <?php echo $_REQUEST["session"]; ?></h2>
	<input type="hidden" id="ses" value="<?php echo $_REQUEST["session"]; ?>"></center>
	<br />
	
<form method="post" action="" name="myform">
<table border="1" id="tbl_exm" style="font-size:14px; width:100%;" cellpadding="0" cellspacing="0">
<tr><th style="width:35px;">No.</th> <th>Roll No</th><th style="width:170px;">Name</th>
    <?php
	$_SESSION["session1"]=$_REQUEST["session"];
$cnt=-1;

$class=mysqli_query($con,"select class from class where class_id='".$_REQUEST["txtclass"]."' and school='".$_SESSION['uid']."'");

$rowclass=mysqli_fetch_array($class);



$rest=mysqli_query($con,"select subject,marks from exam where class='".$rowclass["class"].$rowclass["class_section"]."' and examination='".$_REQUEST["exam"]."' and session='".$_SESSION['session']."'");
$ts=0;
while($row=mysqli_fetch_array($rest))
{
	$cnt++;
	echo "<th class='po' style='width:50px;'>".$row["subject"]."<br>[<font color='red'>".$row["marks"]."]</th>";
	//echo "<input type='hidden' id='txt_".$row1["StudentID"]."_".$i."'  onkeypress='return onlyNumbers();' name='txt_".$row1["StudentID"]."_".$i."' value='' /></th>";
	$p[] = $row['subject'];
	$tot[]=$row["marks"];
	$ts+=$row["marks"];
}
$restt=mysqli_query($con,"select marks from exam where subject='Drawing' and class='".$rowclass["class"].$rowclass["class_section"]."' and examination='".$_REQUEST["exam"]."' and session='".$_SESSION['session']."'");
$rowt=mysqli_fetch_array($restt);
$tsex=$rowt["marks"];

$resgk=mysqli_query($con,"select marks from exam where subject='G.K.' and class='".$rowclass["class"].$rowclass["class_section"]."' and examination='".$_REQUEST["exam"]."' and session='".$_SESSION['session']."'");
$rowgk=mysqli_fetch_array($resgk);
$tsgk=$rowgk["marks"];

?>
<input type="hidden" name="subject" value="<?php print_r($p);  ?>">
<th style="width:200px;">Total<br />[<span style="color:#FF0000;"><?php echo $tk = $ts-$tsex-$tsgk; ?></span>]</th><th style="width:150px;">Per.%</th><th>Division</th> <th style="width:150px;">Remarks</th></tr>
<?php
$iii=0;

$res1=mysqli_query($con,"select student_id,student_name,rno,uid,student_class from student where student_class='".$rowclass['class']."' and student_section='".$rowclass['class_section']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc")or die(mysqli_error());


$i=1;
while($row1=mysqli_fetch_array($res1))
{



	$iii++;
	$std_name=$row1["student_name"];
	
	$r_no=$row1["rno"];
	$std_id=$row1["uid"];
	$_SESSION['rclass']=$row1["student_class"];
	$_SESSION['rexam']=$_POST['exam'];
	//$std_class=$row1["uid"];
	$mob=$row1["student_contactno"];
	echo "<tr>";
	?>
	
	<?php
	echo "<td align='center'>".$iii."</td>";
	echo "<td class='nm' align='center'>".$r_no."</td>";
	echo "<td>".$std_name."</td>";
	for($i=0; $i<=$cnt; $i++)
	{
$res_marks=mysqli_query($con,"select obtainmarks,total,totalmarks,obtainper,status from marks where student='".$row1["uid"]."' and exam='".$_POST['exam']."' and ses='".$_SESSION['session']."' and subject_suffix=".$i);
$row_marks= mysqli_fetch_array($res_marks);
        echo "<td>";
	    echo "<input size='15' maxlength='4' class='inp' type='text' id='txt_".$row1["uid"]."_".$i."' onkeypress='return onlyNumbers();' name='txt_".$row1["uid"]."_".$i."' 
		value='".$row_marks['obtainmarks']."' /></td>";
		
	}
	
	?>
	
	<?php
	$gk_marks=mysqli_query($con,"select * from marks where student='".$row1["uid"]."' and exam='".$_POST['exam']."' and ses='".$_SESSION['session']."' and subject='G.K.'");
    $row_gk= mysqli_fetch_array($gk_marks);
	$gk = $row_gk['obtainmarks'];
	?>
	
	<td align="center"><?php echo $tmk = (float)$row_marks['total']-(float)$gk; ?>  </td>
	
	<td align="center">
	<?php  $pr = substr($row_marks['obtainper'],0,4);
	
	$getdetail23=mysqli_query($con,"select * from marks where student='".$row1['uid']."' and ses='".$_SESSION['session']."' and exam='".$_POST['exam']."' and status='fail'");
	$rowfeedetail13=mysqli_fetch_array($getdetail23);
		                  $rst3 = $rowfeedetail13['status'] ?? '';
							
							 if($rst3=='fail')
							 {
				             $pp = '-';
							 }
							 else{
							 $pp = $pr;
							 }
	echo $pp;
	
	 ?></td>
	
	
	<td>&nbsp;&nbsp;<?php //echo $row_marks['division']; ?>
	
	<?php
	$p = $tmk*100/$tk;
	
	$per = substr($p,0,4);
	
	$getdetail2=mysqli_query($con,"select * from marks where student='".$row1['uid']."' and ses='".$_SESSION['session']."' and exam='".$_POST['exam']."' and status='fail'");
	$rowfeedetail1=mysqli_fetch_array($getdetail2);
		                  $rst = $rowfeedetail1['status'] ?? '';
							
							 if($rst=='fail')
							 {
				             $asn = 'fail';
							 }
							 else{
							
							 if($per > 59)
							 {
							 $asn = 'I';
							 }
							 if($per > 44 && $per < 60)
							 {
							 $asn = 'II';
							 }
							 if($per > 32 && $per < 45)
							 {
							 $asn = 'III';
							 }
							 
							 }
							 echo $asn;
	 ?> 
	
	
	 </td>
	<td align="center"> 
	
							
						
	
	</td>
	
	
	<?php
	
}
 // echo "<td><input type='button' onclick='showUser(\"$std_name\",\"$std_id\",\"$vara\",\"divTot$iii\",\"sday\",\"$sp\",\"$mob\",\"txtrem".$iii."\")' value='Send Message'></td> <td>";
?>



</table>
<br>
<br><br><br><br>
<div style="float:left;font-size:18px;">

<span style="margin-left:20px;">Teacher Sign</span>
</div>

<div style="float:left;font-size:18px; margin-left:320px;">
<span style="margin-left:20px;">Exam  Incharge</span><br><br>
</div>

<div style="float:right;font-size:18px;">
<span style="margin-right:20px;">Principal Sign</span>
</div>
<br clear="all"><br clear="all">
</form>
<button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Result Excel</button>
</div>
</div>
</div>

</div>
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
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=exam_home">
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
	 <input type="text" name="session" id="session" value="<?php echo $_SESSION['session'];?>" />
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
	$res=mysqli_query($con,"select * from class");
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
<?php } ?>
</body> 

</html>		