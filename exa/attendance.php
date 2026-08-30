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
.button-disabled{
  background-color: red!important;
  cursor: not-allowed;
}
</style>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Examination/exa.png" style="width:500px; height:80px;" />
        <a href="./?pageid=home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/exa.png"  style=" float:left; width:60px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Attendance And Remarks</h2>
        <a href="rmk.pdf"  target="_blank" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Remark</a>
        </div>
        <div class="col_4">
         
        <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="margin-top:-30px;"></div>             
        <div style="border: solid #000 0px; width:500px; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
        <tr>
        <td>Class<span class="textfieldRequiredMsg"></span></td>
        <?php
        $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
        ?>
        <td><select name="class" class="select" style="width:150px" onChange="showSection(this.value)">
        <option value="-1">Select class</option>
         <?php
	  
	    $result = mysqli_query($con,"SELECT * FROM class where session='".$_SESSION['session']."'") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
        <option value="<?php echo $tier['class']; ?>"><?php echo $tier['class']; ?></option>
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
        <!-- <td><div id="txtHint1"></div></td>-->
        <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
        </tr>
        </table>
        </form>
        <br>
        </div>
        <div style="width:100%; height:35px; background-color:#FF0000; margin-top:10px;">
         <table style="width:100%;color:#000000;">
         <tr style="color:#FFFFFF; background-color:#006699; line-height:30px; font-size:18pxpx; font-weight:bold;" align="center">
         <td style="width:190px;">STUDENT NAME</td>
         <td style="width:90px;">CLASS</td> 
         <th style="width:120px;">Term</td>
		 <th style="width:120px;">Rank</td>
         <td style="width:140px;">No Of Days Present </td>
		 <td style="width:390px;">Remark </td>
         <th>Action</th>
         
         </tr>
          </table>
        </div>
       <div class="table" style=" height:480px;overflow:scroll">
         <?php
         if(isset($_POST['search4']))
         {
         $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and  student_session='".$_SESSION['session']."' and status='0'  order by student_name Asc");
        ?>
    
         <form action="" method="post">
         <table style="width:100%;color:#000000">
         
         <?php
         $i=1;
         while($studrow=mysqli_fetch_array($search))
         {
        
     /*$searchs=mysqli_query($con,"select * from health_status where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and session='".$_SESSION['session']."'");*/

     $searchs=mysqli_query($con,"select * from att_helth1 where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and exam='".$_POST['exam']."' and session='".$_SESSION['session']."'");
     
         $studrows=mysqli_fetch_array($searchs);
         ?> 
        <tr style="min-height:30px; color:#000000">
         <td style="width: 120px;"><input type="text" value="<?php echo $studrow['student_name']; ?>" name="" style="width:150px;">
         <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
         <td style="width: 140px;">
         <input type="text" name="cls" value="<?php echo $studrow['student_class']; ?>" id="cls<?php echo $i;?>" style="width:40px;"></td>
         <td style="width: 100px;"><input type="text" name="exam" value="<?php echo $_POST['exam']; ?>" id="exam<?php echo $i;?>" style="width:75px;"></td>
        
		 <td><input type="text" name="attend" value="<?php echo $studrows['attend']; ?>" id="attend<?php echo $i;?>" style="width:100px;"></td>
         <td><input type="text" name="height" value="<?php echo $studrows['height']; ?>" id="height<?php echo $i;?>" style="width:100px;"></td>
		 <td><input type="text" name="weight" value="<?php echo $studrows['weight']; ?>" id="weight<?php echo $i;?>" style="width:350px;"></td>
		 
         <td>
            <?php if(!empty($studrows['height']) || !empty($studrows['weight']) || !empty($studrows['attend'])){ ?>
            <input type="button" class="button-disabled sub_btn" disabled name="submit" value="Insert"  onclick="return add_record(<?php echo $i;?>);"/>
            <?php } else {?>
            <input type="button" name="submit" value="Insert" onClick="return add_record(<?php echo $i;?>);"/>
			
          <?php } ?>

        </td>
         <td> <input type="button" name="submit" value="update" onClick="return add_record1(<?php echo $i;?>);"/></td>
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
var height= document.getElementById('height'+hid).value;
var exam= document.getElementById('exam'+hid).value;
var weight= document.getElementById('weight'+hid).value;
var attend= document.getElementById('attend'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&height="+height+"&exam="+exam+"&weight="+weight+"&attend="+attend;
 
$.ajax({
type:"POST",
url:"add_recordh.php",
data:data_str,
success:function(){
alert('successfully inserted');
/*document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('height'+hid).value='';*/
}
});
} 
</script>
<script>
function add_record1(hid)
{
var cls= document.getElementById('cls'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var height= document.getElementById('height'+hid).value;
var exam= document.getElementById('exam'+hid).value;
var weight= document.getElementById('weight'+hid).value;
var attend= document.getElementById('attend'+hid).value;
var data_str= "cls="+cls+"&idm="+idm+"&height="+height+"&exam="+exam+"&weight="+weight+"&attend="+attend;
 
$.ajax({
type:"POST",
url:"add_recordhhh.php",
data:data_str,
success:function(){
alert('successfully Update');
/*document.getElementById('cls'+hid).value='';
document.getElementById('exam'+hid).value='';
document.getElementById('idm'+hid).value='';
document.getElementById('height'+hid).value='';*/
}
});
} 
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
    