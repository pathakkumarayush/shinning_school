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

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;"> Registration Students Details</h2></center>
</div>

<div class="col_6">
<div class="form-style-2-heading">Registered Student

</div>
<table class="table table-bordered" id="sample_1" style="font-size:12px; font-weight:bold; ">
              <thead style="background-color:#006633; color:#FFFFFF;border:1px #993300 solid;">
              <tr style="background-color:#006633;color:#FFFFFF">
                  <th>No.</th>
				  <th>Reg. No</th>
                  <th>Student Name</th>
				  <th>Father Name</th>
				  <th>Class</th>
                  <th>Mobile</th>
                  <th>Date</th>
                  <th>Address</th>
				  <th>Status</th>
				  <th></th>
				  </tr>
			  
			  
              </thead>
			  
              <tbody>
			  <?php
	$sql="SELECT * FROM reg where session='".$_SESSION['session']."'";
	$result_set=mysqli_query($con,$sql);
	$i=1;
	while($row=mysqli_fetch_array($result_set))
	{
		?>
                 <tr>
                  <td><?php echo $i;  ?></td>
                  <td><?php echo $row['rno'] ?></td>
				  <td><?php echo $row['student_name'] ?></td>
                  <td><?php echo $row['student_fname'] ?></td>
                  <td><?php echo $row['student_class'] ?></td>
				   <td><?php echo $row['fmobile'] ?></td>
				  <td><?php echo $row['date'] ?></td>
                  <td><?php echo $row['address'] ?></td>
				  
				  <td>
				   <?php
				   if($row['status']=='1')
				   {
				   ?>
				   <span style="color:#003399">Convert To Admission</span>
				  
				  <?php  
				  }
				   ?>
				   
				  
				   
				    <?php
				   if($row['status']=='0')
				   {
				   ?>
				   <span style="color:#CC0000">Not Convert</span>
				  
				  <?php  
				  }
				   ?>
				   </td>
				  
				  
				  <td> 
				 <?php /*?> <a href="<?php echo $var."radmissionn&id=".$row['id']; ?>" target="_blank">Admission</a><?php */?>
				   <?php
				   if($row['status']=='0')
				   {
				   ?>
				  <a href="<?php echo $var."reg_adm&id=".$row['id']; ?>" target="_blank">Admission</a>
				  <?php  
				  }
				   ?>
				  
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
  <br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />  <br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />
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