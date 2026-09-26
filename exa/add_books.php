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
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Library books </h2>
</div>
<div class="col_4" style="margin-top:0px;" >

	<table width="871" height="394" border="0"  >
  
  <tr>
    <td>
	 
	 <?php
if(isset($_GET["record"]))
{
echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;  '> book added successfully </div>";
}

?>
  
	<form name="f1"  method="post" action=""  onsubmit="return validation();"  >
	<table width="975" height="478" border="0" style="color:#FFFFFF">
     <tr class="item"  >
       <td width="105">&nbsp;</td>
       <td width="188">Book no <font color="#FF0000" > * </font> </td>
       <?php
	   $max=mysqli_query($con,"SELECT * FROM addbook ORDER BY id DESC LIMIT 1");
	  
	   $rowmax=mysqli_fetch_array($max);
	   ?>
	   <td width="638">
	   <input class="tb5" type="text" name="bno" style="width:200px;"  value="<?php echo $rowmax['bookno']+1;?>" />&nbsp;
	   </td>
	   </tr>
       <tr class="item"  >
       <td>&nbsp;</td>
       <td >Book Name <font color="#FF0000" > * </font> </td>
       <td><input class="tb5" type="text" name="title" /></td>
       </tr>
	   <tr class="item"  >
       <td>&nbsp;</td>
       <td >Class<font color="#FF0000" > * </font> </td>
       <td><input class="tb5" type="text" name="class" /></td>
       </tr>
	   
       <tr class="item" >
       <td height="36">&nbsp;</td>
       <td >Author Name<font color="#FF0000" > * </font> </td>
       <td><input class="tb5" type="text" name="aut" /></td>
       </tr>
        <tr class="item" >
        <td>&nbsp;</td>
        <td >Name of Publisher </td>
        <td><input class="tb5" type="text" name="name_pub" /></td>
        </tr>
		
		 <tr class="item" >
        <td>&nbsp;</td>
        <td >Year of Publishe </td>
        <td><input class="tb5" type="text" name="dop" /></td>
        </tr>
		
		 <tr class="item" >
        <td>&nbsp;</td>
        <td >Amount (Rs.)</td>
        <td><input class="tb5" type="text" name="amt" /></td>
        </tr>
		
		 <tr class="item" >
        <td>&nbsp;</td>
        <td >Vol.</td>
        <td><input class="tb5" type="text" name="vol_book" /></td>
        </tr>
		 <tr class="item" >
        <td>&nbsp;</td>
        <td >Subject</td>
        <td><input class="tb5" type="text" name="book_sub" /></td>
        </tr>
		
        <tr class="item" >
        <td>&nbsp;</td>
        <td >Remark<font color="#FF0000" > * </font> </td>
        <td> <input class="tb5" type="text" name="remarks" />
		
       </td>
        </tr>
        <tr class="item">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit2" value="Add Book" /></td>
      </tr>
    </table>
	</form>

	
	</td>
  </tr>
</table>	
<?php
if(isset($_POST['Submit2']))
{
$bno=$_POST["bno"];
$title=$_POST["title"];
$authore=$_POST["aut"];
$class=$_POST["class"];
$dop=$_POST["dop"];
$pub=$_POST["name_pub"];
$amt=$_POST["amt"];
$vol_book=$_POST["vol_book"];
$book_sub=$_POST["book_sub"];
$remarks=$_POST["remarks"];
$ses=$_SESSION['session'];

$quru=mysqli_query($con,"insert into addbook(bookno,title,authore,class,name_pub,dop,amt,vol_book,book_sub,remarks) values('$bno','$title','$authore','$class','$pub','$dop','$amt','$vol_book','$book_sub','$remarks')");

?>
 <script type="text/javascript">
	  window.location="<?php echo $var."manage_book";  ?>";
	 </script>   
<?php
}
?>


<?php /*?><?php
if(isset($_POST['Submit2']))
{
$title=$_POST["title"];
$authore=$_POST["aut"];
$doa=$_POST["doa"];
$cst=$_POST["cst"];
$noc=$_POST["noc"];
$tag=implode(",",$_POST["checkbox"]);
$ses=$_SESSION['session'];
session_start();
require_once("../db.php");
$i=$noc;

$bno=$_POST["bno"][$i];
for($i=$noc;$i>0;$i--)
{
$qry="insert into addbook(title,authore,tags,session,status,dateofarrival,customtag,noofcopies)values('$title','$authore','$tag','$ses','0','$doa','$cst','$noc')";

mysqli_query($con,$qry);
?>
 <script type="text/javascript">
	  window.location="<?php echo $var."manage_book";  ?>";
	 </script>   
 
<?php
}
}
?>    <?php */?>
					  
<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
