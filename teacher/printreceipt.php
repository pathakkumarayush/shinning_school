<?php
session_start();
require_once("../db.php");
if(!empty($_GET['id']))
{
$getdetail=mysqli_query($con,"select * from fee_detail where student='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);


 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
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
		
			 <div style="border:#CCC 2px solid; min-height:400px; width:550px; margin:0px 0px 0px 40px; background:#EFE4E2">
            
      
	  
	    <div style="border:#FF0000 0px solid; height:120px;">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         $rowsch=mysqli_fetch_array($school);
		 ?>
		 
		 
		<img src="css/images/2bpllogo.jpg" width="50" height="50" style="border:#FF0000 0px solid; margin-top:10px">
		<label style="font-size:24px; font-weight:bold;  margin-left:20px"><?php echo $rowsch['school_name']; ?></label><br>
		<label style="font-size:18px; font-weight:bold;  margin-left:160px"><?php echo ucwords($rowsch['school_address'])."&nbsp;".ucwords($rowsch['city']); ?></label><br>
		<label style="font-size:18px; font-weight:bold;  margin-left:190px"><u>Fee Receipt</u></label>
		
		</div>
		 <div style=" border:#000000 1px solid; width:550px; margin:0px 0px 0px 0px;"></div>
		 <table class="table" style="margin:20px 0px 0px 50px;" width="400" border="1">
           <tr>
			  <td>Recept No</td>
			   <td>
			      <?php
				     /*
					 $maxid=mysqli_query($con,"select max(id) from fee_detail");
				     $rowid=mysqli_fetch_array($maxid);
				     echo $rowid['max(id)']; 
				   */
				   echo $rowfeedetail['receiptno'];
				  ?>
			   </td>
			
			
               <td>Date</td>
               <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
            </tr>
          
			  <tr>
               <td>Name</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
        
               <td>Class</td>
               <td><?php echo $rowstud['student_class'];  ?></td>
               </tr>
			   <tr>
               <td>Scholar N0</td>
               <td><?php echo $rowstud['student_scholar'];  ?></td>
         
               <td>Month</td>
               <td><?php echo ucwords($rowfeedetail['month']); ?></td>
            </tr>
          
        </table>
		 <?php
				     $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
				     $rowid=mysqli_fetch_array($maxid);
				   
				  ?>
         <div class="table" style="border:#FF0000 0px solid; height:220px; margin:30px 0px 0px 100px">
          
           <table width="80%" border="1" cellspacing="0" cellpadding="0" style="font-size:14px">
							<tr style="font-weight:bold">
							<td>Si.no</td>
							<td>Particulars</td>
							<td>Amount(Rs)</td>
							</tr>
           <?php
		     $i=1;
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$rowstud['student_class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
		    foreach($a as $v)
		   {
		     
			  list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			$rowchk=mysqli_fetch_array($check);     
		     if($rowchk['feetype']=="Yearly")
			 {  
			   if($_SESSION['month1']=="july")
			 {    
		?>
		
							<tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucwords($header); ?></td>
							   <td><?php echo $val;  ?></td>
							</tr>
							<?php
							       $val1+=$val;
							       $j=$i;
							       $i++;
							  }
							  }
							  else
							    {
								?>
								<tr>
							   <td><?php echo $i; ?></td>
							   <td><?php echo ucwords($header); ?></td>
							   <td><?php echo $val;  ?></td>
							</tr>

								<?php
							       $val1+=$val;
							       $j=$i;
							       $i++;
								}
							
							}
							?>
						
							
							<?php
							
							    if($rowfeedetail['admissionfee']=="Yes")
								   {
								     $admissionfee=mysqli_query($con,"select * from admission where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
									
								  $rowadmission=mysqli_fetch_array($admissionfee);   
								
							 ?>
							 	<tr>
							  <td><?php echo $j+1;; ?></td>	
							 <td>Admission Fee</td>
							  <td><?php echo $rowadmission['fee']; ?></td></tr>
							    <?php
								   
								   $val1+=$rowadmission['fee'];
								   $j=$j+1;
								   }
								
								  if($numexam>0)
								  {
								?>
							
							<tr>
							  <td><?php echo $j+1;; ?></td>
							
							 <td>Examination Fee</td>
							  <td><?php echo $examrow['fee']; ?></td>
							    <?php
								     $val1+=$examrow['fee'];
								   
								?>
							</tr>
							<?php
							 
							  
							  
							  }
							?>
							<tr>
							    <td></td>
								<td><b>Other Fee(Rs)</b></td>
								<td><b><?php echo $rowfeedetail['latefee']; ?></b></td>
								
							</tr>
														

							
							    <td></td>
								<td><b>Concession Amount(Rs)</b></td>
								
							    <td><?php echo $rowfeedetail['concession']; ?></td> 
							</tr>
							<tr>
							    <td>&nbsp;</td>
								<td><b>Previous Due(Rs)</b></td>
								<td><b><?php   $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$rowstud['student_id']."' order by id desc limit 1,2");
								 
								 $duerow=mysqli_fetch_array($search1);
								 echo $duerow['due']; 
								?></b></td>
								
							</tr>
							<tr>
							    <td>&nbsp;</td>
								<td><b>Total Amount(Rs)</b></td>
								<td><div id="tamt"><?php 
								 echo $rowfeedetail['tamnt']; 
																?></div></td>
							 
							 <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>">
							 <input type="hidden" name="class" value="<?php echo $studrow['student_class']; ?>">
							 <input type="hidden" name="month" value="<?php echo $_SESSION['month1']; ?>">
							 <input type="hidden" name="amt" value="<?php echo $val1; ?>">
							</tr>
							<tr>
                           <tr>
							    <td></td>
								<td><b>Amount Paid</b></td>
								
							    <td><?php echo $rowfeedetail['fee_deposit']; ?></td> 
							</tr>
							
													
							
							</table>
							
							</div>
	   		    </div>  
</body>
</html>