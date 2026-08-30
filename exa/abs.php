<html>
<head>
</head>
<body alink="#00FF66" link="#00CC00">
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
    background: #0072ff;
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
    #update{
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
.button-disabled{
  background-color: red!important;
  cursor: not-allowed;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 200px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 32%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 0px;
  right: 0px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Pay Roll/staff.png" />
        <a href="./?pageid=staff_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Attendance</h2>
        <!-- <a href="./?pageid=view_health" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Details</a> -->
        </div>
        <div class="col_4">
         
        <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="margin-top:-30px;"></div>             
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 10px; font-size:14px; width:300px">
        <tr>
        <td>Designation<span class="textfieldRequiredMsg"></span></td>
        <td>
		<select required name="ds" class="select" style="width:165px" onChange="showSection(this.value)">
        <option value="">Select Designation</option>
        <option value="all">All</option>
        <option value="MANAGER">MANAGER</option>
        <option value="ASST. MANAGER">ASST. MANAGER</option>
        <option value="OFFICE ASS. CONS.">OFFICE ASS. CONS.</option>
        <option value="PRINCIPAL">PRINCIPAL</option>
        <option value="VICE-PRINCIPAL">VICE-PRINCIPAL</option>
        <option value="HEAD MISTRESS">HEAD MISTRESS</option>
        <option value="PGT">PGT</option>
	    <option value="TGT">TGT</option>
		<option value="PRT">PRT</option>
		<option value="KGT">KGT</option>
        <option value="ACCOUNTANT">ACCOUNTANT</option>
        <option value="HEAD CLERK">HEAD CLERK</option>
        <option value="LAB-ASST.">LAB-ASST.</option>
        <option value="PEON">PEON</option>
        <option value="GUARD">GUARD</option>
        <option value="AAYA">AAYA</option>
        <option value="LIBRARIAN">LIBRARIAN</option>
        <option value="GARDENER">GARDENER</option>
        <option value="SWEEPER">SWEEPER</option>
        </select>
        </td>
        <td>Month</td>
		<td>
          <select name="month" class="select" style="width:150px" required>
           <option value="">Select Month</option>
            <option value="July">July</option>
               <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   </select>
        </td>
        <!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
        </tr>
        </table>
        </form>
        <br>
        </div>
        <div style="width:100%; height:35px; background-color:#FF0000; margin-top:10px;">
            <?php 

               /* $myTime = strtotime("1/1/2019");  // Use whatever date format you want
                $date = date_parse($_POST['month']);
                $year = strtok($_SESSION['session'], "-");
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $date['month'], $year);*/ // 31
                    /*$workDays = 0;
                    while($daysInMonth > 0)
                    {
                        $day = date("D", $myTime); // Sun - Sat
                        if($day != "Sun"&& $day != "Sat")
                            $workDays++;

                        $daysInMonth--;
                        $myTime += 86400; // 86,400 seconds = 24 hrs.
                    }*/
                    /*echo "There are $workDays work days this month!";*/
 ?>
         <table style="width:100%;color:#000000;">
         <tr style="color:#FFFFFF; background-color:#006699; line-height:30px; font-size:18pxpx; font-weight:bold;" align="center">
         <td style="width:190px;">EMPLOYEE NAME</td>
         <td style="width:150px;">Designation</td> 
         <td style="width:150px;">Month</td> 
         <td style="width:140px;">Enter No Of Absent</td>
        
       
         
         </tr>
          </table>
        </div>
       <div class="table" style=" height:480px; overflow:scroll">
         <?php
         $qry = "";
         if(isset($_POST['search4']))
         {
          $check="";
            $myTime = strtotime("1/1/2019");  // Use whatever date format you want
                $date = date_parse($_POST['month']);
                $year = strtok($_SESSION['session'], "-");
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $date['month'], $year);
            if($_POST['ds'] == "all"){
                $qry = "select * from teacher WHERE status='Active' and teacher_session='".$_SESSION['session']."' and bg='1'";
            }
            else{
                $qry = "select * from teacher where designation='".$_POST['ds']."' AND status='Active' AND teacher_session='".$_SESSION['session']."'";
            }
         $search=mysqli_query($con,$qry);
         ?>
         <form action="" method="post" id="att_form" enctype="multipart/form-data">
         <table style="width:100%;color:#000000">
         <?php
         $i=1;
         while($studrow=mysqli_fetch_array($search))
         {

         	$srch_abs_data=mysqli_query($con,"select * from tech_absent WHERE tid='".$studrow['teacher_id']."' AND month='".$_POST['month']."' AND ses='".$_SESSION['session']."'");
         	$absrow=mysqli_fetch_array($srch_abs_data);

         ?> 
         <tr style="min-height:30px; color:#000000">
	         <td style="width:20px;"><?php echo $i; ?></td>
           <td style="width: 120px;">
	         	<input type="text" readonly value="<?php echo $studrow['teacher_name']; ?>" style="width:300px;">
	         	<input type="hidden" name="idm[]" value="<?php echo $studrow['teacher_id']; ?>" id="idm<?php echo $i;?>">
	         </td>
	         <td style="width: 140px;">
            <input readonly type="text" value="<?php echo $studrow['designation']; ?>" id="des<?php echo $i;?>" style="width:240px;">
	         </td>
			     <td style="width: 140px;">
			 	   <input readonly type="text" name="month" value="<?php echo $_POST['month']; ?>" id="month<?php echo $i;?>" style="width:230px;">
          <input type="hidden" value="<?php  echo $daysInMonth;?>" style="width: 40px;" name="working" id="working_days">
			     </td>
	         <td align="center">
	         	<input type="text" required="" value="<?php if(isset($absrow['tid'])){echo $absrow['abs'];}else echo 0; ?>" name="attend[]" id="attend<?php echo $i;?>" style="width:80px;">
	         </td>
         </tr>
         <?php 
         $i++;
         if(isset($absrow['tid'])){$check =1;}else{$check=0;}
         }
         ?>
		 <tr><td colspan="2"></td>
            <td style="text-align: right;" colspan="2"><!-- Working Days:-  -->
              <!-- <input type="text" value="<?php if(isset($absrow['tid'])){echo $absrow['wd'];}else{ echo $daysInMonth;} ?>" style="width: 40px;" name="working" id="working_days" required> -->
        
            <input type="submit" align="right" <?php if($check==1){echo "disabled";} ?> name="submit" class="sub_btn <?php if($check==1){echo "button-disabled";} ?>" value="Insert" id="submit_btn" />
		 	<!-- <?php echo $check; ?> -->
		 	<button <?php if($check==0){echo "disabled";} ?> type="button" id="update" name="update" class="sub_btn <?php if($check==0){echo "button-disabled";} ?>">Update</button>
		 	</td>
		 </tr>
         </table>
         </form>
         
         <?php } ?>
         </div>
         <p id="res"></p>
         <!-- <div id="data"></div> -->
