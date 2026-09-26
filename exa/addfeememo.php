<script type="text/javascript">
 function validate()
{
 if( document.myForm.feetype.value == "-1" )
   {
     alert( "Please Select Feetype" );
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<?php

if(isset($_POST['Register']))
{
 if(empty($_POST['t_name']))
 {
   $err="Head Already Exist";
 }
 
if(empty($err))
{ 	
$sel=mysqli_query($con,"select label_name from fee_memo where label_name='".$_POST['t_name']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
if(mysqli_num_rows($sel)<1)
{
$_POST['t_name']= strtolower($_POST['t_name']);	
$queryw=mysqli_query($con,"insert into fee_memo(session,label_name,feetype,school) values('".$_SESSION['session']."','".$_POST['t_name']."','".$_POST['month']."','".$_SESSION['uid']."')") or die(mysqli_error());
  $lbl= str_replace(' ', '_', $_POST['t_name']);

$insertfld=mysqli_query($con,"ALTER TABLE fee_detail ADD $lbl VARCHAR(60)");
/*
$id=mysqli_insert_id();
$textn="t".$id;
$queryw=mysqli_query($con,"update fee_memo set textbox='$textn' where id='$id' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'") or die(mysqli_error());
$field=$_POST['t_name'];
$field=substr($field,0,4);
$field=$field.$id;
$insert=mysqli_query($con,"ALTER TABLE  `fee_detail` ADD  `$field` VARCHAR( 100 )  NULL ");
$insert1=mysqli_query($con,"ALTER TABLE `fee_structure` ADD `$field` VARCHAR( 100 )  NULL ");
*/
$_SESSION['sumsg']="Inserted Sucessfully";
}
else
{
 $err="This Title Name Already Exist";
}
}
}
if(!empty($_GET['id']))
{

$selrc=mysqli_query($con,"select * from fee_memo where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
	}
if(isset($_POST['update']))
{
$_POST['t_name']= strtolower($_POST['t_name']);
$queryupdate=mysqli_query($con,"update fee_memo set label_name='".$_POST['t_name']."',feetype='".$_POST['feetype']."' where id='".$_POST['id']."'") or die(mysqli_error());	
?>
 <script type="text/ecmascript">
	  window.location = "<?php echo $var."addfeememo&&uid=Update Sucessfully"; ?>";
	</script>
<?php
}
?>
<?php
 if(!empty($_GET['did']))
 {
	/*
	 $sel3=mysqli_query($con,"select label_name from fee_memo where id='".$_GET['did']."'");
	 $r_sel=mysqli_fetch_array($sel3);
	 $name=substr($r_sel['label_name'],0,4);
	 $name=$name.$_GET['did'];
	 $dcl1=mysqli_query($con,"ALTER TABLE  `fee_detail` DROP `$name`"); 
	 */
	 $del2=mysqli_query($con,"delete from fee_memo where id='".$_GET['did']."'"); 
   ?>	
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."addfeememo&&dmsg=Deleted Sucessfully"; ?>";
	</script>
 
 <?php
	 /*
	 $dcl1=mysqli_query($con,"ALTER TABLE  `fee_structure` DROP `$name`");

 */
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
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Add Header</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                
       
	     <?php
      if(!empty($_GET['dmsg']) && empty($err) && empty($_SESSION['sumsg']))
	  {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['dmsg']; ?></div>
		  <?php
		   }	
	 if(!empty($_GET['uid']) && empty($err) && empty($_SESSION['sumsg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
    <?php
	          
			 if(!empty($_SESSION['sumsg']) && empty($err))
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
		<?php  } ?>
		<?php				
           if(!empty($_GET['id']))
           {
      ?>
        
        
        <table border="0" style="margin:80px 0px 0px 20px; font-size:18px">
          <tr>
            <td>Fee Head Name<span>*</span></td>
            <td><input type="text" class="tb5" name="t_name" style="width:250px"  id="txtname" value="<?php echo $rowselrec['label_name']; ?>" />
           </td>
          </tr>
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Month<span>*</span></td>
            <td>
              <select name="month"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                      </select>
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          <tr>
            <td></td>
            <td><input  type="submit" name="update"  value="Update" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
        <table border="0" width="600" style="margin:20px 0px 0px 20px; font-size:18px">
            
            <tr>
            <td>Fee Head Name<span>*</span></td>
            <td>
              <input type="text" name="t_name" class="tb5" style="width:250px"  id="txtname" />
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
              <tr>
            <td>Month<span>*</span></td>
            <td>
              <select name="month"  class="select">
                   <option value="Select Month">Select Month</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                      </select>
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
         <tr>
            <td></td>
            <td><input  type="submit" name="Register"  value="Add" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
            <br><br>
            <div class="box-head">
						<h2 class="left">Currently Available Fee header</h2>
						</div>
           <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Head Name</td>
        <td>Fee Type</td>
        <td>Session</td>
       
        <td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from fee_memo where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	  
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['label_name']);?></td>
    <td><?php echo $rowmemo['feetype'];?></td>
    <td><?php echo $rowmemo['session'];?></td> 
    
    <td><a style="color:#CC0033" href="<?php echo $var."addfeememo"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>