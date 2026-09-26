<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">


<div class="left_side">
<div id="tog" style=""><button >
<img src="images/r.png"  style="float:right; "/></button>

</div>

<?php include('left.php'); ?>

</div>

<div class="right_side" style="">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		
		$getdetail=mysqli_query($con,"select * from fee_detail where id='".$_GET['id']."' and session='".$_SESSION['session']."'");
		
		$rowfeedetail=mysqli_fetch_array($getdetail);
		?>
		
		
<div class="pro">
&nbsp;&nbsp;&nbsp;&nbsp;Fee Details - <?php  echo $studrow['student_name']; ?>
<br clear="all" />
</div>				
<div class="fee_main" style=" min-height:350px;">
<table class="table" style="margin:2px 0px 0px 1px; font-size:12px; font-weight:bold;" border="0">
           <tr>
		   <td>Receipt No:</td>
			   <td>
			    <?php echo $rowfeedetail['receiptno']; ?>
			   </td>
			
			
               <td width="45px">Date:</td>
               <td><?php echo date("d-m-Y",strtotime($rowfeedetail['date']));  ?></td>
            </tr>
          
			  <tr>
               <td width="72px">Name:</td>
               <td><?php echo ucwords($studrow['student_name']);  ?></td>
			   <td> Class:</td>
               <td><?php echo $studrow['student_class'];  ?></td> 
               </tr>
			
               <tr>               
               <td style="font-size:12px">Father :</td>
               <td><?php echo ucwords($studrow['student_fname']);  ?></td>
			   <td>Month:</td>
               <td><?php echo ucwords($rowfeedetail['month']); ?></td>
                </tr>
			  </table>
<table class="tbl1"  border="1" cellspacing="0" cellpadding="0" style="border:1px #FFFFFF solid; ">
<tr style="line-height:25px; color:#FFFFFF; background-color:#009966; font-weight:bold">
<td>&nbsp;&nbsp;Particulars</td><td>&nbsp;&nbsp; Amount(Rs)</td>
</tr>	

 <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Admission Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['adm_fee']; ?></td>
		  </tr>

<tr style="line-height:23px;">
  <td>&nbsp;&nbsp;Tution Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']; ?></td>
</tr>
 
		 
		  
		 <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Bus Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee_bus']; ?></td>
		  </tr>
		  
		  
		  <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Total Amount</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['inst_fee']+$rowfeedetail['caution']+$rowfeedetail['adm_fee']+$rowfeedetail['inst_fee_bus']; ?>
		  </td>
		  </tr>
		  
		  <?php
		   if(!empty($rowfeedetail['latefee']))
		   {
		   ?>
		  <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Fine</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['latefee']; ?></td>
		  </tr>
		  <?php } ?>
		  
		   <?php
		   if(!empty($rowfeedetail['pdue']))
		   {
		   ?>
		  <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Previous due</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['pdue']; ?></td>
		  </tr>
		  <?php } ?>
		  
		   
		   <?php
		   if(!empty($rowfeedetail['padv']))
		   {
		   ?>
		  <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Previous advance</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['padv']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  
		  
		  
		  <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Concession</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['concession']; ?></td>
		  </tr>
		  
		 
		  
		  <tr style="line-height:23px;">
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td><td>&nbsp;&nbsp; <b><?php echo $rowfeedetail['fee_deposit']; ?></b></td>
		  </tr>
		  <?php
		                   if(!empty($rowfeedetail['due']))
		                    {
		                   ?>
		    <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Due Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['due']; ?></td>
		  </tr><?php } ?>
		    
						   <?php
		                   if(!empty($rowfeedetail['extra_amnt']))
		                    {
		                   ?>
		  <tr style="line-height:23px;">
		  <td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp; <?php echo $rowfeedetail['extra_amnt']; ?></td>
		  </tr>
		   <?php }?>
		  <tr>
		  <td colspan="2"> Payment Type-  <?php echo $rowfeedetail['pay_type']; ?></td>
		  </tr>
		   <tr>
		  <td colspan="2"> Remarks-  <?php echo $rowfeedetail['remark']; ?></td>
		  </tr>
</table>


<br clear="all" />
<br clear="all" />
</div>
</div>



</div>

<br clear="all" />
</div>
</div>
</div>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>