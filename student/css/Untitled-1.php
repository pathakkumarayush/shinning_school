<table class="tbl"  border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;" >
<tr>
<td colspan="3">
    <img src="../school/upload/<?php echo $studrow['student_img'];  ?>" style="height:90px;  margin-left:17px; width:90px; margin-top:4px; " />
	<br />
	</td>
</tr>	

<tr style="height:40px; margin-left:20px;">
<td style=" width:80px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Name:</td><td> <?php echo $studrow['student_name']; ?></td>
<td>Class:</td><td> <?php echo $studrow['student_class']; ?></td>
<td>D.O.B:</td><td> <?php echo $studrow['student_dob']; ?></td>
</tr>  

<tr style="height:40px; margin-left:20px;">
<td style=" width:80px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Caste:</td><td> <?php echo $studrow['caste']; ?></td>
<td>Gender:</td><td> <?php echo $studrow['student_gender']; ?></td>
<td>Mobile:</td><td> <?php echo $studrow['student_contactno']; ?></td>
</tr>  

<tr style="height:40px; margin-left:20px;">
<td style=" width:80px; margin-left:20px;">&nbsp;&nbsp;&nbsp;&nbsp;Father:</td><td> <?php echo $studrow['student_fname']; ?></td>
<td>Mother:</td><td> <?php echo $studrow['m_name']; ?></td>
<td>SSSM ID:</td><td> <?php echo $studrow['student_contactno']; ?></td>
</tr>
</tr>
</table>
<table  border="0" cellspacing="0" cellpadding="0" >
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;Address:</td><td> <?php echo $studrow['student_address']; ?></td>

</tr>
	
</table>