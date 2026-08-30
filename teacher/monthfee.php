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
 $month=array("July","August","September","October","November","December","January","February","March");
//$_POST['class']="1st";
?>
 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" />
<a href="./?pageid=fee_account">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">STUDENT Tution FEE DETAILS</h2>
<a href="./?pageid=trans_fee_month" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Transport Fee</a>
</div>
<div class="col_4">

<form action="#" method="post" enctype="multipart/form-data">
				 <div class="box-head" style="font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."feecollectinby_month"; ?>"><a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feecollectinby_month"."&&divid=2" ?>">Toal Fee Collection By b/w date and Month</a>
						</div>
			
         
       <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		       <tr> 
		        <td>From</td>
		        <td><input type="text" name="from"  class="tb5" style="width:110px">yyyy-mm-dd</td>
		  </td></tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		  <tr> 
		        <td>To</td>
		        <td><input type="text" name="to"  class="tb5" style="width:110px">yyyy-mm-dd</td>
		  </tr></td>
          </tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td>
			<select name="class" onChange="showSection(this.value)" class="select">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class'].$rclass['class_section']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		 </form>
		<br>
        </div>
        
       
		   
       
		       <div class="table" style="border:#006633 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
                   
				<div id="printablediv" style="width: 100%;">
			
			    <table width="100%" border="2" cellspacing="0" cellpadding="0" style=" font-size:12px;">
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
				   $c=$_POST['class'];
				   $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and date BETWEEN '$a' AND '$b' AND class='$c' ");
				   
			
			
			  ?>
			 
			 <h2 align="center" style="margin-top:10px; color:#990033; font-weight:bold;">Kabra Memorial Public School</h2>
			 <h2 align="center" style="margin-top:10px; color:#990033">Income Report Class <?php echo $c ?> </h2>
			 <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033">Report From Date: <?php echo $a ?> To Date: <?php echo $b ?> </h2>
		      <tr style="font-weight:bold; height:30px;">
			      <td>Sr</td>
				  <td>Date</td>
				  <td>Name</td>
				  <td>Month</td>
				  <td>Instalment</td>
				  <td>Adm.</td>
				  <td>Caution</td>
				  <td>Tution</td>
				  <td>Bus</td>
				  <td>T-Amt</td>
				  <td>Conc.</td>
				  <td>Fine</td>
				  <td>Pdue.</td>
				  <td>G.Total</td>
				  <td>Paid</td>
				  <td>Due</td>
				  
			  </tr>
				   
				  
			<?php 
			       $i=1;
			       while($studrow=mysqli_fetch_array($search))
			       {
				   
				   
				   ?>
				   
<?php 
$reg=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
?>
				   
			       <tr>
				   <td><?php echo $i;  ?></td>
			       <td><?php $d = $studrow['date']; echo date("d-m-Y", strtotime($d));  ?></td>
			       <td><?php echo $rowstud['student_name'];  ?></td>
				   <td><?php echo $studrow['month'];  ?></td>
				   <td><?php echo $studrow['instalment'];  ?></td>
				   <td><?php echo $studrow['adm_fee'];  ?></td>
				   <td><?php echo $studrow['caution'];  ?></td>
				   <td><?php echo $studrow['inst_fee'];  ?></td>
				   <td><?php echo $studrow['inst_fee_bus'];  ?></td>
				   <td><?php echo $tp = $studrow['tpay']-$studrow['tution_fee']; $tpp+=$tp; ?></td>
				   <td><?php echo $studrow['concession']; $tcon+=$studrow['concession'];  ?></td>
				   <td><?php echo $studrow['latefee'];  $tfine+=$studrow['latefee']; ?></td>
				   <td><?php echo $studrow['tution_fee']; $tpdue+=$studrow['tution_fee']; ?></td>
				   <td><?php echo $tt = $studrow['tamnt']-$studrow['tution_fee'];  $tot+=$tt; ?></td>
				   <td><?php echo $studrow['fee_deposit']; $tdeo+=$studrow['fee_deposit'];  ?></td>	
				   <td><?php echo $studrow['due']; $tdue+=$studrow['due']; ?></td>	
				   </tr>
				   <?php
                    $i++;
			         }
			        ?>	
			       <tr>
		       	   <td></td> 
				   <td>Total</td>
				   <td></td> 
				   <td></td> 
				   <td></td> 
				   <td></td> 
				   <td></td> 
				   <td></td> 
				   <td></td> 
				   <td><?php echo $tpp; ?></td> 
				   <td><?php echo $tcon; ?></td> 
				   <td><?php echo $tfine; ?></td> 
				   <td><?php echo $tpdue; ?></td> 
				   <td><?php echo  $tot; ?></td> 
				   <td><?php echo $tdeo; ?></td> 
				   <td><?php //echo $tdue; ?></td>  
				   </tr> 
				   <?php
				   }
				   
				   ?>
				   
				   
				   	 </table>
		       </div>
			 <input type="button" value="Print" onClick="javascript:printDiv('printablediv')" />

				</div>
				
				
				
				
				
				
				
				
				
				



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  