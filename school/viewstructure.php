<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<?php
       $month=array("April","July","August","September","October","November","December","January","February","March");
       ?>
	   <?php
	   
				 
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	   ?>
		  		  
<style type="text/css">
<!--
.style1 {
	font-size: 18px;
	color: #000000;
}
-->
</style>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
				   <span class="style1">View Structure </span>
				   <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a> >>View structure 
                <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
                    
     
   
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
		<td>
		  <?php
		    
			    $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			   ?>
        <select name="class" class="select" style="width:125px" >
              
			   <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  <?php if($rclass['class']==$_POST['class']) { ?> selected="selected" <?php } ?>  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
			<input type="submit" name="submit" value="submit" style="width:100px">
			</td>
			
			
			</tr>
			
			
			
        </table><br>
        </div>
        
        <div class="box-head">
						Fee structure For Class <?php echo $_POST['class'];  ?>
			      </div>
   
		   <div class="table" style="border:#FFCCCC 20px solid; height:340px;">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold" >
	    <td>Sr.No</td>
	    <td>Month</td>
        <td>fee Structure</td>
		 
		<td>Total Fee</td>
   </tr>
       <?php
       $i=1;
	     
	    foreach($month as $m)
		{
		$val1=0;
	?>	
    <tr style="color:#335599">
    <td><?php echo $i; ?></td>
	<?php
	   $inst=mysqli_query($con,"select * from instdetail  where class='".$_POST['class']."' and session='".$_SESSION['session']."' and month='".$m."'");	
    
	   $rowinst=mysqli_fetch_array($inst);
	
	  $selrc=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		 
		 
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	  
	    $val2=0;
	?>
	<td><?php 
	$count1=0;
	if(!empty($rowconmonth2['combinemonth']))
	{
	  
	  $count1=count($rowconmonth2['combinemonth']);
	 $count1=$count1+1;
	 echo ucwords($m).",".ucwords($rowconmonth2['combinemonth']);
	}
	else 
	{
	echo ucwords($m); 
	}
	
	?></td>
	<td>
	   <?php echo $rowinst['inst_type']."=".$rowinst['amnt'];      
	   $val1+=$rowinst['amnt'];
	   ?>
	   	<?php
	          
	           foreach($a as $v)
		   {
		     list($header, $val) = split('[=]', $v);
             $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype='$m'");
 

			  if(mysqli_num_rows($check)>0)
			 {
			 
			      
		?>
		
							<?php
							      echo ",".ucwords($header)."=".$val; 
								   $val1+=$val;
							    
							  ?>
										   
							  <?php
							      
							  }
							}
							
                            ?>
	</td> 
	
	    <td><?php echo $val1; ?></td>
		
		
		
		
        </tr>
    <?php
    $i++;
	}
	?>
	
	<tr><td colspan="4" style="color:#FF0000; font-size:14px"> </td>
	
	</tr>
	</table>
	
         </div>
      <br><br>
           <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/manorama/school/printStructure.php?id=<?php echo $_POST['class']; ?>')"><input type="button" value="Print " style="width:200px; margin-left:100px" ></a>      
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>