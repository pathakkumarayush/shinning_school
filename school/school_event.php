
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

  
	if(empty($_POST["date"]) || empty($_POST["eventname"]))
	  {
	     $err="Field Marked with * are mandatory";
	  }
	  if(empty($err) )
	  {
	  $date=date("Y-m-d",strtotime($_POST['date']));

if(empty($_POST['todate']))
{
$month=date("M");
$query=	mysqli_query($con,"insert into event_calendar(event_date,title,session,class,month1) values('$date','".$_POST["eventname"]."','".$_SESSION['session']."','".$_POST["class"]."','$month')");
   $msg="Inserted Successfully";
   }	
 else
    {
	 $datefrom= date("Y-m-d",strtotime($_POST['date']));
$dateto = date("Y-m-d",strtotime($_POST['todate']));
	    # Get all dates between two dates using php code:
function getAllDatesBetweenTwoDates($strDateFrom,$strDateTo)
{
    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}

$fromDate = date("Y-m-d",strtotime($datefrom));
$toDate = date("Y-m-d",strtotime($dateto));

$dateArray = getAllDatesBetweenTwoDates($fromDate, $toDate);
/*
echo  "<pre>";
    print_r($dateArray);
echo "</pre>";
*/
   foreach($dateArray as $dat)
   {
     
   $month=date("M");
  //  $date=date("Y-m-d",strtotime($_POST['todate']));
	mysqli_query($con,"insert into event_calendar(event_date,title,session,class,month1) values('$dat','".$_POST["eventname"]."','".$_SESSION['session']."','".$_POST["class"]."','$month')");
     
	 }
	$msg="Inserted Successfully"; 
	
	}	
	
}
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
	  $delete=mysqli_query($con,"delete from event_calendar where id='".$_GET['did']."'");
	}
	
	 if(!empty($_GET['id']))
    {
	   $memo=mysqli_query($con,"select * from event_calendar where id='".$_GET['id']."'");
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
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add School Event and Holiday</h2>
<a href="<?php echo $var."events" ?>" style="border-radius:5px; padding:5 5 5 5 ;font-size:20px; color:#990000; float:right; margin-top:13px;">Search Holiday Class Wise</a>
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
   
     		
          
    <table cellspacing="10">
<tr>
<td>Session : </td>
<td><?php echo $_SESSION['session']; ?></td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
<tr>
   <td>Event Namee:<span>*</span></td>
  <td><input type="text" name="eventname" style="width:250px;" class="tb5" /></td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

<tr>
<td>From Date : </td>
<td><input name="date"  id="demo1" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['txtdob']; if(isset($_GET["upstudid"])){echo $rowstud["student_dob"];} ?>"  size="40" class="tb5" style="width:250px" /><a href="javascript:NewCal('demo1','ddmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>
<tr>
<td>To Date : </td>
<td><input name="todate"  id="todate" type="text" value="<?php if(($_POST) && (empty($_GET["upstudid"]))) echo $_POST['todate']; if(isset($_GET["upstudid"])){echo $rowstud["todate"];} ?>"  size="40" class="tb5" style="width:250px" /><a href="javascript:NewCal('todate','ddmmyyyy')"><img src="css/images/cal.gif" width="20" height="20" border="0" alt="Pick a date" style=" padding-top:10px;"></a></td>
</tr>
<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
</tr>

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
						<h2 class="left">Events and Holiday Details</h2>
						</div>
      <div class="table" style="border:#33cc66 20px solid; height:580px; margin-top:-10px; width:1107px;overflow:scroll">
          
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr style="font-weight:bold">
	    <td>Sr</td>
        <td>Date</td>
		<td>Holiday and Event Name</td>
		<td>Class</td>
        <td>Action</td>
        </tr>
       <?php
        $memo=mysqli_query($con,"select * from event_calendar where session='".$_SESSION['session']."'");
		
		$i=1;
	while($rowmemo=mysqli_fetch_array($memo))
	{
	?>	
    <tr style="color:#335599">
    <td><?php echo $i;  ?></td>
    <td><?php echo $rowmemo['event_date'];?></td>
      <td><?php echo $rowmemo['title'];?></td>
	      <td><?php echo $rowmemo['class'];?></td>
    <td><a style="color:#CC0033" href="<?php echo $var."school_event"."&&did=".$rowmemo['id']; ?>" onClick="return confirmation();">Delete</a></td>
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

  
