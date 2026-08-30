<script type="text/javascript">
function getval(val)
{
alert(val);
}
</script>
 <script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
function add(a)
{
b=document.getElementById("lf").value;
var c=parseInt(a)+parseInt(b);
document.getElementById("tamt").innerHTML=c
}
function concess()
{
b1=document.getElementById("tamt").innerHTML;

b2=document.getElementById("ca").value;
var c=parseInt(b1)-parseInt(b2);
document.getElementById("tamt").innerHTML=c
}
</script>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      //-->
</SCRIPT>
<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["amntdeposit"].value;
if (x==null || x=="")
  {
  alert("Amount Deposited must be filled out");
  return false;
  }
}
</script>
<?php

$_SESSION['curentmonth']= $_POST['month1']; 

if(isset($_POST['date']))
{
$curdate=$_POST['date'];
}
else
{
$curdate=date('d-m-Y');
}

$fine1=0;
 function dateDiff($startDate, $endDate)
{
// Parse dates for conversion
$startArry = date_parse($startDate);
$endArry = date_parse($endDate);

// Convert dates to Julian Days
$start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]);
$end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]);

// Return difference
return round(($end_date - $start_date), 0);
}
session_start();
if(!empty($_SESSION['sumsg']))
{
  unset($_SESSION['sumsg']);
}

			    if(isset($_POST['search1']))
				{
				   if((empty($_POST['scholarno1'])) || ($_POST['month1']=="-1"))
				   {
				     $err="Field  marked with * are mandatory";
				   }
				
				  if(empty($err))
				  {	  
				 $search1=mysqli_query($con,"select * from student where student_scholar='".$_POST['scholarno1']."' and student_session='".$_SESSION['session']."'  and student_school='".$_SESSION['uid']."'");
			    $num1= mysqli_num_rows($search1);
				 $studrow=mysqli_fetch_array($search1);
			   
			     $_SESSION['studentid']=$studrow['student_id'];
				 
								  $shk=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and instalment='".$_POST['instalment']."'");
								  $numchk=mysqli_num_rows($shk); 		
		}
			}
			 
			 
			   if(isset($_POST['search7']))
				{
				
				    if($_POST['month1']=="-1")
				   {
				     $err="Field  marked with * are mandatory";
				   }
				  
				
				  if(empty($err))
				  {	  
				 $search1=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."'  and student_school='".$_SESSION['uid']."'");
			     $num1= mysqli_num_rows($search1);
				 $studrow=mysqli_fetch_array($search1);
				  
				 $_SESSION['studentid']=$studrow['student_id'];
				 
								  $shk=mysqli_query($con,"select * from fee_detail where student='".$_POST['stdid']."' and instalment='".$_POST['instalment']."'");
								  $numchk=mysqli_num_rows($shk); 
	
			 
			 }
			 }
			 ?>
			 
			 
			 
 <?php
			    if(isset($_POST['search2']))
				{
				
				   if((empty($_POST['studentid'])) || ($_POST['month1']=="-1"))
				   {
				     $err="Field  marked with * are mandatory";
				   }
				
				if(empty($err))
				{
				
				 $search1=mysqli_query($con,"select * from student where student_id='".$_POST['studentid']."' and student_session='".$_SESSION['session']."'  and student_school='".$_SESSION['uid']."'");
				
				 $num1= mysqli_num_rows($search1);
			     $studrow=mysqli_fetch_array($search1);
				  $_SESSION['month1']=$_POST['month1'];
				 $_SESSION['studentid']=$studrow['student_id'];
				 $shk=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and instalment='".$_POST['instalment']."'");
				  $numchk=mysqli_num_rows($shk); 
				  
	      
		
     }
	 }
			
            
   if(isset($_POST['pay']))
   {
      
	
	 if((!empty($_POST['latefee1']))|| (!empty($_POST['concession'])) )
	  {
	  
	    $_POST['amt']=$_POST['amt']+$_POST['latefee1'];
	    $_POST['amt']=$_POST['amt']-$_POST['concession'];
	    //$_POST['amt']=$_POST['amt']-$_POST['amntdeposit'];
	  }
	  if($_POST['amntdeposit']<$_POST['amt'])
	  {
	    
		$due=$_POST['amt']-($_POST['amntdeposit']);
	  } 
	  $date=date("Y-m-d");
	  $rect=mysqli_query($con,"select max(receiptno) from fee_detail where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	  $fetchrec=mysqli_fetch_array($rect);
	  $receipt=$fetchrec['max(receiptno)']+1;
	  $_POST['latefee1'] = $_POST['latefee1']+$_POST['arrears'];
   $date=date("Y-m-d",strtotime($_POST['curdate5']));    
   $_POST['montha']=$_SESSION['month1'];
     if($_POST['amntdeposit']>$_POST['amt'])
	  {
	    $extra=$_POST['amntdeposit']-$_POST['amt'];
	  }
	   $m=date("M");
$acd="Academic Fee";
$query=mysqli_query($con,"insert into fee_detail(session,class,tamnt,due,fee_deposit,date,student,month,latefee,concession,school,receiptno,current_month,remark,extra_amnt,feetype,instalment) values('".$_SESSION['session']."','".$_POST['class']."','".$_POST['amt']."','$due','".$_POST['amntdeposit']."','$date','".$_POST['student']."','".$_POST['month']."','".$_POST['latefee1']."','".$_POST['concession']."','".$_SESSION['uid']."','$receipt','$m','".$_POST['remarks']."','$extra','$acd','".$_POST['instalment']."')");
   $insertid2=mysqli_insert_id();
	  $amnt= $_POST['amntdeposit'];     


 $checkhdr=mysqli_query($con,"select * from fee_structure where class='".$_POST['class']."' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
 
 
 while($rowchk=mysqli_fetch_array($checkhdr))
 {
  // echo $rowchk['structure'];
  
  $explode=explode(",",$rowchk['structure']);
  
   foreach($explode as $et)
   {
    list($header, $val) = split('[=]', $et);
	  $check=mysqli_query($con,"select * from fee_memo where label_name='$header' and  session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and feetype='".$_POST['month']."'");
	  
	  
 

			  if(mysqli_num_rows($check)>0)
			 {
	  $lb2= str_replace(' ', '_', $header);
	  
    
   $sum=$amnt-$val;
   $amnt=$sum;
   if($sum>0)
   {
 
   $updhed=mysqli_query($con,"update fee_detail set $lb2='$val' where id='$insertid' ");
    
   }
  }
  }    
 
 }






	 
	 if(!empty($_POST['cautionfee']))
{

$student=mysqli_query($con,"select * from student where student_id='".$_POST['student']."' and student_session='".$_SESSION['session']."'");
$caustd=mysqli_fetch_array($student);
$caustd['cautionmoney']=$caustd['cautionmoney']+$_POST['totalcautionfee'];


$update=mysqli_query($con,"update student set cautionmoney='".$caustd['cautionmoney']."' where student_id='".$_POST['student']."' and student_school='".$_SESSION['uid']."'");

$stdcautionrec=mysqli_query($con,"insert into studentcaution(student,class,fee,date,session,totaamnt) values('".$_POST['student']."','".$caustd['student_class']."','".$_POST['cautionfee']."','$date','".$_SESSION['session']."','".$_POST['totalcautionfee']."')");
}

	 
	 
	 
	  $insertid=mysqli_insert_id();
	     if(!empty($_POST['admissionfee']))
	    {
		   $update=mysqli_query($con,"update student set addmisionfee='No' where student_id='".$_POST['student']."' and student_school='".$_SESSION['uid']."'");
		  $update=mysqli_query($con,"update fee_detail set admissionfee='Yes' where id='$insertid' and school='".$_SESSION['uid']."'");
		} 
		$sub="Fee Paid";	
    	$nmsg="Thanks for Paying Fee For the month ".$_POST['montha'].". Received amount".$_POST['amntdeposit'];	
		
		$session=$_SESSION['session'];
		$page=1;
		$r=sms($_SESSION["uid"],$_POST['student'],$sub,$nmsg,'Yes',$session,$page);

		
		 $msg="fee Paid Successfully"; 
	  }
	  
	?>


<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>
<div id="container">
 
	<div class="shell"  >
		<div id="main"  >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Submit Fee</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="?pageid=fee_managementhome">Fee</a> >>Submit Fee</a>
             <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return validateForm()" >
    <?php
	          if(!empty($error_msg))
			{
			 require_once("add_stud.php");?>
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php failure_message($error_msg,"","100%","none");?></div>
			 <?php  
			 } 
             if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
						<?php  } ?>
     
     
        <br>
          <div class="box-head">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."add_fee"."&&divid=1"; ?>">Search Student By Scholar Number</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."add_fee"."&&divid=2"; ?>">Search Student By Id</a> &nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."add_fee"."&&divid=3"; ?>">Search Student By Class</a>
						</div>
         
           
		   <?php
		    if(!isset($_POST['visible']))
			{
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px">
                <tr>
              <td>Enter Scholar No <span style="color:#FF0000">*</span></td>
              <td><input type="text" name="scholarno1" class="tb5" style="width:110px"></td>
              <td>&nbsp;</td>   
          </tr>
		  <tr>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		  </tr>
		
		     <tr>
			    <td>Instalment</td>
				<?php
				  $class2=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_SESSION['student_class']."'");
				  
$rclass=mysqli_fetch_array($class2);
				$selrc=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$rclass['class']."'");
              $rowselrec=mysqli_fetch_array($selrc);
				?>
				
				<td> 
				  <select name="instalment">
				  <?php
				     for($i=1;$i<=$rowselrec['no_of_inst'];$i++)
					 {
				  ?>
				  <option value="Instalment<?php echo $i;  ?>">Instalment<?php echo $i;  ?></option>
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
<td>Month</td>
<td><select name="month"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                      </select></td>

</tr>
            
           <tr>
                <td>&nbsp;</td>
                <td><input type="hidden" name="visible" value="0" ></td>
            </tr>
               
         <tr> 
		  <td>Date</td>
		  <td><input type="text" name="date" class="tb5" style="width:110px"> dd-mm-yyyy</td>
		  </tr>
		  
		  <tr>
		     <td>&nbsp;</td>
			  <td>&nbsp;</td>
			 
		  </tr>
		 
		  <tr>
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
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:390px">
         

           <tr>
             <td>Student Id <span style="color:#FF0000">*</span></td>
             <td><input type="text" name="studentid" class="tb5" style="width:110px"></td>
            
                
          </tr>
		   <tr>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
		  </tr>
		
		     <tr>
			    <td>Instalment</td>
				<?php
				  $class2=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_SESSION['student_class']."'");
				  
