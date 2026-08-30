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
if((!empty($_POST['latefee1']))|| (!empty($_POST['concession'])) || (!empty($_POST['concession'])) )
{
	  
	 $_POST['amt']=$_POST['amt']+$_POST['latefee1']+$_POST['cba'];
	 $_POST['amt']=$_POST['amt']-$_POST['concession'];
	 
	 //$_POST['amt']=$_POST['amt']-$_POST['amntdeposit'];
	  }
	  
	  
	 if($_POST['amntdeposit']<$_POST['amt'])
	  {
	  $due=$_POST['amt']-($_POST['amntdeposit']);
	  } 
	  
	  
	  if($_POST['montha']=='July,October,January')
	  {
	  $instn='Instalment1,Instalment2,Instalment3';
	  }
	  
	  if($_POST['montha']=='October,January')
	  {
	  $instn='Instalment2,Instalment3';
	  }
	  
	   if($_POST['montha']=='July,October')
	  {
	  $instn='Instalment1,Instalment2';
	  }
	 
	  if($_POST['montha']=='July')
	  {
	  $instn='Instalment1';
	  }
	  if($_POST['montha']=='October')
	  {
	  $instn='Instalment2';
	  }
	  
	  if($_POST['montha']=='January')
	  {
	  $instn='Instalment3';
	  }
	 

	  $_POST['latefee1'] = $_POST['latefee1']+$_POST['arrears'];
      $datee=$_POST['curdate5'];    
      $_POST['montha']=$_SESSION['month1'];
      if($_POST['amntdeposit'] > $_POST['amt'])
	  {
	  $extra=$_POST['amntdeposit']-$_POST['amt'];
	  }
	  $m=date("M");
