<html>
<head>
<script language="javascript">
function download_report()
{
window.location='report.xls';
}
</script>
<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=635,width=723');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
</head>
<body alink="#00FF66" link="#00CC00">
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
#div1{ display:none;}
#div2{ display:none;}
</style>
<div class="full_div">
        <br clear="all" />
        <div class="left_sect"><img src="images/Student Detail/home.png" /><a href="./?pageid=student_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        <img src="std.png"  style=" float:left; width:35px; height:40px; margin-left:5px; margin-top:2px;"/>
        <center><h2 style="text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student House Details</h2></center>
        </div>
        <div class="col_4">
        <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
      
        <div class="box-head" style="width:1127px">
	    <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_house"."&&divid=4"; ?>">Search Student House-Wise</a>
		&nbsp;||&nbsp;
		 <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."student_house"."&&divid=5"; ?>">Search Student Class-Wiss</a>
		</div>				
        <?php
		 //student by scholar Id
	     if((!empty($_GET['divid'])) && ($_GET['divid']==5))
		 {
	     ?>
         <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
         <table style="margin:30px 0px 0px 70px; font-size:14px; width:550px">
		 
         <tr>
		 <td>Class<span class="textfieldRequiredMsg"></span></td>
         <?php
         $class=mysqli_query($con,"select distinct(class) from class where school='".$_SESSION['uid']."'");
		 ?>
         <td><select name="class" class="select" style="width:150px" onChange="showSection(this.value)">
         <option value="-1">Select class</option>
         <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class']; ?></option>
            <?php
				 }
			?>
            
            </select>
              </td>
         <td>Select House<span class="textfieldRequiredMsg"></span></td>
        
         <td><select name="hname" class="select" style="width:150px" onChange="showSection(this.value)">
         <option value="-1">Select House</option>
		 <option value="Unity">Unity</option>
		 <option value="Harmony">Harmony</option>
	     <option value="Peace">Peace</option>
		 <option value="Prosperity">Prosperity</option>
         </select>
         </td>
		 <!-- <td><div id="txtHint1"></div></td>-->
         <td><input type="submit" name="search5" value="Submit" style="width:80px"></td>   
		 </tr>
         </table>
		 <br>
         </div>
         <?php
		 }
	     ?>
	 
	 
	 
        <?php
		//student by scholar Id
	    if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		{
	    ?>
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
         <tr>
         <td>Select House<span class="textfieldRequiredMsg"></span></td>
        
         <td><select name="hname" class="select" style="width:150px" onChange="showSection(this.value)">
         <option value="-1">Select House</option>
		 <option value="Unity">Unity</option>
		 <option value="Harmony">Harmony</option>
	     <option value="Peace">Peace</option>
		 <option value="Prosperity">Prosperity</option>
         </select>
         </td>
		 <!-- <td><div id="txtHint1"></div></td>-->
         <td><input type="submit" name="search4" value="Submit" style="width:80px"></td>   
		 </tr>
         </table>
		 <br>
		 
        </div>
        <?php
		 }
	    ?>
	    <?php
        if(isset($_POST['search4']))
        {
		$search=mysqli_query($con,"select * from student where hname='".$_POST['hname']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
		$num=mysqli_num_rows($search);	 
        ?>  
		<div class="table" style="border:#006633 30px solid; height:480px; width:1087px;overflow:scroll">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Sch. No</td>
	    <td>Student Name</td>
		<td>Father</td>
		<td>Mother</td>
        <td>Class</td>
		<td>Address</td>
		<td>Contact No</td>
		<td>House</td>
       </tr>
        <?php
		
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['student_scholar'];?></td>
       
	    <td><?php echo ucwords($studrow['student_name']);?></td>
	    <td><?php echo ucwords($studrow['student_fname']);?></td>
	    <td><?php echo ucwords($studrow['m_name']);?></td>
        <td><?php echo $studrow['student_class'];?></td>
		<td><?php echo $studrow['student_address'];?></td>
        <td><?php echo $studrow['student_contactno'];?></td> 
	     <td><?php echo $studrow['hname'];?></td>
	   
        </tr>
    <?php
     $i++;
	 }
	}
	else
	{
	?>
	<tr>
	   <td><span style="color:#CC0000">No Record</span></td>
	</tr>
	<?php
	}
	?>
</table>
        <?php }?>
<?php
if(isset($_POST['search4']))
{

?>
<table>
<tr>
<td>
<a href="javascript:void(0);" onClick="javascript:download_report();" style="font-size:16px;">Download Excel Report</a><?php
require_once("db.php");
require_once("excelwriter.class.php");
session_start();
$excel=new ExcelWriter("report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class","Mobile");
$excel->writeLine($myArr);


$qry=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and hname='".$_POST['hname']."'");

if($qry!=false)
{
$i=1;
while($res=mysqli_fetch_array($qry))
{
$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class'],$res['student_contactno']);
$excel->writeLine($myArr);
$i++;
}
}
?>
</td>
</tr>
</table>
<?php } ?>




 </div>
      
        
		
	     <?php
         if(isset($_POST['search5']))
         {
		 $search=mysqli_query($con,"select * from student where hname='".$_POST['hname']."' and student_class='".$_POST['class']."' and  student_session='".$_SESSION['session']."' and status='0' order by student_name Asc");
		 $num=mysqli_num_rows($search);	 
         ?>  
		 <div class="table" style="border:#006633 30px solid; height:480px; width:1087px;overflow:scroll">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Sch. No</td>
	    <td>Student Name</td>
		<td>Father</td>
		<td>Mother</td>
        <td>Class</td>
		<td>Address</td>
		<td>Contact No</td>
		<td>House</td>
       </tr>
        <?php
		
        $i=1;
	    if($num>0)
		{
	    while($studrow=mysqli_fetch_array($search))
		{
	    ?>	
        <tr style="color:#335599">
        <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['student_scholar'];?></td>
         <td><?php echo ucwords($studrow['student_name']);?></td>
	    <td><?php echo ucwords($studrow['student_fname']);?></td>
	    <td><?php echo ucwords($studrow['m_name']);?></td>
        <td><?php echo $studrow['student_class'];?></td>
		<td><?php echo $studrow['student_address'];?></td>
        <td><?php echo $studrow['student_contactno'];?></td> 
	    <td><?php echo $studrow['hname'];?></td>
	    </tr>
    <?php
     $i++;
	 }
	}
	else
	{
	?>
	<tr>
	   <td><span style="color:#CC0000">No Record</span></td>
	</tr>
	<?php
	}
	?>
</table>
<table>
<tr>
<td>
<a href="javascript:void(0);" onClick="javascript:download_report();" style="font-size:16px;">Download Excel Report</a><?php
require_once("db.php");
require_once("excelwriter.class.php");
session_start();
$excel=new ExcelWriter("report.xls");
if($excel==false)	
echo $excel->error;

$myArr=array("S.No.","Student Name","Student Father","Student Class","Mobile");
$excel->writeLine($myArr);


$qry=mysqli_query($con,"select * from student where hname='".$_POST['hname']."' and student_class='".$_POST['class']."' and  student_session='".$_SESSION['session']."' and status='0'");

if($qry!=false)
{
$i=1;
while($res=mysqli_fetch_array($qry))
{
$myArr=array($i,$res['student_name'],$res['student_fname'],$res['student_class'],$res['student_contactno']);
$excel->writeLine($myArr);
$i++;
}
}
?>
</td>
</tr>
</table>


<?php }?>





 </div>
               
        </form>					
        
     
			   
		</div>
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	