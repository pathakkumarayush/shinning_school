<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
include 'db.php';
require_once("../db.php"); 
$term=$_GET['exam'];
$i=1;
$ses = $_GET['ses'];
?>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#ses").val();
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Patrak Annual("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Martinet School</title>
</head>
<body>
<div style="width:3500px;height:auto">
<br clear="all">
<table style="width:100%;" id="sample_1" border="1" cellpadding="0" cellspacing="0" >
<tr style="line-height:25px;color:#000000;font-size:21px;font-weight:bold;" align="left">
<td colspan="59">&nbsp;&nbsp;ANNUAL RESULT SHEET, SESSION <?php echo $_GET['ses']; ?>
<input type="hidden" name="cls" id="cls" value="<?php echo $_GET['class']; ?> Class" />
<input type="hidden" name="exm" id="exm" value="Annual" />
<input type="hidden" name="ses" id="ses" value="<?php echo $_GET['ses']; ?>" />
</td>
</tr>

<tr style="line-height:25px;color:#000000;font-size:21px; font-weight:bold;" align="left">
<td colspan="59">&nbsp;&nbsp;Name Of School - Shining Public Higher Secondary School</td>
</tr>

<tr style="line-height:25px;color:#FF6600;font-size:21px; font-weight:bold;" align="left">
<td colspan="5">&nbsp;DISE Code : 23340518828</td><td colspan="5">&nbsp;School Code - 652075</td><td colspan="5">&nbsp;CLASS - <?php echo $_GET['class']; ?></td>
<td colspan="5">&nbsp;Meddium-English</td>
<td colspan="5">&nbsp;Block : Sanchi</td><td colspan="34">&nbsp;District : Raisen</td>
</tr>

<tr style="line-height:20px; background-color:#c2f3ff;color:#000000;font-size:21px;" align="center">
<td colspan="9">&nbsp;Student Information</td>
<td colspan="9">Monthly Evaluation <br />Max. Marks-40)</td>
<td colspan="9">Half Yearly Evaluation<br />Max. Marks-60)</td>
<td colspan="5">Annual Evaluation<br />(Written) (Max. Marks-60)</td>
<td colspan="9">Annual Evaluation <br />(Project) (Max. Marks-40)</td>
<td>Annal Result(400)</td>
<td rowspan="3">Percentage %</td>
<td rowspan="3">Grade</td>
<td rowspan="3">Attend.</td>
</tr>

<tr style="line-height:20px; background-color:#c2f3ff;color:#000000;font-size:21px;" align="center">
<td rowspan="2">Sr No</td>
<td rowspan="2">Roll No.</td>
<td rowspan="2">Sch. No.</td>
<td rowspan="2">Name Of Student</td>
<td rowspan="2">Mother's Name</td>
<td rowspan="2">Father's Name</td>
<td rowspan="2">Date Of Birth</td>
<td rowspan="2">Gender</td>
<td rowspan="2">Category</td>
<td colspan="2">English</td>
<td colspan="2">Hindi</td>
<td colspan="2">Maths</td>
<td colspan="2">EVS</td>
<td rowspan="2" style="background-color:#FFCC99;">Total<br />(11+13+<br />15+17)</td>

<td colspan="2">English</td>
<td colspan="2">Hindi</td>
<td colspan="2">Maths</td>
<td colspan="2">EVS</td>
<td rowspan="2" style="background-color:#FFCC99;">Total<br />(20+22+<br />24+26)</td>

<td>English</td>
<td>Hindi</td>
<td>Maths</td>
<td>EVS</td>
<td rowspan="2" style="background-color:#FFCC99;">Total<br />(28+29+<br />30+31)</td>

<td colspan="2">English</td>
<td colspan="2">Hindi</td>
<td colspan="2">Maths</td>
<td colspan="2">EVS</td>
<td rowspan="2" style="background-color:#FFCC99;">Total<br />(34+36+<br />38+40)</td>

