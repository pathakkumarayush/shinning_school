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
<div class="left_sect"><img src="images/FEE Management/feehome.png" />
<a href="./?pageid=total_fee">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Transport Fee Collection by date </h2>
<a href="./?pageid=feecollectionby_date" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Tution Fee</a>
</div>
<div class="col_4">

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style=" font-size:18px">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."trans_fee_date"."&&divid=1"; ?>">Today Collection</a>&nbsp;&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."trans_fee_date"."&&divid=2"; ?>">Collection By Date</a>	
			  &nbsp;&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."trans_date_rang"."&&divid=2"; ?>">
			  Collection By B/W 
			  Date</a>   
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
		  <td><input type="text" name="date"  class="tb5" style="width:110px">yyyy-mm-dd</td>
		  </tr></td>
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

		   
		   <div class="table" style="border: #006633 20px solid; height:auto; margin:0px 0px 0px 0px">
		   <div id="printablediv" style="width: 100%;">
		    <h2 align="center" style="margin-top:9px; color:#990033">Kabra Memorial Public School</h2>
                   <h2 align="center" style="margin-top:9px; color:#990033">Transport Fee - Session: <?php echo $_SESSION['session']; ?></h2>
				   
         <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	      ?>
		    <h2 align="center" style="margin-top:9px; color:#990033">Date: <?php echo date("d-m-Y",strtotime(date("Y-m-d"))); ?></h2>
		   <table width="70%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 120px; font-size:14px">
		       <tr style="font-weight:bold;">
			      <td>Sr</td>
				  <td>Std. Name</td>
				  <td>Class</td>
				  <td>Receipt No</td>
				  <td>Instalment</td>
				  <td>Month</td>
				  <td>Amount</td>
			</tr>
		    <?php
			$today=date("Y-m-d");
			$search=mysqli_query($con,"select * from fee_detail_trans where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$today."'");
			$i=1;
			while($studrow=mysqli_fetch_array($search))
			{
			$numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
		    $rowsearch=mysqli_fetch_array($numclass1);
			?>
			<tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $rowsearch['student_name'];   ?></td>
			<td><?php echo $studrow['class']; ?></td>
		    <td><?php echo $studrow['receiptno']; ?></td>
		    <td><?php echo $studrow['instalment']; ?></td>
			<td><?php echo $studrow['month']; ?></td>
			<td><?php  $val= $studrow['fee_deposit']; 
					 echo $val;
					 $val2+=$val;
					 ?></td>
			 </tr>
			 <?php
              $i++;
			  }
			 ?>	
			 <tr>
			    <td></td>
				<td><b>Total</b></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b><?php echo $val2;  ?></b></td>
			 </tr>		 
			 </table>
			
         <?php
           }
		  ?>
		  
		  <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
	   <h2 align="center" style="margin-top:9px; color:#990033">Date: <?php echo date("d-m-Y",strtotime($_POST['date'])); ?></h2>
		   <table width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 50px; font-size:14px">
		       <tr style="font-weight:bold">
			      <td>Sr</td>
				  <td>Name</td>
				  <td>Class</td>
				  
				  <td>Receipt No</td>
				  <td>Instalment</td>
				  <td>Month</td>
				  <td>Amount</td>
			  </tr>
		         <?php
			
			
			  $search=mysqli_query($con,"select * from fee_detail_trans where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$_POST['date']."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				  <td><?php 
				   
				  echo $rowsearch['student_name']; 
				  ?></td>
				  <td><?php echo $studrow['class']; ?></td>
				 <td><?php echo $studrow['receiptno']; ?></td>
				   <td><?php echo $studrow['instalment']; ?></td>
				  <td><?php echo $studrow['month']; ?></td>
				  <td><?php 
				     $val= $studrow['fee_deposit']; 
					 echo $val;
					 $val2+=$val;
					 ?></td>
			 </tr>
			 <?php
              $i++;
			  }
			 ?>	
			 <tr>
			    <td></td>
				<td><b>Total</b></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b><?php echo $val2;  ?></b></td>
			 </tr>		 
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

  