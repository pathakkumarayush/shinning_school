<?php
function subjectID()
{
		$qry="select max(sub_id),image from subject";
		$re=mysqli_query($con,$qry)or die (mysqli_error());
		if($row2=mysqli_fetch_array($re))
		{
			$id=$row2[0];
		}
		$id=$id+1;
		return $id;
}
function subjectImage()
{
		$qry="select image from subject";
		$re=mysqli_query($con,$qry)or die (mysqli_error());
		if($row2=mysqli_fetch_array($re))
		{
			$im=$row2[0];
		}	
		return $im;
}
function subjectCountID()
{
		$qry="select count(sub_id),image from subject";
		$re=mysqli_query($con,$qry)or die (mysqli_error());
		if($row2=mysqli_fetch_array($re))
		{
			$id=$row2[0];
		}
		$id=$id+1;
		return $id;
}
function sms($sender,$reciever,$sub,$msg,$status)
{
	$date=date("Y-m-d");
	$sender_name="";
	$qry=mysqli_query($con,"select * from student where uid='".$reciever."'");
	
	if($row=mysqli_fetch_array($qry))
	{
		$sender_name=$row["student_name"];
	}
	$msg = str_replace("NAME", $sender_name, $msg);
	$result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date) values('".$sender."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','".$date."')")or die(mysqli_error());	
	$msg=urlencode($msg);	
	$PhNo="91".$row['student_contactno'];
	$sedurl="";
	$mysess=$_SESSION['schoolname'];
    
   if($mysess=="Bhopal Academy")
	{
		$sedurl="http://www.businesssms.co.in/sms.aspx?Id=principal@bhopalacademy.com&Pwd=adminbhopal&PhNo=".$PhNo."&text=".$msg;
	}
	else if($mysess=="Milestone Public School Sarvadharam" || $mysess=="Milestone Public School Akbarpur Hindi" || $mysess=="Milestone Public School Akbarpur English")
	{	
		$sedurl="http://www.businesssms.co.in/sms.aspx?Id=vineet@vmsoftech.com&Pwd=qazzaq&PhNo=".$PhNo."&text=".$msg;
	}
	else if($mysess=="RC ENGLISH MEDIUM SCHOOL BARHI" || $mysess=="RC ENGLISH MEDIUM SCHOOL BARHI" || $mysess=="RC ENGLISH MEDIUM SCHOOL BARHI")
	{	
		$sedurl="http://www.businesssms.co.in/sms.aspx?Id=vineetahuja111@gmail.com&Pwd=rcadmin&PhNo=".$PhNo."&text=".$msg;
	}
	else
	{
		echo "Not Sent";
	} 
	$ret = file_get_contents($sedurl);
	//return $ret."-".$sedurl;
	//return "Your Message is sent.";
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
	$tmpString = str_replace("d_1", "<input type=text name=d_1 id=d_1>", $tmpString); 
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