<td rowspan="2" style="background-color:#FFCC99;">G.T.<br />(18+27+<br />32+41)</td>



</tr>
<tr align="center">
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>


<td style="background-color:#FFCC99">Max<br>[60]</td><td style="background-color:#f1cdd9">[20%]</td>
<td style="background-color:#FFCC99">Max<br>[60]</td><td style="background-color:#f1cdd9">[20%]</td>
<td style="background-color:#FFCC99">Max<br>[60]</td><td style="background-color:#f1cdd9">[20%]</td>
<td style="background-color:#FFCC99">Max<br>[60]</td><td style="background-color:#f1cdd9">[20%]</td>


<td style="background-color:#FFCC99">Max<br>[60]</td>
<td style="background-color:#FFCC99">Max<br>[60]</td>
<td style="background-color:#FFCC99">Max<br>[60]</td>
<td style="background-color:#FFCC99">Max<br>[60]</td>


<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>
<td style="background-color:#FFCC99">Max<br>[40]</td><td style="background-color:#f1cdd9">[10%]</td>



</tr>
<tr align="center">
<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td><td>06</td><td>07</td><td>08</td><td>09</td><td>10</td><td>11</td>
<td>12</td><td>13</td>
<td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>32</td>
<td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td><td>39</td><td>40</td><td>41</td><td>42</td><td>43</td><td>44</td><td>45</td>

