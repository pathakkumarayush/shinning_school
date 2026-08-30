<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:15px; float:left; margin-top:10px;}
.col_4{ width:40%; height:1150px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
     background: #FF8500;
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
    background: #EA7B00;
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
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/frontdesk/front desk home.png" /><a href="./?pageid=fron_desk">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student follow up Details</h2></center>
</div>

<div class="col_6">
<div class="form-style-2-heading">Follow up information

</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#009933; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#006633;color:#FFFFFF">
                  <th>No.</th>
                  <th>Name</th>
				  <th>Father Name</th>
				  <th>Class</th>
                  <th>Mobile</th>
                  <th>Date Of Birth</th>
                  <th>Address</th>
				  <th>Last Follow up Date</th>
				  <th>Conversation</th>
				  <th>Status</th>
				  <th>Next Follow Up Date</th>
				  <th>Mode Of Follow Up</th>
				  <th>Remark</td>
				  <th style="width:160px;"></th>
				 
              </tr>
			  
			  
              </thead>
			  
              <tbody>
			  <?php
	$sql="SELECT * FROM enquiry where status='0' and session='".$_SESSION['session']."'";
	$result_set=mysqli_query($con,$sql);
	$i=1;
	while($row=mysqli_fetch_array($result_set))
	{
	$res_stud=mysqli_query($con,"select * from follow_up where eno='".$row['id']."' order by id desc")or die(mysqli_error());
    $rowstud=mysqli_fetch_array($res_stud);
	
		?>
                 <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['name'] ?></td>
                  <td><?php echo $row['fname'] ?></td>
                  <td><?php echo $row['aclass'] ?></td>
				   <td><?php echo $row['mobile'] ?></td>
				  <td><?php echo $row['dob'] ?></td>
                  <td><?php echo $row['address'] ?></td>
				  
				  <td><?php echo $rowstud['date'] ?></td>
				  <td><?php echo $rowstud['decs'] ?></td>
                  <td><?php echo $rowstud['status'] ?></td>
				  <td><?php echo $rowstud['ndate'] ?></td>
				   <td><?php echo $rowstud['mof'] ?></td>
				  <td><?php echo $rowstud['rmk'] ?></td>
				  <td> <a href="<?php echo $var."followup&id=".$row['id']; ?>" target="_blank">Follow Up</a>
				  &nbsp;|&nbsp;
				
				<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/fflist.php?eno=<?php echo $rowstud['eno'];  ?>')"> 
				  History</a>
				  </td>
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
	   if(empty($_POST['name']) || empty($_POST['fname']) || empty($_POST['dob']) || empty($_POST['class']) || empty($_POST['mobile']) || empty($_POST['city']))
	   {
	     $error_msg="field marked with * are mandatory";
	   }
	   if(empty($error_msg))
	   {
	   
	   $da = date("d-m-Y");
	   
	   $query=mysqli_query($con,"insert into enquiry(name,fname,mname,dob,aclass,pclass,percentage,mobile,address,gender,session,city,school,fo,mo,omobile,pn,lt,st,date) values('".$_POST['name']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['dob']."','".$_POST['class']."','".$_POST['pclass']."','".$_POST['per']."','".$_POST['mobile']."','".$_POST['address']."','".$_POST['gender']."','".$_SESSION['session']."','".$_POST['city']."','".$_SESSION['uid']."','".$_POST['fo']."','".$_POST['mo']."','".$_POST['omobile']."','".$_POST['pn']."','".$_POST['lt']."','".$_POST['st']."','$da') ");
	$msg1="Inserted Successfully";
	    
		
		
		    $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
             
		
	$PhNo="91".$_POST['mobile'];
	  
	$msg="Dear parent Thanks for visiting ".$rowsch['school_name']." For Your Child ".$_POST['name']." Admission we will get back to you. Regard: Senderid.";
   
	
	
  $sid="shining JAMMU";
  $msg = str_replace("Senderid",$sid, $msg);
	 
  $reciever=$PhNo;
  $sub="Enquiry";
 $date=date("Y-m-d");
  $type="Student";
  $stdclass=$_POST['class'];
  $result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_SESSION['uid']."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','$date','".$_SESSION['session']."','$type','$stdclass')")or die(mysqli_error());	
  
  
  
    $msg=urlencode($msg);
     $sedurl="http://msg.icloudsms.com/sendhttp.php?user=Sunshineschooljabalp&password=adminsunshine@123&message=".$msg."&mobiles=".$PhNo."&sender=SSKPMS";
    //$sedurl = str_replace(" ", "%20", $sedurl);
    $ret = file_get_contents($sedurl);
	?>
                <script>
		        alert('Enquiry successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=enquiry';
                </script>

<?php

}
}
   ?>