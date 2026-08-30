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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smart ERP</title>
<style>
.tbl{ width:150px;}
.tb2{ width:90px;}
.sn{ width:135px!important;}
.sn1{ width:125px!important;}
</style>
</head>
<body>
<div style="width:1038px; height:auto; background-color:#f0f7da; border:16px #77ab59 solid;">
<div style="width:100%; margin:0 auto; height:auto;margin-top:7px;">
<center>
<div style="float:left; margin-left:10px;"><img src="l.png" style="height:130px; width:110px;" /></div>
<div style="float:left; width:85%;margin-top: -9px;"><span style="font-size:71px; font-family:cambria; color:#da1010;">
<center><b>GOYENKA PUBLIC SCHOOL</b></center></span>
<span style="font-size:24px; color:#da1010;font-weight:bold;"><center>Panchkuiyan Tiraha, Jhansi(U.P.)</center></span>

<span style="font-size:24px; color:#da1010;font-weight:bold;"><center>E-mail : goyenkaschool@gmail.com, Website : www.goyenkapublicschool.com</center></span>
</div>

</center>
</div>

<br clear="all" />
<div style="width:100%; margin-top:3px; font-size:25px; background-color:#77ab59; height:auto; font-weight:bold; line-height:28px; color:#FFFFFF">
<center>PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
</div>
<?php
$term=$_GET['exam'];
$uid=$_GET['student_id'];
$reg=mysqli_query($con,"select * from student where uid='$uid' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
?>
<div style="width:100%;height:auto;">

<div style="width:48%; float:left; margin-left:5px; height:100px; ">
<table style="margin-left:10px; width:500px;font-size:20px; color:#000;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>

</table>
</div>
<div style="width:35%; float:left; height:100px;">
<table style="margin-left:10px; width:350px; margin-top:5px;font-size:20px;color:#000; font-weight:bold;">
<tr><td class="sn1">Class</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
<tr><td>Admission No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td></tr>
<tr><td>Telephone No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_contactno']); ?></td></tr>
</table>
</div>
<div style="width:10%; float:left; height:100px;">
<img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud['student_img'];  ?>" style="height:122px; margin-left:10px; width:110px; margin-top:4px; " />
</div>
<table style="margin-left:10px; width:980px;font-size:20px; color:#000;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">&nbsp;Address</td><td class="snn">&nbsp;&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?> </td></tr>
</table>

</div>


<div style="width:100%; margin-top:10px; background-color:#77ab59;font-size:25px;font-weight:bold; height:auto; line-height:29px; color:#FFFFFF">
<center>ACADEMIC PERFORMANCE</center>
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div>
<?php
if($term=="$term")
{
//$finalmarks;
?>
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:18px; color:#000; font-size:20PX;">
<tr style="border:1px #000 solid; line-height:30px; font-weight:bold; background-color:#77ab59; color:#FFFFFF;">
<td style="border:1px #000 solid;border-top:3px #000 solid;border-left:3px #000 solid;"><center>SCHOLASTIC <br /> AREA</center></td>
<td style="border:1px #000 solid;border-top:3px #000 solid;border-left:2px #000 solid;" colspan="4">
<center>TERM-1 (100 Marks)</center></td>
<td style="border:1px #000 solid;border-top:3px #000 solid;border-left:2px #000 solid;" colspan="4">
<center>TERM-2 (100 Marks)</center></td>
<td style="border:1px #000 solid;border-top:3px #000 solid;border-left:2px #000 solid;solid;border-right:3px #000 solid;" colspan="2">
<center>&nbsp;OVERALL <br /> &nbsp(TERM1+TERM2)/2&nbsp;</center></td>
</tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000;border-left:3px #000 solid;border-bottom:3px #000 solid;font-size:20PX; width:197PX;">
<tr><td style="line-height:54px; font-weight:bold;"><center>Subject</center></td></tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:35PX;">
<td>
<center>
<?php echo $sub_row['1']; ?>
</center>
</td></tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]'");
$len=mysqli_num_rows($er);
$t=0;
while($t<=($len+1))
{
	$final_cal[$t]=0;
	$fa[$t]=0;
	$sa[$t]=0;
	$t++;
}
while($row=mysqli_fetch_row($er))
{
$te_cal=0;
?>
<td>

<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:74px;color:#000;border-bottom:3px #000 solid; font-size:20px;">
<?php 
 if($row[0]=="1st Term" || $row[0]=="2nd Term")
 {
 $per=70;
 }
 else if($row[0]=="1st Unit" || $row[0]=="2nd Unit")
 {
 $per=25;
 }
 else{$per=5;
 }
 ?>
<tr>
<?php 
if($row[0]=='1st Term')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>H.Y.<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='1st Unit')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>U.T.<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;width:50px;font-weight:bold;">
<center>S.E.<br />(<?php echo $per; ?>)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM1'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:35PX;">
<td><center><?php           
$marks = ($row['1'] * 100)/$row[2];
$final_grade1=($marks*$per)/100;
$final_grade = round($final_grade1);
/*$te_cal++;*/
//echo $final_grade;
if($final_grade=='0')
{
echo 'Ab';
}else{
echo $final_grade;
}
$final_cal[$te_cal]=$final_cal[$te_cal]+$final_grade;
$rowfeedetail['obtainmarks']; $ob+=$rowfeedetail['obtainmarks'];
?>
</center> 
</td></tr>
<?php 
$te_cal++;
}
?>
</table>
</td>
<?php }?>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000;  font-size:20px;border-bottom:3px #000 solid; width:60px;">

