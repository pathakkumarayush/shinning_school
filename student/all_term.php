<style>
.tbl{ width:130px; height:25px;}
.tb2{ width:78px; height:25px;}
</style>
<div id="container">
<div class="shell">
<span class="span">Session:<?php echo $_SESSION['session']; ?></span>
<br clear="all" />
<div id="main" style="margin-top:10px;">
<img class="mai" src="images/examination.png"  />
<a href="index.php" style="float:right; margin-top:90px; color:#FFFFFF; font-size:16px">Back</a>
<div style="border:#fff 2px solid; margin-top:10px"></div>
<p style="margin-top:5px; margin-left:2px;">Search Marksheet <?php
		$search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
			    $studrow=mysqli_fetch_array($search);
			    echo $studrow['student_name'];
			    $class = $studrow['student_class'];
				$id = $studrow['uid'];
				?>
</p>
<br  />

             <div class="col_m1" style="">
<div style="margin-top:5px;">
<a href="<?php echo $var."marksheet"?>" >FA AND SA EXAM</a> ||<a href="<?php echo $var."marksheet_term" ?>" >Exam Term</a> ||<a href="<?php echo $var."all_term" ?>" >All Term</a>
</div>
</div>
            <form method="post" action="">
            <table style="margin-left:20px;margin-top:10px;width:270px;font-size:16px" >
            <tr>
			<td>Session:</td>
           
            <td> <span style="margin-left:10px;"><?php echo $_SESSION['session'] ?> </td></tr>
            <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			<tr><td>Class</td><td><span style="margin-left:10px;"><?php echo $class ?></span></td></tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr>  <td></td>
		    <td><input type="submit" name="search" value="Submit" style="width:90px; margin-left:10px"></td>   
		    </tr>
		    </table>
            </form>
			<br />
			
			<?php
			 if(isset($_POST['search']))
             {
			 $term = $_POST['exam'];
			 $uid=$studrow['uid'];
		    ?>
			
			
            <div style="width:97.5%; height:auto;  border:6px #339966 solid;">	
					
             <div class="col_m3">
             <h2><center>Elite Higher Secondry School</center></h2><br />
			 <span><center>210 Berasia Road, DIG Bungalow, Green Park Colony</center></span><br />
             <span><center>Jamalpura, Bhopal, Madhya Pradesh 462038</center></span><br />
             <span><center>Affiliated To M.P Board,(Affiliated No. 233006)</center></span>
             </div>
			
			
			  <br clear="all" />
			    <hr />
			  <br clear="all" />
			
			  
			 <div style="width:100%; height:autos;">
			 
			 <div class="colm_left">
			 <img src="../school/upload/<?php echo $studrow['student_img'];  ?>" style="margin-top:5px;"/>
             </div>
			 
			 <div class="colm_right">
			 <table >
	 <tr><td>Name:</td><td>&nbsp;<?php echo $studrow['student_name'];  ?></td><td>Class:</td><td>&nbsp;<?php echo $studrow['student_class'];  ?></td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			 <tr><td>Father:</td><td>&nbsp;<?php echo $studrow['student_fname'];  ?><td>D.O.B:</td><td>&nbsp;<?php echo $studrow['student_dob'];  ?></td></td></tr>
			 <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
			  <tr><td>Mother:</td><td>&nbsp;<?php echo $studrow['m_name'];  ?></td><td>Roll No:</td><td>&nbsp;<?php echo $studrow['student_rollno'];  ?></td></tr>
			 </table>
			 </div>
			 
			 </div>
			<br clear="all"  />
			<div style="width:100%; margin-top:10px; background-color:#339966; height:auto; line-height:22px; font-weight:bold; font-size:14px;color:#FFFFFF">
             <center><?php echo $_POST['exam']; ?> PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
             </div>
			
<div style="width:100%;height:auto;">
<div>

<?php
if($term=="$term")
{
?>
<table border="0" width="" cellpadding="0" cellspacing="0" class="col_table">

<tr style="border:1px #000000 solid;"><td></td><td style="border:1px #000000 solid;" colspan="4"><center>TERM-1</center></td>
<td style="border:1px #000000 solid;" colspan="4"><center>TERM-2</center></td>
<td style="border:1px #000000 solid;" colspan="4"><center>TERM-1 + TERM-2</center></td>
</tr>
<tr>
<td>
<table class="tbl" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td style="height:28px;"><center>SUBJECTS</center></td></tr>
<?php

$sub=mysqli_query($con,"select * from subjects where class='$class'"); 
while($sub_row=mysqli_fetch_row($sub))
{
?>
<tr>
<td style="height:22px">
<center>
<?php echo $sub_row['1']; ?>
</center>
</td></tr>
<?php } ?>
</table>
</td>

<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM1' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]'");
$len=mysqli_num_rows($er);
$t=0;
while($t<=($len+1))
{
	$final_cal[$t]=0;
	$fa[$t]=0;
	$sa[$t]=0;
	
	$t++;
}
while($row=mysqli_fetch_row($er))
{
	$te_cal=0;
?>
<td>

<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:100%;">

<?php 
if($row[0]=="SA1" || $row[0]=="SA2")
 {
 $per=30;
 $check="SA";
 }
 else{$per=10;
 $check="FA";
 }
?>
<tr> <td><center><?php echo $row[0];  ?><br /><?php echo $per; ?>%</center></td></tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and  exam='$row[0]'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr>

<td style="height:22px"><center><?php           
                           
						   								
						    $marks = ($row['1'] * 100)/$row[2];
							$final_grade=($marks*$per)/100;
							
							if($check=="SA")
							{
							$sa[$val]=$sa[$val]+$final_grade;	
							}	
							else
							{
							 $fa[$val]=$fa[$val]+$final_grade;
							}
							
							$val++;
							/*echo $te_cal;*/
							$final_cal[$te_cal]=$final_cal[$te_cal]+$final_grade;
							 /*$te_cal++;*/
							if($marks > 90)
                             {
                             $res='A1';
                             }
							 if($marks > 80 && $marks < 91)
                             {
                             $res= 'A2';
                             }
							 if($marks > 70 && $marks < 81)
                             {
                             $res= 'B1';
                             }
							 if($marks > 60 && $marks < 71)
                             {
                             $res= 'B2';
                             }
							 if($marks > 50 && $marks < 61)
                             {
                             $res= 'C1';
                             }
							 if($marks > 40 && $marks < 51)
                             {
                             $res= 'C2';
                             }
							 if($marks > 32 && $marks < 41)
                             {
                             $res= 'D';
                             }
							 if($marks > 20 && $marks < 33)
                             {
                             $res= 'E1';
                             }
							 if($marks < 20)
                             {
                             $res= 'E2';
                             }
							  echo $res;
							 $rowfeedetail['obtainmarks']; $ob+=$rowfeedetail['obtainmarks'];
							 ?>
							 </center> 

</td></tr>
<?php 
$te_cal++;
}
$percentage=($totalobtainmarks/$totalmarks)*100;
if($percentage>60)
{
$division="Ist";
}
else if($percentage>=48&&$percentage<60)
{
$division="IInd";
}
else
{
$division="Fail";
}
?>
<?php /*?><tr><td><b>Total</b></td><td><?php echo $totalmarks; ?></td><td><?php echo $totalobtainmarks;?></td></tr>
<tr><td><b>Percentage</b></td><td><?php echo $percentage;?>%</td></tr>
<tr><td><b>Division</b></td><td><?php echo $division;?></td></tr><?php */?>
</table>
</td>


<?php }?>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr></tr>
<tr></tr>
<tr><td style=""><center>Totat<br />FA+SA1</center></td></tr>

<?php $t=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	
	                          $markstot[$t]= $final_cal[$t]*2;
						
	                         if($markstot[$t] > 90)
                             {
                             $res='A1';
                             }
							 if($markstot[$t] > 80 && $markstot[$t] < 91)
                             {
                             $res= 'A2';
                             }
							 if($markstot[$t] > 70 && $markstot[$t] < 81)
                             {
                             $res= 'B1';
                             }
							 if($markstot[$t] > 60 && $markstot[$t] < 71)
                             {
                             $res= 'B2';
                             }
							 if($markstot[$t] > 50 && $markstot[$t] < 61)
                             {
                             $res= 'C1';
                             }
							 if($markstot[$t] > 40 && $markstot[$t] < 51)
                             {
                             $res= 'C2';
                             }
							 if($markstot[$t] > 32 && $markstot[$t] < 41)
                             {
                             $res= 'D';
                             }
							 if($markstot[$t] > 20 && $markstot[$t] < 33)
                             {
                             $res= 'E1';
                             }
							 if($markstot[$t] < 20)
                             {
                             $res= 'E2';
                             }
							  echo $res;
	$t++; ?></center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>

<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='TERM2' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]'");
$len=mysqli_num_rows($er);
$t=0;
while($t<=$len+1)
{
	$final_cal[$t]=0;
	$fa1[$t]=0;
	$sa1[$t]=0;
	$t++;
}
while($row=mysqli_fetch_row($er))
{
	$te_cal=0;
?>
<td>
<table class="tb2" border='1' cellpadding="0" cellspacing="0" style="width:100%;">
<?php 
if($row[0]=="SA1" || $row[0]=="SA2")
 {
 $per=30;
 $check="SA";
 }
 else
 {
 $per=10;
 $check="FA";
 }
?>
<tr> <td><center><?php echo $row[0];  ?><br /><?php echo $per; ?>%</center></td></tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and  exam='$row[0]'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
$val=0;
while($row=mysqli_fetch_row($qs))
{
	
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr>

<td style="height:22px"><center><?php           
                           
						   				 
						       $marks = ($row['1'] * 100)/$row[2];
							$final_grade=($marks*$per)/100;
							if($check=="SA")
							{
							$sa1[$val]=$sa1[$val]+$final_grade;	
							}	
							else
							{
							$fa1[$val]=$fa1[$val]+$final_grade;
							}
							$val++;
							/*echo $te_cal;*/
							$final_cal[$te_cal]=$final_cal[$te_cal]+$final_grade;
							 /*$te_cal++;*/
							if($marks > 90)
                             {
                             $res='A1';
                             }
							 if($marks > 80 && $marks < 91)
                             {
                             $res= 'A2';
                             }
							 if($marks > 70 && $marks < 81)
                             {
                             $res= 'B1';
                             }
							 if($marks > 60 && $marks < 71)
                             {
                             $res= 'B2';
                             }
							 if($marks > 50 && $marks < 61)
                             {
                             $res= 'C1';
                             }
							 if($marks > 40 && $marks < 51)
                             {
                             $res= 'C2';
                             }
							 if($marks > 32 && $marks < 41)
                             {
                             $res= 'D';
                             }
							 if($marks > 20 && $marks < 33)
                             {
                             $res= 'E1';
                             }
							 if($marks < 20)
                             {
                             $res= 'E2';
                             }
							  echo $res;
							 $rowfeedetail['obtainmarks']; $ob+=$rowfeedetail['obtainmarks'];
							 ?>
							 </center> 

</td></tr>
<?php 
$te_cal++;
}
$percentage=($totalobtainmarks/$totalmarks)*100;
if($percentage>60)
{
$division="Ist";
}
else if($percentage>=48&&$percentage<60)
{
$division="IInd";
}
else
{
$division="Fail";
}
?>
<?php /*?><tr><td><b>Total</b></td><td><?php echo $totalmarks; ?></td><td><?php echo $totalobtainmarks;?></td></tr>
<tr><td><b>Percentage</b></td><td><?php echo $percentage;?>%</td></tr>
<tr><td><b>Division</b></td><td><?php echo $division;?></td></tr><?php */?>
</table>
</td>


<?php }?>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr></tr>
<tr></tr>
<tr><td style=""><center>Totat<br />FA+SA2</center></td></tr>

