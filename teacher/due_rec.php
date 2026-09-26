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
$getdetail=mysqli_query($con,"select * from due_amt where sid='".$_GET['id']."' and session='".$_SESSION['session']."' order by id desc limit 1");
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
	
	<div style="width:100%; height:auto">
	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:420px; margin:0px 0px 0px 0px;">
    <div style="border:#FF0000 0px solid; height:auto">
    
	<div style="width:420px; height:108px;">
    <div style="float:left; width:120px; height:96px; ">
	<img src="images/logo.jpg" style="width:90px; height:90px; margin-left:5px;">
    </div>
    <div style="float:left; width:300px; margin-left:0px; margin-top:5px;">
	<span style=" font-size:22px; margin-left:0px; font-weight:bold;">Kabra Memorial Public School</span><br>
	<span style=" font-size:18px;margin-left:0px;">Pipariya Road, Kamti, Gadarwara.</span><br>
	<span style=" font-size:16px; margin-left:0px;">Phone No. :- 07791 - 255501,255505</span><br>
    <span style=" font-size:14px;; float:left">Affiliation No, 1030600</span><br>
	<span style=" font-size:14px;; float:left; font-weight:bold;"><center>Fee Receipt-Office Copy</center></span>
	</div>
	</div>
	</div>
	<div style=" border:#000000 1px solid; width:418px; margin:0px 0px 0px 0px;"></div>
	<table class="table" style="margin:5px 0px 0px 1px; width:420px; font-size:14px;" border="0">
    <tr style="font-weight:bold;">
	<td style="font-weight:bold;">Scholar No:</td>
	<td><?php echo $rowstud['student_scholar']; ?></td>
	<td style="font-weight:bold;">Receipt No:</td>
    <td><?php echo ucwords($rowfeedetail['rno']); ?></td>
    </tr>
               <tr>
               <td width="72px">Std. Name:</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
			   <td>Std. Class:</td>
               <td><?php echo $rowstud['student_class'];  ?></td> 
               </tr>
			
               <tr>               
               <td style="font-size:12px">Father Name:</td>
               <td><?php echo ucwords($rowstud['student_fname']);  ?></td>
			   <td>Date:</td>
               <td><?php echo date("d-m-Y",strtotime($rowfeedetail['due_date']));  ?></td>
               </tr>
				
				<tr>
				<td>Instalment:</td><td colspan="3"><?php echo ucwords($rowfeedetail['inst']); ?></td>
				</tr>
			  </table>
		 <?php
				   $i=1;
				     $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
				     $rowid=mysqli_fetch_array($maxid);
				   
				  ?>
          <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:99%;">
		  <tr style="font-weight:bold; line-height:25px;">
	      <td align="center">Particulars</td>
		  <td align="center">Amount(Rs)</td>
		  </tr>
		  
		  <tr style="line-height:22px;">
		  <td>&nbsp;&nbsp;Total Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['dtamt']; ?>
		  </td>
		  </tr>
		  
		 
          <tr style="line-height:22px;">
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td><td>&nbsp;&nbsp; <b><?php echo $rowfeedetail['pay']; ?></b></td>
		  </tr>
		  
		                  
		    
						 
		  <tr style="line-height:22px;">
		  <td colspan="2">
		  Payment Type-
		  <?php 
		  if
		  ($rowfeedetail['ptype']=='Cash')
		  {
		  echo 'Cash';
		  } 
		  else
		  {
		  echo $rowfeedetail['ptype'];
		  ?>
		 
		  <?php } ?>
		  
		  </td>
		  </tr>
		  </table>
							
		 <br>
	     <br>				
		 <br>
		 <span style="float:left; margin-left:20px;">Accountant</span> <span style="float:right; margin-right:50px">Cashier</span>
		 <br>
		 <br>
		 <br>
		 <span><b>Note-</b>Cheque are subject to realization</span>
		 <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		</div>
						
      
	   		  
			    </div>  
				
				
				
	<div style="border:#CCC 2px solid; min-height:auto; float:left; width:420px; margin-left:95px;">
    <div style="border:#FF0000 0px solid; height:auto">
    
	<div style="width:420px; height:108px;">
    <div style="float:left; width:120px; height:96px; ">
	<img src="images/logo.jpg" style="width:90px; height:90px; margin-left:5px;">
    </div>
    <div style="float:left; width:300px; margin-left:0px; margin-top:5px;">
	<span style=" font-size:22px; margin-left:0px; font-weight:bold;">Kabra Memorial Public School</span><br>
	<span style=" font-size:18px;margin-left:0px;">Pipariya Road, Kamti, Gadarwara.</span><br>
	<span style=" font-size:16px; margin-left:0px;">Phone No. :- 07791 - 255501,255505</span><br>
    <span style=" font-size:14px;; float:left">Affiliation No, 1030600</span><br>
	<span style=" font-size:14px;; float:left; font-weight:bold;"><center>Fee Receipt-Student Copy</center></span>
	</div>
	</div>
	</div>
	<div style=" border:#000000 1px solid; width:418px; margin:0px 0px 0px 0px;"></div>
	<table class="table" style="margin:5px 0px 0px 1px; width:420px; font-size:14px;" border="0">
    <tr style="font-weight:bold;">
	<td style="font-weight:bold;">Scholar No:</td>
	<td><?php echo $rowstud['student_scholar']; ?></td>
	<td style="font-weight:bold;">Receipt No:</td>
    <td><?php echo ucwords($rowfeedetail['rno']); ?></td>
    </tr>
               <tr>
               <td width="72px">Std. Name:</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
			   <td>Std. Class:</td>
               <td><?php echo $rowstud['student_class'];  ?></td> 
               </tr>
			
               <tr>               
               <td style="font-size:12px">Father Name:</td>
               <td><?php echo ucwords($rowstud['student_fname']);  ?></td>
			   <td>Date:</td>
               <td><?php echo date("d-m-Y",strtotime($rowfeedetail['due_date']));  ?></td>
               </tr>
				
				<tr>
				<td>Instalment:</td><td colspan="3"><?php echo ucwords($rowfeedetail['inst']); ?></td>
				</tr>
			  </table>
		 <?php
				   $i=1;
				     $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
				     $rowid=mysqli_fetch_array($maxid);
				   
				  ?>
          <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:99%;">
		  <tr style="font-weight:bold; line-height:25px;">
	      <td align="center">Particulars</td>
		  <td align="center">Amount(Rs)</td>
		  </tr>
		  
		  <tr style="line-height:22px;">
		  <td>&nbsp;&nbsp;Total Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['dtamt']; ?>
		  </td>
		  </tr>
		  
		 
          <tr style="line-height:22px;">
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td><td>&nbsp;&nbsp; <b><?php echo $rowfeedetail['pay']; ?></b></td>
		  </tr>
		  
		                  
		    
						 
		  <tr style="line-height:22px;">
		  <td colspan="2">
		  Payment Type-
		  <?php 
		  if
		  ($rowfeedetail['ptype']=='Cash')
		  {
		  echo 'Cash';
		  } 
		  else
		  {
		  echo $rowfeedetail['ptype'];
		  ?>
		 
		  <?php } ?>
		  
		  </td>
		  </tr>
		  </table>
							
		 <br>
	     <br>				
		 <br>
		 <span style="float:left; margin-left:20px;">Accountant</span> <span style="float:right; margin-right:50px">Cashier</span>
		 <br>
		 <br>
		 <br>
		 <span><b>Note-</b>Cheque are subject to realization</span>
		 <br>
		 <br>
		</div>
						
      
	   		  
			    </div>	
		
		</div>		
		<br><br><br><br>
		
</body>
</html>