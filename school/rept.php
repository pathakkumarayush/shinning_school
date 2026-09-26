<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>
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
                var file_name = $("#ses").val();
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Teacher Details("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>

<script language="javascript">
function download_report()
{
window.location='Student Report.xls';
}
</script>
<script type="text/javascript">
function popitup(url) 
{
newwindow=window.open(url,'name','height=635,width=723');
if (window.focus) {newwindow.focus()}
return false;
}
</script>
<script type="text/javascript">
function printData()
{
   var divToPrint=document.getElementById("printablediv");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}
</script>

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
              "<html><head><title></title></head><body>" + 
              divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
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
#div1{ display:none;}
#div2{ display:none;}
.num {
  mso-number-format:General;
}
.text{
  mso-number-format:"\@";/*force text*/
}

table.report-container {
      page-break-after:always;
}
thead.report-header {
      display:table-header-group;
}

</style>

</head>
<body alink="#00FF66" link="#00CC00">


<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=staff_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry" style="height:40px;">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teacher Reports List</h2>
		
		
	
		
	<?php /*?>	<a href="./?pageid=report_strbus&&divid=1" style="color:#FFFFFF;float:right; background-color:#FF0033; margin-top:10px; padding:6px; font-size:18px">Transport Strength</a>
		<a href="./?pageid=report_str" style="color:#FFFFFF;float:right; background-color:#996600; margin-top:10px; padding:6px; font-size:18px">Strength All Class</a>
		<a href="./?pageid=report_strgender" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Strength Gender Wise</a>
		<a href="./?pageid=report_caste" style="color:#FFFFFF;float:right; background-color:#660099; margin-top:10px; padding:6px; font-size:18px">Strength Caste Wise</a>
		<a href="./?pageid=report_str_rte" style="color:#FFFFFF;float:right; background-color:#CC3399; margin-top:10px; padding:6px; font-size:18px">Strength RTE Wise</a><BR>
		<a href="./?pageid=report_str_new" style="color:#FFFFFF;float:right; background-color:#ff5722; margin-top:10px; padding:6px; font-size:18px">Strength New Student</a><?php */?>
        </div>
        <div class="col_4">
        <div style="font-size:24px; color:#990000; margin:40px 0px 0px 20px; border:#FF0000 0px solid  ">Total Staff:
        <?php
        $maxid=mysqli_query($con,"select count(teacher_id) from teacher where teacher_session='".$_SESSION['session']."' and status='Active'");
        $maxrow=mysqli_fetch_array($maxid);
        $rowmax=mysqli_fetch_array($maxid);
        echo $maxrow['count(teacher_id)']; ?></div>
        <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="width:auto;height: 40px!important;">
        <!-- <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:15px" href="<?php echo $var."report"."&&divid=1"; ?>">All Student</a> &nbsp; || &nbsp;
        <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:15px" href="<?php echo $var."report"."&&divid=6"; ?>">New Student</a> &nbsp; || &nbsp;
        <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:15px" href="<?php echo $var."report"."&&divid=7"; ?>">RTE Studentt</a> &nbsp; || &nbsp;
        <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:15px" href="<?php echo $var."report"."&&divid=2"; ?>">Transport Student</a> &nbsp; || &nbsp;
        <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:15px" href="<?php echo $var."report"."&&divid=3"; ?>">Hostel Student</a> &nbsp; || &nbsp;
        <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:15px" href="<?php echo $var."report"."&&divid=5"; ?>">TC Student</a> &nbsp; || &nbsp;
        <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:15px" href="<?php echo $var."report"."&&divid=4"; ?>">All Teacher</a> &nbsp; || &nbsp;
         <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:15px" href="<?php echo $var."report"."&&divid=8"; ?>">Caste By</a> -->
         

         <!-- <select name="caste" class="select" onchange="this.form.submit();">
            <option value="">Select Caste</option>
            <option value="GENERAL" <?php if(isset($_POST['caste']) && $_POST['caste']=="GENERAL"){echo "selected=selected";} ?> >GENRAL</option>
            <option value="OBC" <?php if(isset($_POST['caste']) && $_POST['caste']=="OBC"){echo "selected=selected";} ?>>OBC</option>
            <option value="ST" <?php if(isset($_POST['caste']) && $_POST['caste']=="ST"){echo "selected=selected";} ?>>ST</option>
            <option value="SC" <?php if(isset($_POST['caste']) && $_POST['caste']=="SC"){echo "selected=selected";} ?>>SC</option>
         </select> -->

        <!--  <label>By Gender</label>
         <select class="select">
             <option class="select" value="">--Select--</option>
         </select> | 
         
         <label>By Religion</label>
         <select class="select">
             <option class="select" value="">--Select--</option>
         </select> | 
         
         <label>By Caste</label>
         <select class="select">
             <option class="select" value="">--Select--</option>
         </select> | 
         
         <label>By Class</label>
         <select class="select">
             <option class="select" value="">--Select--</option>
         </select> -->
        </div>              
        

        <div style="width:75px;padding: 10px 10px 10px 15px; float:left;">
        <label style="color:#CC0000;font-weight:bold;">By Gender :</label><br><br>
        <input type="radio" name="gender" value="male"><span style="color:#000; font-weight:bold">Male</span><br><br>
        <input type="radio" name="gender" value="female"><span style="color:#000; font-weight:bold">Female</span><br><br>
        </div>

        <div style="width:100px;padding: 10px 10px 10px 15px; float:left; ">
        <label style="color:#CC0000;font-weight:bold;">Select Any One:</label><br><br>
        <span style="padding-left:0px;">
        <input type="checkbox" name="staff_typ[]" value="teaching"><span style="color:#000; font-weight:bold">Teaching</span><br><br>
        <input type="checkbox" name="staff_typ[]" value="nonteaching"><span style="color:#000; font-weight:bold">Nonteaching</span><br><br>
		<input type="checkbox" name="staff_typ[]" value="grd"><span style="color:#000; font-weight:bold">Group D</span><br><br>
		 </div>

        <div style="width:140px;padding: 10px 10px 10px 15px; float:left;">
        <label style="color:#CC0000;font-weight:bold;">By High Qualifacation :</label><br><br>
        <input type="radio" name="hq" value="Bed"><span style="color:#000; font-weight:bold">B.ed</span><br><br>
        <input type="radio" name="hq" value="Ded"><span style="color:#000; font-weight:bold">D.ed</span><br><br>
        </div>
		
		
		<div style="width:140px;padding: 10px 10px 10px 15px; float:left; height:220px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">Select Field :</label><br><br>
		 <input type="checkbox" name="teacher_name" value="teacher_name">Teacher Name<br>
		 <input type="checkbox" name="father_name" value="father_name">Father/Husband<br>
		 <input type="checkbox" name="teacher_gender" value="teacher_gender">Gender<br>
		 <input type="checkbox" name="contact" value="contact">Contact<br>
		 <input type="checkbox" name="teacher_dob" value="teacher_dob">Date Of Birth<br>
		 <input type="checkbox" name="teacher_qualifi" value="teacher_qualifi">Qualification<br>
	
		 <input type="checkbox" name="designation" value="designation">Designation<br>
		 <input type="checkbox" name="address" value="address">address<br>
        </div>
		
        <input type="submit" name="filter" value="Submit" style="width:70px; margin: 36px;">
		
		
		
        <div class="table" style="border:#006633 30px solid; height:1080px; width:1087px;overflow:scroll">
        <?php
        if(isset($_POST['filter']))
        {
		
		          
                    $gender = $_POST['gender'] ?? null;
					$hq = $_POST['hq'] ?? null;
                    $staff_typ = $_POST['staff_typ'] ?? null;
                    $staff_typ = isset($staff_typ) ? implode(',', $staff_typ) : '';
					
                    $where = "WHERE teacher_session='".$_SESSION['session']."' AND status='Active' ";

                    if(!empty($gender)){
                    $where .= "and teacher_gender='$gender' ";
                    }
		
                    if(!empty($hq)){
                    $where .= "and hq='$hq'";
                    }

                  
                    if(!empty($staff_typ )){
                    $where .= "and FIND_IN_SET(staff_typ, '$staff_typ') ";
                    }
					
					$search_query = "SELECT * FROM teacher $where order by teacher_name Asc";


        ?>
<!-- <a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/jyoti/school/student_caste.php?caste=<?php echo $_POST['caste']; ?>')"> -->
    <input type="button" onClick="printData();" value="Print List " style="width:100px; position:absolute; margin-top:0px;"><!-- </a> -->
    <div id="printablediv" style="width: 100%;">
        <?php
        $search=mysqli_query($con,"$search_query");
        $num=mysqli_num_rows($search);
        ?>
        <br>
       
       
        <br> 
               <table width="100%" id="sample_1" border="1" cellspacing="0" cellpadding="0" class="report-container">
                <thead class="report-header">
				<tr class="report-header">
				<input type="hidden" name="ses" value="<?php echo $_SESSION['session']; ?>" id="ses" class="ses">
				 <td class="report-header-cell" colspan="35">
                 <div class="header-info">
				 <span style="color:#000000; font-size:18px; font-weight:bold;"><center>Shining Public Hr. Sec. School Raisen (M.P.)</center></span><br>
				 <span style="color:#000000; font-size:14px; font-weight:bold;"><center>Jain  Mandir Road Alipur, Ashta</center></span>
				 </div>
                 </td>
				</tr>
        	   </thead>
			   
			    <tr style="font-weight:bold;">
		        <td>Sr</td>
		        
				<?php if($_POST['teacher_name']=='teacher_name') { ?> <td>Teacher Name</td> <?php }?>
				 
		        <?php if($_POST['father_name']=='father_name') { ?> <td>Father/Husband</td> <?php }?>
		
		        <?php if($_POST['teacher_gender']=='teacher_gender'){ ?><td>Gender</td><?php }?>
		
	            <?php if($_POST['contact']=='contact'){ ?> <td>Contact</td><?php }?>
		
		        <?php if($_POST['teacher_dob']=='teacher_dob'){ ?> <td>Date Of Birth</td><?php }?>
				 
			    <?php if($_POST['teacher_qualifi']=='teacher_qualifi'){ ?> <td>Qualification</td><?php }?>
				
				
				<?php if($_POST['designation']=='designation'){ ?> <td>Designation</td><?php }?>
				
				<?php if($_POST['address']=='address'){?><td>Address</td><?php }?>
		
        	    </tr>
              
        <?php
        $i=1;
        if($num>0)
        {
        while($studrow=mysqli_fetch_array($search))
        {
        ?>  
        <tr style="color:#000">
		
        <td><?php echo $i; ?></td>
		
		<?php 
		if($_POST['teacher_name']=='teacher_name')
		{
		?>
	    <td><?php echo $studrow['teacher_name'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['father_name']=='father_name')
		{
		?>
	    <td><?php echo $studrow['father_name'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['teacher_gender']=='teacher_gender')
		{
		?>
        <td><?php echo $studrow['teacher_gender'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['contact']=='contact')
		{
		?>
        <td><?php echo $studrow['contact'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['teacher_dob']=='teacher_dob')
		{
		?>
        <td><?php echo $studrow['teacher_dob'];?></td>
		<?php }?>
		
		
		
		<?php 
		if($_POST['teacher_qualifi']=='teacher_qualifi')
		{
		?>
        <td><?php echo $studrow['teacher_qualifi'];?></td>
		<?php }?>
		
		
		
		
		<?php 
		if($_POST['designation']=='designation')
		{
		?>
        <td><?php echo $studrow['designation'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['address']=='address')
		{
		?>
        <td><?php echo $studrow['address'];?></td>
		<?php }?>
		
	
        </tr>
        <?php
        $i++;
        }
        }
        else
        {
        ?>
        <tr>
        <td colspan="14" style="color:#CC0000;text-align: center;font-weight: bold;font-size: 20px;">No Record</td>
        </tr>
        <?php
        }
        ?>
		
		 <tr>
			 <td colspan="10"><button type="button" id="excel" style="font-size:14px;margin:5px 0px 5px 5px;">Download Excel Report</button>	</td>
			</tr>
</table>



        <?php } else{ ?>
        <h1 style="font-size: 20px;color: #000;text-align: center;padding-top: 20%;">Start Searching...</h1>
        <?php } ?>
        </div>
    </div>  
</form>                         
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
