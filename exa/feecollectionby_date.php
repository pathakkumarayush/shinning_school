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
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excell").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exml").table2excel({
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

 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" />
<a href="./?pageid=total_fee">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Fee Collection by date </h2></center>
<?php /*?><a href="./?pageid=trans_fee_date" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Transport Fee</a>
<a href="./?pageid=db_fee_date" style="color:#FFFFFF;float:right; background-color:#CC0000; margin-top:10px; padding:6px; font-size:18px">Daybording Fee</a><?php */?>
</div>
<div class="col_4">

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style=" font-size:18px">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."feecollectionby_date"."&&divid=1"; ?>">Today Collection</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_date"."&&divid=2"; ?>">Fee Collection date-wise</a>	
			  &nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."date_rang"."&&divid=2"; ?>">
			  Fee Collection B/W the dates
			  </a>   
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
                <a href="javascript:" id="date_from_btn">
                
                </a>
		  </td>
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
		 
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
             
		 ?>

		   
		   <div class="table" style="border: #006633 20px solid; height:auto; margin:0px 0px 0px 0px; text-transform:uppercase;">
		   <div id="printablediv" style="width: 100%;">
		    <h2 align="center" style="margin-top:9px; color:#006633"><?php echo $rowsch['school_name'];?></h2>
                   <h2 align="center" style="margin-top:9px; color:#006633">Tution Fee - Session: <?php echo $_SESSION['session']; ?></h2>
				   
         <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	      ?>
		    <h2 align="center" style="margin-top:9px; color:#006633">Date: <?php echo date("d-m-Y",strtotime(date("Y-m-d"))); ?></h2>
		   <table width="90%" id="tbl_exm" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 20px; font-size:14px">
		      <tr style="line-height:40px;"><td colspan="7"><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/date_list.php?ses=<?php echo $_SESSION['session'];  ?>')"> 
			  <input type="button" value="Print List " style="width:100px;"></a>
			  
			  <button type="button" class="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>
			  </td></tr>
			  
			  
			   <tr style="font-weight:bold;">
			       <td>Sr</td>
				   <td>Admission No</td>
				   <td>Student Name</td>
				   <td>Class</td>
				   <td>Receipt No</td>
				   <td>Instalment</td>
				   <td>Received Amount</td>
			   </tr>
		         <?php
			
			$today=date("Y-m-d");
			  $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$today."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				  <td><?php  echo $studrow['sch']; ?></td>
				  <td><?php  echo $studrow['name']; ?></td>
				  <td><?php echo $studrow['class']; ?></td>
				  <td><?php echo $studrow['receiptno']; ?></td>
				 
				  <td><?php echo $studrow['instalment']; ?></td>
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
		  
		  <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
	   <h2 align="center" style="margin-top:9px; color:#006633">Date: <?php echo date("d-m-Y",strtotime($_POST['date'])); ?></h2>
		   <table id="tbl_exml" width="90%" border="1" cellspacing="0" cellpadding="0" style="margin:10px 0px 0px 50px; font-size:14px">
		        <tr style="line-height:40px;"><td colspan="7">
				  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/date_listt.php?date=<?php echo $_POST['from']."&ses=".$_SESSION['session'] ;  ?>')">     <input type="button" value="Print List " style="width:100px; position:absolute"></a>
			  
			  <button type="button" class="button" id="excell" style="font-size:14px;margin:0px 0px 5px 130px;">Download Excel</button>
			  </td></tr>
			  
			  
			   <tr style="font-weight:bold">
			      <td>Sr</td>
				  <td>Admission No</td>
				  <td>Student Name</td>
				   
				  <td>Class</td>
				  
				  <td>Receipt No</td>
				 
				  <td>Instalment</td>
				  <td>Received Amount</td>
			  </tr>
		         <?php
			
			
			  $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$_POST['from']."'");
			
			  $i=1;
			  while($studrow=mysqli_fetch_array($search))
			  {
			     $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
				 
				 $rowsearch=mysqli_fetch_array($numclass1);
			   ?>
			 <tr>
			      <td><?php echo $i;  ?></td>
				  <td><?php  echo $studrow['sch']; ?></td>
				  <td><?php  echo $studrow['name']; ?></td>
				  
				  <td><?php echo $studrow['class']; ?></td>
				  <td><?php echo $studrow['receiptno']; ?></td>
				
				  <td><?php echo $studrow['instalment']; ?></td>
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
			
		  		 
		 </div>
      
                 
                   </form>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  