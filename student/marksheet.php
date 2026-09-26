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
	        $res_exam=mysqli_query($con,"select * from examination where examination_session='".$_SESSION['session']."'")or die(mysqli_error());
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
			 $getdetail=mysqli_query($con,"select * from marks where student='$id' and ses='".$_SESSION['session']."' and exam='".$_POST['exam']."' ");
             $len=mysqli_num_rows($getdetail);
			 ?>
			 <div class="col_m2">
			 <div class="col_m3">
             
			 <h2><center>Elite Higher Secondry School</center></h2><br />
			 <span><center>210 Berasia Road, DIG Bungalow, Green Park Colony</center></span><br />
             <span><center>Jamalpura, Bhopal, Madhya Pradesh 462038</center></span><br />
             <span><center>Affiliated To M.P Board,(Affiliated No. 233006)</center></span>
			 </div>
         
            
			 <br clear="all" />
			 <div style="width:100%; margin-top:10px; background-color:#339966; height:auto; line-height:22px; font-weight:bold; font-size:14px;color:#FFFFFF">
             <center><?php echo $_POST['exam']; ?> PERFORMANCE PROFILE (SESSION&nbsp; :- <?php echo $_SESSION['session'];   ?>)</center>
             </div>
			 <br  clear="all"/>
			 <div style="width:100%; height:auto;">
			 <div class="colm_left">
			 <img src="../school/upload/<?php echo $studrow['student_img'];  ?>"/>
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
			  <br  clear="all"/>
			 
			 <table border="1" class="col_table" cellspacing="0" cellpadding="0" >
			 <tr style="height:30px; background-color: #339966;">
			 <td align="center" style="width:70px;">Subject</td>
			 <td align="center" style="width:50px;"> <?php echo $_POST['exam']; ?> </td>
			 <td align="center" style="width:50px;">GRADE POINT</td>
			 </tr>
			 <tr style="height:25px;">
							<?php
							 $i=0;
							 while($rowfeedetail=mysqli_fetch_array($getdetail))
							 {
							 ?>
							 
							 <td style="height:28px;"><center><?php echo $rowfeedetail['subject'];  ?></center></td>	
							 	
							 <td><center>
							 <?php 
							 $marks = ($rowfeedetail['obtainmarks'] * 100)/$rowfeedetail['totalmarks'];
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
							 </td>	
							 
							 
							 <td><center>
							 <?php 
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
							 ?>
							 </center> 
							 </td>		
							 </tr>
			 <?php 
			 $i++; 
			 }
			 ?>
			 <tr colspan="3" style="background-color:#339966 "><td colspan="3" align="right" height="20px">
			 <span style="margin-right:70px; font-size:14px; font-weight:bold;">CGPA: <?php echo $cgpa/($i);?></span></td></tr>
			 </table>
		
				 <br  clear="all"/>			 
							 
			 
			 </div>
			 <?php
			 }
			 ?>
			
<br clear="all" />
</div>
</div>
</div>