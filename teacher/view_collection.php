
		   <table  border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:100%;">
		     <tr align="center">
		
		 <td colspan="16">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">DELHI PUBLIC SCHOOL,Gajraula</span><br />
  
		 
		 <span align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">Report From Date: <?php echo $_GET['date']; ?> </span>
		</td>
		 
		 
	
		</tr>	
		      <tr style="font-weight:bold;">
			      <td>Sr</td>
				  <td>Admission No</td>
				  <td>Student Name</td>
			      <td>Class</td>
				  <td>Receipt No</td>
				  <td>Annual Fee</td>
				  <td>Tution</td>
				  <td>Transport Fee</td>
				  <td>Total Amt</td>
				  <td>Conc.</td>
				  <td>Fine</td>
				  <td>Pri. due</td>
				  <td>G.Total</td>
				  <td>Paid</td>
				  <td>Due</td>
				  <td>Ext. Amt.</td>
			  </tr>
		      <?php
			   session_start();
	        require_once("../db.php"); 
			  $search=mysqli_query($con,"select * from fee_detail where date='".$_GET['date']."'");
			  
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			  $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' ");
			  $rowsearch=mysqli_fetch_array($numclass1);
			  ?>
			  <tr>
			  <td><?php echo $i;  ?></td>
			  <td><?php echo $studrow['sch'];  ?></td>
			  <td><?php echo $studrow['name'];  ?></td>
			  <td><?php echo $studrow['class']; ?></td>
			   <td><?php echo $studrow['receiptno']; ?></td>
			  
			  
			 <td><?php  $adm =  $studrow['anual'];  echo $adm; $tadm+=$adm;  ?> </td>
			  
			  <td><?php  $act =  $studrow['inst_fee'];  echo $act; $tact+=$act;  ?> </td>
			    
			   <td><?php //echo $studrow['adm_fee']; ?></td>
			 
			  <td><?php echo $scout = $studrow['tpay']-$studrow['tution_fee']; $ttttd+=$scout;?></td>
			  <td><?php echo $dairy = $studrow['concession']; $td+=$dairy;?></td>
			  <td><?php echo $la = $studrow['latefee']; $tla+=$la;?></td>
			  <td><?php  $ex =  $studrow['tution_fee'];  echo $ex; $tex+=$ex;  ?> </td>
			  <td>
			  <?php
			   echo $tg = $studrow['tamnt']-$studrow['tution_fee']; $ttg+=$tg;
			   ?>
			  
			  </td>
			   
			   <td><?php echo $feet= $studrow['fee_deposit'];  $tft+=$feet; ?></td>
			   <td><?php echo $da = $studrow['due']; $tda+=$da;?></td>
			   <td><?php echo $ex = $studrow['extra_amnt']; $extt+=$ex;?></td>
			 </tr>
			 <?php
              $i++;
			  }
			 ?>	
			 <tr>
			  	<td><b>Total</b></td>
				<td></td>
				
<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><?php echo  $ttg; ?></td>
				<td><?php echo  $tft; ?></td>
				<td></td>
				<td></td>
				
			 </tr>		 
			 </table>
       
	  