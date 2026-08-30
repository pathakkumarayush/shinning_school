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
$getdetail=mysqli_query($con,"select * from fee_other where student='".$_GET['id']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 
 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and 
 class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
$expl = explode(",",$rowfeedetail['month']);
		
		 $count1=count($expl);
 }

          $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
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
	
	<div style="width:100%; height:auto">

	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin:0px 0px 0px 0px;">
    <div style="border:#FF0000 0px solid; height:auto">
	<div style="width:420px; height:90px;">
    <div style="float:left; width:80px; height:86px; ">
	<img src="logo.png" style="width:70px; height:70px; margin-left:5px;">
    </div>
    <div style="float:left; width:300px; margin-left:0px; margin-top:5px;">
	<span style=" font-size:19px; color:#000; margin-left:10px; font-weight:bold;">Goyenka Public School</span><br>
	<span style=" font-size:15px; margin-left:1px; padding:3PX;">Panchkuiyaan tiraha , jhansi - 284001</span><br>
	<span style=" font-size:14px; margin-left:50px; ">Phone - 97429 34239</span><br>
    <span style=" font-size:14px; margin-left:28px; float:left; font-weight:bold;"><center>Fee Receipt - Office Copy</center></span>
	</div>
	</div>
	</div>
	<div style=" border:#000000 1px solid; width:328px; margin:0px 0px 0px 0px;"></div>
	<table class="table" style="margin:5px 0px 0px 1px; width:330px; font-size:13px;" border="0">
    <tr style="font-weight:bold;">
    <td style="font-weight:bold;">R.No:</td>
    <td><?php echo ucwords($rowfeedetail['receiptno']); ?></td>
	<td>Date:</td>
    <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
    </tr>
               <tr>
               <td width="50px">S-Name:</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
			   <td>S-Class:</td>
               <td><?php echo $rowstud['student_class'];  ?></td> 
               </tr>
               <tr>               
              
			  
			   </table>
		       <?php
			   $i=1;
			   $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
			   $rowid=mysqli_fetch_array($maxid);
			   ?>
          <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:99%;">
		  <tr style="font-weight:bold; line-height:20px;">
	      <td align="center">Particulars</td>
		  <td align="center">Amount</td>
		  </tr>
		   <?php
		   if(!empty($rowfeedetail['adm_fee']))
		   {
		   ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Admission Fee</td><td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['adm_fee']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?>
		 
		  <?php
		  if(!empty($rowfeedetail['caution']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Caution Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['caution']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		  <?php
		  if(!empty($rowfeedetail['reg']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Registration Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['reg']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['computer']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Computer Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['computer']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  
		   <?php
		   if(!empty($rowfeedetail['anual']))
		   {
		   ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Term Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['anual']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		  <?php
		  if(!empty($rowfeedetail['belt']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;SECURITY FEE(Refundable)</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['belt']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['tie']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;I-CARD</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['tie']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['dairy']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;SCHOOL DIARY</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['dairy']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		  <?php
		  if(!empty($rowfeedetail['books']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Books and Copies</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['books']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  
		  <?php
		  if(!empty($rowfeedetail['gfan']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Gen. And  Fan</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['gfan']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['stn']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Stationary</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['stn']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  
		  
		   <?php
		   if(!empty($rowfeedetail['inst_fee_bus']))
		   {
		   ?>
		  <tr style="line-height:21px;">
		  <td align="right">&nbsp;&nbsp;Transport Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee_bus']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		 
		
		  <?php
		  if(!empty($rowfeedetail['pdue']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Previous due</td><td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['pdue']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?>
		  

		
		  <tr style="line-height:21px;">
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td>
		  <td align="right">&nbsp;&nbsp; <b><?php echo $rowfeedetail['fee_deposit']; ?></b>&nbsp;&nbsp;</td>
		   

		  <tr style="line-height:21px;">
		  <td td colspan="3"><b>&nbsp;&nbsp;Remark</b>&nbsp;&nbsp;:-<b><?php echo $rowfeedetail['remark']; ?></b></td>
		  </tr>
         </table>	<br>			
		<input id="printpagebutton" style=" float:left" type="button"  value="Print Receipt" onClick="printpage()"/>
		 <span style="float:right; margin-right:50px">Signature</span><br>
		
		</div>
						
      
	    </div>  
				
	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:330px; margin-left:30px;">
    <div style="border:#FF0000 0px solid; height:auto">
	<div style="width:420px; height:90px;">
    <div style="float:left; width:80px; height:86px; ">
	<img src="logo.png" style="width:70px; height:70px; margin-left:5px;">
    </div>
    <div style="float:left; width:300px; margin-left:0px; margin-top:5px;">
	<span style=" font-size:19px; color:#000; margin-left:10px; font-weight:bold;">Goyenka Public School</span><br>
	<span style=" font-size:15px; margin-left:1px; padding:3PX;">Panchkuiyaan tiraha , jhansi - 284001</span><br>
	<span style=" font-size:14px; margin-left:50px; ">Phone - 97429 34239</span><br>
    
    <span style=" font-size:14px; margin-left:28px; float:left; font-weight:bold;"><center>Fee Receipt - Parents Copy</center></span>
	</div>
	</div>
	</div>
	<div style=" border:#000000 1px solid; width:328px; margin:0px 0px 0px 0px;"></div>
	<table class="table" style="margin:5px 0px 0px 1px; width:330px; font-size:13px;" border="0">
    <tr style="font-weight:bold;">
    <td style="font-weight:bold;">R.No:</td>
    <td><?php echo ucwords($rowfeedetail['receiptno']); ?></td>
	<td>Date:</td>
    <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
    </tr>
               <tr>
               <td width="50px">S-Name:</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
			   <td>S-Class:</td>
               <td><?php echo $rowstud['student_class'];  ?></td> 
               </tr>
               <tr>               
              
			  
			   </table>
		       <?php
			   $i=1;
			   $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
			   $rowid=mysqli_fetch_array($maxid);
			   ?>
          
		  <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:99%;">
		  <tr style="font-weight:bold; line-height:20px;">
	      <td align="center">Particulars</td>
		  <td align="center">Amount</td>
		  </tr>
		   <?php
		   if(!empty($rowfeedetail['adm_fee']))
		   {
		   ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Admission Fee</td><td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['adm_fee']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?>
		 
		  <?php
		  if(!empty($rowfeedetail['caution']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Caution Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['caution']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		  <?php
		  if(!empty($rowfeedetail['reg']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;REGISTRATION FEE</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['reg']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['computer']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Computer Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['computer']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  
		   <?php
		   if(!empty($rowfeedetail['anual']))
		   {
		   ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Term Fee</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['anual']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		  <?php
		  if(!empty($rowfeedetail['belt']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;SECURITY FEE(Refundable)</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['belt']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['tie']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;I-CARD</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['tie']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['dairy']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;SCHOOL DIARY</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['dairy']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		  <?php
		  if(!empty($rowfeedetail['books']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Books and Copies</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['books']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  
		  <?php
		  if(!empty($rowfeedetail['gfan']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Gen. And  Fan</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['gfan']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  <?php
		  if(!empty($rowfeedetail['stn']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Stationary</td>
		  <td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['stn']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		  
		  
		  
		   <?php
		   if(!empty($rowfeedetail['inst_fee_bus']))
		   {
		   ?>
		  <tr style="line-height:21px;">
		  <td align="right">&nbsp;&nbsp;Transport Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee_bus']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?> 
		 
		 
		
		  <?php
		  if(!empty($rowfeedetail['pdue']))
		  {
		  ?>
		  <tr style="line-height:21px;">
		  <td>&nbsp;&nbsp;Previous due</td><td align="right">&nbsp;&nbsp; <?php echo $rowfeedetail['pdue']; ?>&nbsp;&nbsp;</td>
		  </tr>
		  <?php } ?>
		  

		
		  <tr style="line-height:21px;">
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td>
		  <td align="right">&nbsp;&nbsp; <b><?php echo $rowfeedetail['fee_deposit']; ?></b>&nbsp;&nbsp;</td>
		   

		  <tr style="line-height:21px;">
		  <td td colspan="3"><b>&nbsp;&nbsp;Remark</b>&nbsp;&nbsp;:-<b><?php echo $rowfeedetail['remark']; ?></b></td>
		  </tr>
         </table>				
		 <br>
		 <span style="float:right; margin-right:50px">Signature</span><br>
		 </div>
						
      
	    </div>	
		<br><br>
			
</div>		
		
		<br><br><br><br>
		
</body>
</html>