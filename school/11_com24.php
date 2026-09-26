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
.tbl tr{line-height:32px;}
.tbl1 tr{line-height:32px!important;}
.fsz{font-size:21px!important;}
.mtr{font-size:19px!important;}

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
$sid=$rowstud['student_id'];
$clstech=mysqli_query($con,"select * from class_teacher where class='".$rowstud['student_class']."' and teacher_session='$ses'");
$rowcls=mysqli_fetch_array($clstech);

$clsth=mysqli_query($con,"select * from teacher where uid='".$rowcls['teacher']."'");
$rowcls=mysqli_fetch_array($clsth);

$rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='$ses'");
$rowno=mysqli_fetch_array($rno);
?>	


<div style="width:1050px;height:1531px;font-family:Calisto MT;background:url(BK11.png);background-repeat:no-repeat;background-position:center;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:300PX;margin-top:0px;">
<br clear="all" />
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div style="width:99%;height:230px;text-transform: capitalize;">
<table style="width:991;font-size:21px;margin-left:30px; font-size:21px; margin-top:-10PX; font-weight:bold;color:#000000; border:1px #000000 solid;" border="1"  cellpadding="0" cellspacing="0" class="tbl1">
<tr align="center"><td style="font-weight:normal;">Roll Number</td><td style="font-weight:normal;">Samagra ID</td><td style="font-weight:normal;">Scholar No.</td>
<td style="font-weight:normal;">Center No.</td><td style="font-weight:normal;">Enrollment No.</td><td style="font-weight:normal;">Medium </td></tr>
<tr align="center">
<td style="width:150px; color:#B9001C;">&nbsp;<?php echo ucwords($rowstud['rno']); ?></td>
<td style="width:200px;font-weight:bold;color:#B9001C;">&nbsp;<?php echo $rowstud['religion']; ?></td>
<td style="width:250px;color:#B9001C;">&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td>
<td style="width:250px;color:#B9001C;">&nbsp;652075</td>
<td style="width:250px;color:#B9001C;">&nbsp;<?php echo ucwords($rowstud['reg_no']); ?></td>
<td style="width:250px;color:#B9001C;">&nbsp;English</td>
</tr>

<tr><td style="font-weight:normal; width:250px;">&nbsp;Student's Name</td><td colspan="5">&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td style="font-weight:normal;">&nbsp;Father's Name</td><td colspan="5">&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td style="font-weight:normal;">&nbsp;Mother's Name</td><td colspan="5">&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td style="font-weight:normal;">&nbsp;Date Of Birth</td>
<td colspan="5" style="font-weight:bold">&nbsp;<?php echo $dob = $rowstud['student_dob']; ?></td></tr>
<tr><td style="width:180px; font-weight:normal;">&nbsp;DOB(In Words)</td>
<td style="width:200px;font-weight:bold;" colspan="5">
&nbsp;<?php
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
</td>
</tr>

<tr><td style="font-weight:normal;">&nbsp;Class</td>
<td>&nbsp;
<?php 
//echo $rowstud['student_class']; 
if($rowstud['student_class']=='XI Maths' || $rowstud['student_class']=='XI Bio' || $rowstud['student_class']=='XI Com.' || $rowstud['student_class']=='XI Math Bio')
{
$clls = 'XI';
}
else if($rowstud['student_class']=='VII' || $rowstud['student_class']=='VII A' || $rowstud['student_class']=='VII B')
{
$clls = 'VII';
}
else
{
$clls = '-';
}
echo $clls;
?>
</td>
<td style="font-weight:normal;">&nbsp;Section</td>
<td colspan="3">&nbsp;
<?php 
if($rowstud['student_class']=='XI Maths')
{
$sec = 'Maths';
}
else if($rowstud['student_class']=='XI Bio')
{
$sec = 'Biology';
}
else if($rowstud['student_class']=='XI Com.')
{
$sec = 'Commerce';
}
else if($rowstud['student_class']=='XI Math Bio')
{
$sec = 'Math+Bio';
}
else if($rowstud['student_class']=='VII')
{
$sec = '-';
}
else if($rowstud['student_class']=='VII A')
{
$sec = 'A';
}
else if($rowstud['student_class']=='VII B')
{
$sec = 'B';
}
else
{
$sec = '-';
}
echo $sec;
?>
</td>
</tr>

</table>
</div>
<br clear="all" />
</div>
<br clear="all" />
<div style="width:94%; margin:0 auto; line-height:28px;margin-top:10px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp;Educational Performance as Follows : </span>
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div>
<?php
$qpeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowqpeng=mysqli_fetch_array($qpeng);
$qpeng_m = $rowqpeng['obtainmarks'];

