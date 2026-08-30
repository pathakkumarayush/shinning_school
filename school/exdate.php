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

 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Accounts/acc.png" />
<a href="./?pageid=account_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="ex.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Expenses by date </h2>

</div>
<div class="col_4">

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
             <div class="box-head" style=" font-size:18px">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."today_expenses";?>">Today Expenses</a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=2"; ?>">Expenses By Date</a>	
			  &nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate_rang"."&&divid=2"; ?>">
			  Expenses By B/W Date</a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=1"; ?>">Expenses By Head</a>&nbsp;||&nbsp;
			   <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=3"; ?>">Expenses By Vender</a>	  
			 </div>
         
           <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	      ?>
         
       <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
          <tr> 
		  <td>Date</td>
		  <td>
		  <input required name="from" type="text"  readonly id="from" style=" width:136px;" class="tb5">
           <a href="javascript:" id="date_from_btn"> </a></td>
		  </td>
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
        
        <?php
		 }
		 ?>
		 
		 <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	      ?>
         
       <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
          <tr> 
		  <td>Select Head</td>
		  <td>
			<?php
			$store=mysqli_query($con,"select * from header");
			?>
            <select name="name" class="select"  style="width:237px;" required>
			<option value="">Select Head Name</option>
			<?php
			while($r_store=mysqli_fetch_array($store))
			{
			?>
		    <option value="<?php echo $r_store['name'];  ?>"><?php echo $r_store['name'];  ?></option>
			<?php
			}
			?>
			</select>
		 </td>
          </tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		   <tr>
		   <td></td>
           <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 ?>
		 
		  <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		   {
	      ?>
         
          <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
          <tr> 
		  <td>Select Vender</td>
		  <td>
			<?php
			$store1=mysqli_query($con,"select * from vender");
			?>
            <select name="vname" class="select"  style="width:237px;" required>
			<option value="">Select Vender Name</option>
			<?php
			while($r_store1=mysqli_fetch_array($store1))
			{
			?>
		    <option value="<?php echo $r_store1['name'];  ?>"><?php echo $r_store1['name'];  ?></option>
			<?php
			}
			?>
			</select>
		 </td>
          </tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		   <tr>
		   <td></td>
           <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 ?>
		 
		 

		   
		   <div class="table" style="border: #006633 20px solid; height:auto; margin:0px 0px 0px 0px">
		   <div id="printablediv" style="width: 100%;">
		    <h2 align="center" style="margin-top:9px; color:#990033">Shining Public Hr. Sec. School Raisen (M.P.)</h2>
                   <h2 align="center" style="margin-top:9px; color:#990033">Session: <?php echo $_SESSION['session']; ?></h2>
				   
        
		  
		  <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
	   <h2 align="center" style="margin-top:9px; color:#990033">Date: <?php echo date("d-m-Y",strtotime($_POST['date'])); ?></h2>
		   <table width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 50px; font-size:14px">
		 <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Bill Date</td>
        <td>Name</td>
		<td>Payment Type</td>
		<td>Cheuqe No</td>
		<td>Bank Name</td>
		<td>Amount</td>
	
		<td>Entery Date</td>
        <td>Remark</td>
		<td>Delete</td>
        </tr>
	<?php
	 
	
     $memo=mysqli_query($con,"select * from expenses where date='".$_POST['from']."'");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
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
     
    <td><a style="color:#CC0033" href="<?php echo $var."today_expenses"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	<tr><td></td><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b><?php echo $valr; ?></b></td><td></td><td></td><td></td><tr>
			 </table>
         <?php
           }
		  ?>
		  
		  
		<?php
		//student by scholar number
	    if((!empty($_GET['divid'])) && ($_GET['divid']==1))
	    {
	    ?>
	    <h2 align="center" style="margin-top:9px; color:#990033">Head: <?php echo $_POST['name']; ?></h2>
	   <table width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 50px; font-size:14px">
		<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Bill Date</td>
        <td>Name</td>
		
		<td>Payment Type</td>
		<td>Cheuqe No</td>
		<td>Bank Name</td>
		<td>Amount</td>
		
		<td>Entery Date</td>
        <td>Remark</td>
		<td>Delete</td>
        </tr>
	   <?php
	 
	$memo=mysqli_query($con,"select * from expenses where name='".$_POST['name']."'");
		
	$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
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
     
    <td><a style="color:#CC0033" href="<?php echo $var."today_expenses"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	<tr><td></td><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b><?php echo $valr; ?></b></td><td></td><td></td><td></td><tr>
			 </table>
         <?php
           }
		  ?>
		  
		  
		  <?php
		//student by scholar number
	    if((!empty($_GET['divid'])) && ($_GET['divid']==3))
	    {
	    ?>
	    <h2 align="center" style="margin-top:9px; color:#990033">Vender: <?php echo $_POST['vname']; ?></h2>
	   <table width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 50px; font-size:14px">
		<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Bill Date</td>
        <td>Name</td>
		<td>Payment Type</td>
		<td>Cheuqe No</td>
		<td>Bank Name</td>
		<td>Amount</td>
		
		<td>Entery Date</td>
        <td>Remark</td>
		<td>Delete</td>
        </tr>
	   <?php
	 
	$memo=mysqli_query($con,"select * from expenses where vname='".$_POST['vname']."'");
		
	$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
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
     
    <td><a style="color:#CC0033" href="<?php echo $var."today_expenses"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	<tr><td></td><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b><?php echo $valr; ?></b></td><td></td><td></td><td></td><tr>
			 </table>
         <?php
           }
		  ?>
		  
		  
		   </div>
			  <input type="button" value="Print" onClick="javascript:printDiv('printablediv')" />
		  		 
		 </div>
      
                 
                   </form>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  