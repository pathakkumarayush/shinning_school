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
<?php
 $month=array("July","August","September","October","November","December","January","February","March");
//$_POST['class']="1st";
?>
 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="../school/images/FEE Management/feehome.png" />
<a href="./?pageid=total_fee">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Fee Collection</h2></center>
<!--<a href="./?pageid=trans_fee_month" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Transport Fee</a>-->
</div>
<div class="col_4">

<form action="#" method="post" enctype="multipart/form-data">
				 <div class="box-head" style="font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."feecollectinby_month"; ?>"><a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectinby_month"."&&divid=2" ?>">Total Fee Collection B/W Date And Class-Wise</a>
						</div>
			
         
       <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		       <tr> 
		        <td>Date From</td>
		        <td>
				<input required name="from" type="text"  readonly id="from" style=" width:136px;" class="tb5">
                <a href="javascript:" id="date_from_btn">
                
                </a>
				
				
				</td>
		  </td></tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		  <tr> 
		        <td>Date To</td>
		        <td>
		
				<input required name="to" type="text" readonly  id="to" style=" width:136px;" class="tb5">
                <a href="javascript:" id="date_to_btn">
               
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
		 </form>
		<br>
        </div>
        
       
		   
        <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/feedate_list.php?from=<?php echo $_POST['from']."&to=".$_POST['to']."&class=".$_POST['class']."&ses=".$_SESSION['session'] ;  ?>')">     <input type="button" value="Print List " style="width:100px; position:absolute"></a>
		       <div class="table" style="border:#006633 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll;text-transform:uppercase;">
                   
				<div id="printablediv" style="width: 100%;">
			
			    <table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:12px;text-transform:uppercase;">
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
				 
				   $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and date BETWEEN '$a' AND '$b'");
				   
			
			 $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
             
			  ?>
			 
			 <h2 align="center" style="margin-top:10px; color:#006633; font-weight:bold;"><?php echo $rowsch['school_name'];?></h2>

			 <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#006633">Report From Date: <?php echo $a ?> To Date: <?php echo $b ?> </h2>
		      <tr style="font-weight:bold; height:30px;">
			      <td>Sr</td>
			      <td>Date</td>
				  <td>Receipt No</td>
				  <td>A/c No</td>
				  <td>Student Name</td>
			      <td>Class</td>
				  <td>Tution Fee</td>
				  <td>Conc.</td>
				  <td>Paid</td>
				 
			      </tr>
				 <?php 
			      $i=1;
			     while($studrow=mysqli_fetch_array($search))
			     {
				 ?>
				   
<?php 
$reg=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
?>
				   
			   <tr>
			   <td><?php echo $i;  ?></td>
			   <td><?php $d = $studrow['date']; echo date("d-m-Y", strtotime($d));  ?></td>
			   <td><?php echo $studrow['receiptno']; ?></td>
			   <td><?php echo $studrow['acn']; ?></td>
		       <td><?php echo $studrow['name'];  ?></td>
			   <td><?php echo $studrow['class']; ?></td>
			   <td><?php  $act =  $studrow['inst_fee'];  echo $act; $tact+=$act;  ?> </td>
			   <td><?php echo $dairy = $studrow['conc']; $td+=$dairy;?></td>
			   <td><?php echo $feet= $studrow['fee_deposit'];  $tft+=$feet; ?></td>
			   </tr>
				   <?php
                    $i++;
			         }
			        ?>	
			       <tr style="font-weight:bold;">
			  	 <td colspan="8"><b>Total</b></td>
				 <td><?php echo  $tft; ?></td>
				
				 </tr>		 
				   <?php
				   }
				   
				   ?>
				   
				   <tr><td colspan="7"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td></tr>
				   	 </table>
		       </div>
			

				</div>
				
				
				
				
				
				
				
				
				
				



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  