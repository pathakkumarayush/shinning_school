<script type="text/javascript">
 function validate()
{
 if( document.myForm.usertype.value == "-1" )
   {
     alert( "Please Select Usertype");
     return false;	
   }
   else
   {
	return true; 
	}
}
</script>


	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-29804355-2', 'auto');
		ga('send', 'pageview');
	</script>
<style type="text/css">
select {
    padding:3px;
    margin: 0;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
    color:#000000;
    border:none;
    outline:none;
    display: inline-block;
    -webkit-appearance:none;
    -moz-appearance:none;
    appearance:none;
    cursor:pointer;
}
</style>

<?php 
session_start(); 
include ('db.php'); 
 if(isset($_POST["submit"]))
{
	
	$query = mysqli_query($con,"SELECT * FROM  login where uid='".$_POST['uid']."' and pass='".$_POST['pass']."' ");
	if(mysqli_num_rows($query)>0)
	{
	$row = mysqli_fetch_array($query);
	
	//$_SESSION['id'] = $row['id'];
	  $_SESSION['type'] =  $row['type'];
	  $_SESSION['usertype']=$row['type'];
	  $_SESSION['userid']=$row['uid'];
	  $_SESSION['active'] = $row['active'];
	  //header("Location:admin/index.php"); 
	  $_SESSION['uid'] = $row['school'];
	  header("Location:school/popup/"); 
	 }
	
	if($_SESSION['type']=='student'){
	header("Location:student/popup/");
	 }	
	 
	if($_SESSION['type']=='admin'){
	header("Location:admin/popup/");
	 }	
	 
	if($_SESSION['type']=='fee'){
	header("Location:fee/popup/");
	 }	
	 
	 if($_SESSION['type']=='vp'){
	header("Location:vp/popup/");
	 }	
	 
	
	 
	 if($_SESSION['type']=='uniform'){
	header("Location:uniform/popup/");
	 }	
	 
	
	if($_SESSION['type']=='front'){
	header("Location:front/popup/");
	 }	
	 
     if($_SESSION['type']=='library'){
	 header("Location:library/popup/");
	 }	
	
	 if($_SESSION['type']=='admapp'){
	header("Location:admapp/popup/");
	 }	
	 
	 if($_SESSION['type']=='fees'){
	header("Location:fees/popup/");
	 }	
	
	if($_SESSION['type']=='teacher'){
	header("Location:teacher/popup/");
	 }	
	 
	 if($_SESSION['type']=='exa'){
	header("Location:exa/popup/");
	 }	
	 
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smart Erp - Login</title>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slider.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		<div class="page-full-width">
		</div> <!-- end full-width -->	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		<div class="page-full-width cf">
	       <div id="login-intro" class="fl"> <img src="images/shining.png"  style="height:105px;"/>  </div> 
		   
		   <div id="login-intro_one" class="fl">
		   <br>
		  
		 
		   
		   </div> 
			
			</div> 	
			</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	<div class="sliderr" style="">
	
	
		<img src="images/sh.jpg" style="width:720px; height:390px;">
      
		
	
	</div>
	
	<div class="loginf">
	
	<div class="usern">
	            <h1>Login to Smart Erp</h1>
				<h2>Enter your credentials below</h2>
	
	</div>
		<form action="#" method="POST" id="login-form" name="myForm" enctype="multipart/form-data" onSubmit="return(validate());">
		
			<fieldset>

				<p>
					<label for="login-username">username</label>
					<input type="text" id="login-username" class="round full-width-input" name="uid" autofocus  required/>
				</p>

				<p>
					<label for="login-password">password</label>
					<input type="password" name="pass" id="login-password" class="round full-width-input" required/>
				</p>
				
					
               
				<p><input type="submit" name="submit" style="width:100px; background:#3333FF; color:#FFFFFF; font-size:10px" value="Login"></p>
				
				

			</fieldset>

			<br/>

		</form>
		</div>
		<br clear="all">
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p style="color:#FFFFFF; margin-top:7px; font-size:14px">&copy; Copyright 2022 <a href="#" style="color:#FFFFFF">Smart Erp</a>. All rights reserved.</p>
		<p><a href="http://smarteducations.in/" style="color:#FFFFFF;font-size:14px">Design & Developed By :- Smart Educations</a></p>
	
	</div> <!-- end footer -->

</body>
</html>