<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<div class="full_div" style="width:1300px;">
<br clear="all"/>

<?php 
if($_SESSION['userid']=='shining')
{ 
?>

<div style="float:left;margin-top:110px; width:14%;height:432px;margin-left:13px; border-right:4px #FFFFFF solid;" class="dfg">
			
			 <div style="width:100%; height:40px; background-color:#008040">
			 <a href="<?php echo $var."birth"; ?>" style="color:#FFFFFF;font-size:14px; margin-left:5px; font-weight:bold; margin-top:20px; text-decoration:none; 
			 position:absolute; width:180px;" >
             Student Birthday
             <?php
             $res_all=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' order by student_name Asc")
	         or die(mysqli_error());
	         $t1=0;
			 while($row_all=mysqli_fetch_array($res_all))
	         {
	        
	         $d1 = $row_all['student_dob'];
             $birth1 = date("d-m", strtotime("$d1"));
             date_default_timezone_set('Asia/Kolkata');
	         $bday1 = date("d-m");
	         ?>
	         <?php if($birth1==$bday1){ ?>
             <?php $st1 = $row_all["student_email"]; $t1+=$st1; ?>
		     <?php }?>	
             <?php }?>
	         <span id="notification_count" style="margin-left:-1px; margin-top:-12px;"><?php echo $t1; ?></span>
             </a>
			 </div>
			 <div style="width:100%; height:3px; background-color:#FFF;"></div>
	
			 <div style="width:100%; height:3px; background-color:#FFF;"></div>
			 <div style="width:100%; height:120px; background-color:#008040">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."feecollectionby_date"."&&divid=1"; ?>">
			  <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:7px; margin-top:10px; position:absolute;">Today Collections</span><br />
			  <?php
			  $today=date("Y-m-d");
			  $search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'  and date='".$today."'");
			  $i=1;
			  $tft=0;
			  while($studrow=mysqli_fetch_array($search))
			  {
			  $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and
			  student_school='".$_SESSION['uid']."'");
			  $rowsearch=mysqli_fetch_array($numclass1);
			  ?>
			 <?php  $feet= $studrow['fee_deposit'];  $tft+=$feet; ?> 
			 <?php }?>
			 <span style="color:#FFFFFF; font-size:12px; font-weight:bold; margin-left:12px; margin-top:19px; position:absolute;">Tution Fee - <?php echo $tft;?></span>
			 
			  <br />
			  <?php
			  $today=date("Y-m-d");
			  $search2=mysqli_query($con,"select * from fee_detail_trans where session='".$_SESSION['session']."' and date='".$today."'");
			  $i=1;
			  $tpaidamt=0;
			  while($studrow2=mysqli_fetch_array($search2))
			  {
			  $numclass12=mysqli_query($con,"select * from student where student_id='".$studrow2['student']."' and student_session='".$_SESSION['session']."' and
			  student_school='".$_SESSION['uid']."'");
			  $rowsearch2=mysqli_fetch_array($numclass12);
			  ?>
			  <?php  $paidamt= $studrow2['paidamt'];  $tpaidamt+=$paidamt; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:12px; font-weight:bold; margin-left:14px; margin-top:30px; position:absolute;">Bus Fee - <?php echo $tpaidamt;?></span>
			  <br />
			  <?php
			  $today=date("Y-m-d");
			  
			  $search21=mysqli_query($con,"select * from fee_detail_preivios where session='".$_SESSION['session']."' and date='".$today."'");
			  $i=1;
			  $tpaidamt1=0;
			  while($studrow21=mysqli_fetch_array($search21))
			  {
			  $numclass123=mysqli_query($con,"select * from student where student_id='".$studrow21['student']."' and student_session='".$_SESSION['session']."' and
			  student_school='".$_SESSION['uid']."'");
			  $rowsearch2=mysqli_fetch_array($numclass123);
			  ?>
			  <?php  $paidamt1= $studrow21['fee_deposit'];  $tpaidamt1+=$paidamt1; ?>
			  <?php }?>
			  <span style="color:#FFFFFF; font-size:12px; font-weight:bold; margin-left:14px; margin-top:40px; position:absolute;">Other Fee - <?php echo $tpaidamt1;?></span>
			
			 
			  </a>
			  
			  <br />
			 </div>
			 <div style="width:100%; height:3px; background-color:#FFF;"></div>
			 <div style="width:100%; height:53px; background-color:#008040">
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."today_expenses"; ?>">
			  <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:7px; margin-top:10px; position:absolute;">Today Expenses</span><br />
			  <?php
			  $today4=date("Y-m-d");
			  $exe=mysqli_query($con,"select * from expenses where date='".$today4."'");
			  $i=1;
			  $text=0;
			  while($exrow=mysqli_fetch_array($exe))
			  {
			  ?>
			 <?php  $ext= $exrow['amt'];  $text+=$ext; ?> 
			 <?php }?>
			 <span style="color:#FFFFFF; font-size:12px; font-weight:bold; margin-left:12px; margin-top:19px; position:absolute;">Rs. - <?php echo $text;?></span>
			 </a>
			 </div>
			 <div style="width:100%; height:3px; background-color:#FFF;"></div>
		     <div style="width:100%; height:165px; background-color:#008040">
			   
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var.""; ?>">
			  <span style="color:#FFFFFF; font-size:13px; font-weight:bold; margin-left:5px; margin-top:3px; position:absolute;">Today Enquiry-</span><br />
			  <?php
			  $tda=date("d-m-Y");
			  $enq=mysqli_query($con,"select * from enquiry where date='$tda'");
			  $i=1;
			  $tent=0;
			  while($enqrow=mysqli_fetch_array($enq))
			  {
			  ?>
			  <?php  $ten= $enqrow['stt'];  $tent+=$ten; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:120px; margin-top:-11px; position:absolute;"><?php echo $tent;?></span>
			  </a>
			  
			   	<br />
			   
			   
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."view_appointment"; ?>">
			  <span style="color:#FFFFFF; font-size:13px; font-weight:bold; margin-left:5px; margin-top:3px; position:absolute;">Today Registration-</span><br />
			  <?php
			  $tda=date("d-m-Y");
			  $enq=mysqli_query($con,"select * from reg where date='$tda'");
			  $i=1;
			  $tpaidamt1=0;
			  while($enqrow=mysqli_fetch_array($enq))
			  {
			  ?>
			  <?php  $ten= $enqrow['stt'];  $tent+=$ten; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:150px; margin-top:-11px; position:absolute;"><?php //echo $tent;?></span>
			  </a>
			  
			   <br />
			   
			   
			   <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."view_appointment"; ?>">
			  <span style="color:#FFFFFF; font-size:13px; font-weight:bold; margin-left:5px; margin-top:3px; position:absolute;">Today Admission-</span><br />
			  <?php
			  $tda=date("d-m-Y");
			  $enqa=mysqli_query($con,"select * from student where date='$tda'");
			  $i=1;
			  $tenat=0;
			  while($enqrowa=mysqli_fetch_array($enqa))
			  {
			  ?>
			  <?php  $tena= $enqrowa['st'];  $tenat+=$tena; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:150px; margin-top:-11px; position:absolute;"><?php echo $tenat;?></span>
			  </a>
			  
			   <br />
			   
			   
			   
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."appoinment"; ?>">
			 <span style="color:#FFFFFF; font-size:13px; font-weight:bold; margin-left:5px; margin-top:3px; position:absolute;">Today Appointment-</span><br />
			  <?php
			  $today1=date("d-m-Y");
			  $app=mysqli_query($con,"select * from appoiment where date='".$today1."'");
			  $i=1;
			  $tappt=0;
			  while($studap=mysqli_fetch_array($app))
			  {
			  ?>
			  <?php  $tapp= $studap['st'];  $tappt+=$tapp; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:150px; margin-top:-11px; position:absolute;"><?php echo $tappt;?></span>
			  </a>
			  
			  
			  
			 <br />
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."enquiry_pass"; ?>">
			 <span style="color:#FFFFFF; font-size:13px; font-weight:bold; margin-left:5px; margin-top:-3px; position:absolute;">Today Visitors-</span>
			  <?php
			  $today2=date("Y-m-d");
			  $avv=mysqli_query($con,"select * from enquiry_pass where dob='".$today2."'");
			  $i=1;
			  $tvt=0;
			  while($stuv=mysqli_fetch_array($avv))
			  {
			  ?>
			  <?php  $tv= $stuv['st'];  $tvt+=$tv; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:130px; margin-top:-3px; position:absolute;"><?php echo $tvt;?></span>
			 </a>
			 
			 
			  <br /><br />
			  <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."today_attendance_details&&divid=1"; ?>">
			 <span style="color:#FFFFFF; font-size:13px; font-weight:bold; margin-left:5px; margin-top:-3px; position:absolute;">Today Absent-</span>
			  <?php
			  $todaya=date("d-m-Y");
			  $avva=mysqli_query($con,"select * from absentdetail where date='".$todaya."'");
			  $i=1;
			  $tvta=0;
			  while($stuva=mysqli_fetch_array($avva))
			  {
			  ?>
			  <?php  $tva= $stuva['aid'];  $tvta+=$tva; ?>
			  <?php }?>
			 <span style="color:#FFFFFF; font-size:14px; font-weight:bold; margin-left:130px; margin-top:-3px; position:absolute;"><?php echo $tvta;?></span>
			 </a>
			 <br />
			 </div>
			 <div style="width:100%; height:3px; background-color:#FFF;"></div>
			 
			 
			 
			</div>

<?php } ?>

<div class="shell" style="float:left; width:83%;margin-left:13px;">

<br clear="all"/>
<div class="fu" >
<br clear="all"/>

<?php 
if($_SESSION['userid']=='tc')
{ 
?>

<div class="main_one"><a href="./?pageid=tc_gen"><img src="images/TCG.png" /></a> </div>

<div class="main_one"><a href="./?pageid=tc_student"><img src="images/TCC.png" /></a> </div>

<?php 
}
else if($_SESSION['userid']=='exam')
{
?>
<div class="shell_main">
<div class="main_one"><a href="./?pageid=add_exam"><img src="images/Examination/Add Exam.png" /></a> </div>
<div class="main_one"><a href="./?pageid=add_term"><img src="images/Examination/term.png" /></a> </div>
<div class="main_one"><a href="./?pageid=exam_timetable"><img src="images/Examination/Create Time Table.png" /></a> </div>
<div class="main_one"><a href="./?pageid=sendmsg"><img src="images/Examination/Result.png" /></a> </div>
<div class="main_one"><a href="./?pageid=printmarksheetannual"><img src="images/Examination/Marksheet.png" /></a> </div>
<div class="main_one"><a href="./?pageid=sendmsgn"><img src="images/Examination/Results.png" /></a> </div>
<div class="main_one"><a href="./?pageid=sendmsgT"><img src="VTM.png" /></a> </div>
<!--<div class="shell_one"><a href="./?pageid=combine_exam"><img src="images/Examination/comm.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=co-scholastic"><img src="images/co_areas.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=discipline"><img src="images/dici.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=discipline1"><img src="di.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=attendance"><img src="rra.png" /></a> </div>-->
<div class="main_one"><a href="./?pageid=health"><img src="images/rh.png" /></a> </div>
<div class="main_one"><a href="./?pageid=healthh"><img src="images/cca.png" /></a> </div>
<div class="main_one"><a href="./?pageid=healthhh"><img src="images/sa.png" /></a> </div>

<!--<div class="shell_one"><a href="./?pageid=discipline"><img src="images/ls.png" /></a> </div>-->
<!--<div class="shell_one"><a href="./?pageid=discipline_attitute"><img src="images/atti.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=addsub"><img src="images/Time Table/Add Subject.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=1CLS"><img src="images/1CL.png" /></a> </div>-->

<!--<div class="shell_one"><a href="./?pageid=np"><img src="images/np.png" /></a> </div>
<div class="shell_one"><a href="./?pageid=ns"><img src="ns.png" /></a> </div>-->
<br clear="all" />
</div>

<?php 
}

else if($_SESSION['userid']=='admission')
{
?>

<div class="main_div">

<div class="main_one"><a href="./?pageid=enquiry"><img src="images/frontdesk/Student Enquiry.png" /></a> </div>
<!--
<div class="shell_one"><a href="./?pageid=reg"><img src="reg.png" /></a> </div>-->

<div class="main_one"><a href="./?pageid=admission"><img src="images/FEE Management/admission1.png" /></a> </div>

<div class="main_one"><a href="./?pageid=current_studentf"><img src="images/Student Detail/Cuttent Student.png" /></a> </div>

<div class="main_one"><a href="./?pageid=appoinment"><img src="images/apppp.png" /></a> </div>

<div class="main_one"><a href="./?pageid=placement"><img src="images/frontdesk/placement1.png" /></a> </div>

<div class="main_one"><a href="./?pageid=report"><img src="images/Student Detail/Report.png" /></a> </div>


</div>

<?php 
}
else if($_SESSION['userid']=='frontdesk')
{
?>

<div class="main_div">

<div class="main_one"><a href="./?pageid=current_studentfd"><img src="images/Student Detail/Cuttent Student.png" /></a> </div>


</div>

<?php 
}
else
{  
?>
<div class="main_div">

<div class="main_one">
<a href='<?php echo $var."fron_desk"; ?>'><img src="images/main/1.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."fee_home"; ?>'> <img src="images/main/2.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."student_home"; ?>'><img src="images/main/3.png" /></a>
</div>
<div class="main_one">
<a href='<?php echo $var."staff_home"; ?>'><img src="images/main/4.png" /></a>
</div>



</div>

<div class="main_div">

<div class="main_one">
<a href='<?php echo $var."setting_home"; ?>'><img src="images/main/5.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."att_home"; ?>'><img src="images/main/6.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."library_home"; ?>'><img src="images/main/7.png" /></a>
</div>
<div class="main_one">
<a href='<?php echo $var."transport_home"; ?>'><img src="images/main/8.png" /></a>
</div>



</div>

<div class="main_div">

<div class="main_one">
<a href='<?php echo $var."exam_home"; ?>'><img src="images/main/9.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."homeworkadd"; ?>'><img src="images/main/10.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."inventry_home"; ?>'><img src="images/main/11.png" /></a>
</div>

<?php /*?><div class="main_one">
<a href='<?php echo $var."hostel_home"; ?>'><img src="images/hostel.png" /></a>
</div><?php */?>
<div class="main_one">
<a href='<?php echo $var."calender_home"; ?>'><img src="images/main/12.png" /></a>
</div>



</div>

<div class="main_div">
<div class="main_one">
<a href='<?php echo $var."sent_message"; ?>'><img src="images/main/13.png" /></a>
</div>
<?php /*?><div class="main_one" style="background-color: rgb(82, 84, 99);">
<a href='<?php echo $var."time_home"; ?>'><img src="images/timetable.png" /></a>
</div><?php */?>
<div class="main_one" style="background-color:#006666">
<a href='<?php echo $var."get_pass_home"; ?>'><img src="images/main/14.png"  /></a>
</div>
<div class="main_one">
<a href='<?php echo $var."account_home"; ?>'><img src="images/main/15.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."topic"; ?>'><img src="images/td.png" /></a>
</div>

</div>


<div class="main_div">
<div class="main_one">
<a href='<?php echo $var."board_home"; ?>'><img src="images/BF.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."udise"; ?>'><img src="UDISE.png" /></a>
</div>

<div class="main_one">
<a href='<?php echo $var."view_complaint"; ?>'><img src="images/complaints.png" /></a>
</div>
</div>

<?php 
}  
?>

<br clear="all"/>
</div>

<br clear="all"/>
</div>


</div>
<br clear="all"/>