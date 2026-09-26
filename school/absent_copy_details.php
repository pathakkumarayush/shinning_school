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
		<script type="text/javascript">
$(document).ready(function()
{
	$(".class").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_subb.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".subject").html(html);
			} 
		});
	});
	

	
});
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Attemdance/attan.png" /><a href="./?pageid=copy_collection">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/attend.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Copy Attendance Details</h2>
</div>

<div class="col_4" style="min-height:300px;">
						
		
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
<div class="box-head" style="width:1142px">
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."copy_collection"; ?>">Add Attendance</a>&nbsp; || &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."absent_copy_details"."&&divid=2"; ?>">Date Wise</a>&nbsp; || &nbsp; 
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."copy_view"; ?>">Class Wise View Report</a> 
<?php /*?> <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_attendance_details"."&&divid=4"; ?>">Monthly Report</a> &nbsp; || &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_attendance_details"."&&divid=5"; ?>">Annual Report</a><?php */?>

</div>
              
       
		 
	      <?php
		   //student by scholar Id
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
		   date_default_timezone_set('Asia/Kolkata');
            ?>
		   <table style="margin:50px 0px 0px 70px; font-size:14px; width:300px">
		   <tr><td>Date</td><td><input type="text" name="date"  value="<?php  echo date('d-m-Y');  ?>"/></td></tr>
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   <tr><td>&nbsp;</td><td>
		   <input type="submit" name="Sub1" value="Submit"</td></tr>
		   </table> 
           <?php
		   }
		   ?>
           
		   <?php
	       if(isset($_POST['Sub1']))
		   {
		   ?>
	       <div style="width:900px;margin-top:20px; height:700px; margin-left:100px;  border:5px #006633 solid; overflow:scroll;">
		   <form id="form1">
		   <div id="dvContainer">
		   <table width="100%" border="1" cellspacing="0" cellpadding="0">
		   <h2 align="center" style="margin-top:20px; color:#990033">Shining Public Hr. Sec. School Raisen (M.P.)</h2>
		   <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033">Copy Collection Absent Report - <?php echo $_POST['date']; ?></h2>
		   <tr style="font-weight:bold; height:23px">
	       <td>Sr</td>
		   <td>&nbsp;Roll No</td>
		   <td>&nbsp;Student Name</td>
		   <td>&nbsp;Student father</td>
		   <td>&nbsp;Class</td>
		   <td>&nbsp;Subject</td>
         
           <?php
		   
	       $search=mysqli_query($con,"select * from exam_copy_collection where session='".$_SESSION['session']."' and date='".$_POST['date']."'");
		   
		   $i=1;
		   while($studrow=mysqli_fetch_array($search))
		   {
		   $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' order by student_name Asc ");
		   $rowsearch=mysqli_fetch_array($numclass1);
		   
		   $sid = $studrow['student'];
	       $rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='".$_SESSION['session']."'");
		   $rowno=mysqli_fetch_array($rno);
		   ?>
		   <tr style="height:20px;">
		   <td>&nbsp;<?php echo $i;  ?></td>
		   <td>&nbsp;<?php echo $rowno['rno'];?></td>
		   <td>&nbsp;<?php echo $rowsearch['student_name'];  ?></td>
		   <td>&nbsp;<?php echo $rowsearch['student_fname'];  ?></td>
		   <td>&nbsp;<?php echo $studrow['class']; ?></td>
		   <td>&nbsp;<?php echo $studrow['subject']; ?></td>
		   
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
		  <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
         <tr>
		 <td>Date<span class="textfieldRequiredMsg"></span></td>
		 <td><input type="text" name="date" /></td>
         <td>Class<span class="textfieldRequiredMsg"></span></td>
         <?php
         $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		 ?>
         <td>
		 <select name="class" class="class select" style="width:150px; border-radius:4px;" required />
         <option value="">Select Class</option>
         <?php
         $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
         while($rows=mysqli_fetch_array($res))
         {
		 ?>
         <option value="<?php echo $rows["class"];  ?>"><?php echo $rows["class"]; ?></option>  
         <?php
	     } 
         ?>
         </select>
         </td>
		 
		 	 
        <td>Subject<span>*</span></td>
        <td>
        <select name="subject" class="subject select" style="width:175px" required>
        <option value="">--Select subject--</option>
        </select>
        </td>
		 
	     <td>Exam<span class="textfieldRequiredMsg"></span></td>
         <?php
         $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		 ?>
         <td>
		 <select name="exam" class="select" style="width:150px; border-radius:4px;" required />
         <option value="">Select Exam</option>
         <?php
         $resexam=mysqli_query($con,"select distinct(examination_name) from examination where examination_session='".$_SESSION["session"]."'");
         while($rowexam=mysqli_fetch_array($resexam))
         {
		 ?>
         <option value="<?php echo $rowexam["examination_name"];  ?>"><?php echo $rowexam["examination_name"]; ?></option>  
         <?php
	     } 
         ?>
         </select>
         </td>
		 
	
	   
			  
			 <!-- <td><div id="txtHint1"></div></td>-->
           <td><input type="submit" name="Sub" value="Submit" style="width:80px"></td>   
		  </tr>
        </table>
		   <?php
		   }
		   ?>
		  
           <?php
	       if(isset($_POST['Sub']))
		   {
		   ?>
	       <div style="width:900px;margin-top:20px; height:700px; margin-left:100px;  border:5px #006633 solid; overflow:scroll;">
		   <form id="form1">
		   <div id="dvContainer">
		   <table width="100%" border="1" cellspacing="0" cellpadding="0">
		   <h2 align="center" style="margin-top:20px; color:#990033">Shining Public Hr. Sec. School Raisen (M.P.)</h2>
		   <h2 align="center" style="margin-top:10px; margin-bottom:10px;color:#990033">Copy Collection Absent Report - <?php echo $_POST['date']; ?></h2>
		   <tr style="font-weight:bold; height:23px">
	       <td>Sr</td>
		   <td>&nbsp;Roll No</td>
		   <td>&nbsp;Student Name</td>
		   <td>&nbsp;Student father</td>
		   <td>&nbsp;Class</td>
		   <td>&nbsp;Subject</td>
         
           <?php
		   
	       $search=mysqli_query($con,"select * from exam_copy_collection where session='".$_SESSION['session']."' and date='".$_POST['date']."' and class='".$_POST['class']."' and exam='".$_POST['exam']."' and subject='".$_POST['subject']."'");
		   
		   $i=1;
		   while($studrow=mysqli_fetch_array($search))
		   {
		   $numclass1=mysqli_query($con,"select * from student where student_id='".$studrow['student']."' and student_session='".$_SESSION['session']."' order by student_name Asc ");
		   $rowsearch=mysqli_fetch_array($numclass1);
		   
		   $sid = $studrow['student'];
	       $rno=mysqli_query($con,"select * from roll_no where sid='$sid' and ses='".$_SESSION['session']."'");
		   $rowno=mysqli_fetch_array($rno);
		   ?>
		   <tr style="height:20px;">
		   <td>&nbsp;<?php echo $i;  ?></td>
		   <td>&nbsp;<?php echo $rowno['rno'];?></td>
		   <td>&nbsp;<?php echo $rowsearch['student_name'];  ?></td>
		   <td>&nbsp;<?php echo $rowsearch['student_fname'];  ?></td>
		   <td>&nbsp;<?php echo $studrow['class']; ?></td>
		   <td>&nbsp;<?php echo $studrow['subject']; ?></td>
		   
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

  
