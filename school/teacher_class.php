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
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#ses").val();
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Class Teacher Details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
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
  if(isset($_POST["addclass"]))
  {
  mysqli_query($con,"insert into class_teacher(class,teacher,teacher_session) values('".$_POST["class"]."','".$_POST["teacher"]."','".$_SESSION['session']."')");
  $msg="Inserted Successfully";
  }
  ?>
  
 <?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from class_teacher  where id='".$_GET['did']."'");
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
 <br clear="all" />
<div class="left_sect"><img src="images/Class Setting/setting.png" /><a href="./?pageid=add_class">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   

                        <div style="border:#900 2px solid; margin-top:10px"></div>
						 <span style="float:right">
						 <a href="./?pageid=teacher_class" style="color:#FFFFFF; font-size:18px">Add Class In Teacher</a></span>
						 <a href="./?pageid=add_class" style="color:#FF0000; font-size:18px">Back</a></span>
						 
               
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
   <td>Teacher<span>*</span></td>
  <td><select name="teacher" class="select" style="width:150px; border-radius:4px;">
    <option value="-1">Select Class</option>
       <?php
        $ress=mysqli_query($con,"select * from teacher where status='Active' and staff_typ='teaching' and teacher_session='".$_SESSION['session']."'");
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
						<h2 class="left">Currently Available Classes</h2>
						</div>
           <div class="table" style="border:#FF0000 0px solid; height:1100px; overflow:scroll">
          
    <table id="sample_1" width="100%" border="0" cellspacing="0" cellpadding="0">
	  <input type="hidden" value="<?php echo $_SESSION['session']?>" name="ses" id="ses" />
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Class</td>
		<td>Teacher</td>
		<td>Uid</td>
		<td>Pass</td>
        <td>Delete</td>
        </tr>
    <?php
    $memo=mysqli_query($con,"select * from class_teacher where teacher_session='".$_SESSION['session']."' ORDER BY class ASC");
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
	
	<?php 
	$uid = $rowmemo['teacher'];
    $cls=mysqli_query($con,"select * from login where type='teacher' and uid='$uid' ");
	$rowcls=mysqli_fetch_array($cls);
	?>
	
	  
	   <td><?php echo $rowcls['uid']; ?></td>
	   <td><?php echo $rowcls['pass'];?></td>
	
	
    <td><a style="color:#CC0033" href="<?php echo $var."teacher_class"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	<tr>
			 <td colspan="10">
 <button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
			 
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/clist.php?ses=<?php echo $_SESSION['session'];  ?>')"><input type="button" value="Print List " style="width:100px;">
</a>
			 </td>
			 
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>