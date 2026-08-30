<?php
 session_start();
 require_once("../db.php"); 
?>
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

	  <input id="printpagebutton" style="" type="button" value="Print Pass" onClick="printpage()"/>
	
	
	<div style="width:442px; height:340px; background-color:#FFFF99; border:4px #339933 solid;">
	<div style="width:100%;">
	<img src="shining.png" style="width:440px;" />
	
	</div>
	<div style="width:100%; margin-top:2px; height:10px; background-color:#339933"></div>
	  <?php
      $i=1;
	
        $search=mysqli_query($con,"select * from enquiry_passs where id='".$_GET['id']."'");
		
		while($studrow=mysqli_fetch_array($search))
		{
		 $cls=mysqli_query($con,"select * from class where class_id='".$studrow['student']."'");
		 $crow=mysqli_fetch_array($cls);
	   ?>	
	
	<div style="width:100%;margin-top:2px; height:auto">
	<div style="float:left; width:28%; margin-left:5px;">Student Name</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['fn']);?></div>
	</div>
    <br clear="all" />
	
	<div style="width:100%;margin-top:2px; height:auto">
	<div style="float:left; width:28%; margin-left:5px;">Class</div><div style="float:left; width:70%;"><?php echo ucwords($crow['class']);?></div>
	</div>
    <br clear="all" />
	
	<div style="width:100%;margin-top:2px; height:auto">
	<div style="float:left; width:28%; margin-left:5px;">Visitor Name</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['name']);?></div>
	</div>
   <br clear="all" />
	<div style="width:100%; height:auto; margin-top:3px;">
	<div style="float:left; width:28%; margin-left:5px;">Meeting Purpose</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['fname']);?>
	(<?php echo $studrow['rmkm']; ?>)
	</div>
	</div>
	
	 <br clear="all" />
	<div style="width:100%; height:auto; margin-top:3px;">
	<div style="float:left; width:28%; margin-left:5px;">Meet With</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['mname']);?>(<?php echo $studrow['rmkw']; ?>)</div>
	</div>
	
	 <br clear="all" />
	<div style="width:100%; height:auto; margin-top:3px;">
	<div style="float:left; width:28%; margin-left:5px;">Mobile</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['mobile']);?></div>
	</div>
     
	  <br clear="all" />
	<div style="width:100%; height:auto; margin-top:3px;">
	<div style="float:left; width:28%; margin-left:5px;">Address</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['address']);?></div>
	</div>
	
	  <br clear="all" />
	<div style="width:100%; height:auto; margin-top:3px;">
	<div style="float:left; width:28%; margin-left:5px;">Date</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['dob']);?></div>
	</div>
	
	 <br clear="all" />
	<div style="width:100%; height:auto; margin-top:3px;">
	<div style="float:left; width:28%; margin-left:5px;">Time</div><div style="float:left; width:70%;"><?php echo ucwords($studrow['pclass']);?></div>
	</div>
	
	 
	 <br clear="all" />
	<div style="width:100%; margin-top:2px; height:5px; background-color:#339933"></div>
	<div style="float:right; margin-right:20px;">
	<br clear="all" />
	Signature
	</div>
	 <?php
    $i++;
	
	}
	
	  
	?>
	
	</div>
	
	