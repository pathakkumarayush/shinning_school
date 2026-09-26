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
          <span  class="item" >View books </span></td>
        <td width="135" style="font-family:Arial, Helvetica, sans-serif; font-size: 24px; color:#CCCCCC;" ><a href="library.php"><input type="submit" name="Submit" value="back"   class="buttons" />
            </a> </td>
      </tr>
      <tr>
        <td height="10" colspan="3" style="margin-right:-150px;" >  <hr size="3" color="#FF0000" />   </td>
      </tr>
    </table></td>
    </tr>
  <tr>
    <td>
     <form method="post" action="">
	<table width="902" height="176" border="0"  >
	<?php
	$bookno=$_GET["bookno"];
	require_once("../db.php");
	$qry="select * from addbook where bookno='$bookno' ";
	$result=mysqli_query($con,$qry);
	while($row=mysqli_fetch_array($result))
	{
		  
	?>
      <tr>
        <td width="47">&nbsp;</td>
        <td width="228">Title</td>
        <td width="162"><input class="tb5" type="text" name="textfield" value="<?php echo $row["title"];  ?> "  readonly="" /></td>
        <td width="207">Authore</td>
        <td width="224"><input class="tb5" type="text" name="textfield2" value="<?php echo $row["authore"];  ?> "   readonly="" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Book number </td>
        <td><input class="tb5" type="text" name="textfield3" value="<?php echo $row["bookno"];  ?> "  readonly=""  /></td>
        <td>Book status </td>
        <td><input class="tb5" type="text" name="textfield4"  value="<?php if($row["status"]=='0') { echo "avaliable"; } else { echo "borrowed"; } ?> "  readonly=""  /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Tag list </td> 
        <td><input class="tb5" type="text" name="textfield5"   value="<?php echo $row["tags"];  ?> "  readonly="" /></td>
        <td>No of copies </td>
        <td><input class="tb5" type="text" name="textfield6"  value="<?php echo $row["noofcopies"];  ?> "  readonly="" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	</form>
	</td>
  </tr>
  <?php
  }
  mysqli_close($con);
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
<br><br><br><br> 