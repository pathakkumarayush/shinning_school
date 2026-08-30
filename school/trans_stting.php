<?php
  if(isset($_POST['submit']))
  {
      $upd1=mysqli_query($con,"select * from transportsetting where feename='".$_POST['feename']."' ");
	  if(mysqli_num_rows($upd1)<1)
	  {
    $query=mysqli_query($con,"insert into transportsetting(feename,setting,session) values('".$_POST['feename']."','".$_POST['setting']."','".$_SESSION['session']."')");
    $msg="Inserted Successfully";
 }
 else
    {
	  $msg="Setting Already done";
	}
  }
  
  if(!empty($_GET['id']))
  {
    $upd=mysqli_query($con,"select * from transportsetting where id='".$_GET['id']."' ");
    $rupd=mysqli_fetch_array($upd);
  }
  
  if($_POST['update'])
  {
    $upd=mysqli_query($con,"update transportsetting set setting='".$_POST['setting']."' where id='".$_POST['id']."' ");
  }
  
  if(!empty($_GET['did']))
  {
     $delete=mysqli_query($con,"delete from transportsetting where id='".$_GET['did']."' ");
    $msg="Deleted Successfully";
  }

?>


<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      //-->
</SCRIPT>
<script type="text/javascript">
 function validate()
{
 if( document.myForm.feename.value == "-1" )
   {
     alert("Please Select Fee");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
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
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Fee Setting</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Fee Setting</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']) && empty($err) && empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
           
     <?php
     if(!empty($_GET['dmsg']) && empty($msg) && empty($err))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['dmsg']; ?></div>
		  <?php
		   }
	       ?>
    <?php
	          if(!empty($error_msg))
			{
			?>
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php echo $error_msg ;?></div>
			 <?php  
			 } 
             if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } ?>

		<?php				
           if(!empty($_GET['id']))
           {
      ?>
        
        
    <table border="0" style="margin:40px 0px 0px 20px">
           
           <tr>
            <td>Fee Name</td>
               <td>
                   <input type="text" name="feename" value="<?php echo $rupd['feename'];  ?>" class="tb5" />
                </td>
          </tr>
		   <tr>
		      <td>&nbsp;</td>
			   <td>&nbsp;</td>
		   </tr>
		   <tr>
            <td>Setting</td>
               <td> 
                  <select name="setting" class="select5">
				    <option value="Separately" <?php if($rupd['setting']=="Separately") { ?> selected="selected"   <?php }   ?>>Separately</option>
				    <option value="With Fee"   <?php if($rupd['setting']=="With Fee") { ?> selected="With Fee"   <?php }   ?>>With Fee</option>
				 
				  </select>
                
				</td>
          </tr>
            <input type="hidden" name="id" value="<?php echo $rupd['id'];  ?>">
             <tr>
		      <td>&nbsp;</td>
			   <td>&nbsp;</td>
		   </tr>             
             <tr>
		      <td>&nbsp;</td>
			   <td>&nbsp;</td>
		   </tr>      
            
           
          <tr>
            <td></td>
            <td><input  type="submit" name="update"  value="update" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
       <table border="0" style="margin:40px 0px 0px 20px">
           
           <tr>
            <td>Fee Name</td>
               <td>
                  <select name="feename">
				  <option value="-1">Select Fee</option>
				    <option value="transport">Transport Fee </option>
				    <option value="Admission Fee">Admission Fee </option>
				   <option value="Caution Fee">Caution Fee</option>
				  </select>
                </td>
          </tr>
		   <tr>
		      <td>&nbsp;</td>
			   <td>&nbsp;</td>
		   </tr>
		   <tr>
            <td>Setting</td>
               <td> 	
                  <select name="setting">
				    <option value="Separately">Separately</option>
				    <option value="With Fee">With Fee</option>
					<option value="No Fee">No Fee</option>
				  </select>
                </td>
          </tr>
            
                        
             <tr>
		      <td>&nbsp;</td>
			   <td>&nbsp;</td>
		   </tr>      
            
           
          <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
         
             <div class="box-head">
						<h2 class="left">Classwise Admission Fee</h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr style="background:#EAECFD; color:#000">
          <td>Id</td>
          <td>Fee Name</td>
          <td>Setting</td>
          <td>Session</td>
         <td>Action</td>
       </tr>
       <?php
        $i=1;
		$memo1=mysqli_query($con,"Select * FROM `transportsetting` where session='".$_SESSION['session']."'");
	    while($meta = mysqli_fetch_array($memo1))
	   {
	      

	  	?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['feename']; ?></td> 
       <td><?php echo $meta['setting']; ?></td>
       <td><?php echo $meta['session']; ?></td>  
       <td> <a href="<?php echo $var."trans_stting&&id=".$meta['id'];?>" style="color:#FF0000">edit</a>/<a href="<?php echo $var."trans_stting&&did=".$meta['id'];?>" onClick="return confirmation();" style="color:#FF0000">Delete</a> </td>  
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>