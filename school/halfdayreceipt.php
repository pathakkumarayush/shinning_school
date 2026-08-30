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
$getdetail=mysqli_query($con,"select * from fee_detail where student='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by id desc limit 1");
$rowfeedetail=mysqli_fetch_array($getdetail);
$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_school='".$_SESSION['uid']."' and student_session='".$_SESSION['session']."'");
$rowstud=mysqli_fetch_array($reg);
$row=mysqli_fetch_array($getdetail);
 
 $exam=mysqli_query($con,"select * from exam_fee where month='".$rowfeedetail['month']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$rowstud['student_class']."'");
	$examrow=mysqli_fetch_array($exam);
   $numexam=mysqli_num_rows($exam);
$expl = explode(",",$rowfeedetail['month']);
		
		 $count1=count($expl);
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
		 
		<span style="font-size:12px; color:#990000; margin-left:200px"><u>School Copy</u></span><br> 
		<span style="font-size:18px; color:#990000; margin-left:60px">Bridadier Trivedi Memorial Hr.Sec. School</span>
		<span style="font-size:12px; color:#990000; margin-left:200px">Karond, Bhopal</span><br>
		<span style="font-size:12px; color:#990000; margin-left:150px">PHONE: 0755-2734728,2742098</span>
		<br>
		<label style="font-size:16px; font-weig	ht:bold;  margin-left:120px; margin-top:20px"></label><br>
		<label style="font-size:18px; font-weight:bold;  margin-left:190px"><u>Halfday Receipt</u></label>
		
		</div>
		 <div style=" border:#000000 1px solid; width:420px; margin:0px 0px 0px 0px;"></div>
		 
		<?php
	       $studentdeta=mysqli_query($con,"select * from studentleave where id='".$_GET['id']."'");
		   $rowdetail=mysqli_fetch_array($studentdeta);
			?> 
			
			    <table cellspacing="10" border="0"> 
	<tr>
                <td>Class :</td>
              <?php
                $class=mysqli_query($con,"select * from class where class_id='".$rowdetail['class']."' and school='".$_SESSION['uid']."'");
			    $rowclass=mysqli_fetch_array($class);
			    $student=mysqli_query($con,"select * from student where student_id='".$rowdetail['student']."'"); 
			    $rowstudent=mysqli_fetch_array($student);
			 ?>
            <td><?php echo ucwords($rowclass['class']);  ?></td>
             </tr>
		
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		
			 <tr>
			  <td>Student Name:</td> 
			  <td><?php echo ucwords($rowstudent['student_name']); ?></td>
              </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
<tr>
<tr>
   <td>Parent/Guardian Name:</td>
  <td><?php echo  ucwords($rowdetail['guardin']); ?></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	
<tr>
   <td>Reason:</td>
  <td><?php echo  ucwords($rowdetail['reason']); ?></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		
	<tr>
		<td>Allocatted Date:</td>
		<td><?php echo  date("d-m-Y h:i:s",strtotime($rowdetail['date'])); ?></td>  
		</tr>
<tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
</tr>
<tr>
<td></td>
 <td><span style="float:right; margin-right:100px"><b>Principal Signature</b></span></td>

</tr>		

</table>
							<br>
							
							 	
						
							</div>
							
			<div style="border:#CCC 2px solid; min-height:auto; width:440px; margin:0px 0px 0px 40px;background:#E4E4E4"">
            
      
	  
	    <div style="border:#FF0000 0px solid; height:auto; margin-top:30px">
		<?php
		 $school=mysqli_query($con,"select * from school where uid='".$_SESSION['uid']."'");
         $rowsch=mysqli_fetch_array($school);
		  
		 ?>
		 
		<span style="font-size:12px; color:#990000; margin-left:200px"><u>Candidate Copy</u></span><br>	 
		<span style="font-size:18px; color:#990000; margin-left:60px">Bridadier Trivedi Memorial Hr.Sec. School</span>
		<span style="font-size:12px; color:#990000; margin-left:200px">Karond, Bhopal</span><br>
		<span style="font-size:12px; color:#990000; margin-left:150px">PHONE: 0755-2734728,2742098</span>
		<br>
		<label style="font-size:16px; font-weig	ht:bold;  margin-left:120px; margin-top:20px"></label><br>
		<label style="font-size:18px; font-weight:bold;  margin-left:190px"><u>Halfday Receipt</u></label>
		
		</div>
		 <div style=" border:#000000 1px solid; width:420px; margin:0px 0px 0px 0px;"></div>
		 
		<?php
	       $studentdeta=mysqli_query($con,"select * from studentleave where id='".$_GET['id']."'");
		   $rowdetail=mysqli_fetch_array($studentdeta);
			?> 
			<table cellspacing="10" >
	<tr>
                <td>Class :</td>
              <?php
                $class=mysqli_query($con,"select * from class where class_id='".$rowdetail['class']."' and school='".$_SESSION['uid']."'");
			    $rowclass=mysqli_fetch_array($class);
			    $student=mysqli_query($con,"select * from student where student_id='".$rowdetail['student']."'"); 
			    $rowstudent=mysqli_fetch_array($student);
			 ?>
            <td><?php echo $rowclass['class'];  ?></td>
             </tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		
			 <tr>
			  <td>Student Name :</td> 
			  <td><?php echo ucwords($rowstudent['student_name']); ?></td>
              </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
<tr>
<tr>
   <td>Parent/Guardian Name :</td>
  <td><?php echo  ucwords($rowdetail['guardin']); ?></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	
<tr>
   <td>Reason :</td>
  <td><?php echo  ucwords($rowdetail['reason']); ?></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		
	<tr>
		<td>Allocatted Date :</td>
		<td><?php echo  date("d-m-Y h:i:s",strtotime($rowdetail['date'])); ?></td>  
		</tr>
		
<tr>

</tr>
<tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
</tr>
<tr>
<td></td>
 <td><span style="float:right; margin-right:100px"><b>Principal Signature</b></span></td>

</tr>
</table>
			</div>				
						
      	   <input id="printpagebutton" style="margin-left:80px" type="button" value="Print Receipt" onClick="printpage()"/>
	   		  
			    </div>  <br><br><br><br>
		
</body>
</html>