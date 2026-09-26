<?php
session_start();
require_once("../db.php"); 
$var="https://smarterponline.com/shining/student/?pageid=";
 
if(!isset($_SESSION['userid']))
{
header("Location:../index.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style type="text/css">
.tb5 {
	border:1px solid #456879;
	border-radius:10px;
	height: 22px;
	width: 230px;
	background:#EFEFEF;
}
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
</style>
<style type="text/css">
span.customStyleSelectBox { font-size:14px; font-weight:bold; background-color:#f0dea4; color:#7c7c7c; padding:5px 7px; border:1px solid #e7dab0; -moz-border-radius: 5px; -webkit-border-radius: 5px;border-radius: 5px 5px; line-height: 11px; } span.customStyleSelectBox.changed { background-color: #f0dea4; } .customStyleSelectBoxInner { background:url(images/arrow.gif) no-repeat center right; }

body{
    font-family:Arial, Helvetica, sans-serif; 
    font-size:13px;
	background-color: #999999;
}
.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('info.png');
}
.success {
    color: #4F8A10;
    background-color:#FFD9FF;
    background-image:url('success.png');
}
.warning {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('warning.png');
	font-family:"Courier New", Courier, monospace
}
.error {
    color: #D8000C;
	background:#FFD9FF;
   background-image: url('error.png');
   border-radius:15px;
}
</style>
 <script type="text/javascript" src="datetimepicker.js"></script>
<script type="text/javascript">
function showdata(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
     location.reload();
    }
  }
xmlhttp.open("GET","getdata.php?q="+str,true);
xmlhttp.send();
}
function showdata1(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
     location.reload();
    }
  }
xmlhttp.open("GET","getdata.php?r="+str,true);
xmlhttp.send();
}

function showdata3(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    
    }
  }
   location.reload();
xmlhttp.open("GET","getdata.php?s="+str,true);
xmlhttp.send();
}

function showdata4(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    
    }
  }
   location.reload();
xmlhttp.open("GET","getdata.php?t="+str,true);
xmlhttp.send();
}

function showSection(str)
{

if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsection.php?q="+str,true);
xmlhttp.send();
}
</script>
<?php
require_once("meta.php");
?>
<body style="background-color:rgb(206, 203, 203);">
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<a href="index.php" style="color:#FFFFFF"><div class="logo">
		<img src="sn.png" />
		
		</div></a>
		
		
		<div class="logout">
        <div class="menu"><?php require_once("includes/menu.php"); ?></div>
		</div>
       
	</div>
    
</div>

<!-- End Header -->

<!-- Container -->

<?php
    if(isset($_GET["pageid"]))
	{
	$page=$_GET["pageid"];
	include $page.".php";
	}
	else
	{
    include "home.php";
	}
   ?>
<!-- End Container -->

<!-- Footer -->

<?php
require_once("includes/footer.php");
?>

<!-- End Footer -->
	
</body>
</html>
