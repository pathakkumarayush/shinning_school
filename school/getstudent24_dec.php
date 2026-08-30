<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
</style>
<?php
session_start();

require_once("../db.php");

/*
$con = mysqli_connect("localhost","campus","root123");
$db = mysqli_select_db("btm",$con);
*/

if(!empty($_GET["id"]))
{
  $_SESSION['student_class']=$_GET["id"];	
}
if(!empty($_GET["id2"]))
{
  $_SESSION['student_id']=$_GET["id2"];	
?>
 <div style="height:100px; overflow:scroll">    
 <?php
    $mnth=array();
     $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$_GET["id2"]."'"); 
									 
									 while($duerow=mysqli_fetch_array($search1))
									 {
									   $exp=explode(",",$duerow['month']);
									  foreach($exp as $ey)
									  {
									    $arr=array_push($mnth,$ey);
									  }
									 }
									$month=mysqli_query($con,"select * from month");
									while($row_month=mysqli_fetch_array($month))
									{  
									 	$combinemonth=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and month='".$row_month['month']."' and class='".$_SESSION['student_class']."'");
					
					$rowcom=mysqli_fetch_array($combinemonth);
					$num2=mysqli_num_rows($combinemonth);
						$chk_month=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and combinemonth='".$row_month['month']."' and class='".$_SESSION['student_class']."'");
					
					$num=mysqli_num_rows($chk_month);
									if($num<1)
									{
									?>
     
                  <input type="checkbox" name="month1[]" value="<?php echo $row_month['month'];  ?>" <?php foreach($mnth as $mnth1) { if($mnth1==$row_month['month']){ ?> checked="checked" disabled="disabled" <?php } } ?>><?php echo $row_month['month'];  ?> <?php if($num2>0) {?> &nbsp;&nbsp; <input type="checkbox" name="month1[]" value="<?php echo $rowcom['combinemonth'];  ?>" <?php foreach($mnth as $mnth1) { if($mnth1==$rowcom['combinemonth']){ ?> checked="checked" disabled="disabled" <?php } } ?>><?php echo $rowcom['combinemonth'];  ?> <?php  } ?>
				  
				  <br>
                  
                  									  </td>
             
<?php
}
}
}
?>
  </div>