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
<script language="javascript" type="text/javascript" >
	function showStudent(str)
{


if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    location.reload();
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","getstudent.php?id="+str,true);
xmlhttp.send();

}	</script>
	<script type="text/javascript">
	function valid()
	{
	if( ! confirm("Are you sure you want to delete this book") )
	{
	 return false;
	
	}
	
	}
	
	
	</script>
			
	
	<script type="text/javascript">
	function validation()
	{
	 var nm=document.f2.nm.value;
	 var sid=document.f2.sid.value;
	 var doe=document.f2.doe.value;
	  var due=document.f2.due.value;
	 
	 
	 if(nm=='')
	 {
	 alert("enter name ");
	 document.f2.nm.focus();
	 return false;
	 }
	 
	  if(sid=='')
	 {
	 alert("enter student id ");
	 document.f2.sid.focus();
	 return false;
	 }
	 
	  if(doe=='')
	 {
	 alert("enter date of issue ");
	 document.f2.doe.focus();
	 return false;
	 }
	 
	  if(due=='')
	 {
	 alert("enter due date ");
	 document.f2.due.focus();
	 return false;
	 }
	 
	 
	 
	 
	}
	</script> 	
    
	<script type="text/javascript">
	function validations()
	{
	var nm1=document.f4.nm1.value;
	var sid1=document.f4.sid1.value;
	var doi1=document.f4.doi1.value;
	var due1=document.f4.due1.value;
	
	if(nm1=='')
	{
	alert("enter name");
	document.f4.nm1.focus();
	return false;
	}
	
	if(sid1=='')
	{
	alert("enter employee id");
	document.f4.sid1.focus();
	return false;
	}
	
	if(doi1=='')
	{
	alert("enter issue date");
	document.f4.doi1.focus();
	return false;
	}
	
	if(due1=='')
	{
	alert("enter due date");
	document.f4.due1.focus();
	return false;
	}
	
	
	
	}
	</script>

	
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Library/libraryhome.png" /><a href="./?pageid=library_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Issue Book Here</h2>
</div>

<?php
	$qry="select * from addbook where bookno='".$_SESSION['bid']."' ";
	$result=mysqli_query($con,$qry);
    $row=mysqli_fetch_array($result);
	?>
<div class="col_4" style="margin-top:0px;" >
<form name="f2" method="post" action="issuebooksavetech.php" enctype="multipart/form-data" onSubmit="return validation();" >
	<table width="700" border="0">
  <tr class="table" >
    <td >&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
     <td>Book number </td>
    <td><input class="tb5" type="text" name="bno" value="<?php echo $row["bookno"]; ?>" readonly="" /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
  </tr>
  <tr  class="table" >
    <td>&nbsp;</td>
    <td>Book Name</td>
    <td><input  class="tb5" type="text" name="title" value="<?php echo $row["title"]; ?>" readonly="" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr class="table" >
	 <td>&nbsp;</td>
	 <td>Teacher Name</td> 
     <td>
	<?php
	$qry="select * from teacher";
	$search = mysqli_query($con,$qry);
	?>
	<select name="scholarno1" class="select" style="width:230px; height:30px; border:5px;">
    <option>Select Teacher</option>
    <?php
    while($row=mysqli_fetch_array($search))
    {
    ?>
    <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['teacher_name']; ?></option>  
    <?php
    }
    ?>
    </select>
	</td>
 <td>&nbsp;</td>
			 <td>&nbsp;</td>
              </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>Issue date </td>
    <td> <input  class="tb5" type="Text" name="doe" id="demo1" ><a href="javascript:NewCal('demo1','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
              <span class="descriptions">pick a date..</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>Due date </td>
    <td><input  class="tb5" type="Text" name="due" id="demo2" value="" ><a href="javascript:NewCal('demo2','ddmmmyyyy')"><img src="css/images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
              <span class="descriptions">pick a date..</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="table" >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit2" value="Issue Book" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
		

<!-- End Box -->					   
</div>
<?php
	
mysqli_close($con);
?>	
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
