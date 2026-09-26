<script type="text/javascript">
 function validate()
{
 if( document.myForm.class.value == "-1" )
   {
     alert( "Please Select Class" );
     return false;
   }
   else
   {
	 return true; 
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
<?php
if(isset($_POST['submit']))
{
   if(empty($_POST['sub_nam']) || empty($_POST['class']) || empty($_POST['nperiods']))
   {
     $errormsg="Please Provide Complete Information";
   }
   if(empty($errormsg))
   {	
    
     if($_SESSION['r']=="-1"){
	   $_SESSION['r']="";
	  }
	  else 
	    {
		  $cla=$_POST['class'].$_SESSION['r'];
		}
      $countclasspet=mysqli_query($con,"select * from class where class='".$_POST['class']."' and class_section='".$_SESSION['r']."' and school='".$_SESSION['uid']."'");
	  $totalperiod=mysqli_fetch_array($countclasspet);
	  $querysub=mysqli_query($con,"SELECT * FROM `subjects` where class='$cla' and school='".$_SESSION['uid']."' and name='".$_POST['sub_nam']."' and session='".$_SESSION['session']."'");      
	  $numsub=mysqli_nuM_rows($querysub);
	  $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='$cla' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");      
	  $rowcountsub=mysqli_fetch_array($nosub);
	  $val=$rowcountsub['sum(no_of_periods)']+$_POST['nperiods'];
	   if($val<=$totalperiod['no_of_periods'])
	  {
	    if($numsub<1)
		{
	 $query=mysqli_query($con,"insert into subjects(name,class,school,no_of_periods,session) values('".$_POST['sub_nam']."','$cla','".$_SESSION['uid']."','".$_POST['nperiods']."','".$_SESSION['session']."')");
		  $msg="Inserted Successfully";
	    }
		else
		  {
		    $msg="Subject Already Exist";
		  }
	  ?>
	 
	  <?php
	  }
	  else
	  {
	   ?>
         <script type="text/ecmascript">	  
		alert("Sorry You are crossing the limit of total no of periods allocate to this class");  
	    </script>
	  <?php
      }
	  
	}
}
if(!empty($_GET['id']))
 {
	 $class=mysqli_query($con,"select * from subjects where subj_id='".$_GET['id']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'"); 
    $rowc=mysqli_fetch_array($class);
}
if(isset($_POST['update']))
  {
    $countclasspet=mysqli_query($con,"select * from class where class='".$_POST['class']."' and school='".$_SESSION['uid']."'");
	  $totalperiod=mysqli_fetch_array($countclasspet);
	   $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='".$_POST['class']."' and school='".$_SESSION['uid']."' ");      $rowcountsub=mysqli_fetch_array($nosub);
	  $val=$rowcountsub['sum(no_of_periods)']+$_POST['nperiods'];
	   
	  if($val<=$totalperiod['no_of_periods'])
	  {
	    if($numsub<1)
		{
          $upd=mysqli_query($con,"update subjects set name='".$_POST['sub_nam']."',no_of_periods='".$_POST['nperiods']."' where subj_id='".$_GET['id']."'");
          $msg="Updated Successfully";
    }
  } 
    else
	  {
	   ?>
         <script type="text/ecmascript">	  
		alert("Sorry You are crossing the limit of total no of periods allocate to this class");  
	    </script>
	  <?php
      }
    }
    if(!empty($_GET['did']))
	  {
	    $delete=mysqli_query($con,"delete from subjects where subj_id='".$_GET['did']."'");
	    $msg="Deleted Successfully";
	  }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Subjects")) { 
        return false;
    }
    
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
<div class="left_sect"><img src="images/Time Table/time.png" /><a href="./?pageid=exam_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Subject </h2>
</div>
<div class="col_4" style="margin-top:0px;" >			
				

                     
               
                 <form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());">
                  <?php
   if(!empty($errormsg))
   { ?>
	
    <div class="error" style="width:250px; height:10px; margin-left:120px"><?php echo $errormsg; ?></div>
   <?php
   }
?>
<?php
   if(!empty($msg))
   { ?>
	<div class="success" style="width:150px; height:10px; margin-left:120px"><?php echo $msg;?></div>
   <?php
   }
  
		if(empty($_GET['id']))
		{
		?>
		  <table style="margin:40px 0px 0px 15px">
<tr>
        <td>Class<span style="color:#F00">*</span></td>
        <td>
       <select name="class" class="select" style="width:175px" onCha	onchange="showdata(this.value)">
       <option value="-1">Select Class</option>
        <?php
          $result = mysqli_query($con,"SELECT distinct(class) FROM class where school='".$_SESSION['uid']."'") 
	or die(mysqli_error());

	  while($tier = mysqli_fetch_array( $result)) 
		{
		?>
        <option value="<?php echo $tier['class']; ?>" <?php if(!empty($_SESSION['q']) && ($_SESSION['q']==$tier['class'])){ ?> selected="selected" <?php } ?>><?php echo $tier['class'];   ?></option>
        <?php
		}
		?>
    </select>
    <div id="txtHint"></div>
  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
   <td>Section</td>
    <td><select name="section" onchange="showdata1(this.value)" class="select" style="width:175px">
	   <option value="-1">Select Section</option>
	     <?php
          $result1 = mysqli_query($con,"SELECT distinct(class_section) FROM class where school='".$_SESSION['uid']."'") 
          or die(mysqli_error());

	  while($tier1 = mysqli_fetch_array( $result1)) 
		{
		if(!empty($tier1['class_section']))
		{
		?>
        <option value="<?php echo $tier1['class_section']; ?>" <?php if(!empty($_SESSION['r']) && ($_SESSION['r']==$tier1['class_section'])){ ?> selected="selected" <?php } ?> ><?php echo $tier1['class_section']; ?></option>
        <?php
		}
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
   <td>Subject Name<span style="color:#F00">*</span></td>
   <td><input type="text" name="sub_nam" id="sub_nam" class="tb5" style="width:155px"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
   <td>No Of Periods<span style="color:#F00">*</span></td>
   <td><input type="text" name="nperiods" class="tb5" style="width:155px" onKeyPress="return isNumberKey(event)" /></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="submit" value="submit" style="width:80px; font-weight:bold"></td>
</tr>


</table>
      <?php
	    }
		  else
		    {
			?>
			<table style="margin:40px 0px 0px 15px">
<tr>
        <td>Class<span style="color:#F00">*</span></td>
        <td><input type="text" name="class" value="<?php echo $rowc['class'];  ?>" class="tb5" style="width:155px"  /></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>Subject Name<span style="color:#F00">*</span></td>
   <td><input type="text" name="sub_nam" value="<?php echo $rowc['name']; ?>" id="sub_nam" class="tb5" style="width:155px"></td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>No Of Periods<span style="color:#F00">*</span></td>
   <td><input type="text" name="nperiods" value="<?php echo $rowc['no_of_periods']; ?>" class="tb5" style="width:155px" onKeyPress="return isNumberKey(event)"></td>
</tr>
<input type="hidden" name="subid" value="<?php echo $_GET['id'];  ?>">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>

<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="update" value="Update" style="width:80px; font-weight:bold"></td>
</tr>


</table>
		<?php
		  }
		?>
		<br><br>
		  <div id="txtHint1">
		  <?php
		   if(!empty($_SESSION['r']) && ($_SESSION['r']!="-1"))
	  {
	   $class=$_SESSION['q'].$_SESSION['r'];
	   $fet_sub=mysqli_query($con,"select  * from class where school='".$_SESSION['uid']."' and class='".$_SESSION['q']."' and class_section='".$_SESSION['r']."'");
	  }
	  else
	     {
		   $class=$_SESSION['q'];
		   $fet_sub=mysqli_query($con,"select  * from class where school='".$_SESSION['uid']."' and class='".$_SESSION['q']."'");
		 }
		 
            
			$fetsub=mysqli_fetch_array($fet_sub);
		    $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='$class' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' ");           
		  
		   $rowcountsub=mysqli_fetch_array($nosub);
		   $val=$fetsub['no_of_periods']-$rowcountsub['sum(no_of_periods)'];
		   
		 ?>
            <div class="box-head">
						<h2 class="left">Currently Available Subjects For Class <?php echo $class; ?> </h2>
						 <span style="margin-left:40px">Total Period: <?php echo $fetsub['no_of_periods']; ?></span>
						 <span style="margin-left:40px">Remaining Period: <?php echo $val; ?></span>
						</div>
        
		   <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
		   <tr>
              <td>Sr</td>
			  <td>subjects</td>
              <td>Total No of Periods</td>
	          <td>Action</td>
          </tr>
  <?php
    $i=1;
	 
      $fet_subj=mysqli_query($con,"select  * from subjects where class='$class' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	  while($rowsubj=mysqli_fetch_array($fet_subj))
	  {
	?>
      	
      <tr>
	 <td><?php echo $i; ?></td>
     <td> <?php echo $rowsubj['name']; ?></td>
     <td><?php 
	 $fet_period=mysqli_query($con,"select  * from class where class='$class' and school='".$_SESSION['uid']."' ");
      $fetperiod=mysqli_fetch_array($fet_period);
	  $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='".$_SESSION['q']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' ");      
$rowcountsub=mysqli_fetch_array($nosub);
	?>
     <?php  echo $rowsubj['no_of_periods']; ?> </td>
	 <td>
	     <a href="<?php echo $var."addsub&&id=".$rowsubj['subj_id']; ?>">Edit</a>
         <a href="<?php echo $var."addsub&&did=".$rowsubj['subj_id']; ?>" onClick="return confirmation();">Delete</a><br>
	    </td>
      
     </tr>
	<?php	
      $i++;
	}
    ?>
</table>
           
         </div>
      
                 </div>
                   </form>
                  
				<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  