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

</style>
<?php
  if(isset($_POST["send"]))
  {
    foreach($_POST['due'] as $k=>$d)
	{
  
   $sub="Fee Due Message";
   $nmsg="Fee For the ".$d." has been due please pay the amount as soon as possible.";	
	$session=$_SESSION['session'];
	$page=1;
	$r=sms($_SESSION["uid"],$k,$sub,$nmsg,'Yes',$session,$page);
	
	}
	
    
  }
?>

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

<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/FEE Management/feehome.png" /><a href="./?pageid=fee_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/enquiry.png"  style=" float:left; width:60px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Student Fee Defaulter</h2>
</div>
<div class="col_4">
<form method="post" name="myform" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                <div class="box-head" style=" font-size:18px">
				<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."fee_defaulter"."&&divid=2"; ?>">Fee Defaulter By Class</a>
			   </div>
         
       <?php
	   //student by scholar number
	   if((!empty($_GET['divid'])) && ($_GET['divid']==1))
	   {
	   ?>
       <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
       <br>
       </div>
       <?php
	   }
	   ?>
       <?php
	   //student by scholar number
	   if((!empty($_GET['divid'])) && ($_GET['divid']==2))
	   {
	   ?>
         
       <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
          <table style="margin:30px 0px 0px 70px; font-size:14px; width:350px">
          <tr>
                <td>Class<span class="textfieldRequiredMsg">*</span></td>
              <?php
                $class=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."'");
			 ?>
            <td><select name="class" class="select" style="width:150px" onchange="getinst(this.value)">
               <option value="-1">Select class</option>
              <?php
			     while($rclass=mysqli_fetch_array($class))
				 {
			  ?>
              <option value="<?php echo $rclass['class']; ?>"  ><?php echo $rclass['class'].$rclass['class_section']; ?></option>
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
			    <td>Select Instalment</td>
				<td><select name="instalment" class="select" style="width:150px" >
				<option value="instalment">Select Instalment </option>
				<option value="Quaterly1">Quaterly1</option>
				<option value="Quaterly2">Quaterly2</option>
				<option value="Quaterly3">Quaterly3</option>
				<option value="Quaterly4">Quaterly4</option>
				</select></td>
			 </tr>
			   <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
			 </tr>
			 
		   <tr>
		   <td></td>
           <td><input type="submit" name="search" value="Submit" style="width:80px"></td>   
          </tr>
        </table>
		<br>
        </div>
        
        <?php
		 }
		 ?>

		
	   <div class="table" style="border: #006633 20px solid; height:420px; margin:0px 0px 0px 0px; overflow:scroll">
                
	    <h2 align="center" style="margin-top:20px; color:#990033">Session: <?php echo $_SESSION['session']; ?></h2>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="font-weight:bold">
	    <td><input type='checkbox' value='on' id='chkall' name='allbox' onclick='checkAll();'/></td>
		<td>Student Name</td>
		<td>Father Name</td>
        <td>Class</td>
        <td>Month</td>     
	    <td>Amount</td>
	    </tr>
       
	    <?php
        $i=1;
	    if(isset($_POST['search']))
	    {
	    $class2=mysqli_query($con,"select * from class where school='".$_SESSION['uid']."' and class ='".$_POST['class']."'");
		$rclass=mysqli_fetch_array($class2);
	    $search=mysqli_query($con,"select * from student where student_session='".$_SESSION['session']."' and student_school='".$_SESSION['uid']."' and 
		student_class='".$rclass['class']."' and status='0' order by student_name asc");
		$num=mysqli_num_rows($search);
		if($num>0)
		{
		while($studrow=mysqli_fetch_array($search))
		{
	    // $search1=mysqli_query($con,"select * from fee_detail where session='".$_SESSION['session']."' and school='".$_SESSION['uid']."'   and student='".$studrow['student_id']."' and month='".$_POST['month1']."'");
		$num4=0;
		$distinctmonth=mysqli_query($con,"select * from fee_detail where student='".$studrow['student_id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' and instalment='".$_POST['instalment']."'");
		$num4=mysqli_num_rows($distinctmonth);
		if(($num4<1))
		{
		?>	
        <tr style="color:#335599">
        <td><input type="checkbox" name='formDoor[]' value="<?php echo $studrow['student_id']; ?>"  id='chk<?php echo $i; ?>' /></td>
	    <td><?php  echo ucwords($studrow['student_name']);?></td>
		<td><?php  echo ucwords($studrow['student_fname']);?></td>
	    <td><?php echo ucwords($studrow['student_class']);?></td>
	    <td><?php echo $_POST['instalment']; ?></td>
	    <td>
		<?php 
		if($studrow['transport_status']=='Active')
		{
        $selrct=mysqli_query($con,"select * from trans_instdetail where stop_name='".$studrow['transport_stopage']."' and inst_type='".$_POST['instalment']."' and session='".$_SESSION['session']."'");
		$rowselrect=mysqli_fetch_array($selrct);
	    $rowselrect['amnt'];
		
		  $selrc=mysqli_query($con,"select * from instdetail where class='".$studrow['student_class']."' and inst_type='".$_POST['instalment']."' and session='".$_SESSION['session']."'");
		$rowselrec=mysqli_fetch_array($selrc);
	    echo $val = $rowselrec['amnt']+ $rowselrect['amnt'];
		 
		}else{
	  $selrc=mysqli_query($con,"select * from instdetail where class='".$studrow['student_class']."' and inst_type='".$_POST['instalment']."' and session='".$_SESSION['session']."'");
		$rowselrec=mysqli_fetch_array($selrc);
	    echo $val = $rowselrec['amnt'];
		}
		
		?>
		</td>
        <input  type="hidden" name="due[<?php echo $studrow['student_id']; ?>]" value="<?php echo $_POST['instalment']; ?>"  style="width:80px"  />
        </tr>
        <?php
        $i++;
	    $num4="";
	    } 
	    }
	    }
	    }
        else
	    {
	    ?>
        <td style="color:#990066"><?php echo "No Record"; ?></td>
	    <?php
	    }
	    ?>
	    <tr>
	    
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	    <td><input type="submit" name="send" value="Send Message"></td>
	    </tr>
	    </table>
        </div>
        </form>


</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  