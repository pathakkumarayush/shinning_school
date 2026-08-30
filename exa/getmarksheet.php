<?php
session_start();
include 'db.php';
?>
<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
<style>
.sn{ width:135px!important;}
.sn1{ width:125px!important;}
</style>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


</head>

<body>
<div style="width:1050px; height:auto; background-color:#FFF; border:6px #CC0000 solid;">
<div style="width:100%; margin:0 auto; height:auto;margin-top:3px;">
<div style="float:left;"><img src="l.png" style="height:110px; width:100px; margin-top:1px; margin-left:30px;" /></div>
<div style="float:left; margin-left:20px;margin-top:-15px;"><span style="font-size:70px; font-family:Cambria; color:#da1010; margin-left:10px; "><center>&nbsp;GOYENKA PUBLIC SCHOOL</center></span>
<span style="font-size:34px; color:#da1010;"><center>Panchkuiyaan Tiraha, Near Prakash Sales, Jhansi(U.P.)</center></span>
</div>

</div>
<br />
<br clear="all" />
<div style="width:100%; margin-top:3px; font-size:25px; background-color:#CC0000; height:auto; line-height:30px; font-weight:bold; color:#FFFFFF">
<center>PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
</div>
<?php

$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");

$rowstud=mysqli_fetch_array($reg);

$getdetail=mysqli_query($con,"select * from marks where student='".$rowstud['uid']."'  and ses='".$_SESSION['session']."' and exam='".$_GET['exam']."' ");
$len=mysqli_num_rows($getdetail);
?>

<div style="height:135px; width:100%;">

<div style="width:48%; float:left; margin-left:5px; height:100px; ">
<table style="margin-left:10px; width:500px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>

</table>
</div>
<div style="width:35%; float:left; height:100px;">
<table style="margin-left:10px; width:350px; margin-top:5px;font-size:20px;color:#303192; font-weight:bold;">
<tr><td class="sn1">Class</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
<tr><td>Admission No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td></tr>
<tr><td>Telephone No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_contactno']); ?></td></tr>
</table>
</div>
<div style="width:10%; float:left; height:100px;">
<img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud['student_img'];  ?>" style="height:105px; margin-left:10px; width:104px; margin-top:4px; " />
</div>
<table style="margin-left:10px; width:980px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">&nbsp;Address</td><td class="snn">&nbsp;&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?> </td></tr>
</table>
<?php
$sid = $rowstud['student_id'];
$healthq=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='".$_GET['exam']."'");
$rowh=mysqli_fetch_array($healthq);
?>
<br clear="all" />
<table border="0" cellpadding="0" cellspacing="0" style="margin-left:19px; font-size:20px;color:#303192; width:669px; margin-top:-6px;font-weight:bold;">
<tr><td style="width:180px; font-weight:bold;">Health Status</td>
<td>&nbsp;:&nbsp;Height&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $rowh['height']; ?></td>
<td>Weight&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $rowh['weight']; ?></td></tr>
</table>
</div>
<br clear="all" />
<div style="width:100%; margin-top:10px; background-color:#CC0000;font-size:25px; height:auto; line-height:31px; font-weight:bold; color:#FFFFFF">
<center>ACADEMIC PERFORMANCE</center>
</div>
<div style="width:100%;height:auto;">
<table border="1" cellspacing="0" cellpadding="0" style="font-size:20px;width:96%; margin-left:20px; margin-top:10px; color:#303192; border:3px #303192 solid;">
							<tr style="font-weight:bold; height:50px; background-color: #6567d6;color:#FFFFFF; font-size:22px">
							<td align="center" style="width:70px;">Subject</td>
							<td align="center" style="width:300px;"> <?php echo $_GET['exam']; ?> (100 Marks) </td>
							<td align="center" style="width:300px;">
							Grade
							</td>
							</tr>
						   	<tr style="line-height:40px;">
							 <?php
							 $i=0;
							 while($rowfeedetail=mysqli_fetch_array($getdetail))
							 {
							 ?>
							 <td>&nbsp;&nbsp;&nbsp;<?php echo $rowfeedetail['subject'];  ?></td>
                             <td style="line-height:40px;">
							 <center>
							 <?php 
							  $marks = $rowfeedetail['obtainmarks'];
							  if($marks=='0')
                              {
                              echo 'Ab';
                              }else{
                              echo $marks;
                              }
							
							 $gtmarks+=$marks;
							 ?>
							 </center>
							 </td>
							 <td style="line-height:40px;"><center>
							 <?php 
							 $tmo = ($rowfeedetail['obtainmarks'] * 100)/$rowfeedetail['totalmarks'];
							 if($tmo > 90)
                             {
                             $res='A+';
                             }
							 if($tmo > 80 && $tmo < 91)
                             {
                             $res= 'A';
                             }
							 if($tmo > 70 && $tmo < 81)
                             {
                             $res= 'B+';
                             }
							 if($tmo > 60 && $tmo < 71)
                             {
                             $res= 'B';
                             }
							 if($tmo > 50 && $tmo < 61)
                             {
                             $res= 'C+';
                             }
							 if($tmo > 40 && $tmo < 51)
                             {
                             $res= 'C';
                             }
							 if($tmo < 41)
                             {
                             $res= 'D';
                             }
							 echo $res;
							
							 $rowfeedetail['obtainmarks']; $ob+=$rowfeedetail['obtainmarks'];
							 ?>
							 </center> 
							 </td>			
							 	
							 </tr>
							 <?php
							 $rm=$rowfeedetail['remark'];
							 $pr=$rowfeedetail['Present'];
							 $percentage= $rowfeedetail['obtainper'];
							 $class= $rowfeedetail['class'];
							 $i++;
							}
							?>
				 </table>
