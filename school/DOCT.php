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
        <div class="left_sect"><img src="images/Pay Roll/staff.png" /><a href="./?pageid=staff_home">
        <img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
        <div class="shell">

        <div class="shell_main">
        <div class="enquiry">
        
        <h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">TEACHER DOCUMENTS DETAILS</h2>
        </div>
        <div class="col_4">
     
		<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
        <br><br>
        <div class="box-head" style="width:1127px">
	    <a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."DOCT"."&&divid=4"; ?>">All Teacher</a>
			&nbsp;||&nbsp;
		<a style=" border-radius:5px; padding:5 5 5 5 ;color:#FFFFFF;font-size:16px" href="<?php echo $var."DOCT"."&&divid=2"; ?>">Search By Name</a>
		</div>				
     
	 <?php
		//student by scholar Id
	    if((!empty($_GET['divid'])) && ($_GET['divid']==2))
		{
	    ?>
        <div style="border: solid #000 0px; width:500; margin-left:30px; border-radius:5px; margin-top:7px;">
        <table style="margin:30px 0px 0px 0px; font-size:14px; width:390px">
         <tr>
         <td>Teacher Name<span class="textfieldRequiredMsg"></span></td>
        
          <td><input type="text" name="tname"></td>
			
           <td><input type="submit" name="search3" value="Submit" style="width:80px"></td>   
		  </tr>
        </table>
		
		
		<br>
        </div>
       <?php
		 }
		?>
		<div class="table" style="border:#006633 30px solid; height:480px; width:1087px;overflow:scroll">
       <?php
		//student by scholar Id
	    if((!empty($_GET['divid'])) && ($_GET['divid']==4))
		{
	    ?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Teacher<br> Name</td>
		<td>Father/Husband<br> Name</td>
		<td>Pan</td>
		<td>Aadhar</td>
		<td>B.ed/D.ed <br>Markshheet</td>
		<td>PG<br>Marksheet </td>
		<td>Gra<br>Markshheet </td>
		<td>12th<br>Markshheet </td>
		<td>10th<br>Markshheet </td>
		<td>Bank<br>Passbook </td>
		<td>Other Doc.</td>
        </tr>
    <?php
	$sql=mysqli_query($con,"select * from teacher where status='Active' and teacher_session='".$_SESSION['session']."'");
    $i=1;
	while($studrow=mysqli_fetch_array($sql))
    {
	    ?>	
        <tr style="color:#335599">
	    <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['teacher_name'];?></td>
	    <td><?php echo $studrow['father_name'];?></td>
	   
	    <td>
		<?php 
		if($studrow["dimg"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		<td>
		<?php 
		if($studrow["dimg1"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg1"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
	   <td>
		<?php 
		if($studrow["dimg2"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg2"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg3"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg3"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg4"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg4"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		<td>
		<?php 
		if($studrow["dimg5"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg5"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg6"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg6"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg7"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg7"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
	  
	  <td>
		<?php 
		if($studrow["dimg8"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg8"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
	  
        </tr>
        <?php
        $i++;
	    }
	    ?>
        </table>
      
	   <?php
		 }
		?>
		
		
		
		<?php
		if(isset($_POST['search3']))
		{
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr style="font-weight:bold">
	    <td>Sr</td>
		<td>Teacher<br> Name</td>
		<td>Father/Husband<br> Name</td>
		<td>Pan</td>
		<td>Aadhar</td>
		<td>B.ed/D.ed <br>Markshheet</td>
		<td>PG<br>Marksheet </td>
		<td>Gra<br>Markshheet </td>
		<td>12th<br>Markshheet </td>
		<td>10th<br>Markshheet </td>
		<td>Bank<br>Passbook </td>
		<td>Other Doc.</td>
        </tr>
    <?php
	$sql=mysqli_query($con,"select * from teacher where teacher_name Like '".$_POST['tname']."%' and status='Active' and teacher_session='".$_SESSION['session']."'");
    $i=1;
	while($studrow=mysqli_fetch_array($sql))
    {
	    ?>	
        <tr style="color:#335599">
	    <td><?php echo $i; ?></td>
	    <td><?php echo $studrow['teacher_name'];?></td>
	    <td><?php echo $studrow['father_name'];?></td>
	   
	    <td>
		<?php 
		if($studrow["dimg"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		<td>
		<?php 
		if($studrow["dimg1"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg1"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
	   <td>
		<?php 
		if($studrow["dimg2"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg2"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg3"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg3"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg4"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg4"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		<td>
		<?php 
		if($studrow["dimg5"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg5"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg6"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg6"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
		
		<td>
		<?php 
		if($studrow["dimg7"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg7"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
		
	  
	  <td>
		<?php 
		if($studrow["dimg8"]=='')
		{
		?>
		<a href="" target="_blank">File Not Uploaded</a>
		<?php
		}else{
		?>
		<a href="tdoc/<?php echo $studrow["dimg8"]; ?>" target="_blank">VIEW</a>
		<?php
		}
		?>
		</td>	
	  
        </tr>
        <?php
        $i++;
	    }
	    ?>
        </table>
        <?php } ?>
        </div>
       </form>					
        </div>
<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
	