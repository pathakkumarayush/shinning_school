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
.tbl tr{line-height:33px!important;}
.tbl1 tr{line-height:33px!important;}
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
$search=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='$ses' and status='0' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{
$uid=$rowstud['uid'];
$sid=$rowstud['student_id'];
$clstech=mysqli_query($con,"select * from class_teacher where class='".$rowstud['student_class']."' and teacher_session='$ses'");
$rowcls=mysqli_fetch_array($clstech);

$clsth=mysqli_query($con,"select * from teacher where uid='".$rowcls['teacher']."'");
$rowcls=mysqli_fetch_array($clsth);

$rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='$ses'");
$rowno=mysqli_fetch_array($rno);
?>	

<div style="width:1050px;height:1531px; border:4px #000 solid;font-family:Calisto MT;background:url(wn.png); background-repeat:no-repeat; background-position:center;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:auto;margin-top:-15px;">
<img src="snn.png" style=" margin-left:10px;" />
<br clear="all" />
</div>

<div style="width:100%; margin:0 auto; line-height:33px;margin-top:10px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<center><span style="color:#0e4174; font-size:28px;font-family:Calisto MT; font-weight:bold;">Student Progress Card (Session : 2023-24)</span></center>
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div style="width:99%;height:235px;text-transform: capitalize;">
<table style="width:100%;font-size:21px;margin-left:5px; font-size:21px; margin-top:-10PX; font-weight:bold;color:#000000; border:1px #000000 solid;" border="1"  cellpadding="0" cellspacing="0" class="tbl1">
<tr><td style="width:180px; font-weight:normal;">&nbsp;Roll Number</td>
<td style="width:150px; color:#CC0000;">&nbsp;<?php echo ucwords($rowstud['rno']); ?></td>
<td style="width:200px;font-weight:normal;">&nbsp;Scholar Number</td>
<td style="width:272px;color:#CC0000;">&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td>
<td colspan="2" rowspan="7">
<img src="upload/<?php echo $rowstud["student_img"]; ?>" style="border-radius:5px; width:190px; margin-left:14PX; height:222px;">
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
if($rowstud['student_class']=='I' || $rowstud['student_class']=='I A' || $rowstud['student_class']=='I B')
{
$clls = 'I';
}
else if($rowstud['student_class']=='II' || $rowstud['student_class']=='II A' || $rowstud['student_class']=='II B')
{
$clls = 'II';
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
if($rowstud['student_class']=='I')
{
$sec = '-';
}
else if($rowstud['student_class']=='I A')
{
$sec = 'A';
}
else if($rowstud['student_class']=='I B')
{
$sec = 'B';
}
else if($rowstud['student_class']=='II')
{
$sec = '-';
}
else if($rowstud['student_class']=='II A')
{
$sec = 'A';
}
else if($rowstud['student_class']=='II B')
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
<td>&nbsp;<?php echo $rowstud['student_gender']; ?></td>
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
<div style="width:99%; margin:0 auto; line-height:28px;margin-top:10px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp;Educational Performance as Follows : </span>
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div>
<?php
$heng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowheng=mysqli_fetch_array($heng);
$heng_m40 = $rowheng['obtainmarks'];

$aeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowaeng=mysqli_fetch_array($aeng);
$aeng_m60 = $rowaeng['obtainmarks'];

$english = $heng_m40+$aeng_m60;
?>
<!--hindi marking start-->
<?php
$hhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowhhindi=mysqli_fetch_array($hhindi);
$hhindi_m40 = $rowhhindi['obtainmarks'];

$ahindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowahindi=mysqli_fetch_array($ahindi);
$ahindi_m60 = $rowahindi['obtainmarks'];

$hindi = $hhindi_m40+$ahindi_m60;
?>

<!--Sanskrit marking start-->

<!--Maths marking start-->
<?php
$hmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowhmath=mysqli_fetch_array($hmath);
$hmath_m40 = $rowhmath['obtainmarks'];

$amath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowamath=mysqli_fetch_array($amath);
$amath_m60 = $rowamath['obtainmarks'];

$math = $hmath_m40+$amath_m60;
?>

<!--Science marking start-->
<?php
$hsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowhsc=mysqli_fetch_array($hsc);
$hsc_m40 = $rowhsc['obtainmarks'];

$asc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowasc=mysqli_fetch_array($asc);
$asc_m60 = $rowasc['obtainmarks'];

$science = $hsc_m40+$asc_m60;
?>

<!--Social Science marking start-->
<?php
$hss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='DRAWING' and ses='$ses'") 
or die(mysqli_error());
$rowhss=mysqli_fetch_array($hss);
$hss_m40 = $rowhss['obtainmarks'];

$ass=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='DRAWING' and ses='$ses'") 
or die(mysqli_error());
$rowass=mysqli_fetch_array($ass);
$ass_m60 = $rowass['obtainmarks'];

$ss = $hss_m40+$ass_m60;
?>

<!--GK marking start-->
<?php
$hgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowhgk=mysqli_fetch_array($hgk);
$hgk_m40 = $rowhgk['obtainmarks'];

$agk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowagk=mysqli_fetch_array($agk);
$agk_m60 = $rowagk['obtainmarks'];

$gk = $hgk_m40+$agk_m60;

$half = $heng_m40+$hhindi_m40+$hmath_m40;
$annual = $aeng_m60+$ahindi_m60+$amath_m60;

$annual100 = $english+$hindi+$math;

?>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:5PX; margin-top:-15px; width:1041PX;">


<tr style="font-weight:bold;" align="center">
<td style="width:200px;border-right:2px #000000 solid;" rowspan="2">Subjects</td>
<td colspan="3" style="border-right:2px #000000 solid;">Half Yearly Evaluation</td>
<td colspan="3" style="border-right:2px #000000 solid;">Annual Evaluation</td>
<td colspan="3" style="">Final Assessment</td>
</tr>
<tr style="font-size:15px;" align="center" class="mtr">
<td style="border-right:2px #000000 solid;">Max.</td><td style="border-right:2px #000000 solid;">Obt.</td><td style="border-right:2px #000000 solid;">Grade</td>
<td style="border-right:2px #000000 solid;">Max.</td><td style="border-right:2px #000000 solid;">Obt.</td><td style="border-right:2px #000000 solid;">Grade</td>
<td style="border-right:2px #000000 solid;">Max.</td><td style="border-right:2px #000000 solid;">Obt.</td><td style="">Grade</td>
</tr>

<tr style="line-height:30PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>English</td>
<td align="center" style="border-right:2px #000000 solid;">40</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $heng_m40;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php                        if($heng_m40 > 34)
                             {
                             $reseng40='A+';
                             }
							 if($heng_m40 > 30 && $heng_m40 < 35)
                             {
                             $reseng40= 'A';
                             }
							 if($heng_m40 > 26 && $heng_m40 < 31)
                             {
                             $reseng40= 'B+';
                             }
							 if($heng_m40 > 22 && $heng_m40 < 27)
                             {
                             $reseng40= 'B';
                             }
							 if($heng_m40 > 20 && $heng_m40 < 23)
                             {
                             $reseng40= 'C+';
                             }
							 if($heng_m40 > 18 && $heng_m40 < 21)
                             {
                             $reseng40= 'C';
                             }
							 if($heng_m40 > 14 && $heng_m40 < 19)
                             {
                             $reseng40= 'D';
                             }
							 if($heng_m40 < 13)
                             {
                             $reseng40= 'E';
                             }
							 echo $reseng40;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">60</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $aeng_m60;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php 
                             if($aeng_m60 > 51)
                             {
                             $reseng60='A+';
                             }
							 if($aeng_m60 > 45 && $aeng_m60 < 52)
                             {
                             $reseng60= 'A';
                             }
							 if($aeng_m60 > 39 && $aeng_m60 < 46)
                             {
                             $reseng60= 'B+';
                             }
							 if($aeng_m60 > 33 && $aeng_m60 < 40)
                             {
                             $reseng60= 'B';
                             }
							 if($aeng_m60 > 30 && $aeng_m60 < 34)
                             {
                             $reseng60= 'C+';
                             }
							 if($aeng_m60 > 27 && $aeng_m60 < 31)
                             {
                             $reseng60= 'C';
                             }
							 if($aeng_m60 > 19 && $aeng_m60 < 28)
                             {
                             $reseng60= 'D';
                             }
							 if($aeng_m60 < 20)
                             {
                             $reseng60= 'E';
                             }
							 echo $reseng60;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000 solid;font-weight:bold;color:00356A;"><?php echo $english;  ?></td>

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
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Hindi</td>
<td align="center" style="border-right:2px #000000 solid;">40</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hhindi_m40; ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php                        if($hhindi_m40 > 34)
                             {
                             $reshindi40='A+';
                             }
							 if($hhindi_m40 > 30 && $hhindi_m40 < 35)
                             {
                             $reshindi40= 'A';
                             }
							 if($hhindi_m40 > 26 && $hhindi_m40 < 31)
                             {
                             $reshindi40= 'B+';
                             }
							 if($hhindi_m40 > 22 && $hhindi_m40 < 27)
                             {
                             $reshindi40= 'B';
                             }
							 if($hhindi_m40 > 20 && $hhindi_m40 < 23)
                             {
                             $reshindi40= 'C+';
                             }
							 if($hhindi_m40 > 18 && $hhindi_m40 < 21)
                             {
                             $reshindi40= 'C';
                             }
							 if($hhindi_m40 > 14 && $hhindi_m40 < 19)
                             {
                             $reshindi40= 'D';
                             }
							 if($hhindi_m40 < 13)
                             {
                             $reshindi40= 'E';
                             }
							 echo $reshindi40;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">60</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $ahindi_m60;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php 
                             if($ahindi_m60 > 51)
                             {
                             $reshindi60='A+';
                             }
							 if($ahindi_m60 > 45 && $ahindi_m60 < 52)
                             {
                             $reshindi60= 'A';
                             }
							 if($ahindi_m60 > 39 && $ahindi_m60 < 46)
                             {
                             $reshindi60= 'B+';
                             }
							 if($ahindi_m60 > 33 && $ahindi_m60 < 40)
                             {
                             $reshindi60= 'B';
                             }
							 if($ahindi_m60 > 30 && $ahindi_m60 < 34)
                             {
                             $reshindi60= 'C+';
                             }
							 if($ahindi_m60 > 27 && $ahindi_m60 < 31)
                             {
                             $reshindi60= 'C';
                             }
							 if($ahindi_m60 > 19 && $ahindi_m60 < 28)
                             {
                             $reshindi60= 'D';
                             }
							 if($ahindi_m60 < 20)
                             {
                             $reshindi60= 'E';
                             }
							 echo $reshindi60;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000 solid;font-weight:bold;color:00356A;"><?php echo $hindi;  ?></td>

<td align="center" style="color:#2d3b87;font-weight:bold;">
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
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>Mathematics</td>
<td align="center" style="border-right:2px #000000 solid;">40</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hmath_m40;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php                        if($hmath_m40 > 34)
                             {
                             $resmath40='A+';
                             }
							 if($hmath_m40 > 30 && $hmath_m40 < 35)
                             {
                             $resmath40= 'A';
                             }
							 if($hmath_m40 > 26 && $hmath_m40 < 31)
                             {
                             $resmath40= 'B+';
                             }
							 if($hmath_m40 > 22 && $hmath_m40 < 27)
                             {
                             $resmath40= 'B';
                             }
							 if($hmath_m40 > 20 && $hmath_m40 < 23)
                             {
                             $resmath40= 'C+';
                             }
							 if($hmath_m40 > 18 && $hmath_m40 < 21)
                             {
                             $resmath40= 'C';
                             }
							 if($hmath_m40 > 14 && $hmath_m40 < 19)
                             {
                             $resmath40= 'D';
                             }
							 if($hmath_m40 < 13)
                             {
                             $resmath40= 'E';
                             }
							 echo $resmath40;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">60</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $amath_m60;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php 
                             if($amath_m60 > 51)
                             {
                             $resmath60='A+';
                             }
							 if($amath_m60 > 45 && $amath_m60 < 52)
                             {
                             $resmath60= 'A';
                             }
							 if($amath_m60 > 39 && $amath_m60 < 46)
                             {
                             $resmath60= 'B+';
                             }
							 if($amath_m60 > 33 && $amath_m60 < 40)
                             {
                             $resmath60= 'B';
                             }
							 if($amath_m60 > 30 && $amath_m60 < 34)
                             {
                             $resmath60= 'C+';
                             }
							 if($amath_m60 > 27 && $amath_m60 < 31)
                             {
                             $resmath60= 'C';
                             }
							 if($amath_m60 > 19 && $amath_m60 < 28)
                             {
                             $resmath60= 'D';
                             }
							 if($amath_m60 < 20)
                             {
                             $resmath60= 'E';
                             }
							 echo $resmath60;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000 solid;font-weight:bold;color:00356A;"><?php echo $math;  ?></td>

<td align="center" style="color:#2d3b87;font-weight:bold;">
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
<td style="width:200PX;border-right:2px #000000 solid; font-weight:bold;" align="center">Grand Total</td>
<td align="center" style="border-right:2px #000000 solid;">120</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $half;  ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#00356A;font-weight:bold;">
<?php  $prh = $half*100/120;
                             if($prh > 85)
                             {
                             $resprh='A+';
                             }
							 if($prh > 75 && $prh < 86)
                             {
                             $resprh= 'A';
                             }
							 if($prh > 65 && $prh < 76)
                             {
                             $resprh= 'B+';
                             }
							 if($prh > 55 && $prh < 66)
                             {
                             $resprh= 'B';
                             }
							 if($prh > 50 && $prh < 56)
                             {
                             $resprh= 'C+';
                             }
							 if($prh > 45 && $prh < 51)
                             {
                             $resprh= 'C';
                             }
							 if($prh > 32 && $prh < 46)
                             {
                             $resprh= 'D';
                             }
							 if($prh < 33)
                             {
                             $resprh= 'E';
                             }
							 echo $resprh;
?>
</td>

<td align="center" style="border-right:2px #000000 solid;">180</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $annual;  ?></td>
<td align="center" style="border-right:2px #000000 solid; color:#00356A;font-weight:bold;">
<?php  $pra = $annual*100/180;
                             if($pra > 85)
                             {
                             $respra='A+';
                             }
							 if($pra > 75 && $pra < 86)
                             {
                             $respra= 'A';
                             }
							 if($pra > 65 && $pra < 76)
                             {
                             $respra= 'B+';
                             }
							 if($pra > 55 && $pra < 66)
                             {
                             $respra= 'B';
                             }
							 if($pra > 50 && $pra < 56)
                             {
                             $respra= 'C+';
                             }
							 if($pra > 45 && $pra < 51)
                             {
                             $respra= 'C';
                             }
							 if($pra > 32 && $pra < 46)
                             {
                             $respra= 'D';
                             }
							 if($pra < 33)
                             {
                             $respra= 'E';
                             }
							 echo $respra;
?>
</td>


<td align="center" style="border-right:2px #000000 solid;">300</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;color:#00356A;"><?php echo $annual100; ?></td>

<td align="center" style="font-weight:bold;color:#00356A;">
<?php  $fg = $annual100*100/300;

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
<td colspan="10"><span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp;Additional Subject: </span></td>
</tr>

<tr style="line-height:30PX;">
<td style="border-right:2px #000000 solid; width:200PX;">&nbsp;<img src="ar.png"  style=""/>EVS</td>
<td align="center" style="border-right:2px #000000 solid;">40</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hsc_m40;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php                        if($hsc_m40 > 34)
                             {
                             $ressc40='A+';
                             }
							 if($hsc_m40 > 30 && $hsc_m40 < 35)
                             {
                             $ressc40= 'A';
                             }
							 if($hsc_m40 > 26 && $hsc_m40 < 31)
                             {
                             $ressc40= 'B+';
                             }
							 if($hsc_m40 > 22 && $hsc_m40 < 27)
                             {
                             $ressc40= 'B';
                             }
							 if($hsc_m40 > 20 && $hsc_m40 < 23)
                             {
                             $ressc40= 'C+';
                             }
							 if($hsc_m40 > 18 && $hsc_m40 < 21)
                             {
                             $ressc40= 'C';
                             }
							 if($hsc_m40 > 14 && $hsc_m40 < 19)
                             {
                             $ressc40= 'D';
                             }
							 if($hsc_m40 < 13)
                             {
                             $ressc40= 'E';
                             }
							 echo $ressc40;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">60</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $asc_m60;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php 
                             if($asc_m60 > 51)
                             {
                             $ressc60='A+';
                             }
							 if($asc_m60 > 45 && $asc_m60 < 52)
                             {
                             $ressc60= 'A';
                             }
							 if($asc_m60 > 39 && $asc_m60 < 46)
                             {
                             $ressc60= 'B+';
                             }
							 if($asc_m60 > 33 && $asc_m60 < 40)
                             {
                             $ressc60= 'B';
                             }
							 if($asc_m60 > 30 && $asc_m60 < 34)
                             {
                             $ressc60= 'C+';
                             }
							 if($asc_m60 > 27 && $asc_m60 < 31)
                             {
                             $ressc60= 'C';
                             }
							 if($asc_m60 > 19 && $asc_m60 < 28)
                             {
                             $ressc60= 'D';
                             }
							 if($asc_m60 < 20)
                             {
                             $ressc60= 'E';
                             }
							 echo $ressc60;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000 solid;font-weight:bold;color:00356A;"><?php echo $science;  ?></td>

<td align="center" style="color:#2d3b87;font-weight:bold;">
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

<tr style="line-height:30PX;">
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>G.K</td>
<td align="center" style="border-right:2px #000000 solid;">40</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hgk_m40;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php                        if($hgk_m40 > 34)
                             {
                             $resgk40='A+';
                             }
							 if($hgk_m40 > 30 && $hgk_m40 < 35)
                             {
                             $resgk40= 'A';
                             }
							 if($hgk_m40 > 26 && $hgk_m40 < 31)
                             {
                             $resgk40= 'B+';
                             }
							 if($hgk_m40 > 22 && $hgk_m40 < 27)
                             {
                             $resgk40= 'B';
                             }
							 if($hgk_m40 > 20 && $hgk_m40 < 23)
                             {
                             $resgk40= 'C+';
                             }
							 if($hgk_m40 > 18 && $hgk_m40 < 21)
                             {
                             $resgk40= 'C';
                             }
							 if($hgk_m40 > 14 && $hgk_m40 < 19)
                             {
                             $resgk40= 'D';
                             }
							 if($hgk_m40 < 13)
                             {
                             $resgk40= 'E';
                             }
							 echo $resgk40;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">60</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $agk_m60;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php 
                             if($agk_m60 > 51)
                             {
                             $resgk60='A+';
                             }
							 if($agk_m60 > 45 && $agk_m60 < 52)
                             {
                             $resgk60= 'A';
                             }
							 if($agk_m60 > 39 && $agk_m60 < 46)
                             {
                             $resgk60= 'B+';
                             }
							 if($agk_m60 > 33 && $agk_m60 < 40)
                             {
                             $resgk60= 'B';
                             }
							 if($agk_m60 > 30 && $agk_m60 < 34)
                             {
                             $resgk60= 'C+';
                             }
							 if($agk_m60 > 27 && $agk_m60 < 31)
                             {
                             $resgk60= 'C';
                             }
							 if($agk_m60 > 19 && $agk_m60 < 28)
                             {
                             $resgk60= 'D';
                             }
							 if($agk_m60 < 20)
                             {
                             $resgk60= 'E';
                             }
							 echo $resgk60;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000 solid;font-weight:bold;color:00356A;"><?php echo $gk;  ?></td>

<td align="center" style="color:#2d3b87;font-weight:bold;">
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
<td style="border-right:2px #000000 solid;">&nbsp;<img src="ar.png"  style=""/>DRAWING</td>
<td align="center" style="border-right:2px #000000 solid;">40</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $hss_m40;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php                        if($hss_m40 > 34)
                             {
                             $resss40='A+';
                             }
							 if($hss_m40 > 30 && $hss_m40 < 35)
                             {
                             $resss40= 'A';
                             }
							 if($hss_m40 > 26 && $hss_m40 < 31)
                             {
                             $resss40= 'B+';
                             }
							 if($hss_m40 > 22 && $hss_m40 < 27)
                             {
                             $resss40= 'B';
                             }
							 if($hss_m40 > 20 && $hss_m40 < 23)
                             {
                             $resss40= 'C+';
                             }
							 if($hss_m40 > 18 && $hss_m40 < 21)
                             {
                             $resss40= 'C';
                             }
							 if($hss_m40 > 14 && $hss_m40 < 19)
                             {
                             $resss40= 'D';
                             }
							 if($hss_m40 < 13)
                             {
                             $resss40= 'E';
                             }
							 echo $resss40;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">60</td>
<td align="center" style="border-right:2px #000000 solid;font-weight:bold;"><?php echo $ass_m60;  ?></td>
<td align="center" style="color:#2d3b87;font-weight:bold;border-right:2px #000000 solid;">
<?php 
                             if($ass_m60 > 51)
                             {
                             $resss60='A+';
                             }
							 if($ass_m60 > 45 && $ass_m60 < 52)
                             {
                             $resss60= 'A';
                             }
							 if($ass_m60 > 39 && $ass_m60 < 46)
                             {
                             $resss60= 'B+';
                             }
							 if($ass_m60 > 33 && $ass_m60 < 40)
                             {
                             $resss60= 'B';
                             }
							 if($ass_m60 > 30 && $ass_m60 < 34)
                             {
                             $resss60= 'C+';
                             }
							 if($ass_m60 > 27 && $ass_m60 < 31)
                             {
                             $resss60= 'C';
                             }
							 if($ass_m60 > 19 && $ass_m60 < 28)
                             {
                             $resss60= 'D';
                             }
							 if($ass_m60 < 20)
                             {
                             $resss60= 'E';
                             }
							 echo $resss60;
?>
</td>
<td align="center" style="border-right:2px #000000 solid;">100</td>
<td align="center" style="border-right:2px #000 solid;font-weight:bold;color:00356A;"><?php echo $ss;  ?></td>

<td align="center" style="color:#2d3b87;font-weight:bold;">
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
<div style="width:99%; margin:0 auto; line-height:28px;margin-top:-15px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp; Performance in Co-Scholastics Areas :</span>
</div>
<?PHP
$sid = $rowstud['student_id'];
$rmk=mysqli_query($con,"select * from healthh where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);

$rmkk=mysqli_query($con,"select * from healthhh where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowrmkk=mysqli_fetch_array($rmkk);

?>


<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:5PX; float:left; margin-top:5px; width:285PX;">
<tr style="line-height:35px; background-color:#f9dacb; font-weight:bold;"><td align="center" colspan="2">Co-Curricular Activities</td></tr>

<tr><td>&nbsp;<img src="ar.png"  style=""/>LITERARY SKILLS</td><td style="width:50px;" align="center"><?php echo $rowrmk['height'];?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>SCIENTIFIC SKILLS</td><td align="center"><?php echo $rowrmk['weight'];?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CULTURAL SKILLS</td><td align="center"><?php echo $rowrmk['vision'];?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CREATIVITY</td><td align="center"><?php echo $rowrmk['bio'];?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>SPORTS</td><td align="center"><?php echo $rowrmk['math'];?></td></tr>
</table>

<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX; margin-left:25PX; float:left; margin-top:5px; width:730PX;">
<tr style="line-height:35px; background-color:#f9dacb; font-weight:bold;"><td align="center" colspan="4">Social Activities</td></tr>

<tr><td>&nbsp;<img src="ar.png"  style=""/>REGULARITY</td><td style="width:50px;" align="center"><?php echo $rowrmkk['height'];?></td>
<td>&nbsp;<img src="ar.png"  style=""/>ENVIRONMENTAL CONSCIOUSNESS</td><td style="width:50px;" align="center"><?php echo $rowrmkk['s1'];?></td></tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>PUNCTUALITY</td><td align="center"><?php echo $rowrmkk['weight'];?></td>
<td>&nbsp;<img src="ar.png"  style=""/>LEADERSHIP QUALITIES</td><td align="center"><?php echo $rowrmkk['s2'];?></td>
</tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CLEANLINESS</td><td align="center"><?php echo $rowrmkk['vision'];?></td>
<td>&nbsp;<img src="ar.png"  style=""/>TRUTHFULNESS</td><td align="center"><?php echo $rowrmkk['s3'];?></td>
</tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>DISCIPLINE </td><td align="center"><?php echo $rowrmkk['bio'];?></td>
<td>&nbsp;<img src="ar.png"  style=""/>HONESTY </td><td align="center"><?php echo $rowrmkk['s4'];?></td>
</tr>
<tr><td>&nbsp;<img src="ar.png"  style=""/>CO-OPERATION</td><td align="center"><?php echo $rowrmkk['math'];?></td>
<td>&nbsp;<img src="ar.png"  style=""/>EXPRESSIVE</td><td align="center"><?php echo $rowrmkk['s5'];?></td>
</tr>
</table>

<br clear="all" />
<div style="width:99%; margin:0 auto; line-height:28px;margin-top:5px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp; Final Result :</span>
</div>

<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:2px #000000 solid;font-size:21PX;margin-left:5PX;float:left;margin-top:5px;width:1041PX;">
<tr style="line-height:35px; background-color:#f9dacb; font-weight:bold;">
<td align="center">Max. Marks</td><td align="center">Obt. Marks</td><td align="center">Result</td><td align="center">Percentage</td><td align="center">Grade</td>
<td align="center">Rank</td><td align="center">Attendance</td>
</tr>
<tr align="center" style="color:#00356A; font-weight:bold;">
<td>300</td><td><?php echo $annual100; ?></td><td>Pass</td>

<td><?php $fg = $annual100*100/300; echo number_format($fg, 2);?>%</td>
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
<td><?php echo $rowrmk['s3'];?></td>
<td><?php echo $rowrmk['s1'];?></td>
</tr>

</table>

<table class="tbl" border="0" cellpadding="0" cellspacing="0" style="color:#000000;font-size:21PX;margin-left:5PX;float:left;margin-top:15px;width:1041PX;">
<tr style="line-height:20px; color:#000;">
<td style="width:225PX;">Class Teacher Remark : </td>
<td style="width:400px; color:#B9001C; font-weight:bold;border-top:2px #000 solid;border-bottom:2px #000 solid;">
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
if($rowstud['student_class']=='I')
{
$clss = '2nd';
}
if($rowstud['student_class']=='I A')
{
$clss = '2nd';
}
if($rowstud['student_class']=='I B')
{
$clss = '2nd';
}
if($rowstud['student_class']=='II')
{
$clss = '3rd';
}
if($rowstud['student_class']=='II A')
{
$clss = '3rd';
}
if($rowstud['student_class']=='II B')
{
$clss = '3rd';
}
echo $clss;
?>

 </td>
</tr
></table>
<br clear="all" /><br clear="all" />
<br clear="all" />
<table border="0" cellpadding="0" cellspacing="0" style="width:99%;font-size:21px; margin-top:50px; margin-left:10px;font-weight:bold;color:#000000;">
<tr>
<td align="center" style="float:left; margin-left:50px;">Class Teacher</td>


<td  align="center" style="float:right; margin-right:100px">Principal</td>
</tr>
</table>
</div>
</div>	
<br clear="all" />
</div>
    
      <?php
      $i++;
	  }
      ?>      
	   

	