$meng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowmeng=mysqli_fetch_array($meng);

$meng_m = $rowmeng['obtainmarks']+$rowqpeng['obtainmarks'];
$meng_m5 = $meng_m*5/100;


$hpeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowhpeng=mysqli_fetch_array($hpeng);
$hpeng_m = $rowhpeng['obtainmarks'];
$heng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowheng=mysqli_fetch_array($heng);

$heng_m = $rowheng['obtainmarks']+$rowhpeng['obtainmarks'];
$heng_m5 = $heng_m*5/100;

$aeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowaeng=mysqli_fetch_array($aeng);
$aeng_m = $rowaeng['obtainmarks'];
$aeng_m90 = $aeng_m*90/100;

$peng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowpeng=mysqli_fetch_array($peng);
$peng_m = $rowpeng['obtainmarks'];
$peng_m90 = $peng_m*90/100;

$english100 = $aeng_m+$peng_m;

$english90 = $english100*90/100;

$english = $meng_m10+$heng_m20+$aeng_m60+$peng_m10;
?>
<!--hindi marking start-->
<?php
$qphindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowqphindi=mysqli_fetch_array($qphindi);
$qphindi_m = $rowqphindi['obtainmarks'];
 
$mhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowmhindi=mysqli_fetch_array($mhindi);
$mhindi_m = $rowmhindi['obtainmarks']+$rowqphindi['obtainmarks'];
$mhindi_m5 = $mhindi_m*5/100;


$hphindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowhphindi=mysqli_fetch_array($hphindi);
$hphindi_m = $rowhphindi['obtainmarks'];
$hhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowhhindi=mysqli_fetch_array($hhindi);
$hhindi_m = $rowhhindi['obtainmarks']+$rowhphindi['obtainmarks'];
$hhindi_m5 = $hhindi_m*5/100;

$ahindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowahindi=mysqli_fetch_array($ahindi);
$ahindi_m = $rowahindi['obtainmarks'];
$ahindi_m90 = $ahindi_m*90/100;

$phindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowphindi=mysqli_fetch_array($phindi);
$phindi_m = $rowphindi['obtainmarks'];
$phindi_m90 = $phindi_m*90/100;

$hindi100 = $ahindi_m+$phindi_m;

$hindi90 = $hindi100*90/100;

$hindi = $mhindi_m10+$hhindi_m20+$ahindi_m60+$phindi_m10;

?>

<!--Sanskrit marking start-->
<?php
$qpsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Sanskrit/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowqpsans=mysqli_fetch_array($qpsans);
$qpsans_m = $rowqpsans['obtainmarks'];

$msans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Sanskrit/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowmsans=mysqli_fetch_array($msans);

$msans_m = $rowmsans['obtainmarks']+$rowqpsans['obtainmarks'];
$msans_m5 = $msans_m*5/100;

$hpsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Sanskrit/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowhpsans=mysqli_fetch_array($hpsans);
$hpsans_m = $rowhpsans['obtainmarks'];
$hsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Sanskrit/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowhsans=mysqli_fetch_array($hsans);
$hsans_m = $rowhsans['obtainmarks']+$rowhpsans['obtainmarks'];
$hsans_m5 = $hsans_m*5/100;

$asans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Sanskrit/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowasans=mysqli_fetch_array($asans);
$asans_m = $rowasans['obtainmarks'];
$asans_m90 = $asans_m*90/100;

$psans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Sanskrit/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowpsans=mysqli_fetch_array($psans);
$psans_m = $rowpsans['obtainmarks'];
$psans_m90 = $psans_m*90/100;

$sanskrit100 = $asans_m+$psans_m;
$sanskrit90 = $sanskrit100*90/100;

$sanskrit = $msans_m10+$hsans_m20+$asans_m60+$psans_m10;
?>
<!--Maths marking start-->
<?php
$qpmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Account' and ses='$ses'") 
or die(mysqli_error());
$rowqpmath=mysqli_fetch_array($qpmath);
$qpmath_m = $rowqpmath['obtainmarks'];

$mmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Account' and ses='$ses'") 
or die(mysqli_error());
$rowmmath=mysqli_fetch_array($mmath);
$mmath_m =  $rowmmath['obtainmarks']+$rowqpmath['obtainmarks'];
$mmath_m5 = $mmath_m*5/100;

$hpmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Account' and ses='$ses'") 
or die(mysqli_error());
$rowhpmath=mysqli_fetch_array($hpmath);
$hpmath_m = $rowhpmath['obtainmarks'];
$hmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Account' and ses='$ses'") 
or die(mysqli_error());
$rowhmath=mysqli_fetch_array($hmath);
$hmath_m = $rowhmath['obtainmarks']+$rowhpmath['obtainmarks'];
$hmath_m5 = $hmath_m*5/100;

$amath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Account' and ses='$ses'") 
or die(mysqli_error());
$rowamath=mysqli_fetch_array($amath);
$amath_m = $rowamath['obtainmarks'];
$amath_m90 = $amath_m*90/100;

$pmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Account' and ses='$ses'") 
or die(mysqli_error());
$rowpmath=mysqli_fetch_array($pmath);
$pmath_m = $rowpmath['obtainmarks'];
$pmath_m90 = $pmath_m*90/100;

$math100 = $amath_m+$pmath_m;
$math90 = $math100*90/100;
$math = $mmath_m10+$hmath_m20+$amath_m60+$pmath_m10;
?>

<!--Science marking start-->
<?php
$qpsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Business Studies' and ses='$ses'") 
or die(mysqli_error());
$rowqpsc=mysqli_fetch_array($qpsc);
$qpsc_m = $rowqpsc['obtainmarks'];

$msc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Business Studies' and ses='$ses'") 
or die(mysqli_error());
$rowmsc=mysqli_fetch_array($msc);
$msc_m = $rowmsc['obtainmarks']+$rowqpsc['obtainmarks'];
$msc_m5 = $msc_m*5/100;

$hpsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Business Studies' and ses='$ses'") 
or die(mysqli_error());
$rowhpsc=mysqli_fetch_array($hpsc);
$hpsc_m = $rowhpsc['obtainmarks'];
$hsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Business Studies' and ses='$ses'") 
or die(mysqli_error());
$rowhsc=mysqli_fetch_array($hsc);
$hsc_m = $rowhsc['obtainmarks']+$rowhpsc['obtainmarks'];
$hsc_m5 = $hsc_m*5/100;

$asc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Business Studies' and ses='$ses'") 
or die(mysqli_error());
$rowasc=mysqli_fetch_array($asc);
$asc_m = $rowasc['obtainmarks'];
$asc_m90 = $asc_m*90/100;

$psc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Business Studies' and ses='$ses'") 
or die(mysqli_error());
$rowpsc=mysqli_fetch_array($psc);
$psc_m = $rowpsc['obtainmarks'];
$psc_m90 = $psc_m*90/100;

$science100 = $asc_m+$psc_m;
$science90 = $science100*90/100;
$science = $msc_m10+$hsc_m20+$asc_m60+$psc_m10;
?>

<!--Social Science marking start-->
<?php
$qpss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Economics' and ses='$ses'") 
or die(mysqli_error());
$rowqpss=mysqli_fetch_array($qpss);
$qpss_m = $rowqpss['obtainmarks'];

$mss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Economics' and ses='$ses'") 
or die(mysqli_error());
$rowmss=mysqli_fetch_array($mss);
$mss_m =$rowmss['obtainmarks']+$rowqpss['obtainmarks'];
$mss_m5 = $mss_m*5/100;

$hpss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Economics' and ses='$ses'") 
or die(mysqli_error());
$rowhpss=mysqli_fetch_array($hpss);
$hpss_m = $rowhpss['obtainmarks'];
$hss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Economics' and ses='$ses'") 
or die(mysqli_error());
$rowhss=mysqli_fetch_array($hss);
$hss_m = $rowhss['obtainmarks']+$rowhpss['obtainmarks'];
$hss_m5 = $hss_m*5/100;

$ass=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Economics' and ses='$ses'") 
or die(mysqli_error());
$rowass=mysqli_fetch_array($ass);
$ass_m = $rowass['obtainmarks'];
$ass_m90 = $ass_m*90/100;

$pss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Economics' and ses='$ses'") 
or die(mysqli_error());
$rowpss=mysqli_fetch_array($pss);
$pss_m = $rowpss['obtainmarks'];
$pss_m90 = $pss_m*90/100;

$ss100 = $ass_m+$pss_m;
$ss90 = $ss100*90/100;
$ss = $mss_m10+$hss_m20+$ass_m60+$pss_m10;
?>

