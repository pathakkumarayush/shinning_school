<?php
session_start();
if(!empty($msg))
{
  unset($msg);
}
if(isset($_POST['submit']))
{
	$header=implode(",",$_POST['header']);
   $y=date("Y");
   $checkstruc=mysqli_query($con,"Select * FROM `feestructure` where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and class='".$_POST['class']."'");
   if(mysqli_num_rows($checkstruc)<1)
   {
   $structure=mysqli_query($con,"insert into feestructure(class,header,session,year,school) values('".$_POST['class']."','$header','".$_SESSION['session']."','$y','".$_SESSION['uid']."')");	 
  
   $msg="Inserted Successfully";
}
else
   {
    $msg="fee Structure For This Class Already Exist";
   }
}
if(!empty($_GET['id']))
{
$selrc=mysqli_query($con,"select * from feestructure where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
	}
if(isset($_POST['submit1']))
{
   $header=implode(",",$_POST['header']);
   $update=mysqli_query($con,"update feestructure set header='$header',session='".$_SESSION['session']."' where id='".$_GET['id']."'");	
   $msg="Updated Successfully"; 
}

?>
<?php
 if(!empty($_GET['did']))
 {
	 	$fetchstructure=mysqli_query($con,"select * from feestructure where id='".$_GET['did']."'");
		$rowstructure=mysqli_fetch_array($fetchstructure);  
		$delete=mysqli_query($con,"delete from fee_structure where class='".$rowstructure['class']."' and session='".$rowstructure['session']."' and school='".$rowstructure['school']."'");
		
		 $del2=mysqli_query($con,"delete from feestructure where id='".$_GET['did']."'"); 
     
 ?>	
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."feestructure&&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
 }
?>
<?php

  // Set timezone
  date_default_timezone_set("UTC");

  // Time format is UNIX timestamp or
  // PHP strtotime compatible strings
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) {
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) {
      $time2 = strtotime($time2);
    }

    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }

    // Set up intervals and diffs arrays
    $intervals = array('year','month','day','hour','minute','second');
    $diffs = array();

    // Loop thru all intervals
    foreach ($intervals as $interval) {
      // Set default diff to 0
      $diffs[$interval] = 0;
      // Create temp time from time1 and interval
      $ttime = strtotime("+1 " . $interval, $time1);
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) {
    $time1 = $ttime;
    $diffs[$interval]++;
    // Create new temp time from time1 and interval
    $ttime = strtotime("+1 " . $interval, $time1);
      }
    }

    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) {
      // Break if we have needed precission
      if ($count >= $precision) {
    break;
      }
      // Add value and interval 
      // if value is bigger than 0
      if ($value > 0) {
    // Add s if value is not 1
    if ($value != 1) {
      $interval .= "s";
    }
    // Add value and interval to times array
    $times[] = $value . " " . $interval;
    $count++;
      }
    }

    // Return string with times
    return implode(", ", $times);
  }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/school.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">View Transport Fee Collection Dates</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=transport_home">Transport</a> >>View Transport Fee Collection Dates</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
    <?php
	          
			 if(!empty($msg) && empty($err))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } ?>
		 <?php
	         if(!empty($_GET['dmsg']) && empty($msg))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $_GET['dmsg'];  ?></div>
		<?php  } ?>
		
		
	
        
         <table border="0" style="margin:10px 0px 0px 20px">
            <tr>
                <td>Session</td>
                <td><?php echo $_SESSION['session']; ?></td>
           </tr>
         <tr>
		   <td>&nbsp;</td>
		   <td>&nbsp;</td>
		 </tr>
		   <tr>
		      <td>Select A Usertype</td>
		      <td><select name="ut" class="select">
			          <option>Select user type</option>  
			          <option>Employee</option> 
			          <option>Student</option>
				  </select> 
			  </td>
		   </tr>
		   
		   <tr>
		     <td>&nbsp;</td>
			  <td>&nbsp;</td>
		   </tr>
		   
		   <tr>
            <td></td>
            <td><input  type="submit" name="submit1"  value="Submit" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
       
          
    
      
   
			<br><br>
            
     
      
                 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>