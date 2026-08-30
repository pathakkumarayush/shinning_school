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

$reg=mysqli_query($con,"select * from reg_fee where id='".$_GET['id']."' and session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);

 
 
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
	
	<div style="width:100%; height:auto">
	<div class="watermark" style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin-left:0;">
    <div style="border:#FF0000 0px solid; height:auto">
	<div style="width:420px; height:70px;">
    <div style="float:left;height:70px; ">
	<img src="frr.png" style="width:330px; height:50px; margin-left:0px;">
	<center><span style=" font-size:14px;">Fee Receipt - Parents Copy</span></center>
    </div>

	</div>
	</div>
	<div style=" border:#000000 1px solid; width:328px; margin:0px 0px 0px 0px;"></div>
	<table class="table" style="margin:5px 0px 0px 1px; width:360px; font-weight:bold; font-size:12px;" border="0">
    
               <tr style="font-weight:bold;">
               <td style="width:90px;">RECEIPT NO. :&nbsp;</td>
               <td style="width:100PX;"><?php echo $rowstud['rcno'];  ?></td>
			   <td style="width:65px;">REG. NO. :&nbsp;</td>
               <td style="width:100PX;"><?php echo $rowstud['rno'];  ?></td>
			   </tr>
			   
			   
			   <tr>               
               <td colspan="4">DATE :&nbsp;
               <?php echo ucwords($rowstud['date']);  ?></td>
			   </tr>
			   
			   
               <tr>               
               <td colspan="4">NAME OF THE STUDENT:&nbsp;
               <?php echo ucwords($rowstud['sname']);  ?></td>
			   </tr>
			   
			   <tr>               
               <td colspan="4">CLASS :&nbsp;
               <?php echo ucwords($rowstud['class']);  ?></td>
			   </tr>
			  
			  <tr>
			   <td colspan="4">FATHER'S NAME :&nbsp;
               <?php echo $rowstud['fname'];  ?></td> 
			    </tr>
			  
			  <tr>
			   <td colspan="4">MOBILE NO :&nbsp;
               <?php echo $rowstud['mobile'];  ?></td> 
			    </tr>
				
			   </table>
		       <?php
			   $i=1;
			   $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
			   $rowid=mysqli_fetch_array($maxid);
			   ?>
          <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:12px; font-weight:bold; width:99%;">
		  
		  <tr style="font-weight:bold; line-height:25px;">
	      <td align="center" colspan="3">Session : <?php echo $_SESSION['session']; ?></td>
		  </tr>
		  
		  <tr style="font-weight:bold; line-height:25px;">
	     <td align="center">No</td>
		  <td align="center">Particulars</td>
		  <td align="center">Amount</td>
		  </tr>
		  
		   <?php
		   if(!empty($rowstud['amt']))
		   {
		   ?>
		   <tr style="line-height:20px;">
		   <td>&nbsp;&nbsp;1.</td>
		   <td>&nbsp;&nbsp;Registration Charges</td>
		   <td>&nbsp;&nbsp; <?php echo $rowstud['amt']; ?></td>
		   </tr>
		   <?php } ?> 
		   
		   <tr style="line-height:20px;">
		   <td>&nbsp;&nbsp;2.</td>
		   <td>&nbsp;&nbsp;Concession</td>
		   <td>&nbsp;&nbsp; <?php echo $rowstud['con']; ?></td>
		   </tr>
		
		
		  
		  <tr style="line-height:20px;">
		 
		  <td colspan="2"><b>&nbsp;&nbsp;Received Amount</b></td>
		  <td>&nbsp;&nbsp;<b><?php echo $rowstud['pamt']; ?></b></td>
		   
		  </tr>
		  
		   <tr style="line-height:22px;">
		   <td colspan="3" style="font-size:12px;">Sum of Rupees (In Words): <b><?php echo convert_number_to_words($rowstud['amt']); ?></b></td>
		  </tr>
		  
		   <tr style="line-height:22px;">
		   <td colspan="3" style="font-size:12px;">Pay Mode: <b>
		   <?php
		   if($rowstud['ftype']=='Cash')
		   {
		   echo 'Cash';
		   } 
		   
		   if($rowstud['ftype']=='Cheque')
		   {
		   echo 'Cheque';
		   ?>
		  ,&nbsp;Cheque No - <?php  echo $rowstud['cno'];  ?>
		  <br>
		  Date - <?php  echo $rowstud['dat'];  ?>, Bank - <?php  echo $rowstud['bank'];  ?>
		   <?php
		   } 
		   ?>
		   
		   <?php
		   if($rowstud['ftype']=='Neft')
		   {
		   echo 'Neft/Rtgs/Imps';
		   ?>
		  ,&nbsp;Transaction Id - <?php  echo $rowstud['ne_no'];  ?>,  Date - <?php  echo $rowstud['ndat'];  ?>
		  
		   <?php
		   } 
		   ?>
		   
		   <?php
		   if($rowstud['ftype']=='Swipe')
		   {
		   echo 'Swipe';
		   ?>
		 
		   <?php
		   } 
		   ?>
		  
		   
		   
		   </b>
		   </td>
		  </tr>
		  
		  <?php
		  if(!empty($rowfeedetail['extra_amnt']))
		  {
		  ?>
		  <tr style="line-height:22px;">
		  <td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp; <?php  echo $rowfeedetail['extra_amnt']; ?></td>
		 
		  </tr>
		   <?php }?>
		  
		  </table>				
		<br><br>
		 <span style="float:right; margin-right:25px">Authorized Signature</span>
		 <br> <br> 
		 
		
		
		</div>
						
      
	    </div>  
				
	<div class="watermark" style="border:#CCC 2px solid; min-height:auto; float:right; width:330px;">
    <div style="border:#FF0000 0px solid; height:auto">
	<div style="width:420px; height:70px;">
    <div style="float:left;height:70px; ">
	<img src="frr.png" style="width:330px; height:50px; margin-left:0px;">
	<center><span style=" font-size:14px;">Fee Receipt - Office Copy</span></center>
    </div>

	</div>
	</div>
	<div style=" border:#000000 1px solid; width:328px; margin:0px 0px 0px 0px;"></div>
	<table class="table" style="margin:5px 0px 0px 1px; width:360px; font-weight:bold; font-size:12px;" border="0">
    
               <tr style="font-weight:bold;">
               <td style="width:90px;">RECEIPT NO. :&nbsp;</td>
               <td style="width:100PX;"><?php echo $rowstud['rcno'];  ?></td>
			   <td style="width:65px;">REG. NO. :&nbsp;</td>
               <td style="width:100PX;"><?php echo $rowstud['rno'];  ?></td>
			   </tr>
			   
			   
			   <tr>               
               <td colspan="4">DATE :&nbsp;
               <?php echo ucwords($rowstud['date']);  ?></td>
			   </tr>
			   
			   
               <tr>               
               <td colspan="4">NAME OF THE STUDENT:&nbsp;
               <?php echo ucwords($rowstud['sname']);  ?></td>
			   </tr>
			   
			   <tr>               
               <td colspan="4">CLASS :&nbsp;
               <?php echo ucwords($rowstud['class']);  ?></td>
			   </tr>
			  
			  <tr>
			   <td colspan="4">FATHER'S NAME :&nbsp;
               <?php echo $rowstud['fname'];  ?></td> 
			    </tr>
			  
			  <tr>
			   <td colspan="4">MOBILE NO :&nbsp;
               <?php echo $rowstud['mobile'];  ?></td> 
			    </tr>
				
			   </table>
		       <?php
			   $i=1;
			   $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
			   $rowid=mysqli_fetch_array($maxid);
			   ?>
          <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:12px; font-weight:bold; width:99%;">
		  
		  <tr style="font-weight:bold; line-height:25px;">
	      <td align="center" colspan="3">Session : <?php echo $_SESSION['session']; ?></td>
		  </tr>
		  
		  <tr style="font-weight:bold; line-height:25px;">
	     <td align="center">No</td>
		  <td align="center">Particulars</td>
		  <td align="center">Amount</td>
		  </tr>
		  
		   <?php
		   if(!empty($rowstud['amt']))
		   {
		   ?>
		   <tr style="line-height:20px;">
		   <td>&nbsp;&nbsp;1.</td>
		   <td>&nbsp;&nbsp;Registration Charges</td>
		   <td>&nbsp;&nbsp; <?php echo $rowstud['amt']; ?></td>
		   </tr>
		   <?php } ?> 
		   
		   <tr style="line-height:20px;">
		   <td>&nbsp;&nbsp;2.</td>
		   <td>&nbsp;&nbsp;Concession</td>
		   <td>&nbsp;&nbsp; <?php echo $rowstud['con']; ?></td>
		   </tr>
		
		  
		  <tr style="line-height:20px;">
		 
		  <td colspan="2"><b>&nbsp;&nbsp;Received Amount</b></td>
		  <td>&nbsp;&nbsp;<b><?php echo $rowstud['pamt']; ?></b></td>
		   
		  </tr>
		  
		   <tr style="line-height:22px;">
		   <td colspan="3" style="font-size:12px;">Sum of Rupees (In Words): <b><?php echo convert_number_to_words($rowstud['amt']); ?></b></td>
		  </tr>
		  
		   <tr style="line-height:22px;">
		   <td colspan="3" style="font-size:12px;">Pay Mode: <b>
		   <?php
		   if($rowstud['ftype']=='Cash')
		   {
		   echo 'Cash';
		   } 
		   
		   if($rowstud['ftype']=='Cheque')
		   {
		   echo 'Cheque';
		   ?>
		  ,&nbsp;Cheque No - <?php  echo $rowstud['cno'];  ?>
		  <br>
		  Date - <?php  echo $rowstud['dat'];  ?>, Bank - <?php  echo $rowstud['bank'];  ?>
		   <?php
		   } 
		   ?>
		   
		   <?php
		   if($rowstud['ftype']=='Neft')
		   {
		   echo 'Neft/Rtgs/Imps';
		   ?>
		  ,&nbsp;Transaction Id - <?php  echo $rowstud['ne_no'];  ?>,  Date - <?php  echo $rowstud['ndat'];  ?>
		  
		   <?php
		   } 
		   ?>
		   
		   <?php
		   if($rowstud['ftype']=='Swipe')
		   {
		   echo 'Swipe';
		   ?>
		 
		   <?php
		   } 
		   ?>
		  
		   
		   
		   </b>
		   </td>
		  </tr>
		  
		  <?php
		  if(!empty($rowfeedetail['extra_amnt']))
		  {
		  ?>
		  <tr style="line-height:22px;">
		  <td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp; <?php  echo $rowfeedetail['extra_amnt']; ?></td>
		 
		  </tr>
		   <?php }?>
		  
		  </table>				
		<br><br>
		 <span style="float:right; margin-right:25px">Authorized Signature</span>
		 <br> <br> 
		 
		
		
		</div>
						
      
	    </div>	
		
		</div>		
		<br><br><br><br>
		
</body>
</html>