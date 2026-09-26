
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
	border-radius:4px;
	width:150px;
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

</style>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Record")) { 
        return false;
    }
    }
</script> 
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>

 
 
 
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Ledger</h2>
</div>
<div class="col_4">
<?php 
 $sql="SELECT * FROM del ORDER BY id desc LIMIT 1";
 $result_set=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result_set);
 echo $uid = $row['uids'];
	            

?>
<?php 
 $sql1="SELECT * FROM student where student_id = '$uid'";
 $result_set1=mysqli_query($con,$sql1);
 $row1=mysqli_fetch_array($result_set1);
 echo $name = $row1['student_name'];
	            

?>
<form action="" method="post">
<table>
<tr><td><input type="text" name="std_name" value="<?php echo  $row1['student_name']; ?>" /></td></tr>
<tr><td><input type="text" name="class" value="<?php echo  $row1['student_class']; ?>" /></td></tr>
<tr><td><input type="text" name="contact" value="<?php echo  $row1['student_contactno']; ?>" /></td></tr>
<tr><td><input type="text" name="msg"  placeholder='Enter Message' /></td></tr>
<tr><td><input type="submit" name="submit" value="send" /></td></tr>
</table>

</form>
<?php
    if(isset($_POST['submit']))
	{
	$d= date('d-m-Y');
	$query = "insert into bounce(std_name,class,contact,msg,dob)values('".$_POST["std_name"]."','".$_POST["class"]."','".$_POST["contact"]."','".$_POST["msg"]."','$d')";
	mysqli_query($con,$query);
	}


?>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  