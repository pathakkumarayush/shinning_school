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
		 $cap_id = $_GET['cid'];
		
         $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	     $studrow=mysqli_fetch_array($search);
		
		 $clss=mysqli_query($con,"select * from class where class='".$studrow['student_class']."'");
		 $clarow=mysqli_fetch_array($clss);
		 $cls = $clarow['class_id'];
		?>
<div class="pro" style="font-weight:bold;">
&nbsp;&nbsp;&nbsp;&nbsp;Online Studay - <?php  echo $studrow['student_class'];  ?>
<a href="./?pageid=chapter" style="float:right; color:#990000; font-weight:bold; font-size:16px;">&nbsp;&nbsp;</a>
</div>	

       		
<div class="subj_main" style=" font-weight:bold;">

<div class="fee">
<br />
<?php
$cap=mysqli_query($con,"select * from add_chapter where session='".$_SESSION['session']."' and id='$cap_id'");
$caprow = mysqli_fetch_array($cap);
?>
<span style="font-weight:bold; font-size:18px; margin-left:10px; border-bottom:2px dashed #990000;">Video</span> 
<br />
</div>

<div class="substd">
<?php   
$std=mysqli_query($con,"select * from study_material where chapter_id='$cap_id' ");
$stdrow = mysqli_fetch_array($std);
?>	


<?php
if(!empty($stdrow['v_links']))
{
?>
<a href="<?php echo $stdrow['v_links']; ?>" style="text-decoration:none;" target="_blank">
<div class="std_left" style="">
<img src="icons/vi.png" />
</div> 
</a>

<?php } ?>

<?php
if(!empty($stdrow['v_links1']))
{
?>
<a href="<?php echo $stdrow['v_links1']; ?>" style="text-decoration:none;" target="_blank">
<div class="std_left" style="">
<img src="icons/vi.png" />
</div> 
</a>

<?php } ?>

<?php
if(!empty($stdrow['v_links2']))
{
?>
<a href="<?php echo $stdrow['v_links2']; ?>" style="text-decoration:none;" target="_blank">
<div class="std_left" style="">
<img src="icons/vi.png" />
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