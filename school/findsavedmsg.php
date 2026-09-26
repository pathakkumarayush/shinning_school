<?php
session_start();
include "../db.php";
require_once("mesage.php");
$result=mysqli_query($con,"select * from ".$_GET["tbl"]." where id=".$_GET["id"]."")or die(mysqli_error());
if($row=mysqli_fetch_array($result))
{
?>
    Subject<br/>
    <input type="text" readonly="readonly" id="suba" name="txtsub" style="width:95%;" value="<?php echo $row["sub"]; ?>" /><br/><br/>
    Message<br/>
      <div style="width:95%; min-height:110px; border:1px solid black" id="msg">
      <?php echo replace($row["msg"]); ?>
  </div>
  <?php
}
?>