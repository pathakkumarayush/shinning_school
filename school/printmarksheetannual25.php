<script type="text/javascript">
		function popitup(url) 
		{
		 newwindow=window.open(url,'name','height=535,width=623');
	     if (window.focus) {newwindow.focus()}
	     return false;
       }
</script>
<script language="javascript">
function checkAll()
{
if (myform.allbox.checked==true)
	for(i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=true;
	}
else
{
	for (i=0; i<document.myform.elements.length;i++)
	{
		document.myform.elements[i].checked=false;
	}
}
}
</script>
<a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/demo/school/getmarksheet.php?id=<?php echo $studrow["student_id"]."&exam=".$_POST['exam'] ; ?> ')"><input type="button" value="Marksheet" style=" margin-left:0px; margin-top:15px" ></a>
<?php
  if(isset($_POST["submit5"]))
  {
  ?>   
     <script type="text/javascript">
      window.location="http://localhost/elite/school/getmarksheet1.php?id=<?php echo $_POST['formDoor']."&exam=".$_POST['exam']."&class=".$_POST["class1"]; ; ?>";
	</script>
  <?php
  }


?>
  
<?php
  if(isset($_POST['submit']))
  {
    $page=1;
    foreach($_POST['formDoor'] as $f)
	{
	
	  $sub=array();
	   $marks=mysqli_query($con,"select * from marks where student='$f' and ses='".$_SESSION["session"]."' and exam='".$_POST['exam']."'");
	   
	   
	   $otot=0;
		 $tot=0;

	   while( $row_marks=mysqli_fetch_array($marks))
	   {
	     $obtmarks=$row_marks['subject']."=".$row_marks['obtainmarks']." ";
	     $obtmarks1=array_push($sub,$obtmarks);
		 $otot+=$row_marks['obtainmarks'];
		 $tot+=$row_marks['totalmarks'];
		 
		 
		 $remark=$row_marks['remark'];
	     $present=$row_marks['Present']."/".$row_marks['Day'];
	   }
	   $std_marks= $otot."/".$tot;
	   
	    $p=(($otot/$tot)*100);  
	    $pp = round($p).'%';
		
		
		 if($pp > "59")
	     {
		 $div = "1st Division";
		 }else{
		 $div = "2nd Division";
		 }	 
									
	  
	   $obtmarks1=implode(",",$sub);
	   $msg="Report Card for Your Child is ".$obtmarks1."and total is".$std_marks." & percent ".$pp." &  attendance is ".$present." & remark is ".$remark." & division is ".$div;
       $stdnt=mysqli_query($con,"select * from student where uid='$f' and student_session='".$_SESSION['session']."'");
	    $rowstudent=mysqli_fetch_array($stdnt);
		$session=$_SESSION['session'];
		$page=1;
		$r=sms($_SESSION["uid"],$rowstudent['student_id'],"Report Card",$msg,'Yes',$session,$page);
	}
   ?>
     <script type="text/javascript">
	 alert("Message Sent Successfully");
	 </script>
   <?php
   
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
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Examination/exa.png" /><a href="./?pageid=exam_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/exa.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Print Marksheet </h2>
</div>
<div class="col_4" style="margin-top:0px;" >				 
			 

				
				
				
                 <form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
                    <div class="box-head">
	

	<a href="<?php echo $var."printmarksheetannual25" ?>" style="border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px">Annual Marksheet</a>

	
				   </div>
        
       
       
		  
		<table style=" margin-left:20px; margin-top:20px;width:400px; font-size:16px" >
		<tr>
                <td>Select Class:<span class="textfieldRequiredMsg"></span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td>
			<select name="class" class="select" style="width:200px" onchange="showStudent_21(this.value)">
              <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class_id']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
<td> Session:</td>
<td>
<input type="text" value="<?php echo $_SESSION['session'];?>"
 </td></tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
         <tr>  <td></td>
		   <td><input type="submit" name="search4" value="Submit" style="width:80px; margin-left:40px"></td>   
		  </tr>
		  </table>
		
		<br><br>
		 
		   
         <div class="table" style="border: #006633 20px solid; min-height:500px; width:1107px;overflow:scroll">
          
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr style="font-weight:bold">
	    <td>Roll No</td>
		<td style="width:100px;">Sch No</td>
	
        <td style="width:150px;">Name</td>
        <td>Class</td>
	    <td>Exam</td>
        <td>Action</td>
                </tr>
    <?php
  if(isset($_POST['search4']))
  {
   $class1=mysqli_query($con,"select * from class where class_id='".$_POST['class']."' ");


$row_class=mysqli_fetch_array($class1);

if(empty($row_class['class_section']))
{
  $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_class='".$row_class['class']."'  order by student_name Asc");
}
else
  {
    $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and status='0' and student_class='".$row_class['class']."' and student_section='".$row_class['class_section']."' order by student_name Asc");
  }

if($row_class['class']=='I')
{
$i=1001;
}
if($row_class['class']=='II A')
{
$i=2001;
}
if($row_class['class']=='II B')
{
$i=2025;
}
if($row_class['class']=='II C')
{
$i=201;
}
if($row_class['class']=='III A')
{
$i=3001;
}
if($row_class['class']=='III B')
{
$i=3032;
}
if($row_class['class']=='IV')
{
$i=4001;
}
if($row_class['class']=='NURSERY')
{
$i='1';
}
if($row_class['class']=='LKG')
{
$i=1;
}
if($row_class['class']=='UKG A')
{
$i=1;
}
if($row_class['class']=='VI C')
{
$i=601;
}
if($row_class['class']=='VII A')
{
$i=701;
}
if($row_class['class']=='VII B')
{
$i=701;
}
if($row_class['class']=='VII C')
{
$i=701;
}
if($row_class['class']=='IX A')
{
$i=901;
}
if($row_class['class']=='IX B')
{
$i=901;
}
if($row_class['class']=='IX C')
{
$i=901;
}
if($row_class['class']=='XI Arts')
{
$i=1101;
}
if($row_class['class']=='XI COMM.(COMP)')
{
$i=1101;
}
if($row_class['class']=='XI COMM.(PLAIN)')
{
$i=1101;
}
if($row_class['class']=='XI BIO')
{
$i=1101;
}
if($row_class['class']=='XI Sci-Maths')
{
$i=1101;
}
if($row_class['class']=='XI Sci-Maths Bio')
{
$i=1101;
}if($row_class['class']=='XI Sci-Bio Maths')
{
$i=1101;
}
	    
   while($studrow=mysqli_fetch_array($search))
   {
	?>	
    <tr style="color:#335599">
    <td><?php echo $studrow['rno'];?></td>
	<td><?php echo $studrow['student_scholar'];?></td>
  
	<td><?php echo ucwords($studrow['student_name']);?></td>
    <td><?php echo $studrow['student_class'];?>
	    <input type="hidden" name="class1" value="<?php echo $_POST['class'];?>">
	</td>
	 <td><?php echo $_POST['exam'];?>
	    <input type="hidden" name="exam" value="<?php echo $_POST['exam'];?>">
	 </td>
    <td>
 
<?php if($studrow['student_class']=="I" || $studrow['student_class']=="I A" || $studrow['student_class']=="I B" || $studrow['student_class']=="II" || $studrow['student_class']=="II A" || $studrow['student_class']=="II B")
  {
  ?>
 <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/1_2_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session']."&rno=".$i; ?> ')">Marksheet</a>
  <?php 
  }
 
  else if($studrow['student_class']=="III" || $studrow['student_class']=="III A" || $studrow['student_class']=="III B" || $studrow['student_class']=="IV" || $studrow['student_class']=="IV A" || $studrow['student_class']=="IV B")
  {
  ?>
<a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/3_4_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session']."&rno=".$i;  ?> ')">Marksheet</a>
   <?php 
  }
 
  else if($studrow['student_class']=="VI" || $studrow['student_class']=="VII" || $studrow['student_class']=="VI A" || $studrow['student_class']=="VI B" || $studrow['student_class']=="VII A" || $studrow['student_class']=="VII B")
  {
  ?>
 <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/6_8_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Marksheet</a>
  
 <?php 
  }
  
 else if($studrow['student_class']=="IX A" || $studrow['student_class']=="IX B" || $studrow['student_class']=="IX C")
  {
  ?>
   <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/9_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Print Marksheet</a>
 <?php 
  }
  else if($studrow['student_class']=="XI Maths")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/11_math25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Print Marksheet</a>
   <?php 
  }
  else if($studrow['student_class']=="XI Bio")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/11_bio25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Print Marksheet</a>
   <?php 
  }
  
  
   else if($studrow['student_class']=="XI Com.")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/11_com25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Print Marksheet</a>
  <?php 
  }
 else if($studrow['student_class']=="XI Math Bio")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/11_math_bio25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Print Marksheet</a>
  <?php 
  }
  
  else if($studrow['student_class']=="XI Bio Math")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/11_bio_math25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')">Print Marksheet</a>
  <?php 
  }
  else if($studrow['student_class']=="UKG" || $studrow['student_class']=="UKG A" || $studrow['student_class']=="UKG B")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/UKG_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session']."&rno=".$i; ; ?> ')">Print Marksheet</a>
  
  <?php 
  }
  
  else if($studrow['student_class']=="LKG" || $studrow['student_class']=="LKG A" || $studrow['student_class']=="LKG B")
  {
  ?>
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/LKG_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session']."&rno=".$i; ; ?> ')">Print Marksheet</a>

  <?php 
  }
 else 
 {
 ?>	
  <a  href="javascript:void(0)" style="color:#FF0000" onClick="return  popitup('https://smarterponline.com/shining/school/n_marksheet25.php?student_id=<?php echo $studrow["uid"]."&exam=".$_POST['exam']."&ses=".$_SESSION['session']."&rno=".$i; ; ?> ')">Print Marksheet</a>
  
  <?php }?>
 
