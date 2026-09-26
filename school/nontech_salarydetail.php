<script type="text/javascript">
function popitup(url) 
{
newwindow=window.open(url,'name','height=535,width=623');
if (window.focus) {newwindow.focus()}
return false;
       }
</script>

<?php
session_start();
require_once("../db.php");
if(empty($_GET['divid']))
{
$_GET['divid']=2;
}
?>
<?php
if(!empty($_GET['did']))
{
$delete=mysqli_query($con,"delete from teacher_sal where id='".$_GET['did']."'");
} 

 $sch=mysqli_query($con,"select * from school");
			$rowsch=mysqli_fetch_array($sch);
			$rowsch['school_name'];
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




<script type="text/javascript">
function confirmation() 
{ 
    if(!confirm("Do you want to delete this Record")) { 
        return false;
    }
    }
</script> 

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="../school/images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; color:#006633; font-size:20px; margin-top:15px;">Non-Teaching Staff Salary Details</h2>
<a href="./?pageid=salarydetail" style="color:#FFFFFF;float:right; background-color:#009966; margin-top:10px; padding:6px; font-size:18px">Teaching Staff Details</a>
<a href="./?pageid=salarydetail_d" style="color:#FFFFFF;float:right; background-color:#CC0000; margin-top:10px; padding:6px; font-size:18px">Group D</a>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">
<a style="border-radius:5px;padding:5 5 5 5;color:#FFFFFF;font-size:16px" href="<?php echo $var."salarydetail"."&&divid=1"; ?>">
</a>
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."nontech_salarydetail"."&&divid=2"; ?>">
Search Staff By Name</a> || &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."nontech_salarydetail"."&&divid=3"; ?>">All Staff</a>&nbsp;|| &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."nontech_salarydetail"."&&divid=4"; ?>">All Staff Bank</a>&nbsp;|| &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."nontech_salarydetail"."&&divid=5"; ?>">PF Staff</a>&nbsp;|| &nbsp;
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."nontech_salarydetail"."&&divid=6"; ?>">Non-PF Staff</a>
</div>
				
<form action="#" method="post" enctype="multipart/form-data">
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
    <td><input type="submit" name="Submit2" value="Search" /></td>
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
    <td><select name="eid" class="select" style="border-radius:4px; width:150px;">
			     <option>Select Staff</option>
				 <?php
				   $teacher=mysqli_query($con,"select * from teacher where staff_typ='nonteaching'");
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
    <td><input type="submit" name="Submit2" value="Search" /></td>
  </tr>
