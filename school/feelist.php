<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
require_once("../db.php"); 
?>
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
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Due Fee details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
<table border="1" id="sample_1" cellspacing="0" cellpadding="0" style="width:1050px; font-size:14px; text-transform:uppercase;">
<tr align="center">
<td colspan="11">
<span align="center" style="margin-top:16px; color:#006633;font-weight:bold;">SHINING PUBLIC HR. SEC. SCHOOL RAISEN (M.P.)</span><br />
</td>
</tr>	
<tr style="font-weight:bold; color:#000000">
		<td>Sr</td>
		
		<td>Student Name</td>
		<td>Student Father</td>
		<td>Student Class</td>
		<td>Remark</td>
		<td>Previous Year Fee</td>
	    <td>Deposit Fee</td>
		<td>Conc. Fee</td>
		<td>Balance Fee</td>
		
		
		
		
       </tr>
       <?php
	   $enquiry=mysqli_query($con,"select * from privious_fee where session='".$_GET['ses']."'");
       $i=1;
	   $tdepo=0;
	   $tdue=0;
	   $tcont=0;
	   $tbalt=0;
	   $tota=0;
	   $tbala=0;
	   while($enquiryrow=mysqli_fetch_array($enquiry))
       {
	     ?>	
       <tr style="color:#fff; line-height:15px; color:#000000" align="center">
        <td><?php echo $i;  ?></td>
	    <td>
		<?php 
	    $squiry=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and student_id='".$enquiryrow['sid']."' ");
		$stdrow=mysqli_fetch_array($squiry);
		echo $stdrow['student_name'];
		?>
		</td>
		<td><?php echo $stdrow['student_fname']; ?></td>
       <td><?php echo $stdrow['student_class']; ?></td>
	   <td><?php echo $enquiryrow['rmk']; ?></td>
	   <td><?php echo ucwords($enquiryrow['amt']); $tota+=(float)$enquiryrow['amt']; ?></td>
	   
	   <td>
<?php
$search1=mysqli_query($con,"select sum(fee_deposit),sum(concession) from fee_detail_preivios where student='".$enquiryrow['sid']."' ");
$studrow=mysqli_fetch_array($search1);
// $depo= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];
$depo= $studrow['sum(fee_deposit)'];
$tcon= $studrow['sum(concession)'];
echo  $depo;

$tdepo+=$depo;
?>			
	
	
	</td>
	
	<td><?php echo  $tcon; $tcont+=(float)$tcon; ?></td>
	
	
	<td><?php echo $bala = (float)$enquiryrow['amt'] - (float)$depo-(float)$tcon; $tbala+=$bala;?></td>
	
	
	
	   </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	
	 <tr style="font-weight:bold;" align="center">
	    <td colspan="5" align="right">Total</td>
	    <td><?php echo $tota;  ?></td>
	    <td><?php echo $tdepo;  ?></td>  
		<td><?php echo $tcont;  ?></td>  
	    <td><?php echo $tbala;  ?></td> 
		
	   </tr>
	
	  <tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
	 
	</table>