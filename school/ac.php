<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
require_once("../db.php"); 
?>
<table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:16px;">
		<tr align="center">
		<td colspan="9">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">SHINING PUBLIC HR. SEC SCHOOL RAISEN (M.P.)</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; ?></span><br />
		 
		</td>
		</tr>	
			
			<tr style="font-weight:bold;" align="center">
			<td>Sr.No</td>
			<td>Admission No</td>
			<td>A/C No</td>
			<td>Student Name</td>
			<td>Student Class</td>
		    <td>Total Amount</td>
			<td>Received Amount </td>
		    <td>Concession Amount</td>
			<td>Balance Amount</td>
		    </tr>
            <?php
			
			$numclass1=mysqli_query($con,"select * from student where sedate='".$_GET['ac']."' and student_session='".$_GET['ses']."'");
			  
		    $i=1;
		    $total2=0;
			$amtrc2=0;
			$conct=0;
			$val10=0;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr align="center">
			
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
			$adm=mysqli_query($con,"select * from admission where class='$cls' and session='".$_GET['ses']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$tbus=$rownum1['hostel_status'];
			
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_GET['ses']."'");
	        $prow=mysqli_fetch_array($pr);
	        $tpr=$prow['amt'];
           
		    $amnt = (float)$rowselrec['amnt']-(float)$rownum1['famt'];
		
			$total1=$amnt+$tbus+$tpr;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['std_type']=='New')
			{
			$adm=mysqli_query($con,"select * from admission where class='$cls' and session='".$_GET['ses']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_GET['ses']."'");
	        $prow=mysqli_fetch_array($pr);
			$prow['amt'] = $prow['amt'] ?? 0;
	        $tpr=$prow['amt'];
			
			
 			$amnt = (float)$rowselrec['amnt']+(float)$rowsadm['fee']-(float)$rownum1['famt'];
			$total1=$amnt+$tpr;;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['bus']=='Yes')
			{
		    $selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$tbus=$rownum1['hostel_status'];
			
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_GET['ses']."'");
	        $prow=mysqli_fetch_array($pr);
			$prow['amt'] = $prow['amt'] ?? 0;
	        $tpr=$prow['amt'];

            
			$amnt = (float)$rowselrec['amnt']-(float)$rownum1['famt'];
			
			$total1=$amnt+$tbus+$tpr;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else{
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
		    $pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_GET['ses']."'");
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
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(conc) from fee_detail where student='".$rownum1['student_id']."' and session='".$_GET['ses']."'");
            $studrow=mysqli_fetch_array($search);
            $amtrc= $studrow['sum(fee_deposit)'];  
		    echo $amtrc;
		    $amtrc2+=$amtrc;
		    ?>					 
		    </td>
			
			<td>
			<?php 
			echo $studrow['sum(conc)'];   
		    $conct+=$studrow['sum(conc)'];
			?> 
			</td>
			
			<td>
			<?php 
			$bal= $total1-$amtrc-$studrow['sum(conc)'];   
			echo $bal;
			$val10+=$bal;
			?> 
			</td>
			
			</tr>
	        <?php
	        $i++;
	        }
	        ?>
	        <tr align="center">
			<td><b>Total</b></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		    <td><b><?php echo $total2;  ?></b></td>
		    <td><b><?php echo $amtrc2;  ?></b></td>
			<td><b><?php echo $conct;  ?></b></td>
		    <td><b><?php echo $val10;  ?></b></td>
			</tr>
			
			
	        </table>
			
			<br clear="all" />
			<table  border="1" cellspacing="0" cellpadding="0" style="width:100%; overflow:scroll;font-size:16px;">
		<tr style="line-height:25px; font-weight:bold;"><td colspan="15">Fee Leadger</td>
	   </tr>
		
		<tr style="font-weight:bold" align="center">
        <td>Receipt No.</td>
	    <td>Sch.Receipt</td>
		<td>A/C No</td>
		<td>Name</td>
		<td>Class</td>
		<td>Tution Fee</td>
		<td>Conce. Amount</td>
	    <td>Received Amount</td>
		<td>Date</td>
      
	    </tr>
        <?php
        $memo=mysqli_query($con,"select * from fee_detail where session='".$_GET['ses']."' and  acn='".$_GET['ac']."'");               
        $num=mysqli_num_rows($memo);

	    $i=1;
	    if($num>0)
		{
	    while($rowmemo=mysqli_fetch_array($memo))
		{
	    ?>	
    <tr style="color:#335599; font-size:14px;" align="center">
	<td><?php echo $rowmemo['receiptno'];?></td>
    <td><?php echo $rowmemo['sreceipt'];?></td>
	 <td><?php echo $rowmemo['acn'];?></td>
	 <td><?php echo $rowmemo['name'];?></td>
	 <td><?php echo $rowmemo['class'];?></td>
	<td><?php echo $rowmemo['inst_fee'];?></td>
	<td><?php echo $rowmemo['conc'];?></td>
	<td><?php echo $rowmemo['fee_deposit'];?></td>

    <td><?php echo date("d-m-Y",strtotime($rowmemo['date']));?></td> 
    
   
	</tr>
    <?php
    $i++;
	}
	}
	else
	{
	?>
	<tr>
	<td><span style="color:#CC0000">No Record</span></td>
	</tr>
	<?php
	}
	?>
	
    </table>