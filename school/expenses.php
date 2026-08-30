    <?php
    if(isset($_POST["search4"]))
	{	
	date_default_timezone_set('Asia/Kolkata');
	$d = date('Y-m-d');
	$query=mysqli_query($con,"insert into expenses(name,vname,ptype,cno,bname,amt,dos,rmk,date) values('".$_POST['name']."','".$_POST['vname']."','".$_POST['ptype']."','".$_POST['cno']."','".$_POST['bname']."','".$_POST['amt']."','$d','".$_POST['rmk']."','".$_POST['date']."') ");
	$msg="Inserted Successfully";
	} 
			 
			       
	?>			
<?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from expenses where id='".$_GET['did']."'");
	  $msg="Delete Successfully";
	}
?>
		<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; min-height:300px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
:-ms-input-placeholder 
{
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
#div1{ display:none;}
#div2{ display:none;}
</style>
 <div class="full_div">
        <br clear="all" />
		<br clear="all" />
        <div class="left_sect"><img src="images/Accounts/acc.png" /><a href="./?pageid=account_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Total Expenses</h2>
        </div>
        <div class="col_4">		
				
                
                
                    <div class="box-head" style="margin-top:0px;">
				<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."add_exp"?>">Add Header</a> ||
				<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."vender"?>">Add Vender</a> ||
				<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."expenses"?>">Add Expenses</a> 
				
						</div>
           
       
       <form method="post" name="myForm" action="#" >
	        <?php
		   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		   <?php
		    }
	        ?>
		<table style="margin:20px 0px 0px 30px; font-size:16px">
		   <tr>
		   <td>Head Name<span style="color:#FF0000">*</span></td>
		   <td>
			<?php
			$store=mysqli_query($con,"select * from header");
			?>
            <select name="name" class="select"  style="width:237px;" required>
			<option value="">Select Header Name</option>
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
		   <td>Vender Name<span style="color:#FF0000">*</span></td>
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
		<td>Payment Type<span style="color:#FF0000">*</span></td>
        <td><select name="ptype" class="select"  style="width:237px;" required>
			<option value="">Select Payment Type</option>
			<option value="Cash">Cash</option>
			<option value="Cheuqe">Cheuqe</option>
			<option value="Neft">Neft</option>
			</select>
		 </td>
   	   </tr>
		   
			 <tr>
			 <td>&nbsp;</td>
			 <td>&nbsp;</td>
			 </tr>
			
			 <tr>
			 <td>Cheuqe No</td>
			 <td><input type="text" name="cno" style="height:25px; width:220px;" /></td>
			 </tr>
			 <tr>
			  <tr>
			 <td>&nbsp;</td>
			 <td>&nbsp;</td>
			 </tr>
			
			 <tr>
			 <td>Bank Name</td>
			 <td><input type="text" name="bname" style="height:25px; width:220px;" /></td>
			 </tr>
			  <tr>
			 <td>&nbsp;</td>
			 <td>&nbsp;</td>
			 </tr>
			
			 <tr>
			 <td>Amount<span style="color:#FF0000">*</span></td>
			 <td><input type="text" name="amt" style="height:25px; width:220px;" required/></td>
			 </tr>
			
			
			 <tr>
			 <td>&nbsp;</td>
			 <td>&nbsp;</td>
			 </tr>
			 <tr>
			 <tr>
			 <td>Date<span style="color:#FF0000">*</span></td>
			 <td><input type="date" name="date" style="height:25px; width:220px;" required/></td>
			 </tr>
			  <tr>
			 <td>&nbsp;</td>
			 <td>&nbsp;</td>
			 </tr>
			 
			 <td>Remark</td>
			 <td><textarea name="rmk" cols="30"></textarea></td>
			 </tr>
			 <tr>
			 <td>&nbsp;</td>
			 <td>&nbsp;</td>
			 </tr>
	         <tr><td></td>
		   <td><input type="submit" name="search4" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
		  </table>
		
		<br><br>
		   
       </form>
    
	<div class="box-head">
						<h2 class="left">Currently Available Expenses</h2>
						</div>
     <div class="table" style="border:#FF0000 0px solid; height:420px; overflow:scroll">
          
		  
		  
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Bill Date</td>
        <td>Head</td>
		<td>Vender</td>
		<td>Payment Type</td>
		<td>Cheuqe No</td>
		<td>Bank Name</td>
		<td>Amount</td>
		<td>Entery Date</td>
		
        <td>Remark</td>
		<td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from expenses");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
		<td><?php echo date("d-m-Y",strtotime($rowmemo['date'])); ?></td>
    <td><?php echo ucwords($rowmemo['name']);?></td>
    <td><?php echo ucwords($rowmemo['vname']);?></td>
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
     
    <td><a style="color:#CC0033" href="<?php echo $var."expenses"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	<tr><td></td><td></td><td></td><td></td><td><b>Total Amount</b></td><td><b><?php echo $valr; ?></b></td><td></td><td></td><td></td><tr>
	</table>
         </div>
	
	
				
	</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
		