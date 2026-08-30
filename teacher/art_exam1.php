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
</style>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Examination/exa.png" style="width:500px; height:80px;" />
		<a href="./?pageid=exam_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Co-Scholastic Areas</h2>
		<!--<a href="./?pageid=view_co_sch" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px"></a>-->
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="width:1121px;margin-top:-30px;"></div>				
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
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
        $classexa=mysqli_query($con,"select distinct(examination_name) from examination where examination_session='".$_SESSION['session']."'");
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
		<!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		</tr>
        </table>
		</form>
		<br>
        </div>
        <div style="width:100%; height:50px; background-color:#FF0000; margin-top:10px;">
		 <table style="width:100%;color:#000000;">
		 <tr style="color:#FFFFFF; background-color:#006699; line-height:23px;">
		 <th style="width:198px;">STUDENT NAME</th><th style="width:109px;">CLASS</th>
		 <th style="width:93px;">Term</th><th style="width:100px;">ENGLISH RHYMES/ORAL</th><th style="width:95px;">HINDI RHYMES/ORAL</th>
		 <th style="width:100px;">MATHS ORAL</th> <th style="width:100px;">G.K. ORAL</th><th style="width:90px;">CONVERSATION</th><th style="width:90px;">EVS ORAL</th>
		
		 <th colspan="2"></th> 
		 </tr>
		  </table>
		 </div>
		 <div class="table" style=" height:480px; width:1235px;overflow:scroll">
         <?php
	     if(isset($_POST['search4']))
		 {
		 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
         ?>
		 <form action="" method="post">
		 <table style="width:100%;color:#000000">
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		  $searchs=mysqli_query($con,"select * from other_marks1 where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
		 
	     ?>	
		 <tr style="min-height:30px; color:#000000">
		 <td><input type="text" value="<?php echo $studrow['student_name']; ?>" name="" style="width:140px;">
		 <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
		 <td>
         <input type="text" name="cls" value="<?php echo $studrow['student_class']; ?>" id="cls<?php echo $i;?>" style="width:60px;"></td>
		 <td><input type="text" name="exam" value="<?php echo $_POST['exam']; ?>" id="exam<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="text" name="art" value="<?php echo $studrows['art']; ?>" id="art<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="text" name="music" value="<?php echo $studrows['music']; ?>" id="music<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="text" name="dance" value="<?php echo $studrows['dance']; ?>" id="dance<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="text" name="game" value="<?php echo $studrows['game']; ?>" id="game<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="text" name="moral" value="<?php echo $studrows['moral']; ?>" id="moral<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="text" name="gk" value="<?php echo $studrows['gk']; ?>" id="gk<?php echo $i;?>" style="width:50px;"></td>
		 <td><input type="button" name="submit" value="Insert"  onclick="return add_record(<?php echo $i;?>);"/></td>
		 <td><input type="button" name="submit" value="update"  onclick="return add_record1(<?php echo $i;?>);"/></td>
		 </tr>
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
var art= document.getElementById('art'+hid).value;
var music= document.getElementById('music'+hid).value;
var dance= document.getElementById('dance'+hid).value;
var game= document.getElementById('game'+hid).value;
var moral= document.getElementById('moral'+hid).value;
var gk= document.getElementById('gk'+hid).value;

var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&art="+art+"&music="+music+"&dance="+dance+"&game="+game+"&moral="+moral+"&gk="+gk;
 
$.ajax({
type:"POST",
url:"add_record1.php",
data:data_str,
success:function(){
alert('successfully inserted');
document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('art'+hid).value='';
document.getElementById('music'+hid).value='';
document.getElementById('dance'+hid).value='';
document.getElementById('game'+hid).value='';
document.getElementById('moral'+hid).value='';
document.getElementById('gk'+hid).value='';
}
});
} 
</script>
<script>
function add_record1(hid)
{
var cls= document.getElementById('cls'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var exam= document.getElementById('exam'+hid).value;
var art= document.getElementById('art'+hid).value;
var music= document.getElementById('music'+hid).value;
var dance= document.getElementById('dance'+hid).value;
var game= document.getElementById('game'+hid).value;
var moral= document.getElementById('moral'+hid).value;
var gk= document.getElementById('gk'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&art="+art+"&music="+music+"&dance="+dance+"&game="+game+"&moral="+moral+"&gk="+gk;
$.ajax({
type:"POST",
url:"add_recordedit1.php",
data:data_str,
success:function(){
alert('Successfully Update');
document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('art'+hid).value='';
document.getElementById('music'+hid).value='';
document.getElementById('dance'+hid).value='';
document.getElementById('game'+hid).value='';
document.getElementById('moral'+hid).value='';
document.getElementById('gk'+hid).value='';



}
});
} 
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	