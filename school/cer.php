<?php 
require_once("../db.php");
require_once("wordss.php");
$id = $_GET['id'];
$reg=mysqli_query($con,"select * from teacher where id='".$_GET['tid']."'");
$rowstud=mysqli_fetch_array($reg);
if($rowstud['l_class']==1)
{
$wd='First';
}
if($rowstud['l_class']==2)
{
$wd='Second';
}
if($rowstud['l_class']==3)
{
$wd='Third';
}
if($rowstud['l_class']==4)
{
$wd='Fourth';
}
if($rowstud['l_class']==5)
{
$wd='Fifth';
}
if($rowstud['l_class']==6)
{
$wd='Sixth';
}
if($rowstud['l_class']==7)
{
$wd='Seventh';
}
if($rowstud['l_class']==8)
{
$wd='Eighth';
}
if($rowstud['l_class']==9)
{
$wd='Ninth';
}
if($rowstud['l_class']==10)
{
$wd='Tenth';
}
if($rowstud['l_class']==11)
{
$wd='Eleventh';
}
if($rowstud['l_class']==12)
{
$wd='Twelfth';
}
if($rowstud['figher']==1)
{
$wdd='First';
}
if($rowstud['figher']==2)
{
$wdd='Second';
}
if($rowstud['figher']==3)
{
$wdd='Third';
}
if($rowstud['figher']==4)
{
$wdd='Fourth';
}
if($rowstud['figher']==5)
{
$wdd='Fifth';
}
if($rowstud['figher']==6)
{
$wdd='Sixth';
}
if($rowstud['figher']==7)
{
$wdd='Seventh';
}
if($rowstud['figher']==8)
{
$wdd='Eighth';
}
if($rowstud['figher']==9)
{
$wdd='Ninth';
}
if($rowstud['figher']==10)
{
$wdd='Tenth';
}
if($rowstud['figher']==11)
{
$wdd='Eleventh';
}
if($rowstud['figher']==12)
{
$wdd='Twelfth';
}
?>
<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
<html>
<head>
<style type="text/css">
#dialog .ui-widget {
			font-family: inherit;
		}
		
		.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
			color: #ffffff;
		}
		
		.ui-widget-header {
			font-size:1em;
			font-weight: bold;
			font-family: Arial, Helvetica, sans-serif;
			background: #5c9ccc;
			border-color: #4297d7;
			border-width: 1px;
		}
			
		.ui-dialog-title {
			line-height: 1em;
			color: #ffffff;
			font-weight: bold;
		}
		
		.ui-widget-content {
			font-size:1em;
			font-weight: bold;
			font-family: Arial, Helvetica, sans-serif;
			background: #fcfdfd;
			border-color: #a6c9e2;
			border-width: 1px;
		}
		
		/* tab panel bounding box */ 
		.ui-dialog-content {
			font-family: Arial, Helvetica, sans-serif;
			color: #222222;
			font-size:.8em;
			padding: 10px;
		} 
		
		.ui-dialog-buttonpane {
			font-size:.8em;
		}
		.table {
	border-collapse: collapse;
	border-spacing: 0;
}
.tc{ margin-top:11px;}
.watermark {
  width: 300px;
  height: 100px;
  display: block;
  position: relative;
}

.watermark::after {
  content: "";
 background:url(3000.png);
 background-repeat: no-repeat;
  opacity: 0.2;
  top: 35%;
  left: 16%;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
</style>
</head>
<body>
<div class="watermark" style="width:1050px; height:1400px;margin-top:-7px; font-size:30px; border:6px #000 solid;">		
<div style="width:100%; margin-top:5px;">
<img src="tcer.png" style="margin-left:62px;">
</div>
<div style="width:100%; margin-top:5px; background-color:#000000; height:3px;"></div>
<br clear="all">
<div style="width:100%; margin-top:50px;">
<center><span style="font-weight:bold; color:#0066CC">-- Experience Certificate --</span></center>
</div>
<br clear="all">
<div style="width:100%;">
<div style="float:left;width:305px;"  class="tc"><span style="margin-left:85px;">It is to certify that</span></div>
<div style="float:left;width:740px; margin-left:3px;" class="tc">
	<span style="margin-left:0px;"><b><?php echo $rowstud['teacher_name']; ?></b> &nbsp;&nbsp;S/O&nbsp;&nbsp;<b><?php echo $rowstud['father_name']; ?></b></span>
</div>
</div>
<br clear="all">
<div style="width:100%; margin-top:5px;">
 &nbsp;&nbsp;worked in the Shining Public Higher Secondary School, Raisen from&nbsp;&nbsp;<b><?php echo $rowstud['teacher_doj']; ?></b>
</div>

<div style="width:100%; margin-top:5px;">
&nbsp;&nbsp;to&nbsp;&nbsp;<b><?php echo $rowstud['sch_leaving']; ?></b> as a teacher. During this period his/her work and conduct was good.
</div>

<div style="width:100%; margin-top:5px;">
&nbsp;&nbsp;I wish him/her success in future life.
</div>
<br clear="all">
<div style="width:100%; margin-top:250px;">
<span style="margin-top:10px; float:right; position:absolute; color:#000; margin-left:560px;font-weight:bold;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen(M.P.)
</span>
</div>


</div>
</body>
</html>