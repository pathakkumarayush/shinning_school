<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Record")) { 
        return false;
    }
    
} 
</script>
<?php
if(!empty($_GET['did']))
{ 

$del=mysqli_query($con,"delete from instdetail where class='".$_GET['did']."' and session='".$_SESSION['session']."'"); 
}



 if(isset($_POST['submit']))
 {
 

$b= count($_POST['month']);
 
  $a= array_sum($_POST['inst']);
 
 $classq=mysqli_query($con,"select * from instdetail where  class='".$_POST['class']."' and session='".$_SESSION['session']."'");
 if(mysqli_num_rows($classq)<1)
 {
 if($_POST['no_inst']==$b)
 {
 if($a==$_POST['amnt'])
 {
 foreach($_POST['inst'] as $i=>$v)
 {
 $insttype= "Instalment".$i;
 $query=mysqli_query($con,"insert into instdetail (class,inst_type,amnt,session) values('".$_POST['class']."','$insttype','$v','".$_SESSION['session']."')");
}
  foreach($_POST['month'] as $m=>$v)
  {
    $insttype= "Instalment".$m;
  $upd=mysqli_query($con,"update instdetail set month='$v' where class='".$_POST['class']."' and inst_type='$insttype'");
  }
  
    $msg="Inserted Successfully";
}
else
   {
     $msg="Invalid Instalments ";
   }
   }
   else
     {
	   $msg="Invalid Month ";
	 }
}
else
   {
     $msg="Instalment Already Created For This Class";
   
   }

 }

?>
<script type="text/javascript">
function check(var a)
{
alert("hello");

}

</script>

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

<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/1365164012_data_management.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Define Instalment</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=feecreate_home">Fee Structure</a> >>Define Instalment </a>
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onSubmit="return(validate());">
                  <div class="box-head" style="margin:50px 0px 0px 0px">
						<h2 class="left">Define Instalment</h2>
				   </div>
      
	       <div class="table" style="border:#FF0000 0px solid; height:220px; margin-top:40px; ">
		   <?php
	          
			 if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	       ?>
		 
		 <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
        
		     
			   <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
				
			 ?>
            <td><select name="class1" class="styled">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
          </tr>
		
		   <tr>
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<?php
		  if(!empty($_POST['class1']))
		  {
		?>
	
	<table>
<tr>
<td><b>Sr.No</b></td>
<td><b>Class</b></td>
<td><b>Amount</b></td>
<td><b>Instalment</b></td>
<?php

$selrc=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$_POST['class1']."'");


$rowselrec=mysqli_fetch_array($selrc);
for($i=1;$i<$rowselrec['no_of_inst'];$i++)
{
?>
<td></td>
<?php
}
?>
<td><b>Month</b></td>
</tr>
 <?php
	
$i=1;
$selrc1=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$_POST['class1']."'");

while($rowselrec=mysqli_fetch_array($selrc1))	
{

?>
<tr>
<td><?php echo $i;   ?></td>
<td><?php echo $rowselrec['class'];    ?></td>
<td><?php echo $rowselrec['amnt'];    ?></td>
<?php
for($i=1;$i<=$rowselrec['no_of_inst'];$i++)
{
?>
<td><input type="text" name="inst[<?php echo $i;  ?>]" placeholder="Instalment<?php echo $i;  ?>"     onblur="check("a");"></td>
<td><select name="month[<?php echo $i; ?>]"  class="select">
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
                      </select></td>
<?php
}
?>
 <td><input type="hidden" name="class" value="<?php echo $rowselrec['class'];    ?>">
     <input type="hidden" name="amnt" value="<?php echo $rowselrec['amnt'];    ?>">
	   <input type="hidden" name="no_inst" value="<?php echo $rowselrec['no_of_inst'];    ?>">
 
 </td>
<tr>					  
 <td><input type="submit" name="submit" value="Submit"></td>    
   </tr>             
</tr>
<?php
$i++;
}
?>

</table>
    <?php
	  }
	?>

 <div class="box-head" style="margin:50px 0px 0px 0px">
						<h2 class="left">Instalment detail</h2>
				   </div>
<div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
					
				 
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Class</td>
       
        <td>Instalment</td>
        
        <td>Delete</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select distinct(class) from instdetail where session='".$_SESSION['session']."' ");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	  $memo1=mysqli_query($con,"select * from instdetail where session='".$_SESSION['session']."' and class='".$rowmemo['class']."' ");
	  
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo ucwords($rowmemo['class']);?></td>
   
    <td>
	      <?php while($r_month=mysqli_fetch_array($memo1))
		        {
				  echo "<b>".ucwords($r_month['inst_type'])."</b> : ".$r_month['amnt']."&nbsp; in ".$r_month['month']."&nbsp;";
				} 
		      ?>     
	
	</td> 
  
    <td><a style="color:#CC0033" href="<?php echo $var."defineinstalment"."&&did=".$rowmemo['class']; ?>" onClick="return confirmation();">Delete</a></td>
    </tr>
    <?php
    $i++;
	}
	?>
	
	</table>
				 
				 
				 
				 
				   </div>
           </form>
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