</td> 
        </tr>
    <?php
     $i++;
	 }
	 ?>
<tr><td colspan="6">

 <?php if($row_class['class']=="I" || $row_class['class']=="I A" || $row_class['class']=="I B" || $row_class['class']=="II" || $row_class['class']=="II A" || $row_class['class']=="II B")
  {
  ?>
 <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/1_2_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session']; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
 </a>
 
 
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_1_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
 
 <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_a_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Activities" style="margin-left:70px">
 </a>
 
 <?php 
 }
 else if($row_class['class']=="III" || $row_class['class']=="III A" || $row_class['class']=="III B" || $row_class['class']=="IV A" || $row_class['class']=="IV B")
 {
 ?>
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/3_4_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px"></a>
 
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_3_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
 
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_a_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Activities" style="margin-left:70px">
 </a>
 
<?php
 }

 else if($row_class['class']=="VI" || $row_class['class']=="VII" || $row_class['class']=="VI A" || $row_class['class']=="VI B" || $row_class['class']=="VII A" || $row_class['class']=="VII B")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/6_8_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
  
    <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_6_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
 
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_a_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Activities" style="margin-left:70px">
 </a>
 <?php
 }
 
 else if($row_class['class']=="IX A" || $row_class['class']=="IX B" || $row_class['class']=="IX C")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/9_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_9_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
  

  <?php
 }
 
  else if($row_class['class']=="XI Maths")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/11_mathALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_math_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
