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
<script language="javascript">
function getValues(val){
var numVal1=parseInt(document.getElementById("one").value);
var numVal2=parseInt(document.getElementById("two").value);
var numVal3=parseInt(document.getElementById("three").value);
var numVal4=parseInt(document.getElementById("four").value);


var totalValue = numVal1 + numVal2 + numVal3 - numVal4;
document.getElementById("main").value = totalValue;
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

<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
//session_start();
$_SESSION['curentmonth']= isset($_POST['month1']) ? $_POST['month1'] : null;
$j= 0;

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
$num1 = 0;
if(!empty($_SESSION['sumsg']))
{
  unset($_SESSION['sumsg']);
}

               if(isset($_POST['search7']))
			   {
			   if(isset($_POST['month1']) && $_POST['month1']=="-1")
			   {
			   $err="Field  marked with * are mandatory";
			   }
			   if(empty($err))
			   {	  
			   $search1=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."'  and student_school='".$_SESSION['uid']."'");
			   $num1= mysqli_num_rows($search1);
			   $studrow=mysqli_fetch_array($search1);
			   $imp_mnth=isset($_POST['month1']) ? implode(",",$_POST['month1']) : [];
			   $_SESSION['month1']= $imp_mnth;
			   $_SESSION['studentid']=$studrow['student_id'];
				 
				$distinctmonth=mysqli_query($con,"select distinct(month) from fee_detail_board where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
		
			$explode2=array();
			while($rowdistinctmonth=mysqli_fetch_array($distinctmonth))
			{}	
			$montharray=array();
           }
$month = is_array($_SESSION['month1']) ? implode(',', $_SESSION['month1']) : $_SESSION['month1'];
$search=mysqli_query($con,"select * from fee_detail_board where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."'");
$num=mysqli_num_rows($search);
}
?>

			 
<?php
if(isset($_POST['pay']))
{
$datee=$_POST['curdate5'];    
$m=date("M");
$receptno=mysqli_query($con,"select * from fee_detail_board where receiptno='".$_POST['srecipt']."' and session='".$_SESSION['session']."'");
if(mysqli_num_rows($receptno)<1)
{
$query=mysqli_query($con,"insert into fee_detail_board(session,class,name,fname,sch,student,board_fee,practical_fee,pay_type,fee_deposit,date,school,receiptno,current_month,remark,sreceipt,
concession,month,latefee)
values('".$_POST['ses']."','".$_POST['clas']."','".$_POST['nnm']."','".$_POST['fname']."','".$_POST['sch']."','".$_POST['student']."','".$_POST['board_fee']."','".$_POST['practical_fee']."','".$_POST['ftype']."','".$_POST['amtdeposit']."','$datee','".$_SESSION['uid']."','".$_POST['srecipt']."','$m','".$_POST['remarks']."','".$_POST['sreceipt']."','".$_POST['conc']."','".$_POST['montha']."','".$_POST['fine']."')");
 $insertid = mysqli_insert_id($con);
        
		//$sub="Fee Paid";	
    		
		//$sub="Fee Paid";	
    	//$nmsg="Thank you for paying fees of your child ".$_POST['nnm'].". Amount received ".$_POST["amtdeposit"].".";	
		//$session=$_SESSION['session'];
		//$page=1;
		//$r=sms($con,$_SESSION["uid"],$_POST['student'],$sub,$nmsg,'Yes',$session,$page);


		//$msg="Fee Paid Successfully"; 
	    }
		else
	    {
	    $msg="Receipt Number already exist";
		}
		
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
        <div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=board_home" style="float:right;">
        <input type="submit" name="hfg" value="Go Back" style="width:150px;border:2px #fff solid; margin-top:85px; font-size:16px; font-weight:bold;"></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="images/enquiry.png"  style=" float:left; width:55px; height:40px; margin-top:2px;"/>
        <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px; color:#CC0099;">Student Fee Pay</h2></center>
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
          <br clear="all">
          <br clear="all">
		  <?php
if(!empty($insertid))
{
?>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/getreceiptb.php?id=<?php echo $_SESSION['studentid']; ?>')">
<input type="button" value="Print Receipt" style="width:200px; margin-left:0px; margin-top:-34px; position:absolute">
</a>
</td>
<?php
}
?> <br clear="all"> <br clear="all">
		  
		  <div class="box-head" style="margin-top:-20px;background-color:#c3176e;">
		  <a href="./?pageid=pay_fee_board" style="color:#FFFFFF;font-size:18px; ">Pay Tution Fee</a>&nbsp;||&nbsp;
		 
		  </div>
          <?php
		  if(!isset($_POST['visible']))
		  {
		  ?>
          <div style="width:100%;">
          <div style="float:left; width:100%; background-color:#fff">
		 
		  <table style="margin:20px 0px 0px 20px">
		  <tr>
          <td style="font-weight:bold;">Student Class<span class="textfieldRequiredMsg"></span></td>
          <?php
          $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and status='0'");
		  ?>
          <td><select name="class" class="select" style="width:200px" onchange="showStudent(this.value)">
          <option value="-1">Select class</option>
          <?php
		  while($rclass=mysqli_fetch_array($class))
		  {
		  ?>
           <option value="<?php echo $rclass['class_id']; ?>" <?php if(isset($_SESSION['student_class']) && $_SESSION['student_class']==$rclass['class_id']) { ?> selected="selected" <?php } ?> ><?php echo $rclass['class']; ?></option>
          <?php
		  }
		  ?>
          </select>
          </td>
          </tr>
		  <tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		  <tr>
		  <td style="font-weight:bold;">Student Name</td> 
		  <td><select name="stdid" class="select" style="width:200px" onchange="showStudent3(this.value)">
          <option>Select Student</option>
          <?php
          $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class_id='".$_SESSION['student_class']."'");
          $rclass=mysqli_fetch_array($class);
          $search=mysqli_query($con,"select * from student where status='0' and student_class='".$rclass['class']."' and student_session='".$_SESSION['session']."' order by student_name Asc");
          while($row=mysqli_fetch_array($search))
          {
          ?>
          <option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name'].'-'.$row['student_fname']; ?></option>  
          <?php
          }
          ?>
          </select>
		  </td>
          </tr>
		   <tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		  <tr>
		  <td style="font-weight:bold;"></td>
		  <td> 
		  <div id="txtHint2" >
		  
		  
		  </div>
		  </td>
		  </tr>
		 <tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		  <tr> 
		  <td style="font-weight:bold;">Date</td>
		  <td>
		  <input type="hidden" name="visible" value="0" >
		  <input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" class="tb5" style="width:175px" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" required />yyyy-mm-dd</td>
		  </tr>
		  <tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		  <tr>  
		  <td>&nbsp;</td>
		  <td><input type="submit" name="search7" value="Proceed To Payment" style="width:190px"></td>   
		  </tr>
		  
		  <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		  
		  
		
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		   
		  </table>
		
		 </div>
		 
		  <?php
		  }
		  ?> 
		 
		  <?php
         if($num1>0)
		  {
		  ?>
		  <table style="margin:20px 0px 0px 100px; font-size:14px; width:600px;">
            
		  <tr>
		  <td style="font-weight:bold;">Receipt No</td>
		  <td>
		  <?php
		  $maxid=mysqli_query($con,"select max(id) from fee_detail_board where school='".$_SESSION['uid']."'");
		  $rowid=mysqli_fetch_array($maxid);
		   $rowid['max(id)']+1; 
		  ?>
		  <input type="text" name="srecipt" style="width:140px"  value="<?php echo $rowid['max(id)']+1; ?>"  readonly="readonly" required/>
		  </td>	
		  <td style="font-weight:bold;">Admission No</td>
		  <td><input type="text" name="sch" value="<?php echo $studrow['student_scholar']; ?>" style="width:140px"  readonly="readonly"/>
		  
		  <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>" style="width:140px"  readonly="readonly"/>
		  <input type="hidden" name="clas" value="<?php echo $studrow['student_class']; ?>" style="width:140px"  readonly="readonly"/>
		  <input type="hidden" name="montha" value="July" style="width:140px"  readonly="readonly"/>
		  </td>
		  </tr>
        
		 <tr>
		 <?php /*?><td style="font-weight:bold;">Collection</td>
		 <td>
	     <select name="colle" class="select" style="width:160px;" required/>
	     <option value="">Select</option>
	     <option value="School">School</option>
	     <option value="Bank">Bank</option>
		 <option value="Online">Online</option>
	     </select>
		 </td>		<?php */?>
		 <td style="font-weight:bold;">Student Name</td>
		 
		 <td><input type="text" name="nnm" value="<?php echo $studrow['student_name']; ?>" style="width:140px"  readonly="readonly"/>
		     <input type="hidden" name="sreceipt" style="width:140px" value="1"/>
		     <input type="hidden" name="ses" style="width:140px" value="<?php echo $_SESSION['session']; ?>"/>
		  </td>	
		  <td style="font-weight:bold;">Student Father</td>
		  <td><input type="text" name="fname" value="<?php echo $studrow['student_fname']; ?>" style="width:140px"  readonly="readonly"/>
		  </td>		
	      </tr>
		  
		   
          <!--<tr>
          <td>Date:</td>-->
         <?php $curdate; ?><input type="hidden" name="curdate5" value="<?php  echo $curdate; ?>"></td>
         
         <?php $_SESSION['session']; ?></td>
          
          </table>
          <div id="txtHint1">
          <div class="table" style="border:#FF0000 0px solid; height:auto; margin:30px 0px 0px 100px">
          <table width="60%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
		  <tr style="font-weight:bold">
		  <td>Sr.No</td>
		  <td>Particulars</td>
		  <td>Amount(Rs)</td>
		  </tr>
		 
		  <tr>
		  <td></td>	
		  <td style="color:rgb(53, 0, 255)">
		  Board Fee
		  </td>
		  <td>
		  <input class="numbox" type="text" name="board_fee" id="one" value="0" onkeyup="getValues(1)" />
		  </td>
		  </tr>
		 
		  <tr>
		  <td></td>	
		  <td style="color:rgb(53, 0, 255)">
		  Practical Fee
		  </td>
		  <td>
		 <input class="numbox" type="text" name="practical_fee" id="two" value="0" onkeyup="getValues(2)"/>
		 </td>
		  </tr>
		  
		  <tr>
		  <td></td>	
		  <td style="color:rgb(53, 0, 255)">
		  Fine/Late Fee
		  </td>
		  <td>
		  <input class="numbox" type="text" name="fine" id="three" value="0" onkeyup="getValues(6)"/>
		  </td>
		  </tr>
		  
		  
		  
		  <tr>
		  <td></td>	
		  <td style="color:rgb(53, 0, 255)">
		  Concession Fee
		  </td>
		  <td>
		  <input class="numbox" type="text" name="conc" id="four" value="0" onkeyup="getValues(7)"/>
		  </td>
		  </tr>
		  
		  
		  
	    
		  <tr>
		  <td></td>
		  <td style="color:#CC0000">Fee Type</td>
		  <td> 
		  <select name="ftype" required class="select">
		  <option value="">Select Fee Type</option>
		  <option value="Cash">Cash</option>
		  <option value="Online">Online</option>
		  </select>
		  </td>
	      </tr>	
		  <tr>
		  <td>
		  </td>
		  <td></td>
		  <td> 
		  <div class="red" style="display:none">
		  <input type="text" name="cno" class="tb5" placeholder="Cheque No"/>
		  <br />  <br />
		  <input type="text" name="cd" class="tb5" placeholder="Dated"/>
		  </div>
          </tr>   
		  
		  <tr>					
		  <td></td> 
		  <td>Total Amount <br>&nbsp;<br>&nbsp;</td>
	      <td><textarea style="mainbox" id="main" value="" name="amtdeposit"></textarea></td>
		  </tr>
		  
		  <tr>					
		  <td></td> 
		  <td>Remarks <br>&nbsp;<br>&nbsp;</td>
	      <td><textarea name="remarks" cols="20" rows="3"></textarea></td>
		  </tr>
		  <tr>
          <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td><input type="submit" name="pay"  style="width:100px" value="Pay Fee"></td>
		  </tr>
		  </table>
		  </div>
          </div>
          <?php
	      }
	      ?>
          <div>	
</div>
</form>
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

<br /><br /><br />