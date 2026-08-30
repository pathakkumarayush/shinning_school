<style>
.tb1{ width:170px; height:20px;}
</style>

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
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=exam_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">
<a href="./?pageid=exam_home">Examination</a> >>Combine Exam</a> </h2>
</div>
<div class="col_4" style="margin-top:0px;" >	

<div style="width:1000px; margin: auto; ">

 
 
<div style="width:100%; margin-top:20px; margin-left:10px;">
<?php
 if(!empty($msg))
 {
?>
<div class="success" style="width:200px"><?php echo $msg; ?></div>
<?php
}
?>              
<form method="post">
<table style="font-size:16px; width:400px;">
<tr>
<td>School</td>
<td><input type="text" name="school" value="<?php echo $_SESSION['uid']; ?>" class="tb1" readonly></td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr>
<td>Term</td>
<td>
<select name="exam" class="select" style="width:190px;">
<option value='0'>--select--</option>
<?php
$qs=mysqli_query($con,"select examination_id,examination_name from examinationa where examination_session='".$_SESSION['session']."'");
 while($row=mysqli_fetch_row($qs))
 {
  ?>
 <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
 <?php }?>
</select>
</td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr>
<td>Exam</td>
<td>
<select name="sub_term" class="select" style="width:190px;">
<option value='0'>--select--</option>

<?php
$qs=mysqli_query($con,"select examination_id,examination_name from examination where examination_session='".$_SESSION['session']."'");
 while($row=mysqli_fetch_row($qs))
 {
 ?>
 <option value="<?php echo $row[1]; ?>"><?php echo $row[1]; ?></option>
 <?php }?>
</select>
</td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr>
<td>Session</td>
<td><input type="text" name="session" value="<?php echo $_SESSION['session']; ?>" class="tb1" readonly></td>
</tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr><td></td><td></td></tr>
<tr>
<td></td>
<td>
<input type="submit" name="s1" />
</td>
</tr>
</table>
</form>
<div class="box-head">
						<h2 class="left">Currently Available Combine Exams in <?php echo $_SESSION['session'];  ?></h2>
						
					</div>
<div class="table" style="border:#FF0000 0px solid; height:400px; overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr bgcolor="#fff">
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Sr.No</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Term Name</b></td>
	<td height="30" align="center "  bgcolor="#6699FF" ><b style="color:#000">Exam Name</b></td>
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Session</b></td>
    <td align="center "  bgcolor="#6699FF" ><b style="color:#000">school</b></td>
   
	 <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Delete</b></td>
    <!-- <td align="center "  bgcolor="#6699FF" ><b style="color:#000">Update</b></td> -->
</tr>
      <?php $i=1;
       $exa=mysqli_query($con,"select * from terms where school='".$_SESSION["uid"]."' and session='".$_SESSION['session']."'");
	   
       while($exa1=mysqli_fetch_array($exa))
       {
	   $ide = $exa1["term"];
		?>
		<?php
		$ex=mysqli_query($con,"select * from examinationa where examination_id='$ide' and school='".$_SESSION["uid"]."' and examination_session ='".$_SESSION['session']."'");
		$r=mysqli_fetch_array($ex);
		$t= $r["examination_name"];
		?>
		<tr>
        <td height="30" align="center "><?php echo $i; ?></td>
		<td height="30" align="center "><?php echo  $t; ?></td>
		<td height="30" align="center "><?php echo $exa1["sub_term"]; ?></td>
        <td align="center "><?php echo $exa1["session"]; ?></td>
        <td align="center "><?php echo $exa1["school"]; ?></td>
       
		 <td align="center ">
		 <a onClick="return confirmation();"  style="text-decoration:none;" href="./?pageid=combine_exam&did=<?php echo $exa1["id"]; ?>">Delete<?php echo $exa1["id"]; ?></a>
		 </td>
        <!--<td align="center "><a style="text-decoration:none;" href="./?pageid=examination1&examinationid=<?php //echo $exa1["examination_id"]; ?>">Update</a></td>-->
        </tr>
        <?php $i=$i+1; $j=&$i;  ?>
		<?php 
		
		} ?>
        
</table>
         </div>
</div>
<?php 
if(isset($_POST['s1']))
{
$id=$_POST['exam'];
$sub_term=$_POST['sub_term'];

if(mysqli_query($con,"insert into terms (term,sub_term,school,session) values('$id','$sub_term','".$_SESSION['uid']."','".$_SESSION['session']."')"))
{
$msg="Inserted Successfully";
}
else
{
echo "not inserted";
}
}
?>
</div>


</div>
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
