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
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=total_fee">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Fee Collection By Session  </h2>
<a href="./?pageid=feecollectinby_session" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Tution Fee</a>
</div>
<div class="col_4">


<form action="#" method="post" enctype="multipart/form-data">
				 <div class="box-head" style="font-size:18px">
					<?php /*?> <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."trans_feecollectinby_session"."&&divid=1"; ?>">Total Fee Collection By Session </a><?php */?><a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."trans_feecollectinby_session"."&&divid=2"; ?>">  Total Fee Collection By Class In Session</a>
						</div>
				
				 <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
        <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2015;$i<=2025;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
           <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
        
        <?php
		 }
		 ?>
         <?php
		 if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		 {
		 ?>
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
         <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
         <tr>
         <td>Select Session</td><td><select name="session" class="select">
         <option value="-1">Select Session</option>
         <?php  for($i=2015;$i<=2025;$i++)
	     {  ?>
         <?php $j=$i; $j++;  $k=$i."-".$j; ?>
         <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
         <?php } ?>
         </select></td>
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
         <td><select name="class" class="styled select" onchange="showSection(this.value)">
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
		<br>
        </div>
        
        <?php
		 }
		 ?>
		 
		 
		  <div class="table" style="border: #006633 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
		  <div id="printablediv" style="width: 100%;">
		  <h2 align="center" style="margin-top:20px; color:#990033;font-weight:bold;">Kabra Memorial Public School</h2>
          <h2 align="center" style="margin-top:9px; color:#990033;font-weight:bold;">Transport Fee - Session: <?php echo $_POST['session']; ?></h2>
		  <?php if($_POST['class'])
		  {
		  ?>
		  <h2 align="center" style="margin-top:9px; color:#990033;font-weight:bold;">Class: <?php echo $_POST['class']; ?></h2>
		  <?php }?>
		  <?php
		  if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		  {
		  ?>
		   <table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr style="font-weight:bold;">
			<td>Sr.No</td>
			<td>Class</td>
		    <td>Total Amount</td>
			<td>Total Amount received</td>
			<td>Fine</td>
			<td>Concession</td>
			<td>Balance Amount</td>
		   </tr>
		   <?php
		   $studfine=0; 
		   $studconcess=0; 
		   $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' ");
		   $i=1;
		   ?>
		   <?php
		   while($row=mysqli_fetch_array($class))
		   {
		   ?>
           <tr>
		   <td><?php echo $i;   ?></td>
		   <td><?php echo $row['class'];   ?></td>
		   <td>
		   <?php
		   //$selrc=mysqli_query($con,"select * from definefee  where class='".$row['class']."' and session='".$_POST['session']."'");	
           //$rowselrec=mysqli_fetch_array($selrc);
		   
           $numclass=mysqli_query($con,"select count(student_id) from student where student_class='".$row['class']."' and student_session='".$_POST['session']."' and rti='No' 
		   and transport_status='Active'");
		   $rownum=mysqli_fetch_array($numclass);
		   
		 
		   
		   $numclasst=mysqli_query($con,"select * from student where student_class='".$row['class']."' and student_session='".$_POST['session']."' and rti='No' 
		   and transport_status='Active'");
		   $rownumt=mysqli_fetch_array($numclasst);
		
		   $rownumt['transport_stopage'];
		   $selrc=mysqli_query($con,"select * from stopage where stop_name='".$rownumt['transport_stopage']."' and session='".$_POST['session']."'");	
           $rowselrec=mysqli_fetch_array($selrc);
		   $tamt = $rowselrec['amnt'];
		   echo  $tamt*2;
		  
		 
		   ?>
		   
		   </td>
		   
		   
		   <td>
		   <?php
		   $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession) from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' 
		   and class='".$row['class']."'");
           $studrow=mysqli_fetch_array($search);
           $amtrc= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];  
		   echo $amtrc;
		   $amtrc2+=$amtrc;
		   ?>						 
		   </td>
		   <td><?php echo $studrow['sum(latefee)'];  
           $studfine+=$studrow['sum(latefee)'];
		   ?></td>
		   <td><?php 
		   echo $studrow['sum(concession)'];  
		   $studconcess+=$studrow['sum(concession)'];
		   ?></td>					  
		   <td>      
		   <?php 
	       $val5= ($ramt-$studrow['sum(concession)'])-$amtrc;   
		   echo $val5;
						           $val6+=$total1;
								   $valt=$val6-$amtrc;
								   
		   ?> 
		   </td>
		   </tr> 
	       <?php
		   $i++;
		   }
		   ?>
		   
		   <?php /*?><tr>
			      <td><b>Total</b></td>
			      <td></td>
				  <td><b><?php echo $val6;  ?></b></td>
				   
				  <td><b><?php echo $amtrc2;  ?></b></td>
				   <td><b><?php echo $studfine;   ?></b></td>
				  <td><b><?php echo $studconcess;   ?></b></td>
				  <td><?php echo $val5;  ?></td>
			   </tr><?php */?>
	
	       </table>
		   
		   
		    <?php
		    }
			else if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		    {
			?>	
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
			<tr style="font-weight:bold;">
			<td>Sr.No</td>
			<td>Name</td>
		    <td>Total Amount</td>
			<td>Total Amount received</td>
			<td>Concession</td>
			<td>Balance Amount</td>
		    </tr>
            <?php
		    
			$numclass1=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_POST['session']."' and 
			student_school='".$_SESSION['uid']."' and transport_status='Active'");
			   
		    $i=1;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			<td><?php echo $i;  ?></td>
			<td>
			<?php
			echo $rownum1['student_name']; 
			?>
			</td> 
		    <td>
		    <?php
			
			$selrc=mysqli_query($con,"select * from stopage where stop_name='".$rownum1['transport_stopage']."' and session='".$_POST['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
 			$amnt = $rowselrec['amnt']; 
			$total1=$val2+$amnt;
	        echo $total1;
	        $total2+=$total1;
			
			?>
		    </td>
			<td>
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession) from fee_detail_trans where session='".$_POST['session']."' and school='".$_SESSION['uid']."' 
		    and class='".$_POST['class']."' and student='".$rownum1['student_id']."'");
            $studrow=mysqli_fetch_array($search);
            $amtrc= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];  
		    echo $amtrc;
		    $amtrc2+=$amtrc;
		    ?>						 
		    </td>
			<td><?php echo $con = $studrow['sum(concession)']; $cont+=$con;  ?></td>
			<td>
			<?php 
			$bal= $total1-$amtrc-$studrow['sum(concession)'];   
			echo $bal;
			$val10+=$bal;
			?> 
			</td>
			</tr>
	        <?php
	        $i++;
	        }
	        ?>
	        <tr>
			<td><b>Total</b></td>
			<td></td>
		    <td><b><?php echo $total2;  ?></b></td>
		    <td><b><?php echo $amtrc2;  ?></b></td>
			 <td><b><?php echo $cont  ?></b></td>
		    <td><b><?php echo $val10;  ?></b></td>
			</tr>
	        </table>
			<?php } ?>	
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