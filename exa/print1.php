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
if(!empty($_GET['id']))
{
$getdetail=mysqli_query($con,"select * from fee_detail where sch='".$_GET['id']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_scholar='".$rowfeedetail['sch']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 
 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
$expl = explode(",",$rowfeedetail['month']);
		
		 $count1=count($expl);
 }

          $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
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
.watermark {
  
  
  display: block;
  position: relative;
}

.watermark::after {
 content: "";
 background:url(wn.png);
 background-repeat: no-repeat;
  opacity: 0.2;
  top: 16%;
  left: 8%;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1;   
}

</style>
</head>

<html xmlns="http://www.w3.org/1999/xhtml">
	
<body>
	
	
	
			
		<div style="width:100%; height:auto;">
	
	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin-left:0;">
    
	<div style="width:100%; height:70px;"></div>
	
	
	<div style="border:#FF0000 0px solid; height:auto">
	<center><span style=" font-size:13px; font-weight:bold;">PARENTS COPY</span></center>
	<br clear="all">
	<div style="float:left; width:64%; height:120px;">
	<span style="font-size:12px; margin-left:5px;"><b>DELHI PUBLIC SCHOOL</b></span><br>
	<span style="font-size:12px; margin-left:5px;">NH-24, Opp. US Foods,</span><br>
	<span style="font-size:12px; margin-left:5px;">Gajraula, Distt Amroha</span><br><br>
	<span style="font-size:12px; margin-left:5px;"><b>A/C No. 31160100017373</b></span><br>
	<span style="font-size:12px; margin-left:5px;"><b>IFSC CODE : BARBOGAJRAL</b></span><br>
	</div>

    <div style="float:left; width:34%; height:120px;">
	<span style="font-size:12px;"><b>BANK OF BARODA</b></span><br>
	<span style="font-size:12px;">Dhanora Road</span><br>
	<span style="font-size:12px;">Main Market, Gajraula</span><br><br><br>
	<span style="font-size:12px;">Dated : <?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></span><br>
	</div>
    <br clear="all">
	</div>
	
	<table class="table" style="margin:5px 0px 0px 1px; width:325px; font-size:12px;" border="0">
    
               <tr>
               <td>Received from (Student's Name): &nbsp;<?php echo $rowstud['student_name'];  ?></td>
               </tr>
			   
			   <tr>
			   <td>Father's Name: &nbsp;<?php echo $rowstud['student_fname'];  ?></td>
               </tr>
			   
			   <tr>
			   <td>Class & Sec: &nbsp;<?php echo $rowstud['student_class'];  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adm. No. : &nbsp;<?php echo $rowstud['student_scholar']; ?></td>
               </tr>
			   
			   <tr>
			   <td>By Cash/Cheque No. : &nbsp;
		       <?php
			   if($rowfeedetail['pay_type']=='Cash')
		       {
		       echo 'Cash';
		       } 
			  
			   if($rowfeedetail['pay_type']=='Cheque')
		       {
		       echo $rowfeedetail['cno']; 
		       } 
			   
			   ?>
			   </td>
               </tr>
			   
			   <tr>
			   <td>Drewee Bank:</td>
               </tr>
			   
			   
			   <tr>
			   <td>for the month of &nbsp; 
			   <?php
			   if($rowfeedetail['month']=='April')
		       {
		       echo 'April,May,June,July 2022';
		       } 
			   if($rowfeedetail['month']=='August')
		       {
		       echo 'Aug,Sept,Oct,Nov 2022';
		       } 
			   if($rowfeedetail['month']=='December')
		       {
		       echo 'Dec,Jan,Feb,March 2022';
		       } 
			   
			   if($rowfeedetail['month']=='April,August,December')
		       {
		       echo 'April 2022 To March 2023';
		       } 
			   
			   ?>
			   </td>
               </tr>
			   </table>
			   
    <table border="1" cellspacing="0" cellpadding="0" style="font-size:12px; margin-top:25px; font-weight:bold; width:99%;">
		  
		  <tr style="font-weight:bold; line-height:40px;">
	      <td align="center">No.</td>
		  <td align="center">Particulars</td>
		  <td align="center">Amount</td>
		  </tr>
		  
		
	
		  <tr style="line-height:35px;">
		  <td>&nbsp;&nbsp;1.</td>
		  <td>&nbsp;&nbsp;<?php echo $rowfeedetail['instalment']; ?></td>
		  <td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']; ?></td>
		  </tr>
		  
		  
		 
		
		  
		   <tr style="line-height:35px;">
		   <td>&nbsp;&nbsp;2.</td>
		   <td>&nbsp;&nbsp;Late Fee</td>
		   <td>&nbsp;&nbsp; <?php echo $rowfeedetail['latefee']; ?></td>
		   </tr>
		   
		   <tr style="line-height:35px;">
		   <td>&nbsp;&nbsp;3.</td>
		   <td>&nbsp;&nbsp;Concession Fee</td>
		   <td>&nbsp;&nbsp; <?php echo $rowfeedetail['concession']; ?></td>
		   </tr>
		 
		  <tr style="line-height:35px; font-weight:bold">
		  <td colspan="2" align="right">&nbsp;&nbsp;<span>GRAND TOTAL</span></td><td>&nbsp;&nbsp;<?php echo $rowfeedetail['fee_deposit']; ?> </td>
		  </tr>
         </table>
		 
		 <br><br>
		 <span style="font-size:12px;font-weight:bold; margin-left:10px;">By Accountant</span>  <span style="font-size:12px; margin-left:50px;font-weight:bold;">Deposited by</span> 
		 <span style="font-size:12px; margin-left:60px;font-weight:bold;">Cashier</span>
		 <br> <br> 
		 
	</div>
	
	
	
	
	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin-left:10;">
    <div style="width:100%; height:70px;">
	<span style="font-size:18px; font-weight:bold;"><center><?php echo $rowfeedetail['instalment']; ?> </center></span>
	<span style="font-size:18px; font-weight:bold;"><center>
	<?php
			   if($rowfeedetail['month']=='April')
		       {
		       echo 'April,May,June,July 2022';
		       } 
			   if($rowfeedetail['month']=='August')
		       {
		       echo 'Aug,Sept,Oct,Nov 2022';
		       } 
			   if($rowfeedetail['month']=='December')
		       {
		       echo 'Dec,Jan,Feb,March 2022';
		       } 
			   
			   if($rowfeedetail['month']=='April,August,December')
		       {
		       echo 'April 2022 To March 2023';
		       } 
			   
			   ?>
	
	</center></span>
	<br>
	</div>
	  
	<div style="border:#FF0000 0px solid; height:auto">
	<center><span style=" font-size:13px; font-weight:bold;">SCHOOL COPY</span></center>
	<br clear="all">
	<div style="float:left; width:64%; height:120px;">
	<span style="font-size:12px; margin-left:5px;"><b>DELHI PUBLIC SCHOOL</b></span><br>
	<span style="font-size:12px; margin-left:5px;">NH-24, Opp. US Foods,</span><br>
	<span style="font-size:12px; margin-left:5px;">Gajraula, Distt Amroha</span><br><br>
	<span style="font-size:12px; margin-left:5px;"><b>A/C No. 31160100017373</b></span><br>
	<span style="font-size:12px; margin-left:5px;"><b>IFSC CODE : BARBOGAJRAL</b></span><br>
	</div>

    <div style="float:left; width:34%; height:120px;">
	<span style="font-size:12px;"><b>BANK OF BARODA</b></span><br>
	<span style="font-size:12px;">Dhanora Road</span><br>
	<span style="font-size:12px;">Main Market, Gajraula</span><br><br><br>
	<span style="font-size:12px;">Dated : <?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></span><br>
	</div>
    <br clear="all">
	</div>
	
	<table class="table" style="margin:5px 0px 0px 1px; width:325px; font-size:12px;" border="0">
    
               <tr>
               <td>Received from (Student's Name): &nbsp;<?php echo $rowstud['student_name'];  ?></td>
               </tr>
			   
			   <tr>
			   <td>Father's Name: &nbsp;<?php echo $rowstud['student_fname'];  ?></td>
               </tr>
			   
			   <tr>
			   <td>Class & Sec: &nbsp;<?php echo $rowstud['student_class'];  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adm. No. : &nbsp;<?php echo $rowstud['student_scholar']; ?></td>
               </tr>
			   
			   <tr>
			   <td>By Cash/Cheque No. : &nbsp;
		       <?php
			   if($rowfeedetail['pay_type']=='Cash')
		       {
		       echo 'Cash';
		       } 
			  
			   if($rowfeedetail['pay_type']=='Cheque')
		       {
		       echo $rowfeedetail['cno']; 
		       } 
			   
			   ?>
			   </td>
               </tr>
			   
			   <tr>
			   <td>Drewee Bank:</td>
               </tr>
			   
			   
			   <tr>
			   <td>for the month of &nbsp; 
			   <?php
			   if($rowfeedetail['month']=='April')
		       {
		       echo 'April,May,June,July 2022';
		       } 
			   if($rowfeedetail['month']=='August')
		       {
		       echo 'Aug,Sept,Oct,Nov 2022';
		       } 
			   if($rowfeedetail['month']=='December')
		       {
		       echo 'Dec,Jan,Feb,March 2022';
		       } 
			   
			   if($rowfeedetail['month']=='April,August,December')
		       {
		       echo 'April 2022 To March 2023';
		       } 
			   
			   ?>
			   </td>
               </tr>
			   </table>
			   
    <table border="1" cellspacing="0" cellpadding="0" style="font-size:12px; margin-top:25px; font-weight:bold; width:99%;">
		  
		  <tr style="font-weight:bold; line-height:40px;">
	      <td align="center">No.</td>
		  <td align="center">Particulars</td>
		  <td align="center">Amount</td>
		  </tr>
		  
		
	
		  <tr style="line-height:35px;">
		  <td>&nbsp;&nbsp;1.</td>
		  <td>&nbsp;&nbsp;<?php echo $rowfeedetail['instalment']; ?></td>
		  <td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']; ?></td>
		  </tr>
		  
		  
		 
		
		  
		   <tr style="line-height:35px;">
		   <td>&nbsp;&nbsp;2.</td>
		   <td>&nbsp;&nbsp;Late Fee</td>
		   <td>&nbsp;&nbsp; <?php echo $rowfeedetail['latefee']; ?></td>
		   </tr>
		   
		   <tr style="line-height:35px;">
		   <td>&nbsp;&nbsp;3.</td>
		   <td>&nbsp;&nbsp;Concession Fee</td>
		   <td>&nbsp;&nbsp; <?php echo $rowfeedetail['concession']; ?></td>
		   </tr>
		 
		  <tr style="line-height:35px; font-weight:bold">
		  <td colspan="2" align="right">&nbsp;&nbsp;<span>GRAND TOTAL</span></td><td>&nbsp;&nbsp;<?php echo $rowfeedetail['fee_deposit']; ?> </td>
		  </tr>
         </table>
		 
		 <br><br>
		 <span style="font-size:12px;font-weight:bold; margin-left:10px;">By Accountant</span>  <span style="font-size:12px; margin-left:50px;font-weight:bold;">Deposited by</span> 
		 <span style="font-size:12px; margin-left:60px;font-weight:bold;">Cashier</span>
		 <br> <br> 
	</div>
	
	
	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin-left:10;">
    <div style="width:100%; height:70px;"></div>
	  
	<div style="border:#FF0000 0px solid; height:auto">
	<center><span style=" font-size:13px; font-weight:bold;">BANK COPY</span></center>
	<br clear="all">
	<div style="float:left; width:64%; height:120px;">
	<span style="font-size:12px; margin-left:5px;"><b>DELHI PUBLIC SCHOOL</b></span><br>
	<span style="font-size:12px; margin-left:5px;">NH-24, Opp. US Foods,</span><br>
	<span style="font-size:12px; margin-left:5px;">Gajraula, Distt Amroha</span><br><br>
	<span style="font-size:12px; margin-left:5px;"><b>A/C No. 31160100017373</b></span><br>
	<span style="font-size:12px; margin-left:5px;"><b>IFSC CODE : BARBOGAJRAL</b></span><br>
	</div>

    <div style="float:left; width:34%; height:120px;">
	<span style="font-size:12px;"><b>BANK OF BARODA</b></span><br>
	<span style="font-size:12px;">Dhanora Road</span><br>
	<span style="font-size:12px;">Main Market, Gajraula</span><br><br><br>
	<span style="font-size:12px;">Dated : <?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></span><br>
	</div>
    <br clear="all">
	</div>
	
	<table class="table" style="margin:5px 0px 0px 1px; width:325px; font-size:12px;" border="0">
    
               <tr>
               <td>Received from (Student's Name): &nbsp;<?php echo $rowstud['student_name'];  ?></td>
               </tr>
			   
			   <tr>
			   <td>Father's Name: &nbsp;<?php echo $rowstud['student_fname'];  ?></td>
               </tr>
			   
			   <tr>
			   <td>Class & Sec: &nbsp;<?php echo $rowstud['student_class'];  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adm. No. : &nbsp;<?php echo $rowstud['student_scholar']; ?></td>
               </tr>
			   
			   <tr>
			   <td>By Cash/Cheque No. : &nbsp;
		       <?php
			   if($rowfeedetail['pay_type']=='Cash')
		       {
		       echo 'Cash';
		       } 
			  
			   if($rowfeedetail['pay_type']=='Cheque')
		       {
		       echo $rowfeedetail['cno']; 
		       } 
			   
			   ?>
			   </td>
               </tr>
			   
			   <tr>
			   <td>Paid into the credit of A/C No. : 31160100017373<br>
			   of Delhi Public School, Gajraula
			    </td>
               </tr>
			   
			   
			   <tr>
			   <td>Rs(In Words): &nbsp;<?php echo convert_number_to_words($rowfeedetail['fee_deposit']); ?></td>
               </tr>
			   
			   <tr>
			   <td>Rs(In figures): &nbsp;<?php echo $rowfeedetail['fee_deposit']; ?></td>
               </tr>
			   
			   <tr>
			   <td>for the month of &nbsp; 
			   <?php
			   if($rowfeedetail['month']=='April')
		       {
		       echo 'April,May,June,July 2022';
		       } 
			   if($rowfeedetail['month']=='August')
		       {
		       echo 'Aug,Sept,Oct,Nov 2022';
		       } 
			   if($rowfeedetail['month']=='December')
		       {
		       echo 'Dec,Jan,Feb,March 2022';
		       } 
			   
			   if($rowfeedetail['month']=='April,August,December')
		       {
		       echo 'April 2022 To March 2023';
		       } 
			   
			   ?>
			   </td>
               </tr>
			   
			   
			   </table>
			   
    <table border="1" cellspacing="0" cellpadding="0" style="font-size:12px; font-weight:bold; margin-top:12px; width:99%;">
		  
		  <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">X 2000 = </span> </td>  </tr>
		  
		  <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">X 500 = </span> </td>  </tr>
		  
		  <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">X 200 = </span> </td>  </tr>
		  <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">X 100 = </span> </td>  </tr>
		  <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">X 50 = </span> </td>  </tr>
		  <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">X 10 = </span> </td>  </tr>
		  
		   <tr style="font-weight:bold;line-height:20px;"><td><span style="margin-left:30px;">Total </span> </td>  </tr>
	 </table>
	 </table>
		 
		 <br><br>
		 <span style="font-size:12px;font-weight:bold; margin-left:10px;">By Accountant</span>  
		  
		 <span style="font-size:12px; margin-left:180px;font-weight:bold;">Cashier</span>
		 <br> <br> 
	</div>
	
	</div>
		
</body>
</html>