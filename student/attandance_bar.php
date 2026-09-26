<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="js/jquery.js" type="text/javascript"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="js/skill.bars.jquery.js"></script>

<script>

$(document).ready(function(){
	
	$('.skillbar').skillBars({
		from: 0,
		speed: 4000, 
		interval: 100,
		decimals: 0,
	});
	
});

</script>

<div id="container">
<div class="shell" style="width:95%;">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<div id="main">
<div class="home">
<h2 style="color:#009966; font-weight:bold">Student Attendance Analysis</h2>
    <?php
    $query = mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
	 $ids = $row['student_id'];
	?>
    <div class="wrapper">
           <?php
           $maxid=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Jul' ");
           $maxrow=mysqli_fetch_array($maxid);
           ?>  
		   <?php echo $abj = $maxrow['count(id)']; ?>
           <?php 
		   $queryj = mysqli_query($con,"select * from month where month='Jul' ") or die(mysqli_error());
           $rowj = mysqli_fetch_array($queryj);
	       $jul = $rowj['working_day'];
           ?>
		    <?php echo $jul = $rowj['working_day']; ?>
		    <?php echo $pj = $jul-$abj; 
		  echo  $perj= $pj / $jul*100;
		    ?>
			
		   <?php
           $che=mysqli_query($con,"select * from absentdetail where student='$ids' and month='Jul' ");
           $co= mysqli_num_rows($che);
		   if($co > 0)
		   {
		   ?>
		   <div class="skillbar" data-percent="<?php echo $perj ; ?>">
	       <span class="skillbar-title" style="background: #d35400;">July</span>
           <p class="skillbar-bar" style="background: #e67e22;"></p>
           <span class="skill-bar-percent"></span>
           </div>
		   <?php
		   }
		   else{
		   ?>
		   <div class="skillbar" data-percent="0">
	       <span class="skillbar-title" style="background: #d35400;">July</span>
           <p class="skillbar-bar" style="background: #e67e22;"></p>
           <span class="skill-bar-percent"></span>
           </div>
		   <?php }?>
    <!-- End Skill Bar -->
           <?php
           $maxida=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Aug' ");
           $maxrowa=mysqli_fetch_array($maxida);
           ?>  
		   <?php  $aba = $maxrowa['count(id)']; ?>
           <?php 
		   $querya = mysqli_query($con,"select * from month where month='Aug' ") or die(mysqli_error());
           $rowa = mysqli_fetch_array($querya);
	       $aug = $rowa['working_day'];
           ?>
		   <?php $aug = $rowa['working_day']; ?>
		   <?php  $paug = $aug-$aba; 
		   $per_aug = $paug/ $aug*100;
		   ?>
           <div class="skillbar" data-percent="<?php echo $per_aug ; ?>">
           <span class="skillbar-title" style="background: #2980b9;">August</span>
           <p class="skillbar-bar" style="background: #3498db;"></p>
           <span class="skill-bar-percent"></span>
           </div>
           <!-- End Skill Bar -->
           <?php
           $maxids=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Sep' ");
           $maxrows=mysqli_fetch_array($maxids);
           ?>  
		   <?php $ab_sep = $maxrows['count(id)']; ?>
           <?php 
		   $querys = mysqli_query($con,"select * from month where month='Sep' ") or die(mysqli_error());
           $rows = mysqli_fetch_array($querys);
	       $sep = $rows['working_day'];
           ?>
		   <?php  $sep = $rows['working_day']; ?>
		   <?php  $p_sep = $sep-$ab_sep; 
		   $per_sep = $p_sep/$sep*100;
		   ?>
           <div class="skillbar" data-percent="<?php echo $per_sep ; ?>">
           <span class="skillbar-title" style="background: rgb(27, 42, 57) none repeat scroll 0% 0%;">September</span>
           <p class="skillbar-bar" style="background: #2c3e50;"></p>
           <span class="skill-bar-percent"></span>
           </div>
           <!-- End Skill Bar -->
           <?php
           $maxido=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Oct' ");
           $maxrowo=mysqli_fetch_array($maxido);
           ?>  
		   <?php  $ab_oct = $maxrowo['count(id)']; ?>
           <?php 
		   $queryo = mysqli_query($con,"select * from month where month='Oct' ") or die(mysqli_error());
           $rowo = mysqli_fetch_array($queryo);
	       $oct = $rowo['working_day'];
           ?>
		   <?php  $oct = $rowo['working_day']; ?>
		   <?php  $p_oct = $oct-$ab_oct; 
		   $per_oct = $p_oct/$oct*100;
		   ?>
           <div class="skillbar" data-percent="<?php echo $per_oct ; ?>">
           <span class="skillbar-title" style="background: #46465e;">October</span>
           <p class="skillbar-bar" style="background: #5a68a5;"></p>
           <span class="skill-bar-percent"></span>
           </div>
	       <?php
           $maxidn=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Nov' ");
           $maxrown=mysqli_fetch_array($maxidn);
           ?>  
		   <?php $ab_nov = $maxrown['count(id)']; ?>
           <?php 
		   $queryn = mysqli_query($con,"select * from month where month='Nov' ") or die(mysqli_error());
           $rown = mysqli_fetch_array($queryn);
	       $nov = $rown['working_day'];
           ?>
		   <?php  $nov = $rown['working_day']; ?>
		   <?php $p_nov = $nov-$ab_nov; 
		   $per_nov = $p_nov/$nov*100;
		   ?>
	       <div class="skillbar" data-percent="<?php echo $per_nov ; ?>">
           <span class="skillbar-title" style="background:rgb(83, 129, 76) none repeat scroll 0% 0%;">November</span>
           <p class="skillbar-bar" style="background:rgb(90, 165, 131) none repeat scroll 0% 0%;"></p>
           <span class="skill-bar-percent"></span>
           </div>
	
	       <?php
           $maxidd=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Dec' ");
           $maxrowd=mysqli_fetch_array($maxidd);
           ?>  
		   <?php $ab_dec = $maxrowd['count(id)']; ?>
           <?php 
		   $queryd = mysqli_query($con,"select * from month where month='Dec' ") or die(mysqli_error());
           $rowd = mysqli_fetch_array($queryd);
	       $dec = $rowd['working_day'];
           ?>
		   <?php $dec = $rowd['working_day']; ?>
		   <?php  $p_dec = $dec-$ab_dec; 
		   $per_dec = $p_dec/$dec*100;
		   ?>
	       <div class="skillbar" data-percent="<?php echo $per_dec; ?>">
           <span class="skillbar-title" style="background: rgb(136, 149, 72) none repeat scroll 0% 0%;">December</span>
           <p class="skillbar-bar" style="background: rgb(163, 176, 77) none repeat scroll 0% 0%;"></p>
           <span class="skill-bar-percent"></span>
           </div>
	
	       <?php
           $maxiddj=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Jan' ");
           $maxrowdj=mysqli_fetch_array($maxiddj);
           ?>  
		   <?php $ab_jan = $maxrowdj['count(id)']; ?>
          
		   <?php 
		   $querydj = mysqli_query($con,"select * from month where month='Jan' ") or die(mysqli_error());
           $rowdj = mysqli_fetch_array($querydj);
	       $jan = $rowdj['working_day'];
           ?>
		   <?php $jan = $rowdj['working_day']; ?>
		   <?php  $p_jan = $jan-$ab_jan; 
		   $per_jan = $p_jan/$jan*100;
		   ?>
	       <div class="skillbar" data-percent="<?php echo $per_jan; ?>">
           <span class="skillbar-title" style="background: rgb(176, 80, 77) none repeat scroll 0% 0%;">January</span>
           <p class="skillbar-bar" style="background:rgb(147, 76, 67) none repeat scroll 0% 0%;"></p>
           <span class="skill-bar-percent"></span>
           </div>
	       <?php
           $maxiddf=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='feb' ");
           $maxrowdf=mysqli_fetch_array($maxiddf);
           ?>  
		   <?php  $ab_feb = $maxrowdf['count(id)']; ?>
           <?php 
		   $querydj = mysqli_query($con,"select * from month where month='feb' ") or die(mysqli_error());
           $rowdj = mysqli_fetch_array($querydj);
	       $feb = $rowdj['working_day'];
           ?>
		   <?php  $feb = $rowdj['working_day']; ?>
		   <?php  $p_feb = $feb-$ab_feb; 
		   $per_feb = $p_feb/$feb*100;
		   ?>
	       <div class="skillbar" data-percent="<?php echo $per_feb; ?>">
           <span class="skillbar-title" style="background: rgb(121, 82, 123) none repeat scroll 0% 0%;">February</span>
           <p class="skillbar-bar" style="background:rgb(134, 90, 165) none repeat scroll 0% 0%;"></p>
           <span class="skill-bar-percent"></span>
           </div>
	       <?php
           $maxiddm=mysqli_query($con,"select count(id) from absentdetail where student='$ids' and month='Mar' ");
           $maxrowdm=mysqli_fetch_array($maxiddm);
           ?>  
		   <?php  $ab_mar = $maxrowdm['count(id)']; ?>
           
		   <?php 
		   $querydm = mysqli_query($con,"select * from month where month='Mar' ") or die(mysqli_error());
           $rowdm = mysqli_fetch_array($querydm);
	       $mar = $rowdm['working_day'];
           ?>
		   <?php  $mar = $rowdm['working_day']; ?>
		   
		   <?php $p_mar = $mar-$ab_mar; 
		   $per_mar = $p_mar/$mar*100;
		   ?>
	       <div class="skillbar" data-percent="<?php echo $per_mar; ?>">
           <span class="skillbar-title" style="background: rgb(242, 77, 147) none repeat scroll 0% 0%;">March</span>
           <p class="skillbar-bar" style="background: rgb(234, 105, 196) none repeat scroll 0% 0%;"></p>
           <span class="skill-bar-percent"></span>
           </div>
		   <h2>Over All Attendance</h2>
		   <br />
		   <?php 
		   $querydmy = mysqli_query($con,"select * from month") or die(mysqli_error());
           while($rowdmy = mysqli_fetch_array($querydmy))
		   {
	       $mary = $rowdmy['working_day'];
		   $val2+=$mary;
           }
		   ?>
		   Total Working Day - <?php echo  $val2; ?>
		   <br />
		   <br />
		   <?php
           $maxiddyy=mysqli_query($con,"select count(id) from absentdetail where student='$ids'");
           $maxrowdyy=mysqli_fetch_array($maxiddyy);
           ?>  
		   Total Absent Day - <?php echo $ab_mary = $maxrowdyy['count(id)']; ?>
		   <br />
		   <br />
		   Total Present Day - <?php echo $p = $val2-$ab_mary ; ?>
		   <?php $total = $p/$val2*100; ?>
		   
		   <div class="skillbar" data-percent="<?php echo $total; ?>">
           <span class="skillbar-title" style="background: rgb(21, 47, 7) none repeat scroll 0% 0%;">Yearly</span>
           <p class="skillbar-bar" style="background: none 0% 0% repeat scroll rgb(24, 199, 86);"></p>
           <span class="skill-bar-percent"></span>
           </div>
    <!-- End Skill Bar -->
</div>


</div>
</div>
</div>