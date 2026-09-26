<?php
include('config.php');
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];


$cont_form=mysqli_query($con,"insert into salary_master(country,state,city) values('$country','$state','$city')");
if($cont_form){
echo"sucess";}
else{echo"error";}
//header("location:index.php");
?>
<?php

$interview=  mysqli_query($con,"SELECT * FROM country ");
while($rows = mysqli_fetch_array($interview))
	{
	 $country=$rows['country'];
	 $shortlisted =  mysqli_query($con,"SELECT * FROM salary_master  where id='$country'");
       while($rows_rec = mysqli_fetch_array($shortlisted))
		  {    
				  echo'<td>'.$rows_rec['id'].'</td>';
				  echo'<td>'.$rows['country'].'</td>';
		
		
	}
	}
?>
