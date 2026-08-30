<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #006633 solid;}
.col_6{ width:58.5%; height:520px; background-color:#FFFFFF; margin-left:15px; float:left; margin-top:10px;}
.col_4{ width:40%; height:520px; margin-left:2px; background-color:#FFFFFF;float:left; margin-top:10px;}
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

input[type="password"] {
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
     background: #FF8500;
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
<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert("Please Select Class");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from class where class_id='".$_GET['did']."'");
	}
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this class")) { 
        return false;
    }
    
} 
</script>
<?php
if(isset($_POST["submit"]))
{
$login=mysqli_query($con,"update login set pass='".$_POST['password']."' where uid='".$_POST['uid']."'");
$msg="Password updated successfully";
}
?>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="ch.png" /><a href="./?pageid=home">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Change Password</h2>

<a href="./?pageid=profilesettingt" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Class Teacher</a>


<a href="./?pageid=profilesettings" style="color:#FFFFFF;float:right; background-color:#CC0033; margin-top:10px; padding:6px; font-size:18px">Subject Teacher</a>
</div>
<div class="col_4">
<div class="form-style-2-heading">Change Password</div>
 
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
		  <?php
		   }
	       ?>
   
     	
          
    <table cellspacing="10" style="margin-top:30px">
<tr>
<td>School : </td>
<td><?php echo $_SESSION['uid']; ?></td>
</tr>
<tr>
<td>Username : </td>
<td>
<?php
$login=mysqli_query($con,"select * from login where mod_type='md'");
?>
<select name="uid" class="select" style="width:150px"> 
 <option value="-1">Select Usertype</option>
<?php
while($rowlogin=mysqli_fetch_array($login))
{
?>
<option value="<?php echo $rowlogin['uid'];  ?>"><?php echo $rowlogin['uid'];  ?></option>
<?php
}
?>

</select>
</td>
</tr>
<tr>
<tr>
   <td>Password<span>*</span></td>
  <td><input type="password" name="password" style="width:129px;" class="tb5" /></td>
</tr>
<td></td><td><input type="submit" name="submit"></td>
</tr>
</table>
      
       
    <br><br>
            
 <table border="1" cellpadding="0" cellspacing="0" style="width:300px;">
 <tr style="line-height:25px; font-weight:bold;" >
 <td>&nbsp;&nbsp;User Name</td>
 <td>&nbsp;&nbsp;Password</td>
 </tr>
 
   <?php
    $sql=mysqli_query($con,"select * from  login where mod_type='md'");
	
	$i=1;
	while($row=mysqli_fetch_array( $sql))
	{
    ?>
 <tr style="line-height:25px;">
 <td>&nbsp;&nbsp;<?php echo $row['uid'];?></td>
 <td>&nbsp;&nbsp;<?php echo $row['pass'];?></td>
 </tr>
 
           
    <?php
	$i++;
	}
	?>
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
