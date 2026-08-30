<?php
require_once("db.php");
if(isset($_POST['add_thot']) && !empty($_POST['thot'])){
$add_qry = mysqli_query($con,"INSERT INTO thought(thot_date,thot,date_added) values('".$_POST['thot_date']."','".$_POST['thot']."',now())");
  if($add_qry){
    echo "<script>alert('Thought Added!');</script>";
  }
  else{
    echo "<script>alert('Error adding Thought!');</script>";
  }
}

if(isset($_POST['add_noti']) && !empty($_POST['noti']) && !empty($_POST['noti_title'])){
$add_qry = mysqli_query($con,"INSERT INTO notice(noti_date,noti_title,noti,date_added,status) values('".$_POST['noti_date']."','".$_POST['noti_title']."','".$_POST['noti']."',now(),'1')");
  if($add_qry){
    echo "<script>alert('Notice Added!');</script>";
  }
  else{
    echo "<script>alert('Error adding Notice!');</script>";
  }
}

if(isset($_POST['add_event']) && !empty($_POST['noti']) && !empty($_POST['noti_title'])){
$add_qry = mysqli_query($con,"INSERT INTO event(noti_date,noti_title,noti,date_added,status,month,ses) values('".$_POST['noti_date']."','".$_POST['noti_title']."','".$_POST['noti']."',now(),'1','".$_POST['month']."','".$_SESSION['session']."')");
  if($add_qry){
    echo "<script>alert('Event Added!');</script>";
  }
  else{
    echo "<script>alert('Error adding Event!');</script>";
  }
}


if(isset($_POST['add_ptm']) && !empty($_POST['noti_date']) && !empty($_POST['day'])){
$add_qry = mysqli_query($con,"INSERT INTO  ptm(date,day,ses)values('".$_POST['noti_date']."','".$_POST['day']."','".$_SESSION['session']."')");
  if($add_qry){
    echo "<script>alert('PTM Added!');</script>";
  }
  else{
    echo "<script>alert('Error adding PTM!');</script>";
  }
}



if(isset($_POST['add_act']) && !empty($_POST['name']) && !empty($_POST['month']) && !empty($_POST['class'])){
$add_qry = mysqli_query($con,"INSERT INTO web_activity(name,class,month,des,ses,week)values('".$_POST['name']."','".$_POST['class']."','".$_POST['month']."','".$_POST['des']."','".$_SESSION['session']."','".$_POST['week']."')");
  if($add_qry){
    echo "<script>alert('Activities & Celebrations Added!');</script>";
  }
  else{
    echo "<script>alert('Error adding Event!');</script>";
  }
}

if(isset($_POST['add_exam']) && !empty($_POST['name']) && !empty($_POST['month']) && !empty($_POST['cate'])){
$add_qry = mysqli_query($con,"INSERT INTO web_exam(name,cate,month,des)values('".$_POST['name']."','".$_POST['cate']."','".$_POST['month']."','".$_POST['des']."')");
  if($add_qry){
    echo "<script>alert('Added Success!');</script>";
  }
  else{
    echo "<script>alert('Error!');</script>";
  }
}



if(isset($_POST['add_academic']) && !empty($_POST['noti']) && !empty($_POST['noti_title'])){
$add_qry = mysqli_query($con,"INSERT INTO academic(noti_date,noti_title,noti,date_added,status) values('".$_POST['noti_date']."','".$_POST['noti_title']."','".$_POST['noti']."',now(),'1')");
  if($add_qry){
    echo "<script>alert('Academic Circulars Added!');</script>";
  }
  else{
    echo "<script>alert('Error Adding Academic Circulars!');</script>";
  }
}


if(isset($_GET['stat']) && isset($_GET['id'])){
$update_qry = mysqli_query($con,"UPDATE notice SET status='".$_GET['stat']."' WHERE id='".$_GET['id']."' ");
  if($update_qry){
    echo "<script>alert('Status Update!');</script>";
  }
  else{
    echo "<script>alert('Error Updating Status!');</script>";
  }
}


if(isset($_GET['stat1']) && isset($_GET['id'])){
$update_qry = mysqli_query($con,"UPDATE event SET status='".$_GET['stat1']."' WHERE id='".$_GET['id']."' ");
  if($update_qry){
    echo "<script>alert('Status Update!');</script>";
  }
  else{
    echo "<script>alert('Error Updating Status!');</script>";
  }
}


