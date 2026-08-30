<?php
   if(!empty($_GET['did']))
   {
     $upd=mysqli_query($con,"delete from add_hostel where  id='".$_GET['did']."' ");
     $msg="Deleted Successfully";
   
   }
   
?>
<?php
  if(isset($_POST['add']))
  {
    if(!empty($_POST['name']))
	{
	  $chk=mysqli_query($con,"select * from add_hostel where host_name='".$_POST['name']."' and school='".$_SESSION['uid']."' ");
      if(mysqli_num_rows($chk)<1)
	  {
	 $insert=mysqli_query($con,"insert into add_hostel(host_name,host_typ,host_info,school) values('".$_POST['name']."','".$_POST['host_typ']."','".$_POST['oth_info']."','".$_SESSION['uid']."')");
    $msg="Inserted Successfully"; 
          }
	     else
		    {
			     $msg="Hostel Akready Exist"; 
			}
	}
	else
	   {
	     $error="Field Marked with * are mandatory";
	   }
	   }
	   
	   if(!empty($_GET['id']))
	   {
	    $selhost=mysqli_query($con,"select * from add_hostel where id='".$_GET['id']."' ");
	    $row_sel=mysqli_fetch_array($selhost); 
	   }
    
	 if(isset($_POST['Update']))
	 {
	   $chk=mysqli_query($con,"select * from add_hostel where host_name='".$_POST['name']."' and school='".$_SESSION['uid']."' ");
      if(mysqli_num_rows($chk)<1)
	  {
	   $upd_query=mysqli_query($con,"update add_hostel set host_name='".$_POST['name']."',host_typ='".$_POST['host_typ']."',host_info='".$_POST['oth_info']."' where id='".$_POST['host_id']."' "); 
	  
	  $msg="Updated Successfully";
	 }
	  
	   else
		    {
			     $msg="Hostel Akready Exist"; 
			} 
	
	 }
	 
  
  ?>
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
<?php
if(!empty($_GET['did']))
{
$del_rout=mysqli_query($con,"delete from examination where examination_id='".$_GET['did']."' and school='".$_SESSION['uid']."' and  examination_session='".$_SESSION['session']."'");
$msg="Deleted Successfully";
}
?>




<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Hostel")) { 
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
 <a href="./?pageid=hostel_home" style="text-decoration:none">Hostel</a> ->Add Hostel</a></h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:600px;" >
                
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
<?php
if(empty($_GET['id']))
{
?>
<table cellspacing="10">


<tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><input type="text" name="name" class="tb5" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Hostel Type:</td>
<td><select name="host_typ" class="select" style="width:220px;">
   <option value="common">Common</option>
   <option value="Gents">Gents</option>
  <option value="Ladies">Ladies</option>
   </select>
</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
<td>Other Information :<label style="color:#FF0000">*</label> <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp; </td>
<td><textarea name="oth_info" cols="30" rows="5"></textarea></td>
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


<tr>
<td>Hostel Name :<label style="color:#FF0000">*</label> </td>
<td><input type="text" name="name" class="tb5"  value="<?php echo $row_sel['host_name'];  ?>"/></td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
<td>Hostel Type:</td>
<td><select name="host_typ" class="select">
   <option value="common" <?php if( $row_sel['host_typ']=="common") {  ?> selected="selected" <?php } ?> >Common</option>
   <option value="Gents" <?php if( $row_sel['host_typ']=="Gents") {  ?> selected="selected" <?php } ?>>Gents</option>
  <option value="Ladies" <?php if( $row_sel['Ladies']=="Gents") {  ?> selected="selected" <?php } ?>>Ladies</option>
   </select>
</td>
</tr>
<tr>
  <td><input type="hidden" name="host_id" value="<?php echo $row_sel['id'];  ?>"></td>
  <td>&nbsp;</td>
</tr>

<tr>
<td>Other Information :<label style="color:#FF0000">*</label> <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp; </td>
<td><textarea name="oth_info" cols="30" rows="5"><?php echo $row_sel['host_info'];   ?></textarea></td>
</tr>


<tr>
<td></td><td><input type="submit" name="Update" value="Update"></td>
</tr>
</table>
  
  <?php
  }
?>



</form>
              <div class="box-head">
						<h2 class="left">Currently Available Hostel</h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr bgcolor="#fff">
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Sr.No</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Hostel Name</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Hostel Type</b></td>
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Hostel Information</b></td>
	<td align="center "  bgcolor="#6699FF" ><b style="color:#000">Update</b></td>
	<td align="center "  bgcolor="#6699FF" ><b style="color:#000">Delete</b></td>
        
		<!-- <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Update</b></td> -->
</tr>
<?php $i=1;
$exa=mysqli_query($con,"select * from add_hostel where school='".$_SESSION["uid"]."'");

while($hostel=mysqli_fetch_array($exa))
{
		
		?>
		
		<tr <?php if($j%2==1) {?>  bgcolor="#E0FADC"<?php } ?>>
        <td height="30" align="center "><?php echo $i; ?></td>
		<td height="30" align="center "><?php echo $hostel["host_name"]; ?></td>
        <td align="center "><?php echo $hostel["host_typ"]; ?></td>
        <td align="center "><?php echo $hostel["host_info"]; ?></td>
		<td align="center "><a href="<?php echo $var."add_hostel&id=".$hostel["id"];   ?>">Update</a></td>
		<td align="center "><a href="<?php echo $var."add_hostel&did=".$hostel["id"];   ?>" onclick="confirmation();">Delete</a></td>
                
				 <!--<td align="center "><a style="text-decoration:none;" href="./?pageid=examination1&examinationid=<?php //echo $exa1["examination_id"]; ?>">Update</a></td>-->
        </tr>
        <?php $i=$i+1; $j=&$i;  ?>
		<?php 
		
		} ?>
        
</table>
                
				
						<!-- End Box -->
			</div>
 
<br clear="all" />
</div>
<br clear="all" />
<br clear="all" />
</div>
</div>