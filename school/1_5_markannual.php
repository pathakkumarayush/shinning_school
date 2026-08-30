<?php
session_start();
require_once("../db.php"); 
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
<title>Nursery-LKG Marksheet</title>
</head>
<style>
.tbl{ width:162px;color:#000; border:1px #43C3DD solid; font-size:21px; font-weight:bold;}
.tb2{ width:70px;color:#000; border:1px #43C3DD solid; font-size:21px; font-weight:bold;}
.sn{ width:146px!important; line-height:36px;}
.sn1{ width:140px!important;line-height:30px;}
</style>     
<body style="font-family:Calibri;">
<?php
$term=$_GET['exam'];
$uid=$_GET['student_id'];
$i=1;
$search=mysqli_query($con,"select * from student where uid='$uid' and student_session='".$_GET['ses']."' and status='0' order by student_name Asc");
$rowstud=mysqli_fetch_array($search);
$uid=$rowstud['uid'];
?>	
<div style="width:1050px;height:1531px; border:6px #123c14 solid;">
<div style="width:100%; margin:0 auto; height:auto;">
<div style="float:left; margin-left:10px;"><img src="glogo.png" style="height:110px; width:120px; margin-top:10px;"  /></div>
<div style="float:left; width:85%;"><span style="font-size:64px; font-family:cambria; color:#123c14;">
<center><b>GURUKULAM PUBLIC SCHOOL</b></center></span>
<span style="font-size:31px; color:#123c14;font-weight:bold;"><center>Lalitpur Road Rajgarh, Jhansi - 284001</center></span>
<span style="font-size:25px; color:#123c14;font-weight:bold;"><center>Phone : 7985908691, 8858309215, 8419834999 </center></span>
</div>
<br clear="all" />
	  </div>
<br clear="all" />
<div style="width:100%; margin-top:3px; font-size:25px; background-color:#123c14; height:auto; font-weight:bold; line-height:35px; color:#FFFFFF">
<center>PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_GET['ses'];   ?>)</center>
</div>	 

<div style="width:100%;height:auto;">
<div style="width:70%; float:left; margin-left:5px; height:180px; ">
<table style="margin-left:10px; width:500px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Name of Student</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>
<tr><td class="sn">Class Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
</table>
</div>

<div style="width:10%; float:left; height:180px;">
<img src="upload/<?php echo $rowstud["student_img"]; ?>" style="height:140px; margin-left:10px; width:110px; margin-top:4px; " />
</div>
<br clear="all" />

</div>

<div style="width:100%; margin-top:10px; background-color:#123c14;font-size:25px;font-weight:bold; height:auto; line-height:35px; color:#FFFFFF">
<center>YEARLY PERFORMANCE</center>
</div>
<br clear="all" />
	  
<div style="width:100%;height:auto;">
<div style="width:100%;">
<?php
if($term=="$term")
{
?>
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:6px; margin-top:5px;font-size:21px; color:#244357;">
<tr style="border:1px #303192 solid; line-height:30px; font-weight:bold; background-color:#5fa962; color:#FFFFFF;">
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:3px #303192 solid;"><center>SCHOLASTIC <br /> AREA</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="3">
<center>TERM-1 <br />(100 MARKS)</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="3">
<center>TERM-2 <br />(100 MARKS)</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="3">
<center>TERM-3 <br />(100 MARKS)</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;solid;border-right:3px #303192 solid;" colspan="2">
&nbsp;&nbsp;OVERALL AVERAGE<br />TERM1+TERM2+TERM3</td>
</tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#303192;border:1px #303192 solid;border-left:3px #303192 solid;font-size:20PX; width:200PX;">
<tr><td style="line-height:54px; font-weight:bold;"><center>SUBJECT</center></td></tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='".$_GET['ses']."'"); 
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
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' and examination_session='".$_GET['ses']."'");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='".$_GET['ses']."'");
$len=mysqli_num_rows($sub);
$t=0;
$ttmotg11=0;
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:70px;color:#303192; border:1px #303192 solid; font-size:20px;">
 <?php 
 if($row[0]=="TERM1" || $row[0]=="TERM2")
 {
 $per=70;
 }
 else
 {
 $per=30;
 }
 ?>
<tr>
<?php 
if($row[0]=='TERM1')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>TERM1<br />(70)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;width:50px;font-weight:bold;">
<center>UNIT1<br />(30)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM1' and ses='".$_GET['ses']."'") or die(mysqli_error());
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
if($final_grade=='NIL')
{
echo 'NIL';
}
else if($final_grade=='AB')
{
echo 'AB';
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
$finalmarks[0][$t]=$markstot;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>

<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM2' and examination_session='".$_GET['ses']."' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='".$_GET['ses']."'");
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:70px;color:#303192; border:1px #303192 solid; font-size:20px;">
<?php 
 if($row[0]=="TERM1" || $row[0]=="TERM2")
 {
 $per=70;
 }
 else
 {
 $per=30;
 }
 ?>
<tr>
<?php 
if($row[0]=='TERM2')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>TERM2<br /><?php echo $per; ?></center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>UNIT2<br /><?php echo $per; ?></center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM2' and ses='".$_GET['ses']."'") 
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
$finalmarks[1][$t]=$markstot1;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>



<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM3' and examination_session='".$_GET['ses']."' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]' and session='".$_GET['ses']."'");
$len=mysqli_num_rows($sub);
$t=0;
$ttmotg13=0;
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
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:70px;color:#303192; border:1px #303192 solid; font-size:20px;">
<?php 
 if($row[0]=="TERM1" || $row[0]=="TERM2" || $row[0]=="TERM3")
 {
 $per=70;
 }
 else
 {
 $per=30;
 }
 ?>
<tr>
<?php 
if($row[0]=='TERM3')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>TERM3<br /><?php echo $per; ?></center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>UNIT3<br /><?php echo $per; ?></center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM3' and ses='".$_GET['ses']."'") 
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
echo 'AB';
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
$tmo13 = $markstot1;
$mto13 = $tmo13;
echo $mto13;
$ttmotg13+=$mto13;
$finalmarks[2][$t]=$markstot1;
$t++; 
?>
</center>
</td>
</tr>
<?php } ?>
</table>
</td>




<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="color:#303192; border:1px #303192 solid;width:100px; font-size:20px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>TOTAL<br />(300)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:35px;">
<td><center>
<?php                         
$gtm = $finalmarks[2][$t]+$finalmarks[1][$t]+$finalmarks[0][$t];
echo $gtm = round($finalmarks[2][$t]+$finalmarks[1][$t]+$finalmarks[0][$t]);
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:110px;color:#303192; border:1px #303192 solid;border-right:3px #303192 solid; font-size:20px;">
<tr></tr>
<tr></tr>
<tr><td style="line-height:27px;font-weight:bold;"><center>FINAL<br />GRADE&nbsp;</center></td></tr>
<?php $t=0;
while($t<$len)
{?> 
<tr style="line-height:35px;">
<td><center>
<?php                         
$gtmm = $finalmarks[2][$t]+$finalmarks[1][$t]+$finalmarks[0][$t];
$gtm =  round($gtmm*100/300); 
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

<tr style="border:1px #303192 solid; line-height:30px; font-weight:bold; color:#303192;">
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:3px #303192 solid;"><center>ALL TOTAL</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="3">
<center><?php echo $ttmotg11;?>/2700</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="4">
<center>PERCENTAGE & GRADE</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="2">
<center><?php $per = $ttmotg11*100/2700; ?> <?php echo substr($per, 0, 4); ?>%</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;solid;border-right:3px #303192 solid;" colspan="2" align="center">
<?php
                             if($per > 90)
                             {
                             $ress='A1';
                             }
							 if($per > 80 && $per < 91)
                             {
                             $ress= 'A2';
                             }
							 if($per > 70 && $per < 81)
                             {
                             $ress= 'B1';
                             }
							 if($per > 60 && $per < 71)
                             {
                             $ress= 'B2';
                             }
							 if($per > 50 && $per < 61)
                             {
                             $ress= 'C1';
                             }
							 if($per > 40 && $per < 51)
                             {
                             $ress= 'C2';
                             }
							 if($per > 32 && $per < 41)
                             {
                             $ress= 'D';
                             }
							 if($per < 33)
                             {
                             $ress= 'E';
                             }
							 echo $ress;


?>

</td>
</tr>

<tr style="border:1px #303192 solid; line-height:30px; font-weight:bold; color:#303192;">
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:3px #303192 solid;border-bottom:3px #303192 solid;"><center>Teacher's Remark</center></td>

<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;solid;border-right:3px #303192 solid;border-bottom:3px #303192 solid;" colspan="11">
&nbsp;&nbsp;&nbsp;<?php $per = $ttmotg11*100/2700; 

                             if($per > 89)
                             {
                             $resss='Outstanding - You are the best in all';
                             }
							 if($per > 74 && $per < 90)
                             {
                             $resss= 'Excellent - Keep it up';
                             }
							 if($per > 64 && $per < 75)
                             {
                             $resss= 'Welldone - Keep it up';
                             }
							 if($per > 54 && $per < 65)
                             {
                             $resss= 'Average work - Need practice';
                             }
							 if($per > 39 && $per < 55)
                             {
                             $resss= 'Poor work - Work Hard';
                             }
							 if($per < 40)
                             {
                             $resss= '-';
                             }
							 echo $resss;

?>
</td>
</tr>
</table>
<?php }?>
</div>
<br clear="all" />




<table style="width:48%; float:left; margin-top:8px; margin-left:12px;color:#303192; border:1px #303192 solid;font-size:20px;font-weight:bold;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;">
<td align="center" style="width:60px;" colspan="8">Grading System</td>
</tr>

<tr style="line-height:27px;" align="center"><td>100-91</td><td>90-81</td><td>80-71</td><td>70-61</td><td>60-51</td><td>50-41</td><td>40-33</td><td> 32 and below</td></tr>
<tr style="line-height:27px;" align="center"><td>A1</td><td>A2</td><td>B1</td><td>B2</td><td>C1</td><td>C2</td><td>D</td><td>E</td></tr>
</table>

<?php
$discipline1=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='".$_GET['ses']."'");
$rowdc1=mysqli_fetch_array($discipline1);
$discipline2=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM2' and session='".$_GET['ses']."'");
$rowdc2=mysqli_fetch_array($discipline2);
?>
<table style="width:48%; float:left; font-size:20px; margin-top:8px; margin-left:16px;color:#303192; border:1px #303192 solid;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#ea7d75; color:#FFFFFF;">
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
$healthq=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_GET['ses']."' and exam='TERM1'");
$rowh=mysqli_fetch_array($healthq);

$healthq1=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_GET['ses']."' and exam='TERM2'");
$rowh1=mysqli_fetch_array($healthq1);
?>

