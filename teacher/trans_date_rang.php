<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Untitled Page</title>

    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;

          
        }
    </script>

</head>
<body>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:100px">
				  <img src="images/FEE Management/Total Fee.png" style="width:200px; height:80px;" />

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                 SEARCH FEE DETAILS BY DATE</a>
		<span style="float:right"><a href="./?pageid=total_fee" style="color:#990000;font-size:18px">Back</a></span>
                 <div class="box-head" style="margin-top:20px; font-size:18px">
	 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."trans_fee_date"."&&divid=1"; ?>">Today Collection </a>&nbsp;||&nbsp;
	<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."trans_fee_date"."&&divid=2"; ?>">Collection By Date</a>&nbsp;||&nbsp;
   <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."trans_date_rang" ?>">Search By Date Range</a>
			     
			</div>
				 
		   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
				   <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
                   
				   
				    <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		       <tr> 
		        <td>From</td>
		        <td><input type="text" name="from"  class="tb5" style="width:110px">yyyy-mm-dd</td>
		  </tr></td>
		  
		  <tr> 
		        <td>To</td>
		        <td><input type="text" name="to"  class="tb5" style="width:110px">yyyy-mm-dd</td>
		  </td></tr>
          </tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		   <tr>
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		
		
		
		
		<br>
        </div>
				   
			</form>
			 <div style="height:800px; overflow:scroll; width:100%;">
			
			 <div id="printablediv" style="width: 100%;">
			
			 <table width="100%" border="2" cellspacing="0" cellpadding="0" style=" font-size:14px">
			  <?php
				 
				  if(isset($_POST['search']))
				   {
				   
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
				   
				   
		      $a=$_POST['from'];
              $b=$_POST['to'];
		      $searchs=mysqli_query($con,"select date,SUM(fee_deposit) from fee_detail_trans where session='".$_SESSION['session']."' and date BETWEEN '$a' AND '$b' GROUP BY date");
			  ?>
			 
			  <h2 align="center" style="margin-top:10px; color:#990033">Kabra Memorial Public School</h2>
			  <h2 align="center" style="margin-top:10px; color:#990033">Transport Fee - Income Report</h2>
			  <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033"> From Report Date: <?php echo $a ?> To Date: <?php echo $b ?> </h2>
		      <tr style="height:30px; background-color:#339966">
			  <th>Date</th>
			  <th>Total Paid</th>
			  <th></th>
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
			  <td align="center"><a href="view_collection_trans.php?date=<?php echo $studrow['date']; ?>" >View</a> </td>
			  </tr>
			  <?php $i++; } ?>	
			  <tr>
			  <td align="center"><b><center>Total</center></b></td>
			  <td align="center"><b><?php echo $val2; ?></b></td>
			  <td></td>
			  </tr>		 
		      <?php } ?>
			  </table>
				
				
			  <?php /*?><table width="100%" border="2" cellspacing="0" cellpadding="0" style=" font-size:14px">
			  <?php
				 
				  if(isset($_POST['search']))
				   {
				   
				     function formatMoney1($number, $fractional=false) {
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
				   
				   
		      $a=$_POST['from'];
              $b=$_POST['to'];
		      $searchst=mysqli_query($con,"select date,SUM(paidamt),SUM(tamt),SUM(pamt),SUM(due),SUM(pdue),SUM(con),SUM(fine),SUM(padv),SUM(adv)from trans_fee where date BETWEEN '$a' AND '$b' GROUP BY date");
			  ?>
			 
			 
			  <h2 align="center" style="margin-top:10px; color:#990033"> Income Report &nbsp;(Transport Fee)</h2>
			  <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033"> From Report Date: <?php echo $a ?> To Date: <?php echo $b ?> </h2>
		      <tr style="height:30px; background-color:#339966">
			  <th>Date</th>
			  <th>Total-Amt</th>
			  <th>Concession</th>
			  <th>Late Fee</th>
			  <th>pri. Adv.</th>
			  <th>Pay-Total</th>
			  <th>Total Paid</th>
			  <th>Due</th>
			  <th>Extra</th>
			  <th></th>
			  
			 
			 
			  </tr>
			  <?php 
			  $i=1;
			  while($studrowt=mysqli_fetch_array($searchst))
			  {
			  ?>
		      <tr>
			  <td align="center"><?php echo $studrowt['date']; ?></td>
			  
			  
			  <td align="center">
			  <?php $tamt = $studrowt['SUM(tamt)']; 
			  echo $tamt;
			  $ttamt+=$tamt;
              ?></td>
			  
			
			  <td align="center">
			  <?php $con = $studrowt['SUM(con)']; 
			  echo $con;
			  $tcon+=$con;
              ?></td>
			  
			  <td align="center">
			  <?php $fine = $studrowt['SUM(fine)']; 
			  echo $fine;
			  $tfinet+=$fine;
              ?></td>
			  
			  <td align="center">
			  <?php $padv = $studrowt['SUM(padv)']; 
			  echo $padv;
			  $tpadv+=$padv;
              ?></td>
			   
			  <td align="center">
			  <?php $pamt = $studrowt['SUM(pamt)']; 
			  echo $pamt;
			  $tpamt+=$pamt;
              ?></td> 
			   	  
			  <td align="center">
			  <?php $paidamt = $studrowt['SUM(paidamt)']; 
			  echo $paidamt;
			  $tpaidamt+=$paidamt;
              ?></td>
			  
			  <td align="center">
			  <?php $due = $studrowt['SUM(due)']; 
			  echo $due;
			  $ttdue+=$due;
              ?></td>
			  
			  <td align="center">
			  <?php $adv = $studrowt['SUM(adv)']; 
			  echo $adv;
			  $tadv+=$adv;
              ?></td>
			  <td align="center"><a href="view_collection1.php?date=<?php echo $studrowt['date']; ?>" >View</a> </td>
			  </tr>
			  <?php $i++; } ?>	
			  <tr>
			  <td align="center"><b><center>Total</center></b></td>
		      <td align="center"><b><?php echo $ttamt; ?></b></td>
			  <td align="center"><b><?php echo $tcon; ?></b></td>
			  <td align="center"><b><?php echo $tfinet; ?></b></td>
			  <td align="center"><b><?php echo $tpadv; ?></b></td>
			  <td align="center"><b><?php echo  $tpamt; ?></b></td>
			  <td align="center"><b><?php echo $tpaidamt; ?></b></td>
			  <td align="center"><b><?php echo $ttdue; ?></b></td>
			   <td align="center"><b><?php echo $tadv; ?></b></td>
			  
			  <td></td>
			   
			  </tr>		 
		      <?php } ?>
				   
				</table><?php */?>
				
				
			<?php /*?><table width="100%" border="2" cellspacing="0" cellpadding="0" style=" font-size:14px">
			  <?php
				 
				  if(isset($_POST['search']))
				   {
				   
				     function formatMoney3($number, $fractional=false) {
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
				   
				   
		      $a=$_POST['from'];
              $b=$_POST['to'];
		      $searchstp=mysqli_query($con,"select date,SUM(fee_deposit)from fee_detail_preivios where date BETWEEN '$a' AND '$b' GROUP BY date");
			  ?>
			 
			 
			  <h2 align="center" style="margin-top:10px; color:#990033"> Income Report &nbsp;(Previous Year Due Fee)</h2>
			  <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033"> From Report Date: <?php echo $a ?> To Date: <?php echo $b ?> </h2>
		      <tr style="height:30px; background-color:#339966">
			  <th>Date</th>
			
			  <th>Total Perivios fee Paid</th>
			
			  <th></th>
			  
			 
			 
			  </tr>
			  <?php 
			  $i=1;
			  while($studrowp=mysqli_fetch_array($searchstp))
			  {
			  ?>
		      <tr>
			  <td align="center"><?php echo $studrowp['date']; ?></td>
			  
			  
			  <td align="center">
			  <?php $tamtp = $studrowp['SUM(fee_deposit)']; 
			  echo $tamtp;
			  $ttamtw+=$tamtp
              ?></td>
			  
			
			  <td align="center"><a href="pre_collection.php?date=<?php echo $studrowp['date']; ?>" >View</a> </td>
			  </tr>
			  <?php $i++; } ?>	
			  <tr>
			  <td align="center"><b><center>Total</center></b></td>
		      <td align="center"><b><?php echo  $ttamtw; ?></b></td>
			
			 
			  
			  <td></td>
			   
			  </tr>		 
		      <?php } ?>
				   
				</table><?php */?>	
				
		    </div>
		   <input type="button" value="Print" onClick="javascript:printDiv('printablediv')" />
			</div>	   
				   
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>