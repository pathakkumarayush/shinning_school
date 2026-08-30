<?php require_once("../db.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
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
			    <div id="content" style="border:#F00 0px solid; width:1050px; height:auto">
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="images/FEE Management/Total Fee.png" style="width:200px; height:80px;" />
<span style="float:right">
<a href="./?pageid=trans_date_rang" style="color:#000; font-size:18px">Back</a></span>
       <div style="border:#900 2px solid; margin-top:10px"></div>
              
				
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      		 <div class="table" style="border:#33cc66 20px solid; height:420px; overflow:scroll; margin:0px 0px 0px 0px">
		    <div id="printablediv" style="width: 100%;">
		   
			 <div id="printablediv1" style="width: 100%; ">
		   <table  border="1" cellspacing="0" cellpadding="0" style="font-size:14px; width:100%;">
		    <h2 align="center" style=" color:#990033">Kabra Memorial Public School</h2>
			 <h2 align="center" style=" color:#990033; font-size:18px; margin-top:-10px;">Transport Fee - Income Report Date: <?php echo date("d-m-Y",strtotime($_GET['date'])); ?></h2>
			 
		      <tr style="font-weight:bold;">
			      <td>Sr</td>
				  <td>Name</td>
			      <td>Class</td>
				  <td>Month</td>
				  <td>Instalment</td>
				  <td>Inst. Fee</td>
				  <td>T-Amt</td>
				  <td>Conc.</td>
				  <td>Fine</td>
				  <td>pdue</td>
				  <td>G.Total</td>
				  
				  <td>Paid</td>
				  <td>Due</td>
				  <td>Ext.</td>
			  </tr>
		      <?php
			  
			  $search=mysqli_query($con,"select * from fee_detail_trans where date='".$_GET['date']."'");
			  
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			  $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' ");
			  $rowsearch=mysqli_fetch_array($numclass1);
			  ?>
			  <tr>
			  <td><?php echo $i;  ?></td>
			  <td><?php echo $rowsearch['student_name'];  ?></td>
			  <td><?php echo $studrow['class']; ?></td>
			  <td><?php
	          if($studrow['month']=='April,July,August,September,October,November,December,January,February,March')
	          {
	          echo 'April To March';
	          }else{
	          echo $studrow['month'];
	          } 
	          ?> </td>
			  <td><?php $m = $studrow['instalment'];  
		      echo $m;
			   
			  ?>
			  </td>
			  
			  <td><?php  $act =  $studrow['inst_fee'];  echo $act; $tact+=$act;  ?> </td>
			
			 
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
			  
				<td></td>
				<td></td>
				<td><b>Total</b></td>
				
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
       
	   </div>
	    <input type="button" value="Print" onClick="javascript:printDiv('printablediv1')" />
	 
		  
		  		 
		 </div>
      
                 
                   </form>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>