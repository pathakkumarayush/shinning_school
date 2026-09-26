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
<?php

            $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];

?>
<html>
<head>

</head>

<html xmlns="http://www.w3.org/1999/xhtml">
<body>
    <div style="width:100%;">
	<div style="margin-left:85px;">
	<div style="float:left; width:12%; height:45px;"><img src="logo.png" style=" width:50px; height:43px; margin-top:0px;" /></div>
	<div style="float:left; width:80%; height:45px;">
	<span style="font-size:20px; margin-left:34PX; font-weight:bold;font-family:Calibri (Body);"><?php echo $rowsch['school_name'];?></span><br>
   <span style="font-size:14px;font-family:Calibri (Body); margin-left:30px; font-weight:normal; width:500PX;"><?php echo $rowsch['school_address'];?></span><br>


</div>
</div>
</div>
	<br clear="all">
	

	<table  border="1" cellspacing="0" cellpadding="0" style="color:#000000; font-size:12px; width:700px;" >
    <tr class="box-head" style="font-weight:bold;">
    <td align="center">S.N </td>
	<td align="center">Name </td>
	<td align="center">Account No</td>
    <td align="center">Amount </td>
    </tr>
  <?php
  $qry="select * from teacher_sal where month='".$_GET['id']."'";
	
		$result=mysqli_query($con,$qry);
	    $i=1;
		while($row=mysqli_fetch_array($result))
		{
	    $_SESSION['tid']= $row['teacher'];
		
		$teacher=mysqli_query($con,"select * from teacher where teacher_id='".$row['teacher']."' ");
		$tech_det=mysqli_fetch_array($teacher);
		
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".ucwords($tech_det["it_pt"])."</td>";  
		$esit = substr($row["sal_rec"], 0, 5);
		echo "<td>".$esit."</td>";
		
	   
		$tant = $esit; $tnnt+=$tant;
?>
<?php
$i++;
}
mysqli_close($con);
?>
<tr style="line-height:20px;"><td colspan="4"><span style="float:right; font-weight:bold;">Total Amount:-&nbsp;&nbsp;&nbsp; <?php echo $tnnt; ?>&nbsp;&nbsp;&nbsp;</span></td></tr>
<tr style="line-height:20px;"><td colspan="4"><span style="float:left; font-weight:bold;">&nbsp;In Words:-&nbsp;&nbsp;<?php echo convert_digit_to_words($tnnt); ?>&nbsp;&nbsp;&nbsp;</span></td></tr>
</table>
<table  border="0" cellspacing="0" cellpadding="0" style="color:#000000; margin-top:28px; width:700px;">
<tr><td>&nbsp;&nbsp;&nbsp;Principle</td><td>&nbsp;&nbsp;&nbsp;Director</td><td>&nbsp;&nbsp;&nbsp;&nbsp;Chairman</td></tr>

</table>
<table  border="0" cellspacing="0" cellpadding="0" style="color:#000000; margin-top:18px; width:700px;">
<tr><td>&nbsp;&nbsp;&nbsp;Bank Acknowledgement</td></tr>

</table>

				
<input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		
</body>
</html>