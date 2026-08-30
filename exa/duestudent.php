<?php
  if(isset($_POST["send"]))
  {
    foreach($_POST['due'] as $k=>$d)
	{
  
   $sub="Fee Due Message";
   $nmsg="Fee For the month ".$d." has been due please pay the amount as soon as possible.";	
	$session=$_POST["ses"];
	$page=1;
	$r=sms($_SESSION["uid"],$k,$sub,$nmsg,'Yes',$session,$page);
	
	}
	
    
  }
?>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
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
			   /*
			    if(isset($_POST['search2']))
				{
				 $search=mysqli_query($con,"select * from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' and due<>0 ");
			      $num=mysqli_num_rows($search);
			    }
				   
				    if(isset($_POST['search']))
				{
				  $search=mysqli_query($con,"select * from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."' and due<>0 and class='".$_POST['class']."' ");
			      $num=mysqli_num_rows($search);
			      }
				 */ 
				?>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Due Student</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=fee_managementhome">Fee Management</a>Due Student</a>
                 <form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
      			
						
		
	
       
            <div class="box-head" style="margin-top:20px; font-size:18px">
					 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."duestudent"."&&divid=1"; ?>">Due Student By Session</a>&nbsp;||&nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."duestudent"."&&divid=2"; ?>">Due Student By Class</a>
						</div>
         
       
         
        <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select></td>
           <td><input type="submit" name="search2" value="Submit" style="width:80px"></td>   
          </tr>
        </table><br>
        </div>
        
        <?php
		 }
		 ?>
         <?php
		   //student by scholar number
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
         
      <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        <tr>
   <td>Select Session</td><td><select name="session">
             <option value="-1">Select Session</option>
            
           
           <?php  for($i=2013;$i<=2069;$i++)
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
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="styled">
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
          </tr>
		   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		   <tr>
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 if(isset($_POST['search2']))
	{
		 ?>

		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/bsps/school/duelist.php?ses=<?php echo $_POST['session'];  ?>')"><input type="button" value="Print List " style="width:200px;float:right" ></a>
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; margin:0px 0px 0px 0px">
                <?php
				}
				?>
				  <?php
		 
		 if(isset($_POST['search']))
	{
		 ?>

		   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/bsps/school/duelist.php?ses=<?php echo $_POST['session']."&class=".$_POST['class'];  ?>')"><input type="button" value="Print List " style="width:200px;float:right" ></a>
		   <div class="table" style="border:#FFCCCC 20px solid; height:220px; margin:0px 0px 0px 0px">
                <?php
				}
				?>
				
				   <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_POST['session']; ?></h2>
				   	
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td><input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/></td>
        <td>Student Name</td>
        <td>Class</td>
        <td>Session</td>
		<td>Total Fee</td>
       </tr>
       <?php
       
	$i=1;
	if(isset($_POST['search2']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	  
			      $search=mysqli_query($con,"select * from student where student_session='".$_POST['session']."' and student_school='".$_SESSION['uid']."'");
				  
				  $num=mysqli_num_rows($search);
				} 
				if(isset($_POST['search']))
	{
	//while($studrow=mysqli_fetch_array($search))
	
	  
			      $search=mysqli_query($con,"select * from student where student_session='".$_POST['session']."' and student_school='".$_SESSION['uid']."' and student_class='".$_POST['class']."'");
				  
			   $num=mysqli_num_rows($search);
				}  
			    if($num>0)
				{
				 while($studrow=mysqli_fetch_array($search))
				 {
	                $search1=mysqli_query($con,"select * from fee_detail where session='".$_POST['session']."' and school='".$_SESSION['uid']."'  and student='".$studrow['student_id']."' order by id desc limit 1");
					
			       while($numr=mysqli_fetch_array($search1))
				   { 
	          if($numr['due']>0)
			  {
	?>	
    <tr style="color:#335599">
    <td><input type="checkbox" name='formDoor[]' value="<?php echo $studrow['student_id']; ?>"  id='chk<?php echo $i; ?>' /></td>
    <td><?php echo ucwords($studrow['student_name']);?></td>
	 <td><?php echo ucwords($studrow['student_class']);?></td>
	 <td><?php echo ucwords($studrow['student_session']);?></td>
     <td><?php echo $numr['due']; ?>
	 <input  type="hidden" name="due[<?php echo $studrow['student_id']; ?>]" value="<?php echo $numr['month']."  Rs".$numr['due']; ?>"  style="width:80px"  />
	 <input type="hidden" name="ses" value="<?php echo  $_POST['session']; ?>">
	 </td>
    </tr>
    <?php
    $i++;
	}
	}
	}
	}
	else
	   {
	   ?>
      <td style="color:#990066"><?php echo "No Record"; ?></td>
	   <?php
	   }
	?>
	 <tr>
	     <td>&nbsp;</td>
	      <td>&nbsp;</td>
		   <td>&nbsp;</td>
		    <td>&nbsp;</td>
	     <td><input type="submit" name="send" value="Send Message"></td>
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
<br><br><br><br><br><br><br><br><br><br><br><br>