<?php
session_start();
require_once("../db.php"); 
require_once("words.php");
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
.tbl{ width:150px;font-size:21px!important;}
.tb2{ width:90px;font-size:21px!important;}
.sn{width:168px!important;font-size:21px!important;color:#0033FF;}
.sn1{width:138px!important;font-size:21px!important;}
.sn2{width:150px!important;font-size:21px!important;color:#0033FF;}
.tbl tr{line-height:45px!important;font-size:21px!important;}
.tbl1 tr{line-height:40px!important;font-size:21px!important;}
.fsz{font-size:21px!important;}

.wt{
  content: ' ';
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background:  url(wr.png);
  background-position: center;  
  background-repeat: no-repeat;
  background-attachment: fixed;
  z-index: -1;
  opacity: 0.2;
}

</style>
<?php
$term=$_GET['exam'];
$uid=$_GET['student_id'];
$ses=$_GET['ses'];
$i=1;
$search=mysqli_query($con,"select * from student where uid='$uid' and student_session='$ses' and status='0' order by student_name Asc");
$rowstud=mysqli_fetch_array($search);
$uid=$rowstud['uid'];
$clstech=mysqli_query($con,"select * from class_teacher where class='".$rowstud['student_class']."' and teacher_session='$ses'");
$rowcls=mysqli_fetch_array($clstech);

$clsth=mysqli_query($con,"select * from teacher where uid='".$rowcls['teacher']."'");
$rowcls=mysqli_fetch_array($clsth);
?>	


<div style="width:1050px;height:1525px; border:6px #000 solid;font-family:Arial;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:auto;margin-top:-10px;">
<img src="ml.png" style=" width:1030px; height:315px; margin-left:10px;" />
<br clear="all" />
</div>

<br clear="all" />	
<div style="width:100%;height:auto;">
<div style="width:69%; float:left;height:230px;text-transform: capitalize;">
<table style="width:100%;font-size:21px; margin-left:12px; font-size:21px; font-weight:bold;color:#000000; " border="0" cellpadding="0" cellspacing="0" class="tbl1">
<tr><td class="sn">Class</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
<tr><td class="sn">Student's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>

<tr><td class="sn">Date Of Birth</td><td class="snn">&nbsp;:&nbsp;<?php echo $dob = $rowstud['student_dob']; ?> </td></tr>
<tr>
<td class="sn" colspan="2">D.O.B(In Words)&nbsp;&nbsp;<span style="color:#000000">:
<?php
if(!empty($rowstud['student_dob']))
{
?>
<?php 
$mydate = strtotime($rowstud['student_dob']);
$dob = date('d', strtotime($rowstud['student_dob'])); 
$ya = date('Y', strtotime($rowstud['student_dob'])); 
echo convert_digit_to_words($dob); ?>
<?php echo date('F', $mydate); ?>

<?php echo convert_digit_to_words($ya); ?>
 <?php }?>
 </span>
</td>
</tr>
</table>
</div>
<div style="width:30%; height:230px;float:left;">
<table style="width:100%;font-size:21px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tb12">
<tr style="line-height:40px;"><td class="sn2">Roll No.</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['rno']); ?></td></tr>
<tr style="line-height:40px;"><td class="sn2">Admission No.</td><td class="snn">&nbsp;:&nbsp;<span style="color:#FF0000;"><?php echo $rowstud['student_scholar']; ?></span></td></tr>
<tr style="line-height:40px;"><td class="sn2">FMID No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['family_id']; ?></td></tr>
<tr style="line-height:40px;"><td class="sn2">SSSMID</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['religion']; ?></td></tr>
<tr style="line-height:40px;"><td class="sn2">Aadhar No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_rollno']; ?></td></tr>
</table>
</div>


<br clear="all" />
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div>
<?php
if($term=="$term")
{
?>
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:1px; margin-top:0px;font-size:21px; color:#244357;">
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#FF0000;border:1px #000000 solid;border-left:3px #000000 solid;border-top:3px #000000 solid;font-size:21PX; width:650PX;">
<tr>
<td style="line-height:50px; font-weight:bold; width:197px;"><center>SUBJECT</center></td>
<td style="line-height:23px; font-weight:bold; width:337px;border-left:3px #000000 solid" colspan="3"><center>MAXIMUM MARKS<br /></center></td>

<td style="line-height:23px; font-weight:bold; width:230px;border-left:3px #000000 solid" colspan="2"><center>MINIMUM MARKS<br /></center></td>
</tr>
</table>
</td>

<td colspan="3">
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#FF0000;border-top:3px #000000 solid;  font-size:21px; width:285px;">
<tr><td style="line-height:50px;font-weight:bold;"><center>MARKS OBTAINED</center></td></tr>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#FF0000; border-top:3px #000000 solid;border-right:3px #000000 solid; border-left:1px #000000 solid; font-size:21px; width:108px;">
<tr><td style="line-height:50px;font-weight:bold;"><center>REMARKS</center></td></tr>
</table>
</td>

</tr>

<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;font-size:21PX; width:650PX;">
<tr>
<td style="line-height:25px; font-weight:bold; width:230px;"><center>&nbsp;<img src="su.png" style="width:197px; height:5px; margin-left:-101px; margin-top:-5px; position:absolute;" /></center></td>
<td style="line-height:25px; font-weight:bold; width:230px;border-left:3px #000000 solid"><center>Theory</center></td>
<td style="line-height:25px; font-weight:bold; width:230px;border-left:3px #000000 solid"><center>Practical</center></td>
<td style="line-height:25px; font-weight:bold; width:230px;border-left:3px #000000 solid"><center>Total</center></td>
<td style="line-height:25PX; font-weight:bold;width:200px;border-left:3px #000000 solid;"><center>Theory</center></td>
<td style="line-height:25PX; font-weight:bold;width:200px;border-left:3px #000000 solid;"><center>Practical</center></td>
</tr>

<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='$ses'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:35PX;">
<td style="border-left:1px #000000 solid;">&nbsp;<?php echo $sub_row['1']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"> <?php echo  $sub_row['6']; $tmt+=$sub_row['10']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"><?php echo $sub_row['7']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"><?php echo $sub_row['10']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"><?php echo $sub_row['8']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"><?php echo $sub_row['9']; ?></td>
</tr>
<?php } ?>
</table>
</td>

<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' and examination_session='$ses'");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from termss where term='$id[0]' and session='$ses'");
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:100px;color:#000000; border:1px #000000 solid; font-size:21px;">
 <?php 
 if($row[0]=="Written" || $row[0]=="Written1")
 {
 $per=75;
 }
 else
 {
 $per=25;
 }
 ?>
<tr>
<?php 
if($row[0]=='Annual Exam')
{
?>
<td style="line-height:25px;font-weight:bold;">
<center>Theory</center>
</td>
<?php
}
else
{
?>
<td style="line-height:25px;width:50px;font-weight:bold;">
<center>Practical</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM1' and ses='$ses'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:45PX;">
<td><center>
<?php           
$marks = $row['1'];
$final_grade1=$marks;
$final_grade = $final_grade1;
if($final_grade=='')
{
echo '-';
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000000; border:1px #000000 solid; font-size:21px; width:85px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:25px;font-weight:bold;"><center>TOTAL</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:45px;">
<td><center>
<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
$tmo = $markstot;
$finalmarks[0][$t]=$markstot;                         
echo $tmo;
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



<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000000; border:1px #000000 solid;border-right:3px #000000 solid; font-size:21px; width:112px;">
<tr>
<td style="line-height:25px;font-weight:bold;">&nbsp;
<img src="su.png" style="width:106px; height:4px; margin-left:-6px; margin-top:-4px; position:absolute;" />
</td>
</tr>

<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:45px;">
<td><center>
<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
$tmo = $markstot;
$finalmarks[0][$t]=$markstot;     
if($tmo > 74)
{
echo 'DISTN';
}else{
echo '--';
}                   

$finalmarks[0][$t]=$markstot/2;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>
</tr>


<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;border-top:1px #000000 solid;font-size:21PX; width:650PX;">
<tr>
<td style="line-height:50px; font-weight:bold; width:197px;"><center>&nbsp;</center></td>
<td style="line-height:23px; font-weight:bold; width:314px;border-left:3px #000000 solid" colspan="3"><center>GRAND TOTAL<br /></center></td>

<td style="line-height:23px; font-weight:bold; width:230px;border-left:3px #000000 solid" colspan="2"><center><?php echo $tmt; ?><br /></center></td>
</tr>
</table>
</td>

<td colspan="3">
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#FF0000;border-top:1px #000000 solid;  font-size:21px; width:285px;">
<tr><td style="line-height:50px;font-weight:bold;"><center><?php echo $ttmot1;?></center></td></tr>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#FF0000; border-top:1px #000000 solid;border-right:3px #000000 solid; border-left:1px #000000 solid; font-size:21px; width:108px;">
<tr><td style="line-height:50px;font-weight:bold;"><center>&nbsp;</center></td></tr>
</table>
</td>

</tr>
</table>

<?php
$sid = $rowstud['student_id'];
$att_re=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and exam='Annual Exam' and session='$ses'");
$rowar=mysqli_fetch_array($att_re);

$att_re1=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and exam='Practical/Project' and session='$ses'");
$rowar1=mysqli_fetch_array($att_re1);
 ?>
<br clear="all" /><br clear="all" />
<span style="color:0033CC; margin-left:20px; font-weight:bold; font-size:21px;">Additional Subject</span>
<?php
if($rowstud['student_class']=='XI Math Bio')
{
?>
<table border="1" width="" cellpadding="0" cellspacing="0" style="margin-left:5px; width:99%; border:2px #000000 solid; color:#000; font-size:20PX;">
<tr align="center" style="line-height:45px;">
<td style="width:275px;border-right:2px #000000 solid;">Biology</td>
<td style="width:130px;border-right:2px #000000 solid;">70</td>
<td style="width:130px;border-right:2px #000000 solid;">30</td>
<td style="width:130px;border-right:2px #000000 solid;"><b>100</b></td>
<td style="width:130px;border-right:2px #000000 solid;">23</td>
<td style="width:130px;border-right:2px #000000 solid;">10</td>
<td style="width:130px;border-right:2px #000000 solid;"><b><?php echo $rowar['bio'];?></b></td>
<td style="width:130px;border-right:2px #000000 solid;"><b><?php echo $rowar1['bio'];?></b></td>
<td style="width:130px;border-right:2px #000000 solid; color:#FF0000"><b><?php echo $tbio = $rowar['bio']+$rowar1['bio'];?></b></td>
<td style="width:130px;border-right:2px #000000 solid;"><b><?php 
if($tbio > 74)
{
echo 'DISTN';
}else{
echo '--';
}   
?>
</b></td>
</tr>
</table>
<?php
}
else
{
?>
<table border="1" width="" cellpadding="0" cellspacing="0" style="margin-left:5px; width:99%; border:2px #000000 solid; color:#000; font-size:20PX;">
<tr align="center" style="line-height:45px;">
<td style="width:275px;border-right:2px #000000 solid;">Mathematics</td>
<td style="width:130px;border-right:2px #000000 solid;">70</td>
<td style="width:130px;border-right:2px #000000 solid;">30</td>
<td style="width:130px;border-right:2px #000000 solid;"><b>100</b></td>
<td style="width:130px;border-right:2px #000000 solid;">23</td>
<td style="width:130px;border-right:2px #000000 solid;">10</td>
<td style="width:130px;border-right:2px #000000 solid;"><b><?php echo $rowar['bio'];?></b></td>
<td style="width:130px;border-right:2px #000000 solid;"><b><?php echo $rowar1['bio'];?></b></td>
<td style="width:130px;border-right:2px #000000 solid; color:#FF0000"><b><?php echo $tbio = $rowar['bio']+$rowar1['bio'];?></b></td>
<td style="width:130px;border-right:2px #000000 solid;"><b><?php 
if($tbio > 74)
{
echo 'DISTN';
}else{
echo '--';
}   
?>
</b></td>
</tr>
</table>
<?php
}
?>
<?php			
$qrst=mysqli_query($con,"select subject,obtainmarks,totalmarks,status from marks where student='$uid' and exam='Annual Exam' and status='fail' and ses='$ses'") 
or die(mysqli_error());
$rowcount = mysqli_num_rows($qrst);
//echo $rowcount;
?>
<br clear="all" />
<div style="width:100%; height:auto; margin-top:20px;">

<table style="width:1036px; float:left;margin-left:50px;font-weight:bold; color: #0033CC; font-size:21px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:70px;">
<td style="width:210px;">Result</td>
<td style="width:420px;">:&nbsp;&nbsp;
<?php	
if($rowcount=='1')
{
$ppr = 'Supplementary';
}
else if($rowcount=='2')
{
$ppr = 'Supplementary';
}	
else if($rowcount=='3')
{
$ppr = 'Fail';
}
else if($rowcount=='4')
{
$ppr = 'Fail';
}
else if($rowcount=='5')
{
$ppr = 'Fail';
}
else if($rowcount=='6')
{
$ppr = 'Fail';
}
else if($rowcount=='7')
{
$ppr = 'Fail';
}
else{
$ppr = 'PASS';  
}
echo $ppr;           
?>  
</td> 

<td style="width:135px;">Percentage</td><td>:&nbsp;&nbsp;<?php $perc = $ttmot1*100/$tmt;  echo $pr = substr($perc, 0, 2); ?> %</td>

</tr
></table>

<table style="width:1036px; float:left;margin-left:50px;font-weight:bold; color: #0033CC;font-size:21px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:70px;">
<td style="width:210px;">Promoted to class</td>
<td style="width:420px;">:&nbsp;&nbsp;
<?PHP
if($rowcount=='1')
{
$clss = 'Not Promoted';
}
else if($rowcount=='2')
{
$clss = 'Not Promoted';
}
else if($rowcount=='3')
{
$clss = 'Not Promoted';
}
else if($rowcount=='4')
{
$clss = 'Not Promoted';
}
else if($rowcount=='5')
{
$clss = 'Not Promoted';
}
else if($rowcount=='6')
{
$clss = 'Not Promoted';
}
else if($rowcount=='7')
{
$clss = 'Not Promoted';
}
else if($rowcount=='0')
{

if($rowstud['student_class']=='NURSERY')
{
$clss = 'LKG';
}
if($rowstud['student_class']=='LKG')
{
$clss = 'UKG';
}
if($rowstud['student_class']=='UKG')
{
$clss = 'I';
}
if($rowstud['student_class']=='I')
{
$clss = 'II';
}
if($rowstud['student_class']=='II')
{
$clss = 'III';
}
if($rowstud['student_class']=='III')
{
$clss = 'IV';
}
if($rowstud['student_class']=='IV')
{
$clss = 'V';
}
if($rowstud['student_class']=='V')
{
$clss = 'VI';
}
if($rowstud['student_class']=='VI A')
{
$clss = 'VII';
}
if($rowstud['student_class']=='VI B')
{
$clss = 'VII';
}
if($rowstud['student_class']=='VII A')
{
$clss = 'VIII';
}
if($rowstud['student_class']=='VII B')
{
$clss = 'VIII';
}
if($rowstud['student_class']=='IX A')
{
$clss = 'X';
}
if($rowstud['student_class']=='IX B')
{
$clss = 'X';
}
if($rowstud['student_class']=='IX C')
{
$clss = 'X';
}
if($rowstud['student_class']=='XI Maths')
{
$clss = 'XII';
}
if($rowstud['student_class']=='XI Bio')
{
$clss = 'XII';
}
if($rowstud['student_class']=='XI Com.')
{
$clss = 'XII';
}
if($rowstud['student_class']=='XI Math Bio')
{
$clss = 'XII';
}
if($rowstud['student_class']=='XI Bio Math')
{
$clss = 'XII';
}

}

else{
$clss = '-';
}

echo $clss;
?>

</td> 


<td style="width:135px;">Division</td>
<td>
:&nbsp;&nbsp;<?php                        if($rowcount > 0)
                             {
							 $res2='-';
							 }else
							 
							 {
                             if($perc > 59)
                             {
                             $res2='FIRST';
                             }
							 if($perc > 44 && $perc < 60)
                             {
                             $res2= 'SECOND';
                             }
							 if($perc > 32 && $perc < 45)
                             {
                             $res2= 'THIRD';
                             }
							 if($perc < 33)
                             {
                             $res2= 'Fail';
                             }
							 
							 }
							 echo $res2;




?>

 </td>
</tr>
</table>
<br clear="all" />
</div>
<br clear="all" />
<div style="width:100%; height:120px; margin-top:40px;">
<br clear="all" />
<table border="0" style="width:98%;margin-top:25px; margin-left:50px;font-weight:bold; font-size:22px;color: #FF0000;">
<tr>
<td style="width:325px;"><span style="margin-left:0px;">Class Teacher</span></td>
<td style="width:240px;"> <span style="float:right;font-size:22px; margin-right:77px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen(M.P.)</span></td>
</tr>
</table>
<br clear="all" />
</div>
<?php }?>

<br clear="all" />
</div>
<br clear="all" />
</div>	
<br clear="all" />
</div>
    
  
	   

	