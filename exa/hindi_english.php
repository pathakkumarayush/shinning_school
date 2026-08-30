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
.table td {
    background: #fbfcfc;
    border-bottom: solid 1px #e0e0e0;
    padding: 8px 4px;
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
        <div class="shell" style="width:100%;">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Discipline</h2>
		<!--<a href="./?pageid=view_deci" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px"></a>-->
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="width:1121px;margin-top:-30px;"></div>				
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
        $classexa=mysqli_query($con,"select distinct(examination_name) from examinationa where examination_session='".$_SESSION['session']."'");
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
        <option value="">Subject</option>
       
        <option value="English">English</option>
        <option value="Hindi">Hindi</option>

        </select>
        </td>
		
		<!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		</tr>
        </table>
		</form>
		<br>
        </div>
		
		<div style="width:100%; height:68px; background-color:#FF0000; margin-top:10px;">
		<table style="width:100%;color:#000000;">
		<tr><td colspan="14" align="center" style="color:#FFFFFF; font-weight:bold">Class - <?php echo $_POST['class'];?>,&nbsp; &nbsp; &nbsp; Subject - <?php echo $_POST['subject'];?>,&nbsp; &nbsp; &nbsp; Exam - <?php echo $_POST['exam'];?></td> </tr>
		</table>
		
		
		 <table style="width:100%;color:#000000;">
		 
		 
		 
		 <tr style="color:#FFFFFF; background-color:#006699; line-height:23px;  font-weight:bold;" align="center">
		 <td style="width:180px;">STUDENT NAME</td>
		 
	 
		 <td style=" width:90px;">READING</td>
		 <td style="width:85px;">RECITATION</td>
		 <td style="width:85px;">SPELLINGS</td>
		 <td style="width:85px;">GRAMMAR</td>
		 <td style="width:85px;">S CONSTRUCTION</td>
		 <td style="width:73px;">CREATIVE <br>WRITING</td>
		 <td style="width:84px;">TEXT</td>
		 
		 <td style="width:80px;">EXPRESSION</td>
		 <td style="width:80px;">PRONOUNCIATION</td>
		 <td style="width:90px;">VOCABULARY</td>
		 <td style="width:90px;">HAND <br>WRITING</td>
		 <td></td><td></td>
		 </tr>
		  </table>
		</div>
        <div class="table" style=" height:480px; width:1340px;overflow:scroll">
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
		 $searchs=mysqli_query($con,"select * from eng_hindi where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and subject='".$_POST['subject']."' and session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
	     ?>	
		 <tr style="min-height:30px; color:#000000">
		 <td><input type="text" value="<?php echo $studrow['student_name']; ?>" name="" style="width:140px;">
		 <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
		
		 <td>
		 <input type="text" name="reading" value="<?php echo $studrows['reading']; ?>" id="reading<?php echo $i;?>" style="width:49px;">
		 <input type="hidden" name="exam" value="<?php echo $_POST['exam']; ?>" id="exam<?php echo $i;?>" style="width:50px;">
		 <input type="hidden" name="subject" value="<?php echo $_POST['subject']; ?>" id="subject<?php echo $i;?>" style="width:50px;">
		 <input type="hidden" name="cls" value="<?php echo $studrow['student_class']; ?>" id="cls<?php echo $i;?>" style="width:50px;">
		 </td>
		
		 <td><input type="text" name="recitation" value="<?php echo $studrows['recitation']; ?>" id="recitation<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="sppling" value="<?php echo $studrows['sppling']; ?>" id="sppling<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="grammer" value="<?php echo $studrows['grammer']; ?>" id="grammer<?php echo $i;?>" style="width:48px;"></td>
		 <td><input type="text" name="s_cons" value="<?php echo $studrows['s_cons']; ?>" id="s_cons<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="writting" value="<?php echo $studrows['writting']; ?>" id="writting<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="text_w" value="<?php echo $studrows['text_w']; ?>" id="text_w<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="expression" value="<?php echo $studrows['expression']; ?>" id="expression<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="pronounce" value="<?php echo $studrows['pronounce']; ?>" id="pronounce<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="vocab" value="<?php echo $studrows['vocab']; ?>" id="vocab<?php echo $i;?>" style="width:49px;"></td>
		 <td><input type="text" name="hand" value="<?php echo $studrows['hand']; ?>" id="hand<?php echo $i;?>" style="width:48px;"></td>
		
		
		
		 <td >
      <?php if(!empty($studrows['recitation']) || !empty($studrows['sppling']) || !empty($studrows['grammer']) || !empty($studrows['s_cons']) || !empty($studrows['writting']) || !empty($studrows['text_w']) || !empty($studrows['expression']) || !empty($studrows['pronounce']) || !empty($studrows['vocab']) || !empty($studrows['hand']) ){ ?>
            <input type="button" class="button-disabled sub_btn" disabled name="submit" value="Insert"  onclick="return add_record(<?php echo $i;?>);"/>
          <?php } else {?>
            <input type="button" name="submit" class="sub_btn" value="Insert"  onclick="return add_record(<?php echo $i;?>);"/>
          <?php } ?>
         </td>
		  <td >
            <input type="button" name="submit" value="Edit"  onclick="return add_record1(<?php echo $i;?>);"/>
         </td>
		
	
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
var recitation= document.getElementById('recitation'+hid).value;
var sppling= document.getElementById('sppling'+hid).value;
var grammer= document.getElementById('grammer'+hid).value;
var s_cons= document.getElementById('s_cons'+hid).value;
var writting= document.getElementById('writting'+hid).value;
var text_w= document.getElementById('text_w'+hid).value;
var expression= document.getElementById('expression'+hid).value;
var pronounce= document.getElementById('pronounce'+hid).value;
var vocab= document.getElementById('vocab'+hid).value;
var hand= document.getElementById('hand'+hid).value;
var subject= document.getElementById('subject'+hid).value;
var reading= document.getElementById('reading'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&recitation="+recitation+"&sppling="+sppling+"&grammer="+grammer+"&s_cons="+s_cons+"&writting="+writting+"&text_w="+text_w+"&expression="+expression+"&pronounce="+pronounce+"&vocab="+vocab+"&hand="+hand+"&subject="+subject+"&reading="+reading;
$.ajax({
type:"POST",
url:"add_eh.php",
data:data_str,
success:function(){
alert('successfully inserted');
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
var recitation= document.getElementById('recitation'+hid).value;
var sppling= document.getElementById('sppling'+hid).value;
var grammer= document.getElementById('grammer'+hid).value;
var s_cons= document.getElementById('s_cons'+hid).value;
var writting= document.getElementById('writting'+hid).value;
var text_w= document.getElementById('text_w'+hid).value;
var expression= document.getElementById('expression'+hid).value;
var pronounce= document.getElementById('pronounce'+hid).value;
var vocab= document.getElementById('vocab'+hid).value;
var hand= document.getElementById('hand'+hid).value;
var subject= document.getElementById('subject'+hid).value;
var reading= document.getElementById('reading'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&recitation="+recitation+"&sppling="+sppling+"&grammer="+grammer+"&s_cons="+s_cons+"&writting="+writting+"&text_w="+text_w+"&expression="+expression+"&pronounce="+pronounce+"&vocab="+vocab+"&hand="+hand+"&subject="+subject+"&reading="+reading;
 
$.ajax({
type:"POST",
url:"add_ehedit.php",
data:data_str,
success:function(){
alert('Successfully Update');
}
});
} 
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	