<?php
if(isset($_POST['update']))
{
$dueamt = $_POST["due"]-$_POST["pay"];
$deop = $_POST["fee_deposit"]+$_POST["pay"];

$query=mysqli_query($con,"insert into due_amt(session,class,sid,rno,due_date,dtamt,pay,inst,ptype)values('".$_SESSION['session']."','".$_POST['sclass']."','".$_POST['sid']."',
'".$_POST['rno']."','".$_POST['d_date']."','".$_POST['due']."','".$_POST['pay']."','".$_POST['inam']."','".$_POST['type']."')");

echo $insertid=mysqli_insert_id();

$res_up=mysqli_query($con,"update fee_detail set due_date='".$_POST["d_date"]."',receiptno='".$_POST["rno"]."',fee_deposit='$deop',due='".$_POST['$dueamt']."',
due_pay='".$_POST['pay']."' where id='".$_POST["id"]."'")or die(mysqli_error());

}
?>	

<script type="text/javascript">
function popitup(url) 
{
newwindow=window.open(url,'name','height=535,width=623');
if(window.focus) {newwindow.focus()}
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
    height: 20px;
    }
    .select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
	border-radius:4px !important;
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
        <div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Fee Pay</h2>
		
        </div>
		

<div class="col_4">
	
         
<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
    <?php
	          if(!empty($error_msg))
			{
			?>
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php echo $error_msg ;?></div>
			 <?php  
			 } 
             if(!empty($msg1))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg1;   ?></div>
		  <?php
		   }
	       ?>
           <?php
	         if(!empty($err))
			{
			?>				
		   <div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		    <?php  } ?>

		   <?php
		    $editqu=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and id='".$_GET['id']."'"); 
			$editrow=mysqli_fetch_array($editqu);
			$std=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_id='".$editrow['student']."'"); 
			$stdrow=mysqli_fetch_array($std);
	       
		    $_SESSION['studentid']=$stdrow['student_id'];
		 
		   ?>
		   
		
         <table border="0" style="margin:40px 0px 0px 20px">
          <tr>
		
		   <td>Student Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="sname" class="tb5" value="<?php echo $stdrow['student_name'];?>"  readonly>
		   <input type="hidden" name="sid" class="tb5" value="<?php echo $stdrow['student_id'];?>"  readonly>
		   </td>
		    <td>&nbsp;Class</td>
		   <td><input type="text" name="sclass" class="tb5" value="<?php echo $stdrow['student_class'];?>"  readonly></td>
		  </tr>
           
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
          <tr>
		   <td>Father Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="fname" class="tb5" value="<?php echo $stdrow['student_fname'];?>"  readonly></td>
		    <td>&nbsp;Sch. No</td>
		   <td><input type="text" name="sch" class="tb5" value="<?php echo $stdrow['student_scholar'];?>"  readonly></td>
		</tr>
           
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
            <tr>
		   <td>Date<span style="color:#FF0000">*</span></td>
		   <td><input type="Text"  name="date" class="tb5" size="25" value="<?php echo $editrow['date'];?>"  readonly></td>
		    <td>&nbsp;Receipt<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="rno" class="tb5" value="<?php echo $editrow['receiptno'];?>"  readonly></td>
		</tr>
		<tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
		<tr>
		   <td>Instalment  Name<span style="color:#FF0000">*</span></td>
		   <td ><input type="text" name="inam" class="tb5"  value="<?php echo $editrow['instalment'];?>"  readonly></td>
		   <td>Bus Fee<span style="color:#FF0000">*</span></td>
		   <td ><input type="text" name="bus" class="tb5"  value="<?php echo $editrow['inst_fee_bus'];?>"  readonly></td>
		   </tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			
			 <tr>
		   <td><b>Total Amont</b><span style="color:#FF0000">*</span></td>
		   <td>
		    <input type="text" name="tamnt" class="tb5" value="<?php echo $editrow['tamnt'];?>" readonly>
		   </td>
		    <td>&nbsp;<b>Deposit</b><span style="color:#FF0000">*</span></td>
		   <td>  <input type="text" name="fee_deposit" class="tb5" value="<?php echo $editrow['fee_deposit'];?>" readonly></td>
		</tr>
			
		 <tr>
		   <td><b>Privious Due</b><span style="color:#FF0000">*</span></td>
		   <td>
		    <input type="text" name="due" class="tb5" value="<?php echo $editrow['due'];?>" readonly>
		   <input type="hidden" name="id" class="tb5" value="<?php echo $editrow['id'];?>">
		   
		   </td>
		    <td>&nbsp;<b>Pay Amount</b><span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="pay" class="tb5" required></td>
		</tr>
		  <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
		<tr>
		  <td>&nbsp;<b>Date:</b><span style="color:#FF0000">*</span></td>
		   <td ><input type="text" name="d_date" class="tb5" value="" required></td>
		   
		   <td>&nbsp;<b>Payment Type:</b><span style="color:#FF0000">*</span></td>
		   <td >
		   <select name="type" class="select" required />
		   <option value="">Select Payment Type</option>
		   <option value="Cash">Cash</option>
		   <option value="Cheque">Cheque</option>
		   </option>
		   </select>
		   </td>
		</tr>
		
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
             <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="update" value="Pay Due" style="width:100px"></td>
		</tr>
      
    
    </table>
    
	
	
     <br /><br /><br /><br /><br />
         
<table>

<?php
if(!empty($insertid))
{
?>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/kmps/school/due_rec.php?id=<?php echo $_SESSION['studentid'] ?>')">
<input type="button" value="Generate Receipt" style="width:200px; margin-left:0px; margin-top:15px">
</a>
</td>
<?php
}
?>

</table>
         
                 
                   </form>
                   
				   
				   </div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
