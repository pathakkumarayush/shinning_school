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
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>PREVIOUS SCHOOL</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
        </tr>
		
		
       </tr>
       <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
	    if($_GET['status'] == "0")
		{
	    $search=mysqli_query($con,"select * from reg where session='".$_SESSION['session']."' ");
		}else{
		$search=mysqli_query($con,"select * from reg where status='".$_GET['status']."' and  session='".$_SESSION['session']."' ");
	    }
		while($studrow=mysqli_fetch_array($search))
		{
	     ?>	
      <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['student_name'];?></td>
        <td><?php echo $studrow['student_fname'];?></td>
	    <td><?php echo $studrow['m_name'];?></td>
	    <td><?php echo $studrow['student_class'];?></td>
	    <td><?php echo $studrow['student_dob'];?></td>
	    <td><?php echo $studrow['nat'];?></td> 
	    <td><?php echo $studrow['religion'];?></td> 
		<td><?php echo $studrow['fmobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['state'];?></td> 
        </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <input id="printpagebutton" style="" type="button" value="Print Receipt" onClick="printpage()"/>
	</table>