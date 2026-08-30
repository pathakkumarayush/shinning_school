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
<span style="font-weight:bold; font-size:18px; margin-left:10px;">Learning Chapter</span> 
<br />
</div>

<div class="sub">
<?php   
$cap=mysqli_query($con,"select * from add_chapter where session='".$_SESSION['session']."' and class_id='".$_GET['class']."' and subject_id='".$_GET['sub']."'");
$i=1;
while($caprow = mysqli_fetch_array($cap))
{
?>	

<?php 
if($caprow['status']=='Active')
{
?>
<a href="<?php echo $var."study_material&cid=".$caprow['id']; ?>" style="text-decoration:none; color:#000000;" >
<div class="sub_chap" style="line-height:40px; background-color:#EF7F1A; border-radius:8px;margin-top:10px; margin-left:3px; border:2px #fff solid;box-shadow: 0 8px 6px -6px black;">
<span>&nbsp;&nbsp;<?php echo $i; ?>&nbsp;-&nbsp;</span><?php echo $caprow['cname']; ?>
</div> 
</a>
<?php }else {?>

<a href="#" style="text-decoration:none; color:#000000;" onclick="alert('Sorry! this chapter not available for studay');">
<div class="sub_chap" style="line-height:40px; background-color:#EF7F1A; border-radius:8px;margin-top:10px;margin-left:3px border:2px #fff solid;box-shadow: 0 8px 6px -6px black;">

<span>&nbsp;&nbsp;<?php echo $i; ?>&nbsp;-&nbsp;</span><?php echo $caprow['cname']; ?>
</div> 
</a>

<?php }?>

<?php  $i++; } ?>
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