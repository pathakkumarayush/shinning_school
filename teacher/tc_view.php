<style>
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
	width:250px;
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
#myform{ font-size:16px; padding:20px; margin-left:50px;}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=1200');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/TC.png" width="500PX"/><a href="index.php">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student T.C </h2>
</div>
<div class="col_4">
<?php 
$_GET['tid'];
$reg=mysqli_query($con,"select * from tc where sid='".$_GET['tid']."'");
$rowstud=mysqli_fetch_array($reg);
?>

<div class="form-style-2-heading">Print student tc<br clear="all" /></div>
<form id="form1">
<div id="dvContainer">
<div style="width:100%; ">
<table style="width:100%;">
<tr>
<td style="width:90px;"><img src="lt.png" /></td>
<td>
<span style="font-size:25px; margin-top:-20px; position:absolute">KABRA MEMORIAL PUBLIC SCHOOL,GADARWARA</span>
<span style="font-size:16px;font-weight:bold; margin-top:5px; position:absolute;">Pipariya Road, Kamti Gadarwara - 487-551, Tel. No. 07791-255505/255501</span>
<span style="font-size:15px;font-weight:bold; margin-left:165px; margin-top:25px; position:absolute;">Website: www.kmps.edu.in</span>
</td>
</tr>
</table>
<table style="margin-top:8px;">
<tr>
<td><div style="width:255px;">CBSE Affiliation No. <u><b>1030600</b></u></div></td> <td>
<div style="width:245px; line-height:30px; border:1px #000000 solid;"><span style="font-size:16px;margin-left:40px;font-weight:bold">Transfer Certificate</span></div></td> 
<td><div style="width:300px; margin-left:125px;">School Code No. <u><b>14481</b></u></div></td>
</tr>
</table>

<table style="margin-top:8px;">
<tr>
<td><div style="width:255px;">Book No. <b style="border-bottom:3px #000000 dotted;">1030600</b></span></div></td> <td>
<div style="width:245px;"><span style="font-size:14px">Sl No. <b style="border-bottom:3px #000000 dotted;">1030600</b></span></div></td> 
<td><div style="width:300px; margin-left:125px;"><span style="font-size:14px; margin-left:20px;">Admission No. <b style="border-bottom:3px #000000 dotted;">14481</b></span></div></td>
</tr>
</table>

<table style="margin-top:8px; margin-left:px;">
<tr>
<td>
<div style="float:left">1. Name of Pupil:- </div><div style="float:left;width:690px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">
<?php echo $rowstud['sname']; ?>
</span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td ><div style="float:left">2.	Mother's Name :- </div>
<div style="float:left;width:680px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['mname']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">3.Father's Name / Guardian's Name :-</div>
<div style="float:left;width:565px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['fname']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">4.Nationality :- </div>
<div style="float:left;width:706px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['nat']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>


