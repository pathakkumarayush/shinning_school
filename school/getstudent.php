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
$sid = $showr['student_id'];

$mnth=array();
$search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and student='$sid' "); 
									 
	while($duerow=mysqli_fetch_array($search1))
	{
	$exp=explode(",",$duerow['month']);
	foreach($exp as $ey)
	{
	$arr=array_push($mnth,$ey);
	}
    }
	?>
<?php /*?>

<div style="float:left; width:200px;">
<input type="checkbox" name="month1[]" value="April" <?php foreach($mnth as $mnth1) { if($mnth1=="April"){ ?> checked="checked" disabled="disabled" <?php }}?>>
<span style="color:#CC0000; font-weight:bold">Instalment1</span>-April<br>  
 <input type="checkbox" name="month1[]" value="July" <?php foreach($mnth as $mnth1) { if($mnth1=="July"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment2</span>-July<br>
<input type="checkbox" name="month1[]" value="August" <?php foreach($mnth as $mnth1) { if($mnth1=="August"){ ?> checked="checked" disabled="disabled" <?php }}?>>
<span style="color:#CC0000; font-weight:bold">Instalment3</span>-August<br>
<input type="checkbox" name="month1[]" value="September" <?php foreach($mnth as $mnth1) { if($mnth1=="September"){ ?> checked="checked" disabled="disabled" <?php }}?>>
<span style="color:#CC0000; font-weight:bold">Instalment4</span>-September<br>
<input type="checkbox" name="month1[]" value="October" <?php foreach($mnth as $mnth1) { if($mnth1=="October"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment5</span>-October<br>
<input type="checkbox" name="month1[]" value="November" <?php foreach($mnth as $mnth1) { if($mnth1=="November"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment6</span>-November<br>
<input type="checkbox" name="month1[]" value="December" <?php foreach($mnth as $mnth1) { if($mnth1=="December"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment7</span>-December<br>
<input type="checkbox" name="month1[]" value="January" <?php foreach($mnth as $mnth1) { if($mnth1=="January"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment8</span>-January<br>
<input type="checkbox" name="month1[]" value="February" <?php foreach($mnth as $mnth1) { if($mnth1=="February"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment9</span>-February<br>
<input type="checkbox" name="month1[]" value="March" <?php foreach($mnth as $mnth1) { if($mnth1=="March"){ ?> checked="checked" disabled="disabled" <?php } } ?>>
<span style="color:#CC0000; font-weight:bold">Instalment10</span>-March<br>

</div>

<?php */?>
<div style="float:left; width:830px; height:auto; color:#000000; margin-left:10px; margin-top:-10px; background-color:#da8dd6b3; border-radius:15px; border:2px #c3176e solid;">
<?php
$stdr=mysqli_query($con,"select * from student where student_id='".$_GET["id2"]."' and student_session='".$_SESSION['session']."'");
$showr=mysqli_fetch_array($stdr);

$sid = $showr['student_id'];

$exa=mysqli_query($con,"select * from fee_detail where student='$sid' and session='".$_SESSION['session']."' ");

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
<td style="font-weight:bold;">A/C No.&nbsp;:</td>
<td><?php echo $showr['sedate'];  ?></td>
<td style="font-weight:bold;">Student Father&nbsp;:</td>
<td><?php echo $showr['student_fname'];  ?></td>
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
$con = $hostel["conc"];
$tcon+=$con;
$fine = $hostel["latefee"];
$tfine+=$fine;

$tutiont+=$hostel["inst_fee"]; 
$pdt+=$hostel["pdue"]; 
$bust+=$hostel["inst_fee_bus"]; 
$admt+=$hostel["adm_fee"]; 

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
$ad = $rowead['fee'];
}

if($showr['bus']=='Yes')
{
$tfee=$showr['hostel_status'];
}

    $pr=mysqli_query($con,"select * from privious_fee where sid='$sid' ");
	$prow=mysqli_fetch_array($pr);
	$tpr=$prow['amt'];



$total=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");
$tamt=mysqli_fetch_array($total);


$tttf  = $tamt['amnt']+$tamt['actfee'];

echo $tt = $tttf+$ad+$tpr+$tfee-$showr['famt'];

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

<tr style="color:#CC0033"><td>Tution Fee</td><td><?php echo $tut = $tttf-$showr['famt']; ?></td><td>Paid Fee</td><td><?php echo $tutiont; ?></td><td>Balance</td><td>
<?php echo $tut-$tutiont; ?></td></tr>

<?php
  $prfee=mysqli_query($con,"select * from privious_fee where sid='".$_GET["id2"]."'");
  while($erow=mysqli_fetch_array($prfee))
  {
	$tprfee+=$erow['amt'];  
  }
?>
<tr><td>&nbsp;</td></tr>
<tr style="color:#0066FF"><td>Previous Fee</td><td><?php echo $tprfee; ?></td><td>Paid Fee</td><td><?php echo $pdt; ?></td><td>Balance</td><td><?php echo $tprfee-$pdt; ?></td></tr>
<tr><td>&nbsp;</td></tr>
<tr style="color:#9c27b0"><td>Bus Fee</td><td><?php echo $tfee; ?></td><td>Paid Fee</td><td><?php echo $bust; ?></td><td>Balance</td><td><?php echo $tfee-$bust; ?></td></tr>
<tr><td>&nbsp;</td></tr>
<tr style="color:#009688"><td>Admission Fee</td><td><?php echo $ad; ?></td><td>Paid Fee</td><td><?php echo $admt; ?></td><td>Balance</td><td><?php echo $ad-$admt; ?></td></tr>


<?php /*?><tr>
<td>Reg. Fee</td><td style="color:#CC0000"><?php  echo $ad; ?></td>
 
<td>Pay Reg. Fee</td><td style="color:#CC0000"><?php echo $regpay = $val41+$tcon1; ?></td>

<td>&nbsp;&nbsp;Bal. Reg. Fee</td><td style="color:#CC0000"><?php echo $regbal = $ad-$regpay; ?></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>Yearly Exp. Fee</td><td style="color:#CC0000"><?php  echo $yrfee = $tamt['actfee']; ?></td>
 
<td>Pay Yearly Exp.</td><td style="color:#CC0000"><?php echo $yrpay = $val42+$tcon2; ?></td>

<td>&nbsp;&nbsp;Bal. Yearly Exp.</td><td style="color:#CC0000"><?php echo $yrgbal = $yrfee-$yrpay; ?></td>
</tr>

<tr><td>&nbsp;</td></tr>
<tr>
<td>Monthly Fee</td><td style="color:#CC0000"><?php  echo $mfee = $tamt['amnt']; ?></td>
 
<td>Pay Monthly Fee</td><td style="color:#CC0000"><?php echo $mpay = $val43+$tcon3; ?></td>

<td>&nbsp;&nbsp;Bal. Monthly Fee </td><td style="color:#CC0000"><?php echo $mbal = $mfee-$mpay; ?></td>
</tr><?php */?>


</table>
<br clear="all" />
<?php /*?>
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
<?php */?>
<br clear="all" />
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