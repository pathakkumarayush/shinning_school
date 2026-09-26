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

<div class="right_side" style=" background-color:#eee">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		
		 $clss=mysqli_query($con,"select * from class where class='".$studrow['student_class']."'");
		 $clarow=mysqli_fetch_array($clss);
		 $cls = $clarow['class_id'];
		?>
<div class="pro" style="font-weight:bold;">
&nbsp;&nbsp;&nbsp;&nbsp;Online Studay - <?php  echo $studrow['student_class'];  ?>
<br clear="all" />
</div>	

       		
<div class="subj_main" style=" font-weight:bold;">

<div class="fee">
<br />
<span style="font-weight:bold; font-size:18px; margin-left:10px;">Start Learning</span> 
<br />
</div>

<div class="sub">
<?php   
$sub=mysqli_query($con,"select * from subject where session='".$_SESSION['session']."' and class_id='$cls'");
while($subrow = mysqli_fetch_array($sub))
{

?>	
<a href="<?php echo $var."chapter&class=".$clarow['class_id']; ?>&sub=<?php echo $subrow['subject_id'];?>" style="color:#000000; font-weight:bold;">
<div class="sub_left">
<?php 
$sublogo = $subrow['subject_name'];
$logosub=mysqli_query($con,"select * from app_sub where sub_name='$sublogo'");
$logorow = mysqli_fetch_array($logosub);
?>
<img src="../school/uploads/<?php echo $logorow["sub_img"]; ?>" style="" />
<br clear="all" /><br clear="all" />
<center><span class="subap" style="font-weight:bold;"><?php echo $sublogo; ?></span></center>
</div> 
</a>
<?php } ?>
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