<!--GK marking start-->
<?php
$theng = $meng_m5+$heng_m5+$aeng_m90;
$thhindi = $mhindi_m5+$hhindi_m5+$ahindi_m90;
$thsans = $msans_m5+$hsans_m5+$asans_m90;
$thmath = $mmath_m5+$hmath_m5+$amath_m90;
$thsc = $msc_m5+$hsc_m5+$asc_m90;
$thss = $mss_m5+$hss_m5+$ass_m90;


$theng100 = round($theng)+round($peng_m90);
$thhindi100 = round($thhindi)+round($phindi_m90);
$thsans100 = round($thsans)+round($psans_m90);
$thmath100 = round($thmath)+round($pmath_m90);
$thsc100 = round($thsc)+round($psc_m90);
$thss100 = round($thss)+round($pss_m90);

$gtm = $theng100+$thhindi100+$thsans100+$thmath100+$thsc100+$thss100;

$mothly = $meng_m+$msans_m+$mhindi_m+$mmath_m+$msc_m+$mss_m;
$half = $heng_m+$hsans_m+$hhindi_m+$hmath_m+$hsc_m+$hss_m;
$annual = $english100+$hindi100+$sanskrit100+$math100+$science100+$ss100;

$mothly10 = $meng_m10+$mhindi_m10+$msans_m10+$mmath_m10+$msc_m10+$mss_m10;
$half20 = $heng_m20+$hsans_m20+$hhindi_m20+$hmath_m20+$hsc_m20+$hss_m20;
$annual60 = $aeng_m60+$ahindi_m60+$asans_m60+$amath_m60+$asc_m60+$ass_m60;
$project60 = $peng_m10+$phindi_m10+$psans_m10+$pmath_m10+$psc_m10+$pss_m10;
$annual100 = $english+$hindi+$sanskrit+$math+$science+$ss;

?>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:30PX; margin-top:-30px; width:991PX;">

<tr style="line-height:30PX; font-weight:bold;" align="center">
<td style="border-right:2px #000000 solid; width:150px;" rowspan="3">SUBJECT</td>>
<td style="width:40PX;border-right:2px #000000 solid;" colspan="8">ANNUAL EXAM</td>

<td style="width:40PX;border-right:2px #000000 solid;" colspan="4">ANNUAL EVALUATION<br />(5%+5%+90% = 100%)</td>

<td rowspan="3"><img src="R.png" /></td>
</tr>

<tr style="line-height:25PX;" align="center">

<!--<td rowspan="2" style="border-right:2px #000000 solid;">Obt.<br />Marks</td>-->
<!--<td rowspan="2" style="border-right:2px #000000 solid;">Obt.<br />Marks</td>-->
<td style="width:40PX;border-right:2px #000000 solid;" colspan="3">Max.<br />Marks</td>
<td style="width:40PX;border-right:2px #000000 solid;" colspan="2">Min.<br /> Marks</td>
<td style="width:40PX;border-right:2px #000000 solid;" colspan="3">Obt.<br /> Marks</td>



<td style="width:80PX;border-right:2px #000000 solid;">&nbsp;QUART.&nbsp;</td>
<td style="width:80PX;border-right:2px #000000 solid;">&nbsp;HALF&nbsp;</td>
<td style="width:80PX;border-right:2px #000000 solid;">&nbsp;ANNUAL&nbsp;</td>
<td style="width:80PX;border-right:2px #000000 solid;" rowspan="2">&nbsp;TOTAL&nbsp;</td>
</tr>

<tr style="line-height:30PX;" align="center">
<td style="width:40PX;border-right:2px #000000 solid;">TH</td>
<td style="width:40PX;border-right:2px #000000 solid;">PR</td>
<td style="width:40PX;border-right:2px #000000 solid;">&nbsp;TOTAL&nbsp;</td>
<td style="width:40PX;border-right:2px #000000 solid;">TH</td>
<td style="width:40PX;border-right:2px #000000 solid;">PR</td>
<td style="width:40PX;border-right:2px #000000 solid;">TH</td>
<td style="width:40PX;border-right:2px #000000 solid;">PR</td>
<td style="width:40PX;border-right:2px #000000 solid;">&nbsp;TOTAL&nbsp;</td>
<td style="width:40PX;border-right:2px #000000 solid;">5%</td>
<td style="width:40PX;border-right:2px #000000 solid;">5%</td>
<td style="width:40PX;border-right:2px #000000 solid;">90%</td>


</tr>

