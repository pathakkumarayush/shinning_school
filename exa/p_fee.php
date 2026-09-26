<style>
#summation {
font-size: 18px;
font-weight: bold;
color:#174C68;
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
newwindow=window.open(url,'name','height=535,width=623');
if(window.focus) {newwindow.focus()}
return false;
}
</script>
    <?php
      if(isset($_POST['search1']))
      {
      echo 'ok';
      $query=mysqli_query($con,"insert into privious_fee(cid,sid,amt,session)values('".$_POST['class']."','".$_POST['stdid']."','".$_POST['pfee']."','".$_SESSION['session']."')");
 
      $msg="fee Add Successfully"; 
	  }
	 ?>
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
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=preivious">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Add Previous Fee</h2>
</div>
<div class="col_4">
		 
			 
  <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
            <div class="box-head">
		  Add Previous Year Fee
		    </div>
            <table style="margin:20px 0px 0px 30px; font-size:16px" >
		    <tr>
            <td>Class<span class="textfieldRequiredMsg"></span></td>
            <?php
            $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			?>
            <td><select name="class" class="select" style="width:125px" onchange="showStudent_21(this.value)">
            <option value="-1">Select class</option>
            <?php
			while($rclass=mysqli_fetch_array($class))
			{
			?>
            <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class']; ?></option>
            <?php
			}
			?>
            </select></td>
             </tr>
			 <tr>
			 <td>&nbsp;</td>
		     <td>&nbsp;</td>
			  </tr>
			  <tr>
			  <td>Student Name</td> 
			  <td><div id="txtHint1"></div></td>
              </tr>
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 <tr>
			    <td>Amount</td>
				<td><input type="text" name="pfee" /></td>
			 </tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			
	       <tr>  
		   <td></td>
		   <td>
		   <input type="submit" name="search1" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
		  </table>
	
		<br><br>
	  <?php
	   if(!empty($msg))
	   {
	   ?>
       <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
	   <?php
	   }
	   ?>
	   
	   <div style="width:990px; margin-left:30px; height:400px; overflow:scroll">
		
		<table border="1" cellpadding="0" cellspacing="0" style="width:973px;">
        <tr style="line-height:30px; font-weight:bold" align="center" >
		<td>Sr No</td>
		<td>Student Name</td>
		<td>Student Father</td>
		<td>Student Class</td>
		<td>Previous Year Fee</td>
	    <td>Deposit Fee</td>
		<td>Balance Fee</td>
		</tr>	
		
	   <?php
	   $enquiry=mysqli_query($con,"select * from privious_fee where session='".$_SESSION['session']."'");
       $i=1;
	   while($enquiryrow=mysqli_fetch_array($enquiry))
       {
	     ?>	
       <tr style="color:#fff; line-height:15px; color:#000000" align="center">
        <td><?php echo $i;  ?></td>
	    <td>
		<?php 
	    $squiry=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_id='".$enquiryrow['sid']."' ");
		$stdrow=mysqli_fetch_array($squiry);
		echo $stdrow['student_name'];
		?>
		</td>
		<td><?php echo $stdrow['student_fname']; ?></td>
       <td><?php echo $stdrow['student_class']; ?></td>
	   <td><?php echo ucwords($enquiryrow['amt']);?></td>
	   <td>
<?php
$search1=mysqli_query($con,"select sum(fee_deposit) from fee_detail_preivios where student='".$enquiryrow['sid']."' ");
$studrow=mysqli_fetch_array($search1);
// $depo= $studrow['sum(fee_deposit)']-$studrow['sum(latefee)'];
$depo= $studrow['sum(fee_deposit)'];
echo  $depo;
?>			
	
	
	</td>
	<td><?php echo  $enquiryrow['amt'] - $depo; ?></td>
	
	   </tr>
    <?php
    $i++;
	}
	?>	
		</table>
		
		</div>
	</form>
                
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>