</tr>
<?php
$search=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='$ses' and status='0' order by student_name Asc");
$i=1;
while($studrow=mysqli_fetch_array($search))
{
$uid=$studrow['uid'];
?>	
<tr style="color:#335599;font-size:20px;line-height:23PX;">
<td align="center"><?php echo $i; ?></td>
<td><?php echo $studrow['rno'];?></td>
<td><?php echo $studrow['student_scholar'];?></td>
<td><?php echo $studrow['student_name'];?></td>
<td><?php echo $studrow['m_name'];?></td>
<td><?php echo $studrow['student_fname'];?></td>
<td><?php echo $studrow['student_dob'];?></td>
<td style="text-transform:uppercase;"><?php echo $studrow['student_gender'] ?? '';?></td>
<td><?php echo $studrow['caste'];?></td>
<?php
$meng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowmeng=mysqli_fetch_array($meng);
$meng_m = $rowmeng['obtainmarks'] ?? '';
$meng_m10 = (float)$meng_m*10/40;


$heng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowheng=mysqli_fetch_array($heng);
$rowheng['obtainmarks'] = $rowheng['obtainmarks'] ?? '';
$heng_m = $rowheng['obtainmarks'];
$heng_m20 = (float)$rowheng['obtainmarks']*20/60;


$aeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowaeng=mysqli_fetch_array($aeng);
$aeng_m = $rowaeng['obtainmarks'] ?? '';
$aeng_m60 = (float)$aeng_m*60/60;

$peng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowpeng=mysqli_fetch_array($peng);
$peng_m = $rowpeng['obtainmarks'] ?? '';
$peng_m10 = (float)$peng_m*10/40;

$english100 = (float)$aeng_m+(float)$peng_m;

$english = (float)$meng_m10+(float)$heng_m20+(float)$aeng_m60+(float)$peng_m10;
?>
<!--hindi marking start-->
<?php
$mhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowmhindi=mysqli_fetch_array($mhindi);
$mhindi_m = $rowmhindi['obtainmarks'] ?? '';
$mhindi_m10 = (float)$mhindi_m*10/40;

$hhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowhhindi=mysqli_fetch_array($hhindi);
$rowhhindi['obtainmarks'] = $rowhhindi['obtainmarks'] ?? '';
$hhindi_m = $rowhhindi['obtainmarks'] ?? '';
$hhindi_m20 = (float)$rowhhindi['obtainmarks']*20/60;


$ahindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowahindi=mysqli_fetch_array($ahindi);
$ahindi_m = $rowahindi['obtainmarks'] ?? '';
$ahindi_m60 = (float)$ahindi_m*60/60;

$phindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowphindi=mysqli_fetch_array($phindi);
$phindi_m = $rowphindi['obtainmarks'] ?? '';
$phindi_m10 = (float)$phindi_m*10/40;

$hindi100 = (float)$ahindi_m+(float)$phindi_m;

$hindi = (float)$mhindi_m10+(float)$hhindi_m20+(float)$ahindi_m60+(float)$phindi_m10;

?>

<!--Maths marking start-->
<?php
$mmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowmmath=mysqli_fetch_array($mmath);
$mmath_m = $rowmmath['obtainmarks'] ?? '';
$mmath_m10 = (float)$mmath_m*10/40;

$hmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowhmath=mysqli_fetch_array($hmath);
$rowhmath['obtainmarks'] = $rowhmath['obtainmarks'] ?? '';
$hmath_m = $rowhmath['obtainmarks'];
$hmath_m20 = (float)$rowhmath['obtainmarks']*20/60;

$amath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowamath=mysqli_fetch_array($amath);
$amath_m = $rowamath['obtainmarks'] ?? '';
$amath_m60 = (float)$amath_m*60/60;

$pmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowpmath=mysqli_fetch_array($pmath);
$pmath_m = $rowpmath['obtainmarks'] ?? '';
$pmath_m10 = (float)$pmath_m*10/40;

$math100 = (float)$amath_m+(float)$pmath_m;

$math = (float)$mmath_m10+(float)$hmath_m20+(float)$amath_m60+(float)$pmath_m10;
?>

<!--Science marking start-->
<?php
$msc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='MONTHLY TEST' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowmsc=mysqli_fetch_array($msc);
$msc_m = $rowmsc['obtainmarks'] ?? '';
$msc_m10 = (float)$msc_m*10/40;

$hsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowhsc=mysqli_fetch_array($hsc);
$rowhsc['obtainmarks'] = $rowhsc['obtainmarks'] ?? '';
$hsc_m = $rowhsc['obtainmarks'];
$hsc_m20 = (float)$rowhsc['obtainmarks']*20/60;

$asc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowasc=mysqli_fetch_array($asc);
$asc_m = $rowasc['obtainmarks'] ?? '';
$asc_m60 = (float)$asc_m*60/60;

$psc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='EVS' and ses='$ses'") 
or die(mysqli_error());
$rowpsc=mysqli_fetch_array($psc);
$psc_m = $rowpsc['obtainmarks'] ?? '';
$psc_m10 = (float)$psc_m*10/40;

$science100 = (float)$asc_m+(float)$psc_m;
$science = (float)$msc_m10+(float)$hsc_m20+(float)$asc_m60+(float)$psc_m10;
?>

<?php
$mothly = (float)$meng_m+(float)$mhindi_m+(float)$mmath_m+(float)$msc_m;
$half = (float)$heng_m+(float)$hhindi_m+(float)$hmath_m+(float)$hsc_m;
$annual = (float)$english100+(float)$hindi100+(float)$math100+(float)$science100;



$mothly10 = (float)$meng_m10+(float)$mhindi_m10+(float)$mmath_m10+(float)$msc_m10;
$half20 = (float)$heng_m20+(float)$hhindi_m20+(float)$hmath_m20+(float)$hsc_m20;
$annual60 = (float)$aeng_m60+(float)$ahindi_m60+(float)$amath_m60+(float)$asc_m60;
$project60 = (float)$peng_m10+(float)$phindi_m10+(float)$pmath_m10+(float)$psc_m10;
$annual100 = (float)$english+(float)$hindi+(float)$math+(float)$science;

?>
<?PHP
$sid = $studrow['student_id'];
$rmk=mysqli_query($con,"select * from healthh where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);

$rmkk=mysqli_query($con,"select * from healthhh where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowrmkk=mysqli_fetch_array($rmkk);

?>
<td align="center"><?php echo $meng_m; ?></td>
<td align="center"><?php echo number_format($meng_m10, 1); ?></td>

<td align="center"><?php echo $mhindi_m; ?></td>
<td align="center"><?php echo number_format($mhindi_m10, 1); ?></td>

<td align="center"><?php echo $mmath_m; ?></td>
<td align="center"><?php echo number_format($mmath_m10, 1); ?></td>

<td align="center"><?php echo $msc_m; ?></td>
<td align="center"><?php echo number_format($msc_m10, 1); ?></td>

<td align="center"><?php echo $total_me = (float)$meng_m10+(float)$mhindi_m10+(float)$mmath_m10+(float)$msc_m10; ?></td>

<td align="center"><?php echo $heng_m; ?></td>
<td align="center"><?php echo number_format($heng_m20, 1); ?></td>

<td align="center"><?php echo $hhindi_m; ?></td>
<td align="center"><?php echo number_format($hhindi_m20, 1);?></td>

<td align="center"><?php echo $hmath_m; ?></td>
<td align="center"><?php echo number_format($hmath_m20, 1);  ?></td>

<td align="center"><?php echo $hsc_m; ?></td>
<td align="center"><?php echo number_format($hsc_m20, 1); ?></td>

<td align="center"><?php $total_hy = (float)$heng_m20+(float)$hhindi_m20+(float)$hmath_m20+(float)$hsc_m20; echo number_format($total_hy, 1);?></td>

<td align="center"><?php echo $aeng_m; ?></td>
<td align="center"><?php echo $ahindi_m; ?></td>
<td align="center"><?php echo $amath_m; ?></td>
<td align="center"><?php echo $asc_m; ?></td>

<td align="center"><?php $total_aw = (float)$aeng_m+(float)$ahindi_m+(float)$amath_m+(float)$asc_m; echo number_format($total_aw, 1);?></td>


<td align="center"><?php echo $peng_m; ?></td>
<td align="center"><?php echo number_format($peng_m10, 1);?></td>

<td align="center"><?php echo $phindi_m; ?></td>
<td align="center"><?php echo number_format($phindi_m10, 1);?></td>

<td align="center"><?php echo $pmath_m; ?></td>
<td align="center"><?php echo number_format($pmath_m10, 1);?></td>

<td align="center"><?php echo $psc_m; ?></td>
<td align="center"><?php echo number_format($psc_m10, 1); ?></td>


<td align="center"><?php $total_ap = (float)$peng_m10+(float)$phindi_m10+(float)$pmath_m10+(float)$psc_m10; echo number_format($total_ap, 1);?></td>



<td align="center"><?php  $all_total = (float)$total_me+(float)$total_hy+(float)$total_aw+(float)$total_ap; echo number_format($all_total, 1); ?></td>

<td align="center"><?php $fg = $all_total*100/400; echo number_format($fg, 2);?>%</td>

<td align="center">
<?php
                             if($fg > 85)
                             {
                             $refgs='A+';
                             }
							 if($fg > 75 && $fg < 86)
                             {
                             $refgs= 'A';
                             }
							 if($fg > 65 && $fg < 76)
                             {
                             $refgs= 'B+';
                             }
							 if($fg > 55 && $fg < 66)
                             {
                             $refgs= 'B';
                             }
							 if($fg > 50 && $fg < 56)
                             {
                             $refgs= 'C+';
                             }
							 if($fg > 45 && $fg < 51)
                             {
                             $refgs= 'C';
                             }
							 if($fg > 32 && $fg < 46)
                             {
                             $refgs= 'D';
                             }
							 if($fg < 33)
                             {
                             $refgs= 'E';
                             }
							 echo $refgs;

?>
</td>

<?php
$att=mysqli_query($con,"select * from att where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowatt=mysqli_fetch_array($att);
?>
<td align="center">
<?php echo $rowatt['s1'] ?? '';?>
</td>


</tr>

<?php
$i++;
}
?>
<tr>
<td colspan="37"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td>
</tr>
<!--<tr><td colspan="21"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Result Excel</button></td></tr>-->
</table>

</div>

</body>
</html>