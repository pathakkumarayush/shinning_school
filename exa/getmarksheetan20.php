<?php
session_start();
include 'db.php';
$ses = $_GET['ses'];
?>
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Kids Care The Nursery school</title>


</head>

<body>
<div style="width:1050px;height:1531px; background-color:#FFF; border:6px #3b49af solid;">
<div style="width:100%; margin:0 auto; height:auto;margin-top:0px;">
<center>
<div style=""><img src="head11.png" style="margin-top:10px;" /></div>

</center>
</div>


<div style="width:100%; margin-top:10px; background-color:#3b49af; height:auto; line-height:35px; color:#FFFFFF; font-size:32px;">
<center>MY PROGRESS CARD</center>
</div>
<?php

$reg=mysqli_query($con,"select * from student where student_id='".$_GET['id']."' and student_session='$ses'");

$rowstud=mysqli_fetch_array($reg);

$getdetail=mysqli_query($con,"select * from marks where student='".$rowstud['uid']."'  and ses='$ses' and exam='".$_GET['exam']."' ");
$len=mysqli_num_rows($getdetail);

$getdetail1=mysqli_query($con,"select * from marks where student='".$rowstud['uid']."'  and ses='$ses' and exam='".$_GET['exam']."' ");
$len1=mysqli_num_rows($getdetail1);
?>
<div style="width:100%;height:auto;">
<div><img src="my.png" style="margin-left:5px;"></div>
<table style="margin-left:10px; width:900px; margin-top:-12px; font-size:22px;">
         
		 
		  <tr style="line-height:35px;">
               <td style="width:125px;">Student Name </td>
               <td style="width:700px;">: &nbsp;&nbsp;<?php echo ucwords($rowstud['student_name']);  ?></td>
			   
			</tr>
			
               <tr style="line-height:35px;">               
               <td>Father Name</td>
               <td>: &nbsp;&nbsp;<?php echo ucwords($rowstud['student_fname']);  ?></td>
			  </tr>
			
			  
			   <tr style="line-height:35px;">
               <td>Mother Name</td>
               <td>: &nbsp;&nbsp;<?php echo $rowstud['m_name'];  ?></td>  
			   </tr>
			
			   <tr style="line-height:35px;">
              
			   <td style="width:90px;">Class Sec.</td>
               <td style="color:#FF0000">: &nbsp;&nbsp;<?php 
			   
			                 if($rowstud['student_class']=='K.G.1A M')
							 {
							 $cla = 'K.G.1 A';
							 }
							 if($rowstud['student_class']=='K.G.1B M')
							 {
							 $cla = 'K.G.1 B';
							 }
							 if($rowstud['student_class']=='K.G.1A N')
							 {
							 $cla = 'K.G.1 A';
							 }
							 if($rowstud['student_class']=='K.G.1B N')
							 {
							 $cla = 'K.G.1 B';
							 }
							 if($rowstud['student_class']=='K.G.2A M')
							 {
							 $cla = 'K.G.2 A';
							 }
							 if($rowstud['student_class']=='K.G.2B M')
							 {
							 $cla = 'K.G.2 B';
							 }
							 if($rowstud['student_class']=='K.G.2A N')
							 {
							 $cla = 'K.G.2 A';
							 }
							 if($rowstud['student_class']=='K.G.2B N')
							 {
							 $cla = 'K.G.2 B';
							 }
							 echo ucwords($cla);  
							 
			   
			   
			   ?></td>
			</tr>
			   
			   
			   <tr style="line-height:35px;">
               <td>Date Of Birth</td>
               <td>: &nbsp;&nbsp;<?php echo $rowstud['student_dob'];  ?></td>  
			   
			   </tr>
			   
 </table>


</div>

