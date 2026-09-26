
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
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Pay Roll/staff.png" /><a href="./?pageid=staff_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teacher Salery Details</h2>
</div>
<div class="col_4">
<div class="box-head" style="width:1142px">
						 <a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="<?php echo $var."staff_salery_details"."&&divid=1"; ?>">Search  By Staff Id</a>&nbsp;|| &nbsp;
						 <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."staff_salery_details"."&&divid=2"; ?>">Search Staff By Name</a> || &nbsp;<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."staff_salery_details"."&&divid=3"; ?>">All Staff</a>
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
    <td><input type="submit" name="Submit2" value="search" /></td>
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
    <td><input type="submit" name="Submit2" value="search" /></td>
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
            
             <select name="month1"  class="select">
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
    <td><input type="submit" name="Submit3" value="search" /></td>
  </tr>
</table>
      <?php
	   }
	  ?>
	
	
	
		
	     <?php
	     if(isset($_POST['Submit3']))
		  {
		 ?>
		
<a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://localhost/manorama/school/genpayslip.php?month=<?php echo $_POST['month1']; ?>')"><input type="button" value="Print List " style="width:200px;float:right" ></a>
	     
		 	<table width="1162" border="0" style="border:#FFC1E0 solid 20px;" >
  <tr class="box-head" >
    <td align="center" >S.N </td>
	<td align="center" >Name </td>
	<td align="center">Wd</td>
	<td align="center">CL</td>
	<td align="center">Absent</td>
	<td align="center">Total Days</td>
    <td align="center">Basic Salary</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">Total</td>
	<td align="center">Amount</td>
   <td align="center">Hra</td>
   <td align="center">Con</td>
	<td align="center">Grand Total</td>
	<td align="center">Pf</td>
	<td align="center">Esi</td>
	
	  <td align="center">It/Pt</td>
	 
    <td align="center">Total</td>
	<td align="center">Net</td>
	
	
  </tr>
  <?php
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and month='".$_POST['month1']."'";
		
		$result=mysqli_query($con,$qry);
         $i=1;
		while($row=mysqli_fetch_array($result))
		{
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
		if($row["absent"]==$row["cl"])
{
   $wd=$row["workingd"];
}
else if($row["absent"]>$row["cl"])
{
   $wd=$row["absent"]-$row["cl"];
  $wd1=$row["workingd"]-$wd;
}
		echo "<td>".$wd1."</td>";
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
		echo "<td>".$row["esi"]."</td>";
		
		  echo "<td>".$row["it_pt"]."</td>";
		
		if(empty($row['it_pt']))
		{
        $tot=$row["pf_ded"]+$row["esi"];
         }
		 else
		 {
		 $tot=$row["pf_ded"]+$row["it_pt"];
		 }
		 echo "<td>".$tot."</td>";
		 $net=$gd-$tot;
		 echo "<td>".$net."</td>";


	?>		
	
	
	<?php
$i++;
}
mysqli_close($con);
?>
	  </table>
		<?php
		 }
		
	  
	      if(isset($_POST['Submit2']))
		  {
		  $qry1="select * from teacher_sal where teacher='".$_POST['eid']."'";
	
		$result1=mysqli_query($con,$qry1);
		$row1=mysqli_fetch_array($result1)
 		?>
        <table  border="0" style="border:#FFC1E0 solid 20px;"  width="1162">
   <tr class="box-head" >
    <td align="center" >S.N </td>
	<td align="center" >Name </td>
	<td align="center">Wd</td>
	<td align="center">CL</td>
	<td align="center">Absent</td>
	<td align="center">Total Days</td>
    <td align="center">Basic Salary</td>
	<td align="center">Hra</td>
	<td align="center">Con</td>
	<td align="center">Total</td>
	<td align="center">Amount</td>
   <td align="center">Hra</td>
   <td align="center">Con</td>
	<td align="center">Grand Total</td>
	<td align="center">Pf</td>
	<td align="center">Esi</td>
	<?php
	  if(!empty($row1['it_pt']))
	  {
	  ?>
	  <td align="center">It/Pt</td>
	  <?php
	  }
	?>
    <td align="center">Total</td>
	<td align="center">Net</td>
	<td align="center">Payslip</td>
	
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
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$row["workingd"]."</td>";
		echo "<td>".$row["cl"]."</td>";
		echo "<td>".$row["absent"]."</td>";
		if($row["absent"]==$row["cl"])
{
   $wd=$row["workingd"];
}
else if($row["absent"]>$row["cl"])
{
   $wd=$row["absent"]-$row["cl"];
  $wd1=$row["workingd"]-$wd;
}
		echo "<td>".$wd1."</td>";
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
		echo "<td>".$row["esi"]."</td>";
		if(!empty($row['it_pt']))
		{
		  echo "<td>".$row["it_pt"]."</td>";
		}
		if(empty($row['it_pt']))
		{
        $tot=$row["pf_ded"]+$row["esi"];
         }
		 else
		 {
		 $tot=$row["pf_ded"]+$row["it_pt"];
		 }
		 echo "<td>".$tot."</td>";
		 $net=$gd-$tot;
		 echo "<td>".$net."</td>";


	?>
	<td><a  href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('http://smarteducations.in/smarterp/bplacademy/school/genpayslip.php?id=<?php echo $row["id"]; ?>')">Payslip</a></td>
	<?php
$i++;
}
mysqli_close($con);
?>
	  </table>
	  <?php
	    
		}
	  ?>
	  </form>
 
		  
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
