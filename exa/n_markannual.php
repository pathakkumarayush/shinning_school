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
<div style="width:1050px;height:1530px; border:10px #FED966 solid;font-family:Arial;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:auto;margin-top:-10px;">
<img src="nlo.png" style=" width:960px; height:200px; margin-left:10px;" />
<br clear="all" />
</div>

<br clear="all" />	
<div style="width:100%;height:auto;">
<div style="width:60%; float:left;height:190px;text-transform: capitalize;">
<table style="width:100%;font-size:18px; margin-left:12px; color:#000000; " border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date Of Birth</td><td class="snn">&nbsp;:&nbsp;<?php echo $dob = $rowstud['student_dob']; ?> </td></tr>
<tr><td class="sn">SSSMID No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['religion']; ?></td></tr>
<tr><td class="sn">Address</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_address']; ?></td></tr>
</table>
</div>
<div style="width:39%; height:190px;float:left;">
<table style="width:100%;font-size:18px; color:#000000;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn2">Class</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_class']; ?></td></tr>
<tr><td class="sn2">Section</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['']; ?></td></tr>
<tr><td class="sn2">Admission No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_scholar']; ?></td></tr>
<tr><td class="sn2">Roll No.</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['rno']); ?></td></tr>
<tr><td class="sn2">Aadhar No.</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_rollno']; ?></td></tr>


</table>
</div>


<br clear="all" />
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div>

<table border="2" width="" cellpadding="0" cellspacing="0" style="margin-left:10px; width:98%; color:#000000; border:2px #000000; font-size:20PX;">
<tr style="line-height:40px;">
<td style="width:155px; background-color:#012060; color:#D4D924;">&nbsp;ENGLISH</td>
<td style="width:90px;" align="center">Marks</td>
<td style="width:90px;" align="center">Grade</td>
<td style="width:90px;" align="center">Marks</td>
<td style="width:90px;" align="center">Grade</td>
<td style="width:90px;" align="center">Marks</td>
<td style="width:90px;" align="center">Grade</td>
</tr>

<tr style="line-height:40px;">
<td style="width:155px;">&nbsp;Reading + Recitation</td>
<td style="width:90px;" align="center">
<?php			
$qeng_red_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Eng. Reading' and ses='$ses'") 
or die(mysqli_error());
$rowengrq=mysqli_fetch_array($qeng_red_quaterly);
echo $eng_red_marks = $rowengrq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($eng_red_marks > 45)
                             {
                             $res='A1';
                             }
                             if($eng_red_marks > 40 && $eng_red_marks < 46)
                             {
                             $res= 'A2';
                             }
                             if($eng_red_marks > 35 && $eng_red_marks < 41)
                             {
                             $res= 'B1';
                             }
                             if($eng_red_marks > 30 && $eng_red_marks < 36)
                             {
                             $res= 'B2';
                             }
                        
                             if($eng_red_marks < 31)
                             {
                             $res= 'C1';
                             }
                             if($eng_red_marks==' ')
                             {
                             $res= '-';
                             }
                             echo $res;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qeng_red_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Eng. Reading' and ses='$ses'") 
or die(mysqli_error());
$rowengrh=mysqli_fetch_array($qeng_red_hy);
echo $eng_red_h_marks = $rowengrh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($eng_red_h_marks > 45)
                             {
                             $res1='A1';
                             }
                             if($eng_red_h_marks > 40 && $eng_red_h_marks < 46)
                             {
                             $res1= 'A2';
                             }
                             if($eng_red_h_marks > 35 && $eng_red_h_marks < 41)
                             {
                             $res1= 'B1';
                             }
                             if($eng_red_h_marks > 30 && $eng_red_h_marks < 36)
                             {
                             $res1= 'B2';
                             }
                        
                             if($eng_red_h_marks < 31)
                             {
                             $res1= 'C1';
                             }
                             if($eng_red_h_marks==' ')
                             {
                             $res1= '-';
                             }
                             echo $res1;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qeng_red_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Eng. Reading' and ses='$ses'") 