</table>
        <?php
	    }
	    ?>
	    <?php
		if((!empty($_GET['divid'])) && ($_GET['divid']==3))
		{
	    ?>
		<table  border="0" cellspacing="10" style="font-size:16px; " >
        <tr>
        <td>Month <span style="color:#FF0000">*</span></td>
        <td>
        <select name="month1"  class="select" style="border-radius:4px; width:150px;">
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
        </select>             
		</td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit3" value="Search" /></td>
        </tr>
        </table>
        <?php
	    }
	    ?>
	    <?php
	    if(isset($_POST['Submit3']))
		{
		?>
		
<table  border="1" style="border:#33cc66 solid 5px; font-size:14px; color:#000000; width:1150px;"  cellpadding="0" cellspacing="0">
<tr><td colspan="19" style="font-size:18px">
<br />
<center><?php echo $rowsch['school_name'];?></center>
<br />
<center>Salary Month - <?php echo $_POST['month1']?></center><br />
</td></tr>
    <tr class="box-head" >
    <td align="center" >S.N </td>
	<td align="center" >Name </td>
	<td align="center">Wd</td>
	<td align="center">CL</td>
	<td align="center">Absent</td>
	
    <td align="center">Basic Sal.</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">Total</td>
	<td align="center">Amount</td>
    <td align="center">Hra</td>
    <td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">G-Total</td>
	<td align="center">Pf</td>
	<td align="center">cl+</td>
	<td align="center">adv.</td>
	<td align="center">S-Money</td>
    <td align="center">Net sal.</td>
	<td align="center">Voucher</td>
	
	
  </tr>
  <?php
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_POST['month1']."' and st='nonteaching'";
		
		$result=mysqli_query($con,$qry);
         $i=1;
		while($row=mysqli_fetch_array($result))
		{
		$_SESSION['allstid']= $row['month'];
		$ded_sal=0;
		$ded=$row['pf_ded']+$row['leav_ded']+$row['transport'];
		
		$teacher=mysqli_query($con,"select * from teacher where  teacher_id='".$row['teacher']."' and staff_typ='nonteaching'");
		  
	    $tech_det=mysqli_fetch_array($teacher);
		//$ded_sal=$row["cur_sal"]-$ded;
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$row["workingd"]."</td>";
		echo "<td>".$row["cl"]."</td>";
		echo "<td>".$row["absent"]."</td>";
		
		echo "<td>".$row["act_basic"]."</td>";
		
		echo "<td>".$row["act_hra"]."</td>";
		echo "<td>".$row["act_conv"]."</td>";
		echo "<td>".$row["allow"]."</td>";
		echo "<td>".$row["cur_sal"]."</td>";
		echo "<td>".$row["basic"]."</td>";
		echo "<td>".$row["hra"]."</td>";
		
		echo "<td>".$row["conv"]."</td>";
		echo "<td>".$row["allow"]."</td>";
		$gd=$row["basic"]+$row["hra"]+$row["conv"];

        echo "<td>".$gd."</td>";
		echo "<td>".$row["pf_ded"]."</td>";
		echo "<td>".$row["cla"]."</td>";
		echo "<td>".$row["adv"]."</td>";
		echo "<td>".$row["dect"]."</td>";
	    echo "<td>".$row["sal_rec"]."</td>";
        $tant = $row["sal_rec"]; $tnnt+=$tant;

	?>		
	<td>
	
	<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/get_voucher.php?id=<?php echo $row["id"]; ?>')">
Print </a>
</td>
	</tr>
	
	<?php
$i++;
}
mysqli_close($con);
?>
<tr><td colspan="19"><span style="float:right; font-weight:bold;">Total Amount&nbsp;</span></td><td>&nbsp;<b><?php echo $tnnt; ?></b></td></tr>
	  </table>
	  <table>
	  <tr>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/get_print1.php?id=<?php echo  $_SESSION['allstid']; ?>')">
<input type="button" value="Generate Print" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>


<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/print_vouch_ntech.php?id=<?php echo  $_SESSION['allstid']; ?>')">
<input type="button" value="Print Voucher" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>
</tr>
</td>
	  </table>
		<?php
		 }
		?>
		
