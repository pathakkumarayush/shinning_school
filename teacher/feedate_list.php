<table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:12px;text-transform:uppercase;">
			  <?php
			  session_start();
	        require_once("../db.php"); 
				  function formatMoney($number, $fractional=false) {
                    if ($fractional) {
                     $number = sprintf('%.2f', $number);
                       }
                      while (true) {
                      $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                     if ($replaced != $number) {
                     $number = $replaced;
                        } else {
                      break;
                       }
                       }
                    return $number;
                     }		
				   
				   
				   $a=$_GET['from'];
                   $b=$_GET['to'];
				   $c=$_GET['class'];
				   $d=$_GET['ses'];
				   $search=mysqli_query($con,"select * from fee_detail where session='$d' and date BETWEEN '$a' AND '$b' AND class='$c' ");
				   
			
			 $sch=mysqli_query($con,"select * from school");
			 $rowsch=mysqli_fetch_array($sch);
			 $rowsch['school_name'];
             
			  ?>
			 
			<tr align="center">
		
		 <td colspan="7">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">DELHI PUBLIC SCHOOL,Gajraula</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; ?></span><br />
		 <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Class: <?php echo $_GET['class']; ?></span><br />
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">Report From Date: <?php echo $a ?> To Date: <?php echo $b ?> </span>
		</td>
		 
		 
	
		</tr>	
		      <tr style="font-weight:bold; height:30px;">
			  <td>Sr</td>
			  <td>Date</td>
				  <td>Receipt No</td>
				  <td>Admission No</td>
				  <td>Student Name</td>
			      <td>Class</td>
				  <td>Received Amount</td> 
			      </tr>
				 <?php 
			      $i=1;
			     while($studrow=mysqli_fetch_array($search))
			     {
				 ?>
				   
<?php 
$reg=mysqli_query($con,"select * from student where student_scholar='".$studrow['sch']."' and student_session='$d'");
$rowstud=mysqli_fetch_array($reg);
?>
				   
			   <tr>
			   <td><?php echo $i;  ?></td>
			   <td><?php $d = $studrow['date']; echo date("d-m-Y", strtotime($d));  ?></td>
			   <td><?php echo $studrow['receiptno']; ?></td>
			   <td><?php echo $studrow['sch'];  ?></td>
			   <td><?php echo $studrow['name'];  ?></td>
			   <td><?php echo $studrow['class']; ?></td>
			   <td><?php echo $feet= $studrow['fee_deposit'];  $tft+=$feet; ?></td>
			   </tr>
				   <?php
                    $i++;
			         }
			        ?>	
			       <tr>
			  	 <td colspan="6"><b>Total</b></td>
				 <td><?php echo  $tft; ?></td>
				 </tr>		 
				   
				 
				   	 </table>