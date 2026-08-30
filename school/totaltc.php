<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
 <?php
  $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_POST['session']."'and status='1'");
  $rowcont=mysqli_fetch_array($maxid);
  	
	
	//	$rowmax=mysqli_fetch_array($maxid);


$maxid2=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='1'");
  $maxrow2=mysqli_fetch_array($maxid2);





 if(isset($_POST['search1']))
				{
					  
				 $search=mysqli_query($con,"select * from student where student_scholar='".$_POST['scholarno1']."' and student_school='".$_SESSION['uid']."' and status='0'");
				 
			     $num=mysqli_num_rows($search);
				// $studrow=mysqli_fetch_array($search);
				
				}
			 ?>
 <?php
			    if(isset($_POST['search2']))
				{
				 $search=mysqli_query($con,"select * from student where student_id='".$_POST['studentid']."' and student_school='".$_SESSION['uid']."'");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_POST['search3']))
				{
				 $search=mysqli_query($con,"select * from student where student_name Like '".$_POST['studentname']."%' and student_school='".$_SESSION['uid']."' and status='0'");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				 if(isset($_POST['search4']))
				{
				if($_POST['section']=="Select Section")
				{
				 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_POST['session']."' and status='1' order by student_name Asc");
				
				 		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				else
          				   {
			 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_section='".$_POST['section']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and status='1' order by student_name Asc");
				 		         $num=mysqli_num_rows($search);	   
	   
				   } }
				
				?>
<div id="container">
 <div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				  <img src="css/images/studentdetail.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Total Tc</span>
                 
                   <div style="border:#900 2px solid; margin-top:10px"></div>
                    <div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	">Total Tc in Session :&nbsp;<?php echo $rowcont['count(student_id)']; ?></div>
							
		<?php
		   if((empty($_GET['tid'])))
		   {
		?>			
				    
	   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:950px">
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."totaltc"."&&divid=1"; ?>">Search Student By Session</a> &nbsp;&nbsp;||&nbsp;&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."totaltc"."&&divid=4"; ?>">Search Student By Class</a>
						</div>
           <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
     

         <tr>
             <td><select name="session" class="select" style="width:125px">
             <option value="-1">Select Session</option>
            <?php  for($i=2013;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
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
			  <td><select name="session" class="select" style="width:125px">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
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
		<td>Scholar No</td>
		<td>Student Id</td>
        <td>Name</td>
        <td>Class</td>
		<td>Contact No</td>
		<td>Date</td>
        <td>Action</td>
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
	<td><?php echo $studrow['student_scholar'];?></td>
    <td><?php echo $studrow['student_id'];?></td>
	<td><?php echo ucwords($studrow['student_name']);?></td>
    <td><?php echo $studrow['student_class'];?></td>
    <td><?php echo $studrow['student_contactno'];?></td>
	<td><?php echo date("d-m-Y",strtotime($studrow['tcdate']));?></td> 
	<td><a href="<?php echo $var."admission&upstudid=".$studrow['student_id']; ?>">View</a></td> 
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