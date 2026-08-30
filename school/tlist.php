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
                    filename: "Time Table("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
<table border="1" id="sample_1" cellspacing="0" cellpadding="0" style="width:100%;">
						<tr align="center">
		
		 <td colspan="17">
		 <span align="center" style="margin-top:20px; color:#006633;font-weight:bold;">WISDOM WORLD SCHOOL, MANDLA</span><br />
   
		
		
		</td>
		 
		 
	
		</tr>	
						
		<tr style="font-weight:bold; color:#000000; text-transform:uppercase">
		<td>Sr</td>
		<td>Date</td>
        <td>Class</td>
        <td>Subject</td>
        <td>Marks</td>
	    </tr>
       <?php
	$i=1;
	$exam=mysqli_query($con,"select * from exam where examination='".$_GET["exam"]."' and session='".$_SESSION['session']."' order by class,sdate Asc ");
	
	
	while ($exam1=mysqli_fetch_array($exam))
	{ ?>
	<tr <?php if($j%2==1) {?>  bgcolor="#E0FADC"<?php } ?>>
        <td align="center "><?php echo $i; ?></td>
		<td height="30" align="center "><?php echo date("d-m-Y",strtotime($exam1["sdate"])); ?></td>
        <td align="center "><?php echo $exam1["class"]; ?></td>
        <td align="center "><?php echo $exam1["subject"]; ?></td>
		<td align="center "><?php echo $exam1["marks"]; ?></td>
		
        
    </tr>
        <?php $i=$i+1; $j=&$i; } ?>
	<tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr> 
	</table>