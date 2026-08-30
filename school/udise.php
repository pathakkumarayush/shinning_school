<html>
<head>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
</head>
<body alink="#00FF66" link="#00CC00">
 <style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}

.col_4{ height:auto; margin-left:0px; background-color:#FFFFFF;float:left; margin-top:10px;-webkit-box-shadow: 0 0 10px rgba(0,0,0, .65);
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
th, td { padding: 5px 5px; }


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
        <div class="left_sect"><img src="images/Student Detail/home.png" style="width:500px; height:80px;" />
		<a href="./?pageid=home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/exa.png"  style=" float:left; width:40px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Education portal / U dise portal students matching </h2>
		<!-- <a href="./?pageid=view_deci1" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Details</a> -->
        </div>
        <div class="col_4">
         
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="margin-top:-30px;"></div>				
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:300px">
        <tr>
        <td>Class<span class="textfieldRequiredMsg"></span></td>
        <?php
        $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		?>
        <td>
		
	   <select name="class" style="width:200px;" class="select">
       <option>Select</option>
	    <?php
	   
       
	
	    $result = mysqli_query($con,"SELECT * FROM class") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
		<option value="<?php echo $tier["class"];  ?>"><?php echo  $tier["class"].$tier["class_section"]; ?></option>
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
		<!-- <div style="width:1322px; height:50px; background-color:#FF0000; margin-top:10px;">
		 <table style="width:100%;color:#000000">
         <tr style="color:#FFFFFF; background-color:#006699;">
		 <th style="width:160px;padding: 10px;">STUDENT NAME</th><th style="width:104px;">CLASS</th><th style="width:95px;">Term</th>
		 <th style="width:160px;">Punctuality/Behaviour</th> 
		 <th style="width:120px;">weight & Painting</th>
         <th style="width:150px;">vision Education</th>
         <th style="width:100px;">bg</th>
		 <th colspan="2">Action</th>
		 </tr>
		 </table>
		 </div> -->
         <div class="tablea" style=" height:480px; width:1140px;overflow:scroll">
		 <?php
         
	     if(isset($_POST['search4']))
		 {
		 /*echo $_POST['class'];
		 echo $_POST['exam'];*/
		 $search=mysqli_query($con,"select * from student where student_class='".$_POST['class']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
         ?>
		  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/udise_list.php?student_class=<?php echo $_POST['class'];  ?>')">     <input type="button" value="Print" style="width:55px;padding:5px;"></a>
		 <form action="" method="post">
		 <table style="width:100%;color:#000000">
		 
			
		    <tr style="color:#FFFFFF;text-align: center; background-color:#006699;">
             <th>Sch. NO</th><th>STUDENT NAME</th><th>CLASS</th>
             <th>Udise</th>
			 <th>Edcation</th>
			 <th colspan="2">Action</th>
            </tr>
            </thead>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		  $searchs=mysqli_query($con,"select * from udise_portel where student='".$studrow['student_id']."' and class='".$studrow['student_class']."' and session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
	     ?>
         <tbody>	
		 <tr style="min-height:30px;text-align: center; color:#000000">
		 <td>
         <input type="text" value="<?php echo $studrow['student_scholar']; ?>" name="" style="width:100px;">
		 <td>
         <input type="text" value="<?php echo $studrow['student_name']; ?>" name="" style="width:140px;">
		 <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
		 <td>
         <input type="text" name="cls" value="<?php echo $studrow['student_class']; ?>" id="cls<?php echo $i;?>" style="width:70px;">
         </td>
		
		
		  <td>
	       <select name="udise" class="select" id="udise<?php echo $i;?>" style="width:100px;">
		  <?php
           $res=mysqli_query($con,"select distinct(udise) from udise");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["udise"]; ?>" <?php if($rows["udise"]==$studrows["udise"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["udise"]; ?></option>
		  
           <?php
		   }  
           ?>
         </select>
         </td>
		
		
		 
		  <td>
	       <select name="edu" class="select" id="edu<?php echo $i;?>" style="width:100px;">
		  <?php
           $ress=mysqli_query($con,"select distinct(edu) from edu");
           while($rowss=mysqli_fetch_array($ress))
           {
		   ?>
		   <option value="<?php echo $rowss["edu"]; ?>" <?php if($rowss["edu"]==$studrows["edu"] ) { ?> selected="selected" <?php }?>> <?php echo $rowss["edu"]; ?></option>
		  
           <?php
		   }  
           ?>
         </select>
         </td>
		
		 
		 <td >
        <?php if(!empty($studrows['udise']) || !empty($studrows['edu'])){ ?>
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
var udise= document.getElementById('udise'+hid).value;
var edu= document.getElementById('edu'+hid).value;

var data_str= "cls="+cls+"&idm="+idm+"&udise="+udise+"&edu="+edu;

$.ajax({
type:"POST",
url:"add_udise.php",
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
var udise= document.getElementById('udise'+hid).value;
var edu= document.getElementById('edu'+hid).value;

var data_str= "cls="+cls+"&idm="+idm+"&udise="+udise+"&edu="+edu;

$.ajax({
type:"POST",
url:"edit_udise.php",
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
	