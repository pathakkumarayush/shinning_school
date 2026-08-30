<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
function redirect(id)
{
	window.location="<?php echo $var."viewmessage&id="?>+id";
}
</script>
<?php
$res_msg1=mysqli_query($con,"select count(id) from sendmsg where reciever='672'  and is_read='0'")or die(mysqli_error());

$row_msg11=mysqli_fetch_array($res_msg1);
?>
<?php
if(isset($_GET["msgid"]))
{
	$del_msg=mysqli_query($con,"delete from sendmsg where id=".$_GET["msgid"]."")or die(mysqli_error());
	if($del_msg!=0)
	{
		?>
        <script type="text/javascript">
		alert("Your Message is deleted");
		</script>
        <?php
	}
}
?>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
#sms a {
	text-decoration:none;
	background-color:#EED893;
	padding:7px 7px 7px 7px ;
	border-top-right-radius:5px;
	border-top-left-radius:5px;
	color:#000;
}

#sms a:hover {
	text-decoration:none;
	background-color:#F08315;
	color:#fff;
	padding:7px 7px 7px 7px ;
	
}

#sms a.active {
	text-decoration:none;
	background-color:#F08315;
	color:#fff;
	padding:7px 7px 7px 7px ;
	
}

#sms{
	display:inline;
	
	margin:5px 5px 5px 5px ;
	
}
ul{
	
}

</style>
<div id="container">
<div class="shell">
<span style="color:#F00; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br  clear="all"/>
<br  clear="all"/>
<div id="main">


<div class="left_side">
<div id="tog" style=""><button >
<img src="images/r.png"  style="float:right; "/></button>

</div>
<?php include('left.php'); ?>

</div>

<div class="right_side">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		
		?>
<div class="pro">




<a href="" style="background-color:#e0326a; padding-left:7px; padding-right:7px; padding-bottom:2px; padding-top:2px; border-radius:4px; border:#FFFFFF solid; color:#FFFFFF;margin-left:10px;">Homework</a>



<br clear="all" />
</div>				
<div class="fee_main" style="">

<table class="table table-bordered" id="sample_1" style=" margin-left:5px;color:#000000" width="98.7%">
              <thead style="background-color:#EF7F1A; color:#FFFFFF">
              <tr style="background-color:#EF7F1A; color:#FFFFFF">
                  <th>No.</th>
                  <th>Subject</th>
				  <th>Date<br /> To</th>
                  <th>Date<br />From</th>
				  <th>Homework</th>
				  <th>Assign<br />Date Time</th>
                  <th>View</th>
                  
              </tr>
			 </thead>
			 <tbody>
			<?php
$res_msg=mysqli_query($con,"select * from homework where class_id='".$studrow['student_class']."' ORDER BY homework_id DESC")or die(mysqli_error());

$i=1;
while($row_msg=mysqli_fetch_array($res_msg))
{
	//$st=$row_msg["status"];
	?>
    <tr>
    <td  width="50" style="border:0;"><?php echo $i; ?></td>
    <td style="border:0;"><?php echo $row_msg["subject_id"]; ?></td>
    <td style="border:0;"><?php echo $row_msg["dateto"]; ?></td>
	<td style="border:0;"><?php echo $row_msg["datefrom"]; ?></td>
	<td style="border:0;"><?php echo $row_msg["homwork"]; ?></td>
	<td style="border:0;"><?php echo $row_msg["assigndate"]; ?></td>
    <td style="border:0;" width="120"><a href="<?php echo $var."viewh&id=".$row_msg["homework_id"]; ?>">View</a></td>
    </tr>
      <?php
	 $i++;
	}
	?>
          </tbody>
          </table>


</div>
</div>



</div>

<br clear="all" />
</div>
</div>
</div>
 <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>