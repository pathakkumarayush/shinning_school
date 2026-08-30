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
$_GET['idn'];
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
	<table  border="1" style="border:#33cc66 solid 2px; font-size:14px; color:#000000; width:1150px;"  cellpadding="0" cellspacing="0">
<tr><td colspan="21" style="font-size:18px">

<center><?php echo $rowsch['school_name'];?></center>

<center>Group-D Teaching Staff Salary , Month - <?php echo $_GET['idn']; ?></center>
<br />
</td></tr>
    <tr class="box-head" >
    <td align="center">S.N </td>
	<td align="center">Name </td>
	<td align="center">Wd</td>
	<td align="center">CL</td>
	<td align="center">Absent</td>
	<td align="center">Basic Sal.</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">Total</td>
	<td align="center">Amount</td>
    <td align="center">Hra</td>
    <td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">G-Total</td>
	<td align="center">Pf</td>
	<td align="center">cl+</td>
	<td align="center">adv.</td>
	<td align="center">S-Money</td>
    <td align="center">Net sal.</td>
	
	
	
  </tr>
  <?php
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_GET['idn']."' and st='grd' and pf_per='0'";
		
		$result=mysqli_query($con,$qry);
        $i=1;
		while($row=mysqli_fetch_array($result))
		{
		$_SESSION['allstid']= $row['month'];
		$ded_sal=0;
		$ded=$row['pf_ded']+$row['leav_ded']+$row['transport'];
		
		$teacher=mysqli_query($con,"select * from teacher where  teacher_id='".$row['teacher']."' and staff_typ='grd'");
		  
	    $tech_det=mysqli_fetch_array($teacher);
		//$ded_sal=$row["cur_sal"]-$ded;
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$row["workingd"]."</td>";
		echo "<td>".$row["cl"]."</td>";
		echo "<td>".$row["absent"]."</td>";
		
		echo "<td>".$row["act_basic"]."</td>";
		
		echo "<td>".$row["act_hra"]."</td>";
		echo "<td>".$row["act_conv"]."</td>";
		echo "<td>".$row["allow"]."</td>";
		echo "<td>".$row["cur_sal"]."</td>";
		echo "<td>".$row["basic"]."</td>";
		echo "<td>".$row["hra"]."</td>";
		echo "<td>".$row["conv"]."</td>";
		echo "<td>".$row["ac_allow"]."</td>";
		$gd=$row["basic"]+$row["hra"]+$row["conv"];

        echo "<td>".$gd."</td>";
		echo "<td>".$row["pf_ded"]."</td>";
		echo "<td>".$row["cla"]."</td>";
		echo "<td>".$row["adv"]."</td>";
		echo "<td>".$row["dect"]."</td>";
	    echo "<td>".$row["sal_rec"]."</td>";
		$tant = $row["sal_rec"]; $tnnt+=$tant;
        ?>		
	
	</tr>
	<?php
$i++;
}
mysqli_close($con);
?>
<tr><td colspan="19"><span style="float:right; font-weight:bold;">Total Amount&nbsp;</span></td><td>&nbsp;<b><?php echo $tnnt; ?></b></td></tr>
	  </table>
	  
	

<br>
				
<input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		
</body>
</html>