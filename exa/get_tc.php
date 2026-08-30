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
<?php 
require_once("../db.php");
require_once("wordss.php");
$id = $_GET['id'];

$reg=mysqli_query($con,"select * from tc where sid='".$_GET['id']."'");
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

<body>
<div class="watermark" style="width:840px; height:1050px;padding: 0 20px 0 20px; margin-top:-7px;">		
<div style="width:155px;float:left; height:100px;">
<img src="tch.png" style="margin-left:40px;" /></div>

<br clear="all">
<br clear="all">
<div style="width:840px; height:2px;background-color:#000000"></div>	
<div style="width:840px; height:2px;background-color:#000000; margin-top:1px;"></div>
<br clear="all">
<div style="float:left; height:30px; width:250px; ">
</div>
<div style="float:left; height:27px; margin-left:41px; width:250px;  border:2px #000000 solid;">
<span style="font-size:24px;margin-left:20px;font-weight:bold">Transfer Certificate</span>
</div>
<div style="float:left; height:30px;margin-left:45px; width:250px; ">
</div>

<br clear="all">

<div style="float:left; height:30px; width:250px;">
<span style="margin-top:10px; position:absolute">Sl. No. 
<b style=""><?php echo $rowstud['slno']; ?></b></span>
</div>
<div style="float:right; height:30px;">
<span style="margin-top:10px; position:absolute; margin-left:-160px;">Admission No. <b><?php echo $rowstud['addno']; ?></b></span>
</div>
<br clear="all">
<br clear="all">

<div style="margin-left:10px; width:830px;margin-top:5px;">
<div style="float:left;width:161px;"  class="tc">1. &nbsp;Name of the Student :</div>
<div style="float:left;width:666px; margin-left:3px; border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:54px;"><?php echo $rowstud['sname']; ?></span>
</div>
<br clear="all">

<div style="float:left;width:133px;"  class="tc">2. &nbsp;Mother's Name :</div>
<div style="float:left;width:694px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:82px;"><?php echo $rowstud['mname']; ?></span>
</div>


<br clear="all">
<div style="float:left;width:194px;"  class="tc">3. &nbsp;Father's/Guardian's Name:</div>
<div style="float:left;width:633px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:21px;"><?php echo $rowstud['fname']; ?></span>
</div>

<br clear="all">
<div style="float:left;width:106px; "  class="tc">4. &nbsp;Nationality :</div>
<div style="float:left;width:721px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:109px;"><?php echo $rowstud['nat']; ?></span>
</div>

<br clear="all">
<div style="float:left;width:378px;"  class="tc">5. &nbspCategory student belongs to (SC/ST/OBC/Gen/EWS) :</div>
<div style="float:left;width:449px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;"  class="tc">
	<span style="margin-left:5px;">
	<?php echo $rowstud['caste']; ?>
	</span>
	</div>


<br clear="all">
<div style="float:left;width:302px;"  class="tc">6. &nbsp;Date of Admission in the school with class :</div>
<div style="float:left;width:525px;margin-left:3px;border-bottom:2px #000000 dotted;" class="tc">
<span style="margin-left:2px;font-weight: bold;"><?php $doa =  date('d-m-Y', strtotime($rowstud['doa_class'])); echo $doa; ?>, </span>
</div>
<br clear="all">
<?php /*?><div style="float:left;width:14px;" class="tc">&nbsp;</div>
<div style="float:left;width:290px;margin-left:3px;" class="tc">&nbsp;Date of admission in numbers and in words:</div> 
<div style="float:left;width:520px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;text-transform: uppercase;" class="tc">
<span style="margin-left:0px;font-weight: bold;">
	<?php //echo $rowstud['sub2']; ?>
	
	<?php $mydate = strtotime($doa);
//echo date('jS F Y', $mydate); ?>&nbsp;


<?php $dob = date('d', strtotime($doa)); 

$ya = date('Y', strtotime($doa)); echo convert_digit_to_words($dob); ?>&nbsp;

<?php echo date('F', $mydate); ?>&nbsp;
<?php echo convert_digit_to_words($ya); ?>
	</span>	
</div>	
	
<br clear="all"><?php */?>

<div style="float:left;width:370px;"  class="tc">7. &nbsp;Student admitted in the school on the basis of TC/BC :</div>
<div style="float:left;width:457px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;"><?php echo $rowstud['sub2']; ?></span>	
	</div>
<br clear="all">

