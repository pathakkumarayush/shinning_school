
<?php
include('db.php');
if(isset($_GET['sid']))
{
$sid=$_GET['sid'];
$cls=$_GET['class'];
$ses=$_GET['ses'];
$da=$_GET['da'];

$student_class=$_GET['student_class'];
$month=$_GET['month'];
$year=$_GET['year'];
$absent=mysqli_query($con,"insert into absentdetail(student,date,session,class,absent) values('$sid','$da','$ses','$cls','absent')");
?>


                <script>
		        alert('Absent successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=month_attendance&&divid=4&search4=Submit&month1=<?php echo $_GET['month'];?>&year=<?php echo $_GET['year'];?>&class=<?php echo $_GET['student_class'];?>';
                </script>

    
<?php
}
?>