<?php 
  if(isset($_POST['Submit2']))
  {
  $qry1="select * from teacher_sal where teacher='".$_POST['eid']."'";
	
  $result1=mysqli_query($con,$qry1);
  $row1=mysqli_fetch_array($result1)
  ?>
  <table  border="1" style="border:#33cc66 solid 20px; font-size:14px; color:#000000; overflow:scroll;width:1150px;" >
   <tr class="box-head" >
    <td align="center">S.N </td>
	<td align="center">Month </td>
	<td align="center">Name </td>
	<td align="center">W.d</td>
	<td align="center">CL</td>
	<td align="center">Absent</td>
	
    <td align="center">Basic</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">Total</td>
	<td align="center">Amount</td>
    <td align="center">Hra</td>
    <td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">G-Total</td>
	<td align="center">Pf</td>
	<td align="center">cl+</td>
	<td align="center">adv.</td>
	<td align="center">S-Money</td>
    <td align="center">Net</td>
	 <td align="center"></td>
	
  </tr>
  <?php
		$qry="select * from teacher_sal where teacher='".$_POST['eid']."'";
	
		$result=mysqli_query($con,$qry);
	
         $i=1;
		while($row=mysqli_fetch_array($result))
		{
		$ded_sal=0;
		$ded=$row['pf_ded']+$row['leav_ded']+$row['transport'];
		
	   $teacher=mysqli_query($con,"select * from teacher where teacher_id='".$row['teacher']."' and teacher_school='".$_SESSION['uid']."'");
		$tech_det=mysqli_fetch_array($teacher);
		//$ded_sal=$row["cur_sal"]-$ded;
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".$row["month"]."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$row["workingd"]."</td>";
		echo "<td>".$row["cl"]."</td>";
		echo "<td>".$row["absent"]."</td>";
		echo "<td>".$row["act_basic"]."</td>";
		
		echo "<td>".$row["act_hra"]."</td>";
		echo "<td>".$row["act_conv"]."</td>";
		echo "<td>".$row["allow"]."</td>";
		echo "<td>".$row["cur_sal"]."</td>";
		echo "<td>".$row["basic"]."</td>";
		echo "<td>".$row["hra"]."</td>";
		
		echo "<td>".$row["conv"]."</td>";
		echo "<td>".$row["ac_allow"]."</td>";
		$gd=$row["basic"]+$row["hra"]+$row["conv"];

        echo "<td>".$gd."</td>";
		echo "<td>".$row["pf_ded"]."</td>";
		echo "<td>".$row["cla"]."</td>";
		echo "<td>".$row["adv"]."</td>";
		echo "<td>".$row["dect"]."</td>";
	    echo "<td>".$row["sal_rec"]."</td>";
		
    ?>
	<td>
	<a href="<?php echo $var."salarydetail&did=".$row['id']; ?>" onClick="return confirmation();"> 
	<img src="Delete.png" style="width:16px; height:16px;" />
	</a>
	|
<a href="<?php echo $var."edit_nontechsalary&eid=".$row['id']; ?>"><img src="edit.png" style="width:16px; height:16px;" /></a>
	</td>
	</tr>
	<?php
$i++;
}
mysqli_close($con);
?>
	  </table>
	  <?php
	    
		}
	  ?>
	  
	   <?php
	   if((!empty($_GET['divid'])) && ($_GET['divid']==4))
	   {
	   ?>
	   <table  border="0" cellspacing="10" style="font-size:16px; " >
       <tr>
       <td>Month <span style="color:#FF0000">*</span></td>
       <td>
        <select name="month1"  class="select" style="border-radius:4px; width:150px;">
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
                                 </select>             </td>
               
            </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit5" value="Search" /></td>
  </tr>
</table>
      <?php
	   }
	  ?>
