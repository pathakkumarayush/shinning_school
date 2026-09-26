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
.sn{width:153px!important;font-size:18px!important;}
.sn1{width:138px!important;font-size:18px!important;}
.sn2{width:160px!important;font-size:18px!important;}
.tbl tr{line-height:31px!important;font-size:18px!important;}
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
?>	
<div style="width:1050px;height:1531px; border:6px #000 solid;background-color:#fff;font-family:Arial;" class="fsz">
<br clear="all" />
<div style="width:1036px;height:1517px; border:4px #000 solid;background:url(wm.png) no-repeat center;font-family:font-family:Arial; margin-left:3px; margin-top:-18px;">

	 <br clear="all" />

<div style="width:100%; margin-top:-10px; font-size:20px; background-color:#b2f9b5; height:auto;font-weight:bold;line-height:28px;border-top:2px #000 solid;border-bottom:2px #000 solid; color:#000">
<center>TERM I</center>
</div>
	 <br clear="all" />	
<div style="width:100%;height:auto;">
<div style="width:40%; float:left; margin-left:15px;text-transform: capitalize;">
<table style="width:100%;font-size:18px; color:#000000; font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>
</table>
</div>
<div style="width:40%; float:left;">
<table style="width:100%;font-size:18px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn2">Admission No</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_scholar']; ?></td></tr>
</table>
</div>
<div style="width:40%; float:left;margin-left:15px;">
<table style="width:100%;font-size:18px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn">Class/Sec</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_class']); ?></td></tr>
</table>
</div>
<?php
$sid = $rowstud['student_id'];
$att_re=mysqli_query($con,"select * from att_helth1 where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowar=mysqli_fetch_array($att_re);

?>
<div style="width:40%; float:left;">
<table style="width:100%;font-size:18px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn2">Roll No</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowar['attend']; ?></td></tr>
</table>
</div>
</div>
<br clear="all" /><br clear="all" />	
<div style="width:100%;height:auto;">
<div style="float:left;width:50%;">
<?php
$sid = $rowstud['student_id'];
$eh=mysqli_query($con,"select * from hindi_english_n where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and subject='English' and session='$ses'");
$roweh=mysqli_fetch_array($eh);

$eh1=mysqli_query($con,"select * from hindi_english_n where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and subject='Hindi' and session='$ses'");
$roweh1=mysqli_fetch_array($eh1);


$osub=mysqli_query($con,"select * from num_book where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowosub=mysqli_fetch_array($osub);

$math=mysqli_query($con,"select * from motor_skill where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowmath=mysqli_fetch_array($math);

$evms=mysqli_query($con,"select * from inte_dev where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowevms=mysqli_fetch_array($evms);

$cos=mysqli_query($con,"select * from lang_skill where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses' and subject='English'");
$rowcos=mysqli_fetch_array($cos);

$cos1=mysqli_query($con,"select * from lang_skill where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses' and subject='Hindi'");
$rowcos1=mysqli_fetch_array($cos1);


?>

<table style="width:515px; float:left; margin-top:20px;margin-left:-4px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">SUBJECT</td>
<td align="center" style="width:90px;border-left: 3px #000 solid;">ENGLISH</td>
<td align="center" style="width:60px;border-left: 3px #000 solid;">HINDI</td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;VOCABULARY</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh['vaca']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh1['vaca']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;CONVERSATION</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh['con']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh1['con']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;READS ALPHABET AND WORDS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh['reada']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh1['reada']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;DISTINGUISHES SOUNDS OF LETTERS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh['lettersa']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh1['lettersa']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;FORMATION OF LETTERS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh['formationa']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $roweh1['formationa']; ?></td>
</tr>
</table>

<br clear="all" />
<table style="width:515px;margin-top:20px;margin-left:-4px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">NUMBER WORK</td>
<td align="center" style="width:100px;border-left: 3px #000 solid;">TERM I</td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;RECOGNITION</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowosub['confidant']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;CLARITY OF CONCEPTS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowosub['polite']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;ABILITY TO ADD</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowosub['reponsible']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;ABILITY TO COUNT</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowosub['decipline']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;FORMATION</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowosub['regular']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;SHAPES</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowosub['appe']; ?></td>
</tr>

</table>


<table style="width:515px;margin-top:20px;margin-left:-4px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">MOTOR SKILLS</td>
<td align="center" style="width:100px;border-left: 3px #000 solid;">TERM I</td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;WORKING WITH CLAY</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['confidant']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;DRAWING COLOURING PAINTING</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['polite']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;PUZZLES AND GAMES</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['reponsible']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;EYE HAND CO-ORDINATION</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['decipline']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;PARTICIPATION IN INDOOR GAMES</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['regular']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;RHYTHMIC DANCING</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['appe']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;EXERCISES</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowmath['sans']; ?></td>
</tr>

</table>


<table style="width:515px;margin-top:20px;margin-left:-4px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">INTELLECTUAL DEVELOPMENT</td>
<td align="center" style="width:100px;border-left: 3px #000 solid;">TERM I</td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;CONCENTRATION SPAN</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowevms['confidant']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;CREATIVITY</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowevms['polite']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;EAGERNESS TO LEARN</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowevms['reponsible']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;FOLLOWS INSTRUCTIONS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowevms['decipline']; ?></td>
</tr>
</table>



</div>
<?php
$sed=mysqli_query($con,"select * from social_emo where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowsed=mysqli_fetch_array($sed);



$evm=mysqli_query($con,"select * from evms where student='$sid' and class='".$rowstud['student_class']."' and exam='TERM1' and session='$ses'");
$rowevm=mysqli_fetch_array($evm);
?>


<div style="float:left;width:50%;">
<table style="width:513px;margin-top:20px;margin-left:9px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">SOCIAL EMOTIONAL DEVELOPMENT </td>
<td align="center" style="width:100px;border-left: 3px #000 solid;">TERM I</td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;INTERACTION WITH PEERS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['confidant']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;INTERACTION WITH TEACHERS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['polite']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;PARTICIPATION IN GROUP DISCUSSION</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['reponsible']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;CONFIDENCE LEVEL</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['decipline']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;IS INDEPENDENT</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['regular']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;IS CO-OPERATIVE</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['appe']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;WELL DISCIPLINED</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['sans']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;SENSE OF SHARING</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['sans1']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;CLEANLINESS AND TIDINESS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['sans2']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;IS PUNCTUAL</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowsed['sans3']; ?></td>
</tr>


</table>




<table style="width:513px;margin-top:20px;margin-left:9px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">EVMS </td>
<td align="center" style="width:100px;border-left: 3px #000 solid;">TERM I</td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;GENERAL AWARENESS</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowevm['act_project']; ?></td>
</tr>

<tr style="line-height:32px;">
<td>&nbsp;ACTIVITIES</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowevm['dicussion']; ?></td>
</tr>
</table>


<table style="width:513px; float:left; margin-top:20px;margin-left:9px;color:#000000; border:3px #000000 solid;font-size:18px;font-weight:bold" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:32px; font-weight:bold;background-color:#b2f9b5; color:#000;">
<td align="center" style="font-weight:bold">LANGUAGE SKILLS</td>
<td align="center" style="width:90px;border-left: 3px #000 solid;">ENGLISH</td>
<td align="center" style="width:60px;border-left: 3px #000 solid;">HINDI</td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;RECITATION</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowcos['act_project']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowcos1['act_project']; ?></td>
</tr>

<tr style="line-height:30px;">
<td>&nbsp;STORY TELLING</td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowcos['dicussion']; ?></td>
<td align="center" style="border-left: 3px #000 solid;"><?php echo $rowcos1['dicussion']; ?></td>
</tr>

</table>
<br clear="all" />
<table style="width:513px; font-size:17px; margin-top:20px; margin-left:9px;color:#000000;border:3px #000000 solid;font-weight:bold;"  border="1" cellpadding="0" cellspacing="0">
<tr><td colspan="2" align="center" style="line-height:34px;">GRADING</td></tr>
<tr align="center" style="color:#000;line-height:32px;font-weight:bold; background-color:#b2f9b5;"><td>MARKS RANGE</td><td>GRADE</td></tr>
<tr align="center" style="line-height:37px;"><td>0-59</td><td>C</td></tr>
<tr align="center" style="line-height:37px;"><td>60 - 69</td><td>B2</td></tr>
<tr align="center" style="line-height:37px;"><td>70 - 79</td><td>B1</td></tr>
<tr align="center" style="line-height:37px;"><td>80 - 89</td><td>A2</td></tr>
<tr align="center" style="line-height:37px;"><td>90 - 100</td><td>A1</td></tr>

</table>


</div>

</div>	

	
<br clear="all" />
<br clear="all" /><br clear="all" /><br clear="all" />

<table style="width:96%; float:left; font-size:18px; margin-top:25px; margin-left:0px;color:#000000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#000;">
<div style="float:left; width:23%;">
&nbsp;&nbsp;<b>Class Teacher's Remark</b></span>:&nbsp;
</div>
<div style="float:left; font-weight:normal; width:75%; height:auto; border-bottom:1px #333333 solid;">
<?php echo $rowar['weight']; ?>
</div>
</td>
</tr>
</table>

<br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />
<table border="1" cellpadding="0" cellspacing="0" style="width:98%;font-size:18px; margin-top:5px; margin-left:10px;font-weight:bold;color:#000000; border:1px #000000 solid;">
<tr>
<td style="width:300px;" align="center"><br /><br /><br />Class Teacher's Signature<br /><br /></td>
<td style="width:270px;" align="center"><br /><br /><br />Parent's Signature<br /><br /></td>
<td style="width:270px;" align="center"><br /><br /><br />Principal Signature<br /><br /></td>
</tr>
</table>









	 
	  <br clear="all" />
	</div>
	  </div>
    
     
	 

	