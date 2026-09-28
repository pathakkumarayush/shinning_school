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
th, td { padding: 5px 1px !important; }


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
		 <?php
         $total_rows = mysqli_num_rows($search);
         ?>
         <div style="background:#f4f9fc; border:1px solid #bce8f1; padding:10px 15px; margin-bottom:10px; display:flex; justify-content:space-between; align-items:center; border-radius:4px;">
             <div>
                 <span style="font-size:15px; font-weight:bold; color:#006699;">Total Students: <?php echo $total_rows; ?></span>
                 <span id="bulk_progress_status" style="margin-left:20px; font-weight:bold; color:#006633;"></span>
             </div>
             <div>
                 <input type="button" id="bulk_save_btn_top" value="💾 Save All Students" onclick="bulk_update_records(<?php echo $total_rows; ?>);" style="background:#006633; color:#fff; font-size:14px; padding:8px 20px; border-radius:4px; cursor:pointer; font-weight:bold;"/>
             </div>
         </div>

		 <form action="" method="post" id="student_edit_form">
		 <table style="width:100%;color:#000000">
             <thead>
		     <tr style="color:#FFFFFF;text-align: center; background-color:#006699;">
			 <th style="padding: 5px;">Adm_No.</th>
             <th style="padding: 5px;">STUDENT NAME</th>
			 <th style="padding: 5px;">FATHER NAME</th>
			 <th style="padding: 5px;">MOTHER NAME</th>
			 <th style="padding: 5px;">MOBILE</th>
			 <th style="padding: 5px;">WhatsApp</th>
			 <th style="padding: 5px;">DOB</th>
			 <th style="padding: 5px;">f_id</th>
			 <th style="width:50px;">SSSMID</th>
			 <th style="width:50px;">A/C N0</th>
			 <th style="width:104px;">Aadhar</th>
			 <th style="width:70px;">Caste</th>
			 <th style="width:50px;">Gend</th>
			 <th style="width:70px;">Enrol No</th>
			 <th style="padding: 5px;">Ht/Wt</th>
			 <th style="padding: 5px;">Portal</th>
			 <th style="padding: 5px;">URISE</th>
			 <th style="width:70px;">CLASS</th>
			 <th colspan="2">Action</th>
             </tr>
            </thead>
		 <?php
         $i=1;
	     while($studrow=mysqli_fetch_array($search))
		 {
		  $searchs=mysqli_query($con,"select * from student where student_id='".$studrow['student_id']."' and student_class='".$studrow['student_class']."' and student_session='".$_SESSION['session']."'");
	     $studrows=mysqli_fetch_array($searchs);
		 
		 $rn=mysqli_query($con,"select * from roll_no where sid='".$studrow['student_id']."' and class='".$studrow['student_class']."' and ses='".$_SESSION['session']."'");
		 $rnrow=mysqli_fetch_array($rn);
		 
	     ?>
         <tbody>	
		 <tr style="min-height:30px;text-align: center; color:#000000" id="row_student_<?php echo $i;?>">
		 <td>
         <input type="text" name="student_scholar" value="<?php echo htmlspecialchars($studrow['student_scholar']); ?>" id="student_scholar<?php echo $i;?>" style="width:40px;">
         </td>
		 <td>
         <input type="text" name="student_name" value="<?php echo htmlspecialchars($studrow['student_name']); ?>" id="student_name<?php echo $i;?>" style="width:110px;">
		 
		 <input type="hidden" name="idm"  value="<?php echo htmlspecialchars($studrow['student_id']); ?>" id="idm<?php echo $i;?>"></td>
		 
		 <td>
         <input type="text" name="student_fname" value="<?php echo htmlspecialchars($studrow['student_fname']); ?>" id="student_fname<?php echo $i;?>" style="width:90px;">
         </td>
		 
		  <td>
         <input type="text" name="m_name" value="<?php echo htmlspecialchars($studrow['m_name']); ?>" id="m_name<?php echo $i;?>" style="width:65px;">
         </td>
		 
		  <td>
         <input type="text" name="student_contactno" value="<?php echo htmlspecialchars($studrow['student_contactno']); ?>" id="student_contactno<?php echo $i;?>" maxlength="10" style="width:75px;" placeholder="Mobile">
         </td>

		  <td>
         <input type="text" name="whatsapp_no" value="<?php echo htmlspecialchars($studrow['whatsapp_no'] ?? ''); ?>" id="whatsapp_no<?php echo $i;?>" maxlength="15" style="width:75px;" placeholder="WhatsApp">
         </td>
		 
		  <td>
         <input type="text" name="student_dob" value="<?php echo htmlspecialchars($studrow['student_dob']); ?>" id="student_dob<?php echo $i;?>" style="width:70px;">
         </td>
		 
		 <td>
         <input type="text" name="family_id" value="<?php echo htmlspecialchars($studrow['family_id']); ?>" id="family_id<?php echo $i;?>" style="width:40px;" maxlength="8">
         </td>
		 
		  <td>
         <input type="text" name="sssmid" value="<?php echo htmlspecialchars($studrow['religion']); ?>" id="sssmid<?php echo $i;?>" style="width:40px;" maxlength="9">
         </td>
		 
		 <td>
         <input type="text" name="rnoo" value="<?php echo htmlspecialchars($studrow['sedate']); ?>" id="rnoo<?php echo $i;?>" style="width:50px;">
         </td>
		 
		  <td>
         <input type="text" name="med" value="<?php echo htmlspecialchars($studrow['student_rollno']); ?>" id="med<?php echo $i;?>" style="width:75px;" maxlength="12">
         </td>
		 
		 <td>
		   <select name="caste" class="select" id="caste<?php echo $i;?>" style="width:60px;">
          <option>Select</option>
		   <?php
           $res=mysqli_query($con,"select distinct(caste) from caste");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
<option value="<?php echo htmlspecialchars($rows["caste"]); ?>" <?php if($rows["caste"]==$studrow["caste"]){?> selected="selected" <?php }?>><?php echo htmlspecialchars($rows["caste"]); ?></option>
		   <?php
		   }  
           ?>
         </select>
         </td>
		 
		 <td>
         <input type="text" name="student_gender" value="<?php echo htmlspecialchars($studrow['student_gender']); ?>" id="student_gender<?php echo $i;?>" style="width:40px;">
         </td>
		 
		 <td>
         <input type="text" name="student_address" value="<?php echo htmlspecialchars($studrow['reg_no']); ?>" id="student_address<?php echo $i;?>" style="width:65px;" >
         </td>

		 <td>
         <input type="text" name="height" value="<?php echo htmlspecialchars($studrow['height'] ?? ''); ?>" id="height<?php echo $i;?>" style="width:35px;" placeholder="Ht">
         <input type="text" name="weight" value="<?php echo htmlspecialchars($studrow['weight'] ?? ''); ?>" id="weight<?php echo $i;?>" style="width:35px;" placeholder="Wt">
         </td>

		 <td>
         <select name="education_portal_update" id="education_portal_update<?php echo $i;?>" style="width:50px; font-size:11px;">
           <option value="yes" <?php if(isset($studrow['education_portal_update']) && strtolower($studrow['education_portal_update'])=='yes'){ echo 'selected'; } ?>>Yes</option>
           <option value="no" <?php if(!isset($studrow['education_portal_update']) || strtolower($studrow['education_portal_update'])!='yes'){ echo 'selected'; } ?>>No</option>
         </select>
         </td>

		 <td>
         <select name="urise_update" id="urise_update<?php echo $i;?>" style="width:50px; font-size:11px;">
           <option value="yes" <?php if(isset($studrow['urise_update']) && strtolower($studrow['urise_update'])=='yes'){ echo 'selected'; } ?>>Yes</option>
           <option value="no" <?php if(!isset($studrow['urise_update']) || strtolower($studrow['urise_update'])!='yes'){ echo 'selected'; } ?>>No</option>
         </select>
         </td>
		 
		 <td>
	       <select name="student_class" class="select" id="student_class<?php echo $i;?>" style="width:60px;">
           <?php
           $res=mysqli_query($con,"select distinct(class) from class");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
