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
if(!empty($_GET['stdid']))
{

$reg=mysqli_query($con,"select * from student where student_id='".$_GET['stdid']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");



$rowstud=mysqli_fetch_array($reg);

 
 
 }

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
		
			 <div style="border:#CCC 2px solid; min-height:auto; width:440px; margin:0px 0px 0px 40px;background:#E4E4E4">
            
      
	  
	    <div style="border:#FF0000 0px solid; height:auto">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         $rowsch=mysqli_fetch_array($school);
		  
		 ?>
		 
	
		<span style="font-size:18px; color:#990000; margin-left:60px">Bridadier Trivedi Memorial Hr.Sec. School</span>
		<span style="font-size:12px; color:#990000; margin-left:200px">Karond, Bhopal</span><br>
		<span style="font-size:12px; color:#990000; margin-left:150px">PHONE: 0755-2734728,2742098</span>
		<br>
		<label style="font-size:16px; font-weig	ht:bold;  margin-left:120px; margin-top:20px"></label><br>
		<label style="font-size:18px; font-weight:bold;  margin-left:160px"><u>Transfer Certificate</u></label>
		
		</div>
		 <div style=" border:#000000 1px solid; width:420px; margin:0px 0px 0px 0px;"></div>
		 
		
			
			    <table width="400" cellspacing="10" border="0"> 
	<tr>
                
				 <td>Student Name:</td> 
			     <td><?php echo ucwords($rowstud['student_name']); ?></td>
				 <td>Class :</td>
                 <td><?php echo ucwords($rowstud['student_class']);  ?></td>
           
			
              </tr>
			  </table>
			    <table width="450" cellspacing="10" border="0">
		<tr>
<tr>
   <td>Father Name:</td>
  <td><?php echo  ucwords($rowstud['student_fname']); ?></td>
	<?php
	   $tcid=mysqli_query($con,"select * from tcissued where id='".$_GET['tcid']."'");
	   $rowtcid=mysqli_fetch_array($tcid	);
	?>

		
	
		<td>Date:</td>
		<td><?php echo  date("d-m-Y",strtotime($rowtcid['date'])); ?></td>  
		</tr>
		  </table>
			    
 <table width="400" cellspacing="10" border="0"> 
<tr>
   <td>Last Year Class Attended</td>
  <td><?php echo $rowtcid['Last_Year_Class_Attended'];   ?></td>
</tr>
<tr>
   <td>Passed & Promoted To</td>
  <td><?php echo $rowtcid['Promoted_to'];   ?></td>
</tr>

<tr>
   <td>Currently_in_Year</td>
  <td><?php echo $rowtcid['Currently_in_Year'];   ?></td>
</tr>


</table>
							
	<table width="400" cellspacing="10" border="0" style="margin-top:80px">

<tr>

<td></td>
 <td><span style="float:right; margin-right:100px"><b>Principal Signature</b></span></td>

</tr>		

</table>			 	
					<div style="border:#CCC 2px solid; min-height:auto; width:440px; margin:0px 0px 0px 40px;background:#E4E4E4"">
            
      
	  
	  
		 	
						
      	   <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
	   		  
			    </div>  <br><br><br><br>
		
</body>
</html>