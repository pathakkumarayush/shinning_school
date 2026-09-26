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
                  $("#sample_1").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Student details("+file_name+")", //do not include extension
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
        <div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=home">
        <img src="images/buttonGoBack.png"  style="float:right; width:100px; height:50px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry" style="height:40px;">
        
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:15px; margin-top:15px;">Student Details</h2>
		
		<a href="./?pageid=repp" style="color:#FFFFFF;float:right; background-color:#FF0033; margin-top:10px; padding:6px; font-size:15px">Search Name</a>
		
	<?php /*?>	<a href="./?pageid=report_strbus&&divid=1" style="color:#FFFFFF;float:right; background-color:#FF0033; margin-top:10px; padding:6px; font-size:18px">Transport Strength</a>
		<a href="./?pageid=report_str" style="color:#FFFFFF;float:right; background-color:#996600; margin-top:10px; padding:6px; font-size:18px">Strength All Class</a>
		<a href="./?pageid=report_strgender" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Strength Gender Wise</a>
		<a href="./?pageid=report_caste" style="color:#FFFFFF;float:right; background-color:#660099; margin-top:10px; padding:6px; font-size:18px">Strength Caste Wise</a>
		<a href="./?pageid=report_str_rte" style="color:#FFFFFF;float:right; background-color:#CC3399; margin-top:10px; padding:6px; font-size:18px">Strength RTE Wise</a><BR>
		<a href="./?pageid=report_str_new" style="color:#FFFFFF;float:right; background-color:#ff5722; margin-top:10px; padding:6px; font-size:18px">Strength New Student</a><?php */?>
        </div>
        <div class="col_4">
       
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
       
      
		
		
		
		
		
		
		
		
		
		<div style="width:1px;padding: 10px 10px 10px 15px; float:left; height:1px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">By Class:</label><br><br>
      
	  
	   <?php
	    $cltech=mysqli_query($con,"select * from class_teacher where teacher='".$_SESSION['userid']."'");
       
		while($clrow=mysqli_fetch_array($cltech))
		{
	    $result = mysqli_query($con,"SELECT * FROM class where class='".$clrow['class']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
        <input type="checkbox" name="cla[]" value="<?php echo $tier['class'];  ?>" checked="checked" readonly=""><span style="color:#000; font-weight:bold"><?php echo $tier['class'];  ?></span><br>
      
		<?php 
		}
		}
		?>

        </div>
		
		
		<div style="width:108px;padding: 10px 10px 10px 15px; float:left; height:150px; overflow:scroll;">
        <label style="color:#CC0000;font-weight:bold;">Select Field :</label><br><br>
      
	     <input type="checkbox" name="adm" value="adm">Admission No.<br>
		 <input type="checkbox" name="sname" value="sname">Student Name<br>
		 <input type="checkbox" name="fname" value="fname">Father Name<br>
		 <input type="checkbox" name="mname" value="mname">Mother Name<br>
		 <input type="checkbox" name="mobile" value="mobile">Mobile No<br>
		 <input type="checkbox" name="dob" value="dob">Date Of Birth<br>
		 <input type="checkbox" name="doj" value="doj">Date Of Join<br>
		 <input type="checkbox" name="category" value="category">Category<br>
		 <input type="checkbox" name="caste" value="caste">Caste<br>
		 <input type="checkbox" name="genderr" value="genderr">Gender<br>
		 <input type="checkbox" name="address" value="address">Address<br>
         <input type="checkbox" name="relligion" value="relligion">Religion<br>
		 <input type="checkbox" name="adhar" value="adhar">Aadhar<br>
		 <input type="checkbox" name="sssm" value="sssm">SSSM ID<br>
		 <input type="checkbox" name="fid" value="fid">Faimly ID<br>
		 <input type="checkbox" name="bank" value="bank">Bank<br>
		 <input type="checkbox" name="ac" value="ac">A/C No.<br>
		 <input type="checkbox" name="ifsc" value="ifsc">IFSC Code<br>
	
		 <input type="checkbox" name="rte" value="rte">RTE<br>
		 <input type="checkbox" name="std_typee" value="std_typee">Status Old/New<br>
        </div>
		

		
		
        <input type="submit" name="filter" value="Submit" style="width:70px; margin: 36px;">
		
		
		
        <div class="table" style="border:#006633 30px solid; height:1080px; width:100%;overflow:scroll">
        <?php
        if(isset($_POST['filter']))
        {
                     $caste = $_POST['caste'] ?? null;
                   $gender = $_POST['gender'] ?? null;
                   $std_type = $_POST['std_type'] ?? null;
                   $rti = $_POST['rti'] ?? null;
                   $class = $_POST['class'] ?? null;
				   $cla = $_POST['cla'] ?? null;
				   $fc = $_POST['fc'] ?? null;
				   $transport_status = $_POST['transport_status'] ?? null;
				   $transport_type = $_POST['transport_type'] ?? null;
		
				   
				   $m1 = $_POST['m1'] ?? null;
				   $m2 = $_POST['m2'] ?? null;
				   $m3 = $_POST['m3'] ?? null;
				   $m4 = $_POST['m4'] ?? null;
				   $m5 = $_POST['m5'] ?? null;
				   $m6 = $_POST['m6'] ?? null;
				   $m7 = $_POST['m7'] ?? null;
				   $m8 = $_POST['m8'] ?? null;
				   $m9 = $_POST['m9']?? null;
				   $m10 = $_POST['m10'] ?? null;
				   
				   $transport_veh = $_POST['transport_veh'] ?? null;
				   $transport_stopage = $_POST['transport_stopage'] ?? null;
				   $transport_rout = $_POST['transport_rout'] ?? null;

                    /*$cst="";
                    $rlgn="";
                    $tng="";*/
					$search_caste = isset($caste) ? implode(',', $caste) : '' ;
                    $std_type = isset($std_type) ? implode(',', $std_type) : '';
                    $transport_veh = isset($transport_veh) ? implode(',', $transport_veh) : '';
					$transport_stopage = isset($transport_stopage) ? implode(',', $transport_stopage) : '';
					$transport_rout = isset($transport_rout) ? implode(',', $transport_rout) : '';
                    $search_cla = isset($cla) ? implode(',', $cla) : '';
					$fc = isset($fc) ? implode(',', $fc) : '';
					
		

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

                    $search_query = "SELECT * FROM student $where order by student_class,student_name Asc";


        ?>

    <div id="printablediv" style="width:100%;">
        <?php
        $search=mysqli_query($con,"$search_query");
        $num=mysqli_num_rows($search);
       
        ?>
       
       
       
      
       <table id="sample_1" border="1" cellspacing="0" cellpadding="0" class="report-container" style="font-size:12px; width:100%;">
                <thead class="report-header">
				<tr class="report-header">
				
				 <td class="report-header-cell" colspan="35">
                 <div class="header-info">
				 <span style="color:#000000; font-size:12px; font-weight:bold;"><center>Shining Public Hr. Sec. School Raisen (M.P.)</center></span><br>
				
				 </div>
                 </td>
				</tr>
        	   </thead>
			   
			    <tr style="font-weight:bold; font-size:12px;">
		         <td>Sr</td>
		         <td>Class</td>
		         <?php if($_POST['adm']=='adm') { ?> <td>Adm. No</td> <?php }?>
		
		         <?php if($_POST['sname']=='sname'){ ?><td>Student Name</td><?php }?>
		
	             <?php if($_POST['fname']=='fname'){ ?> <td>Father</td><?php }?>
		
		         <?php if($_POST['mname']=='mname'){ ?> <td>Mother</td><?php }?>
				 
				 <?php if($_POST['mobile']=='mobile'){ ?> <td>Mobile</td><?php }?>
		
		<?php if($_POST['dob']=='dob'){?> <td>D.O.B</td><?php }?>
		
		<?php if($_POST['doj']=='doj'){?> <td>D.O.A</td><?php }?>
		
		<?php if($_POST['category']=='category'){?><td>Category</td><?php }?>
		
		<?php if($_POST['caste']=='caste'){?> <td>Caste</td><?php }?>
		
		<?php if($_POST['genderr']=='genderr'){?><td>Gender</td><?php }?>
		
		<?php if($_POST['address']=='address'){?><td>Address</td><?php }?>
		
		<?php if($_POST['relligion']=='relligion'){?><td>Relligion</td><?php }?>
		
		<?php if($_POST['adhar']=='adhar'){?><td>Aadhar</td><?php }?>
		
		<?php if($_POST['sssm']=='sssm'){?><td>SSSM ID</td><?php }?>
		
		<?php if($_POST['fid']=='fid'){?><td>Faimly ID</td><?php }?>
		
		<?php if($_POST['bank']=='bank'){?><td>Bank</td><?php }?>
		
		<?php if($_POST['ac']=='ac'){?><td>A/C No.</td><?php }?>
		
		<?php if($_POST['ifsc']=='ifsc'){?><td>IFSC</td><?php }?>
		
		
		
		<?php if($_POST['rte']=='rte'){?><td>RTE</td><?php }?>
		
		<?php if($_POST['std_typee']=='std_typee'){?><td>Status-Old/New</td><?php }?>
		
		        <!-- <td></td>-->
        	    </tr>
              
        <?php
        $i=1;
        if($num>0)
        {
        while($studrow=mysqli_fetch_array($search))
        {
        ?>  
        <tr style="color:#335599;font-size:11px;">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['student_class'];?></td>
		<?php 
		if($_POST['adm']=='adm')
		{
		?>
	    <td><?php echo $studrow['student_scholar'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['sname']=='sname')
		{
		?>
        <td><?php echo $studrow['student_name'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['fname']=='fname')
		{
		?>
        <td><?php echo $studrow['student_fname'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['mname']=='mname')
		{
		?>
        <td><?php echo $studrow['m_name'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['mobile']=='mobile')
		{
		?>
        <td>
		
		<a href="tel:<?php  echo $studrow["student_contactno"]; ?>"><?php  echo $studrow["student_contactno"]; ?></a>
		</td>
		<?php }?>
		
		
		<?php 
		if($_POST['dob']=='dob')
		{
		?>
        <td><?php echo $studrow['student_dob'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['doj']=='doj')
		{
		?>
        <td><?php echo $studrow['student_doj'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['category']=='category')
		{
		?>
        <td><?php echo $studrow['caste'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['caste']=='caste')
		{
		?>
        <td><?php echo $studrow['hname'];?></td>
		<?php }?>
		
		<?php 
		if($_POST['genderr']=='genderr')
		{
		?>
        <td><?php echo $studrow['student_gender'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['address']=='address')
		{
		?>
        <td><?php echo $studrow['student_address'];?></td>
		<?php }?>
		
		
		
		<?php 
		if($_POST['relligion']=='relligion')
		{
		?>
        <td><?php echo $studrow['mot'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['adhar']=='adhar')
		{
		?>
        <td><?php echo $studrow['student_rollno'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['sssm']=='sssm')
		{
		?>
        <td><?php echo $studrow['religion'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['fid']=='fid')
		{
		?>
        <td><?php echo $studrow['family_id'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['bank']=='bank')
		{
		?>
        <td><?php echo $studrow['bank'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['ac']=='ac')
		{
		?>
        <td><?php echo $studrow['mother_tong'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['ifsc']=='ifsc')
		{
		?>
        <td><?php echo $studrow['fid'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['rte']=='rte')
		{
		?>
        <td><?php echo $studrow['rti'];?></td>
		<?php }?>
		
		
		<?php 
		if($_POST['std_typee']=='std_typee')
		{
		?>
        <td><?php echo $studrow['std_type'];?></td>
		<?php }?>
	
	
	    <?php /*?><td><a href="<?php echo $var."edit_admission&id=".$studrow['student_id']; ?>" target="_blank">Edit</a></td><?php */?>
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
