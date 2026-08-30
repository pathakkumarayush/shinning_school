<?php 
session_start(); 
require_once("../db.php");
require_once("wordss.php");
 ?>
<html>
<head>
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
  display: block;
  position: relative;
}
.watermark::after {
 content: "";
 background:url(wm.png);
 background-repeat: no-repeat;
  opacity: 0.2;
  top: 1%;
  left: 33%;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}
</style>
</head>
<?php 
$reg=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' order by id desc limit 1");
$rowstud=mysqli_fetch_array($reg);
?>
<body>
<div style="width:960px; height: auto; ">		
<table style="width:100%;" border="0" cellpadding="0" cellspacing="0">
<tr style="font-size:20px;">
<td style="width:320px;" align="left">Reg. No. : 4254</td>
<td style="width:320px;" align="center">Since : 1996</td>
<td style="width:320px;" align="right">School Code : 652075</td>
</tr>
<tr style="font-size:58px;">
<td colspan="3" align="center">SHINING PUBLIC HR. SEC. SCHOOL</td>
</tr>
<tr style="font-size:36px;">
<td colspan="3" align="center">RAISEN(M.P.)</td>
</tr>
<tr style="font-size:20px;">
<td style="width:320px;" align="left">&nbsp;</td>
<td style="width:320px;" align="center"><img src="ADM.PNG" style="width:120PX; height:120PX; "></td>
<td style="width:320px;" align="right"><img src="" style="width:100PX; height:120PX;margin-right:30PX;"></td>
</tr>

<tr style="font-size:38px;">
<td colspan="3" align="center"><U>ADMISSION FORM</U></td>
</tr>
</table>
<br clear="all">
<table style="width:100%; margin-top:10px; font-size:24px;" border="0" cellpadding="0" cellspacing="0" class="trt">
<tr><td style="width:180px;">Student's Name </td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['student_name']; ?></td></tr>
<tr><td style="width:180px;">Father's Name </td><td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['student_fname']; ?></td></tr>
<tr><td style="width:180px;">Mother's Name </td><td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['m_name']; ?></td></tr>
<tr><td style="width:180px;">Aadhar No. </td><td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['student_rollno']; ?></td></tr>

<tr>
<td style="width:180px;">SSSMID </td><td style="width:220px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['religion']; ?>&nbsp;</td>
<td style="width:100px;">&nbsp;&nbsp;&nbsp;&nbsp;FMID</td><td style="border-bottom:2px #000000 dotted;"><?php echo $rowstud['family_id']; ?>&nbsp;</td>
</tr>

<tr>
<td style="width:180px;">Account No.</td><td style="width:220px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['mother_tong']; ?>&nbsp;</td>
<td style="width:100px;">&nbsp;&nbsp;&nbsp;&nbsp;Bank</td><td style="border-bottom:2px #000000 dotted;"><?php echo $rowstud['bank']; ?>&nbsp;</td>
</tr>

<tr>
<td style="width:180px;">Mobile</td><td style="width:220px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['student_contactno']; ?>&nbsp;</td>
<td style="width:175px;">&nbsp;&nbsp;&nbsp;&nbsp;Alt Mobile No.</td><td style="border-bottom:2px #000000 dotted;"><?php echo $rowstud['f_tell_no_off']; ?>&nbsp;</td>
</tr>

<tr><td style="width:180px;">Date Of Birth </td><td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['student_dob']; ?></td></tr>

<tr>
<td style="width:180px;">DOB In Words</td>
<td style="border-bottom:2px #000000 dotted;" colspan="3">



<?php $mydate = strtotime($rowstud['student_dob']);
//echo date('jS F Y', $mydate); ?>&nbsp;


<?php $dob = date('d', strtotime($rowstud['student_dob'])); 

$ya = date('Y', strtotime($rowstud['student_dob'])); echo convert_digit_to_words($dob); ?>&nbsp;

<?php echo date('F', $mydate); ?>&nbsp;
<?php echo convert_digit_to_words($ya); ?>



&nbsp;</td>
</tr>

