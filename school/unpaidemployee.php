<?php
session_start();
require_once("../db.php");
if(empty($_GET['id']))
{
$_GET['id']=1;
}
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

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Pay Roll/staff.png" />
<a href="./?pageid=staff_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Unpaid Staff Salary Details</h2>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">
<a style=" border-radius:5px; padding:5 5 5 5 ; color:#FFFFFF; font-size:16px" href="">
By Month</a>
</div>
				
        <form action="#" method="post" enctype="multipart/form-data">
	    <?php
        if($_GET['id']==1)
	    {
	    ?>
		<table style="margin:30px 0px 0px 70px; font-size:14px">
          <tr>
            <td>Month<span style="color:#FF0000">*</span> </td>
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
                   <option value="february">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   </select>    
				   </td>
                  <td><input type="submit" name="search1" value="Submit" style="width:80px"></td>   
		        </tr>
            </table>
		
	    <?php
	    }
	    if(isset($_POST['search1']))
	    {
	    ?>	
        <div style="height:600px; overflow:scroll">
        <table width="988" border="0" style="border:#33cc66 solid 20px; color:#000000; margin-top:30px" >
        <tr class="box-head" >
        <td height="30">&nbsp;&nbsp;Sr </td>
	    <td height="30">&nbsp;&nbsp;Employee name </td>
        <td>&nbsp;&nbsp;Employee Id </td>
        <td>&nbsp;&nbsp;Month</td>
        <td>&nbsp;&nbsp;Amount</td>
	    </tr>
        <?php
        $teacher=mysqli_query($con,"select * from teacher where teacher_session='".$_SESSION['session']."' and status='Active' order by teacher_name asc");
		$i=1;
		while($tech_det=mysqli_fetch_array($teacher))
		{   
		$qry="select * from teacher_sal where session='".$_SESSION['session']."' and teacher='".$tech_det['teacher_id']."' and month='".$_POST['month1']."'";
		$result=mysqli_query($con,$qry);
        $tot=0;
		if(mysqli_num_rows($result)<1)
		{
		
	    echo "<tr class='table' >";
		echo "<td>".$i."</td>";
		echo "<td>".ucwords($tech_det["teacher_name"])."</td>";
		echo "<td>".$tech_det["teacher_id"]."</td>";
		echo "<td>".$_POST["month1"]."</td>";
	    echo "<td>".$tech_det["current_salary"]."</td>";
		
	    $i++;
        }
        }
        ?>
        </table>
	    </div>
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
    
	 