<?php
 }
 else if($row_class['class']=="XI Bio")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/11_bioALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_bio_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
  <?php
 }
  else if($row_class['class']=="XI Com.")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/11_comALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_com_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
 <?php
 }
 
  else if($row_class['class']=="XI Math Bio")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/11_math_bioALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_math_bio_24.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>

  <?php
 }
 
  else if($row_class['class']=="XI Bio Math")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/11_allmarksheets.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
  
   <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/patrak_bio_math.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="Patrak" style="margin-left:70px">
 </a>
 
  <a href="javascript:void(0)" style="color:#FF0000; margin-left:20px;" onClick="return  popitup('https://smarterponline.com/shining/school/11_bio_mathall.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="ALL Print 23-24" style="margin-left:70px">
  </a>
  <?php
 }
 
 else if($row_class['class']=="UKG" || $row_class['class']=="UKG A" || $row_class['class']=="UKG B")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/UKG_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>

 <?php
 }
 else if($row_class['class']=="LKG" || $row_class['class']=="LKG A" || $row_class['class']=="LKG B")
 {
 ?>
  <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/LKG_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ?> ')"><span style="font-size:36px;">
  <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
  </a>
 
 <?php
 }
 else 
 {
 ?>
 <a href="javascript:void(0)" style="color:#FF0000;" onClick="return  popitup('https://smarterponline.com/shining/school/n_marksheetALL25.php?class=<?php echo $row_class['class']."&exam=".$_POST['exam']."&ses=".$_SESSION['session'] ; ; ?> ')"><span style="font-size:36px;">
 <input type="submit" name="submit" value="ALL Print Marksheet" style="margin-left:70px">
 </a>
	
	 <?php } ?> 
	
	</td>
	
	
	</tr>
	 <?php
	 }
	?>
</table>
	<!--<input type="submit" name="submit" value="Send Message" style="margin-left:70px">-->
	<!--<input type="submit" name="submit5" value="Print All" style="margin-left:70px">-->
         </div>
                 
               					
			
				
			</div>
</div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	