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
                    filename: "Enquiry details("+file_name+")", //do not include extension
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
		<td>Student Name</td>
        <td>Father Name</td>
        <td>Class</td>
        <td>Mobile</td>
       </tr>
      <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
        $search=mysqli_query($con,"select * from enquiry where session='".$_GET['ses']."'");
		
		while($studrow=mysqli_fetch_array($search))
		{
	     ?>	
    <tr style="color:#000000">
	<td><?php echo $i;?></td>
    <td><?php echo ucwords($studrow['name']);?></td>
	<td><?php echo ucwords($studrow['fname']);?></td>
	<td><?php echo ucwords($studrow['aclass']);?></td>
	<td><?php echo ucwords($studrow['mobile']);?></td>
	
    
    </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
	</table>