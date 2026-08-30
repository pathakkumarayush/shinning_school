<?php
date_default_timezone_set('Asia/Kolkata');
include('db.php');
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$dt3=date("Y-m-d H:i:s");
$select=mysqli_query($con,"select * from enquiry_pass where id ='$status1'");
while($row=mysqli_fetch_object($select))
{
$status_var=$row->status;
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=mysqli_query($con,"update enquiry_pass set status='$status_state', percentage='$dt3' where id='$status1'");
if($update)
{
header("Location:https://smarterponline.com/shining/school/?pageid=enquiry_pass");
}
else
{
echo mysqli_error();
}
}
?>
<?php
}
?>