<?php
session_start();
require_once("../db.php"); 
?>
<table border="1" id="sample_1" cellspacing="0" cellpadding="0" style="width:900px;">
			<tr align="center">
	    <td colspan="19">
		<span align="center" style="margin-top:20px; color:#000;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br />
		<span align="center" style="margin-top:20px; color:#000;font-weight:bold;">Class Subject Teacher Details</span>
        </td>
		</tr>	
		<tr style="font-weight:bold" style="line-height:25px;" align="center">
	    <td align="center">Sr</td>
        <td>Class</td>
		<td>Subject</td>
		<td>Teacher</td>
		<td>User Name</td>
	    <td>Password</td>
       
        </tr>
     <?php
    $memo=mysqli_query($con,"select * from class_teacher_sub where teacher_session='".$_SESSION['session']."' ORDER BY class ASC");
		
    $i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#000; line-height:25px;">
    <td align="center"><?php echo $i;  ?></td>
    <td>&nbsp;<?php echo ucwords($rowmemo['class'])."&nbsp;".$rowmemo['class_section'];?></td>
	<?php 
	$memom=mysqli_query($con,"select * from teacher where uid='".$rowmemo['teacher']."'");
	$rows1=mysqli_fetch_array($memom);
	 $rows1['teacher_name'];
	?>
	
    <td>&nbsp;<?php echo $rowmemo['sub'];?></td>
    <td>&nbsp;<?php echo $rows1['teacher_name'];?></td>
	<?php 
	$uid = $rowmemo['teacher'];
    $cls=mysqli_query($con,"select * from login where uid='$uid'");
	$rowcls=mysqli_fetch_array($cls);
	?>
	
	  
	   <td>&nbsp;<?php echo $rowcls['uid']; ?></td>
	   <td align="center"><?php echo $rowcls['pass'];?></td>
    </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	
	</table>