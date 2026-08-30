<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysqli_query($con,"SELECT DISTINCT class FROM class where school='".$_SESSION['uid']."'") 
	or die(mysqli_error());

	  while($tier = mysqli_fetch_array( $result)) 
  
		{
			if(!empty($_GET['id']))
            {
				$updtime=mysqli_query($con,"SELECT * FROM timetable where id='".$_GET['id']."'");
                $rowupd=mysqli_fetch_array($updtime);
          ?>
          <option value="<?php echo $tier['class']; ?>" <?php if($rowupd['class_id']==$tier['class']){ ?> selected="selected"<?php } ?>><?php echo $tier['class'];?></option>
          
		  <?php
			}
			else
			{
			echo '<option value="'.$tier['class'].'">'.$tier['class'].'</option>';
			}
		}

}

//**************************************
//     First selection results     //
//**************************************
if($_GET['func'] == "drop_1" && isset($_GET['func'])) { 
session_start();

   drop_1($_GET['drop_var']); 

}

function drop_1($drop_var)
{  

   session_start();
   $_SESSION['gclass']=$drop_var;
    require_once('../db.php');
	$result = mysqli_query($con,"SELECT DISTINCT name FROM subjects WHERE class='$drop_var' and school='".$_SESSION['uid']."'") 
	or die(mysqli_error());
	
	echo '<select name="drop_2" id="drop_2">
	      <option value=" " disabled="disabled" selected="selected">Select Subject</option>';

		   while($drop_2 = mysqli_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['name'].'">'.$drop_2['name'].'</option>';
			}
	
	echo '</select>';
	echo "<script type=\"text/javascript\">
$('#wait_2').hide();
	$('#drop_2').change(function(){
	  $('#wait_2').show();
	  $('#result_2').hide();
      $.get(\"func.php\", {
		func: \"drop_2\",
		drop_var: $('#drop_2').val()
      }, function(response){
        $('#result_2').fadeOut();
        setTimeout(\"finishAjax_tier_three('result_2', '\"+escape(response)+\"')\", 400);
      });
    	return false;
	});
</script>";
}


//**************************************
//     Second selection results     //
//**************************************
if($_GET['func'] == "drop_2" && isset($_GET['func'])) { 
   drop_2($_GET['drop_var']); 
}

function drop_2($drop_var)
{ 
   session_start();
   
    echo '<select name="drop_3" id="drop_3">
	      <option value=" " disabled="disabled" selected="selected">Select Teacher</option>'; 
    include_once('../db.php');
	$result = mysqli_query($con,"SELECT * from tesch_priority WHERE subject='$drop_var' and class='".$_SESSION['gclass']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by priority")
	 
	or die(mysqli_error());
	
	while($rowres=mysqli_fetch_array($result))
	{
	$tea=mysqli_query($con,"SELECT * FROM teacher WHERE teacher_id='".$rowres['teacher']."' and teacher_school='".$_SESSION['uid']."' ") 
	or die(mysqli_error());
	

		   $drop_3 = mysqli_fetch_array($tea); 
			?>
			 <option value="<?php echo $drop_3['teacher_name'].$drop_3['code'];?>"><?php echo $drop_3['teacher_name'].$drop_3['code'];?></option>;
			<?php
	}
	echo '</select> ';
    
}
?>