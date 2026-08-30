<?php
include('db.php');
$teacher_id = $_REQUEST['teacher_id'];


$del="delete from teacher where teacher_id='$teacher_id'";
mysqli_query($con,$del);
		   echo "<script>
		
			window.location='http://localhost/manorama/school/?pageid=staff_detail';
			</script>";


?>