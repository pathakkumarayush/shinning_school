<html>
<head>
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
</style>
</head>
<body alink="#00FF66" link="#00CC00">


<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=student_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry" style="height:65px;">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Reports List</h2>
		
		<a href="./?pageid=report_str" style="color:#FFFFFF;float:right; background-color:#FF0033; margin-top:10px; padding:6px; font-size:18px">Total Strength Class Wise</a>
		
	<?php /*?>	<a href="./?pageid=report_strbus&&divid=1" style="color:#FFFFFF;float:right; background-color:#FF0033; margin-top:10px; padding:6px; font-size:18px">Transport Strength</a>
		<a href="./?pageid=report_str" style="color:#FFFFFF;float:right; background-color:#996600; margin-top:10px; padding:6px; font-size:18px">Strength All Class</a>
		<a href="./?pageid=report_strgender" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Strength Gender Wise</a>
		<a href="./?pageid=report_caste" style="color:#FFFFFF;float:right; background-color:#660099; margin-top:10px; padding:6px; font-size:18px">Strength Caste Wise</a>
		<a href="./?pageid=report_str_rte" style="color:#FFFFFF;float:right; background-color:#CC3399; margin-top:10px; padding:6px; font-size:18px">Strength RTE Wise</a><BR>
		<a href="./?pageid=report_str_new" style="color:#FFFFFF;float:right; background-color:#ff5722; margin-top:10px; padding:6px; font-size:18px">Strength New Student</a><?php */?>
        </div>
        <div class="col_4">
        <div style="font-size:24px; color:#990000; margin:40px 0px 0px 20px; border:#FF0000 0px solid  ">Total Student:
        <?php
        $maxid=mysqli_query($con,"select count(student_id) from student where student_school='".$_SESSION["uid"]."' and student_session='".$_SESSION['session']."' and status='0'");
        $maxrow=mysqli_fetch_array($maxid);
        $rowmax=mysqli_fetch_array($maxid);
        echo $maxrow['count(student_id)']; ?></div>
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
        <div style="width:70px;padding: 10px 10px 10px 15px; float:left; height:200PX;">
        <label style="color:#CC0000;font-weight:bold;">By Caste :</label><br><br>
        <span style="padding-left: 0px;">
        <input type="checkbox" name="caste[]" value="GENERAL"><span style="color:#000; font-weight:bold">GENERAL</span><br><br>
        <input type="checkbox" name="caste[]" value="OBC"><span style="color:#000; font-weight:bold">OBC</span><br><br>
        <input type="checkbox" name="caste[]" value="ST"><span style="color:#000; font-weight:bold">ST</span><br><br>
        <input type="checkbox" name="caste[]" value="SC"><span style="color:#000; font-weight:bold">SC</span><br><br>
		<input type="checkbox" name="caste[]" value="Minority"><span style="color:#000; font-weight:bold">Minority</span><br>
        </div>

        <div style="width:70px;padding: 10px 10px 10px 15px; float:left;">
        <label style="color:#CC0000;font-weight:bold;">By Gender :</label><br><br>
        <span style="padding-left: 0px;">
        <input type="radio" name="gender" value="male"><span style="color:#000; font-weight:bold">Male</span><br><br>
        <input type="radio" name="gender" value="female"><span style="color:#000; font-weight:bold">Female</span><br><br>
        </div>

        <div style="width:100px;padding: 10px 10px 10px 15px; float:left; ">
        <label style="color:#CC0000;font-weight:bold;">Select Any One:</label><br><br>
        <span style="padding-left:0px;">
        <input type="checkbox" name="std_type[]" value="New"><span style="color:#000; font-weight:bold">New Admission</span><br><br>
        <input type="checkbox" name="std_type[]" value="Old"><span style="color:#000; font-weight:bold">Old Student</span><br><br>
		<input type="checkbox" name="rti" value="Yes"><span style="color:#000; font-weight:bold">RTE Student</span><br><br>
		
        </div>

        <div style="width:100px;padding: 10px 10px 10px 15px; float:left;">
        <label style="color:#CC0000;font-weight:bold;">Select Any One:</label><br><br>
        <span style="padding-left: 0px;">
        <input type="checkbox" name="fc[]" value="STAFF WARD"><span style="color:#000; font-weight:bold">STAFF WARD</span><br><br>
        <input type="checkbox" name="fc[]" value="SIBLING"><span style="color:#000; font-weight:bold">SIBLING</span><br><br>
		<input type="checkbox" name="transport_status" value="Active"><span style="color:#000; font-weight:bold">Transport</span><br><br>
		
		<input type="checkbox" name="transport_type" value="One Way"><span style="color:#000; font-weight:bold">One Way</span><br><br>
		<input type="checkbox" name="transport_type" value="Two Way"><span style="color:#000; font-weight:bold">Two Way</span><br><br>
        </div>
		
		
		<div style="width:125px;padding: 10px 10px 10px 15px; float:left; height:220px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">VEHICLE - WISE:</label><br><br>
        <span style="padding-left: 0px;">
		<?php
	    $query=mysqli_query($con,"select * from add_vehcles where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    $i=1;
	    while($row=mysqli_fetch_array($query))
		{
	    ?>
        <input type="checkbox" name="transport_veh[]" value="<?php echo ucwords($row['veh_no']);  ?>"><span style="color:#000; font-weight:bold"><?php echo ucwords($row['veh_no']);  ?></span><br>
      
		<?php }?>
        </div>
		
		
		
		<div style="width:120px;padding: 10px 10px 10px 15px; float:left; height:220px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">Stopage - WISE:</label><br><br>
        <span style="padding-left: 0px;">
		<?php
	    $querys=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    $i=1;
	    while($rowst=mysqli_fetch_array($querys))
		{
	    ?>
        <input type="checkbox" name="transport_stopage[]" value="<?php echo $rowst['stop_name'];  ?>"><span style="color:#000; font-weight:bold"><?php echo ucwords($rowst['stop_name']);  ?></span><br>
      
		<?php }?>
        </div>
		
		
		<div style="width:75px;padding: 10px 10px 10px 15px; float:left; height:220px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">By Route</label><br><br>
        <span style="padding-left: 0px;">
		<?php
	    $queryr=mysqli_query($con,"select * from rout_inout where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	    $i=1;
	    while($rowr=mysqli_fetch_array($queryr))
		{
	    ?>
        <input type="checkbox" name="transport_rout[]" value="<?php echo $rowr['id'];  ?>"><span style="color:#000; font-weight:bold"><?php echo $rowr['id'];  ?></span><br>
      
		<?php }?>
        </div>
		
		
		<div style="width:100px;padding: 10px 10px 10px 15px; float:left; height:220px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">Bus Month:</label><br><br>
        <span style="padding-left: 0px;">
		<input type="checkbox" name="m1" value="April"><span style="color:#000; font-weight:bold">April</span><br>
        <input type="checkbox" name="m2" value="July"><span style="color:#000; font-weight:bold">July</span><br>
		<input type="checkbox" name="m3" value="August"><span style="color:#000; font-weight:bold">August</span><br>
		<input type="checkbox" name="m4" value="September"><span style="color:#000; font-weight:bold">September</span><br>
		<input type="checkbox" name="m5" value="October"><span style="color:#000; font-weight:bold">October</span><br>
		<input type="checkbox" name="m6" value="November"><span style="color:#000; font-weight:bold">November</span><br>
		<input type="checkbox" name="m7" value="December"><span style="color:#000; font-weight:bold">December</span><br>
        <input type="checkbox" name="m8" value="January"><span style="color:#000; font-weight:bold">January</span><br>
        <input type="checkbox" name="m9" value="February"><span style="color:#000; font-weight:bold">February</span><br>
        <input type="checkbox" name="m10" value="March"><span style="color:#000; font-weight:bold">March</span><br>
        </div>
		
		<div style="width:120px;padding: 10px 10px 10px 15px; float:left; height:220px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">By Class:</label><br><br>
        <span style="padding-left: 0px;">
		
		<input type="checkbox" name="cla[]" value="NURSERY"><span style="color:#000; font-weight:bold">NURSERY</span><br>
		<input type="checkbox" name="cla[]" value="NURSERY A"><span style="color:#000; font-weight:bold">NURSERY A</span><br>
		<input type="checkbox" name="cla[]" value="NURSERY B"><span style="color:#000; font-weight:bold">NURSERY B</span><br>
		
		<input type="checkbox" name="cla[]" value="LKG"><span style="color:#000; font-weight:bold">LKG</span><br>
		<input type="checkbox" name="cla[]" value="LKG A"><span style="color:#000; font-weight:bold">LKG A</span><br>
        <input type="checkbox" name="cla[]" value="LKG B"><span style="color:#000; font-weight:bold">LKG B</span><br>
		
		
		<input type="checkbox" name="cla[]" value="UKG"><span style="color:#000; font-weight:bold">UKG</span><br>
		<input type="checkbox" name="cla[]" value="UKG A"><span style="color:#000; font-weight:bold">UKG A</span><br>
        <input type="checkbox" name="cla[]" value="UKG B"><span style="color:#000; font-weight:bold">UKG B</span><br>
		
		<input type="checkbox" name="cla[]" value="I"><span style="color:#000; font-weight:bold">I</span><br>
		<input type="checkbox" name="cla[]" value="I A"><span style="color:#000; font-weight:bold">I A</span><br>
		<input type="checkbox" name="cla[]" value="I B"><span style="color:#000; font-weight:bold">I B</span><br>
		
		<input type="checkbox" name="cla[]" value="II"><span style="color:#000; font-weight:bold">II</span><br>
		<input type="checkbox" name="cla[]" value="II A"><span style="color:#000; font-weight:bold">II A</span><br>
        <input type="checkbox" name="cla[]" value="II B"><span style="color:#000; font-weight:bold">II B</span><br>
		
		
		<input type="checkbox" name="cla[]" value="III"><span style="color:#000; font-weight:bold">III</span><br>
        <input type="checkbox" name="cla[]" value="III A"><span style="color:#000; font-weight:bold">III A</span><br>
        <input type="checkbox" name="cla[]" value="III B"><span style="color:#000; font-weight:bold">III B</span><br>

		
		<input type="checkbox" name="cla[]" value="IV"><span style="color:#000; font-weight:bold">IV</span><br>
		<input type="checkbox" name="cla[]" value="IV A"><span style="color:#000; font-weight:bold">IV A</span><br>
        <input type="checkbox" name="cla[]" value="IV B"><span style="color:#000; font-weight:bold">IV B</span><br>
		
		
		<input type="checkbox" name="cla[]" value="V"><span style="color:#000; font-weight:bold">V</span><br>
		<input type="checkbox" name="cla[]" value="V A"><span style="color:#000; font-weight:bold">V A</span><br>
		<input type="checkbox" name="cla[]" value="V B"><span style="color:#000; font-weight:bold">V B</span><br>
		
		
		<input type="checkbox" name="cla[]" value="VI"><span style="color:#000; font-weight:bold">VI</span><br>
		<input type="checkbox" name="cla[]" value="VI A"><span style="color:#000; font-weight:bold">VI A</span><br>
        <input type="checkbox" name="cla[]" value="VI B"><span style="color:#000; font-weight:bold">VI B</span><br>
		
		<input type="checkbox" name="cla[]" value="VII"><span style="color:#000; font-weight:bold">VII</span><br>
		<input type="checkbox" name="cla[]" value="VII A"><span style="color:#000; font-weight:bold">VII A</span><br>
        <input type="checkbox" name="cla[]" value="VII B"><span style="color:#000; font-weight:bold">VII B</span><br>
		
		
		<input type="checkbox" name="cla[]" value="VIII"><span style="color:#000; font-weight:bold">VIII</span><br>
        <input type="checkbox" name="cla[]" value="VIII A"><span style="color:#000; font-weight:bold">VIII A</span><br>
		<input type="checkbox" name="cla[]" value="VIII B"><span style="color:#000; font-weight:bold">VIII B</span><br>
		<input type="checkbox" name="cla[]" value="VIII C"><span style="color:#000; font-weight:bold">VIII C</span><br>
		
		<input type="checkbox" name="cla[]" value="IX"><span style="color:#000; font-weight:bold">IX</span><br>
		<input type="checkbox" name="cla[]" value="IX A"><span style="color:#000; font-weight:bold">IX A</span><br>
		<input type="checkbox" name="cla[]" value="IX B"><span style="color:#000; font-weight:bold">IX B</span><br>
		<input type="checkbox" name="cla[]" value="IX C"><span style="color:#000; font-weight:bold">IX C</span><br>
		
		<input type="checkbox" name="cla[]" value="X"><span style="color:#000; font-weight:bold">X</span><br>
		<input type="checkbox" name="cla[]" value="X A"><span style="color:#000; font-weight:bold">X A</span><br>
		<input type="checkbox" name="cla[]" value="X B"><span style="color:#000; font-weight:bold">X B</span><br>
		<input type="checkbox" name="cla[]" value="X C"><span style="color:#000; font-weight:bold">X C</span><br>
		
		<input type="checkbox" name="cla[]" value="XI"><span style="color:#000; font-weight:bold">XI</span><br>
		<input type="checkbox" name="cla[]" value="XI Maths"><span style="color:#000; font-weight:bold">XI Maths</span><br>
		<input type="checkbox" name="cla[]" value="XI Bio"><span style="color:#000; font-weight:bold">XI Bio</span><br>
		<input type="checkbox" name="cla[]" value="XI Com."><span style="color:#000; font-weight:bold">XI Com.</span><br>
		<input type="checkbox" name="cla[]" value="XI Math Bio"><span style="color:#000; font-weight:bold">XI Math Bio</span><br>
		<input type="checkbox" name="cla[]" value="XI Bio Math"><span style="color:#000; font-weight:bold">XI Bio Math</span><br>
		
		
		<input type="checkbox" name="cla[]" value="XII"><span style="color:#000; font-weight:bold">XII</span><br>
		<input type="checkbox" name="cla[]" value="XII Math"><span style="color:#000; font-weight:bold">XII Maths</span><br>
		<input type="checkbox" name="cla[]" value="XII Bio"><span style="color:#000; font-weight:bold">XII Bio</span><br>
		<input type="checkbox" name="cla[]" value="XII Com."><span style="color:#000; font-weight:bold">XII Com.</span><br>
		<input type="checkbox" name="cla[]" value="XII Math Bio"><span style="color:#000; font-weight:bold">XII Math Bio</span><br>
		<input type="checkbox" name="cla[]" value="XII Bio Math"><span style="color:#000; font-weight:bold">XII Bio Math</span><br>
        </div>
		
<?php /*?>
        <div style="width:120px;padding: 10px 10px 10px 30px; float:left;">
        <label style="color:#CC0000;font-weight:bold;">By Class Section:</label><br><br>
        <span style="padding-left: 0px;">
        <?php $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'"); ?>
        <select name="class" class="select" style="width:125px">
        <option value="">Select Class Section</option>
        <?php
        while($rclass=mysqli_fetch_array($class))
        {
        ?>
        <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
        <?php
        }
        ?>
        </select>
        </div><?php */?>
		
		
        <input type="submit" name="filter" value="Submit" style="width:70px; margin: 36px;">
		
		
		
        <div class="table" style="border:#006633 30px solid; height:1080px; width:1087px;overflow:scroll">
        <?php
        if(isset($_POST['filter']))
        {
                   $caste = $_POST['caste'];
                   $gender = $_POST['gender'];
                   $std_type = $_POST['std_type'];
                   $rti = $_POST['rti'];
                   $class = $_POST['class'];
				   $cla = $_POST['cla'];
				   $fc = $_POST['fc'];
				   $transport_status = $_POST['transport_status'];
				   $transport_type = $_POST['transport_type'];
				   
				   $m1 = $_POST['m1'];
				   $m2 = $_POST['m2'];
				   $m3 = $_POST['m3'];
				   $m4 = $_POST['m4'];
				   $m5 = $_POST['m5'];
				   $m6 = $_POST['m6'];
				   $m7 = $_POST['m7'];
				   $m8 = $_POST['m8'];
				   $m9 = $_POST['m9'];
				   $m10 = $_POST['m10'];
				   
				   
				   $transport_veh = $_POST['transport_veh'];
				   $transport_stopage = $_POST['transport_stopage'];
				   $transport_rout = $_POST['transport_rout'];

                    /*$cst="";
                    $rlgn="";
                    $tng="";*/
                    $search_caste = implode(',', $caste);
                    $std_type = implode(',', $std_type);
                    $transport_veh = implode(',', $transport_veh);
					$transport_stopage = implode(',', $transport_stopage);
					$transport_rout = implode(',', $transport_rout);
                    $search_cla = implode(',', $cla);
					$fc = implode(',', $fc);

                    $where = "WHERE student_session='".$_SESSION['session']."' AND status='0' ";

                    if(!empty($gender)){
                    $where .= "and student_gender='$gender' ";
                    }
					
					if(!empty($search_cla)){
                    $where .= "and FIND_IN_SET(student_class, '$search_cla') ";
                    }
					
					
					if(!empty($transport_veh)){
                    $where .= "and FIND_IN_SET(transport_veh, '$transport_veh') ";
                    }
					
					if(!empty($transport_stopage)){
                    $where .= "and FIND_IN_SET(transport_stopage, '$transport_stopage') ";
                    }
					
					if(!empty($transport_rout)){
                    $where .= "and FIND_IN_SET(transport_rout, '$transport_rout') ";
                    }
					

                    if(!empty($search_caste)){
                    $where .= "and FIND_IN_SET(caste, '$search_caste') ";
                    }

                    if(!empty($std_type )){
                    $where .= "and FIND_IN_SET(std_type, '$std_type') ";
                    }
					
					if(!empty($fc )){
                    $where .= "and FIND_IN_SET(fc, '$fc') ";
                    }
					
					if(!empty($transport_type )){
                    $where .= "and FIND_IN_SET(transport_type, '$transport_type') ";
                    }
					
					if(!empty($m1 )){
                    $where .= "and FIND_IN_SET(m1, '$m1') ";
                    }
					
					if(!empty($m2)){
                    $where .= "and FIND_IN_SET(m2, '$m2') ";
                    }
					
					if(!empty($m3)){
                    $where .= "and FIND_IN_SET(m3, '$m3') ";
                    }
					
					if(!empty($m4)){
                    $where .= "and FIND_IN_SET(m4, '$m4') ";
                    }
					
					if(!empty($m5)){
                    $where .= "and FIND_IN_SET(m5, '$m5') ";
                    }
					
					if(!empty($m6)){
                    $where .= "and FIND_IN_SET(m6, '$m6') ";
                    }
					
					if(!empty($m7)){
                    $where .= "and FIND_IN_SET(m7, '$m7') ";
                    }
					
					if(!empty($m8)){
                    $where .= "and FIND_IN_SET(m8, '$m8') ";
                    }
					
					if(!empty($m9)){
                    $where .= "and FIND_IN_SET(m9, '$m9') ";
                    }
					
					if(!empty($m10)){
                    $where .= "and FIND_IN_SET(m10, '$m10') ";
                    }
					
					
					if(!empty($transport_status )){
                    $where .= "and FIND_IN_SET(transport_status, '$transport_status') ";
                    }

                    if(!empty($rti )){
                    $where .= "and FIND_IN_SET(rti, '$rti') ";
                    }

                    $search_query = "SELECT * FROM student $where order by student_class Asc";


        ?>
<!-- <a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/jyoti/school/student_caste.php?caste=<?php echo $_POST['caste']; ?>')"> -->
    <input type="button" onClick="printData();" value="Print List " style="width:100px; position:absolute; margin-top:0px;"><!-- </a> -->
    <div id="printablediv" style="width: 100%;">
        <?php
        $search=mysqli_query($con,"$search_query");
        $num=mysqli_num_rows($search);
       
        ?>
        <br>
        <h1 style="color:#000000"><center>Shining Public School, Raisen</center></h1>
       
        <br> 
        <table width="100%" id="tbl_stu" border="1" cellspacing="1" cellpadding="0">
        <thead>
        	<tr style="font-weight:bold;">
		        <th data-field="Sr" style="color: #000!important;">Sr</th>
		        <th data-field="Adm. No" style="color: #000!important;">Adm. No</th>
                <th data-field="Aadhar" style="color: #000!important;">Aadhar</th>
                <th data-field="SSMID" style="color: #000!important;">SSMID</th>
				<th data-field="SSMID" style="color: #000!important;">FM ID</th>
		        <th data-field="Name" style="color: #000!important;">Student Name</th>
		        <th data-field="Father Name" style="color: #000!important;">Father Name</th>
		        <th data-field="Mother Name" style="color: #000!important;">Mother Name</th>
				<th data-field="Gender" style="color: #000!important;">Gender</th>
		      
		        <th data-field="Class Category" style="color: #000!important;">Category</th>
				 <th data-field="Class Category" style="color: #000!important;">Caste</th>
		        <th data-field="Class" style="color: #000!important;">Class</th>
		        <th data-field="D.O.B" style="color: #000!important;">D.O.B</th>
		        <th data-field="Address" style="color: #000!important;">Address</th>
		        <th data-field="Contact No" style="color: #000!important;">Contact No</th>
				<th data-field="Bank" style="color: #000!important;">Bank</th>
		        <th data-field="Account" style="color: #000!important;">Account</th>
		        <th data-field="Ifsc" style="color: #000!important;">Ifsc</th>
				<th data-field="Ifsc" style="color: #000!important;">Stopage</th>
	            <th data-field="Ifsc" style="color: #000!important;">Vehicles</th>
				<th data-field="Ifsc" style="color: #000!important;">Way</th>
				<th data-field="Ifsc" style="color: #000!important;">Route</th>
        	</tr>
        </thead>
        <?php
        $i=1;
        if($num>0)
        {
        while($studrow=mysqli_fetch_array($search))
        {
        ?>  
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
        <td><?php echo $studrow['student_scholar'];?></td>
        <td><?php echo $studrow['student_rollno'];?></td>
        <td><?php echo $studrow['religion'];?></td>
		<td><?php echo $studrow['family_id'];?></td>
        <td><?php echo ucwords($studrow['student_name']);?></td>
        <td><?php echo ucwords($studrow['student_fname']);?></td>
        <td><?php echo ucwords($studrow['m_name']);?></td>
		<td><?php echo ucwords($studrow['student_gender']);?></td>
        <td><?php echo $studrow['caste'];?> </td>
		<td><?php echo $studrow['hname'];?></td>
        <td><?php echo $studrow['student_class'];?></td>
        <td><?php echo $studrow['student_dob'];?></td>
        <td><?php echo $studrow['student_address'];?></td>
        <td><?php echo $studrow['student_contactno'];?></td> 
        <td><?php echo $studrow['bank'];?></td>
        <td><?php echo $studrow['mother_tong'];?></td> 
        <td><?php echo $studrow['fid'];?></td> 
		<td><?php echo $studrow['transport_stopage'];?></td> 
		<td><?php echo $studrow['transport_veh'];?></td> 
		<td><?php echo $studrow['transport_type'];?></td> 
		<td><?php echo $studrow['transport_rout'];?></td> 
	
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
</table>
<!-- <a href="javascript:void(0);" onClick="javascript:download_report();" style="font-size:16px;float:left;padding: 10px;">Download Excel Report</a> -->
<a href="javascript:void(0);" onClick ="$('#tbl_stu').tableExport({type:'excel', escape:'false',htmlContent:'true',tableName:'Students List'});" id="buttonExportData" style="font-size:16px;float:left;padding: 10px;">Download EXCEL</a>


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
<script src="js/tableExport.js"></script>
<script src="js/jquery.base64.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
<script src="tableHTMLExport.js"></script>
<script>
  /*$('#json').on('click',function(){
    $("#example").tableHTMLExport({type:'json',filename:'sample.json'});
  })
  $('#csv').on('click',function(){
    $("#example").tableHTMLExport({type:'csv',filename:'sample.csv'});
  })*/
  $('#pdf').on('click',function(){
    $("#tbl_stu").tableHTMLExport({type:'pdf',filename:'Student Report.pdf'});
  })
  </script>