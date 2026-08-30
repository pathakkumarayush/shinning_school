<table id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0" style="text-transform:uppercase;">
		<tr align="center">
		<td colspan="7">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br />
         <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Session: <?php echo $_GET['ses']; ?></span><br />
		 <span align="center" style="margin-top:9px; color:#006633;font-weight:bold;">Class: <?php echo $_GET['class']; ?></span>
		</td>
		</tr>	
			
			<tr style="font-weight:bold;" align="center">
			<td>Sr.No</td>
			<td>Admission No</td>
			<td>Student <br />Name</td>
		    <td>Total <br />Amount</td>
			<td>Total Amount<br /> received</td>
			<td>Concession<br />Amount</td>
			<td>Balance <br />Amount</td>
		    </tr>
            <?php
			session_start();
	        require_once("../db.php"); 
		    $numclass=mysqli_query($con,"select count(student_id) from student where student_class='".$_GET['class']."' and student_session='".$_GET['ses']."' ");
			$rownum=mysqli_fetch_array($numclass);
			$numclass1=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='".$_GET['ses']."' ");
			   
		    $i=1;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr>
			
			<td><?php echo $i;  ?></td>
			<td><?php echo $rownum1['student_scholar'];  ?></td>
			<td>
			<?php
			if($rownum1['std_type']=='New')
			{
			echo $rownum1['student_name'].'New'; 
			}else{
			echo $rownum1['student_name'];
			}
			?>
			</td> 
			
		    <td>
		    <?php
			
			$exam=mysqli_query($con,"select * from activity where class='".$_GET['class']."' and session='".$_GET['ses']."'");
            $rowex=mysqli_fetch_array($exam);
            $ex = $rowex['fee'];
			
			if($rownum1['std_type']=='New' && $rownum1['transport_status']=='Active')
			{
			$selrc=mysqli_query($con,"select * from definefee  where class='".$_GET['class']."' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			
			
			$busfee=mysqli_query($con,"select * from stopage where stop_name='".$rownum1['transport_stopage']."' and session='".$_GET['ses']."'");	
            $rowsbus=mysqli_fetch_array($busfee);
			$tbus = $rowsbus['amnt'];
			
 			$amnt = $rowselrec['amnt']; 
			$total1=$val2+$amnt;
	        echo $total1;
	        $total2+=$total1;
			}
			else if($rownum1['std_type']=='New')
			{
			$adm=mysqli_query($con,"select * from admission where class='".$_GET['class']."' and session='".$_GET['ses']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			
			$selrc=mysqli_query($con,"select * from definefee  where class='".$_GET['class']."' and session='".$_GET['ses']."'");
				
            $rowselrec=mysqli_fetch_array($selrc);
 			$amnt = $rowselrec['amnt']+$rowsadm['fee']; 
			$total1=$amnt;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['transport_status']=='Active')
			{
			$selrc=mysqli_query($con,"select * from definefee  where class='".$_GET['class']."' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$busfee=mysqli_query($con,"select * from stopage where stop_name='".$rownum1['transport_stopage']."' and session='".$_GET['ses']."'");	
            $rowsbus=mysqli_fetch_array($busfee);
			$tbus = $rowsbus['amnt'];
			
 			$amnt = $rowselrec['amnt']+$tbus; 
			$total1=$val2+$amnt;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else{
			$selrc=mysqli_query($con,"select * from definefee  where class='".$_GET['class']."' and session='".$_GET['ses']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
 			$amnt = $rowselrec['amnt'];
			$total1=$amnt;
	        echo $total1;
	        $total2+=$total1;
			}
			?>
		    </td>
			<td>
		
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(latefee),sum(concession) from fee_detail where session='".$_GET['ses']."'  and class='".$_GET['class']."' 
			and sch='".$rownum1['student_scholar']."'");
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
			<td></td>
		    <td><b><?php echo $total2;  ?></b></td>
		    <td><b><?php echo $amtrc2;  ?></b></td>
			 <td><b><?php echo $cont  ?></b></td>
		    <td><b><?php echo $val10;  ?></b></td>
			</tr>
			
			
	        </table>