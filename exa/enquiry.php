<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:2px; float:left; margin-top:10px;}
.col_4{ width:99%; height:520px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
::-webkit-input-placeholder {
    color:    #000;
}
:-moz-placeholder {
    color:    #000;
}
::-moz-placeholder {
    color:    #000;
}
:-ms-input-placeholder {
    color:    #000;
}


.form-style-2-heading{
    font-weight: bold;
    font-style: normal;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
.select {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.input-mini{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 37px;
}
textarea{
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
  background-color:#eaeaea;
}
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
     background: #1e4a1b;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #1e4a1b;
    color: #fff;
}

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/frontdesk/front desk home.png" /><a href="./?pageid=fron_desk">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:50px; height:42px; margin-left:5px; margin-top:1px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;"> Student Enquiry Form</h2></center>
</div>
<div class="col_4">
<div class="form-style-2-heading" style="background-color:#006633; color:#FFFFFF; font-style:normal;">Student Detail</div>
<form method="post" name="myForm" action="#" enctype="multipart/form-data" style="font-weight:bold;"  onsubmit="return(validate());">
    <table border="0" style="margin:40px 0px 0px 5px">
    <tr>
    <td>STUDENT NAME<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="name" class="tb5" required></td>
	
	
	<td>DATE OF BIRTH<span style="color:#FF0000">*</span></td>
    <td><input type="Text" id="demo1" maxlength="25" name="dob" class="tb5" size="25" required>
    <a href="javascript:NewCal('demo1','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
	
	
	<td>&nbsp;&nbsp;CLASS<span style="color:#FF0000">*</span></td>
    <td><select name="class" class="select" style="width:219px;" required>
    <option value="">Select Class</option>
    <option>Pre-Nursery</option>
    <option>Nursery</option>
    <option>LKG</option>
    <option>UKG</option>
    <option>I</option>
    <option>II</option>
    <option>III</option>
    <option>IV</option>
    <option>V</option>
    <option>VI</option>
    <option>VII</option>
    <option>VIII</option>
    <option>IX</option>
    <option>X</option>
   
    </select>
    </td>
    </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
      
	 <tr>
     <td>CASTE <span style="color:#FF0000">*</span></td>
	 <td><input  type="radio" value="General" name="caste">General 
		 <input  type="radio" value="obc" name="caste">Obc 
		 <input  type="radio" value="St" name="caste">St 
		 <input  type="radio" value="Sc" name="caste">Sc</td>
	 
	 </tr>
	  
	            
     <tr>
     <td>GENDER <span style="color:#FF0000">*</span></td>
	 <td><input type="radio" name="gender" value="male" checked="checked">Male &nbsp;&nbsp; <input type="radio" name="gender" value="female">Female</td>
	 <td>FATHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="fname" class="tb5" required></td>
	 <td>MOTHER'S NAME <span style="color:#FF0000">*</span></td>
     <td><input type="text" name="mname" class="tb5" required></td>
	 </tr>
           
		<tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	  
	 <tr>
	 <td>FATHER OCCUPATION</td>
	 <td><input type="text" name="fo" class="tb5"></td>
	  <td>MOTHER OCCUPATION</td>
	  <td><input type="text" name="mo" class="tb5"></td>
	  <td>PRIMARY CONTACT NO<span style="color:#FF0000">*</span></td>
	  <td><input type="text" name="mobile" class="tb5" required></td>
	 </tr>
		
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
	
	  <tr>
	  <td>ALTERNATE CONT. NO.<span style="color:#FF0000">*</span></td>
	  <td><input type="text" name="omobile" class="tb5" required></td>
	  <td>PREVIOUS CLASS<span style="color:#FF0000">*</span></td>
	  <td> <select name="pclass"  class="select" style="width:219px;" required>
      <option value="">Select Class</option>
      <option>Pre-Nursery</option>
      <option>Nursery</option>
      <option>LKG</option>
      <option>UKG</option>
      <option>1st</option>
      <option>2nd</option>
      <option>3rd</option>
      <option>4th</option>
      <option>5th</option>
      <option>6th</option>
      <option>7th</option>
      <option>8th</option>
      <option>9th</option>
      <option>10th</option>
      <option>11th</option>
      <option>12th</option>
      </select>
	  </td>
	  <td>PREVIOUS SCHOOL<span style="color:#FF0000">*</span></td>
	  <td><input type="text" name="per" class="tb5" required></td>
	  </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
     
	  <tr> <td colspan="6"><div style="background-color:#006633; width:1124px; height:30px; color:#FFFFFF">&nbsp;&nbsp;
	  <span style="margin-top:7px; position:absolute; font-size:16px;">Correspondence Address</span>
	  </div></td></tr>	   
		 
      <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
	 <tr>
	 
	 <td>ADDRESS, (HOUSE NO, <BR />BUILDING)<span style="color:#FF0000">*</span></td>
	 <td><textarea name="address" cols="23" rows="2"></textarea></td>
	 <td>LOCALITY/TOWN<span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="lt" class="tb5" required></td>
	  <td>CITY<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="city" class="tb5" required></td>
		
	 </tr>
             <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	    
		
	    <tr>
		  
		   
		
		  <td>STATE<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="st" class="tb5" required></td>
		  
		  <td>PIN CODE.<span style="color:#FF0000">*</span></td>
         <td><input type="text" name="pn" class="tb5" required></td>
		  
		  
		   <td><input type="checkbox" value="agree"  name="agree" required/>&nbsp;I Agree</td>
		   <td><input type="submit" name="submit" value="Submit Enquiry"></td>
		
		</tr>
            
		  <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	   
		 
			
			
       
    </table>
    </form>

</div>
<div class="col_6">
<div class="form-style-2-heading">Enquiry Information

</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#006633; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#006633;color:#FFFFFF">
                  <th>No.</th>
                  <th>Name</th>
				  <th>Father Name</th>
				  <th>Class</th>
                  <th>Mobile</th>
                  <th>Date</th>
                  <th>Address</th>
				 
              </tr>
			  
			  
              </thead>
			  
              <tbody>
			  <?php
	$sql="SELECT * FROM enquiry where session='".$_SESSION['session']."'";
	$result_set=mysqli_query($con,$sql);
	$i=1;
	while($row=mysqli_fetch_array($result_set))
	{
		?>
                 <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['fname'] ?></td>
                  <td><?php echo $row['aclass'] ?></td>
				   <td><?php echo $row['mobile'] ?></td>
				  <td><?php echo $row['dob'] ?></td>
                  <td><?php echo $row['address'] ?></td>
				 
                  </tr>
              
            
    <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
<?php
   
     date_default_timezone_set('Asia/Kolkata');  
   if(isset($_POST['submit']))
     {
	  $da = date("d-m-Y");
	   
	   $query=mysqli_query($con,"insert into enquiry(name,fname,mname,dob,aclass,pclass,percentage,mobile,address,gender,session,city,school,fo,mo,omobile,pn,lt,st,date,caste)values('".$_POST['name']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['dob']."','".$_POST['class']."','".$_POST['pclass']."','".$_POST['per']."','".$_POST['mobile']."','".$_POST['address']."','".$_POST['gender']."','".$_SESSION['session']."','".$_POST['city']."','".$_SESSION['uid']."','".$_POST['fo']."','".$_POST['mo']."','".$_POST['omobile']."','".$_POST['pn']."','".$_POST['lt']."','".$_POST['st']."','$da','".$_POST['caste']."') ");
	$msg1="Inserted Successfully";
	    
		
		
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
             
		
	$PhNo="91".$_POST['mobile'];
	  
	
	
	$msg="Dear parents, Thanks for visiting ".$rowsch['school_name'].". We appreciate your trust you have in us that you have selected our school among all for enrolling your child for a better education. Regards shining Gajraula shiningGJA";
   
	
	
  $sid="shining Gajraula";
  $msg = str_replace("Senderid",$sid, $msg);
	 
  $reciever=$PhNo;
  $sub="Enquiry";
 $date=date("Y-m-d");
  $type="Student";
  $stdclass=$_POST['class'];
  $result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_SESSION['uid']."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','$date','".$_SESSION['session']."','$type','$stdclass')")or die(mysqli_error());	
  
  
  
   	
$authKey="bf28edd4e55f8ebcaab183cd1dbdd980";
$senderId="shiningGJA";
$serverUrl="http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;
    
$route="1";
$ret = sendsmsPOST($PhNo,$senderId,$route,$msg,$serverUrl,$authKey);

function sendsmsPOST($mobileNumber,$senderId,$routeId,$message,$serverUrl,$authKey)
{
  //Prepare you post parameters
  $postData = array(


      'mobileNumbers' => $mobileNumber,
      'smsContent' => $message,
      'senderId' => $senderId,
      'routeId' => $routeId,
      "smsContentType" =>'Unicode'
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
	?>
                <script>
		        alert('Enquiry successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=enquiry';
                </script>

<?php


}
   ?>