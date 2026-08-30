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
		
		
		  $ctech=mysqli_query($con,"select * from class_teacher where class='".$studrow['student_class']."'");
		   $ctechrow=mysqli_fetch_array($ctech);
		   
		  $query_teacher=mysqli_query($con,"select * from teacher where uid='".$ctechrow['teacher']."'");
	      $row_teach=mysqli_fetch_array($query_teacher);
		?>
<div class="pro" style="font-weight:bold;">
&nbsp;&nbsp;&nbsp;&nbsp;Profile Details - <?php  echo $studrow['student_name']; ?>
<br clear="all" />
</div>				
<div class="fee_main" style=" font-weight:bold;">

<div class="fee">


<img src="../school/upload/<?php echo $studrow["student_img"]; ?>" style="height:100px;border-radius:48px;  margin-left:17px; width:100px; margin-top:4px; " />

</div>


<div class="fee">
<div class="fee_left">Class Teacher</div>  <div class="fee_right">: <?php echo $row_teach['teacher_name']; ?></div>
</div>
<br clear="all" />

<div class="fee">
<div class="fee_left">Student Name</div>  <div class="fee_right">: <?php echo $studrow['student_name']; ?></div>
</div>
<br clear="all" />

<div class="fee">
<div class="fee_left">Student Class:</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['student_class']; ?></div>
</div>
<br clear="all" />

<div class="fee">
<div class="fee_left">Student D.O.B</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['student_dob']; ?></div>
</div>
<br clear="all" />
<div class="fee">
<div class="fee_left">Student Caste</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['caste']; ?></div>
</div>
<br clear="all" />
<div class="fee">
<div class="fee_left">Student Gender</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['student_gender']; ?></div>
</div>

<br clear="all" />
<div class="fee">
<div class="fee_left">Student Father</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['student_fname']; ?></div>
</div>
<br clear="all" />
<div class="fee">
<div class="fee_left">Student Mother</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['m_name']; ?></div>
</div>
<br clear="all" />
<div class="fee">
<div class="fee_left">Student SSSMID</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['mother_tong']; ?></div>
</div>

<br clear="all" />
<div class="fee">
<div class="fee_left">Contact No.</div>  <div class="fee_right">: &nbsp;<?php echo $studrow['student_contactno']; ?></div>
</div>
<br clear="all" />


<div class="fee">
<div class="fee_left">Address</div>  <div class="fee_right"><?php echo $studrow['student_address']; ?></div>
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>



</div>
<br clear="all" />
<br clear="all" />
</div>
</div>
</div>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>