$rclass=mysqli_fetch_array($class2);
				$selrc=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$rclass['class']."'");
              $rowselrec=mysqli_fetch_array($selrc);
				?>
				
				<td> 
				  <select name="instalment">
				  <?php
				     for($i=1;$i<=$rowselrec['no_of_inst'];$i++)
					 {
				  ?>
				  <option value="Instalment<?php echo $i;  ?>">Instalment<?php echo $i;  ?></option>
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
<td>Mpnth</td>
<td><select name="month"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                      </select></td>

</tr>
            
           <tr>
                <td>&nbsp;</td>
                <td><input type="hidden" name="visible" value="0" ></td>
            </tr>
               
         <tr> 
		  <td>Date</td>
		  <td><input type="text" name="date" class="tb5" style="width:110px"> dd-mm-yyyy</td>
		  </tr>
		  
		  <tr>
		     <td>&nbsp;</td>
			  <td>&nbsp;</td>
			 
		  </tr>
		 
		  <tr>
		      <td>&nbsp;</td>
		      <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>
		  </tr>
        </table><br>
        </div>
        
        
     <?php
		 }
		 
		 ?>
		 
		  <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		   {
	   
	   
	   ?>
		<table style="margin:20px 0px 0px 0px">
		<tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showStudent(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>" <?php if($_SESSION['student_class']==$rclass['class_id']) { ?> selected="selected" <?php } ?> ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
			  <td>Student Name</td> 
			  <td><select name="stdid" class="select" style="width:125px" onchange="showStudent3(this.value)">
<option>Select Student</option>
<?php
$class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_SESSION['student_class']."'");
$rclass=mysqli_fetch_array($class);
 $search=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_class='".$rclass['class']."' order by student_name Asc");
  
  
  
  while($row=mysqli_fetch_array($search))
  {
  ?>
  <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name']; ?></option>  
  <?php
  }
?>

</select></td>
              </tr>
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			   <tr>
			    <td>Instalment</td>
				<?php
				  $class2=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_SESSION['student_class']."'");
				  
