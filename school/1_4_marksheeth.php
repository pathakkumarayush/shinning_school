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
.tbl tr{line-height:32px!important;font-size:21px!important;}
.tbl1 tr{line-height:37px!important;font-size:21px!important;}
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
$sid=$rowstud['student_id'];

$clstech=mysqli_query($con,"select * from class_teacher where class='".$rowstud['student_class']."' and teacher_session='$ses'");
$rowcls=mysqli_fetch_array($clstech);

$clsth=mysqli_query($con,"select * from teacher where uid='".$rowcls['teacher']."'");
$rowcls=mysqli_fetch_array($clsth);

 $rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='".$_SESSION['session']."'");
 $rowno=mysqli_fetch_array($rno);
?>	


<div style="width:1050px;height:1530px; border:6px #000 solid;font-family:Arial;background:url(wmm.png) no-repeat center;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:auto;margin-top:-10px;">
<img src="ml.png" style=" width:1030px; height:300px; margin-left:10px;" />
<br clear="all" />
</div>

<br clear="all" />	
<div style="width:100%;height:auto;">
<div style="width:69%; float:left;height:210px;text-transform: capitalize;">
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
<div style="width:30%; height:210px;float:left;">
<table style="width:100%;font-size:21px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tb12">
<tr style="line-height:37px;"><td class="sn2">Roll No.</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowno['rno']); ?></td></tr>
<tr style="line-height:37px;"><td class="sn2">Admission No.</td><td class="snn">&nbsp;:&nbsp;<span style="color:#FF0000;"><?php echo $rowstud['student_scholar']; ?></span></td></tr>
<tr style="line-height:37px;"><td class="sn2">FMID No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['family_id']; ?></td></tr>
<tr style="line-height:37px;"><td class="sn2">SSSMID</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['religion']; ?></td></tr>
<tr style="line-height:37px;"><td class="sn2">Aadhar No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_rollno']; ?></td></tr>
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

<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:5px; color:#0033CC; font-size:21px;">
<tr><td colspan="5" align="center" style="font-weight:bold; font-size:25px;">Half Yearly - Result : <?php echo $_GET['ses'];?></td></tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;border-top:2px #000000 solid;font-size:21PX; width:700PX;">
<tr align="center" style="font-weight:bold; color:#FF0000;">
<td style="line-height:50px; width:70px;">S.N.</td>
<td style="line-height:50px; width:350px;border-left:3px #000000 solid;">Subject</td>
<td style="line-height:50px; width:200px;border-left:3px #000000 solid;">Max. Marks</td>
<td style="line-height:50px; width:200px;border-left:3px #000000 solid;">Min. Marks</td>
</tr>
<?php
$tmt=0;
$class = $rowstud['student_class'];
$i=1;
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='$ses'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:50PX;">
<td align="center"> <?php echo $i; ?></td>
<td style="border-left:3px #000000 solid;"> &nbsp;&nbsp;<?php echo $sub_row['1']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"> <?php echo  $sub_row['8']; $tmt+=$sub_row['8']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"><?php echo $sub_row['9']; ?></td>
</tr>
<?php
 $i++;
 } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM2' and examination_session='$ses'");
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

<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:180px;color:#000000;border-right:1px #000000 solid;border-top:2px #000000 solid;border-left:1px #000000 solid; font-size:21px;">
<tr style="font-weight:bold; color:#FF0000;">
<td style="line-height:50px;">
<center>Marks Obtained</center>
</td>
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
<tr style="line-height:32PX;">
<td><center><?php           
$marks = $row['1'] ;
$final_grade1=$marks;
$final_grade = $final_grade1;
/*$te_cal++;*/
if($final_grade=='0')
{
echo 'Ab';
}else{
echo $final_grade;
}
$ttmot1+=$final_grade;
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:160px;color:#000000;border-right:3px #000000 solid;border-top:2px #000000 solid;border-left:1px #000000 solid; font-size:21px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:50px;font-weight:bold; color:#FF0000"><center>Remarks</center></td></tr>
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



