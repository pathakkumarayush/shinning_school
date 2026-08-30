<script type="text/javascript">
 function validate()
{
 if( document.myForm.rout_no.value == "-1" )
   {
     alert("Please Select Rout No");
     return false;
   }
   else
   {
	return true; 
	}
}
</script>
<?php
if(isset($_POST['submit1']))
{
$stopage=implode(",",$_POST['stopage']);
$vehcle=implode(",",$_POST['vehcle']);
  $query=mysqli_query($con,"insert into rout_inout(rout_no,time_in,stopage,vehcle,school,session) values('".$_POST['rout_no']."','".$_POST['time_in']."','$stopage','$vehcle','".$_SESSION['uid']."','".$_SESSION['session']."')");
?>
<script type="text/javascript">
window.location="<?php echo $var."in_out&msg=Inserted Successfully";   ?>";
</script>
<?php 
}
if(isset($_GET['id']))
{
$groute=mysqli_query($con,"select * from rout_inout where id='".$_GET['id']."' and school='".$_SESSION['uid']."'");
$row_rout=mysqli_fetch_array($groute);
}
if(isset($_POST['update']))
{
$stopage=implode(",",$_POST['stopage']);
$vehcle=implode(",",$_POST['vehcle']);
$upd_rout=mysqli_query($con,"update rout_inout set rout_no='".$_POST['rout_no']."',time_in='".$_POST['time_in']."',stopage='$stopage',vehcle='$vehcle' where id='".$_GET['id']."'");
?>
<script type="text/javascript">
window.location="<?php echo $var."in_out&msg=Update Successfully";   ?>";
</script>
<?php
}

if(!empty($_GET['did']))
{
$del_rout=mysqli_query($con,"delete from rout_inout where id='".$_GET['did']."' and school='".$_SESSION['uid']."'");
?>
<script type="text/javascript">
window.location="<?php echo $var."in_out&msg=Deleted Successfully";   ?>";
</script>
<?php
}