<?php
  if(isset($_POST['submit5']))
  {
  ?>
    <table  border="1" cellpadding="0" cellspacing="0" style="border:#33cc66 solid 3px; color:#000000; overflow:scroll;" >
    <tr class="box-head" >
    <td align="center">S.N </td>
	<td align="center">Name </td>
	<td align="center">Account No</td>
	 <td align="center">Net Salary </td>
	</tr>
  
        <?php
        $qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_POST['month1']."' and st='nonteaching' and pf_type='Yes'";
	
		$result=mysqli_query($con,$qry);
	    $i=1;
		while($row=mysqli_fetch_array($result))
		{
	    $_SESSION['tid']= $row['month'];
		
		$teacher=mysqli_query($con,"select * from teacher where teacher_id='".$row['teacher']."' and teacher_school='".$_SESSION['uid']."'");
		$tech_det=mysqli_fetch_array($teacher);
		
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		
		echo "<td>".ucwords($tech_det["it_pt"])."</td>";
		
		echo "<td>".$row["sal_rec"]."</td>";
        ?>
	    <?php
        $i++;
        }
        mysqli_close($con);
        ?>
</table>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/getsal1.php?id=<?php echo  $_SESSION['tid']; ?>')">
<input type="button" value="Generate Print" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>
	  <?php
	    
		}
	  ?>
	  
	<?php if((!empty($_GET['divid'])) && ($_GET['divid']==5))
    {
	?>
   <table  border="0" cellspacing="10" style="font-size:16px; " >
   <tr>
    <td>Month <span style="color:#FF0000">*</span></td>
            <td>
            
             <select name="month1"  class="select" style="border-radius:4px; width:150px;">
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
                                 </select>             </td>
               
            </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit9" value="Search" /></td>
  </tr>
</table>
<?php
}
?>
<?php
if(isset($_POST['Submit9']))
{
?>
<table  border="1" style="border:#33cc66 solid 5px; color:#000000; width:1150px; font-size:14px;"  cellpadding="0" cellspacing="0">
<tr><td colspan="19" style="font-size:18px">
<br />
<center><?php echo $rowsch['school_name'];?></center>
<br />
<center>Salary Month - <?php echo $_POST['month1']?></center><br />
</td></tr>
    <tr class="box-head" >
    <td align="center" >S.N </td>
	<td align="center" >Name </td>
	<td align="center">Wd</td>
	<td align="center">CL</td>
	<td align="center">Abs</td>
	<td align="center">T-Day</td>
    <td align="center">Basic</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">Total</td>
	<td align="center">Basic</td>
	<td align="center">Pf-Basic</td>
    <td align="center">Hra</td>
    <td align="center">Con</td>
	<td align="center">O.A</td>
	<td align="center">G-Total</td>
	<td align="center">Pf</td>
	<td align="center">adv.</td>
	<td align="center">S-Money</td>
    <td align="center">Net sal.</td>
	<td align="center">Voucher</td>
	
	
  </tr>
  <?php
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_POST['month1']."' and pf_type='Yes' and st='nonteaching'";
		
		$result=mysqli_query($con,$qry);
         $i=1;
		while($row=mysqli_fetch_array($result))
		{
		$_SESSION['allpfid']= $row['month'];
		$ded_sal=0;
		$ded=$row['pf_ded']+$row['leav_ded']+$row['transport'];
		
		   $teacher=mysqli_query($con,"select * from teacher where  teacher_id='".$row['teacher']."'");
		  
		   $tech_det=mysqli_fetch_array($teacher);
		//$ded_sal=$row["cur_sal"]-$ded;
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$row["workingd"]."</td>";
		echo "<td>".$row["cl"]."</td>";
		echo "<td>".$row["absent"]."</td>";
		?><td><?php echo $totday =  $row["workingd"]-$row["absent"]+$row["cl"]?></td><?php
		echo "<td>".$row["act_basic"]."</td>";
		
		echo "<td>".$row["act_hra"]."</td>";
		echo "<td>".$row["act_conv"]."</td>";
		
		echo "<td>".$row["allow"]."</td>";
		echo "<td>".$row["cur_sal"]."</td>";
		echo "<td>".$row["basic"]."</td>";
		if(!empty($row["pf_ded"]))
		{
		if($row["absent"]=='0')
		{
		$pfamt = $row["basic"];
		
		echo "<td>".$pfamt."</td>";
		}else
		{
		$tottday = $totday-1;
		$osal = $row["act_basic"]/$row["workingd"];
		
		$pfamt = $osal*$tottday;
		echo "<td>".round($pfamt)."</td>";
		}
		}else{
		echo "<td>".$row["basic"]."</td>";
		}
		
		echo "<td>".$row["hra"]."</td>";
		
		echo "<td>".$row["conv"]."</td>";
		echo "<td>".$row["ac_allow"]."</td>";
		$gd=$row["basic"]+$row["hra"]+$row["conv"];

        echo "<td>".$gd."</td>";
		echo "<td>".$row["pf_ded"]."</td>";
		
	    echo "<td>".$row["adv"]."</td>";
		echo "<td>".$row["dect"]."</td>";
	    echo "<td>".$row["sal_rec"]."</td>";
		
$tant = $row["sal_rec"]; $tnnt+=$tant;

	?>		
	<td>
	
	<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/get_voucher.php?id=<?php echo $row["id"]; ?>')">
Print </a></td>
	</tr>
	
	<?php
$i++;
}
mysqli_close($con);
?><tr><td colspan="19"><span style="float:right; font-weight:bold;">Total Amount&nbsp;</span></td><td>&nbsp;<b><?php echo $tnnt; ?></b></td></tr>
	  </table>
	  
	  <table>
<tr>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/get_print_pf1.php?idpf=<?php echo  $_SESSION['allpfid']; ?>')">
<input type="button" value="Generate Print" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/print_vouch_ntpf.php?id=<?php echo  $_SESSION['allstid']; ?>')">
<input type="button" value="Print Voucher" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>
</tr>
</td>
	  </table>
<?php
}
?>
<?php if((!empty($_GET['divid'])) && ($_GET['divid']==6))
{
?>
   <table  border="0" cellspacing="10" style="font-size:16px; " >
   <tr>
    <td>Month <span style="color:#FF0000">*</span></td>
            <td>
            
             <select name="month1"  class="select" style="border-radius:4px; width:150px;">
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
                                 </select>             </td>
               
            </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit90" value="Search" /></td>
  </tr>
</table>
      <?php
	   }
	  ?>
	
	   <?php
	    if(isset($_POST['Submit90']))
		  {
		 ?>
		

	     
<table  border="1" style="border:#33cc66 solid 5px; color:#000000; width:1150px; font-size:14px;"  cellpadding="0" cellspacing="0">
<tr><td colspan="19" style="font-size:18px">
<br />
<center><?php echo $rowsch['school_name'];?></center>
<br />
<center>Salary Month - <?php echo $_POST['month1']?></center><br />
</td></tr>
    <tr class="box-head" >
    <td align="center" >S.N </td>
	<td align="center" >Name </td>
	<td align="center">Wd</td>
	<td align="center">CL</td>
	<td align="center">Absent</td>
	<td align="center">Total Days</td>
    <td align="center">Basic Sal.</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">Total</td>
	<td align="center">Amount</td>
    <td align="center">Hra</td>
    <td align="center">Con</td>
	<td align="center">G-Total</td>
	<td align="center">Pf</td>
	<td align="center">adv.</td>
	<td align="center">S-Money</td>
    <td align="center">Net sal.</td>
	<td align="center">Voucher</td>
	
	
  </tr>
  <?php
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_POST['month1']."' and pf_type='No' and st='nonteaching'";
		
		$result=mysqli_query($con,$qry);
         $i=1;
		while($row=mysqli_fetch_array($result))
		{
		$_SESSION['allnid']= $row['month'];
		$ded_sal=0;
		$ded=$row['pf_ded']+$row['leav_ded']+$row['transport'];
		
		   $teacher=mysqli_query($con,"select * from teacher where  teacher_id='".$row['teacher']."'");
		  
		   $tech_det=mysqli_fetch_array($teacher);
		//$ded_sal=$row["cur_sal"]-$ded;
		echo "<tr class='table'  align='center'>";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$row["workingd"]."</td>";
		echo "<td>".$row["cl"]."</td>";
		echo "<td>".$row["absent"]."</td>";
		?><td><?php echo $row["workingd"]-$row["absent"]+$row["cl"]?></td><?php
		echo "<td>".$row["act_basic"]."</td>";
		
		echo "<td>".$row["act_hra"]."</td>";
		echo "<td>".$row["act_conv"]."</td>";
		echo "<td>".$row["cur_sal"]."</td>";
		echo "<td>".$row["basic"]."</td>";
		echo "<td>".$row["hra"]."</td>";
		
		echo "<td>".$row["conv"]."</td>";
		$gd=$row["basic"]+$row["hra"]+$row["conv"];

        echo "<td>".$gd."</td>";
		echo "<td>".$row["pf_ded"]."</td>";
		
		
	   echo "<td>".$row["adv"]."</td>";
		echo "<td>".$row["dect"]."</td>";
	    echo "<td>".$row["sal_rec"]."</td>";
$tant = $row["sal_rec"]; $tnnt+=$tant;

	?>		
	<td>
	
	<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/get_voucher.php?id=<?php echo $row["id"]; ?>')">
Print </a></td>
	</tr>
	
	<?php
$i++;
}
mysqli_close($con);
?><tr><td colspan="17"><span style="float:right; font-weight:bold;">Total Amount&nbsp;</span></td><td>&nbsp;<b><?php echo $tnnt; ?></b></td></tr>
	  </table>
	  <table>
<tr>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/get_print_npf1.php?idn=<?php echo  $_SESSION['allnid']; ?>')">
<input type="button" value="Generate Print" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/sunshine/school/print_vouch_ntnpf.php?id=<?php echo  $_SESSION['allstid']; ?>')">
<input type="button" value="Print Voucher" style="width:165px; line-height:13px; margin-left:0px; margin-top:15px" >
</a>
</tr>
</td>
	  </table>
		<?php
		 }
		?>
	  </form>

<!-- Box Head -->
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
    