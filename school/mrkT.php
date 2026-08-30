<!DOCTYPE html> 
<html> 
<head> 
</head> 
<body> 
<script type="text/javascript">
    function popitup(url) 
    {
     newwindow=window.open(url,'name','height=635,width=723');
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
<style>
.inp{ width:40px; height:10px;}
#div_to_print{ font-size:24px;}
td{ height:15px;}
.po{ width:50px !important;}
</style>
<?php 
session_start();
require_once("../db.php"); 
?>
<?php
  $class = $_GET['class'];
  
  $sql2 = "select * from class where class_id='".$class."' ";
								
  $abc = mysqli_query($con,$sql2);
							     
  $rowstud1=mysqli_fetch_array($abc);
								
  $maxmarkr = $rowstud1['class'];
  ?>

	<div style=" margin-top:170px;width:98.5%;background-color:#FFFFFF; margin-left:10px;box-shadow: 0 0 10px rgba(0,0,0, .65);">
	<div id="GFG"> 
	<div style="width:100%;">
	
	<div id="printablediv" style="width:auto;">


<form method="post" action="" name="myform">
<table border="1" id="tbl_exm" style="font-size:14px; margin-top:-20px; width:900px;" cellpadding="0" cellspacing="0">
<tr><td colspan="23">
	<center><h4>Shining Public Hr. Sec. School Raisen (M.P.)</h4></center>
	
	<center><h4 style="margin-top:5px;">Class:&nbsp; <?php echo $_GET['class']; ?>,&nbsp;&nbsp; Exam:&nbsp; <?php echo $_GET['ex']; ?>&nbsp;&nbsp;Session:&nbsp; <?php echo $_GET["ses"]; ?></h4></center></td></tr>
     <tr>
     <th style="width:30px;">No.</th>
	 <!--  <th>Roll No</th>-->
	 <th style="width:80px;">Adm_No.</th>
	 <th style="width:120px;">Name</th>
	 <th style="width:120px;">Father</th>

<?php
$_SESSION["session1"]=$_REQUEST["ses"];
$cnt=-1;

$class=mysqli_query($con,"select * from class where class='".$_GET["class"]."' ");

$rowclass=mysqli_fetch_array($class);

$rest=mysqli_query($con,"select * from exam where class='".$rowclass["class"]."' and examination='".$_GET["ex"]."' and session='".$_GET['ses']."'");

while($row=mysqli_fetch_array($rest))
{
	$cnt++;
	echo "<th class='po' style='width:50px;'>".$row["subject"]."<br>[<font color='red'>".$row["marks"]."]</th>";
	//echo "<input type='hidden' id='txt_".$row1["StudentID"]."_".$i."'  onkeypress='return onlyNumbers();' name='txt_".$row1["StudentID"]."_".$i."' value='' /></th>";
	$p[] = $row['subject'];
	$tot[]=$row["marks"];
	$ts+=$row["marks"];
}
?>
<input type="hidden" name="subject" value="<?php print_r($p);  ?>">
<th style="width:45px;">Total<br />[<span style="color:#FF0000;"><?php echo $ts; ?></span>]</th></tr>
<?php
$iii=0;

$res1=mysqli_query($con,"select * from student where student_class='".$rowclass['class']."' and status='0' and
student_session='".$_GET['ses']."' order by student_name Asc")or die(mysqli_error());
$i=1;
while($row1=mysqli_fetch_array($res1))
{
    $iii++;
	$adn=$row1["student_scholar"];
	$rno=$row1["rno"];
	$gen=$row1["student_gender"];
	$ca=$row1["hname"];
	
	$std_name=$row1["student_name"];
	$fname=$row1["student_fname"];
	$mname=$row1["m_name"];
	$dob=$row1["student_dob"];
	$mobile=$row1["student_contactno"];
	$adhar=$row1["student_rollno"];
	$sssm=$row1["religion"];
	$fid=$row1["family_id"];
	$cat=$row1["caste"];
	
	$addr=$row1["student_address"];
	
	$r_no=$row1["rno"];
	$std_id=$row1["uid"];
	$_SESSION['rclass']=$row1["student_class"].$row1["student_section"];
	$_SESSION['rexam']=$_GET['ex'];
	$_SESSION['rmonth']=$_POST['month'];
	//$std_class=$row1["uid"];
	$mob=$row1["student_contactno"];
	echo "<tr>";
	?>
	
	<?php
	echo "<td>".$iii."</td>";
	echo "<td>".$adn."</td>";

	echo "<td>".$std_name."</td>";
	echo "<td>".$fname."</td>";

	
for($i=0; $i<=$cnt; $i++)
{
$res_marks=mysqli_query($con,"select * from marks where student='".$row1["uid"]."' and exam='".$_GET['ex']."' and ses='".$_GET['ses']."' and subject_suffix=".$i);
$row_marks= mysqli_fetch_array($res_marks);
echo "<td>";
echo "<input size='15' maxlength='4' class='inp' type='text' id='txt_".$row1["uid"]."_".$i."' onkeypress='return onlyNumbers();' name='txt_".$row1["uid"]."_".$i."' 
value='".$row_marks['obtainmarks']."' /></td>";
}
?>
<td align="center"><?php echo $row_marks['total']; ?>  </td>
<?php	
}
?>
</table>
<button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Result Excel</button>
</form>


</div>
</div>
</div>
</div>
<br /></br>


</div>

</body> 

</html>		