<table style="width:49%; float:left; font-size:20px; margin-top:10px; margin-left:15px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;">
<td><span style="color:#CC0000">Attendance Term 1 :</span> <?php echo $rowh['height']; ?></td>
</tr>
</table>
<table style="width:48%; float:left; font-size:20px; margin-top:10px; margin-left:10px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;">
<td><span style="color:#CC0000">Attendance Term 2 :</span> <?php echo $rowh1['height']; ?></td>
</tr>
</table>

<br clear="all" />
<table style="width:98%; float:left; font-size:20px; margin-top:15px; margin-left:5px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#CC0000">Remarks Term 1 :</span> <?php echo $rowh['weight']; ?></td>
</tr>
</table>

<table style="width:98%; float:left; font-size:20px; margin-top:15px; margin-left:5px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#CC0000">Remarks Term 2 :</span> <?php echo $rowh1['weight']; ?></td>
</tr>
</table>
<br clear="all" />


<table style="width:16%; float:left; font-size:20px; margin-top:10px; margin-left:12px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#CC0000">Term-1</span></td>
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
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_GET['ses']."'");
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
<td>&nbsp;&nbsp;<span style="color:#CC0000">Term-2</span></td>
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
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_GET['ses']."'");
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
<table border="0" style="width:100%; margin-top:90px; font-size:23px; font-weight:bold;color:#303192;">
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
    
    
     
	 

	