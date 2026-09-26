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
<title>Shining School</title>
</head>
<body>
<div style="width:4500px;height:auto">
<br clear="all">
<table style="width:100%;" id="sample_1" border="1" cellpadding="0" cellspacing="0">
<tr style="line-height:25px;color:#000000;font-size:21px;font-weight:bold;" align="left">
<td colspan="81">&nbsp;&nbsp;ANNUAL RESULT SHEET, SESSION <?php echo $_GET['ses']; ?>
<input type="hidden" name="cls" id="cls" value="<?php echo $_GET['class']; ?> Class" />
<input type="hidden" name="exm" id="exm" value="Annual" />
<input type="hidden" name="ses" id="ses" value="<?php echo $_GET['ses']; ?>" />
</td>
</tr>

<tr style="line-height:25px;color:#000000;font-size:21px; font-weight:bold;" align="left">
<td colspan="81">&nbsp;&nbsp;Name Of School - Shining Public Higher Secondary School</td>
</tr>

<tr style="line-height:25px;color:#FF6600;font-size:21px; font-weight:bold;border-bottom:2px #FF0000 solid;" align="left">
<td colspan="5">&nbsp;Dise Code : 23340518828</td><td colspan="3">&nbsp;CLASS - <?php echo $_GET['class']; ?></td><td colspan="4">&nbsp;Meddium-English</td>
<td colspan="5">&nbsp;Block : Sanchi</td><td colspan="75">&nbsp;District : Raisen</td>
</tr>

<tr style="line-height:20px;color:#000000;font-size:21px; border-top:2px #FF0000 solid;" align="center">
<td colspan="13">&nbsp;Student Information</td>
<td colspan="11" style="border-left:1px #FF0000 solid;border-right:1px #FF0066 solid; color:#000000">
Quarterly Exam
</td>
<td colspan="11" style="border-left:1px #FF0000 solid;border-right:1px #FF0000 solid;border-right:1px #FF0066 solid; color:#000000">
Half Yearly Exam
</td>

<td colspan="11" style="border-left:1px #FF0000 solid;border-right:1px #FF0000 solid;border-right:1px #FF0066 solid; color:#000000">
Annual Exam
</td>

<td colspan="5" style="border-left:1px #FF0000 solid;border-right:1px #FF0066 solid; color:#000000">
Quarterly Exam(5%)
</td>
<td colspan="5" style="border-left:1px #FF0000 solid;border-right:1px #FF0000 solid;border-right:1px #FF0066 solid; color:#000000">
Half Yearly Exam(5%)
</td>
<td colspan="10" style="border-left:1px #FF0000 solid;border-right:1px #FF0000 solid;border-right:1px #FF0066 solid; color:#000000">
Annual Exam(90%)
</td>

<td colspan="18" style="border-left:1px #FF0000 solid;border-right:2px #FF0000 solid;color:#000000">
Annual Total = (Quarterly Exam(5%) + Half Yearly Exam(5%) + Annual Exam(90%)) (IN ROUND)
</td>


</tr>

<tr style="line-height:20px;font-size:21px;" align="center">
<td rowspan="2">Sr No</td>
<td rowspan="2">Roll No.</td>
<td rowspan="2">Sch. No.</td>
<td rowspan="2">Name Of Student</td>
<td rowspan="2">Mother's Name</td>
<td rowspan="2">Father's Name</td>
<td rowspan="2">Date Of Birth</td>
<td rowspan="2">Gender</td>
<td rowspan="2" style="color:#FF0000">Category</td>
<td rowspan="2">SSMID</td>
<td rowspan="2">Aadhar No.</td>
<td rowspan="2" style="border-right:1px #FF0000 solid;color:#FF0000">Enroll.No.</td>

