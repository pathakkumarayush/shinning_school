
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
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Search Library books </h2>
</div>
<div class="col_4" style="margin-top:0px;" >
<div style="margin-top:15px;" >
				
	<form method="post" action="#">
	  <table width="896" border="0" >
        <tr class="item" >
          <td height="41">&nbsp;</td>
          <td>Search</td>
          <td><input class="tb5" type="text" name="src" /></td>
        </tr>
	    <tr class="item" >
          <td height="41">&nbsp;</td>
          <td>Search by</td>
          <td><select class="select" name="srcby" style="width:220px;">
		  <option  value="bookno" >Book Number</option>
		  <option  value="title" >Title</option>
		  <option  value="authore">Author</option>
		  </select></td>
        </tr>
        <tr>
          <td height="43">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit2" value="search" /></td>
        </tr>
		
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
	</form>	</td>
  </tr>
</table>
<table width="1150" height="43" border="0"  >
  <tr  class="box-head"  >
    <td>&nbsp;Book no </td>
    <td>&nbsp; Book title </td>
	<td> &nbsp;Class</td>
    <td>&nbsp; Author</td>
	<td>&nbsp; Status</td>
  </tr>
 <?php
    /* search by Book No*/
	if(isset($_POST["Submit2"]))
	{
	$src=$_POST["src"];
	$srcby=$_POST["srcby"];
	 if((!empty($src)) && ($srcby=='bookno'))
     {
	require_once("../db.php");
	$qry=" select * from addbook where bookno='$src'  ";
	$result=mysqli_query($con,$qry);
	if(mysqli_num_rows($result)>0)
	{
	while($row=mysqli_fetch_array($result))
	{
	echo "<tr  class='table' >";
	echo "<td>" .$row["bookno"]. "</td>";
	echo "<td>" .$row["title"]. "</td>";
	echo "<td>" .$row["class"]. "</td>";
	echo "<td>" .$row["authore"]. "</td>";
	
	  if($row["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  
		
			 
	echo "</tr>";
	}
	}
	else
	{
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  >This Book Number does not exist </div>";
	}
	}
	
	/* search by Title*/
	 elseif((!empty($src)) && ($srcby=='title'))
     {
	$qry1=" select * from addbook where title='$src'  ";
	$result1=mysqli_query($con,$qry1);
	if(mysqli_num_rows($result1)>0)
	{
	while($row1=mysqli_fetch_array($result1))
	{
	echo "<tr  class='table' >";
	echo "<td>" .$row1["bookno"]. "</td>";
	echo "<td>" .$row1["title"]. "</td>";
	echo "<td>" .$row1["class"]. "</td>";
	echo "<td>" .$row1["authore"]. "</td>";
	
	  if($row1["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  
	echo "</tr>";
	}
	}
	else
	{
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  >This Book title does not exist </div>";
	}
	}
	
	/* search by author*/
	 elseif((!empty($src)) && ($srcby=='authore'))
     {
	$qry2=" select * from addbook where authore='$src'  ";
	$result2=mysqli_query($con,$qry2);
	if(mysqli_num_rows($result2)>0)
	{
	while($row2=mysqli_fetch_array($result2))
	{
	echo "<tr  class='table' >";
	echo "<td>" .$row2["bookno"]. "</td>";
	echo "<td>" .$row2["title"]. "</td>";
	echo "<td>" .$row2["class"]. "</td>";
	echo "<td>" .$row2["authore"]. "</td>";
	
	  if($row2["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  
		
			 
	echo "</tr>";
	}
	}
	else
	{
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  >This Author Book does not exist </div>";
	}
	}
	
	/* search by Tags*/
	 elseif((!empty($src)) && ($srcby=='tags'))
     {
	$qry3=" select * from addbook where tags='$src' || customtag='$src' ";
	$result3=mysqli_query($con,$qry3);
	if(mysqli_num_rows($result3)>0)
	{
	while($row3=mysqli_fetch_array($result3))
	{
	echo "<tr  class='table' >";
	echo "<td>" .$row3["bookno"]. "</td>";
	echo "<td>" .$row3["title"]. "</td>";
	echo "<td>" .$row3["class"]. "</td>";
	echo "<td>" .$row3["authore"]. "</td>";

	  if($row3["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  
		
			 
	echo "</tr>";
	}
	}
	else
	{
	echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  >This Book Tag does not exist </div>";
	}
	}}
	mysqli_close($con);
	?>
	</table> 
			  
                </div>
		

<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
