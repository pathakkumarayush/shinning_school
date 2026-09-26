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
.tbl{ width:242px;color:#303192; border:1px #303192 solid; font-size:20px; font-weight:bold;}
.tb2{ width:152px;color:#303192; border:1px #303192 solid;font-size:20px; font-weight:bold;}
.sn{ width:135px!important;}
.sn1{ width:125px!important;}
</style>  
    
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
      <div style="width:1050px;height:1531px; border:6px #CC0000 solid;background-color:#96CB7F;">
	  <div style="width:100%; margin:0 auto; height:auto;">
      <div style="float:left;"><img src="l.png" style="height:130px; width:110px; margin-top:15px; margin-left:20px;" /></div>
      <div style="float:left; margin-left:8px;">
	  <span style="font-size:72px; font-family:Cambria; color:#da1010; margin-left:0px; "><center>&nbsp;<b>GOYENKA PUBLIC SCHOOL</b></center></span>
      <span style="font-size:37px; color:#da1010;"><center>Panchkuiyaan Tiraha, Near Prakash Sales, Jhansi(U.P.)</center></span>
	  <span style="font-size:24px; color:#da1010;font-weight:bold;"><center>E-mail : goyenkapublicschool@gmail.com, Website : www.goyenkapublicschool.com</center></span>
      </div>
	   <br clear="all" />
	  </div>
	  <br clear="all" />
	  <div style="width:100%; margin-top:3px; font-size:25px; background-color:#CC0000; height:auto; line-height:30px; font-weight:bold; color:#FFFFFF">
      <center>PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
      </div>
	  <div style="height:125px; width:100%;">
<div style="width:48%; float:left; margin-left:5px; height:100px; ">
<table style="margin-left:10px; width:500px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
<tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
<tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>
</table>
</div>
<div style="width:35%; float:left; height:100px;">
<table style="margin-left:10px; width:350px; margin-top:5px;font-size:20px;color:#303192; font-weight:bold;">
<tr><td class="sn1">Class</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
<tr><td>Admission No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td></tr>
<tr><td>Telephone No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_contactno']); ?></td></tr>
</table>
</div>
<div style="width:10%; float:left; height:100px;">
<img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud['student_img'];  ?>" style="height:110px; margin-left:10px; width:100px; margin-top:12px; " />
</div>
<table style="margin-left:10px; width:980px;font-size:20px; color:#303192;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">&nbsp;Address</td><td class="snn">&nbsp;&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?> </td></tr>
</table>
<?php
$sid = $rowstud['student_id'];
$healthq=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowh=mysqli_fetch_array($healthq);

$healthq1=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowh1=mysqli_fetch_array($healthq1);
?>
<table border="0" cellpadding="0" cellspacing="0" style="margin-left:19px; font-size:20px;color:#303192; width:669px; margin-top:6px;font-weight:bold;">
<tr><td style="width:180px; font-weight:bold;">Health Status</td>
<td>&nbsp;:&nbsp;Height&nbsp;&nbsp;:&nbsp;&nbsp;
<?php 
if($_GET['exam']=='TERM1')
{
echo $rowh['height']; 
}
else
{
echo $rowh1['height']; 
}
?>

</td>
<td>Weight&nbsp;&nbsp;:&nbsp;&nbsp;
<?php 
if($term=='TERM1')
{
echo $rowh['weight']; 
}else
{
echo $rowh1['weight']; 
}
?>

</td></tr>
</table>

</div>
	  <br clear="all" />
	  <div style="width:100%; margin-top:10px; background-color:#CC0000;font-size:25px; height:auto; line-height:31px; font-weight:bold; color:#FFFFFF">
      <center>ACADEMIC PERFORMANCE</center>
      </div>

<div style="width:100%;height:auto;">
<div style="">

<?php
if($term=="$term")
{
?>
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-top:10px; color:#303192;">
<tr style="border:1px #303192 solid; line-height:50px; font-weight:bold;  font-size:20px; font-weight:bold;background-color:#4caf50; color:#FFFFFF;">
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:3px #303192 solid;"><center>SCHOLASTIC AREA</center></td>
<td style="border:1px #303192 solid;border-top:3px #303192 solid;border-left:2px #303192 solid;" colspan="5">
<center><?php echo $term; ?></center></td>
</tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0">
<tr><td style="line-height:54px; font-weight:bold;">&nbsp;&nbsp;SUBJECTS</td></tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:32px;">
<td>
&nbsp;&nbsp;
<?php echo $sub_row['1']; ?>

</td></tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='$term' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]'");
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

<table class="tb2" border='1' cellpadding="0" cellspacing="0">
<?php 
 if($row[0]=="1st Term" || $row[0]=="2nd Term")
 {
 $per=70;
 }
 else if($row[0]=="1st Unit" || $row[0]=="2nd Unit")
 {
 $per=25;
 }
 else{$per=5;
 }
 ?>
<tr>
<?php 
if($row[0]=='1st Term')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>MID TERM<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else if($row[0]=='1st Unit')
{
?>
<td style="line-height:27px;font-weight:bold;">
<center>UNIT TEST<br />(<?php echo $per; ?>)</center>
</td>
<?php
}
else
{
?>
<td style="line-height:27px;width:50px;font-weight:bold;">
<center>SUB. ENRI.<br />(<?php echo $per; ?>)</center>
</td>
<?php }?>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='$term'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:32px;">
<td><center><?php           
$marks = ($row['1'] * 100)/$row[2];
$final_grade1=($marks*$per)/100;
$final_grade = substr($final_grade1,0,3);
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="">
<tr></tr>
<tr></tr>
<tr><td style="line-height: 27px;font-weight:bold;"><center>TOTAL<br />(100)</center></td></tr>
<?php $t=0;
while($t<$len)
{
?> 
<tr style="line-height:32px;">
<td><center>

<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
echo $tmo = $markstot;
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="">
<tr></tr>
<tr></tr>
<tr><td style="line-height:54px;font-weight:bold;"><center>GRADE</center></td></tr>
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
							 if($tmo > 32 && $tmo < 41)
                             {
                             $res= 'D';
                             }
							 if($tmo < 33)
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
</table>
<?php }?>


</div>
<br clear="all" />
<?php
$sid = $rowstud['student_id'];
$coscholastic1=mysqli_query($con,"select * from other_marks  where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='".$_SESSION['session']."'");
$rowco1=mysqli_fetch_array($coscholastic1);
$coscholastic2=mysqli_query($con,"select * from other_marks  where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='".$_SESSION['session']."'");
$rowco2=mysqli_fetch_array($coscholastic2);
?>
<table style="width:44%; float:left; margin-top:20px; margin-left:20px;color:#303192; border:1px #303192 solid;font-size:20px;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#4caf50; color:#FFFFFF;">
<td align="center" style="font-weight:bold">CO-SCHOLASTIC AREA <br />(3 Point Grading Scale A, B, C)</td>
<td align="center" style="width:85px;"><?php echo $term; ?></td>

</tr>

<tr style="line-height:31px;">
<td>&nbsp;&nbsp;Art/Craft</td>
<td align="center"><?php echo $rowco1['art']; ?></td>

</tr>

<tr style="line-height:31px;">
<td>&nbsp;&nbsp;Music</td>
<td align="center"><?php echo $rowco1['music']; ?></td>

</tr>

<tr style="line-height:31px;">
<td>&nbsp;&nbsp;Dance</td>
<td align="center"><?php echo $rowco1['dance']; ?></td>

</tr>

<tr style="line-height:31px;">
<td>&nbsp;&nbsp;Physical Education & Games</td>
<td align="center"><?php echo $rowco1['game']; ?></td>

</tr>

<tr style="line-height:31px;">
<td>&nbsp;&nbsp;Moral Values</td>
<td align="center"><?php echo $rowco1['moral']; ?></td>

</tr>

<tr style="line-height:31px;">
<td>&nbsp;&nbsp;General Knowledge</td>
<td align="center"><?php echo $rowco1['gk']; ?></td>
</tr>
<tr style="line-height:31px;">
<td>&nbsp;&nbsp;Conversation</td>
<td align="center"><?php echo $rowco1['con']; ?></td>
</tr>


</table>

<?php
$discipline1=mysqli_query($con,"select * from discipline1 where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='".$_SESSION['session']."'");
$rowdc1=mysqli_fetch_array($discipline1);
$discipline2=mysqli_query($con,"select * from discipline1 where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='".$_SESSION['session']."'");
$rowdc2=mysqli_fetch_array($discipline2);
?>
<table style="width:44%; float:left; font-size:20px; margin-top:20px; margin-left:80px;color:#303192; border:1px #303192 solid;" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:27px; font-weight:bold;background-color:#4caf50; color:#FFFFFF;">
<td align="center" style="font-weight:bold">DISCIPLINE <br />(3 Point Grading Scale A, B, C)</td>
<td align="center" style="width:85px;"><?php echo $term; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Regularity & Punctuality</td>
<td align="center"><?php echo $rowdc1['regularity']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Sincerity</td>
<td align="center"><?php echo $rowdc1['sincerity']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Behaviour & Values</td>
<td align="center"><?php echo $rowdc1['beha']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Respectfulness for Rules & Regulations</td>
<td align="center"><?php echo $rowdc1['rrr']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards Teachers</td>
<td align="center"><?php echo $rowdc1['att']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards School-mates</td>
<td align="center"><?php echo $rowdc1['atsm']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards Society</td>
<td align="center"><?php echo $rowdc1['ats']; ?></td>

</tr>

<tr style="line-height:27px;">
<td>&nbsp;Attitude Towards Nation</td>
<td align="center"><?php echo $rowdc1['atn']; ?></td>

</tr>

</table>
<?php

$att=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowat=mysqli_fetch_array($att);

$att1=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowat1=mysqli_fetch_array($att1);

?>
<br clear="all" />
<table style="width:54%; float:left; font-size:20px; margin-top:20px; margin-left:20px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="line-height:40px; font-weight:bold;">
<td><span style="color:#CC0000">Attendance</span> :  - 
<?php 
if($_GET['exam']=='TERM1')
{
echo $rowat['height']; 
}
else
{
echo $rowat1['height']; 
}
?>
</td>
</tr>
</table>
<br clear="all" />
<br clear="all" />

<table style="width:99%; float:left; font-size:20px; margin-top:40px; margin-left:13px;color:#303192;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;Remark : &nbsp;
<?php 
if($_GET['exam']=='TERM1')
{
echo $rowat['weight']; 
}
else
{
echo $rowat1['weight']; 
}
?>
</td>
</tr>
</table>

<br clear="all" /><br clear="all" />
<br clear="all" />
<table style="width:24%; float:left; font-size:20px; margin-top:30px; margin-left:19px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold; line-height:30px;">
<td>&nbsp;&nbsp;Overall Marks</td><td style="width:100px;">&nbsp;&nbsp;<?php echo $gtgtm; ?></td>
</tr>
</table>
<?php 
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
?>
<table style="width:24%; float:left; font-size:20px; margin-top:30px; margin-left:19px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;line-height:30px;">
<td>&nbsp;&nbsp;Percentage</td><td style="width:100px;">&nbsp;&nbsp;<?php $perg = $gtgtm/$mid; ?> <?php echo substr($perg, 0, 4); ?>%</td>
</tr>
</table>
<table style="width:21%; float:left; font-size:20px; margin-top:30px; margin-left:22px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;  line-height:30px;">
<td>&nbsp;&nbsp;Grade</td><td style="width:100px;">&nbsp;&nbsp;
<?php $gtmg  = $gtgtm/$mid;



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
<table style="width:21%; float:left; font-size:20px; margin-top:30px; margin-left:22px;color:#303192; border:1px #303192 solid;"  border="1" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;  line-height:30px;">
<td>&nbsp;&nbsp;Rank</td><td style="width:100px;">&nbsp;&nbsp;<?php  echo $rowat1['vision']; ?></td>
</tr>
</table>
<br clear="all" />
<br clear="all" />
<br clear="all" />
<table border="0" style="width:100%;margin-top:100px; font-size:20px; font-weight:bold;color:#303192;">
<tr>
<td style="width:300px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Date:</td>
<td style="width:250px;">Class Teacher's Sign.</td>
<td style="width:250px;">Parent's Sign.</td>
<td style="width:250px;">Principal's Sign./Seal</td>
</tr>
</table>
<br clear="all" /><br clear="all" /><br clear="all" />
</div>

	 
	 
	  <br clear="all" />
	  </div>
     <?php
      $i++;
	  }
      ?>
    
     
	 

	