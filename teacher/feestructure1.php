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
?>
<?php
/*
session_start();

*/
if(isset($_POST['submit']))
{
	 
	/*
	 $a=array();
	 $f=array();
	 $memo1=mysqli_query($con,"Select * FROM fee_structure");
	  while($meta = mysqli_fetch_field($memo1))
	 {
	  if($meta->name!=id)
	 {	 
	   array_push($a,$meta->name);
	 }
	 }
	 $b1=implode(",",$a);
    $memotxt=mysqli_query($con,"select textbox from fee_memo");    
    while($rtxt=mysqli_fetch_array($memotxt))
   {
	$b= $rtxt['textbox'];
	//$d= "$"."_"."POST['".$b."']";
	   // $d= "\".".$d.".\"";
		//$d="'".$d."'";
		array_push($f,$b);
	}
	  $g=array();
	  foreach($f as $f1)
	  {
		$_POST[$f1]="'$_POST[$f1]'";
		  array_push($g,$_POST[$f1]);
	      }
		  $imp= implode(",",$g);
		*/
		   $a=array();	
	 $b=array();
	 foreach($_POST['sub'] as $k=>$v)
	 {	
	  array_push($b,$v);
	  $v= $k."=".$v;	
	  array_push($a,$v);
	  
	 }
	 $sub=implode(",",$a);  
		  $query=mysqli_query($con,"insert into fee_structure(class,session,structure,school) values('".$_POST['class']."','".$_POST['session']."','$sub','".$_SESSION['uid']."')");
		 
		  
		 ?>	
  <script type="text/ecmascript">
	  window.location = "<?php echo $var."feestructure1&&msg=Inserted Sucessfully"; ?>";
	</script>
 
 <?php
          }
		  /*
if(!empty($_GET['id']))
{
$selrc=mysqli_query($con,"select * from feestructure where id='".$_GET['id']."'");	
$numrow=mysqli_num_rows($selrc); 
$rowselrec=mysqli_fetch_array($selrc);	
$selrc1=mysqli_query($con,"select * from fee_structure where class='".$rowselrec['class']."'");	
$numrow=mysqli_num_rows($selrc1); 
$rowselrec1=mysqli_fetch_array($selrc1);
}
if(isset($_POST['submit1']))
{
$sel1=mysqli_query($con,"select * from fee_memo");
while($getfield=mysqli_fetch_array($sel1))
{
	
	$d=substr($getfield['label_name'],0,4);
	$d= $d.$getfield['id'];
    $e= $_POST[$getfield['textbox']];
    $e="'$e'";
	$f= $d."=".$e;
     $k=array();
	 array_push($k,$f);
	 $l=implode(",",$k);
   $queryupdate=mysqli_query($con,"update fee_structure set $l where id='".$_POST['id']."'") or die(mysqli_error());
   $queryupdate1=mysqli_query($con,"update fee_structure set ldate='".$_POST['ldate']."',penality='".$_POST['penality']."' where id='".$_POST['id']."'") or die(mysqli_error());	
  }

?>
<script type="text/javascript">
   window.location="<?php echo $var."feestructure1"."&&id=".$_POST['id1']; ?>";
   </script>
<?php
}
*/
$selrc=mysqli_query($con,"select * from feestructure where id='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");	

$numrow=mysqli_num_rows($selrc); 
 $rowselrec=mysqli_fetch_array($selrc);
//$rowselrec=mysqli_fetch_array($selrc);	
//$selrc1=mysqli_query($con,"select * from fee_structure where class='".$rowselrec['class']."'");	
//$numrow=mysqli_num_rows($selrc1); 
//$rowselrec1=mysqli_fetch_array($selrc1);

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
     if(!empty($_GET['msg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['msg']; ?></div>
		  <?php
		   }
	       ?>
     <?php
     if(!empty($_GET['dmsg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['dmsg']; ?></div>
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
		    if(!empty($_GET['id']))
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
            <td>Class<span class="textfieldRequiredMsg">*</span></td>
            <td><input type="text" name="class" value="<?php echo $rowselrec['class'];  ?>" class="tb5" style="width:80px" readonly="readonly" /></td>
          </tr>
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
		  <?php
		  /*
		   $a=explode(",",$rowselrec['header']);
		   foreach($a as $b)
		   {
		   $memo=mysqli_query($con,"select * from fee_memo where id='$b'");
		   $rowmemo=mysqli_fetch_array($memo);
		   
			 $d=substr($rowmemo['label_name'],0,4);
		    $d=$d.$rowmemo['id'];
		*/
		
		 
			  $b= explode(",",$rowselrec['header']);
			  foreach($b as $c)
			  {
			 $header=mysqli_query($con,"select * from fee_memo where id='$c'");
	         $headname=mysqli_fetch_array($header);
		?>
       
           
          <tr>
            <td><?php echo ucwords($headname['label_name']);?></td>
            <td><input type="text" name="sub[<?php echo $headname['label_name'];?>]" onKeyPress="return isNumberKey(event)" class="tb5"  style="width:100px" /></td>
          </tr>
          
          <input type="hidden" name="id" value="<?php echo $rowselrec['id']; ?>">
          <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
          </tr>
         <?php
			  
		   }
		   ?>
          <tr>
             
           <tr>
            <td></td>
            <td><input  type="submit" name="submit"  value="Submit" style="width:100px; height:25px; margin-bottom:10px;" /></td>
          </tr>
         
        </table>     
    
        <?php
		   }
		   ?>
            <br><br>
            <div class="box-head">
						<h2 class="left">Classwise Fee Structure</h2>
						
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
		   $selrc=mysqli_query($con,"select * from fee_structure where class='$class' and school='".$_SESSION['uid']."'");	
           $num=mysqli_num_rows($selrc);
		   $selstruc=mysqli_fetch_array($selrc); 

	  	?>
   <tr>  
	   <td><?php echo $i; ?></td>  
       <td><?php echo $meta['class']; ?></td> 
       <td><?php echo $selstruc['structure']; ?></td>
       <td><?php echo $selstruc['session']; ?></td>  
       <td>
	   <?php
	     if($num>0)
		 {
	   ?>
	   <a href="<?php echo $var."feestructure1&&did=".$selstruc['id'];?>" onClick="return confirmation();" style="color:#FF0000">Delete</a></td>  
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
<?php
  if(!empty($_GET['id']))
  {
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
 }
 else
   { 
   ?>
   <br><br><br><br><br><br>
   <?php
   }
?>