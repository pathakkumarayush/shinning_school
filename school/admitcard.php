<?php
session_start();
require_once("../db.php"); 
?>
<style>
.tab tr{ line-height:25px;}
</style>    
<?php
if($_GET['student_class']=='VI A')
{
$i=6001;
}
if($_GET['student_class']=='VI B')
{
$i=6030;
}
if($_GET['student_class']=='VII A')
{
$i=7001;
}
if($_GET['student_class']=='VII B')
{
$i=7045;
}
if($_GET['student_class']=='VIII A')
{
$i=8001;
}
if($_GET['student_class']=='VIII B')
{
$i=8028;
}
if($_GET['student_class']=='VIII C')
{
$i=8054;
}
if($_GET['student_class']=='IX A')
{
$i=9001;
}
if($_GET['student_class']=='IX B')
{
$i=9038;
}
if($_GET['student_class']=='IX C')
{
$i=9068;
}
if($_GET['student_class']=='X A')
{
$i=10001;
}
if($_GET['student_class']=='X B')
{
$i=10057;
}
if($_GET['student_class']=='X C')
{
$i=10104;
}
if($_GET['student_class']=='XI Com.')
{
$i=11001;
}
if($_GET['student_class']=='XI Maths')
{
$i=11067;
}
if($_GET['student_class']=='XI Bio')
{
$i=11105;
}
if($_GET['student_class']=='XI Math Bio')
{
$i=11138;
}

if($_GET['student_class']=='XII Com.')
{
$i=12001;
}
if($_GET['student_class']=='XII Math')
{
$i=12055;
}
if($_GET['student_class']=='XII Bio')
{
$i=12079;
}
if($_GET['student_class']=='XII Math Bio')
{
$i=12138;
}


	
	 
	  $search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and student_session='".$_GET['ses']."' and status='0' order by student_name Asc");
	  while($rowstud=mysqli_fetch_array($search))
	  {
	   
	    $sid = $rowstud['student_id'];
	    $rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='".$_GET['ses']."'");
		$rowno=mysqli_fetch_array($rno);
	  ?>	
      <div style="width:95%; height:300px; float:left; margin-top:30px; margin-left:10px; border:1px #000 solid; border-radius:10px;">
	  <div style="width:100%; height:90px; border-bottom:2px #000 solid;">
      <center><span style="font-size:32px;"><u>Shining Public Higher Secondary School, Raisen</u> </span></center>
	  <center><span style="font-size:22px;">First Terminal Examination <?php echo $_GET['ses']; ?></span></center>
	  <center><span style="font-size:22px;">Admit Card</span></center>
	  </div>
	 
	 
	  <div style="width:100%; height:120px; margin-top:3px;">
	  <table border="0" cellpadding="0" cellspacing="0" style="width:100%; font-size:18px; font-weight:bold; margin-left:8px;" class="tab"> 
	  <tr><td style="width:80px;">Name </td><td>: <?php echo $rowstud["student_name"]; ?></td><td style="width:70px;">Roll No</td><td>: <?php echo $rowstud['rno'];?></td></tr>
	  <tr><td>Father </td><td colspan="3">: Mr. <?php echo $rowstud["student_fname"]; ?></td></tr>
	  <tr><td>Class/Sec. </td><td colspan="3">: <?php echo $rowstud["student_class"]; ?></td></tr>
	
	
	  </table>
	  </div>
	  <br />
	  <div style="width:100%;height:34px;">
	   <span style="float:left;font-size:16px; font-weight:bold; margin-left:10px;">Class Teacher</span>
	   
	   <span style="float:right;font-size:16px; margin-right:20px;font-weight:bold;">
	   <img src="ps.png" style="position:absolute; width:100px; height:45px; margin-top:-41px; margin-left:65px;" />
	   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen</span>
	   
	  </div>
	  <br clear="all" />
	  </div>
      <?php
      $i++;
	  }
      ?>
     
	 
	 
	