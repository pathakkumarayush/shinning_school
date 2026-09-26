<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>
jQuery(function($){
  $('#from').datepicker({ dateFormat: 'dd-mm-yy' });
  $('#to').datepicker({ dateFormat: 'yy-mm-dd' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="jquery.table2excel.js"></script>
<script type="text/javascript">
            $(document).ready(function(e) {
               $('button#print_btn').on('click', function(e)  {
                    $('#div_to_print').printThis({title: ''});
               }); 
               //download Excel
               $("#excel").click(function(){
                var file_name = $("#cls").val()+'__'+$("#exm").val()+'__'+$("#ses").val();
                  $("#tbl_exm").table2excel({
                    /*exclude: ".noExl",*/
                    name: "Worksheet Name",
                    filename: "Fee Collection By Date("+file_name+")", //do not include extension
                    fileext: ".xls", // file extension
                  });
                });
               //download Excel
            });
        </script>
		
<script type="text/javascript">
$(document).ready(function()
{
	$(".class").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_subb.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".subject").html(html);
			} 
		});
	});
	

	
});
</script>
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
:-ms-input-placeholder {
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
.class {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
}
.subject {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 40px;
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
.pagination {
margin-left:20px;
   
}
.pagination ul {
    display: inline-block;
    *display: inline;
    margin-bottom: 0;
    margin-left: 50px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    *zoom: 1;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
}
.pagination ul > li {
    display: inline;
}
.pagination ul > li:first-child > a, .pagination ul > li:first-child > span {
    border-left-width: 1px;
    -webkit-border-bottom-left-radius: 4px;
    border-bottom-left-radius: 4px;
    -webkit-border-top-left-radius: 4px;
    border-top-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    -moz-border-radius-topleft: 4px;
}
.pagination ul > li > a, .pagination ul > li > span {
    float: left;
    padding: 4px 12px;
    line-height: 20px;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left-width: 0;
}
.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span {
    background-color: #f5f5f5;
}
.pagination ul > .active > a, .pagination ul > .active > span {
    color: #999;
    cursor: default;
}
.table{ width:100%; margin-top:10px;}
.dataTables_filter{ margin-top:-18px; padding:10px;}
</style>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Student")) { 
        return false;
    }
    }
</script> 
<?php
if(isset($_POST['sentmessage']))
{

$dat=date('d-m-Y');
$exam=mysqli_real_escape_string($con, $_POST['exam'] ?? '');
$sub=mysqli_real_escape_string($con, $_POST['subject'] ?? '');
if(isset($_POST['attendance']) && is_array($_POST['attendance']))
{
    foreach($_POST['attendance'] as $k=>$f)
    {
        $k_esc = mysqli_real_escape_string($con, $k);
        $st_class = mysqli_real_escape_string($con, $_POST['student_class'][$k] ?? ($_POST['class'] ?? ''));
        if($f=="absent")
        {
            $search22=mysqli_query($con,"select * from exam_copy_collection where session='".$_SESSION['session']."' and student='$k_esc' and exam='$exam' and subject='$sub' ");
            if(mysqli_num_rows($search22)<1)
            {
                $absent=mysqli_query($con,"insert into exam_copy_collection(student,date,session,class,absent,exam,subject) values('$k_esc','$dat','".$_SESSION['session']."','$st_class','$f','$exam','$sub')");
            }
        }
    }
}
?>
<script type="text/javascript">
alert("Record Save Successfully");
</script>	
<?php	
}
?>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=exam_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/attend.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Copy Collection</h2>

<a href="./?pageid=copy_view" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">View Report</a>

</div>

