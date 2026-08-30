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
	    <td>Mobile</td>
		<td>Follow Date</td>
				  <td>Conversation</td>
				  <td>Status</td>
				  <td>Next Date</td>
				  <td>Mode</td>
				  <td>Remarks</td>
		
		
       </tr>
       <?php
      session_start();
	  require_once("../db.php"); 
	  $i=1;
	
	   
	    $search=mysqli_query($con,"select * from follow_up where eno='".$_GET['eno']."' ");
		
		while($studrow=mysqli_fetch_array($search))
		{
	
	     ?>	
       <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['name'];?></td>
        <td><?php echo $studrow['fname'];?></td>
	    <td><?php echo $studrow['mname'];?></td>
	    <td><?php echo $studrow['class'];?></td>
	    <td><?php echo $studrow['dob'];?></td>
		<td><?php echo $studrow['fmobile'];?></td> 
	
		<td><?php echo $studrow['date'] ?></td>
		<td><?php echo $studrow['decs'] ?></td>
        <td><?php echo $studrow['status'] ?></td>
		<td><?php echo $studrow['ndate'] ?></td>
		<td><?php echo $studrow['mof'] ?></td>
		<td><?php echo $studrow['rmk'] ?></td>
        </tr>
    <?php
    $i++;
	
	}
	
	  
	?>
	  <input id="printpagebutton" style="" type="button" value="Print Receipt" onClick="printpage()"/>
	</table>