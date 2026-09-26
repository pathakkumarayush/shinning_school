<?php
function sms($con,$sender,$reciever,$sub,$msg,$status,$ses,$page)
{
                 $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and student_id='$reciever'");
				 $studrow=mysqli_fetch_array($search);
				 $type="Student";
				 $stdclass=$studrow['student_class'].$studrow['student_section'];
				 $date=date("Y-m-d");
	             $sid="Crayon School";
		         $msg = str_replace("Senderid",$sid, $msg);
//$result=mysqli_query("insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."','".$_SESSION['session']."','$type','$stdclass')")or die(mysqli_error());	

    if($page=="7")
	{
	$class=mysqli_query($con,"select * from class where school='".$_SESSION["uid"]."' and class_id='$reciever'");
	while($rowclass=mysqli_fetch_array($class))
	{
	$qry=mysqli_query($con,"select * from student where student_class='".$rowclass['class']."'  and student_school='".$_SESSION['uid']."'");
    $ph1=array();
    while($row=mysqli_fetch_array($qry))
	{
	$sender_name=$row["student_name"];
	$reciever=$row["student_id"];
	$result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."','".$_SESSION['session']."')")or die(mysqli_error());	
	// array_push($studentcontact,$row['student_contactno']);
	
	$ph="91".$row['student_contactno'];
	array_push($ph1,$ph);
	$phimplode=implode(",",$ph1);
	$msg = str_replace("NAME",$sender_name,$msg);
	}
	}
	
	}
	
    if($page=="1")
	{
	$type="student";
	$qry=mysqli_query($con,"select * from student where student_id='".$reciever."' and student_session='".$_SESSION['session']."'");
   
    //$row=mysqli_fetch_array($qry);
	if($row=mysqli_fetch_array($qry))
	{
	$sender_name=$row["student_name"];
	}
	if($row['student_contactno']=='')
	{
	$status = 'No';
	}
	$month=date("M");
	$result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class,month) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."','".$_SESSION['session']."','$type','".$row['student_class'].$row['student_section']."','$month')")or die(mysqli_error());	
	 //array_push($studentcontact,$row['student_contactno']);
	$studrow['student_contactno']=$row['student_contactno'];
$msg = str_replace("NAME",$sender_name,$msg);

	}
	if($page=="6")
	{
	
	$type="student";
	$qry=mysqli_query($con,"select * from student where student_id='".$reciever."' and student_session='".$_SESSION['session']."'");


    //$row=mysqli_fetch_array($qry);
	if($row=mysqli_fetch_array($qry))
	{
	$sender_name=$row["student_name"];
	}
	if($row['student_contactno']=='')
	{
	$status = 'No';
	}
	$result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."','".$_SESSION['session']."','$type','".$row['student_class'].$row['student_section']."')")or die(mysqli_error());	
	 //array_push($studentcontact,$row['student_contactno']);
	$studrow['student_contactno']=$row['student_contactno'];
$msg = str_replace("NAME",$sender_name,$msg);

	}
	
	if($page=="2")
	{
	$type="teacher";
	$qry=mysqli_query($con,"select * from teacher where uid='".$reciever."'");
   
	/*
	$row=mysqli_fetch_array($qry);
	$sender_name=$row["teacher_name"];
	//$msg = str_replace("NAME", $sender_name, $msg);
	$result=mysqli_query("insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."','".$_SESSION['session']."','$type')")or die(mysqli_error());	
	 //array_push($studentcontact,$row['teacher_contactno']);
	$ph=$row['contact'];
	$msg = str_replace("NAME", $sender_name, $msg);
	
	*/
    $ph1=array();
    while($row=mysqli_fetch_array($qry))
	{
	$sender_name=$row["teacher_name"];
	$reciever=$reciever;
	if($row['contact']=='')
	{
	$status = 'No';
	}
	$result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."','".$_SESSION['session']."','$type')")or die(mysqli_error());	
	// array_push($studentcontact,$row['student_contactno']);
	
	$ph="91".$row['contact'];
	
	array_push($ph1,$ph);
	$phimplode=implode(",",$ph1);
	$msg = str_replace("NAME",$sender_name,$msg);
	}
	}
	if($page=="2")
	{
	$sid="aryans Gajraula";
	$msg ="Dear Staff, ".$msg." Regards- ".$sid;
	}
	else
	{
	$sid="SMRERP";
	$msg ="Dear Parents, ".$msg." Regards ".$sid."";
	}
	
if($page=="7")
{
 $mysess=$sender;
 
$PhNo=$phimplode;

}
if($page=="2")
{
$mysess=$sender;
 
$PhNo=$phimplode;
}
else
{
 $mysess=$sender;
   
 $PhNo="91".$studrow['student_contactno'];
}
//$msg=urlencode("test ?? ??? ");	
	
$sedurl="";
	
if($mysess=="shining")
{ 
//$authKey="3eef364c3dce95fa5ff48367b808541";
//$senderId="SMRERP";
//$serverUrl="http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;
    
//$sedurl = str_replace(" ", "%20", $sedurl);
$route="1";
$ret = sendsmsPOST($PhNo,$senderId,$route,$msg,$serverUrl,$authKey);

}
//$ret = file_get_contents($sedurl);

 //return $ret."-".$sedurl;
	
//return "Your Message is sent.";

}



function sendsmsPOST($mobileNumber,$senderId,$routeId,$message,$serverUrl,$authKey)
{
  //Prepare you post parameters
  $postData = array(


      'mobileNumbers' => $mobileNumber,
      'smsContent' => $message,
      'senderId' => $senderId,
      'routeId' => $routeId,
      "smsContentType" =>''
  );


$data_json = json_encode($postData);
  // init the resource
  $ch = curl_init();

  curl_setopt_array($ch, array(
      CURLOPT_URL => $serverUrl,
      CURLOPT_HTTPHEADER => array('Content-Type: application/json','Content-Length: ' . strlen($data_json)),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $data_json,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0
  ));

  //get response
  $output = curl_exec($ch);

  //Print error if any
  if(curl_errno($ch))
  {
      echo 'error:' . curl_error($ch);
  }
  curl_close($ch);
  
  return $output;
}
function replace($strText)
{	
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), " ", $tmpString);
	$tmpString = str_replace(chr(146), " ", $tmpString);
	$tmpString = str_replace("'", " ", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	$tmpString = str_replace("d_1", "<input type=text name=d_1 id=d_1 maxlength=300>", $tmpString); 
	$tmpString = str_replace("d_2", "<input type=text name=d_2 id=d_2>", $tmpString); 
	$tmpString = str_replace("d_3", "<input type=text name=d_3 id=d_3>", $tmpString); 
	$tmpString = str_replace("m_1", "<input type=text name=m_1 id=m_1>", $tmpString);
	$tmpString = str_replace("m_2", "<input type=text name=m_2 id=m_2>", $tmpString); 
	$tmpString = str_replace("m_3", "<input type=text name=m_3 id=m_3>", $tmpString);  
	$tmpString = str_replace("n_1", "<u><b><i>NAME</i></b></u>", $tmpString);
	$tmpString = str_replace("t_1", "<input type=text name=t_1 id=t_1>", $tmpString);
	$tmpString = str_replace("t_2", "<input type=text name=t_2 id=t_2>", $tmpString);
	$tmpString = str_replace("t_3", "<input type=text name=t_3 id=t_3>", $tmpString);
	$tmpString = str_replace("s_1", $_SESSION["uname"] , $tmpString);
	
	return $tmpString;
}

?>