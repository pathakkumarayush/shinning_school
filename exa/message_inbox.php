<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
function redirect(id)
{
	window.location="<?php echo $var."viewmessage&id="?>+id";
}
</script>

<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this message")) { 
        return false;
    }
    }
</script>
<link href="css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
th
{
	background-color:#003162;
	color:#FFF;
	width:auto;
}
</style>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ width:100%; height:auto; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
    font-style: italic;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"],input[type="email"],input[type="number"] {
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
input[type="email"]:focus,
input[type="email"].focus {
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
	font-weight:bold;
	
	
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
<?php
$sql = mysqli_query($con,"select * from sendmsg where reciever ='".$_SESSION['userid']."'");
$nr = mysqli_num_rows($sql); 
?>
<div class="full_div" style="background-color:#CCCCCC">
<br clear="all" />
<div class="left_sect"><img src="images/short-code-sms.png" /><a href="./?pageid=sent_message">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/Sms-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:4px;">Inbox Message </h2>
</div>
<div class="col_4" style="margin-top:0px;" >

<div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	"> Total Messages: <?php echo $nr; ?></div>

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                

 
 
 <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <br>
        </div>
         <div class="table" style="border: #006633 20px solid; height:590px; width:1107px;overflow:scroll">
         
           <table class="table table-bordered" id="sample_1" style=" color:#000000; margin-left:5px;" width="98.7%" >
              <thead style="background-color:#006633; color:#FFFFFF">
              <tr style="background-color: #006633; color:#FFFFFF">
                  <th>Sr No.</th>
                  <th>Sender</th>
				  <th>Subject</th>
                  <th>Date</th>
                  <th>View</th>
                  
              </tr>
			 </thead>
			 <tbody>
			<?php
$res_msg=mysqli_query($con,"select * from sendmsg where reciever='".$_SESSION['userid']."' ORDER BY id DESC")or die(mysqli_error());

$i=1;
while($row_msg=mysqli_fetch_array($res_msg))
{
	//$st=$row_msg["status"];
	?>
               <tr <?php if($st=="Pending"){echo "bgcolor='#FFFFCC'";}else if($st=="Yes"){echo "bgcolor='#fff'";}else{echo "bgcolor='#FFF0F0'";} if($row_msg['is_read']==0) { ?> style="font-weight:bold" <?php }  ?>>
                   <td  width="50" ><?php echo $i; ?></td>
   
  
    <td>
	<?php 
	$login=mysqli_query($con,"select * from login where uid='".$row_msg["sender_user"]."'"); 
	$rowlog=mysqli_fetch_array($login);
	if($rowlog['type']=="teacher")
	{
	 $teachname=mysqli_query($con,"select * from teacher where uid='".$row_msg['sender_user']."'");
	 $rowteach=mysqli_fetch_array($teachname);
	  echo ucwords($rowteach['teacher_name'].'-'.'Teacher');
	}
	else if($rowlog['type']=="student")
	{
	 $teachname=mysqli_query($con,"select * from student where uid='".$row_msg['sender_user']."'");
	 $rowteach=mysqli_fetch_array($teachname);
	 echo ucwords($rowteach['student_name'].'-'.'student');
	}
	?>
    </td>
    <td ><?php  echo $row_msg["sub"]; ?></td>
    <td  width="120"><?php echo date("d-m-Y",strtotime($row_msg["date"])); ?></td>
    <td  width="120"><a href="<?php echo $var."viewmessage&id=".$row_msg["id"]; ?>">View</a></td>
    </tr>
      <?php
	 $i++;
	}
	?>
          </tbody>
          </table>
         </div>
	  
		  
		 
      
                 
                   </form>					
        
  
		 
		<!-- End Box -->					   
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
<script>
$( "button" ).click(function() {
  $( ".left_ul" ).slideToggle( "slow" );
});
</script>
