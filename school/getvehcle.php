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
/*
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db("campusinfo",$con);
*/
require_once("../db.php");
$get_vehcle=mysqli_query($con,"select * from rout_allocation where id='".$_GET["id"]."' and school='".$_SESSION['uid']."'");

?>
<?php
$row=mysqli_fetch_array($get_vehcle);
$ex=explode(",",$row['vehcle']);
$ez=explode(",",$row['stopage']);
?>
<select name="stopage" class="select">
<option>Select Stop</option>
<?php
foreach($ez as $et)
{
?>
<option value="<?php echo $et; ?>"><?php echo $et; ?> </option>
<?php
}
?>
</select>

<select name="vehcle" class="select">
<option>Select Vehcle</option>
<?php
foreach($ex as $ey)
{
$seats=mysqli_query($con,"select * from add_vehcles where veh_no='$ey' and school='".$_SESSION['uid']."'");
$rowseats=mysqli_fetch_array($seats);
?>
<option value="<?php echo $ey; ?>"><?php echo $ey." Seats Available->".$rowseats['Rseats']; ?> </option>
<?php
}
?>
</select>