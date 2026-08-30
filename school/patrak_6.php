<?php
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
<title>Shining School</title>
</head>
<body>
<div style="width:3500px;height:auto">
<br clear="all">
<table style="width:100%;" id="sample_1" border="1" cellpadding="0" cellspacing="0" >
<tr style="line-height:25px;color:#000000;font-size:21px;font-weight:bold;" align="left">
<td colspan="47">&nbsp;&nbsp;ANNUAL RESULT SHEET, SESSION <?php echo $_GET['ses']; ?>
<input type="hidden" name="cls" id="cls" value="<?php echo $_GET['class']; ?> Class" />
<input type="hidden" name="exm" id="exm" value="Annual" />
<input type="hidden" name="ses" id="ses" value="<?php echo $_GET['ses']; ?>" />
</td>
</tr>

<tr style="line-height:25px;color:#000000;font-size:21px; font-weight:bold;" align="left">
<td colspan="47">&nbsp;&nbsp;Name Of School - Shining Public Higher Secondary School</td>
</tr>

<tr style="line-height:25px;color:#FF6600;font-size:21px; font-weight:bold;" align="left">
<td colspan="4">&nbsp;Dise Code : 23340518828</td><td colspan="2">&nbsp;CLASS - <?php echo $_GET['class']; ?></td><td colspan="2">&nbsp;Meddium-English</td>
<td colspan="2">&nbsp;Block : Sanchi</td><td colspan="37">&nbsp;District : Raisen</td>
</tr>

<tr style="line-height:20px; background-color:#c2f3ff;color:#000000;font-size:21px;" align="center">
<td colspan="11">&nbsp;Student Information</td>
<td colspan="6">Monthly Evaluation <br />Max. Marks-40)</td><td colspan="6">Half Yearly Evaluation<br />Max. Marks-60)</td>
<td colspan="6">Annual Evaluation<br />(Written) (Max. Marks-60)</td>
<td colspan="6">Annual Evaluation <br />(Project) (Max. Marks-40)</td>
<td colspan="7">Monthly10%+Half Yearly20%+<br />Annual(Written)60%+Project10%=100%</td>
<td colspan="7">Final Result</td>
</tr>

<tr style="line-height:20px; background-color:#c2f3ff;color:#000000;font-size:21px;" align="center">
<td>Sr No</td>
<td>Roll No.</td>
<td>Sch. No.</td>
<td>Name Of Student</td>
<td>Mother's Name</td>
<td>Father's Name</td>
<td>Date Of Birth</td>
<td>Gender</td>
<td>Category</td>
<td>SSMID</td>
<td>Aadhar No.</td>

<td>English</td>
<td>Hindi</td>
<td>Sanskrit</td>
<td>Maths</td>
<td>Science</td>
<td>So. Science</td>
<td>English</td>
<td>Hindi</td>
<td>Sanskrit</td>
<td>Maths</td>
<td>Science</td>
<td>So. Science</td>
<td>English</td>
<td>Hindi</td>
<td>Sanskrit</td>
<td>Maths</td>
<td>Science</td>
<td>So. Science</td>
<td>English</td>
<td>Hindi</td>
<td>Sanskrit</td>
<td>Maths</td>
<td>Science</td>
<td>So. Science</td>
<td>English</td>
<td>Hindi</td>
<td>Sanskrit</td>
<td>Maths</td>
<td>Science</td>
<td>So. Science</td>
<td>G.T.</td>
<td style="width:55px;">Result</td>
<td style="width:55px;">Per(%)</td>
<td style="width:55px;">Grade</td>
<td style="width:55px;">Ranks</td>
<td style="width:55px;">Atten<br />dance</td>
</tr>
<tr align="center">
<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td><td>06</td><td>07</td><td>08</td><td>09</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>32</td>
<td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td><td>39</td><td>40</td><td>41</td><td>42</td><td>43</td><td>44</td><td>45</td><td>46</td><td>47</td>
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
<td style="width:70PX;">
<?php 
$sid=$studrow['student_id'];
$rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='$ses'");
$rowno=mysqli_fetch_array($rno);
echo $rowno['rno'];
?>
</td>
<td><?php echo $studrow['student_scholar'];?></td>
<td><?php echo $studrow['student_name'];?></td>
<td><?php echo $studrow['m_name'];?></td>
<td><?php echo $studrow['student_fname'];?></td>
<td><?php echo $studrow['student_dob'];?></td>
<td><?php echo $studrow['student_gender'];?></td>
<td><?php echo $studrow['caste'];?></td>
<td><?php echo $studrow['religion'];?></td>
<td><?php echo $studrow['student_rollno'];?></td>
<?php
$meng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowmeng=mysqli_fetch_array($meng);
$meng_m = $rowmeng['obtainmarks'];
$meng_m10 = $meng_m*10/40;

$heng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowheng=mysqli_fetch_array($heng);
$heng_m = $rowheng['obtainmarks'];
$heng_m20 = $heng_m*20/60;

$aeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowaeng=mysqli_fetch_array($aeng);
$aeng_m = $rowaeng['obtainmarks'];
$aeng_m60 = $aeng_m*60/60;

