<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:2px; float:left; margin-top:10px;}
.col_4{ width:99%; height:550px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Enquiry")) { 
        return false;
    }
    }
</script> 

 <?php
              if(!empty($_GET['did']))
              {
              $d=date("Y-m-d");
              $query=mysqli_query($con,"delete from enquiry where id='".$_GET['did']."' ");	 
              }
			  ?>
			  
<?php
date_default_timezone_set('Asia/Kolkata');  
if(isset($_POST['submit']))
{
$da = date("d-m-Y");
$query=mysqli_query($con,"insert into enquiry(name,fname,mname,dob,aclass,pclass,percentage,mobile,address,gender,session,city,school,fo,mo,omobile,pn,lt,st,date,caste,board)
values('".$_POST['name']."','".$_POST['fname']."','".$_POST['mname']."','".$_POST['dob']."','".$_POST['class']."','".$_POST['pclass']."','".$_POST['per']."','".$_POST['mobile']."','".$_POST['address']."','".$_POST['gender']."','".$_SESSION['session']."','".$_POST['city']."','".$_SESSION['uid']."','".$_POST['fo']."','".$_POST['mo']."','".$_POST['omobile']."','".$_POST['pn']."','".$_POST['lt']."','".$_POST['st']."','$da','".$_POST['caste']."','".$_POST['board']."') ");
$msg1="Inserted Successfully";
	    
			
$PhNo="91".$_POST['mobile'];
	  

   
$msg="Dear Parents, Thanks for visiting our school. We appreciate your trust you have in us that you have selected our school among all for enrolling your child for a better education Regards SMRERP";
	
  $sid="SMRERP";
  $msg = str_replace("Senderid",$sid, $msg);
	 
  $reciever=$PhNo;
  $sub="Enquiry";
  $status ='Yes';
  $date=date("Y-m-d");
  $type="Student";
  $stdclass=$_POST['class'];
  $result=mysqli_query($con,"insert into sendmsg(sender,sender_user,reciever,sub,msg,status,date,session,type,class) values('".$_SESSION['uid']."','".$_SESSION['uid']."','".$reciever."','".$sub."','".$msg."','".$status."','$date','".$_SESSION['session']."','$type','$stdclass')")or die(mysql_error());	
  
  
  
   	
$authKey="3eef364c3dce95fa5ff48367b808541";
$senderId="SMRERP";
$serverUrl="http://msg.msgclub.net/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;
    
$route="1";
$ret = sendsmsPOST($PhNo,$senderId,$route,$msg,$serverUrl,$authKey);

	?>
                <script>
		        alert('Enquiry successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=enquiry';
                </script>

<?php
}
?>	

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
	
	 <td>FATHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="fname" class="tb5"></td>
	
	<td>ASMISSION IN CLASS <span style="color:#FF0000">*</span></td>
    <td>
	 <?php
         $class=mysqli_query($con,"select distinct(class) from cla where school='".$_SESSION['uid']."'");
		 ?>
	<select name="class" class="select" style="width:219px;">
    <option value="">Select Class</option>

   <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
   
    </select>
    </td>
    </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
      
	  <tr>
	  <td>MOBILE NO</td>
	  <td><input type="text" name="mobile" class="tb5"></td>
	 
	  <td>MOTHER'S NAME </td>
      <td><input type="text" name="mname" class="tb5" ></td>
	 
	  <td>DATE OF BIRTH</td>
      <td><input type="Text" id="demo1" maxlength="25" name="dob" class="tb5" size="25" >
      <a href="javascript:NewCal('demo1','ddmmmyyyy',false,24)"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
	  </tr>
     <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
	   <tr>
	   <td>GENDER </td>
	   <td><input type="radio" name="gender" value="male" checked="checked">Male &nbsp;&nbsp; <input type="radio" name="gender" value="female">Female</td>
	   <td>FATHER OCCUPATION</td>
	   <td><input type="text" name="fo" class="tb5"></td>
	  <td>MOTHER OCCUPATION</td>
	  <td><input type="text" name="mo" class="tb5"></td>
	            
 
		
	  <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
	
	  <tr>
	  <td>ALTERNATE CONT. NO.</td>
	  <td><input type="text" name="omobile" class="tb5"></td>
	  
	  <td>PREVIOUS CLASS</td>
	  <td> 
	  <select name="pclass"  class="select" style="width:219px;">
      <option value="">Select Class</option>
      <option>NURSERY</option>
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
      <option>XI</option>
      <option>XI</option>
      </select>
	  </td>
	  <td>PREVIOUS SCHOOL</td>
	  <td><input type="text" name="per" class="tb5"></td>
	  </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
     
	  <tr> <td colspan="6"><div style="background-color:#006633; width:1124px; height:30px; color:#FFFFFF">&nbsp;&nbsp;
	  <span style="margin-top:7px; position:absolute; font-size:16px;">Correspondence Address</span>
	  </div></td></tr>	   
		 
      <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
	 <tr>
	 
	 <td>ADDRESS, (HOUSE NO, <BR />BUILDING)</td>
	 <td><textarea name="address" cols="23" rows="2"></textarea></td>
	  <td>STATE</td>
		   <td><input type="text" name="st" class="tb5"></td>
	 
	 
	 <td>CITY</td>
    <td><input type="text" name="city" class="tb5"></td>
		
	 </tr>
             <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	    
		
	    <tr>
		  
		   
		
		  
		  <td>PIN CODE.</td>
           <td><input type="text" name="pn" class="tb5"></td>
		  
		  <td>Remarks</td>
	       <td><input type="text" name="lt" class="tb5" ></td>
		   <td>Board Type</td>
		   <td>
		   <select name="board"  class="select" style="width:219px;" required>
             <option value="">Select Class</option>
             <option value="MP Board">MP Board</option>
             <option value="CBSE Board">CBSE Board</option>
          </select>
		  </td>
		
		 </tr>
            
		  <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	   
		 
			 <tr>
		  <td></td>
           <td></td>
		  
		  <td></td>
	       <td></td>
		   <td></td>
		   <td><input type="submit" name="submit" value="Submit Enquiry"></td>
		
		 </tr>
			
        <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	   
    </table>
    </form>

</div>
<div class="col_6">
<div class="form-style-2-heading">Enquiry Information

<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/eall.php?ses=<?php echo $_SESSION['session'];  ?>')">     <input type="button" value="ALL STUDENT List " style="width:150px; margin-left:50PX;"></a>

<a style=" border-radius:5px; padding:5 5 5 5 ;color:#000;font-size:16px; float:right;" href="<?php echo $var."enquiry"; ?>">View Enquiry</a>
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
				  <th>Remarks</th>
				 <th></th>
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
				  <td><?php echo $row['lt'] ?></td>
                  
              
            <td> 
			
			<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/fee.php?class=<?php echo $row['aclass']."&ses=".$_SESSION['session']."&id=".$row['id']; ?>')"> 
	View Fee</a>
	||
	
	 <a href="<?php echo $var."eny&eid=".$row['id']; ?>" target="_blank">Edit</a>||
	    <a href="<?php echo $var."enquiry&did=".$row['id']; ?>" onClick="return confirmation();">Delete</a>
	   
	<td>
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
