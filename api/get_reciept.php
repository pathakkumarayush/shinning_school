<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../db.php';
header('Content-Type: application/json');
// Validate request method
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['status' => false, 'message' => 'Only GET method is allowed']);
    exit;
}

// ✅ Validate input
if (!$_GET|| !isset($_GET['session'])) {
    http_response_code(400); // Bad Request
    echo json_encode(['status' => false, 'message' => 'Session is required']);
    exit;
}
$response = [];

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(['status' => false, 'message' => 'Missing student fee ID']);
    exit;
}


$fid = $_GET['id'];
$session = $_GET['session'];
$_SESSION['session'] = $session;
$val4 = $val4p = $tcon = $tconp = $tfine = $tfinep = 0;
$bal = 0;
if(!empty($_GET['id']))
{
$getdetail=mysqli_query($con,"select * from fee_detail where id='".$_GET['id']."' and session='".$_SESSION['session']."'");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$rowfeedetail['student']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 
 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."'  and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
	
	$expl = !empty($rowfeedetail['month']) ? explode(",", $rowfeedetail['month']) : [];
$count1 = count($expl);
 }

          $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];

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




//----------------- FEE DETAIL -----------------
$getdetail = mysqli_query($con, "SELECT * FROM fee_detail WHERE id='$fid' AND session='$session'");
$rowfeedetail = mysqli_fetch_array($getdetail);

if (!$rowfeedetail) {
    echo json_encode(['status' => false, 'message' => 'Fee detail not found']);
    exit;
}

$reg = mysqli_query($con, "SELECT * FROM student WHERE student_id='" . $rowfeedetail['student'] . "' AND student_session='$session'");
$rowstud = mysqli_fetch_array($reg);
$sid = $rowstud['student_id'] ?? null;

//----------------- PREVIOUS DUES -----------------
$preq = mysqli_query($con, "SELECT * FROM privious_fee WHERE sid='$sid' AND session='$session'");
$rowpq = mysqli_fetch_array($preq);
$feepq = $rowpq['amt'] ?? 0;

//----------------- ADMISSION FEE -----------------
$cls = $rowstud['student_class'];
$enf = mysqli_query($con, "SELECT * FROM admission WHERE class='$cls' AND session='$session'");
$rowen = mysqli_fetch_array($enf);
$aden = $rowen['fee'] ?? 0;

//----------------- TUITION FEE -----------------
$total = mysqli_query($con, "SELECT * FROM definefee WHERE class='$cls' AND session='$session'");
$tamt = mysqli_fetch_array($total);
$tu = $tamt['amnt'] ?? 0;

if (empty($rowstud['famt'])) {
    $ifee3 = $tu;
} else {
    $tuam = (float)$tu * (float)$rowstud['famt'] / 100;
    $ifee3 = $tu - $tuam;
}

$tttf = $ifee3;
if (($rowstud['std_type'] ?? '') == 'New') {
    $tt = (float)$tttf + (float)$aden;
} else {
    $tt = $tttf;
}
$total_amt = $tt;

//----------------- CURRENT SESSION PAID -----------------
$exa = mysqli_query($con, "SELECT * FROM fee_detail WHERE student='$sid' AND session='$session' AND status='1' AND fee_type='Tution' AND st='1'");
$reg = $texpf = $tenf = $val4 = $tcon = $tfine = 0;

while ($hostel = mysqli_fetch_array($exa)) {
    $val4 += (float)$hostel["fee_deposit"];
    $tcon += (float)$hostel["concession"];
    $tfine += (float)$hostel["latefee"];
    $reg += (float)$hostel["adm_fee"];
    $texpf += (float)$hostel["caution"];
}

//----------------- PREVIOUS SESSION PAID -----------------
$exap = mysqli_query($con, "SELECT * FROM fee_detail_preivios WHERE student='$sid' AND session='$session' AND st='1'");
$val4p = $tconp = $tfinep = 0;

while ($hostelp = mysqli_fetch_array($exap)) {
    $val4p += (float)$hostelp["fee_deposit"];
    $tconp += (float)$hostelp["concession"];
    $tfinep += (float)$hostelp["latefee"];
}

