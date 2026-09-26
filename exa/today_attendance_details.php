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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
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

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Attemdance/attan.png" /><a href="./?pageid=home">
<img src="images/buttonGoBack.png" class="gback"/></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/attend.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Attendance Details</h2>
</div>

<div class="col_4" style="min-height:300px;">
						
		
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
<div class="box-head" style="width:1142px">
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."today_attendance_details"."&&divid=1"; ?>">Today Absents</a>|
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."today_attendance_details"."&&divid=2"; ?>">Date & class Wise</a>|
 <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."student_attendance_details"."&&divid=4"; ?>">Monthly Rep.</a>|
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;" href="<?php echo $var."student_attendance_details"."&&divid=5"; ?>">Annual Rep.</a></div>
              
       
		 
	      <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
		   date_default_timezone_set('Asia/Kolkata');
        
		   ?>
		   <table style="margin:20px 0px 0px 20px; font-size:14px; width:300px">
		   <tr><td>Date</td><td><input type="text" name="date"  value="<?php  echo date('d-m-Y');  ?>"/></td></tr>
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   <tr><td>&nbsp;</td><td>
		   <input type="submit" name="Sub1"  value="Submit"</td></tr>
		   </table> 
           <?php
		   }
		   ?>
           
		   <?php
	       if(isset($_POST['Sub1']))
		   {
		   ?>
	       <div class="att_div" style="margin-top:20px; height:700px; margin-left:5px;border:5px #006633 solid;overflow:scroll;">
		   <form id="form1">
		   <div id="dvContainer">
		   <table width="100%" border="1" cellspacing="0" cellpadding="0">
		   <h2 align="center" style="margin-top:20px; color:#990033">Shining Public Hr. Sec. School, Raisen</h2>
		   <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033">Daily Absent Report( <?php echo $_POST['date']; ?>)</h2>
		   <tr style="font-weight:bold; height:23px">
	       <td>Sr</td>
		   <td>&nbsp;Student Name</td>
		   <td>&nbsp;Student father</td>
		   <td>&nbsp;Class</td>
		   <td>&nbsp;Date</td>
           <td>&nbsp;Month</td>
           <?php
	       $search=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and date='".$_POST['date']."'");
		   $i=1;
		   while($studrow=mysqli_fetch_array($search))
		   {
		   $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' and
		   student_school='".$_SESSION['uid']."'");
		   $rowsearch=mysqli_fetch_array($numclass1);
		   ?>
		   <tr style="height:20px;">
		   <td>&nbsp;<?php echo $i;  ?></td>
		   <td>&nbsp;<?php echo $rowsearch['student_name'];  ?></td>
		     <td>&nbsp;<?php echo $rowsearch['student_fname'];  ?></td>
		   <td>&nbsp;<?php echo $studrow['class']; ?></td>
		   <td>&nbsp;<?php echo $studrow['date']; ?></td>
		   <td>&nbsp;<?php echo $studrow['month']; ?></td>
		   </tr>
			 <?php $i++; }  ?>	
	       </table>
		   </div>
		   </form>
		   <input type="button" value="Print" id="btnPrint" />
		   </div>
		   <?php
		   }
	       ?>
	   	 
		    <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
		   ?>
		   <table style="margin:20px 0px 0px 20px; font-size:14px; width:300px">
		   <tr><td>Date</td><td>
		   <br />
		   <span style="color:#CC0000">Date Format DD-MM-YYYY</span>
		   <input type="text" name="date" /></td></tr>
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   <tr>
           <td>Class<span class="textfieldRequiredMsg"></span></td>
           <?php
           $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		   ?>
           <td><select name="class" class="select" style="width:183px" onchange="showSection(this.value)">
           <option value="-1">Select class</option>
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
		  
           </tr>
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   <tr><td>&nbsp;</td><td><input type="submit" name="Sub" value="Submit" /></td></tr>
		   </table> 
           <?php
		   }
		   ?>
		  
              <?php
	       if(isset($_POST['Sub']))
		   {
		   ?>
	       <div class="att_div" style="margin-top:20px; height:700px; margin-left:5px;  border:5px #006633 solid; overflow:scroll;">
		   <form id="form1">
		   <div id="dvContainer">
		 
		   <table width="100%" border="1" cellspacing="0" cellpadding="0">
		   <h2 align="center" style="margin-top:20px; color:#990033">Shining Public Hr. Sec. School, Raisen</h2>
		   <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033">Absent Report - <?php echo $_POST['date']; ?></h2>
		   <tr style="font-weight:bold; height:23px">
	       <td>Sr</td>
		   <td>&nbsp;Student Name</td>
		   <td>&nbsp;Student father</td>
		   <td>&nbsp;Class</td>
		   <td>&nbsp;Date</td>
           <td>&nbsp;Month</td>
           <?php
	       $search=mysqli_query($con,"select * from absentdetail where session='".$_SESSION['session']."' and date='".$_POST['date']."' and class='".$_POST['class']."'");
		   $i=1;
		   while($studrow=mysqli_fetch_array($search))
		   {
		   $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' order by student_name Asc ");
		   $rowsearch=mysqli_fetch_array($numclass1);
		   ?>
		   <tr style="height:20px;">
		   <td>&nbsp;<?php echo $i;  ?></td>
		   <td>&nbsp;<?php echo $rowsearch['student_name'];  ?></td>
		     <td>&nbsp;<?php echo $rowsearch['student_fname'];  ?></td>
		   <td>&nbsp;<?php echo $studrow['class']; ?></td>
		   <td>&nbsp;<?php echo $studrow['date']; ?></td>
		   <td>&nbsp;<?php echo $studrow['month']; ?></td>
		   </tr>
			 <?php $i++; }  ?>	
	       </table>
		   </div>
		   </form>
		   <input type="button" value="Print" id="btnPrint" />
		   </div>
		   <?php
		   }
	       ?>
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>

  