or die(mysqli_error());
$rowengry=mysqli_fetch_array($qeng_red_y);
echo $eng_red_y_marks = $rowengry['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($eng_red_y_marks > 95)
                             {
                             $res2='A1';
                             }
                             if($eng_red_y_marks > 90 && $eng_red_y_marks < 96)
                             {
                             $res2= 'A2';
                             }
                             if($eng_red_y_marks > 85 && $eng_red_y_marks < 91)
                             {
                             $res2= 'B1';
                             }
                             if($eng_red_y_marks > 80 && $eng_red_y_marks < 86)
                             {
                             $res2= 'B2';
                             }
                        
                             if($eng_red_y_marks < 81)
                             {
                             $res2= 'C1';
                             }
                             if($eng_red_y_marks==' ')
                             {
                             $res2= '-';
                             }
                             echo $res2;
?>

</td>
</tr>


<tr style="line-height:40px;">
<td style="width:155px;">&nbsp;Written + Dictation</td>
<td style="width:90px;" align="center">
<?php			
$qeng_wr_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Eng. Written' and ses='$ses'") 
or die(mysqli_error());
$rowengwq=mysqli_fetch_array($qeng_wr_quaterly);
echo $eng_wr_marks = $rowengwq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($eng_wr_marks > 45)
                             {
                             $res3='A1';
                             }
                             if($eng_wr_marks > 40 && $eng_wr_marks < 46)
                             {
                             $res3= 'A2';
                             }
                             if($eng_wr_marks > 35 && $eng_wr_marks < 41)
                             {
                             $res3= 'B1';
                             }
                             if($eng_wr_marks > 30 && $eng_wr_marks < 36)
                             {
                             $res3= 'B2';
                             }
                        
                             if($eng_wr_marks < 31)
                             {
                             $res3= 'C1';
                             }
                             if($eng_wr_marks==' ')
                             {
                             $res3= '-';
                             }
                             echo $res3;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qeng_wr_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Eng. Written' and ses='$ses'") 
or die(mysqli_error());
$rowengwh=mysqli_fetch_array($qeng_wr_hy);
echo $eng_wr_h_marks = $rowengwh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($eng_wr_h_marks > 45)
                             {
                             $res4='A1';
                             }
                             if($eng_wr_h_marks > 40 && $eng_wr_h_marks < 46)
                             {
                             $res4= 'A2';
                             }
                             if($eng_wr_h_marks > 35 && $eng_wr_h_marks < 41)
                             {
                             $res4= 'B1';
                             }
                             if($eng_wr_h_marks > 30 && $eng_wr_h_marks < 36)
                             {
                             $res4= 'B2';
                             }
                        
                             if($eng_wr_h_marks < 31)
                             {
                             $res4= 'C1';
                             }
                             if($eng_wr_h_marks==' ')
                             {
                             $res4= '-';
                             }
                             echo $res4;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qeng_wr_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Eng. Written' and ses='$ses'") 
or die(mysqli_error());
$rowengwy=mysqli_fetch_array($qeng_wr_y);
echo $eng_wr_y_marks = $rowengwy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($eng_wr_y_marks > 95)
                             {
                             $res5='A1';
                             }
                             if($eng_wr_y_marks > 90 && $eng_wr_y_marks < 96)
                             {
                             $res5= 'A2';
                             }
                             if($eng_wr_y_marks > 85 && $eng_wr_y_marks < 91)
                             {
                             $res5= 'B1';
                             }
                             if($eng_wr_y_marks > 80 && $eng_wr_y_marks < 86)
                             {
                             $res5= 'B2';
                             }
                        
                             if($eng_wr_y_marks < 81)
                             {
                             $res5= 'C1';
                             }
                             if($eng_wr_y_marks==' ')
                             {
                             $res5= '-';
                             }
                             echo $res5;
?>

</td>
</tr>


<tr style="line-height:40px;">
<td style="width:155px; background-color:#012060; color:#D4D924;">&nbsp;HINDI</td>
<td  align="center" colspan="6">&nbsp;</td>
</tr>

<tr style="line-height:40px;">
<td style="width:155px;">&nbsp;Reading + Recitation</td>
<td style="width:90px;" align="center">
<?php			
$qhindi_red_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Hindi Reading' and ses='$ses'") 
or die(mysqli_error());
$rowhindirq=mysqli_fetch_array($qhindi_red_quaterly);
echo $hindi_red_marks = $rowhindirq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($hindi_red_marks > 45)
                             {
                             $res6='A1';
                             }
                             if($hindi_red_marks > 40 && $hindi_red_marks < 46)
                             {
                             $res6= 'A2';
                             }
                             if($hindi_red_marks > 35 && $hindi_red_marks < 41)
                             {
                             $res6= 'B1';
                             }
                             if($hindi_red_marks > 30 && $hindi_red_marks < 36)
                             {
                             $res6= 'B2';
                             }
                        
                             if($hindi_red_marks < 31)
                             {
                             $res6= 'C1';
                             }
                             if($hindi_red_marks==' ')
                             {
                             $res6= '-';
                             }
                             echo $res6;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qhindi_red_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Hindi Reading' and ses='$ses'") 
or die(mysqli_error());
$rowhindirh=mysqli_fetch_array($qhindi_red_hy);
echo $hindi_red_h_marks = $rowhindirh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($hindi_red_h_marks > 45)
                             {
                             $res7='A1';
                             }
                             if($hindi_red_h_marks > 40 && $hindi_red_h_marks < 46)
                             {
                             $res7= 'A2';
                             }
                             if($hindi_red_h_marks > 35 && $hindi_red_h_marks < 41)
                             {
                             $res7= 'B1';
                             }
                             if($hindi_red_h_marks > 30 && $hindi_red_h_marks < 36)
                             {
                             $res7= 'B2';
                             }
                        
                             if($hindi_red_h_marks < 31)
                             {
                             $res7= 'C1';
                             }
                             if($hindi_red_h_marks==' ')
                             {
                             $res7= '-';
                             }
                             echo $res7;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qhindi_red_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Hindi Reading' and ses='$ses'") 
or die(mysqli_error());
$rowhindiry=mysqli_fetch_array($qhindi_red_y);
echo $hindi_red_y_marks = $rowhindiry['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($hindi_red_y_marks > 95)
                             {
                             $res8='A1';
                             }
                             if($hindi_red_y_marks > 90 && $hindi_red_y_marks < 96)
                             {
                             $res8= 'A2';
                             }
                             if($hindi_red_y_marks > 85 && $hindi_red_y_marks < 91)
                             {
                             $res8= 'B1';
                             }
                             if($hindi_red_y_marks > 80 && $hindi_red_y_marks < 86)
                             {
                             $res8= 'B2';
                             }
                        
                             if($hindi_red_y_marks < 81)
                             {
                             $res8= 'C1';
                             }
                             if($hindi_red_y_marks==' ')
                             {
                             $res8= '-';
                             }
                             echo $res8;
?>

</td>
</tr>

<tr style="line-height:40px;">
<td style="width:155px;">&nbsp;Written + Dictation</td>
<td style="width:90px;" align="center">
<?php			
$qhindi_wr_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Hindi Written' and ses='$ses'") 
or die(mysqli_error());
$rowhindiwq=mysqli_fetch_array($qhindi_wr_quaterly);
echo $hindi_wr_marks = $rowhindiwq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($hindi_wr_marks > 45)
                             {
                             $res9='A1';
                             }
                             if($hindi_wr_marks > 40 && $hindi_wr_marks < 46)
                             {
                             $res9= 'A2';
                             }
                             if($hindi_wr_marks > 35 && $hindi_wr_marks < 41)
                             {
                             $res9= 'B1';
                             }
                             if($hindi_wr_marks > 30 && $hindi_wr_marks < 36)
                             {
                             $res9= 'B2';
                             }
                        
                             if($hindi_wr_marks < 31)
                             {
                             $res9= 'C1';
                             }
                             if($hindi_wr_marks==' ')
                             {
                             $res9= '-';
                             }
                             echo $res9;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qhindi_wr_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Hindi Written' and ses='$ses'") 
or die(mysqli_error());
$rowhindiwh=mysqli_fetch_array($qhindi_wr_hy);
echo $hindi_wr_h_marks = $rowhindiwh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($hindi_wr_h_marks > 45)
                             {
                             $res10='A1';
                             }
                             if($hindi_wr_h_marks > 40 && $hindi_wr_h_marks < 46)
                             {
                             $res10= 'A2';
                             }
                             if($hindi_wr_h_marks > 35 && $hindi_wr_h_marks < 41)
                             {
                             $res10= 'B1';
                             }
                             if($hindi_wr_h_marks > 30 && $hindi_wr_h_marks < 36)
                             {
                             $res10= 'B2';
                             }
                        
                             if($hindi_wr_h_marks < 31)
                             {
                             $res10= 'C1';
                             }
                             if($hindi_wr_h_marks==' ')
                             {
                             $res10= '-';
                             }
                             echo $res10;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qhindi_wr_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Hindi Written' and ses='$ses'") 
or die(mysqli_error());
$rowhindiwy=mysqli_fetch_array($qhindi_wr_y);
echo $hindi_wr_y_marks = $rowhindiwy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($hindi_wr_y_marks > 95)
                             {
                             $res11='A1';
                             }
                             if($hindi_wr_y_marks > 90 && $hindi_wr_y_marks < 96)
                             {
                             $res11= 'A2';
                             }
                             if($hindi_wr_y_marks > 85 && $hindi_wr_y_marks < 91)
                             {
                             $res11= 'B1';
                             }
                             if($hindi_wr_y_marks > 80 && $hindi_wr_y_marks < 86)
                             {
                             $res11= 'B2';
                             }
                        
                             if($hindi_wr_y_marks < 81)
                             {
                             $res11= 'C1';
                             }
                             if($hindi_wr_y_marks==' ')
                             {
                             $res11= '-';
                             }
                             echo $res11;
?>

</td>
</tr>


<tr style="line-height:40px;">
<td style="width:155px; background-color:#012060; color:#D4D924;">&nbsp;MATHS</td>
<td  align="center" colspan="6">&nbsp;</td>
</tr>
<tr style="line-height:40px;">
<td style="width:155px;">&nbsp;Oral</td>
<td style="width:90px;" align="center">
<?php			
$qmath_oral_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Math Oral' and ses='$ses'") 
or die(mysqli_error());
$rowmathoq=mysqli_fetch_array($qmath_oral_quaterly);
echo $math_oral_marks = $rowmathoq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($math_oral_marks > 45)
                             {
                             $res12='A1';
                             }
                             if($math_oral_marks > 40 && $math_oral_marks < 46)
                             {
                             $res12= 'A2';
                             }
                             if($math_oral_marks > 35 && $math_oral_marks < 41)
                             {
                             $res12= 'B1';
                             }
                             if($math_oral_marks > 30 && $math_oral_marks < 36)
                             {
                             $res12= 'B2';
                             }
                        
                             if($math_oral_marks < 31)
                             {
                             $res12= 'C1';
                             }
                             if($math_oral_marks==' ')
                             {
                             $res12= '-';
                             }
                             echo $res12;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qmath_oral_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Math Oral' and ses='$ses'") 
or die(mysqli_error());
$rowmathoh=mysqli_fetch_array($qmath_oral_hy);
echo $math_oral_h_marks = $rowmathoh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($math_oral_h_marks > 45)
                             {
                             $res13='A1';
                             }
                             if($math_oral_h_marks > 40 && $math_oral_h_marks < 46)
                             {
                             $res13= 'A2';
                             }
                             if($math_oral_h_marks > 35 && $math_oral_h_marks < 41)
                             {
                             $res13= 'B1';
                             }
                             if($math_oral_h_marks > 30 && $math_oral_h_marks < 36)
                             {
                             $res13= 'B2';
                             }
                        
                             if($math_oral_h_marks < 31)
                             {
                             $res13= 'C1';
                             }
                             if($math_oral_h_marks==' ')
                             {
                             $res13= '-';
                             }
                             echo $res13;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qmath_oral_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Math Oral' and ses='$ses'") 
or die(mysqli_error());
$rowmathoy=mysqli_fetch_array($qmath_oral_y);
echo $math_oral_y_marks = $rowmathoy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($math_oral_y_marks > 95)
                             {
                             $res14='A1';
                             }
                             if($math_oral_y_marks > 90 && $math_oral_y_marks < 96)
                             {
                             $res14= 'A2';
                             }
                             if($math_oral_y_marks > 85 && $math_oral_y_marks < 91)
                             {
                             $res14= 'B1';
                             }
                             if($math_oral_y_marks > 80 && $math_oral_y_marks < 86)
                             {
                             $res14= 'B2';
                             }
                        
                             if($math_oral_y_marks < 81)
                             {
                             $res14= 'C1';
                             }
                             if($math_oral_y_marks==' ')
                             {
                             $res14= '-';
                             }
                             echo $res14;
?>

</td>
</tr>

<tr style="line-height:40px;">
<td style="width:155px;">&nbsp;Written</td>
<td style="width:90px;" align="center">
<?php			
$qmath_wr_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Math Written' and ses='$ses'") 
or die(mysqli_error());
$rowmathwq=mysqli_fetch_array($qmath_wr_quaterly);
echo $math_wr_marks = $rowmathwq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($math_wr_marks > 45)
                             {
                             $res15='A1';
                             }
                             if($math_wr_marks > 40 && $math_wr_marks < 46)
                             {
                             $res15= 'A2';
                             }
                             if($math_wr_marks > 35 && $math_wr_marks < 41)
                             {
                             $res15= 'B1';
                             }
                             if($math_wr_marks > 30 && $math_wr_marks < 36)
                             {
                             $res15= 'B2';
                             }
                        
                             if($math_wr_marks < 31)
                             {
                             $res15= 'C1';
                             }
                             if($math_wr_marks==' ')
                             {
                             $res15= '-';
                             }
                             echo $res15;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qmath_wr_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Math Written' and ses='$ses'") 
or die(mysqli_error());
$rowmathwh=mysqli_fetch_array($qmath_wr_hy);
echo $math_wr_h_marks = $rowmathwh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($math_wr_h_marks > 45)
                             {
                             $res16='A1';
                             }
                             if($math_wr_h_marks > 40 && $math_wr_h_marks < 46)
                             {
                             $res16= 'A2';
                             }
                             if($math_wr_h_marks > 35 && $math_wr_h_marks < 41)
                             {
                             $res16= 'B1';
                             }
                             if($math_wr_h_marks > 30 && $math_wr_h_marks < 36)
                             {
                             $res16= 'B2';
                             }
                        
                             if($math_wr_h_marks < 31)
                             {
                             $res16= 'C1';
                             }
                             if($math_wr_h_marks==' ')
                             {
                             $res16= '-';
                             }
                             echo $res16;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qmath_wr_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Math Written' and ses='$ses'") 
or die(mysqli_error());
$rowmathwy=mysqli_fetch_array($qmath_wr_y);
echo $math_wr_y_marks = $rowmathwy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($math_wr_y_marks > 95)
                             {
                             $res17='A1';
                             }
                             if($math_wr_y_marks > 90 && $math_wr_y_marks < 96)
                             {
                             $res17= 'A2';
                             }
                             if($math_wr_y_marks > 85 && $math_wr_y_marks < 91)
                             {
                             $res17= 'B1';
                             }
                             if($math_wr_y_marks > 80 && $math_wr_y_marks < 86)
                             {
                             $res17= 'B2';
                             }
                        
                             if($math_wr_y_marks < 81)
                             {
                             $res17= 'C1';
                             }
                             if($math_wr_y_marks==' ')
                             {
                             $res17= '-';
                             }
                             echo $res17;
?>

</td>
</tr>


<tr style="line-height:40px;">
<td style="width:230px;background-color:#F8CBAC;">&nbsp;GENERAL AWARENESS / EVS</td>
<td style="width:90px;" align="center">
<?php			
$qevs_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Gen. Awar/evs' and ses='$ses'") 
or die(mysqli_error());
$rowevsq=mysqli_fetch_array($qevs_quaterly);
echo $evs_marks = $rowevsq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($evs_marks > 45)
                             {
                             $res18='A1';
                             }
                             if($evs_marks > 40 && $evs_marks < 46)
                             {
                             $res18= 'A2';
                             }
                             if($evs_marks > 35 && $evs_marks < 41)
                             {
                             $res18= 'B1';
                             }
                             if($evs_marks > 30 && $evs_marks < 36)
                             {
                             $res18= 'B2';
                             }
                        
                             if($evs_marks < 31)
                             {
                             $res18= 'C1';
                             }
                             if($evs_marks==' ')
                             {
                             $res18= '-';
                             }
                             echo $res18;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qevs_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Gen. Awar/evs' and ses='$ses'") 
or die(mysqli_error());
$rowevsh=mysqli_fetch_array($qevs_hy);
echo $evs_h_marks = $rowevsh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($evs_h_marks > 45)
                             {
                             $res19='A1';
                             }
                             if($evs_h_marks > 40 && $evs_h_marks < 46)
                             {
                             $res19= 'A2';
                             }
                             if($evs_h_marks > 35 && $evs_h_marks < 41)
                             {
                             $res19= 'B1';
                             }
                             if($evs_h_marks > 30 && $evs_h_marks < 36)
                             {
                             $res19= 'B2';
                             }
                        
                             if($evs_h_marks < 31)
                             {
                             $res19= 'C1';
                             }
                             if($evs_h_marks==' ')
                             {
                             $res19= '-';
                             }
                             echo $res19;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qevs_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Gen. Awar/evs' and ses='$ses'") 
or die(mysqli_error());
$rowevsy=mysqli_fetch_array($qevs_y);
echo $evs_y_marks = $rowevsy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($evs_y_marks > 95)
                             {
                             $res20='A1';
                             }
                             if($evs_y_marks > 90 && $evs_y_marks < 96)
                             {
                             $res20= 'A2';
                             }
                             if($evs_y_marks > 85 && $evs_y_marks < 91)
                             {
                             $res20= 'B1';
                             }
                             if($evs_y_marks > 80 && $evs_y_marks < 86)
                             {
                             $res20= 'B2';
                             }
                        
                             if($evs_y_marks < 81)
                             {
                             $res20= 'C1';
                             }
                             if($evs_y_marks==' ')
                             {
                             $res20= '-';
                             }
                             echo $res20;
?>

</td>
</tr>

<tr style="line-height:40px;">
<td style="width:155px;background-color:#F8CBAC;">&nbsp;CONVERSATION</td>
<td style="width:90px;" align="center">
<?php			
$qconv_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Conv.' and ses='$ses'") 
or die(mysqli_error());
$rowconvq=mysqli_fetch_array($qconv_quaterly);
echo $conv_marks = $rowconvq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($conv_marks > 45)
                             {
                             $res21='A1';
                             }
                             if($conv_marks > 40 && $conv_marks < 46)
                             {
                             $res21= 'A2';
                             }
                             if($conv_marks > 35 && $conv_marks < 41)
                             {
                             $res21= 'B1';
                             }
                             if($conv_marks > 30 && $conv_marks < 36)
                             {
                             $res21= 'B2';
                             }
                        
                             if($conv_marks < 31)
                             {
                             $res21= 'C1';
                             }
                             if($conv_marks==' ')
                             {
                             $res21= '-';
                             }
                             echo $res21;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qconv_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Conv.' and ses='$ses'") 
or die(mysqli_error());
$rowconvh=mysqli_fetch_array($qconv_hy);
echo $conv_h_marks = $rowconvh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($conv_h_marks > 45)
                             {
                             $res22='A1';
                             }
                             if($conv_h_marks > 40 && $conv_h_marks < 46)
                             {
                             $res22= 'A2';
                             }
                             if($conv_h_marks > 35 && $conv_h_marks < 41)
                             {
                             $res22= 'B1';
                             }
                             if($conv_h_marks > 30 && $conv_h_marks < 36)
                             {
                             $res22= 'B2';
                             }
                        
                             if($conv_h_marks < 31)
                             {
                             $res22= 'C1';
                             }
                             if($conv_h_marks==' ')
                             {
                             $res22= '-';
                             }
                             echo $res22;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qconv_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Conv.' and ses='$ses'") 
or die(mysqli_error());
$rowconvy=mysqli_fetch_array($qconv_y);
echo $conv_y_marks = $rowconvy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($conv_y_marks > 95)
                             {
                             $res23='A1';
                             }
                             if($conv_y_marks > 90 && $conv_y_marks < 96)
                             {
                             $res23= 'A2';
                             }
                             if($conv_y_marks > 85 && $conv_y_marks < 91)
                             {
                             $res23= 'B1';
                             }
                             if($conv_y_marks > 80 && $conv_y_marks < 86)
                             {
                             $res23= 'B2';
                             }
                        
                             if($conv_y_marks < 81)
                             {
                             $res23= 'C1';
                             }
                             if($conv_y_marks==' ')
                             {
                             $res23= '-';
                             }
                             echo $res23;
?>

</td>
</tr>


<tr style="line-height:40px;">
<td style="width:155px; background-color:#F8CBAC;">&nbsp;DRAWING</td>
<td style="width:90px;" align="center">
<?php			
$qdrawing_quaterly=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Quarterly' and subject='Drawing' and ses='$ses'") 
or die(mysqli_error());
$rowdrawingq=mysqli_fetch_array($qdrawing_quaterly);
echo $drawing_marks = $rowdrawingq['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($drawing_marks > 45)
                             {
                             $res24='A1';
                             }
                             if($drawing_marks > 40 && $drawing_marks < 46)
                             {
                             $res24= 'A2';
                             }
                             if($drawing_marks > 35 && $drawing_marks < 41)
                             {
                             $res24= 'B1';
                             }
                             if($drawing_marks > 30 && $drawing_marks < 36)
                             {
                             $res24= 'B2';
                             }
                        
                             if($drawing_marks < 31)
                             {
                             $res24= 'C1';
                             }
                             if($drawing_marks==' ')
                             {
                             $res24= '-';
                             }
                             echo $res24;
?>

</td>

<td style="width:90px;" align="center">
<?php			
$qdrawing_hy=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='HALF YEARLY' and subject='Drawing' and ses='$ses'") 
or die(mysqli_error());
$rowdrawingh=mysqli_fetch_array($qdrawing_hy);
echo $drawing_h_marks = $rowdrawingh['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($drawing_h_marks > 45)
                             {
                             $res25='A1';
                             }
                             if($drawing_h_marks > 40 && $drawing_h_marks < 46)
                             {
                             $res25= 'A2';
                             }
                             if($drawing_h_marks > 35 && $drawing_h_marks < 41)
                             {
                             $res25= 'B1';
                             }
                             if($drawing_h_marks > 30 && $drawing_h_marks < 36)
                             {
                             $res25= 'B2';
                             }
                        
                             if($drawing_h_marks < 31)
                             {
                             $res25= 'C1';
                             }
                             if($drawing_h_marks==' ')
                             {
                             $res25= '-';
                             }
                             echo $res25;
?>

</td>


<td style="width:90px;" align="center">
<?php			
$qdrawing_y=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='YEARLY' and subject='Drawing' and ses='$ses'") 
or die(mysqli_error());
$rowdrawingy=mysqli_fetch_array($qdrawing_y);
echo $drawing_y_marks = $rowdrawingy['obtainmarks'];
?>
</td>
<td style="width:90px;" align="center">
<?php
                             if($drawing_y_marks > 95)
                             {
                             $res26='A1';
                             }
                             if($drawing_y_marks > 90 && $drawing_y_marks < 96)
                             {
                             $res26= 'A2';
                             }
                             if($drawing_y_marks > 85 && $drawing_y_marks < 91)
                             {
                             $res26= 'B1';
                             }
                             if($drawing_y_marks > 80 && $drawing_y_marks < 86)
                             {
                             $res26= 'B2';
                             }
                        
                             if($drawing_y_marks < 81)
                             {
                             $res26= 'C1';
                             }
                             if($drawing_y_marks==' ')
                             {
                             $res26= '-';
                             }
                             echo $res26;
?>

</td>

</tr>



</table>










<br clear="all" />

<br clear="all" /><br clear="all" />
<table border="0" style="width:98%;margin-top:20px; margin-left:20px; font-size:18px;color:#000;">
<tr>
<td style="width:225px;">Date : 26-03-2022</td>
<td style="width:325px;">Class Teacher's Sign.</td>
<td style="width:300px;">Parent's Sign.</td>
<td style="width:240px;">Principal's Sign. / Seal</td>
</tr>
</table>



</div>
</div>	


	


	


<br clear="all" />
</div>
    
     
	 

	