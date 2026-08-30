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
<?php
if(!empty($_SESSION['umsg']))
{
  unset($_SESSION['umsg']);
}
require_once("../db.php");

if(isset($_POST['submit']))
{
 if(empty($_POST['fee']) && empty($_POST['class']) )
 {
  $error_msg="Field Marked with * are mandatory";
 }
//$error_msg.=validate1($_POST['fee'],"Computer Fee",1,0,0,0,0,0,0);
//$error_msg.=validate1($_POST['class'],"class",1,0,0,0,0,0,0);
if(empty($error_msg))
{ 	
foreach($_POST['class'] as $class)
{
$sel=mysqli_query($con,"select class from admission where session='".$_SESSION['session']."' and class='$class' and school='".$_SESSION['uid']."'");

if(mysqli_num_rows($sel)<1)
{	
$queryw=mysqli_query($con,"insert into admission(class,session,fee,school) values('$class','".$_SESSION['session']."','".$_POST['fee']."','".$_SESSION['uid']."')") or die(mysqli_error());
$msg="Inserted Sucessfully";
}
else
{
 $err="Admission Fee Already Exist";
}

}
$_SESSION['sumsg']="Inserted Sucessfully";
}
}
if(!empty($_GET['id']))
{

$selrc=mysqli_query($con,"select * from admission where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
	}
if(isset($_POST['submit1']))
{
$queryupdate=mysqli_query($con,"update admission set fee='".$_POST['fee']."' where id='".$_POST['id']."'") or die(mysqli_error());	

?>
<script type="text/javascript">
	  window.location = "<?php echo $var."addadmissionfee&&uid=update Sucessfully"; ?>";
	</script>
 <?php
}
?>
<?php
 if(!empty($_GET['did']))
 {
	  
	 $del2=mysqli_query($con,"delete from admission where id='".$_GET['did']."'"); 
     
 ?>
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."addadmissionfee&&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
 }
?>
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
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Fee Structure</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Add AdmissionFee</a>
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
        
        
     <table border="0" style="margin:10px 0px 0px 20px">
                         <tr>
           <tr>
               <td>Class<span>*</span></td>
               <td><input type="text" name="class" value="<?php echo $rowselrec['class']; ?>" readonly></td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            <tr>
            <td>Exam Fee</td>
            <td><input type="text" name="fee" style="width:100px" value="<?php echo $rowselrec['fee'];  ?>"></td>
          </tr>
          <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr> 
          <tr>
            <td><input type="hidden" name="id" value="<?php echo $rowselrec['id']; ?>"></td>
            <td><input  type="submit" name="submit1"  value="submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
       <table border="0" style="margin:40px 0px 0px 20px">
           
           <tr>
            <td>Class<span>*</span><br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
               <td>
               <div style="height:100px; overflow:scroll; border:#CCCCCC 1px solid">
              <?php
			    $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."' ");
			    while($rowclass=mysqli_fetch_array($class))
				{
			  ?>
             
                <input type="checkbox" name="class[]" value="<?php echo $rowclass['class'];?>" ><?php echo $rowclass['class'];?><br>
              <?php
				}
				?>
                </div>
                </td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                        
           
            <tr>
            <td>Admission Fee</td>
            <td><input type="text" name="fee" class="tb5" style="width:100px" onKeyPress="return isNumberKey(event)"></td>
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
          <td>Class</td>
          <td>Fee</td>
          <td>Session</td>
         <td>Action</td>
       </tr>
       <?php
        $i=1;
		$memo1=mysqli_query($con,"Select distinct(class) FROM `class` where school='".$_SESSION['uid']."'");
	    while($meta = mysqli_fetch_array($memo1))
	   {
	     $class=$meta['class'].$meta['class_section'];
		   $selrc=mysqli_query($con,"select * from admission where class='$class' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");	      $num=mysqli_num_rows($selrc);
          $selstruc=mysqli_fetch_array($selrc); 

	  	?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['class']; ?></td> 
       <td><?php echo $selstruc['fee']; ?></td>
       <td><?php echo $selstruc['session']; ?></td>  
       <td><?php if($num>0) {  ?> <a href="<?php echo $var."addadmissionfee&&id=".$selstruc['id'];?>" style="color:#FF0000">edit</a>/<a href="<?php echo $var."addadmissionfee&&did=".$selstruc['id'];?>" onClick="return confirmation();" style="color:#FF0000">Delete</a> <?php } ?></td>  
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