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
if(isset($_POST["addclass"]))
{
mysqli_query($con,"insert into class_teacher_sub(class,teacher,teacher_session,sub)values('".$_POST["class"]."','".$_POST["teacher"]."','".$_SESSION['session']."','".$_POST["sub"]."')");
$msg="Inserted Successfully";
}
?>
  
 <?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from class_teacher_sub  where id='".$_GET['did']."'");
	}
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this")) { 
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
				   <img src="images/Class Setting/Manage Class.png" style="width:200px; height:80px;" />

                        <div style="border:#900 2px solid; margin-top:10px"></div>
						 <span style="float:right">
						
						 <a href="./?pageid=add_class" style="color:#FF0000; font-size:18px">Go-Back</a></span>
						 
               
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
           if(!empty($_GET['id']))
           {
      ?>
        
        
      <table cellspacing="10">
<tr>
<td>School : </td>
<td><input type="text" name="txtschool" value="<?php echo $_SESSION['school_session']; ?>" readonly></td>
</tr>
<tr>
<td>Class : </td>
<td><select name="class"> 
 <option value="-1">Select Class</option>
<option>Prenursery</option>
<option>Nursery</option>
<option>K.G.1</option>
<option>K.G.2</option>
<option>1st</option>
<option>2nd</option>
<option>3rd</option>
<option>4th</option>
<option>5th</option>
<option>6th</option>
<option>7th</option>
<option>8th</option>
<option>9th</option>
<option>10th</option>
<option>11th</option>
<option>12th</option>
</select>
</td>
</tr>
<tr>
<td>Section</td>
<td><select name="section"> 
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
<option>E</option>
<option>F</option>
<option>G</option>
<option>H</option>
<option>I</option>
<option>j</option>
<option>Maths</option>
</select>
</td>
<tr>
<tr>
   <td>No Of Periods<span>*</span></td>
  <td><input type="text" name="nperiod" style="width:115px;" class="tb5" /></td>
</tr>
<td></td><td><input type="submit" name="addclass"></td>
</tr>
</table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
    <table cellspacing="10">
<tr>
<td>School : </td>
<td><?php echo $_SESSION['session']; ?></td>
</tr>
<tr>
<td>Class : </td>
<td><select name="class" class="select" style="width:150px; border-radius:4px;">
    <option value="-1">Select Class</option>
       <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
            echo "<option>".$rows["class"]."</option>";
        } 
        ?>
     </select></td>
</tr>


<tr>
   <td>Subject<span>*</span></td>
   <td><select name="sub" class="select" style="width:150px; border-radius:4px;">
    <option value="-1">Select Subject</option>
        <?php
        $sub=mysqli_query($con,"select * from subjects where session='".$_SESSION["session"]."'");
        while($rowsub=mysqli_fetch_array($sub))
        {
		?>
        <option value="<?php echo $rowsub["name"]?>"><?php echo $rowsub["name"]?>-<?php echo $rowsub["class"]?></option>
        <?php
		} 
        ?>
     </select></td>
</tr>


<tr>
   <td>Teacher<span>*</span></td>
  <td><select name="teacher" class="select" style="width:150px; border-radius:4px;">
    <option value="-1">Select Class</option>
       <?php
        $ress=mysqli_query($con,"select * from teacher where status='Active' and teacher_session='".$_SESSION['session']."'");
        while($rowss=mysqli_fetch_array($ress))
        {
		?>
        <option value="<?php echo $rowss["uid"]?>"><?php echo $rowss["teacher_name"]?></option>
        <?php
		} 
        ?>
     </select></td>
</tr>
<td></td><td><input type="submit" name="addclass"></td>
</tr>
</table>
      
        <?php
		   }
            ?>
            <br><br>
            <div class="box-head">
						<h2 class="left">Currently Available Subject Class Teacher</h2>
						</div>
           <div class="table" style="border:#FF0000 0px solid; height:320px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Class</td>
		<td>Teacher</td>
		<td>Subject</td>
		<td>User Name</td>
	    <td>Password</td>
        <td>Delete</td>
        </tr>
    <?php
    $memo=mysqli_query($con,"select * from class_teacher_sub where teacher_session='".$_SESSION['session']."'");
		
    $i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['class'])."&nbsp;".$rowmemo['class_section'];?></td>
	
    <td>
	<?php 
	$memom=mysqli_query($con,"select * from teacher where uid='".$rowmemo['teacher']."'");
	$rows1=mysqli_fetch_array($memom);
	echo $rows1['teacher_name'];
	?>
	</td>
	   <td><?php echo $rowmemo['sub'];?></td>
	   <td><?php echo   $rows1['uid']; ?></td>
	   <td><?php //echo $rows11['pass'];?>1234567</td>
	 
    <td><a style="color:#CC0033" href="<?php echo $var."teacher_classs"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>