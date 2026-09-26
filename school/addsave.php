<?php
	session_start();
	require_once("../db.php");
			   
			    $typ=$_POST["typ"];
				$nm=$_POST["txtname"];
				$fnm=$_POST["fnm"];
				$gen=$_POST["gender"];
				$dob=$_POST["txtdob"];
				$doj=$_POST["txtdoj1"];
				$mrt=$_POST["mrt"];
				$dom=$_POST["txtdom2"];
				$pg=$_POST["pstgrd"];
		
				
			   $qry="insert into teacher(teacher_id,teacher_name,teacher_type,father_name,	teacher_gender,	teacher_dob,teacher_doj,maritial_status,teacher_dom,teacher_qualifi)values('".$_POST['eid']."','$nm','$typ','$fnm','$gen','$dob','$doj','$mrt','$dom','$pg')";
			   
			   
			   mysqli_query($con,$qry);
			   
			   $q="select * from teacher where teacher_name='$nm' and father_name='$fnm'";
			   $result=mysqli_query($con,$q);
			   $row=mysqli_fetch_array($result);
			   if($row>=1)
			   {
			   $_SESSION["id"]=$row["teacher_id"];
			  
			   }
			   
			   
			   
			   mysqli_close($con);
			   
	
			   	
				 
				 ?>