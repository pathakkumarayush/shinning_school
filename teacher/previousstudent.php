<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this pstudent")) { 
        return false;
    }
    }
</script> 
<?php
  if(!empty($_GET['did']))
  {
   $query=mysqli_query($con,"delete from pstudent where pstudent_id='".$_GET['did']."' and pstudent_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	  }
?>
 <?php
  $maxid=mysqli_query($con,"select count(student_id) from pstudent where student_school='".$_SESSION["uid"]."' ");
  
  $maxrow=mysqli_fetch_array($maxid);
		     $rowmax=mysqli_fetch_array($maxid);
 if(isset($_POST['search1']))
				{
					  
				 $search=mysqli_query($con,"select * from pstudent where student_scholar='".$_POST['scholarno1']."' and student_school='".$_SESSION['uid']."' ");
			     $num=mysqli_num_rows($search);
				// $studrow=mysqli_fetch_array($search);
				
				}
			 ?>
 <?php
			    if(isset($_POST['search2']))
				{
				 $search=mysqli_query($con,"select * from pstudent where student_id='".$_POST['studentid']."' and student_school='".$_SESSION['uid']."'");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_POST['search3']))
				{
				 $search=mysqli_query($con,"select * from pstudent where student_name Like '".$_POST['studentname']."%' and student_school='".$_SESSION['uid']."'");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_POST['search4']))
				{
				 $search=mysqli_query($con,"select * from pstudent where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_POST['session']."'");
			
				 
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				
				
				 if(isset($_POST['search5']))
				{
				 $search=mysqli_query($con,"select * from pstudent where  student_school='".$_SESSION['uid']."' and  student_session='".$_POST['session']."'");
			
				 
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				
				?>
<div id="container">
 <div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				  <img src="css/images/studentdetail.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Previous Student Detail</span>
                 
                   <div style="border:#900 2px solid; margin-top:10px"></div>
                    <div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	">Total Student:<?php echo $maxrow['count(student_id)']; ?></div>
				    
	   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
    <?php
	          
			 if(!empty($_SESSION['sumsg']) && empty($err))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_SESSION['sumsg'];   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		
		          
        <table border="0" width="600" style="margin:20px 0px 0px 20px; font-size:18px">
            
            <tr>
            <td>Fee Fead Name<span>*</span></td>
            <td>
              <input type="text" name="t_name" class="tb5" style="width:250px"  id="txtname" />
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
              <tr>
            <td>Fee Type<span>*</span></td>
            <td>
              <select name="feetype" style="width:250px; height:25px" class="select">
               <option value="-1">Feetype</option>
               <option value="Monthly">Monthly</option>
               <option value="Yearly">Yearly</option>
              </select>
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
         <tr>
            <td></td>
            <td><input  type="submit" name="Register"  value="Add" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
            <br><br>
            <div class="box-head" style="width:1220px; height:auto">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."previousstudent"."&&divid=1"; ?>">Search Student By Scholar Number</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."previousstudent"."&&divid=2"; ?>">Search Student By Id</a> ||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."previousstudent"."&&divid=3"; ?>">Search Student By Name</a>||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."previousstudent"."&&divid=4"; ?>">Search Student By Class</a>||<a  style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px; margin-left:400px;"  href="<?php echo $var."previousstudent"."&&divid=5"; ?>">Search Student By Session</a>
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
              <td><input type="text" name="scholarno1" class="tb5" style="width:80px"></td>
              <td><input type="submit" name="search1" value="Submit"  style="width:80px"></td>   
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
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
      

           <tr>
             <td>Student Name</td>
             <td><input type="text" name="studentname" class="tb5" style="width:110px"></td>
            
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
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=1995;$i<=2069;$i++)
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
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
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
		  
		   <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==5))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session" class="select">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=1995;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
            <td><input type="submit" name="search5" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		  
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; width:1200px;overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Student Id</td>
		<td>Student Scholar</td>
        <td>Name</td>
		<td>Father Name</td>
        <td>Class</td>
		 <td>Dob</td>
		  <td>Doj</td>
		<td>Contact No</td>
        <td>Address</td>
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
    <td><?php echo $studrow['student_id'];?></td>
	<td><?php echo $studrow['student_scholar'];?></td>
	<td><?php echo ucwords($studrow['student_name']);?></td>
	<td><?php echo ucwords($studrow['student_fname']);?></td>
    <td><?php echo $studrow['student_class'];?></td>
	 <td width="80"><?php echo $studrow['student_dob'];?></td>
     <td width="80"><?php echo $studrow['student_doj'];?></td>
	<td><?php echo $studrow['student_contactno'];?></td> 
	<td><?php echo $studrow['student_address'];?></td>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>