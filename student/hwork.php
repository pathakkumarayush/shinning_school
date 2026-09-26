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
	    $sid = $studrow['student_id'];
	    $cid = $_GET['cid'];
		?>
<?php
$cap=mysqli_query($con,"select * from add_chapter where session='".$_SESSION['session']."' and id='$cid'");
$caprow = mysqli_fetch_array($cap);
?>
<div class="pro">
&nbsp;&nbsp;&nbsp;&nbsp;Homwork  <?php  //echo $studrow['student_class']; ?>
<br clear="all" />
</div>				
<div class="fee_main" style=" min-height:350px;">
<h2 style="font-weight:bold;">&nbsp;&nbsp;Chapter-<?php echo $caprow['cname']; ?></h2>
<br />
<table class="tbl1"  border="1" cellspacing="0" cellpadding="0" style="border:1px #FFFFFF solid; ">
	<tr style="font-weight:bold; height:30px; background-color:#EF7F1A; color:#fff;">
	    <td align="center">Sr</td>
	    <td align="center">Class</td>
	    <td align="center">Subject</td>
		<td align="center">Date</td>
		<td align="center">Homwork</td>
		<td align="center">Image</td>
		<td align="center">Status</td>
		<td align="center">View</td>
		
                </tr>
    <?php
	$memo=mysqli_query($con,"select * from homework where class='".$studrow['student_class']."' and cap_id='$cid'");
	$num=mysqli_num_rows($memo);
    $i=1;
	if($num>0)
    {
	while($rowmemo=mysqli_fetch_array($memo))
    {
	
	  $hidd = $rowmemo['homework_id'];
	  $sub = $rowmemo['sub_id'];
	  $fet_subj=mysqli_query($con,"select  * from subject where subject_id='$sub'");
	  $rowsub=mysqli_fetch_array($fet_subj);
	?>	
    <tr style="color:#000; height:25px;">
    <td align="center"><?php echo $i;  ?></td>
    <td align="center"><?php echo ucwords($rowmemo['class']);?></td>
	<td align="center"><?php echo $rowsub['subject_name'];?></td>
    <td align="center"><?php //echo $rowmemo['assigndate'];?> <?php echo date("d-m-Y",strtotime($rowmemo['assigndate']));?> </td>
	<td align="center"><?php echo $rowmemo['homwork'];?></td>
    <td align="center"><?php echo $rowmemo['image'];?></td> 
	
	<td align="center">
	<?php 
	$memos=mysqli_query($con,"select * from homework_std where class='".$studrow['student_class']."' and cap_id='$cid' and hid='$hidd' and stdid='$sid' ");
	$rowmemos=mysqli_fetch_array($memos);
	$rowmemos['stdid']; 
	
	if($rowmemos['hid']==$rowmemo['homework_id'])
	{
	echo 'Done';
	
	}else{
	
	echo 'Not Done';
	}
	?>
	
	</td> 
	
	<td align="center"><a href="<?php echo $var."h_work&id=".$rowmemo['homework_id']; ?>" style="color:#000000; font-weight:bold">Send Homework</a></td> 
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