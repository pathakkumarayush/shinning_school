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
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
	   function concess()
{
b1=document.getElementById("tamt").innerHTML;
b2=document.getElementById("ca").value;
var c=parseInt(b1)-parseInt(b2);
document.getElementById("tamt").innerHTML=c
}
function add(a)
{
b=document.getElementById("lf").value;
var c=parseInt(a)+parseInt(b);
document.getElementById("tamt").innerHTML=c
}

</script>
<?php
   if(isset($_POST['submit']))
   {
   $feetype='Transport Fee';
    $chk=mysqli_query($con,"select * from fee_detail where instalment='".$_POST['instalment']."' and student='".$_POST['student']."' and  feetype='$feetype'");
   if(mysqli_num_rows($chk)<1)
   {
      $amnt=$_POST['amt'];
	  if((!empty($_POST['latefee1']))|| (!empty($_POST['concession'])) )
	  {
	  
	    $_POST['amt']=$_POST['amt']+$_POST['latefee1'];
	    $_POST['amt']=$_POST['amt']-$_POST['concession'];
	    //$_POST['amt']=$_POST['amt']-$_POST['amntdeposit'];
	  }
	  if($_POST['amntdeposit']<$_POST['amt'])
	  {
	    
		$due=$_POST['amt']-($_POST['amntdeposit']);
	  }
   $date=date("Y-d-m");
    $m=date("M");
	 if($_POST['amntdeposit']>$_POST['amt'])
	  {
	    $extra=$_POST['amntdeposit']-$_POST['amt'];
	  }
	  
      $query=mysqli_query($con,"insert into fee_detail(session,class,tamnt,due,fee_deposit,date,student,month,latefee,concession,school,current_month,extra_amnt,feetype,instalment) values('".$_SESSION['session']."','".$_POST['class']."','$amnt','$due','".$_POST['amntdeposit']."','$date','".$_POST['student']."','".$_POST['month']."','".$_POST['latefee1']."','".$_POST['concession']."','".$_SESSION['uid']."','$m','$extra','$feetype','".$_POST['instalment']."')");
    $insertid=mysqli_insert_id();
   
   $msg="fee Paid Successfully";  
   }
   else
      {
	    $msg="This Instalment Already Paid "; 
	  }
   }

?>
<script type="text/javascript">
function add(a)
{

b=document.getElementById("lf").value;

var c=parseInt(a)+parseInt(b);

document.getElementById("tamt").innerHTML=c
}
function concess()
{
b1=document.getElementById("tamt").innerHTML;
b2=document.getElementById("ca").value;
var c=parseInt(b1)-parseInt(b2);
document.getElementById("tamt").innerHTML=c
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
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Room")) { 
        return false;
    }
    
} 
</script>
<div id="container">
 
	<div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; height:auto">
				
				<!-- Box -->
				<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
				   <img src="css/images/payfee.png" style="margin-left:20px;height:80px; width:80px"><br />
                    	<span style=" color:#000000; font-size:18px; margin-top:-20px; margin-left:10px">Transport Fee	</span>

                        <div style="border:#900 2px solid; margin-top:10px"></div>
                <a href="./?pageid=transport_home">Transport</a> >>Add Routes</a>

<?php
 if(!empty($error))
 {
?>
<div class="error" style="width:300px"><?php echo $error; ?></div>
<?php
}
?>
<?php
 if(!empty($msg))
 {
?>
<div class="success" style="width:200px"><?php echo $msg; ?></div>
<?php
}
?>    
            
<form action="#" name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">


