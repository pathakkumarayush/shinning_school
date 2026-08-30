<script type="text/javascript">
function cal()
{
var workd=document.getElementById("wd").value;
var cl=document.getElementById("txt1").value;
var absent=document.getElementById("txt2").value;
var basic=document.getElementById("basic").value;
var hra=document.getElementById("hra").value;
var con=document.getElementById("con").value;
var allow=document.getElementById("allow").value;
var pf=document.getElementById("gpf").value;
var esi=document.getElementById("gesi1").value;
var itpt=document.getElementById("it_pt").value;

if(absent==cl)
{
var wd=workd;
}
else if(absent>cl)
{
var tab=absent-cl;
 
var wd=workd-tab;
}
else
{
var wd=workd;
}

salpf=Math.round(parseInt(basic));

sal=Math.round(parseInt(basic)/parseInt(workd)*parseFloat(wd));

if(absent==0.5)
{
sall=Math.round(parseInt(basic)/parseInt(workd)*parseFloat(wd-0.5));
}
else{
sall=Math.round(parseInt(basic)/parseInt(workd)*parseFloat(wd-1));
}

thra=Math.round(parseInt(hra)/parseInt(workd)*parseFloat(wd));
tcon=Math.round(parseInt(con)/parseInt(workd)*parseFloat(wd));
tallow=Math.round(parseInt(allow)/parseInt(workd)*parseFloat(wd));
gt=thra+tcon+sal+tallow;

if(absent==0)
{
tpf=Math.round(parseInt(sal)*(parseInt(pf)/100));
}
else
{
tpf=Math.round(parseInt(sall)*(parseInt(pf)/100));
}


tesi1=(gt*(esi/100));

val=(tesi1.toString().split(".")[1]); ///after
if(val>1)
{
  bef=(tesi1.toString().split(".")[0]); ///before
   tesi1=parseInt(bef)+1;
}
ptit=(gt*(itpt/100));

document.getElementById("workd").value=workd;

document.getElementById("totdays").value=wd;

document.getElementById("tot1").value=sal;
document.getElementById("hra1").value=thra;
document.getElementById("con1").value=tcon;
document.getElementById("allow1").value=tallow;
document.getElementById("ptot").value=parseInt(hra)+parseInt(con)+parseInt(allow)+parseInt(basic);
document.getElementById("gt").value=gt;
document.getElementById("pf").value=tpf;
document.getElementById("esi").value=tesi1;

document.getElementById("tot2").value=parseInt(tpf)+parseInt(tesi1)+ptit;

document.getElementById("it_pt1").value=ptit;
document.getElementById("net").value=parseInt(gt)-(parseInt(tpf)+parseInt(tesi1)+ptit);
}
</script>
<script>
function myFunction() 
{
document.getElementById("demo").innerHTML = Date();
}

function addTwoNumber(){
    var a = document.getElementById("net").value;
    var b = document.getElementById("dect").value;
    var x = Number(a) - Number(b);
   
    document.getElementById("net").value=x;
}

function addTwoNumber4(){
    var a = document.getElementById("net").value;
    var b = document.getElementById("adv").value;
    var x = Number(a) - Number(b);
   
    document.getElementById("net").value=x;
}

function addTwoNumber5(){
    var cl=document.getElementById("txt1").value;
	var ptot=document.getElementById("ptot").value;
	var absent=document.getElementById("txt2").value;
	var workd=document.getElementById("wd").value;
	
	if(absent=='0')
    {
    var tn=Math.round(parseInt(ptot)/parseInt(workd));
    }
	
    var x = document.getElementById("net").value;
    //var y = document.getElementById("cla").value;
    var z = Number(x) + Number(tn);
   
    document.getElementById("net").value=z;
    document.getElementById("cla").value=tn;
}

</script>
 <?php
session_start();
require_once("../db.php");

