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
.tbl{ width:150px;font-size:18px!important;}
.tb2{ width:90px;font-size:18px!important;}
.sn{width:130px!important;font-size:18px!important;}
.sn1{width:138px!important;font-size:18px!important;}
.sn2{width:127px!important;font-size:18px!important;}
.tbl tr{line-height:32px!important;font-size:18px!important;}
.tbl1 tr{line-height:37px!important;font-size:18px!important;}


.fsz{font-size:18px!important;}
</style>
<?php
session_start();
require_once("../db.php"); 
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
<div style="width:1050px;height:1530px; border:8px #C0514E solid;font-family:Arial;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:auto;margin-top:-10px;">
<img src="mlo.png" style=" width:1020px; height:190px; margin-left:10px;" />
<br clear="all" />
</div>

<br clear="all" />	
<div style="width:100%;height:auto;">
<div style="width:60%; float:left;height:190px;text-transform: capitalize;">
<table style="width:100%;font-size:18px; margin-left:12px; color:#000000; " border="0" cellpadding="0" cellspacing="0" class="tbl1">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date Of Birth</td><td class="snn">&nbsp;:&nbsp;<?php echo $dob = $rowstud['student_dob']; ?> </td></tr>
<tr><td class="sn">Address</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_address']; ?></td></tr>
</table>
</div>
<div style="width:39%; height:190px;float:left;">
<table style="width:100%;font-size:18px; color:#000000;" border="0" cellpadding="0" cellspacing="0" class="tb12">
<tr style="line-height:31px;"><td class="sn2">Class</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_class']; ?></td></tr>
<tr style="line-height:31px;"><td class="sn2">Section</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['']; ?></td></tr>
<tr style="line-height:31px;"><td class="sn2">Admission No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_scholar']; ?></td></tr>
<tr style="line-height:31px;"><td class="sn2">Roll No.</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['rno']); ?></td></tr>
<tr style="line-height:31px;"><td class="sn2">SSSM ID</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_rollno']; ?></td></tr>
<tr style="line-height:31px;"><td class="sn2">Aadhar No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['religion']; ?></td></tr>
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

<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:6px; color:#000000; font-size:20PX;">
<tr style="border:1px #000000 solid; line-height:50px;color:#FF309C;">
<td style="border:1px #000000 solid;border-top:3px #000000 solid;border-left:3px #000000 solid;"><center>Scholastic Area</center></td>
<td style="border:1px #000000 solid;border-top:3px #000000 solid;border-left:2px #000000 solid;" colspan="6">
<center>Term- I (100 Marks)</center></td>
<td style="border:1px #000000 solid;border-top:3px #000000 solid;border-left:2px #000000 solid;border-right:3px #000000 solid;" colspan="6">
<center>Term - II (100 Marks)</center></td>

</tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;font-size:20PX; width:205PX;">
<tr><td style="line-height:81px;">&nbsp;&nbsp;Subject</td></tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='$ses'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:50PX;">
<td>
&nbsp;&nbsp;
<?php echo $sub_row['1']; ?>

</td></tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' and examination_session='$ses'");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='$ses'");
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

<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:65px;color:#000000; border:1px #000000 solid; font-size:20px;">
<?php 
 if($row[0]=="PT1" || $row[0]=="PT2")
 {
 $per=10;
 }
 else if($row[0]=="HALF YEARLY" || $row[0]=="YEARLY")
 {
 $per=80;
 }
 else{$per=5;
 }
 ?>
