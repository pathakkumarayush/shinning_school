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
	    $search=mysqli_query($con,"select * from enquiry where session='".$_SESSION['session']."' ");
		}else{
		$search=mysqli_query($con,"select * from enquiry where status='".$_GET['status']."' and  session='".$_SESSION['session']."' ");
	    }
		while($studrow=mysqli_fetch_array($search))
		{
	     ?>	
     <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['name'];?></td>
        <td><?php echo $studrow['fname'];?></td>
	    <td><?php echo $studrow['mname'];?></td>
	    <td><?php echo $studrow['aclass'];?></td>
	    <td><?php echo $studrow['dob'];?></td>
	    <td><?php echo $studrow['pclass'];?></td> 
	    <td><?php echo $studrow['percentage'];?></td> 
		<td><?php echo $studrow['mobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['st'];?></td> 
        </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <input id="printpagebutton" style="" type="button" value="Print Receipt" onClick="printpage()"/>
	</table>