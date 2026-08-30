<?php
session_start();	
require_once("../db.php");
$q=$_GET["q"];
   
        $res=mysqli_query($con,"select distinct(class_section) from class where school='".$_SESSION["uid"]."' and class='$q'");
      ?>
 
   <td><select name="section" style="margin-left:0px">
	   <option>Select Section</option>
	  <?php
	    while($rows=mysqli_fetch_array($res))
        {
           if(!empty($rows["class_section"]))
		   {
		    echo "<option>".$rows["class_section"]."</option>";
        }
		} 
        ?>
		</select></td>