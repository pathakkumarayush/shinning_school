<table id="tbl_exm" width="100%" border="2" cellspacing="0" cellpadding="0" style=" font-size:14px; text-transform:uppercase">
			
			 
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
		      $searchs=mysqli_query($con,"select date,SUM(fee_deposit) from fee_detail_preivios where session='$d' and date BETWEEN '$a' AND '$b' GROUP BY date");
			  	 
		 $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
			  
			  ?>
			 <tr align="center">
		
		 <td colspan="2">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">SHINING PUBLIC HR. SEC. SCHOOL RAISEN (M.P.</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; ?></span><br />
		
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">PREVIOUS YEAR FEE INCOME REPORT Date from: <?php echo $a ?> To Date: <?php echo $b ?> </span>
		</td>
		 
		 
	
		</tr>	
			 
		      <tr style="height:30px; background-color:#339966">
			  <th>Date</th>
			  <th>Received Total</th>
			 
			
			  
			 
			 
			  </tr>
			  <?php 
			  $i=1;
			  while($studrow=mysqli_fetch_array($searchs))
			  {
			  ?>
		      <tr>
			  <td align="center"><?php echo $studrow['date']; ?></td>
			  
			  
			
			   	  
			  <td align="center">
			  <?php $val = $studrow['SUM(fee_deposit)']; 
			  echo $val;
			  $val2+=$val;
              ?></td>
			  
			
			  
			
			  </tr>
			  <?php $i++; } ?>	
			
		      <tr>
			  <td align="center"><b><center>Total</center></b>
			  
			   <b>Paytm</b> - 
			  <?php
			   $a=$_GET['from'];
                   $b=$_GET['to'];
				   $c=$_GET['class'];
				   $d=$_GET['ses'];
		      $searchso=mysqli_query($con,"select date,SUM(fee_deposit) from fee_detail_preivios where session='$d' and ftype='Paytm' and date BETWEEN '$a' AND '$b' GROUP BY date");
			  while($studrowo=mysqli_fetch_array($searchso))
			  {
			  $olt+=$studrowo['SUM(fee_deposit)']; 
			  }
			  echo $olt;
			  ?>
			  
			  <b>Cash</b> - 
			  <?php
			 
		      $searchsc=mysqli_query($con,"select date,SUM(fee_deposit) from fee_detail_preivios where session='$d' and ftype='Cash' and date BETWEEN '$a' AND '$b' GROUP BY date");
			  while($studrowc=mysqli_fetch_array($searchsc))
			  {
			  $casht+=$studrowc['SUM(fee_deposit)']; 
			  }
			  echo $casht;
			  ?>
			  
			  </td>
			
			
			  <td align="center"><b><?php echo $val2; ?></b></td>
			
			  
			 
			   
			  </tr>		 
				   
				</table>