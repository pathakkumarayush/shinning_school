<script type="text/javascript" src="jquery.js"></script>
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
if(window.focus) {newwindow.focus()}
return false;
}
</script>

<script type="text/javascript">
function add(a)
{
z=document.getElementById("tamt").innerHTML;
b=document.getElementById("lf").value;
var c=parseInt(z)+parseInt(b);
document.getElementById("tamt").innerHTML=c
document.getElementById("myBtn").disabled = true;
}

function addd(a)
{
z=document.getElementById("tamt").innerHTML;
b=document.getElementById("lff").value;
var c=parseInt(z)+parseInt(b);
document.getElementById("tamt").innerHTML=c
document.getElementById("myBtnn").disabled = true;
}

function concess()
{
b1=document.getElementById("tamt").innerHTML;
b2=document.getElementById("ca").value;
var c=parseInt(b1)-parseInt(b2);
document.getElementById("tamt").innerHTML=c
document.getElementById("myBtnn").disabled = true;
}
</script>
<SCRIPT language=Javascript>
    <!--
    function isNumberKey(evt)
    {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
    return true;
    }
    //-->
</SCRIPT>

<script type="text/javascript">
function validateForm()
{
var x=document.forms["myForm"]["amntdeposit"].value;
if (x==null || x=="")
  {
  alert("Amount Deposited must be filled out");
  return false;
  }
}
</script>

<style>
.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup{
  margin: 20px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 60%;
  position: relative;
  transition: all 5s ease-in-out;
}
.popup .close {
  position: absolute;
  top: 0px;
  right: 8px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 90%;
  overflow: auto;
}
.table1{width:100%;}
.table1 tr{ height:25px;}

.tr1{ background-color:#009933;color:#FFFFFF !important; font-size:20px; font-weight:bold}
.td1{}
.tr2{ background-color:#FFFF66; color:#FF0000; font-size:18px}
.tr3{ height:!important; color:#3d14da;}
.tr4{ color:#FF0000}
@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}

</style>

<!--<script>
function showStudent3(val) {
	$.ajax({
	type: "POST",
	url: "get_stater.php",
	data:'student_id='+val,
	success: function(data){
	$("#state-list").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>-->

<script type="text/javascript">
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        if($(this).attr("value")=="Cheque")
		if($(this).attr("value")=="Bank")
		{
            $(".box").not(".red").hide();
            $(".red").show();
        }
        if($(this).attr("value")=="Cash"){
            $(".red").hide();
        }
       
    });
});
</script>

<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>



<?php
$_SESSION['curentmonth']= $_POST['month1']; 

if(isset($_POST['date']))
{
$curdate=$_POST['date'];
}
else
{
$curdate=date('Y-m-d');
}

$fine1=0;
 function dateDiff($startDate, $endDate)
{
// Parse dates for conversion
$startArry = date_parse($startDate);
$endArry = date_parse($endDate);

// Convert dates to Julian Days
$start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]);
$end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]);