if(isset($_GET['stat2']) && isset($_GET['id'])){
$update_qry = mysqli_query($con,"UPDATE academic SET status='".$_GET['stat2']."' WHERE id='".$_GET['id']."' ");
  if($update_qry){
    echo "<script>alert('Status Update!');</script>";
  }
  else{
    echo "<script>alert('Error Updating Status!');</script>";
  }
}
?>
<html>
<head>
<script language="javascript">
function download_report()
{
window.location='report.xls';
}
</script>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Student")) { 
        return false;
    }
    }
</script> 
 <?php
              if(!empty($_GET['did']))
              {
              $d=date("Y-m-d");
              $query=mysqli_query($con,"delete from web_activity where id='".$_GET['did']."' ");	 
              ?>
			  <script>alert('Delete Successfully');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."website"."&&pid=4";  ?>";
</script>   
			  <?php
			  }
			  ?>
			  
			  <?php
              if(!empty($_GET['dide']))
              {
              $d=date("Y-m-d");
              $query=mysqli_query($con,"delete from web_exam where id='".$_GET['dide']."' ");	 
              ?>
			  <script>alert('Delete Successfully');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."website"."&&pid=5";  ?>";
</script>   
			  <?php
			  }
			  ?>
<style>
.enquiry{ width:100%;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid; padding: 10px;}
.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}


.form-style-2-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 0px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type="email"]:focus,
input[type="email"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
  padding:10px;
  font-weight:bold;
  
  
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}

