<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>
jQuery(function($){
  $('#from').datepicker({ dateFormat: 'yy-mm-dd' });
  $('#to').datepicker({ dateFormat: 'yy-mm-dd' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Fee Collection By Date("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}

.form-style-2-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
	border-radius:4px;
	width:150px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type="email"]:focus,
input[type="email"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	font-weight:bold;
	
	
}

.button{border: none;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	font-weight:bold;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}

</style>
</head>
<body>
<div id="container">
 <div class="left_sect"><img src="images/Accounts/acc.png" />
<a href="./?pageid=account_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:0px">
				 

                      
               
                 <div class="box-head" style="margin-top:20px; font-size:18px">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."today_expenses";?>">Today Expenses</a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=2"; ?>">Expenses By Date</a>	
			  &nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate_rang"."&&divid=2"; ?>">
			  Expenses By B/W Date</a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=1"; ?>">Expenses By Head</a>&nbsp;||&nbsp;
			   <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=3"; ?>">Expenses By Vender</a>	 
			     
			</div>
				 
		   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
				   <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
                   
				   
				    <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		       <tr> 
		        <td>From</td>
		        <td><input required name="from" type="text"  readonly id="from" style=" width:136px;" class="tb5">
                <a href="javascript:" id="date_from_btn">
                
                </a></td>
		  </tr></td>
		  
		  <tr> 
		        <td>To</td>
		        <td><input required name="to" type="text" readonly  id="to" style=" width:136px;" class="tb5">
                <a href="javascript:" id="date_to_btn">
               
                </a></td>
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
			 <div style="height:800px; overflow:scroll; width:100%;text-transform:uppercase">
			
			 <div id="printablediv" style="width: 100%;">
			
			 <table id="tbl_exm" width="100%" border="2" cellspacing="0" cellpadding="0" style=" font-size:14px; text-transform:uppercase">
			<tr style="line-height:40px;"><td colspan="3"><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/ishining/school/feedate_listt.php?from=<?php echo $_POST['from']."&to=".$_POST['to']."&ses=".$_SESSION['session'] ;  ?>')">     <input type="button" value="Print List " style="width:100px;"></a>
			  
			  <button type="button" class="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel</button>
			  </td></tr>
			  
			
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
		      $searchs=mysqli_query($con,"select * from expenses where date BETWEEN '$a' AND '$b' GROUP BY date");
			  	 
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
			  
			  ?>
			 
			  <h2 align="center" style="margin-top:10px; font-weight:bold; color:#000"><?php echo $rowsch['school_name'];?> </h2>
			  <h2 align="center" style="margin-top:10px;font-weight:bold; color:#000"> Income Report</h2>
			  <h2 align="center" style="margin-top:10px;font-weight:bold; margin-bottom:10px;color:#000"> From Report Date: <?php echo $a ?> To Date: <?php echo $b ?> </h2>
		<tr style="font-weight:bold">
	    <th>Sr</td>
		<td>Bill Date</td>
        <th>Name</td>
		<th>Payment Type</th>
		<th>Cheuqe No</th>
		<th>Bank Name</th>
		<th>Amount</th>
		
		<th>entery Date</th>
        <th>Remark</th>
		
        </tr>
			  <?php 
			  $i=1;
			  while($rowmemo=mysqli_fetch_array($searchs))
			  {
			  ?>
		      <tr style="color:#335599; line-height:30px;">
    <td><?php echo $i;  ?></td>
	<td><?php echo date("d-m-Y",strtotime($rowmemo['date'])); ?></td>
    <td><?php echo ucwords($rowmemo['name']);?></td>
	<td><?php echo ucwords($rowmemo['ptype']);?></td>
	<td><?php echo ucwords($rowmemo['cno']);?></td>
	<td><?php echo ucwords($rowmemo['bname']);?></td>
	<td><?php 
	$am = $rowmemo['amt'];
	echo $am;
	$valr+=$am;
	?></td>
	
	<td><?php echo date("d-m-Y",strtotime($rowmemo['dos'])); ?></td>
	<td><?php echo ucwords($rowmemo['rmk']);?></td>
     
    
    </tr>
			  <?php $i++; } ?>	
			
		     <tr><td></td><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b><?php echo $valr; ?></b></td><td></td><td></td><tr>	 
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