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

input[type="text"],input[type="email"],input[type="date"],input[type="number"] {
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
	border-radius:4px;
	width:221px;
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
</style>

<?php
if(isset($_POST['submit']))
{

$sdate = $_POST['sdate'];

$sd = date("Y-m-d", strtotime($sdate));

$edate = $_POST['edate'];

$ed = date("Y-m-d", strtotime($edate));

$query=mysqli_query($con,"insert into tasks(admin_id,staff_id,title,description,start_date,end_date,session)
values('admin','".$_POST['uid']."','".$_POST['title']."','".$_POST['decs']."','$sd','$ed','".$_SESSION['session']."')");
?>
       
		 
		        <script>
		        alert('Assign task successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=task_view';
                </script>
<?php		 
}
?>


<?php
   if(!empty($_GET['uid']))
   {
   $teacher=mysqli_query($con,"select * from teacher where teacher_id='".$_GET['uid']."' and teacher_session='".$_SESSION['session']."'");
   
   $rowteacher=mysqli_fetch_array($teacher);
   }

?>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="../school/images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Assign Teacher task </h2>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">

</div>
<?php 
	            if(!empty($error_msg))
		        {
			    ?>
                <div class="error" style="width:758px;"> 
		        <?php echo $error_msg; ?> 
		        </div>
                <?php
                }
	            ?>
                <?php 
	            if(!empty($_GET['sumsg']))
		        {
		        ?>
                <div class="success" style="width:758px;"> 
		        <?php echo $_GET['sumsg']; ?> 
		        </div>
                <?php
                }
	            ?>
	            <?php 
	            if(!empty($msg))
		        {
		        ?>
                <div class="success" style="width:758px;">  
		        <?php echo $msg; ?> 
		        </div>
                <?php
                }
	            ?>
<form method="post" action="#" enctype="multipart/form-data">	          
<div style="width:1200px;">
<div style="width:70%; float:left;">
<table border="0"  >
<tr class="table" >
<td>Employee type </td>
<td><select name="typ" class="select">
<option>Staff Type</option>
<option value="teaching" <?php if($rowteacher['staff_typ']=="teaching") { ?> selected="selected" <?php }  ?> >Teaching</option>
<option value="nonteaching" <?php if($rowteacher['staff_typ']=="nonteaching") { ?> selected="selected"<?php } ?> >Non-teaching</option>
<option value="grd" <?php if($rowteacher['staff_typ']=="grd") { ?> selected="selected"<?php } ?> >Group D</option>
</select>
</td>
</tr>
</tr>
<tr class="table" >
<td>Employee Name<span style="color:#FF0000">*</span> </td>
<td><input name="txtname" type="text" value="<?php echo $rowteacher['teacher_name'];   ?>" id="txtname" size="40" class="tb5" />
     <input name="uid" type="hidden" value="<?php echo $rowteacher['uid']; ?>" id="txtname" size="40" class="tb5" />
</td>
</tr>

<tr class="table" >
<td>Task Title<span style="color:#FF0000">*</span> </td>
<td><input name="title" type="text" class="tb5" required/></td>
</tr>


<tr class="table" >
<td>Start Date<span style="color:#FF0000">*</span></td>
<td><input type="date" id="start-date" name="sdate" class="tb5" required/>
</td>
</tr>

<tr class="table" >
<td>End Date<span style="color:#FF0000">*</span></td>
<td><input type="date" id="end-date" name="edate" class="tb5" required />
</td>
</tr>

<tr class="table">
<td>Description<br>&nbsp;<br>&nbsp;</td>
<td><textarea name="decs" cols="30" rows="3"></textarea></td>
</tr>

<tr class="table" >
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Assign Task" /></td>
</tr>
</table> 
</div>

</div>

</form>
</div>

              <br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  