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
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Book Return Here</h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >
	<br />
	<?php
	$qry="select * from issue_tech where bookno='".$_GET['bno']."' ";
	$result=mysqli_query($con,$qry);
    $row=mysqli_fetch_array($result);
	?>
	<form name="f2" method="post" action="" enctype="multipart/form-data" onSubmit="return validation();" >
	<table width="898" border="0">
    <tr class="table" >
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr class="table" >
    <td width="36" >&nbsp;</td>
    <td width="190">Book number </td>
    <td width="344"><input class="tb5" type="text" name="bno" value="<?php echo $row["bookno"]; ?>" readonly="" />
	<input class="tb5" type="hidden" name="sid" value="<?php echo $row["tech_id"]; ?>"  />
	</td>
    <td width="266">&nbsp;</td>
    <td width="40">&nbsp;</td>
    </tr>
    <tr  class="table" >
    <td>&nbsp;</td>
    <td>Book Name</td>
    <td><input  class="tb5" type="text" name="title" value="<?php echo $row["title"]; ?>" readonly="" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr  class="table" >
    <td>&nbsp;</td>
    <td>Teacher Name</td>
    <td><input  class="tb5" type="text" name="tname" value="<?php echo $row["tech_name"]; ?>" readonly="" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
			
    <tr class="table" >
    <td>&nbsp;</td>
    <td>Issue date </td>
    <td> <input  class="tb5" type="Text" name="doe" id="demo1" value="<?php echo $row["issuedate"]; ?>" >
	<a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
              <span class="descriptions">pick a date..</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>Due date </td>
    <td><input  class="tb5" type="Text" name="due" id="demo2" value="<?php echo $row["duedate"]; ?>" >
	<a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
              <span class="descriptions">pick a date..</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr  class="table" >
    <td>&nbsp;</td>
    <td>Fine Amount</td>
    <td><input  class="tb5" type="text" name="famt"  /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  
  <tr class="table" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit2" value="Return Book" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
     if(isset($_POST['Submit2']))
{

$q="delete from issue_tech where bookno='".$_POST['bno']."' ";
mysqli_query($con,$q);	

 $qr="delete from renewbook where bno='".$_POST['bno']."' ";   
 mysqli_query($con,$qr);

$qry1="update addbook set status='0' where bookno='".$_POST['bno']."'";
mysqli_query($con,$qry1);


$d = date("d-m-Y");
$t = 'tech';
 $query=mysqli_query($con,"insert into returnbook(bno,name,sname,sid,idate,ddate,date,amt,type,ses) values('".$_POST['bno']."','".$_POST['title']."','".$_POST['tname']."','".$_POST['sid']."','".$_POST['doe']."','".$_POST['due']."','$d','".$_POST['famt']."','$t','".$_SESSION['session']."') "); 
 
 echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Book Succesfully Return')
    window.location.href='https://smarterponline.com/shining/school/?pageid=book_status_tech';
    </SCRIPT>");
 }
mysqli_close($con);
?>	
   <!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  