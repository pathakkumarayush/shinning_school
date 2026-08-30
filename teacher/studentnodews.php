 <script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>

<?php
if(isset($_POST["submit"]))
{
        $cvar=1;
            $prev=mysqli_query($con,"select * from month where month='".$_POST['month1']."'");	 
		    $rowprev=mysqli_fetch_array($prev);	 
			$prev2=mysqli_query($con,"select * from month where id<'".$rowprev['id']."' order by id desc limit 1");
			
			$rowprevmonth=mysqli_fetch_array($prev2);
				$search=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' ");
			      				  
				 $studrow=mysqli_fetch_array($search);
				 
                 			
				$combinemonth=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and month='".$rowprevmonth['month']."' or combinemonth='".$rowprevmonth['month']."' and class='".$studrow['student_class']."'");
	
	
				
if(mysqli_num_rows($combinemonth)>0)
{
$rowcobinemonth=mysqli_fetch_array($combinemonth);
$rowprevmonth['month']=$rowcobinemonth['month'].",".$rowcobinemonth['combinemonth'];

				
}			
			$distinctmonth=mysqli_query($con,"select * from fee_detail where student='".$_POST['stdid']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and month='".$rowprevmonth['month']."' ");
					
			$var2=0;
			if(mysqli_num_rows($distinctmonth)>0)
			{
			  $var2=1;
			$rowdistinctmonth=mysqli_fetch_array($distinctmonth);
			  if($rowdistinctmonth['due']>0)
			  {
			    $var2=0;
			    $msg="Student not Eligible for No Dues";
			  }
             	
			}
			 else
			     {
				   $msg="Student not Eligible for No Dues";
				 
				 }   		
			
				/*
				$var2=array();
				while($rowprevmonth=mysqli_fetch_array($prev2))
			
			{
			     $ex5=array_push($var2,$rowprevmonth['month']);
			
			}
			
				 
    	$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail where student='".$_POST['stdid']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
		
			
		    $explode2=array();
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{
			  //$explode=explode(",",$rowdistinctmonth['month']);
		     $ex4=array_push($explode2,$rowdistinctmonth['month']);
			// $ex4=explode(",",$rowdistinctmonth['month']);
		   }
		    
			$var6=array_diff($var2,$explode2);
			 print_r($var6);
			/*
		         if(in_array($var2, $explode2)) 
				  {
				     
					 $numchk=1; 
					 break;
                  }
		          else
				    {
					   $numchk=0;
				    } */
			}	


?>

<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this class")) { 
        return false;
    }
    
} 
</script>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/nodues.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">No Dues</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="#">No Dues</a>
				 
            
	             <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <?php
		 
		 if( $cvar!=1)
		 {
   ?>
     <table cellspacing="10" style="margin-top:30px">
	<tr>
	  <td>Date:</td>
	  <td><?php echo date("d-m-Y");  ?></td>
	</tr>
	 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
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
              <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class']; ?></option>
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
			  <td><div id="txtHint1"></div></td>
              </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
<tr>
		<td>Month:</td>
		<td>  
		<select name="month1"  class="select">
                   <option value="-1">Select Month</option>
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
                                 </select> 
			</td>  
			</tr>
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
  <tr>
    <td>&nbsp;</td>
   <td><input type="submit" name="submit" value="submit" style="width:150px"></td>
</tr>
</table>
         <?php
		   }
		   else
		     {
			  if($var2==1)
			  {
			 ?>
			 <table style="margin-top:50px">
		<tr>
<td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/smarterp2/demo/school/nodues.php?id=<?php echo  $_POST['stdid']; ?>')"><input type="button" value="Genrate Receipt " style="width:160px; margin-left:100px" ></a></td>
</tr></table>
		<?php
		}
			 else
			    {
				?>
				  <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
				<?php
			     $search=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' ");
$studrow=mysqli_fetch_array($search);
				 $memo=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
				  $num=mysqli_num_rows($memo);
				
				?>
				<div class="table" style="border:#FFCCCC 20px solid; height:320px; overflow:scroll">
          
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr style="font-weight:bold">
	    <td>Sr</td>
	    <td>Scholar Number</td>
		<td>Name</td>
		<td>Class</td>
	    <td>Month</td>
        <td>Total fee</td>
		<td>Fee Paid</td>
		<td>Due</td>
		<td>Date</td>
        <td>Session</td>
		<td>View</td>
		
		
                </tr>
       <?php
       $i=1;
	    if($num>0)
		{
	    while($rowmemo=mysqli_fetch_array($memo))
		{
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo $_SESSION['schno'];?></td>
	<td><?php echo ucwords($studrow['student_name']);  ?></td>
	<td><?php echo $studrow['student_class'];  ?></td>
    <td><?php echo ucwords($rowmemo['month']);?></td>
    <td><?php echo $rowmemo['tamnt'];?></td>
    <td><?php echo $rowmemo['fee_deposit'];?></td>
	<td><?php echo $rowmemo['due'];?></td>
    <td><?php echo date("d-m-Y",strtotime($rowmemo['date']));?></td> 
	<td><?php echo $rowmemo['session'];?></td> 
	 <td><a href="<?php echo $var."ledgerdetail&id=".$rowmemo['id']; ?>">View</a></td>
	 
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
				<?php
				
				}
			 
			 
			 }
		  ?>
     					
				</div>
	</div>
					
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>