<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>

<table border="1" cellspacing="0" cellpadding="0" style="width:900px;">
							 <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Adm.No</td>
	
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Address</td>
		<td>Father Mobile</td>
		<td>Mother Mobile</td>
		
		
       </tr>
       <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
	   
	    
		$search=mysqli_query($con,"select * from student where student_session='".$_GET['ses']."' and status='1' order by student_name Asc");
		
		while($studrow3=mysqli_fetch_array($search))
		{

	     ?>	
       <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow3['student_scholar'];?></td>
     
	    <td><?php echo ucwords($studrow3['student_name']);?></td>
	    <td><?php echo ucwords($studrow3['student_fname']);?></td>
	    <td><?php echo ucwords($studrow3['m_name']);?></td>
        <td><?php echo $studrow3['student_class'];?></td>
	    <td><?php echo $studrow3['student_dob'];?></td>
	    <td><?php echo $studrow3['student_address'];?></td>
        <td><?php echo $studrow3['student_contactno'];?></td> 
	    <td><?php echo $studrow3['f_tell_no_off'];?></td> 
        </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	
	</table>