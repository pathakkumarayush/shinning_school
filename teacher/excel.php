<html>
<head>
<script language="javascript">
function download_report()
{
window.location='report.xls';
}
</script>
</head>
<body alink="#00FF66" link="#00CC00">
<h1 align="center"><a href="javascript:void(0);" onClick="javascript:download_report();">Download Excel Report</a></h1>
<?php
require_once("db.php");
require_once("excelwriter.class.php");
session_start();
$excel=new ExcelWriter("report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class");
$excel->writeLine($myArr);

$gen="male";
$qry=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_class='Nursery'");

if($qry!=false)
{
	$i=1;
	while($res=mysqli_fetch_array($qry))
	{
		$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class']);
		$excel->writeLine($myArr);
		$i++;
	}
}
?>

</body>
</html>