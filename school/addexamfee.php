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
//session_start();
if(!empty($msg))
{
  unset($msg);
}
if(!empty($_SESSION['umsg']))
{
  unset($_SESSION['umsg']);
}
require_once("../db.php");

if(isset($_POST['submit']))
{
if(empty($_POST['name']))
{
$error_msg="Field marked with * are mandatory";
}
elseif($_POST['month']==-1)
{
$error_msg="Field marked with * are mandatory";
}
elseif(empty($_POST['fee']))
{
$error_msg="Field marked with * are mandatory";
}

//$error_msg.=validate1($_POST['name'],"Exam Name",1,0,0,0,0,0,0);
if(empty($error_msg))
{ 	

//$_POST['class']=implode(",",$_POST['class']);	

$sel=mysqli_query($con,"select exam_name from exam_fee  where exam_name='".$_POST['name']."' and session='".$_SESSION['session']."' and class='".$_POST['class']."' and school='".$_SESSION['uid']."'");
if(mysqli_num_rows($sel)<1)
{	
$queryw=mysqli_query($con,"insert into exam_fee(exam_name,class,session,fee,month,school) values('".$_POST['name']."','".$_POST['class']."','".$_SESSION['session']."','".$_POST['fee']."','".$_POST['month']."','".$_SESSION['uid']."')") or die(mysqli_error());
?>
<script type="text/javascript">
window.location="<?php echo $var."addexamfee&msg=Inserted Successfully"; ?>";
</script>
<?php
}
else
{
 $err="Exam Already Exist";
}
}
}
if(!empty($_GET['id']))
{
$selrc=mysqli_query($con,"select * from exam_fee where examid='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
	}
if(isset($_POST['submit1']))
{
$queryupdate=mysqli_query($con,"update exam_fee set exam_name='".$_POST['name']."',class='".$_POST['class']."',session='".$_SESSION['session']."',fee='".$_POST['fee']."',month='".$_POST['month']."' where examid='".$_POST['id']."'") or die(mysqli_error());	
?>
<script type="text/javascript">
window.location="<?php echo $var."addexamfee&msg=updated Successfully"; ?>";
</script>
<?php

}
?>
<?php
 if(!empty($_GET['did']))
 {
	  
	 $del2=mysqli_query($con,"delete from exam_fee where examid='".$_GET['did']."'"); 
     
 ?>
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."addexamfee&&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
 }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this exam fee")) { 
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
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Add ExamFee</a>
                  <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
       
     <?php
     if(!empty($_GET['dmsg']) && empty($msg))
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
			 <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php echo $error_msg;?></div>
			 <?php  
			 } 
             if(!empty($_GET['msg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['msg'];   ?></div>
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
            <td>Exam Name<span>*</span></td>
            <td>
              <input type="text" name="name" style="width:100px" value="<?php echo $rowselrec['exam_name']; ?>" class="tb5" readonly="readonly"  id="txtname" />
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
           <tr>
               <td>Class<span>*</span></td>
               <td><input type="text" class="tb5" name="class"  style="width:100px"value="<?php echo $rowselrec['class']; ?>" readonly></td>
          </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
                       <td>Month</td>
            <td>
                 
                 <select name="month" class="select" onChange="showUser2(this.value)">
                   <option value="-1">Select Month</option>
                   <option value="jan" <?php if($rowselrec['month']=="jan") { ?> selected="selected" <?php } ?> >Jan</option>
                   <option value="feb" <?php if($rowselrec['month']=="feb") { ?> selected="selected" <?php } ?>>Feb</option>
                   <option value="march" <?php if($rowselrec['month']=="march") { ?> selected="selected" <?php } ?>>March</option>
                   <option value="april" <?php if($rowselrec['month']=="april") { ?> selected="selected" <?php } ?>>April</option>
                   <option value="may" <?php if($rowselrec['month']=="may") { ?> selected="selected" <?php } ?>>May</option>
                   <option value="jun" <?php if($rowselrec['month']=="jun") { ?> selected="selected" <?php } ?>>June</option>
                   <option value="july" <?php if($rowselrec['month']=="july") { ?> selected="selected" <?php } ?>>July</option>
                   <option value="aug" <?php if($rowselrec['month']=="aug") { ?> selected="selected" <?php } ?>>Aug</option>
                   <option value="sept" <?php if($rowselrec['month']=="sept") { ?> selected="selected" <?php } ?>>September</option>
                   <option value="oct" <?php if($rowselrec['month']=="oct") { ?> selected="selected" <?php } ?>>October</option>
                   <option value="november" <?php if($rowselrec['month']=="november") { ?> selected="selected" <?php } ?>>nov</option>
                   <option value="dec" <?php if($rowselrec['month']=="dec
				   "){?> selected="selected" <?php } ?>>December</option>
               </select>             </td>
             </tr>
           <input type="hidden" name="id" value="<?php echo $rowselrec['examid'];  ?>" />
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
            <td>Exam Fee</td>
            <td><input type="text" class="tb5" name="fee" style="width:100px" value="<?php echo $rowselrec['fee'];  ?>" onKeyPress="return isNumberKey(event)"></td>
          </tr>
          <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr> 
          <tr>
            <td></td>
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
            <td>Class<span>*</span></td>
               <td>
               
              <?php
			    $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
			   ?>
			   <select name="class" class="select">
			     <option value="-1">Select Class</option>
			   <?php
			    while($rowclass=mysqli_fetch_array($class))
				{
			  ?>
             
                <option value="<?php echo $rowclass['class']; ?>" > <?php echo $rowclass['class'].$rowclass['class_section'];?></option>
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
            <td>Exam Name<span>*</span></td>
            <td>
              <input type="text" class="tb5" name="name" style="width:250px" value="<?php if(!empty($_POST)) echo $_POST['name']; ?>"  id="txtname" />
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

           
                        <tr>
            <td>Month<span>*</span></td>
            <td>
             <select name="month"  class="select" style="width:250px">
                   <option value="-1">Select Month</option>
                   <option value="January">January</option>
                   <option value="february">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
               </select> 
               </td>
               </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
            <td>Exam Fee<span>*</span></td>
            <td><input type="text" name="fee" class="tb5" style="width:250px" value="<?php if(!empty($_POST)) echo $_POST['fee']; ?>" onKeyPress="return isNumberKey(event)"></td>
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
            <br><br><br><br>
            <div class="box-head">
						<h2 class="left">Exam Available </h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr style="background:#EAECFD; margin:0px 0px 0px 0px; color:#000">
          <td>Id</td>
          <td>Exam</td>
		  <td>Class</td>
		  <td>Month</td>
          <td>Fee</td>
          <td>Session</td>
         <td>Action</td>
       </tr>
       <?php
        $i=1;
		
		   $selrc=mysqli_query($con,"select * from exam_fee where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");	
        
		  while($selstruc=mysqli_fetch_array($selrc))
		  {
		  ?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo ucwords($selstruc['exam_name']);  ?></td> 
	   <td><?php echo ucwords($selstruc['class']);  ?></td>
       <td><?php echo ucwords($selstruc['month']);  ?></td>
	   <td><?php echo $selstruc['fee'];  ?></td>
       <td><?php echo $selstruc['session']; ?></td>  
       <td><a href="<?php echo $var."addexamfee&&id=".$selstruc['examid'];?>" style="color:#FF0000">edit</a>/<a href="<?php echo $var."addexamfee&&did=".$selstruc['examid'];?>" onClick="return confirmation();" style="color:#FF0000">Delete</a></td>  
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>