$rclass=mysqli_fetch_array($class2);
				$selrc=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$rclass['class']."'");
              $rowselrec=mysqli_fetch_array($selrc);
				?>
				
				<td> 
				  <select name="instalment">
				  <?php
				     for($i=1;$i<=$rowselrec['no_of_inst'];$i++)
					 {
				  ?>
				  <option value="Instalment<?php echo $i;  ?>">Instalment<?php echo $i;  ?></option>
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
<td>Mpnth</td>
<td><select name="month"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                      </select></td>

</tr>
			
			   <tr>
			    <td><input type="hidden" name="visible" value="0" ></td>
				<td>&nbsp;</td>
			 </tr>  
			 <tr> 
		  <td>Date</td>
		  <td><input type="text" name="date" class="tb5" style="width:110px"> dd-mm-yyyy</td>
		  </tr>
		  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			<tr>  
		   <td><input type="submit" name="search7" value="Submit" style="width:80px"></td>   
		  </tr>
		  </table>
		<?php
		 }
		 }
		?> 
		 
		           
            <?php
                //$student=mysqli_query($con,"select * from student where class='".$studrow['student_class']."' and session='".$_SESSION['cursession']."'");
			  if($numchk<1)
			  {
			  if($num1>0)
			  {
			 ?>
		 <table style="margin:20px 0px 0px 100px; font-size:14px" width="600">
            
            <tr>
               <td>Name:</td>
               <td><?php echo ucwords($studrow['student_name']); ?></td>
               <td>&nbsp;</td> 
               <td>Class:</td>
               <td><?php echo $studrow['student_class']; ?></td>
           </tr>
          
           <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
           </tr>
           <tr>
               <td>Date:</td>
               <td><?php echo $curdate; ?></td>
                <td><input type="hidden" name="curdate5" value="<?php  echo $curdate; ?>"></td> 
                <td>Session:</td>
                <td><?php echo $_SESSION['session']; ?></td>
            </tr>
			   <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
           </tr>
             <tr>
			  <td>Recept No</td>
			   <td>
			      <?php
				     $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
				     $rowid=mysqli_fetch_array($maxid);
				     echo $rowid['max(id)']+1; 
				  ?>
			   </td>
			   <td>&nbsp;</td>
			    <td>Month</td>
			   <td><?php echo $_POST['month'];   ?> </td>
			 </tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 <tr>
			    <td>Instalment</td>
			   <td><?php echo $_POST['instalment'];   ?></td> 
			 </tr>
        </table>
         <div id="txtHint1">
         
			 	 <div class="table" style="border:#FF0000 0px solid; height:auto; margin:30px 0px 0px 100px">
    
		
		
			   <table width="60%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
					<?php		
							  
						 	$class4=mysqli_query($con,"select * from instalment where class='".$studrow['student_class']."' and instalment='".$_POST['instalment']."'");
					 
					$rclass2=mysqli_fetch_array($class4);
					
					 $class5=mysqli_query($con,"select * from instalment where  class='".$studrow['student_class']."' and id<'".$rclass2['id']."'");
					
					
					$inst=array();
					if(mysqli_num_rows($class5)>0)
					{
					while($r_inst4=mysqli_fetch_array($class5))
					{
					   $shk=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and instalment='".$r_inst4['instalment']."'");
					   
					   
						if(mysqli_num_rows($shk)<1)
						{	
						
					      $b=array_push($inst,$r_inst4['instalment']);
					    }
						
					}
					  $b=array_push($inst,$_POST['instalment']);  
					}
					else
					{
					  $b=array_push($inst,$_POST['instalment']);
					}
					
				  $extahead=mysqli_query($con,"select * from  fee_memo where session='".$_SESSION['session']."' and feetype='".$_POST['month']."' ");
				 
				
					foreach($inst as $m)
					{ 
					   
					?>
							 <tr>
							  <td colspan="3"><b>Fee For  <?php echo $m; ?></b></td>
							 </tr>
								<tr style="font-weight:bold">
								<td>Sr.No</td>
								<td>Particulars</td>
								<td>Amount(Rs)</td>
								</tr>
			   <?php
			  
					 
				
				 $i=1;
				$selrc=mysqli_query($con,"select * from instdetail where class='".$studrow['student_class']."' and session='".$_SESSION['session']."' and inst_type='$m' ");
				
		    	$numrow=mysqli_num_rows($selrc); 
				$rowselrec=mysqli_fetch_array($selrc);
											?>
	                             <tr>
								 <td><?php echo $i;   ?></td>
								 <td>Instalment</td>
								 <td><?php echo $rowselrec['amnt'];    
								     $val1+=$rowselrec['amnt'];
								 
								 ?></td>
								 </tr>   
								 <?php
								   while($rowextahed=mysqli_fetch_array($extahead))
								   {
								 ?>
								 
								 <tr> 
								    <td><?php echo $i+1;   ?></td>
									
									      <?php
										       $extahead=mysqli_query($con,"select * from  fee_structure where session='".$_SESSION['session']."' and class='".$studrow['student_class']."' ");
								    $extrastructure=mysqli_fetch_array($extahead);   
									   
		    $a=explode(",",$extrastructure['structure']);
		    foreach($a as $v)
		   {
		     
			              list($header, $val) = split('[=]', $v);
			              if($rowextahed['label_name']==$header)
						  {
						  ?>
						    <td><?php echo ucwords($header);   ?></td>
						    <td> <?php echo $val;   ?> </td>
						  <?php
						    $val1+=$val;
						  } 						 
									 
			}		
 ?>
									  
								
								 </tr>
								 <?php
								 }
								 ?>
								
								<?php
									if($studrow['addmisionfee']=="Yes")
									   {
										 $admissionfee=mysqli_query($con,"select * from admission where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$studrow['student_class']."'");
										 
									  $rowadmission=mysqli_fetch_array($admissionfee);   
									$adm="Admission Fee";
									$adm=mysqli_query($con,"select * from transportsetting where feename='$adm'");
                                     $admrow=mysqli_fetch_array($adm);
									 if($admrow['setting']!="No Fee")
									{
								 ?>
									<tr>
								  <td><?php echo $j+2;; ?></td>	
								 <td>Admission Fee</td>
								  <td><?php echo $rowadmission['fee']; ?></td></tr>
								  <input type="hidden" name="admissionfee" value="Yes">
									<?php
									   $val1+=$rowadmission['fee'];
									   $j=$j+1;
									   }
								       }
								   ?>
								   
								
							
							<?php
							if($rowcom['combinemonth']!=$m)
							{
							?>	
							  
							 <?php
							 
								 $fine1+=$fine;
								 if($fine1>0)
								  {
								  $_SESSION['fine']=$fine1;
								 }
								 else
									{
									  $_SESSION['fine']="";
									}
								 
								 
								 } }
								 ?>
								 
								   <?php
								  
						   $caution=mysqli_query($con,"select * from cautionfee where class='".$studrow['student_class']."' and session='".$_SESSION['session']."'");
									
							
								$r_caution=mysqli_fetch_array($caution);	
								
								$studentchk=mysqli_query($con,"select * from student where student_id='".$studrow['student_id']."' and student_session='".$_SESSION['session']."'");
						
								$row_cstudent=mysqli_fetch_array($studentchk);
                               
							    $caution=$r_caution['fee']-$row_cstudent['cautionmoney'];
							 
							    if($caution>0)
							  {
								
							?>
							    <tr>	
								  <td><?php echo $j+2; ?></td>		
								  <td>Caution Money</td>
								  <td><?php echo $caution; 
		                              $val1+=$caution;						  
								   ?>
								  	  <input type="hidden" name="cautionfee" value="<?php echo  $caution; ?>">
							      <input type="hidden" name="totalcautionfee" value="<?php echo  $r_caution['fee']; ?>">								  </td></tr>
								</tr>
								 <?php
								 }
								 ?>
						
								 
								 
								 
								<tr>
									<td>&nbsp;</td>
									<td><b>Total Arrears Fine(Rs)</b></td>
									<td><?php echo $fine1; ?></td>
									<input type="hidden" name="arrears" value="<?php echo $fine1; ?>">
									</tr>
								
								<tr>
									<td>&nbsp;</td>
									<td><b>Previous Due(Rs)</b></td>
									<td><b><?php   $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' order by id desc limit 1"); 
									 $duerow=mysqli_fetch_array($search1);
									 echo $duerow['due']; 
									?></b></td>
									<td></td>
								</tr>	
								<input type="hidden" name="instalment" value="<?php echo $_POST['instalment'];   ?>">		
								<tr>
									<td><?php //echo $j+2; ?></td>
									<td><b>Other Fee(Rs)</b></td>
									<td><b>
									  <input type="text" id="lf" name="latefee1" class="tb5" style="width:100px" onkeypress="return isNumberKey(event)" />
									</b></td>
									<td><input type="button" name="latefee" onclick="add('<?php echo $val1+$duerow['due']+$_SESSION['fine']; ?>')" value="Add"   /></td>
							      <td><input type="hidden" name="currentsession" value="<?php echo $_SESSION['curentmonth']; ?>"></td>
								</tr>
										<tr>
									<td><?php //echo $j+3; ?></td>
									<td><b>Concession Amount(Rs)</b></td>
									<td><b><input type="text" name="concession" id="ca" class="tb5" style="width:100px" onKeyPress="return isNumberKey(event)" />	</b></td>
									<td><input type="button" name="latefee" onclick="concess()" value="Add"   /></td> 
								</tr>		
	                        <tr>
									<td>&nbsp;</td>
									<td><b>Total Amount(Rs)</b></td>
									<td><div><?php echo $val1+$duerow['due']+$fine1; ?></div></td>				
	                                 </tr>     
							    <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>">
								<input type="hidden" name="class" value="<?php echo $studrow['student_class']; ?>">
								<input type="hidden" name="month" value="<?php echo $_POST['month']; ?>">
								<input type="hidden" name="amt" value="<?php echo $val1+$duerow['due']+$_SESSION['fine']; ?>">
								
								<?php
								   if($duerow['extra_amnt']>0)
								   {
								?>
								<tr>
									<td>&nbsp;</td>
									<td><b>Amount In Advance(Rs)</b></td>
									<td><b>
									<?php
								
									$val1=$val1-$duerow['extra_amnt'];
									echo $duerow['extra_amnt']; 
									?></b></td>
									<td></td>
								</tr>
								<?php
								  }
								?>		
                            
							<tr>
									<td>&nbsp;</td>
									<td><b>Amount To Pay(Rs)</b></td>
									<td><div id="tamt"><?php echo $val1+$duerow['due']+$fine1; ?></div></td>
								 
								
								</tr>
	
								<tr>
									<td>  <input type="hidden" name="montha" value="<?php  if(!empty($imp)) { echo $imp.",".$_SESSION['month1']; }
									 else if(!empty($rowcom['combinemonth']))
							   {
								 echo $_SESSION['month1'].",".$rowcom['combinemonth'];
							   }
									
									else
									   {
										 echo $_SESSION['month1'];
									   }
									 ?>" /></td>
									<td><b>Amount Deposited</b> <span style="color:#FF0000">*</span></td>
									<td><input type="text" name="amntdeposit" class="tb5" style="width:100px" onKeyPress="return isNumberKey(event)"></td>
								</tr>
								
								<tr>
								  <td></td> 
								  <td><b>Remarks <br>&nbsp;<br>&nbsp;</td>
									<td><textarea name="remarks" cols="20" rows="3"></textarea></td>
								</tr>
								
														
								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" name="pay"  style="width:100px" value="Pay Fee"></td>
								</tr>
								</table>
							
			</div>
    </div>
     <?php
	 }
	 ?>
        <div>
		<?php
		   if(!empty($insertid2))
		   {
		?>
		<td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('http://localhost/manorama/school/getreceipt.php?id=<?php echo $_SESSION['studentid']; ?>')"><input type="button" value="Genrate Receipt " style="width:200px; margin-left:0px; margin-top:15px" ></a></td>
		<?php
		   
		   }
		?>
		</div>
		<?php
		   $shkstd=mysqli_query($con,"select * from fee_detail where student='".$_POST['stdid']."'  and session='".$_SESSION['session']."'");
		   if(mysqli_num_rows($shkstd)>0)
				  {
				  while($row=mysqli_fetch_array($shkstd))
				  {
		?>
		<div style="border:#CCCCCC 2px solid; margin:40px 0px 0px 0px; height:120px; width:900px;overflow:scroll;">
		
		   
				  <div style="width:auto; height:auto; border:#CCCCCC 2px solid; margin:20px 0px 0px 20px; float:left">
				  <span style="color:#990066; font-size:18px; margin-left:50px"><?php echo ucwords($row['instalment']); ?></span><br><br>
				  
		          <span style=" color:#990066;font-size:18px; background-color:#00FF00">Paid:<?php echo $row['fee_deposit']; ?></span>&nbsp;<span style="color:#FFFFFF;font-size:18px; background-color:#FF0000">Due:<?php echo $row['due']; ?></span>
				  </div> 
				
		</div>
		  <?php
				    }
					
					?>
		<?php
		  }
		  }
		  else
		     {
			 ?>
			   <span style="color:#FF0000; font-size:18px"><?php  echo "This Instalment Already Paid"; ?></span>
			 <?php
			 }
			 
		?>
    </form>
                    <!-- Box Head -->
					
					<!-- End Box Head -->	

					<!-- Table -->
					
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<?php
  if($num1>0)
{
  $c= count($montharray);
if($c>1)
{
?>

<div style="height:850px"></div>
<?php
}
else
{
?>
<div style="height:850px"></div>
<?php
}
}
else
  {
  ?>
  <div style="height:180px"></div>
  <?php
  }
?>
