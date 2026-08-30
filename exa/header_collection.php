<?php
 $month=array("July","August","September","October","November","December","January","February");
 $month2=array("July","August","September","October","November","December","January","February","March","April");

?>
 
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Total Fee</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a>Total fee Colection</a>
                 <form action="#" method="post" enctype="multipart/form-data">
				 <div class="box-head" style="margin-top:20px; font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."header_collection"."&&divid=1"; ?>">Total Fee Collection By Session</a>
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
            
           
           <?php  for($i=2013;$i<=2069;$i++)
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
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
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
            <td><select name="class" class="styled" onchange="showSection(this.value)" class="select">
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
				 <div class="table" style="border:#FFCCCC 20px solid; height:600px; margin:0px 0px 0px 0px; overflow:scroll">
                   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_POST['session']; ?></h2>
				<?php
			  if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
			  ?>
				 <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		
	  
		  
     
	     <?php
		         $studfine=0; 
				   $studconcess=0; 
			   $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' ");
			   $i=1;
			   $j=1;
		?>
				<?php
			   while($row=mysqli_fetch_array($class))
			   {
			?>  
          <td >
		    <b><?php echo $row['class']; ?>   </b><br><br>
		
		
		
		  <?php
		    $inst=mysqli_query($con,"select * from instdetail  where class='".$row['class']."' and session='".$_SESSION['session']."'  ");	
      
		
		      
		while($rowinst=mysqli_fetch_array($inst))
{

   $feedet=mysqli_query($con,"select sum(fee_deposit) from fee_detail where session='".$_POST['session']."' and class='".$row['class']."' and instalment='".$rowinst['inst_type']."' ");
  
   $totalfee=mysqli_fetch_array($feedet);
  echo ucwords($rowinst['inst_type'])."=".$totalfee['sum(fee_deposit)']."<br>";

 $selrc=mysqli_query($con,"select * from fee_structure where class='".$row['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		 
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);

}			 
?>
	<?php
	          
	           foreach($a as $v)
		   {
		     list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' ");
 

			  if(mysqli_num_rows($check)>0)
			 {
			 
			      
		?>
		             <?php
					   $lbl= str_replace(' ', '_', $header);
						 $feedet2=mysqli_query($con,"select sum($lbl) from fee_detail where session='".$_POST['session']."' and class='".$row['class']."'  ");
 
  
  
   $totalfee2=mysqli_fetch_array($feedet2);	    
								
								
								  echo ",".ucwords($header)."=".$totalfee2['sum('.$lbl.')']."<br>"; 
								   $val1+=$val;
					 $feetype='Transport Fee';			   
							      $feedet3=mysqli_query($con,"select sum(fee_deposit) from fee_detail where session='".$_POST['session']."' and class='".$row['class']."' and feetype='$feetype' ");
  
   $totalfee3=mysqli_fetch_array($feedet3);
			echo "Transport Fee".$totalfee3['sum(fee_deposit)'];					
							  ?>
										   
							  <?php
							      
							  }
							}
							
                            ?>
  
    
	 
	 	<?php
	  $i++;
	  $j++;
	  }
	  ?>
	  </td>
	 </tr>
	
	
	</table>
			 <?php
			 }
			else if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
			 ?>	
			 
			<?php
			
			}
			?>	
				
				</div>
				
				
				
				
				
				
				
				
				
				 </form>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>