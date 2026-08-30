<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}


.form-style-2-heading{
    font-weight: bold;
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
input[type="email"]:focus,
input[type="email"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	font-weight:bold;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Absent This Student")) { 
        return false;
    }
    }
</script> 

<script type="text/javascript">
function confirmationn() 
{ 
    if(!confirm("Do You Want To Present This Student")) { 
        return false;
    }
    }
</script> 

<?php
if(isset($_REQUEST['sentmessage']))
{
$date1=date("d-m-Y");
$month=date("M");

foreach($_REQUEST['attendance'] as $k=>$f)
{

if($f=="absent")
{
 $search22=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and student='$k' and date='$date1' ");
if(mysqli_num_rows($search22)<1)
{
   
  $absent=mysqli_query($con,"insert into absentdetail(student,date,session,class,absent,month) values('$k','$date1','".$_SESSION['session']."','".$_REQUEST['class']."','$f','$month')");
  
   $search22=mysqli_query($con,"select * from student where student_class='".$_REQUEST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and student_id='$k' order by student_name Asc");
				 $rowstudent=mysqli_fetch_array($search22);	   
  
   $sub="Attendance Detail";	
    	$nmsg="Your child ".$rowstudent['student_name']." is absent Today.";	
		
		$session=$_SESSION['session'];
		$page=1;
		$r=sms($_SESSION["uid"],$k,$sub,$nmsg,'Yes',$session,$page);
}
}
}
}

?>

<?php
  if(!empty($_GET['did']))
  {
   
  // $query=mysqli_query($con,"delete from student where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	 
$d=date("Y-m-d");
$query=mysqli_query($con,"update student set status='1',tcdate='$d' where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	 



    }
?>
 <?php
  $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='0'");
  
  $maxrow=mysqli_fetch_array($maxid);
		$rowmax=mysqli_fetch_array($maxid);


$maxid2=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='1'");
  $maxrow2=mysqli_fetch_array($maxid2);





 if(isset($_REQUEST['search1']))
				{
					  
				 $search=mysqli_query($con,"select * from student where student_scholar='".$_REQUEST['scholarno1']."' and student_school='".$_SESSION['uid']."' and status='0' order by student_name Asc");
				 
			     $num=mysqli_num_rows($search);
				// $studrow=mysqli_fetch_array($search);
				
				}
			 ?>
 <?php
			    if(isset($_REQUEST['search2']))
				{
				 $search=mysqli_query($con,"select * from student where student_id='".$_REQUEST['studentid']."' and student_school='".$_SESSION['uid']."' order by student_name Asc");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_REQUEST['search3']))
				{
				 $search=mysqli_query($con,"select * from student where student_name Like '".$_REQUEST['studentname']."%' and student_school='".$_SESSION['uid']."' and status='0' order by student_name Asc");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_REQUEST['search4']))
				{
				if($_REQUEST['section']=="Select Section")
				{
				 $search=mysqli_query($con,"select * from student where student_class='".$_REQUEST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
				
				 		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				else
          				   {
			 $search=mysqli_query($con,"select * from student where student_class='".$_REQUEST['class']."' and student_section='".$_REQUEST['section']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
				 		         $num=mysqli_num_rows($search);	   
	   
				   } }
				
				?>


 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Attemdance/attan.png" /><a href="./?pageid=att_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/attend.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Attendance Details</h2>
</div>

<div class="col_4">
						
		<?php
		   if((empty($_GET['tid'])))
		   {
		?>		
  <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
		<div class="box-head" style="width:1142px">
		<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."today_attendance_details"."&&divid=1";?>">Today Absents</a>
		&nbsp; || &nbsp; 
			<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."today_attendance_details"."&&divid=2";?>">Date Wise</a>
		&nbsp; || &nbsp; 
		<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."month_attendance"."&&divid=4"; ?>">Monthly Report</a> 
	
						</div>
              
       
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:50px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showSection(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>" <?php if($_GET['class']==$rclass['class']) echo 'selected="selected"';?>  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
			  </tr>
			    <tr>
		     <td>&nbsp;</td>
			 <td>&nbsp;</td>
		   </tr>
			  <tr>
		   <td>Select Month</td>
		   <td>
            
            <select name="month1"  class="select">
                   <option value="-1">Select Month</option>
                   <option value="07" <?php if($_GET['month1']=='07') echo 'selected="selected"';?>>July</option>
                   <option value="08" <?php if($_GET['month1']=='08') echo 'selected="selected"';?>>August</option>
                   <option value="09" <?php if($_GET['month1']=='09') echo 'selected="selected"';?>>September</option>
                   <option value="10" <?php if($_GET['month1']=='10') echo 'selected="selected"';?>>October</option>
                   <option value="11" <?php if($_GET['month1']=='11') echo 'selected="selected"';?>>November</option>
                   <option value="12" <?php if($_GET['month1']=='12') echo 'selected="selected"';?>>December</option>
                   <option value="01" <?php if($_GET['month1']=='01') echo 'selected="selected"';?> >January</option>
                   <option value="02" <?php if($_GET['month1']=='02') echo 'selected="selected"';?>>February</option>
                   <option value="03" <?php if($_GET['month1']=='03') echo 'selected="selected"';?>>March</option>
                   <option value="04" <?php if($_GET['month1']=='04') echo 'selected="selected"';?>>April</option>
                   <option value="05" <?php if($_GET['month1']=='05') echo 'selected="selected"';?>>May</option>
                   <option value="06" <?php if($_GET['month1']=='06') echo 'selected="selected"';?>>June</option>
                   
               </select>             </td>
			 </tr>  
			 
			  <tr>
		     <td>&nbsp;</td>
			 <td>&nbsp;</td>
		   </tr>
			  <tr>
		   <td>Select Year</td>
		   <td>
            
            <select name="year"  class="select">
                   <option value="-1">Select Year</option>
                   <option value="2026" <?php if($_GET['year']=='2026') echo 'selected="selected"';?>>2026</option>
                   <option value="2027" <?php if($_GET['year']=='2027') echo 'selected="selected"';?>>2027</option>
                   
                   
               </select>             </td>
			 </tr>  
			 
			 <tr>
		     <td>&nbsp;</td>
			 <td>&nbsp;</td>
		   </tr>
			  <tr>
			<td>&nbsp;</td>
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table>
		<br>
        </div>
       <?php
		}
		?>
		 
		  
		   <div class="table" style="border:#33cc66 20px solid; margin-top:0px; min-height:230px;width:1122px;overflow:scroll">
           
		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://smarteducations.in/smarterp/citycentral/school/printstudent.php?class=<?php echo $_REQUEST['class']."&sec=".$_REQUEST['section'];  ?>')"></a>
         
		<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:15px;">
		
		<?php
		
		
	    if(!empty($_REQUEST['month1']) && !empty($_REQUEST['year']) )
		{
		
		$d = date("d");
		$m = date("m");
	    ?>
		
		
		<tr style="line-height:30px;font-weight:bold;"><td colspan="33" align="center">Monthly Attendance Report - Month - <?php echo $_REQUEST['month1'] ?>, &nbsp; Class - <?php echo $_REQUEST['class'] ?></td></tr>
		
		<tr style="font-weight:bold;line-height:25px;">
		<td>Sr</td>
		<td>Name</td>
		<?php $kal=1;
		while($kal<=cal_days_in_month(CAL_GREGORIAN,$_REQUEST['month1'],$_REQUEST['year']))
		{?>
		<td><?php echo $kal;?></td>
		<?php $kal++;}?>
		<!--<td>31</td>-->
		<!--<td>Total Absenr</td>-->
       </tr>
     
	    <?php
	
         $i=1;
	     if($num>0)
		 {
	     while($studrow=mysqli_fetch_array($search))
		 {
		 $day=1;
	     ?>	
         <tr style="color:#335599">
         <td><?php echo $i; ?></td>
	     <td><?php echo ucwords($studrow['student_name']);?></td>
		<?php while($day<=cal_days_in_month(CAL_GREGORIAN,$_REQUEST['month1'],$_REQUEST['year']))
		{
		if($day<10)
		{
		$c_date= '0'.$day.'-'.$_REQUEST['month1'].'-'.$_REQUEST['year'];
		}
		else
		{
		$c_date= $day.'-'.$_REQUEST['month1'].'-'.$_REQUEST['year'];
		}
		
		?>
	     <td> 
		 <?php
		 if($day<10)
		 {	
		
		 $event1=mysqli_query($con,"select * from event_calendar where session='".$_SESSION['session']."' and class='".$_REQUEST['class']."' and event_date='".$_REQUEST['year']."-".$_REQUEST['month1']."-0".$day."' ");
		$abs1=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and date='0".$day."-".$_REQUEST['month1']."-".$_REQUEST['year']."' and student='".$studrow['student_id']."' ");
		}
		else
		{$event1=mysqli_query($con,"select * from event_calendar where session='".$_SESSION['session']."' and class='".$_REQUEST['class']."' and event_date='".$_REQUEST['year']."-".$_REQUEST['month1']."-".$day."' ");
		$abs1=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and date='".$day."-".$_REQUEST['month1']."-".$_REQUEST['year']."' and student='".$studrow['student_id']."' ");
		}
		 // $evt1= mysqli_fetch_array($event1);
	     
		 $absrow1= mysqli_fetch_array($abs1);
		 //echo $absrow['absent'];
		 
		 if(!empty($evt1['event_date']))
		 {
		 ?>
		 <div class="tooltip">
		 <span style="color:#009966"> <?php  echo 'H'; ?> </span>
		 <span class="tooltiptext"><?php  echo $evt1['title']; ?></span>
		 </div>
		 <?php
		 }
		 else if(!empty($absrow1['absent']))
		 {
		
		 if($day<10)
		 {
		 ?>
		 <a href="actiond.php?sid=<?php echo $studrow["student_id"]."&da=0".$day.'-'.$_REQUEST['month1'].'-'.$_REQUEST['year']."&month=".$_REQUEST['month1']."&year=".$_REQUEST['year']."&student_class=".$studrow["student_class"]; ?> " style="text-decoration:none;" onClick="return confirmationn();">
	 	
		<?php
			}
			else
			{	 
			?>
		<a href="actiond.php?sid=<?php echo $studrow["student_id"]."&da=".$day.'-'.$_REQUEST['month1'].'-'.$_REQUEST['year']."&month=".$_REQUEST['month1']."&year=".$_REQUEST['year']."&student_class=".$studrow["student_class"]; ?> " style="text-decoration:none;" onClick="return confirmationn();">
	 	 
<?php
}
?>
<span style="color:#FF0000">  <?php echo 'A'; ?> </span>
		 </a>
		
		 <?php
		 }
		 else if($d < $day && $m == $_REQUEST['month1'])
		 {
		 ?>
		 <span style="color:#9900FF;"><?php echo 'N'; ?></span>
		 <?php
		 }
		 else if (strtotime($c_date) < strtotime($studrow["doj"]))
		 {
		 ?>
		 <span style="color:#9900FF;"><?php echo 'NA'; ?></span>
		 <?php 
		 }
		
		 else
		 {
		 
		 if($day<10)
		 {
		 ?>
		 <a href="actiona.php?sid=<?php echo $studrow["student_id"]."&class=".$studrow['student_class']."&ses=".$_SESSION['session']."&da=0".$day.'-'.$_REQUEST['month1'].'-'.$_REQUEST['year']."&month=".$_REQUEST['month1']."&year=".$_REQUEST['year']."&student_class=".$studrow["student_class"]; ?> " style="text-decoration:none;" onClick="return confirmation();">
		 	
			<?php
			}
			else
			{	 
			?>
			<a href="actiona.php?sid=<?php echo $studrow["student_id"]."&class=".$studrow['student_class']."&ses=".$_SESSION['session']."&da=".$day.'-'.$_REQUEST['month1'].'-'.$_REQUEST['year']."&month=".$_REQUEST['month1']."&year=".$_REQUEST['year']."&student_class=".$studrow["student_class"];?> " style="text-decoration:none;" onClick="return confirmation();">
<?php
}?>

		  <span style="color:#0033CC"> <?php echo 'P';  ?> </span>
		
		 </a>
		
		
		 <?php
		 }
		 ?>
		 </td>
		 <?php
	$day++;
        }
	
		 ?>
		 
		 
	     
		<?php /*?> <td>
	<?php
	$search22=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and month='".$_REQUEST['month1']."' and student='".$studrow['student_id']."' ");
 
  $num= mysqli_num_rows($search22);
 echo $num;
?>
</td><?php */?>
		
	     </tr>
         <?php
     $i++;
	 }
	 ?>
	 <tr>
	 </tr>
	 <?php
	}
	else
	{
	?>
	<tr>
	   <td><span style="color:#CC0000">No Record</span></td>
	</tr>
	<?php
	}
			
		}
        ?>	  
	 
	 
	   </table>
	   
	    
		
		
		
		
		
		
	  
			  
<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>

  