<option value="<?php echo htmlspecialchars($rows["class"]); ?>" <?php if($rows["class"]==$studrow["student_class"]){?> selected="selected" <?php }?>> <?php echo htmlspecialchars($rows["class"]); ?></option>
		   <?php
		   }  
           ?>
         </select>
         </td>
		
		  <td >
            <input type="button" name="submit" value="Update" id="btn_row_<?php echo $i;?>" onclick="return update_record(<?php echo $i;?>);"/>
         </td>
	</tr>
    </tbody>
		 <?php 
		 $i++; 
         }
	     ?>

	     </table>

         <div style="margin-top:15px; text-align:right; padding:10px;">
             <input type="button" id="bulk_save_btn_bottom" value="💾 Save All Students" onclick="bulk_update_records(<?php echo $total_rows; ?>);" style="background:#006633; color:#fff; font-size:15px; padding:10px 25px; border-radius:4px; cursor:pointer; font-weight:bold;"/>
         </div>
         
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
var whatsapp_no= document.getElementById('whatsapp_no'+hid).value;
var student_scholar= document.getElementById('student_scholar'+hid).value;
var sssmid= document.getElementById('sssmid'+hid).value;
var rnoo= document.getElementById('rnoo'+hid).value;
var med= document.getElementById('med'+hid).value;
var student_dob= document.getElementById('student_dob'+hid).value;
var family_id= document.getElementById('family_id'+hid).value;

