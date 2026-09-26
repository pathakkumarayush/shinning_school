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
			<td>Exam:</td>
            <?php
	  	    $exam="";
	        $res_exam=mysqli_query($con,"select * from examinationa where examination_session='".$_SESSION['session']."'")or die(mysqli_error());
	        ?>
            <td>  <select name="exam"  style="width:125px; border-radius:4px;">
            <option>Select Exam</option>
            <?php
            while($row_exam=mysqli_fetch_array($res_exam))
	        {
	        ?>	
		    <option value="<?php echo $row_exam['examination_name']; ?>"><?php echo $row_exam["examination_name"]; ?></option>
	        <?php
            }
	        ?>
	        </select>
            </td></tr>
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
			
			
             <div class="col_m2">
			 <div class="col_m3">
            <h2><center>Elite Higher Secondry School</center></h2><br />
			 <span><center>210 Berasia Road, DIG Bungalow, Green Park Colony</center></span><br />
             <span><center>Jamalpura, Bhopal, Madhya Pradesh 462038</center></span><br />
             <span><center>Affiliated To M.P Board,(Affiliated No. 233006)</center></span>
			 </div>
			<br clear="all" />
			    <hr />
			 <div style="width:100%; height:auto;">
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
			 <br clear="all" />
			 <div style="width:100%; margin-top:10px; background-color:#339966; height:auto; line-height:22px; font-weight:bold; font-size:14px;color:#FFFFFF">
             <center><?php echo $_POST['exam']; ?> PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
             </div>
			
            <div style="width:100%;height:auto;">
            <div style="">

<?php
if($term=="$term")
{
?>
<table border="0"  cellpadding="0" cellspacing="0" style="float:left" class="col_table">

<tr style="border:1px #000000 solid;"><td style="border:1px #fff solid; font-size:14px; height:25px;" colspan="8"><center><?php echo $term  ?></center></td></tr>
<tr>
<td>
<table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
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
<?php $de=mysqli_query($con,"select examination_id from examinationa where examination_name='$term' ");
$id=mysqli_fetch_row($de);
$er=mysqli_query($con,"select sub_term from terms where term='$id[0]'");

$len=mysqli_num_rows($er);
$t=0;
while($t<=$len)
{
	$final_cal[$t]=0;
	$t++;
}
while($row=mysqli_fetch_row($er))
{
	$te_cal=0;
?>
<td>
<table style="width:100%;" border='1' cellpadding="0" cellspacing="0">


<?php 
if($row[0]=="SA1" || $row[0]=="SA2")
 {
 $per=30;
 }
 else{$per=10;}
?>
<tr> <td><center><?php echo $row[0];  ?><br /><?php echo $per; ?>%</center></td></tr>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and  exam='$row[0]'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
while($row=mysqli_fetch_row($qs))
{
	
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>
<tr>

<td style="height:22px"><center><?php           
                           
						   				 
						     $marks = ($row['1'] * 100)/$row[2];
							 $final_grade=($marks*$per)/100;
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
<table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
<tr></tr>
<tr></tr>
<tr><td style=""><center>Totat<br />FA+SA</center></td></tr>

<?php $t=0;
while($t<=$len+1)
{?> 
<tr>
<td style="height:22px"><center>
<?php /*$final_cal[$t]=0;*/
	
	                         $markstot= $final_cal[$t]*2;
						
	                         if($markstot > 90)
                             {
                             $res='A1';
                             }
							 if($markstot > 80 && $markstot < 91)
                             {
                             $res= 'A2';
                             }
							 if($markstot > 70 && $markstot < 81)
                             {
                             $res= 'B1';
                             }
							 if($markstot > 60 && $markstot < 71)
                             {
                             $res= 'B2';
                             }
							 if($markstot > 50 && $markstot < 61)
                             {
                             $res= 'C1';
                             }
							 if($markstot > 40 && $markstot < 51)
                             {
                             $res= 'C2';
                             }
							 if($markstot > 32 && $markstot < 41)
                             {
                             $res= 'D';
                             }
							 if($markstot > 20 && $markstot < 33)
                             {
                             $res= 'E1';
                             }
							 if($markstot < 20)
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
<table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
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
	                         $markstot= $final_cal[$t]*2;
	                         if($markstot > 90)
                             {
                             $res='A1';
                             }
							 if($markstot > 80 && $markstot < 91)
                             {
                             $res= 'A2';
                             }
							 if($markstot > 70 && $markstot < 81)
                             {
                             $res= 'B1';
                             }
							 if($markstot > 60 && $markstot < 71)
                             {
                             $res= 'B2';
                             }
							 if($markstot > 50 && $markstot < 61)
                             {
                             $res= 'C1';
                             }
							 if($markstot > 40 && $markstot < 51)
                             {
                             $res= 'C2';
                             }
							 if($markstot > 32 && $markstot < 41)
                             {
                             $res= 'D';
                             }
							 if($markstot > 20 && $markstot < 33)
                             {
                             $res= 'E1';
                             }
							 if($markstot < 20)
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
						$t++; 
						
						?>
						</center>
	 </td>
	 </tr>
<?php } ?>
</table>
</td>
</tr>
<tr style="height:40px"><td>HEALTH STATUS:</td><td>HEIGHT(cm):</td><td>150</td><td>WEIGHT(kg):</td><td>30</td>
<td style="height:40px; background-color:#339933; color:#FFFFFF"><center>CGPA: <?php echo $cgpa/($t);?></center></td></tr>
<tr style="height:40px"><td>BLOOD GROUP: O+</td><td>VISION(L):</td><td>6/6</td><td>R  6/6</td><td></td><td></td></tr>
</table>
<?php }?>


</div>
</div>

            
            <br clear="all" />
			
			</div>
			<?php }?>
			
<br clear="all" />
</div>
</div>
</div>