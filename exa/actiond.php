<?php
include('db.php');
if(isset($_GET['sid']))
{
$sid=$_GET['sid'];

$da=$_GET['da'];
$student_class=$_GET['student_class'];
$month=$_GET['month'];
$year=$_GET['year'];
$sql = "DELETE FROM absentdetail WHERE student='$sid' and date='$da'";
mysqli_query($con, $sql);

?>


                <script>
		        alert('Present successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=month_attendance&&divid=4&search4=Submit&month1=<?php echo $_GET['month'];?>&year=<?php echo $_GET['year'];?>&class=<?php echo $_GET['student_class'];?>';
                </script>

    
<?php
}
?>