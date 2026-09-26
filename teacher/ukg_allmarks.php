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
<title>Untitled Document</title>


</head>
<style>
 
.tbl{ width:261px;color:#000; border:1px #43C3DD solid; font-size:24px; font-weight:bold;}
.tb2{ width:127px;color:#000; border:1px #43C3DD solid; font-size:24px; font-weight:bold;}
.sn{ width:170px!important; line-height:36px;}
.sn1{ width:170px!important;line-height:36px;}
</style>  
    
<body style="font-family:Calibri;">
<?php
session_start();
require_once("../db.php"); 
$term=$_GET['exam'];
$i=1;
$search=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{
$uid=$rowstud['uid'];
?>	
<div style="width:1050px;height:1531px; border:6px #1B2F3A solid;background-color:#fff">
<div style="width:100%; margin:0 auto; height:auto;">
      <div style="float:left;"><img src="l.png" style="height:125px; width:105px; margin-top:15px; margin-left:5px;" /></div>
      <div style="float:left; margin-left:3px;">
	  <span style="font-size:81px; font-family:Arial Narrow; color:#000; margin-left:0px; ">&nbsp;<b>GOYENKA PUBLIC SCHOOL</b></span>
      <div style="width:100%; margin-top:10px; font-size:40px; background-color:#244357; height:auto; line-height:40px; font-weight:bold; font-family:Calibri; color:#FFFFFF">
      <center>REPORT CARD (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
      </div>
      </div>
	  <br clear="all" />
	  </div>
<br clear="all" />
	  
<div style="height:190px; width:97%;border:1px #244357 solid; margin-left:12px; background-color:#43C3DD;">
<div style="width:48%; float:left; margin-left:5px; height:120px; ">
<table style="margin-left:10px; width:500px;font-size:24px; color:#000;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>
</table>
</div>
<div style="width:39%;float:left;height:148px;">
<table style="margin-left:10px; width:350px; margin-top:5px;font-size:24px;color:#000; font-weight:bold;">
<tr><td class="sn1">Class</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
<tr><td>Admission No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td></tr>
<tr><td>Contact No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_contactno']); ?></td></tr>
</table>
</div>
<div style="width:10%; float:left; height:100px;">
<img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud['student_img'];  ?>" style="height:140px; margin-left:3px; width:115px; margin-top:8px; " />
</div>
<table style="margin-left:10px; width:980px;font-size:24px; color:#000;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">&nbsp;Address</td><td class="snn">&nbsp;&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?> </td></tr>
</table>
<?php
$sid = $rowstud['student_id'];
?>
<br clear="all" />
</div>

	  
<div style="width:100%;height:auto;">
<div style="">

<?php
if($term=="$term")
{
?>
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:12px; margin-top:10px;font-size:24px; color:#244357; background-color:#E2F4FF;">
<tr style="line-height:55px; font-weight:bold;  font-size:24px; font-weight:bold;background-color:#244357; color:#FFFFFF;">
<td style="border-right:2px #43C3DD solid;"><center>SCHOLASTIC AREA</center></td>
<td colspan="5">
<center><?php  if ($term=='TERM1'){ echo 'TERM-1'; }else { echo 'TERM-2'; } ?></center></td>
<td style="border-left:2px #43C3DD solid;">
<center>GRADE</center></td>
</tr>
<tr>
<td>

<table class="tbl" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px #244357 solid;border-left:1px #244357 solid;border-right:2px #244357 solid;">
<tr>
<td style="line-height:54px; font-weight:bold; background-color:#43C3DD; color:#000;border-top:1px #43C3DD solid;" align="center">SUBJECT</td>
</tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='".$_SESSION['session']."'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:38px; font-weight:normal;">
<td style="border-top:2px #43C3DD solid;" align="center">
<?php echo $sub_row['1']; ?>
</td></tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='$term' and examination_session='".$_SESSION['session']."'");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from termss where term='$id[0]' and session='".$_SESSION['session']."'");
$len=mysqli_num_rows($sub);
$t=0;
$gtgtm=0;
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

<table class="tb2" border='0' cellpadding="0" cellspacing="0" style="border-bottom:1px #244357 solid;">
<?php 
 if($row[0]=="FA1" || $row[0]=="FA2")
 {
 $per=40;
 }
 else if($row[0]=="SA1" || $row[0]=="SA1")
 {
 $per=50;
 }
 else{$per=5;
 }
 ?>
<tr style="background-color:#43C3DD; color:#000;">
<?php 
if($row[0]=='FA1')
{
?>
<td style="line-height:27px;font-weight:bold;border-top:1px #43C3DD solid;">
<center>FA1<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='SA1')
{
?>
<td style="line-height:27px;font-weight:bold;border-top:1px #43C3DD solid;">
<center>SA1<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='NB1')
{
?>
<td style="line-height:27px;font-weight:bold;border-top:1px #43C3DD solid;">
<center>NOTEBOOK<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;width:50px;font-weight:bold;border-top:1px #43C3DD solid;">
<center>ACTIVITY<br />(<?php echo $per; ?>)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='$term' and ses='".$_SESSION['session']."'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:38px;font-weight:normal;">
<td style="border-top:2px #43C3DD solid;"><center><?php           
$marks = $row['1'];
$final_grade1=$marks;
$final_grade = $final_grade1;
//$final_grade = substr($final_grade1,0,3);
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
<table class="tb2" border="0" cellpadding="0" cellspacing="0" style="border-right:0px #244357 solid;border-bottom:1px #244357 solid;" >
<tr></tr>
<tr></tr>
<tr><td style="line-height: 27px;font-weight:bold;background-color:#43C3DD; color:#000;border-top:1px #43C3DD solid;"><center>TOTAL<br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:38px;font-weight:normal;">
<td style="border-top:2px #43C3DD solid;"><center>

<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
echo $tmo = $markstot;
$finalmarks[0][$t]=$markstot;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px #244357 solid;border-left:2px #244357 solid;border-right:1px #244357 solid;">
<tr><td style="line-height:27px;font-weight:bold;background-color:#43C3DD; color:#000;border-top:1px #43C3DD solid;"><center>FINAL GRADE</center></td></tr>

<?php $t=0;
while($t<$len)
{

?> 
<tr style="line-height:38px;font-weight:normal;">
<td style="border-top:2px #43C3DD solid;"><center>
<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
$tmo = $markstot;

$gtgtm+=$tmo;
 
$finalmarks[0][$t]=$markstot/2;

                             if($tmo > 90)
                             {
                             $res='A1';
                             }
							 if($tmo > 80 && $tmo < 91)
                             {
                             $res= 'A2';
                             }
							 if($tmo > 70 && $tmo < 81)
                             {
                             $res= 'B1';
                             }
							 if($tmo > 60 && $tmo < 71)
                             {
                             $res= 'B2';
                             }
							 if($tmo > 50 && $tmo < 61)
                             {
                             $res= 'C1';
                             }
							 if($tmo > 40 && $tmo < 51)
                             {
                             $res= 'C2';
                             }
							 if($tmo < 41)
                             {
                             $res= 'D';
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
$coscholastic1=mysqli_query($con,"select * from other_marks1  where student='$sid' and class='".$rowstud['student_class']."' and exam='FA1' and session='".$_SESSION['session']."'");
$rowco1=mysqli_fetch_array($coscholastic1);

$coscholastic2=mysqli_query($con,"select * from other_marks1  where student='$sid' and class='".$rowstud['student_class']."' and exam='SA1' and session='".$_SESSION['session']."'");
$rowco2=mysqli_fetch_array($coscholastic2);
?>
<table style="width:48%; float:left; margin-top:-8px; margin-left:12px;color:#000;background-color:#E2F4FF; solid;font-size:24px;border-bottom: 1px #244357 solid;border-left: 1px #244357 solid;border-right: 1px #244357 solid;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#244357; color:#FFFFFF;">
<td align="center" style="font-weight:bold;border-right: 2px #43C3DD solid;">CO-SCHOLASTIC AREA <br />(5 POINT GRADING)</td>
<td align="center" style="width:150px;" colspan="2">

<table border="0" cellpadding="0" cellspacing="0" style="width:100%; color:#FFFFFF; font-size:24px; font-weight:bold;border:0px #244357 solid;">
<tr style="line-height:26px;"><td colspan="2" align="center"><?php  if ($term=='TERM1'){ echo 'TERM-1'; }else { echo 'TERM-2'; } ?></td></tr>
<tr style="line-height:26px;"><td align="center">FA1</td><td align="center">SA1</td></tr>
</table>
</td>
</tr>

<tr style="line-height:41px;" align="center">
<td style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;ENGLISH RHYMES/ORAL</td>
<td align="center" style="width:80px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;"><?php echo $rowco1['art']; ?></td>
<td align="center" style="width:80px;border-top: 2px #43C3DD solid;"><?php echo $rowco2['art']; ?></td>
</tr>

<tr style="line-height:41px;" align="center">
<td style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;HINDI RHYMES/ORAL</td>
<td align="center" style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;"><?php echo $rowco1['music']; ?></td>
<td align="center" style="border-top: 2px #43C3DD solid;"><?php echo $rowco2['music']; ?></td>
</tr>

<tr style="line-height:40px;" align="center">
<td style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;MATHS ORAL</td>
<td align="center" style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;"><?php echo $rowco1['dance']; ?></td>
<td align="center" style="border-top: 2px #43C3DD solid;"><?php echo $rowco2['dance']; ?></td>
</tr>

<tr style="line-height:40px;" align="center">
<td style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;E.V.S. ORAL</td>
<td align="center" style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;"><?php echo $rowco1['gk']; ?></td>
<td align="center" style="border-top: 2px #43C3DD solid;"><?php echo $rowco2['gk']; ?></td>
</tr>

<tr style="line-height:40px;" align="center">
<td style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;G.K. ORAL</td>
<td align="center" style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;"><?php echo $rowco1['game']; ?></td>
<td align="center" style="border-top: 2px #43C3DD solid;"><?php echo $rowco2['game']; ?></td>
</tr>

<tr style="line-height:40px;" align="center">
<td style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;CONVERSATION</td>
<td align="center" style="border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;"><?php echo $rowco1['moral']; ?></td>
<td align="center" style="border-top: 2px #43C3DD solid;"><?php echo $rowco2['moral']; ?></td>
</tr>



</table>


<?php
$exm = $_GET['exam'];
$att1=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."'  and exam='$exm' and session='".$_SESSION['session']."'");
$rowat1=mysqli_fetch_array($att1);
?>
<table style="width:49%;float:left; margin-top:-8px;font-size:24px;margin-left:5px;color:#000;background-color:#E2F4FF;border-bottom: 1px #244357 solid;border-left: 1px #244357 solid;border-right: 1px #244357 solid;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:50px;background-color:#244357; color:#FFFFFF; font-weight:bold;">
<td style="width:324px;border-right: 2px #43C3DD solid;" align="center">MY TEACHER SAYS</td>
<td style=""><center><?php  if ($term=='TERM1'){ echo 'TERM-1'; }else { echo 'TERM-2'; } ?></center></td>
</tr>

<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;" style="">&nbsp;&nbsp;I can sing and dance</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['dance']; ?></center></td>

</tr>

<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I enjoy my work</td>
<td style="solid;width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['en_w']; ?></center></td>

</tr>
<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I love to play</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['paly']; ?></center></td>

</tr>
<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I do my work carefully</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['w_c']; ?></center></td>

</tr>
<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I listen to instructions</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['list_in']; ?></center></td>

</tr>
<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I do my homework regularly</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['hwk']; ?></center></td>

</tr>
<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I know my table manners</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['know_t']; ?></center></td>
</tr>

<tr style="line-height:24px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I am neat & tidy</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['neat']; ?></center></td>
</tr>

<tr style="line-height:23px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I am confident</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['cond']; ?></center></td>
</tr>

<tr style="line-height:23px;" align="center">
<td style="width:324px;border-top: 2px #43C3DD solid;border-right: 2px #43C3DD solid;">&nbsp;&nbsp;I am regular</td>
<td style="width:165px;border-top: 2px #43C3DD solid;"><center><?php echo $rowat1['reg']; ?></center></td>

</tr>
</table>
<?php

$att=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowat=mysqli_fetch_array($att);

$att1=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowat1=mysqli_fetch_array($att1);

?>
<br clear="all" />
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>

<?php
$healthqt=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='$exm'");
$rowht=mysqli_fetch_array($healthqt);
?>
<?php
$remark=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='$exm'");
$rowrk=mysqli_fetch_array($remark);
?>

<table border="0"  cellpadding="0" cellspacing="0" style="margin-left:12px;font-size:22px;font-weight:normal;margin-top:10px;color:#000;border:1px #244357 solid;width:1023px;">
<tr style="line-height:55px; background-color:#244357">
<td style="border-right:1px #244357 solid; color:#FFFFFF;" align="center">&nbsp;&nbsp </td>
<td style="border-right:1px #244357 solid; color:#FFFFFF;" align="center">&nbsp;&nbsp;<b>TERM-1</b></td>
</tr>

<tr style="line-height:38px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; background-color:#43C3DD;border-top:1px #244357 solid;">
<?php 
if($rowstud['student_class']=='UKG')
{
$tot = '600';
}else{
$tot = '500';
}
?>
&nbsp;&nbsp;FINAL TOTAL (<?php echo $tot; ?>)
</td>
<td style="width:1051px;background-color:#E2F4FF;border-top:2px #244357 solid;"><center><?php echo $gtgtm; ?></center></td>
</tr>

<tr style="line-height:38px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; background-color:#43C3DD;border-top:1px #244357 solid;">&nbsp;&nbsp;PERCENTAGE</td>
<td style="width:165px;background-color:#E2F4FF;border-top:1px #244357 solid;">
<center><?php $perg = $gtgtm/$mid; ?><?php echo substr($perg, 0, 4); ?>%</center></td>
</tr>

<tr style="line-height:38px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; background-color:#43C3DD;border-top:1px #244357 solid;">&nbsp;&nbsp;POSITION/RANK</td>
<td style="width:165px;background-color:#E2F4FF;border-top:1px #244357 solid;"><center><?php echo $rowrk['vision']; ?></center></td>
</tr>

<tr style="line-height:60px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; background-color:#43C3DD;border-top:1px #244357 solid;">&nbsp;&nbsp;TEACHER'S REMARK</td>
<td style="width:165px;background-color:#E2F4FF;border-top:1px #244357 solid;"><center><?php echo $rowrk['weight']; ?></center></td>
</tr>
</table>


<table border="0" cellpadding="0" cellspacing="0" style="margin-left:12px;font-size:22px;font-weight:normal; margin-top:10px;color:#000;border:1px #244357 solid; width:1023px;">
<tr style="line-height:38px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; background-color:#43C3DD;">&nbsp;&nbsp;HEIGHT(cm)</td>
<td style="width:959px;background-color:#E2F4FF;"><center><?php echo $rowht['height']; ?></center></td>
</tr>

<tr style="line-height:38px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; border-top:1px #244357 solid;background-color:#43C3DD;">&nbsp;&nbsp;WEIGHT(kg)</td>
<td style="width:165px;background-color:#E2F4FF;border-top:1px #244357 solid;"><center><?php echo $rowht['weight']; ?></center></td>
</tr>
</table>


<table border="0"  cellpadding="0" cellspacing="0" style="margin-left:12px;font-size:22px;font-weight:normal; margin-top:10px;color:#000;border:1px #244357 solid; width:1023px;">
<tr style="line-height:38px;" align="center">
<td style="width:324px;border-right:1px #244357 solid; background-color:#43C3DD;">&nbsp;&nbsp;ATTENDANCE</td>
<td style="width:980px;background-color:#E2F4FF;"><center><?php echo $rowrk['height']; ?></center></td>
</tr>
</table>

<table border="0" style="width:100%;margin-top:65px; font-size:25px; font-weight:bold;color:#000;">
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
     <?php
      $i++;
	  }
      ?>
    
     
	 

	