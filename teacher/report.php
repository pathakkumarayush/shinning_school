<html>
<head>
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
                    filename: "Enquiry details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		
		<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excell").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exmm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Registration Report("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		
		<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excelll").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exmmm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Follow Up Report("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		
		<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excellll").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exmmmm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "New Admission Report("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		
		<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excela").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exma").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "All Student Report("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		
		<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excelc").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exmc").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Tc Report("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>


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
.col_4{ width:100%; height:1000px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
:-ms-input-placeholder 
{
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
    background: #1e4a1b;
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
    background: #1e4a1b;
    color: #fff;
   }

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
#div1{ display:none;}
#div2{ display:none;}
</style>
</head>
<body alink="#00FF66" link="#00CC00">


<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/frontdesk/front desk home.png" /><a href="./?pageid=fron_desk">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
       <img src="std.png"  style=" float:left; width:50px; height:40px; margin-left:5px; margin-top:2px;"/>
        <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Reports List</h2></center>
        </div>
        <div class="col_4">
        <?php /*?><div style="font-size:24px; color:#990000; margin:40px 0px 0px 270px; border:#FF0000 0px solid	">Total Student:
		<?php
        $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."'and status='0'");
        $maxrow=mysqli_fetch_array($maxid);
        $rowmax=mysqli_fetch_array($maxid);
		echo $maxrow['count(student_id)']; ?></div><?php */?>
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head"  style="width:1127px; background-color:#FFFFFF;">
		
		
		
	<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#CC9966;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=1"; ?>">Enquiry Student</a>&nbsp;
	
	<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#a29867;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=7"; ?>">Enquiry Class Wise</a>&nbsp;
	
	<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#ca68a3;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=2"; ?>">Registered Student</a>&nbsp;
	
	<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#961149;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=8"; ?>">Registered Class Wise</a>&nbsp;
		

<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#9c7854;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=3"; ?>">Follow Up</a>&nbsp;

<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#524940;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=9"; ?>">Follow Up Class Wise</a>&nbsp;



<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#70c382;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=4"; ?>">New Admission</a>&nbsp;
<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#6b5cc1;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=5"; ?>">All Student</a>&nbsp;
		
<a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#c6cc66;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=6"; ?>">TC Student</a>&nbsp;
	   
		<br clear="all">
	  
		
		 <?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==1))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
        <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#CC9966;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=1"; ?>">Enquiry Student</a></td></tr>
	    <tr>
		
        <td>Select Any One</td>
	    <td>
		<select name="status" class="select">
        <option value="0">All Enquiry</option>
		<option value="1">Enquiry To Registration</option>
		<option value="2">Enquiry To Admission</option>
        </select>
		</td>
	    <td><input type="submit" name="enquiry" value="Search" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==2))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
       
	   <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#ca68a3;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=2"; ?>">Registered Student</a></td></tr>
	    
	    <tr>
        <td>Select Any One</td>
	    <td>
		<select name="status" class="select">
        <option value="0">All Registration</option>
	
		<option value="1">Registration To Admission</option>
        </select>
		</td>
	    <td><input type="submit" name="reg" value="Search" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==3))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
      
	    <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#9c7854;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=3"; ?>">Follow Up</a></td></tr>
	  
	     <tr>
        <td>Select session</td>
        <td>&nbsp;</td>
	    <td><select name="session" class="select">
        <option value="-1">Select Session</option>
        <?php  for($i=2020;$i<=2025;$i++)
	    {  ?>
        <?php $j=$i; $j++;  $k=$i."-".$j; ?>
        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
        <?php } ?>
        </select></td>
        <td>&nbsp;</td>
	    <td><input type="submit" name="follow" value="Submit" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==4))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
         
		 <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; margin-left:10px; background-color:#70c382;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=4"; ?>">New Admission</a></td></tr>
		 
		 <tr>
        <td>Select session</td>
        <td>&nbsp;</td>
	    <td><select name="session" class="select">
        <option value="-1">Select Session</option>
        <?php  for($i=2020;$i<=2025;$i++)
	    {  ?>
        <?php $j=$i; $j++;  $k=$i."-".$j; ?>
        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
        <?php } ?>
        </select></td>
        <td>&nbsp;</td>
	    <td><input type="submit" name="adm" value="Submit" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==5))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
       
	   
	   <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; margin-left:10px;  background-color:#6b5cc1;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=5"; ?>">All Student</a></td></tr>
	   
	     <tr>
        <td>Select session</td>
        <td>&nbsp;</td>
	    <td><select name="session" class="select">
        <option value="-1">Select Session</option>
        <?php  for($i=2020;$i<=2025;$i++)
	    {  ?>
        <?php $j=$i; $j++;  $k=$i."-".$j; ?>
        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
        <?php } ?>
        </select></td>
        <td>&nbsp;</td>
	    <td><input type="submit" name="allstd" value="Submit" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==6))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
       
	   <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF;margin-left:10px;  background-color:#c6cc66;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=6"; ?>">TC Student</a></td></tr>
	   
	     <tr>
        <td>Select session</td>
        <td>&nbsp;</td>
	    <td><select name="session" class="select">
        <option value="-1">Select Session</option>
        <?php  for($i=2018;$i<=2025;$i++)
	    {  ?>
        <?php $j=$i; $j++;  $k=$i."-".$j; ?>
        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
        <?php } ?>
        </select></td>
        <td>&nbsp;</td>
	    <td><input type="submit" name="alltc" value="Submit" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==7))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
        
		<tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#a29867;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=7"; ?>">Enquiry Class Wise</a></td></tr>
		
		<tr>
        <td>Select Class</td>
	    <td>
    <select name="class" class="select" style="width:219px;" required>
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
	    <td><input type="submit" name="enquiryc" value="Search" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==8))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
      
	  <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#961149;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=8"; ?>">Registered Class Wise</a></td></tr>
	  
	    <tr>
        <td>Select Class</td>
	    <td>
    <select name="class" class="select" style="width:219px;" required>
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
	    <td><input type="submit" name="regclass" value="Search" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		
		<?php
	    if((!empty($_GET['divid'])) && ($_GET['divid']==9))
	    {
	    ?>
        <div style="border: solid #000 0px; width:500; color:#000; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px">
       
	   <tr><td></td><td colspan="2"><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color:#524940;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;" href="<?php echo $var."report"."&&divid=9"; ?>">Follow Up Class Wise</a></td></tr>
	   
	    <tr>
        <td>Select Class</td>
	    <td>
    <select name="class" class="select" style="width:219px;" required>
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
	    <td><input type="submit" name="fclass" value="Search" style="width:80px"></td>   
        </tr>
        </table>
        <br />
        </div>
		<br clear="all">
        <?php } ?>
		
		<div class="table" style="border:#006633 30px solid; height:680px; width:1066px; color:#000000;overflow:scroll">
		
	    <?php
		if(isset($_POST['enquiry']))
	    {
		
		if($_POST['status'] == "0")
		{
        $search=mysqli_query($con,"select * from  enquiry  WHERE  session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
        }
		if($_POST['status'] == "1")
	    {
        $search=mysqli_query($con,"select * from  enquiry  WHERE status='1' and  session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
        }
		if($_POST['status'] == "2")
	    {
        $search=mysqli_query($con,"select * from  enquiry  WHERE status='2' and  session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
        }
	  
		
		?>
	    <table  id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>Previous School</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
        </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['name'];?></td>
        <td><?php echo $studrow['fname'];?></td>
	    <td><?php echo $studrow['mname'];?></td>
	    <td><?php echo $studrow['aclass'];?></td>
	    <td><?php echo $studrow['dob'];?></td>
	    <td><?php echo $studrow['pclass'];?></td> 
	    <td><?php echo $studrow['percentage'];?></td> 
		<td><?php echo $studrow['mobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['st'];?></td> 
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		
		<tr><td colspan="12"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/enquirylist.php?status=<?php echo $_POST['status'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a></td></tr>
	    </table>
		
        <?php } ?>
		
		<?php
		if(isset($_POST['enquiryc']))
	    {
		
		$search=mysqli_query($con,"select * from  enquiry  WHERE aclass='".$_POST['class']."' and  session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
      
		
		
		?>
	    <table  id="tbl_exm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>Previous School</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
        </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['name'];?></td>
        <td><?php echo $studrow['fname'];?></td>
	    <td><?php echo $studrow['mname'];?></td>
	    <td><?php echo $studrow['aclass'];?></td>
	    <td><?php echo $studrow['dob'];?></td>
	    <td><?php echo $studrow['pclass'];?></td> 
	    <td><?php echo $studrow['percentage'];?></td> 
		<td><?php echo $studrow['mobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['st'];?></td> 
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		
		<tr><td colspan="12"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/enquirylistc.php?class=<?php echo $_POST['class'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a></td></tr>
	    </table>
		
        <?php } ?>
		
		
		
		
		<?php
		if(isset($_POST['reg']))
	    {
		
		if($_POST['status'] == "0")
		{
        $search=mysqli_query($con,"select * from  reg  WHERE  session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
        }
		if($_POST['status'] == "1")
	    {
        $search=mysqli_query($con,"select * from  reg  WHERE status='1' and  session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
        }
		
	  
		
		?>
	    <table  id="tbl_exmm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>PREVIOUS SCHOOL</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
        </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['student_name'];?></td>
        <td><?php echo $studrow['student_fname'];?></td>
	    <td><?php echo $studrow['m_name'];?></td>
	    <td><?php echo $studrow['student_class'];?></td>
	    <td><?php echo $studrow['student_dob'];?></td>
	    <td><?php echo $studrow['nat'];?></td> 
	    <td><?php echo $studrow['religion'];?></td> 
		<td><?php echo $studrow['fmobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['state'];?></td> 
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		
		
		
		<tr><td colspan="12"><button type="button" id="excell" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/reglist.php?status=<?php echo $_POST['status'];  ?>')">     <input type="button" value="Print" style="width:100px;"></a>

</td></tr>
	    </table>
		
		
        <?php } ?>
	
		
		<?php
		if(isset($_POST['regclass']))
	    {
	    $search=mysqli_query($con,"select * from  reg  WHERE  student_class='".$_POST['class']."' and session='".$_SESSION['session']."'");
		$num=mysqli_num_rows($search);
        ?>
	    <table  id="tbl_exmm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>PREVIOUS SCHOOL</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
        </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['student_name'];?></td>
        <td><?php echo $studrow['student_fname'];?></td>
	    <td><?php echo $studrow['m_name'];?></td>
	    <td><?php echo $studrow['student_class'];?></td>
	    <td><?php echo $studrow['student_dob'];?></td>
	    <td><?php echo $studrow['nat'];?></td> 
	    <td><?php echo $studrow['religion'];?></td> 
		<td><?php echo $studrow['fmobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['state'];?></td> 
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		
		
		
		<tr><td colspan="12"><button type="button" id="excell" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/reglist.php?status=<?php echo $_POST['status'];  ?>')">     <input type="button" value="Print" style="width:100px;"></a>

</td></tr>
	    </table>
		
		
        <?php } ?>
	
		
		
		
		
		 <?php
		if(isset($_POST['follow']))
	    {
		$search=mysqli_query($con,"select * from  enquiry  WHERE follow='1' and  session='".$_POST['session']."'");
		$num=mysqli_num_rows($search);
       
	   
		
		?>
	    <table  id="tbl_exmmm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>Previous School</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
		<td>Follow Date</td>
				  <td>(Description)<br>Conversation</td>
				  <td>Status</td>
				  <td>NEXT FOLLOW UP DATE</td>
				  <td>MODE OF FOLLOW UP</td>
				  <td>REMARK</td>
        </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
		$res_stud=mysqli_query($con,"select * from follow_up where eno='".$studrow['id']."' order by id desc")or die(mysqli_error());
        $rowstud=mysqli_fetch_array($res_stud);
	    ?>
			
		
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['name'];?></td>
        <td><?php echo $studrow['fname'];?></td>
	    <td><?php echo $studrow['mname'];?></td>
	    <td><?php echo $studrow['aclass'];?></td>
	    <td><?php echo $studrow['dob'];?></td>
	    <td><?php echo $studrow['pclass'];?></td> 
	    <td><?php echo $studrow['percentage'];?></td> 
		<td><?php echo $studrow['mobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['st'];?></td> 
		
		           <td><?php echo $rowstud['date'] ?></td>
				  <td><?php echo $rowstud['decs'] ?></td>
                  <td><?php echo $rowstud['status'] ?></td>
				  <td><?php echo $rowstud['ndate'] ?></td>
				  <td><?php echo $rowstud['mof'] ?></td>
				  <td><?php echo $rowstud['rmk'] ?></td>
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		
		<tr><td colspan="12">
		<button type="button" id="excelll" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/flist.php?ses=<?php echo $_POST['session'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a></td></tr>
	    </table>
		
        <?php } ?>
		
		<?php
		if(isset($_POST['fclass']))
	    {
		$search=mysqli_query($con,"select * from  enquiry  WHERE follow='1' and  aclass='".$_POST['class']."' ");
		$num=mysqli_num_rows($search);
       
	   
		
		?>
	    <table  id="tbl_exmmm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Previous Class</td>
		<td>Previous School</td>
	    <td>Mobile</td>
		<td>Address</td>
        <td>City</td>
	    <td>State</td>
		<td>Follow Date</td>
				  <td>(Description)<br>Conversation</td>
				  <td>Status</td>
				  <td>NEXT FOLLOW UP DATE</td>
				  <td>MODE OF FOLLOW UP</td>
				  <td>REMARK</td>
        </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
		$res_stud=mysqli_query($con,"select * from follow_up where eno='".$studrow['id']."' order by id desc")or die(mysqli_error());
        $rowstud=mysqli_fetch_array($res_stud);
	    ?>
			
		
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['name'];?></td>
        <td><?php echo $studrow['fname'];?></td>
	    <td><?php echo $studrow['mname'];?></td>
	    <td><?php echo $studrow['aclass'];?></td>
	    <td><?php echo $studrow['dob'];?></td>
	    <td><?php echo $studrow['pclass'];?></td> 
	    <td><?php echo $studrow['percentage'];?></td> 
		<td><?php echo $studrow['mobile'];?></td> 
		<td><?php echo $studrow['address'];?></td> 
		<td><?php echo $studrow['city'];?></td> 
		<td><?php echo $studrow['st'];?></td> 
		
		           <td><?php echo $rowstud['date'] ?></td>
				  <td><?php echo $rowstud['decs'] ?></td>
                  <td><?php echo $rowstud['status'] ?></td>
				  <td><?php echo $rowstud['ndate'] ?></td>
				  <td><?php echo $rowstud['mof'] ?></td>
				  <td><?php echo $rowstud['rmk'] ?></td>
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		
		<tr><td colspan="12">
		<button type="button" id="excelll" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/flist.php?ses=<?php echo $_POST['session'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a></td></tr>
	    </table>
		
        <?php } ?>
		
		
			
		<?php
		if(isset($_POST['adm']))
	    {
	    $search3=mysqli_query($con,"select * from student where student_session='".$_POST['session']."' and std_type='New' and status='0' order by student_name Asc");
		$num3=mysqli_num_rows($search3);
	    ?>
	    <table id="tbl_exmmmm" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Adm.No</td>
	
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Address</td>
		<td>Father Mobile</td>
		<td>Mother Mobile</td>
      
        </tr>
        <?php
        $i=1;
	    if($num3>0)
		{
	    while($studrow3=mysqli_fetch_array($search3))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow3['student_scholar'];?></td>
     
	    <td><?php echo ucwords($studrow3['student_name']);?></td>
	    <td><?php echo ucwords($studrow3['student_fname']);?></td>
	    <td><?php echo ucwords($studrow3['m_name']);?></td>
        <td><?php echo $studrow3['student_class'];?></td>
	    <td><?php echo $studrow3['student_dob'];?></td>
	    <td><?php echo $studrow3['student_address'];?></td>
        <td><?php echo $studrow3['student_contactno'];?></td> 
	    <td><?php echo $studrow3['f_tell_no_off'];?></td> 
	     
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		<td colspan="10">
<button type="button" id="excellll" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/newlist.php?ses=<?php echo $_POST['session'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a>
		</td>
	    </table>
        <?php } ?>
		
		
		
		<?php
		if(isset($_POST['allstd']))
	    {
	    $search3=mysqli_query($con,"select * from student where student_session='".$_POST['session']."' and status='0' order by student_name Asc");
		$num3=mysqli_num_rows($search3);
	    ?>
	    <table id="tbl_exma" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Adm.No</td>
	
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Address</td>
		<td>Father Mobile</td>
		<td>Mother Mobile</td>
      
        </tr>
        <?php
        $i=1;
	    if($num3>0)
		{
	    while($studrow3=mysqli_fetch_array($search3))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow3['student_scholar'];?></td>
     
	    <td><?php echo ucwords($studrow3['student_name']);?></td>
	    <td><?php echo ucwords($studrow3['student_fname']);?></td>
	    <td><?php echo ucwords($studrow3['m_name']);?></td>
        <td><?php echo $studrow3['student_class'];?></td>
	    <td><?php echo $studrow3['student_dob'];?></td>
	    <td><?php echo $studrow3['student_address'];?></td>
        <td><?php echo $studrow3['student_contactno'];?></td> 
	    <td><?php echo $studrow3['f_tell_no_off'];?></td> 
	     
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		<td colspan="10">
<button type="button" id="excela" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/allist.php?ses=<?php echo $_POST['session'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a>
		</td>
	    </table>
        <?php } ?>
		
		
		<?php
		if(isset($_POST['alltc']))
	    {
	    $search3=mysqli_query($con,"select * from student where student_session='".$_POST['session']."' and status='1' order by student_name Asc");
		$num3=mysqli_num_rows($search3);
	    ?>
	    <table id="tbl_exmc" width="100%" border="1" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Adm.No</td>
	
        <td>Name</td>
		<td>Father Name</td>
		<td>Mother Name</td>
        <td>Class</td>
		<td>D.O.B</td>
		<td>Address</td>
		<td>Father Mobile</td>
		<td>Mother Mobile</td>
      
        </tr>
        <?php
        $i=1;
	    if($num3>0)
		{
	    while($studrow3=mysqli_fetch_array($search3))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow3['student_scholar'];?></td>
     
	    <td><?php echo ucwords($studrow3['student_name']);?></td>
	    <td><?php echo ucwords($studrow3['student_fname']);?></td>
	    <td><?php echo ucwords($studrow3['m_name']);?></td>
        <td><?php echo $studrow3['student_class'];?></td>
	    <td><?php echo $studrow3['student_dob'];?></td>
	    <td><?php echo $studrow3['student_address'];?></td>
        <td><?php echo $studrow3['student_contactno'];?></td> 
	    <td><?php echo $studrow3['f_tell_no_off'];?></td> 
	     
        </tr>
        <?php
        $i++;
	    }
	    }
	    else
	    {
	    ?>
	    <tr>
	    <td><span style="color:#CC0000">No Record</span></td>
	    </tr>
	    <?php
	    }
	    ?>
		<td colspan="10">
<button type="button" id="excelc" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	
		
		
&nbsp;&nbsp;<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/tclist.php?ses=<?php echo $_POST['session'];  ?>')">     <input type="button" value="Print List " style="width:100px;"></a>
		</td>
	    </table>
        <?php } ?>
		
		</div>
		
		
		
		
		
		
        </form>					
        
 <br clear="all" >
      
		   
			   
		</div>
<br clear="all" />
</div>
<br clear="all" />
</div><br clear="all" /><br clear="all" />
</div><br clear="all" /><br clear="all" />
	