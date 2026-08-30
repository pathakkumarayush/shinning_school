
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
  <?php
      if(isset($_POST["addevent"]))
      {
      if(empty($_POST["month"]) || empty($_POST["working_day"]))
	  {
	     $err="Field Marked with * are mandatory";
	  }
	  $query=mysqli_query($con,"insert into month(month,working_day,session) values ('".$_POST["month"]."','".$_POST["working_day"]."','".$_SESSION['session']."')");
      $msg="Inserted Successfully";
      }
      ?>
<?php
if(isset($_POST["update"]))
{

  
	$date=date("Y-m-d",strtotime($_POST['date']));
	mysqli_query($con,"update event_calendar set event_date='$date',title='".$_POST["eventname"]."' where id='".$_GET['id']."'");
	$msg="Inserted Successfully";
	
}
?>
<?php
  if(!empty($_GET['did']))
    {
	  $delete=mysqli_query($con,"delete from month where id='".$_GET['did']."'");
	}
	
	 if(!empty($_GET['id']))
    {
	   $memo=mysqli_query($con,"select * from month where id='".$_GET['id']."'");
	   $rowmemo=mysqli_fetch_array($memo);
	}
?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this event")) { 
        return false;
    }
    
} 
</script>
<div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/ac/cale.png" /><a href="./?pageid=calender_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/calendar-icon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add School Workin Day</h2>
</div>

<div class="col_4">

<form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
             
	<?php 
	     if(!empty($err))
		 {
			?>
         <div class="error" style="border:#F00 0px solid; width:320px; height:20px; margin-left:20px"> 
		 <?php echo $err; ?> 
		</div>
         <?php
         }
	   ?>

			    
         <?php
     if(!empty($msg))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $msg; ?></div>
		  <?php
		   }
	       ?>
   
     		
          
<table cellspacing="10" style="margin-left:10px; margin-top:20px;">
<tr>
<td>Session : </td>
<td><?php echo $_SESSION['session']; ?></td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>Month<span>*</span></td>
  <td><select name="month"  class="select" style="width:150px;">
                   <option value="-1">Select Month</option>
                   <option value="Jul">July</option>
                   <option value="Aug">August</option>
                   <option value="Sep">September</option>
                   <option value="Oct">October</option>
                   <option value="Nov">November</option>
                   <option value="Dec">December</option>
                   <option value="Jan">January</option>
                   <option value="feb">February</option>
                   <option value="Mar">March</option>
                   <option value="Apr">April</option>
                   <option value="May">May</option>
                   <option value="Jun">June</option>
                   
               </select>          </td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

<tr>
<td>Working Day:</td>
<td><input type="text" name="working_day" style="width:150px;"/></td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>



<tr>
<td>&nbsp;</td><td><input type="submit" name="addevent"></td>
</tr>
</table>
      
       
            <br><br>
            <div class="box-head">
						<h2 class="left">Working Day Details</h2>
						</div>
      <div class="table" style="border:#33cc66 20px solid; height:300px; margin-top:-10px; width:1107px;overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Month</td>
		<td>Working Day</td>
        <td>Action</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from month where session='".$_SESSION['session']."'");
		
		$i=1;
	    while($rowmemo=mysqli_fetch_array($memo))
	    {
	    ?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo $rowmemo['month'];?></td>
      <td><?php echo $rowmemo['working_day'];?></td>
    <td><a style="color:#CC0033" href="<?php echo $var."school_working_day"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
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

  
