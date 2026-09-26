<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:99%; height:1150px; background-color:#FFFFFF; margin-left:2px; float:left; margin-top:10px;}
.col_4{ width:99%; height:520px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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
    font-style: normal;
    border-bottom: 2px solid #ddd;
    margin-bottom: 20px;
    font-size: 15px;
    padding:10px;
}

input[type="text"] {
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
textarea:focus{border: solid 5px #339933;background-color:#eaeaea;}
input[type=submit],
input[type=button]{
    border: none;
     background: #1e4a1b;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
	padding:10px;
	
	
}
input[type=submit]:hover,
input[type=button]:hover{
    background: #1e4a1b;
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
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do You Want To Delete This Enquiry")) { 
        return false;
    }
    }
</script> 

<?php
if(isset($_POST['submit']))
{
$res_up=mysqli_query($con,"update enquiry set name='".$_POST["name"]."',fname='".$_POST["fname"]."',mname='".$_POST["mname"]."',aclass='".$_POST["aclass"]."',
mobile='".$_POST["mobile"]."' where id='".$_POST["id"]."' and session='".$_SESSION["session"]."'");
?>
				<script>
		        alert('Enquiry update successfully');
                window.location.href='https://smarterponline.com/shining/school/?pageid=enquiry';
                </script>
<?php

}
   ?>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/frontdesk/front desk home.png" /><a href="./?pageid=fron_desk">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="std.png"  style=" float:left; width:50px; height:42px; margin-left:5px; margin-top:1px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;"> Student Enquiry Form</h2></center>
</div>
<?php
$res_stud=mysqli_query($con,"select * from enquiry where id='".$_GET["eid"]."' and session='".$_SESSION["session"]."'")or die(mysqli_error());
$rowstud=mysqli_fetch_array($res_stud);
?>
<div class="col_4">
<div class="form-style-2-heading" style="background-color:#006633; color:#FFFFFF; font-style:normal;">Student Detail</div>
<form method="post" name="myForm" action="#" enctype="multipart/form-data" style="font-weight:bold;"  onsubmit="return(validate());">
    <table border="0" style="margin:40px 0px 0px 5px">
     <tr>
    <td>STUDENT NAME<span style="color:#FF0000">*</span></td>
    <td><input type="text" name="name" class="tb5" value="<?php echo $rowstud["name"] ?>" required>
	   <input type="hidden" name="id" value="<?php echo $rowstud["id"] ?>" class="tb5">
	</td>
	
	 <td>FATHER'S NAME <span style="color:#FF0000">*</span></td>
	 <td><input type="text" name="fname" value="<?php echo $rowstud["fname"] ?>" class="tb5"></td>
	
	<td>ASMISSION IN CLASS <span style="color:#FF0000">*</span></td>
    <td>
	    <?php 
		  if(isset($_GET["eid"]))
		  {
		  ?>
		  <select name="aclass" class="select" style="width:220px;"> 
	       <option value="-1">Select Class</option>
           <?php
           $res=mysqli_query($con,"select distinct(class) from cla");
           while($rows=mysqli_fetch_array($res))
           {
		   ?>
		   <option value="<?php echo $rows["class"]; ?>" <?php if($rows["class"]==$rowstud["aclass"] ) { ?> selected="selected" <?php }?>> <?php echo $rows["class"]; ?></option>
           <?php
		   }  
           ?>
           </select>
          <?php
		   }  
           ?>
    </td>
    </tr>
	 <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
      
	  <tr>
	  <td>MOBILE NO</td>
	  <td><input type="text" name="mobile" class="tb5" value="<?php echo $rowstud["mobile"] ?>"></td>
	 
	  <td>MOTHER'S NAME </td>
      <td><input type="text" name="mname" class="tb5" value="<?php echo $rowstud["mname"] ?>" ></td>
	 
	 
	  <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	
	
	
     <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			</tr>
             <tr>
		   <td>&nbsp;</td>
		   <td><input type="submit" name="submit" value="Update Enquiry"></td>
		</tr>
	   
            
		  <tr> <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>	   
		 
			
			
       
    </table>
    </form>

</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

   <script src="js/jquery-1.8.3.min.js"></script>
   <script type="text/javascript" src="js/jquery.dataTables.js"></script>
   <script type="text/javascript" src="js/DT_bootstrap.js"></script>
   <script src="js/dynamic-table.js"></script>
