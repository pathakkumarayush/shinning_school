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
.tbl tr{line-height:27px!important;}
.tbl1 tr{line-height:27px!important;}
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
<div style="width:1050px;height:1531px;font-family:Calisto MT;background:url(BKN_1.png);background-repeat:no-repeat;background-position:center; background-position:center;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:235PX;margin-top:0px;">
<br clear="all" />
</div>

<br clear="all" />
<div style="width:100%;height:auto;">
<div style="background-color:#15377a; color:#FFFFFF; font-weight:bold; height:35px; border-bottom:1px #CC0000 solid;border-top:1px #CC0000 solid; margin-left:365px; width:342px; font-size:26px;font-family:Calisto MT;border: double;">&nbsp;Academic Session 2025-2026</div>
<br clear="all" />
<div style="width:99%;height:195px;text-transform: capitalize;">
<table style="width:991PX;font-size:21px;margin-left:30px; font-size:21px; margin-top:-10PX; font-weight:bold;color:#000000; border:1px #000000 solid;" border="1"  cellpadding="0" cellspacing="0" class="tbl1">
<tr><td style="width:180px; font-weight:normal;">&nbsp;Roll Number</td>
<td style="width:150px; color:#B9001C;">&nbsp;<?php echo ucwords($rowstud['rno']); ?></td>
<td style="width:200px;font-weight:normal;">&nbsp;Scholar Number</td>
<td style="width:275px;color:#B9001C;">&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td>
<td colspan="2" rowspan="7">
<img src="upload/<?php echo $rowstud["student_img"]; ?>" style="border-radius:5px; width:160px; margin-left:15PX; height:190px;">
</td>
</tr>

<tr><td style="font-weight:normal;">&nbsp;Student's Name</td><td colspan="3">&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td style="font-weight:normal;">&nbsp;Father's Name</td><td colspan="3">&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td style="font-weight:normal;">&nbsp;Mother's Name</td><td colspan="3">&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>

<tr><td style="width:180px; font-weight:normal;">&nbsp;Date Of Birth</td>
<td>&nbsp;<?php echo $dob = $rowstud['student_dob']; ?></td>
<td style="width:200px;font-weight:normal;" colspan="2">
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
if($rowstud['student_class']=='III' || $rowstud['student_class']=='III A' || $rowstud['student_class']=='III B')
{
$clls = 'III';
}
else if($rowstud['student_class']=='IV' || $rowstud['student_class']=='IV A' || $rowstud['student_class']=='IV B')
{
$clls = 'IV';
}
else
{
$clls = '-';
}
echo $clls;
?>
</td>
<td style="font-weight:normal;">&nbsp;Section</td>
<td>&nbsp;
<?php 
if($rowstud['student_class']=='III')
{
$sec = '-';
}
else if($rowstud['student_class']=='III A')
{
$sec = 'A';
}
else if($rowstud['student_class']=='III B')
{
$sec = 'B';
}
else if($rowstud['student_class']=='IV')
{
$sec = '-';
}
else if($rowstud['student_class']=='IV A')
{
$sec = 'A';
}
else if($rowstud['student_class']=='IV B')
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

<tr><td style="font-weight:normal;">&nbsp;Gender</td>
<td style="text-transform:uppercase;">&nbsp;<?php echo $rowstud['student_gender']; ?></td>
<td style="font-weight:normal;">&nbsp;Category</td>
<td>&nbsp;<?php echo $rowstud['caste']; ?></td>
</tr>

<tr><td style="font-weight:normal;">&nbsp;Samagra ID </td>
<td>&nbsp;<?php echo $rowstud['religion']; ?></td>
<td style="font-weight:normal;">&nbsp;Aadhaar Number</td>
<td>&nbsp;<?php echo $rowstud['student_rollno']; ?></td>
<td style="font-weight:normal;">&nbsp;Medium</td>
<td>&nbsp;ENGLISH</td>
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
$meng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowmeng=mysqli_fetch_array($meng);
$meng_m = $rowmeng['obtainmarks'] ?? '';
$meng_m10 = round((float)$meng_m*10/40);

$heng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowheng=mysqli_fetch_array($heng);
$heng_m = $rowheng['obtainmarks'] ?? '';
$heng_m20 = round((float)$heng_m*20/60);

$aeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowaeng=mysqli_fetch_array($aeng);
$aeng_m = $rowaeng['obtainmarks'] ?? '';
$aeng_m60 = (float)$aeng_m*60/60;

