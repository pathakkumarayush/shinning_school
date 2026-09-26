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
function convert_number_to_words($number) {
    
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
		100000              => 'Lakh',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );
    
    if (!is_numeric($number)) {
        return false;
    }
    
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
    
    $string = $fraction = null;
    
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
    
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
    
    return $string;
}
?>
<html>
<head>

</head>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
    <?php
    $qry="select * from teacher_sal where session='".$_SESSION['session']."' and id='".$_GET['id']."'";
	$result=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($result);
	?>
	<?php 
    $res_saved=mysqli_query($con,"select * from teacher where teacher_id='".$row['teacher']."'")or die(mysqli_error());
    $rowss=mysqli_fetch_array($res_saved);
	$rowss['teacher_name'];
    ?>

<div style="width:550px; height:450px; border:4px #000000 solid; margin-top:14px;">
<div style="width:100%;"><span style="font-size:20px; margin-left:50PX; font-weight:bold;font-family:Calibri (Body);">KABRA MEMORIAL PUBLIC SCHOOL</span></div>

<div style="float:left; width:12%; height:45px;"><img src="logo.png" style=" margin-left:25px; width:50px; height:43px; margin-top:0px;" /></div>
<div style="float:left; width:80%; height:45px; margin-left:38px;">
<span style="font-size:14px;font-family:Calibri (Body); margin-left:30px; font-weight:normal; width:500PX;">Gadarwara, Distt: Narsinghpur</span><br>
<span style="font-size:10px;font-family:Imprint MT Shadow; margin-left:-10px;">AFFILIATES CBSC NEW DELHI AFFILIATION NO. 1030600</span><br>
<span style="font-size:13px;font-family:Algerian; margin-left:85px; width:500PX;">SALARY SLIP </span><br>
</div>

<table border="0" cellpadding="0" cellspacing="0" style="width:90%; font-size:13px; margin-top:-20px; font-family:Cambria (Headings); margin-left:30px;">
<tr style="line-height:14px;"><td>Name:</td><td><?php echo $rowss['teacher_name']; ?></td><td>Designation:</td><td><?php echo $rowss['staff_typ']; ?></td></tr> 
<tr style="line-height:14px;"><td>Month: </td><td><?php echo $row['month']; ?> -2017</td><td>Year :</td><td>2017-2018</td></tr>
<tr style="line-height:14px;"><td>Working Days:  </td><td><?php echo $row['workingd']; ?></td><td>Paid Days :</td><td><?php echo $row['workingd']-$row['absent']+$row['cl']; ?></td></tr>
<tr style="line-height:14px;"><td>Bank Account No.:</td><td><?php echo $rowss['it_pt']; ?></td><td>PF Account No.:</td><td></td></tr>
</table>
<br clear="all">
<table border="1" cellpadding="0" cellspacing="0" style="width:95%; font-size:13px; margin-top:-16px; font-family:Cambria (Headings); margin-left:20px;">
<tr style="line-height:17px; background-color:#CCCC99; font-weight:bold;">
<td align="center" style="width:200px;">Salary</td><td align="center">Amount</td><td align="center">Salary</td><td align="center">Amount</td>
</tr>
<tr style="line-height:15px;">
<td style="width:200px;" >&nbsp;Basic</td><td>&nbsp;&nbsp;<?php echo $row['act_basic']; ?></td>
<td style="width:200px;" >&nbsp;Basic</td><td>&nbsp;&nbsp;<?php echo $row['act_basic']; ?></td>
</tr>

<tr style="line-height:15px;">
<td>&nbsp;HRA </td><td>&nbsp;&nbsp;<?php echo $row['act_hra']; ?></td>
<td>&nbsp;HRA </td><td>&nbsp;&nbsp;<?php echo $row['act_hra']; ?></td>
</tr>

