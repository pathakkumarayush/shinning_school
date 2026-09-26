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
<style>
.tbl{ width:150px;font-size:18px!important;}
.tb2{ width:90px;font-size:18px!important;}
.sn{width:153px!important;font-size:18px!important;}
.sn1{width:138px!important;font-size:18px!important;}
.sn2{width:160px!important;font-size:18px!important;}
.tbl tr{line-height:50px!important;font-size:18px!important;}
.fsz{font-size:18px!important;}
</style>
<?php
session_start();
require_once("../db.php"); 
$term=$_GET['exam'];
$ses=$_GET['ses'];
$i=1;
$search=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='$ses' and status='0' order by student_name Asc");
while($rowstud=mysqli_fetch_array($search))
{
$uid=$rowstud['uid'];

$clstech=mysqli_query($con,"select * from class_teacher where class='".$rowstud['student_class']."' and teacher_session='$ses'");
$rowcls=mysqli_fetch_array($clstech);

$clsth=mysqli_query($con,"select * from teacher where uidd='".$rowcls['teacher']."'");
$rowcls=mysqli_fetch_array($clsth);


?>	
<div style="width:1050px;height:1531px; border:6px #000 solid;background-color:#fff;font-family:Arial;" class="fsz">
<br clear="all" />
<div style="width:1036px;height:1517px; border:4px #000 solid;background:url(wm.png) no-repeat center;font-family:font-family:Arial; margin-left:3px; margin-top:-18px;">

	 <br clear="all" />
<div style="width:100%; margin:0 auto; height:auto;margin-top:-10px;">
<div style="float:left; margin-left:4px; width:10%;"><img src="shining.jpg" style=" height:120px; width:105px;" /></div>
<div style="float:left; width:78%;">
<div style=""><span style="font-size:46px; font-family:cambria; color:#000;">
<center><b>DELHI PUBLIC SCHOOL GAJRAULA</b></center></span></div>
<div style="margin-top:7px;">
<span style="font-size:19px; color:#000;font-weight:bold; margin-top:10px;"><center>(AFFILIATED TO C.B.S.E. NEW DELHI)</center></span>
</div>

<div style="margin-top:7px;">

</div>
</div>
<div style="float:left;width:10%;"><!--<img src="cbse.jpg" style="height:110px; width:100px;margin-left:4px;" />--></div>
<br clear="all" />
</div>
<div style="width:100%; margin-top:15px; font-size:22px; background-color:#b2f9b5; height:auto;font-weight:bold;line-height:35px;border-top:2px #000 solid;border-bottom:2px #000 solid; color:#000">
<center>REPORT CARD - ACADEMIC SESSION (<?php echo $ses;   ?>)</center>
</div>
<br clear="all" />		
<div style="width:100%;height:auto;">
<div style="width:100%;height:45px;"><span style="margin-left:5px;font-weight:bold; font-size:22px;"><u>STUDENT PROFILE</u></span></div>
<div style="width:45%; float:left; margin-left:5px; height:100px; text-transform: capitalize;">
<table style="width:100%;font-size:18px; color:#000000; font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn">Student Name</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_name']); ?></td></tr>

<tr><td class="sn">Class/Sec</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_class']; ?></td></tr>



<tr><td class="sn">Father's Name</td><td class="snn">&nbsp;:&nbsp;Mr. <?php echo ucwords($rowstud['student_fname']); ?></td></tr>

<tr><td class="sn">Phone No</td><td class="snn">&nbsp;:&nbsp;<?php echo $dob = $rowstud['student_contactno']; ?> </td></tr>
</table>
</div>
<div style="width:42%; float:left;">
<table style="width:100%;font-size:18px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn2">Admission No</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_scholar']; ?></td></tr>
<tr><td class="sn2">Date Of Birth</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowstud['student_dob']; ?></td></tr>
<tr><td class="sn1">Mother's Name</td><td class="snn">&nbsp;:&nbsp;Mrs. <?php echo ucwords($rowstud['m_name']); ?></td></tr>
<tr><td class="sn2">Class Teacher</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowcls['teacher_name']; ?></td></tr>

</table>
</div>
<div style="width:12%; float:left; text-transform: capitalize;">
<img src="upload/<?php echo $rowstud['student_img'];  ?>"  style="height:115px; width:95px; margin-top:5px; border-radius:5px;"/>
</div>
<br clear="all" />
<table style="width:100%;font-size:18px;margin-left:5px; color:#000000; font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn">Address</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowstud['student_address']); ?></td></tr>
</table>
<br clear="all" />

<?php
$sid = $rowstud['student_id'];
$health=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='$ses'");
$rowhealth=mysqli_fetch_array($health);
?>
<div style="width:100%;height:45px;"><span style="margin-left:5px;font-weight:bold; font-size:22px;"><u>HEALTH STATUS</u></span></div>

<div style="width:50%; float:left; margin-left:0px; height:100px; text-transform: capitalize;">
<table style="width:100%;font-size:18px; margin-left:5px; color:#000000; font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn">Height</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowhealth['height']); ?></td></tr>

<tr><td class="sn">Blood Group</td><td class="snn">&nbsp;:&nbsp;
<?php 
$rowhealth['bg']; 
if($rowhealth['bg']=='A P')
{
$bgs = 'A+';
}
if($rowhealth['bg']=='A N')
{
$bgs = 'A-';
}
if($rowhealth['bg']=='B P')
{
$bgs = 'B+';
}
if($rowhealth['bg']=='B N')
{
$bgs = 'B-';
}

if($rowhealth['bg']=='AB P')
{
$bgs = 'AB+';
}