$peng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowpeng=mysqli_fetch_array($peng);
$peng_m = $rowpeng['obtainmarks'] ?? '';
$peng_m10 = round((float)$peng_m*10/40);

$english100 = (float)$aeng_m+(float)$peng_m;

$english = (float)$meng_m10+(float)$heng_m20+(float)$aeng_m60+(float)$peng_m10;
?>
<!--hindi marking start-->
<?php
$mhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowmhindi=mysqli_fetch_array($mhindi);
$mhindi_m = $rowmhindi['obtainmarks'] ?? '';
$mhindi_m10 = round((float)$mhindi_m*10/40);

$hhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowhhindi=mysqli_fetch_array($hhindi);
$hhindi_m = $rowhhindi['obtainmarks'] ?? '';
$hhindi_m20 = round((float)$hhindi_m*20/60);

$ahindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowahindi=mysqli_fetch_array($ahindi);
$ahindi_m = $rowahindi['obtainmarks'] ?? '';
$ahindi_m60 = (float)$ahindi_m*60/60;

$phindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowphindi=mysqli_fetch_array($phindi);
$phindi_m = $rowphindi['obtainmarks'] ?? '';
$phindi_m10 = round((float)$phindi_m*10/40);

$hindi100 = (float)$ahindi_m+(float)$phindi_m;

$hindi = (float)$mhindi_m10+(float)$hhindi_m20+(float)$ahindi_m60+(float)$phindi_m10;

?>

<!--Sanskrit marking start-->

<!--Maths marking start-->
<?php
$mmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowmmath=mysqli_fetch_array($mmath);
$mmath_m = $rowmmath['obtainmarks'] ?? '';
$mmath_m10 = round((float)$mmath_m*10/40);

$hmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowhmath=mysqli_fetch_array($hmath);
$hmath_m = $rowhmath['obtainmarks'] ?? '';
$hmath_m20 = round((float)$hmath_m*20/60);

$amath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowamath=mysqli_fetch_array($amath);
$amath_m = $rowamath['obtainmarks'] ?? '';
$amath_m60 = (float)$amath_m*60/60;

$pmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowpmath=mysqli_fetch_array($pmath);
$pmath_m = $rowpmath['obtainmarks'] ?? '';
$pmath_m10 = round((float)$pmath_m*10/40);

$math100 = (float)$amath_m+(float)$pmath_m;

$math = (float)$mmath_m10+(float)$hmath_m20+(float)$amath_m60+(float)$pmath_m10;
?>

<!--Science marking start-->
<?php
$msc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowmsc=mysqli_fetch_array($msc);
$msc_m = $rowmsc['obtainmarks'] ?? '';
$msc_m10 = round((float)$msc_m*10/40);

$hsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowhsc=mysqli_fetch_array($hsc);
$hsc_m = $rowhsc['obtainmarks'] ?? '';
$hsc_m20 = round((float)$hsc_m*20/60);

$asc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowasc=mysqli_fetch_array($asc);
$asc_m = $rowasc['obtainmarks'] ?? '';
$asc_m60 = (float)$asc_m*60/60;

$psc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowpsc=mysqli_fetch_array($psc);
$psc_m = $rowpsc['obtainmarks'] ?? '';
$psc_m10 = round((float)$psc_m*10/40);

$science100 = (float)$asc_m+(float)$psc_m;
$science = (float)$msc_m10+(float)$hsc_m20+(float)$asc_m60+(float)$psc_m10;
?>

<!--Social Science marking start-->
<?php
$mss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='DRAWING' and ses='$ses'") 
or die(mysqli_error());
$rowmss=mysqli_fetch_array($mss);
$mss_m = $rowmss['obtainmarks'] ?? '';
$mss_m10 = (float)$mss_m*10/40;

$hss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='DRAWING' and ses='$ses'") 
or die(mysqli_error());
$rowhss=mysqli_fetch_array($hss);
$hss_m = $rowhss['obtainmarks'] ?? '';
$hss_m20 = (float)$hss_m*20/60;

$ass=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='DRAWING' and ses='$ses'") 
or die(mysqli_error());
$rowass=mysqli_fetch_array($ass);
$ass_m = $rowass['obtainmarks'] ?? '';
$ass_m60 = (float)$ass_m*60/60;