<td style="border-left:1px #FF0000 solid;color:#FF0000" colspan="2">English</td>
<td colspan="2" style="color:#FF0000">Hindi</td>
<td colspan="2" style="color:#FF0000">Biology</td>
<td colspan="2" style="color:#FF0000">Physics</td>
<td colspan="2" style="color:#FF0000">Chemistry</td>
<td style="border-right:1px #FF0000 solid;" rowspan="2">G.T.</td>

<td style="border-left:1px #FF0000 solid;color:#FF0000" colspan="2">English</td>
<td colspan="2" style="color:#FF0000">Hindi</td>
<td colspan="2" style="color:#FF0000">Biology</td>
<td colspan="2" style="color:#FF0000">Physics</td>
<td colspan="2" style="color:#FF0000">Chemistry</td>
<td style="border-right:1px #FF0000 solid;" rowspan="2">G.T.</td>

<td style="border-left:1px #FF0000 solid;color:#FF0000" colspan="2">English</td>
<td colspan="2" style="color:#FF0000">Hindi</td>
<td colspan="2" style="color:#FF0000">Biology</td>
<td colspan="2" style="color:#FF0000">Physics</td>
<td colspan="2" style="color:#FF0000">Chemistry</td>
<td style="border-right:1px #FF0000 solid;" rowspan="2">G.T.</td>

<td rowspan="2" style="border-left:1px #FF0000 solid;color:#FF0000">Eng</td>
<td rowspan="2" style="color:#FF0000">Hindi</td>
<td rowspan="2" style="color:#FF0000">Biology</td>
<td rowspan="2" style="color:#FF0000">Phy.</td>
<td rowspan="2" style="color:#FF0000;border-right:1px #FF0000 solid;">Che.</td>


<td rowspan="2" style="border-left:1px #FF0000 solid;color:#FF0000">Eng</td>
<td rowspan="2" style="color:#FF0000">Hindi</td>
<td rowspan="2" style="color:#FF0000">Biology</td>
<td rowspan="2" style="color:#FF0000">Phy.</td>
<td rowspan="2" style="color:#FF0000;border-right:1px #FF0000 solid;">Che.</td>

<td style="border-left:1px #FF0000 solid;color:#FF0000" colspan="2">English</td>
<td colspan="2" style="color:#FF0000">Hindi</td>
<td colspan="2" style="color:#FF0000">Biology</td>
<td colspan="2" style="color:#FF0000">Phy.</td>
<td colspan="2" style="color:#FF0000;border-right:1px #FF0000 solid;">Che.</td>



<td style="border-left:1px #FF0000 solid;color:#FF0000" colspan="2">English</td>
<td colspan="2" style="color:#FF0000">Hindi</td>
<td colspan="2" style="color:#FF0000">Biology</td>
<td colspan="2" style="color:#FF0000">Phy.</td>
<td colspan="2" style="color:#FF0000">Che.</td>
<td rowspan="2">Grand<br />Total</td>
<td rowspan="2">Per(%)</td>
<td rowspan="2">Div.</td>
<td rowspan="2">Rank</td>
<td rowspan="2">Result</td>
<td rowspan="2" style="border-right:2px #FF0000 solid;">Attend</td>
</tr>
<tr align="center">


<td style="border-left:1px #FF0000 solid;">TH.<br> <span style="color:#006699">Max <br>[80]<br>Min<br>[26]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[20]<br>Min<br>[7]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[80]<br>Min<br>[26]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[20]<br>Min<br>[7]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>


<td style="border-left:1px #FF0000 solid;">TH.<br> <span style="color:#006699">Max <br>[80]<br>Min<br>[26]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[20]<br>Min<br>[7]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[80]<br>Min<br>[26]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[20]<br>Min<br>[7]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>


<td style="border-left:1px #FF0000 solid;">TH.<br> <span style="color:#006699">Max <br>[80]<br>Min<br>[26]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[20]<br>Min<br>[7]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[80]<br>Min<br>[26]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[20]<br>Min<br>[7]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>
<td>TH.<br> <span style="color:#006699">Max <br>[70]<br>Min<br>[23]</span></td>
<td>PR.<br> <span style="color:#006699">Max <br>[30]<br>Min<br>[10]</span></td>