<?php $t=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	
	                          $markstot1[$t]= $final_cal[$t]*2;
						
	                         if($markstot1[$t] > 90)
                             {
                             $res='A1';
                             }
							 if($markstot1[$t] > 80 && $markstot1[$t] < 91)
                             {
                             $res= 'A2';
                             }
							 if($markstot1[$t] > 70 && $markstot1[$t] < 81)
                             {
                             $res= 'B1';
                             }
							 if($markstot1[$t] > 60 && $markstot1[$t] < 71)
                             {
                             $res= 'B2';
                             }
							 if($markstot1[$t] > 50 && $markstot1[$t] < 61)
                             {
                             $res= 'C1';
                             }
							 if($markstot1[$t] > 40 && $markstot1[$t] < 51)
                             {
                             $res= 'C2';
                             }
							 if($markstot1[$t] > 32 && $markstot1[$t] < 41)
                             {
                             $res= 'D';
                             }
							 if($markstot1[$t] > 20 && $markstot1[$t] < 33)
                             {
                             $res= 'E1';
                             }
							 if($markstot1[$t] < 20)
                             {
                             $res= 'E2';
                             }
							  echo $res;
	$t++; ?></center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr></tr>
<tr></tr>
<tr><td style=""><center>G.Total<br /> FA (40%)</center></td></tr>

