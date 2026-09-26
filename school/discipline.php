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
		<a href="./?pageid=exam_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell" style="width:100%;">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Life Skills</h2>
		<!--<a href="./?pageid=view_deci" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px"></a>-->
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
		
		
	
		
		<!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		</tr>
        </table>
		</form>
		<br>
        </div>
		
		<div style="width:100%; height:68px; background-color:#FF0000; margin-top:10px;">
		
		
		 <table style="width:100%;color:#000000;">
		 
		 
		 
		 <tr style="color:#FFFFFF; background-color:#006699; line-height:15px;  font-weight:bold;" align="center">
		 <td style="width:200px;">STUDENT NAME</td>
		 
	
		 <td style=" width:115px;">Class</td>
		
		 <td style="width:95px;">Regula.<br>Punctua.</td>
		 <td style="width:100px;">Sincerity</td>
		 <td style="width:100px;">Behaviour<br> Values</td>
		 <td style="width:105px;">Respect<br>fulness<br>for Rules &<br>Regulation </td>
		 <td style="width:100px;">Att. Towards<br>Teacher</td>
		 <td style="width:100px;">Att. Towards<br>School-mates</td>
		 <td style="width:105px;">Att. Towards <br>Society</td>
		 <td style="width:95px;">Att. Towards<br> Nation</td>
		
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
		 $searchs=mysqli_query($con,"select * from life_skills where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
	     ?>	
		 <tr style="min-height:30px; color:#000000">
		 <td><input type="text" value="<?php echo $studrow['student_name']; ?>" name="" style="width:140px;">
		 <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
		
		 
		
		 <td>
		 <input type="text" name="cls" value="<?php echo $studrow['student_class']; ?>" id="cls<?php echo $i;?>" style="width:50px;">
		 </td>
		
		 
		
		 <td>
		 <input type="text" name="decision" value="<?php echo $studrows['decision']; ?>" id="decision<?php echo $i;?>" style="width:50px;">
		
		 </td>
		 
		 <td>
		 <input type="text" name="selfa" value="<?php echo $studrows['selfa']; ?>" id="selfa<?php echo $i;?>" style="width:50px;">
		
		 </td>
		
		 <td>
		 <input type="text" name="creative" value="<?php echo $studrows['creative']; ?>" id="creative<?php echo $i;?>" style="width:50px;">
		 
		 </td>
		 
		 <td>
		 <input type="text" name="prob" value="<?php echo $studrows['prob']; ?>" id="prob<?php echo $i;?>" style="width:50px;">
		
		 </td>
		 
		 
		 <td>
		 <input type="text" name="coping" value="<?php echo $studrows['coping']; ?>" id="coping<?php echo $i;?>" style="width:50px;">
		 
		 </td>
		 
		 <td>
		 <input type="text" name="emotions" value="<?php echo $studrows['emotions']; ?>" id="emotions<?php echo $i;?>" style="width:50px;">
		
		  </td>
		 
		 
		 <td>
		 <input type="text" name="rel" value="<?php echo $studrows['rel']; ?>" id="rel<?php echo $i;?>" style="width:50px;">
		 
		 </td>
		 
		 <td>
		 <input type="text" name="emp" value="<?php echo $studrows['emp']; ?>" id="emp<?php echo $i;?>" style="width:50px;">
		
		 </td>
		
		
		
		
		
		 <td >
      <?php if(!empty($studrows['decision']) || !empty($studrows['selfa']) || !empty($studrows['creative']) || !empty($studrows['prob']) || !empty($studrows['coping']) || !empty($studrows['emotions']) || !empty($studrows['rel']) || !empty($studrows['emp'])  ){ ?>
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
var decision= document.getElementById('decision'+hid).value;
var selfa= document.getElementById('selfa'+hid).value;
var creative= document.getElementById('creative'+hid).value;
var prob= document.getElementById('prob'+hid).value;
var coping= document.getElementById('coping'+hid).value;
var emotions= document.getElementById('emotions'+hid).value;
var rel= document.getElementById('rel'+hid).value;
var emp= document.getElementById('emp'+hid).value;

var data_str= "cls="+cls+"&idm="+idm+"&decision="+decision+"&selfa="+selfa+"&creative="+creative+"&prob="+prob+"&coping="+coping+"&emotions="+emotions+"&rel="+rel+"&emp="+emp;
$.ajax({
type:"POST",
url:"add_recordd.php",
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
var decision= document.getElementById('decision'+hid).value;
var selfa= document.getElementById('selfa'+hid).value;
var creative= document.getElementById('creative'+hid).value;
var prob= document.getElementById('prob'+hid).value;
var coping= document.getElementById('coping'+hid).value;
var emotions= document.getElementById('emotions'+hid).value;
var rel= document.getElementById('rel'+hid).value;
var emp= document.getElementById('emp'+hid).value;

var data_str= "cls="+cls+"&idm="+idm+"&decision="+decision+"&selfa="+selfa+"&creative="+creative+"&prob="+prob+"&coping="+coping+"&emotions="+emotions+"&rel="+rel+"&emp="+emp;
 
$.ajax({
type:"POST",
url:"add_recorddedit.php",
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
	