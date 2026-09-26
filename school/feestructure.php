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
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Fee Structure</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Add Fee Structure</a>
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
		
		
		<?php				
           if(!empty($_GET['id']))
           {
      ?>
        
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
            <td>Class<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="class" value="<?php echo $rowselrec['class']; ?>" readonly></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr>
          <td></td>
           <td><span style="color:#C00">Select Header For This Class</span></td>
          </tr>
		  <?php
		  
		   $memo=mysqli_query($con,"select * from fee_memo where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		   $num=mysqli_num_rows($memo);
		   while($rowmemo=mysqli_fetch_array($memo))
		   {
		  ?>
         
            <tr>
            <td></td>
            <td> <input type="checkbox" name="header[]" value="<?php echo $rowmemo['id'];?>"
           <?php 
                $a=  explode(",",$rowselrec['header']); 
			     foreach($a as $b)
				 {
					 if($b==$rowmemo['id'])
					 {
					  ?>	 
					 checked="checked" 
					 <?php
					 }
				 }
			?>
			>&nbsp;<?php echo ucwords($rowmemo['label_name']);?>&nbsp;&nbsp;</td>
            </tr>
         </td>
        <?php
		   }
		   ?>
           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
           </tr> 
           <tr>
            <td></td>
            <td><input  type="submit" name="submit1"  value="Update" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
        <table border="0" style="margin:20px 0px 0px 20px; font-size:14px" >
            <tr>
               <td><b>Session</b></td>
               <td><?php echo $_SESSION['session']; ?></td>

            </tr>
           <tr>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
           </tr>
          
            <tr>
            <td><b>Class</b><span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class)  from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
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
           <td><span style="color:#C00">Select Header For This Class</span></td>
          </tr>
		  <?php
		  
		   $memo=mysqli_query($con,"select * from fee_memo where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		   $num=mysqli_num_rows($memo);
		   while($rowmemo=mysqli_fetch_array($memo))
		   {
		  ?>
         
            <tr>
            <td></td>
            <td> <input type="checkbox" name="header[]" value="<?php echo $rowmemo['id'];?>">&nbsp;<?php echo ucwords($rowmemo['label_name']);?>&nbsp;&nbsp;</td>
            </tr>
         </td>
        <?php
		   }
		   ?>
           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
           </tr> 
           <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="submit" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
			<br><br>
            <div class="box-head">
						<h2 class="left">Classwise Fee Structure</h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr style="background:#EAECFD; color:#000">
          <td>Id</td>
          <td>Class</td>
          <td>Header</td>
          <td>Session</td>
         <td>Action</td>
       </tr>
       <?php
        $i=1;
		$memo1=mysqli_query($con,"Select * FROM `feestructure` where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    while($meta = mysqli_fetch_array($memo1))
	   {
	  	?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['class']; ?></td> 
         <td><?php  
		         $a=  explode(",",$meta['header']); 
			     foreach($a as $b)
				 {
				  $fetchh=mysqli_query($con,"select * from fee_memo where id='$b'");
				  
				  $rowheader=mysqli_fetch_array($fetchh);  
				  echo ucwords($rowheader['label_name']).","; 
				}
			     $check=mysqli_query($con,"select * from fee_structure where class='".$meta['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
				 
			   ?>
               </td>
         <td><?php echo $meta['session']; ?></td>
           <td><a href="<?php echo $var."feestructure&&id=".$meta['id'];?>" style="color:#FF0000">Update</a>/
		   <?php
		      if(mysqli_num_rows($check)<1)
			    {
		   ?>
		   <a href="<?php echo $var."feestructure1&&id=".$meta['id'];?>">Insert</a>
		   <?php
		     }
			 else
			    {
				?>
				  <a href="<?php echo $var."feestructure1";?>">View</a>
				<?php 
				}
		   ?>
		   /<a href="<?php echo $var."feestructure&&did=".$meta['id'];?>" onClick="return confirmation();" style="color:#FF0000">Delete</a></td>
      </tr>
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>