<div class="col_4">
    <?php $day= date("D");
	if($day!="Sun")
	{
	$chkdate=date("Y-m-d");
	$event=mysqli_query($con,"select * from event_calendar where event_date='$chkdate'");
	$evtnum = mysqli_num_rows($event);
	if($evtnum<1)
	{?>

 <div style="font-size:24px; color:#990000; margin:20px 0px 0px 30px; border:#FF0000 0px solid	"><?php echo date("d-m-Y");  ?></div>
     
  <br>
            <div class="box-head" style="width:1127px"></div>
           
<div style="border: solid #000 0px; width:100%; margin-left:20px; border-radius:5px; margin-top:7px;">
        <form method="post" name="myForm" action="" enctype="multipart/form-data" >
	     <table style="margin:10px 0px 0px 10px; font-size:14px; width:95%">
         <tr>
         <td style="vertical-align:top; padding-right:15px;">
             <b>Class:</b><br/>
             <select name="class" class="class" id="single_class_select" style="width:140px; border-radius:4px; margin-bottom:5px;">
                 <option value="">Select Class</option>
                 <?php
                 $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
                 while($rows=mysqli_fetch_array($res))
                 {
                 ?>
                 <option value="<?php echo htmlspecialchars($rows["class"]); ?>"><?php echo htmlspecialchars($rows["class"]); ?></option>  
                 <?php } ?>
             </select>
             <div style="font-size:11px; color:#555; margin-top:2px;">
                 <a href="javascript:void(0)" onclick="$('#multi_class_panel').toggle();" style="color:#006699; text-decoration:underline;">+ Multi-Class Checkboxes</a>
             </div>
             <div id="multi_class_panel" style="display:none; margin-top:5px; max-height:110px; overflow-y:auto; border:1px solid #ccc; padding:6px; background:#fdfdfd; border-radius:4px; width:180px;">
                 <label style="font-weight:bold; font-size:12px; display:block;"><input type="checkbox" id="check_all_classes" onclick="$('.cls_chk').prop('checked', this.checked);"> Select All</label>
                 <?php
                 $res_mc = mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
                 while($rmc = mysqli_fetch_array($res_mc)) {
                 ?>
                 <label style="display:block; font-size:12px; margin:2px 0;">
                     <input type="checkbox" name="classes[]" class="cls_chk" value="<?php echo htmlspecialchars($rmc['class']); ?>"> <?php echo htmlspecialchars($rmc['class']); ?>
                 </label>
                 <?php } ?>
             </div>
         </td>
		 
	     <td style="vertical-align:top; padding-right:15px;">
             <b>Exam:</b><span class="textfieldRequiredMsg"></span><br/>
             <select name="exam" class="select" style="width:150px; border-radius:4px;" required>
                 <option value="">Select Exam</option>
                 <?php
                 $resexam=mysqli_query($con,"select distinct(examination_name) from examination where examination_session='".$_SESSION["session"]."'");
                 while($rowexam=mysqli_fetch_array($resexam))
                 {
                 ?>
                 <option value="<?php echo htmlspecialchars($rowexam["examination_name"]); ?>"><?php echo htmlspecialchars($rowexam["examination_name"]); ?></option>  
                 <?php } ?>
             </select>
         </td>
		 
        <td style="vertical-align:top; padding-right:15px;">
            <b>Subject:</b><span>*</span><br/>
            <select name="subject" class="subject" style="width:175px; border-radius:4px;" required>
                <option value="">--Select subject--</option>
                <?php
                $res_subj = mysqli_query($con, "SELECT DISTINCT name FROM subjects WHERE session='".$_SESSION["session"]."' ORDER BY name ASC");
                if($res_subj) {
                    while($rsub = mysqli_fetch_assoc($res_subj)) {
                        echo '<option value="'.htmlspecialchars($rsub['name']).'">'.htmlspecialchars($rsub['name']).'</option>';
                    }
                }
                ?>
            </select>
        </td>
	   
        <td style="vertical-align:top; padding-top:18px;">
            <input type="submit" name="search4" value="Search" style="width:90px; height:36px; padding:0;">
        </td>   
		</tr>
        </table>
        <br>
     </form>
		  
		 <div class="table" style="border:#33cc66 2px solid; height:480px; margin-left:10px; width:98%; overflow:scroll;">
         <form method="post" name="myFormSave" action="" enctype="multipart/form-data" >
		<?php
	    if(isset($_POST['search4']))
		{
            $selected_classes = [];
            if (!empty($_POST['classes']) && is_array($_POST['classes'])) {
                foreach ($_POST['classes'] as $cls_item) {
                    if (trim($cls_item) !== '') {
                        $selected_classes[] = mysqli_real_escape_string($con, trim($cls_item));
                    }
                }
            } elseif (!empty($_POST['class'])) {
                $selected_classes[] = mysqli_real_escape_string($con, trim($_POST['class']));
            }

            if (empty($selected_classes)) {
                echo '<div style="padding:15px; color:#c00; font-weight:bold;">Please select at least one class.</div>';
            } else {
                $cls_sql = "student_class IN ('" . implode("','", $selected_classes) . "')";
		?>
	    <table width="100%" border="0" cellspacing="0" cellpadding="6" style="border-collapse:collapse;">
		<tr style="font-weight:bold; background-color:#006633; color:#fff;">
	    <td style="width:40px;">Sr</td>
        <td style="width:80px;">Roll No</td>
		<td style="width:180px;">Name</td>
		<td style="width:180px;">Father Name</td>
		<td style="width:80px;">Class</td>
        <td style="width:70px; text-align:center;">Present</td>
	    <td style="width:70px; text-align:center;">Absent</td>
		<td style="width:140px;">Exam</td>
		<td style="width:140px;">Subject</td>
	    </tr>
<?php
$i=1;
$searcha=mysqli_query($con,"select s.*, r.rno as roll_no_tbl from student s left join roll_no r on (r.sid = s.student_id and r.class = s.student_class and r.ses = '".$_SESSION['session']."') where s.$cls_sql and s.student_session='".$_SESSION['session']."' and s.status='0' order by s.student_class Asc, s.student_name Asc");
while($studrow=mysqli_fetch_array($searcha))
{
$student_id = $studrow['student_id'];
$disp_roll = !empty($studrow['student_rollno']) ? $studrow['student_rollno'] : (!empty($studrow['roll_no_tbl']) ? $studrow['roll_no_tbl'] : '');
	    ?>	
    <tr style="color:#335599; border-bottom:1px solid #eee;">
    <td><?php echo $i; ?></td>
    <td style="font-weight:bold; color:#006699;"><?php echo htmlspecialchars($disp_roll); ?></td>
	<td><?php echo ucwords(htmlspecialchars($studrow['student_name']));?></td>
	<input type="hidden" name="student_class[<?php echo $studrow['student_id'];?>]" value="<?php echo htmlspecialchars($studrow['student_class']);?>">
	<td><?php echo ucwords(htmlspecialchars($studrow['student_fname']));?></td>
	<td><span style="background:#e0f2fe; color:#0369a1; padding:2px 6px; border-radius:3px; font-weight:bold; font-size:12px;"><?php echo htmlspecialchars($studrow['student_class']);?></span></td>
    <td style="text-align:center;"><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="present" checked="checked"></td>
	<td style="text-align:center;"><input type="radio" name="attendance[<?php echo $studrow['student_id'];  ?>]" value="absent" ></td>
	<td><input type="text" name="exam" value="<?php echo htmlspecialchars($_POST['exam']);?>" readonly style="width:130px; background:#f9f9f9;"></td>
	<td><input type="text" name="subject" value="<?php echo htmlspecialchars($_POST['subject']);?>" readonly style="width:130px; background:#f9f9f9;"></td>
	</tr>
    <?php
    $i++;
	}
	?>
	<tr>
	<td colspan="9" style="padding:15px; text-align:right;">
        <input type="hidden" name="class" value="<?php echo htmlspecialchars($_POST['class'] ?? ''); ?>">
        <input type="submit" name="sentmessage" value="Save Record" style="background:#006633; color:#fff; font-size:15px; padding:8px 25px; border-radius:4px; cursor:pointer;">
	</td>
    </tr>
	</table>
	<?php } } ?>
  </form>
     </div>
	<?php
				}
				 else
				   {
				   ?>
				    <div class="success" style="width:250px; height:10px; border-radius:5px" ><b><?php echo "Sorry Today is Holiday";   ?></b></div>
				   <?php
				   }
				}
				else
				 {
				 ?>
				     <div class="success" style="width:250px; height:10px; border-radius:5px" ><b><?php echo "Sorry Today is Sunday";   ?></b></div>
				 <?php
				 }
				 
			
				    ?>
					  
				<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
