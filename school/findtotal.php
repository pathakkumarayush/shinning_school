<?php 
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
session_start();
include "../db.php";
$mob=$_GET["mob"];
$school=$_SESSION["uname"]??null;
$faculty=$_SESSION["faculty"]??null;
//require_once("myfunction.php");
$sp=$_GET["sp"];
$sday=$_GET["sday"];
$student=$_GET["stdname"];
$month=$_SESSION["month"]??null;
$session=$_SESSION["session"];
$sub= $_GET["q"];
$ex_sub=explode("*",$sub);
$total_no=0;
$total_marks=0;
$std_id=$_GET["std_id"];
$remark=$_GET["remark"];

$tm = 'TERM1';


    $r_sub=array();
 
	$i=0;
	foreach($ex_sub as $ea)
    {
	$ex=explode("-",$ea);
	$ee=explode("@",$ex[0]);
      
      if($ex[1] != "" && ($ex[1] != "AB" && $ex[1] != "ab" && $ex[1] != "aB" && $ex[1] != "Ab" && $ex[1] != "A" && $ex[1] != "B" && $ex[1] != "C") && $ee[0]<$ex[1]){
       $msg = 'Obtaine Mark ('.$ex[1].') not more then Total Mark ('.$ee[0].') in Subject '.$ee[1];
      echo $msg;
      exit();
        
      }
	
	//$res=mysqli_query($con,"select * from marks where month='".$month."' and subject='".$ee[1]."' and student='".$std_id."' and school='".$school."'")
	$res=mysqli_query($con,"select * from marks where student='".$std_id."' and subject='".$ee[1]."' and ses='".$session."' and exam ='".$_SESSION['rexam']."'")
	or die(mysqli_error());
$check=0;

		if($row=mysqli_fetch_array($res))
	{
	$check=1;
	$status_marks= ($ee[0] * 33 )/100;
	

	if($ex[1] == 'AB' || $ex[1] == "ab" || $ex[1] == "aB" || $ex[1] == "Ab" || $ex[1] ==""  || $ex[1] < $status_marks)
	{
	$ip = "fail";
	
	}
	else
	{
	$ip = "pass";
	}
    
   //print_r($ee[0]); print_r($ex[1]); print_r($status_marks); print_r($ip); die();
  // $res1=mysqli_query($con,"update marks set obtainmarks='".$ex[1]."', Day='".$sday."', Present='".$sp."',remark='".$remark."', status='".$ip."' where subject='".$ee[1]."' and student='".$std_id."' and exam ='".$_SESSION['rexam']."' and term ='".$_SESSION['term']."' ");
   
$res1 = mysqli_query($con, "UPDATE marks SET  obtainmarks = '$ex[1]',Day = '$sday',Present = '$sp',remark = '$remark', status = '$ip',month = '$_SESSION[rmonth]' WHERE 
        subject = '$ee[1]' AND  student = '$std_id' AND exam = '$_SESSION[rexam]' AND ses = '$session'");

		//echo "update";
	}
	else
	{
	$check=2;
	$status_marks= ($ee[0] * 33 )/100;
	
    
	if($ex[1] == 'AB' || $ex[1] == "ab" || $ex[1] == "aB" || $ex[1] == "Ab" || $ex[1] =="" || $ex[1] ==""  || $ex[1] < $status_marks)
	{
	$ip = "fail";
	
	}
	else
	{
	$ip = "pass";
	}
    
	
$res1=mysqli_query($con,"INSERT INTO `marks`(`student`, `subject`, `totalmarks`, `obtainmarks`, `upload_by`, `month`, `ses`, `school`, `Day`, `Present`,`remark`,`class`,`exam`,`subject_suffix`,`status`,`term`) VALUES ('".$std_id."','".$ee[1]."','".$ee[0]."','".$ex[1]."','".$faculty."','".$_SESSION['rmonth']."','".$session."','".$school."','".$sday."','".$sp."','".$remark."','".$_SESSION['rclass']."','".$_SESSION['rexam']."','".$i."','".$ip."','$tm')")
or die(mysqli_error());
		//echo "insert";
	}
	  
      
      if (is_numeric($ex[1])) {
         $total_marks += $ex[1];  // Add only if it's a number
      }
      
       if (is_numeric($ee[0])) {
         $total_no += $ee[0];  // Add only if it's a number
      }
	
    $sub_24= $ee[1]."=".$ex[1];
	$arr=array_push($r_sub,$sub_24);
	$i++;
	}

	
	$imp=implode(",",$r_sub);
	if($check==1)
	{echo "Updated";}
	else if($check==2)
	{echo "inserted";}
//echo $total_marks."/".$total_no;
$var= ($total_marks * 100)/$total_no;

if($var>=80)
{
$div= "honr";
}
if($var > 59 && $var < 80)
{
$div= "1st";
}
if($var > 44 && $var < 60)
{
$div= "2nd";
}
if($var > 32 && $var < 45)
{
$div= "3rd";
}
if($var < 33)
{
$div= "fail";
}

$res2=mysqli_query($con,"update marks set obtainper='".$var."', total ='".$total_marks."',division = '".$div."' where  
student='".$std_id."' and exam ='".$_SESSION['rexam']."' and ses='".$session."' ");