if($rowhealth['bg']=='AB N')
{
$bgs = 'AB-';
}
if($rowhealth['bg']=='O P')
{
$bgs = 'O+';
}
if($rowhealth['bg']=='O N')
{
$bgs = 'O-';
}
if($rowhealth['bg']=='')
{
$bgs = '';
}
echo $bgs;
?>


</td></tr>

<tr><td class="sn">Teeth</td><td class="snn">&nbsp;:&nbsp;<?php echo $dob = $rowhealth['teeth']; ?> </td></tr>

<tr><td class="sn" style="line-height:20px;">Specific Ailment</td><td class="snn">&nbsp;:&nbsp;<?php echo ucwords($rowhealth['ailment']); ?></td></tr>
</table>
</div>

<div style="width:50%; float:left;">
<table style="width:100%;font-size:18px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td class="sn2">Weight</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowhealth['weight']; ?></td></tr>
<tr><td class="sn2">Vision</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowhealth['vision']; ?></td></tr>
<tr><td class="sn2">Oral Hygiene</td><td class="snn">&nbsp;:&nbsp;<?php echo $rowhealth['oral']; ?></td></tr>
</table>
<?php
$sid = $rowstud['student_id'];
$att_re=mysqli_query($con,"select * from att_helth1 where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='$ses'");
$rowar=mysqli_fetch_array($att_re);

$health=mysqli_query($con,"select * from health where student='$sid' and class='".$rowstud['student_class']."' and exam='$term' and session='$ses'");
$rowhealth=mysqli_fetch_array($health);

$c=$rowstud['tdoj'];
$d=$rowstud['sedate'];
$maxid=mysqli_query($con,"select count(id) from absentdetail where session='$ses' and student='$sid' and STR_TO_DATE(date,'%d-%m-%Y')>=STR_TO_DATE('$c','%d-%m-%Y') AND STR_TO_DATE(date,'%d-%m-%Y') <= STR_TO_DATE('$d','%d-%m-%Y') ");
$rowmax=mysqli_fetch_array($maxid);
$absd = $rowmax["count(id)"];
?>
</div>
<br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />
<br clear="all" />
<div style="width:100%;height:55px;"><span style="margin-left:5px;font-weight:bold; font-size:22px;"><u>ATTENDANCE</u></span></div>
<?php       
	            $sdt = $rowstud['tdoj'];
				$sed = $rowstud['sedate'];
	            $from=date_create(date($sed));
	            $to=date_create($sdt);
                $diff=date_diff($to,$from);
                $tt = $diff->format('%R%a')+1;
				//echo $tt-0;
				
			   
			   $orgd = $rowstud['tdoj'];  
               $newDate = date("Y-m-d", strtotime($orgd)); 
			   
			   $ted = $rowstud['sedate'];  
               $newDatee = date("Y-m-d", strtotime($ted));  
				
				
					
			   $a=$newDate;
               $b=$newDatee;
			  
		      $searchs=mysqli_query($con,"select event_date,SUM(had) from event_calendar where session='$ses' and class='".$rowstud['student_class']."' and event_date BETWEEN '$a' AND '$b' GROUP BY event_date");
			  
			  $val2=0;
			  $val=0;
			  while($studrowd=mysqli_fetch_array($searchs))
			  {
			  $val = $studrowd['SUM(had)']; 
		      $val2+=$val;
			  }
			  $val2;
			  $twday = $tt-$val2;
			
			  if($val2=='0')
              {
              $twdayy = '0'; 
              }
              else
              {
              $twdayy = $twday;
			  }
				
			  ?>



<div style="width:50%; float:left; margin-left:0px; height:100px; text-transform: capitalize;">
<table style="width:100%;font-size:18px; margin-left:5px; color:#000000; font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td style="width:215px; line-height:55px;">Total Days Present</td><td class="snn">&nbsp;:&nbsp;<?php echo  $twdayy-$absd; ?></td></tr>
</table>
</div>

<div style="width:50%; float:left;">
<table style="width:100%;font-size:18px; color:#000000;font-weight:bold;" border="0" cellpadding="0" cellspacing="0" class="tbl">
<tr><td style="width:215px; line-height:55px;">Total Working Days</td><td class="snn">&nbsp;:&nbsp;<?php  echo $twdayy; ?></td></tr>
</table>
</div>
<br clear="all" />
<table style="width:96%; float:left; font-size:18px; margin-top:25px; margin-left:0px;color:#000000;"  border="0" cellpadding="0" cellspacing="0">
<tr style="font-weight:bold;">
<td>&nbsp;&nbsp;<span style="color:#000;">
<div style="float:left; width:23%;">
&nbsp;&nbsp;<b>Class Teacher's Remark</b></span>:&nbsp;
</div>
<div style="float:left; font-weight:normal; width:75%; height:auto; border-bottom:1px #333333 solid;">
<?php echo $rowar['weight']; ?>
</div>
</td>
</tr>
</table>
<br clear="all" />
</div>
<br clear="all" />

<br clear="all"><br clear="all"><br clear="all"><br clear="all"><br clear="all">
<div style="width:100%;height:200px;"><span style="margin-left:5px;font-weight:bold; font-size:22px;"><u>SIGNATURES</u></span></div>
<table border="0" style="width:98%;font-size:18px; margin-top:5px; margin-left:10px;font-weight:bold;color:#000000;">
<tr>
<td style="width:300px; border-top:1px #000000 solid;" align="center"><br />Class Teacher</td>
<td style="width:370px;border-top:1px #000000 solid; margin-left:5px;" align="center"><br />Co-ordinator</td>
<td style="width:270px;border-top:1px #000000 solid;margin-left:5px;" align="center"><br />Principal</td>
</tr>
</table>









	 
	  <br clear="all" />
	</div>
	  </div>
    
     
  <?php
      $i++;
	  }
      ?>	 

	