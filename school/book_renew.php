
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
<div class="left_sect"><img src="images/Library/libraryhome.png" /><a href="./?pageid=library_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Renew Book Here</h2>
</div>
<div class="col_4" style="margin-top:0px;" >
<br />

	
	
	
<?php
if(isset($_GET['book']))
{
echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > Book has been renewed </div>";
}
?>



<?php
	$bnm=$_GET["bno"];
	require_once("../db.php");
	$qry="select * from issuebook where bookno='".$_GET['bno']."' ";
	$result=mysqli_query($con,$qry);
    $row=mysqli_fetch_array($result);
	
	?>
	 <div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size: 18px; color:#FF0000;" > 
	   <p>Due date has been exceeded.please collect fine amount </p>
	   <p>&nbsp;</p>
	 </div>
	 
   <form method="post" action="">
   <table width="898" border="0"   >
   <tr class="table" >
    <td width="235">&nbsp;</td>
    <td width="218">Enter fine amount </td>
    <td width="423"><input class="tb5" type="text" name="fam"  /></td>
    </tr>
    <tr class="table" >
    <td>&nbsp;</td>
    <td>Book no. </td>
    <td><input class="tb5" type="text" name="bnm" value="<?php echo $row["bookno"] ?>" readonly="" /></td>
    </tr>
    <tr class="table" >
    <td>&nbsp;</td>
    <td>Book title </td>
    <td><input class="tb5" type="text" name="title" value="<?php echo $row["title"] ?>" readonly=""   /></td>
    </tr>
    
	<tr class="table" >
    <td>&nbsp;</td>
    <td>Name</td>
    <td><input class="tb5" type="text" name="nm" value="<?php echo $row["student_name"] ?>" readonly=""   /></td>
    </tr>
	
	<tr class="table" >
    <td>&nbsp;</td>
    <td>Class</td>
    <td><input class="tb5" type="text" name="cls" value="<?php echo $row["class"] ?>" readonly=""   /></td>
    </tr>
	
    <tr class="table" >
    <td>&nbsp;</td>
    <td>Borrower id</td>
    <td><input class="tb5" type="text" name="bid" value="<?php echo $row["student_id"] ?>" readonly=""  /></td>
    </tr>
    <tr class="table" >
    <td>&nbsp;</td>
    <td>Issue date </td>
    <td><input class="tb5" type="text" name="doi" value="<?php echo $row["issuedate"] ?>"  readonly="" id="demo1" /><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>Due date </td>
    <td><input class="tb5" type="text" name="dd"  value="<?php echo $row["duedate"] ?>" readonly=""  id="demo2"/><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="return" value="Renew" /></td>
  </tr>
</table>
</form>




<?php
if(isset($_POST["return"]))
{
$bnm=$_POST["bnm"];

$issuedate = $_POST["doi"];
$duedate = $_POST["dd"];
$qry="update issuebook set issuedate ='$issuedate',duedate = '$duedate' where bookno='$bnm'";
mysqli_query($con,$qry);
$d= date("d-m-Y");
mysqli_query($con,"insert into book_fine(sid,bno,amt,date,type)values('".$_POST["bid"]."','".$_POST["bnm"]."','".$_POST['fam']."','$d','renew')");

$query=mysqli_query($con,"insert into renewbook(bno,name,sname,sid,idate,ddate,date,amt,type,ses,class) values('".$_POST['bnm']."','".$_POST['title']."','".$_POST['nm']."','".$_POST['bid']."','".$_POST['doi']."','".$_POST['dd']."','$d','".$_POST['fam']."','student','".$_SESSION['session']."','".$_POST['cls']."') "); 
?>
 <script>alert('Book has been renewed');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."book_status";  ?>";
	 </script>   
<?PHP 
}
?>
<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
