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

$clstech=mysqli_query($con,"select * from class_teacher where class='".$rowstud['student_class']."' and teacher_session='$ses'");
$rowcls=mysqli_fetch_array($clstech);

$clsth=mysqli_query($con,"select * from teacher where uid='".$rowcls['teacher']."'");
$rowcls=mysqli_fetch_array($clsth);
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
<tr style="line-height:37px;"><td class="sn2">Roll No.</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['rno']); ?></td></tr>
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




</div>
</div>	


	


	


<br clear="all" />
</div>
    
     
	   

	