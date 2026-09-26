<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script type="application/javascript" src="js/awesomechart.js"> </script>
<div id="container">
<div class="shell" style="width:95%;">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<div id="main">

<div class="home">
<div class="fa1" style="width:400px;  float:left">
<h1>FA1</h1>
<div class="container">
<div class="row-fluid">
    <div class="span12">
      <div class="hero-unit-table">   
              <div class="charts_container">
                                <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas');


                                chart1.data = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA1' ") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                 ?>
                                <?php 
									
								      $mark = ($row['obtainmarks'] * 100)/$row['totalmarks'];
									  $marks = $mark . ',';
									  echo  $marks;
								 ?>	
									
									
									
									
                                <?php }; ?>
								];

                                chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA1'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <?php $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
							
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
							
									
								$sub = $row['subject'];
								echo "'".$sub.'-'.$res."'" . ',';	 ?>	
                                <?php }; ?>
                                ];
								
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>

<div class="fa1" style="width:400px;  float:left; margin-left:40px;">
<h1>FA2</h1>
<div class="container">
<div class="row-fluid">
    <div class="span12">
      <div class="hero-unit-table">   
              <div class="charts_container">
                                <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas1" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas1');


                                chart1.data = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA2' ") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                 <?php 
									
								      $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
									  $ex = $marks . ',';
									  echo  $ex ;
									
									  
									
								?>		
                                <?php }; ?>
                                ];

                                chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA2'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <?php $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
							
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
							
									
								$sub = $row['subject'];
								echo "'".$sub.'-'.$res."'" . ',';	 ?>	
                                <?php }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>

<div class="fa1" style="width:400px;  float:left; margin-left:40px;">
<h1>SA1</h1>
<div class="container">
<div class="row-fluid">
    <div class="span12">
      <div class="hero-unit-table">   
              <div class="charts_container">
                                <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas2" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas2');


                                chart1.data = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='SA1' ") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <?php 
									
								      $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
									  $ex = $marks . ',';
									  echo  $ex ;
									
									  
									
									 ?>	
                                <?php }; ?>
                                ];

                                chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='SA1'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <?php $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
							
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
							
									
								$sub = $row['subject'];
								echo "'".$sub.'-'.$res."'" . ',';	 ?>	
                                <?php }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>
<br />


</div>
<br clear="all" />
<div class="home">
<div class="fa1" style="width:400px;  float:left">
<h1>FA3</h1>
<div class="container">
<div class="row-fluid">
    <div class="span12">
      <div class="hero-unit-table">   
              <div class="charts_container">
                                <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas3" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas3');


                                chart1.data = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA3' ") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <?php 
									
								      $mark = ($row['obtainmarks'] * 100)/$row['totalmarks'];
									  $marks = $mark . ',';
									  
									  echo  $marks;
							    ?>	
							    <?php }; ?>
								];

                                chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA3'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <?php 
								
							    $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
							
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
							
									
								$sub = $row['subject'];
								echo "'".$sub.'-'.$res."'" . ',';	
									
								//echo "'". $row['subject'].'-'.A ."'" . ','; 
									
									
									
								?>	
                                <?php }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>

<div class="fa1" style="width:400px;  float:left; margin-left:40px;">
<h1>FA4</h1>
<div class="container">
<div class="row-fluid">
    <div class="span12">
      <div class="hero-unit-table">   
              <div class="charts_container">
                                <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas4" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas4');


                                chart1.data = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA4' ") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                 <?php 
									
								      $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
									  $ex = $marks . ',';
									  echo  $ex ;
									
									  
									
									 ?>		
                                <?php }; ?>
                                ];

                                 chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA4'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <?php 
								
							$marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
							
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
							    $sub = $row['subject'];
								echo "'".$sub.'-'.$res."'" . ',';	
									
								//echo "'". $row['subject'].'-'.A ."'" . ','; 
									
									
									
								?>	
                                <?php }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>

<div class="fa1" style="width:400px;  float:left; margin-left:40px;">
<h1>SA2</h1>
<div class="container">
<div class="row-fluid">
    <div class="span12">
      <div class="hero-unit-table">   
              <div class="charts_container">
                                <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas5" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas5');


                                chart1.data = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='SA2' ") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                    <?php 
									
								      $marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
									  $ex = $marks . ',';
									  echo  $ex ;
									
									  
									
									 ?>	
                                <?php }; ?>
                                ];

                               chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='SA2'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <?php 
								
							$marks = ($row['obtainmarks'] * 100)/$row['totalmarks'];
							
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
							
									
								$sub = $row['subject'];
								echo "'".$sub.'-'.$res."'" . ',';	
									
								//echo "'". $row['subject'].'-'.A ."'" . ','; 
									
									
									
								?>	
                                <?php }; ?>
                                ];
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>
<br />


</div>
<br clear="all" />
<div class="home">
<div class="fa1" style="width:400px;  float:left">
<h1>TERM1</h1>
<div class="container">
<div class="row-fluid">
<div class="span12">
<div class="hero-unit-table">   
<div class="charts_container">
  
<?php
$search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
$studrow=mysqli_fetch_array($search);
$studrow['student_name'];
$class = $studrow['student_class'];
$id = $studrow['uid'];
$term = "TERM1";
$uid=$studrow['uid'];
?>
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
<?php 
if($row[0]=="SA1" || $row[0]=="SA2")
 {
 $per=30;
 }
 else{$per=10;}
?>
<?php			
$qs=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and  exam='$row[0]'") or die(mysqli_error());
$totalobtainmarks=0;
$totalmarks=0;
while($row=mysqli_fetch_row($qs))
{
$totalobtainmarks=$totalobtainmarks+$row[1];
$totalmarks=$totalmarks+$row[2];
?>

<?php           
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
							
							 $rowfeedetail['obtainmarks']; $ob+=$rowfeedetail['obtainmarks'];
							 ?>
							 </center> 

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
<?php }?>
<?php $t=0;
while($t<=$len+1)
{?> 

<?php
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
							 $res;
							 $t++; ?>
	<?php } ?>

                                    <div class="chart_container" style="color:#FFFFFF">
                                   <canvas id="chartCanvas9" width="400" height="400"> </canvas>
							    </div>
                            </div>

                         </div>

                      <script type="application/javascript">

                                var chart1 = new AwesomeChart1('chartCanvas9');


                                 chart1.data = [
                                 <?php $t=0;
                                 while($t<=$len+1)
                                 {?> 
                                 <?php 
								 $markstot= $final_cal[$t]*2; 
								 $ms = $markstot . ',';
								 echo $ms;
								  ?>
	                            
								
								  <?php $t++; } ?>
								  ];

                                chart1.labels = [
                                <?php
                                $query = mysqli_query($con,"select * from marks where student='".$_SESSION['userid']."' and exam='FA1'") or die(mysqli_error());
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <?php 
							    $sub = $row['subject'];
								
								 $t=0;
                                 while($t<=$len+1)
                                 {
								 ?> 
                                 <?php 
								
								 $marks = $final_cal[$t]*2; 
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
							
								
								
								 echo "'".$sub.'-'.$res."'" . ',';	 
								 ?>	
                               
							    <?php $t++; } }; ?>
                                ];
								
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames = 40;
                                chart1.draw();
                                </script>

                               
                           


                        </div>

                    </div>
                </div>

</div>




<br />


</div>
<br clear="all" />
</div>
</div>
</div>