$receptno=mysqli_query($con,"select * from fee_detail where receiptno='".$_POST['srecipt']."' and session='".$_SESSION['session']."'");
if(mysqli_num_rows($receptno)<1)
{
//$instn = $_POST['montha'];
$query=mysqli_query($con,"insert into fee_detail(session,class,adm_fee,caution,inst_fee,tamnt,tpay,due,pdue,pay_type,fee_deposit,month,student,date,latefee,concession,school,receiptno,current_month,instalment,extra_amnt,remark,cno,cd,padv,sch,bank,ne_no,ndat,colle,cba,cbno,name,ptype)
values('".$_POST['ses']."','".$_POST['class']."','".$_POST['admissionfee']."','".$_POST['cm']."','".$_POST['inst_fee']."','".$_POST['amt']."','".$_POST['tamount']."','$due','".$_POST['pdue']."','".$_POST['ftype']."','".$_POST['amntdeposit']."','".$_POST['montha']."','".$_POST['student']."','$datee','".$_POST['latefee1']."','".$_POST['concession']."','".$_SESSION['uid']."','".$_POST['srecipt']."','$m',
'$instn','$extra','".$_POST['remarks']."','".$_POST['cno']."','".$_POST['dat']."','".$_POST['padv']."','".$_POST['sch']."','".$_POST['bank']."','".$_POST['ne_no']."','".$_POST['ndat']."','".$_POST['colle']."',
'".$_POST['cba']."','".$_POST['cbno']."','".$_POST['nnm']."','exp')");


        $insertid=mysqli_insert_id();
	    if(!empty($_POST['admissionfee']))
	    {
		$update=mysqli_query($con,"update student set addmisionfee='No' where student_id='".$_POST['student']."' and student_school='".$_SESSION['uid']."'");
		$update=mysqli_query($con,"update fee_detail set admissionfee='Yes' where id='$insertid' and school='".$_SESSION['uid']."'");
		} 
	    if(!empty($_POST['activity']))
	    {
		$update=mysqli_query($con,"update student set cm='No' where student_id='".$_POST['student']."' and student_school='".$_SESSION['uid']."'");
		} 
		
		$sub="Fee Paid";	
    		
		//$nmsg="Thanks for Paying Fee For the $instn. Received amount ".$_POST['amntdeposit'];	
		//$session=$_SESSION['session'];
		//$page=1;
		//$r=sms($_SESSION["uid"],$_POST['student'],$sub,$nmsg,'Yes',$session,$page);

		$msg="Fee Paid Successfully"; 
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
        <div class="left_sect"><img src="fh.png" /><a href="./?pageid=fee_home" style="float:right;">
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
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/shining/school/getreceipt.php?id=<?php echo $_SESSION['studentid']; ?>')">
<input type="button" value="Print Receipt" style="width:200px; margin-left:0px; margin-top:-34px; position:absolute">
</a>
</td>
<?php
}
?> <br clear="all"> <br clear="all">
		  
		  <div class="box-head" style="margin-top:-20px;background-color:#c3176e;">
		  <a href="./?pageid=pay_feey" style="color:#FFFFFF;font-size:18px; ">Pay Yearly Expenses Fee</a>&nbsp;&nbsp;
		  <?php /*?><a href="./?pageid=pay_feen" style="color:#FFFFFF;font-size:18px">Search By Sch No</a><?php */?>
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
          $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
		  ?>
          <td><select name="class" class="select" style="width:200px" onchange="showStudent(this.value)">
          <option value="-1">Select class</option>
          <?php
		  while($rclass=mysqli_fetch_array($class))
		  {
		  ?>
          <option value="<?php echo $rclass['class_id']; ?>" <?php if($_SESSION['student_class']==$rclass['class_id']) { ?> selected="selected" <?php } ?> >
		  <?php echo $rclass['class']; ?></option>
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
          //$student=mysqli_query($con,"select * from student where class='".$studrow['student_class']."' and session='".$_SESSION['cursession']."'");
		 
		  if($num1>0)
		  {
		  ?>
		  <table style="margin:20px 0px 0px 100px; font-size:14px; width:600px;">
            
		  <tr>
		  <td style="font-weight:bold;">Receipt No</td>
		  <td>
		  <?php
		  $maxid=mysqli_query($con,"select max(id) from fee_detail where school='".$_SESSION['uid']."'");
		  $rowid=mysqli_fetch_array($maxid);
		   $rowid['max(id)']+1; 
		  ?>
		  <input type="text" name="srecipt" style="width:140px"  value="<?php echo $rowid['max(id)']+1; ?>"  readonly="readonly" required/>
		  </td>	
		  <td style="font-weight:bold;">Admission No</td>
		  <td><input type="text" name="sch" value="<?php echo $studrow['student_scholar']; ?>" style="width:140px"  readonly="readonly"/>
		  <input type="hidden" name="nnm" value="<?php echo $studrow['student_name']; ?>" style="width:140px"  readonly="readonly"/>
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
		 <td style="font-weight:bold;">Session</td>
		 <td>
	     <select name="ses" class="select" style="width:160px;" required/>
	     <option value="<?php echo $_SESSION['session']; ?>"><?php echo $_SESSION['session']; ?></option>
	    
	     </select>
		  </td>					
		  </tr>
		  
		   
          <!--<tr>
          <td>Date:</td>-->
         <?php $curdate; ?><input type="hidden" name="curdate5" value="<?php  echo $curdate; ?>"></td>
         
         <?php $_SESSION['session']; ?></td>
          
		  
           
		 
		  <?php
		  if(!empty($montharr1))
		  {
		  //$brr23=array_push($montharray);
		  $count2=count($montharray);
		  $imp=implode(",",$montharray);
		  $imp.",".$_SESSION['month1'];
		  $count2+1;
		  }
		  else if(!empty($rowcom['combinemonth']))
		  {
		  $_SESSION['month1'].",".$rowcom['combinemonth'];
		  }
		  else
		  {
		  $_SESSION['month1'];
		  }
		  ?>  
		
		  
		  
          
		  </table>
          <div id="txtHint1">
          <div class="table" style="border:#FF0000 0px solid; height:auto; margin:30px 0px 0px 100px">
          <table width="60%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
		  <?php		
		  if(!empty($rowcom['combinemonth']))
		  {
		  array_push($montharray,$_SESSION['month1'],$rowcom['combinemonth']);
		  }
		  else
	      {
		  array_push($montharray,$_SESSION['month1']);
		  }
		  $brr=array();
		  //foreach($montharray as $m)
		 ?>
		 
		  <?php
		  $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' and ptype='exp' order by id desc limit 1"); 
		  $duerow=mysqli_fetch_array($search1);
		  ?>
		  
		  <?php
		  $yr=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' and ptype='exp'"); 
		  while($rowyr=mysqli_fetch_array($yr))
		  {
		  $ye+=$rowyr['fee_deposit'];
		  }
		  ?>
		 
		 
		  <?php
		   
		   if(empty($duerow['due']))
		   {
		 
		    $admissionfee=mysqli_query($con,"select * from cautionfee where session='".$_SESSION['session']."' and class='".$studrow['student_class']."'");
		  $rowadmission=mysqli_fetch_array($admissionfee);   
		  ?>
		  <tr>
		  <td></td>	
		  <td style="color:rgb(53, 0, 255)">
		   Yearly Expenses Fee
		  </td>
		  <td>
		  <?php echo $rowadmission['fee']-$ye; ?>  
		  <input type="hidden" name="cm" value="<?php echo $rowadmission['fee']; ?>" style="width:75px;">
		  </td></tr>
		  <?php
		  $val1+=$rowadmission['fee']-$ye;
		  $j=$j+1;
		  }
		  ?>
		  
		 
		  <?php
		  $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' and ptype='exp' order by id desc limit 1"); 
		  $duerow=mysqli_fetch_array($search1);
		  ?>
		  
		  
		  
		  
		  <?php
		   if(!empty($duerow['due']))
		   {
		   ?>
		  <tr>
		  <td>&nbsp;</td>
		  <td><b>Previous Due(Rs)</b></td>
		  <td><b>
		  <?php
		  echo $duerow['due']; 
		  ?></b>
		  <input type="hidden" name="pdue" value="<?php echo $duerow['due'];  ?>">
		  </td>
		  </tr>			
		  <?php
		  }
		  ?>
		 
		 
		  <tr>
		  <td><?php //echo $j+2; ?></td>
		  <td><b>Other/Late Fee(Rs)</b></td>
		  <td><b>
		  <input type="text" id="lf" name="latefee1" class="tb5" style="width:100px" onkeypress="return isNumberKey(event)" />
		  </b>
		  <input type="button" name="latefee" id="myBtn" onclick="add(<?php echo $val1+$duerow['due']+$_SESSION['fine']; ?>)" value="Add"   />
		  <input type="hidden" name="currentsession" value="<?php echo $_SESSION['curentmonth']; ?>">
		  </td>
	      </tr>
		  
		  <tr>
		  <td><?php //echo $j+2; ?></td>
		  <td><b>Cheque Bounce</b></td>
		  <td><b>
		  <input type="text" id="lff" name="cba" class="tb5" style="width:100px" onkeypress="return isNumberKey(event)" />
		  </b>
		  <input type="button" name="latefeee" id="myBtnn" onclick="addd()" value="Add"   />
		  
		  <input type="text" name="cbno" class="tb5" style="width:120px" placeholder="Cheque No."/>
		   <i
		  
		  </td>
	      </tr>
		  
		  <tr>
		  <td><?php //echo $j+3; ?></td>
		  <td><b>Concession Amount(Rs)</b></td>
		  <td><b><input type="text" name="concession" id="ca" class="tb5" style="width:100px" onKeyPress="return isNumberKey(event)" />	</b>
		  <input type="button" id="myBtnn" name="latefee" onclick="concess()" value="Add"   />
		  </td>
		  </tr>	
		  <tr>
		  <td>&nbsp;</td>
		  <td><b>Total Amount(Rs)</b></td>
		  <td><div><?php echo $val1+$duerow['due']+$fine1; ?></div>
		  <input type="hidden" id="tamount" name="tamount" value="<?php echo $val1+$duerow['due']+$fine1; ?>">
	    
		  </td>	
		  </tr>     
		  <input type="hidden" name="student" value="<?php echo $studrow['student_id']; ?>">
		  <input type="hidden" name="class" value="<?php echo $studrow['student_class']; ?>">						
		  <input type="hidden" name="month" value="<?php echo $_SESSION['month1']; ?>">
													   
		  <?php
          if($duerow['extra_amnt']>0)
		  {
		  ?>
		  <tr>
		  <td>&nbsp;</td>
		  <td><b>Amount In Advance(Rs)</b></td>
		  <td><b>
		  <?php
		  $val1=$val1-$duerow['extra_amnt'];
	      echo $duerow['extra_amnt']; 
	      ?></b>
	      <input type="hidden" name="padv" value="<?php echo $duerow['extra_amnt']; ?>">
	      </td>
	      <td></td>
	      </tr>
	      <?php
          }
		  ?>		
          <tr>
		  <td>
		  </td>
		  <td>
		  <td>
		  <input type="hidden" name="activity" value="<?php echo $atv; ?>" style="width:75px;">
		  <input type="hidden" name="maint" value="<?php echo  $tmnfee; ?>" style="width:75px;">
		  <input type="hidden" name="lab" value="<?php echo  $tlabfee; ?>" style="width:75px;">
		  <input type="hidden" name="inst_fee" value="<?php echo $tmm; ?>" style="width:80px;">
		  <input type="hidden" name="assess" value="<?php echo $taasfee; ?>" style="width:80px;">
		  </td>
		  </tr>  
          <tr>
		  <td>&nbsp;</td>
		  <td><b>Amount To Pay(Rs)</b></td>
		  <td><div id="tamt"><?php echo $val1+$duerow['due']+$fine1; ?></div>
		  <input type="hidden" name="amt" value="<?php echo $val1+$duerow['due']+$_SESSION['fine']; ?>">
		  </td>					
		  </tr>
		  
		   <tr>
		  <td>  
		  <input type="hidden" name="montha" value="<?php  if(!empty($imp)) { echo $imp.",".$_SESSION['month1']; }
		  else if(!empty($rowcom['combinemonth']))
		  {
		  echo $_SESSION['month1'].",".$rowcom['combinemonth'];
		  }
		  else
		  {
		  echo $_SESSION['month1'];
		  }
		  ?>" />
		  </td>
		  <td><b>Amount Deposited</b> <span style="color:#FF0000">*</span></td>
		  <td><input type="text" name="amntdeposit" class="tb5" style="width:100px" onKeyPress="return isNumberKey(event)"></td>
		  </tr>
		 
		 
		  <tr>					
		  <td></td> 
		  <td><b>Remarks</b> <br>&nbsp;<br>&nbsp;</td>
	      <td><textarea name="remarks" cols="20" rows="3"></textarea></td>
		  </tr>
		  
		  <tr>
		  <td></td>
		  <td style="color:#CC0000; font-weight:bold;">Pay Mode</td>
		  <td> 
		  <label><input type="radio" name="ftype" value="Cash" checked="checked">Cash</label>
          <label><input type="radio" name="ftype" value="Cheque">Cheque</label>
          <label><input type="radio" name="ftype" value="Online">Online</label>

		 
		 
	<div class="Cheque box">
	<input type="text" name="cno" placeholder='Cheque no' style="width:150px;" /><br />
	<input type="text" name="dat"  placeholder='Date' style="width:150px;"/><br />
	<select name="bank" class="select" style="width:170px;">
	<option value="">Select Bank</option>
	<?php
    $res1=mysqli_query($con,"select distinct(branch) from state");
    while($rowss=mysqli_fetch_array($res1))
    {
	?>
    <option value="<?php echo $rowss["branch"]; ?>"> <?php echo $rowss["branch"]; ?>
    </option>
    <?php
	}  
    ?>
	</select>
	</div>
    <div class="Neft box"><input type="text" name="ne_no" placeholder='Transaction Id' style="width:150px;"/><br />
	<input type="text" name="ndat"  placeholder='Date' style="width:150px;"/></div>
	
		  </td>
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
		
<?php
if($num>0)
{
?>
<div style="border:#CCCCCC 2px solid; margin:40px 0px 0px 0px; height:120px; width:900px;overflow:scroll;">
<?php
while($row=mysqli_fetch_array($search))
{
?>
<div style="width:auto; height:auto; border:#CCCCCC 2px solid; margin:20px 0px 0px 20px; float:left">
<span style="color:#990066; font-size:18px; margin-left:50px"><?php echo ucwords($row['month']); ?></span><br><br>
<span style=" color:#990066;font-size:18px; background-color:#00FF00">Paid:<?php echo $row['fee_deposit']; ?></span>&nbsp;<span style="color:#FFFFFF;font-size:18px; background-color:#FF0000">Due:<?php echo $row['due']; ?></span>
</div> 
<?php
}
?>
</div>
<?php
}

?>
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