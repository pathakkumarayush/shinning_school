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
  if(!empty($_GET['class']) || !empty($_GET['stdid']) || !empty($_GET['parent']) || !empty($_GET['reason']) || !empty($_GET['date']))
  {
    $err="Field Marked with * are mandatory";
  }
if(empty($err))
{
 $query=mysqli_query($con,"insert into studentleave(class,student,guardin,reason,session) values('".$_POST['class']."','".$_POST['stdid']."','".$_POST['parent']."','".$_POST['reason']."','".$_SESSION['session']."')");

$nid=mysqli_insert_id();
 $msg="Inserted Successfully";
 }  
}
?>
<?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from class where class_id='".$_GET['did']."'");
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
				   <img src="css/images/leave.jpg" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Manage Half Day</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="#">Manage half Day</a>
				  <a style="float:right" href="./?pageid=showhalfdayleave">Show Details</a>
            
	             <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <?php
		 if(empty($nid))
		 {
     if(!empty($err))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $err; ?></div>
		  <?php
		   }
	       ?>
		   
		      <?php
     if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
		   <?php
		   }
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
<tr>
   <td>Parent/Guardian Name<span>*</span></td>
  <td><input type="text" name="parent" style="width:115px;" class="tb5" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
<tr>
   <td>Reason<span>*</span><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
  <td><textarea name="reason" cols="40" rows="5"></textarea></td>
</tr>

		
	
		
		<tr>
<td></td><td><input type="submit" name="submit" value="submit" style="width:150px"></td>
</tr>
</table>
         <?php
		   }
		   else
		     {
			  $studentdeta=mysqli_query($con,"select * from studentleave where id='$nid'");
			  
			  $rowdetail=mysqli_fetch_array($studentdeta);
			?> 
			
			    <table border="0" cellspacing="10" style="margin-top:40px; font-size:16px; font-weight:bold; background-color:#CCCCCC">
	<tr>
                <td>Class :  <span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where class_id='".$rowdetail['class']."' and school='".$_SESSION['uid']."'");
			    $rowclass=mysqli_fetch_array($class);
			    $student=mysqli_query($con,"select * from student where student_id='".$rowdetail['student']."'"); 
			    $rowstudent=mysqli_fetch_array($student);
			 ?>
            <td><?php echo $rowclass['class'];  ?></td>
             </tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		
			 <tr>
			  <td>Student Name :</td> 
			  <td><?php echo ucwords($rowstudent['student_name']); ?></td>
              </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
<tr>
<tr>
   <td>Parent/Guardian Name :</td>
  <td><?php echo  ucwords($rowdetail['guardin']); ?></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
<tr>
   <td>Reason :</td>
  <td><?php echo  $rowdetail['reason']; ?></td>
</tr>
<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
		<tr>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Date :</td>
		<td><?php echo  date("d-m-Y h:i:s",strtotime($rowdetail['date'])); ?></td>  
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		
<tr>
<td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/smarterp2/demo/school/halfdayreceipt.php/halfdayreceipt.php?id=<?php echo  $rowdetail['id']; ?>')"><input type="button" value="Genrate Receipt " style="width:160px; margin-left:100px" ></a></td>
</tr>
</table>
			 
		<?php
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