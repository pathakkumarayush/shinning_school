<html>
<head>
</head>
<body alink="#00FF66" link="#00CC00">
 <style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ height:auto; margin-left:-90px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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

#header-fixed { 
    position: fixed; 
    top: 0px; display:none;
    background-color:white;
}

table { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }


.tablea {
  overflow: auto;
  height: 100px;
}

.tablea thead th {
  position: sticky;
  top: 0;
  background-color: #006699;
}
.button-disabled{
  background-color: red!important;
  cursor: not-allowed;
}
</style>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Examination/exa.png" style="width:500px; height:80px;" />
		<a href="./?pageid=1CLS">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/exa.png"  style=" float:left; width:40px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Enter Evms Marks</h2>
		<!-- <a href="./?pageid=view_deci1" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Details</a> -->
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="margin-top:-30px;"></div>				
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:400px">
        <tr>
        <td>Class<span class="textfieldRequiredMsg"></span></td>
        <?php
        $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		?>
        <td><select name="class" class="select" style="width:150px" onChange="showSection(this.value)">
        <option value="-1">Select class</option>
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
		<td>Exam</td>
		<?php
        $classexa=mysqli_query($con,"select distinct(examination_name) from examinationa");
		?>
		<td><select name="exam" class="select" style="width:150px">
        <option value="-1">Select Exam</option>
        <?php
		while($rowexa=mysqli_fetch_array($classexa))
		{
		?>
        <option value="<?php echo $rowexa['examination_name']; ?>"  ><?php echo $rowexa['examination_name']; ?></option>
        <?php
		}
		?>
        </select>
        </td>
		<td>Subject</td>
		<td>
		<select name="subject" class="select" style="width:150px" required>
        <option value="evms">EVMS</option>
       
        

        </select>
        </td>
		
		
		<!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		</tr>
        </table>
		</form>
		<br>
        </div>
		<!-- <div style="width:1322px; height:50px; background-color:#FF0000; margin-top:10px;">
		 <table style="width:100%;color:#000000">
         <tr style="color:#FFFFFF; background-color:#006699;">
		 <th style="width:160px;padding: 10px;">STUDENT NAME</th><th style="width:104px;">CLASS</th><th style="width:95px;">Term</th>
		 <th style="width:160px;">Punctuality/Behaviour</th> 
		 <th style="width:120px;">act_project & Painting</th>
         <th style="width:150px;">dicussion Education</th>
         <th style="width:100px;">text_w</th>
		 <th colspan="2">Action</th>
		 </tr>
		 </table>
		 </div> -->
         <div class="tablea" style=" height:480px; width:1340px;overflow:scroll">
		 <?php
         
	     if(isset($_POST['search4']))
		 {
		 /*echo $_POST['class'];
		 echo $_POST['exam'];*/
		 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
         ?>
		 <form action="" method="post">
		 <table style="width:100%;color:#000000">
            <thead>
		    <tr style="color:#FFFFFF;text-align: center; background-color:#006699;">
             <th style="padding: 10px;">STUDENT NAME</th><th style="width:104px;">CLASS</th><th style="width:95px;">Exam</th>
             <th >SUBJECT</th> 
             <th >ACT / PROJECT</th>
             <th >DISCUSSION</th>
             <th >TEXT</th>
			 <th >ILLUSTRATIONS</th>
             <th colspan="2">Action</th>
            </tr>
            </thead>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		  $searchs=mysqli_query($con,"select * from evms where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and subject='".$_POST['subject']."' and session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
	     ?>
         <tbody>	
		 <tr style="min-height:30px;text-align: center; color:#000000">
		 <td>
         <input type="text" value="<?php echo $studrow['student_name']; ?>" name="" style="width:140px;">
		 <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
		 <td>
         <input type="text" name="cls" value="<?php echo $studrow['student_class']; ?>" id="cls<?php echo $i;?>" style="width:50px;">
         </td>
		 <td >
            <input type="text" name="exam" value="<?php echo $_POST['exam']; ?>" id="exam<?php echo $i;?>" style="width:50px;">
         </td>
		 <td >
            <input type="text" name="subject" value="<?php echo $_POST['subject']; ?>" id="subject<?php echo $i;?>" style="width:50px;">
         </td>
		 <td >
            <input type="text" name="act_project" value="<?php echo $studrows['act_project']; ?>" id="act_project<?php echo $i;?>" style="width:50px;">
         </td>
		 <td >
            <input type="text" name="dicussion" value="<?php echo $studrows['dicussion']; ?>" id="dicussion<?php echo $i;?>" style="width:45px;">
         </td>
		 <td >
            <input type="text" name="text_w" value="<?php echo $studrows['text_w']; ?>" id="text_w<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="illutration" value="<?php echo $studrows['illutration']; ?>" id="illutration<?php echo $i;?>" style="width:45px;">
         </td>
		 
		 <td >
      <?php if(!empty($studrows['act_project']) || !empty($studrows['dicussion']) || !empty($studrows['text_w']) || !empty($studrows['illutration']) ){ ?>
            <input type="button" class="button-disabled sub_btn" disabled name="submit" value="Insert"  onclick="return add_record(<?php echo $i;?>);"/>
          <?php } else {?>
            <input type="button" name="submit" class="sub_btn" value="Insert"  onclick="return add_record(<?php echo $i;?>);"/>
          <?php } ?>
         </td>
		  <td >
            <input type="button" name="submit" value="update"  onclick="return update_record(<?php echo $i;?>);"/>
         </td>
	</tr>
    </tbody>
		 <?php 
		 $i++; 
         }
	     ?>

	     </table>
         
		 </form>
		 <?php } ?>
         </div>
         </div>
         