<table cellspacing="10" width="630" style="margin:50px 0px 0px -5px; font-size:14px">
	<tr>
                <td>Class<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:125px" onchange="showStudent14(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"><?php echo $rclass['class'].$rclass['class_section']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
             </tr>
			
		
			 </table>
			 <div id="txtHint1"></div>
			 
			<?php
			  if(isset($_POST['submit2']))
			  {
			 $search4=mysqli_query($con,"select * from student where student_school='".$_SESSION['uid']."' and status='0' and student_id='".$_POST['student']."'  and transport_status='Active' order by student_name Asc");
  $rsearch3=mysqli_fetch_array($search4);
			
			   $tfee=mysqli_query($con,"select * from stopage where stop_name='".$rsearch3['transport_stopage']."' and session='".$_SESSION['session']."'");
  $r_fee=mysqli_fetch_array($tfee);
   $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$rsearch3['student_id']."' order by id desc limit 1"); 
									
									
									 $duerow=mysqli_fetch_array($search1);
  
   $_SESSION['stop_cost']=($r_fee['stop_cost']/2)+$duerow['due'];

$selrc=mysqli_query($con,"select * from definefee  where class='".$rsearch3['student_class']."'");	

$rowselrec=mysqli_fetch_array($selrc);	

			?>
			 <table  width="320" style="font-size:14px">
			 <tr>
			   <td>Student Name</td>
			   <td><?php echo ucwords($rsearch3['student_name']);  ?></td>
			 </tr>
			 <input type="hidden" name="student" value="<?php echo $rsearch3['student_id'];  ?>" />
			 <input type="hidden" name="class" value="<?php echo $rsearch3['student_class'];  ?>" />
			 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			 </tr>
			 <tr>
			   <td>Student Class</td>
			   <td><?php echo $rsearch3['student_class'];  ?></td>
			 </tr>
			 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			 </tr>
			<tr>
			   <td>Stop Name</td>
			   <td><?php echo ucwords($rsearch3['transport_stopage']);  ?></td>
			 </tr>
			 <tr>
			   <td>&nbsp;</td>
			   <td>&nbsp;</td>
			 </tr>
			 <tr>
			  <td>Date</td> 
			  <td><?php echo date("d-m-Y");  ?></td>
              </tr>
				  <tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Mpnth</td>
<td><select name="month"  class="select">
                   <option value="Select Month">Select Month</option>
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
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
			  <tr>
<td>Instalment</td>
<td>
    <select name="instalment" class="select" style="width:128px">
    <option>Select Instalment</option>
      <?php
	    for($i=1;$i<=$rowselrec['transport_inst'];$i++)
		{
		?>
		<option value="<?php echo "Instalment".$i;   ?>"><?php echo "Instalment".$i;   ?></option>
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
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			  <tr>
			         <td><b>Previous Due(Rs)</b></td>
									<td><b><?php  
									 echo $duerow['due']; 
									?></b></td>
			  </tr>


<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<tr>
   <td>Total Amount</td>
   <td><input type="text" name="amt" disabled="disabled" value="<?php echo $_SESSION['stop_cost'];  ?>"  style="width:50px"></td>
</tr>
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			 <tr>
			    <td>Other Ampunt</td>
			     <td><input type="text" name="latefee1"  id="lf" style="width:50px" onKeyPress="return isNumberKey(event)"></td>
				 <td><input type="button"  onclick="add('<?php echo $_SESSION['stop_cost']; ?>')" value="Add"   /></td>
			 </tr>
			<input type="hidden" name="amt" value="<?php echo $_SESSION['stop_cost']; ?>">
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			 <tr>
			    <td>Concession</td>
			    <td><input type="text" id="ca" name="concession"  style="width:50px"  onKeyPress="return isNumberKey(event)"></td>
			    <td><input type="button"  onclick="concess()" value="Add"   /></td> 
			 </tr>
			
              <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			 <tr>
			    <td>Amount to Pay</td>
			     <td><div id="tamt"><?php echo $_SESSION['stop_cost']; ?></div></td>
			 </tr>
		     <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			  </tr>
			 <tr>
			    <td>Amount Paid</td>
			     <td><input type="text" name="amntdeposit"  style="width:50px" onKeyPress="return isNumberKey(event)"></td>
			 </tr>
			 
			  
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>

                   <tr>
				     <td>&nbsp;</td>
				      <td><input type="submit" name="submit" value="submit"></td>
				   </tr>
</table>

     <?php
	   }
	 ?>
<div>
		<?php
		   if(!empty($insertid))
		   {
		?>
		<td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('http://smarteducations.in/smarterp/citycentral/school/getreceipt.php?id=<?php echo $_SESSION['studentid']."&feetype=2"; ?>')"><input type="button" value="Genrate Receipt " style="width:200px; margin-left:0px; margin-top:15px" ></a></td>
		<?php
		   
		   }
		?>
		</div>

</form>
              
     
					
				</div>
				<!-- End Box -->
				
				<!-- Box -->
				
				<!-- End Box -->

			</div>
			<!-- End Content -->
			
			<!-- Sidebar -->
			
			<!-- End Sidebar -->
			
			<div class="cl">&nbsp;</div>			
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>