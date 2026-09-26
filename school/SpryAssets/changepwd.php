
<?php 
	if(isset($_POST['submit']))
	{ 
    
       $query=mysqli_query($con,"select * from login where uid='".$_SESSION['uid']."' and pass='".$_POST['cpwd']."'");
	   if(mysqli_num_rows($query)>0)
	   {
	      if(($_POST['pwd'])==($_POST['confpwd']))
		    {
			  $query1=mysqli_query($con,"update login set pass='".$_POST['confpwd']."' where uid='".$_SESSION['uid']."'");
			  $msg="Password Changed Successfully";
			}
			else
			  {
			    $error="Password Do Not Match";  
			  }
	   }
	   else
	      {
		    $error="Current Password Do Not Match";
		   }
	   //$row_stud=mysqli_fetch_array($query); 
	}
	
?>               

 <div style="width:160px; min-height:450px; position:static; float:left; margin-left:7px; margin-top:7px; border:#CCCCCC solid 1px; border-radius:5px;">
 
 <div id="left_sidebar" style="border-left:1px #CCCCCC solid; margin-top:10px; position:static;">
		<!-- Start of Newsletter Signup Form -->

		


		<div id="specialoffer">

			<div id="specialoffer_text">
			<h2><span>Get Special Offer <strong>Up to 25% off</strong></span></h2>
			</div>

			<div id="specialoffer_link">
			<a href="#">...Go</a>
			</div>

			<div class="clearthis">&nbsp;</div>

		</div>

		<!-- End of Special Offer Box -->
	</div>
    </div>
   
   <div style="width:1000px; min-height:450px; position:static; float:right; margin-right:7px; margin-top:7px; border:#CCCCCC solid 1px; border-radius:5px;">

    <script language="javascript" type="text/javascript" src="../student/date/datetimepicker.js"></script><!-- date picker -->
    
    <br />
       
       <?php 
	     if(!empty($error))
		 {
			?>
         <div class="error" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		 <?php echo $error; ?> 
		</div>
         <?php
         }
	   ?>
       <?php 
	     if(!empty($msg))
		 {
			?>
         <div class="success" style="border:#F00 0px solid; width:320px; margin-left:20px"> 
		  <?php echo $msg; ?> 
		</div>
         <?php
         }
	   ?>
   <?php
      
	  if(isset($_GET["upstudid"]))
{ 
	$res_login=mysqli_query($con,"select * from login where uid='".$_GET["upstudid"]."'")or die(mysqli_error());
	$row_login1=mysqli_fetch_array($res_login);
	$res_stud=mysqli_query($con,"select * from student where uid='".$_GET["upstudid"]."'")or die(mysqli_error());
	$row_stud=mysqli_fetch_array($res_stud);
}
?>
       <form method="post" action="#" enctype="multipart/form-data">
       
      
       <table width="1000" align="left"   cellspacing="10" >
       <tr>
           <td width="30%">Current Password</td>
           <td width="70%"><input type="password" name="cpwd">  </td>
         </tr>
         
         <tr>
         <td>New Password</td>
         <td><input type="password" name="pwd"></td>
         </tr>
         <tr>
         <td>Confirm Password</td>
         <td><input type="password" name="confpwd"></td>
         </tr>
          <tr>
         <td></td>
         <td><input type="submit" name="submit" value="Change Password"></td>
         </tr> 
          
        </table>
       </form>

</div>
	   
   