<script src="js/jquery-1.8.3.min.js"></script>		 
<script>
function add_record(hid)
{
var cls= document.getElementById('cls'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var exam= document.getElementById('exam'+hid).value;
var subject= document.getElementById('subject'+hid).value;
var act_project= document.getElementById('act_project'+hid).value;
var dicussion= document.getElementById('dicussion'+hid).value;
var text_w= document.getElementById('text_w'+hid).value;
var illutration= document.getElementById('illutration'+hid).value;
/*var att= document.getElementById('att'+hid).value;
var atsm= document.getElementById('atsm'+hid).value;
var ats= document.getElementById('ats'+hid).value;
var atn= document.getElementById('atn'+hid).value;*/

var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&subject="+subject+"&act_project="+act_project+"&dicussion="+dicussion+"&text_w="+text_w+"&illutration="+illutration;
 
$.ajax({
type:"POST",
url:"add_evms.php",
data:data_str,
success:function(){
alert('successfully inserted!');
/*document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('regularity'+hid).value='';
document.getElementById('sincerity'+hid).value='';
document.getElementById('beha'+hid).value='';
document.getElementById('rrr'+hid).value='';
document.getElementById('att'+hid).value='';
document.getElementById('atsm'+hid).value='';
document.getElementById('ats'+hid).value='';
document.getElementById('atn'+hid).value='';*/


}
});
} 

$('.sub_btn').click(function (){
        $(this).prop( "disabled", true );
        $(this).addClass( "button-disabled");

});
</script>
<script>
function update_record(hid)
{
var cls= document.getElementById('cls'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var exam= document.getElementById('exam'+hid).value;
var subject= document.getElementById('subject'+hid).value;
var act_project= document.getElementById('act_project'+hid).value;
var dicussion= document.getElementById('dicussion'+hid).value;
var text_w= document.getElementById('text_w'+hid).value;
var illutration= document.getElementById('illutration'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&subject="+subject+"&act_project="+act_project+"&dicussion="+dicussion+"&text_w="+text_w+"&illutration="+illutration;
 
$.ajax({
type:"POST",
url:"edit_evms.php",
data:data_str,
success:function(){
alert('updated successfully!');
/*document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('regularity'+hid).value='';
document.getElementById('sincerity'+hid).value='';
document.getElementById('beha'+hid).value='';
document.getElementById('rrr'+hid).value='';
document.getElementById('att'+hid).value='';
document.getElementById('atsm'+hid).value='';
document.getElementById('ats'+hid).value='';
document.getElementById('atn'+hid).value='';*/


}
});
} 
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	