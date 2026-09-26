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
									  
									?>
     
                  <input type="checkbox" name="month1[]" value="July" <?php foreach($mnth as $mnth1) { if($mnth1=="July"){ ?> checked="checked" disabled="disabled" <?php } } ?>>July <br>
                   <input type="checkbox" name="month1[]" value="August" <?php foreach($mnth as $mnth1) { if($mnth1=="August"){ ?> checked="checked" disabled="disabled" <?php } } ?>>August <br>
                   <input type="checkbox" name="month1[]" value="September" <?php foreach($mnth as $mnth1) { if($mnth1=="September"){ ?> checked="checked" disabled="disabled" <?php  } } ?>>September <br>
                   <input type="checkbox" name="month1[]" value="October" <?php foreach($mnth as $mnth1) { if($mnth1=="October"){ ?> checked="checked" disabled="disabled" <?php } } ?>>October <br>
                   <input type="checkbox" name="month1[]" value="November" <?php foreach($mnth as $mnth1) { if($mnth1=="November"){ ?> checked="checked" disabled="disabled" <?php } } ?>>November <br>
                   <input type="checkbox" name="month1[]" value="December" <?php foreach($mnth as $mnth1) { if($mnth1=="December"){ ?> checked="checked" disabled="disabled" <?php } } ?>>December <br>
                  <input type="checkbox" name="month1[]" value="January" <?php foreach($mnth as $mnth1) { if($mnth1=="January"){ ?> checked="checked" disabled="disabled" <?php } } ?>>January <br>
                  <input type="checkbox" name="month1[]" value="February" <?php foreach($mnth as $mnth1) { if($mnth1=="February"){ ?> checked="checked" disabled="disabled" <?php } } ?>>February <br>
                   <input type="checkbox" name="month1[]" value="March" <?php foreach($mnth as $mnth1) { if($mnth1=="March"){ ?> checked="checked" disabled="disabled" <?php } } ?>>March <br>
                   <input type="checkbox" name="month1[]" value="April" <?php foreach($mnth as $mnth1) { if($mnth1=="April"){ ?> checked="checked" disabled="disabled" <?php } } ?>>April <br>
                   <input type="checkbox" name="month1[]" value="May" <?php foreach($mnth as $mnth1) { if($mnth1=="May"){ ?> checked="checked" disabled="disabled" <?php } } ?>>May <br>
                  <input type="checkbox" name="month1[]" value="June" <?php foreach($mnth as $mnth1) { if($mnth1=="June"){ ?> checked="checked" disabled="disabled" <?php } } ?>>June <br>
                  									  </td>
               </div>
<?php
}

?>
