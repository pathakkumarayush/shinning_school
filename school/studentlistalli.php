<?php
session_start();
require_once("../db.php"); 
?>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Student details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
<table border="1" id="sample_1" cellspacing="0" cellpadding="0" style="width:900px;">
		<tr align="center">
	    <td colspan="19">
		<span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br />
		<span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Inactive Student List</span>
        </td>
		</tr>	
		<tr style="font-weight:bold; color:#000000">
		<td>Sr</td>
		<td>Roll No.</td>
		<td>Adm. No</td>
		
        <td>Student Name</td>
        <td>Father Name</td>
        <td>Mother Name</td>
		<td>Class</td>
        <td>D.O.B</td>
		<td>D.O.A</td>
		<td>F-Mobile</td>
		<td>Adhar No</td>
		<td>Family id</td>
		<td>SSSM ID</td>
		
		<td>Gender</td>
		<td>Category</td>
		
		<td>Address</td>
		<td>Bank/Branch</td>
		<td>Account No</td>
		<td>IFSC Code</td>
       </tr>
      <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
        $search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and status='3' order by student_class,student_name Asc");
		
		while($studrow=mysqli_fetch_array($search))
		{
		$sid = $studrow['student_id'];
	
        $rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='".$_SESSION['session']."'");
		$rowno=mysqli_fetch_array($rno);
	     ?>	
    <tr style="color:#000000">
    <td><?php echo $i;  ?></td>
		<td><?php echo ucwords($rowno['rno']);?></td>
    <td><?php echo ucwords($studrow['student_scholar']);?></td>
	
	<td><?php echo ucwords($studrow['student_name']);?></td>
	<td><?php echo ucwords($studrow['student_fname']);?></td>
	<td><?php echo ucwords($studrow['m_name']);?></td>
	<td><?php echo ucwords($studrow['student_class']);?></td>
	<td><?php echo ucwords($studrow['student_dob']);?></td>
	<td><?php echo ucwords($studrow['student_doj']);?></td>
	<td><?php echo ucwords($studrow['student_contactno']);?></td>
	<td><?php echo ucwords($studrow['student_rollno']);?></td>
	<td><?php echo ucwords($studrow['family_id']);?></td>
	<td><?php echo ucwords($studrow['religion']);?></td>
   
	<td><?php echo ucwords($studrow['student_gender']);?></td>
	<td><?php echo ucwords($studrow['caste']);?></td>

	<td><?php echo ucwords($studrow['student_address']);?></td>
	<td><?php echo ucwords($studrow['bank']);?></td>
	<td><?php echo ucwords($studrow['mother_tong']);?></td>
	<td><?php echo ucwords($studrow['fid']);?></td>
	
    
    </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
	</table>