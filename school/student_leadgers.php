<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
function getval(val)
{
alert(val);
}
</script>
 <script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Record")) { 
        return false;
    }
    }
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

 <?php
 if(!empty($_GET['did']))
 {
 $id = $_GET['stdid'];
 $delete=mysqli_query($con,"delete from fee_detail where id='".$_GET['did']."'");
 }
 ?>
 
 <?php
 if(!empty($_GET['dit']))
 {
 $id = $_GET['stdid'];
 $delete=mysqli_query($con,"delete from fee_other where id='".$_GET['dit']."'");
 }
 ?>
 <?php
if(isset($_POST['search4']))
{
$_SESSION['stdid']=$_POST['stdid'];
$search=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' ");$studrow=mysqli_fetch_array($search);
$sch = $studrow['student_scholar'];
$memo=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and sch='$sch' ");               
$num=mysqli_num_rows($memo);
}



if(isset($_POST['search1']))
{
$memo=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and sedate='".$_POST['adm']."'");               
$num=mysqli_num_rows($memo);
}
?>
			 
         
		  
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Ledger</h2></center>
</div>
<div class="col_4">

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
            <div class="box-head">
		
			</div>
          
            <?php
		    //student by scholar number
	        if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		    {
	        ?>
		    <table style="margin:20px 20px 0px 0px; margin-left:20px; font-size:16px" >
			<tr><td></td><td><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color: #FF0066;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;">Search Student Class Wise</a></td></tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		    <tr>
            <td>Student Class<span class="textfieldRequiredMsg"></span></td>
            <?php
            $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			?>
            <td><select name="class" class="select" style="width:155px" onchange="showStudent_21(this.value)">
            <option value="-1">Select class</option>
            <?php
			while($rclass=mysqli_fetch_array($class))
		    {
			?>
            <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
		 <td></td>
		   <td><input type="submit" name="search4" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
		  </table>
		<?php
		 }
		 
		
		 if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		 {
	     ?>
		 <table style="margin:20px 20px 0px 0px; margin-left:20px; font-size:16px" >
		 <tr><td></td><td><a style="border-radius:5px;padding:5px;color:#FFFFFF; background-color: #FF0066;font-size:15px;border-top-left-radius:7px;border-top-right-radius:7px; text-decoration:none;">Search Student A/C No. Wise</a></td></tr>
			 <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
		    <tr>
            <td>A/C No.<span class="textfieldRequiredMsg"></span></td>
             <td><input type="text" name="adm" class="tb5"/></td>
             </tr>
			 
			
			    <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
	     <tr>  
		 <td></td>
		   <td><input type="submit" name="search1" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
		  </table>
		<?php
		 }
		?> 
		
		
		
		<br><br>
		   <?php
	   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	   ?>

		 
	   
	   <div class="table" style="border:20px #006633 solid;height:550px;width:1100px; overflow-y:scroll; overflow:scroll;">
	   <form id="form1">
       <div id="dvContainer">
	   <br />
	
	   <div id="dvContainer1">
	 
	   <?php 
	    if(!empty($_POST['stdid']))
	   {
	   $sea=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' ");
	    $rowss=mysqli_fetch_array($sea);
	  
	   }
	   
	    if(!empty($_POST['adm']))
	   {
	   $sea=mysqli_query($con,"select * from student where student_scholar='".$_POST['adm']."' and student_session='".$_SESSION['session']."' ");
	   
	   $rowss=mysqli_fetch_array($sea);
	  }
	   ?>
	   
	   <br />
	   <table  border="1" cellspacing="0" cellpadding="0" style="width:100%; overflow:scroll;font-size:12px;">
	   <tr style="line-height:25px; font-weight:bold;"><td colspan="4">Fee Details</td>
		
		<td colspan="2">
		
		<a  href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/pl.php?student_id=<?php echo $_POST['stdid']."&class=".$rowss['student_class']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:18px;">Print Ledger</a>
		
		</td>
		</tr>
		<tr style="font-weight:bold">
		<td>Student Name</td>
		<td>Student Class</td>
		<td>Total Fee</td>
        <td>Recived Fee</td>
	    <td>Bal. Fee</td>
		<td></td>
	    </tr>
        <?php
        $i=1;
	    if($num>0)
		{
	    while($rowmemo=mysqli_fetch_array($memo))
		{
	    ?>	
    <tr style="color:#335599; font-size:11px;">
	<td><?php echo $rowmemo['student_name']; ?></td>
	<td><?php echo $cls = $rowmemo['student_class'];?></td>
	<td>
	<?php
	$sid = $rowmemo['student_id'];
	if($rowmemo['std_type']=='New')
    {
    $admi=mysqli_query($con,"select * from admission where class='$cls' and session='".$_SESSION['session']."'");
    $rowead=mysqli_fetch_array($admi);
    //$ad = $rowead['fee'];
    }
   
    if($rowmemo['bus']=='Yes')
    {
	$bu=mysqli_query($con,"select * from student where student_id='$sid' and student_session='".$_SESSION['session']."' ");
	$rowbu=mysqli_fetch_array($bu);
    //echo $tfee=$rowbu['hostel_status'];
    }

	$prfee=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	$prrow=mysqli_fetch_array($prfee);
    $tpr=$prrow['amt'];
	
	$total=mysqli_query($con,"select * from definefee where class='$cls' and session='".$_SESSION['session']."'");
    $tamt=mysqli_fetch_array($total);
	
	
	 $tttf  = $tamt['amnt']+$tamt['actfee'];
     echo $tt = $tttf+$ad+$tpr+$tfee-$rowmemo['famt'];
	
	?>
	</td>
    <td><?php echo $rowmemo['sreceipt'];?></td>
	 <td><?php echo $rowmemo['acn'];?></td>
	
	
    <td style="font-size:14px;">
   
	<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/print1.php?id=<?php echo $rowmemo['id']; ?>')">
   Print
    </a>
	

	
    <?php /*?><a href="<?php echo $var."edit_fee&id=".$rowmemo['id']; ?>"  style="color:#FF0000" target="_blank"> Pay Due</a><?php */?>

    </td>
    </td>
	</tr>
    <?php
    $i++;
	}
	}
	else
	{
	?>
	<tr>
	<td><span style="color:#CC0000">No Record</span></td>
	</tr>
	<?php
	}
	?>
	
    </table>
	   
	   
	   
	   
	  
	   </div>
	  
	  
	</div>
	
	
    </div>
    </form>



</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  