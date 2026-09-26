
<?php
  if(isset($_POST['add']))
  {
    if((!empty($_POST['room_no'])) || (!empty($_POST['floor_no'])) || (!empty($_POST['no_of_bed'])) || (!empty($_POST['rent'])))
	{
   
	  $chk=mysqli_query($con,"select * from add_rooms where  room_no='".$_POST['room_no']."' and school='".$_SESSION['uid']."' ");
      
	  if(mysqli_num_rows($chk)<1)
	  {
	 $insert=mysqli_query($con,"insert into add_rooms(hostel_id,room_no,fllor_no,No_of_bed,rent,school) values('".$_POST['name']."','".$_POST['room_no']."','".$_POST['floor_no']."','".$_POST['no_of_bed']."','".$_POST['rent']."','".$_SESSION['uid']."')");
    $msg="Inserted Successfully"; 
          }
	     else
		    {
			     $msg="Room Akready Exist"; 
			}
     }
	else
	   {
	     $error="Field Marked with * are mandatory";
	   }
	
	   }
	   
	   if(!empty($_GET['id']))
	   {
	    $selroom=mysqli_query($con,"select * from add_rooms where room_id='".$_GET['id']."' ");
	    $row_sel=mysqli_fetch_array($selroom); 
	   }
    
	 if(isset($_POST['Update']))
	 {
	  $chk=mysqli_query($con,"select * from add_rooms where  room_no='".$_POST['room_no']."' and school='".$_SESSION['uid']."' ");
   
	  if(mysqli_num_rows($chk)<1)
	  {
	   $upd_query=mysqli_query($con,"update add_rooms set hostel_id='".$_POST['name']."',room_no='".$_POST['room_no']."',fllor_no='".$_POST['floor_no']."',No_of_bed='".$_POST['no_of_bed']."',rent='".$_POST['rent']."' where room_id='".$_POST['room_id']."' "); 
	 
	  $msg="Updated Successfully";
	 }
	  
	   else
		    {
			     $msg="Room Akready Exist"; 
			} 
	
	 }
	 
  
  ?>

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
<?php
if(!empty($_GET['did']))
{
$del_rout=mysqli_query($con,"delete from examination where examination_id='".$_GET['did']."' and school='".$_SESSION['uid']."' and  examination_session='".$_SESSION['session']."'");
$msg="Deleted Successfully";
}
?>




<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Room")) { 
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
<div class="left_sect"><img src="images/Hostel/Hostel.png" /><a href="./?pageid=hostel_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/icon-hostel.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
 <a href="./?pageid=hostel_home" style="text-decoration:none">Hostel</a> ->Add Rooms</a></h2>
 
</div>
<div class="col_4" style="margin-top:0px;">

<?php
 if(!empty($error))
 {
?>
<div class="error" style="width:300px"><?php echo $error; ?></div>
<?php
}
?>
<?php
 if(!empty($msg))
 {
?>
<div class="success" style="width:200px"><?php echo $msg; ?></div>
<?php
}
?>    
            
<form action="" method="post">
 <a style="float:right" href="<?php echo $var."add_rooms1";   ?>">Go Back</a>
<?php
if(empty($_GET['id']))
{
?>

<table cellspacing="10">
<?php
   $hostel=mysqli_query($con,"select * from add_hostel where school='".$_SESSION['uid']."'");
  
?>

<tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><select name="name" class="select" style="width:220px;">
    <option value="-1">Select Hostel</option>
  <?php
     while($room_hostel=mysqli_fetch_array($hostel))
	 {
  ?>
   <option value="<?php echo $room_hostel['id'];  ?>"><?php echo $room_hostel['host_name'];  ?></option>
  <?php
  }
  ?>
   </select></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Room No:<label style="color:#FF0000">*</label></td>
<td><input type="text" name="room_no" class="tb5" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Floor No:<label style="color:#FF0000">*</label></td>
<td><input type="text" name="floor_no" class="tb5" /></td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
<td>No Of Bed :<label style="color:#FF0000">*</label> </td>
<td><input type="text" name="no_of_bed" class="tb5" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
<td>Rent :<label style="color:#FF0000">*</label></td>
<td><input type="text"  name="rent" class="tb5" /></td>
</tr>


<tr>
<td></td><td><input type="submit" name="add" value="submit"></td>
</tr>
</table>
<?php
}
else
  {
  ?>
  <table cellspacing="10">
<?php
   $hostel=mysqli_query($con,"select * from add_hostel");
  
?>

<tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><select name="name" class="select">
    <option value="-1">Select Hostel</option>
  <?php
     while($room_hostel=mysqli_fetch_array($hostel))
	 {
  ?>
   <option value="<?php echo $room_hostel['id'];  ?>" <?php if($row_sel['hostel_id']==$room_hostel['id']) {?> selected="selected" <?php } ?> ><?php echo $room_hostel['host_name'];  ?></option>
  <?php
  }
  ?>
   </select></td>
</tr>

<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Floor No:<label style="color:#FF0000">*</label></td>
<td><input type="text" name="floor_no" class="tb5"  value="<?php echo $row_sel['fllor_no']; ?>" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Room No:<label style="color:#FF0000">*</label></td>
<td><input type="text" name="room_no" class="tb5" value="<?php echo $row_sel['room_no'];  ?>" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
<td>No Of Bed :<label style="color:#FF0000">*</label> </td>
<td><input type="text" name="no_of_bed" class="tb5" value="<?php echo $row_sel['No_of_bed']; ?>" /></td>
</tr>
<tr>
  <td><input type="hidden" name="room_id" value="<?php echo $row_sel['room_id']; ?>"></td>
  <td>&nbsp;</td>
</tr>

<tr>
<td>Rent :<label style="color:#FF0000">*</label></td>
<td><input type="text"  name="rent" class="tb5" value="<?php echo $row_sel['rent']; ?>" /></td>
</tr>


<tr>
<td></td><td><input type="submit" name="Update" value="Update"></td>
</tr>
</table>
  
  <?php
  }
?>



</form>
              
     
					
				</div>
			
 
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>