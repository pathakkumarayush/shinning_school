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


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
     
<script>
function updateDuee() {
    var val1 = parseInt(document.getElementById("reg").value);
    var val2 = parseInt(document.getElementById("dairy").value);
	var val3 = parseInt(document.getElementById("belt").value);
	var val4 = parseInt(document.getElementById("tie").value);
	var val5 = parseInt(document.getElementById("books").value);
	var val6 = parseInt(document.getElementById("sta").value);
    // to make sure that they are numbers
    if (!val1) { val1 = 0; }
    if (!val2) { val2 = 0; }
	if (!val3) { val3 = 0; }
	if (!val4) { val4 = 0; }
	if (!val5) { val5 = 0; }
	if (!val6) { val6 = 0; }
    var ansD = document.getElementById("total");
    ansD.value = val1+val2+val3+val4+val5+val6;
}
</script>
			 
<div id="container">
  <div class="shell"  >
		<div id="main" >
			<!-- Content -->
			<div id="content" style="border:#F00 0px solid; width:990px; margin-top:50px; height:auto">
			
			<!-- Box -->
			<div  style="border:#FF0000 0px solid; height:400px; margin-top:20px">
		    <img src="images/FEE Management/Student.png" style="width:200px; height:80px;" />
 <?php
 if(isset($_POST['pay']))
    {
	  $m=date("M");
	  $dd = $_POST['dos'];
	  $ddd=date("Y-m-d",strtotime($dd)); 
	  $class = $_POST['class'];
	  $ss ='Saints Flower school';
	 
$query=mysqli_query($con,"insert into fee_other(session,class,belt,tie,dairy,stn,books,reg,fee_deposit,student,date,school,receiptno,current_month,remark)
values('".$_SESSION['session']."','".$_POST['class']."','".$_POST['belt']."','".$_POST['tie']."','".$_POST['dairy']."','".$_POST['sta']."','".$_POST['books']."',
'".$_POST['reg']."','".$_POST['total']."','".$_POST['student']."','$ddd','sfs','".$_POST['rno']."','$m','".$_POST['remark']."')");

$insertid=mysqli_insert_id();
 $_SESSION['studentid']=$_POST['student'];

        $sub="Fee Paid";	
    
		$nmsg="Thank you for paying the fee of ".$_POST['student_n']." Received Amount Rs ".$_POST['total'];	
		$session=$_SESSION['session'];
		$page=1;
		$r=sms($_SESSION["uid"],$_POST['student'],$sub,$nmsg,'Yes',$session,$page);
        $msg="fee Paid Successfully"; 
	    }
	  
	  ?>
            <div style="border:#900 2px solid; margin-top:10px"></div>
						
            <a href="./?pageid=fee_managementhome">Fee Management</a> >>Student Ledger</a>
		    <span style="float:right"><a href="./?pageid=fee_home" style="color:#FFFFFF; font-size:18px">Back</a></span>
            <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
            <div class="box-head">
		    Other Fee  <a href="./?pageid=p_fee" style="float:right; color:#FFFFFF; font-size:14px">Add Previous Year fee</a>
		    </div>
            <table style="margin:20px 0px 0px 0px; font-size:16px" >
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
	   
	   <div>
		<?php
		   if(!empty($insertid))
		   {
		?>
	  <td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/gps/school/receipt.php?id=<?php echo $_SESSION['studentid']; ?>')"><input type="button" value="Genrate Receipt " style="width:200px; margin-left:0px; margin-top:15px" ></a></td>
		<?php
		   
		   }
		?>
		</div>
	</form>
    </div>
				
	
		
			<?php
		    if(isset($_POST['search1']))
			{	
			?>	
		    <form  name="listForm" method="post" name="myForm" action="">
			<table style="margin-left:50px; margin-top:-70PX;">
			<tr>
			<td style="font-weight:bold">Student Name</td>
			<td>
			<?php 
			$reg=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."'");
            $rowfeedetail=mysqli_fetch_array($reg);
			echo $rowfeedetail['student_name'];
            ?>
			
			<input type="hidden" name="student" value="<?php echo $rowfeedetail['student_id']; ?>">
			
			<input type="hidden" name="student_n" value="<?php echo $rowfeedetail['student_name']; ?>" />
			
            <input type="hidden" name="stdid" value="<?php echo $_POST['stdid']; ?>" />
			
            </td>
			<td style="font-weight:bold">Student Class - </td>
		    <td>
			<?php 
			$regclass=mysqli_query($con,"select * from class where class_id='".$_POST['class']."'");
            $rowclass=mysqli_fetch_array($regclass);
			echo $class = $rowclass['class'];
            ?>
			<input type="hidden" name="class" value="<?php echo $class; ?>" /></td>
			</tr>	
		    <tr>
		    <td>&nbsp;</td>
		    <td>&nbsp;</td>
			</tr> 			
			
			<td style="font-weight:bold;">Receipt No</td> 
			<?php 
			$rect=mysqli_query($con,"select max(receiptno) from fee_other where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	        $fetchrec=mysqli_fetch_array($rect);
	        ?>
			<td><input type="text" name="rno"  style=" width:100px;" value="<?php echo $receipt=$fetchrec['max(receiptno)']+1; ?>" ></td>
			<tr>
			</tr>
			<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
			
			<tr><td>REGISTRATION FEE</td>
			<td>
			&nbsp;&nbsp;<input type="text" name="reg" class="form-control" id="reg" onchange="updateDuee()"><br/></td>
			<td>SCHOOL DIARY</td>
            <td>
			&nbsp;&nbsp;<input type="text" name="dairy" class="form-control" id="dairy" onchange="updateDuee()"></td>
			</tr>
		  
			<tr>
			<td>&nbsp;</td>
		    <td>&nbsp;</td>
			</tr>
			<tr>
			
			<td>SECURITY FEE</td>
            <td>
			&nbsp;&nbsp;<input type="text" name="belt" class="form-control" id="belt" onchange="updateDuee()"></td>
			<td>I-CARD</td>
            <td>
			&nbsp;&nbsp;<input type="text" name="tie" class="form-control" id="tie" onchange="updateDuee()"></td>
			</tr>
           
			<tr>
			<td>&nbsp;</td>
		    <td>&nbsp;</td>
			</tr>
			
			
			<tr>
			<td>Books & Copies</td>
            <td>
			&nbsp;&nbsp;<input type="text" name="books" class="form-control" id="books" onchange="updateDuee()"></td>
			<td>Stationary</td>
            <td>
			&nbsp;&nbsp;<input type="text" name="sta" class="form-control" id="sta" onchange="updateDuee()"></td>
			</tr>
			
			
		
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>

			<tr>
			<td>Total Amount</td>
		    <td>&nbsp;&nbsp;<input type="text"  name="total" id="total" style="width:100px;"></td></tr>
			 
            <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 
			  <tr>
			<td>Date</td>
			<td><input type="text"  name="dos" placeholder="dd-mm-yyyy format" required pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}"/></td>
			</tr> 
			 
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 
			 <tr>
			<td><b>Remarks <br>&nbsp;<br>&nbsp;</td>
			<td><textarea name="remark" cols="20" rows="3"></textarea></td>
		   </tr>
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
	       <tr>  
		   <td></td>
		   <td>
		   <input type="submit" name="pay" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
            </table>
            </form >

           <?php } ?>

			</div>
		   <div class="cl">&nbsp;</div>	
	

		   		
		</div>
		<!-- Main -->
	</div>
    
</div>
<br><br><br><br><br>