<tr><td style="line-height:27px;font-weight:bold;"><center>Total<br />(100)</center></td></tr>
<?php $t=0;
while($t<=$len+3)
{
?> 
<tr style="line-height:35px;">
<td><center>
<?php /*$final_cal[$t]=0;*/
$markstot = $final_cal[$t];
echo $tmo = $markstot;
$ttmot1+=$tmo;
$finalmarks[0][$t]=$markstot/2;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM2' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]'");
$len=mysqli_num_rows($er);
$t=0;
while($t<=$len+1)
{
$final_cal[$t]=0;
$fa1[$t]=0;
$sa1[$t]=0;
$t++;
}
while($row=mysqli_fetch_row($er))
{
$te_cal=0;
?>
<td>
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:74px;color:#000;font-size:20px;border-bottom:3px #000 solid;">
<?php 
 if($row[0]=="1st Term" || $row[0]=="2nd Term")
 {
 $per=70;
 }
 else if($row[0]=="1st Unit" || $row[0]=="2nd Unit")
 {
 $per=25;
 }
 else{$per=5;
 }
 ?>
<tr>
<?php 
if($row[0]=='2nd Term')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>Y.E<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='2nd Unit')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>U.T.<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>S.E.<br />(<?php echo $per; ?>)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM2'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{	
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:35px;">
<td>
<center>
<?php           
$marks = ($row['1'] * 100)/$row[2];
$final_grade1=($marks*$per)/100;
$final_grade = round($final_grade1);
/*$te_cal++;*/
//echo $final_grade;
if($final_grade=='0')
{
echo 'Ab';
}else{
echo $final_grade;
}

$final_cal1[$te_cal]=$final_cal1[$te_cal]+$final_grade;
$rowfeedetail['obtainmarks']; $ob+=$rowfeedetail['obtainmarks'];
?>
</center> 
</td></tr>
<?php 
$te_cal++;
}
?>
</table>
</td>