<?php $t=0;
$cgpa=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	                        /*echo $fa[$t]."-".$fa1[$t];*/
	                          $fasa= (($fa[$t]+$fa1[$t])*5)/2;
	                         if($fasa > 90)
                             {
                             $res='A1';
                             }
							 if($fasa > 80 && $fasa < 91)
                             {
                             $res= 'A2';
                             }
							 if($fasa > 70 && $fasa < 81)
                             {
                             $res= 'B1';
                             }
							 if($fasa > 60 && $fasa < 71)
                             {
                             $res= 'B2';
                             }
							 if($fasa > 50 && $fasa < 61)
                             {
                             $res= 'C1';
                             }
							 if($fasa > 40 && $fasa < 51)
                             {
                             $res= 'C2';
                             }
							 if($fasa > 32 && $fasa < 41)
                             {
                             $res= 'D';
                             }
							 if($fasa > 20 && $fasa < 33)
                             {
                             $res= 'E1';
                             }
							 if($fasa < 20)
                             {
                             $res= 'E2';
                             }
							 echo $res;
							  
							 if($res=='A1'){
							 $grade = '10.0';
							 }
							 if($res=='A2'){
							 $grade = '9.0';
							 }
							 if($res=='B1'){
							 $grade = '8.0';
							 }
							 if($res=='B2'){
							 $grade = '7.0';
							 }
							 if($res=='C1'){
							 $grade = '6.0';
							 }
							 if($res=='C2'){
							 $grade = '5.0';
							 }
							 if($res=='D'){
							 $grade = '4.0';
							 }
							 if($res=='E1'){
							 $grade = '3.0';
							 }
							 if($res=='E2'){
							 $grade = '2.0';
							 }
							 
						     $grade;
							 $cgpa=$cgpa+$grade;
						     $t++; ?>
						
					</center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>


