<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
input[type="checkbox"] {
      background: #E91E63 !important;
      border: #7f83a2 1px solid !important;
   }
input[type="checkbox"]:checked {
  background-color: #a77e2d !important;
  color: #ffffff !important;
}
</style>
<?php
session_start();
require_once("../db.php");
if(!empty($_GET["id"]))
{
  $_SESSION['student_class'] = $_GET["id"];	
}
?>
<div style="width:1050px;">
<?php
if(!empty($_GET["id2"]))
{
$_SESSION['student_id']=$_GET["id2"];	
?>
   
<?php
$stdr=mysqli_query($con,"select * from student where student_id='".$_GET["id2"]."' and student_session='".$_SESSION['session']."'");
$showr=mysqli_fetch_array($stdr);
$sch = $showr['student_scholar'];

$mnth=array();
$search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and sch='$sch' "); 
									 
	while($duerow=mysqli_fetch_array($search1))
	{
	$exp=explode(",",$duerow['month']);
	foreach($exp as $ey)
	{
	$arr=array_push($mnth,$ey);
	}
    }
	?>
<div style="float:left; width:200px;">

<input type="checkbox" name="month1[]" value="April" <?php foreach($mnth as $mnth1) { if($mnth1=="April"){ ?> checked="checked" disabled="disabled" <?php }}?>>
<span style="color:#6c196c; font-weight:bold">Instalment-I</span><br>  <br> 
<input type="checkbox" name="month1[]" value="August" <?php foreach($mnth as $mnth1) { if($mnth1=="August"){ ?> checked="checked" disabled="disabled" <?php }}?>>
<span style="color:#6c196c;; font-weight:bold">Instalment-II</span><br>  <br> 
<input type="checkbox" name="month1[]" value="December" <?php foreach($mnth as $mnth1) { if($mnth1=="December"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#6c196c; font-weight:bold">Instalment-III</span><br><br> 

</div>
<div style="float:left; width:750px; height:auto; color:#000000; margin-left:10px; margin-top:-10px; background-color:#da8dd6b3; border-radius:15px; border:2px #c3176e solid;">
<?php
$stdr=mysqli_query($con,"select * from student where student_id='".$_GET["id2"]."' and student_session='".$_SESSION['session']."'");
$showr=mysqli_fetch_array($stdr);

$sch = $showr['student_scholar'];

$exa=mysqli_query($con,"select * from fee_detail where sch='$sch' and session='".$_SESSION['session']."' ");

$admfee=mysqli_query($con,"select * from fee_detail_adm where student='".$_GET["id2"]."' and session='".$_SESSION['session']."' ");
?>
<div style="float:left; width:600px;">
<table style="color:#000; font-size:14px; margin-left:5px; margin-top:5px; width:100%;">
<tr>
<td style="font-weight:bold; width:120px;">Admission No&nbsp;:</td>
<td><?php echo $showr['student_scholar'];  ?></td>
<td style="font-weight:bold;width:120px;">Student Name&nbsp;:</td>
<td><?php echo $showr['student_name'];  ?></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td style="font-weight:bold;">Student Father&nbsp;:</td>
<td><?php echo $showr['student_fname'];  ?></td>
<td style="font-weight:bold;">Student Mother&nbsp;:</td>
<td><?php echo $showr['m_name'];  ?></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td style="font-weight:bold;">Student Class&nbsp;:</td>
<td><?php echo $cls = $showr['student_class'];  ?></td>
<td style="font-weight:bold;">Student Mobile&nbsp;:</td>
<td><?php echo $showr['student_contactno'];  ?></td>
</tr>
</table>

<table style="margin-left:10px; width:75%; font-size:12px; font-weight:bold;color:#000;margin-top:5px;">
<?php
while($hostel=mysqli_fetch_array($exa))
{
$class = $hostel["class"]; 
$tot = $hostel["fee_deposit"]; 
$val4+=$tot;
$con = $hostel["concession"];
$tcon+=$con;
$fine = $hostel["latefee"];
$tfine+=$fine;
}
?>

<tr style="height:40px; font-size:13px">
<td>Total Fee</td>
<td>
<?php
if($showr['std_type']=='New')
{
$admi=mysqli_query($con,"select * from admission where class='$cls' and session='".$_SESSION['session']."'");
$rowead=mysqli_fetch_array($admi);
//$ad = $rowead['fee']+1000;
}

if($showr['transport_status']=='Active')
{
$tfee=mysqli_query($con,"select * from stopage where stop_name='".$showr['transport_stopage']."'");
$rowf=mysqli_fetch_array($tfee);
//$tfee=$rowf['amnt'];
}
$exam=mysqli_query($con,"select * from activity where class='$cls' and session='".$_SESSION['session']."'");
$rowex=mysqli_fetch_array($exam);
//$ex = $rowex['fee'];

$total=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");
$tamt=mysqli_fetch_array($total);


$tttf  = $tamt['amnt'];

echo $tt = $tttf+$ad+$ex;

?> </td>
<td>&nbsp;&nbsp;Total Fee Pay</td>
<td>
<?php 
if($val4=='')
{
echo '0';
}else
{
echo  $val4;
}
 ?>
</td>
<td>&nbsp;&nbsp;Balance Amount</td>
<td>
<?php 
echo  $tt-$val4-$tcon+$tfine;
 ?>
</td>
</tr>

<?php /*?><tr><td style="color:#CCCC33">Admission Fee </td><td><?php echo $ad; ?></td><td style="color:#CCCC33">Pay Admission Fee</td><td><?php echo $valadm; ?></td>
<td style="color:#CCCC33">Balance Amount</td><td><?php echo $ad-$valadm; ?></td></tr>

<tr><td style="color:#CCCC33">Amalgamated  </td><td><?php echo $rowex['fee']; ?></td><td style="color:#CCCC33">Pay Amalgamated</td><td><?php echo $valak; ?></td>
<td style="color:#CCCC33">Balance Amount</td><td><?php echo $rowex['fee']-$valak; ?></td></tr><?php */?>

<tr><td>Concession </td><td><?php echo $tcon; ?></td><td>Fine (Late Fee) </td><td><?php echo $tfine; ?></td></tr>
</table>
<br clear="all" />

<table  border="1" cellspacing="0" cellpadding="0" style="width:120%; margin-left:10px; overflow:scroll;font-size:12px;">
<tr style="line-height:20px; font-weight:bold;" align="center"><td colspan="9">Student Ledger</td></tr>
<tr style="font-weight:bold; line-height:25px; background-color:#006633; color:#FFFFFF">
<td>Rec. No.</td>
<td>Instalment</td>
<td>Total Amt</td>
<td>Received Amount</td>
<td>Other/Fine</td>
<td>Conc.</td>
<td>Due</td>
<td>Date</td>
<td></td>
</tr>
<?php
$var="https://smarterponline.com/shining/school/?pageid=";
$stid = $showr['student_id'];
$memo=mysqli_query($con,"select * from fee_detail where student='$stid' and session='".$_SESSION['session']."' ");
$i=1;
while($rowmemo=mysqli_fetch_array($memo))
{
	 ?>	
    <tr style="color:#000; font-size:12px;line-height:22px;" align="center">
	<td><?php echo $rowmemo['receiptno'];?></td>
    <td><?php echo $rowmemo['instalment'];?></td>
    <td><?php echo $rowmemo['inst_fee'];?></td>
	<td><?php echo $rowmemo['fee_deposit'];?></td>
    <td><?php echo $rowmemo['latefee'];?></td>
	<td><?php echo $rowmemo['concession'];?></td> 
    <td><?php echo $rowmemo['due'];?></td>
    <td><?php echo date("d-m-Y",strtotime($rowmemo['date']));?></td> 
    <td style="font-size:14px;">
   
	<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/print1.php?id=<?php echo $rowmemo['sch']; ?>')">
   Print
    </a>
	&nbsp;||&nbsp;
	
	
   <a href="<?php echo $var."edit_fee&id=".$rowmemo['id']; ?>"  style="color:#FF0000" target="_blank">
    Pay Due</a>&nbsp;||&nbsp;
	<a href="<?php echo $var."edit_fees&id=".$rowmemo['id'];?>" style="color:#FF0000" target="_blank">Edit</a>
    </td>
    </td>
	</tr>
    <?php
    $i++;
	}
	?>
</table>

<br clear="all" />
</div>
<div style="float:left; width:85px; height:100px; margin-left:10px;">
<img src="upload/<?php echo $showr["student_img"]; ?>" style="margin-top:7px; border-radius:7px; width:100px; height:120px;" />
</div>

<?php /*?><div style="float:left; width:190px; height:175px; margin-left:10px; margin-top:7px; background-color:#c3176e; color:#FFFFFF; border-radius:15px;">

<div style="font-weight:bold; font-size:14px; margin-left:45px; margin-top:5px;"><u>Sibling Detail</u></div>
<?php
//$searchsq=mysqli_query($con,"select * from student WHERE student_contactno='".$showr['student_contactno']."' ");
//while($studrowsq=mysqli_fetch_array($searchsq))
//{
if($showr['is_bro']=='Yes')
{
?>


<span style="margin-left:10px; font-weight:12px; font-weight:bold; margin-top:10px; position:absolute;"><?php echo $showr['b1']; ?>&nbsp;&nbsp; <?php echo $showr['c1']; ?></span><br /><br />

<span style="margin-left:10px; font-weight:12px; font-weight:bold;"><?php echo $showr['b2']; ?>&nbsp;&nbsp; <?php echo $showr['c2']; ?></span><br /><br />

<span style="margin-left:10px; font-weight:12px; font-weight:bold;"><?php echo $showr['b3']; ?>&nbsp;&nbsp; <?php echo $showr['c3']; ?></span><br />

<?php }?>

</div><?php */?>

<br clear="all" />

</div>
 
  </div>
<?php
}
?>
</div>