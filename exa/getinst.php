<style type="text/css">
.select {
     -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    -khtml-border-radius: 20px;
    border-radius: 20px;
}
</style>
<?php
session_start();
require_once("../db.php");

?>     
	<?php
				  $class2=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_GET['id']."'");
				  
$rclass=mysqli_fetch_array($class2);
				$selrc=mysqli_query($con,"select * from definefee where  session='".$_SESSION['session']."' and class='".$rclass['class']."'");
              
			  $rowselrec=mysqli_fetch_array($selrc);
				?>
				
				<td> 
				  <select name="instalment">
				  <?php
				     for($i=1;$i<=$rowselrec['no_of_inst'];$i++)
					 {
				  ?>
				  <option value="Instalment<?php echo $i;  ?>">Instalment<?php echo $i;  ?></option>
				 <?php
				   }
				 ?>
				  </select>
				</td>