<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr></tr>
<tr></tr>
<tr><td style=""><center>G.Total <br />SA (60%) </center></td></tr>

<?php $t=0;
$cgpa=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	                        /*echo $fa[$t]."-".$fa1[$t];*/
	                          $fasa= (($sa[$t]+$sa1[$t])*5)/3;
	                         if($fasa > 90)
                             {
                             $res='A1';
                             }
							 if($fasa > 80 && $fasa < 91)
                             {
                             $res= 'A2';
                             }
							 if($fasa > 70 && $fasa < 81)
                             {
                             $res= 'B1';
                             }
							 if($fasa > 60 && $fasa < 71)
                             {
                             $res= 'B2';
                             }
							 if($fasa > 50 && $fasa < 61)
                             {
                             $res= 'C1';
                             }
							 if($fasa > 40 && $fasa < 51)
                             {
                             $res= 'C2';
                             }
							 if($fasa > 32 && $fasa < 41)
                             {
                             $res= 'D';
                             }
							 if($fasa > 20 && $fasa < 33)
                             {
                             $res= 'E1';
                             }
							 if($fasa < 20)
                             {
                             $res= 'E2';
                             }
							  echo $res;
							  
							 if($res=='A1'){
							 $grade = '10.0';
							 }
							 if($res=='A2'){
							 $grade = '9.0';
							 }
							 if($res=='B1'){
							 $grade = '8.0';
							 }
							 if($res=='B2'){
							 $grade = '7.0';
							 }
							 if($res=='C1'){
							 $grade = '6.0';
							 }
							 if($res=='C2'){
							 $grade = '5.0';
							 }
							 if($res=='D'){
							 $grade = '4.0';
							 }
							 if($res=='E1'){
							 $grade = '3.0';
							 }
							 if($res=='E2'){
							 $grade = '2.0';
							 }
							 
						     $grade;
							 $cgpa=$cgpa+$grade;
						     $t++; ?>
						
					</center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr></tr>
<tr></tr>
<tr><td style=""><center>OVERALL<br />GRADE</center></td></tr>

