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
<h2>Student List</h2>
<table border="1" cellspacing="0" cellpadding="0" style="width:900px;">
							<tr style="font-weight:bold; color:#000000">
	    <td>Sr</td>
		<td>Name</td>
		<td>Class</td>
        <td>Instalment</td>
        <td>Month</td>
        <td>Total fee</td>
		<td>Fee Paid</td>
        <td>Due</td>
		<td>Date</td>
		<td>Session</td>
       
		
       </tr>
       <?php
      session_start();
	  require_once("../db.php"); 
	 
	  
	  echo $_GET['stdid'];
	  
	  $search2=mysqli_query($con,"select * from student where student_id='".$_GET['stdid']."'");
	  $stud=mysqli_fetch_array($search2);
	  
	  
	  
	  $search1=mysqli_query($con,"select * from class where class_id='".$_GET['class']."'");
	 
	  $studro=mysqli_fetch_array($search1);
	   
	
	   
	   $i=1;
	   
	   $search=mysqli_query($con,"select * from fee_detail where class ='".$studro['class']."' and student ='".$_GET['stdid']."' ");
	  
	
		
		
		while($studrow=mysqli_fetch_array($search))
		
		
		 
		{
	     ?>	
      <tr style="color:#000000">
      <td><?php echo $i;  ?></td>
      <td><?php echo ucwords($stud['student_name']);?></td>
	  <td><?php echo ucwords($studrow['class']);?></td>
	  <td><?php echo ucwords($studrow['instalment']);?></td>
	  <td><?php echo ucwords($studrow['month']);?></td>
	  <td><?php echo ucwords($studrow['tamnt']);?></td>
	  <td><?php echo ucwords($studrow['fee_deposit']);?></td>
	  <td><?php echo ucwords($studrow['due']);?></td>
	  <td><?php echo ucwords($studrow['date']);?></td>
	  <td><?php echo ucwords($studrow['session']);?></td>
	 
    </tr>
    <?php
    $i++;
	
	
	}
	
	  
	?>
	  <input id="printpagebutton" style="" type="button" value="Print Receipt" onClick="printpage()"/>
	</table>