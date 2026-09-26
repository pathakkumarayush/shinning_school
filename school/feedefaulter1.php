<?php
  if(isset($_POST["send"]))
  {
    foreach($_POST['due'] as $k=>$d)
	{
  
   $sub="Fee Due Message";
   $nmsg="Fee For the month ".$d." has been due please pay the amount as soon as possible.";	
	$session=$_SESSION['session'];
	$page=1;
	$r=sms($_SESSION["uid"],$k,$sub,$nmsg,'Yes',$session,$page);
	
	}
	
    
  }
?>

 <script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script language="javascript">
function checkAll()
{
if (myform.allbox.checked==true)
	for(i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=true;
	}
else
{
	for (i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=false;
	}
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
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Fee Defaulter</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a>>>Fee Defaulter</a>
                 <form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style="margin-top:20px; font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."feedefaulter"."&&divid=2"; ?>">Fee Defaulter By Class</a>
						</div>
         
       
         
        <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          
		  <br>
        </div>
        
        <?php
		 }
		 ?>
         <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
     
			  <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:115px" onchange="getinst(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
			    <td>Select Instalment</td>
				<td><div id="txtHint1"></div></td>
			 </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 
		   <tr>
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 ?>

		
		   <div class="table" style="border:#FFCCCC 20px solid; height:420px; margin:0px 0px 0px 0px; overflow:scroll">
                    
				   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_POST['session']; ?></h2>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td><input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/></td>
		<td>Student Id</td>
		<td>Scholar No</td>
		<td>Student Name</td>
        <td>Class</td>
        <td>Month</td>     
	    <td>Session</td>
		
       </tr>
       <?php
       
	$i=1;
	
				if(isset($_POST['search']))
	{
	  $class2=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_POST['class']."'");
				  
$rclass=mysqli_fetch_array($class2);
	
	  
			      $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and student_class='".$rclass['class']."' and status='0'");
				  
			   $num=mysqli_num_rows($search);
			
				
			    if($num>0)
				{
				 while($studrow=mysqli_fetch_array($search))
				 {
	              
				   // $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'   and student='".$studrow['student_id']."' and month='".$_POST['month1']."'");
				  $num4=0;
					$distinctmonth=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and instalment='".$_POST['instalment']."'");
			
					
					$num4=mysqli_num_rows($distinctmonth);
						
		 
		
			
			
			if(($numchk<1))
			{
				
	?>	
    <tr style="color:#335599">
    <td><input type="checkbox" name='formDoor[]' value="<?php echo $studrow['student_id']; ?>"  id='chk<?php echo $i; ?>' /></td>
	 <td><?php echo $studrow['student_id'];?></td>
	 <td><?php echo $studrow['student_scholar'];?></td>
    <td><?php  echo ucwords($studrow['student_name']);?></td>
	 <td><?php echo ucwords($studrow['student_class']);?></td>
	 <td><?php echo $_POST['month1']; ?></td>
	 <td><?php echo ucwords($studrow['student_session']);?></td>
        <input  type="hidden" name="due[<?php echo $studrow['student_id']; ?>]" value="<?php echo $_POST['month1']; ?>"  style="width:80px"  />
    </tr>
    <?php
    $i++;
	$num4="";
	$numchk="";
	 } 
	}
	}
	}
	
	else
	   {
	   ?>
      <td style="color:#990066"><?php echo "No Record"; ?></td>
	   <?php
	   }
	?>
	 <tr>
	       <td>&nbsp;</td>
	      <td>&nbsp;</td>
	     <td>&nbsp;</td>
	      <td>&nbsp;</td>
		   <td>&nbsp;</td>
		    <td>&nbsp;</td>
	     <td><input type="submit" name="send" value="Send Message"></td>
	  </tr>
	
	</table>
         </div>
      
                 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>