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
	$_GET['id'];
    $qry="select * from expenses where id='".$_GET['id']."'";
	$result=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($result);
	
	$d=date("d-m-Y",strtotime($row['dos']));
	?>
	

<div style="width:550px; height:350px; margin-top:14px;">
<div style="float:left; width:12%; height:45px;"><img src="logo.png" style=" margin-left:25px; width:65px; height:55px; margin-top:-10px;" /></div>
<div style="float:left; width:80%; height:45px; margin-left:38px;">
<span style="font-size:18px;font-family:Calibri (Body); margin-left:10px; font-weight:bold; width:500PX;">KABRA MEMORIAL PUBLIC SCHOOL</span><br>
<span style="font-size:12px;font-family:Imprint MT Shadow;">AFFILIATES CBSC NEW DELHI AFFILIATION NO. 1030600</span><br>
<span style="font-size:14px;font-family:Algerian; margin-left:85px; width:500PX;">PAYMENT VOUCHER</span><br>
</div>
<br><br>
<div style="float:left; margin-left:20px;"><b>Voucher No:</b><?php echo $row['id']; ?></div>
<div style="float:right"><b>Date:</b><?php echo $d; ?></div>
</table>
<br clear="all">
<table border="1" cellpadding="0" cellspacing="0" style="width:100%; font-size:15px; margin-top:-16px; font-family:Cambria (Headings); margin-left:20px;">
<tr style="line-height:30px;">
<td colspan="2">&nbsp;&nbsp;<b>In A/C:</b><?php echo $row['in_ac']; ?></td>
</tr>
<tr style="line-height:25px;">
<td style="width:420px;">&nbsp;&nbsp;<b>Particular:</b><?php echo $row['name']; ?></td>
<td style="font-weight:bold;"><center>Amount</center></td>
</tr>
<tr style="line-height:25px;">
<td>
<table cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td>&nbsp;&nbsp;<b>Paid To:</b><?php echo $row['vname']; ?></td></tr>
<tr><td><hr style="width:100%;"></td></tr>
<tr><td><div style="height:80px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Being amount paid for:</b><?php echo $row['amt']; ?></div></td></tr>
</table>
</td>
<td>&nbsp;&nbsp;<?php echo $amt = $row['amt']; ?></td>
</tr>

<tr>
<td>&nbsp;<b>In Words:<?php echo convert_number_to_words($amt); ?> Only.</b></td><td><b>&nbsp;&nbsp;<?php echo $amt = $row['amt']; ?></b></td>
</tr>

<tr style="line-height:70px;"><td colspan="4">
<div style="height:px; font-weight:bold;">
<span style="margin-left:10px;">&nbsp;&nbsp;&nbsp;Paid by</span>
<span style="margin-left:80px;">&nbsp;&nbsp;&nbsp;Checked by </span>
<span style="margin-left:160px;">Recived by</span>
</div>
</td>
</tr>

</table>


</div>



<br>
				
<input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		
</body>
</html>