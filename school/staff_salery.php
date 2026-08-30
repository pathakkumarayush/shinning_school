
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
	width:250px;
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
<script type="text/javascript">
function cal()
{
var workd=document.getElementById("wd").value;
var cl=document.getElementById("txt1").value;
var absent=document.getElementById("txt2").value;
var basic=document.getElementById("basic").value;
var hra=document.getElementById("hra").value;
var con=document.getElementById("con").value;
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

sal=Math.round(parseInt(basic)/parseInt(workd)*parseInt(wd));
thra=Math.round(parseInt(hra)/parseInt(workd)*parseInt(wd));
tcon=Math.round(parseInt(con)/parseInt(workd)*parseInt(wd));
gt=thra+tcon+sal;
tpf=Math.round(parseInt(sal)*(parseInt(pf)/100));

tesi1=(gt*(esi/100));
val=(tesi1.toString().split(".")[1]); ///after
if(val>1)
{
  bef=(tesi1.toString().split(".")[0]); ///before
   tesi1=parseInt(bef)+1;
}
ptit=(gt*(itpt/100));

document.getElementById("totdays").value=wd;
document.getElementById("tot1").value=sal;
document.getElementById("hra1").value=thra;
document.getElementById("con1").value=tcon;
document.getElementById("ptot").value=parseInt(hra)+parseInt(con)+parseInt(basic);
document.getElementById("gt").value=gt;
document.getElementById("pf").value=tpf;
document.getElementById("esi").value=tesi1;

document.getElementById("tot2").value=parseInt(tpf)+parseInt(tesi1)+ptit;

document.getElementById("it_pt1").value=ptit;
document.getElementById("net").value=parseInt(gt)-(parseInt(tpf)+parseInt(tesi1)+ptit);
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
$chk=mysqli_query($con,"select * from teacher_sal where teacher='".$_POST['teacher_id']."' and month='".$_POST['month1']."' and session='".$_SESSION['session']."'");
if(mysqli_num_rows($chk)<1)
{
if(!empty($_POST['net']) || ($_POST['month1']!=-1))
{ 



$query=mysqli_query($con,"insert into teacher_sal(teacher,sal_rec,cur_sal,cl,absent,pf_ded,pf_per,month,session,workingd,esi,esi_per,hra,act_hra,conv,act_conv,it_pt,act_itpt,basic,act_basic) values('".$_POST['teacher_id']."','".$_POST['net']."','".$_POST['ptot']."','".$_POST['cl']."','".$_POST['abs']."','".$_POST['pf']."','".$_POST['agpf']."','".$_POST['month1']."','".$_SESSION['session']."','".$_POST['wd']."','".$_POST['esi']."','".$_POST['agesi']."','".$_POST['hra1']."','".$_POST['hra']."','".$_POST['con1']."','".$_POST['con']."','".$_POST['it_pt1']."','".$_POST['apt']."','".$_POST['tot1']."','".$_POST['basic']."')");

?>
<script type="text/javascript">
alert("Inserted Successfully");
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
else
   {
   ?>
    <script type="text/javascript">
     alert("Salary Already Paid For This Month");
     </script>
   
   <?php
   }
}
?>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Pay Roll/staff.png" /><a href="./?pageid=staff_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teacher Salery</h2>
</div>

<div class="col_4">
<div class="box-head" style="width:730px">
<a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."staff_salery"."&&divid=1"; ?>">Search  By Staff Id</a>&nbsp;|| &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."staff_salery"."&&divid=2"; ?>">Search Staff By Name</a>
						</div>
 <?php
		if(isset($_GET["v"]))
		{
		echo "<div align='center' style='font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#FF0000;' > Salary payed successfully </div>";
		}
		?>
 <form method="post" action="" enctype="multipart/form-data">
		
		 <?php
		 
	       if((!empty($_GET['divid'])) && ($_GET['divid']==1))
		   {
	   ?>
		
		<table width="1000" border="0" cellspacing="10" style="font-size:16px; " >
  <tr>
    <td width="196">Enter employee ID </td>
    <td width="589"><input type="text" name="eid" class="tb5" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="search" /></td>
  </tr>
</table>
      <?php
	   }
	  ?>
     <?php
		 
	       if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		   {
	   ?>
		
		<table width="1000" border="0" cellspacing="10" style="font-size:16px; " >
  <tr>
    <td width="196">Select Staff</td>
    <td><select name="eid" class="select">
			     <option>Select Staff</option>
				 <?php
				   $teacher=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."'");
				   while($row=mysqli_fetch_array($teacher))
				 {
				 ?>
			     <option value="<?php echo $row['teacher_id'];  ?>"><?php echo $row['teacher_name'];  ?></option>
				 <?php
				 }
				 ?>
			     </select> 
			  </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="search" /></td>
  </tr>
</table>
      <?php
	   }
	  ?>
</form>
		    <?php
 if(isset($_POST["Submit"]))
 {
 $eid=$_POST["eid"];
 $qry="select * from teacher where teacher_id='$eid'";
 $result=mysqli_query($con,$qry);
 $row=mysqli_fetch_array($result);
 
?> 

	      <form method="post" action="#"  >
		
          <table width="1000" align="left"   cellspacing="10" style="font-size:16px; ">
            <tr>
              
              <td width="247"><input name="tid" type="hidden"  size="40" class="tb51" /></td>
           <tr>
		     <td>Date</td>
		     <td><?php echo date("d-m-Y");   ?></td>
		   </tr>
		    <tr>
              <td width="247">Employee Name
                <label style="color:#FF0000">*</label></td>
              <td width="717"><input name="enm" type="text"  size="40"  value="<?php echo $row["teacher_name"]; ?>"  </td>
             <input type="hidden" name="teacher_id" value="<?php echo $eid;  ?>">
		    </tr>
			
			  <tr>
              <td width="247">Employee ID
                <label style="color:#FF0000">*</label></td>
              <td width="717"><input name="eid" type="text"  size="40" class="tb51" value="<?php echo $row["teacher_id"]; ?>" />			  </td>
            </tr>
			
			<tr>
              <td>Month</td>			
			  <td><select name="month1"  class="select" style="width:270px;">
                   <option value="-1">Select Month</option>
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
                                 </select></td>
			 </tr> 
			 <tr>
			   <td>Working Days</td>
			     <td><input type="text" name="wd" id="wd" class="tb521"   /></td>
			 </tr>
			   <tr>
              <td>Total Cl</td>			
			  <td><input type="text" name="cl" id="txt1" class="tb521" value="<?php echo $row["no_cl"]; ?>"   /></td>
			 </tr>
			  <tr>
              <td>Absent </td>
              <td><input type="text" name="abs" class="tb521" id="txt2"  />
			     <input type="button" name="calculate" value="Calculate"  onclick="cal()" />
			  </td>
            </tr> 
			 <tr>
              <td>Total Days </td>
              <td><input type="text" name="totdays" class="tb521" id="totdays"   />
			     
			  </td>
            </tr> 
			
              <td>Basic </td>
			
              <td><input type="text" id="basic" name="basic" class="tb5"  value="<?php echo $row["basic"]; ?>"  readonly="readonly"  /> </td> 
		
			</tr>
			 <tr>
              <td>Hra </td>
			
              <td><input type="text" id="hra" name="hra" class="tb5"  value="<?php echo $row["hra"]; ?>"  readonly="readonly"   /> </td> 
			</tr>
			 <tr>
              <td>Con </td>
			
              <td><input type="text" id="con" name="con" class="tb5"  value="<?php echo $row["conv"]; ?>"  readonly="readonly" /> </td> 
			</tr>
			 <tr>
              <td>Total</td>
			
              <td><input type="text" id="ptot" name="ptot" class="tb5"  readonly="readonly"    /> </td> 
		
		 	</tr>
			 <tr>
              <td>Amount</td>
			
              <td><input type="text" id="tot1" name="tot1" class="tb5"   readonly="readonly"  /> </td> 
			</tr>
			  <tr>
              <td>Hra </td>
              <td><input name="hra1" type="text" id="hra1" class="tb51"   size="40"  readonly="readonly" /></td>
            </tr
			><tr>
              <td>Con </td>
              <td><input name="con1" type="text" id="con1" class="tb51"   size="40" readonly="readonly" /></td>
            </tr>
			<tr>
              <td>Grand total </td>
              <td><input name="gt" type="text" id="gt" class="tb51"   size="40" readonly="readonly" /></td>
            </tr>
			 <tr>
			
			  <tr>
			  
              <td>Pf</td>			
			  <td><input type="text" name="pf" id="pf" class="tb521"  readonly="readonly"  /></td>
			   
			 </tr> 
			
			  <tr>
			 
              <td>Esi</td>			
			  <td><input type="text" name="esi" id="esi" class="tb521"  readonly="readonly"  /></td>
			   
			 </tr> 
			   <tr>
			 
              <td>It/Pt</td>			
			  <td><input type="text" name="it_pt1" id="it_pt1" class="tb521"  readonly="readonly"  /></td>
			   
			 </tr> 
			 <?php
			 if($row['pf']=="Yes")
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
			
			<tr>
              <td>Total </td>
              <td><input name="tot2" type="text" id="tot2" class="tb51"   size="40" readonly="readonly" /></td>
            </tr>
			
			   
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
             <tr>
              <td>Transport Charge</td>
              <td><input type="text" name="transp" class="tb521" id="transp" value="<?php echo $value; ?>"  /></td>
            </tr> 
		     <?php
			 }
			 else
			    {
				?>
			     <input type="hidden" name="transp" class="tb521" id="transp"   />
				<?php
				}
			 ?>
		  
           
         
          
            <tr>
              <td>Net </td>
              <td><input name="net" type="text" id="net"    size="40" readonly="readonly" /></td>
            </tr>
            
            <tr>
              <td>&nbsp;</td>
              <td><input  type="submit" name="pay"  value="Pay" style="width:150px; font-weight:bold" />              </td>
            </tr>
		  </table>
          </form>    	
      <?php
	  }
	  mysqli_close($con);
	  ?>
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
