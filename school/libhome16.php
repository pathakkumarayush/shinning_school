

<link href="css/style.css" rel="stylesheet" type="text/css" />
<div id="container">
 
	<div class="shell">
		<div id="main">
			<!-- Content -->
			<div id="content">
				<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
				
				    

				
				
				<!-- Box -->
			        <div style="margin-top:15px;" >
				 <table width="871" height="394" border="0"  >
  <tr>
    <td height="91"><table width="899" height="150" border="0">
      <tr>
        <td width="176" height="125"> <img src="css/images/library.png" width="177" height="86" /> </td>
        <td width="574" class="item1" >Library <br />
          <br />
          <span  class="item" > Edit Library card setting </span></td>
        <td width="135" style="font-family:Arial, Helvetica, sans-serif; font-size: 24px; color:#CCCCCC;" ><a href="setting.php"><input type="submit" name="Submit" value="back"  class="buttons" />
            </a> </td>
      </tr>
      <tr>
        <td height="10" colspan="3" style="margin-right:-150px;" >  <hr size="3" color="#FF0000" />  </td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td>
	
 	<?php
   
  	
	require_once("../db.php");
	$crs=$_GET["crs"];
     $qry2="select * from courses where crs='$crs' ";
	 $result2=mysqli_query($con,$qry2);
	 $row2=mysqli_fetch_array($result2);
	?>
	
	<form method="post" action="courseeditsave.php">
	<table width="899" height="148" border="0">
      <tr>
        <td colspan="3" class="box-head" align="center" >Edit library card setting </td>
        </tr>
      <tr class="table" >
        <td width="230">&nbsp;</td>
        <td width="232">Course</td>
        <td width="415"><input class="tb5" type="text" name="crs" value="<?php echo $row2["crs"]; ?>"  readonly="" /></td>
      </tr>
      <tr class="table" >
        <td>&nbsp;</td>
        <td>Category</td>
        <td><input class="tb5" type="text" name="cat" value=" <?php echo $row2["cat"]; ?> "  /></td>
      </tr>
      <tr class="table" >
        <td>&nbsp;</td>
        <td>Books Issuable </td>
        <td><input class="tb5" type="text" name="nob" value=" <?php echo $row2["nob"]; ?> "  /></td>
      </tr>
      <tr class="table" >
        <td>&nbsp;</td>
        <td>Period (in days) </td>
        <td><input class="tb5" type="text" name="prd" value=" <?php echo $row2["prd"]; ?> "  /></td>
      </tr>
      <tr class="table" >
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input  type="submit" name="Submit2" value="update" /></td>
      </tr>
    </table>
	</form>
	
	<?php
	
	mysqli_close($con);
	?>
	<?php
	if(isset($_GET["update"]))
	{
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > Record updated successfully </div>";
	}
	?>
	
	
	</td>
  </tr>
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
<br><br><br><br> 