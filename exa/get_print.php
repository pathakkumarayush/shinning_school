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
?>
<?php
function convert_digit_to_words($no)  
	{   
	
	//creating array  of word for each digit
	 $words = array('0'=> 'Zero' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fourteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Forty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred','1000' => 'Thousand','100000' => 'Lac','10000000' => 'Crore');
	 //$words = array('0'=> '0' ,'1'=> '1' ,'2'=> '2' ,'3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','30' => '30','40' => '40','50' => '50','60' => '60','70' => '70','80' => '80','90' => '90','100' => '100','1000' => '1000','100000' => '100000','10000000' => '10000000');
	 
	 
	 //for decimal number taking decimal part
	 
	$cash=(int)$no;  //take number wihout decimal
	$decpart = $no - $cash; //get decimal part of number
	
	$decpart=sprintf("%01.2f",$decpart); //take only two digit after decimal
	
	$decpart1=substr($decpart,2,1); //take first digit after decimal
	$decpart2=substr($decpart,3,1);   //take second digit after decimal  
	
	$decimalstr='';
	
	//if given no. is decimal than  preparing string for decimal digit's word
	
	if($decpart>0)
	{
	 $decimalstr.="point ".$numbers[$decpart1]." ".$numbers[$decpart2];
	}
	 
	    if($no == 0)
	        return ' ';
	    else {
	    $novalue='';
	    $highno=$no;
	    $remainno=0;
	    $value=100;
	    $value1=1000;       
	            while($no>=100)    {
	                if(($value <= $no) &&($no  < $value1))    {
	                $novalue=$words["$value"];
	                $highno = (int)($no/$value);
	                $remainno = $no % $value;
	                break;
	                }
	                $value= $value1;
	                $value1 = $value * 100;
	            }       
	          if(array_key_exists("$highno",$words))  //check if $high value is in $words array
	              return $words["$highno"]." ".$novalue." ".convert_digit_to_words($remainno).$decimalstr;  //recursion
	          else {
	             $unit=$highno%10;
	             $ten =(int)($highno/10)*10;
	             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".convert_digit_to_words($remainno
	             ).$decimalstr; //recursion
	           }
	    }
	}
	
	
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

<center>Teaching Staff Salary , Month - <?php echo $_GET['id']; ?></center>
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
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_GET['id']."' and st='teaching'";
		
		$result=mysqli_query($con,$qry);
        $i=1;
		while($row=mysqli_fetch_array($result))
		{
		$_SESSION['allstid']= $row['month'];
		$ded_sal=0;
		$ded=$row['pf_ded']+$row['leav_ded']+$row['transport'];
		
		$teacher=mysqli_query($con,"select * from teacher where  teacher_id='".$row['teacher']."' and staff_typ='teaching'");
		  
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
<tr><td colspan="20"><b>&nbspIn Words</b>&nbsp;-<?php echo convert_digit_to_words($tnnt); ?> Only.</td></tr>
</table>
<br>
<br>
<div style="width:100%;">	  
<div style="float:left; width:350px; margin-left:50px; font-weight:bold;">Principal Signature</div>	
<div style="float:left; width:350px; margin-left:20px; font-weight:bold;">Director Signature</div>
<div style="float:left; width:350px; margin-left:20px; font-weight:bold;">Chairman Signature</div>
</div>
<br>
<br>
				
<input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		
</body>
</html>