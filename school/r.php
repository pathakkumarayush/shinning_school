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
                var file_name = $("#cls").val();
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Student List("+file_name+")", //do not include extension
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
		
        </td>
		</tr>	
		<tr style="font-weight:bold; color:#000000">
		<td>Sr</td>
		<td>Adm No</td>
		<td>Roll No</td>
		<td>Student Name</td>
        <td>Father Name</td>
		<td>Class</td>
		<td>Session</td>
      
       </tr>
      <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
        $search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
		
		
		
		
		while($studrow=mysqli_fetch_array($search))
		{
		$sid = $studrow['student_id'];
		 $rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='".$_SESSION['session']."'");
		$rowno=mysqli_fetch_array($rno);
	     ?>	
    <tr style="color:#000000">
    <td><?php echo $i;  ?></td>
	<td><?php echo ucwords($studrow['student_scholar']);?></td>
	
	<td><?php echo ucwords($studrow['rno']);?></td>
	<td><?php echo ucwords($studrow['student_name']);?></td>
	<td><?php echo ucwords($studrow['student_fname']);?></td>
	<td><?php echo ucwords($studrow['student_class']);?></td>
	<td>2023-2024</td>
    
    </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
	</table>