<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;font-size:21px; width:700PX;">
<tr align="center" style="font-weight:bold; color:#000;">
<td style="line-height:50px;width:62px;"></td>
<td style="line-height:50px; width:298px;border-left:3px #000000 solid;">Total</td>
<td style="line-height:50px;width:161px;border-left:3px #000000 solid;"><?php echo $tmt; ?></td>
<td style="line-height:50px;width:161px;border-left:3px #000000 solid;">---</td>
</tr>
</table>
</td>

<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-right:1px #000000 solid;font-size:21px; width:180PX;">
<tr align="center" style="font-weight:bold; color:#000;">
<td style="line-height:50px;width:68px;"><?php echo $ttmot1; ?></td>
</tr>
</table>
</td>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-right:3px #000000 solid;font-size:21px; width:160PX;">
<tr align="center" style="font-weight:bold; color:#000;">
<td style="line-height:50px;width:68px;">--&nbsp;</td>
</tr>
</table>
</td>


</tr>

</table>

<br clear="all" />

<?php
$sid = $rowstud['student_id'];
$att_re=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and exam='HALF YEARLY' and session='$ses'");
$rowar=mysqli_fetch_array($att_re);

 ?>

<span style="color:0033CC; margin-left:20px; font-weight:bold; font-size:21px;">Additional Subject</span>
<table border="1" width="" cellpadding="0" cellspacing="0" style="margin-left:5px; border:2px #000000 solid; color:#000; font-size:20PX;">
<tr align="center" style="line-height:35px;">
<td style="width:70px;border-right:2px #000000 solid;">1</td>
<td style="width:335px;border-right:2px #000000 solid;">General Knowledge</td>
<td style="width:190px;border-right:2px #000000 solid;">50</td>
<td style="width:192px;border-right:2px #000000 solid;">17</td>
<td style="width:234px;border-right:2px #000000 solid;"><?php echo $rowar['height'];?></td>
</tr>


<tr align="center" style="line-height:35px;">
<td style="width:70px;border-right:2px #000000 solid;">2</td>
<td style="width:335px;border-right:2px #000000 solid;">Drawing</td>
<td style="width:190px;border-right:2px #000000 solid;">50</td>
<td style="width:192px;border-right:2px #000000 solid;">17</td>
<td style="width:234px;border-right:2px #000000 solid;"><?php echo $rowar['weight'];?></td>
</tr>

</table>




<?php			
$qrst=mysqli_query($con,"select subject,obtainmarks,totalmarks,status from marks where student='$uid' and exam='HALF YEARLY' and status='fail' and ses='$ses'") 
or die(mysqli_error());
$rowcount = mysqli_num_rows($qrst);
//echo $rowcount;
?>
<br clear="all" /><br clear="all" />
<table style="width:1036px; float:left;margin-left:50px;font-weight:bold; color: #0033CC; font-size:21px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px;">
<td style="width:135px;">Result</td>
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

<td style="width:135px;">Percentage</td><td>:&nbsp;&nbsp;<?php $perc = $ttmot1*100/$tmt;  
 $pr = substr($perc, 0, 2); 
                             if($rowcount > 0)
                             {
							 $pp='-';
							 }else{
							 $pp = $pr.'%';
							 }
 
 echo $pp;
 ?> </td>






</td>
</tr
></table>
<br clear="all" /><br clear="all" />
<br clear="all" />
<table style="width:1036px; float:left;margin-left:50px;font-weight:bold; color: #0033CC;font-size:21px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px;">


<td style="width:135px;">Division</td>
<td>
:&nbsp;&nbsp;<?php           if($rowcount > 0)
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
</tr
></table>
<br clear="all" /><br clear="all" />



<br clear="all" /><br clear="all" /><br clear="all" />
<table border="0" style="width:98%;margin-top:15px; margin-left:50px;font-weight:bold; font-size:22px;color: #FF0000;">
<tr>

<td style="width:325px;"><span style="margin-left:0px;">Class Teacher</span></td>

<td style="width:240px;"> <span style="float:right;font-size:22px; margin-right:77px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen(M.P.)</span></td>
</tr>
</table>

<?php }?>


<img src="ft.png" style="width:1040px; height:215px; margin-left:5px; margin-top:0px;" />


</div>
</div>	


	


	


<br clear="all" />
</div>
    
     
	   

	