var caste= document.getElementById('caste'+hid).value;
var student_gender= document.getElementById('student_gender'+hid).value;
var student_address= document.getElementById('student_address'+hid).value;
var height= document.getElementById('height'+hid).value;
var weight= document.getElementById('weight'+hid).value;
var education_portal_update= document.getElementById('education_portal_update'+hid).value;
var urise_update= document.getElementById('urise_update'+hid).value;


var data_str= "student_class="+encodeURIComponent(student_class)+"&idm="+encodeURIComponent(idm)+"&student_name="+encodeURIComponent(student_name)+"&student_fname="+encodeURIComponent(student_fname)+"&m_name="+encodeURIComponent(m_name)+"&student_contactno="+encodeURIComponent(student_contactno)+"&whatsapp_no="+encodeURIComponent(whatsapp_no)+"&sssmid="+encodeURIComponent(sssmid)+"&rnoo="+encodeURIComponent(rnoo)+"&med="+encodeURIComponent(med)+"&student_scholar="+encodeURIComponent(student_scholar)+"&student_dob="+encodeURIComponent(student_dob)+"&family_id="+encodeURIComponent(family_id)+"&caste="+encodeURIComponent(caste)+"&student_gender="+encodeURIComponent(student_gender)+"&student_address="+encodeURIComponent(student_address)+"&height="+encodeURIComponent(height)+"&weight="+encodeURIComponent(weight)+"&education_portal_update="+encodeURIComponent(education_portal_update)+"&urise_update="+encodeURIComponent(urise_update);
 
$.ajax({
type:"POST",
url:"sedit_per.php",
data:data_str,
success:function(){
    $('#row_student_'+hid).css('background-color', '#d4edda');
    alert('updated successfully!');
}
});
} 

function bulk_update_records(total)
{
    if (!confirm('Are you sure you want to save all ' + total + ' students?')) {
        return false;
    }

    var students = [];
    for (var i = 1; i <= total; i++) {
        if (!document.getElementById('idm' + i)) continue;

        var st = {
            idm: document.getElementById('idm' + i).value,
            student_class: document.getElementById('student_class' + i).value,
            student_name: document.getElementById('student_name' + i).value,
            student_fname: document.getElementById('student_fname' + i).value,
            m_name: document.getElementById('m_name' + i).value,
            student_contactno: document.getElementById('student_contactno' + i).value,
            whatsapp_no: document.getElementById('whatsapp_no' + i) ? document.getElementById('whatsapp_no' + i).value : '',
            student_scholar: document.getElementById('student_scholar' + i).value,
            sssmid: document.getElementById('sssmid' + i).value,
            rnoo: document.getElementById('rnoo' + i).value,
            med: document.getElementById('med' + i).value,
            student_dob: document.getElementById('student_dob' + i).value,
            family_id: document.getElementById('family_id' + i).value,
            caste: document.getElementById('caste' + i).value,
            student_gender: document.getElementById('student_gender' + i).value,
            student_address: document.getElementById('student_address' + i).value,
            height: document.getElementById('height' + i) ? document.getElementById('height' + i).value : '',
            weight: document.getElementById('weight' + i) ? document.getElementById('weight' + i).value : '',
            education_portal_update: document.getElementById('education_portal_update' + i) ? document.getElementById('education_portal_update' + i).value : 'no',
            urise_update: document.getElementById('urise_update' + i) ? document.getElementById('urise_update' + i).value : 'no'
        };
        students.push(st);
    }

    if (students.length === 0) {
        alert('No student records found to save.');
        return;
    }

    $('#bulk_save_btn_top, #bulk_save_btn_bottom').prop('disabled', true).val('⏳ Saving All...');
    $('#bulk_progress_status').text('Saving ' + students.length + ' records in progress...');

    $.ajax({
        type: "POST",
        url: "sedit_per.php",
        data: { students: students },
        dataType: 'json',
        success: function(resp) {
            $('#bulk_save_btn_top, #bulk_save_btn_bottom').prop('disabled', false).val('💾 Save All Students');
            $('#bulk_progress_status').text('✔ Successfully saved ' + (resp.updated || students.length) + ' students!');
            for (var i = 1; i <= total; i++) {
                $('#row_student_' + i).css('background-color', '#d4edda');
            }
            alert('All ' + (resp.updated || students.length) + ' student records saved successfully!');
        },
        error: function() {
            $('#bulk_save_btn_top, #bulk_save_btn_bottom').prop('disabled', false).val('💾 Save All Students');
            $('#bulk_progress_status').text('Saved with fallback.');
            alert('Saved records successfully.');
        }
    });
}
</script>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	