  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Kabra Memorial Public School</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
	<script type="text/javascript">
function getval(val)
{
alert(val);
}
</script>
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
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Ledger</h2>
</div>
<div class="col_4">

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
            <div class="box-head">
			<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="">Student Ledger</a>
			</div>
          
      <div class="table" style="border:20px #006633 solid;height:650px; width:1100px; overflow-y:scroll;overflow:scroll;">
	   <form id="form1">
       <div id="dvContainer">
	   <br />
	
	   <div id="dvContainer1">
	   <h2 style="font-weight:bold; color:#CC0000; margin-left:10px;">Student Fee Ledger</h2>
	   <br /><br />
	   <?php
	   $memo=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and id='".$_GET['id']."'");
	   $rowmemo=mysqli_fetch_array($memo);
	   
	   $sea=mysqli_query($con,"select * from student where student_id='".$rowmemo['student']."' and student_session='".$_SESSION['session']."' ");
	   $rowss=mysqli_fetch_array($sea);
	  
	   
	   ?>
	   <table >
	   <tr>
	   <td style="font-weight:bold">Student Name -</td><td><?php echo $rowss['student_name']; ?></td>
	   <td style="font-weight:bold">Student Father -</td><td><?php echo $rowss['student_fname']; ?></td>
	    </tr>
		<tr>
	    <td style="font-weight:bold">Student Class -</td><td><?php echo $rowss['student_class']; ?></td>
	    <td style="font-weight:bold">Student Mobile -</td><td><?php echo $rowss['student_contactno']; ?></td>
	    </tr>
		
		<tr>
	    <td style="font-weight:bold">Scholar No -</td><td><?php echo $rowss['student_scholar']; ?></td>
	    <td style="font-weight:bold">Receipt No-</td><td><?php echo $rowmemo['receiptno']; ?></td>
	    </tr>
		
		<tr>
	    <td style="font-weight:bold">Month -</td><td><?php echo $rowmemo['month']; ?></td>
	      <td style="font-weight:bold">Instalment -</td><td><?php echo $rowmemo['instalment']; ?></td>
	    </tr>
		
	   </table>
	   <table >
	   <tr>
	   <td><b>Particulars</b></td>
	   <td ><b>Amount(Rs)</b></td>
	   </tr>
	       <tr>
		  <td>&nbsp;&nbsp; Tution Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['inst_fee']; ?></td>
		  </tr>
		 
		   <?php
		   if(!empty($rowmemo['inst_fee_bus']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Transport Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['inst_fee_bus']; ?></td>
		  </tr>
		  <?php } ?> 
		 
		  <tr>
		  <td>&nbsp;&nbsp;Admission Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['adm_fee']; ?></td>
		  </tr>
		  
		  <tr>
		  <td>&nbsp;&nbsp;Caution Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['caution']; ?></td>
		  </tr>
		    <?php
		   if(!empty($rowmemo['pdue']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Previous due</td><td>&nbsp;&nbsp; <?php echo $rowmemo['pdue']; ?></td>
		  </tr>
		  <?php } ?>
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Total Amount</td><td>&nbsp;&nbsp; <?php echo $rowmemo['tpay']; ?>
		  </td>
		  </tr>
		  
		  <?php
		   if(!empty($rowmemo['latefee']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Other Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['latefee']; ?></td>
		  </tr>
		  <?php } ?>
		  
		 
		   
		   <?php
		   if(!empty($rowmemo['padv']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Previous advance</td><td>&nbsp;&nbsp; <?php echo $rowmemo['padv']; ?></td>
		  </tr>
		  <?php } ?>
		  <tr>
		  <td>&nbsp;&nbsp;Concession</td><td>&nbsp;&nbsp; <?php echo $rowmemo['concession']; ?></td>
		  </tr>
		  
		  
		  <tr>
		  <td>&nbsp;&nbsp;Pay Amount</td><td>&nbsp;&nbsp; <?php echo $rowmemo['tamnt']; ?></td>
		  </tr>
		  
		  <tr>
		  <td><b>&nbsp;&nbsp;Paid Amount</b></td><td>&nbsp;&nbsp; <b><?php echo $rowmemo['fee_deposit']; ?></b></td>
		  </tr>
		  <?php
		                   if(!empty($rowmemo['due']))
		                    {
		                   ?>
		    <tr>
		  <td>&nbsp;&nbsp;Due Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['due']; ?></td>
		  </tr><?php } ?>
		    
						   <?php
		                   if(!empty($rowmemo['extra_amnt']))
		                    {
		                   ?>
		  <tr>
		  <td>&nbsp;&nbsp;Extra Fee</td><td>&nbsp;&nbsp; <?php echo $rowmemo['extra_amnt']; ?></td>
		  </tr>
		   <?php }?>
		  <tr>
		  <td colspan="2">&nbsp;
		  Payment Type-
		  <?php 
		  if
		  ($rowmemo['pay_type']=='Cash')
		  {
		  echo 'Cash';
		  } 
		  else
		  {
		  echo $rowmemo['pay_type'];
		  ?>
		  , &nbsp;Cheque No - <?php  echo $rowmemo['cno'];  ?>
		  <br>
		  Date - <?php  echo $rowmemo['cd'];  ?>
		  <?php } ?>
		  
		  
		  
		  </td>
		  </tr>
		 
	  
	   
	   </table>
	   
	   <br />
	   
	   
	   </div>
	  
	  
	</div>
		<br />
	<input type="button" value="Print" id="btnPrint" style="padding:5px;" />
	
    </div>
    </form>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  