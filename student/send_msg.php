<link href="css/style_con.css" rel="stylesheet">

<div id="container">
<div class="shell">
<span style="color:#F00; float:right; font-size:24px">Session:<?php echo $_SESSION['session']; ?></span>
<br clear="all" />
<div id="main" style="margin-top:10px;">
<img src="images/ms.png" style="width:200px; height:100px; border:2px #FFFFFF solid" />
<a href="index.php" style="float:right; margin-top:90px; color:#FFFFFF; font-size:16px">Back</a>
<div style="border:#fff 2px solid; margin-top:10px"></div>

<p style="margin-top:5px; font-size:16px">Send Message School  <?php
		       $search=mysqli_query($con,"select * from student where uid='".$_SESSION['userid']."' and student_session='".$_SESSION['session']."' ");
			   $studrow=mysqli_fetch_array($search);
			   $studrow['student_name'];
			   $studrow['uid'];
				?>
</p>



<div class="wrapper">
		<div id="main" style="padding:8px 0 0 0;">
		
		<!-- Form -->
		<form id="contact-form" action=" " method="post">
			
			
			<div>
				<label>
					<span>Sender Name: (required)</span>
					<input name="name"  value="<?php echo $studrow['student_name']; ?>" type="text" tabindex="1" required autofocus>
				</label>
			</div>
			<div>
				<label>
					<span>Class: (required)</span>
					<input name="class"  value="<?php echo $studrow['student_class']; ?>" type="text" tabindex="2" required>
				</label>
			</div>
			<div>
				<label>
					<span>Mobile: (required)</span>
					<input name="mobile" placeholder="Please enter your number" type="tel" tabindex="3" required>
				</label>
			</div>
			<div>
				<label>
					<span>Subject: (required)</span>
					<input name="sub" placeholder="Please enter your subject" type="text" tabindex="4" required>
				</label>
			</div>
			<div>
				<label>
					<span>Message: (required)</span>
					<textarea name="msg" placeholder="Include all the details you can" tabindex="5" required></textarea>
				</label>
			</div>
			<div>
			<input type="submit" name="submit" value="Send Message" id="contact-submit" />
				
			</div>
		</form>
		<!-- /Form -->
	   <?php
	   if(isset($_POST['submit']))
       {
	   $date=date("d-m-Y");
	   $query=mysqli_query($con,"insert into parent_msg(student_id,name,class,mobile,sub,msg,date)
	   values('".$studrow['uid']."','".$_POST['name']."','".$_POST['class']."','".$_POST['mobile']."','".$_POST['sub']."','".$_POST['msg']."','$date') ");
	   $msg1="Inserted Successfully";
	  ?>
	  <script type="text/javascript">
alert("Message Sent Successfully");
</script>	
	   <?php }
	   ?>
		</div>
	</div>
<br clear="all" />
<br clear="all" />
</div>
</div>
</div>