<tr>
<td><div style="float:left">5.Whether the candidate belongs to Schedule Caste or Schedule Tribe :- </div>
<div style="float:left;width:345px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['caste']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td ><div style="float:left">6.Date of First Admission in the school with Class : -  </div>
<div style="float:left;width:465px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['doa_class']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">7.Date of Birth (in Christian Era) according to Admission Register (in figures) :-</div>
<div style="float:left;width:285px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['dob']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td ><div style="float:left">&nbsp;&nbsp;&nbsp;(In Words) </div>
<div style="float:left;width:720px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['dob_word']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td ><div style="float:left">8.Class in which the pupil last studied (in figures) :-  </div>
<div style="float:left;width:110px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['l_class']; ?></span></div>
<div style="float:left">&nbsp;[In Words]</div><div style="float:left;width:275px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['l_word']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">9.School/Board's Annual Examination last taken with result :-  </div>
<div style="float:left;width:400px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['s_result']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">10.Whether failed. If so once/twice in the same class :-  </div>
<div style="float:left;width:450px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['twice']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">11.Subject Studied </div>
<div style="float:left;width:190px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">1.<?php echo $rowstud['sub1']; ?></span></div>
<div style="float:left;width:190px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">2.<?php echo $rowstud['sub2']; ?></span></div>
<div style="float:left;width:280px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">3.<?php echo $rowstud['sub3']; ?></span></div>
</td>
</tr>
<tr>
<td ><div style="float:left; width:114px;"> &nbsp;</div>
<div style="float:left;width:190px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">1.<?php echo $rowstud['sub4']; ?></span></div>
<div style="float:left;width:190px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">2.<?php echo $rowstud['sub5']; ?></span></div>
<div style="float:left;width:285px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style="">3.<?php echo $rowstud['sub6']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td ><div style="float:left">12.Whether qualified for promotion to the higher class :-   </div>
<div style="float:left;width:435px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['h_class']; ?></span></div>
</td>
</tr>
<tr>
<td><div style="float:left">&nbsp;&nbsp;&nbspIf so, to which class (in figure)  </div>
<div style="float:left;width:200px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['figher']; ?></span></div>
<div style="float:left">&nbsp;[In Words]</div><div style="float:left;width:307px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['f_word']; ?></span></div>
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td ><div style="float:left">13.Month up to which the (pupil has paid) school dues/paid :-   </div>
<div style="float:left;width:399px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['mont_p']; ?></span></div>
</td>
</tr>

<tr><td>&nbsp;</td></tr>

<tr>
<td><div style="float:left">14.Any fee concession availed of, if so, the nature of such concession :-   </div>
<div style="float:left;width:337px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['conce']; ?></span></div>
</td>
</tr>

<tr>
<td ><div style="float:left">15.Total number of working days :-   </div>
<div style="float:left;width:569px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['w_day']; ?></span></div>
</td>
</tr>

<tr>
<td ><div style="float:left">16.Total number of working days present :-   </div>
<div style="float:left;width:520px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['p_day']; ?></span></div>
</td>
</tr>

<tr>
<td><div style="float:left">17. Whether NCC Cadet/Boy Scout/Girl Guide (details may be given):-   </div>
<div style="float:left;width:335px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['ncc']; ?></span></div>
</td>
</tr>
<tr>
<td><div>18.Games played of extra-curricular activities in which the pupil usually took part (mention achievement level therein)</div>

<div style="width:800px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['game']; ?></span></div>

</td>
</tr>


<tr>
<td style="width:120px;"><div style="float:left">19.General conduct </div>
<div style="float:left;width:672px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['conduct']; ?></span></div>
</td>
</tr>
<tr>
<td ><div style="float:left">20.Date of application for certificate   </div>
<div style="float:left;width:565px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['d_app']; ?></span></div>
</td>
</tr>
<tr>
<td><div style="float:left">21.Date of issue of certificate :-  </div>
<div style="float:left;width:595px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['d_issue']; ?></span></div>
</td>
</tr>
<tr>
<td><div style="float:left">22.Reason for leaving the school :-    </div>
<div style="float:left;width:576px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['leaving']; ?></span></div>
</td>
</tr>

<tr>
<td ><div style="float:left">23.Any other remarks:-    </div>
<div style="float:left;width:650px;border-bottom:2px #000000 dotted; margin-left:10px;"><span style=""><?php echo $rowstud['remark']; ?></span></div>
</td>
</tr>

</table>
<table style="margin-top:30px;">
<tr>
<td><div style="width:255px;">Signature of Class Teacher</div></td> <td>
<div style="width:245px;"><span style="font-size:14px">Checked by <br />(State full name & Designation)</div></td> 
<td><div style="width:300px; margin-left:125px;"><span style="font-size:14px; margin-left:20px;">Principal Signature & Seal </td>
</tr>
</table>
</div>
</div>
<input type="button" value="Print List" id="btnPrint" />
</form>

<br clear="all" />
</div>
<br clear="all" />
  <br clear="all" />  <br clear="all" />
</div>
</div>