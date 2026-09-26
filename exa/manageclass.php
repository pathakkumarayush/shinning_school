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
				   <img src="css/images/Settings-icon.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Manage Class</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Add Header</a>
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
<td><input type="text" name="txtschool" value="<?php echo $_SESSION['schoolname']; ?>" readonly></td>
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
<td><?php echo $_SESSION['uid']; ?></td>
</tr>
<tr>
<td>Class : </td>
<td><select name="class" class="select" style="width:126px"> 
 <option value="-1">Select Class</option>
<option>Prenursery</option>
<option>Nursery</option>
<option>Nursery A</option>
<option>Nursery B</option>
<option>K.G.1</option>
<option>K.G.1 A</option>
<option>K.G.1 B</option>
<option>K.G.2</option>
<option>K.G.2 A</option>
<option>K.G.2 B</option>
<option>1st</option>
<option>1st A</option>
<option>1st B</option>
<option>2nd</option>
<option>2nd A</option>
<option>2nd B</option>
<option>3rd</option>
<option>3rd A</option>
<option>3rd B</option>
<option>3rd C</option>
<option>4th</option>
<option>4th A</option>
<option>4th B</option>
<option>4th C</option>
<option>5th</option>
<option>5th A</option>
<option>5th B</option>
<option>6th</option>
<option>6th A</option>
<option>6th B</option>
<option>7th</option>
<option>7th A</option>
<option>7th B</option>
<option>8th</option>
<option>8th A</option>
<option>8th B</option>
<option>9th</option>
<option>9th A</option>
<option>9th B</option>
<option>10th</option>
<option>10th A</option>
<option>10th B</option>
<option>11th</option>
<option>11th A</option>
<option>11th B</option>
<option>12th</option>
<option>12th A</option>
<option>12th B</option>
</select>
</td>
</tr>
<!--<tr>
<td>Section</td>
<td><select name="section" class="select"> 
<option>Select Section</option>
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
</select>
</td>
<tr>-->
<tr>
   <td>No Of Periods<span>*</span></td>
  <td><input type="text" name="nperiod" style="width:115px;" class="tb5" /></td>
</tr>
<td></td><td><input type="submit" name="addclass"></td>
</tr>
</table>
      
        <?php
		   }
            ?>
            <br><br>
            <div class="box-head">
						<h2 class="left">Currently Available Classes</h2>
						</div>
           <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Class</td>
		 <td>Periods</td>
        <td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['class'])."&nbsp;".$rowmemo['class_section'];?></td>
      <td><?php echo $rowmemo['no_of_periods'];?></td>
    <td><a style="color:#CC0033" href="<?php echo $var."manageclass"."&&did=".$rowmemo['class_id']; ?>" onClick="return confirmation();">Delete</a></td>
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