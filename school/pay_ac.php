<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>
<html>
<head>
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
                    filename: "Fee Collection By Session("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
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
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
</head>
<?php
 $month=array("July","August","September","October","November","December","January","February","March","April");
//$_POST['class']="1st";
?>

 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Fee Collection By A/C No</h2></center>
<!--<a href="./?pageid=trans_feecollectinby_session" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Transport Fee</a>-->

</div>
<div class="col_4">


<form action="#" method="post" enctype="multipart/form-data">
		    <div class="box-head" style="font-size:18px">
			<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."pay_ac"; ?>">Search By A/C No</a>
			</div>
				
        
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
         <table style="margin:30px 0px 0px 70px; font-size:14px; width:390px">
         <tr>
         <td><b>Enter A/C No.</b></td>
		 <td><input type="text" name="ac" /></td>
		 <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
		 </tr>
		 
		
          
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		
		 
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
             
		 ?>
		  <?php
		  if(isset($_POST['search']))
          {          
		  ?>
		 <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/ac.php?ac=<?php echo $_POST['ac']."&ses=".$_SESSION['session'] ;;  ?>')"> <input type="button" value="Print List " style="width:100px; position:absolute"></a>
		 <?php }?>
		 <div class="table" style="border: #006633 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll; text-transform:uppercase;">
		 <div id="printablediv" style="width: 100%;">
		  <h2 align="center" style="margin-top:20px; color:#006633;font-weight:bold;"><?php echo $rowsch['school_name'];?></h2>
          <h2 align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_SESSION['session']; ?></h2>
		  <br clear="all" />
		  <?php
		  if(isset($_POST['search']))
          {          
		  ?>
			
			<table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr style="font-weight:bold;">
			<td>Sr.No</td>
			<td>Admission No</td>
			<td>A/C No</td>
			<td>Student Name</td>
			<td>Student Class</td>
		    <td>Total Amount</td>
			<td>Received Amount </td>
		    <td>Concession Amount</td>
			<td>Balance Amount</td>
			<td></td>
		    </tr>
            <?php
		    $numclass1=mysqli_query($con,"select * from student where sedate='".$_POST['ac']."' and student_session='".$_SESSION['session']."'");
			   
		    $i=1;
			$total2=0;
			$amtrc2=0;
			$conct=0;
			$val10=0;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			
			<td><?php echo $i;  ?></td>
			<td><?php echo $rownum1['student_scholar'];  $sid = $rownum1['student_id']; ?></td>
			<td><?php echo $rownum1['sedate'];  ?></td>
			<td>
			<?php
			if($rownum1['std_type']=='New')
			{
			echo $rownum1['student_name']; 
			}else{
			echo $rownum1['student_name'];
			}
			?>
			</td> 
			<td><?php echo $cls = $rownum1['student_class'];  ?></td>
		    <td>
		    <?php
			$rownum1['std_type'] = $rownum1['std_type'] ?? '';
			$rownum1['Yes'] = $rownum1['Yes'] ?? '';
			$rownum1['hostel_status'] = $rownum1['hostel_status'] ?? '';
			
		    if($rownum1['std_type']=='New' && $rownum1['bus']=='Yes')
			{
			$adm=mysqli_query($con,"select * from admission where class='$cls' and session='".$_SESSION['session']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$tbus=$rownum1['hostel_status'];
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
			$prow['amt'] = $prow['amt'] ?? 0;
	        $tpr=$prow['amt'];

			
			
 			$amnt = $rowselrec['amnt']+$rowsadm['fee']-$rownum1['famt'];
			$total1=$amnt+$tbus+$tpr;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['std_type']=='New')
			{
			$adm=mysqli_query($con,"select * from admission where class='$cls' and session='".$_SESSION['session']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
		    $prow['amt'] = $prow['amt'] ?? 0;
	        $tpr=$prow['amt'];
	        $rownum1['famt'] = $rownum1['famt'] ?? 0;
		
 			$amnt = (float)$rowselrec['amnt']+(float)$rowsadm['fee']-(float)$rownum1['famt'];
			$total1=$amnt+$tpr;;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['bus']=='Yes')
			{
		    $selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$tbus=$rownum1['hostel_status'];
			
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
	        $prow['amt'] = $prow['amt'] ?? 0;
			$tpr=$prow['amt'];

			$amnt = $rowselrec['amnt']-$rownum1['famt'];
			
			$total1=$amnt+$tbus+$tpr;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else{
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
		    $pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
	        $prow['amt'] = $prow['amt'] ?? 0;
			$tpr=$prow['amt'];

			$amnt = (float)$rowselrec['amnt']-(float)$rownum1['famt'];
			
			$total1=$amnt+$tpr;
	        echo $total1;
	        $total2+=$total1;
			}
			?>
		    </td>
			<td>
		
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(conc) from fee_detail where student='".$rownum1['student_id']."' and session='".$_SESSION['session']."'");
            $studrow=mysqli_fetch_array($search);
            $amtrc= $studrow['sum(fee_deposit)'];  
		    echo $amtrc;
		    $amtrc2+=$amtrc;
		    ?>					 
		    </td>
			
			<td>
			<?php 
			echo $studrow['sum(conc)'];   
		    $conct+=(float)$studrow['sum(conc)'];
			?> 
			</td>
			
			
			<td>
			<?php 
			$bal= $total1-$amtrc-$studrow['sum(conc)'];   
			echo $bal;
			$val10+=$bal;
			?> 
			</td>
			
		<td style="width:100px;"><a href="<?php echo $var."payment&&acn=".$rownum1['student_id']; ?>" target="_blank" style="font-weight:bold; font-size:14px;">Pay Fee</a></td>
			</tr>
	        <?php
	        $i++;
	        }
	        ?>
	        <tr>
			<td><b>Total</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		    <td><b><?php echo $total2;  ?></b></td>
		    <td><b><?php echo $amtrc2;  ?></b></td>
		    <td><b><?php echo $conct;  ?></b></td>
		    <td><b><?php echo $val10;  ?></b></td>
			<td></td>
			</tr>
			
			<tr><td colspan="8"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td></tr>
	        </table>
		
		 <?php } ?>
			</div>
		    
		  		 
		    </div>
		 
		 </form>
            </div>
            <br clear="all" />
            </div>
            <br clear="all" />
            </div>
            </div>
			