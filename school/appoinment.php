<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;box-shadow: 0 0 30px rgba(0, 0, 0, 0.6)}
.col_6{ width:62.5%; height:700px; background-color:#FFFFFF; margin-left:15px; float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
.col_4{ width:36%; height:700px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
-moz-box-shadow: 0 0 10px rgba(0,0,0, .65);
box-shadow: 0 0 10px rgba(0,0,0, .65);}
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
<div class="left_sect"><img src="images/app.png" style="" /><a href="./?pageid=fron_desk">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Appointment  Details</h2></center>
</div>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Record")) { 
        return false;
    }
    }
</script> 
<?php
if(!empty($_GET['did']))
{
$query=mysqli_query($con,"delete from appoiment where id='".$_GET['did']."'");	
?>

<?php
}
?>

<div class="col_4">
<div class="form-style-2-heading">Provide your information</div>
<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
    <table border="0" style="margin:40px 0px 0px 20px">
        <tr>
		   <td>Visitor Name<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="name" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Gender</td>
		   <td><input type="radio" name="gender" value="male" checked="checked">Male &nbsp;&nbsp; <input type="radio" name="gender" value="female">Female</td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Organization name<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="o_name" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
          <tr>
		   <td>Meeting Purpose <span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="fname" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
         <tr>
		   <td>Meet with</td>
		   <td><input type="text" name="mname" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
            <tr>
		   <td>Date<span style="color:#FF0000">*</span></td>
		   <td><input type="Text" id="demo1" maxlength="25" name="dob" class="tb5" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
		</tr>
            
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Time<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="tm" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			  <tr>
		   <td>Mobile No<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="mobile" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>Address</td>
		   <td><textarea name="address"  class="tb5" ></textarea></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
			 <tr>
		   <td>City<span style="color:#FF0000">*</span></td>
		   <td><input type="text" name="city" class="tb5"></td>
		</tr>
            <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
             <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="submit" value="Submit" style="width:100px; margin-left:50px;"></td>
		</tr>
                        
    </table>
    </form>

</div>
<div class="col_6">
<div class="form-style-2-heading">Appointment  information</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px;" >
              <thead style="background-color:#009933; color:#FFFFFF">
              <tr style="background-color:#009933; color:#FFFFFF">
                  <th>No.</th>
                  <th>Visitor Name</th>
				  <th>Organization</th>
                  <th>Meeting Purpose</th>
                  <th>Meet with</th>
                  <th>Mobile</th>
                  <th>Date-Time</th>
				  <th>Address</th>
				  <th>Action</th>
              </tr>
			 </thead>
			 <tbody>
			  <?php
	$sql="SELECT * FROM appoiment ";
	$result_set=mysqli_query($con,$sql);
	$i=1;
	while($row=mysqli_fetch_array($result_set))
	{
		?>
               <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['name'] ?></td>
				  <td><?php echo $row['o_name'] ?></td>
                  <td><?php echo $row['fname'] ?></td>
                  <td class="center "><?php echo $row['mname'] ?></td>
                  <td><?php echo $row['mobile'] ?></td>
				  <td><?php echo $row['dob'];  ?><span> &nbsp;<?php  echo $row['tm'] ?></span></td>
                  <td><?php echo $row['address'] ?></td>
                  <td class="center"> 
	<a href="cencel_apointment.php?id=<?php echo $row["id"]."&mobile=".$row['mobile']."&name=".$row['name']."&mname=".$row['mname']."&dob=".$row['dob']."&tm=".$row['tm'] ; ?>"> 
				 Cancel Appointment</a></td>
                 <td><a href="<?php echo $var."appoinment&did=".$row['id']; ?>" onClick="return confirmation();">Delete</a></td>
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
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
ob_start();
   if(isset($_POST['submit']))
     {
	   if(empty($_POST['name']) || empty($_POST['fname']) || empty($_POST['dob']) || empty($_POST['mname']) || empty($_POST['mobile']) || empty($_POST['city']))
	   {
	     $error_msg="field marked with * are mandatory";
	   }
	   if(empty($error_msg))
	   {
	   $da = date("d-m-Y");
	   $query=mysqli_query($con,"insert into appoiment(name,o_name,fname,mname,dob,tm,mobile,address,gender,session,city,school,date) values('".$_POST['name']."','".$_POST['o_name']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['dob']."','".$_POST['tm']."','".$_POST['mobile']."','".$_POST['address']."','".$_POST['gender']."','".$_SESSION['session']."','".$_POST['city']."','".$_SESSION['uid']."','$da') ");
	$msg1="Inserted Successfully";
	    
	$PhNo="91".$_POST['mobile'];
	  
	$msg="Dear ".$_POST['name'].", your appointment with ".$_POST['mname']." has been scheduled on ".$_POST['dob']." at ".$_POST['tm']." .Regard: Senderid.";
   
	
	
  $sid="SMRERP";
  $msg = str_replace("Senderid",$sid, $msg);
  $reciever=$PhNo;
  $sub="Appoinment";
  $date=date("Y-m-d");
  $type="Appoinment";
  $stdclass=$_POST['name'];
  $status = 'Yes';
  $result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_SESSION['uid']."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','$date','".$_SESSION['session']."','$type','$stdclass')")or die(mysqli_error());	
  
     	
$authKey="3eef364c3dce95fa5ff48367b808541";
$senderId="SMRERP";
$serverUrl="http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;   
$route="1";
$ret = sendsmsPOST($PhNo,$senderId,$route,$msg,$serverUrl,$authKey);
  
    echo '<script>
         window.location.href = "https://smarterponline.com/shining/school/?pageid=appoinment&success_modal=1";
    </script>';
  
  
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
	   
	   
}
}
?>
<?php if (isset($_GET['success_modal']) && $_GET['success_modal'] == 1): ?>
  <script>
    window.onload = function () {
      swal({
        title: "Appoinment Created Successfully",
        text: "Thank you",
        icon: "success"
      }).then(() => {
        window.location.href = "https://smarterponline.com/shining/school/?pageid=appoinment"; // clean URL
      });
    };
  </script>
<?php endif; ?>