<td style="border-left:1px #FF0000 solid;">TH.</span></td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>
<td>TH.</td>
<td style="border-right:1px #FF0000 solid;">PR.</td>

 <td style="border-left:1px #FF0000 solid;">TH.</span></td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>
<td>TH.</td>
<td>PR.</td>


</tr>
<tr align="center" style="background-color:#FF3399">
<td>01</td><td>02</td><td>03</td><td>04</td><td>05</td><td>06</td><td>07</td><td>08</td><td>09</td><td>10</td><td>11</td><td style="border-right:1px #FF0000 solid;">12</td>
<td style="border-left:1px #FF0000 solid;">13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td>
<td style="border-right:1px #FF0000 solid;">23</td><td style="border-left:1px #FF0000 solid;">24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td><td>32</td><td>33</td><td style="border-right:1px #FF0000 solid;">34</td><td style="border-left:1px #FF0000 solid;">35</td><td>36</td><td>37</td><td>38</td><td>39</td>
<td>40</td><td>41</td><td>42</td><td>43</td><td>44</td>
<td style="border-right:1px #FF0000 solid;">45</td><td style="border-left:1px #FF0000 solid;">46</td><td>47</td>
<td>48</td><td>49</td><td style="border-right:1px #FF0000 solid;">50</td><td style="border-left:1px #FF0000 solid;">51</td>
<td>52</td><td>53</td><td>54</td><td style="border-right:1px #FF0000 solid;">55</td>
<td style="border-left:1px #FF0000 solid;">56</td><td>57</td><td>58</td><td>59</td><td>60</td><td>61</td><td>62</td>
<td>63</td><td>64</td><td style="border-right:1px #FF0000 solid;">65</td><td style="border-left:1px #FF0000 solid;">66</td><td>67</td><td>68</td><td>69</td><td>70</td><td>71</td>
<td>72</td><td>73</td><td>74</td><td>75</td><td>76</td><td>77</td><td>78</td><td>79</td><td>80</td><td style="border-right:2px #FF0000 solid;">81</td>

