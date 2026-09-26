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
<div class="watermark" style="width:840px; height:1050px;padding: 0 20px 0 20px; margin-top:-7px; font-size:22px;">		
<div style="width:155px;float:left; height:130px;"><img src="tcp.png" style="margin-left:-10px;" /></div>
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
<span style="margin-top:10px; position:absolute; margin-left:-110px;">TC. No. : <b><?php echo $rowstud['tc1']; ?></b></span>
</div>
</div>

<br clear="all">
<br clear="all">


<div style="margin-left:10px; width:830px;margin-top:5px; color:#0033CC;">

<div style="float:left;width:185px;"  class="tc">This is to certify that</div>
<div style="float:left;width:642px; margin-left:3px; border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:0px;"><?php echo $rowstud['tc3']; ?></span>
</div>


<br clear="all">
<div style="float:left;width:185px;"  class="tc">Son/Daughter of Mr.</div>
<div style="float:left;width:642px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:0px;"><?php echo $rowstud['tc6']; ?></span>
</div>
<br clear="all">

<div style="float:left;width:85px;" class="tc">And Mrs. </div>
<div style="float:left;width:742px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
<span style="margin-left:0px;"><?php echo $rowstud['tc12']; ?></span>
</div>

<br clear="all">

<div style="float:left;width:135px;" class="tc">Caste/Category</div>
<div style="float:left;width:691px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
<span style="margin-left:5px;"><?php echo $rowstud['tc7']; ?></span>
</div>

<div style="float:left;width:65px;" class="tc">Gender</div>
<div style="float:left;width:762px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
<span style="margin-left:5px;"><?php echo $rowstud['tc19']; ?></span>
</div>



<br clear="all">
<div style="float:left;width:600px;" class="tc">Attended the Shining Public Higher Secondary School Raisen from </div>
<div style="float:left;width:227px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:0px;"><?php echo $rowstud['tc8']; ?></span>
</div>

<br clear="all">

<div style="float:left;width:20px;" class="tc">to</div>
<div style="float:left;width:264px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:0px;"><?php echo $rowstud['tc9']; ?></span>
</div>
<div style="float:left;width:216px;"  class="tc">and leaves the school on  </div>
<div style="float:left;width:323px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;"  class="tc">
	<span style="margin-left:5px;">
	<?php echo $rowstud['tc10']; ?>
	</span>
	</div>
<br clear="all">	
<div style="float:left;width:547px;"  class="tc">having paid all fees.  </div>

<br clear="all">

<div style="float:left;width:420px;"  class="tc">The date of birth according to school register is</div>
<div style="float:left;width:406px;margin-left:3px;border-bottom:2px #0033CC dotted;" class="tc">
<span style="margin-left:2px;font-weight: bold; color:#FF0000"><?php echo $rowstud['tc11']; ?> </span>
</div>
<br clear="all">

<div style="float:left;width:94px;margin-left:3px;" class="tc">(In words)</div> 
<div style="float:left;width:730px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
<span style="font-weight:bold; color:#FF0000;">
<?php $mydate = strtotime($rowstud['tc11']);
//echo date('jS F Y', $mydate); ?>&nbsp;


<?php $dob = date('d', strtotime($rowstud['tc11'])); 

$ya = date('Y', strtotime($rowstud['tc11'])); echo convert_digit_to_words($dob); ?>&nbsp;

<?php echo date('F', $mydate); ?>&nbsp;
<?php echo convert_digit_to_words($ya); ?>

</span>
</div>
<br clear="all">

<div style="float:left;width:512px;"  class="tc">The last Annual Examination <?php echo $rowstud['tc20'];?> by him/her was class</div>
<div style="float:left;width:315px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;"><?php echo $rowstud['tc13']; ?></span>	
	</div>
	<br clear="all">
	<div style="float:left;width:96px;"  class="tc">in the year</div>
	
	<div style="float:left;width:134px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;"><?php echo $rowstud['tc14']; ?></span>	
	</div>
	
	<div style="float:left;width:265px;"  class="tc">Student was admitted in class</div> 
<div style="float:left;width:329px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['tc15']; ?>
	</span>
	</div>
<br clear="all">


<div style="float:left;width:200px;"  class="tc">Student's conduct was</div> 
<div style="float:left;width:627px;margin-left:3px;border-bottom:2px #0033CC dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['tc16']; ?>
	</span>
	</div>

<br clear="all"><br clear="all"><br clear="all">
<div style="float:left;width:88px;"  class="tc">SSSM ID</div> 
<div style="float:left;width:700px;margin-left:3px;;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	: <?php echo $rowstud['tc17']; ?>
	</span>
	</div>
	
	<br clear="all"><br clear="all">
<div style="float:left;width:70px;"  class="tc">Date</div> 
<div style="float:left;width:757px;margin-left:3px;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	: <?php echo $rowstud['tc18']; ?>
	</span>
	</div>
	
	


</div>	
<br clear="all"><br clear="all">
	<br clear="all">
<br clear="all"><br clear="all">


<div style="float:left; height:30px; width:250px;">
<span style="margin-top:10px; position:absolute; margin-left:15px;color:#0033CC; font-weight:bold;"></span>
</div>

<div style="float:left; height:30px; width:250px;">
<span style="margin-top:10px; position:absolute; margin-left:80px; font-weight:bold;"></span>
</div>

<div style="float:left; height:30px;margin-left:450px; width:321px; ">
<span style="margin-top:10px; float:right; position:absolute; color:#0033CC; margin-left:65px;font-weight:bold;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Principal<br />Shining Public Hr. Sec. School<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raisen(M.P.)
</span>
</div>
</div>		
		<br clear="all"><br clear="all"><br clear="all">
	<div style="float:left;">
<img src="tcdd.png" style="margin-left:40px;" /></div>
		
</body>
</html>