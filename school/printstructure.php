<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
<?php
session_start();
require_once("../db.php");
?>
<?php
       $month=array("July","August","September","October","November","December","January","February","March");
       ?>
	   <?php
	   
				 
		    $selrc=mysqli_query($con,"select * from fee_structure where class='".$_GET['id']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
			
		    $numrow=mysqli_num_rows($selrc); 
		    $rowselrec=mysqli_fetch_array($selrc);
		    $a=explode(",",$rowselrec['structure']);
	   ?>

<html>
<head>
<style type="text/css">
#dialog .ui-widget {
			font-family: inherit;
		}
		
		.ui-state-default a, .ui-state-default a:link, .ui-state-default a:visited {
			color: #ffffff;
		}
		
		.ui-widget-header {
			font-size:1em;
			font-weight: bold;
			font-family: Arial, Helvetica, sans-serif;
			background: #5c9ccc;
			border-color: #4297d7;
			border-width: 1px;
		}
			
		.ui-dialog-title {
			line-height: 1em;
			color: #ffffff;
			font-weight: bold;
		}
		
		.ui-widget-content {
			font-size:1em;
			font-weight: bold;
			font-family: Arial, Helvetica, sans-serif;
			background: #fcfdfd;
			border-color: #a6c9e2;
			border-width: 1px;
		}
		
		/* tab panel bounding box */ 
		.ui-dialog-content {
			font-family: Arial, Helvetica, sans-serif;
			color: #222222;
			font-size:.8em;
			padding: 10px;
		} 
		
		.ui-dialog-buttonpane {
			font-size:.8em;
		}
		.table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>
</head>

<html xmlns="http://www.w3.org/1999/xhtml">
	
	<body>
		
			 <div style="border:#CCC 0px solid; height:auto; width:640px; margin:0px 0px 0px 40px;">
            
      
	  
	    <div style="border:#FF0000 0px solid; height:auto">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         $rowsch=mysqli_fetch_array($school);
		 ?>
		 
		 
		
		
		<span style="font-size:18px; color:#990000; margin-left:140px">Manorama Public School</span><br>
		<span style="font-size:18px; color:#990000; margin-left:170px"> Chhindwara(M.P)</span><br>
		<span style="font-size:18px; color:#990000; margin-left:120px"></span><br>
		
		<label style="font-size:14px; font-weight:bold;  margin-left:140px"><u>Fee Structure For Class <?php echo $_GET['id']; ?></u></label>
		<br>
		<span style="font-size:14px;  margin-left:200px"><?php echo $_SESSION['session']; ?></span>
		</div><br>
		 <div style=" border:#000000 1px solid; width:635px; margin:0px 0px 0px 0px;"></div>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold" >
	    <td>Sr.No</td>
	    <td>Month</td>
        <td>fee Structure</td>
		  <td>Exam Fee</td>
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
	   $inst=mysqli_query($con,"select * from instdetail  where class='".$_GET['id']."' and session='".$_SESSION['session']."' and month='".$m."'");	
    
	   $rowinst=mysqli_fetch_array($inst);
	
	  $selrc=mysqli_query($con,"select * from fee_structure where class='".$_GET['id']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		 
		 
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
	<td>
	     								
							
							<?php
							  $exam=mysqli_query($con,"select * from exam_fee where month='$m' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$_GET['id']."'");
							
			$examrow=mysqli_fetch_array($exam);
							 if(mysqli_num_rows($exam)>0)
							 {
							 echo ucwords($examrow['exam_name'])."<br>".$examrow['fee'];  
							  $val1+=$examrow['fee'];
								}   
								?>
			</td>
	    <td><?php echo $val1; ?></td>
        </tr>
    <?php
    $i++;
	}
	?>
	
	
	</table>
	 <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Structure" onClick="printpage()"/>
	   		    </div>  
</body>
</html>