$peng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowpeng=mysqli_fetch_array($peng);
$peng_m = $rowpeng['obtainmarks'];
$peng_m10 = $peng_m*10/40;

$english100 = $aeng_m+$peng_m;

$english = $meng_m10+$heng_m20+$aeng_m60+$peng_m10;
?>
<!--hindi marking start-->
<?php
$mhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowmhindi=mysqli_fetch_array($mhindi);
$mhindi_m = $rowmhindi['obtainmarks'];
$mhindi_m10 = $mhindi_m*10/40;

$hhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowhhindi=mysqli_fetch_array($hhindi);
$hhindi_m = $rowhhindi['obtainmarks'];
$hhindi_m20 = $hhindi_m*20/60;

$ahindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowahindi=mysqli_fetch_array($ahindi);
$ahindi_m = $rowahindi['obtainmarks'];
$ahindi_m60 = $ahindi_m*60/60;

$phindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='Hindi' and ses='$ses'") 
or die(mysqli_error());
$rowphindi=mysqli_fetch_array($phindi);
$phindi_m = $rowphindi['obtainmarks'];
$phindi_m10 = $phindi_m*10/40;

$hindi100 = $ahindi_m+$phindi_m;

$hindi = $mhindi_m10+$hhindi_m20+$ahindi_m60+$phindi_m10;

?>

<!--Sanskrit marking start-->
<?php
$msans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='Sanskrit' and ses='$ses'") 
or die(mysqli_error());
$rowmsans=mysqli_fetch_array($msans);
$msans_m = $rowmsans['obtainmarks'];
$msans_m10 = $msans_m*10/40;

$hsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Sanskrit' and ses='$ses'") 
or die(mysqli_error());
$rowhsans=mysqli_fetch_array($hsans);
$hsans_m = $rowhsans['obtainmarks'];
$hsans_m20 = $hsans_m*20/60;

$asans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Sanskrit' and ses='$ses'") 
or die(mysqli_error());
$rowasans=mysqli_fetch_array($asans);
$asans_m = $rowasans['obtainmarks'];
$asans_m60 = $asans_m*60/60;

$psans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='Sanskrit' and ses='$ses'") 
or die(mysqli_error());
$rowpsans=mysqli_fetch_array($psans);
$psans_m = $rowpsans['obtainmarks'];
$psans_m10 = $psans_m*10/40;

$sanskrit100 = $asans_m+$psans_m;
$sanskrit = $msans_m10+$hsans_m20+$asans_m60+$psans_m10;
?>
<!--Maths marking start-->
<?php
$mmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowmmath=mysqli_fetch_array($mmath);
$mmath_m = $rowmmath['obtainmarks'];
$mmath_m10 = $mmath_m*10/40;

$hmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowhmath=mysqli_fetch_array($hmath);
$hmath_m = $rowhmath['obtainmarks'];
$hmath_m20 = $hmath_m*20/60;

$amath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowamath=mysqli_fetch_array($amath);
$amath_m = $rowamath['obtainmarks'];
$amath_m60 = $amath_m*60/60;

$pmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='Mathematics' and ses='$ses'") 
or die(mysqli_error());
$rowpmath=mysqli_fetch_array($pmath);
$pmath_m = $rowpmath['obtainmarks'];
$pmath_m10 = $pmath_m*10/40;

$math100 = $amath_m+$pmath_m;

$math = $mmath_m10+$hmath_m20+$amath_m60+$pmath_m10;
?>

<!--Science marking start-->
<?php
$msc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='Science' and ses='$ses'") 
or die(mysqli_error());
$rowmsc=mysqli_fetch_array($msc);
$msc_m = $rowmsc['obtainmarks'];
$msc_m10 = $msc_m*10/40;

$hsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Science' and ses='$ses'") 
or die(mysqli_error());
$rowhsc=mysqli_fetch_array($hsc);
$hsc_m = $rowhsc['obtainmarks'];
$hsc_m20 = $hsc_m*20/60;

$asc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Science' and ses='$ses'") 
or die(mysqli_error());
$rowasc=mysqli_fetch_array($asc);
$asc_m = $rowasc['obtainmarks'];
$asc_m60 = $asc_m*60/60;

$psc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='Science' and ses='$ses'") 
or die(mysqli_error());
$rowpsc=mysqli_fetch_array($psc);
$psc_m = $rowpsc['obtainmarks'];
$psc_m10 = $psc_m*10/40;

$science100 = $asc_m+$psc_m;
$science = $msc_m10+$hsc_m20+$asc_m60+$psc_m10;
?>

<!--Social Science marking start-->
<?php
$mss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='Social Science' and ses='$ses'") 
or die(mysqli_error());
$rowmss=mysqli_fetch_array($mss);
$mss_m = $rowmss['obtainmarks'];
$mss_m10 = $mss_m*10/40;

$hss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='Social Science' and ses='$ses'") 
or die(mysqli_error());
$rowhss=mysqli_fetch_array($hss);
$hss_m = $rowhss['obtainmarks'];
$hss_m20 = $hss_m*20/60;

