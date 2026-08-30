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
th, td { padding: 8px 4px; }


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
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">SOCIAL EMOTIONAL DEVELOPMENT</h2>
		<!-- <a href="./?pageid=view_deci1" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Details</a> -->
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="margin-top:-30px;"></div>				
        <div style="border: solid #000 0px; width:500;margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px;">
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
		
		 <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		</tr>
		
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
         <th style="width:150px;">confidant Education</th>
         <th style="width:100px;">polite</th>
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
              <th>INTERACTION WITH PEERS</th>
              <th >INTERACTION WITH TEACHERS</th>
			  <th >PARTICIPATION IN GROUP DISCUSSION</th>
			  <th >CONFIDENCE LEVEL</th>
			  <th >IS INDEPENDENT</th>
			  <th >WELL DISCIPLINED</th>
			  <th >SENSE OF SHARING</th>
			  <th >CLEANLINESS AND TIDINESS</th>
			  <th>IS PUNCTUAL</th>
			  <th>INTELLECTUAL DEVELOPMENT</th>
             <th colspan="2">Action</th>
            </tr>
            </thead>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		  $searchs=mysqli_query($con,"select * from social_emo where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and session='".$_SESSION['session']."'");
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
            <input type="text" name="confidant" value="<?php echo $studrows['confidant']; ?>" id="confidant<?php echo $i;?>" style="width:45px;">
         </td>
		 <td >
            <input type="text" name="polite" value="<?php echo $studrows['polite']; ?>" id="polite<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="reponsible" value="<?php echo $studrows['reponsible']; ?>" id="reponsible<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="decipline" value="<?php echo $studrows['decipline']; ?>" id="decipline<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="regular" value="<?php echo $studrows['regular']; ?>" id="regular<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="appe" value="<?php echo $studrows['appe']; ?>" id="appe<?php echo $i;?>" style="width:45px;">
         </td>
		 
		  <td >
            <input type="text" name="sans" value="<?php echo $studrows['sans']; ?>" id="sans<?php echo $i;?>" style="width:45px;">
         </td>
		 
		 
		   <td >
            <input type="text" name="sans1" value="<?php echo $studrows['sans1']; ?>" id="sans1<?php echo $i;?>" style="width:45px;">
         </td>
		 
		   <td >
            <input type="text" name="sans2" value="<?php echo $studrows['sans2']; ?>" id="sans2<?php echo $i;?>" style="width:45px;">
         </td>
		 
		   <td >
            <input type="text" name="sans3" value="<?php echo $studrows['sans3']; ?>" id="sans3<?php echo $i;?>" style="width:45px;">
         </td>		 
		 
		 <td >
      <?php if(!empty($studrows['confidant']) || !empty($studrows['polite']) || !empty($studrows['reponsible']) || !empty($studrows['decipline']) || !empty($studrows['regular']) || !empty($studrows['appe']) || !empty($studrows['sans']) || !empty($studrows['sans1'])|| !empty($studrows['sans2'])|| !empty($studrows['sans3'])){ ?>
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

var confidant= document.getElementById('confidant'+hid).value;
var polite= document.getElementById('polite'+hid).value;
var reponsible= document.getElementById('reponsible'+hid).value;

var decipline= document.getElementById('decipline'+hid).value;
var regular= document.getElementById('regular'+hid).value;
var appe= document.getElementById('appe'+hid).value;
var sans= document.getElementById('sans'+hid).value;
var sans1= document.getElementById('sans1'+hid).value;
var sans2= document.getElementById('sans2'+hid).value;
var sans3= document.getElementById('sans3'+hid).value;


var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&confidant="+confidant+"&polite="+polite+"&reponsible="+reponsible+"&decipline="+decipline+"&regular="+regular+"&appe="+appe+"&sans="+sans+"&sans1="+sans1+"&sans2="+sans2+"&sans3="+sans3;
 
$.ajax({
type:"POST",
url:"add_sed.php",
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

var confidant= document.getElementById('confidant'+hid).value;
var polite= document.getElementById('polite'+hid).value;
var reponsible= document.getElementById('reponsible'+hid).value;

var decipline= document.getElementById('decipline'+hid).value;
var regular= document.getElementById('regular'+hid).value;
var appe= document.getElementById('appe'+hid).value;
var sans= document.getElementById('sans'+hid).value;
var sans1= document.getElementById('sans1'+hid).value;
var sans2= document.getElementById('sans2'+hid).value;
var sans3= document.getElementById('sans3'+hid).value;

var data_str= "cls="+cls+"&idm="+idm+"&exam="+exam+"&confidant="+confidant+"&polite="+polite+"&reponsible="+reponsible+"&decipline="+decipline+"&regular="+regular+"&appe="+appe+"&sans="+sans+"&sans1="+sans1+"&sans2="+sans2+"&sans3="+sans3;
 
$.ajax({
type:"POST",
url:"edit_sed.php",
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
	