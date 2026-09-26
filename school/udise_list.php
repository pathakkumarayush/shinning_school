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
<table border="1" id="sample_1" cellspacing="0" cellpadding="0" style="width:1000px;">
		<tr>
	    <td colspan="19">
		<span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">
		<?php  
		
		$maxcls=mysqli_query($con,"select count(student_id) from student where student_class='".$_GET['student_class']."' and student_session='".$_SESSION['session']."' and status='0'");
        $maxrowcls=mysqli_fetch_array($maxcls);
		?>
		Total Student - <?php echo $maxrowcls['count(student_id)']; ?>
		</span><br />
        </td>
		</tr>	
		
		<tr align="center">
	    <td colspan="19">
		<span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Shining Public Hr. Sec. School Raisen (M.P.)</span><br />
		<span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">Education Portal / U-Dise Portal Students Matching</span>
        </td>
		</tr>	
		<tr style="font-weight:bold; color:#000000">
		<td align="center">Sr</td>
		<td>&nbsp;Adm. No</td>
		<td>&nbsp;Student Name</td>
        <td>&nbsp;Father Name</td>
        <td>&nbsp;Mother Name</td>
		<td>&nbsp;Class</td>
		<td>&nbsp;Education Portal</td>
        <td>&nbsp;Udise Portal</td>
       </tr>
      <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
        $search=mysqli_query($con,"select * from student where student_class='".$_GET['student_class']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
		
		while($studrow=mysqli_fetch_array($search))
		{
		$sid = $studrow['student_id'];
	
        $rno=mysqli_query($con,"select * from udise_portel where student='$sid' and session='".$_SESSION['session']."'");
		$rowno=mysqli_fetch_array($rno);
		
	     ?>	
    <tr style="color:#000000">
    <td align="center"><?php echo $i;  ?></td>
    <td>&nbsp;<?php echo ucwords($studrow['student_scholar']);?></td>
	<td>&nbsp;<?php echo ucwords($studrow['student_name']);?></td>
	<td>&nbsp;<?php echo ucwords($studrow['student_fname']);?></td>
	<td>&nbsp;<?php echo ucwords($studrow['m_name']);?></td>
	<td>&nbsp;<?php echo ucwords($studrow['student_class']);?></td>

   
 
	<td align="center"><?php echo $rowno['edu'];?></td>
	<td align="center"><?php echo $rowno['udise'];?></td>
	
    
    </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
	</table>