<!-- <div class="box">
    <a class="button" href="#popup1">Let me Pop up</a>
</div> -->

<div id="popup" class="overlay">
    <div class="popup">
        <h2 style="color: red;padding: 0 0 10px 0;font-weight: bold;">Info!</h2>
        <a class="close" href="#">&times;</a>
        <div id="data" style="font-size: 15px;padding: 5px;">
        </div>
    </div>
</div>
         </div>
<script src="js/jquery-1.8.3.min.js"></script>

<script type="text/javascript">
    (function ($) {
        $('#att_form').on('submit', function (e) {
            e.preventDefault();
            /*alert($('#att_form').serialize());
            exit();*/
            $.ajax({
                type: 'POST',
                url: 'add_remark.php',
                data: $('#att_form').serialize(),
                beforeSend: function(){
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
                success:function(data){
                    window.location.href = "#popup";
					$("#data").html(data);
                    if(data=="Salary Created! You can check salary Details here <a href='?pageid=salarydetail&&divid=3' target='_blank'>Salary Details</a>"){
                        $("#submit_btn").prop( "disabled", true );
                        $("#submit_btn").addClass( "button-disabled");
                        $("#update").prop( "disabled", false );
                        $("#update").removeClass( "button-disabled");
                    }
				}
            });
        });
    })(jQuery);


    (function ($) {
        $('#update').click(function (e) {
            e.preventDefault();
            /*var frm_data = $('#att_form').serialize();*/
            $.ajax({
                type: 'POST',
                url: 'update_remark.php',
                data: $('#att_form').serialize(),
                beforeSend: function(){
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
                success:function(data){
					window.location.href = "#popup";
                    $("#data").html(data);
				}
            });
        });
    })(jQuery);
</script>



<script>
function add_record(hid)
{
var cls= document.getElementById('cls'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var attend= document.getElementById('attend'+hid).value;
var exam= document.getElementById('exam'+hid).value;


var data_str= "cls="+cls+"&idm="+idm+"&attend="+attend+"&exam="+exam;
 
$.ajax({
type:"POST",
url:"add_remark.php",
data:data_str,
success:function(){
alert('successfully inserted');
/*to_dis.attr("disabled", false);*/
/*document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('height'+hid).value='';
document.getElementById('weight'+hid).value='';
document.getElementById('vision'+hid).value='';
document.getElementById('exam'+hid).value='';*/
}
});
} 

/*$('.sub_btn').click(function (){
        $(this).prop( "disabled", true );
        $(this).addClass( "button-disabled");

});*/
</script>
<script>
function add_record1(hid)
{
var cls= document.getElementById('cls'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var attend= document.getElementById('attend'+hid).value;
var exam= document.getElementById('exam'+hid).value;


var data_str= "cls="+cls+"&idm="+idm+"&attend="+attend+"&exam="+exam;
 
$.ajax({
type:"POST",
url:"edit_remark.php",
data:data_str,
success:function(){
alert('successfully Update');
/*document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('height'+hid).value='';
document.getElementById('weight'+hid).value='';
document.getElementById('vision'+hid).value='';
document.getElementById('exam'+hid).value='';*/
}
});
} 
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
    