.row-fluid .span6 {
    width: 38%;
  float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.row-fluid .span4 {
    width: 30%;
  float:left;
    margin-top: 10px;
    margin-left: 5px;
}
.row-fluid .span2 {
    width: 30%;
  float:left;
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:12px;
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_info{float: right;margin-right: 5px;}
.dataTables_filter{ margin-top:-18px; padding:10px;width: 21%;display: inline;}
.dataTables_length{ margin-top:-10px; padding:10px;width: 20%; display: inline;float: left;}
.dataTables_paginate{margin-top:-18px; padding:10px;width: 30%; display: inline;}
.top{display: none!important;}
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>

jQuery(function($){
  $('#thot_date').datepicker({ dateFormat: 'dd-m-yy' });
    });
</script>
</head>

<body alink="#00FF66" link="#00CC00">
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/aeh.png" /><a href="./?pageid=app">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<?php /*?>  <a href="<?php echo $var."website"; ?>" style="color:red; padding:6px; font-size:18px">Thoughts</a> ||<?php */?>
<a href="<?php echo $var."website"."&&pid=1"; ?>" style="color:red; padding:6px; font-size:18px">Notices</a> || 
<a href="<?php echo $var."website"."&&pid=2"; ?>" style="color:red; padding:6px; font-size:18px">Events</a> || 
<a href="<?php echo $var."website"."&&pid=4"; ?>" style="color:red; padding:6px; font-size:18px">Activities & Celebrations</a> || 
<a href="<?php echo $var."website"."&&pid=5"; ?>" style="color:red; padding:6px; font-size:18px">Test & Exam</a> ||
<a href="<?php echo $var."website"."&&pid=6"; ?>" style="color:red; padding:6px; font-size:18px">PTM</a> 
<?php /*?><a href="<?php echo $var."website"."&&pid=3"; ?>" style="color:red; padding:6px; font-size:18px">Academic Circulars</a> ||
<a href="<?php echo $var."docoment_upload"; ?>" style="color:red; padding:6px; font-size:18px">Upload Documemnt</a> ||
<a href="<?php echo $var."upload_tcc"; ?>" style="color:red; padding:6px; font-size:18px">Upload TC</a> <?php */?>
</div>
<div class="col_4">
<div class="form-style-2-heading"><!-- Total Employees: <?php echo $maxrow['count(teacher_id)']; ?> -->
<table>
<tr>
<td>
<!-- <a href="javascript:void(0);" onClick="javascript:download_report();" style="font-size:16px;">Download Excel Report</a>
 -->
		</td>
		</tr>
		</table>
<?php 
if((!empty($_GET['pid'])) && ($_GET['pid']==1))
{
echo "<h1 style='color:#000;'>Notices</h1>";
}
else if((!empty($_GET['pid'])) && ($_GET['pid']==2))
{
echo "<h1 style='color:#000;'>Events</h1>";
}

else if((!empty($_GET['pid'])) && ($_GET['pid']==6))
{
echo "<h1 style='color:#000;'>PTM</h1>";
}

else if((!empty($_GET['pid'])) && ($_GET['pid']==3))
{
echo "<h1 style='color:#000;'>CBSC - Academic Circulars</h1>";
}
else if((!empty($_GET['pid'])) && ($_GET['pid']==4))
{
echo "<h1 style='color:#000;'>Activities & Celebrations</h1>";
}
else if((!empty($_GET['pid'])) && ($_GET['pid']==5))
{
echo "<h1 style='color:#000;'>Unit Test & Examinations</h1>";
}
else 
{
echo "<h1 style='color:#000;'>Thought of the Day</h1>";
} 
?>
</div>
<?php if((empty($_GET['pid']))){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add Thought of the day</h2>
<table>
  <form method="POST" action="">
  <tr><td>For Date:</td><td><input type="text" id="thot_date" name="thot_date" readonly required></td><td>Thought:</td><td><input type="text" style="width: 500px;" name="thot" required></td><td><input type="submit" name="add_thot" value="Add Thought"></td></tr>
  </form>
</table>
</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
				  <th>For Date</th>
                  <th>Thought</th>
                  <th>Added on Date</th>
              </tr>
			  </thead>
			  <tbody>
			  <?php
    $sql=mysqli_query($con,"select thot_date,thot,date_added from thought ORDER BY id DESC");
	
	$i=1;
	while($row=mysqli_fetch_array( $sql))
	{
		?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['thot_date'] ?></td>
                  <td><?php echo $row['thot'] ?></td>
                  <td><?php $newDate = date("d-m-Y", strtotime($row['date_added'])); echo $newDate; ?></td>
              </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
 <?php } ?>

<?php if((!empty($_GET['pid'])) && ($_GET['pid']==1)){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add Notice</h2>
<table>
  <form method="POST" action="">
  <tr><td>Date:</td><td><input type="text" id="thot_date" name="noti_date" readonly required></td><td>Title:</td>
    <td><input type="text" style="width: 400px;" name="noti_title" required></td></tr>
<tr><td>Notice:</td><td colspan="3"><textarea name="noti" rows="8" cols="76" required></textarea></td></tr>
<tr><td></td><td><input type="submit" name="add_noti" value="Add Notice"></td></tr>
</form>
</table>
</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Notice</th>
                  <th>Added on Date</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
        </thead>
        <tbody>
        <?php
    $sql=mysqli_query($con,"select * from notice ORDER BY id DESC");
  
  $i=1;
  while($row=mysqli_fetch_array( $sql))
  {
    ?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['noti_date']; ?></td>
                  <td><?php echo $row['noti_title']; ?></td>
                  <td><?php echo $row['noti']; ?></td>
                  <td><?php $newDate = date("d-m-Y", strtotime($row['date_added'])); echo $newDate; ?></td>
                  <td><?php if($row['status']=='1'){$stat = "<b style='color:green;'>Active</b>";}else{$stat = "<b style='color:red;'>Inactive</b>";} echo $stat; ?></td>
                  <td><?php if($row['status']=='1'){$stat = "<button style='background-color:green;color:white;padding:8px;'><a style='color:#fff;text-decoration:none;' href='".$var.'website'.'&&pid=1&&stat=0&&id='.$row['id']."'>Inactivate</a></button>";}else{$stat = "<button style='background-color:red;color:white;padding:8px;'><a style='color:#fff;text-decoration:none;' href='".$var.'website'.'&&pid=1&&stat=1&&id='.$row['id']."'>Activate</a></button>";} echo $stat; ?></td>
              </tr>
              
            
    <?php
   $i++;
  }
  ?>
          </tbody>
          </table>
 <?php } ?>
 
 <?php if((!empty($_GET['pid'])) && ($_GET['pid']==2)){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add Events</h2>
<table>
<form method="POST" action="">
<tr><td>Date:</td>
<td><input type="text" id="thot_date" name="noti_date" readonly required></td>
<td>Title:</td> 
<td>
<input type="text" style="width:200px;" name="noti_title" required>
</td>
<td>Month:</td> 
<td>
<select name="month" class="select" required>
<option value="">Select Month</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
</select>
</td>
</tr>
<tr><td>Events :</td>
<td colspan="5"><textarea name="noti" rows="8" cols="76" required></textarea></td></tr>
<tr><td></td><td><input type="submit" name="add_event" value="Add Events"></td></tr>
</form>
</table>
</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Events</th>
                  <th>Added on Date</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
        </thead>
        <tbody>
        <?php
    $sql=mysqli_query($con,"select * from event where ses='".$_SESSION["session"]."' ORDER BY id DESC");
  
  $i=1;
  while($row=mysqli_fetch_array( $sql))
  {
    ?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['noti_date']; ?></td>
                  <td><?php echo $row['noti_title']; ?></td>
                  <td><?php echo $row['noti']; ?></td>
                  <td><?php $newDate = date("d-m-Y", strtotime($row['date_added'])); echo $newDate; ?></td>
                  <td><?php if($row['status']=='1'){$stat1 = "<b style='color:green;'>Active</b>";}else{$stat1 = "<b style='color:red;'>Inactive</b>";} echo $stat1; ?></td>
                  <td><?php if($row['status']=='1'){$stat1 = "<button style='background-color:green;color:white;padding:8px;'><a style='color:#fff;text-decoration:none;' href='".$var.'website'.'&&pid=2&&stat1=0&&id='.$row['id']."'>Inactivate</a></button>";}else{$stat1 = "<button style='background-color:red;color:white;padding:8px;'><a style='color:#fff;text-decoration:none;' href='".$var.'website'.'&&pid=2&&stat1=1&&id='.$row['id']."'>Activate</a></button>";} echo $stat1; ?></td>
              </tr>
              
            
    <?php
   $i++;
  }
  ?>
          </tbody>
          </table>
 <?php } ?>
 
 
 
  <?php if((!empty($_GET['pid'])) && ($_GET['pid']==6)){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add PTM</h2>
<table>
<form method="POST" action="">
<tr><td>Date:</td>
<td><input type="text" id="thot_date" name="noti_date" readonly required></td>
<td>Day:</td> 
<td>
<select name="day" class="select" required>
<option value="">Select Day</option>
<option value="Monday">Monday</option>
<option value="Tuesday">Tuesday</option>
<option value="Wednesday">Wednesday</option>
<option value="Thursday">Thursday</option>
<option value="Friday">Friday</option>
<option value="Saturday">Saturday</option>
<option value="Sunday">Sunday</option>

</select>
</td>
</tr>

<tr><td></td><td><input type="submit" name="add_ptm" value="Add PTM"></td></tr>
</form>
</table>
</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Date</th>
                  <th>Day</th>
                  <th>Class</th>
              
              </tr>
        </thead>
        <tbody>
        <?php
    $sql=mysqli_query($con,"select * from ptm where ses='".$_SESSION["session"]."' ORDER BY id DESC");
  
  $i=1;
  while($row=mysqli_fetch_array( $sql))
  {
    ?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['day']; ?></td>
                  <td><?php echo $row['class']; ?></td>
               
              </tr>
              
            
    <?php
   $i++;
  }
  ?>
          </tbody>
          </table>
 <?php } ?>


 <?php if((!empty($_GET['pid'])) && ($_GET['pid']==4)){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add Activities & Celebrations</h2>
<form method="POST" action="">
<table>
<tr>
<td>Title:</td> 
<td>
<input type="text" style="width:200px;" name="name" required>
</td>
<td>Class</td>
<td>
<select name="class" class="select" style="width:95px;" required>
   <option value="">Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
           while($rows=mysqli_fetch_array($res))
           {
           echo "<option>".$rows["class"]."</option>";
           }  
           ?>
           </select></td>

<td>Month:</td> 
<td>
<select name="month" class="select" required>
<option value="">Select Month</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
</select>
</td>
<td>Week:</td> 
<td>
<select name="week" class="select" required>
<option value="">Select Week</option>
<option value="First Week">First Week</option>
<option value="Second week">Second week</option>
<option value="Third Week">Third Week</option>
<option value="Forth Week">Forth Week</option>
<option value="No">No</option>

</select>
</td>
</tr>
<tr><td>Details :</td>
<td colspan="5"><textarea name="des" rows="8" cols="76" required></textarea></td></tr>
<tr><td></td><td><input type="submit" name="add_act" value="Add Activities"></td></tr>
</form>
</table>
</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Title</th>
                  <th>Class</th>
                  <th>Activities</th>
				  <th>Week</th>
                  <th>Details</th>
                  <th>Action</th>
              </tr>
        </thead>
        <tbody>
        <?php
    $sql=mysqli_query($con,"select * from web_activity where ses='".$_SESSION["session"]."' ORDER BY id DESC");
  
  $i=1;
  while($row=mysqli_fetch_array( $sql))
  {
    ?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['class']; ?></td>
                  <td><?php echo $row['month']; ?></td>
                  <td><?php echo $row['des']; ?></td>
				  <td><a href="<?php echo $var."website&did=".$row['id']; ?>" onClick="return confirmation();">Delete</a> </td>
                
              </tr>
              
            
    <?php
   $i++;
  }
  ?>
          </tbody>
          </table>
 <?php } ?>



 <?php if((!empty($_GET['pid'])) && ($_GET['pid']==5)){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add Unit Test & Examinations </h2>
<form method="POST" action="">
<table>
<tr>
<td>Exam Name</td> 
<td>
<input type="text" style="width:200px;" name="name" required>
</td>
<td>Category</td>
<td>
<select name="cate" class="select" style="width:95px;" required>
   <option value="">Category</option>
   <option value="Test">Test</option>
   <option value="Exam">Exam</option>
    </select>
 </td>

<td>Month:</td> 
<td>
<select name="month" class="select" required>
<option value="">Select Month</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
</select>
</td>
</tr>
<tr><td>Details :</td>
<td colspan="5"><textarea name="des" rows="8" cols="76" required></textarea></td></tr>
<tr><td></td><td><input type="submit" name="add_exam" value="Add Exam"></td></tr>
</table>
</form>

</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Month</th>
                  <th>Details</th>
                  <th>Action</th>
              </tr>
        </thead>
        <tbody>
        <?php
    $sql=mysqli_query($con,"select * from web_exam ORDER BY id DESC");
  
  $i=1;
  while($row=mysqli_fetch_array( $sql))
  {
    ?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['cate']; ?></td>
                  <td><?php echo $row['month']; ?></td>
                  <td><?php echo $row['des']; ?></td>
				  <td><a href="<?php echo $var."website&dide=".$row['id']; ?>" onClick="return confirmation();">Delete</a> </td>
                
              </tr>
              
            
    <?php
   $i++;
  }
  ?>
          </tbody>
          </table>
 <?php } ?>



 <?php if((!empty($_GET['pid'])) && ($_GET['pid']==3)){ ?>
<div style="padding: 20px;margin-bottom: 20px;border-bottom: 2px solid #ddd;background: #ece8e8;">
<h2 style="font-weight: bold;padding: 8px;">Add Academic Circulars</h2>
<table>
  <form method="POST" action="">
  <tr><td>Date:</td><td><input type="text" id="thot_date" name="noti_date" readonly required></td><td>Title:</td>
    <td><input type="text" style="width: 400px;" name="noti_title" required></td></tr>
<tr><td>Academic Circulars:</td><td colspan="3"><textarea name="noti" rows="8" cols="76" required></textarea></td></tr>
<tr><td></td><td><input type="submit" name="add_academic" value="Add Events"></td></tr>
</form>
</table>
</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; ">
              <thead style="background-color:#009933; color:#FFFFFF">
               <tr style="background-color:#009933;color:#FFFFFF">
                  <th>No.</th>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Academic Circulars</th>
                  <th>Added on Date</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
        </thead>
        <tbody>
        <?php
    $sql=mysqli_query($con,"select * from academic ORDER BY id DESC");
  
  $i=1;
  while($row=mysqli_fetch_array( $sql))
  {
    ?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['noti_date']; ?></td>
                  <td><?php echo $row['noti_title']; ?></td>
                  <td><?php echo $row['noti']; ?></td>
                  <td><?php $newDate = date("d-m-Y", strtotime($row['date_added'])); echo $newDate; ?></td>
                  <td><?php if($row['status']=='1'){$stat2 = "<b style='color:green;'>Active</b>";}else{$stat2 = "<b style='color:red;'>Inactive</b>";} echo $stat2; ?></td>
                 <td><?php if($row['status']=='1'){$stat2 = "<button style='background-color:green;color:white;padding:8px;'><a style='color:#fff;text-decoration:none;' href='".$var.'website'.'&&pid=3&&stat2=0&&id='.$row['id']."'>Inactivate</a></button>";}else{$stat2 = "<button style='background-color:red;color:white;padding:8px;'><a style='color:#fff;text-decoration:none;' href='".$var.'website'.'&&pid=3&&stat2=1&&id='.$row['id']."'>Activate</a></button>";} echo $stat2; ?></td>
              </tr>
              
            
    <?php
   $i++;
  }
  ?>
          </tbody>
          </table>
 <?php } ?>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js1/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js1/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js1/DT_bootstrap.js"></script>
   <script src="js1/dynamic-table.js"></script>