<script type="text/javascript">
function popitup(url) 
{
newwindow=window.open(url,'name','height=535,width=623');
if (window.focus) {newwindow.focus()}
return false;
       }
</script>
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
<?php
require_once("../db.php");
if(!empty($_GET['did']))
{
$st="Dactive";
$delete=mysqli_query($con,"update teacher set status='$st' where  teacher_id='".$_GET['did']."'");
$msg="Deleted Successfully";
}
if(!empty($_GET['uid']))
{
  $_SESSION['id']=$_GET['uid'];
}
?>

<?php
if(isset($_POST['Submit']))
{
$query=mysqli_query($con,"insert into adv_sal(tid,amt,date,month) values('".$_POST['tid']."','".$_POST['amt']."','".$_POST['date']."','".$_POST['month']."')");
}

?>

<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field from Fee Card")) { 
        return false;
    }
    
} 
</script>

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="../school/images/Pay Roll/staff.png" />
<a href="./?pageid=adance">
<img src="../school/images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="../school/images/tech.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Advance Salary Details</h2>
</div>

<div class="col_4">
<div class="box-head" style="width:1127px;">


<h2><b>Advance Salary Details</b></h2>		 
</div>


<div style="width:80%; overflow:scroll; border:10px #009933 solid; height:400px;">
<table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
<tr style="background-color:#009933; line-height:32px; color: #FFFFFF; font-size:16px; font-weight:bold;" align="center">
<td>Sr No.</td><td>Staff Name</td><td>Amount</td><td>Date</td><td>Month</td><td>Print</td>
</tr>
<?php
$_GET['uid'];
$qry="select * from adv_sal where tid='".$_GET['uid']."'";
$i=1;
$result=mysqli_query($con,$qry);
while($row=mysqli_fetch_array($result))
{
?>
<tr align="center" style="font-weight:bold; line-height:25px;">
<td><?php echo $i; ?></td>
<td><?php
$qry1="select * from teacher where teacher_id='".$row['tid']."'";
$result1=mysqli_query($con,$qry1);
$row1=mysqli_fetch_array($result1);
echo $row1['teacher_name']; 
?></td>
<td><?php echo $row['amt']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['month']; ?></td>
<td>
<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/kmps/school/adv_voucher.php?id=<?php echo $row["id"]; ?>')">
Print </a></td>
</tr>
<?php
$i++;
}
?>
</table>
</div>               
                 
<!-- Box Head -->
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
    			