</tr>
<?php
$search=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='$ses' and status='0' order by student_name Asc");
$i=1;
while($studrow=mysqli_fetch_array($search))
{
$uid=$studrow['uid'];
?>	
<tr style="color:#000;font-size:20px;line-height:23PX;">
<td align="center"><?php echo $i; ?></td>
<td style="width:70PX;"><?php echo $studrow['rno'];?></td>
<td><?php echo $studrow['student_scholar'];?></td>
<td><?php echo $studrow['student_name'];?></td>
<td><?php echo $studrow['m_name'];?></td>
<td><?php echo $studrow['student_fname'];?></td>
<td><?php echo $studrow['student_dob'];?></td>
<td style="text-transform:uppercase;"><?php echo $studrow['student_gender'];?></td>
<td><?php echo $studrow['caste'];?></td>
<td><?php echo $studrow['religion'];?></td>
<td><?php echo $studrow['student_rollno'];?></td>
<td style="border-right:1px #FF0000 solid;"><?php echo $studrow['reg_no'];?></td>
<?php
$qpeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowqpeng=mysqli_fetch_array($qpeng);
$qpeng_m = $rowqpeng['obtainmarks'] ?? '';

$meng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowmeng=mysqli_fetch_array($meng);
$meng_m = $rowmeng['obtainmarks'] ?? '';
$meng_m5 = (float)$meng_m*5/100;


$hpeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowhpeng=mysqli_fetch_array($hpeng);
$hpeng_m = $rowhpeng['obtainmarks'] ?? '';
$heng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowheng=mysqli_fetch_array($heng);
$heng_m = $rowheng['obtainmarks'] ?? '';
$heng_m5 = (float)$heng_m*5/100;

$aeng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowaeng=mysqli_fetch_array($aeng);
$aeng_m = $rowaeng['obtainmarks'] ?? '';
$aeng_m90 = (float)$aeng_m*90/100;

$peng=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='English' and ses='$ses'") 
or die(mysqli_error());
$rowpeng=mysqli_fetch_array($peng);
$peng_m = $rowpeng['obtainmarks'] ?? '';
$peng_m90 = (float)$peng_m*90/100;

$english100 = (float)$aeng_m+(float)$peng_m;

//$english = $meng_m10+$heng_m20+$aeng_m60+$peng_m10;
?>
<!--hindi marking start-->
<?php
$qphindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowqphindi=mysqli_fetch_array($qphindi);
$qphindi_m = $rowqphindi['obtainmarks'] ?? '';
 
$mhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowmhindi=mysqli_fetch_array($mhindi);
$mhindi_m = $rowmhindi['obtainmarks'] ?? '';
$mhindi_m5 = (float)$mhindi_m*5/100;


$hphindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowhphindi=mysqli_fetch_array($hphindi);
$hphindi_m = $rowhphindi['obtainmarks'] ?? '';
$hhindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowhhindi=mysqli_fetch_array($hhindi);
$hhindi_m = $rowhhindi['obtainmarks'] ?? '';
$hhindi_m5 = (float)$hhindi_m*5/100;

$ahindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowahindi=mysqli_fetch_array($ahindi);
$ahindi_m = $rowahindi['obtainmarks'] ?? '';
$ahindi_m90 = (float)$ahindi_m*90/100;

$phindi=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Hindi/Urdu' and ses='$ses'") 
or die(mysqli_error());
$rowphindi=mysqli_fetch_array($phindi);
$phindi_m = $rowphindi['obtainmarks'] ?? '';
$phindi_m90 = (float)$phindi_m*90/100;

$hindi100 = (float)$ahindi_m+(float)$phindi_m;

//$hindi = $mhindi_m10+$hhindi_m20+$ahindi_m60+$phindi_m10;

?>

<!--Sanskrit marking start-->
<?php
$qpsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowqpsans=mysqli_fetch_array($qpsans);
$qpsans_m = $rowqpsans['obtainmarks'] ?? '';

$msans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowmsans=mysqli_fetch_array($msans);
$msans_m = $rowmsans['obtainmarks'] ?? '';
$msans_m5 = (float)$msans_m*5/100;

$hpsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowhpsans=mysqli_fetch_array($hpsans);
$hpsans_m = $rowhpsans['obtainmarks'] ?? '';
$hsans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowhsans=mysqli_fetch_array($hsans);
$hsans_m = $rowhsans['obtainmarks'] ?? '';
$hsans_m5 = (float)$hsans_m*5/100;

$asans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowasans=mysqli_fetch_array($asans);
$asans_m = $rowasans['obtainmarks'] ?? '';
$asans_m90 = (float)$asans_m*90/100;

$psans=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowpsans=mysqli_fetch_array($psans);
$psans_m = $rowpsans['obtainmarks'] ?? '';
$psans_m90 = (float)$psans_m*90/100;

$sanskrit100 = (float)$asans_m+(float)$psans_m;
//$sanskrit = $msans_m10+$hsans_m20+$asans_m60+$psans_m10;
?>
<!--Maths marking start-->
<?php
$qpmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowqpmath=mysqli_fetch_array($qpmath);
$qpmath_m = $rowqpmath['obtainmarks'] ?? '';

$mmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowmmath=mysqli_fetch_array($mmath);
$mmath_m = $rowmmath['obtainmarks'] ?? '';
$mmath_m5 = (float)$mmath_m*5/100;

$hpmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowhpmath=mysqli_fetch_array($hpmath);
$hpmath_m = $rowhpmath['obtainmarks'] ?? '';
$hmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowhmath=mysqli_fetch_array($hmath);
$hmath_m = $rowhmath['obtainmarks'] ?? '';
$hmath_m5 = (float)$hmath_m*5/100;

$amath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowamath=mysqli_fetch_array($amath);
$amath_m = $rowamath['obtainmarks'] ?? '';
$amath_m90 = (float)$amath_m*90/100;

$pmath=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Biology' and ses='$ses'") 
or die(mysqli_error());
$rowpmath=mysqli_fetch_array($pmath);
$pmath_m = $rowpmath['obtainmarks'] ?? '';
$pmath_m90 = (float)$pmath_m*90/100;

$math100 = (float)$amath_m+(float)$pmath_m;

//$math = $mmath_m10+$hmath_m20+$amath_m60+$pmath_m10;
?>

<!--Science marking start-->
<?php
$qpsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Physics' and ses='$ses'") 
or die(mysqli_error());
$rowqpsc=mysqli_fetch_array($qpsc);
$qpsc_m = $rowqpsc['obtainmarks'] ?? '';

$msc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Physics' and ses='$ses'") 
or die(mysqli_error());
$rowmsc=mysqli_fetch_array($msc);
$msc_m = $rowmsc['obtainmarks'] ?? '';
$msc_m5 = (float)$msc_m*5/100;

$hpsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Physics' and ses='$ses'") 
or die(mysqli_error());
$rowhpsc=mysqli_fetch_array($hpsc);
$hpsc_m = $rowhpsc['obtainmarks'] ?? '';
$hsc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Physics' and ses='$ses'") 
or die(mysqli_error());
$rowhsc=mysqli_fetch_array($hsc);
$hsc_m = $rowhsc['obtainmarks'] ?? '';
$hsc_m5 = (float)$hsc_m*5/100;

$asc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Physics' and ses='$ses'") 
or die(mysqli_error());
$rowasc=mysqli_fetch_array($asc);
$asc_m = $rowasc['obtainmarks'] ?? '';
$asc_m90 = (float)$asc_m*90/100;

$psc=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Physics' and ses='$ses'") 
or die(mysqli_error());
$rowpsc=mysqli_fetch_array($psc);
$psc_m = $rowpsc['obtainmarks'] ?? '';
$psc_m90 = (float)$psc_m*90/100;

$science100 = (float)$asc_m+(float)$psc_m;
//$science = $msc_m10+$hsc_m20+$asc_m60+$psc_m10;
?>

<!--Social Physics marking start-->
<?php
$qpss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERM PROJECT' and subject='Chemistry' and ses='$ses'") 
or die(mysqli_error());
$rowqpss=mysqli_fetch_array($qpss);
$qpss_m = $rowqpss['obtainmarks'] ?? '';

$mss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='FIRST TERMINAL' and subject='Chemistry' and ses='$ses'") 
or die(mysqli_error());
$rowmss=mysqli_fetch_array($mss);
$mss_m = $rowmss['obtainmarks'] ?? '';
$mss_m5 = (float)$mss_m*5/100;

$hpss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERM PROJECT' and subject='Chemistry' and ses='$ses'") 
or die(mysqli_error());
$rowhpss=mysqli_fetch_array($hpss);
$hpss_m = $rowhpss['obtainmarks'] ?? '';
$hss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='SECOND TERMINAL' and subject='Chemistry' and ses='$ses'") 
or die(mysqli_error());
$rowhss=mysqli_fetch_array($hss);
$hss_m = $rowhss['obtainmarks'] ?? '';
$hss_m5 = (float)$hss_m*5/100;

$ass=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL EXAM' and subject='Chemistry' and ses='$ses'") 
or die(mysqli_error());
$rowass=mysqli_fetch_array($ass);
$ass_m = $rowass['obtainmarks'] ?? '';
$ass_m90 = (float)$ass_m*90/100;

$pss=mysqli_query($con,"select subject,obtainmarks,totalmarks from marks where student='$uid' and exam='ANNUAL PROJECT' and subject='Chemistry' and ses='$ses'") 
or die(mysqli_error());
$rowpss=mysqli_fetch_array($pss);
$pss_m = $rowpss['obtainmarks'] ?? '';
$pss_m90 = (float)$pss_m*90/100;

$ss100 = (float)$ass_m+(float)$pss_m;
//$ss = $mss_m10+$hss_m20+$ass_m60+$pss_m10;
?>

<!--GK marking start-->
<?php
$theng = (float)$meng_m5+(float)$heng_m5+(float)$aeng_m90;
$thhindi = (float)$mhindi_m5+(float)$hhindi_m5+(float)$ahindi_m90;
$thsans = (float)$msans_m5+(float)$hsans_m5+(float)$asans_m90;
$thmath = (float)$mmath_m5+(float)$hmath_m5+(float)$amath_m90;
$thsc = (float)$msc_m5+(float)$hsc_m5+(float)$asc_m90;
$thss = (float)$mss_m5+(float)$hss_m5+(float)$ass_m90;


$theng100 = round($theng)+round($peng_m90);
$thhindi100 = round($thhindi)+round($phindi_m90);
$thsans100 = round($thsans)+round($psans_m90);
$thmath100 = round($thmath)+round($pmath_m90);
$thsc100 = round($thsc)+round($psc_m90);
$thss100 = round($thss)+round($pss_m90);

$gtm = (float)$theng100+(float)$thhindi100+(float)$thsans100+(float)$thmath100+(float)$thsc100+(float)$thss100;

$mothly = (float)$meng_m+(float)$msans_m+(float)$mhindi_m+(float)$mmath_m+(float)$msc_m+(float)$mss_m;
$half = (float)$heng_m+(float)$hsans_m+(float)$hhindi_m+(float)$hmath_m+(float)$hsc_m+(float)$hss_m;
$annual = (float)$english100+(float)$hindi100+(float)$sanskrit100+(float)$math100+(float)$science100+(float)$ss100;

//$mothly10 = $meng_m10+$mhindi_m10+$msans_m10+$mmath_m10+$msc_m10+$mss_m10;
//$half20 = $heng_m20+$hsans_m20+$hhindi_m20+$hmath_m20+$hsc_m20+$hss_m20;
//$annual60 = $aeng_m60+$ahindi_m60+$asans_m60+$amath_m60+$asc_m60+$ass_m60;
//$project60 = $peng_m10+$phindi_m10+$psans_m10+$pmath_m10+$psc_m10+$pss_m10;
//$annual100 = $english+$hindi+$sanskrit+$math+$science+$ss;
?>
<td align="center" style="border-left:1px #FF0000 solid;"><?php echo $meng_m; ?></td>
<td align="center"><?php echo $qpeng_m ;  $qeng5 = ((float)$meng_m+(float)$qpeng_m)*5/100; ?></td>

<td align="center"><?php echo $mhindi_m; ?></td>
<td align="center"><?php echo $qphindi_m;  $qhindi5 =((float)$mhindi_m+(float)$qphindi_m)*5/100;?></td>

<td align="center"><?php echo $mmath_m; ?></td>
<td align="center"><?php echo $qpmath_m; $qmath5 = ((float)$mmath_m+(float)$qpmath_m)*5/100;?></td>

<td align="center"><?php echo $msc_m; ?></td>
<td align="center"><?php echo $qpsc_m; $qsc5 = ((float)$msc_m+(float)$qpsc_m)*5/100;?></td>

<td align="center"><?php echo $mss_m; ?></td>
<td align="center"><?php echo $qpss_m; $qss5 = ((float)$mss_m+(float)$qpss_m)*5/100;?></td>



<td align="center" style=" border-right:1px #FF0000 solid;">
<?php $qyt_m =  (float)$meng_m+(float)$qpeng_m+(float)$mhindi_m+(float)$qphindi_m+(float)$mmath_m+(float)$qpmath_m+(float)$msc_m+(float)$qpsc_m+(float)$mss_m+(float)$qpss_m; 
echo round($qyt_m); ?></td>


<td align="center" style="border-left:1px #FF0000 solid;"><?php echo $heng_m ?></td>
<td align="center"><?php echo $hpeng_m;  $heng5 = ((float)$heng_m+(float)$hpeng_m)*5/100; ?></td>

<td align="center"><?php echo $hhindi_m; ?></td>
<td align="center"><?php echo $hphindi_m; $hhindi5 = ((float)$hhindi_m+(float)$hphindi_m)*5/100;?></td>


<td align="center"><?php echo $hmath_m; ?></td>
<td align="center"><?php echo $hpmath_m; $hmath5 = ((float)$hmath_m+(float)$hpmath_m)*5/100;?></td>

<td align="center"><?php echo $hsc_m; ?></td>
<td align="center"><?php echo $hpsc_m; $hsc5 = ((float)$hsc_m+(float)$hpsc_m)*5/100;?></td>

<td align="center"><?php echo $hss_m; ?></td>
<td align="center"><?php echo $hpss_m; $hss5 = ((float)$hss_m+(float)$hpss_m)*5/100;?></td>



<td align="center" style=" border-right:1px #FF0000 solid;">
<?php $hy_m =  (float)$heng_m+(float)$hpeng_m+(float)$hhindi_m+(float)$hphindi_m+(float)$hmath_m+(float)$hpmath_m+(float)$hsc_m+(float)$hpsc_m+(float)$hss_m+(float)$hpss_m; 
echo round($hy_m); ?></td>


<td align="center" style="border-left:1px #FF0000 solid;"><?php echo $aeng_m ?></td>
<td align="center"><?php echo $peng_m ?></td>

<td align="center"><?php echo $ahindi_m ?></td>
<td align="center"><?php echo $phindi_m ?></td>



<td align="center"><?php echo $amath_m ?></td>
<td align="center"><?php echo $pmath_m ?></td>

<td align="center"><?php echo $asc_m ?></td>
<td align="center"><?php echo $psc_m ?></td>

<td align="center"><?php echo $ass_m ?></td>
<td align="center"><?php echo $pss_m ?></td>



<td align="center" style=" border-right:1px #FF0000 solid;">
<?php $annual_m =  (float)$aeng_m+(float)$peng_m+(float)$ahindi_m+(float)$phindi_m+(float)$asans_m+(float)$psans_m+(float)$amath_m+(float)$pmath_m+(float)$asc_m+(float)$psc_m+(float)$ass_m+(float)$pss_m; 
echo round($annual_m); ?></td>

<td align="center" style="border-left:1px #FF0000 solid;"><?php echo number_format($qeng5, 1); ?></td>
<td align="center"><?php echo  number_format($qhindi5, 1); ?></td>
<td align="center" ><?php echo number_format($qmath5, 1); ?></td>
<td align="center" ><?php echo number_format($qsc5, 1); ?></td>
<td align="center" style="border-right:1px #FF0000 solid;"><?php echo number_format($qss5, 1); ?></td>


<td align="center" style="border-left:1px #FF0000 solid;"><?php echo number_format($heng5, 1); ?></td>
<td align="center"><?php echo  number_format($hhindi5, 1); ?></td>
<td align="center" ><?php echo number_format($hmath5, 1); ?></td>
<td align="center" ><?php echo number_format($hsc5, 1); ?></td>
<td align="center" style="border-right:1px #FF0000 solid;"><?php echo number_format($hss5, 1); ?></td>


<td align="center" style="border-left:1px #FF0000 solid;"><?php $aeng90 = (float)$aeng_m*90/100; echo number_format($aeng90, 1); ?></td>
<td align="center"><?php  $peng90 =  (float)$peng_m*90/100; echo number_format($peng90, 1); ?></td>

<td align="center"><?php $ahindi90 = (float)$ahindi_m*90/100; echo number_format($ahindi90, 1); ?></td>
<td align="center"><?php $phindi90 = (float)$phindi_m*90/100; echo number_format($phindi90, 1);?></td>

<td align="center"><?php $amath90 = (float)$amath_m*90/100; echo number_format($amath90, 1); ?></td>
<td align="center"><?php $pmath90 = (float)$pmath_m*90/100; echo number_format($pmath90, 1); ?></td>

<td align="center"><?php $asc90 = (float)$asc_m*90/100; echo number_format($asc90, 1); ?></td>
<td align="center"><?php $psc90 = (float)$psc_m*90/100; echo number_format($psc90, 1); ?></td>

<td align="center"><?php $ass90 = (float)$ass_m*90/100; echo number_format($ass90, 1); ?></td>
<td align="center"><?php $pss90 = (float)$pss_m*90/100; echo number_format($pss90, 1); ?></td>




<td align="center" style="border-left:1px #FF0000 solid;">
<?php  $aeng90 = (float)$aeng_m*90/100;  echo $aeng5_5_90 = round($qeng5+(float)$heng5+(float)$aeng90); ?>
</td>

<td align="center"><?php  $peng90 =  round((float)$peng_m*90/100); echo $peng90; ?></td>

<td align="center">
<?php $ahindi90 = (float)$ahindi_m*90/100; echo $ahindi5_5_90 = round((float)$qhindi5+(float)$hhindi5+(float)$ahindi90);  ?>
</td>
<td align="center"><?php $phindi90 = round((float)$phindi_m*90/100); echo $phindi90; ?></td>

<td align="center">
<?php $amath90 = (float)$amath_m*90/100;  echo  $math5_5_90 = round((float)$qmath5+(float)$hmath5+(float)$amath90); ?>
</td>

<td align="center"><?php $pmath90 = round((float)$pmath_m*90/100); echo $pmath90; ?></td>


<td align="center">
<?php $asc90 = (float)$asc_m*90/100; echo $sc5_5_90 = round((float)$qsc5+(float)$hsc5+(float)$asc90); ?></td>

<td align="center"><?php $psc90 = round((float)$psc_m*90/100); echo $psc90; ?></td>


<td align="center">
<?php $ass90 = (float)$ass_m*90/100;  echo $ss5_5_90 = round((float)$qss5+(float)$hss5+(float)$ass90); ?></td>

<td align="center"><?php $pss90 =  round((float)$pss_m*90/100); echo $pss90; ?></td>



<td align="center"><?php echo $gtm =  (float)$aeng5_5_90+(float)$ahindi5_5_90+(float)$math5_5_90+(float)$sc5_5_90+(float)$ss5_5_90+(float)$peng90+(float)$phindi90+(float)$pmath90+(float)$psc90+(float)$pss90;?></td>

<td align="center"><?php  $per = $gtm*100/500;  echo number_format($per, 2); ?></td>

<td align="center">
<?php
if($per > 59)
{
$div= "I";
}
if($per>45 && $per<60)
{
$div= "II";
}
if($per>33 && $per<45)
{
$div= "III";
}
if($per<33)
{
$div= "-";
}
echo $div;
?>
</td>
<td align="center">

</td>
<td align="center">

Pass
</td>


<?php
$sid=$studrow['student_id'];
$att=mysqli_query($con,"select * from att where student='$sid' and class='".$studrow['student_class']."' and session='$ses'");
$rowatt=mysqli_fetch_array($att);
?>
<td align="center" style="border-right:2px #FF0000 solid;">
<?php echo $rowatt['s1'] ?? '';?>
</td>
</tr>




<?php
$i++;

}
?>
<tr>
<td colspan="12"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td>
</tr>
<!--<tr><td colspan="21"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Result Excel</button></td></tr>-->
</table>

</div>

</body>
</html>