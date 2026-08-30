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
<?php
session_start();
require_once("../db.php");
$_GET['id'];
require_once("words.php");
?>
<html>
<head>

</head>

<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
<div style="width:100%;"><span style="font-size:20px; margin-left:50PX; font-weight:bold;font-family:Calibri (Body);">KABRA MEMORIAL PUBLIC SCHOOL</span></div>

<div style="float:left; width:12%; height:45px;"><img src="logo.png" style=" margin-left:25px; width:50px; height:43px; margin-top:0px;" /></div>
<div style="float:left; width:80%; height:45px; margin-left:38px;">
<span style="font-size:14px;font-family:Calibri (Body); margin-left:30px; font-weight:normal; width:500PX;">Gadarwara, Distt: Narsinghpur</span><br>
<span style="font-size:10px;font-family:Imprint MT Shadow; margin-left:-10px;">AFFILIATES CBSC NEW DELHI AFFILIATION NO. 1030600</span><br>
<span style="font-size:13px;font-family:Algerian; margin-left:85px; width:500PX;">SALARY SLIP </span><br>
</div>
	<table  border="1" cellspacing="0" cellpadding="0" style="color:#000000; width:700px;" >
    <tr class="box-head" style="font-weight:bold;">
    <td align="center">S.N </td>
	<td align="center">Name </td>
	<td align="center">Account No</td>
    <td align="center">Amount </td>
    </tr>
  <?php
  $qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_GET['id']."' and st='grd'";
	
		$result=mysqli_query($con,$qry);
	    $i=1;
		while($row=mysqli_fetch_array($result))
		{
	    $_SESSION['tid']= $row['teacher'];
		
		$teacher=mysqli_query($con,"select * from teacher where teacher_id='".$row['teacher']."' and teacher_school='".$_SESSION['uid']."'");
		$tech_det=mysqli_fetch_array($teacher);
		
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".ucwords($tech_det["it_pt"])."</td>";
	    echo "<td>".$row["sal_rec"]."</td>";
		$tant = $row["sal_rec"]; $tnnt+=$tant;
?>
<?php
$i++;
}
mysqli_close($con);
?>
<tr style="line-height:25px;"><td colspan="4"><span style="float:right; font-weight:bold;">Total Amount:-&nbsp;&nbsp;&nbsp; <?php echo $tnnt; ?>&nbsp;&nbsp;&nbsp;</span></td></tr>
<tr style="line-height:25px;"><td colspan="4"><span style="float:left; font-weight:bold;">&nbsp;In Words:-&nbsp;&nbsp;<?php echo convert_digit_to_words($tnnt); ?>&nbsp;&nbsp;&nbsp;</span></td></tr>
</table>
<table  border="0" cellspacing="0" cellpadding="0" style="color:#000000; margin-top:50px; width:700px;">
<tr><td>&nbsp;&nbsp;&nbsp;Chairman Sir</td><td>&nbsp;&nbsp;&nbsp;Director Sir</td><td>&nbsp;&nbsp;&nbsp;&nbsp;Accountant</td><td>&nbsp;&nbsp;Bank Acknowledgement</td></tr>
</table>
<br>
				
<input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		
</body>
</html>