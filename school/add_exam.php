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

<?php
if(isset($_POST["addexamination"]))
{
	 if(empty($_POST['ename']))
	   {
	    $error="Field marked with * are mandatory";
	  }
	
	$m=$_POST["month"];
	$y=$_POST["year"];
	$d=$m.$y;
	$result=mysqli_query($con,"select * from examination where examination_name='".$_POST["ename"]."' and examination_session='".$_POST["esession"]."' and examination_date='$d' ")or die(mysqli_error());
	if($row=mysqli_fetch_array($result))
	{
		?>
        <script type="text/javascript">
		alert("This examination is already exists");
		</script>
        <?php
	}
	else
	{
		if(empty($error))
		{
	mysqli_query($con,"insert into examination(examination_name,examination_session,examination_date,school) values('".$_POST['ename']."','".$_POST['esession']."','$d','".$_SESSION['uid']."')");
	
	
		$msg="Inserted Successfully";
		}
	?>

<?php	} } ?>
<?php
   if(!empty($_GET['id']))
   {
     $upd=mysqli_query($con,"select * from examination where examination_id='".$_GET['id']."' and examination_session='".$_SESSION['session']."'");
     $row_exam=mysqli_fetch_array($upd);
   
   }
   
   if(isset($_POST['Update']))
   {
   $udrec=mysqli_query($con,"update examination set examination_name='".$_POST['ename']."',status='".$_POST['status']."' where examination_id='".$_GET['id']."'");
   $msg="Updated Successfully";
   }

?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Exam")) { 
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
<div class="left_sect"><img src="images/Examination/exa.png" />


<?php 
if($_SESSION['userid']=='school')
{ 
?>
	<a href="./?pageid=exam_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a>

<?php }else { ?>	
		<a href="./?pageid=exam_home"><img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a>
<?php } ?>		


</div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Exam </h2>
</div>
<div class="col_4" style="margin-top:0px;" >	
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
<td>School : </td>
<td><input type="text" name="eschool" value="<?php echo $_SESSION['uid']; ?>" class="tb5" readonly></td>
</tr>
<tr>
<td>Examination Name :<label style="color:#FF0000">*</label> </td>
<td><input type="text" name="ename" class="tb5" /></td>
</tr>
<tr>
<td>Session : </td>
<td><select name="esession" class="select">
            
		     <option>2024-2025</option>
             <option>2025-2026</option>
             <option>2026-2027</option>
             <option>2027-2028</option>
             <option>2028-2029</option>
             <option>2029-2030</option>
           </select></td>
</tr>
<tr>
<td>Examination Date : </td>
<td><select name="month" class="select">
             <option>Jan</option>
             <option>Feb</option>
             <option>Mar</option>
             <option>Apr</option>
             <option>May</option>
             <option>Jun</option>
             <option>Jul</option>
             <option>Aug</option>
             <option>Sep</option>
             <option>Oct</option>
             <option>Nov</option>
             <option>Dec</option>
           </select>
           <select name="year" class="select">
          
           
             <option>2024</option>
             <option>2025</option>
             <option>2026</option>
             <option>2027</option>
             <option>2028</option>
             <option>2029</option>
             <option>2030</option>
        </select>
           </td>
</tr>
<tr>
<td></td><td><input type="submit" name="addexamination"></td>
</tr>
</table>
<?php
}
else
  {
  ?>
<table cellspacing="10">
<tr>
<td>Examination Name :<label style="color:#FF0000">*</label> </td>
<td><input type="text" name="ename" class="tb5" value="<?php echo $row_exam['examination_name'];  ?>" /></td>
</tr>
<tr>
<td>Status</td>
<td><select name="status" class="select">
<option value="Active" <?php if($row_exam['status']=="Active") { ?> selected="selected" <?php }  ?> >Active</option>
<option value="Inactive" <?php if($row_exam['status']=="Inactive") { ?> selected="selected"<?php } ?> >Inactive</option>
</select>

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
						<h2 class="left">Currently Available Exams in <?php echo $_SESSION['session'];  ?></h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:400px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr bgcolor="#fff">
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Sr.No</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Examination Name</b></td>
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Session</b></td>
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Date</b></td>
	 <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Status</b></td>
     <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Edit</b></td>
   
	 <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Delete</b></td>
    <!-- <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Update</b></td> -->
</tr>
<?php $i=1;
$exa=mysqli_query($con,"select * from examination where school='".$_SESSION["uid"]."' and examination_session='".$_SESSION['session']."'");
while($exa1=mysqli_fetch_array($exa))
{
		
		?>
		
		<tr <?php if($j%2==1) {?>  bgcolor="#E0FADC"<?php } ?>>
        <td height="30" align="center "><?php echo $i; ?></td>
		<td height="30" align="center "><?php echo $rows["class"]."&nbsp;".$exa1["examination_name"]; ?></td>
        <td align="center "><?php echo $exa1["examination_session"]; ?></td>
        <td align="center "><?php echo $exa1["examination_date"]; ?></td>
		<td align="center "><?php echo $exa1["status"]; ?></td>
         <td align="center "><a style="text-decoration:none;" href="./?pageid=add_exam&id=<?php echo $exa1["examination_id"]; ?>">Edit</a></td>
	    
		 <td align="center "><a onClick="return confirmation();"  style="text-decoration:none;" href="./?pageid=add_exam&did=<?php echo $exa1["examination_id"]; ?>">Delete</a></td>
        <!--<td align="center "><a style="text-decoration:none;" href="./?pageid=examination1&examinationid=<?php //echo $exa1["examination_id"]; ?>">Update</a></td>-->
        </tr>
        <?php $i=$i+1; $j=&$i;  ?>
		<?php 
		
		} ?>
        
</table>
         </div>
					
			
			
    
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
