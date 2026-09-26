<?php
session_start();
require_once("../db.php");
?>
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
if(!empty($_GET['id']))
{
$getdetail=mysqli_query($con,"select * from fee_detail where student='".$_GET['id']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 

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
/* background:url(wn.png);*/
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
	<div style="width:1030PX; height:auto; font-weight:bold;">
    <div style="width:100%">
	<center><img src="F.png" style=" margin-left:-135px;"></center>
	<center><span style="margin-left:-197px;">FEE  STRUCTURE - CLASS : <?php echo $_GET['class'];?></span></center>
    </div>
	<br clear="all">
     <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
     <?php
	$sql="SELECT * FROM enquiry where id='".$_GET['id']."'";
	$result_set=mysqli_query($con,$sql);
	$i=1;
	$row=mysqli_fetch_array($result_set);
	?>
		 
		 <table class="table" style="margin:5px 0px 0px 1px; width:850px; font-size:15px;font-weight:bold;" border="0">
		       <tr style="line-height:20px;">               
                <td style="width:122px;">STUDENT NAME<td><td>:&nbsp;<?php echo ucwords($row['name']);  ?></td>
			    <td style="width:65px;">FATHER </td><td>:&nbsp;<?php echo ucwords($row['fname']);  ?></td>
				
			   <td style="width:65px;">MOBILE </td><td>:&nbsp;<?php echo ucwords($row['mobile']);  ?></td>
			   <td style="width:50px;">CLASS </td><td>:&nbsp;<?php echo ucwords($row['aclass']);  ?></td>
			   </tr>
			   
			   
		 </table>
		 <br clear="all">
		   <table border="1" cellspacing="0" cellpadding="0" style="font-size:15px; font-weight:bold; width:40%; float:left">
		  
		  <tr style="font-weight:bold; line-height:25px;">
	      <td align="center" colspan="3">Session : <?php echo $_GET['ses']; ?></td>
		  </tr>
		  
		  <tr style="font-weight:bold; line-height:35px;"><td align="center" colspan="2">SCHOOL FEE</td> </tr>
		  
		   <?php
		   $search=mysqli_query($con,"select * from definefee where session='".$_GET['ses']."' and class='".$_GET['class']."' "); 
		   $rowfeedetail=mysqli_fetch_array($search);
		   ?>
		   
		   <?php
		   $adm=mysqli_query($con,"select * from admission where session='".$_GET['ses']."' and class='".$_GET['class']."' "); 
		   $rowadm=mysqli_fetch_array($adm);
		   ?>
		  
		 
		  <tr style="line-height:40px;">
		  <td>&nbsp;&nbsp;School Yearly Fee</td>
		  <td align="center" style="width:160px;"><?php echo $rowfeedetail['amnt']; ?></td>
		  </tr>
		  
		  <tr style="line-height:40px;">
		  <td>&nbsp;&nbsp;Admission Fee</td>
		  <td align="center" style="width:160px;"><?php echo $rowadm['fee']; ?></td>
		  </tr>
		 
		  <?php
		  if($_GET['class']=="XII" || $_GET['class']=="XI" || $_GET['class']=="X")
          {
          ?>
		  <tr style="line-height:40px;">
		  <td>&nbsp;&nbsp;Migration  Fee</td>
		  <td align="center" style="width:160px;"><?php echo $mfee = '3000'; ?></td>
		  </tr>
		  <?php } ?>
		  
		  <tr style="line-height:40px;">
		  <td>&nbsp;&nbsp;Total Fee</td>
		  <td align="center" style="width:160px;"><?php echo $rowfeedetail['amnt']+$rowadm['fee']+$mfee; ?></td>
		  </tr>
		
		   <tr style="line-height:40px;">
		  <td colspan="2" align="center">BUS FEE</td>
		  
		  </tr>
		 
		   
		  <tr style="line-height:45px;">
		  <td>&nbsp;&nbsp;City</td>
		  <td align="center">700-(Per Month)</td>
		  </tr>
		  
		   <tr style="line-height:45px;">
		  <td>Patandev, Arjun Nagar, Ashok Nagar</td>
		  <td align="center">600-(Per Month)</td>
		  </tr>
		 
          </table>				
		 
		 
		   <table border="0" cellspacing="0" cellpadding="0" style="font-size:15px; font-weight:bold; width:40%; float:left; margin-left:40px;">
		  <?php
		  if($_GET['class']=="XII" || $_GET['class']=="XI" || $_GET['class']=="X")
          {
          ?>
		  <tr><td><img src="ND.PNG"></td></tr>
		  <?php }else{?>
		  <tr><td><img src="Dd.PNG"></td></tr>
		   <?php }?>
		  </table>
		
		</div>
	
	</div>

	
		  
						
      	
		<br><br><br><br>
		
</body>
</html>