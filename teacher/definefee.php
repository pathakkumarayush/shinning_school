<script type="text/javascript">
 function validate()
{
 if( document.myForm.txtclass.value == "-1" )
   {
     alert( "Please Select Class" );
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<?php
 if(!empty($_GET['did']))
 {
	
	
	 $del2=mysqli_query($con,"delete from definefee where id='".$_GET['did']."'"); 
 $msg="Deleted Successfully";  
 
 }

if(isset($_POST['submit']))
{
 if(empty($_POST['inst']))
 {
   $err="Field Marked With * Are Mandatory";
 }
if(empty($_POST['amnt']))
 {
   $err="Field Marked With * Are Mandatory";
 }

 
if(empty($err))
{ 	
$sel=mysqli_query($con,"select Class from definefee where class='".$_POST['txtclass']."'  and session='".$_SESSION['session']."'");
if(mysqli_num_rows($sel)<1)
{

$queryw=mysqli_query($con,"insert into definefee(class,amnt,no_of_inst,session,transport_inst) values('".$_POST['txtclass']."','".$_POST['amnt']."','".$_POST['inst']."','".$_SESSION['session']."','".$_POST['inst_transport']."')") or die(mysqli_error());
$_SESSION['sumsg']="Inserted Sucessfully";
for($i=1;$i<=$_POST['inst'];$i++)
{
 $inst="Instalment".$i;
 $quru=mysqli_query($con,"insert into instalment(class,instalment,session) values('".$_POST['txtclass']."','".$inst."','".$_SESSION['session']."')");

}


$msg="Inserted Successfully";
}
else
{
 $err="Duplicate Entry";
}
}
}

if(isset($_POST['Update']))
{

$queryupdate=mysqli_query($con,"update definefee set amnt='".$_POST['amnt']."',no_of_inst='".$_POST['inst']."',transport_inst='".$_POST['inst_transport']."' where id='".$_GET['id']."'") or die(mysqli_error());	
$msg="Updated Successfully";
}
?>
<?php

 if(!empty($_GET['id']))
{

$selrc=mysqli_query($con,"select * from definefee  where id='".$_GET['id']."'");	
$rowselrec=mysqli_fetch_array($selrc);	
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
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Define Fee</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Define Fee</a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                
       
	     <?php
      if(!empty($msg))
	  {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
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
            
           <td>Select Class </td>
           <td><?php echo $rowselrec['class'];   ?></td>
              		
         </tr>
          </tr>
         <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Amount<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="amnt" style="width:250px" value="<?php echo $rowselrec['amnt'];   ?>"  id="txtname"  />
             </td>
          </tr>
	   
	   
	      <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>No Of Instalment<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="inst" style="width:250px"  id="txtname" value="<?php echo $rowselrec['no_of_inst']; ?>" />
             </td>
          </tr>
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Instalment For Transport Fee</td>
            <td>
             <input type="text" class="tb5" name="inst_transport" style="width:250px"  id="txtname" value="<?php echo $rowselrec['transport_inst']; ?>" />
             </td>
          </tr>
	   
	      <tr>
            <td></td>
            <td><input  type="submit" name="Update"  value="Submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     
        <?php
		   }
		   else
		   {
		   ?>
          
        <table border="0" style="margin:80px 0px 0px 20px; font-size:18px">
          <tr>
            
           <td>Select Class <label style="color:#FF0000">*</label></td>
           <td>
               <?php 
		   if(isset($_GET["upstudid"]))
		   {
			echo $rowstud['student_class'];  
            }
			else
			   {
		  ?>
		     <select name="txtclass" class="select" style="width:250px;"  onchange="showSection(this.value)">
             
	       <option value="-1">Select Class</option>
              
               <?php
        $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
        while($rows=mysqli_fetch_array($res))
        {
            echo "<option>".$rows["class"]."</option>";
        } 
        ?>
             </select>
          <?php
		     }
			 ?>
		   </td>
         </tr>
          </tr>
         <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Amount<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="amnt" style="width:250px"  id="txtname"  />
             </td>
          </tr>
	   
	   
	      <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>No Of Instalment<span>*</span></td>
            <td>
             <input type="text" class="tb5" name="inst" style="width:250px"  id="txtname" value="<?php echo $rowselrec['label_name']; ?>" />
             </td>
          </tr>
		    <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Instalment For Transport Fee</td>
            <td>
             <input type="text" class="tb5" name="inst_transport" style="width:250px"  id="txtname"  />
             </td>
          </tr>
		  
           <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
          <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="Submit" style="width:100px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
      
        <?php
		   }
            ?>
			 </form>
            <br><br>
            <div class="box-head">
						<h2 class="left">Currently Available Fee header</h2>
						</div>
           <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Class</td>
        <td>Amount</td>
        <td>No Of Instalment</td>
        <td>Edit</td>
        <td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from definefee where session='".$_SESSION['session']."' and session='".$_SESSION['session']."'");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	  
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['class']);?></td>
    <td><?php echo $rowmemo['amnt'];?></td>
    <td><?php echo $rowmemo['no_of_inst'];?></td> 
    <td><a style="color:#CC0033" href="<?php echo $var."definefee"."&&id=".$rowmemo['id']; ?>">Edit</a></td>
    <td><a style="color:#CC0033" href="<?php echo $var."definefee"."&&did=".$rowmemo['id']."&dclass=".$rowmemo['class']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
           
         </div>
      
                 
                  
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
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>