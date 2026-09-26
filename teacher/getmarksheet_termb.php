<?php
session_start();
include 'db.php';
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>
<body style="font-family:Calibri;">
<div style="width:1050px;height:1531px; border:6px #1B2F3A solid;background-color:#fff">

<div style="width:97.5%; margin:0 auto;">
<div style="width:100%; margin-top:10px;border:1px #1B2F3A solid; height:367px;">
<div style="background-color:#1B2F3A; color:#FFFFFF; font-size:40px; font-weight:bold;  margin:0 auto; width:100%;"><center>POINTS FOR PARENTS & GUARDIANS</center> </div>
<div style="width:100%; background-color:#E2F4FF;height:318px; margin-top:-24px;">
<ul style="font-size:24px;">
<br>
<li style="margin-top:-15px;">There will be two Academic terms for the scholastic year. First shall be from April to Sept, and the second will be from Oct. to March</li>
<li style="margin-top:7px;">Reports about the children's performance in these assessments will be issued to the parents after the completion of each term. They are requested to examine these and guide them accordingly.</li>
<li style="margin-top:7px;">The progress report will be shown to parents when all dues/fees against the child are cleared.</li>
<li style="margin-top:7px;">It is compulsory for all the students to appear in all test/exam. In case of absence zero marks will be awarded.</li>
<li style="margin-top:7px;">Promotion will be granted on the basis of the whole year's work. Results once declared are final.</li>
<li style="margin-top:7px;">Duplicate progress report may be issued on payment of Rs. 300/-</li>
</ul>
</div>
</div>
</div>

<div style="width:97.5%; margin:0 auto;">
<div style="width:100%; margin-top:20px;border:1px #1B2F3A solid; height:790px;">
<div style="background-color:#1B2F3A; color:#FFFFFF; font-size:40px; font-weight:bold;  margin:0 auto; width:100%;"><center>GRADE SYSTEM</center> </div>
<div style="background-color:#43C3DD; color:#000; font-size:40px; font-weight:bold; border-bottom:1px #1B2F3A solid;  margin:0 auto; width:100%;"><center>SCHOLASTIC AREA</center> </div>
<div style="width:100%; height:318px; margin-top:0px;">
<ul style="font-size:26px;">
<li style="margin-top:-20px;">Grades are awarded on a 7-point grading scale as follows:</li>
</ul>
<table align="center" style="font-size:26px; margin-top:-20px; width:98%;border-bottom:1px #43C3DD solid;background-color:#E2F4FF;" border="0" cellpadding="0" cellspacing="0">
<tr align="center" style="color:fff; background-color:#1B2F3A;line-height:40px;font-weight:bold;"><td>Marks Range</td><td>Explanation</td><td>Grades</td></tr>
<tr align="center" style="line-height:35px; border-top:1px #43C3DD solid;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">91 - 100</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Excellent</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">A1</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">81 - 90</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Very Good</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">A2</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">71 - 80</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Good</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">B1</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">61 - 70</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Very Fair</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">B2</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">51 - 60</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Fair</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">C1</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">41 - 50</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Satisfactory</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">C2</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">40  & Below</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">Scope of improvement</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">D</td>
</tr>

</table>

<br clear="all">

<div style="background-color:#43C3DD; color:#000; font-size:40px; font-weight:bold; border-bottom:1px #1B2F3A solid;border-top:1px #1B2F3A solid;  margin:0 auto; width:100%;"><center>CO-SCHOLASTIC AREA</center> </div>
<ul style="font-size:26px;">
<li style="margin-top:-20px;">Grades are awarded on a 5-point grading scale as follows:</li>
</ul>
<table align="center" style="font-size:26px; margin-top:-20px; width:50%;border-bottom:1px #43C3DD solid;background-color:#E2F4FF;" border="0" cellpadding="0" cellspacing="0">
<tr align="center" style="color:fff; background-color:#1B2F3A;line-height:40px;font-weight:bold;"><td>Grade</td><td>Grade Points</td></tr>

<tr align="center" style="line-height:35px; border-top:1px #43C3DD solid;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">A</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">4.1-5.0</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">B</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">3.1-4.0</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">C</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">2.1-3.0</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">D</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">1.1-2.0</td>
</tr>

<tr align="center" style="line-height:35px;">
<td style="border-top:1px #43C3DD solid;border-left:1px #43C3DD solid;border-right:1px #43C3DD solid;">E</td>
<td style="border-top:1px #43C3DD solid;border-right:1px #43C3DD solid;">0-1.0</td>
</tr>


</table>
</div>
</div>
</div>
<br clear="all"><br clear="all">
<div style="width:97.5%; margin:0 auto;">
<div><center><img src="l.png" style="height:125px; width:105px; margin-top:15px; vertical-align:middle;" /></center></div>
<div> <center><span style="font-size:46px; color:#000; vertical-align:middle">&nbsp;<b>GOYENKA PUBLIC SCHOOL</b></span></center></div>

<div style="font-size:27px;"> 
<center><span style="color:#000;">Address:</span><span style="color:#0033FF">Panchkuian Tiraha, Jhansi-284001 </span>
<span style="color:#000;">Contact:</span><span style="color:#0033FF">8707077296, 8840435941</span></center>

<center><span style="color:#000;">Email:</span><span style="color:#0033FF">goyenkaschool@gmail.com </span>
<span style="color:#000;">Website:</span><span style="color:#0033FF">www.goyenkapublicschool.com</span></center>
</div>

</div>

</div>
</body>
</html>