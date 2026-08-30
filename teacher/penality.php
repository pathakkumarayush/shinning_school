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
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>

<?php
   if(isset($_POST['update']))
   {
   
    $update=mysqli_query($con,"update penality set date='".$_POST['datefrom']."',todate='".$_POST['todate']."',fine='".$_POST['daters']."',after_fine='".$_POST['afterdate']."' where id='".$_GET['id']."' ");
   $msg="Updated Successfully";
   }
?>

<?php
if(!empty($_SESSION['sumsg']))
{
  unset($_SESSION['sumsg']);
}
 if(!empty($_GET['did']))
 {
	 	 $del2=mysqli_query($con,"delete from fee_structure where id='".$_GET['did']."'"); 
         ?>	
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."feestructure1&&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
}
if(isset($_POST['submit']))
{
if(empty($_POST['daters']) && empty($_POST['afterdate']))
{
$error="Field Marked with * are Mandatory";
}
if(empty($error))
{
$check=mysqli_query($con,"select * from penality where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
if(mysqli_num_rows($check)<1)
{
$d=date("Y");
  $select=mysqli_query($con,"insert into penality(date,todate,fine,after_fine,school,session,Year) values('".$_POST['datefrom']."','".$_POST['todate']."','".$_POST['daters']."','".$_POST['afterdate']."','".$_SESSION['uid']."','".$_SESSION['session']."','$d')");	 
$msg="Inserted Successfully"; 	
}
else
   {
      $error="Penality Already Created For This Session";
   }
}
}
if(!empty($_GET['id']))
{
  $selectp=mysqli_query($con,"select * from penality where id='".$_GET['id']."'");
  $rowp=mysqli_fetch_array($selectp);
}


?>
<script type="text/javascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Fee Structure")) { 
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
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Fee Structure</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feestructure">Fee Structure</a> >>Add fee structure</a>
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
           if(!empty($error))
			{
      ?>
         <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php echo $error;?></div>
			 <?php  
			 } 
             if(!empty($_SESSION['sumsg']) && empty($_GET['dmsg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_SESSION['sumsg'];   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } 
		
		if(empty($_GET['id']))
		{	
		?>
		  <table border="0" style="margin:10px 0px 0px 20px">
            <tr>
            <td>Session<span class="textfieldRequiredMsg">*</span></td>
            <td><input type="text" class="tb5" style="width:250px" name="session" value="<?php echo $_SESSION['session'];  ?>"  readonly></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
            
          
		     <tr>   
               <td>Rs<span class="textfieldRequiredMsg">*</span></td>
			    <td><input type="text" name="daters" class="tb5" style="width:80px"></td>
             </tr>
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
		     

          <input type="hidden" name="id" value="<?php echo $rowselrec['id']; ?>">
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
      
          <tr>
             
           <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="Submit" style="width:100px; height:25px; margin-bottom:10px;" /></td>
          </tr>
         
        </table>    
		<?php 
         }
		 else
		    {
		 ?>
		 <table border="0" style="margin:10px 0px 0px 20px">
            <tr>
            <td>Session<span class="textfieldRequiredMsg">*</span></td>
            <td><input type="text" class="tb5" style="width:250px" name="session" value="<?php echo $_SESSION['session'];  ?>"  readonly></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
            
           <tr>   
               <td>Rs<span class="textfieldRequiredMsg">*</span></td>
			    <td><input type="text" name="daters" class="tb5" value="<?php echo $rowp['fine']; ?>" style="width:80px"></td>
             </tr>
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
		     <tr>   
               <td>After Date Rs<span class="textfieldRequiredMsg">*</span></td>
			    <td><input type="text" name="afterdate" class="tb5" value="<?php echo $rowp['after_fine']; ?>" style="width:80px"></td>
             </tr>

          <input type="hidden" name="id" value="<?php echo $rowselrec['id']; ?>">
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
      
          <tr>
             
           <tr>
            <td></td>
            <td><input type="submit" name="update" value="update"></td>
          </tr>
         
        </table>
		 <?php 
		  }
		 ?>
            <br><br>
            <div class="box-head">
						<h2 class="left">Penality rules For Session <?php echo $_SESSION['session']; ?></h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:100px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr style="background:#EAECFD; color:#000">
          <td>Id</td>
          <td>Fine Rs</td>
          <td>Action</td>
       </tr>
       <?php
        $i=1;
		$memo1=mysqli_query($con,"Select * from penality where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    $num=mysqli_num_rows($memo1);
		while($meta = mysqli_fetch_array($memo1))
	   {
	       
		   ?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['fine']; ?></td>
      
       <td>
	   <?php
	     if($num>0)
		 {
	   ?>
	   <a href="<?php echo $var."penality&&id=".$meta['id'];?>"  style="color:#FF0000">Update</a></td>  
      <?php
	    }
	  ?>
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

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
