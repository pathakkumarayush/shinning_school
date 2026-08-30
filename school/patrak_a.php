<?php
session_start();
include 'db.php';
require_once("../db.php"); 
$term=$_GET['exam'];
$i=1;
$ses = $_GET['ses'];
?>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#ses").val();
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Patrak Annual("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Shining School</title>
</head>
<body>
<div style="width:2500px;height:auto">
<br clear="all">
<table style="width:100%;" id="sample_1" border="1" cellpadding="0" cellspacing="0" >
<tr style="line-height:25px;color:#000000;font-size:21px;font-weight:bold;" align="left">
<td colspan="37">&nbsp;&nbsp;ANNUAL RESULT SHEET, SESSION <?php echo $_GET['ses']; ?>
<input type="hidden" name="cls" id="cls" value="<?php echo $_GET['class']; ?> Class" />
<input type="hidden" name="exm" id="exm" value="Annual" />
<input type="hidden" name="ses" id="ses" value="<?php echo $_GET['ses']; ?>" />
</td>
</tr>

<tr style="line-height:25px;color:#000000;font-size:21px; font-weight:bold;" align="left">
<td colspan="37">&nbsp;&nbsp;Name Of School - Shining Public Higher Secondary School</td>
</tr>

<tr style="line-height:25px;color:#FF6600;font-size:21px; font-weight:bold;" align="left">
<td colspan="4">&nbsp;Dise Code : 23340518828</td><td colspan="2">&nbsp;CLASS - <?php echo $_GET['class']; ?></td><td colspan="2">&nbsp;Meddium-English</td>
<td colspan="2">&nbsp;Block : Sanchi</td><td colspan="27">&nbsp;District : Raisen</td>
</tr>

<tr style="line-height:20px; background-color:#c2f3ff;color:#000000;font-size:21px;" align="left">
<td colspan="11">&nbsp;Student Information</td>

<td colspan="5" align="center">Co-Curricular Activities</td>
<td colspan="10" align="center">Social Activities</td>

</tr>

<tr style="line-height:20px; background-color:#c2f3ff;color:#000000;font-size:21px;" align="center">
<td>Sr No</td>
<td>Roll No.</td>
<td>Sch. No.</td>
<td>Name Of Student</td>
<td>Mother's Name</td>
<td>Father's Name</td>
<td>Date Of Birth</td>
<td>Gender</td>
<td>Category</td>
<td>SSMID</td>
<td>Aadhar No.</td>

<td>LITERARY<br />  SKILLS</td>
<td>SCIENTIFIC<br />  SKILLS</td>
<td>CULTURAL <br /> SKILLS</td>
<td>CREATIVITY</td>
<td>SPORTS</td>


<td>REGULARITY</td>
<td>PUNCTUALITY</td>
<td>CLEANLINESS</td>
<td>DISCIPLINE</td>
<td>CO-OPERATION</td>
<td>ENVIRONMENTAL<br /> CONSCIOUSNESS </td>
<td>LEADERSHIP<br />  QUALITIES</td>
<td>TRUTHFULNESS</td>
<td>HONESTY</td>
<td>EXPRESSIVE</td>

</tr>
<tr align="center">
<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td><td>06</td><td>07</td><td>08</td><td>09</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td>
</tr>
<?php
$search=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='$ses' and status='0' order by student_name Asc");
$i=1;
while($studrow=mysqli_fetch_array($search))
{
$uid=$studrow['uid'];
?>	
<tr style="color:#335599;font-size:20px;line-height:23PX;">
<td align="center"><?php echo $i; ?></td>
<td style="width:70PX;">
<?php 
$sid=$studrow['student_id'];
$rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='$ses'");
$rowno=mysqli_fetch_array($rno);
echo $studrow['rno'];
?>
</td>
<td><?php echo $studrow['student_scholar'];?></td>
<td><?php echo $studrow['student_name'];?></td>
<td><?php echo $studrow['m_name'];?></td>
<td><?php echo $studrow['student_fname'];?></td>
<td><?php echo $studrow['student_dob'];?></td>
<td><?php echo $studrow['student_gender'];?></td>
<td><?php echo $studrow['caste'];?></td>
<td><?php echo $studrow['religion'];?></td>
<td><?php echo $studrow['student_rollno'];?></td>

<?PHP
$rmk=mysqli_query($con,"select * from healthh where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);

$rmkk=mysqli_query($con,"select * from healthhh where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowrmkk=mysqli_fetch_array($rmkk);
?>

<td align="center"><?php echo $rowrmk['height'];?></td>
<td align="center"><?php echo $rowrmk['weight'];?></td>
<td align="center"><?php echo $rowrmk['vision'];?></td>
<td align="center"><?php echo $rowrmk['bio'];?></td>
<td align="center"><?php echo $rowrmk['math'];?></td>


<td align="center"><?php echo $rowrmkk['height'];?></td>
<td align="center"><?php echo $rowrmkk['weight'];?></td>
<td align="center"><?php echo $rowrmkk['vision'];?></td>
<td align="center"><?php echo $rowrmkk['bio'];?></td>
<td align="center"><?php echo $rowrmkk['math'];?></td>
<td align="center"><?php echo $rowrmkk['s1'];?></td>
<td align="center"><?php echo $rowrmkk['s2'];?></td>
<td align="center"><?php echo $rowrmkk['s3'];?></td>
<td align="center"><?php echo $rowrmkk['s4'];?></td>
<td align="center"><?php echo $rowrmkk['s5'];?></td>


</tr>

<?php
$i++;
$j++;
}
?>
<tr>
<td colspan="37"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td>
</tr>
<!--<tr><td colspan="21"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Result Excel</button></td></tr>-->
</table>

</div>

</body>
</html>