$pss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='DRAWING' and ses='$ses'") 
or die(mysqli_error());
$rowpss=mysqli_fetch_array($pss);
$pss_m = $rowpss['obtainmarks'] ?? '';
$pss_m10 = (float)$pss_m*10/40;

$ss100 = (float)$ass_m+(float)$pss_m;
$ss = (float)$mss_m10+(float)$hss_m20+(float)$ass_m60+(float)$pss_m10;
?>

<!--GK marking start-->
<?php
$mgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowmgk=mysqli_fetch_array($mgk);
$mgk_m = $rowmgk['obtainmarks'] ?? '';
$mgk_m10 = (float)$mgk_m*10/40;

$hgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowhgk=mysqli_fetch_array($hgk);
$hgk_m = $rowhgk['obtainmarks'] ?? '';
$hgk_m20 = (float)$hgk_m*20/60;

$agk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowagk=mysqli_fetch_array($agk);
$agk_m = $rowagk['obtainmarks'] ?? '';
$agk_m60 = (float)$agk_m*60/60;

$pgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowpgk=mysqli_fetch_array($pgk);
$pgk_m = $rowpgk['obtainmarks'] ?? '';
$pgk_m10 = (float)$pgk_m*10/40;

$gk100 = (float)$agk_m+(float)$pgk_m;
$gk = $mgk_m10+$hgk_m20+$agk_m60+$pgk_m10;

$mothly = (float)$meng_m+(float)$mhindi_m+(float)$mmath_m+(float)$msc_m;
$half = (float)$heng_m+(float)$hhindi_m+(float)$hmath_m+(float)$hsc_m;
$annual = (float)$english100+(float)$hindi100+(float)$math100+(float)$science100;

$mothly10 = (float)$meng_m10+(float)$mhindi_m10+(float)$mmath_m10+(float)$msc_m10;
$half20 = (float)$heng_m20+(float)$hhindi_m20+(float)$hmath_m20+(float)$hsc_m20;
$annual60 = (float)$aeng_m60+(float)$ahindi_m60+(float)$amath_m60+(float)$asc_m60;
$project60 = (float)$peng_m10+(float)$phindi_m10+(float)$pmath_m10+(float)$psc_m10;
$annual100 = (float)$english+(float)$hindi+(float)$math+(float)$science;

?>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:30PX; margin-top:-15px; width:991PX;">

<tr style="font-weight:bold;" align="center">
<td style="width:150px;border-right:2px #000000 solid;">Subjects</td>
<td style="width:100px;border-right:2px #000000 solid;">Max.<br />Mark</td>
<td style="border-right:2px #000000 solid;">Monthly<br />Evaluation<br />[10]</td>
<td style="border-right:2px #000000 solid;">Half Yearly<br />Evaluation<br />[20]</td>
<td style="border-right:2px #000000 solid;">Annual<br />Evaluation<br />[60]</td>
<td style="border-right:2px #000000 solid;">Annual<br />Project<br />[10]</td>
<td style="" colspan="2">Consolidated <br />Grade<br /><br /></td>
</tr>
<tr style="line-height:30PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>English</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($meng_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($heng_m20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $aeng_m60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($peng_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#00356A;font-weight:bold;"><?php echo round($english); ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;">
<?php 
                              if($english > 85)
                             {
                             $reseng='A+';
                             }
							 if($english > 75 && $english < 86)
                             {
                             $reseng= 'A';
                             }
							 if($english > 65 && $english < 76)
                             {
                             $reseng= 'B+';
                             }
							 if($english > 55 && $english < 66)
                             {
                             $reseng= 'B';
                             }
							 if($english > 50 && $english < 56)
                             {
                             $reseng= 'C+';
                             }
							 if($english > 45 && $english < 51)
                             {
                             $reseng= 'C';
                             }
							 if($english > 32 && $english < 46)
                             {
                             $reseng= 'D';
                             }
							 if($english < 33)
                             {
                             $reseng= 'E';
                             }
							 echo $reseng;
?>
</td>
</tr>

