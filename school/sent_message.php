<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<style>
.cla
{
	width:40px;
	height:30px;
	margin:7px;
	text-align:center;
	vertical-align:middle;
	padding:7px;
	background-image:url(images/butt.png);
	background-position:center center;
	color:#000;
	line-height:2;
	font-weight:bold;
	float:left;
	overflow:hidden;
	cursor:pointer;
	border-radius:10px;
}
.cla1
{
	width:30px;
	height:30px;
	margin:7px;
	text-align:center;
	vertical-align:middle;
	padding:7px;
	background-image:url(images/butt1.png);
	background-position:center center;
	color:#FFF;
	line-height:2;
	font-weight:bold;
	float:left;
	overflow:hidden;
	cursor:pointer;
	border-radius:10px;
}
.sms_l{width:135px;margin-top:7px; height:20px;margin-left:20px; background-color:#CC0000; border:4px #FFFFFF solid;}
.sms_l:hover{ background-color:#009933;}
.sms_l a{text-decoration:none; margin-top:2.5px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_l a:hover{font-size:15px; font-weight:bold;}
.sms_ll{width:135px;margin-top:10px; height:22px;margin-left:5px; background-color:#009933; border:4px #FFFFFF solid;}
.sms_ll:hover{ background-color:#CC0000;}
.sms_ll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_lll{width:135px;margin-top:10px; height:22px;margin-left:5px; background-color:#CC0000; border:4px #FFFFFF solid;}
.sms_lll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
</style>

<style>
body{ background-color:#CCCCCC}
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

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
    margin-bottom: 20px;
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
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
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
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>

<div class="full_div" style="background-color:#CCCCCC">
<br clear="all" />
<div class="left_sect"><img src="images/short-code-sms.png" /><a href="./?pageid=home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/Sms-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Communication b/w School & Parents</h2>
</div>
<div class="col_4" style="margin-top:0px;" >
				<!-- Box -->
				
				 <?php /*?> <div style="margin-left:45px;height:30px;margin-top:15px;">
				 <a href="<?php echo $var."allstda" ?>" style="float:left;margin-left:60px; border-radius:5px;background-color:#cc0000;color:#FFFFFF;font-size:15px;padding:10px;text-decoration:none">Prenursery To UKG</a>
				   
				    <a href="<?php echo $var."allstdb" ?>" style="float:left;margin-left:20px; border-radius:5px;background-color:#0b354b;color:#FFFFFF;font-size:15px;padding:10px;text-decoration:none">1st To 5th</a>
				   
				   
				    <a href="<?php echo $var."allstdc" ?>" style="float:left;margin-left:20px; border-radius:5px;background-color:#339933;color:#FFFFFF;font-size:15px;padding:10px;text-decoration:none">6th To 10th</a>
					 </div><?php */?>
					 
				  
				   <br clear="all" />
				   <div style="margin-left:50px;">
				
                   <div style="width:1030px; height:270px;  margin-top:20px;">
				   <div style="width:200px; float:left;border-radius:10px; height:270px; background-color:#339966;">
				   <h1 style="background-color: ; margin-left:20px; margin-top:10px; color:#fff; padding:px;">Categories</h1><br />
				   <hr />
				 
				   <div class="sms_l">
				   <a href="./?pageid=msgd&divid=3">Sent </a>
				   </div>
				  
				  <div class="sms_l">
				  <a href="./?pageid=message_inbox">Inbox
                  <span style="color:#FFF">&nbsp;</a>
				  </div>
	              	
					
				  <?php /*?> <div class="sms_l">
		            <a href="http://www.smarteducations.in/hindi.html" target="_blank">Hindi SMS</a>
				  </div><?php */?>
				   
				  <div class="sms_l">
				  <a href="./?pageid=allstd">All Student1</a>
				  </div>	
				   
				    <?php /*?>
				   <div class="sms_l">
				   <a href="./?pageid=homeworkadd">Homework</a></div>	<?php */?>
				   
				   			 
				   </div>
				   
				   
				  
				 
				  <div style="width:800px; border-radius:10px; height:270px; background-color:#339966; margin-left:20px; float:left">
				  <h1 style="background-color: ; margin-left:20px; margin-top:10px; color:#fff; padding:px;">Dashboard</h1><br />
				  <hr />
				  <table width="300px" style="margin:10px 0px 0px 24px; font-family:Verdana, Geneva, sans-serif; font-size:16px; color: #fff; font-weight:500;">
 <tr>
   <td>School Name</td>
   <td><?php echo $_SESSION['uid']; ?></td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
   <td>Session</td>
   <td><?php echo $_SESSION['session']; ?></td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
   <td>Total Teacher</td>
   <td>
   <?php
   $query1=mysqli_query($con,"select count(teacher_id) from teacher where teacher_session='".$_SESSION['session']."' ");
   $row1=mysqli_fetch_array($query1);
   echo $row1['count(teacher_id)'];
   ?>
</td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
   <td>Total Student</td>
   <td>
   <?php
   $query2=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."' and status='0'");
   $row1=mysqli_fetch_array($query2);
   echo $row1['count(student_id)'];
   ?>
   </td>
   </tr>

  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
   <td>Sent Message</td>
 <td>
 <?php 
 $query3=mysqli_query($con,"select count(sender_user) from sendmsg where sender_user='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
 $row3=mysqli_fetch_array($query3);
 echo $row3['count(sender_user)'];
 ?>
 </td>
 </tr>
 </table>        
 </div>
				 </div>
				 <div style="width:1015px; height:auto;  margin-top:20px;border:4px #CC0000 solid;">
				 <div style="width:975px; height:380px; border:20px #339966 solid; ">
				 <div style="width:967px; height:372px; border:4px #CC0000 solid; ">
				  <?php
$res=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."'");

while($rows=mysqli_fetch_array($res))
{
$c = 'V A';
if($rows["class"]>$c)
{
?>
<label style="width:auto" onclick="window.location='./?pageid=classwise&class=<?php echo $rows["class"]; ?>'" class='cla'>
<?php echo $rows["class"]; ?>
</label>
<?php
	}
	else
	{
?>
<label style="border:#FF0000 0px solid; width:auto"  onclick="window.location='./?pageid=classwise&class=<?php echo $rows["class"]; ?>'" class='cla1'>
<?php echo $rows["class"]; ?>
</label>
<?php
	}
}
?>  
<label style="width:auto" onclick="window.location='./?pageid=multiclasswise'" class='cla'>
Send SMS by Multiple Class
</label>	    
				  
				  </div>
				  </div>
				  </div>
                 </div>
				<!-- End Box -->
				<br clear="all" />
			</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  