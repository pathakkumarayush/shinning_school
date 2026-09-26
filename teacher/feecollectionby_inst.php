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
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
Tution Fee</h2>
</div>
<div class="col_4">
<form action="#" method="post" enctype="multipart/form-data">
<div class="box-head" style="font-size:18px">
<a style="border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_inst"."&&divid=1"; ?>">Instalment1</a>&nbsp;||&nbsp;
<a style="border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_inst"."&&divid=2"; ?>">Instalment1-2</a>&nbsp;||&nbsp;
<a style="border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_inst"."&&divid=3"; ?>">Instalment1-3</a>&nbsp;||&nbsp;
<a style="border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectionby_inst"."&&divid=4"; ?>">Instalment1-4</a>&nbsp;||&nbsp;


</div>

<div class="table" style="border: #006633 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
<div id="printablediv" style="width: 100%;">
<h2 align="center" style="margin-top:20px; color:#990033;font-weight:bold;">Goyenka Public School</h2>
      
         <?php
		 if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		 {
		 ?>
         <table border="1" cellspacing="0" cellpadding="0" style="width:1080px; color:#000000; font-size:16px;">
			<tr style="font-weight:bold;">
			<td>No</td>
			<td>Name</td>
			<td>Class</td>
			<td>Instalment<br /><br />
			 April,May,June
			</td>
			<td>T-Amt</td>
			<td>Pay-Amt</td>
			<td>Conce.</td>
			<td>Bal.</td>
			</tr>
			<?php
		    $numclass=mysqli_query($con,"select count(student_id) from student where rti='No' and schild='No'");
			$rownum=mysqli_fetch_array($numclass);
	        $numclass1=mysqli_query($con,"select * from student where rti='No' and student_session='".$_SESSION['session']."'  and status='0'  order by student_class,student_name asc");
		    $studrow=mysqli_fetch_array($search);
			$i=1;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $rownum1['student_name'];?>
			</td> 
			<td><?php echo $rownum1['student_class'];?></td>
		    <td>Instalment1</td>
			<td>
			<?php
			$searchinst=mysqli_query($con,"select * from  instdetail where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowinst=mysqli_fetch_array($searchinst);
			$act=mysqli_query($con,"select * from  activity where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowact=mysqli_fetch_array($act);
			
			echo $ifee = $rowinst['amnt']*3+$rowact['fee'];
			$tifee+=$ifee;     
			?>
			</td>
			
			<td>
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession),sum(month) from fee_detail where 
		    class='".$rownum1['student_class']."' and student='".$rownum1['student_id']."' and session='".$_SESSION['session']."'");
            $studrow=mysqli_fetch_array($search);
            $tutfee = $studrow['sum(fee_deposit)']-$studrow['sum(latefee)']; 
	        echo $tutfee; 
			$totutfee+=$tutfee;
			?>
			</td>
		    <td><?php echo $con = $studrow['sum(concession)']; $cont+=$con;  ?></td>
			<td><?php 
			$bal = $ifee-$tutfee-$con; 
			
			$conta = $tutfee+$con;
			
			if($ifee<$tutfee)
			{
			echo $bal = '0';
			}
			else if($ifee<$conta)
			{
			echo $bal = '0';
			}
			else
			{ echo $bal;}
			$tbal+=$bal;
			
			?>
			</td>
			
		    </tr>
	        <?php
	        $i++;
	        }
	        ?>
			<tr><td colspan="4"><b style="float:right">Total</b></td><td><b><?php echo $tifee; ?></b></td>
			<td><b><?php echo $totutfee; ?></b></td><td><b><?php echo $cont; ?></td><td><b><?php echo $tbal; ?></b></td></tr>
	        </table>
         <?php
		 }
		 ?>
		 
		 		
         <?php
		 if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		 {
		 ?>
         <table border="1" cellspacing="0" cellpadding="0" style="width:1080px; color:#000000; font-size:16px;">
			<tr style="font-weight:bold;">
			<td>No</td>
			<td>Name</td>
			<td>Class</td>
			<td>Instalment2<br /><br />
			 April,May,June.July,Aug,Sep
			</td>
			<td>T-Amt</td>
			<td>Pay-Amt</td>
			<td>Conce.</td>
			<td>Bal.</td>
			</tr>
			<?php
		    $numclass=mysqli_query($con,"select count(student_id) from student where rti='No' and schild='No'");
			$rownum=mysqli_fetch_array($numclass);
	        $numclass1=mysqli_query($con,"select * from student where rti='No' and student_session='".$_SESSION['session']."'  and status='0'  order by student_class,student_name asc");
		    $studrow=mysqli_fetch_array($search);
			$i=1;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $rownum1['student_name'];?>
			</td> 
			<td><?php echo $rownum1['student_class'];?></td>
		    <td>Instalment2</td>
			<td>
			<?php
			$searchinst=mysqli_query($con,"select * from  instdetail where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowinst=mysqli_fetch_array($searchinst);
			$act=mysqli_query($con,"select * from  activity where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowact=mysqli_fetch_array($act);
			
			if($rownum1['student_class']=="9th" || $rownum1['student_class']=="10th")
			{
			$exfee = '350';
			}
			else
			{
			$exfee = '250';
			}
			
			echo $ifee = $rowinst['amnt']*6+$rowact['fee']+$exfee;
			$tifee+=$ifee;     
			?>
			</td>
			
			<td>
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession),sum(month) from fee_detail where 
		    class='".$rownum1['student_class']."' and student='".$rownum1['student_id']."' and session='".$_SESSION['session']."'");
            $studrow=mysqli_fetch_array($search);
            $tutfee = $studrow['sum(fee_deposit)']-$studrow['sum(latefee)']; 
	        echo $tutfee; 
			$totutfee+=$tutfee;
			?>
			</td>
		    <td><?php echo $con = $studrow['sum(concession)']; $cont+=$con;  ?></td>
			<td><?php 
			$bal = $ifee-$tutfee-$con; 
			
			$conta = $tutfee+$con;
			
			if($ifee<$tutfee)
			{
			echo $bal = '0';
			}
			else if($ifee<$conta)
			{
			echo $bal = '0';
			}
			else
			{ echo $bal;}
			$tbal+=$bal;
			
			?>
			</td>
			
		    </tr>
	        <?php
	        $i++;
	        }
	        ?>
			<tr><td colspan="4"><b style="float:right">Total</b></td><td><b><?php echo $tifee; ?></b></td>
			<td><b><?php echo $totutfee; ?></b></td><td><b><?php echo $cont; ?></td><td><b><?php echo $tbal; ?></b></td></tr>
	        </table>
         <?php
		 }
		 ?>
		 
		 		
         <?php
		 if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		 {
		 ?>
         <table border="1" cellspacing="0" cellpadding="0" style="width:1080px; color:#000000; font-size:16px;">
			<tr style="font-weight:bold;">
			<td>No</td>
			<td>Name</td>
			<td>Class</td>
			<td>Instalment3<br /><br />
			Apl,May,June.July,Aug,Sep,Oct,Nov,Dec
			</td>
			<td>T-Amt</td>
			<td>Pay-Amt</td>
			<td>Conce.</td>
			<td>Bal.</td>
			</tr>
			<?php
		    $numclass=mysqli_query($con,"select count(student_id) from student where rti='No' and schild='No'");
			$rownum=mysqli_fetch_array($numclass);
	        $numclass1=mysqli_query($con,"select * from student where rti='No' and student_session='".$_SESSION['session']."'  and status='0'  order by student_class,student_name asc");
		    $studrow=mysqli_fetch_array($search);
			$i=1;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $rownum1['student_name'];?>
			</td> 
			<td><?php echo $rownum1['student_class'];?></td>
		    <td>Instalment3</td>
			<td>
			<?php
			$searchinst=mysqli_query($con,"select * from  instdetail where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowinst=mysqli_fetch_array($searchinst);
			$act=mysqli_query($con,"select * from  activity where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowact=mysqli_fetch_array($act);
			
			if($rownum1['student_class']=="9th" || $rownum1['student_class']=="10th")
			{
			$exfee = '700';
			}
			else
			{
			$exfee = '500';
			}
			
			echo $ifee = $rowinst['amnt']*9+$rowact['fee']+$exfee;
			$tifee+=$ifee;     
			?>
			</td>
			
			<td>
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession),sum(month) from fee_detail where 
		    class='".$rownum1['student_class']."' and student='".$rownum1['student_id']."' and session='".$_SESSION['session']."'");
            $studrow=mysqli_fetch_array($search);
            $tutfee = $studrow['sum(fee_deposit)']-$studrow['sum(latefee)']; 
	        echo $tutfee; 
			$totutfee+=$tutfee;
			?>
			</td>
		    <td><?php echo $con = $studrow['sum(concession)']; $cont+=$con;  ?></td>
			<td><?php 
			$bal = $ifee-$tutfee-$con; 
			
			$conta = $tutfee+$con;
			
			if($ifee<$tutfee)
			{
			echo $bal = '0';
			}
			else if($ifee<$conta)
			{
			echo $bal = '0';
			}
			else
			{ echo $bal;}
			$tbal+=$bal;
			
			?>
			</td>
			
		    </tr>
	        <?php
	        $i++;
	        }
	        ?>
			<tr><td colspan="4"><b style="float:right">Total</b></td><td><b><?php echo $tifee; ?></b></td>
			<td><b><?php echo $totutfee; ?></b></td><td><b><?php echo $cont; ?></td><td><b><?php echo $tbal; ?></b></td></tr>
	        </table>
         <?php
		 }
		 ?>
          
		 <?php
		 if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		 {
		 ?>
         <table border="1" cellspacing="0" cellpadding="0" style="width:1080px; color:#000000; font-size:16px;">
			<tr style="font-weight:bold;">
			<td>No</td>
			<td>Name</td>
			<td>Class</td>
			<td>Instalment4<br /><br />
			Apl,May,June.July,Aug,Sep,Oct,Nov,Dec,Jan,Feb,Mrh
			</td>
			<td>T-Amt</td>
			<td>Pay-Amt</td>
			<td>Conce.</td>
			<td>Bal.</td>
			</tr>
			<?php
		    $numclass=mysqli_query($con,"select count(student_id) from student where rti='No' and schild='No'");
			$rownum=mysqli_fetch_array($numclass);
	        $numclass1=mysqli_query($con,"select * from student where rti='No' and student_session='".$_SESSION['session']."'  and status='0'  order by student_class,student_name asc");
		    $studrow=mysqli_fetch_array($search);
			$i=1;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			<td><?php echo $i;  ?></td>
			<td><?php echo $rownum1['student_name'];?>
			</td> 
			<td><?php echo $rownum1['student_class'];?></td>
		    <td>Instalment4</td>
			<td>
			<?php
			$searchinst=mysqli_query($con,"select * from  instdetail where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowinst=mysqli_fetch_array($searchinst);
			$act=mysqli_query($con,"select * from  activity where class='".$rownum1['student_class']."' and session='".$_SESSION['session']."'");
		    $rowact=mysqli_fetch_array($act);
			
			if($rownum1['student_class']=="9th" || $rownum1['student_class']=="10th")
			{
			$exfee = '700';
			}
			else
			{
			$exfee = '500';
			}
			
			echo $ifee = $rowinst['amnt']*12+$rowact['fee']+$exfee;
			$tifee+=$ifee;     
			?>
			</td>
			
			<td>
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession),sum(month) from fee_detail where 
		    class='".$rownum1['student_class']."' and student='".$rownum1['student_id']."' and session='".$_SESSION['session']."'");
            $studrow=mysqli_fetch_array($search);
            $tutfee = $studrow['sum(fee_deposit)']-$studrow['sum(latefee)']; 
	        echo $tutfee; 
			$totutfee+=$tutfee;
			?>
			</td>
		    <td><?php echo $con = $studrow['sum(concession)']; $cont+=$con;  ?></td>
			<td><?php 
			$bal = $ifee-$tutfee-$con; 
			
			$conta = $tutfee+$con;
			
			if($ifee<$tutfee)
			{
			echo $bal = '0';
			}
			else if($ifee<$conta)
			{
			echo $bal = '0';
			}
			else
			{ echo $bal;}
			$tbal+=$bal;
			
			?>
			</td>
			
		    </tr>
	        <?php
	        $i++;
	        }
	        ?>
			<tr><td colspan="4"><b style="float:right">Total</b></td><td><b><?php echo $tifee; ?></b></td>
			<td><b><?php echo $totutfee; ?></b></td><td><b><?php echo $cont; ?></td><td><b><?php echo $tbal; ?></b></td></tr>
	        </table>
         <?php
		 }
		 ?>



		
		
		  
				
		 <br clear="all" />	
						
		</div>
		 <br clear="all" />
	    <input type="button" value="Print" onClick="javascript:printDiv('printablediv')" />
		</div>
		 <br clear="all" />
		 <br clear="all" />
        </div>
        <br clear="all" />
        </div>
        <br clear="all" />
        </div>
        </div>