<tr style="line-height:15px;">
<td>&nbsp;Conveyance Allowance</td><td>&nbsp;&nbsp;<?php echo $row['act_conv']; ?></td>
<td>&nbsp;Conveyance Allowance</td><td>&nbsp;&nbsp;<?php echo $row['act_conv']; ?></td>
</tr>

<tr style="line-height:15px;"><td>&nbsp;CL (Earned)</td>
<td>&nbsp;&nbsp;<?php  if(!empty($row['cla'])){ echo $row['cl'];}else{echo '0';} ?></td><td style="width:200px;">&nbsp;Advance</td><td>&nbsp;&nbsp;<?php echo $row['adv']; ?></td>
</tr>

<tr style="line-height:15px;"><td>&nbsp;CL Amount</td><td>&nbsp;&nbsp;<?php echo $row['cla']; ?></td>
<td>&nbsp;CL Amount</td><td>&nbsp;&nbsp;<?php echo $row['cla']; ?></td>
</tr>

<tr style="line-height:18px;"><td>&nbsp;Other Allowance</td><td>&nbsp;&nbsp;<?php echo $row['allow']; ?></td>
<td>&nbsp;Other Allowance</td><td>&nbsp;&nbsp;<?php echo $row['allow']; ?></td>

</tr>

<tr style="line-height:15px;"><td>&nbsp;Security Dep. Amt. {+}<br>{Return}</td><td>&nbsp;&nbsp;</td>
<td style="width:200px;">&nbsp;Security Dep. Amt.(-){Deduction} /Other Leave
</td><td>&nbsp;&nbsp;<?php echo $row['dect']; ?></td></tr>


<tr style="line-height:15px;"><td>&nbsp;</td><td>&nbsp;&nbsp;</td>
<td style="width:200px;">&nbsp;LWP Amount Deduction</td><td>&nbsp;&nbsp;<?php echo $row['cur_sal']-$row['basic']-$row['conv']-$row['ac_allow']-$row['hra']; ?></td>
</tr>

<tr style="line-height:15px;"><td>&nbsp;</td><td>&nbsp;&nbsp;</td>
<td style="width:200px;">&nbsp;Provident Fund Ded.(P.F)</td><td>&nbsp;&nbsp;<?php echo $row['pf_ded']; ?></td>
</tr>

<tr style="line-height:15px;"><td>&nbsp;</td><td>&nbsp;&nbsp;</td>
<td style="width:200px;">&nbsp;Net Amount to be Paid</td><td>&nbsp;&nbsp;<?php echo $row['sal_rec']; ?></td>
</tr>
<tr style="line-height:18px;"><td colspan="2"><span style="margin-left:110px;font-weight:bold;">Gross Salary:-</span> <?php echo $row['cur_sal']+$row['cla']; ?>/-</td>
<td colspan="2"><span style="margin-left:110px;font-weight:bold;">Gross Salary:-</span><?php echo $row['cur_sal']+$row['cla']; ?>/- </td>
</tr>


<tr style=""><td colspan="4">
<div style="height:46px; font-weight:bold; margin-top:5px;">
<span style="font-size:12px">&nbsp;&nbsp;&nbsp;Net Salary (In Rs.) :  <?php echo $s = $row['sal_rec'];?>/-</span><br>
<span style="font-size:12px">&nbsp;&nbsp;&nbsp;In Words :  <?php echo convert_number_to_words($s); ?> Only. </span><br>
<span style="margin-left:340px;">Receiver Sign..............................</span>
</div>
</td>
</tr>

<tr style="line-height:35px;"><td colspan="4">
<div style="height:px; font-weight:bold;">
<span style="margin-left:10px;">&nbsp;&nbsp;&nbsp;Accounts Officer</span>
<span style="margin-left:80px;">&nbsp;&nbsp;&nbsp;Principal </span>
<span style="margin-left:160px;">Chairman</span>
</div>
</td>
</tr>

</table>


</div>



<br>
				
<input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		
</body>
</html>