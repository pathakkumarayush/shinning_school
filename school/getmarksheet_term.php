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
<title>Nursery-LKG Marksheet</title>
</head>
<style>
.tbl{ width:162px;color:#000; border:1px #43C3DD solid; font-size:21px; font-weight:bold;}
.tb2{ width:70px;color:#000; border:1px #43C3DD solid; font-size:21px; font-weight:bold;}
.sn{ width:140px!important; line-height:30px;}
.sn1{ width:140px!important;line-height:30px;}
</style>     
<body style="font-family:Calibri;">
<?php
session_start();
require_once("../db.php"); 
echo $term=$_GET['exam'];
echo $uid=$_GET['student_id'];
$i=1;
$search=mysqli_query($con,"select * from student where uid='$uid' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
$rowstud=mysqli_fetch_array($search);
$uid=$rowstud['uid'];
?>	
<div style="width:1050px;height:1531px; border:6px #171a4a solid;">
<div style="width:100%; margin:0 auto; height:auto;">

<div style="float:left; width:100%;"><span style="font-size:71px; font-family:cambria; color:#da1010;">
<img src="https://smarterponline.com/gse/images/gse.jpg" style=
"width:100%";>
</div>
<br clear="all" />
	  </div>
<br clear="all" />
<div style="width:100%; margin-top:3px; font-size:25px; background-color:#171a4a; height:auto; font-weight:bold; line-height:28px; color:#FFFFFF">
<center>PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
</div>	 
<div style="width:100%; margin-top:3px; font-size:25px; background-color:#171a4a; height:auto; font-weight:bold; line-height:28px; color:#FFFFFF">
<center>Report Card</center>
</div>	
<div style="width:100%; margin-top:3px; font-size:25px; background-color:#171a4a; height:auto; font-weight:bold; line-height:28px; color:#FFFFFF">
<center>Scholar's Profile</center>
</div>	
<div style="width:100%;height:auto;">
<div style="width:37%; float:left; margin-left:5px; height:130px; ">
<table style="margin-left:10px; width:500px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>

</table>
</div>
<div style="width:35%; float:left; height:130px;">
<table style="margin-left:10px; width:350px; margin-top:5px;font-size:20px;color:#303192; font-weight:bold;">
<tr><td class="sn1">Class</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
<tr><td>Schoolar No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td></tr>
<tr><td>SSSMID</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_sssmid']); ?></td></tr>
</table>
</div>
<div style="width:25%; float:left; height:100px;">
<table style="margin-left:10px; width:500px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Roll No.</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_rollno']); ?></td></tr>
<tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>
<tr><td class="sn">Attendane%</td><td class="snn">&nbsp;:&nbsp;N.A</td></tr>
</table>
</div>
<table style="margin-left:10px; width:980px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">&nbsp;Address</td><td class="snn">&nbsp;&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?> </td></tr>
</table>

</div>
<div style="width:100%; margin-top:10px; background-color:#171a4a;font-size:25px;font-weight:bold; height:auto; line-height:29px; color:#FFFFFF">
<center>ACADEMIC PERFORMANCE</center>
</div>
<br clear="all" />
	  
<div style="width:100%;height:auto;">
<div style="width:100%;">
<?php
if($term=="$term")
{
?>
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:12px; margin-top:10px;font-size:21px; color:#244357;">
<thead>
      <tr>
        <th colspan="10" style="border:1px #303192 solid; line-height:30px; font-weight:bold; background-color:#171a4a; color:#FFFFFF;">Scholastic Academic</th>
       
      </tr>
    </thead>
<tr style="border:1px #303192 solid; line-height:30px; font-weight:bold; background-color:#171a4a; color:#FFFFFF;">

<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="4">
<center>TERM-1 <br />(100 MARKS)</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="4">
<center>TERM-2 <br />(100 MARKS)</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;solid;border-right:3px #303192 solid;" colspan="2">
&nbsp;OVERALL AVERAGE<br /> &nbspTERM1(50)+TERM2(50)&nbsp;</td>
</tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#303192;border:1px #303192 solid;border-left:3px #303192 solid;font-size:20PX; width:200PX;">
<tr><td style="line-height:54px; font-weight:bold;"><center>SUBJECT</center></td></tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='".$_SESSION['session']."'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:35PX;">
<td>
&nbsp;&nbsp;
<?php echo $sub_row['1']; ?>

</td></tr>
<?php } ?>
</table>
</td>
<?php echo $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' and examination_session='".$_SESSION['session']."'");
$id=mysqli_fetch_row($de);
 $er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='".$_SESSION['session']."'");
$len=mysqli_num_rows($sub);
$t=0;
$gtgtm=0;
$ttmot1=0;
while($t<($len))
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:74px;color:#303192; border:1px #303192 solid; font-size:20px;">
 <?php 
 if($row[0]=="EVALUATION-1" || $row[0]=="EVALUATION-2")
 {
 $per=50;
 }
 elseif($row[0]=="CYCLE-I" || $row[0]=="CYCLE-III")
 {
 $per=20;
 }
 else{$per=30;}
 ?>
<tr>
<?php 
if($row[0]=='SA-1')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>EVALUATION-1<br /><?php echo $per; ?></center>
</td>
<?php
}
else if($row[0]=='CYCLE-I')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>CYCLE-I<br /><?php echo $per; ?></center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;width:50px;font-weight:bold;">
<center>CYCLE-II<br /><?php echo $per; ?></center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM1' and ses='".$_SESSION['session']."'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:35PX;">
<td><center>
<?php           
$marks = $row['1'];
$final_grade1=$marks;
$final_grade = $final_grade1;
if($final_grade=='0')
{
echo 'Ab';
}
else
{
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#303192; border:1px #303192 solid; font-size:20px; width:70px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>TOTAL<br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:35px;">
<td><center>
<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
$tmo = $markstot;
if($tmo=='')
{
$mto = '-';
}else{
$mto = $tmo;
}
echo $mto;
$ttmot1+=$mto;
$finalmarks[0][$t]=$markstot/2;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM2' and examination_session='".$_SESSION['session']."' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='".$_SESSION['session']."'");
$len=mysqli_num_rows($sub);
$t=0;
$ttmotg1=0;
while($t<($len))
{
$final_cal1[$t]=0;
$fa1[$t]=0;
$sa1[$t]=0;
$t++;
}
while($row=mysqli_fetch_row($er))
{
$te_cal=0;
?>

<td>
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:74px;color:#303192; border:1px #303192 solid; font-size:20px;">
<?php 
 if($row[0]=="SA-1" || $row[0]=="SA-2")
 {
 $per=70;
 }
 else
 {
 $per=15;
 }
 ?>
<tr>
<?php 
if($row[0]=='SA-2')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>SA-II<br /><?php echo $per; ?></center>
</td>
<?php
}
else if($row[0]=='FA-3')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>FA-III<br /><?php echo $per; ?></center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>FA-IV<br /><?php echo $per; ?></center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM2' and ses='".$_SESSION['session']."'") 
or die(mysqli_error());
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
$marks = $row['1'];
$final_grade1=$marks;
$final_grade = $final_grade1;
/*$te_cal++;*/
//echo $final_grade;
if($final_grade=='0'){
echo 'A';
}
else{
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#303192; border:1px #303192 solid; font-size:20px; width:70px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>TOTAL<br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:35px;">
<td><center>
<?php /*$final_cal[$t]=0;*/	    
$markstot1=0;                 
$markstot1 = $final_cal1[$t];
$tmo1 = $markstot1;
$mto1 = $tmo1;
echo $mto1;
$ttmotg1+=$mto1;
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#303192; border:1px #303192 solid;width:120px; font-size:20px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>TOTAL<br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:35px;">
<td><center>
<?php                         
$gtm = $finalmarks[1][$t]+$finalmarks[0][$t];
echo $gtm = round($finalmarks[1][$t]+$finalmarks[0][$t]);
$ttmotg11+=$gtm;
$t++; 
?>

</center>
</td>
</tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:120px;color:#303192; border:1px #303192 solid;border-right:3px #303192 solid; font-size:20px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>FINAL<br />GRADE&nbsp;</center></td></tr>
<?php $t=0;
while($t<$len)
{?> 
<tr style="line-height:35px;">
<td><center>
<?php                         
$gtm = $finalmarks[1][$t]+$finalmarks[0][$t];
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
<br clear="all" />



<?php
$sid = $rowstud['student_id'];
$coscholastic1=mysqli_query($con,"select * from other_marks  where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='".$_SESSION['session']."'");
$rowco1=mysqli_fetch_array($coscholastic1);
$coscholastic2=mysqli_query($con,"select * from other_marks  where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM2' and session='".$_SESSION['session']."'");
$rowco2=mysqli_fetch_array($coscholastic2);
?>
<table style="width:48%; float:left; margin-top:15px; margin-left:12px;color:#303192; border:1px #303192 solid;font-size:20px;font-weight:bold;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#171a4a; color:#FFFFFF;">
<td align="center" style="font-weight:bold">Co-Scholastic Areas <br />(3 Point Grading Scale A, B, C)</td>
<td align="center" style="width:60px;">T1</td>
<td align="center" style="width:60px;">T2</td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Activity</td>
<td align="center"><?php echo $rowco1['computer']; ?></td>
<td align="center"><?php echo $rowco2['computer']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Hand Writing</td>
<td align="center"><?php echo $rowco1['art_activity']; ?></td>
<td align="center"><?php echo $rowco2['art_activity']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;Art Education</td>
<td align="center"><?php echo $rowco1['drawing']; ?></td>
<td align="center"><?php echo $rowco2['drawing']; ?></td>
</tr>


<tr style="line-height:27px;">
<td>&nbsp;Music/Dance</td>
<td align="center"><?php echo $rowco1['disci']; ?></td>
<td align="center"><?php echo $rowco2['disci']; ?></td>
</tr>

<tr style="line-height:27px;">
<td>&nbsp;</td>
<td align="center"></td><td align="center"></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;</td>
<td align="center"></td><td align="center"></td>

</tr>

</table>

<?php
$discipline1=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='".$_SESSION['session']."'");
$rowdc1=mysqli_fetch_array($discipline1);
$discipline2=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM2' and session='".$_SESSION['session']."'");
$rowdc2=mysqli_fetch_array($discipline2);
?>
<table style="width:48%; float:left; font-size:20px; margin-top:15px; margin-left:16px;color:#303192; border:1px #303192 solid;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#171a4a; color:#FFFFFF;">
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
<td>&nbsp;Resp. for Rules & Regulations</td>
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
</table>

<?php
$sid = $rowstud['student_id'];
$healthq=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='TERM1'");
$rowh=mysqli_fetch_array($healthq);

$healthq1=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='TERM2'");
$rowh1=mysqli_fetch_array($healthq1);
?>

<table style="width:49%; float:left; font-size:20px; margin-top:10px; margin-left:15px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;">
<td><span style="color:#171a4a">Attendance Term 1 :</span> <?php echo $rowh['height']; ?></td>
</tr>
</table>
<table style="width:48%; float:left; font-size:20px; margin-top:10px; margin-left:10px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;">
<td><span style="color:#171a4a">Attendance Term 2 :</span> <?php echo $rowh1['height']; ?></td>
</tr>
</table>

<br clear="all" />
<table style="width:98%; float:left; font-size:20px; margin-top:15px; margin-left:5px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#171a4a">Remarks Term 1 :</span> <?php echo $rowh['weight']; ?></td>
</tr>
</table>

<table style="width:98%; float:left; font-size:20px; margin-top:15px; margin-left:5px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#171a4a">Remarks Term 2 :</span> <?php echo $rowh1['weight']; ?></td>
</tr>
</table>
<br clear="all" />


<table style="width:16%; float:left; font-size:20px; margin-top:10px; margin-left:12px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#171a4a">Term-1</span></td>
</tr>
</table>
<table style="width:24%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;Overall Marks</td><td style="width:90px;">&nbsp;&nbsp;<?php echo $ttmot1; ?></td>
</tr>
</table>

<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<td>&nbsp;Percentage</td><td style="width:100px;">&nbsp;&nbsp; <?php $perg = $ttmot1/$mid; ?> <?php echo substr($perg, 0, 4); ?>%</td>
</tr>
</table>
<table style="width:13%; float:left; font-size:20px; margin-top:10px; margin-left:25px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;Grade</td><td style="width:100px;">&nbsp;&nbsp;
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
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:25px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;Ranks</td><td style="width:100px;">&nbsp;&nbsp;<?php  echo $rowh['vision']; ?></td>
</tr>
</table>



<br clear="all" />
<br clear="all" />
<table style="width:16%; float:left; font-size:20px; margin-top:10px; margin-left:12px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#171a4a">Term-2</span></td>
</tr>
</table>
<table style="width:24%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;Overall Marks</td><td style="width:90px;">&nbsp;&nbsp;<?php echo $ttmotg1; ?></td>
</tr>
</table>
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:19px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<td>&nbsp;&nbsp;Percentage</td><td style="width:100px;">&nbsp;&nbsp; <?php $perg1 = $ttmotg1/$mid; ?> <?php echo substr($perg1, 0, 4); ?>%</td>
</tr>
</table>
<table style="width:13%; float:left; font-size:20px; margin-top:10px; margin-left:25px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;Grade</td><td style="width:100px;">&nbsp;&nbsp;
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
<table style="width:18%; float:left; font-size:20px; margin-top:10px; margin-left:25px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;Ranks</td><td style="width:100px;">&nbsp;&nbsp;<?php  echo $rowh1['vision']; ?></td>
</tr>
</table>


<br clear="all" />
<table border="0" style="width:100%; margin-top:100px; font-size:23px; font-weight:bold;color:#303192;">
<tr>
<td style="width:300px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Date:</td>
<td style="width:250px;">Class Teacher's Sign.</td>
<td style="width:250px;">Parent's Sign.</td>
<td style="width:250px;">Principal's Sign./Seal</td>
</tr>
</table>


<br clear="all" />
</div>

	 
	 
	  <br clear="all" />
	  </div>
    
    
     
	 

	