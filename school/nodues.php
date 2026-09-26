<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
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
if(!empty($_GET['id']))
{
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
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
		<label style="font-size:18px; font-weight:bold;  margin-left:190px"><u>Nu Dues Receipt</u></label>
		
		</div>
		 <div style=" border:#000000 1px solid; width:420px; margin:0px 0px 0px 0px;"></div>
		 
		<?php
	       $studentdeta=mysqli_query($con,"select * from studentleave where id='".$_GET['id']."'");
		   $rowdetail=mysqli_fetch_array($studentdeta);
			?> 
			<table class="table" style="margin:20px 0px 0px 25px;" width="400" border="0">
           <tr>
			   <td>Date</td>
               <td><?php echo date("d-m-Y");  ?></td>
            </tr>
          
			  <tr>
               <td>Student Name</td>
               <td><?php echo ucwords($rowstud['student_name']);  ?></td>
               </tr>
			
               <tr>               
               <td>Father Name</td>
               <td><?php echo ucwords($rowstud['student_fname']);  ?></td>
                </tr>
			
			   
			   <tr>
                <td>Std</td>
               <td><?php echo $rowstud['student_class'];  ?></td>         
             </tr>
		 </table>
			
			    <table cellspacing="10" border="0" style="margin-top:40px" > 
	<tr>
	<td></td>
	<td style="font-size:18px; font-weight:bold">Student has  No Dues</td>
	</tr>
<tr>
<td></td>
 <td></td>

</tr>		

</table>
	<span style="float:right; margin-right:100px"><b>Accountant Signature</b></span>						<br>
							
							 	
						
							</div>
							
			<div style="border:#CCC 2px solid; min-height:auto; width:440px; margin:0px 0px 0px 40px;background:#E4E4E4"">
            
      
	  
	   						
      	   <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
	   		  
			    </div>  <br><br><br><br>
		
</body>
</html>