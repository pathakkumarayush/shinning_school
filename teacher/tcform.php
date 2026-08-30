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
$gentc=0;
  if(!empty($_GET['stdid']))
  {
  
    $search=mysqli_query($con,"select * from student where student_id='".$_GET['stdid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."'");
 $rowsearch=mysqli_fetch_array($search);
  
  // $selecttc=mysqli_query($con,"select * from tcissued where student='".$rowsearch['student_id']."' and id='".$_GET['tcid']."'");
   //$rowtc=mysqli_fetch_array($selecttc);
  }
  
  if(isset($_POST['submit']))
  {
   
       if((empty($_POST['lastclass'])) || (empty($_POST['passed'])) || (empty($_POST['current'])))
	   {
	     $error_msg="Field Marked With * Are mandatory";
	   }
   if(empty($error_msg))
   {
   
    $update=mysqli_query($con,"update tcissued set Last_Year_Class_Attended='".$_POST['lastclass']."',Promoted_to='".$_POST['passed']."',Currently_in_Year='".$_POST['current']."' where id='".$_GET['tcid']."'");
    $gentc=1;
  }
  }


/*
if(isset($_POST["addclass"]))
{

    if($_POST["section"]=="Select Section")
	  {
	    $result=mysqli_query($con,"select * from class where class='".$_POST["class"]."' and  school='".$_SESSION['uid']."' ")or die(mysqli_error());
	  }
	  else
	  {
	$result=mysqli_query($con,"select * from class where class='".$_POST["class"]."' and class_section='".$_POST["section"]."' and school='".$_SESSION['uid']."' ")or die(mysqli_error());
	}
	if($row=mysqli_num_rows($result)>1)
	{
		?>
        <script type="text/javascript">
		alert("This class is already exists");
		</script>
        <?php
	}
	else
	{
	if($_POST["section"]=="Select Section")
	  {
	   $_POST["section"]="";
	  }
	mysqli_query($con,"insert into class(class,class_section,school,no_of_periods) values('".$_POST["class"]."','".$_POST["section"]."','".$_SESSION['uid']."','".$_POST['nperiod']."')");
	
	
	$msg="Inserted Successfully";
	}
}
*/
?>
<?php
/*
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from class where class_id='".$_GET['did']."'");
	}
	*/
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
				   <img src="css/images/totaltc.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Tc Form</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                Genrate Tc
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
		  <?php
		   }
	       ?>
   <?php
		   if($gentc=="0")
		   {
		   ?>
          
    <table cellspacing="10">
<tr>
<td>School : </td>
<td><?php echo $_SESSION['uid']; ?></td>
</tr>
<tr>
<td>Name : </td>
<td><?php echo $rowsearch['student_name'];  ?></td>
</tr>
<tr>
<td>Class : </td>
<td><?php echo $rowsearch['student_class'];  ?></td>
</tr>
<tr>
<td>Father Name</td>
<td><?php echo $rowsearch['student_fname'];  ?></td>
<tr>
<tr>
<td>Date Of Leaving</td>
<td><?php echo date("d-m-Y",strtotime($rowtc['date']));  ?></td>
<tr>
<tr>
   <td>Last Year Class Attended<span>*</span></td>
  <td><input type="text" name="lastclass" style="width:115px;" class="tb5" /></td>
</tr>
<tr>
   <td>Passed & Promoted To<span>*</span></td>
  <td><input type="text" name="passed" style="width:115px;" class="tb5" /></td>
</tr>

<tr>
   <td>Currently_in_Year<span>*</span></td>
  <td><input type="text" name="current" style="width:115px;" class="tb5" /></td>
</tr>


<tr>
<td></td><td><input type="submit" name="submit"></td>
</tr>
</table>
    <?php
	}
	else
	{
	?>

     <table style="margin-top:50px">
		<tr>
<td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/bsps/school/gettc.php?stdid=<?php echo  $_GET['stdid']; ?>.&tcid=<?php echo $_GET['tcid'];  ?>')"><input type="button" value="Genrate TC " style="width:160px; margin-left:100px" ></a></td>
</tr></table>
      
        <?php
		   }
            ?>
            <br><br>
            
           
      
                 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>