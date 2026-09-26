<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
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
			url: "get_std.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$(".student").html(html);
			} 
		});
	});	
});
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:2px; float:left; margin-top:10px;}
.col_4{ width:99%; height:650px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
    font-style: normal;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"] {
    padding: 5px;
    border: solid 5px #c9c9c9;
    box-shadow: inset 0 0 0 1px #707070;
    transition: box-shadow 0.3s, border 0.3s;
    height: 20px;
}
input[type="date"] {
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
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
     background: #1e4a1b;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #1e4a1b;
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
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Enquiry")) { 
        return false;
    }
    }
</script> 

<?php
              if(!empty($_GET['did']))
              {
              $d=date("Y-m-d");
              $query=mysqli_query($con,"delete from enquiry where id='".$_GET['did']."' ");	 
              }
			  ?>
			  
<?php
date_default_timezone_set('Asia/Kolkata');  
if(isset($_POST['submit']))
{
$da = date("d-m-Y");
$query=mysqli_query($con,"insert into student_complaint(complaint_by,teacher,class,student,title,category,description,date,session)
values('".$_POST['complaint_by']."','".$_POST['teacher']."','".$_POST['class']."','".$_POST['student']."','".$_POST['title']."','".$_POST['category']."','".$_POST['description']."','".$_POST['date']."','".$_SESSION['session']."') ");
$msg1="Inserted Successfully";
?>
                <script>
		        alert('Complaint Successfully Save');
                window.location.href='https://smarterponline.com/shining/school/?pageid=complaint';
                </script>

<?php
}
?>	

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/frontdesk/front desk home.png" /><a href="./?pageid=view_complaint">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:50px; height:42px; margin-left:5px; margin-top:1px;"/>
<h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;"> Teacher Parent Complaints Form</h2>
<a href="./?pageid=view_complaint" style="color:#FFFFFF;float:right; margin-left:0px; background-color: #CC0000; margin-top:-20px; padding:6px; font-size:18px">Complaint Details </a>
</div>
<div class="col_4">
<div class="form-style-2-heading" style="background-color:#006633; color:#FFFFFF; font-style:normal;">Fill in the following fields</div>
<form method="post" name="myForm" action="#" enctype="multipart/form-data" style="font-weight:bold;"  onsubmit="return(validate());">
    <table border="0" style="margin:40px 0px 0px 5px">
    <tr>
    <td>Complaints By<span style="color:#FF0000">*</span></td>
    <td>
	  <select name="complaint_by"  class="select" style="width:219px;" required>
      <option value="">Select Any One</option>
      <option>Admin</option>
      <option>Class Teacher</option>
	  <option>Subject Teacher</option>
      <option>Parents</option>
      </select>
	</td>
	</tr>
	<tr> <td>&nbsp;</td><td>&nbsp;</td></tr>
	<tr>
	 <td>Teacher<span style="color:#FF0000">*</span></td>
	 <td>
	 <?php
     $techsql=mysqli_query($con,"select uid,teacher_name from teacher where status='Active' and staff_typ='teaching'");
     ?>
	  <select name="teacher"  class="select" style="width:219px;" required>
      <option value="">Select teacher</option>
       <?php
	   while($rowtech=mysqli_fetch_array($techsql))
	   {
	   ?>
       <option value="<?php echo $rowtech['uid']; ?>"  ><?php echo $rowtech['teacher_name']; ?></option>
       <?php
		}
	   ?>
      </select>
	  </td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr>
     <td>Class<span style="color:#FF0000">*</span></td>
     <td>
	 <select name="class" class="class select" style="width:219px;" required>
     <option value="">Select Class</option>
     <?php
     $res=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION["uid"]."'");
     while($rows=mysqli_fetch_array($res))
     {
     ?>
     <option value="<?php echo $rows["class"];  ?>"><?php echo $rows["class"]; ?></option>  
     <?PHP
	 } 
     ?>
     </select>
	 </td>
     </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td></tr>
     <tr>
     <td>Student<span style="color:#FF0000">*</span></td>
     <td>
       <select name="student" class="student select" style="width:219px;">
       <option selected="selected">--Select student--</option>
       </select>
    </td>
    </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td></tr>
     <tr>
	 <td>Complaint Title<span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="title" class="tb5" required></td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td></tr>
     <tr>
	 <td>Complaint Category<span style="color:#FF0000">*</span></td>
	 <td>
	   <select name="category" style="width:219px;" class="select" required>
       <option value="">Select a category</option>
       <option value="academic">Academic</option>
       <option value="administrative">Administrative</option>
       <option value="facilities">Facilities & Campus Services</option>
       <option value="financial">Financial</option>
       <option value="harassment">Harassment or Discrimination</option>
       <option value="other">Other</option>
       </select>
	  </td>
	 </tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td></tr> 
	 <tr>
	 <td>Description</td>
     <td><textarea name="description" cols="23" rows="2"></textarea></td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr>
	 <td>DATE</td>
     <td><input type="date" name="date" class="tb5"></td>
	 </tr>
     <tr><td>&nbsp;</td><td>&nbsp;</td></tr> 
	 <tr>
	 <td></td>
	 <td><input type="submit" name="submit" value="Save Record"></td>
	 </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	   
     </table>
    </form>

</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

 