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
$getdetail=mysqli_query($con,"select * from fee_detail_trans where student='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by id desc limit 1");
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
		
		<div style="border:#CCC 2px solid; min-height:auto; float:left; width:320px; margin:0px 0px 0px 0px;">
         <div style="border:#FF0000 0px solid; height:auto">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         
		 
		 $rowsch=mysqli_fetch_array($school);
		  
		 ?>
		 <div style="width:330px; height:93px;">
		 <div style="float:left; width:120px; height:96px; ">
		 <img src="images/logo.jpg" style="width:90px; height:90px; margin-left:5px;">
		 </div>
		 <div style="float:left; width:200px; margin-left:0px; margin-top:5px;">
		
		 <span style=" font-size:14px; margin-left:0px; font-weight:bold;">Kabra Memorial Public School</span><br>
		 <span style=" font-size:13px;margin-left:0px;">Pipariya Road, Kamti, Gadarwara.</span><br>
	
		   <span style=" font-size:12px; margin-left:0px;">Phone No. :- 07791 - 255501,255505</span><br>
		  
		   <span style=" font-size:12px;; float:left">Affiliation No, 1030600</span><br>
		   <span style=" font-size:12px;; float:left; font-weight:bold;"><center>Fee Receipt-Student Copy</center></span>
		 </div>
		
		</div>
		
	
		
		
		
		</div>
		 <div style=" border:#000000 1px solid; width:318px; margin:0px 0px 0px 0px;"></div>
		 <table class="table" style="margin:2px 0px 0px 1px; width:320px; font-size:13px;" border="0">
           <tr>
			  <td>Recept No:</td>
			   <td>
			    <?php echo $rowfeedetail['receiptno']; ?>
			   </td>
			
			
               <td width="45px">Date:</td>
               <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
               </tr>
          
			  <tr>
               <td width="72px">Std. Name:</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
			   <td>Std. Class:</td>
               <td><?php echo $rowstud['student_class'];  ?></td> 
               </tr>
			
               <tr>               
               <td>Father Name:</td>
               <td><?php echo ucwords($rowstud['student_fname']);  ?></td>
			   <td>Month:</td>
               <td><?php echo ucwords($rowfeedetail['month']); ?></td>
                </tr>
			  </table>
		 <?php
				   $i=1;
				     $maxid=mysqli_query($con,"select max(id) from fee_detail_trans where school='".$_SESSION['uid']."'");
				     $rowid=mysqli_fetch_array($maxid);
				   
				  ?>
         <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:99%;">
		  <tr style="font-weight:bold">
	      <td align="center">Particulars</td>
		  <td align="center">Amount(Rs)</td>
		  </tr>
		  
		
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Stop Name</td><td>&nbsp;&nbsp; <?php echo $rowstud['transport_stopage']; ?></td>
		  </tr>
		  
		   <tr>
		  <td>&nbsp;&nbsp; <?php echo $rowfeedetail['instalment']; ?>-</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']; ?></td>
		  </tr>
		  
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Total Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']+$rowfeedetail['caution']+$rowfeedetail['adm_fee']+$rowfeedetail['tution_fee']; ?>
		  </td>
		  </tr>
		  
		   <?php
		   if(!empty($rowfeedetail['pdue']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Privious Due</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['pdue']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  
		   <?php
		   if(!empty($rowfeedetail['padv']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Privious Advance</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['padv']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  <?php
		   if(!empty($rowfeedetail['latefee']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Fine</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['latefee']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Concession</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['concession']; ?></td>
		  </tr>
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Pay Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['tamnt']; ?></td>
		  </tr>
		  
		  <tr>
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td><td>&nbsp;&nbsp; <b><?php echo $rowfeedetail['fee_deposit']; ?></b></td>
		  </tr>
		  <?php
		                   if(!empty($rowfeedetail['due']))
		                    {
		                   ?>
		    <tr>
		  <td>&nbsp;&nbsp;Due Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['due']; ?></td>
		  </tr><?php } ?>
		    
						   <?php
		                   if(!empty($rowfeedetail['extra_amnt']))
		                    {
		                   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['extra_amnt']; ?></td>
		  </tr>
		   <?php }?>
		  <tr>
		  <td colspan="2">
		  Payment Type-
		  <?php 
		  if
		  ($rowfeedetail['pay_type']=='Cash')
		  {
		  echo 'Case';
		  } 
		  else
		  {
		  echo $rowfeedetail['pay_type'];
		  ?>
		  , &nbsp;Cheque No - <?php  echo $rowfeedetail['cno'];  ?>
		  <br>
		  Date - <?php  echo $rowfeedetail['cd'];  ?>
		  <?php } ?>
		  
		  
		  
		  </td>
		  </tr>
		 
         </table>
							
		 <br>
		 <span style="float:right; margin-right:100px">Accountant</span>
		 <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
		</div>
						
      
	   		  
			    </div>  
				
		
		<div style="border:#CCC 2px solid; min-height:auto; margin-left:60px; float:left; width:320px; ">
         <div style="border:#FF0000 0px solid; height:auto">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         
		 
		 $rowsch=mysqli_fetch_array($school);
		  
		 ?>
		 <div style="width:330px; height:93px;">
		 <div style="float:left; width:120px; height:96px; ">
		 <img src="images/logo.jpg" style="width:90px; height:90px; margin-left:5px;">
		 </div>
		 <div style="float:left; width:200px; margin-left:0px; margin-top:5px;">
		
		 <span style=" font-size:14px; margin-left:0px; font-weight:bold;">Kabra Memorial Public School</span><br>
		 <span style=" font-size:13px;margin-left:0px;">Pipariya Road, Kamti, Gadarwara.</span><br>
	
		   <span style=" font-size:12px; margin-left:0px;">Phone No. :- 07791 - 255501,255505</span><br>
		  
		   <span style=" font-size:12px;; float:left">Affiliation No, 1030600</span><br>
		   <span style=" font-size:12px;; float:left; font-weight:bold;"><center>Fee Receipt-Office Copy</center></span>
		 </div>
		
		</div>
		
	
		
		
		
		</div>
		 <div style=" border:#000000 1px solid; width:318px; margin:0px 0px 0px 0px;"></div>
		 <table class="table" style="margin:2px 0px 0px 1px; width:320px; font-size:13px;" border="0">
           <tr>
			  <td>Recept No:</td>
			   <td>
			    <?php echo $rowfeedetail['receiptno']; ?>
			   </td>
			
			
               <td width="45px">Date:</td>
               <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
            </tr>
          
			  <tr>
               <td width="72px">Std. Name:</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
			   <td>Std. Class:</td>
               <td><?php echo $rowstud['student_class'];  ?></td> 
               </tr>
			
               <tr>               
               <td>Father Name:</td>
               <td><?php echo ucwords($rowstud['student_fname']);  ?></td>
			   <td>Month:</td>
               <td><?php echo ucwords($rowfeedetail['month']); ?></td>
                </tr>
			  </table>
		 <?php
				   $i=1;
				     $maxid=mysqli_query($con,"select max(id) from fee_detail_trans where school='".$_SESSION['uid']."'");
				     $rowid=mysqli_fetch_array($maxid);
				   
				  ?>
         <div class="table" style="border:#FF0000 0px solid; height:autopx; margin:1px 0px 0px 2px">
          <table border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:99%;">
		  <tr style="font-weight:bold">
	      <td align="center">Particulars</td>
		  <td align="center">Amount(Rs)</td>
		  </tr>
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Stop Name</td><td>&nbsp;&nbsp; <?php echo $rowstud['transport_stopage']; ?></td>
		  </tr>
		  
		   <tr>
		  <td>&nbsp;&nbsp; <?php echo $rowfeedetail['instalment']; ?>-</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']; ?></td>
		  </tr>
		   <?php
		   if(!empty($rowfeedetail['tution_fee']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Privious Due</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['tution_fee']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  <tr>
		  <td>&nbsp;&nbsp;Total Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']+$rowfeedetail['caution']+$rowfeedetail['adm_fee']+$rowfeedetail['tution_fee']; ?>
		  </td>
		  </tr>
		  
		   <?php
		   if(!empty($rowfeedetail['pdue']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Privious Due</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['pdue']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  
		   <?php
		   if(!empty($rowfeedetail['padv']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Privious Advance</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['padv']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  <?php
		   if(!empty($rowfeedetail['latefee']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Fine</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['latefee']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  <tr>
		  <td>&nbsp;&nbsp;Concession</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['concession']; ?></td>
		  </tr>
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Pay Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['tamnt']; ?></td>
		  </tr>
		  
		  <tr>
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td><td>&nbsp;&nbsp; <b><?php echo $rowfeedetail['fee_deposit']; ?></b></td>
		  </tr>
		  <?php
		                   if(!empty($rowfeedetail['due']))
		                    {
		                   ?>
		    <tr>
		  <td>&nbsp;&nbsp;Due Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['due']; ?></td>
		  </tr><?php } ?>
		    
						   <?php
		                   if(!empty($rowfeedetail['extra_amnt']))
		                    {
		                   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['extra_amnt']; ?></td>
		  </tr>
		   <?php }?>
		  <tr>
		  <td colspan="2">
		  Payment Type-
		  <?php 
		  if
		  ($rowfeedetail['pay_type']=='Cash')
		  {
		  echo 'Case';
		  } 
		  else
		  {
		  echo $rowfeedetail['pay_type'];
		  ?>
		  , &nbsp;Cheque No - <?php  echo $rowfeedetail['cno'];  ?>
		  <br>
		  Date - <?php  echo $rowfeedetail['cd'];  ?>
		  <?php } ?>
		  
		  
		  
		  </td>
		  </tr>
		 
         </table>
							
		 <br>
		 <span style="float:right; margin-right:100px">Accountant</span>
		 <br> <br>
		</div>
						
      
	   		  
			    </div>
		</div>		
		<br><br><br><br>
		
</body>
</html>