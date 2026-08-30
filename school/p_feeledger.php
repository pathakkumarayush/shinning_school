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
	     if (window.focus) {newwindow.focus()}
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

  <?php
    if(!empty($_GET['did']))
	{
	  $delete=mysqli_query($con,"delete from fee_detail where id='".$_GET['did']."'");
	  $msg="Deleted Successfully";
	}
  ?>
 
          <?php
          if(isset($_POST['search1']))
		  {
		  $_SESSION['schno']=$_POST['scholarno1'];
		  if(!empty($_SESSION['schno']))
		  {
		  $search=mysqli_query($con,"select * from student where student_scholar='".$_SESSION['schno']."' and student_session='".$_SESSION['session']."' ");
		  
		  $studrow=mysqli_fetch_array($search);
		  $memo=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
		  $num=mysqli_num_rows($memo);
		  }
		  }
		  ?>
          <?php
		  if(isset($_POST['search4']))
		  {
		  $_SESSION['stdid']=$_POST['stdid'];
		  $search=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' ");
		  $studrow=mysqli_fetch_array($search);
		  $memo=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
		  $num=mysqli_num_rows($memo);
		  }
		  if(!empty($_GET['stdid']))
		  {
		  $search=mysqli_query($con,"select * from student where student_id='".$_GET['stdid']."' and student_session='".$_SESSION['session']."' ");
	      $studrow=mysqli_fetch_array($search);
		  $memo=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."' and student='".$studrow['student_id']."' ");
		  $num=mysqli_num_rows($memo);
		  }
		  ?>
		  
		 
		  
          <?php
		  if(isset($_POST['search4']))
		  {
		  $_SESSION['stdid']=$_POST['stdid'];
		  $search1=mysqli_query($con,"select * from student where student_id='".$_POST['stdid']."' and student_session='".$_SESSION['session']."' ");
		  $studrow1=mysqli_fetch_array($search1);
		  $memo1=mysqli_query($con,"select * from fee_detail_preivios where session='".$_SESSION['session']."'  and student='".$studrow1['student_id']."' ");
		  $num1=mysqli_num_rows($memo1);
		  }
		  if(!empty($_GET['stdid']))
		  {
		  $search1=mysqli_query($con,"select * from student where student_id='".$_GET['stdid']."' and student_session='".$_SESSION['session']."' ");
	      $studrow1=mysqli_fetch_array($search1);
		  $memo1=mysqli_query($con,"select * from fee_detail_preivios where session='".$_SESSION['session']."' and student='".$studrow1['student_id']."'");
		  $num1=mysqli_num_rows($memo1);
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
	width:150px;
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
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Ledger</h2>
</div>
<div class="col_4">
                
 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
                    <div class="box-head">
	
<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."p_feeledger"."&&divid=3"; ?>">Search Student By Class </a>

				   </div>
      
       
       <?php
	   //student by scholar number
	   if((!empty($_GET['divid'])) && ($_GET['divid']==3))
	   {
	   ?>
	   <table style="margin:20px 0px 0px 20px; font-size:16px" >
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
	   <td>Student Name</td> 
	   <td><div id="txtHint1"></div></td>
       </tr>
	   <tr>
	   <td>&nbsp;</td>
	   <td>&nbsp;</td>
	   </tr>
	   <tr>  
	   <td><input type="submit" name="search4" value="Submit" style="width:80px; margin-left:40px"></td>   
	   </tr>
	   </table>
		<?php
		 }
		?> 
		<br><br>
		   <?php
	   if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg;   ?></div>
		  <?php
		   }
	   ?>
		<div class="table" style="border:#33CC66 10px solid;height:500px; margin-left:10px; width:1100px; overflow:scroll">
		<form id="form1">
		<div id="dvContainer">
		<h1 align="center" style="color:#000000; font-size:18px">SHINING PUBLIC HR. SEC. SCHOOL RAISEN (M.P.)</h1>
		
		<div align="center" style="padding-top:10px; font-size:18px">FEE LEDGER</div>
        <table align="center" style=" width:550px;">
		<tr>
		<td style="font-weight:bold">Student Name</td><td><?php echo $studrow['student_name']; ?></td>
		<td style="font-weight:bold">Student Father</td><td><?php echo $studrow['student_fname']; ?></td>
		</tr>
		<tr>
		<td style="font-weight:bold">Class</td><td><?php echo $studrow['student_class']; ?></td>
		<td style="font-weight:bold">Scholar No</td><td><?php echo $studrow['student_scholar']; ?></td>
		</tr>
		</table>  
        
	
	    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-size:11px;">
		<tr style="font-weight:bold; background-color:#FFFFFF">
	    <td>Sr</td>
		<td>Month</td>
	    <td>R.No.</td>
		<td>Previous  Fee</td>
		<td>Pre. Year Due</td>
		<td>Total</td>
		<td>Concession</td>
		<td>Fine(late Fee)</td>
		<td>Pre. Advance</td>
        <td>G.Total</td>
		<td>Fee Paid</td>
		<td>Due</td>
		<td>Extra Fee</td>
		<td>Date</td>
		<td></td>
	</tr>
    <?php
    $i=1;
	if($num1>0)
    {
	while($rowmemo1=mysqli_fetch_array($memo1))
    {
	?>	
    <tr>
	<td><?php echo $i;  ?></td>
    <td><?php
	if($rowmemo1['month']=='April,July,August,September,October,November,December,January,February,March')
	{
	echo 'April To March';
	}else{
	echo $rowmemo1['month'];
	} 
	 ?></td>
    <td><?php echo $rowmemo1['receiptno'];?></td>
	<td><?php echo $rowmemo1['p_year']; ?></td>
	<td><?php echo $rowmemo1['pdue'];?></td>
	<td><?php echo $rowmemo1['scout'];?></td>
	<td><?php echo $rowmemo1['concession'];?></td>
	<td><?php echo $rowmemo1['latefee'];?></td>
	<td><?php echo $rowmemo1['padv'];?></td>
    <td><?php echo $rowmemo1['tamnt'];?></td>
	<td><?php echo $rowmemo1['fee_deposit'];?></td>
	<td><?php echo $rowmemo1['due'];?></td>
	<td><?php echo $rowmemo1['extra_amnt'];?></td>
    <td><?php echo date("d-m-Y",strtotime($rowmemo1['date']));?></td> 
	<td style="font-size:14px;">
   
	<a href="javascript:void(0)" style="color:#FF0000" onClick="return popitup('https://smarterponline.com/bpa/school/printp.php?id=<?php echo $rowmemo1['id']; ?>')">
    View 
    </a>
	
    <?php /*?><a href="<?php echo $var."edit_fee&id=".$rowmemo['id']; ?>"  style="color:#FF0000" target="_blank">
    Edit</a><?php */?>
	<?php /*?><a href="<?php echo $var."edit_fee&&id=".$rowmemo['id'];?>" style="color:#FF0000"><img src="edit.png" style="height:16px; width:16px;"/></a><?php */?>
    </td>
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
	<tr><td colspan="14"></td></tr>
	</table>
	    </div>
	    </form>
		<input type="button" value="Print" id="btnPrint" />
        </div>
      
                 
 </form>
      
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
