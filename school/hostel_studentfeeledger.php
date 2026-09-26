 <?php
 if(isset($_POST['search1']))
				{
				  $_SESSION['schno']=$_POST['scholarno1'];
				
				   if(!empty($_SESSION['schno']))
				   {
					$search=mysqli_query($con,"select * from student where student_scholar='".$_SESSION['schno']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and and hostel_status='".Active."' ");
			      
				 $studrow=mysqli_fetch_array($search);
				 $memo=mysqli_query($con,"select * from pay_hostel_fee where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
				  $num=mysqli_num_rows($memo);
			   }
			   }
			 ?>
 <?php
			    if(isset($_POST['search2']))
				{
				              $_SESSION['tid'] = $_POST['studentid'];
				   
				   if(!empty($_SESSION['tid']))
				   {
				 $search=mysqli_query($con,"select * from student where student_id='".$_SESSION['tid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']." and  hostel_status='".Active."''");
				
			   				 $studrow=mysqli_fetch_array($search);
				
				 $memo=mysqli_query($con,"select * from pay_hostel_fee where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
				  $num=mysqli_num_rows($memo);
				}
				}
				?>
				 <?php
 if(isset($_POST['search4']))
				{
				 // $_SESSION['schno']=$_POST['scholarno1'];
				
				   //if(!empty($_SESSION['schno']))
				   //{
					$search=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and hostel_status='".Active."' ");
			      
				 $studrow=mysqli_fetch_array($search);
				 $memo=mysqli_query($con,"select * from pay_hostel_fee where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
				
				  $num=mysqli_num_rows($memo);
			  // }
			   }
			 ?>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/hostel.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Student Hostel Fee Ledger</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=hostel_home">Hostel</a> >>Student Hostel Fee Ledger</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
                    <div class="box-head">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."hostel_studentfeeledger"."&&divid=1"; ?>">Search Student By Scholar Number</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."hostel_studentfeeledger"."&&divid=2"; ?>">Search Student By Id</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."hostel_studentfeeledger"."&&divid=3"; ?>">Search Student By Class</a>
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
              <td><input type="text" name="scholarno1"></td>
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
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		   {
	   ?>
		<table style="margin:20px 0px 0px 0px; font-size:16px" >
		<tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showStudent12(this.value)">
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
			  <td>Student Name</td> 
			  <td><div id="txtHint1"></div></td>
              </tr>
			    <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
	     <tr>  
		   <td><input type="submit" name="search4" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
		  </table>
		<?php
		 }
		?> 
		<br><br>
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; overflow:scroll">
          
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
   <td><?php echo $rowmemo['total_amnt'];?></td>
    <td><?php echo $rowmemo['deposited_amnt'];?></td>
	<td><?php echo $rowmemo['due'];?></td>
    <td><?php echo date("d-m-Y",strtotime($rowmemo['date_deposited']));?></td> 
	<td><?php echo $rowmemo['session'];?></td> 
	 	<td><a href="<?php echo $var."hostel_ledgerdetai&id=".$rowmemo['id']; ?>">View</a></td> 
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
<br><br><br><br><br><br><br><br><br><br><br><br>