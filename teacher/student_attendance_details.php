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
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
<?php
if(isset($_POST['sentmessage']))
{
$date1=date("d-m-Y");
$month=date("M");

foreach($_POST['attendance'] as $k=>$f)
{

if($f=="absent")
{
 $search22=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and student='$k' and date='$date1' ");
if(mysqli_num_rows($search22)<1)
{
   
  $absent=mysqli_query($con,"insert into absentdetail(student,date,session,class,absent,month) values('$k','$date1','".$_SESSION['session']."','".$_POST['class']."','$f','$month')");
  
   $search22=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and student_id='$k' order by student_name Asc");
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





 if(isset($_POST['search1']))
				{
					  
				 $search=mysqli_query($con,"select * from student where student_scholar='".$_POST['scholarno1']."' and student_school='".$_SESSION['uid']."' and status='0' order by student_name Asc");
				 
			     $num=mysqli_num_rows($search);
				// $studrow=mysqli_fetch_array($search);
				
				}
			 ?>
 <?php
			    if(isset($_POST['search2']))
				{
				 $search=mysqli_query($con,"select * from student where student_id='".$_POST['studentid']."' and student_school='".$_SESSION['uid']."' order by student_name Asc");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_POST['search3']))
				{
				 $search=mysqli_query($con,"select * from student where student_name Like '".$_POST['studentname']."%' and student_school='".$_SESSION['uid']."' and status='0' order by student_name Asc");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_POST['search4']))
				{
				if($_POST['section']=="Select Section")
				{
				 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
				
				 		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				else
          				   {
			 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_section='".$_POST['section']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
				 		         $num=mysqli_num_rows($search);	   
	   
				   } }
				
				?>


 
<div class="full_div">
<br clear="all" />
<div class="left_sect">
<img src="images/Attemdance/attan.png" class="mback" />
<a href="./?pageid=home">
<img src="images/buttonGoBack.png" class="gback"/></a>
</div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">

<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Attendance Details</h2>
</div>

<div class="col_4">
						
		<?php
		   if((empty($_GET['tid'])))
		   {
		?>		
  <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
	<div class="box-head" style="width:1142px">
	<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."today_attendance_details"."&&divid=1";?>">Today Absents</a>| 
	<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."today_attendance_details"."&&divid=2";?>">Date & Class Wise</a>|
	<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."student_attendance_details"."&&divid=4"; ?>">Monthly Rep.</a>|
    <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."student_attendance_details"."&&divid=5"; ?>">Annual Rep.</a>
	</div>
              
       
		   <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:20px 0px 0px 5px; font-size:14px; width:200px">
          <tr>
          <td>Class<span class="textfieldRequiredMsg"></span></td>
           <?php
           $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		   ?>
            <td>
			
			<select name="class" class="select" style="width:125px" onchange="showSection(this.value)">
               <option value="-1">Select class</option>
             
		<?php
	    $cltech=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");
       
		while($clrow=mysqli_fetch_array($cltech))
		{
	    $result = mysqli_query($con,"SELECT * FROM class where class='".$clrow['class']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
		<option value="<?php echo $tier["class"];  ?>"><?php echo  $tier["class"].$tier["class_section"]; ?></option>
        <?php
		}
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
		   <td>Month</td>
		   <td>
            
            <select name="month1"  class="select">
                   <option value="-1">Select Month</option>
                   <option value="Jul">July</option>
                   <option value="Aug">August</option>
                   <option value="Sep">September</option>
                   <option value="Oct">October</option>
                   <option value="Nov">November</option>
                   <option value="Dec">December</option>
                   <option value="Jan">January</option>
                   <option value="feb">February</option>
                   <option value="Mar">March</option>
                   <option value="Apr">April</option>
                   <option value="May">May</option>
                   <option value="Jun">June</option>
                   
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
		    <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==5))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:20px 0px 0px 5px; font-size:14px; width:300px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showSection(this.value)">
               <option value="-1">Select class</option>
             
			<?php
	    $cltech=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");
       
		while($clrow=mysqli_fetch_array($cltech))
		{
	    $result = mysqli_query($con,"SELECT * FROM class where class='".$clrow['class']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
		<option value="<?php echo $tier["class"];  ?>"><?php echo  $tier["class"].$tier["class_section"]; ?></option>
        <?php
		}
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
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
		   </tr>  
			 <tr>
		     <td>&nbsp;</td>
			 <td>&nbsp;</td>
		   </tr>
			  <tr>
			<td>&nbsp;</td>
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		  
	 <div class="tabled" style="border:#33cc66 20px solid; margin-top:0px; min-height:630px;overflow:scroll">
           
		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://smarteducations.in/smarterp/citycentral/school/printstudent.php?class=<?php echo $_POST['class']."&sec=".$_POST['section'];  ?>')"></a>
         
		
		  <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
		 
	 <table width="100%" border="1" cellspacing="0" cellpadding="0">
		<tr style="font-weight:bold; font-size:12px;">
		<td colspan="8">Class : <?php echo $_POST['class']; ?>,&nbsp; Month : <?php echo $_POST['month1']; ?></td>
		</tr>
		<tr style="font-weight:bold;" align="center">
	    <td>Sr</td>
		<td>Student Name</td>
        <td>Working<br /> Days</td>
		<td>Total<br /> Absent</td>
		<td>Total <br />Present</td>
		<td>Total(%)</td>
      
                </tr>
       <?php
       $i=1;
	    if($num>0)
		{
	     while($studrow=mysqli_fetch_array($search))
		 {
	     ?>	
         <tr style="color:#335599;">
         <td><?php echo $i; ?></td>
	     <td><?php echo ucwords($studrow['student_name']);?></td>
	    

	     <input type="hidden" name="student" value="<?php echo $studrow['student_id'];?>">
	     <input type="hidden" name="class" value="<?php echo $studrow['student_class'];?>">
   
         <td align="center">
         <?php
         $search10=mysqli_query($con,"select * from month where session='".$_SESSION['session']."' and month='".$_POST['month1']."' and class='".$_POST['class']."'");
		 $studrow1=mysqli_fetch_array($search10);
		 $m = $studrow1['working_day'];
		 
         $event=mysqli_query($con,"select * from event_calendar where session='".$_SESSION['session']."' and month1='".$_POST['month1']."' ");
		 $evt= mysqli_num_rows($event);
         $td= $m-$evt;
         echo $td;
		
         ?>
         </td>
	     <td align="center">
	     <?php
	     $search22=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and student='".$studrow['student_id']."' and month='".$_POST['month1']."' ");
 
         $num= mysqli_num_rows($search22);
         echo $num;
	     ?>
	     </td>
	     <td align="center"><?php echo $p = $td-$num;  ?></td>
		 
		 <td align="center"><?php $re = $p*100/$td; echo substr($re, 0, 5);?></td>
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
	?>
	
	</table>
         </div>
      
          <?php
      }
    ?>	  
	   <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==5))
		   {
	   ?>
		 
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Namee</td>
		<td>Session</td>
		<td>Total Days</td>
		<td>Holiday</td>
		<td>Workink Day</td>
        <td>Total Absent</td>
		<td>Total Present</td>
		<td>Total %(percentage)</td>
        </tr>
       <?php
       $i=1;
	    if($num>0)
		{
	     while($studrow=mysqli_fetch_array($search))
		 {
	?>	
    <tr style="color:#335599">
    <td><?php echo $i; ?></td>
	<td><?php echo ucwords($studrow['student_name']);?></td>
	
	<td><?php echo $_POST['session'];   ?></td>
	<input type="hidden" name="student" value="<?php echo $studrow['student_id'];?>">
	<input type="hidden" name="class" value="<?php echo $studrow['student_class'];?>">
    <td>
    <?php       
	     $event=mysqli_query($con,"select * from event_calendar where session='".$_SESSION['session']."' and class='".$studrow['student_class']."' ");
		 $evt= mysqli_num_rows($event);
         $hd = $evt;
             
				$sdt = $studrow['doj'];
				$sed = $studrow['edate'];
	            $from=date_create(date($sed));
	            $to=date_create($sdt);
                $diff=date_diff($to,$from);
                $tt = $diff->format('%R%a')+1;
				echo $tt-0;
				 
	?>
    </td>
	<td><?php echo $hd; ?></td>
	<td><?php echo $twday = $tt-$hd; ?></td>
	<td>
	<?php
	$search22=mysqli_query($con,"select * from absentdetail where session='".$_POST['session']."' and student='".$studrow['student_id']."' ");
    $abs= mysqli_num_rows($search22);
    echo $abs;
    ?>
    </td>
	<td><?php echo $tpday = $twday-$abs;?></td>
	
	<td><?php $re = $tpday*100/$twday; echo substr($re, 0, 5);?></td>
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
	?>
	
	</table>
         </div>
      
          <?php
      }
    ?>	  
	  
	  <?php
	  }
	?>	
				  
<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>

  
