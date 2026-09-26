<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
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
<?php
  if(!empty($_GET['did']))
  {
   $query=mysqli_query($con,"delete from student where student_id='".$_GET['did']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");	  }
?>
 <?php
  $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."' ");
  $maxrow=mysqli_fetch_array($maxid);
		     $rowmax=mysqli_fetch_array($maxid);
 if(isset($_POST['search1']))
				{
					  
				 $search=mysqli_query($con,"select * from student where student_scholar='".$_POST['scholarno1']."' and student_school='".$_SESSION['uid']."' ");
			     $num=mysqli_num_rows($search);
				// $studrow=mysqli_fetch_array($search);
				
				}
			 
				 if(isset($_POST['search4']))
				{
				 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."'");
				 		         
								 
								 $num=mysqli_num_rows($search);	   
				// $studrow=mysqli_fetch_array($search);
				}
				
				if(isset($_POST['promote']))
				  {
				    if(!empty($_POST['formDoor']))
					{
				  foreach($_POST['formDoor'] as $id)
				  {
				     if(!empty($_POST['session']) && ($_POST['session']!=-1))
					 {
				    $promote=mysqli_query($con,"update student set student_class='".$_POST['toclass']."',student_session='".$_POST['session']."' where student_school='".$_SESSION['uid']."' and student_id='$id'");
				   $msg="Promoted Successfully";
				  }
				  else
				      {
					     $promote=mysqli_query($con,"update student set student_class='".$_POST['toclass']."',student_session='".$_SESSION['session']."' where student_school='".$_SESSION['uid']."' and student_id='$id'");
				  		   
				   $msg="Promoted Successfully";
					  
					  }
				  }
				}
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
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Promote Student </span>
                    	<div style="border:#900 2px solid; margin-top:10px"></div>
                    <div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	">Total Student:<?php echo $maxrow['count(student_id)']; ?></div>
				    
	   <form method="post" name="myform" action="#" enctype="multipart/form-data" >
                
      
   
  <br><br>
            <div class="box-head" style="width:950px">
						<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."promote"."&&divid=4"; ?>">Promote Student By Class</a>
			</div>
        
        <?php
		   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
		  
		  
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		   {
	   ?>
   
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
     

         <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class'].$rclass['class_section']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
			   <td><input type="submit" name="search4" value="submit" style="width:80px"></td>              
		  </tr>
        </table><br>
		 <table style="margin:30px 0px 0px 70px; font-size:14px; width:420px">
     

         <tr>
                <td>To Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="toclass" class="select" style="width:125px">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class'].$rclass['class_section']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
			  <td>&nbsp;</td>
			  <td><select name="session" class="select" >
             <option value="-1">Select Session</option>
            
           
           <?php  
		     $date=date("Y");
			  $date1=$date+1;
			  $date2=$date+2;
			 ?>
		      <option value="<?php echo $date1."-",$date2; ?>"><?php echo $date1."-",$date2; ?></option>
           
            
           </select></td>
		    <td>&nbsp;</td>
           <td><input type="submit" name="promote" value="Promote" style="width:80px"></td>   
		  </tr>
        </table>
        </div>
   
	   <?php
		 }
		
		  ?>
		  
		  
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; width:930px;overflow:scroll; margin-top:40px">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td><input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/></td>
		<td>Scholar No</td>
		<td>Student Id</td>
        <td>Name</td>
        <td>Class</td>
		<td>Contact No</td>
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
    <td><input type="checkbox" name='formDoor[]' value="<?php echo $studrow['student_id']; ?>"  id='chk<?php echo $i; ?>' /></td>
	
	<td><?php echo $studrow['student_scholar'];?></td>
    <td><?php echo $studrow['student_id'];?></td>
	<td><?php echo ucwords($studrow['student_name']);?></td>
    <td><?php echo $studrow['student_class'];?></td>
    <td><?php echo $studrow['student_contactno'];?></td> 
	<td><a href="<?php echo $var."admission&upstudid=".$studrow['student_id']; ?>">View</a>| <a href="<?php echo $var."studentdetailhome&did=".$studrow['student_id']; ?>" onClick="return confirmation();">Delete</a></td> 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>