<tr style="line-height:30PX;">
<td style="width:200PX;border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Hindi</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($mhindi_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($hhindi_m20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $ahindi_m60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($phindi_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo round($hindi); ?></td>
<td align="center" style="font-weight:bold;color:#2d3b87;">
<?php 
                              if($hindi > 85)
                             {
                             $reshindi='A+';
                             }
							 if($hindi > 75 && $hindi < 86)
                             {
                             $reshindi= 'A';
                             }
							 if($hindi > 65 && $hindi < 76)
                             {
                             $reshindi= 'B+';
                             }
							 if($hindi > 55 && $hindi < 66)
                             {
                             $reshindi= 'B';
                             }
							 if($hindi > 50 && $hindi < 56)
                             {
                             $reshindi= 'C+';
                             }
							 if($hindi > 45 && $hindi < 51)
                             {
                             $reshindi= 'C';
                             }
							 if($hindi > 32 && $hindi < 46)
                             {
                             $reshindi= 'D';
                             }
							 if($hindi < 33)
                             {
                             $reshindi= 'E';
                             }
							 echo $reshindi;


?>
</td>
</tr>

<tr style="line-height:30PX;">
<td style="width:200PX;border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Mathematics</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($mmath_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($hmath_m20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $amath_m60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($pmath_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo round($math); ?></td>
<td align="center" style="font-weight:bold;color:#2d3b87;">
<?php 
                             if($math > 85)
                             {
                             $resmath='A+';
                             }
							 if($math > 75 && $math < 86)
                             {
                             $resmath= 'A';
                             }
							 if($math > 65 && $math < 76)
                             {
                             $resmath= 'B+';
                             }
							 if($math > 55 && $math < 66)
                             {
                             $resmath= 'B';
                             }
							 if($math > 50 && $math < 56)
                             {
                             $resmath= 'C+';
                             }
							 if($math > 45 && $math < 51)
                             {
                             $resmath= 'C';
                             }
							 if($math > 32 && $math < 46)
                             {
                             $resmath= 'D';
                             }
							 if($math < 33)
                             {
                             $resmath= 'E';
                             }
							 echo $resmath;


?>
</td>
</tr>

<tr style="line-height:30PX;">
<td style="width:200PX;border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>EVS</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($msc_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($hsc_m20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $asc_m60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($psc_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo round($science); ?></td>
<td align="center" style="font-weight:bold;color:#2d3b87;">
<?php 
                               if($science > 85)
                             {
                             $ressc='A+';
                             }
							 if($science > 75 && $science < 86)
                             {
                             $ressc= 'A';
                             }
							 if($science > 65 && $science < 76)
                             {
                             $ressc= 'B+';
                             }
							 if($science > 55 && $science < 66)
                             {
                             $ressc= 'B';
                             }
							 if($science > 50 && $science < 56)
                             {
                             $ressc= 'C+';
                             }
							 if($science > 45 && $science < 51)
                             {
                             $ressc= 'C';
                             }
							 if($science > 32 && $science < 46)
                             {
                             $ressc= 'D';
                             }
							 if($science < 33)
                             {
                             $ressc= 'E';
                             }
							 echo $ressc;

?>
</td>
</tr>

