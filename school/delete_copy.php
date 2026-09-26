<?php
session_start();
require_once("../db.php"); 
if(isset($_GET['sid']))
{
$sid=$_GET['sid'];
$class=$_GET['class'];
$ses=$_GET['ses'];

$sql = "DELETE FROM exam_copy_collection WHERE student='$sid' and class='$class' and session='$ses'";
mysqli_query($con, $sql);

?>


                <script>
		        alert('Present successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=copy_view';
                </script>

    
<?php
}
?>