<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
function redirect(id)
{
	window.location="<?php echo $var."viewmessage&id="?>+id";
}
</script>
<?php
$res_msg1=mysqli_query($con,"select count(id) from sendmsg where reciever='".$_SESSION['userid']."'  and is_read='0'")or die(mysqli_error());

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
<div class="right_side">
        <?php   
        $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
	    $studrow=mysqli_fetch_array($search);
		?>
<div class="pro" style=" line-height:30px;">
<form style="height:0px;" action="" method="post">
<table style="margin-left:10px; margin-top:100px; float:left;">
<tr>
 <?php $class=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");  ?>
<td style="margin-top:5px;"><span style="margin-top:10px;">Class&nbsp;</span>
                <select name="class" class="select" style="width:125px; border-radius:3px; height:35px; margin-top:10px; " onchange="showSection(this.value)">
                <option value="-1">Select class</option>
                <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			     ?>
                 <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
                 <?php
				 }
			     ?>
                 </select>
</td>
<td><input type="submit" name="submit" value="submit" class="btn btn-default pink2-btn  butt-on btn-block"  style="margin-left:15px; width:80px; "/></td>


</tr></table>

<table style="margin-left:10px; margin-top:100px; float:right;">
<tr><td><a href="./?pageid=home">
<img src="images/buttonGoBack.png" class="gback"/></a></td></tr>
</table>
</form>
<br clear="all" />
</div>				
<div class="fee_main" style="">

<table class="table table-bordered" id="sample_1" style=" color:#000000; font-size:11px; margin-left:5px;" width="95.7%">
              <thead style="background-color:#009933; color:#FFFFFF">
                <tr style="background-color:#009933; color:#FFFFFF">
                  <th align="center">Sr No.</th>
                  <th align="center">Student Name</th>
				  <th align="center">Father Name</th>
                  <th align="center">Class</th>
                  <th align="center">Mobile</th>
				  <th align="center"></th>
                  
              </tr>
			 </thead>
			 <tbody>
	 <?php
     if(isset($_POST['submit']))
     {
     $res_msg=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_SESSION['session']."' order by student_name asc")or die(mysqli_error());

     $i=1;
     while($row_msg=mysqli_fetch_array($res_msg))
     {
	  //$st=$row_msg["status"];
	 ?>
     <tr <?php if($st=="Pending"){echo "bgcolor='#FFFFCC'";}else if($st=="Yes"){echo "bgcolor='#fff'";}else{echo "bgcolor='#FFF0F0'";} if($row_msg['is_read']==0) { ?> style="font-weight:normal" <?php }  ?>>
     <td  width="50" style="border:0;"><?php echo $i; ?></td>
     <td style="border:0;"><?php  echo $row_msg["student_name"]; ?></td>
     <td style="border:0;"><?php  echo $row_msg["student_fname"]; ?></td>
     <td style="border:0;" ><?php  echo $row_msg["student_class"]; ?></td>
     <td style="border:0;"> <a href="tel:<?php  echo $row_msg["student_contactno"]; ?>"><?php  echo $row_msg["student_contactno"]; ?></a></td>
	 <td><a href="<?php echo $var."edit_admission&id=".$row_msg['student_id']; ?>" target="_blank">Edit</a></td>
	  
    </tr>
      <?php
	 $i++;
	}
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
<br clear="all" /><br clear="all" /><br clear="all" />