<tr style="line-height:30PX; font-weight:bold;">
<td style="width:200PX;border-right:2px #000000 solid; font-weight:bold;" align="center">Grand Total</td>
<td align="center" style="border-right:2px #000000 solid;">400</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($mothly10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($half20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $annual60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $project60; ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo round($annual100); ?></td>
<td align="center" style="font-weight:bold;color:#2d3b87;">
<?php  $fg = $annual100*100/400;

                             if($fg > 85)
                             {
                             $refgs='A+';
                             }
							 if($fg > 75 && $fg < 86)
                             {
                             $refgs= 'A';
                             }
							 if($fg > 65 && $fg < 76)
                             {
                             $refgs= 'B+';
                             }
							 if($fg > 55 && $fg < 66)
                             {
                             $refgs= 'B';
                             }
							 if($fg > 50 && $fg < 56)
                             {
                             $refgs= 'C+';
                             }
							 if($fg > 45 && $fg < 51)
                             {
                             $refgs= 'C';
                             }
							 if($fg > 32 && $fg < 46)
                             {
                             $refgs= 'D';
                             }
							 if($fg < 33)
                             {
                             $refgs= 'E';
                             }
							 echo $refgs;
?>
</td>
</tr>



<tr style="line-height:30PX;">
<td colspan="13"><span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp;Additional Subject: </span></td>
</tr>

<tr style="line-height:30PX;">
<td style="width:200PX;border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>G.K.</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($mgk_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($hgk_m20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $agk_m60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($pgk_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo round($gk); ?></td>
<td align="center" style="font-weight:bold;color:#2d3b87;">
<?php 
                             if($gk > 85)
                             {
                             $resgk='A+';
                             }
							 if($gk > 75 && $gk < 86)
                             {
                             $resgk= 'A';
                             }
							 if($gk > 65 && $gk < 76)
                             {
                             $resgk= 'B+';
                             }
							 if($gk > 55 && $gk < 66)
                             {
                             $resgk= 'B';
                             }
							 if($gk > 50 && $gk < 56)
                             {
                             $resgk= 'C+';
                             }
							 if($gk > 45 && $gk < 51)
                             {
                             $resgk= 'C';
                             }
							 if($gk > 32 && $gk < 46)
                             {
                             $resgk= 'D';
                             }
							 if($gk < 33)
                             {
                             $resgk= 'E';
                             }
							 echo $resgk;

?>
</td>
</tr>


<tr style="line-height:30PX;">
<td style="width:200PX;border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>DRAWING</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($mss_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($hss_m20);  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo $ass_m60;  ?></td>
<td align="center" style="border-right:2px #000000 solid;"><?php echo round($pss_m10); ?></td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo round($ss); ?></td>
<td align="center" style="font-weight:bold;color:#2d3b87;">
<?php 
                             if($ss > 85)
                             {
                             $resss='A+';
                             }
							 if($ss > 75 && $ss < 86)
                             {
                             $resss= 'A';
                             }
							 if($ss > 65 && $ss < 76)
                             {
                             $resss= 'B+';
                             }
							 if($ss > 55 && $ss < 66)
                             {
                             $resss= 'B';
                             }
							 if($ss > 50 && $ss < 56)
                             {
                             $resss= 'C+';
                             }
							 if($ss > 45 && $ss < 51)
                             {
                             $resss= 'C';
                             }
							 if($ss > 32 && $ss < 46)
                             {
                             $resss= 'D';
                             }
							 if($ss < 33)
                             {
                             $resss= 'E';
                             }
							 echo $resss;

?>
</td>
</tr>


</table>
<br clear="all" />

<div style="width:94%; margin:0 auto; line-height:28px;margin-top:-15px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp; Performance in Co-Scholastics Areas :</span>
</div>
<?PHP
$sid = $rowstud['student_id'];
$rmk=mysqli_query($con,"select * from healthh where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);

$rmkk=mysqli_query($con,"select * from healthhh where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowrmkk=mysqli_fetch_array($rmkk);


$att=mysqli_query($con,"select * from att where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowatt=mysqli_fetch_array($att);

?>


<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:30PX; float:left; margin-top:5px; width:281PX;">
<tr style="line-height:35px; background-color:#f9dacb; font-weight:bold;"><td align="center" colspan="2">Co-Curricular Activities</td></tr>

<tr><td>&nbsp;<img src="ar.png"  style=""/>LITERARY SKILLS</td><td style="width:50px;" align="center"><?php echo $rowrmk['height'] ?? '';?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>SCIENTIFIC SKILLS</td><td align="center"><?php echo $rowrmk['weight'] ?? '';?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CULTURAL SKILLS</td><td align="center"><?php echo $rowrmk['vision'] ?? '';?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CREATIVITY</td><td align="center"><?php echo $rowrmk['bio'] ?? '';?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>SPORTS</td><td align="center"><?php echo $rowrmk['math'] ?? '';?></td></tr>
</table>

<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:5PX; float:left; margin-top:5px; width:705PX;">
<tr style="line-height:35px; background-color:#f9dacb; font-weight:bold;"><td align="center" colspan="4">Social Activities</td></tr>

<tr><td>&nbsp;<img src="ar.png"  style=""/>REGULARITY</td><td style="width:50px;" align="center"><?php echo $rowrmkk['height'] ?? '';?></td>
<td>&nbsp;<img src="ar.png"  style=""/>ENVIRONMENTAL CONSCIOUSNESS</td><td style="width:50px;" align="center"><?php echo $rowrmkk['s1'] ?? '';?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>PUNCTUALITY</td><td align="center"><?php echo $rowrmkk['weight'] ?? '';?></td>
<td>&nbsp;<img src="ar.png"  style=""/>LEADERSHIP QUALITIES</td><td align="center"><?php echo $rowrmkk['s2'] ?? '';?></td>
</tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CLEANLINESS</td><td align="center"><?php echo $rowrmkk['vision'] ?? '';?></td>
<td>&nbsp;<img src="ar.png"  style=""/>TRUTHFULNESS</td><td align="center"><?php echo $rowrmkk['s3'] ?? '';?></td>
</tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>DISCIPLINE </td><td align="center"><?php echo $rowrmkk['bio'] ?? '';?></td>
<td>&nbsp;<img src="ar.png"  style=""/>HONESTY </td><td align="center"><?php echo $rowrmkk['s4'] ?? '';?></td>
</tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CO-OPERATION</td><td align="center"><?php echo $rowrmkk['math'] ?? '';?></td>
<td>&nbsp;<img src="ar.png"  style=""/>EXPRESSIVE</td><td align="center"><?php echo $rowrmkk['s5'] ?? '';?></td>
</tr>
</table>

<br clear="all" />
<div style="width:94%; margin:0 auto; line-height:28px;margin-top:5px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp; Final Result :</span>
</div>

<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX;margin-left:30PX;float:left;margin-top:5px;width:991PX;">
<tr style="line-height:35px; background-color:#f9dacb; font-weight:bold;">
<td align="center">Max. Marks</td><td align="center">Obt. Marks</td><td align="center">Result</td><td align="center">Percentage</td><td align="center">Grade</td>
<td align="center">Rank</td>
</tr>
<tr align="center" style="color:#00356A; font-weight:bold;">
<td>400</td><td><?php echo round($annual100); ?></td><td>Pass</td>

<td><?php $fg = $annual100*100/400; echo round($fg);?>%</td>
<td>
<?php
                            if($fg > 85)
                             {
                             $refgs='A+';
                             }
							 if($fg > 75 && $fg < 86)
                             {
                             $refgs= 'A';
                             }
							 if($fg > 65 && $fg < 76)
                             {
                             $refgs= 'B+';
                             }
							 if($fg > 55 && $fg < 66)
                             {
                             $refgs= 'B';
                             }
							 if($fg > 50 && $fg < 56)
                             {
                             $refgs= 'C+';
                             }
							 if($fg > 45 && $fg < 51)
                             {
                             $refgs= 'C';
                             }
							 if($fg > 32 && $fg < 46)
                             {
                             $refgs= 'D';
                             }
							 if($fg < 33)
                             {
                             $refgs= 'E';
                             }
							 echo $refgs;
?>
</td>
<td><?php echo $rowatt['s2'] ?? '';?></td>

</tr>

</table>

<table class="tbl" border="0" cellpadding="0" cellspacing="0" style="color:#000000;font-size:21PX;margin-left:30PX;float:left;margin-top:15px;width:991PX;">
<tr style="line-height:20px; color:#000;">
<td style="width:225PX;">Class Teacher Remark : </td>
<td style="width:320px; color:#B9001C; font-weight:bold;border-top:2px #000 solid;border-bottom:2px #000 solid;">

<?php
                             if($fg > 90)
                             {
                             $rmk='Outstanding';
                             }
							 if($fg > 80 && $fg < 91)
                             {
                             $rmk= 'Excellent';
                             }
							 if($fg > 70 && $fg < 81)
                             {
                             $rmk= 'Very good';
                             }
							 if($fg > 60 && $fg < 71)
                             {
                             $rmk= 'Good';
                             }
							 if($fg > 50 && $fg < 61)
                             {
                             $rmk= 'Average';
                             }
							 if($fg > 40 && $fg < 51)
                             {
                             $rmk= 'Need encouragement';
                             }
							 if($fg > 32 && $fg < 41)
                             {
                             $rmk= 'Need improvement';
                             }
							 if($fg < 33)
                             {
                             $rmk= '-';
                             }
							 echo $rmk;
?>


</td>
<td style="width:350px;"><span style="color:#ff5722;">&nbsp;&nbsp;&nbsp;Congratulations!</span> <span style="color:#2d3b87;">Promoted to Class :</span></td>
<td style="color:#B9001C; font-weight:bold;border-top:2px #000 solid;border-bottom:2px #000 solid;">
<?PHP
if($rowstud['student_class']=='III')
{
$clss = '4th';
}
if($rowstud['student_class']=='III A')
{
$clss = '4th';
}
if($rowstud['student_class']=='III B')
{
$clss = '4th';
}
if($rowstud['student_class']=='IV')
{
$clss = '5th';
}
if($rowstud['student_class']=='IV A')
{
$clss = '5th';
}
if($rowstud['student_class']=='IV B')
{
$clss = '5th';
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
    
     
	   

	