if(empty($_GET['divid']))
{
$_GET['divid']=1;
} 
if(isset($_POST['pay']))
{

if(!empty($_POST['net']) || ($_POST['month1']!=-1))
{ 

$res_up=mysqli_query($con,"update teacher_sal set teacher='".$_POST["enm"]."',sal_rec='".$_POST["net"]."',cur_sal='".$_POST["ptot"]."',cl='".$_POST["cl"]."',absent='".$_POST["abs"]."',pf_ded='".$_POST["pf"]."',month='".$_POST["month1"]."',session='".$_SESSION['session']."',workingd='".$_POST["wd"]."',esi='".$_POST["esi"]."',esi_per='".$_POST["agesi"]."',hra='".$_POST["hra1"]."',act_hra='".$_POST["hra"]."',conv='".$_POST["con1"]."',act_conv='".$_POST["con"]."',it_pt='".$_POST["it_pt1"]."',act_itpt='".$_POST["apt"]."',basic='".$_POST["tot1"]."',act_basic='".$_POST["basic"]."',adv='".$_POST["adv"]."',dect='".$_POST["dect"]."',cla='".$_POST["cla"]."',allow='".$_POST["allow"]."',ac_allow='".$_POST["allow1"]."',pf_per='".$_POST["agpf"]."' where id='".$_POST["eid"]."' ");

?>
 <script type="text/javascript">
             window.location="<?php echo $var."nontech_salarydetail&&sumsg=Updated Successfully&eid=".$_POST["eid"]; ?>";
 </script>
<?php
}
else
{
?>
<script type="text/javascript">
alert("Field marked with * are mandatory");
</script>
<?php
}
}
?>



<style type="text/css">
input[type="text"] {
  padding: 10px;
  border: solid 5px #c9c9c9;
  box-shadow: inset 0 0 0 1px #707070;
  transition: box-shadow 0.3s, border 0.3s;
  height:37px;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 5px #339933;
}

