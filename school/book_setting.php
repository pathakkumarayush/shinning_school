
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
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Book Settings</h2>
</div>
<div class="col_4" style="margin-top:0px; min-height:335px;" >

	<div style="margin-top:15px;" >
				 <table width="871"  border="0"  >
  
    
        <tr> 
          <td height="10" width="300px">  <div align="left"><a href="./?pageid=chg_fineamt" class="item"> Change Fine Amount </a> </div> </td>
		  <td height="10" >   <div align="center" > <a href="./?pageid=chg_limit" class="item"> Change Book Limit </a> </div> </td>
		  <td height="10"  >  <div align="right"> <a href="./?pageid=addnew" class="item"> Addnew </a> </div> </td>
		  <td height="10"  >  <div align="right"> <a href="./?pageid=addtag" class="item">Add Tag</a> </div> </td>
      </tr>
	  
	  
   </table>
	<br />	<br />	<br />
	<tr><td>
	<?php
		if(isset($_GET["fineamt"]))
		{
		echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > Fine Amount Updated Successfully </div>";
		}
		?>
		<?php
		if(isset($_GET["limit"]))
		{
		echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > Book Limit Updated Successfully </div>";
		}
		?>
	</td></tr>
  <tr>
    <td>
	
	<form method="post" action="">
	<table width="897" height="42" border="0">
      <tr class="table" >
        <td width="196">&nbsp;</td>
        <td width="120">Courses</td>
        <td width="210">
		<select class="tb5" name="crs">
		<option>Select Course</option>
		<?php
 	require_once("../db.php");
    $sql="SELECT * FROM `courses`"; 
    $result=mysqli_query($con,$sql); 
    while ($row=mysqli_fetch_array($result)) { 
        $crs=$row["crs"]; 
?>
	   <option value="<?php echo $crs; ?>"><?php echo $crs; ?></option>"; 
   <?php } 
?>
        </select>
        <td width="343"><input type="submit" name="Submit2" value="filter" /></td>
      </tr>
    </table>
	</form>
	
	
	<table width="1162" border="0">
      <tr class="box-head" >  
        <td>&nbsp;&nbsp;Courses</td>
        <td>&nbsp;&nbsp;Category</td>
        <td>&nbsp;&nbsp;Books issuable </td>
        <td>&nbsp;&nbsp;Period (in days)</td>
		 <td>&nbsp;&nbsp;update</td>
      </tr>
	  
	  <?php
	  if(isset($_POST["Submit2"]))
	  {
	     $crs=$_POST["crs"];  
		 require_once("../db.php");
		 $qry1=" select * from courses where crs='$crs' ";
		 $result1=mysqli_query($con,$qry1);
		 $row1=mysqli_fetch_array($result1);
	   
	   echo "<tr class='table' >";
	   echo "<td>" .$row1["crs"]. "</td>";
	   echo "<td>" .$row1["cat"]. "</td>";
	   echo "<td>" .$row1["nob"]. "</td>";
	   echo "<td>" .$row1["prd"]. "</td>";
	   echo "<td>
		
		 
		 <a href='coursedelete.php?crs=".$row1["crs"]."' onclick='delete()' >
		 Delete
		 </a>
		 
		 
		 </td>";

	   echo "</tr>";
	   
	   
	  }
	  
	  ?>

	 
	  
	  
	  	  
    </table>
	
	
	
	
	
	</td>
  </tr>
</table>

                </div>	

<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
