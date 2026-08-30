
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
<div class="col_4" style="margin-top:0px;" >

			        <div style="margin-top:15px;" >
				
	
	
    
		<form name="f3" method="post" action="" style="margin-left:50px;" onsubmit="return validation();" >
		<table width="891" height="167" border="0" >
          <tr  class="box-head" >
            <td colspan="3" align="center" >Add library card setting </td>
            </tr>
          <tr class="table" >
            <td width="170">&nbsp;</td>
            <td width="220">Course</td>
            <td width="479"><input class="tb5" type="text" name="crs" /></td>
          </tr>
          <tr class="table" >
            <td>&nbsp;</td>
            <td>Category</td>
            <td><input class="tb5" type="text" name="cat" /></td>
          </tr>
          <tr class="table" >
            <td>&nbsp;</td>
            <td>Books issuable </td>
            <td><input class="tb5" type="text" name="nob" /></td>
          </tr>
          <tr class="table" >
            <td>&nbsp;</td>
            <td>Period (in days) </td>
            <td><input class="tb5" type="text" name="prd" /></td>
          </tr>
          <tr class="table" >
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit2" value="Submit" /></td>
          </tr>
        </table>
		</form>
		
<?php
$var="http://localhost/manorama/school/?pageid=";
if(isset($_POST["Submit2"]))
{
$crs=$_POST["crs"];
$cat=$_POST["cat"];
$nob=$_POST["nob"];
$prd=$_POST["prd"];

require_once("../db.php");

$qry= "insert into courses( crs , cat , nob , prd )values('$crs','$cat','$nob','$prd') ";

mysqli_query($con,$qry);
?>
<script>alert('Successfully Add');</script>
<script type="text/javascript">
	  window.location="<?php echo $var."book_setting";  ?>";
	 </script>   


<?php
}
?>
		
	
	
	
		
		
		
	
      

    
                </div>
                    <!-- Box Head -->
					              
		
	</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  