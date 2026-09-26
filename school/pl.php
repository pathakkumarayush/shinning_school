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
<?php 
$sea=mysqli_query($con,"select * from student where student_id='".$_GET['student_id']."' and student_session='".$_GET['ses']."' ");
$rowss=mysqli_fetch_array($sea);
$sid = $rowss['student_id'];
?>



<table align="center" style="font-size:14px;" border="1" cellpadding="0" cellspacing="0">
	   <tr>
	   <td style="font-weight:bold">Student Name </td><td><?php echo $rowss['student_name']; ?></td>
	   <td style="font-weight:bold">Admission No </td><td><?php echo $rowss['student_scholar']; ?></td>
	   <td style="font-weight:bold">Student Class </td><td align="center"><?php echo $rowss['student_class']; ?></td>
	   <td style="font-weight:bold">Date Of Birth </td><td><?php echo $rowss['student_dob']; ?></td>
	   <td style="font-weight:bold">Gender </td><td><?php echo $rowss['student_gender']; ?></td>
	   </tr>
	   
	     <tr>
	   <td style="font-weight:bold">Father Name</td><td><?php echo $rowss['student_fname']; ?></td>
	   <td style="font-weight:bold">F-Mobile No</td><td><?php echo $rowss['student_contactno']; ?></td>
	   <td style="font-weight:bold">Mother Name </td><td><?php echo $rowss['m_name']; ?></td>
	   <td style="font-weight:bold">M-Mobile No</td><td><?php echo $rowss['f_tell_no_off']; ?></td>
	   <td style="font-weight:bold">Address</td><td><?php echo $rowss['student_address']; ?></td>
	   </tr>
	   
	   <tr>
	   <td style="font-weight:bold">Religion </td><td><?php echo $rowss['relligion']; ?></td>
	   <td style="font-weight:bold">Family ID </td><td><?php echo $rowss['fid']; ?></td>
	   <td style="font-weight:bold">SSSMID </td><td><?php echo $rowss['sssmid']; ?></td>
	   <td style="font-weight:bold">Aadhar No </td><td><?php echo $rowss['student_rollno']; ?></td>
	   <td style="font-weight:bold">Blood Group </td><td><?php echo $rowss['bg']; ?></td>
	   </tr>
	  </table>
	  
	<table style="margin-left:10px; width:75%; font-size:12px; font-weight:bold;color:#000;margin-top:5px;">
<?php

$sid = $rowss['student_id'];
$cls = $rowss['student_class'];

$exa=mysqli_query($con,"select * from fee_detail where student='$sid' and session='".$_GET['ses']."'");


while($hostel=mysqli_fetch_array($exa))
{
$class = $hostel["class"]; 
$tot = $hostel["fee_deposit"]; 


$tregf+=$hostel["adm_fee"];
$texpf+=$hostel["caution"];
$tenf+=$hostel["enroll"];

$val4+=$tot;
$con = $hostel["concession"];
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
if($rowss['std_type']=='New')
{
$admi=mysqli_query($con,"select * from admission where class='$cls' and session='".$_GET['ses']."'");
$rowead=mysqli_fetch_array($admi);
$ad = $rowead['fee'];
}

if($rowss['bus']=='Yes')
{
$tfee=$rowss['hostel_status'];
}


$total=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_GET['ses']."'");
$tamt=mysqli_fetch_array($total);


$tttf  = $tamt['amnt']+$tamt['actfee'];

echo $tt = $tttf+$ad+$ex+$tfee-$rowss['famt'];


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


<tr style="color:#CC0033"><td>Tution Fee</td><td><?php echo $tut = $tttf-$rowss['famt']; ?></td><td>Paid Fee</td><td><?php echo $tutiont; ?></td><td>Balance</td><td>
<?php echo $tut-$tutiont; ?></td></tr>
<?php
  $prfee=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_GET['ses']."'");
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



</table>
	   <br />
	   <table  border="1" cellspacing="0" cellpadding="0" style="width:100%; overflow:scroll;font-size:14px;">
		<tr style="line-height:25px; font-weight:bold;"><td colspan="15">Fee Details</td>
	   </tr>
		
		<tr style="font-weight:bold" align="center">
        <td>Receipt No.</td>
	    <td>Sch.Receipt</td>
		<td>A/C No</td>
		<td>Tution Fee</td>
		<td>Admission Fee</td>
	    <td>Bus Fee</td>
		<td>Old Fee</td>
	    <td>Received Amount</td>
		<td>Date</td>
      
	    </tr>
        <?php
        $memo=mysqli_query($con,"select * from fee_detail where session='".$_GET['ses']."' and student='$sid' ");               
        $num=mysqli_num_rows($memo);

	    $i=1;
	    if($num>0)
		{
	    while($rowmemo=mysqli_fetch_array($memo))
		{
	    ?>	
    <tr style="color:#335599; font-size:14px;" align="center">
	<td><?php echo $rowmemo['receiptno'];?></td>
    <td><?php echo $rowmemo['sreceipt'];?></td>
	 <td><?php echo $rowmemo['acn'];?></td>
	<td><?php echo $rowmemo['inst_fee'];?></td>
	<td><?php echo $rowmemo['adm_fee'];?></td>
    <td><?php echo $rowmemo['inst_fee_bus'];?></td>
	<td><?php echo $rowmemo['pdue'];?></td>
	<td><?php echo $rowmemo['fee_deposit'];?></td>
    <td><?php echo date("d-m-Y",strtotime($rowmemo['date']));?></td> 
    
   
	</tr>
    <?php
    $i++;
	}
	}
	else
	{
	?>
	<tr>
	<td><span style="color:#CC0000">No Record</span></td>
	</tr>
	<?php
	}
	?>
	
    </table>
	<br clear="all" />
	
	