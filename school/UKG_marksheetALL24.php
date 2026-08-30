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
<div style="width:1060px;height:1550px;font-family:Calisto MT;background:url(BK_UKG.png);background-repeat:no-repeat;background-position:center;" class="fsz">
<br clear="all" />
<div style="width:100%; margin:0 auto; height:300px;">

<br clear="all" />
</div>
<br clear="all" />	
<div style="width:100%;height:auto;">
<table style="width:991px;font-size:21px;margin-left:35px; font-size:21px;font-weight:bold;color:#000000; border:1px #000000 solid;" border="1"  cellpadding="0" cellspacing="0" class="tbl1">
<tr><td style="width:180px; font-weight:normal;">&nbsp;Roll Number</td>
<td style="width:150px; color:#CC0000;">&nbsp;<?php echo ucwords($rowstud['rno']); ?></td>
<td style="width:200px;font-weight:normal;">&nbsp;Scholar Number</td>
<td style="width:275px;color:#CC0000;">&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td>
<td colspan="2" rowspan="7">
<img src="upload/<?php echo $rowstud["student_img"]; ?>" style="border-radius:5px; width:175px; margin-left:8PX; height:230px;">
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
if($rowstud['student_class']=='UKG' || $rowstud['student_class']=='UKG A' || $rowstud['student_class']=='UKG B')
{
$clls = 'UKG';
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
<td>&nbsp;
<?php 
if($rowstud['student_class']=='UKG')
{
$sec = '-';
}
else if($rowstud['student_class']=='UKG A')
{
$sec = 'A';
}
else if($rowstud['student_class']=='UKG B')
{
$sec = 'B';
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


<br clear="all" />
</div>
<div style="width:93%; margin:0 auto; line-height:28px;margin-top:0px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp; Performance in Co-Scholastics Areas :</span>
</div>
<br clear="all" />
<div style="width:100%;height:auto;">
<div>
<?php
if($term=="$term")
{
?>

<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:5px; color:#0033CC; font-size:21px; margin-left:35px;">
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;border-top:2px #000000 solid;font-size:21PX; width:750PX;">
<tr align="center" style="font-weight:bold; color:#FF0000;">
<td style="line-height:40px; width:70px;">S.N.</td>
<td style="line-height:40px; width:300px;border-left:3px #000000 solid;">Subject</td>
<td style="line-height:40px; width:200px;border-left:3px #000000 solid;">Max. Marks</td>
<td style="line-height:40px; width:200px;border-left:3px #000000 solid;">Min. Marks</td>
</tr>
<?php
$tmt=0;
$class = $rowstud['student_class'];
$i=1;
$sub=mysqli_query($con,"select * from subjects where class='$class' and session='$ses'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:40px;">
<td align="center"> <?php echo $i; ?></td>
<td style="border-left:3px #000000 solid;"> &nbsp;&nbsp;<?php echo $sub_row['1']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"> <?php echo  $sub_row['6']; $tmt+=$sub_row['6']; ?></td>
<td style="border-left:3px #000000 solid;" align="center"><?php echo $sub_row['7']; ?></td>
</tr>
<?php
 $i++;
 } ?>
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

<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:240px;color:#000000;border-right:3px #000000 solid;border-top:2px #000000 solid;border-left:1px #000000 solid; font-size:21px;">
<tr style="font-weight:bold; color:#FF0000;">
<td style="line-height:40px;">
<center>Marks Obtained</center>
</td>
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
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-left:3px #000000 solid;font-size:21px; width:750PX;">
<tr align="center" style="font-weight:bold; color:#000;">
<td style="line-height:40px;width:68px;"></td>
<td style="line-height:40px; width:286px;border-left:3px #000000 solid;">Total</td>
<td style="line-height:40px;width:189px;border-left:3px #000000 solid;"><?php echo $tmt; ?></td>
<td style="line-height:40pxwidth:200px;;border-left:3px #000000 solid;">---</td>
</tr>
</table>
</td>

<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="color:#000000;border:1px #000000 solid;border-right:3px #000000 solid;font-size:21px; width:240PX;">
<tr align="center" style="font-weight:bold; color:#000;">
<td style="line-height:40px;width:68px;"><?php echo $ttmot1; ?></td>
</tr>
</table>
</td>

</tr>

</table>
<?PHP
$sid = $rowstud['student_id'];
$rmk=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and exam='ANNUAL EXAM' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);
?>
<br clear="all" />
<div style="width:93%; margin:0 auto; line-height:28px;margin-top:0px; border-top:2px #000000 solid;border-bottom:2px #000000 solid;">
<span style="color:#2d3b87; font-size:22px;font-family:Calisto MT; font-weight:bold; margin-left:25PX;">
<img src="arr.png" />&nbsp;Additional Subject: </span>
</div>
<br clear="all" />
<table border="1" width="" cellpadding="0" cellspacing="0" style="margin-left:35px; border:2px #000000 solid; color:#000; margin-top:-15px; font-size:21px; width:990px;">
<tr align="center" style="line-height:25px;"><td style="width:70px;">1</td><td style="width:320px;" align="left">&nbsp;&nbsp;Drawing</td>
<td style="width:285px;">100</td><td style="width:180px;">-</td><td style="width:220px; font-weight:bold;"><?php echo $rowrmk['weight']; ?></td>
</tr>
<tr align="center" style="line-height:25px;"><td style="width:70px;">2</td><td style="width:320px;" align="left">&nbsp;&nbsp;G.K.</td>
<td style="width:180px;">100</td><td style="width:180px;">-</td><td style="width:220px; font-weight:bold;"><?php echo $rowrmk['height']; ?></td>
</tr>
</table>


<?php			
$qrst=mysqli_query($con,"select subject,obtainmarks,totalmarks,status from marks where student='$uid' and exam='ANNUAL EXAM' and status='fail' and ses='$ses'") 
or die(mysqli_error());
$rowcount = mysqli_num_rows($qrst);
//echo $rowcount;
?>



<br clear="all" />
<table style="width:990px; float:left;margin-left:100px;font-weight:bold; color:#ff5722; font-size:21px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px;">
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






</td>
</tr
></table>
<br clear="all" />
<br clear="all" />
<table style="width:990px; float:left;margin-left:100px;font-weight:bold; color: #ff5722;font-size:21px;" border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:20px;">
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
if($rowstud['student_class']=='UKG A')
{
$clss = 'I';
}
if($rowstud['student_class']=='UKG B')
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
<br clear="all" /><br clear="all" />
<br clear="all" />

<table border="0" cellpadding="0" cellspacing="0" style="width:99%;font-size:21px; margin-top:35px; margin-left:10px;font-weight:bold;color:#0e4174;">
<tr>
<td align="center" style="float:left; margin-left:50px;">Class Teacher Sign</td>


<td  align="center" style="float:right; margin-right:100px">Principal Sign</td>
</tr>
</table>

<?php }?>



</div>
</div>	


	


	


<br clear="all" />
</div>
    
  <?php
      $i++;
	  }
      ?>           
	 

	