<div style="float:left;width:424px;"  class="tc">8. &nbsp;Date of birth according to the admission Register (In Figures) :</div>
<div style="float:left;width:403px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;"><?php $doa =  date('d-m-Y', strtotime($rowstud['dob'])); echo $doa; ?></span>	
	</div>
<br clear="all">




<div style="float:left;width:14px;" class="tc">&nbsp;</div>
<div style="float:left;width:80px;margin-left:3px;" class="tc">&nbsp;(In words): </div> 
<div style="float:left;width:730px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;text-transform: uppercase;" class="tc">
<span style="font-weight:bold;">
<?php $mydate = strtotime($rowstud['dob']);
//echo date('jS F Y', $mydate); ?>&nbsp;


<?php $dob = date('d', strtotime($rowstud['dob'])); 

$ya = date('Y', strtotime($rowstud['dob'])); echo convert_digit_to_words($dob); ?>&nbsp;

<?php echo date('F', $mydate); ?>&nbsp;
<?php echo convert_digit_to_words($ya); ?>

</span>
</div>

<br clear="all">
<div style="float:left;width:130px;"  class="tc">9. &nbsp;Subject studied :</div> 
<div style="float:left;width:697px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['sub1']; ?>
	</span>
	</div>



<br clear="all">
<div style="float:left;width:345px;"  class="tc">10.Class in which the student last studied (In words) :</div>
<div style="float:left;width:482px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:4px;">
	<?php echo $rowstud['l_class']; ?>
	</span>
	</div>
	
	
	<br clear="all">
<div style="float:left;width:263px;"  class="tc">11.Whether the student is failed/ passed :</div>
<div style="float:left;width:564px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['twice']; ?>
	</span>
	</div>

<br clear="all">

<div style="float:left;width:390px;"  class="tc">12.School/Board Annual Examination last taken with result :</div>
<div style="float:left;width:437px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:4px;">
	<?php echo $rowstud['s_result']; ?>
	</span>
	</div>




<br clear="all">






<div style="float:left;width:390px;"  class="tc">13.Whether qualified for promotion to the next higher class :</div>
<div style="float:left;width:437px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;text-transform: uppercase;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['h_class']; ?>
	</span>
	</div>

<br clear="all">


<div style="float:left;width:300px;"  class="tc">14.Date of application for Transfer certificate :</div>
<div style="float:left;width:527px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['d_app']; ?>
	</span>	
	</div>
	<br clear="all">



<div style="float:left;width:230px;"  class="tc">15.Reasons for leaving the school :</div>
<div style="float:left;width:597;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['struck']; ?>
	</span>
	</div>
	
	
<br clear="all">

<div style="float:left;width:222px;"  class="tc">16.Total number of working days :</div>
<div style="float:left;width:605px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['w_day']; ?>
	</span>
	</div>
<br clear="all">
<div style="float:left;width:358px;" class="tc">17.Total number of working days, the student attended :</div>
<div style="float:left;width:469;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['p_day']; ?>
	</span>
	</div>
<br clear="all">





<div style="float:left;width:140px;"  class="tc">18.General Conduct :</div>
<div style="float:left;width:687px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['gmic']; ?>
	</span>
	</div>
<br clear="all">

<div style="float:left;width:154px;"  class="tc">19.Any other remarks :</div>
<div style="float:left;width:673px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['remark']; ?>
	</span>
	</div>
<br clear="all">

	
	<div style="float:left;width:203px;"  class="tc">20.Date of issue of certificate :</div>
<div style="float:left;width:624px;margin-left:3px;border-bottom:2px #000000 dotted;font-weight: bold;" class="tc">
	<span style="margin-left:2px;">
	<?php echo $rowstud['d_issue']; ?>
	</span>
	</div>
<br clear="all">
	
	

</div>	
<br clear="all"><br clear="all">
	<br clear="all">
<br clear="all"><br clear="all">


<div style="float:left; height:30px; width:250px;">
<span style="margin-top:10px; position:absolute; margin-left:15px; font-weight:bold;">(Prepared by)</span>
</div>

<div style="float:left; height:30px; width:250px;">
<span style="margin-top:10px; position:absolute; margin-left:80px; font-weight:bold;">(Checked by)</span>
</div>

<div style="float:left; height:30px;margin-left:20px; width:250px; ">
<span style="margin-top:10px; float:right; position:absolute; margin-left:120px;font-weight:bold;">(Signature of Principal <br>with school stamp)</span>
</div>
</div>		
		<br clear="all"><br clear="all"><br clear="all">
	<div style="float:left;">
<img src="tcdd.png" style="margin-left:40px;" /></div>
		
</body>
</html>