<tr>
<?php 
if($row[0]=='PT1')
{
?>
<td style="line-height:27px;">
<center>PT-1<br /><br />(<?php echo $per; ?>)&nbsp;</center>
</td>
<?php
}
else if($row[0]=='NB1')
{
?>
<td style="line-height:27px;">
<center>Note Book<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='HALF YEARLY')
{
?>
<td style="line-height:27px;">
<center>&nbsp;HALF &nbsp;YEARLY&nbsp;<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;">
<center>SEA<br /><br />(<?php echo $per; ?>)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM1' and ses='$ses'") 
or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:32PX;">
<td><center><?php           
$marks = ($row['1'] * 100)/$row[2];
$final_grade1=($marks*$per)/100;
$final_grade = $final_grade1;
/*$te_cal++;*/
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000000; border:1px #000000 solid; font-size:20px; width:65px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;"><center>Total <br /><br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:32px;">
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

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000000; border:1px #000000 solid; font-size:20px; width:74px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;"><center>Grade</center><br /><br /></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:32px;">
<td><center>
<?php /*$final_cal[$t]=0;*/
$markstot = $final_cal[$t];
$tmo = $markstot;
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
							 if($tmo > 32 && $tmo < 41)
                             {
                             $res= 'D';
                             }
							 if($tmo < 33)
                             {
                             $res= 'E';
                             }
							 echo $res;
$finalmarks[0][$t]=$markstot/2;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM2' and examination_session='$ses' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='$ses'");
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:65px;color:#000000; border:1px #000000 solid; font-size:20px;">
<?php 
 if($row[0]=="PT1" || $row[0]=="PT2")
 {
 $per=10;
 }
 else if($row[0]=="HALF YEARLY" || $row[0]=="YEARLY")
 {
 $per=80;
 }
 else{$per=5;
 }
 ?>
<tr>
<?php 
if($row[0]=='PT2')
{
?>
<td style="line-height:27px;">
<center>PT-2<br /><br />(<?php echo $per; ?>)&nbsp;</center>
</td>
<?php
}
else if($row[0]=='NB2')
{
?>
<td style="line-height:27px;">
<center>Note Book<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='YEARLY')
{
?>
<td style="line-height:27px;">
<center>&nbsp;YEARLY&nbsp;<br /><br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;width:50px;">
<center>SEA<br /><br />(<?php echo $per; ?>)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM2' and ses='$ses'") 
or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{	
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:32px;">
<td>
<center>
<?php           
$marks = ($row['1'] * 100)/$row[2];
$final_grade1=($marks*$per)/100;
$final_grade = $final_grade1;
/*$te_cal++;*/
 $final_grade;
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000000; border:1px #000000 solid; font-size:20px; width:65px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;"><center>Total<br /><br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:32px;">
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#000000; border:1px #000000 solid; font-size:20px; width:74px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;border-right:3px #000000 solid;"><center>Grade</center><br /><br /></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:32px;">
<td style="border-right:3px #000000 solid;"><center>
<?php /*$final_cal[$t]=0;*/	                         
$markstot1 = $final_cal1[$t];
                            $tmo1 = $markstot1;

                             if($tmo1 > 90)
                             {
                             $res='A1';
                             }
							 if($tmo1 > 80 && $tmo1 < 91)
                             {
                             $res= 'A2';
                             }
							 if($tmo1 > 70 && $tmo1 < 81)
                             {
                             $res= 'B1';
                             }
							 if($tmo1 > 60 && $tmo1 < 71)
                             {
                             $res= 'B2';
                             }
							 if($tmo1 > 50 && $tmo1 < 61)
                             {
                             $res= 'C1';
                             }
							 if($tmo1 > 40 && $tmo1 < 51)
                             {
                             $res= 'C2';
                             }
							 if($tmo1 > 32 && $tmo1 < 41)
                             {
                             $res= 'D';
                             }
							 if($tmo1 < 33)
                             {
                             $res= 'E';
                             }
							 echo $res;

$finalmarks[1][$t]=$markstot1/2;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>
</tr>


<tr style="line-height:35px;">
<td style="border-left:4px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;">&nbsp;&nbsp;Over All Marks & %</td>

<td colspan="3" style="border-left:2px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;">

<?php 
$alltotterm1=0;
$totpt1=0;
$qspt1=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='PT1' and term='TERM1' and ses='$ses'") 
or die(mysqli_error());
while($rowpt1=mysqli_fetch_row($qspt1))
{
if($rowpt1[0]=='English' || $rowpt1[0]=='Hindi' || $rowpt1[0]=='Mathematics' || $rowpt1[0]=='EVS')
{
$totpt1+=$rowpt1[1];
}
}
?>
<?php //echo $totpt1; ?>

<?php 
$totnb1=0;
$qsnb1=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='NB1' and term='TERM1' and ses='$ses'") 
or die(mysqli_error());
while($rownb1=mysqli_fetch_row($qsnb1))
{
if($rownb1[0]=='English' || $rownb1[0]=='Hindi' || $rownb1[0]=='Mathematics' || $rownb1[0]=='EVS')
{
$totnb1+=$rownb1[1];
}
}
?>
<?php //echo $totnb1; ?>

<?php 
$totse1=0;
$qsse1=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='SE1' and term='TERM1' and ses='$ses'") 
or die(mysqli_error());
while($rowse1=mysqli_fetch_row($qsse1))
{
if($rowse1[0]=='English' || $rowse1[0]=='Hindi' || $rowse1[0]=='Mathematics' || $rowse1[0]=='EVS')
{
$totse1+=$rowse1[1];
}
}
?>
<?php //echo $totse1; ?>

<?php 
$tothy1=0;
$qshy1=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='HALF YEARLY' and term='TERM1' and ses='$ses'") 
or die(mysqli_error());
while($rowhy1=mysqli_fetch_row($qshy1))
{
if($rowhy1[0]=='English' || $rowhy1[0]=='Hindi' || $rowhy1[0]=='Mathematics' || $rowhy1[0]=='EVS')
{
$tothy1+=$rowhy1[1];
}
}
?>
<?php //echo $tothy1; ?>
<center>
<?php $alltotterm1 = $totpt1+$totnb1+$totse1+$tothy1;  echo $alltotterm1;?>/400
</center>


</td>

<td colspan="3" style="border-left:2px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;" align="center">
<?php $prcterm1 =  $alltotterm1*100/400;  echo substr($prcterm1, 0, 3); ?>%
</td>



<td colspan="3" style="border-left:2px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;">
<?php 
$alltotterm2=0;
$totpt2=0;
$qspt2=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='PT2' and term='TERM2' and ses='$ses'") 
or die(mysqli_error());
while($rowpt2=mysqli_fetch_row($qspt2))
{
if($rowpt2[0]=='English' || $rowpt2[0]=='Hindi' || $rowpt2[0]=='Mathematics' || $rowpt2[0]=='EVS')
{
$totpt2+=$rowpt2[1];
}
}
?>
<?php //echo $totpt1; ?>

<?php 
$totnb2=0;
$qsnb2=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='NB2' and term='TERM2' and ses='$ses'") 
or die(mysqli_error());
while($rownb2=mysqli_fetch_row($qsnb2))
{
if($rownb2[0]=='English' || $rownb2[0]=='Hindi' || $rownb2[0]=='Mathematics' || $rownb2[0]=='EVS')
{
$totnb2+=$rownb2[1];
}
}
?>
<?php //echo $totnb1; ?>

<?php 
$totse2=0;
$qsse2=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='SE2' and term='TERM2' and ses='$ses'") 
or die(mysqli_error());
while($rowse2=mysqli_fetch_row($qsse2))
{
if($rowse2[0]=='English' || $rowse2[0]=='Hindi' || $rowse2[0]=='Mathematics' || $rowse2[0]=='EVS')
{
$totse2+=$rowse2[1];
}
}
?>
<?php //echo $totse1; ?>

<?php 
$tothy2=0;
$qshy2=mysqli_query($con,"select subject,obtainmarks,totalmarks,exam from marks where student='$uid' and exam='YEARLY' and term='TERM2' and ses='$ses'") 
or die(mysqli_error());
while($rowhy2=mysqli_fetch_row($qshy2))
{
if($rowhy2[0]=='English' || $rowhy2[0]=='Hindi' || $rowhy2[0]=='Mathematics' || $rowhy2[0]=='EVS')
{
$tothy2+=$rowhy2[1];
}
}
?>
<?php //echo $tothy1; ?>
<center>
<?php $alltotterm2 = $totpt2+$totnb2+$totse2+$tothy2;  echo $alltotterm2;?>/400
</center>


</td>

<td colspan="3" style="border-left:2px #000000 solid;border-right:4px #000000 solid;border-bottom:2px #000000 solid;" align="center">
<?php $prcterm2 =  $alltotterm2*100/400;  echo substr($prcterm2, 0, 3); ?>%
</td>
</tr>

<?php
$sid = $rowstud['student_id'];
$att_re=mysqli_query($con,"select * from att_helth1 where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowar=mysqli_fetch_array($att_re);

$att_re1=mysqli_query($con,"select * from att_helth1 where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM2' and session='$ses'");
$rowar1=mysqli_fetch_array($att_re1);

$cos=mysqli_query($con,"select * from co_scholastic where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowco=mysqli_fetch_array($cos);

$dic=mysqli_query($con,"select * from life_skills where student='$sid' and class='".$rowstud['student_class']."' and session='$ses'");
$rowd=mysqli_fetch_array($dic);
 ?>


<tr style="line-height:35px;">
<td style="border-left:4px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;">&nbsp;&nbsp;Grade & Rank</td>
<td colspan="3" style="border-left:2px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;" align="center">
<?php
                          

                             if($prcterm1 > 90)
                             {
                             $res1='A1';
                             }
							 if($prcterm1 > 80 && $prcterm1 < 91)
                             {
                             $res1= 'A2';
                             }
							 if($prcterm1 > 70 && $prcterm1 < 81)
                             {
                             $res1= 'B1';
                             }
							 if($prcterm1 > 60 && $prcterm1 < 71)
                             {
                             $res1= 'B2';
                             }
							 if($prcterm1 > 50 && $prcterm1 < 61)
                             {
                             $res1= 'C1';
                             }
							 if($prcterm1 > 40 && $prcterm1 < 51)
                             {
                             $res1= 'C2';
                             }
							 if($prcterm1 > 32 && $prcterm1 < 41)
                             {
                             $res1= 'D';
                             }
							 if($prcterm1 < 33)
                             {
                             $res1= 'E';
                             }
							 echo $res1;

?>

</td>

<td colspan="3" style="border-left:2px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;" align="center">
<?php echo $rowar['attend'];?>
</td>



<td colspan="3" style="border-left:2px #000000 solid;border-right:2px #000000 solid;border-bottom:2px #000000 solid;" align="center">
<?php
                          

                             if($prcterm2 > 90)
                             {
                             $res2='A1';
                             }
							 if($prcterm2 > 80 && $prcterm2 < 91)
                             {
                             $res2= 'A2';
                             }
							 if($prcterm2 > 70 && $prcterm2 < 81)
                             {
                             $res2= 'B1';
                             }
							 if($prcterm2 > 60 && $prcterm2 < 71)
                             {
                             $res2= 'B2';
                             }
							 if($prcterm2 > 50 && $prcterm2 < 61)
                             {
                             $res2= 'C1';
                             }
							 if($prcterm2 > 40 && $prcterm2 < 51)
                             {
                             $res2= 'C2';
                             }
							 if($prcterm2 > 32 && $prcterm2 < 41)
                             {
                             $res2= 'D';
                             }
							 if($prcterm2 < 33)
                             {
                             $res2= 'E';
                             }
							 echo $res2;

?>

</td>

<td colspan="3" style="border-left:2px #000000 solid;border-right:4px #000000 solid;border-bottom:2px #000000 solid;" align="center">
<?php echo $rowar1['attend'];?>
</td>

</tr>

</table>


<table style="width:515px;; float:left; margin-top:20px; margin-left:6px;color:#000000; border:3px #000000 solid;font-size:20px;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:25px; color:#FF309C;">
<td align="center"  colspan="2">Co - Scholastic Areas <br />(3 Point Grading Scale A, B, C)</td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Activity</td>
<td align="center" style="width:150px;">Grade</td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Work Education</td>
<td align="center"><?php echo $rowco['worke']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Art Education</td>
<td align="center"><?php echo $rowco['arts']; ?></td>
</tr>


<tr style="line-height:32px;">
<td>&nbsp;Health & Physical Education</td>
<td align="center"><?php echo $rowco['phye']; ?></td>

</tr>

<tr style="line-height:32px;">
<td>&nbsp;Yoga </td>
<td align="center"><?php echo $rowco['ncc']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Sports</td>
<td align="center"><?php echo $rowco['sport']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;-&nbsp;</td>
<td align="center"><?php //echo $rowco1['disc']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;-&nbsp;</td>
<td align="center"><?php //echo $rowco1['disc']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;-&nbsp;</td>
<td align="center"><?php //echo $rowco1['disc']; ?></td>
</tr>

</table>



<table style="width:515px; float:left; margin-top:20px; margin-left:10px;color:#000000; border:3px #000000 solid;font-size:20px;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:25px; color:#FF309C;">
<td align="center"  colspan="2">Discipline <br />(3 Point Grading Scale A, B, C)</td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Element</td>
<td align="center" style="width:150px;">Grade</td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Regularity & Punctuality</td>
<td align="center"><?php echo $rowd['decision']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Sincerity</td>
<td align="center"><?php echo $rowd['selfa']; ?></td>
</tr>


<tr style="line-height:32px;">
<td>&nbsp;Behavior & Values</td>
<td align="center"><?php echo $rowd['creative']; ?></td>

</tr>

<tr style="line-height:32px;">
<td>&nbsp;Respectfulness for Rules & Regulation</td>
<td align="center"><?php echo $rowd['prob']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Attitude Towards Teacher</td>
<td align="center"><?php echo $rowd['coping']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Attitude Towards School - mates</td>
<td align="center"><?php echo $rowd['emotions']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Attitude Towards Society</td>
<td align="center"><?php echo $rowd['rel']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;Attitude Towards Nation</td>
<td align="center"><?php echo $rowd['emp']; ?></td>
</tr>

</table>
<br clear="all" />
<table style="width:100%;margin-top:10px; margin-left:10px;color:#000000; font-size:18px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px; color:#000;">
<td>Attendance : <?php echo $rowar1['height'];?> </td>
</tr
></table>
<br clear="all" />

<table style="width:1036px; float:left;margin-left:10px;color:#000000; font-size:18px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px; color:#000;">
<td style="width:600px;">Remarks: <?php echo $rowar['weight'];?> </td> <td style="width:600px;">Remarks: <?php echo $rowar1['weight'];?> </td>
</tr
></table>
<br clear="all" /><br clear="all" />
<table style="width:1034px; float:left;margin-left:10px;color:#000000;border:2px #000000 solid;; font-size:18px;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:20px; color:#000;">
<td>&nbsp;Marks Range</td> <td align="center" style="color:#0000FF"> 91 - 100</td><td align="center" style="color:#0000FF">81 - 90 </td>
<td align="center" style="color:#FF0000"> 71 - 80</td>
<td align="center" style="color:#FF0000"> 61 - 70</td> 
<td align="center" style="color:#009933">51 – 60 </td> <td align="center" style="color:#009933"> 41 - 50</td> 
<td align="center" style="color:#FF0000">33 - 40 </td> <td align="center" style="color:#FF0000"> 32 &BELOW</td>
</tr

><tr style="line-height:20px; color:#000;">
<td>&nbsp;Grade</td> <td align="center" style="color:#0000FF"> A1</td><td align="center" style="color:#0000FF">A2 </td><td align="center" style="color:#FF0000"> B1</td>
<td align="center" style="color:#FF0000"> B2</td> <td align="center" style="color:#009933">C1 </td> <td align="center" style="color:#009933"> C2</td>
 <td align="center" style="color:#FF0000">D </td> <td align="center" style="color:#FF0000"> E (Failed)</td>
</tr
></table>
<br clear="all" />
<table style="width:100%;margin-top:10px; margin-left:10px;color:#000000; font-weight:bold; font-size:18px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px; color:#000;">
<td>Passed and Qualified for  : 
<?PHP
if($rowstud['student_class']=='I')
{
$clss = 'II Class';
}
if($rowstud['student_class']=='II')
{
$clss = 'II Class';
}
if($rowstud['student_class']=='III')
{
$clss = 'IV Class';
}
if($rowstud['student_class']=='IV')
{
$clss = 'V Class';
}
if($rowstud['student_class']=='V')
{
$clss = 'VI Class';
}
echo $clss;

?>

 </td>
</tr
></table>
<br clear="all" /><br clear="all" />
<table border="0" style="width:98%;margin-top:20px; margin-left:20px; font-size:18px;color:#000;">
<tr>
<td style="width:225px;">Date : </td>
<td style="width:325px;">Class Teacher's Sign.</td>
<td style="width:300px;">Parent's Sign.</td>
<td style="width:240px;">Principal's Sign. / Seal</td>
</tr>
</table>

<?php }?>

</div>
</div>	


	


	


<br clear="all" />
</div>
    
     
	 

	