// Return difference
return round(($end_date - $start_date), 0);
}
session_start();
if(!empty($_SESSION['sumsg']))
{
  unset($_SESSION['sumsg']);
}

			    if(isset($_POST['search1']))
				{
				if((empty($_POST['scholarno1'])) || ($_POST['month1']=="-1"))
				{
			    $err="Field  marked with * are mandatory";
				}
				if(empty($err))
				{	  
				$search1=mysqli_query($con,"select * from student where student_scholar='".$_POST['scholarno1']."' and student_session='".$_SESSION['session']."'  and student_school='".$_SESSION['uid']."'");
			    $num1= mysqli_num_rows($search1);
				$studrow=mysqli_fetch_array($search1);
				$_SESSION['month1']=$_POST['month1'];
			    $_SESSION['studentid']=$studrow['student_id'];
				 
				/* $ckfee=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and session='".$_SESSION['session']."' and month='".$_SESSION['month1']."'");
	            $numchk=mysqli_num_rows($ckfee);
				*/
				
				$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
		        
				$explode2=array();
			    while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			    {
			      
				$ex4=explode(",",$rowdistinctmonth['month']);
			    if(in_array($_SESSION['month1'], $ex4)) 
				{
			    $numchk=1; 
                break;
			      }
		          else
				    {
					  
					  $numchk=0;
					
					}
			
			
			
			}	
				
				
		//query to check previous month fee
		
			$montharray=array();
			$prev=mysqli_query($con,"select * from month where month='".$_SESSION['month1']."'");	 
			$rowprev=mysqli_fetch_array($prev);	 
			$prev2=mysqli_query($con,"select * from month where id<'".$rowprev['id']."'");	 
			
			$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
			
			$explode2=array();
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{
			
			//$explode2=explode(",",$rowdistinctmonth['month']);
			$xplode3=array_push($explode2,$rowdistinctmonth['month']);
			}
			$imp2=implode(",",$explode2);
			$explode4=explode(",",$imp2);
			
			
			while($rowprev2=mysqli_fetch_array($prev2))
			{
			  
			     if(in_array($rowprev2['month'], $explode4)) 
				  {
                   
                    }
		          else
				    {
					  
					 $montharr1=array_push($montharray,$rowprev2['month']);
					}
			
			
		
			} 
		
			
				 $exam=mysqli_query($con,"select * from exam_fee where month='".$_SESSION['month1']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$studrow['student_class']."'");
				
					$examrow=mysqli_fetch_array($exam);
                 
				
$search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."'");
$num=mysqli_num_rows($search);
			 
			 }
			}
			 
			 
			   if(isset($_POST['search7']))
				{
				    if($_POST['month1']=="-1")
				   {
				     $err="Field  marked with * are mandatory";
				   }
				  
				
				  if(empty($err))
				  {	  
				 $search1=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."'  and student_school='".$_SESSION['uid']."'");
			     $num1= mysqli_num_rows($search1);
				 $studrow=mysqli_fetch_array($search1);
				  $imp_mnth=implode(",",$_POST['month1']);
				 $_SESSION['month1']= $imp_mnth;
				 $_SESSION['studentid']=$studrow['student_id'];
				 
				/* $ckfee=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and session='".$_SESSION['session']."' and month='".$_SESSION['month1']."'");
	            $numchk=mysqli_num_rows($ckfee);
				*/
				
				$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
		
			$explode2=array();
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{
			      
				  $ex4=explode(",",$rowdistinctmonth['month']);
				 
				    if(in_array($_SESSION['month1'], $ex4)) 
				  {
				     
                      $numchk=1; 
                      break;
			      }
		          else
				    {
					  
					  $numchk=0;
					
					}
			
			
			
			}	
				
				
		//query to check previous month fee
		
			$montharray=array();
			$prev=mysqli_query($con,"select * from month where month='".$_SESSION['month1']."'");	 
			$rowprev=mysqli_fetch_array($prev);	 
			$prev2=mysqli_query($con,"select * from month where id<'".$rowprev['id']."'");	 
			
			$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
			
			$explode2=array();
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{
			
			//$explode2=explode(",",$rowdistinctmonth['month']);
			$xplode3=array_push($explode2,$rowdistinctmonth['month']);
			}
			$imp2=implode(",",$explode2);
			$explode4=explode(",",$imp2);
			
			
			while($rowprev2=mysqli_fetch_array($prev2))
			{
			  
			     if(in_array($rowprev2['month'], $explode4)) 
				  {
                   
                    }
		          else
				    {
					  
					 $montharr1=array_push($montharray,$rowprev2['month']);
					}
			
			
		 /*
			  $prevfee=mysqli_query($con,"select * from fee_detail where month='".$rowprev2['month']."' and student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
			 
			  if(mysqli_num_rows($prevfee)<1)
			      {
				
				    $combinemonth2=mysqli_query($con,"select * from combinemonth where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and month='".$rowprev2['month']."' and class='".$studrow['student_class']."'");
                $rowconmonth2=mysqli_fetch_array($combinemonth2);
				 
				   
				           
				 }
			 
			  }  
			  */ 
			} 
			//*********************************************
			
				 $exam=mysqli_query($con,"select * from exam_fee where month='".$_SESSION['month1']."' and session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and class='".$studrow['student_class']."'");
				
					$examrow=mysqli_fetch_array($exam);
                 
				
$search=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."'");
$num=mysqli_num_rows($search);
}
}
?>
			 
			 
			 