<?php }?>
<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000;border-bottom:3px #000 solid;  font-size:20px; width:60px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>Total<br />(100)</center></td></tr>
<?php $t=0;
while($t<=$len+3)
{?> 
<tr style="line-height:35px;">
<td><center>
<?php /*$final_cal[$t]=0;*/	                         
$markstot1 = $final_cal1[$t];
echo $tmo1 = $markstot1;
$ttmotg1+=$tmo1;
$finalmarks[1][$t]=$markstot1/2;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000; width:120px; font-size:20px;border-bottom:3px #000 solid;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>Total<br />(100)</center></td></tr>
<?php $t=0;
while($t<=$len+3)
{?> 
<tr style="line-height:35px;">
<td><center>
<?php                         
echo $gtm = round($finalmarks[1][$t]+$finalmarks[0][$t]);
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:120px;color:#000;border-right:3px #000 solid;border-bottom:3px #000 solid;font-size:20px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>Final<br />Grade&nbsp;</center></td></tr>
<?php $t=0;
while($t<=$len+3)
{?> 
<tr style="line-height:35px;">
<td><center>
<?php                         
$gtm = round($finalmarks[1][$t]+$finalmarks[0][$t]);
$gtgtm+=$gtm;
                             if($gtm > 90)
                             {
                             $res='A1';
                             }
							 if($gtm > 80 && $gtm < 91)
                             {
                             $res= 'A2';
                             }
							 if($gtm > 70 && $gtm < 81)
                             {
                             $res= 'B1';
                             }
							 if($gtm > 60 && $gtm < 71)
                             {
                             $res= 'B2';
                             }
							 if($gtm > 50 && $gtm < 61)
                             {
                             $res= 'C1';
                             }
							 if($gtm > 40 && $gtm < 51)
                             {
                             $res= 'C2';
                             }
							 if($gtm > 32 && $gtm < 41)
                             {
                             $res= 'D';
                             }
							  if($gtm < 33)
                             {
                             $res= 'E';
                             }
							 echo $res;


$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>
</tr>
</table>

<?php }?>

</div>
</div>
<?php
$sid = $rowstud['student_id'];
$coscholastic1=mysqli_query($con,"select * from other_marks  where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='".$_SESSION['session']."'");
$rowco1=mysqli_fetch_array($coscholastic1);
$coscholastic2=mysqli_query($con,"select * from other_marks  where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM2' and session='".$_SESSION['session']."'");
$rowco2=mysqli_fetch_array($coscholastic2);
?>
<table style="width:40%; float:left; margin-top:20px; margin-left:20px;color:#000; border:1px #000 solid;font-size:20px;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#77ab59 ; color:#FFFFFF;">
<td align="center" style="font-weight:bold">Co-Scholastic Areas <br />(3 Point Grading Scale A, B, C)</td>
<td align="center" style="width:60px;">T1</td>
<td align="center" style="width:60px;">T2</td>
</tr>

<tr style="line-height:31px;">
<td>&nbsp;Art/Craft</td>
<td align="center"><?php echo $rowco1['art']; ?></td>
<td align="center"><?php echo $rowco2['art']; ?></td>
</tr>

<tr style="line-height:31px;">
<td>&nbsp;Music</td>
<td align="center"><?php echo $rowco1['music']; ?></td>
<td align="center"><?php echo $rowco2['music']; ?></td>
</tr>

<tr style="line-height:31px;">
<td>&nbsp;Dance</td>
<td align="center"><?php echo $rowco1['dance']; ?></td>
<td align="center"><?php echo $rowco2['dance']; ?></td>
</tr>

<tr style="line-height:31px;">
<td>&nbsp;Game</td>
<td align="center"><?php echo $rowco1['game']; ?></td>
<td align="center"><?php echo $rowco2['game']; ?></td>
</tr>

<tr style="line-height:31px;">
<td>&nbsp;Moral Values</td>
<td align="center"><?php echo $rowco1['moral']; ?></td>
<td align="center"><?php echo $rowco2['moral']; ?></td>
</tr>

<tr style="line-height:31px;">
<td>&nbsp;G K</td>
<td align="center"><?php echo $rowco1['gk']; ?></td>
<td align="center"><?php echo $rowco2['gk']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;Conversation</td>
<td align="center"><?php echo $rowco1['con']; ?></td>
<td align="center"><?php echo $rowco2['con']; ?></td>
</tr>

</table>

<?php
$discipline1=mysqli_query($con,"select * from discipline1   where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='".$_SESSION['session']."'");
$rowdc1=mysqli_fetch_array($discipline1);
$discipline2=mysqli_query($con,"select * from discipline1   where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM2' and session='".$_SESSION['session']."'");
$rowdc2=mysqli_fetch_array($discipline2);
?>
<table style="width:44%; float:left; font-size:20px; margin-top:20px; margin-left:128px;color:#000; border:1px #000 solid;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#77ab59; color:#FFFFFF;">
<td align="center" style="font-weight:bold">Discipline <br />(3 Point Grading Scale A, B, C)</td>
<td align="center" style="width:60px;">T1</td>
<td align="center" style="width:60px;">T2</td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Regularity & Punctuality</td>
<td align="center"><?php echo $rowdc1['regularity']; ?></td>
<td align="center"><?php echo $rowdc2['regularity']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Sincerity</td>
<td align="center"><?php echo $rowdc1['sincerity']; ?></td>
<td align="center"><?php echo $rowdc2['sincerity']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Behaviour & Values</td>
<td align="center"><?php echo $rowdc1['beha']; ?></td>
<td align="center"><?php echo $rowdc2['beha']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Respectfulness for Rules & Regulations</td>
<td align="center"><?php echo $rowdc1['rrr']; ?></td>
<td align="center"><?php echo $rowdc2['rrr']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards Teachers</td>
<td align="center"><?php echo $rowdc1['att']; ?></td>
<td align="center"><?php echo $rowdc2['att']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards School-mates</td>
<td align="center"><?php echo $rowdc1['atsm']; ?></td>
<td align="center"><?php echo $rowdc2['atsm']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards Society</td>
<td align="center"><?php echo $rowdc1['ats']; ?></td>
<td align="center"><?php echo $rowdc2['ats']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards Nation</td>
<td align="center"><?php echo $rowdc1['atn']; ?></td>
<td align="center"><?php echo $rowdc2['atn']; ?></td>
</tr>

</table>

<?php
$sid = $rowstud['student_id'];
$hw=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowhw=mysqli_fetch_array($hw);

$hw1=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowhw1=mysqli_fetch_array($hw1);
?>

<br clear="all" />
<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px; margin-top:20px;color:#000;border:1px #000 solid; width:96%;">
<tr style="line-height:27px; background-color:#77ab59 ; color:#FFFFFF;font-weight:bold;">
<td style="width:101px;">&nbsp;Health Status</td>
<td style="width:165px;"><center>1st Term</center></td>
<td style="width:165px;"><center>2nd Term</center></td>

</tr>
<tr style="line-height:24px;">
<td style="width:101px;">&nbsp;Height</td>
<td style="width:165px;"><center><?php echo $rowhw['height']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowhw1['height']; ?></center></td>

</tr>
<tr style="line-height:24px;">
<td style="width:101px;">&nbsp;Weight</td>
<td style="width:165px;"><center><?php echo $rowhw['weight']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowhw1['weight']; ?></center></td>

</tr>
</table>

<?php
$sid = $rowstud['student_id'];
$healthq=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowh=mysqli_fetch_array($healthq);

$healthq1=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowh1=mysqli_fetch_array($healthq1);

$healthq2=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='3rd Term'");
$rowh2=mysqli_fetch_array($healthq2);

?>


<table style="width:54%; float:left; font-size:20px; margin-top:10px; margin-left:20px;color:#000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;">
<td><span style="color:#FFFFFF; background-color:#77ab59;padding:5px; border-radius:5px;">Attendance  Term 1</span>: - <?php echo $rowh['height']; ?></td>
</tr>
</table>

<table style="width:40%; float:left; font-size:20px; margin-top:10px; margin-left:20px;color:#000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;">
<td><span style="color:#FFFFFF; background-color:#77ab59;padding:5px; border-radius:5px;">Attendance Term 2</span>:- Term 2 - <?php echo $rowh1['height']; ?></td>
</tr>
</table>
<br clear="all" />
<table style="width:96%; float:left; font-size:20px; margin-top:15px; margin-left:20px;color:#000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td><span style="color:#FFFFFF; background-color:#77ab59;padding:5px; border-radius:5px;">Remark Term 1</span>:-<?php echo $rowh['weight']; ?></td>
</tr>
</table>

<table style="width:96%; float:left; font-size:20px; margin-top:15px; margin-left:10px;color:#000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#FFFFFF; background-color:#77ab59;padding:5px; border-radius:5px;">Remark Term 2</span>:-&nbsp;<?php echo $rowh1['weight']; ?></td>
</tr>
</table>
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<table style="width:16%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="background-color:#77ab59;color:#FFFFFF;">&nbsp;&nbsp;<span>Term-1</span></td>
</tr>
</table>
<table style="width:24%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Overall Marks</td><td style="width:90px;">&nbsp;&nbsp;<?php echo $ttmot1; ?></td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;Percentage</td><td style="width:100px;">&nbsp;&nbsp; <?php $perg = $ttmot1/$mid; ?> <?php echo substr($perg, 0, 4); ?>%</td>
</tr>
</table>
<table style="width:13%; float:left; font-size:20px; margin-top:10px; margin-left:22px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;Grade</td><td style="width:100px;">&nbsp;&nbsp;
<?php $gtmg = $ttmot1/$mid;
                              if($gtmg > 90)
                             {
                             $res='A1';
                             }
							 if($gtmg > 80 && $gtmg < 91)
                             {
                             $res= 'A2';
                             }
							 if($gtmg > 70 && $gtmg < 81)
                             {
                             $res= 'B1';
                             }
							 if($gtmg > 60 && $gtmg < 71)
                             {
                             $res= 'B2';
                             }
							 if($gtmg > 50 && $gtmg < 61)
                             {
                             $res= 'C1';
                             }
							 if($gtmg > 40 && $gtmg < 51)
                             {
                             $res= 'C2';
                             }
							 if($gtmg > 32 && $gtmg < 41)
                             {
                             $res= 'D';
                             }
							  if($gtmg < 33)
                             {
                             $res= 'E';
                             }
							 echo $res;




 ?>
</td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:22px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Rank</td><td style="width:100px;">&nbsp;&nbsp;<?php echo $rowh['vision']; ?></td>
</tr>
</table>


<br clear="all" />
<table style="width:16%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="background-color:#77ab59;color:#FFFFFF;">&nbsp;&nbsp;<span>Term-2</span></td>
</tr>
</table>
<table style="width:24%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Overall Marks</td><td style="width:90px;">&nbsp;&nbsp;<?php echo $ttmotg1; ?></td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Percentage</td><td style="width:100px;">&nbsp;&nbsp; <?php $perg1 = $ttmotg1/$mid; ?> <?php echo substr($perg1, 0, 4); ?>%</td>
</tr>
</table>
<table style="width:13%; float:left; font-size:20px; margin-top:10px; margin-left:22px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;Grade</td><td style="width:100px;">&nbsp;&nbsp;
<?php $gtmg1 = $ttmotg1/$mid;
                              if($gtmg1 > 90)
                             {
                             $res='A1';
                             }
							 if($gtmg1 > 80 && $gtmg1 < 91)
                             {
                             $res= 'A2';
                             }
							 if($gtmg1 > 70 && $gtmg1 < 81)
                             {
                             $res= 'B1';
                             }
							 if($gtmg1 > 60 && $gtmg1 < 71)
                             {
                             $res= 'B2';
                             }
							 if($gtmg1 > 50 && $gtmg1 < 61)
                             {
                             $res= 'C1';
                             }
							 if($gtmg1 > 40 && $gtmg1 < 51)
                             {
                             $res= 'C2';
                             }
							 if($gtmg1 > 32 && $gtmg1 < 41)
                             {
                             $res= 'D';
                             }
							  if($gtmg1 < 33)
                             {
                             $res= 'E';
                             }
							 echo $res;
?>
</td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:22px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Rank</td> <td style="width:100px;">&nbsp;&nbsp;<?php echo $rowh1['vision']; ?></td>
</tr>
</table>


<table style="width:16%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;<span>Final</span></td>
</tr>
</table>
<table style="width:24%; float:left; font-size:20px; margin-top:10px; margin-left:17px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Overall Marks</td><td style="width:90px;">&nbsp;&nbsp;
<?php 
$fmt = ($ttmotg1+$ttmot1)/2; 
echo $tfmt = round($fmt);
?></td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Percentage</td><td style="width:100px;">&nbsp;&nbsp; <?php $fpert = $tfmt/$mid; ?> <?php echo substr($fpert, 0, 4); ?>%</td>
</tr>
</table>
<table style="width:13%; float:left; font-size:20px; margin-top:10px; margin-left:23px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;Grade</td><td style="width:100px;">&nbsp;&nbsp;
<?php $fpert = $tfmt/$mid;
                             if($fpert > 90)
                             {
                             $res='A1';
                             }
							 if($fpert > 80 && $fpert < 91)
                             {
                             $res= 'A2';
                             }
							 if($fpert > 70 && $fpert < 81)
                             {
                             $res= 'B1';
                             }
							 if($fpert > 60 && $fpert < 71)
                             {
                             $res= 'B2';
                             }
							 if($fpert > 50 && $fpert < 61)
                             {
                             $res= 'C1';
                             }
							 if($fpert > 40 && $fpert < 51)
                             {
                             $res= 'C2';
                             }
							 if($fpert > 32 && $fpert < 41)
                             {
                             $res= 'D';
                             }
							  if($fpert < 33)
                             {
                             $res= 'E';
                             }
							 echo $res;
?>
</td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:22px;color:#000; border:1px #000 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td style="color:#FFFFFF; background-color:#77ab59;">&nbsp;&nbsp;Rank</td><td style="width:100px;">&nbsp;&nbsp;<?php echo $rowh2['vision']; ?></td>
</tr>
</table>
<br clear="all" /><br clear="all" />
<table style="width:50%; float:left; font-size:20px; margin-top:5px; margin-left:19px;color:#000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>Promoted / Detained to Class : </td>
</tr>
</table>
<br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" />
<table border="0" style="width:100%;margin-top:20px; font-size:20px; font-weight:bold;color:#000;">
<tr>
<td style="width:300px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Date:</td>
<td style="width:250px;">Class Teacher's Sign.</td>
<td style="width:250px;">Parent's Sign.</td>
<td style="width:250px;">Principal's Sign./Seal</td>
</tr>
</table>

</div>
</body>
</html>