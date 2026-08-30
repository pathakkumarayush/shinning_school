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
                    filename: "Student Renew Book details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
<table class="table table-bordered"  border="1" cellpadding="0" cellspacing="0" id="sample_1" style="font-size:14px;" width="1141px">
               
                  <tr style="background-color:#009933; color:#FFFFFF">
                  <td>No.</td>
                  <td>Book No</td>
				  <td>Book Name</td>
                  <td>&nbsp;Student Name</td>
				  <td>&nbsp;Student Class</td>
                  <td>&nbsp;Issue date</td>
				  <td>&nbsp;Due date</td>
				   <td>&nbsp;Renew date</td>
				 
			  </tr>
			
			 <?php
	        $sql="select * from renewbook where type='student'";
	         $result_set=mysqli_query($con,$sql);
	         $i=1;
	         while($row=mysqli_fetch_array($result_set))
	         {
		     ?>
               <tr>
                  <td align="center"><?php echo $i;  ?></td>
                  <td align="center"><?php echo $row['bno'] ?></td>
				  <td>&nbsp;<?php echo $row['name'] ?></td>
                  <td >&nbsp;<?php echo $row['sname'] ?></td>
				  <td>&nbsp;<?php echo $row['class'] ?></td>
                   <td><?php echo $row['idate'] ?></td>
				  <td><?php echo $row['ddate'] ?></td>
				  <td><?php echo $row['date'] ?></td>
				  
             </tr>
             <?php
	         $i++;
	         }
	         ?>
         		<tr><td colspan="7"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button></td></tr>
          </table>