<?php
if(isset($_POST['pay']))
{
$res_up=mysqli_query($con,"update fee_detail set session='".$_POST["ses"]."',class='".$_POST["class"]."',inst_fee='".$_POST["inst_fee"]."',tamnt='".$_POST["amt"]."',tpay='".$_POST["amt"]."',fee_deposit='".$_POST["amntdeposit"]."'
,month='".$_POST['montha']."',student='".$_POST['student']."',date='".$_POST['curdate5']."',latefee='".$_POST['latefee']."',receiptno='".$_POST['srecipt']."',instalment='".$_POST['inst']."',remark='".$_POST['rmk']."',name='".$_POST['name']."',
concession='".$_POST['concession']."' where id='".$_POST["id"]."'")or die(mysqli_error());
$msg="Fee Update Successfully"; 
}
?>

<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
  } 
</script>
<style>
.enquiry{ width:100%; height:45px;background-color:#FFFFFF; margin-top:10px; border:4px #bd1b93 solid;}

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
:-ms-input-placeholder 
{
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
	border-radius:4px !important;
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
    background: #c3176e;
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
    background: #c3176e;
    color: #fff;
   }

.row-fluid .span6 {
    width: 48%;
	float:left;
   
    margin-top: 10px;
    margin-left: 5px;
}
#div1{ display:none;}
#div2{ display:none;}

.table td {
    background: #f979e9b3;
    border-bottom: solid 1px #e0e0e0;
    padding: 8px 10px;
}
.table td:hover {
    background: #f979e9b3;
    border-bottom: solid 1px #e0e0e0;
    padding: 8px 10px;
}
</style>
 <div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="fh.png" /><a href="./?pageid=fee_home" style="float:right;">
        <input type="submit" name="hfg" value="Go Back" style="width:150px;border:2px #fff solid; margin-top:85px; font-size:16px; font-weight:bold;"></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:55px; height:40px; margin-top:2px;"/>
        <h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px; color:#CC0099;">&nbsp;&nbsp;Student Edit Fee Pay</h2>
		<!--<a href="./?pageid=pay_tfee" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px"></a>-->
        </div>
		

<div class="col_4">
	
	<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return validateForm()" >
          <?php
	      if(!empty($error_msg))
		  {
		  require_once("add_stud.php");?>
		  <div class="error" style="width:250px; height:auto; border-radius:5px" ><?php failure_message($error_msg,"","100%","none");?></div>
		  <?php  
		  } 
          if(!empty($msg))
	      {
		  ?>
          <div class="success" style="width:250px; height:10px; border-radius:5px" ><span style="font-size:16px; color:#000000; font-weight:bold;"><?php echo $msg;   ?></span></div>
		  <?php
		  }
	      ?>
          <?php
	      if(!empty($err))
		  {
		  ?>				
		  <div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		  <?php  } ?>
          <br>
          
		  <div class="box-head" style="margin-top:-20px;background-color:#c3176e;">
		  <a href="./?pageid=pay_fee" style="color:#FFFFFF;font-size:18px; ">Pay Tution Fee</a>&nbsp;&nbsp;
		  <?php /*?><a href="./?pageid=pay_feen" style="color:#FFFFFF;font-size:18px">Search By Sch No</a><?php */?>
		  </div>
          
		  
		  
		  
		  
		  <?php
          if(!empty($_GET['id']))
		  {
		
		  $efee=mysqli_query($con,"select * from  fee_detail where id='".$_GET['id']."' ");
		  $rowefee=mysqli_fetch_array($efee); 
		  
		  
		  $maxid=mysqli_query($con,"select max(id) from fee_detail");
		  $rowid=mysqli_fetch_array($maxid);
		  $rowid['max(id)']+1; 
		  ?>
		  
		 
		 
          <div id="txtHint1">
          <div class="table" style="border:#FF0000 0px solid; height:auto; margin:30px 0px 0px 100px;text-transform:uppercase;">
          <table width="60%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px; text-transform:uppercase">
		 
		  <tr>
		  <td style="font-weight:bold;">Student Name</td>
		  <td><input type="text" name="name" value="<?php echo $rowefee['student']; ?>" style="width:140px" /> </td>		
		  
		  <td style="font-weight:bold;">Class</td>
		  <td><input type="text" name="class" value="<?php echo $rowefee['class']; ?>" style="width:140px" /> </td>					
		  </tr>
		 
		 
		 
		 
		  <tr>
		  <td style="font-weight:bold;">Receipt No</td>
		  <td> <input type="text" name="srecipt" style="width:140px"  value="<?php echo $rowefee['receiptno']; ?>"  readonly="readonly" required/></td>
		  	
		  <td style="font-weight:bold;">Admission No</td>
		  <td><input type="text" name="sch" value="<?php echo $rowefee['sch']; ?>" style="width:140px"  readonly="readonly"/>
		     <input type="hidden" name="student" value="<?php echo $rowefee['student']; ?>" style="width:140px" />
			 <input type="hidden" name="id" value="<?php echo $rowefee['id']; ?>" style="width:140px" />
			 
		  </td>
		  </tr>
        
		  <tr>
		  <td style="font-weight:bold;">Instalment</td>
		  <td><input type="text" name="inst" value="<?php echo $rowefee['instalment']; ?>" style="width:140px" /> </td>		
		  
		  <td style="font-weight:bold;">Session</td>
		  <td><input type="text" name="ses" value="<?php echo $rowefee['session']; ?>" style="width:140px" /> </td>					
		  </tr>
		  
		  <tr>
		  <td style="font-weight:bold;">Month</td>
		  <td><input type="text" name="montha" value="<?php echo $rowefee['month']; ?>" style="width:140px" /> </td>		
		
		  <td style="font-weight:bold;">Date</td>
		  <td><input type="text" name="curdate5" value="<?php echo date('Y-m-d'); ?>" style="width:140px" /> </td>		
		  			
		  </tr>
		
		  <tr>
		  <td>Tution Fee</td>
		  <td><input type="text" name="inst_fee" value="<?php echo $rowefee['inst_fee']; ?>" style="width:140px" /></td>
		  <td>Privious Due</td>
		  <td><input type="text" name="pdue" value="<?php echo $rowefee['pdue']; ?>" style="width:140px" /></td>
		  </tr>
	
		  <tr>
		  <td>Conc. Fee</td>
		  <td><input type="text" name="concession" value="<?php echo $rowefee['concession']; ?>" style="width:140px" /></td>
		  <td>Other/Fine Fee</td>
		  <td><input type="text" name="latefee" value="<?php echo $rowefee['latefee']; ?>" style="width:140px" /></td>
		  </tr>
		  
		  
		  <tr>
		  <td>Total Fee Pay</td>
		  <td><input type="text" name="amt" value="<?php echo $rowefee['tamnt']; ?>" style="width:140px" /></td>
		  <td>Fee Deposit</td>
		  <td><input type="text" name="amntdeposit" value="<?php echo $rowefee['fee_deposit']; ?>"  style="width:140px" required/></td>
		  </tr>
		  
		  <tr>
		  <td>Remark</td>
		  <td colspan="3"><textarea name="rmk" cols="55" rows="3"><?php echo $rowefee['remark']; ?></textarea></td>
		  
		  </tr>
	
		  
		  <tr>
          
		  <td>&nbsp;</td>
		  <td colspan="3"><input type="submit" name="pay"  style="width:100px" value="Pay Fee"></td>
		  </tr>
		  </table>
		  </div>
          </div>
          <?php
	      }
	      ?>
          <div>

<?php
if(!empty($insertid))
{
?>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/getreceipt.php?id=<?php echo $_SESSION['studentid']; ?>')">
<input type="button" value="Print Receipt" style="width:200px; margin-left:0px; margin-top:15px">
</a>
</td>
<?php
}
?>
		
</div>
		
</form>



			





<?php
if($num1>0)
{
$c= count($montharray);
if($c>1)
{
?>
<div style="height:850px"></div>
<?php
}
else
{
?>
<div style="height:850px"></div>
<?php
}
}
else
{
?>
<div style="height:180px"></div>
<?php
}
?>

</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

<br /><br /><br />