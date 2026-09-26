<style type="text/css">
span.customStyleSelectBox { font-size:14px; font-weight:bold; background-color:#f0dea4; color:#7c7c7c; padding:5px 7px; border:1px solid #e7dab0; -moz-border-radius: 5px; -webkit-border-radius: 5px;border-radius: 5px 5px; line-height: 11px; } span.customStyleSelectBox.changed { background-color: #f0dea4; } .customStyleSelectBoxInner { background:url(images/arrow.gif) no-repeat center right; }

body{
  
}
.info, .success, .warning, .error, .validation {
    border: 0px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('info.png');
}
.success {
    color: #4F8A10;
    background-color:#FFD9FF;
    background-image:url('success.png');
}
.warning {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('warning.png');
	font-family:"Courier New", Courier, monospace
}
.error {
    color: #D8000C;
	background:#FFD9FF;
   background-image: url('error.png');
   border-radius:15px;
}
.sms_l{width:135px;margin-top:10px; height:22px;margin-left:20px; background-color:#CC0000; border:4px #FFFFFF solid;}
.sms_l:hover{ background-color:#009933;}
.sms_l a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_l a:hover{font-size:15px; font-weight:bold;}
.sms_ll{width:135px;margin-top:10px; height:22px;margin-left:5px; background-color:#009933; border:4px #FFFFFF solid;}
.sms_ll:hover{ background-color:#CC0000;}
.sms_ll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
.sms_lll{width:300px;margin-top:10px; height:22px;margin-left:5px; }
.sms_lll a{text-decoration:none; margin-top:3px; margin-left:10px;position:absolute; font-size:14px; color:#FFFFFF}
</style>
<script type="text/javascript">
    $(document).ready(function($) {
             //Set maxlength of all the textarea (call plugin)
             $().maxlength();
    })
</script>
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
<div class="left_sect"><img src="images/.png" class="mback"/>
<a href="./?pageid=reppp">
<img src="images/buttonGoBack.png"  class="gback"/>
</a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">

<h2 style="margin-left:0px; color:#006633; font-size:15px; line-height:40px;">&nbsp;Edit Complaint</h2>


</div>
<div class="col_4" style="margin-top:0px; " >	
				
	
<?php 

if(isset($_POST["update"]))
{
$res_up=mysqli_query($con,"update comp_box set name='".$_POST["name"]."',fname='".$_POST["fname"]."',class='".$_POST["class"]."',comp='".$_POST["comp"]."' where id='".$_GET["id"]."' and session='".$_SESSION['session']."'");  
$msg="Update Successfully";   
} 
?>


<?php
$res_stud=mysqli_query($con,"select * from comp_box where id='".$_GET["id"]."' and session='".$_SESSION['session']."'")or die(mysqli_error());
$rowstud=mysqli_fetch_array($res_stud);
?>
<br />
<div style="width:990px;">
				  
				  <div class="sms_lll" style="float:left">
				   <h2 style="color: #006633; margin-left:50px; font-size:18px; "> &nbsp; &nbsp;</h2>
				  </div>
				 
				  
				  </div>

<br clear="all" />
<?php
   if(!empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:20px"><?php echo $msg;?></div>
   <?php
   }
  ?>
<div>
<form action="" name="form" method="post" >
<div style="margin-left:2px;"><br />
<table border="0" cellspacing="0" style="margin-left:5px; margin-top:-12px;">
<tr><td style="font-weight:bold;">Student name<br />
<input type="text" name="name" readonly value="<?php echo $rowstud["name"]; ?>" /></td>
</tr>

<tr><td style="font-weight:bold;">Father name<br />
<input type="text" name="fname" readonly value="<?php echo $rowstud["fname"]; ?>" /></td>
</tr>


<tr><td style="font-weight:bold;">Class<br />
<input type="text" name="class" readonly value="<?php echo $rowstud["class"]; ?>" /></td>
</tr>

<tr><td style="font-weight:bold;">Date<br />
<input name="date"  id="demo1" type="text" value="<?php echo $rowstud["date"]; ?>"  required/>
<a href="javascript:NewCal('demo1','ddmmmyyyy')" >
<img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style="margin-top:10px; position:absolute;" > </a></td>
</tr>



<tr><td style="font-weight:bold;">Complaint<br />
<textarea name="comp" cols="25" rows="15"><?php echo $rowstud["comp"]; ?></textarea></td>
</tr>

<tr><td>&nbsp;</td></tr>

			 
<tr>
<td><input type="submit" name="update" value="Update"  /></td>
</tr>

</table>

</div>
</form>
</div>
<br />




			     	</div>
					</div>
			</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>		



