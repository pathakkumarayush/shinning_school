<?php 
include('config.php');
$countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);
$query="SELECT id,city FROM city WHERE countryid='$countryId' AND stateid='$stateId'";
$result=mysqli_query($con,$query);

?>
<select name="city">
<option>Select City</option>
<?php while($row=mysqli_fetch_array($result)) { ?>
<option value="<?php echo $row['id']?>"><?php echo $row['city']?></option>
<?php } ?>
</select>