//----------------- FINAL CALCULATION -----------------
$tpaid = $val4 + $val4p;
$tpaidn = (float)$total_amt + (float)$feepq;
$afine = $tfine + $tfinep;
$aconc = $tcon + $tconp;
$balance = (float)$tpaidn - (float)$tpaid - (float)$aconc + (float)$afine;

//----------------- RESPONSE -----------------
$response['status'] = true;



$receipt_ui = '<html>
<head>
<style type="text/css">
#dialog .ui-widget { font-family: inherit; }
.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited { color: #ffffff; }
.ui-widget-header { font-size:1em; font-weight: bold; font-family: Arial, Helvetica, sans-serif; background: #5c9ccc; border-color: #4297d7; border-width: 1px; }
.ui-dialog-title { line-height: 1em; color: #ffffff; font-weight: bold; }
.ui-widget-content { font-size:1em; font-weight: bold; font-family: Arial, Helvetica, sans-serif; background: #fcfdfd; border-color: #a6c9e2; border-width: 1px; }
.ui-dialog-content { font-family: Arial, Helvetica, sans-serif; color: #222222; font-size:.8em; padding: 10px; } 
.ui-dialog-buttonpane { font-size:.8em; }
.table { border-collapse: collapse; border-spacing: 0; }
.watermark { display: block; position: relative; }
.watermark::after { content: ""; background-repeat: no-repeat; opacity: 0.2; top: 16%; left: 8%; bottom: 0; right: 0; position: absolute; z-index: -1; }
</style>
</head>
<body>
<div style="width:100%; height:auto; font-weight:bold;">';


// ================= OFFICE COPY =================
$receipt_ui .= '<div class="watermark" style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin-left:0;padding:5px;">
<div style="border:#FF0000 0px solid; height:auto">
<div style="width:420px; height:65px;">
<div style="float:left;height:65px;">
<img src="https://smarterponline.com/scottish/school/sf.png" style="margin-left:7px;">
<center><span style="font-size:12px;">Fee Receipt - Parents Copy</span></center>
</div>
</div>
</div>
<div style="border:#000 1px solid; width:328px;margin:0px; margin-top:10px;"></div>
<table class="table" style="margin:5px 0px 0px 1px; width:325px; font-size:11px;font-weight:bold;" border="0">
<tr style="font-weight:bold; line-height:15px;">
<td style="width:82px;">RECEIPT NO :</td>
<td style="width:100px;">'.$rowfeedetail['receiptno'].'</td>
<td style="width:40px;">DATE :</td>
<td>'.date("d-m-Y", strtotime($rowfeedetail['date'])).'</td>
</tr>
<tr style="line-height:15px;">
<td colspan="4">STUDENT NAME : '.ucwords($rowstud['student_name']).'</td>
</tr>
<tr style="line-height:15px;">
<td colspan="4">FATHER NAME : '.ucwords($rowstud['student_fname']).'</td>
</tr>
<tr style="line-height:15px;">
<td colspan="4">CLASS : '.$rowstud['student_class'].'</td>
</tr>
</table>';

// ================= FEE DETAILS =================
$receipt_ui .= '<div class="table" style="border:#FF0000 0px solid; height:auto; margin:1px 0px 0px 2px;">
<table border="1" cellspacing="0" cellpadding="0" style="font-size:12px; width:99%;">
<tr style="font-weight:bold; line-height:16px;">
<td align="center" colspan="3">Session : '.$_SESSION['session'].'</td>
</tr>
<tr style="font-weight:bold; line-height:16px;">
<td align="center">Particulars</td>
<td align="center">Amount</td>
</tr>';

if(!empty($rowfeedetail['adm_fee'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Registration Fee</td><td>&nbsp;&nbsp;'.$rowfeedetail['adm_fee'].'</td></tr>';
}
if(!empty($rowfeedetail['inst_fee'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Instalment Fee</td><td>&nbsp;&nbsp;'.$rowfeedetail['inst_fee'].'</td></tr>';
}
if(!empty($rowfeedetail['latefee'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Other/Late Fee</td><td>&nbsp;&nbsp;'.$rowfeedetail['latefee'].'</td></tr>';
}
if(!empty($rowfeedetail['pdue'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Previous Due</td><td>&nbsp;&nbsp;'.$rowfeedetail['pdue'].'</td></tr>';
}
if(!empty($rowfeedetail['cba'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Cheque Bounce</td><td>&nbsp;&nbsp;'.$rowfeedetail['cba'].'</td></tr>';
}
if(!empty($rowfeedetail['concession'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Concession</td><td>&nbsp;&nbsp;'.$rowfeedetail['concession'].'</td></tr>';
}

$receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Today Received Amount</td><td>&nbsp;&nbsp;<b>'.$rowfeedetail['fee_deposit'].'</b></td></tr>';

if(!empty($rowfeedetail['due'])){
    $receipt_ui .= '<tr style="line-height:16px;"><td>&nbsp;&nbsp;Due Amount</td><td>&nbsp;&nbsp;'.$rowfeedetail['due'].'</td></tr>';
}

$receipt_ui .= '<tr style="line-height:17px;"><td colspan="3" style="font-size:12px;">Sum of Rupees (In Words): <b>'.convert_number_to_words($rowfeedetail['fee_deposit']).'</b></td></tr>';

if(!empty($rowfeedetail['extra_amnt'])){
    $receipt_ui .= '<tr style="line-height:22px;"><td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp;'.$rowfeedetail['extra_amnt'].'</td></tr>';
}

// Pay Mode
$payModeText = '';
if($rowfeedetail['pay_type']=='Cash') $payModeText='Cash';
elseif($rowfeedetail['pay_type']=='Cheque') $payModeText='Cheque, Cheque No - '.$rowfeedetail['cno'].', Date - '.$rowfeedetail['cd'].', Bank - '.$rowfeedetail['bank'];
elseif($rowfeedetail['pay_type']=='Online') $payModeText='Online';
elseif($rowfeedetail['pay_type']=='Paytm') $payModeText='Paytm';

$receipt_ui .= '<tr style="line-height:17px;"><td colspan="3" style="font-size:12px;">Pay Mode: <b>'.$payModeText.'</b></td></tr>';
$receipt_ui .= '<tr style="line-height:17px;"><td colspan="3">Remark : <b>'.$rowfeedetail['remark'].'</b></td></tr>';

// ================= PAID FEES SUMMARY =================
$receipt_ui .= '<tr style="line-height:16px;" align="center"><td colspan="2">Paid Fees Summary</td></tr>
<tr style="line-height:16px;"><td>Old Session Dues (A) : <b>'.$feepq.'</b></td><td>Total Paid Till Date : <b>'.($val4+$val4p).'</b></td></tr>
<tr style="line-height:16px;"><td>Current Session Fees (B) : <b>'.$total_amt.'</b></td><td rowspan="2">Total Balance Till <br>Date : <b>'.($tpaidn-$tpaid-$aconc+$afine).'</b></td></tr>
<tr style="line-height:16px;"><td>Total Payable (A+B) : <b>'.$tpaidn.'</b></td></tr>
<tr style="line-height:12px;"><td colspan="2" style="font-size:11px;">Note : Cheque Payment is subject to realisation, if bounced Rs. 300 will be charged</td></tr>
</table><br><br>
<span style="float:left; margin-left:5px; font-size:14px;">Depositor Signature</span>
<span style="float:right; margin-right:5px; font-size:14px;">Authorized Signature</span>
</div>'; 



$receipt_ui .= '</div></body></html>';



$response['reciept_ui'] = base64_encode($receipt_ui);
$response['student'] = [
    'id' => $rowstud['student_id'],
    'name' => $rowstud['student_name'],
	'father_name' => $rowstud['student_fname'],
    'class' => $rowstud['student_class'],
    'type' => $rowstud['std_type'],
];

$response['fee_summary'] = [
    'old_session_dues' => (float)$feepq,
    'current_session_fees' => (float)$total_amt,
    'total_payable' => (float)$tpaidn,
    'total_paid' => (float)$tpaid,
    'total_concession' => (float)$aconc,
    'total_fine' => (float)$afine,
    'balance' => (float)$balance
];
$detail = mysqli_query($con, "SELECT * FROM fee_detail WHERE id='$fid' AND session='$session'");
$response['fee_detail'] = mysqli_fetch_assoc($detail);

echo json_encode($response, JSON_PRETTY_PRINT);
