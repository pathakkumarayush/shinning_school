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
  
   $search22=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and student_id='$k'");
				 $rowstudent=mysqli_fetch_array($search22);	   
  
        $sub="Attendance Detail";	
    	$nmsg="Your child ".$rowstudent['student_name']." is absent Today";	
		
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
<div class="left_sect"><img src="images/Attemdance/attan.png" /><a href="./?pageid=att_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/attend.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Attendance</h2>
</div>

<div class="col_4">
<?php $day= date("D");
	if($day!="Sun")
	{
	$chkdate=date("Y-m-d");
	$event=mysqli_query($con,"select * from event_calendar where event_date='$chkdate'");
	$evtnum = mysqli_num_rows($event);
	if($evtnum<1)
	{?>

 <div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	"><?php echo date("d-m-Y");  ?></div>
     <?php
		   if((empty($_GET['tid'])))
		   {
		?>	
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:1127px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."student_attendance"."&&divid=1"; ?>">Search Student By Scholar Number</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_attendance"."&&divid=2"; ?>">Search Student By Id</a> ||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_attendance"."&&divid=3"; ?>">Search Student By Name</a>||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_attendance"."&&divid=4"; ?>">Search Student By Class</a>
						</div>
            <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Enter Scholar No</td>
              <td>&nbsp;</td>
			  <td><input type="text" name="scholarno1" class="tb5" style="width:120px"></td>
              <td>&nbsp;</td>
			  <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
        <br />
        </div>
        
          
          <table border="0" style="margin:10px 0px 0px 0px">
           <div style="border:#F00 0px solid; width:300px; margin-left:20px">
           <div id="txtHint"></div>
        </div>
        </tr>
		</table>
      <?php
		}
	   ?>
       
         <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
      

           <tr>
             <td>Student Id</td>
             <td><input type="text" name="studentid" class="tb5" style="width:110px"></td>
            
             <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		    <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table  style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
    

           <tr>
             <td>Name</td>
             <td><input type="text" name="studentname" class="tb5" style="width:210px"></td>
            <td>&nbsp;</td>
             <td><input type="submit" name="search3" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		   <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
			  
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		  
		   <div class="table" style="border:#33cc66 20px solid; height:480px; width:1107px;overflow:scroll">
            <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://smarteducations.in/smarterp/citycentral/school/printstudent.php?class=<?php echo $_POST['class']."&sec=".$_POST['section'];  ?>')"></a>
         
		 <?php
		 }
		 ?>
		 
		   <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Name</td>
		<td>Class</td>
        <td>Present</td>
		 <td>Absent</td>
		
      
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
	<input type="hidden" name="student" value="<?php echo $studrow['student_id'];?>">
	<td><input type="text" name="class" value="<?php echo $studrow['student_class'];?>"></td>
    <td><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="prersent" checked="checked"></td>
	<td><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="absent" ></td>
    </tr>
    <?php
     $i++;
	 }
	 ?>
	 <tr>
	  <td><input type="submit" name="sentmessage" value="Send Message">
	 </td></tr>
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
      
                 
                   </form>	
		    <?php
      }
	  else
	     {

       $student=mysqli_query($con,"select * from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='1'");
  

   ?>
   
   
   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
 
            <div class="box-head" style="width:950px; margin-top:20px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="#">Tc Student</a>
						</div>
            <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
         

            <tr>
              <td>Enter Scholar No</td>
              <td>&nbsp;</td>
			  <td><input type="text" name="scholarno1" class="tb5" style="width:120px"></td>
              <td>&nbsp;</td>
			  <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
        <br />
        </div>
        
          
          <table border="0" style="margin:10px 0px 0px 0px">
           <div style="border:#F00 0px solid; width:300px; margin-left:20px">
           <div id="txtHint"></div>
        </div>
        </tr>
		</table>
      <?php
		}
	   ?>
       
         <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
      

           <tr>
             <td>Student Id</td>
             <td><input type="text" name="studentid" class="tb5" style="width:110px"></td>
            
             <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		    <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table  style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
    

           <tr>
             <td>Name</td>
             <td><input type="text" name="studentname" class="tb5" style="width:210px"></td>
            <td>&nbsp;</td>
             <td><input type="submit" name="search3" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		   <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
     

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
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
			  <td><div id="txtHint1"></div></td>
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; width:930px;overflow:scroll">
               
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Name</td>
		<td>Class</td>
        <td>Present</td>
		<td>Absent</td>
		
      
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
	
	<td><input type="text" name="class" value="<?php echo $studrow['student_class'];?>"></td>
	
   <td><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="prersent" checked="checked"></td>
	<td><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="absent" ></td>   
	 
        </tr>
    <?php
     $i++;
	 }
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
      
                 
                   </form>
				   
 <?php
    }
   ?>			   
	<?php
				}
				 else
				   {
				   ?>
				    <div class="success" style="width:250px; height:10px; border-radius:5px" ><b><?php echo "Sorry Today is Holiday";   ?></b></div>
				   <?php
				   }
				}
				else
				 {
				 ?>
				     <div class="success" style="width:250px; height:10px; border-radius:5px" ><b><?php echo "Sorry Today is Sunday";   ?></b></div>
				 <?php
				 }
				 
			
				    ?>
					  
				<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
