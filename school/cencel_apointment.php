<?php
include_once 'db.php';
?>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
 
<div id="container">
 
	<div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				<?php
			    $id = $_GET['id'];
				$name = $_GET['name'];
				$mname = $_GET['mname'];
				$dob = $_GET['dob'];
				$tm = $_GET['tm'];
			   
				$PhNo="91".$_GET['mobile'];
	  
	            $msg="Dear $name, Your appointment with $mname scheduled on $dob at $tm has been cancelled.";
                $sid="shining JAMMU";
	            $msg = str_replace("Senderid",$sid, $msg);
				$msg=urlencode($msg);
                $sedurl="http://msg.icloudsms.com/sendhttp.php?user=Sunshineschooljabalp&password=adminsunshine@123&message=".$msg."&mobiles=".$PhNo."&sender=SSKPMS";

                $ret = file_get_contents($sedurl);
               
				?>
				<script>
		        alert('Appoinment cancel successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=appoinment';
                </script>
			</div>
		
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>