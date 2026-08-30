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
$getdetail=mysqli_query($con,"select * from fee_detail_preivios where student='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 
 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
$expl = explode(",",$rowfeedetail['month']);
		
		 $count1=count($expl);
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
</style>
</head>

<html xmlns="http://www.w3.org/1999/xhtml">
	
	    <body>
		<div style="width:100%;height:auto;">
	    <div style="border:#CCC 1px solid; float:left; height:450px;width:330px; margin:0px 0px 0px 0px;">
        <div>
		<div style="float:left;"> <img src="images/logo.jpg" style="width:55px; height:50px; margin-left:1px;">  </div>
		<div style="border:#FF0000 0px solid; float:left;height:auto">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         $rowsch=mysqli_fetch_array($school);
		 ?>
		<span style="font-size:20px; color:#990000; ">Kabra Memorial Public School</span><br>
		<span style="font-size:15px; color:#990000; margin-left:7px; ">Pipariya Road, Kamti, Gadarwara.</span><br>
		<span style="font-size:14px; color:#990000; margin-left:7px;"> Phone No. :- 07791 - 255501,255505</span>
		<br>
		<label style="font-size:15px; font-weight:bold;  margin-left:15px">RECEIPT - Office Copy</label>
		</div>
		</div>
		<br clear="all">
	    <div style=" border:#000000 1px solid; width:698x; margin:0px 0px 0px 0px;"></div>
		 <table class="table"  style="width:340px; font-size:12px;margin:0px 0px 0px 0px; " border="0">
         <tr><td>Receipt </td><td>
	     <?php echo $rowfeedetail['receiptno'];  ?> </td>
	     <td>Date</td>
         <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
         </tr>
         <tr>
         <td>Name</td>
         <td><?php echo ucwords($rowstud['student_name']);  ?></td>
		 <td>Father</td>
         <td><?php echo ucwords($rowstud['student_fname']);  ?></td>  
		 </tr>
		 <tr>
			  
                      <td>Class</td>
                      <td><?php echo $rowstud['student_class'];  ?></td>      
                      <td>Adm. No.</td>
                      <td><?php echo $rowstud['student_scholar'];  ?></td>  
               </tr>
         <tr>  
	     <td>Month</td> 
		 <td colspan="3">
		 <?php 
		 if( $rowfeedetail['month']=='April,July,August,September,October,November,December,January,February,March') 
		 {
		 echo 'April To March';
		 }else{
		 echo $rowfeedetail['month']; 
		 }
		 ?> 
		 </td>
         </tr>
		 </table>
		
         <div class="table" style="border:#FF0000 0px solid; height:240px; margin:10px 0px 0px 0px">
          
           <table  border="1" cellspacing="0" cellpadding="0" style="font-size:13px; width:99%">
							<tr style="font-weight:bold">
							<td align="center">Particulars</td>
							<td align="center">Amount(Rs)</td>
							</tr>
                            
						    <tr>
						   <td>Previous Year Fee</td>
						   <td><center><?php echo $rowfeedetail['p_year'];?> </center></td>
						   </tr>
						   
						
						   
						   <?php
		                   if(!empty($rowfeedetail['pdue']))
		                    {
		                   ?>
						   <tr>
						   <td>Privious Year Due</td>
						   <td><center><?php echo $rowfeedetail['pdue'];?> </center></td>
						   </tr>
						   <?php }?>
						   
						   
						   <tr>
						   <td><b>Total Amount</b></td>
						   <td style="font-weight:bold"><center><?php echo $rowfeedetail['scout']; ?></center></td>
						   </tr>
						   <?php
		                   if(!empty($rowfeedetail['padv']))
		                    {
		                   ?>
						   <tr>
						   <td><b>Advance Fee</b></td>
						   <td><center><?php echo $rowfeedetail['padv']; ?></center></td>
						   </tr>
						   
						   <?php }?>
						   <?php
		                   if(!empty($rowfeedetail['concession']))
		                    {
		                   ?>
						   <tr>
						   <td><b>Discount Amount</b></td>
						   <td><center><?php echo $rowfeedetail['concession']; ?></center></td>
						   </tr>
						    <?php }?>
						   <tr>
						   <td><b>Late
						    Fee</b></td>
						   <td><center><?php echo $rowfeedetail['latefee']; ?></center></td>
						   </tr>
						   
						  
						   <?php
						   if($duerow['extra_amnt']>0)
						   {
						   ?>
						   <td><b>Amount In Advance(Rs)</b></td>
						   <td align="center"><b>
						   <?php
						   $val1=$val1-$duerow['extra_amnt'];
						   echo $duerow['extra_amnt']; 
						   ?></b></td>
						   <td></td>
						   </tr>
						   <?php } ?>
						   <tr>
						    
							
						   <td><b>Grand Total Amount(Rs)</b></td>
						   <td align="center" style="font-weight:bold"><div id="tamt"><?php 
						   echo $rowfeedetail['tamnt']; 
						   ?>									
						   </div>
						   </td>
						   <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>">
						   <input type="hidden" name="class" value="<?php echo $studrow['student_class']; ?>">
						   <input type="hidden" name="month" value="<?php echo $_SESSION['month1']; ?>">
						   <input type="hidden" name="amt" value="<?php echo $val1; ?>">
						   </tr>
						  
                           <tr>
						 
						   <td><b>Amount Paid</b></td>
						   <td align="center" style="font-weight:bold"><?php echo $rowfeedetail['fee_deposit']; ?></td> 
						   </tr>
						    <?php
		                   if(!empty($rowfeedetail['extra_amnt']))
		                    {
		                   ?>
						   <tr>
						  
						   <td><b>Extra Amount</b></td>
						   <td align="center"><?php echo $rowfeedetail['extra_amnt']; ?></td> 
						   </tr>
						   <?php }?>
						   
						   <?php
		                   if(!empty($rowfeedetail['due']))
		                   {
		                   ?>
						   <tr>
						   <td><b>Due Amount</b></td>
						   <td align="center"><?php echo $rowfeedetail['due']; ?></td> 
						   </tr>
						   <?php }?>
						   <tr>
						   <td colspan="2">Payment Type -
						   <b><?php echo $rowfeedetail['ftype']; ?></b>
						   <?php
		                   if(!empty($rowfeedetail['cd']))
		                   {
		                   ?>
						   Cheque No - <b><?php echo $rowfeedetail['cno']; ?></b> &nbsp;&nbsp; Dated - <b><?php echo $rowfeedetail['cd']; ?></b> 
						   <?php
						   }
						   ?>
						   </td>
						   </tr>
						   </table>
						   <br>
						    <span style="float:left; margin-right:10px">Cashier/Receiver</span>
						   <span style="float:right; margin-right:10px">Depositor</span>
						   <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
						   </div>
						 </div>  
		
		<div style="border:#CCC 1px solid; float:left; height:450px;width:330px; margin-left:50px;">
        <div>
		<div style="float:left;"> <img src="images/logo.jpg" style="width:55px; height:50px; margin-left:1px;">  </div>
		<div style="border:#FF0000 0px solid; float:left;height:auto">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         $rowsch=mysqli_fetch_array($school);
		 ?>
		<span style="font-size:20px; color:#990000; ">Kabra Memorial Public School</span><br>
		<span style="font-size:15px; color:#990000; margin-left:7px; ">Pipariya Road, Kamti, Gadarwara.</span><br>
		<span style="font-size:14px; color:#990000; margin-left:7px;"> Phone No. :- 07791 - 255501,255505</span>
		<br>
		<label style="font-size:15px; font-weight:bold;  margin-left:15px">RECEIPT - Student Copy</label>
		</div>
		</div>
		<br clear="all">
	    <div style=" border:#000000 1px solid; width:698x; margin:0px 0px 0px 0px;"></div>
		 <table class="table"  style="width:340px; font-size:12px;margin:0px 0px 0px 0px; " border="0">
         <tr><td>Receipt </td><td>
	     <?php echo $rowfeedetail['receiptno'];  ?> </td>
	     <td>Date</td>
         <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
         </tr>
         <tr>
         <td>Name</td>
         <td><?php echo ucwords($rowstud['student_name']);  ?></td>
		 <td>Father</td>
         <td><?php echo ucwords($rowstud['student_fname']);  ?></td>  
		 </tr>
		 <tr>
			  
                      <td>Class</td>
                      <td><?php echo $rowstud['student_class'];  ?></td>      
                      <td>Adm. No.</td>
                      <td><?php echo $rowstud['student_scholar'];  ?></td>  
               </tr>
         <tr>  
	     <td>Month</td> 
		 <td colspan="3">
		 <?php 
		 if( $rowfeedetail['month']=='April,July,August,September,October,November,December,January,February,March') 
		 {
		 echo 'April To March';
		 }else{
		 echo $rowfeedetail['month']; 
		 }
		 ?> 
		 </td>
         </tr>
		 </table>
		
         <div class="table" style="border:#FF0000 0px solid; height:240px; margin:10px 0px 0px 0px">
          
           <table  border="1" cellspacing="0" cellpadding="0" style="font-size:13px; width:99%">
							<tr style="font-weight:bold">
							<td align="center">Particulars</td>
							<td align="center">Amount(Rs)</td>
							</tr>
                            
						    <tr>
						   <td>Previous Year Fee</td>
						   <td><center><?php echo $rowfeedetail['p_year'];?> </center></td>
						   </tr>
						   
						
						   
						   <?php
		                   if(!empty($rowfeedetail['pdue']))
		                    {
		                   ?>
						   <tr>
						   <td>Privious Year Due</td>
						   <td><center><?php echo $rowfeedetail['pdue'];?> </center></td>
						   </tr>
						   <?php }?>
						   
						   
						   <tr>
						   <td><b>Total Amount</b></td>
						   <td style="font-weight:bold"><center><?php echo $rowfeedetail['scout']; ?></center></td>
						   </tr>
						   <?php
		                   if(!empty($rowfeedetail['padv']))
		                    {
		                   ?>
						   <tr>
						   <td><b>Advance Fee</b></td>
						   <td><center><?php echo $rowfeedetail['padv']; ?></center></td>
						   </tr>
						   
						   <?php }?>
						   <?php
		                   if(!empty($rowfeedetail['concession']))
		                    {
		                   ?>
						   <tr>
						   <td><b>Discount Amount</b></td>
						   <td><center><?php echo $rowfeedetail['concession']; ?></center></td>
						   </tr>
						    <?php }?>
						   <tr>
						   <td><b>Late
						    Fee</b></td>
						   <td><center><?php echo $rowfeedetail['latefee']; ?></center></td>
						   </tr>
						   
						  
						   <?php
						   if($duerow['extra_amnt']>0)
						   {
						   ?>
						   <td><b>Amount In Advance(Rs)</b></td>
						   <td align="center"><b>
						   <?php
						   $val1=$val1-$duerow['extra_amnt'];
						   echo $duerow['extra_amnt']; 
						   ?></b></td>
						   <td></td>
						   </tr>
						   <?php } ?>
						   <tr>
						    
							
						   <td><b>Grand Total Amount(Rs)</b></td>
						   <td align="center" style="font-weight:bold"><div id="tamt"><?php 
						   echo $rowfeedetail['tamnt']; 
						   ?>									
						   </div>
						   </td>
						   <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>">
						   <input type="hidden" name="class" value="<?php echo $studrow['student_class']; ?>">
						   <input type="hidden" name="month" value="<?php echo $_SESSION['month1']; ?>">
						   <input type="hidden" name="amt" value="<?php echo $val1; ?>">
						   </tr>
						  
                           <tr>
						 
						   <td><b>Amount Paid</b></td>
						   <td align="center" style="font-weight:bold"><?php echo $rowfeedetail['fee_deposit']; ?></td> 
						   </tr>
						    <?php
		                   if(!empty($rowfeedetail['extra_amnt']))
		                    {
		                   ?>
						   <tr>
						  
						   <td><b>Extra Amount</b></td>
						   <td align="center"><?php echo $rowfeedetail['extra_amnt']; ?></td> 
						   </tr>
						   <?php }?>
						   
						   <?php
		                   if(!empty($rowfeedetail['due']))
		                   {
		                   ?>
						   <tr>
						   <td><b>Due Amount</b></td>
						   <td align="center"><?php echo $rowfeedetail['due']; ?></td> 
						   </tr>
						   <?php }?>
						   <tr>
						   <td colspan="2">Payment Type -
						   <b><?php echo $rowfeedetail['ftype']; ?></b>
						   <?php
		                   if(!empty($rowfeedetail['cd']))
		                   {
		                   ?>
						   Cheque No - <b><?php echo $rowfeedetail['cno']; ?></b> &nbsp;&nbsp; Dated - <b><?php echo $rowfeedetail['cd']; ?></b> 
						   <?php
						   }
						   ?>
						   </td>
						   </tr>
						   </table>
						   <br>
						    <span style="float:left; margin-right:10px">Cashier/Receiver</span>
						   <span style="float:right; margin-right:10px">Depositor</span>
						  
						   </div>
						 </div>
				
		</div>		
		<br><br><br><br>
		
</body>
</html>