<tr>
<td style="width:180px;">Religion</td><td style="width:220px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['mot']; ?>&nbsp;</td>
<td style="width:180px;">&nbsp;&nbsp;&nbsp;&nbsp;Category,Caste</td><td style="border-bottom:2px #000000 dotted;"><?php echo $rowstud['caste']; ?>, <?php echo $rowstud['hname']; ?>&nbsp;</td>
</tr>

<tr><td style="width:180px;">Address</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['student_address']; ?>&nbsp;</td></tr>

<tr><td style="width:180px;">Last School attended (if any)</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"> <?php echo $rowstud['pschool']; ?>&nbsp;</td></tr>

<tr><td style="width:180px;">Admission <br>sought for class</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['class']; ?></td></tr>

<tr><td style="width:180px;">Subject (For XI and XII class)</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;">&nbsp;</td></tr>


<tr><td style="width:180px;">Qualification <br>Of Father</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['f_quali']; ?>&nbsp;</td></tr>

<tr><td style="width:180px;">Qualification <br>Of Mother</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['m_quali']; ?>&nbsp;</td></tr>

<tr><td style="width:180px;">Father/Guardian's<br> Profession</td> <td colspan="3" style="width:780px;border-bottom:2px #000000 dotted;"><?php echo $rowstud['f_prof']; ?>&nbsp;</td></tr>

<tr><td style="width:180px;">&nbsp;</td> <td colspan="3" align="right">&nbsp;</td></tr>
<tr><td style="width:180px;">&nbsp;</td> <td colspan="3" align="right">&nbsp;</td></tr>

<tr><td style="width:180px;"></td> <td colspan="3" align="right"><span style="margin-right:50px; font-weight:bold;">Father/Guardian's Signature</span></td></tr>

<tr><td colspan="4" style=" border-bottom:2px #000000 solid; line-height:2PX;">&nbsp;</td></tr>

<tr><td colspan="4" align="center" style="font-weight:bold;font-size:22px;">FOR OFFICE USE ONLY</td></tr>

<tr><td colspan="2"><span style="margin-left:50px;">Date of Admission : <?php echo $rowstud['student_doj']; ?></span></td>
 <td colspan="2" align="right"><span style="margin-right:50px;">Scholar No. : <?php echo $rowstud['student_scholar']; ?>&nbsp;</span></td></tr>
 
 
 <tr><td style="width:180px;">&nbsp;</td> <td colspan="3" align="right">&nbsp;</td></tr>



<tr>
<td style="width:180px;"></td> <td colspan="3" align="right"><span style="margin-right:50px; font-weight:bold; font-size:22px;">HEAD MASTER'S/PRINCIPAL'S SIGNATURE</span></td></tr>

<tr><td colspan="4" style=" border-bottom:2px #000000 solid;">&nbsp;</td></tr>
<tr ><td colspan="4" style="font-size:16px;">PLEASE BRING 2 PAASSPORT SIZE PHOTOS, BIRTH CERTIFICATE AND TRANSFER CERTIFICATE ALONG WITH FROM.</td></tr>
<tr><td colspan="4" style=" border-bottom:2px #000000 solid; line-height:2PX;">&nbsp;</td></tr>
<tr><td colspan="4" align="center" style="font-weight:bold;font-size:22px;">GUARDIAN'S DECLARATION</td></tr>

<tr><td style="width:180px;">&nbsp;</td> <td colspan="3" align="right">&nbsp;</td></tr>
<tr ><td colspan="4" style="font-size:18px;">I declare that the information made by me above is true and i will be responsible if there in any mistake.</td></tr>
<tr><td style="width:180px;">&nbsp;</td> <td colspan="3" align="right">&nbsp;</td></tr>

<tr><td style="width:180px;"></td> <td colspan="3" align="right"><span style="margin-right:50px; font-weight:bold;">Father/Guardian's Signature</span></td></tr>
<tr><td style="width:180px;"></td> <td colspan="3" align="right"><span style="margin-right:50px;">(Relation with Student......................................)</span></td></tr>
</table>

</div>