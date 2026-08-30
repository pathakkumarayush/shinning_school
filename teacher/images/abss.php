<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>
jQuery(function($){
  $('#from').datepicker({ dateFormat: 'dd-mm-yy' });
  $('#to').datepicker({ dateFormat: 'yy-mm-dd' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Fee Collection By Date("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
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
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
<?php
if(isset($_POST['sentmessage']))
{

$dat=$_POST['dt'];
$month=$_POST['mn'];

foreach($_POST['attendance'] as $k=>$f)
{
$rmk = 'rmk'.$k;
$rmk = $_POST[$rmk];

if($f=="absent")
{
 $search22=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and student='$k' and date='".$_POST['dt']."' ");
if(mysqli_num_rows($search22)<1)
{
   
  $absent=mysqli_query($con,"insert into absentdetail(student,date,session,class,absent,month) values('$k','$dat','".$_SESSION['session']."','".$_POST['class']."','$f','$month')");
  
   $search22=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_school='".$_SESSION['uid']."' and  student_session='".$_SESSION['session']."' and student_id='$k'");
				 $rowstudent=mysqli_fetch_array($search22);	   
  
      
		$sub="Attendance Detail";	
    	$nmsg="Your child ".$rowstudent['student_name']." is absent Today";	
		
		$session=$_SESSION['session'];
		$page=1;
		$r=sms($_SESSION["uid"],$k,$sub,$nmsg,'Yes',$session,$page);
}
}
}
}

?>

<div class="full_div">
<br clear="all" />
<div class="left_sect">
<img src="images/Attemdance/attan.png" />
<a href="./?pageid=home">
<img src="images/buttonGoBack.png" class="gback"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<h2 style="margin-left:0px; color:#006633; font-size:20px; line-height:40px;">&nbsp;Student Attendance</h2>
</div>

<div class="col_4">
    <?php $day= date("D");
	if($day!="Sun")
	{
	$chkdate=date("Y-m-d");
	$event=mysqli_query($con,"select * from event_calendar where event_date='$chkdate'");
	$evtnum = mysqli_num_rows($event);
	if($evtnum<1)
	{?>

 
 
      
   
  
            <div class="box-head" style="width:1127px">
						
						</div>
           
       
         
<div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <form method="post" name="myForm" action="" enctype="multipart/form-data" >
	     <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
         <tr>
         <td>
		<select name="class" class="select" style="width:150px" onChange="showSection(this.value)">
        <option>Select class</option>
	    <?php
	    $cltech=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");
       
		while($clrow=mysqli_fetch_array($cltech))
		{
	    $result = mysqli_query($con,"SELECT * FROM class where class='".$clrow['class']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
		<option value="<?php echo $tier["class"];  ?>"><?php echo  $tier["class"].$tier["class_section"]; ?></option>
        <?php
		}
		}
		?>
		</select>
        </td>
		</tr>
		<tr> 
	    <td><input name="from" type="text"  id="from" style=" width:130px;" class="tb5" value="<?php echo date('d-m-Y')?>" required> </td>
		</tr>
		<tr>   
		           <td>
				   <select name="mnt" class="select" style="width:150px" required>
                   <option value="">Select Month</option>
                   <option value="Jul">July</option>
                   <option value="Aug">August</option>
                   <option value="Sep">September</option>
                   <option value="Oct">October</option>
                   <option value="Nov">November</option>
                   <option value="Dec">December</option>
                   <option value="Jan">January</option>
                   <option value="feb">February</option>
                   <option value="Mar">March</option>
                   <option value="Apr">April</option>
                   <option value="May">May</option>
                   <option value="Jun">June</option>
                   </select>
			   </td>
			 </tr>
			 <tr> 
			 <!-- <td><div id="txtHint1"></div></td>-->
           <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		  </tr>
        </table><br>
     </form>
		  
		 
		 <div class="table" style="border:#33cc66 20px solid; height:3000px; margin-left:-32px; width:1107px;overflow:scroll">
         <form method="post" name="myForm" action="" enctype="multipart/form-data" >
		<?php
	    if(isset($_POST['search4']))
		{
				
		?>
	    <table class="tabs" border="0" cellspacing="0" cellpadding="0">
		<tr style="font-weight:bold">
	   
		<td>Name</td>
		<td>Father Name</td>
		<td>Class</td>
        <td>Present</td>
	    <td>Absent</td>
		<td>Date</td>
		<td>Month</td>
	    </tr>
<?php
$i=1;
$k=0;
$searcha=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
 while($studrow=mysqli_fetch_array($searcha))
		{
		$k++;
	    ?>	
    <tr style="color:#335599">
  
	<td><?php echo ucwords($studrow['student_name']);?></td>
	<input type="hidden" name="student" value="<?php echo $studrow['student_id'];?>">
	
	<input type="hidden" name="class" value="<?php echo $studrow['student_class'];?>">
	<td><?php echo ucwords($studrow['student_fname']);?></td>
	<td><?php echo ucwords($studrow['student_class']);?></td>
    <td><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="prersent" checked="checked"></td>
	<td><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="absent" >
	
	</td>
	<td><input type="text" name="dt" value="<?php echo $_POST['from'];?>" style="width:100px;"></td>
	
	<td><input type="text" name="mn" value="<?php echo $_POST['mnt'];?>" style="width:100px;"></td>
	
    </tr>
    <?php
    $i++;
	}
	?>
	<tr>
	<td><input type="submit" name="sentmessage" value="Send Message">
	</td></tr>
	</table>
	<?php }?>
  </form>
  
     </div>
      
                 
       
		 
	<?php
				}
				 else
				   {
				   ?>
				    <div class="success" style="width:250px; height:10px; border-radius:5px" ><b><?php echo "Sorry Today is Holiday";   ?></b></div>
				   <?php
				   }
				}
				else
				 {
				 ?>
				     <div class="success" style="width:250px; height:10px; border-radius:5px" ><b><?php echo "Sorry Today is Sunday";   ?></b></div>
				 <?php
				 }
				 
			
				    ?>
					  
				<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