<tr style="line-height:35PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>English</td>
<!--<td align="center" style="border-right:2px #000000 solid;">100</td>-->
<?php /*?><td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $meng_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $heng_m;  ?></td><?php */?>
<td align="center" style="border-right:2px #000000 solid;">80</td>
<td align="center" style="border-right:2px #000000 solid;">20</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">26</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">07</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $aeng_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $peng_m; ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $english100; ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000;"><?php echo number_format($meng_m5, 1); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($heng_m5, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($english90, 1); ?></td>



<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A"><?php echo $theng100; ?></td>

<td align="center" style="color:#B9001C;font-weight:bold;">
<?php                        
if($theng100>74)
{
echo 'DIS.';
}else{

echo '--';
}
?>
</td>
</tr>

<tr style="line-height:35PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Hindi/Urdu</td>
<!--<td align="center" style="border-right:2px #000000 solid;">100</td>-->
<?php /*?><td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $mhindi_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hhindi_m;  ?></td><?php */?>
<td align="center" style="border-right:2px #000000 solid;">80</td>
<td align="center" style="border-right:2px #000000 solid;">20</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">26</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">07</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $ahindi_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;color:#000000;font-weight:bold;"><?php echo $phindi_m; ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $hindi100; ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000;"><?php echo number_format($mhindi_m5, 1); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($hhindi_m5, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($hindi90, 1); ?></td>


<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A"><?php echo $thhindi100; ?></td>

<td align="center" style="color:#B9001C;font-weight:bold;">
<?php                        
if($thhindi100>74)
{
echo 'DIS.';
}else{

echo '--';
}
?>
</td>
</tr>

<?php /*?><tr style="line-height:35PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Sanskrit/Urdu</td>
<td align="center" style="border-right:2px #000000 solid;">75</td>
<td align="center" style="border-right:2px #000000 solid;">25</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>

<td align="center" style="border-right:2px #000000 solid; color:#000000;">25</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">08</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $asans_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;color:#000000;font-weight:bold;"><?php echo $psans_m; ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $sanskrit100; ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000;"><?php echo number_format($msans_m5, 1); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($hsans_m5, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($sanskrit90, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A"><?php echo $thsans100; ?></td>

<td align="center" style="color:#B9001C;font-weight:bold;">
<?php                        
if($thsans100>74)
{
echo 'DIS.';
}else{

echo '--';
}
?>
</td>
</tr><?php */?>

<tr style="line-height:35PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Account</td>
<!--<td align="center" style="border-right:2px #000000 solid;">100</td>-->
<?php /*?><td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $mmath_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hmath_m;  ?></td><?php */?>
<td align="center" style="border-right:2px #000000 solid;">80</td>
<td align="center" style="border-right:2px #000000 solid;">20</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">26</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">07</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $amath_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;color:#000000;font-weight:bold;"><?php echo $pmath_m; ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $math100; ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000;"><?php echo number_format($mmath_m5, 1); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($hmath_m5, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($math90, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A"><?php echo $thmath100; ?></td>

<td align="center" style="color:#B9001C;font-weight:bold;">
<?php                        
if($thmath100>74)
{
echo 'DIS.';
}else{

echo '--';
}
?>
</td>
</tr>

<tr style="line-height:35PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>B.Studies</td>
<!--<td align="center" style="border-right:2px #000000 solid;">100</td>-->
<?php /*?><td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $msc_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hsc_m;  ?></td><?php */?>
<td align="center" style="border-right:2px #000000 solid;">80</td>
<td align="center" style="border-right:2px #000000 solid;">20</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">23</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">10</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $asc_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;color:#000000;font-weight:bold;"><?php echo $psc_m;; ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $science100; ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000;"><?php echo number_format($msc_m5, 1); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($hsc_m5, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($science90, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A"><?php echo $thsc100; ?></td>

<td align="center" style="color:#B9001C;font-weight:bold;">
<?php                        
if($thsc100>74)
{
echo 'DIS.';
}else{

echo '--';
}
?>
</td>
</tr>

<tr style="line-height:35PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Economics</td>
<!--<td align="center" style="border-right:2px #000000 solid;">100</td>-->
<?php /*?><td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $mss_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hss_m;  ?></td><?php */?>
<td align="center" style="border-right:2px #000000 solid;">80</td>
<td align="center" style="border-right:2px #000000 solid;">20</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">23</td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;">10</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $ass_m;  ?></td>
<td align="center" style="border-right:2px #000000 solid;color:#000000;font-weight:bold;"><?php echo $pss_m; ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#000000;font-weight:bold;"><?php echo $ss100; ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000;"><?php echo number_format($mss_m5, 1); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($hss_m5, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#000"><?php echo number_format($ss90, 1); ?></td>

