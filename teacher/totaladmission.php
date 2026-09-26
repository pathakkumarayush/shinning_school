<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<?php
  if(!empty($_GET['did']))
  {
   
  // $query=mysqli_query($con,"delete from student where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	 
$d=date("Y-m-d");
$query=mysqli_query($con,"update student set status='1',tcdate='$d' where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	 



    }
?>
 <?php
  $maxid=mysqli_query($con,"select * from student where student_school='".$_SESSION["uid"]."' and student_session='".$_POST['session']."'and status='0'");
  $count=0;
  while($maxrow=mysqli_fetch_array($maxid))
    {
	  $d=date("Y",strtotime($maxrow['student_doj']));
	  $d1=$d+1;
	  $ses=$d."-".$d1;
	 
	  if($ses==$_POST['session'])
	    {
		   $count=$count+1;
		 
		}
	
	}
	//	$rowmax=mysqli_fetch_array($maxid);


$maxid2=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='1'");
  $maxrow2=mysqli_fetch_array($maxid2);
?>
 <?php
			    
				
				if(isset($_POST['search4']))
				{
				 $search=mysqli_query($con,"select * from student where  student_school='".$_SESSION['uid']."' and  student_session='".$_POST['session']."'");
		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				
				 if(isset($_POST['search5']))
				{
				if($_POST['section']=="Select Section")
				{
				 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_POST['session']."' and status='0' order by student_name Asc");
				
				 		         $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				else
          				   {
			 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_section='".$_POST['section']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_POST['session']."'");
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
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Total Admission</span>
                 
                   <div style="border:#900 2px solid; margin-top:10px"></div>
                    <div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	">Total Admission in Session:<?php echo $count; ?></div>
							
		<?php
		   if((empty($_GET['tid'])))
		   {
		?>			
				    
	   <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      
   
  <br><br>
            <div class="box-head" style="width:1020px">
		<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."totaladmission"."&&divid=1"; ?>">Search Student By Session</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."totaladmission"."&&divid=4"; ?>">Search Student By Class</a>
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
		   
		   <td><input type="submit" name="search5" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
        </div>
       <?php
		 }
		  ?>
		     <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/bsps/school/studentlist.php?student_class=<?php echo $_POST['class'];  ?>')"><input type="button" value="Print List " style="width:100px; position:absolute"></a>
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; width:1000px;overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Scholar No</td>
		<td>Child Id</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Gender</td>
		<td>Address</td>
		<td>Contact No</td>
		<td>Acc. No</td>
        <td>Action</td>
                </tr>
       <?php
       $i=1;
	    if($num>0)
		{
	     while($studrow=mysqli_fetch_array($search))
		 {
		   $d=date("Y",strtotime($studrow['student_doj']));
	       $d1=$d+1;
	       $ses=$d."-".$d1;
		  
		   if($ses==$_POST['session'])
	    {
		   
		  
	?>	
    <tr style="color:#335599">
    <td style="width:20px;"><?php echo $i; ?></td>
	<td style="width:70px;"><?php echo $studrow['student_scholar'];?></td>
    <td><?php echo $studrow['student_rollno'];?></td>
	<td style="width:70px;"><?php echo ucwords($studrow['student_name']);?></td>
	<td style="width:80px;"><?php echo ucwords($studrow['student_fname']);?></td>
	<td style="width:70px;"><?php echo ucwords($studrow['m_name']);?></td>
    <td><?php echo $studrow['student_class'];?></td>
	 <td style="width:70px;"><?php echo $studrow['student_dob'];?></td>
	  <td><?php echo $studrow['student_gender'];?></td>
	    <td style="width:100px;"><?php echo $studrow['student_address'];?></td>
    <td><?php echo $studrow['student_contactno'];?></td> 
	<td><?php echo $studrow['f_tell_no_off'];?></td>
	<td><a href="<?php echo $var."admission&upstudid=".$studrow['student_id']; ?>">View</a></td> 
        </tr>
    <?php
     $i++;
	 }
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