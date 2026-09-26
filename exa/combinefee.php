 <style type="text/css">
        label.error {
            float: none; color: red;
            padding-left: .3em; vertical-align: top;  
        }
    </style>
    <script type="text/javascript"
        src="http://ajax.microsoft.com/ajax/jQuery/jquery-1.4.2.min.js">
    </script>
    <script type="text/javascript" src="
http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js">
    </script> 

    <script type="text/javascript">
        $.validator.addMethod('onecheck', function(value, ele) {
            return $("input:checked").length < 3;}, 'You Cannot Combine More Than 2 Month')

        $(document).ready(function() {
            $("#form1").validate({
                rules: {
                    bev: {
                        onecheck: true
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo('#err');
                }
            });
        });
    </script>
	
<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
  
else if( document.myForm.month.value == "-1" )
   {
     alert("Please Select Month");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
	
<?php
session_start();
if(!empty($msg))
{
  unset($msg);
}
if(isset($_POST['submit']))
{

$val=implode(",",$_POST['bec']);
$chk=mysqli_query($con,"select * from combinemonth where (combinemonth='$val' or month='".$_POST['month']."') and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and class='".$_POST['class']."'");

if(mysqli_num_rows($chk)<1)
{
$query=mysqli_query($con,"insert into combinemonth(month,combinemonth,session,school,class) values('".$_POST['month']."','$val','".$_SESSION['session']."','".$_SESSION['uid']."','".$_POST['class']."')");
$msg="Inserted Successfully";
}	

else
    {
	  $msg="You have already combined this month";
	}
	}
?>
<?php
 if(!empty($_GET['did']))
 {
  $delete=mysqli_query($con,"delete from combinemonth where id='".$_GET['did']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");	
 ?>  
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."combinefee&&uid=Delete Sucessfully"; ?>";
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
    if(!confirm("Do you want to delete this Field")) { 
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
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Combine Month Fee</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data" id="form1"  onSubmit="return validate()">
                
      
   
    <?php
	          
			 if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
      		<?php
			   if((!empty($_GET['uid'])) && (empty($msg)))
			     {
				 ?>
				  <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid'];   ?></div>
				 <?php
				 }
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
            <td><select name="class" class="select" onchange="showdata4(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>" <?php if($rclass['class']==$_SESSION['t']) { ?> selected="selected" <?php } ?>  ><?php echo $rclass['class']; ?></option>
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
		     <td>Month</td>
		     <td>
             <select name="month"  class="select" style="width:250px" onchange="showMonth(this.value)">
                   <option value="-1">Select Month</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
               </select> 
               </td> 
		  </tr>
		           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
           </tr>
		   
		     <tr>
		     <td>Combine Month<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
		     <td><div id="txtHint1" style="border:#FF0000 0px solid; height:120px; overflow:scroll"></div><br> </td> 
		  </tr> 
           <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="submit" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
     
			<br><br>
            <div class="box-head">
						<h2 class="left">Details For Combine Month Fee For Class <?php echo $_SESSION['t']; ?></h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr style="background:#EAECFD; color:#000">
          <td>Sr.No</td>
          <td>Month</td>
          <td>Combined Month</td>
          <td>Delete</td>
		  </tr>
       <?php
        $i=1;
		$memo1=mysqli_query($con,"Select * FROM `combinemonth` where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and class='".$_SESSION['t']."'");
	    while($meta = mysqli_fetch_array($memo1))
	   {
	  	?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['month']; ?></td> 
      <td><?php echo $meta['combinemonth']; ?></td>  
      <td><a href="<?php echo $var."combinefee&did=".$meta['id'] ?>" onClick="return confirmation();">Delete</a></td>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>