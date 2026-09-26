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
.tbl{width:330px;color:#000; border:1px #77ab59 solid; font-size:20px; border-bottom:3px #77ab59 solid; }
.tb2{width:169px;color:#000; border:1px #77ab59 solid;font-size:20px; border-bottom:3px #77ab59 solid;}
.sn{width:135px!important;}
.sn1{width:125px!important;}
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
      <div style="width:1050px;height:1531px; border:6px #77ab59 solid;background-color:#f0f7da;">
	  <div style="width:100%; margin:0 auto; height:auto;">
      <div style="float:left;"><img src="l.png" style="height:110px; width:100px; margin-top:15px; margin-left:20px;" /></div>
      <div style="float:left; margin-left:8px;">
	  <span style="font-size:75px; font-family:Cambria; color:#da1010; margin-left:0px; "><center>&nbsp;GOYENKA PUBLIC SCHOOL</center></span>
      <span style="font-size:37px; color:#da1010;"><center>Panchkuiyan Tiraha, Jhansi(U.P.)</center></span>
      </div>
	   <br clear="all" />
	  </div>
	  <br clear="all" />
	  <div style="width:100%; margin-top:3px; font-size:25px; background-color:#77ab59; height:auto; line-height:30px; font-weight:bold; color:#FFFFFF">
      <center>PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
      </div>
	  <div style="height:105px; width:100%;">
      <div style="width:48%; float:left; margin-left:5px; height:100px; ">
      <table style="margin-left:10px; width:500px;font-size:20px; color:#000;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
      <tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
      <tr><td class="sn">Mother's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['m_name']); ?></td></tr>
      <tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_fname']); ?></td></tr>
      <tr><td class="sn">Date of birth</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_dob']); ?></td></tr>
      </table>
      </div>
      <div style="width:35%; float:left; height:100px;">
      <table style="margin-left:10px; width:350px; margin-top:5px;font-size:20px;color:#000; font-weight:bold;">
      <tr><td class="sn1">Class</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
      <tr><td>Admission No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_scholar']); ?></td></tr>
      <tr><td>Telephone No</td><td>&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_contactno']); ?></td></tr>
      </table>
</div>
<div style="width:10%; float:left; height:100px;">
<img src="upload/<?php echo $rowstud["student_id"].$_SESSION['uid'].$rowstud['student_img'];  ?>" style="height:122px; margin-left:10px; width:110px; margin-top:5px; " />
</div>
<table style="margin-left:10px; width:980px;font-size:20px; color:#000;margin-top:5px; font-weight:bold;" border="0" cellpadding="0" cellspacing="0">
<tr><td class="sn">&nbsp;Address</td><td class="snn">&nbsp;&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?> </td></tr>
</table>
<?php
$sid = $rowstud['student_id'];
$healthq=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='".$_GET['exam']."'");
$rowh=mysqli_fetch_array($healthq);
?>
</div>
<br clear="all" />
<div style="width:100%; margin-top:10px; background-color:#77ab59;font-size:25px; height:auto; line-height:31px; font-weight:bold; color:#FFFFFF">
<center>ACADEMIC PERFORMANCE</center>
</div>
	  
	  
<div style="width:100%;height:auto;">
<div style="">
<table border="0" width="" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-top:10px; color:#000;">
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="border-left:3px #77ab59 solid;">
<tr style="background-color:#77ab59; color:#FFFFFF;"><td style="line-height:54px; border-left:2px #77ab59 solid;">&nbsp;&nbsp;Subject</td></tr>
<?php
$class = $rowstud['student_class'];
$sub=mysqli_query($con,"select * from subjects where class='$class'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr style="line-height:26px; font-weight:normal;">
<?php 
if($sub_row['1']=='Art & Craft')
{
?>
<td style="">&nbsp;<?php echo $sub_row['1']; ?></td>
<?php
} else{
?>
<td>&nbsp;<?php echo $sub_row['1']; ?></td>
<?php } ?>

</tr>
<?php } ?>
</table>
</td>
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from termss where term='$id[0]'");
$len=mysqli_num_rows($sub);
$t=0;
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
<tr style="background-color:#77ab59; color:#FFFFFF;">
<td style="line-height:27px;width:50px;">
<center><?php echo $row[0];  ?><br />(100)</center>
</td>
</tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='$row[0]' and term='TERM1'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr style="line-height:26px;">
<td><center><?php           
$marks = $row['1'];
$final_grade1= $marks;
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
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="border-right:3px #77ab59 solid;">

<tr style="background-color:#77ab59; color:#FFFFFF;"><td style="line-height:27px;"><center>Final<br />Grade</center></td></tr>
<?php $t=0;

while($t<$len)
{
?> 
<tr style="line-height:26px;">
<td><center>
<?php /*$final_cal[$t]=0;*/
$markstot=0;
$markstot = $final_cal[$t];
$tmo = round($markstot/3);
$gtgtm+=$tmo;
                            
							
							 $tmo;
							 if($tmo > 90)
                             {
                             $res='A+';
                             }
							 if($tmo > 80 && $tmo < 91)
                             {
                             $res= 'A';
                             }
							 if($tmo > 70 && $tmo < 81)
                             {
                             $res= 'B+';
                             }
							 if($tmo > 60 && $tmo < 71)
                             {
                             $res= 'B';
                             }
							 if($tmo > 50 && $tmo < 61)
                             {
                             $res= 'C+';
                             }
							 if($tmo > 40 && $tmo < 51)
                             {
                             $res= 'C';
                             }
							 if($tmo < 41)
                             {
                             $res= 'D';
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


<?php
$sid = $rowstud['student_id'];
$maxid=mysqli_query($con,"select count(subj_id) from subjects where class='$class' and session='".$_SESSION['session']."'");
$maxrow=mysqli_fetch_array($maxid);
$mid = $maxrow['count(subj_id)'];
$prt=0;
$qst1=mysqli_query($con,"select * from marks where student='$uid' and exam='1st Term'") or die(mysqli_error());
while($rowtr1=mysqli_fetch_array($qst1))
{
$prt+=$rowtr1['obtainmarks'];
}
$prt2=0;
$qst2=mysqli_query($con,"select * from marks where student='$uid' and exam='2nd Term'") or die(mysqli_error());
while($rowtr2=mysqli_fetch_array($qst2))
{
$prt2+=$rowtr2['obtainmarks'];
}
$prt3=0;
$qst3=mysqli_query($con,"select * from marks where student='$uid' and exam='3rd Term'") or die(mysqli_error());
while($rowtr3=mysqli_fetch_array($qst3))
{
$prt3+=$rowtr3['obtainmarks'];
}

?>
<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;margin-top:10px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="line-height:26px;"><td style="width:324px;">&nbsp;&nbsp;Total</td>
<td style="width:165px;"><center><?php echo  $prt; ?></center></td>
<td style="width:165px;"><center><?php echo  $prt2; ?></center></td>
<td style="width:165px;"><center><?php echo  $prt3; ?></center></td>
<td style="">
<center>
<?php $nmtm = $prt+$prt2+$prt3;
 $tnmtm =  round($nmtm/3);
?>
 
<?php 
                      $tnmtmm = round($tnmtm/$mid);
                             if($tnmtmm > 90)
                             {
                             $res='A+';
                             }
							 if($tnmtmm > 80 && $tnmtmm < 91)
                             {
                             $res= 'A';
                             }
							 if($tnmtmm > 70 && $tnmtmm < 81)
                             {
                             $res= 'B+';
                             }
							 if($tnmtmm > 60 && $tnmtmm < 71)
                             {
                             $res= 'B';
                             }
							 if($tnmtmm > 50 && $tnmtmm < 61)
                             {
                             $res= 'C+';
                             }
							 if($tnmtmm > 40 && $tnmtmm < 51)
                             {
                             $res= 'C';
                             }
							 if($tnmtmm < 41)
                             {
                             $res= 'D';
                             }
							 echo $res;
?>

</center>
</td>
</tr>
</table>
<?php
$sid = $rowstud['student_id'];
$healthqt=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowht=mysqli_fetch_array($healthqt);

$healthqt1=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowht1=mysqli_fetch_array($healthqt1);

$healthqt2=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='3rd Term'");
$rowht2=mysqli_fetch_array($healthqt2);
$healthqt3=mysqli_query($con,"select * from health_status where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='final Term'");
$rowht3=mysqli_fetch_array($healthqt3);
$hw=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='1st Term'");
$rowhw=mysqli_fetch_array($hw);

$hw1=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='2nd Term'");
$rowhw1=mysqli_fetch_array($hw1);

$hw2=mysqli_query($con,"select * from health_status1 where student='$sid' and class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and exam='3rd Term'");
$rowhw2=mysqli_fetch_array($hw2);

?>

<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px; margin-top:10px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="line-height:26px;"><td style="width:324px;">&nbsp;&nbsp;Percentage</td>
<td style="width:165px;"><center><?php $tprt = $prt/$mid;  ?><?php echo substr($tprt, 0, 4); ?>%</center></td>
<td style="width:165px;"><center><?php $tprt1 = $prt2/$mid; ?><?php echo substr($tprt1, 0, 4); ?>%</center></td>
<td style="width:165px;"><center><?php $tprt2 = $prt3/$mid; ?><?php echo substr($tprt2, 0, 4); ?>%</center></td>
<td style=""><center><?php $nmtm = $tprt+$tprt1+$tprt2; $tnmtm = ($nmtm/3); echo substr($tnmtm, 0, 4); ?>%</center></td>
</tr>
</table>

<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px; margin-top:10px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="line-height:26px;"><td style="width:324px;">&nbsp;&nbsp;Rank</td>
<td style="width:165px;">&nbsp; <?php echo $rowht['vision']; ?></td>
<td style="width:165px;">&nbsp; <?php echo $rowht1['vision']; ?></td>
<td style="width:165px;">&nbsp; <?php echo $rowht2['vision']; ?></td>
<td style="">&nbsp;<?php echo $rowht3['vision']; ?></td>
</tr>
</table>

</div>
<br clear="all" />
<?php
$att1=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='1st Term' and session='".$_SESSION['session']."'");
$rowat1=mysqli_fetch_array($att1);

$att2=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='2nd Term' and session='".$_SESSION['session']."'");
$rowat2=mysqli_fetch_array($att2);

$att3=mysqli_query($con,"select * from discipline where student='$sid' and class='".$rowstud['student_class']."' and exam='3rd Term' and session='".$_SESSION['session']."'");
$rowat3=mysqli_fetch_array($att3);
?>

<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="line-height:30px;background-color:#77ab59; color:#FFFFFF;">
<td style="width:324px; ">&nbsp;&nbsp;My Teacher Says</td>
<td style="width:165px;"><center>1st Term</center></td>
<td style="width:165px;"><center>2nd Term</center></td>
<td style="width:165px;"><center>3rd Term</center></td>
</tr>

<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I can sing and dance</td>
<td style="width:165px;"><center><?php echo $rowat1['dance']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['dance']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['dance']; ?></center></td>
</tr>

<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I enjoy my work</td>
<td style="width:165px;"><center><?php echo $rowat1['en_w']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['en_w']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['en_w']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I love to play</td>
<td style="width:165px;"><center><?php echo $rowat1['paly']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['paly']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['paly']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I do my work carefully</td>
<td style="width:165px;"><center><?php echo $rowat1['w_c']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['w_c']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['w_c']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I listen to instructions</td>
<td style="width:165px;"><center><?php echo $rowat1['list_in']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['list_in']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['list_in']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I do my homework regularly</td>
<td style="width:165px;"><center><?php echo $rowat1['hwk']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['hwk']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['hwk']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I know my table manners</td>
<td style="width:165px;"><center><?php echo $rowat1['know_t']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['know_t']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['know_t']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I am neat & tidy</td>
<td style="width:165px;"><center><?php echo $rowat1['neat']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['neat']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['neat']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I am confident</td>
<td style="width:165px;"><center><?php echo $rowat1['cond']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['cond']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['cond']; ?></center></td>
</tr>
<tr style="line-height:24px;">
<td style="width:324px;">&nbsp;&nbsp;I am regular</td>
<td style="width:165px;"><center><?php echo $rowat1['reg']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat2['reg']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowat3['reg']; ?></center></td>
</tr>
</table>


<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px; margin-top:10px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="line-height:25px;color:#FFFFFF; background-color:#77ab59;">
<td style="width:101px;">&nbsp;Health Status</td>
<td style="width:165px;"><center>1st Term</center></td>
<td style="width:165px;"><center>2nd Term</center></td>
<td style="width:165px;"><center>3rd Term</center></td>
</tr>
<tr style="line-height:21px;">
<td style="width:101px;">&nbsp;Height</td>
<td style="width:165px;"><center><?php echo $rowhw['height']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowhw1['height']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowhw2['height']; ?></center></td>
</tr>
<tr style="line-height:21px;">
<td style="width:101px;">&nbsp;Weight</td>
<td style="width:165px;"><center><?php echo $rowhw['weight']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowhw1['weight']; ?></center></td>

<td style="width:165px;"><center><?php echo $rowhw2['weight']; ?></center></td>
</tr>

</table>

<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;margin-top:20px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="line-height:25px;">
<td style="width:101px;color:#FFFFFF; background-color:#77ab59;">&nbsp;Attendance</td>
<td style="width:165px;"><center><?php echo $rowht['height']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowht1['height']; ?></center></td>
<td style="width:165px;"><center><?php echo $rowht2['height']; ?></center></td>
</tr>
</table>


<table border="1"  cellpadding="0" cellspacing="0" style="margin-left:20px;font-size:20px;margin-top:8px;color:#000;border:1px #77ab59 solid; width:96%;">
<tr style="color:#FFFFFF; background-color:#77ab59;"><td colspan="2">Teacher's Remark</td></tr>
<tr style="line-height:21px;">
<td style="width:101px;">&nbsp;1st Term</td><td style="width:500px;"><?php echo $rowht['weight']; ?></td>
</tr>
<tr style="line-height:21px;">
<td style="width:101px;">&nbsp;2nd Term</td>
<td style="width:500px;"><?php echo $rowht1['weight']; ?></td>
</tr>
<tr style="line-height:21px;">
<td style="width:101px;">&nbsp;3rd Term</td>
<td style="width:500px;"><?php echo $rowht2['weight']; ?></td>
</tr>
</table>

<br clear="all" />
<br clear="all" />
<table style="width:50%; float:left; font-size:20px; margin-top:5px; margin-left:19px;color:#000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>Promoted / Detained to Class : </td>
</tr>
</table>


<br clear="all" />
<br clear="all" />
<table border="0" style="width:100%;margin-top:105px; font-size:20px; font-weight:bold;color:#000;">
<tr>
<td style="width:300px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Date:</td>
<td style="width:250px;">Class Teacher's Sign.</td>
<td style="width:250px;">Parent's Sign.</td>
<td style="width:250px;">Principal's Sign./Seal</td>
</tr>
</table>


</div>
	 
	 
	  <br clear="all" />
	  </div>
     <?php
      $i++;
	  }
      ?>
    
     
	 

	