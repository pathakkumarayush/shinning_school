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

<?php
if(isset($_POST['submit2']))
{
$quepr=mysqli_query($con,"Update teacher set max_per='".$_POST['maxperiod']."' where teacher_id='".$_POST['all_teacher']."' and teacher_school='".$_SESSION['uid']."'");	
if(!empty($_POST['upd']))
{
$msg="Updated Successfully";
}
else
   {
     $msg="Inserted Successfully";
   }
 }
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Teacher Priority")) { 
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
<div class="left_sect"><img src="images/Time Table/time.png" /><a href="./?pageid=time_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">
<div class="shell_main">
<div class="enquiry">
<img src="images/lib.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Teacher Setting </h2>
<a href="./?pageid=subpref" style="float:right; text-decoration:none; color:#FFFFFF; margin-top:8px; background-color:#006666; padding:8px; margin-right:10px;">Back</a>
</div>
<div class="col_4" style="margin-top:0px;" >		

				
				
                <a href="./?pageid=subpref">Subject Preference</a> >>Teacher Setting</a>
				
				<form method="post" name="myForm" action="#" enctype="multipart/form-data" onsubmit="return(validate());" style="">
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
		<table style="margin-top:30px;margin-left:20px; font-size:15px" width="320">
        <?php
		     $que_teac=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."'");
			 
      
	    ?>
<tr>
   <td>Teacher Name<span>*</span></td>
   <td><select name="all_teacher" class="select" style="width:155px">
       <option>Select Teacher</option>
       <?php         
			 while($row_tea=mysqli_fetch_array($que_teac))
			 {
			?>	 
			<option value="<?php echo $row_tea['teacher_id'];?>"><?php echo $row_tea['teacher_name'];?></option>
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
<td>Maximum Period</td>
<td><input type="text" name="maxperiod"  class="tb5" style="width:50px"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>



<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="submit2" value="Update Teacher" style="font-size:14px"></td>
</tr>
</table>
      <?php
	    }
		else
		   {
		   ?>
               <table style="margin-top:30px; font-size:15px" width="320">
    <?php
		     $que_teac1=mysqli_query($con,"select * from teacher where  teacher_school='".$_SESSION['uid']."' and teacher_id='".$_GET['id']."'");
		$rowup=mysqli_fetch_array($que_teac1);	 
         
	  ?>
<tr>
   <td>Teacher Name<span>*</span></td>
   <td><?php echo ucwords($rowup['teacher_name']); ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>


<tr>
<td>Maximum Period</td>
<td><input type="text" name="maxperiod" value="<?php echo ucwords($rowup['max_per']); ?>" class="tb5" style="width:50px"></td>
</tr>
<tr>
<td><input type="hidden" name="all_teacher" value="<?php echo $rowup['teacher_id']; ?>"></td>
<td><input type="hidden" name="upd" value="1" ></td>
</tr>
<tr>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

<tr>
   <td>&nbsp;</td>
   <td><input type="submit" name="submit2" value="Update Teacher" style="font-size:14px"></td>
</tr>
</table>

		   <?php
		   }
		 
		?>
		<br><br>
		   <?php
		    $fet_sub=mysqli_query($con,"select  * from class where school='".$_SESSION['uid']."'");
            $fetsub=mysqli_fetch_array($fet_sub);
		    $nosub=mysqli_query($con,"SELECT sum(no_of_periods) FROM `subjects` where class='".$fetsub['class']."' and school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' ");           
		   $rowcountsub=mysqli_fetch_array($nosub);
		   $val=$fetsub['no_of_periods']-$rowcountsub['sum(no_of_periods)'];
		 ?>
            <div class="box-head" style="margin-top:60px">
						
						
						</div>
        
		   <div class="table" style="border:#FF0000 0px solid; height:320px; overflow:scroll; ">
         <table  border="0" width="620px" style="margin:40px 0px 0px 10px;border-radius:10px;">
<tr style=" background-color:#f0dea4;font-weight:bold; font-size:16px">
    <td align="center">Sr.No</td>
    <td align="center">Teacher Name</td>
    <td align="center">Max Period</td>
	<td align="center">Update</td>
	</tr>
	
     <?php
   $i=1;
  $que_teac1=mysqli_query($con,"select * from teacher where teacher_school='".$_SESSION['uid']."' ");
  while($row_tea1=mysqli_fetch_array($que_teac1))
			 {
?>
    <tr>
			<td align="center"><?php echo $i;  ?></td>
            <td align="center"><?php echo ucwords($row_tea1['teacher_name']); ?></td>
            <td align="center"><?php echo $row_tea1['max_per']; ?></td>
		    <td align="center"><a href="<?php echo $var."teacherperiod&id=".$row_tea1['teacher_id']; ?>">Update</a></td>
	</tr>     
			<?php	
			$i++; 
			}
		  ?>
      
</table>
           
         </div>
      
                 
                   </form>              
				
				
					</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>
