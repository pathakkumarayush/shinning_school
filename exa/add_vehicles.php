<?php
if(isset($_POST['submit1']))
{
   if((empty($_POST['veh_no'])) || (empty($_POST['veh_seats'])) || (empty($_POST['veh_type'])) || (empty($_POST['veh_driver'])))
   {
     $err="Field marked with * are mandatory";
   }
if(empty($err))
{
$groute2=mysqli_query($con,"select * from add_vehcles where veh_no='".$_POST['veh_no']."' and  school='".$_SESSION['uid']."'");
if(mysqli_num_rows($groute2)<1)
{

  $query=mysqli_query($con,"insert into add_vehcles(veh_no,veh_seats,veh_typ,veh_driver,status,school,session,Rseats) values('".$_POST['veh_no']."','".$_POST['veh_seats']."','".$_POST['veh_type']."','".$_POST['veh_driver']."','".$_POST['status']."','".$_SESSION['uid']."','".$_SESSION['session']."','".$_POST['veh_seats']."')");
?>
<script type="text/javascript">
window.location="<?php echo $var."add_vehicles&msg=Inserted Successfully";   ?>";
</script>
<?php
}
else
  {
   ?>
    <script type="text/javascript">
    alert("Rout already exist");
   </script>
   <?php
  }

}
}

if(!empty($_GET['id']))
{
$groute=mysqli_query($con,"select * from add_vehcles where veh_id='".$_GET['id']."' and school='".$_SESSION['uid']."'");
$row_rout=mysqli_fetch_array($groute);
}

if(isset($_POST['update']))
{
 $upd_rout=mysqli_query($con,"update add_vehcles set veh_no='".$_POST['veh_no']."',veh_seats='".$_POST['veh_seats']."',veh_typ='".$_POST['veh_type']."',veh_driver='".$_POST['veh_driver']."',status='".$_POST['status']."',veh_seats='".$_POST['veh_seats']."' where veh_id='".$_GET['id']."' ");


?>
<script type="text/javascript">
window.location="<?php echo $var."add_vehicles&msg=Updated Successfully";   ?>";
</script>
<?php
}

if(!empty($_GET['did']))
{
$del_rout=mysqli_query($con,"delete from add_vehcles where veh_id='".$_GET['did']."' and school='".$_SESSION['uid']."'");
?>
<script type="text/javascript">
window.location="<?php echo $var."add_vehicles&msg=Deleted Successfully"; ?>";
</script>
<?php
}

?>

<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Vehcle")) { 
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
<div class="left_sect"><img src="images/Transport/trans.png" /><a href="./?pageid=transport_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/sicon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Vehicles</h2>


</div>

<div class="col_4" style="margin-top:0px;" >

                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
          <?php
	          
			 if(!empty($_GET['msg']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['msg'];   ?></div>
		  <?php
		   }
	       ?>
        <?php
	         if(!empty($err))
			{
			?>				
			 <div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $err;  ?></div>
		<?php  } ?>
		
	<?php
	    if(empty($_GET['id']))
		{
	?>
        
         <table border="0" style="margin:10px 0px 0px 20px">
            <tr>
                <td>Session</td>
                <td><?php echo $_SESSION['session']; ?></td>
           </tr>
           <tr>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
           </tr>
          
            <tr>
            <td>Vehicle Number<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_no" class="tb5" value="<?php if($_POST) echo $_POST['veh_no']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
         
          
		    <tr>
            <td>No of Seats<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_seats" class="tb5" value="<?php if($_POST) echo $_POST['veh_seats']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr> 
		   <tr>
            <td>Vehcle Type<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_type" class="tb5" value="<?php if($_POST) echo $_POST['veh_type']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>  
		   <tr>
            <td>Driver Name<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_driver" class="tb5" value="<?php if($_POST) echo $_POST['veh_driver']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>  
		  <tr>
            <td>Status</td>
             <td><input type="radio" name="status" value="Active" name="check" checked="checked"><b>&nbsp;Active</b> &nbsp;&nbsp; <input type="radio" name="status" value="Inactive"><b>&nbsp;Inactive</b></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr> 
		 
		 
		   <tr>
            <td></td>
            <td><input  type="submit" name="submit1"  value="Submit" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
     <?php
	 }
	 else
	 {
	 ?>
	<table border="0" style="margin:10px 0px 0px 20px">
            <tr>
                <td>Session</td>
                <td><?php echo $_SESSION['session']; ?></td>
           </tr>
           <tr>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
           </tr>
          
            <tr>
            <td>Vehicle Number<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_no" class="tb5" value="<?php  echo $row_rout['veh_no']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
         
          
		    <tr>
            <td>No of Seats<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_seats" class="tb5" value="<?php  echo $row_rout['veh_seats']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr> 
		   <tr>
            <td>Vehcle Type<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_type" class="tb5" value="<?php  echo $row_rout['veh_typ']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>  
		   <tr>
            <td>Driver Name<span class="textfieldRequiredMsg">*</span></td>
             <td><input type="text" name="veh_driver" class="tb5" value="<?php  echo $row_rout['veh_driver']; ?>" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>  
		  <tr>
            <td>Status</td>
             <td><input type="radio" name="status" value="Active" name="check" <?php if($row_rout['status']=="Active") { ?> checked="checked" <?php } ?>><b>&nbsp;Active</b> &nbsp;&nbsp; <input type="radio" name="status" value="Inactive" <?php if($row_rout['status']=="Inactive") { ?> checked="checked" <?php } ?>><b>&nbsp;Inactive</b></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td><input type="hidden" name="id" value="<?php echo $row_rout['veh_id']; ?>"></td>
          </tr> 
		 
		 
		   <tr>
            <td></td>
            <td><input  type="submit" name="update"  value="Update" style="width:100px; height:30px; font-size:14px; margin-bottom:10px" /></td>
          </tr>
         
        </table>
	 <?php
	 }
	 
	 ?>
       
          
    
      
   
			<br><br>
            <div class="box-head">
						<h2 class="left">Vehicle Details</h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; height:220px; overflow:scroll">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr style="background:#EAECFD; color:#000">
          <td>Sr.No</td>
          <td>Vehicle Number</td>
          <td>Vehicle Seats</td>
         <td>Vehicle Type</td>
         <td>Vehicle Driver</td>
		 <td>Status</td>
		 <td>Action</td>
       </tr>
	   <?php
	      $query=mysqli_query($con,"select * from add_vehcles where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       $i=1;
	      while($row=mysqli_fetch_array($query))
		  {
	   ?>
	   
      <tr>
        <td><?php echo $i;  ?></td>
       <td><?php echo ucwords($row['veh_no']);  ?></td> 
	   <td><?php echo $row['veh_seats'];  ?></td>
	 <td><?php echo $row['veh_typ'];  ?></td>
	 <td><?php echo $row['veh_driver'];  ?></td>
	 <td><?php echo $row['status'];  ?></td>
	   <td><a style="color:#CC0033" href="<?php echo $var."add_vehicles"."&&id=".$row['veh_id']; ?>">Edit</a>/<a style="color:#CC0033" href="<?php echo $var."add_vehicles"."&&did=".$row['veh_id']; ?>" onClick="return confirmation();">Delete</a></td>
	 </tr>
	<?php
	  $i++;
	 }
	?>
	</table>
           
         </div>
      
                 
                   </form>
                    <!-- Box Head -->
					<!-- End Box -->					   
</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
				