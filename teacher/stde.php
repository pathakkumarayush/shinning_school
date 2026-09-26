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
th, td { padding: 8px 5px !important; }


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
		<a href="./?pageid=student_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/exa.png"  style=" float:left; width:40px; height:40px;"/>
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Update Student Class</h2>
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
        
        <td><select name="class" class="select" style="width:150px" onChange="showSection(this.value)">
        <option value="-1">Select class</option>
   
		
		<?php
       
		$result = mysqli_query($con,"SELECT * FROM class") 
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
         <th style="width:150px;">confidant Education</th>
         <th style="width:100px;">polite</th>
		 <th colspan="2">Action</th>
		 </tr>
		 </table>
		 </div> -->
         <div class="tablea" style=" height:980px; width:1340px;overflow:scroll">
		
		
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
			 <th style="padding: 10px;">STUDENT SCHOLAR</th>
             <th style="padding: 10px;">STUDENT NAME</th>
			 <th style="padding: 10px;">FATHER NAME</th>
			 <th style="padding: 10px;">MOTHER NAME</th>
			 <th style="padding: 10px;">MOBILE</th>
			 <th style="padding: 10px;">DOB</th>
			 <th style="width:104px;">SSSMID</th>
			 <th style="width:104px;">Roll No</th>
			 <th style="width:104px;">Aadhar No</th>
			 <th style="width:104px;">STUDENT CLASS</th>
			 <th colspan="2">Action</th>
             </tr>
            </thead>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		  $searchs=mysqli_query($con,"select * from student where student_id='".$studrow['student_id']."' and student_class='".$studrow['student_class']."' and student_session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
	     ?>
         <tbody>	
		 <tr style="min-height:30px;text-align: center; color:#000000">
		 <td>
         <input type="text" name="student_scholar" value="<?php echo $studrow['student_scholar']; ?>" id="student_scholar<?php echo $i;?>" style="width:50px;">
         </td>
		 <td>
         <input type="text" name="student_name" value="<?php echo $studrow['student_name']; ?>" id="student_name<?php echo $i;?>" style="width:150px;">
		 
		 <input type="hidden" name="idm"  value="<?php echo $studrow['student_id']; ?>" id="idm<?php echo $i;?>"></td>
		 
		 <td>
         <input type="text" name="student_fname" value="<?php echo $studrow['student_fname']; ?>" id="student_fname<?php echo $i;?>" style="width:100px;">
         </td>
		 
		  <td>
         <input type="text" name="m_name" value="<?php echo $studrow['m_name']; ?>" id="m_name<?php echo $i;?>" style="width:100px;">
         </td>
		 
		
		 
		  <td>
         <input type="text" name="student_contactno" value="<?php echo $studrow['student_contactno']; ?>" id="student_contactno<?php echo $i;?>" style="width:85px;">
         </td>
		 
		  <td>
         <input type="text" name="student_dob" value="<?php echo $studrow['student_dob']; ?>" id="student_dob<?php echo $i;?>" style="width:100px;">
         </td>
		 
		 
		  <td>
         <input type="text" name="sssmid" value="<?php echo $studrow['religion']; ?>" id="sssmid<?php echo $i;?>" style="width:100px;">
         </td>
		 
		
		 
		 <td>
         <input type="text" name="rnoo" value="<?php echo $studrow['rno']; ?>" id="rnoo<?php echo $i;?>" style="width:80px;">
         </td>
		 
		  <td>
         <input type="text" name="med" value="<?php echo $studrow['student_rollno']; ?>" id="med<?php echo $i;?>" style="width:80px;">
         </td>
		 
		 
		 <td>
            
	   
	       <select name="student_class" class="select" id="student_class<?php echo $i;?>" style="width:100px;">
        
		  <?php
           $res=mysqli_query($con,"select distinct(class) from class");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$studrow["student_class"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
		   
	
       
           <?php
		   }  
           ?>
         </select>
			
         </td>
		
	
		  <td >
            <input type="button" name="submit" value="Update"  onclick="return update_record(<?php echo $i;?>);"/>
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
function update_record(hid)
{
var student_class= document.getElementById('student_class'+hid).value;
var idm= document.getElementById('idm'+hid).value;
var student_name= document.getElementById('student_name'+hid).value;
var student_fname= document.getElementById('student_fname'+hid).value;
var m_name= document.getElementById('m_name'+hid).value;
var student_contactno= document.getElementById('student_contactno'+hid).value;
var student_scholar= document.getElementById('student_scholar'+hid).value;
var sssmid= document.getElementById('sssmid'+hid).value;
var rnoo= document.getElementById('rnoo'+hid).value;
var med= document.getElementById('med'+hid).value;
var student_dob= document.getElementById('student_dob'+hid).value;

var data_str= "student_class="+student_class+"&idm="+idm+"&student_name="+student_name+"&student_fname="+student_fname+"&m_name="+m_name+"&student_contactno="+student_contactno+"&sssmid="+sssmid+"&rnoo="+rnoo+"&med="+med+"&student_scholar="+student_scholar+"&student_dob="+student_dob;
 
$.ajax({
type:"POST",
url:"sedit_per.php",
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
	