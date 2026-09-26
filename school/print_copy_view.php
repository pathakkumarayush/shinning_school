<?php
session_start();
require_once("../db.php"); 
?>
<table border="1" id="sample_1" cellspacing="0" cellpadding="0" style="width:900px;">
		<tr align="center">
	    <td colspan="5" style="color:#006633;font-weight:bold;">
		<span align="center" style="margin-top:20px;">Shining Middle School Raisen (M.P.)</span><br />
		Exam - <?php echo $_GET['exam'] ?>, Subject - <?php echo $_GET['subject'] ?>
        </td>
		</tr>	
		
		
		<tr style="font-weight:bold; color:#000000">
		<td align="center">Sr</td>
		<td>Student Name</td>
		<td>Father Name</td>
		<td align="center">Class</td>
        <td align="center">Status</td>
       </tr>
<?php
$i=1;
$searcha=mysqli_query($con,"select * from student where student_class='".$_GET['class']."' and student_session='".$_GET['ses']."' and status='0' order by student_name Asc");
while($studrow=mysqli_fetch_array($searcha))
{
$student_id = $studrow['student_id'];
		$k++;
	?>	
    <tr style="color:#335599">
    <td style="width:50px;" align="center"><?php echo $i; ?></td>
	<td style="width:200px;"><?php echo ucwords($studrow['student_name']);?></td>
	<td style="width:200px;"><?php echo ucwords($studrow['student_fname']);?></td>
	<td style="width:100px;" align="center"><?php echo ucwords($studrow['student_class']);?></td>
    <td style="text-transform:capitalize;" align="center">
	<?php
	$search22=mysqli_query($con,"select * from exam_copy_collection where session='".$_GET['ses']."' and student='$student_id' and exam='".$_GET['exam']."' and subject='".$_GET['subject']."' ");
	$absrow=mysqli_fetch_array($search22);
	$absrow['absent'] = $absrow['absent'] ?? '';
	if($absrow['absent']=='')
	{
	echo $att = 'Present';
	}
	else
	{
	?>
	<span style="color:#CC0000;">
	<?php
	echo $att = $absrow['absent'];
	}
    ?>
	</span>
	</td>
  
	</tr>
    <?php
    $i++;
	}
	?>
	
	<tr style="font-weight:bold;">
	    <?php  
		$maxcls=mysqli_query($con,"select count(student_id) from student where student_class='".$_GET['class']."' and student_session='".$_GET['ses']."' and status='0'");
        $maxrowcls=mysqli_fetch_array($maxcls);
		$total_std = $maxrowcls['count(student_id)'];
		?>
		
		<?php  
		$maxabs=mysqli_query($con,"select count(student) from exam_copy_collection where class='".$_GET['class']."' and session='".$_GET['ses']."' and exam='".$_GET['exam']."' and subject='".$_GET['subject']."'");
        $maxrowabs=mysqli_fetch_array($maxabs);
		$total_abs = $maxrowabs['count(student)'];
		?>
		
	<td colspan="2">Total Student : <?php echo $total_std; ?></td>
	<td colspan="2">Total Collect Copy : <?php echo $total_std-$total_abs; ?></td>
	<td colspan="2">Total Absent Copy : <?php echo $total_abs; ?></td>
	</tr>

	 
	</table>