<table border="1" cellspacing="0" cellpadding="0" style="width:950px; font-size:20px; text-transform:uppercase;">
<tr align="center">
<td colspan="11">
<span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">KHARYA ENGLISH SCHOOL</span><br />
</td>
</tr>	
<tr style="font-weight:bold; color:#000000">
		<td>Sr</td>
		
		<td>Student Name</td>
		<td>Student Father</td>
		<td>Student Class</td>
		<td>Remark</td>
		<td>Previous Year Fee</td>
	    <td>Deposit Fee</td>
		<td>Conc. Fee</td>
		<td>Balance Fee</td>
		
		
		
		
       </tr>
       <?php
       session_start();
	  require_once("../db.php"); 
	    $enquiry=mysqli_query($con,"select * from privious_fee where cid='".$_GET['class']."' and session='".$_GET['ses']."'");
       $i=1;
	   while($enquiryrow=mysqli_fetch_array($enquiry))
       {
	     ?>	
       <tr style="color:#fff; line-height:15px; color:#000000" align="center">
        <td><?php echo $i;  ?></td>
	    <td align="left">
		<?php 
	    $squiry=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and student_id='".$enquiryrow['sid']."' ");
		$stdrow=mysqli_fetch_array($squiry);
		echo $stdrow['student_name'];
		?>
		</td>
		<td><?php echo $stdrow['student_fname']; ?></td>
       <td><?php echo $stdrow['student_class']; ?></td>
	   <td><?php echo $enquiryrow['rmk']; ?></td>
	   <td><?php echo ucwords($enquiryrow['amt']);?></td>
	   
	   <td>
<?php
$search1=mysqli_query($con,"select sum(fee_deposit),sum(concession) from fee_detail_preivios where student='".$enquiryrow['sid']."' ");
$studrow=mysqli_fetch_array($search1);
// $depo= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];
$depo= $studrow['sum(fee_deposit)'];
$tcon= $studrow['sum(concession)'];
echo  $depo;
?>			
	
	
	</td>
	
	<td><?php echo  $tcon; ?></td>
	
	
	<td><?php echo  $enquiryrow['amt'] - $depo-$tcon; ?></td>
	
	
	
	   </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	 
	</table>