.select {
  padding: 5px;
  border: solid 5px #c9c9c9;
  box-shadow: inset 0 0 0 1px #707070;
  transition: box-shadow 0.3s, border 0.3s;
  height:40px;
  width:229px;
}
</style>
<style type="text/css">
span.customStyleSelectBox { font-size:14px; font-weight:bold; background-color:#f0dea4; color:#7c7c7c; padding:5px 7px; border:1px solid #e7dab0; -moz-border-radius: 5px; -webkit-border-radius: 5px;border-radius: 5px 5px; line-height: 11px; } span.customStyleSelectBox.changed { background-color: #f0dea4; } .customStyleSelectBoxInner { background:url(images/arrow.gif) no-repeat center right; }

body{
    font-family:Arial, Helvetica, sans-serif; 
    font-size:13px;
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
.tb51 {	border:1px solid #456879;
	border-radius:5px;
	height: 22px;
	width: 205px;
	background:#EFEFEF;
}
.tb52 {	border:1px solid #456879;
	border-radius:5px;
	height: 22px;
	width: 205px;
	background:#EFEFEF;
}
.tb521 {border:1px solid #456879;
	border-radius:5px;
	height: 22px;
	width: 205px;
	background:#EFEFEF;
}
.submit{ width:100px; margin-left:5px;}
input#shiny {
padding: 4px 20px;
/*give the background a gradient*/
background:#ffae00; /*fallback for browsers that don't support gradients*/
background: -webkit-linear-gradient(top, #ffae00, #d67600);
background: -moz-linear-gradient(top, #ffae00, #d67600);
background: -o-linear-gradient(top, #ffae00, #d67600);
background: linear-gradient(top, #ffae00, #d67600);
border:2px outset #dad9d8;
/*style the text*/
font-family:Andika, Arial, sans-serif; /*Andkia is available at http://www.google.com/webfonts/specimen/Andika*/
font-size:1.1em;
letter-spacing:0.05em;
text-transform:uppercase;
color:#fff;
text-shadow: 0px 1px 10px #000;
/*add to small curve to the corners of the button*/
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
/*give the button a drop shadow*/
-webkit-box-shadow: rgba(0, 0, 0, .55) 0 1px 6px;
-moz-box-shadow: rgba(0, 0, 0, .55) 0 1px 6px;
box-shadow: rgba(0, 0, 0, .55) 0 1px 6px;
}
/****NOW STYLE THE BUTTON'S HOVER STATE***/
input#shiny:hover, input#shiny:focus {
border:2px solid #dad9d8;
}
</style>
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
	width:221px;
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
<div class="left_sect"><img src="../school/images/Pay Roll/staff.png" />
<a href="./?pageid=nontech_salarydetail">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Update Salary</h2>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">
&nbsp; &nbsp;
<a style="border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px; text-decoration:none">Update Salary</a>
</div>
</tr>
</table>
<?php
if(isset($_GET["v"]))
{
echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;' > Salary payed successfully </div>";
}
?>
		
<?php
echo $eid=$_GET["eid"];
$qry="select * from teacher_sal where id='$eid'";
$result=mysqli_query($con,$qry);
$row=mysqli_fetch_array($result);
?> 
	  
	      <form method="post" action="#"  >
		
          <table align="left"   cellspacing="10" style="font-size:16px; ">
         
		  <tr>
          <td><input name="tid" type="hidden"  size="40" class="tb51" /></td>
          
		  <tr>
		     <td>Date</td>
		     <td><?php echo date("d-m-Y"); ?></td>
			 <td></td>
			 <td></td>
			 <td></td>
			 <td></td>
		   </tr>
		  
		   <tr>
		   <td>Employee Name</td>
		   <td><input name="enm" type="text"  size="40" class="tb51" value="<?php echo $row["teacher"]; ?>" />
		  
		   <input type="hidden" name="teacher_id" value="<?php echo $eid;  ?>">
		   </td>
		   <td>Salary ID</td>
		   <td><input name="eid" type="text"  size="40" class="tb51" value="<?php echo $eid; ?>" /></td>
		  
		   <td>Month</td>
		   <td> <select name="month1"  class="select" required>
                   <option value="<?php echo $row["month"]; ?>"><?php echo $row["month"]; ?></option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   </select>
		 </td>
		  </tr>
		 
		 
		 
		   <tr>
		     <td>Working Days</td>
		     <td><input type="text" name="wd" id="wd" class="tb521"  value="<?php echo $row["workingd"]; ?>" /></td>
			 <td>Total Cl</td>
			 <td><input type="text" name="cl" id="txt1" class="tb521" value="<?php echo $row["cl"]; ?>"  /></td>
			 <td>Absent</td>
			 <td><input type="text" name="abs" class="tb521" id="txt2" style="width:110px;" value="<?php echo $row["absent"]; ?>"/>
	       <input type="button" name="calculate" value="Calculate"  onclick="cal()" /></td>
		  </tr>
		 
		 
		 
		 
		   <tr>
		     <td></td>
			 <td><input type="text" name="workd" class="tb521" id="workd"  style="width:50px;"/> Day Salary</td>
			 <td></td>
			 <td>After<input type="text" name="totdays" class="tb521" id="totdays"  style="width:70px;"/>Day Salary</td>
			  <td></td>
			  <td>Final Pay Salary</td>
		  </tr>
		 
		  <tr>
		     <td>Basic</td>
			 <td><input type="text" id="basic" name="basic" class="tb5"  value="<?php echo $row["act_basic"]; ?>"  readonly="readonly"  /></td>
			 <td>Amount</td>
			 <td><input type="text" id="tot1" name="tot1" class="tb51"   readonly="readonly" /></td>
			  <td>Pf</td>
			  <td><input type="text" name="pf" id="pf" class="tb521"  readonly="readonly"  /></td>
		  </tr>
		 
		 
		   <tr>
		      <td>Hra Amount</td>
			  <td><input type="text" id="hra" name="hra" class="tb5"  value="<?php echo $row["act_hra"]; ?>"  readonly="readonly"   /> </td>
			  <td>Hra Amount</td>
			  <td><input name="hra1" type="text" id="hra1" class="tb51"   size="40"  readonly="readonly" /></td>
			  <td>Esi</td>
			  <td><input type="text" name="esi" id="esi" class="tb521"  readonly="readonly"  /></td>
		  </tr>
		  
		     <tr>
		     <td>Other Allowance</td>
			 <td><input type="text" id="allow" name="allow" class="tb5"  value="<?php echo $row["allow"]; ?>"  readonly="readonly" /></td>
			 <td>Other Allowance</td>
			 <td><input name="allow1" type="text" id="allow1" class="tb51"   size="40" readonly="readonly" /></td>
			  <td> </td>
			  <td>
			  </td>
		   </tr>
		  
		    <tr>
		     <td>Conveyance</td>
			 <td><input type="text" id="con" name="con" class="tb5"  value="<?php echo $row["act_conv"]; ?>"  readonly="readonly" /></td>
			 <td>Conveyance</td>
			 <td><input name="con1" type="text" id="con1" class="tb51"   size="40" readonly="readonly" /></td>
			  <td>Total </td>
			  <td><input name="tot2" type="text" id="tot2" class="tb521"   size="40" readonly="readonly" />
			  <input name="it_pt1" id="it_pt1" class="tb521"  readonly="readonly"  type="hidden" /></td>
		   </tr>
		  
		    <tr>
		     <td>Total Amount</td>
			 <td><input type="text" id="ptot" name="ptot" class="tb51"  readonly="readonly"    /></td>
			 <td>Grand total</td>
			 <td><input name="gt" type="text" id="gt" class="tb51"   size="40" readonly="readonly" /></td>
			   <?php
			 if($row['pf_per']=="12")
			 {
			 ?>
			 <input type="hidden" name="agpf" id="gpf" value="<?php echo $row['pf_per'];   ?>">
		     <?php
			  }
			 else
			 {
			 ?>
			 <input type="hidden" name="agpf" id="gpf" value="0">
		    <?php
			   }
			    if($row['esi']=="Yes")
			 {
			  ?>
			   <input type="hidden" name="agesi" id="gesi1" value="<?php echo $row['esi_per'];   ?>" />
			<?php
			}
			else
			{
			?>
			  <input type="hidden" name="agesi" id="gesi1" value="0" />
			<?php
			}
			if($row['it_pt']=="Yes")
			 {
			  ?>
			   <input type="hidden" name="apt" id="it_pt" value="<?php echo $row['it_per'];   ?>" />
			<?php
			}
			else
			{
			?>
			  <input type="hidden" name="apt" id="it_pt" value="0" />
			<?php
			}
			?>
			
			 
<td>Security </td><td>

<input name="dect" type="text" id="dect"  class="tb51" placeholder="Security Money" style="width:158px;" /> 
<input type="button" name="Add" value="cal" onClick="addTwoNumber()"/>
	</td>
	 </tr>
		  
		  
<tr><td>Advance </td><td>
<?php
$preq="select * from adv_sal where tid='".$row['teacher']."'";
$i=1;
$rpq=mysqli_query($con,$preq);
while($rowp=mysqli_fetch_array($rpq))
{
$tp = $rowp['amt'];
$ttp+=$tp;
}
$adva=mysqli_query($con,"select sum(adv) from teacher_sal where teacher='".$row['teacher']."' ");
$adrow=mysqli_fetch_array($adva);
$adrow['sum(adv)'];

?>
<input name="adv" type="text" id="adv" class="tb51" style="width:155px;" placeholder='Advance Money - <?php echo $ttp-$adrow['sum(adv)']; ?>' />
 
<input type="button" name="Add" value="cal" onClick="addTwoNumber4()"/>
</td>

<td>Add CL</td>
<td>
<input name="cla" type="text" id="cla"  class="tb51" placeholder="Add CL Amount" style="width:158px;" /> 
<input type="button" name="Add" value="cal" onClick="addTwoNumber5()"/>
</td>
		  
<td>Net</td>
<td><input name="net" type="text" id="net" class="tb521"   size="40" readonly="readonly" /></td>
</tr>
		  
		 
		 
		 
		 <tr>
		  <?php
			    if($row["amnt_deduction"]=="Fixed")
				{
			    ?>
				<input type="hidden" name="ded" id="fxd_ded" value="<?php echo $row["deduction"];  ?>">
				<?php
				} 
				else
				  {
				  ?>
				  <input type="hidden" name="ded" id="fxd_ded" >
				  <?php
				  }
			 ?>
			
			  
			 
			<?php
			   if($row["transport_status"]=="Active")
			   {
			        if($row["payment_type"]=="Fixed")
			      {
		           $value=$row["amnt"];	   
			      }
			     else if($row["payment_type"]=="Rout Wise")
			   {
			        $querytr=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and stop_name='".$row['transport_stopage']."'");
			  
			  $rowtr=mysqli_fetch_array($querytr);
								if($row['transport_type']=="One Way")
							{
								 $t= ($rowtr['stop_cost']/2);				
							     echo  $value;
							}
							else
							    {
								   $value= $rowtr['stop_cost'];
								   echo  $value;
								   
								}
		                    }
						  else if($row["payment_type"]=="Not Chargeable")
							  {
							    $value=0;
							  }		
				
			   
			   
			
				
			?> 			
		  <td style="width:200px;"></td>
		 <td></td>
		  <td>Transport Charge</td>
		 <td><input type="text" name="transp" class="tb521" id="transp" value="<?php echo $value; ?>"  /></td>
		   <?php
			 }
			 else
			    {
				?>
			     <input type="hidden" name="transp" class="tb521" id="transp"   />
				<?php
				}
			 ?>
		  <td></td>
		 <td></td>
		 </tr>
		 <tr>
		 <td></td>
		 	 <td></td>
			 	 <td></td>
				 	 <td></td>
					 	 <td></td>
		 <td><input  type="submit" name="pay"  value="Update Salary" id="shiny" style="width:200px; font-weight:bold" /></td>
		 </tr>
		 
          
		  </table>
          </form>    	
     
	 
	 </div>

              <br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  