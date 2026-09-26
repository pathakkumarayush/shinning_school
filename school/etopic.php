<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert( "Please Select Class" );
     return false;
   }
   else
   {
	 return true; 
	}
}
</script>
<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      //-->
</SCRIPT>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 

<script>
jQuery(function($){
  $('#date_from').datepicker({ dateFormat: 'dd-mm-yy' });
  $('#date_to').datepicker({ dateFormat: 'dd-mm-yy' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
<?php
if(isset($_POST['update']))
{
$res_up=mysqli_query($con,"update add_topic set class_id='".$_POST["class"]."',subject_id='".$_POST["subject"]."',chapter_id='".$_POST["capid"]."',topic='".$_POST["topic"]."',day='".$_POST["day"]."',tdec='".$_POST["tdec"]."',rmk='".$_POST["rmk"]."',sdate='".$_POST['date_from']."',edate='".$_POST['date_to']."' where id='".$_GET["eid"]."' ");
  
 $msg="Update Successfully";
}
		
	 
	 


if(!empty($_GET['nid']))
 {
	 $upd=mysqli_query($con,"update add_topic set status='Active' where id='".$_GET['nid']."'");
	  $msg="Active Successfully";
}

if(!empty($_GET['aid']))
 {
	 $upd=mysqli_query($con,"update add_topic set status='Ictive' where id='".$_GET['aid']."'");
	  $msg="Active Successfully";
}
  
   
    if(!empty($_GET['did']))
	  {
	    $delete=mysqli_query($con,"delete from add_topic where id='".$_GET['did']."'");
	    $msg="Deleted Successfully";
	  }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this topic")) { 
        return false;
    }
    
} 
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
    padding:7px;
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
	<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/aeh.png" /><a href="./?pageid=home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teachers Dairy </h2>

<!--<a href="./?pageid=ctopic" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Search Classwise</a>-->
</div>
<div class="col_4" style="margin-top:0px;" >			
				

<script type="text/javascript" src="jquery-1.4.1.min.js"></script>
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
			url: "get_sub.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".subject").html(html);
			} 
		});
	});
	
	
	$(".subject").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_chapter.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".chapter").html(html);
			} 
		});
	});
	
});
</script>
                     
               
  <form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());">
   <?php
   if(!empty($errormsg))
   { ?>
	
    <div class="error" style="width:250px; height:10px; margin-left:20px"><?php echo $errormsg; ?></div>
   <?php
   }
?>
<?php
   if(!empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:20px"><?php echo $msg;?></div>
   <?php
   }
  ?>
  <?php
   $class=mysqli_query($con,"select * from add_topic where id='".$_GET['eid']."' and session='".$_SESSION['session']."'"); 
   $rowc=mysqli_fetch_array($class);
  ?>
	<table style="margin:40px 0px 0px 15px">
    <tr>
       <td>Select Class</td>
       <td>
	   <select name="class" class="class" style="width:175px">
       <option value="-1">Select Class</option>
       <?php
	   $result = mysqli_query($con,"SELECT * FROM class where school='".$_SESSION["uid"]."' ") 
	    or die(mysqli_error());

	    while($tier = mysqli_fetch_array( $result)) 
		{
		?>
        <option value="<?php echo $tier["class"]; ?>" <?php if($tier["class"]==$rowc["class_id"] ) { ?> selected="selected" <?php }?>> <?php echo $tier["class"]; ?></option>
		   
        <?php
		}
		
		?>
        </select>
       </td>
       </tr>
       <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       </tr>
       <tr><td><label>Select Subject :</label></td>
	  
       <td>
	   <select name="subject" class="subject" style="width:175px">
       <option value="-1">Select Class</option>
       <?php
	    $subq = mysqli_query($con,"SELECT * FROM subjects where class='".$rowc["class_id"]."' and session='".$_SESSION["session"]."'") 
	    or die(mysqli_error());

	    while($subr = mysqli_fetch_array($subq)) 
		{
		?>
        <option value="<?php echo $subr["name"]; ?>" <?php if($subr["name"]==$rowc["subject_id"] ) { ?> selected="selected" <?php }?>> <?php echo $subr["name"]; ?></option>
		   
        <?php
		}
		
		?>
        </select>
       </td>
	  
       </tr>
       <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       </tr>
       <tr><td><label>Chapter Name:</label></td>
       <td>
	   <input type="text" name="capid" value="<?php echo $rowc['chapter_id']; ?>"  required/>
       </td>
       </tr>
       <tr>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       </tr>




 <tr>
   <td>Add Topic<span style="color:#F00">*</span></td>
   <td><input type="text" name="topic" id="sub_nam" class="tb5" style="width:175px" value="<?php echo $rowc['topic']; ?>" required></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>Topic Desc.<span style="color:#F00"></span></td>
   <td><textarea name="tdec" cols="22" rows="15"><?php echo $rowc['tdec']; ?></textarea></td>
</tr>

<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
   <td>Period<span style="color:#F00">*</span></td>
   <td>
   <select name="day" style="width:175px"  class="select" required>
   <option value="">Select Period</option>
  <option value="Period-1" <?php if($rowc['day']=="Period-1") { ?> selected="selected" <?php }  ?> >Period-1</option>
   <option value="Period-2" <?php if($rowc['day']=="Period-2") { ?> selected="selected" <?php }  ?> >Period-2</option>
   <option value="Period-3" <?php if($rowc['day']=="Period-3") { ?> selected="selected" <?php }  ?> >Period-3</option>
   <option value="Period-4" <?php if($rowc['day']=="Period-4") { ?> selected="selected" <?php }  ?> >Period-4</option>
   <option value="Period-5" <?php if($rowc['day']=="Period-5") { ?> selected="selected" <?php }  ?> >Period-5</option>
   <option value="Period-6" <?php if($rowc['day']=="Period-6") { ?> selected="selected" <?php }  ?> >Period-6</option>
   <option value="Period-7" <?php if($rowc['day']=="Period-7") { ?> selected="selected" <?php }  ?> >Period-7</option>
   <option value="Period-8" <?php if($rowc['day']=="Period-8") { ?> selected="selected" <?php }  ?> >Period-8</option>

   </select>
   </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>Start Date<span style="color:#F00">*</span></td>
   <td><input type="text" name="date_from" placeholder="dd-m-yy" readonly id="date_from" value="<?php echo $rowc['sdate']; ?>" style=" width:175px;" class="tb5" required></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>End Date<span style="color:#F00"></span></td>
   <td><input type="text" name="date_to" readonly placeholder="dd-m-yy" id="date_to" value="<?php echo $rowc['edate']; ?>" style="width:175px;" class="tb5"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>



 <tr>
   <td>Remarks<span style="color:#F00"></span></td>
   <td><textarea name="rmk" cols="22" rows="15"><?php echo $rowc['rmk']; ?></textarea></td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="update" value="submit" style="width:80px; font-weight:bold"></td>
</tr>


</table>
  
		
		  
                   </form>
                  
				<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  