<br clear="all" />
<div style="width:100%; margin-top:2px; background-color:#3b49af; height:auto; line-height:35px; font-size:31px; color:#FFFFFF">
<center>MY ACADEMIC ASSESSMENT : 2020-2021</center>
</div>
<div style="width:100%;height:auto;">
<div style="">

   <table border="1" cellspacing="0" cellpadding="0" style="font-size:22px;width:1020px; float:left; margin-left:15px; margin-top:20px;">
			<tr style="font-weight:bold; height:48px; background-color:#3b49af; font-size:22px; color:#FFFFFF">
							<td align="center" style="width:100px;">SUBJECT</td>
							<td align="center" style="width:300px;">MAX. MARKS</td>
							<td align="center" style="width:300px;">MARKS OBTAINED</td>
							</tr>
							<tr style="height:25px;">
							<?php
							 $i=0;
							 while($rowfeedetail=mysqli_fetch_array($getdetail))
							 {
							 ?>
							 
							 <td style="height:48px;">&nbsp;&nbsp;<?php echo $rowfeedetail['subject'];  ?></td>	
							 	
							 <td><center><?php echo $rowfeedetail['totalmarks']; $totmarks+=$rowfeedetail['totalmarks']; ?> </center> </td>	
							 
							 <td><center><?php echo $rowfeedetail['obtainmarks'];  $obtmarks+=$rowfeedetail['obtainmarks']; ?> </center> </td>
							 
							 
							 </tr>
							 <?php
							 $rm=$rowfeedetail['remark'];
							 $pr=$rowfeedetail['Present'];
							 $percentage= $rowfeedetail['obtainper'];
							 $class= $rowfeedetail['class'];
							 $i++;
							}
							?>
							<tr style="line-height:48px; font-weight:bold;">
							<td align="center" style="width:100px;">Grand Total</td>
							<td align="center" style="width:300px;"> <?php echo $totmarks; ?> </td>
							<td align="center" style="width:300px;"> <?php echo $obtmarks; ?> </td>
							</tr>
							</table>
	<table border="1" cellspacing="0" cellpadding="0" style="font-size:22px;width:1020px; float:left; margin-left:15px;">
							<tr style="line-height:48px; font-weight:bold; font-size:22px;">
							<td align="center" style="width:268px;">Percentage : <?php echo $per = $obtmarks/$totmarks*100; ?>%</td>
						
							<td align="center" style="width:200px;">
							
							
							 Division : 
							 
							 
			<?php
			$getdetail2=mysqli_query($con,"select * from marks where student='".$rowstud['uid']."'  and ses='$ses' and exam='".$_GET['exam']."' and status='fail'");
			$rowfeedetail1=mysqli_fetch_array($getdetail2);
							 
							
							 
							 
							 if($rowfeedetail1['status'] == 'fail')
							 {
							 $asn = 'Fail';
							 }
							
							 else{
							
							 if($per > 59)
							 {
							 $asn = 'I';
							 }
							 if($per > 44 && $per < 60)
							 {
							 $asn = 'II';
							 }
							 if($per > 32 && $per < 45)
							 {
							 $asn = 'III';
							 }
							 
							 }
							 
							 
							 echo $asn;
							 ?>
							
							
							
							
							</td>
							</tr>
							<tr style="line-height:48px; font-weight:bold; font-size:22px;">
							<td align="center" style="width:268px;">
							 &nbsp;&nbsp;&nbsp;
							 Remark&nbsp;&nbsp;:&nbsp;&nbsp;
							 <?php 
							 if($rowfeedetail1['status'] == 'fail')
							 {
							 echo 'Fail';
							 }else{
							 echo 'Pass';
							 }
							 ?>
							</td>
						
							<td align="center" style="width:200px;">
							 Grade&nbsp;&nbsp;:&nbsp;&nbsp;
							 <?php
							 if($per > 90)
                             {
                             $res='A+';
                             }
							 if($per > 79 && $per < 91)
                             {
                             $res= 'A';
                             }
							 if($per > 69 && $per < 80)
                             {
                             $res= 'B+';
                             }
							 if($per > 59 && $per < 70)
                             {
                             $res= 'B';
                             }
							 if($per > 49 && $per < 60)
                             {
                             $res= 'C';
                             }
							 if($per > 39 && $per < 50)
                             {
                             $res= 'D';
                             }
							 if($per < 40)
                             {
                             $res= 'E';
                             }
							 echo $res;
							
							?>
							</td>
							
							
							
							</tr>
							
							
							<tr style="line-height:48px; font-weight:bold; font-size:22px;">
							<td align="center" colspan="2">
							Promoted To Class:
							
							<span style="color:#FF0000;">
							<?php
							 if($rowfeedetail1['status'] == 'fail')
							 {
							 $asn = 'Not Promote';
							 }
							
							 else{
							
							 if($rowstud['student_class']=='K.G.1A M')
							 {
							 $asn = 'K.G.2';
							 }
							 if($rowstud['student_class']=='K.G.1B M')
							 {
							 $asn = 'K.G.2';
							 }
							 if($rowstud['student_class']=='K.G.1A N')
							 {
							 $asn = 'K.G.2';
							 }
							 if($rowstud['student_class']=='K.G.1B N')
							 {
							 $asn = 'K.G.2';
							 }
							 if($rowstud['student_class']=='K.G.2A M')
							 {
							 $asn = '1st';
							 }
							 if($rowstud['student_class']=='K.G.2B M')
							 {
							 $asn = '1st';
							 }
							 if($rowstud['student_class']=='K.G.2A N')
							 {
							 $asn = '1st';
							 }
							 if($rowstud['student_class']=='K.G.2B N')
							 {
							 $asn = '1st';
							 }
							 
							 }
							  echo $asn;
							 ?>
							 </span>
							</td>
						
							
							
							
							
							</tr>
							
							 </table>
							 
							 