<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A"><?php echo $thss100; ?></td>
<td align="center" style="font-weight:bold; color:#B9001C">
<?php                        
if($thss100>74)
{
echo 'DIS.';
}else{

echo '--';
}
?>
</td>
</tr>

<tr style="line-height:35PX;font-weight:bold;">
<td style="border-right:2px #000000 solid; font-weight:bold;" align="center">Grand Total</td>
<td align="center" style="border-right:2px #000000 solid;" colspan="3">500</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;" colspan="2"></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;" colspan="3"><?php echo $annual;  ?></td>
<td align="right" style="border-right:2px #000000 solid;font-weight:bold;color:#000;" colspan="3"></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo $gtm; $per = $gtm*100/500; ?></td>
<td align="center" style="font-weight:bold;color:#000;"></td>
</tr>
</table>
<br clear="all" />
<?PHP
$sid = $rowstud['student_id'];
$rmk=mysqli_query($con,"select * from healthh where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);

$rmkk=mysqli_query($con,"select * from healthhh where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowrmkk=mysqli_fetch_array($rmkk);

$att=mysqli_query($con,"select * from att where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowatt=mysqli_fetch_array($att);


$ev=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowev=mysqli_fetch_array($ev);
?>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:30PX; margin-top:-10px; width:991PX;">
<tr align="center">
<td style="width:150PX;" rowspan="2">Grade</td><td colspan="2">Annual Grade</td></td>
</tr>
<tr align="center">
<td>Environmental Education & Disaster Management</td><td style="font-weight:bold; width:150px;" align="center"><?php echo $rowev['vision']?></td>
</tr>
</table>
<br clear="all" />

<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:30PX; margin-top:-5px; width:991PX;">
<tr align="center" style="font-weight:bold;"><td style="width:150px;">Annual Result</td><td> Total Max Marks</td><td> Total Obtain</td><td>Per.(%)</td><td>Division</td><td>Rank</td>
<td colspan="3">Attendance</td></tr>

<tr align="center" style="font-weight:bold; line-height:32px; color:#00356A;">
<td style="background-color:#ffeb3b">Pass</td><td rowspan="2">500</td><td rowspan="2"><?php echo $gtm;  ?></td>
<td><?php echo number_format($per, 2); ?></td>
<td rowspan="2">
<?php
if($per > 59)
{
$div= "I";
}
if($per>45 && $per<60)
{
$div= "II";
}
if($per>33 && $per<45)
{
$div= "III";
}
if($per<33)
{
$div= "-";
}
echo $div;
?>

</td>

<td>
<?php echo $rowatt['s2']?>
</td>
<td><?php echo $rowatt['s1']?></td>
</tr>
</table>

<br clear="all" />
<table class="tbl" border="0" cellpadding="0" cellspacing="0" style="color:#000000;font-size:21PX;margin-left:30PX;float:left;margin-top:-10px;width:991PX;">
<tr style="line-height:30px; color:#000;">
<td style="width:225PX;">Class Teacher Remark : </td>
<td style="width:320px; color:#B9001C; font-weight:bold;border-top:2px #000 solid;border-bottom:2px #000 solid;">
<?php
                             if($per > 90)
                             {
                             $rmk='Outstanding';
                             }
							 if($per > 80 && $per < 91)
                             {
                             $rmk= 'Excellent';
                             }
							 if($per > 70 && $per < 81)
                             {
                             $rmk= 'Very good';
                             }
							 if($per > 60 && $per < 71)
                             {
                             $rmk= 'Good';
                             }
							 if($per > 50 && $per < 61)
                             {
                             $rmk= 'Average';
                             }
							 if($per > 40 && $per < 51)
                             {
                             $rmk= 'Need encouragement';
                             }
							 if($per > 32 && $per < 41)
                             {
                             $rmk= 'Need improvement';
                             }
							 if($per < 33)
                             {
                             $rmk= '-';
                             }
							 echo $rmk;
?>

</td>
<td style="width:350px;"><span style="color:#ff5722;">&nbsp;&nbsp;&nbsp;Congratulations!</span> <span style="color:#2d3b87;">Promoted to Class :</span></td>
<td style="color:#B9001C; font-weight:bold;border-top:2px #000 solid;border-bottom:2px #000 solid;">
<?PHP
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
echo $clss;
?>
</td>
</tr
></table>
<br clear="all" />


</div>
</div>	
<br clear="all" />
</div>
    
     
	   

	