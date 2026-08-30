<?php
session_start();

if(isset($_POST['submit']))
{
$_SESSION['session']=$_POST['session'];
?>
<script type="text/javascript">
window.location="../";
</script>
<?php
}

?>

<!DOCTYPE html>
<html>
<head>

	<!--Meta tags-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--Title-->
	<title>Pop Up Modal Window</title>
		
	<!--Stylesheets-->
	<link rel="stylesheet" href="css/styles.css">

	<!--HTML5 Shiv-->
	<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript">
 function validate()
{
 if( document.myForm.session.value == "-1" )
   {
     alert("Please Select Session");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
</head>
<body>




<div id="modal">
	<div id="heading">
	
		Please select Session
	
		
	</div>

	<div id="content" style="border:#FF0000 0px solid" >
		
          <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
    <select name="session" class="select" style="margin-left:120px; margin-top:20px">
             
            
           
           <?php  for($i=2026;$i<=2027;$i++)
			  {  ?>
            <?php $j=$i; $j++;  $k=$i."-".$j; ?>
            <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
            <?php } ?>
            
           </select>
 
 <br><br> <br><br> 
		
          <input type="submit" name="submit" value="Submit" class="button green close" style="margin-left:110px">
		</form>
		</div>
</div>



	<!--jQuery-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.reveal.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#modal').ready(function(e) { // Button which will activate our modal
			   	$('#modal').reveal({ // The item which will be opened with reveal
				  	animation: 'fade',                   // fade, fadeAndPop, none
					animationspeed: 600,                       // how fast animtions are
					closeonbackgroundclick: false,              // if you click background will modal close?
					dismissmodalclass: 'open'    // the class of a button or element that will close an open modal
				});
			return false;
			});
		});
	</script>

</body>
</html>