<table border="1" cellspacing="0" cellpadding="0" style="font-size:22px;width:1020px; float:left; margin-left:15px; margin-top:20px;">

<tr align="center" style="color:#000;line-height:40px;font-weight:bold;"><td colspan="3">Grading Scale For My Academic Assessment</td></tr>

<tr align="center" style="line-height:32px;"><td>A+</td><td>Extra Ordinary</td><td>91% Above</td></tr>

<tr align="center" style="line-height:32px;"><td>A</td><td>Excellent</td><td>80% - 90%</td></tr>

<tr align="center" style="line-height:32px;"><td>B+</td><td>Very Good</td><td>70% - 79%</td></tr>

<tr align="center" style="line-height:32px;"><td>B</td><td>Good</td><td>60% - 69%</td></tr>

<tr align="center" style="line-height:32px;"><td>C</td><td>Fair</td><td>50% - 59%</td></tr>

<tr align="center" style="line-height:32px;"><td>D</td><td>Average</td><td>40% - 49%</td></tr>

<tr align="center" style="line-height:32px;"><td>E</td><td>Poor</td><td>Below 40%</td></tr>
</table>

<br clear="all">
<table border="0" cellspacing="0" cellpadding="0" style="font-size:22px;width:200px; float:left; margin-left:15px; margin-top:87px;">
<tr align="center" style="color:#000;line-height:40px;font-weight:bold;"><td>Date: 30-04-2021</td></tr>
</table>
				   				
<table border="0" cellspacing="0" cellpadding="0" style="font-size:22px;width:300px; float:right; margin-left:15px; margin-top:87px;">
<tr align="center" style="color:#000;line-height:40px;font-weight:bold;"><td>
<img src="sign.png" style="margin-top: -60px; position: absolute; width:150px; height:70px; margin-left:-20px;">
Principal</td></tr>
</table>
							
</div>



</div>
<br clear="all" />
<img src="fff.png" style="width:1040px; height:70px; margin-left:10px;">
<br clear="all" />
</div>
</body>
</html>