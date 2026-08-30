<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script>
jQuery(function($){
  $('#from').datepicker({ dateFormat: 'yy-mm-dd' });
  $('#to').datepicker({ dateFormat: 'yy-mm-dd' });
  $("#date_from_btn").click(function() { 
   $("#date_from").datepicker( "show" );
  });
  $("#date_to_btn").click(function() { 
   $("#date_to").datepicker( "show" );
  });
    });
</script>
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

<script language="javascript">
function getValues(val){
var numVal1=parseInt(document.getElementById("one").value);
var numVal5=parseInt(document.getElementById("five").value);

var totalValue = numVal1 - numVal5;
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



<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }  
</style>


			 
			 
			 
<?php
$_SESSION['studentid'] = $_GET['acn'];
if(isset($_POST['pay']))
{
$datee=$_POST['from'];    
$m=date("M");
$receptno=mysqli_query($con,"select * from fee_detail where receiptno='".$_POST['srecipt']."' and session='".$_SESSION['session']."'");
if(mysqli_num_rows($receptno)<1)
{
$nnm = $_POST['nnm'];
$query=mysqli_query($con,"insert into fee_detail(session,class,name,sch,student,inst_fee,pay_type,fee_deposit,date,school,receiptno,current_month,remark,acn,sreceipt,conc)values('".$_POST['ses']."','".$_POST['clas']."','".$_POST['nnm']."','".$_POST['sch']."','".$_POST['sid']."','".$_POST['tution']."','".$_POST['ftype']."','".$_POST['amtdeposit']."','$datee','".$_SESSION['uid']."','".$_POST['srecipt']."','$m','".$_POST['remarks']."','".$_POST['acn']."','".$_POST['sreceipt']."','".$_POST['conc']."')");
       
	    $insertid=mysqli_insert_id($con);
	    $sub="Fee Paid";	
    		
		//$nmsg="Thanks for Paying Fee For the $instn. Received amount ".$_POST['amntdeposit'];
		//$nmsg="Thank you for paying fees of your child $nm. Amount received ".$_POST["amntdeposit"]."";	
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
		  <a href="./?pageid=pay_ac" target="_blank" style="color:#FFFFFF;font-size:18px">Search By A/C No</a>
		  </div>
         
		  <?php
		  $student_id = $_GET['acn'];
		  $sql=mysqli_query($con,"select * from student where student_id='$student_id' and student_session='".$_SESSION['session']."'");
		  $studrow=mysqli_fetch_array($sql);
		  $account_no = $studrow['sedate'];
		  ?>
		 
		  <table style="margin:20px 0px 0px 100px; font-size:14px; width:600px;">
          <tr>
		  <td style="font-weight:bold;">Student Name</td>
		  <td> <input type="text" name="nnm" value="<?php echo $studrow['student_name']; ?>" style="width:140px"  readonly="readonly"/></td>
		   <td style="font-weight:bold;">Father Name</td>
		  <td> <input type="text" name="fnnm" value="<?php echo $studrow['student_fname']; ?>" style="width:140px"  readonly="readonly"/></td>
		  </tr>
			
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
		 
		  <input type="hidden" name="sid" value="<?php echo $studrow['student_id']; ?>" style="width:140px"  readonly="readonly"/>
		  <input type="hidden" name="clas" value="<?php echo $studrow['student_class']; ?>" style="width:140px"  readonly="readonly"/>
		  </td>
		  </tr>
        
		 <tr>
		 <td style="font-weight:bold;">School Receipt</td>
		 <td><input type="text" name="sreceipt" style="width:140px" required/>
		 <input type="hidden" name="ses" style="width:140px" value="<?php echo $_SESSION['session']; ?>"/>
		  </td>	
		  
		  <td style="font-weight:bold;">Fee Ac. No.</td>
		  <td><input type="text" name="acn" value="<?php echo $studrow['sedate']; ?>" style="width:140px" required/>
		
		  </td>			
		  </tr>
		  
		  
		   
          <!--<tr>
          <td>Date:</td>-->
          <?php $curdate; ?><input type="hidden" name="curdate5" value="<?php  echo $curdate; ?>"></td>
          <?php $_SESSION['session']; ?></td>
         </table>
		 <br clear="all" />
		 
		  <table border="1" cellspacing="0" cellpadding="0" style="width:50%; margin-left:102px;">
			<tr style="font-weight:bold;" align="center">
			<td>Sr. <br /> No</td>
			<td>Adm.<br /> No</td>
			<td>A/C <br />No</td>
			<td>Student<br /> Name</td>
			<td>Student <br />Class</td>
		    <td>Total <br />Amount</td>
			<td>Received<br /> Amount</td>
			<td>Concession<br /> Amount</td>
		    <td>Balance<br /> Amount</td>
		    </tr>
            <?php
		    $numclass1=mysqli_query($con,"select * from student where sedate='$account_no' and student_session='".$_SESSION['session']."'");
			   
		    $i=1;
		    $total2=0;
			$amtrc2=0;
			$conct=0;
			$val10=0;
		    while($rownum1=mysqli_fetch_array($numclass1))
			{
			?>
		    <tr align="center" style="line-height:25px;">
			
			<td align="center"><?php echo $i;  ?></td>
			<td align="center"><?php echo $rownum1['student_scholar'];  $sid = $rownum1['student_id']; ?></td>
			<td align="center"><?php echo $rownum1['sedate'];  ?></td>
			<td>
			<?php
			if($rownum1['std_type']=='New')
			{
			echo $rownum1['student_name']; 
			}else{
			echo $rownum1['student_name'];
			}
			?>
			</td> 
			<td><?php echo $cls = $rownum1['student_class'];  ?></td>
		    <td align="center">
		    <?php
			$rownum1['std_type'] = $rownum1['std_type'] ?? '';
			$rownum1['Yes'] = $rownum1['Yes'] ?? '';
			$rownum1['hostel_status'] = $rownum1['hostel_status'] ?? '';
			
		    if($rownum1['std_type']=='New' && $rownum1['bus']=='Yes')
			{
			$adm=mysqli_query($con,"select * from admission where class='$cls' and session='".$_SESSION['session']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$tbus=$rownum1['hostel_status'];
			
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
			$prow['amt'] = $prow['amt'] ?? 0;
	        $tpr=$prow['amt'];

			
			
 			$amnt = (float)$rowselrec['amnt']+(float)$rowsadm['fee']-(float)$rownum1['famt'];
			$total1=$amnt+$tbus+$tpr;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['std_type']=='New')
			{
			$adm=mysqli_query($con,"select * from admission where class='$cls' and session='".$_SESSION['session']."'");
			$rowsadm=mysqli_fetch_array($adm);
			
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
			$prow['amt'] = $prow['amt'] ?? 0;
	        $tpr=$prow['amt'];
			
			
 			$amnt = (float)$rowselrec['amnt']+(float)$rowsadm['fee']-(float)$rownum1['famt'];
			$total1=$amnt+$tpr;;
	        echo $total1;
	        $total2+=$total1;
			}
			
			else if($rownum1['bus']=='Yes')
			{
		    $selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
			$tbus=$rownum1['hostel_status'];
			
			
			$pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
	        $prow['amt'] = $prow['amt'] ?? 0;
			$tpr=$prow['amt'];

			$amnt = (float)$rowselrec['amnt']-(float)$rownum1['famt'];
			
			$total1=(float)$amnt+(float)$tbus+(float)$tpr;
	        echo $total1;
	        $total2+=(float)$total1;
			}
			
			else{
			$selrc=mysqli_query($con,"select * from definefee  where class='$cls' and session='".$_SESSION['session']."'");	
            $rowselrec=mysqli_fetch_array($selrc);
			
		    $pr=mysqli_query($con,"select * from privious_fee where sid='$sid' and session='".$_SESSION['session']."'");
	        $prow=mysqli_fetch_array($pr);
	        $prow['amt'] = $prow['amt'] ?? 0;
			$tpr=$prow['amt'];

			$amnt = (float)$rowselrec['amnt']-(float)$rownum1['famt'];
			
			$total1=$amnt+$tpr;
	        echo $total1;
	        $total2+=(float)$total1;
			}
			?>
		    </td>
			<td align="center">
		
			<?php
		    $search=mysqli_query($con,"select sum(fee_deposit),sum(conc) from fee_detail where student='".$rownum1['student_id']."' and session='".$_SESSION['session']."'");
            $studrow=mysqli_fetch_array($search);
            $amtrc= $studrow['sum(fee_deposit)'];  
		    echo $amtrc;
		    $amtrc2+=(float)$amtrc;
		    ?>					 
		    </td>
			
			<td>
			<?php 
			echo $studrow['sum(conc)'];   
		    $conct+=(float)$studrow['sum(conc)'];
			?> 
			</td>
			
			
			<td align="center">
			<?php 
			$bal= (float)$total1-(float)$amtrc-(float)$studrow['sum(conc)'];   
			echo $bal;
			$val10+=$bal;
			?> 
			</td>
			</tr>
	        <?php
	        $i++;
	        }
	        ?>
	        <tr align="center" style="line-height:25px;">
			<td colspan="5" align="right"><b>Grand Total&nbsp;</b></td>
		
		    <td><b><?php echo $total2;  ?></b></td>
		    <td><b><?php echo $amtrc2;  ?></b></td>
			<td><b><?php echo $conct;  ?></b></td>
		    <td style="color:#CC3333"><b><?php echo $val10;  ?></b></td>
			</tr>
			
		
	        </table>
		  
		  
          <div id="txtHint1">
          <div class="table" style="border:#FF0000 0px solid; height:auto; margin:30px 0px 0px 100px">
          <table border="0" cellspacing="0" cellpadding="0" style="font-size:14px; width:55%;">
		 
		
		  <tr style="font-weight:bold">
		  <td>Sr.No</td>
		  <td>Particulars</td>
		  <td>Amount(Rs)</td>
		  </tr>
		 
		  <tr>
		  <td>1</td>	
		  <td style="color:rgb(53, 0, 255)">
		  Pay Amount
		  </td>
		  <td>
		  <input class="numbox" type="text" name="tution" id="one" value="0" onkeyup="getValues(1)" style="width:160px;"/>
		  </td>
		  </tr>
		 
		  
		  <tr>
		  <td>2</td>	
		  <td style="color:rgb(53, 0, 255)">
		  Concession Amount
		  </td>
		  <td>
		  <input class="numbox" type="text" name="conc" id="five" value="0" onkeyup="getValues(2)" style="width:160px;"/>
		  </td>
		  </tr>
	    
		
		
		
		  <tr>
		  <td>3</td>
		  <td style="color:#CC0000">Payment Mode</td>
		  <td> 
		  <select name="ftype" required class="select" style="width:175px;">
		  <option value="">Select Fee Type</option>
		  <option value="Cash">Cash</option>
		  <option value="Online">Online</option>
		  </select>
		  </td>
	      </tr>	
		     
		  
		  <tr>					
		  <td>4</td> 
		  <td>Deposit Amount <br></td>
	      <td><input type="text" name="amtdeposit" id="main" value="" style="width:160px;"/></td>
		  </tr>
		  
		  <tr>					
		  <td>5</td> 
		  <td>Remarks <br>&nbsp;</td>
	      <td><textarea name="remarks" cols="20" rows="3"></textarea></td>
		  </tr>
		  
		  
		
		   <tr>					
		  <td>6</td> 
		  <td>Date</td>
	      <td><input name="from" type="text" id="from" style=" width:160px;" class="tb5" required/>
                <a href="javascript:" id="date_from_btn"> </a>
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