<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>



<style>

</style>
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
&nbsp;&nbsp;&nbsp;&nbsp;Profile Details - <?php  echo $studrow['student_name']; ?>
<br clear="all" />
</div>				
<div class="fee_main" style=" min-height:350px;">

<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border:1px #FFFFFF solid; ">
	<tr style="font-weight:bold; height:30px; background-color:#EF7F1A; color:#FFFFFF">
	    <td align="center">Sr</td>
	    <td align="center">Month</td>
	    <td align="center">Date</td>
		<td align="center">Attandance</td>
        <td align="center">Session</td>
		
		
                </tr>
    <?php
	$memo=mysqli_query($con,"select * from absentdetail  where student='".$studrow['student_id']."' and session='".$_SESSION['session']."' order by id desc");
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
	<td align="center"><?php echo date("d-m-Y",strtotime($rowmemo['date']));?></td> 
		<td align="center"><?php echo $rowmemo['absent']; ?></td> 
	<td align="center"><?php echo $rowmemo['session'];?></td> 

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