$ass=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='Social Science' and ses='$ses'") 
or die(mysqli_error());
$rowass=mysqli_fetch_array($ass);
$ass_m = $rowass['obtainmarks'];
$ass_m60 = $ass_m*60/60;

$pss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='Social Science' and ses='$ses'") 
or die(mysqli_error());
$rowpss=mysqli_fetch_array($pss);
$pss_m = $rowpss['obtainmarks'];
$pss_m10 = $pss_m*10/40;

$ss100 = $ass_m+$pss_m;
$ss = $mss_m10+$hss_m20+$ass_m60+$pss_m10;
?>

<!--GK marking start-->
<?php
$mgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Monthly Evaluation' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowmgk=mysqli_fetch_array($mgk);
$mgk_m = $rowmgk['obtainmarks'];
$mgk_m10 = $mgk_m*10/40;

$hgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Half Yearly Evaluation' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowhgk=mysqli_fetch_array($hgk);
$hgk_m = $rowhgk['obtainmarks'];
$hgk_m20 = $hgk_m*20/60;

$agk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Annual Evaluation' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowagk=mysqli_fetch_array($agk);
$agk_m = $rowagk['obtainmarks'];
$agk_m60 = $agk_m*60/60;

$pgk=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='Project' and subject='G.K.' and ses='$ses'") 
or die(mysqli_error());
$rowpgk=mysqli_fetch_array($pgk);
$pgk_m = $rowpgk['obtainmarks'];
$pgk_m10 = $pgk_m*10/40;

$gk100 = $agk_m+$pgk_m;
$gk = $mgk_m10+$hgk_m20+$agk_m60+$pgk_m10;

$mothly = $meng_m+$msans_m+$mhindi_m+$mmath_m+$msc_m+$mss_m;
$half = $heng_m+$hsans_m+$hhindi_m+$hmath_m+$hsc_m+$hss_m;
$annual = $english100+$hindi100+$sanskrit100+$math100+$science100+$ss100;



$mothly10 = $meng_m10+$mhindi_m10+$msans_m10+$mmath_m10+$msc_m10+$mss_m10;
$half20 = $heng_m20+$hsans_m20+$hhindi_m20+$hmath_m20+$hsc_m20+$hss_m20;
$annual60 = $aeng_m60+$ahindi_m60+$asans_m60+$amath_m60+$asc_m60+$ass_m60;
$project60 = $peng_m10+$phindi_m10+$psans_m10+$pmath_m10+$psc_m10+$pss_m10;
$annual100 = $english+$hindi+$sanskrit+$math+$science+$ss;

?>
<?PHP
$rmk=mysqli_query($con,"select * from healthh where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowrmk=mysqli_fetch_array($rmk);

$rmkk=mysqli_query($con,"select * from healthhh where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowrmkk=mysqli_fetch_array($rmkk);

?>
<td align="center"><?php echo $meng_m; ?></td>
<td align="center"><?php echo $mhindi_m; ?></td>
<td align="center"><?php echo $msans_m; ?></td>
<td align="center"><?php echo $mmath_m; ?></td>
<td align="center"><?php echo $msc_m; ?></td>
<td align="center"><?php echo $mss_m; ?></td>

<td align="center"><?php echo $heng_m; ?></td>
<td align="center"><?php echo $hhindi_m; ?></td>
<td align="center"><?php echo $hsans_m; ?></td>
<td align="center"><?php echo $hmath_m; ?></td>
<td align="center"><?php echo $hsc_m; ?></td>
<td align="center"><?php echo $hss_m; ?></td>

<td align="center"><?php echo $aeng_m; ?></td>
<td align="center"><?php echo $ahindi_m; ?></td>
<td align="center"><?php echo $asans_m; ?></td>
<td align="center"><?php echo $amath_m; ?></td>
<td align="center"><?php echo $asc_m; ?></td>
<td align="center"><?php echo $ass_m; ?></td>

<td align="center"><?php echo $peng_m; ?></td>
<td align="center"><?php echo $phindi_m; ?></td>
<td align="center"><?php echo $psans_m; ?></td>
<td align="center"><?php echo $pmath_m; ?></td>
<td align="center"><?php echo $psc_m; ?></td>
<td align="center"><?php echo $pss_m; ?></td>

<td align="center"><?php echo number_format($english, 2); ?></td>
<td align="center"><?php echo number_format($hindi, 2); ?></td>
<td align="center"><?php echo number_format($sanskrit, 2); ?></td>
<td align="center"><?php echo number_format($math, 2); ?></td>
<td align="center"><?php echo number_format($science, 2); ?></td>
<td align="center"><?php echo number_format($ss, 2); ?></td>
<td align="center"><?php echo number_format($annual100, 2); ?></td>
<td align="center">Pass</td>
<td align="center"><?php $fg = $annual100*100/600; echo number_format($fg, 2);?>%</td>
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
<td align="center">0</td>

<td align="center"><?php echo $rowrmk['s1'];?></td>


</tr>

<?php
$i++;
$j++;
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