<?php $t=0;
$cgpa=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	                        /*echo $markstot[$t]."-".$markstot1[$t];*/
	                          $markstot2= ($markstot1[$t]+$markstot[$t])/2;
	                         if($markstot2 > 90)
                             {
                             $res='A1';
                             }
							 if($markstot2 > 80 && $markstot2 < 91)
                             {
                             $res= 'A2';
                             }
							 if($markstot2 > 70 && $markstot2 < 81)
                             {
                             $res= 'B1';
                             }
							 if($markstot2 > 60 && $markstot2 < 71)
                             {
                             $res= 'B2';
                             }
							 if($markstot2 > 50 && $markstot2 < 61)
                             {
                             $res= 'C1';
                             }
							 if($markstot2 > 40 && $markstot2 < 51)
                             {
                             $res= 'C2';
                             }
							 if($markstot2 > 32 && $markstot2 < 41)
                             {
                             $res= 'D';
                             }
							 if($markstot2 > 20 && $markstot2 < 33)
                             {
                             $res= 'E1';
                             }
							 if($markstot2 < 20)
                             {
                             $res= 'E2';
                             }
							 echo $res;
							  
							 if($res=='A1'){
							 $grade = '10.0';
							 }
							 if($res=='A2'){
							 $grade = '9.0';
							 }
							 if($res=='B1'){
							 $grade = '8.0';
							 }
							 if($res=='B2'){
							 $grade = '7.0';
							 }
							 if($res=='C1'){
							 $grade = '6.0';
							 }
							 if($res=='C2'){
							 $grade = '5.0';
							 }
							 if($res=='D'){
							 $grade = '4.0';
							 }
							 if($res=='E1'){
							 $grade = '3.0';
							 }
							 if($res=='E2'){
							 $grade = '2.0';
							 }
							 
						     $grade;
							 $cgpa=$cgpa+$grade;
						     $t++; ?>
						
					</center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>

<td>
<table class="tb2" border="1" cellpadding="0" cellspacing="0" style="width:100%;">
<tr></tr>
<tr></tr>
<tr><td style=""><center>GRADE<br />POINT</center></td></tr>

<?php $t=0;
$cgpa=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	                        /*echo $markstot[$t]."-".$markstot1[$t];*/
	                          $markstot2= ($markstot1[$t]+$markstot[$t])/2;
	                         if($markstot2 > 90)
                             {
                             $res='A1';
                             }
							 if($markstot2 > 80 && $markstot2 < 91)
                             {
                             $res= 'A2';
                             }
							 if($markstot2 > 70 && $markstot2 < 81)
                             {
                             $res= 'B1';
                             }
							 if($markstot2 > 60 && $markstot2 < 71)
                             {
                             $res= 'B2';
                             }
							 if($markstot2 > 50 && $markstot2 < 61)
                             {
                             $res= 'C1';
                             }
							 if($markstot2 > 40 && $markstot2 < 51)
                             {
                             $res= 'C2';
                             }
							 if($markstot2 > 32 && $markstot2 < 41)
                             {
                             $res= 'D';
                             }
							 if($markstot2 > 20 && $markstot2 < 33)
                             {
                             $res= 'E1';
                             }
							 if($markstot2 < 20)
                             {
                             $res= 'E2';
                             }
							  //echo $res;
							  
							 if($res=='A1'){
							 $grade = '10.0';
							 }
							 if($res=='A2'){
							 $grade = '9.0';
							 }
							 if($res=='B1'){
							 $grade = '8.0';
							 }
							 if($res=='B2'){
							 $grade = '7.0';
							 }
							 if($res=='C1'){
							 $grade = '6.0';
							 }
							 if($res=='C2'){
							 $grade = '5.0';
							 }
							 if($res=='D'){
							 $grade = '4.0';
							 }
							 if($res=='E1'){
							 $grade = '3.0';
							 }
							 if($res=='E2'){
							 $grade = '2.0';
							 }
							 
						     echo $grade;
							 $cgpa=$cgpa+$grade;
						     $t++; ?>
						
					</center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>
</tr>


</table>
<?php }?>


</div>
</div>

            
<br clear="all" />
<div style="width:100%; height:auto;">

<div class="col_pro">
<table style="margin-left:10px; margin-top:5px;">
<tr><td style="width:200px;">HEALTH STATUS:</td> <td style="width:100px;">HEIGHT(cm):</td><td style="width:60px;">150</td> <td style="width:100px;">WEIGHT(kg):</td>
<td style="width:60px;">30</td> <td>BLOOD GROUP:</td><td>O+</td></tr>
</table>
<table style="margin-left:10px; margin-top:5px;">
<tr><td style="width:100px;">VISION(L):</td><td style="width:94px;">6/6</td> <td style="width:100px;">(R):</td>
<td style="width:60px;">6/6</td> <td>Dental Hygiene:</td><td>Normal</td></tr>
</table>
</div>
<div class="col_pror">
<br />
<center>CGPA: &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cgpa/($t);?></center> </div>
</div>
   
   
<br clear="all" />
	

	
</div>


			
<?php }?>
<br clear="all" />
</div>
</div>
</div>