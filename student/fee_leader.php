<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">


<div class="left_side">
<div id="tog" style=""><button >
<img src="images/r.png"  style="float:right; "/></button>

</div>

<?php include('left.php'); ?>

</div>

<div class="right_side" style="">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		?>
<div class="pro">
&nbsp;&nbsp;&nbsp;&nbsp;Fee Details - <?php  echo $studrow['student_name']; ?>
<br clear="all" />
</div>				
<div class="fee_main" style=" min-height:350px;">
<h2>&nbsp;&nbsp;Tution Fee</h2>
<br />
<table class="tbl1"  border="1" cellspacing="0" cellpadding="0" style="border:1px #FFFFFF solid; ">
	<tr style="font-weight:bold; height:30px; background-color:#EF7F1A; color:#FFFFFF;">
	    <td align="center">Sr</td>
	    <td align="center">Recipt_No</td>
		<td align="center">Date</td>
		<td align="center">Fee Paid</td>
		<td align="center">View</td>
		
                </tr>
    <?php
	$memo=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and session='".$_SESSION['session']."'");
	$num=mysqli_num_rows($memo);
    $i=1;
	if($num>0)
    {
	while($rowmemo=mysqli_fetch_array($memo))
    {
	?>	
    <tr style="color:#000; height:25px;">
    <td align="center"><?php echo $i;  ?></td>
    <td align="center"><?php echo ucwords($rowmemo['receiptno']);?></td>
	<td align="center"><?php echo date("d-m-Y",strtotime($rowmemo['date']));  ?></td>
    <td align="center"><?php echo $rowmemo['fee_deposit'];?></td>
	<td align="center"><a href="<?php echo $var."view_leader&id=".$rowmemo['id']; ?>" style="color:#000000; font-weight:bold">View</a></td> 
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
<br />

<br />
<?php
if(!empty($studrow['transport_status']))
{
?>
<h2>&nbsp;&nbsp;Bus Fee</h2>
<table class="tbl1"  border="1" cellspacing="0" cellpadding="0" style="border:1px #FFFFFF solid; ">
	<tr style="font-weight:bold; height:30px; background-color:#006600; color:#FFFFFF;">
	    <td align="center">Sr</td>
	    <td align="center">Month</td>
	    <td align="center">Total fee</td>
		<td align="center">Fee Paid</td>
		<td align="center">Due</td>
		<td align="center">Paid Date</td>
        <td align="center">Session</td>
		<td align="center">View</td>
		
                </tr>
    <?php
	$memo=mysqli_query($con,"select * from fee_detail_trans where student='".$studrow['student_id']."' ");
	$num=mysqli_num_rows($memo);
    $i=1;
	if($num>0)
    {
	while($rowmemo=mysqli_fetch_array($memo))
    {
	?>	
    <tr style="color:#000; height:25px;">
    <td align="center"><?php echo $i;  ?></td>
    <td align="center"><?php echo ucwords($rowmemo['month']);?></td>
	<td align="center"><?php echo $rowmemo['tamnt'];?></td>
    <td align="center"><?php echo $rowmemo['fee_deposit'];?></td>
	<td align="center"><?php echo $rowmemo['due'];?></td>
    <td align="center"><?php echo date("d-m-Y",strtotime($rowmemo['date']));?></td> 
	<td align="center"><?php echo $rowmemo['session'];?></td> 
	<td align="center"><a href="<?php echo $var."view_leader_bus&id=".$rowmemo['id']; ?>" style="color:#000000; font-weight:bold">View</a></td> 
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

<?php } ?>
<br clear="all" />
<br clear="all" />
</div>
</div>



</div>

<br clear="all" />
</div>
</div>
</div>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>