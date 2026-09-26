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
		<a href="./?pageid=np">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/exa.png"  style=" float:left; width:40px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">HINDI ENGLISH MARKS</h2>
		<!-- <a href="./?pageid=view_deci1" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Details</a> -->
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="margin-top:-30px;"></div>				
        <div style="border: solid #000 0px; width:500;margin-left:30px; border-radius:5px; margin-top:7px;">
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
        <option value="">Select Subject</option>
       
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
		<!-- <div style="width:1322px; height:50px; background-color:#FF0000; margin-top:10px;">
		 <table style="width:100%;color:#000000">
         <tr style="color:#FFFFFF; background-color:#006699;">
		 <th style="width:160px;padding: 10px;">STUDENT NAME</th><th style="width:104px;">CLASS</th><th style="width:95px;">Term</th>
		 <th style="width:160px;">Punctuality/Behaviour</th> 
		 <th style="width:120px;">act_project & Painting</th>
         <th style="width:150px;">vaca Education</th>
         <th style="width:100px;">con</th>
		 <th colspan="2">Action</th>
		 </tr>
		 </table>
		 </div> -->
         <div class="tablea" style=" height:480px; width:1340px;overflow:scroll">
		 <table style="width:100%;color:#000000;">
		<tr><td colspan="14" align="center" style="color:#000; font-weight:bold">Class - <?php echo $_POST['class'];?>,&nbsp; &nbsp; &nbsp; Subject - <?php echo $_POST['subject'];?>,&nbsp; &nbsp; &nbsp; Exam - <?php echo $_POST['exam'];?></td> </tr>
		</table>
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
             <th style="padding: 10px;">STUDENT NAME</th><th style="width:104px;">CLASS</th><th style="width:95px;">Exam</th><th style="width:95px;">Subject</th>
              <th>VOCABULARY</th>
              <th>CONVERSATION</th>
			  
			  <th>READS ALPHABET AND WORDS</th>
			  <th>DISTINGUISHES SOUNDS OF LETTERS</th>
			  <th>FORMATION OF LETTERS</th>
			  <th>WRITES WORDS AND SENTENCES</th>
			 
             <th colspan="2">Action</th>
            </tr>
            </thead>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
	 $searchs=mysqli_query($con,"select * from hindi_english_n where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and subject='".$_POST['subject']."' and exam='".$_POST['exam']."' and session='".$_SESSION['session']."'");
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
			
		<td>	
			<input type="text" name="subject" value="<?php echo $_POST['subject']; ?>" id="subject<?php echo $i;?>" style="width:60px;">
         </td>
		
		 
		 <td >
            <input type="text" name="vaca" value="<?php echo $studrows['vaca']; ?>" id="vaca<?php echo $i;?>" style="width:45px;">
         </td>
		 <td >
            <input type="text" name="con" value="<?php echo $studrows['con']; ?>" id="con<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="reada" value="<?php echo $studrows['reada']; ?>" id="reada<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="lettersa" value="<?php echo $studrows['lettersa']; ?>" id="lettersa<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="formationa" value="<?php echo $studrows['formationa']; ?>" id="formationa<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="wwas" value="<?php echo $studrows['wwas']; ?>" id="wwas<?php echo $i;?>" style="width:45px;">
         </td>
		 
		 
		 
		 
		 <td >
      <?php if(!empty($studrows['vaca']) || !empty($studrows['con']) || !empty($studrows['reada']) || !empty($studrows['lettersa']) || !empty($studrows['formationa']) || !empty($studrows['wwas']) ){ ?>
            <input type="button" class="button-disabled sub_btn" disabled name="submit" value="ADD"  onclick="return add_record(<?php echo $i;?>);"/>
          <?php } else {?>
            <input type="button" name="submit" class="sub_btn" value="ADD"  onclick="return add_record(<?php echo $i;?>);"/>
          <?php } ?>
         </td>
		  <td >
            <input type="button" name="submit" value="EDIT"  onclick="return update_record(<?php echo $i;?>);"/>
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
var vaca= document.getElementById('vaca'+hid).value;
var con= document.getElementById('con'+hid).value;
var reada= document.getElementById('reada'+hid).value;
var lettersa= document.getElementById('lettersa'+hid).value;
var formationa= document.getElementById('formationa'+hid).value;
var wwas= document.getElementById('wwas'+hid).value;


var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&subject="+subject+"&vaca="+vaca+"&con="+con+"&reada="+reada+"&lettersa="+lettersa+"&formationa="+formationa+"&wwas="+wwas;
 
$.ajax({
type:"POST",
url:"add_hindi.php",
data:data_str,
success:function(){
alert('successfully inserted!');

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
var vaca= document.getElementById('vaca'+hid).value;
var con= document.getElementById('con'+hid).value;
var reada= document.getElementById('reada'+hid).value;

var lettersa= document.getElementById('lettersa'+hid).value;
var formationa= document.getElementById('formationa'+hid).value;
var wwas= document.getElementById('wwas'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&subject="+subject+"&vaca="+vaca+"&con="+con+"&reada="+reada+"&lettersa="+lettersa+"&formationa="+formationa+"&wwas="+wwas;;
 
$.ajax({
type:"POST",
url:"edit_hindi.php",
data:data_str,
success:function(){
alert('updated successfully!');

}
});
} 
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	