<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
 <?php
if(isset($_POST["submit"]))
{
$view=0;
    $query=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."'");	
    if(mysqli_num_rows($query)>0)
	{
    	$search=mysqli_fetch_array($query);
        $view=1;
        
	}
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
				   <img src="css/images/538660.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:20px">Id Card</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="#">Tc Allocation</a>
				 
            
	             <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
    <?php
	   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>

	  
	    <?php
		if((!empty($views)) && ($views!=1))
		 {
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
            <td><select name="class" class="select" style="width:125px" onchange="showtcStudent(this.value)">
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
    <td>&nbsp;</td>
   <td><input type="submit" name="submit" value="submit" style="width:150px"></td>
</tr>
</table>
         <?php
		   }
		   else
		       {
			   ?>
			   <table cellspacing="10" style="margin-top:30px; font-size:14px">
	     <tr>
             <td>Student Id</td>
             <td><?php echo $search['student_id'];   ?></td>
       </tr>
	 
	     <tr>
             <td>Student Name</td>
             <td><?php echo $search['student_name'];   ?></td>
       </tr>
	     <tr>
             <td>Class</td>
             <td><?php echo $search['student_class'];   ?></td>
       </tr>
	    <tr>
             <td>Student Father Name</td>
             <td><?php echo $search['student_fname'];   ?></td>
       </tr>
	    <tr>
             <td>Address</td>
             <td><?php echo $search['student_address'];   ?></td>
       </tr>
	   <tr>
	      <td></td>
		  <td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/smarterp2/demo/school/genid.php?stdid=<?php echo  $_GET['stdid']; ?>')"><input type="button" value="Genrate Id" style="width:160px; margin-left:100px" ></a></td>
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
<br><br>