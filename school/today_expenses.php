<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
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
    height: 40px;
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
<div class="left_sect"><img src="images/Accounts/acc.png" /><a href="./?pageid=account_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="ex.png"  style=" float:left; width:60px; height:40px; margin-top:2px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Today Expenses</h2>
</div>
<div class="col_4">

				
				
                 
				 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
				<div class="box-head" style="margin-top:0px; font-size:18px">
				<a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."today_expenses";?>">Today Expenses</a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=2"; ?>">Expenses By Date</a>	
			  &nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate_rang"."&&divid=2"; ?>">
			  Expenses By B/W Date</a>&nbsp;||&nbsp;
			  <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=1"; ?>">Expenses By Head</a>&nbsp;||&nbsp;
			   <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."exdate"."&&divid=3"; ?>">Expenses By Vender</a>	 
			</div>
         
       
		  <div class="table" style="border:#006633 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
          <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_SESSION['session']; ?></h2>
        <?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from expenses where id='".$_GET['did']."'");
	  $msg="Delete Successfully";
	}
?>
		   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 0px; font-size:14px">
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
	 
	 $today=date("Y-m-d");
     $memo=mysqli_query($con,"select * from expenses where date='".$today."'");
		
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
	<tr><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b><?php echo $valr; ?></b></td><td></td><td></td><td></td><tr>
			 </table>
       
		  
		 
		  
		  		 
		 </div>
      
                 
                   </form>
                  
				<!-- End Box -->
				
					</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>