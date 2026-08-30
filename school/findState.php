<?php 
include('config.php');
$bank=intval($_GET['bank']);
$query="SELECT id,acc_no FROM state WHERE bankid='$bank'";
$result=mysqli_query($con,$query);

?>
<select name="acc_no" class="select" onchange="getCity(<?php echo $bank?>,this.value)" style="margin-left:110px;width:150px;">
<option>Select State</option>
<?php while ($row=mysqli_fetch_array($result)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['acc_no']?></option>
<?php } ?>
</select>
