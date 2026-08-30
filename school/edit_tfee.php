<?php
if(isset($_POST['update']))
{
$res_up=mysqli_query($con,"update fee_detail_trans set date='".$_POST["date"]."',receiptno='".$_POST["rno"]."',inst_fee='".$_POST["month"]."',pdue='".$_POST["pdue"]."',
tpay='".$_POST['tamt']."',concession='".$_POST['conce']."',padv='".$_POST['eamt']."',latefee='".$_POST['fine']."',tamnt='".$_POST['tpay']."',fee_deposit='".$_POST['tpaid']."',extra_amnt='".$_POST['extra_amnt']."',instalment='".$_POST['inam']."',due='".$_POST['due']."' where id='".$_POST["id"]."'")or die(mysqli_error());
?>	
<script type="text/javascript">
window.location="<?php echo $var."student_leadger&&sumsg=Updated Successfully" ?>";
</script>
<?php
}				   
?>
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
		   $_GET['id'];
		    $editqu=mysqli_query($con,"select * from fee_detail_trans where session='".$_SESSION['session']."' and id='".$_GET['id']."'"); 
			$editrow=mysqli_fetch_array($editqu);
			$std=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_id='".$editrow['student']."'"); 
			$stdrow=mysqli_fetch_array($std);
	       ?>
		
		
         <table border="0" style="margin:40px 0px 0px 20px">
          <tr>
		
		   <td>Student Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="sname" class="tb5" value="<?php echo $stdrow['student_name'];?>"></td>
		    <td>&nbsp;Class</td>
		   <td><input type="text" name="sclass" class="tb5" value="<?php echo $stdrow['student_class'];?>"></td>
		  </tr>
           
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
          <tr>
		   <td>Father Name <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="fname" class="tb5" value="<?php echo $stdrow['student_fname'];?>"></td>
		    <td>&nbsp;Sch. No</td>
		   <td><input type="text" name="sch" class="tb5" value="<?php echo $stdrow['student_scholar'];?>" ></td>
		</tr>
           
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
            <tr>
		   <td>Date<span style="color:#FF0000">*</span></td>
		   <td><input type="Text"  name="date" class="tb5" size="25" value="<?php echo $editrow['date'];?>"></td>
		    <td>&nbsp;Receipt<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="rno" class="tb5" value="<?php echo $editrow['receiptno'];?>"></td>
		</tr>
		<tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
		<tr>
		   <td>Instalment  Name<span style="color:#FF0000">*</span></td>
		   <td colspan="3"><input type="text" name="inam" class="tb5" style="width:535px;" value="<?php echo $editrow['instalment'];?>"></td>
		  
		   </tr>
          
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 
          
			 <tr>
		   <td>Instalment  Fee<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="month" class="tb5" value="<?php echo $editrow['inst_fee'];?>"></td>
		   <td>Privious Due<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="pdue" class="tb5" value="<?php echo $editrow['pdue'];?>"></td>
		   
		</tr>
           
		 <tr>
	     <td>&nbsp;</td>
		 <td>&nbsp;</td>
		 </tr>
		 <tr>
		   
		    <td>&nbsp;<b>Total Amt</b><span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="tamt" class="tb5" value="<?php echo $editrow['tpay'];?>"></td>
		    <td>Fine Fee<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="fine" class="tb5" value="<?php echo $editrow['latefee'];?>"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Concession<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="conce" class="tb5" value="<?php echo $editrow['concession'];?>"></td>
		    <td>&nbsp;Privious Advance<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="eamt" class="tb5" value="<?php echo $editrow['padv'];?>"></td>
		</tr>
		
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 
		
           
			 <tr>
		   <td><b>Total Pay</b><span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="tpay" class="tb5" value="<?php echo $editrow['tamnt'];?>"></td>
		    <td>&nbsp;<b>Total Paid</b><span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="tpaid" class="tb5" value="<?php echo $editrow['fee_deposit'];?>"></td>
		</tr>
		
		 <tr>
		   <td><b>Due</b><span style="color:#FF0000">*</span></td>
		   <td>
		   <input type="text" name="due" class="tb5" value="<?php echo $editrow['due'];?>">
		   <input type="hidden" name="id" class="tb5" value="<?php echo $editrow['id'];?>"></td>
		    <td>&nbsp;<b>Extra Paid</b><span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="extra_amnt" class="tb5" value="<?php echo $editrow['extra_amnt'];?>"></td>
		</tr>
		
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
             <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="update" value="Update" style="width:100px"></td>
		</tr>
                        
    </table>
      
     
         
             
         
                 
                   </form>
                   
				   
				   </div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