?>
<script type="text/ecmascript">
function confirmation() { 
    if(!confirm("Do you want to delete this Field")) { 
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
div class="full_div">
<br clear="all" />
<div class="left_sect"><img src="images/Transport/trans.png" /><a href="./?pageid=transport_home">
<img src="images/buttonGoBack.png"  style="float:right; width:150px; height:60px;"/></a></div>
<div class="shell">

<div class="shell_main">
<div class="enquiry">
<img src="images/sicon.png"  style=" float:left; width:40px; margin-left:3px; margin-top:3px; height:40px;"/>
<h2 style="float:left; margin-left:10px; text-transform:uppercase; color:#006633; font-size:20px; margin-top:15px;">Add Routs</h2>
<a href="./?pageid=rout_allo" style="float:right; padding:16px; font-size:18px; color:#FFFFFF; background-color:#006633; margin-top:0px;">Allocate Transport For Student </a>

</div>

<div class="col_4" style="margin-top:0px;" >

                 <form method="post" name="myForm" action="#" enctype="multipart/form-data"  onsubmit="return(validate());">
                
         <?php
     if(!empty($_GET['uid']))
	         {
		     ?>
           <div class="success" style="width:250px; height:10px; border-radius:5px" ><?php echo $_GET['uid']; ?></div>
		  <?php
		   }
	       ?>
   
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
	         if(!empty($_GET['dmsg']) && empty($msg))
			{
			?>				
						<div class="error" style="width:250px; height:auto; border-radius:5px"><?php echo $_GET['dmsg'];  ?></div>
		<?php  } ?>
		
		
	 <?php
	    if(empty($_GET['id']))
		{
	 ?>
        
         <table border="0" style="margin:10px 0px 0px 20px">
            <tr>
            <td>Rout No<span class="textfieldRequiredMsg">*</span></td>
             <td>
			<select name="rout_no" class="select" style="width:150px">
			<option>Select Rout</option>
			<option value="Bhopal Road">Bhopal Road</option>
			
		    <option value="Gopal Pur">Gopal Pur</option>
		
			<option value="Avantika">Avantika</option>
		
		   
			
			</select>
			 </td>
          </tr>
          <?php /*?><tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
            <tr>
            <td>Select Time <span class="textfieldRequiredMsg">*</span></td>
            <td>
			<select name="time_in" class="select" style="width:150px">
			<option>Select Time</option>
			<option value="9-AM-In">9-AM-In</option>
			<option value="1-PM-Out">1-PM-Out</option>
		    <option value="3-PM-Out">3-PM-Out</option>
			</select>
		   </td>
          </tr><?php */?>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
            <tr>
            <td>Select Stop<span class="textfieldRequiredMsg">*</span> <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;	</td>
             <td>
			 <?php
			  $query=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by stop_name asc");
	         ?>
			<div style="height:250px; overflow:scroll; border:#999999 1px solid">
			 <?php
			 while($row=mysqli_fetch_array($query))
			 {
			 ?>
			 <input type="checkbox" name="stopage[]" value="<?php echo $row['stop_name'];  ?>">&nbsp;<?php echo $row['stop_name'];  ?> <br>
			 
			 <?php
			 }
			 ?>
			</div>
			 </td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
		  <?php
		   $query=mysqli_query($con,"select * from add_vehcles where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       ?>
	      
         <tr>
		   <td>Vehcle <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
            <td>
				<div style="height:150px; overflow:scroll; border:#999999 1px solid">
			 <?php
			 while($row=mysqli_fetch_array($query))
			 {
			 ?>
			 <input type="checkbox" name="vehcle[]" value="<?php echo $row['veh_no'];  ?>"><?php echo $row['veh_no'];  ?><br>
			 
			 <?php
			 }
			 ?>
			 </div>
			</td>
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
            <td>Rout No<span class="textfieldRequiredMsg">*</span></td>
            <td>
		    <select name="rout_no" class="select" style="width:150px">
			<option>Select Rout</option>
			
			
		    <option value="Bhopal Road" <?php if($row_rout['rout_no']=="Bhopal Road") { ?> selected="selected" <?php }  ?> >Bhopal Road</option>
			<option value="Gopal Pur" <?php if($row_rout['rout_no']=="Gopal Pur") { ?> selected="selected" <?php }  ?> >Gopal Pur</option>
		    <option value="Avantika" <?php if($row_rout['rout_no']=="Avantika") { ?> selected="selected" <?php }  ?> >Avantika</option>
			
			
			 </select>
			 </td>
          </tr>
         <?php /*?> <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
            </tr>
            <tr>
            <td>Select Time <span class="textfieldRequiredMsg">*</span></td>
            <td>
			<select name="time_in" class="select" style="width:150px">
			<option>Select Time</option>
			<option value="9-AM-In">9-AM-In</option>
			<option value="1-PM-Out">1-PM-Out</option>
		    <option value="3-PM-Out">3-PM-Out</option>
			</select>
		   </td>
          </tr><?php */?>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
             <tr>
             <td>Select Stop<span class="textfieldRequiredMsg">*</span> <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;	</td>
             <td>
			 <?php
			 $query=mysqli_query($con,"select * from stopage where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."' order by stop_name asc");
	         ?>
			 <div style="height:250px; overflow:scroll; border:#999999 1px solid">
			 <?php
			 while($row=mysqli_fetch_array($query))
			 {
			 ?>
			 <input type="checkbox" name="stopage[]" value="<?php echo $row['stop_name'];  ?>"  
			<?php
			  $exp=explode(",",$row_rout['stopage']); 
               
			  foreach($exp as $ey)
			  {
			     if($row['stop_name']==$ey)
				 {

				 ?>
                checked="checked"
				 <?php
				 }
			  }
			?>			 
			 >&nbsp;<?php echo $row['stop_name'];  ?> <br>
			 
			 <?php
			 }
			 ?>
			</div>
			 </td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
		  <?php
		   $query=mysqli_query($con,"select * from add_vehcles where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       ?>
	      
         <tr>
		   <td>Vehcle <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;</td>
            <td>
				<div style="height:150px; overflow:scroll; border:#999999 1px solid">
			 <?php
			 while($row=mysqli_fetch_array($query))
			 {
			 ?>
			 <input type="checkbox" name="vehcle[]" value="<?php echo $row['veh_no'];  ?>"
			 <?php
			 $ex2=explode(",",$row_rout['vehcle']);
			 foreach($ex2 as $ey)
			 {
			 
			if($ey==$row['veh_no'])
			{
			?>
	           checked="checked"
			<?php
			}
			
		}
			 ?>
			 
			 
			 ><?php echo $row['veh_no'];  ?><br>
			 
			 <?php
			 }
			 ?>
			 </div>
			</td>
          </tr>
          <tr>
              <td><input type="hidden" name="id" value="<?php echo $row['id'];  ?>" />;</td>
              <td>&nbsp;</td>
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
						<h2 class="left">Transport Details</h2>
						
					</div>
         <div class="table" style="border:#FF0000 0px solid; min-height:400px;overflow:scroll">
          
         <table border="0" cellspacing="0" cellpadding="0" style="width:1200px;">
		<tr style=" font-weight:bold">
          <td>S.No</td>
          <td>Rout</td>
		  <td>Time</td>
          <td>Stopage</td>
         <td>Vehcle</td>
         <td>Action</td>
       </tr>
	   <?php
	      $query=mysqli_query($con,"select * from rout_inout where school='".$_SESSION['uid']."' and session='".$_SESSION['session']."'");
	       $i=1;
	      while($row=mysqli_fetch_array($query))
		  {
	   ?>
	   
      <tr>
        <td><?php echo $i;  ?></td>
       <td style="width:50px;"><?php echo ucwords($row['rout_no']);  ?></td> 
	   <td style="width:60px;"><?php echo $row['time_in'];  ?></td> 
	   <td><?php 
	   echo $row['stopage'];  
	   ?></td>
	    <td><?php echo $row['vehcle'];  ?></td>
	   <td><a style="color:#CC0033" href="<?php echo $var."in_out"."&&id=".$row['id']; ?>">Edit</a>/<a style="color:#CC0033" href="<?php echo $var."in_out"."&&did=".$row['id']; ?>" onClick="return confirmation();">Delete</a></td>
	 </tr>
	<?php
	  $i++;
	 }
	?>
	</table>
         </div>
      
                 
                   </form>
                    <!-- Box Head -->
					</div>

<br clear="all" />
</div>
<br clear="all" />
</div>
</div>

  
				
					