<?php
$sid = $rowstud['student_id'];
$class = $rowstud['student_class'];
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<?php
$sid = $rowstud['student_id'];
$healthqt=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='".$_GET['exam']."'");
$rowht=mysqli_fetch_array($healthqt);
?>
<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;font-weight:bold; margin-top:10px;color:#303192;border:3px #303192 solid; width:96%;">
<tr style="line-height:40px;"><td style="width:150px;border-right:3px #303192 solid; color:#CC0000">&nbsp;&nbsp;Total Marks</td>
<td style="border-right:3px #303192 solid;width:90px;"><center><?php echo  $gtmarks; ?></center></td>
<td style="border-right:3px #303192 solid;width:150px;color:#CC0000"><center>&nbsp;&nbsp;Percentage</center></td>
<td style="border-right:3px #303192 solid;width:90px;"><center><?php $perg = $gtmarks/$mid; echo substr($perg, 0, 4); ?>%</center></td>
<td style="border-right:3px #303192 solid;width:150px;color:#CC0000"><center>&nbsp;&nbsp;Grade</center></td>
<td style="border-right:3px #303192 solid;width:90px;">
<center>
<?php 
                             $tnmtmm = round($gtmarks/$mid);
                             if($tnmtmm > 90)
                             {
                             $res='A+';
                             }
							 if($tnmtmm > 80 && $tnmtmm < 91)
                             {
                             $res= 'A';
                             }
							 if($tnmtmm > 70 && $tnmtmm < 81)
                             {
                             $res= 'B+';
                             }
							 if($tnmtmm > 60 && $tnmtmm < 71)
                             {
                             $res= 'B';
                             }
							 if($tnmtmm > 50 && $tnmtmm < 61)
                             {
                             $res= 'C+';
                             }
							 if($tnmtmm > 40 && $tnmtmm < 51)
                             {
                             $res= 'C';
                             }
							 if($tnmtmm < 41)
                             {
                             $res= 'D';
                             }
							 echo $res;
?>

</center>
</td>
<td style="border-right:3px #303192 solid;width:150px;color:#CC0000"><center>&nbsp;&nbsp;Rank</center></td>
<td style="width:90px;"><center>&nbsp;&nbsp;<?php echo $rowht['vision']; ?></center></td>

</tr>
</table>	

<?php
$exm = $_GET['exam'];
$att1=mysqli_query($con,"select * from discipline where student='$sid' and class='$class' and exam='$exm' and session='".$_SESSION['session']."'");
$rowat1=mysqli_fetch_array($att1);
?>

<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;font-weight:bold; margin-top:8px;color:#303192;border:3px #303192 solid; width:96%;">
<tr style="line-height:50px;background-color:#6567d6; color:#FFFFFF;">
<td style="width:324px;border-right:3px #303192 solid; ">&nbsp;&nbsp;My Teacher Says</td>
<td style="border-right:1px #303192 solid;width:300px;"><center><?php echo $exm;  ?></center></td>

</tr>

<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I can sing and dance</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['dance']; ?></center></td>

</tr>

<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I enjoy my work</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['en_w']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I love to play</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['paly']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I do my work carefully</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['w_c']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I listen to instructions</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['list_in']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I do my homework regularly</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['hwk']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I know my table manners</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['know_t']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I am neat & tidy</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['neat']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I am confident</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['cond']; ?></center></td>

</tr>
<tr style="line-height:32px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;I am regular</td>
<td style="border-right:1px #303192 solid;width:165px;"><center><?php echo $rowat1['reg']; ?></center></td>

</tr>
</table>


<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;font-weight:bold; margin-top:20px;color:#303192;border:3px #303192 solid; width:96%;">
<tr style="line-height:50px;">
<td style="width:70px;border-right:3px #303192 solid; color:#CC0000">&nbsp;Attendance</td>
<td style="border-right:3px #303192 solid;width:75px;"><center><?php echo $rowht['height']; ?></center></td>
<td style="width:140px;border-right:3px #303192 solid; color:#CC0000">&nbsp;Teacher's Remark</td>
<td style="border-right:2px #303192 solid;width:508px;">&nbsp;&nbsp;<?php echo $rowht['weight']; ?> </td>
</tr>
</table>

<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;font-weight:bold; margin-top:10px;color:#303192;border:3px #303192 solid; width:96%;">
<tr style="line-height:50px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;Class Teacher's Sign.</td>
<td style="border-right:2px #303192 solid;width:1051px;"><center></center></td>
</tr>

<tr style="line-height:50px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;Principal's Sign./Seal</td>
<td style="border-right:3px #303192 solid;width:165px;"><center></center></td>

</tr>

<tr style="line-height:50px;">
<td style="width:324px;border-right:3px #303192 solid;">&nbsp;&nbsp;Parent's Sign.</td>
<td style="border-right:3px #303192 solid;width:165px;"><center></center></td>

</tr>

</table>
<br clear="all" />	
							
<br clear="all" /><br clear="all" />
</div>
<br clear="all" />
</div>
</body>
</html>