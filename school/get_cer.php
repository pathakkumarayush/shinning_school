<?php 
require_once("../db.php");
require_once("wordss.php");
$id = $_GET['id'];
$reg=mysqli_query($con,"select * from tc where tc4='".$_GET['id']."'");
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
<div class="watermark" style="width:1000px; height:1050px;padding: 0 20px 0 20px; margin-top:-7px; font-size:22px;">		
<div style="width:155px;float:left; height:130px;"><img src="cep.png" style="margin-left:-10px;" /></div>
<br clear="all">
<br clear="all">
<br clear="all">
<br clear="all">
<br clear="all">

<div style="width:100%; color:#0033CC;">
<div style="float:left; height:30px; width:250px;">
<span style="margin-top:10px; position:absolute; margin-left:15px;">Adm. No. : <b style=""><?php echo $rowstud['tc2']; ?></b></span>
</div>
<div style="float:right; height:30px;">
<span style="margin-top:10px; position:absolute; margin-left:-110px;">S.N. : <b><?php echo $rowstud['tc1']; ?></b></span>
</div>
</div>

<br clear="all">
<br clear="all">


<div style="margin-left:10px; width:1000px;margin-top:5px; color:#0033CC;">

<div style="float:left;width:185px;"  class="tc">This is to certify that</div>
<div style="float:left;width:625px; margin-left:3px;font-weight: bold;" class="tc">
	<span style="margin-left:0px;"><?php echo $rowstud['tc3']; ?></span>
</div>


<br clear="all">
<div style="float:left;width:180px;"  class="tc">Son/daughter of Mr.</div>
<div style="float:left;width:790px;margin-left:3px;" class="tc">
	<span style="margin-left:0px;font-weight: bold;"><?php echo $rowstud['tc6']; ?> </span> was a student of this school.
</div>

<br clear="all">
<div style="float:left;width:140px;"  class="tc">Student bears a</div> 
<div style="float:left;width:672px;margin-left:3px;" class="tc">
	<span style="margin-left:2px; font-weight:bold">
	<?php echo $rowstud['tc16']; ?> 
	</span> character
	</div>




</div>	
<br clear="all"><br clear="all">
	<br clear="all">
<br clear="all"><br clear="all">



<div style="float:left; height:30px;margin-left:20px; width:250px; ">
<span style="margin-top:10px; position:absolute; float:left; color:#0033CC;margin-left:0px; font-weight:bold;">Date : <?php echo $rowstud['tc18']; ?></span>

<span style="margin-top:10px; float:right; position:absolute; color:#0033CC; margin-left:460px;font-weight:bold;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen(M.P.)
</span>
</div>
</div>		
		<br clear="all"><br clear="all"><br clear="all">
	<div style="float:left;">
<img src="tcdd.png" style="margin-left:40px;" /></div>
		
</body>
</html>