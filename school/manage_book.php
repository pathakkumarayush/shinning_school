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
<?php
if(isset($_POST["Submit"]))
{
$bb=$_POST["bb"];
}
?>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Library/libraryhome.png" /><a href="./?pageid=library_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Manage books </h2>

<a  href="./?pageid=add_books" style="float:right; padding:7px; background-color:#006666; margin-right:10px; margin-top:8px; color:#FFFFFF; text-decoration:none; border-radius:4px;">
 Add New book</a>
</div>

<div class="col_4" style="margin-top:0px;" >
<table border="0" >
<tr>
    <td>
	<table  border="0">
      <tr>
	  
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Books")) { 
        return false;
    }
    }
</script> 	  
<?php
if(!empty($_GET['bookno']))
{
$delete=mysqli_query($con,"delete from addbook where bookno='".$_GET['bookno']."'");
?>
 <script type="text/javascript">
 alert("Delete Successfully")
	  window.location="<?php echo $var."manage_book";  ?>";
	 </script>   
<?php
}
?>
	  
	  
	  
	   <?php
if(isset($_GET["record"]))
{
echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > book added successfully </div>";
}
if(isset($_GET["update"]))
{
echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > book updated successfully </div>";
}
if(isset($_GET["delete"]))
{
echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '  > book deleted successfully </div>";
}
?>
  
        <td colspan="4">
		<table width="888" height="242" border="0">
          <tr>
            <td height="52" align="center">
			<form method="post" action="">
			<table height="37" border="0" style="width:440px;">
              <tr>
                <td width="300" class="item" >Search Status</td>
                <td width="149">
				<select name="bb" class="select" style="width:200px;">
				<option value="-1" > select status </option>
				<option value="0" > available </option>
				<option value="1" > borrowed </option>
				
                </select>                </td>
                <td width="224"> <input type="submit" name="Submit" value="filter"  class="buttons"  /> </td>
              </tr>
            </table>
			</form>			</td>
            </tr>
          <tr>
		  <tr>
		    <td>&nbsp;</td>
		  </tr>
            <td> <table width="1130" height="52" border="0"  style="border: #006633 solid 15px;"   >
              <tr  class="box-head"  >
                <td align="center">Book no </td>
                <td align="center">Title</td>
				<td align="center">Class</td>
                <td align="center">Author</td>
                <td align="center">Status</td>
                <td align="center">Action</td>
              </tr  >
			  <?php
			  $bb=$_POST["bb"];
			  switch($bb)
			  {
			  case "0":
			  require_once("../db.php");
			  $qry="select * from addbook where status='0' ";
			  $result=mysqli_query($con,$qry);
			  while($row=mysqli_fetch_array($result))
			  {
			  
			  echo "<tr  class='table' >";
			  echo  "<td>" .$row["bookno"]. "</td>";
			  echo  "<td>" .$row["title"]. "</td>";
			  echo  "<td>" .$row["class"]. "</td>";
			  echo  "<td>" .$row["authore"]. "</td>";
		  	  if($row["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  
			 ?>
			  
			   <td align="center">
               <a href="<?php echo $var."manage_book&bookno=".$row['bookno']; ?>"> 
			   Delete</a>
			   </td>
			 
			   <?php
			  echo "</tr>";
			  }
			   break;
			   case "1":
			 
			  require_once("../db.php");
			  $qry="select * from addbook where status='1' ";
			  $result=mysqli_query($con,$qry);
			  while($row=mysqli_fetch_array($result))
			  {
			  
			  echo "<tr  class='table' >";
			  echo  "<td>" .$row["bookno"]. "</td>";
			  echo  "<td>" .$row["title"]. "</td>";
			  echo  "<td>" .$row["class"]. "</td>";
			  echo  "<td>" .$row["authore"]. "</td>";
		  	 
			  
			  if($row["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  
			  
			?>
			  
			   <td align="center">
               <a href="<?php echo $var."manage_book&bookno=".$row['bookno']; ?>" > 
			   Delete</a>
			   </td>
			 
			   <?php
			  echo "</tr>";
			  
			
			  
			}
			 
			  
	          break;
			  default:
			  require_once("../db.php");
			  $qry="select * from addbook ";
			  $result=mysqli_query($con,$qry);
			  while($row=mysqli_fetch_array($result))
			  {
			  
			  echo "<tr  class='table' >";
			  echo  "<td>" .$row["bookno"]. "</td>";
			  echo  "<td>" .$row["title"]. "</td>";
			  echo  "<td>" .$row["class"]. "</td>";
			  echo  "<td>" .$row["authore"]. "</td>";
		  	 
			  
			  if($row["status"]=='0')
			  {
			  echo  "<td>" . "Avaliable" . "</td>";
			  
			  }
			  else
	 		  {
	           echo  "<td>" . "borrowed"  ."</td>";
			  
			  }
			  ?>
			  
			   <td align="center">
               <a href="<?php echo $var."manage_book&bookno=".$row['bookno']; ?>" onClick="return confirmation();" > 
			   Delete</a>&nbsp;||&nbsp;
			   
			   <a href="<?php echo $var."edit_book&bookno=".$row['bookno']; ?>" target="_blank"> 
			   Edit</a>
			   </td>
			 
			   <?php
			  echo "</tr>";
			  
			
			  
			}
			 
			 mysqli_close($con);  
			  
	           }
			 
			   ?> 		  
			  
			  
            </table></td>
            </tr>
        </table></td>
        </tr>
      

    </table></td>
    </tr>
</table>	
        
					  
<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
